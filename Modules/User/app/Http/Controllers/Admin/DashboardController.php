<?php

namespace Modules\User\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Modules\Academic\Models\University;
use Modules\Blog\Models\BlogPost;
use Modules\Contact\Models\Contact;
use Modules\Core\Models\Search;
use Modules\Page\Models\Page;
use Modules\Subscriber\Models\Subscriber;

class DashboardController extends Controller
{
    public function index()
    {
        $counts = array();

        $counts['blogs'] = BlogPost::count();
        $counts['universities'] = University::count();
        $counts['pages'] = Page::count();
        $counts['subscribers'] = Subscriber::count();
        $counts['contacts'] = Contact::count();
        $counts['users'] = User::type()->count();
        $counts['admins'] = User::type('admin')->count();

        $search = Search::orderBy('count', 'DESC')->latest()->paginate();

        return view('user::admin.dashboard', compact('counts', 'search'));
    }

}
