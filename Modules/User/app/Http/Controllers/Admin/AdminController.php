<?php

namespace Modules\User\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\User\Notifications\GrantAccess;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->setActive('users lists');
        $this->setActive('admins');
        $user = Auth::user();
        $this->checkPerm($user, 'Manage Users & Admins');
    }

    public function index()
    {
        $roles = Role::all();
        $admins = User::type('admin')->latest()
            ->select(['id', 'email', 'name', 'type', 'super_admin', 'last_login', 'created_at'])
            ->when(request()->filled('role'), function ($query) {
                $query->whereHas('roles', function ($q) {
                    $q->where('id', request()->input('role'));
                });
            })->paginate($this->pageSize());

        return view('user::admin.admins', compact('admins', 'roles'));
    }

    public function deleteMulti(Request $request)
    {

        $userIds = $request->input('ids');
        try {
            User::destroy($userIds);
            $this->flushMessage(true);
        } catch (Exception $exception) {
            session()->flash('error', $exception->getMessage());
        }

        return redirect()->back();
    }

    public function switch(User $user)
    {

        $user->type = 'user';
        $user->super_admin = 0;
        try {
            $user->save();
            if ($user->roles()->exists()) {
                $user->roles()->detach();
            }
            $subject = __('Grant Access To Admin Panel');
            $msg = __("Apologies! Your Admin Privileges Have Been Revoked");
            $user->notify(new GrantAccess($subject, $msg, app()->getLocale()));
            $this->flushMessage(true);
        } catch (Exception $exception) {
            session()->flash('error', $exception->getMessage());
        }
        return redirect()->back();
    }

    public function assign(User $user)
    {

        $user->super_admin = !$user->super_admin;
        try {
            $user->save();
            $subject = __('Grant Access To Admin Panel');
            if ($user->super_admin) {
                $msg = __("Good News! You've Been Promoted To Super Admin");
            } else {
                $msg = __("Apologies! Your Super Admin Privileges Have Been Revoked");
            }
            $user->notify(new GrantAccess($subject, $msg, app()->getLocale()));
            $this->flushMessage(true);
        } catch (Exception $exception) {
            session()->flash('error', $exception->getMessage());
        }
        return redirect()->back();
    }
}
