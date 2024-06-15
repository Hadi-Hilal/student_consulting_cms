<?php

namespace Modules\Settings\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Settings\Models\Seo;

class SeoController extends Controller
{
    public function __construct()
    {
        $this->setActive('settings');

    }

    public function index()
    {
        $this->setActive('website_seo');
        $seo = Seo::pluck('value', 'key');
        $user = Auth::user();
        $this->checkPerm($user, ['Manage Settings', 'View Settings']);
        return view('settings::admin.seo_index', compact('seo'));
    }


    public function store(Request $request)
    {
        $user = Auth::user();
        $this->checkPerm($user, 'Manage Settings');
        foreach ($request['data'] as $key => $value) {
            Seo::set($key, $value);
        }
        session()->flash('success', __('Configuration Updated Successfully'));
        return redirect()->back();
    }
}
