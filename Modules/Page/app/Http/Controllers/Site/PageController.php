<?php

namespace Modules\Page\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Modules\Page\Models\Page;

class PageController extends Controller
{
    public function show($slug)
    {
        $page = Page::where('publish', 'published')->whereSlug($slug)->firstOrFail();

        if (!session()->has('pages') || session('pages') !== $page->id) {
            $page->visits++;
            $page->save();
            session()->put('pages', $page->id);
        }

        return view('page::site.show', compact('page'));

    }
}
