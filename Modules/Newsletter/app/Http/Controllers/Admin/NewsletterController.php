<?php

namespace Modules\Newsletter\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Modules\Newsletter\Http\Requests\NewsletterRequest;
use Modules\Newsletter\Jobs\NewNewsletterJob;
use Modules\Newsletter\Models\Newsletter;

class NewsletterController extends Controller
{
    public function __construct()
    {
        $this->setActive('newsletters');
        $user = Auth::user();
        $this->checkPerm($user, 'Manage Newsletters');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $letters = Newsletter::latest()->with('createdBy')->paginate($this->pageSize());
        return view('newsletter::admin.index', compact('letters'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NewsletterRequest $request): RedirectResponse
    {
        try {
            $request->merge([
                'lang' => app()->getLocale()
            ]);
            $newsletter = Newsletter::create($request->all());
            NewNewsletterJob::dispatch($newsletter);
            $this->flushMessage(true);
        } catch (Exception $exception) {
            $this->flushMessage($exception->getMessage());
        }
        return redirect()->to(route('admin.newsletters.index'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('newsletter::admin.create');
    }

    /**
     * Remove multi resource from storage.
     */
    public function deleteMulti()
    {
        $ids = request()->input('ids');
        try {
            Newsletter::destroy($ids);
            $this->flushMessage(true);
        } catch (Exception $exception) {
            session()->flash('error', $exception->getMessage());
        }
        return redirect()->to(route('admin.newsletters.index'));
    }
}
