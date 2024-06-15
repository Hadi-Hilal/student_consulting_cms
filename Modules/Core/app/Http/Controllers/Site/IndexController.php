<?php

namespace Modules\Core\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Modules\Academic\Models\Level;
use Modules\Academic\Models\Program;
use Modules\Academic\Models\University;
use Modules\Blog\Models\BlogPost;
use Modules\Settings\Models\Seo;
use Modules\Settings\Models\Settings;
use Modules\Testimonial\Models\Testimonial;

class IndexController extends Controller
{
    public function home()
    {
        $settings = Settings::pluck('value', 'key');
        $seo = Seo::pluck('value', 'key');
        $blogs = BlogPost::with('category')->featured()->cardData()->latest()->take(3)->get();

        $levels = Level::all();
        $programs = Program::all();
        $privateUniversityCount = University::type('private')->published()->count();
        $publicUniversityCount = University::type('public')->published()->count();
        $universities = University::featured()->cardData()->get();

        $testimonials = Testimonial::published()->get();
        return view('core::site.home', compact('settings', 'seo', 'blogs', 'levels',
            'programs', 'privateUniversityCount', 'publicUniversityCount', 'universities', 'testimonials'));
    }
}
