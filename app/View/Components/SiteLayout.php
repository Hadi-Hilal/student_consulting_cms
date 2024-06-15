<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Modules\Page\Models\Page;
use Modules\Settings\Models\Seo;
use Modules\Settings\Models\Settings;

class SiteLayout extends Component
{
    /**
     * Create a new component instance.
     */
    public $seo;
    public mixed $settings;
    public $pages;

    public function __construct()
    {
        $this->seo = Seo::pluck('value', 'key');

        $this->settings = Settings::pluck('value', 'key');
        $this->pages = Page::featured()->select('title' , 'slug' ,'type')->get();

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.site-layout');
    }
}
