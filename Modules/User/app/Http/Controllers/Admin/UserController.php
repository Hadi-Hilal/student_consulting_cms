<?php

namespace Modules\User\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Modules\User\Exports\UserExport;
use Modules\User\Notifications\GrantAccess;


class UserController extends Controller
{

    public function __construct()
    {
        $this->setActive('users lists');
        $this->setActive('users');
        $user = Auth::user();
        $this->checkPerm($user, 'Manage Users & Admins');
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $users = User::type('user')->latest()
            ->select(['id', 'email', 'name', 'type', 'mobile', 'email_verified_at', 'last_login', 'created_at'])
            ->when(request()->filled('fVerified'), function ($query) {
                $query->where('email_verified_at', request('fVerified') == 1 ? '!=' : '=', null);
            })
            ->paginate($this->pageSize());
        return view('user::admin.users', compact('users'));
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
        $user->type = 'admin';
        try {
            $user->save();
            $subject = __('Grant Access To Admin Panel');
            $msg = __("Good News! You've Been Promoted To Be Admin In Our Admin Panel");
            $user->notify(new GrantAccess($subject, $msg, app()->getLocale()));
            $this->flushMessage(true);
        } catch (Exception $exception) {
            session()->flash('error', $exception->getMessage());
        }
        return redirect()->back();
    }

    public function export()
    {
        return Excel::download(new UserExport(), '#users.xlsx');
    }
}
