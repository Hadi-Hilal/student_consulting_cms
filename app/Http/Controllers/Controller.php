<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Config;

abstract class Controller
{
    public function setActive(string $key, $value = true)
    {
        $this->active[$key] = $value;
        view()->share('active', $this->active);
        return $this;
    }

    public function pageSize()
    {
        if (Config::get('core.page_size')) {
            return Config::get('core.page_size');
        }
        return 30;
    }

    public function checkPerm(User $user, mixed $perms)
    {
        if ($user->super_admin) {
            return true;
        }

        if (is_array($perms)) {

            foreach ($perms as $perm) {
                if ($user->can($perm)) {
                    return true;
                }
            }

        } else {
            if ($user->can($perms)) {
                return true;
            }
        }

        abort(403);
    }

    protected function flushMessage(mixed $condition, string $msg = null): void
    {
        if ($condition) {
            session()->flash('success', $msg ?? __('The Operation Done Successfully'));
        } else if (!session()->has('error')) {
            session()->flash('error', $msg ?? __('An Error Occurred!'));
        }
    }
}
