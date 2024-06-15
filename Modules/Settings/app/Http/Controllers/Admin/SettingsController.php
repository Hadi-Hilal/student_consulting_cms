<?php

namespace Modules\Settings\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Core\Traits\FileTrait;
use Modules\Settings\Models\Settings;

class SettingsController extends Controller
{

    use FileTrait;

    public function __construct()
    {
        $this->setActive('settings');

    }

    public function index()
    {
        $this->setActive('website_settings');
        $settings = Settings::pluck('value', 'key');
        $user = Auth::user();
        $this->checkPerm($user, ['Manage Settings', 'View Settings']);
        return view('settings::admin.settings_index', compact('settings'));
    }


    public function store(Request $request)
    {
        $user = Auth::user();
        $this->checkPerm($user, 'Manage Settings');


        if ($request->has('imgs')) {
            $files = $request->file('imgs');
            foreach ($files as $key => $file) {
                $old_file = null;
                if (Settings::get($key)) {
                    $old_file = Settings::get($key);
                }

                $path = $this->upload($file, 'settings', $key, $old_file);

                Settings::set($key, $path);
            }
        }
        foreach ($request['data'] as $key => $value) {
            Settings::set($key, $value);
        }
        cache()->forget('settings');
        session()->flash('success', __('Configuration Updated Successfully'));
        return back();
    }


}
