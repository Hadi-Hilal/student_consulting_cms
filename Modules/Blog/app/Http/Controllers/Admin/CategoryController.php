<?php

namespace Modules\Blog\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Blog\Http\Requests\BlogCategoryRequest;
use Modules\Blog\Models\BlogCategory;

class CategoryController extends Controller
{

    public function index()
    {
        $this->setActive('blogs');
        $this->setActive('categories');
        $user = Auth::user();
        $this->checkPerm($user, ['Manage Blogs', 'View Blogs']);

        $categories = BlogCategory::paginate($this->pageSize());
        return view('blog::admin.categories.index', compact('categories'));
    }

    public function store(BlogCategoryRequest $request): RedirectResponse
    {
        $user = Auth::user();
        $this->checkPerm($user, 'Manage Blogs');
        try {
            BlogCategory::create($request->all());
            $this->flushMessage(true);
        } catch (Exception $exception) {
            session()->flash('error', $exception->getMessage());
        }
        return back();
    }


    public function update(Request $request, BlogCategory $category): RedirectResponse
    {
        $user = Auth::user();
        $this->checkPerm($user, 'Manage Blogs');
        $request->validate([
            'name' => 'required|string|min:4',
        ]);
        try {
            $category->update($request->all());
            $this->flushMessage(true);
        } catch (Exception $exception) {
            session()->flash('error', $exception->getMessage());
        }
        return back();
    }

    public function deleteMulti(): RedirectResponse
    {
        $user = Auth::user();
        $this->checkPerm($user, 'Manage Blogs');
        $ids = request()->input('ids');
        try {
            BlogCategory::destroy($ids);
            $this->flushMessage(true);
        } catch (Exception $exception) {
            session()->flash('error', $exception->getMessage());
        }
        return back();
    }


}
