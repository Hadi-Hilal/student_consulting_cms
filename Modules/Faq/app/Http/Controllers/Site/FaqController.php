<?php

namespace Modules\Faq\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Modules\Faq\Models\Faq;
use Modules\Settings\Models\Seo;
use Modules\Settings\Models\Settings;

class FaqController extends Controller
{

    public function index()
    {
        $settings = Settings::pluck('value', 'key');
        $seo = Seo::pluck('value', 'key');

        $faqs = Faq::published()->latest()->paginate();

        return view('faq::site.index', compact('settings', 'seo', 'faqs'));
    }
}
