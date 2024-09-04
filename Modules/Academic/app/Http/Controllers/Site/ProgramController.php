<?php

namespace Modules\Academic\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;
use Modules\Academic\Models\Level;
use Modules\Academic\Models\Program;
use Modules\Academic\Models\University;
use Modules\Settings\Models\Settings;


class ProgramController extends Controller
{

    public function index()
    {
        $programs = Program::with('universities')->paginate();

        return view('academic::site.programs.index', compact( 'programs'));
    }

    public function show($id)
    {
        $program = Program::with('universities')->findOrFail($id);

        return view('academic::site.programs.show', compact('program'));
    }

}
