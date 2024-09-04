<?php

namespace Modules\Academic\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;
use Modules\Academic\Models\Level;
use Modules\Academic\Models\Program;
use Modules\Academic\Models\University;
use Modules\Settings\Models\Settings;


class UniversityController extends Controller
{

    public function index()
    {
        $programs = Program::with('universities')->get();
        $universities = University::published()->filter()->latest()->paginate();

        return view('academic::site.universities.index', compact('universities', 'programs'));
    }

    public function show($slug)
    {
        $university = University::published()->whereSlug($slug)->firstOrFail();

        if (!session()->has('university') || session('university') !== $university->id) {
            $university->visits++;
            $university->save();
            session()->put('university', $university->id);
        }

        $mayLike = University::published()->where('id', '!=', $university->id)->inRandomOrder()->take(5)->get();
        $settings = Settings::pluck('value', 'key');
        return view('academic::site.universities.show', compact('university', 'mayLike', 'settings'));
    }

    public function search_results()
    {
        $universities = University::published()->filter()->get();

        return view('academic::site.universities.search', compact('universities'));
    }

    public function program_filter()
    {
        $program = Program::filter()->with('universities')->find(request()->query('program'));
        $settings = Settings::pluck('value', 'key');
        $level = Level::where('id', request()->query('level', 1))->first();
        return view('academic::site.universities.filter', compact('program', 'level', 'settings'));
    }

    public function download_PDF($programId)
    {
        $program = Program::with('universities')->find($programId);
        return Pdf::loadView('academic::site.universities.pdf', compact('program'))->download('universities.pdf');
    }

}
