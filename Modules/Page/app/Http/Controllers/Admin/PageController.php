<?php

namespace Modules\Page\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Page\Http\Requests\PageRequest;
use Modules\Page\Models\Page;
use Modules\Page\Repositories\PageRepository;

class PageController extends Controller
{
    public function __construct(protected PageRepository $pageRepository)
    {
        $this->setActive('pages');
        $this->setActive('custom_pages');
        $user = Auth::user();
        $this->checkPerm($user, 'Manage Pages');
    }

    public function index(Request $request)
    {
        $pages = $this->pageRepository->paginate($request, ['id', 'title', 'slug', 'image', 'publish', 'type', 'featured', 'visits', 'created_at']);

        return view('page::admin.index', compact('pages'));
    }

    public function create()
    {
        return view('page::admin.create');
    }

    public function store(PageRequest $request): RedirectResponse
    {

        $this->flushMessage($this->pageRepository->store($request));
        return redirect()->to(route('admin.pages.index'));
    }


    public function edit(Page $page)
    {
        return view('page::admin.edit', compact('page'));
    }

    public function update(PageRequest $request, Page $page): RedirectResponse
    {
        $this->flushMessage($this->pageRepository->update($request, $page));
        return redirect()->to(route('admin.pages.index'));
    }

    public function deleteMulti(): RedirectResponse
    {
        $ids = request()->input('ids');
        $this->flushMessage($this->pageRepository->deleteMulti($ids));
        return redirect()->to(route('admin.pages.index'));
    }
}
