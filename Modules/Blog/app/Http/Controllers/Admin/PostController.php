<?php

namespace Modules\Blog\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Blog\Http\Requests\BlogPostRequest;
use Modules\Blog\Models\BlogCategory;
use Modules\Blog\Models\BlogPost;
use Modules\Blog\Repositories\PostRepository;

class PostController extends Controller
{
    public function __construct(protected PostRepository $postRepository)
    {
        $this->setActive('blogs');
        $this->setActive('posts');

    }

    public function index(Request $request)
    {
        $user = Auth::user();
        $this->checkPerm($user, ['Manage Blogs', 'View Blogs']);
        $categories = BlogCategory::all();
        $posts = $this->postRepository->paginate($request, ['id', 'title', 'slug', 'image', 'publish', 'featured', 'category_id', 'visits', 'created_by', 'created_at']);
        return view('blog::admin.posts.index', compact('posts', 'categories'));
    }

    public function create()
    {
        $user = Auth::user();
        $this->checkPerm($user, 'Manage Blogs');
        $categories = BlogCategory::get();
        return view('blog::admin.posts.create', compact('categories'));
    }

    public function store(BlogPostRequest $request): RedirectResponse
    {
        $user = Auth::user();
        $this->checkPerm($user, 'Manage Blogs');
        $this->flushMessage($this->postRepository->store($request));
        return redirect()->to(route('admin.blogs.posts.index'));
    }


    public function edit(BlogPost $post)
    {
        $user = Auth::user();
        $this->checkPerm($user, ['Manage Blogs', 'View Blogs']);
        $categories = BlogCategory::get();
        return view('blog::admin.posts.edit', compact('post', 'categories'));
    }

    public function update(BlogPostRequest $request, BlogPost $post): RedirectResponse
    {
        $user = Auth::user();
        $this->checkPerm($user, 'Manage Blogs');
        $this->flushMessage($this->postRepository->update($request, $post));
        return redirect()->to(route('admin.blogs.posts.index'));
    }

    public function deleteMulti(): RedirectResponse
    {
        $user = Auth::user();
        $this->checkPerm($user, 'Manage Blogs');
        $ids = request()->input('ids');
        $this->flushMessage($this->postRepository->deleteMulti($ids));
        return redirect()->to(route('admin.blogs.posts.index'));
    }

}
