<?php

namespace Modules\Blog\Repositories;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Config;
use Modules\Blog\Http\Requests\BlogPostRequest;
use Modules\Blog\Jobs\NewPostCreatedJob;
use Modules\Blog\Models\BlogPost;
use Modules\Core\Traits\FileTrait;

class PostModelRepository implements PostRepository
{
    use FileTrait;

    private string $postUploadPath = 'posts';

    public function paginate(Request $request, array $columns = ['*']): LengthAwarePaginator
    {
        return BlogPost::select($columns)->latest()
            ->when($request->has('publish') and $request->query('publish'), function ($q) use ($request) {
                $q->where('publish', $request->query('publish'));
            })
            ->when($request->has('category_id') and $request->query('category_id'), function ($q) use ($request) {
                $q->where('category_id', $request->query('category_id'));
            })
            ->paginate(Config::get('core.page_size'));
    }

    public function store(BlogPostRequest $request): bool
    {
        if ($request->has('img')) {
            $path = $this->upload($request->file('img'), $this->postUploadPath, $request->input('slug'));
        } else {
            session()->flash('error', __('The Image Is Required'));
            return false;
        }
        $keywordsInput = $request->input('keywords');
        $decodedData = json_decode($keywordsInput, true);
        $valuesArray = array_column($decodedData, 'value');
        $keywords = implode(', ', $valuesArray);

        $request->merge([
            'image' => $path,
            'keywords' => $keywords,
        ]);
        try {
            $blogPost = BlogPost::create($request->all());
            if ($request->has('notification') && $request->input('notification') == '1') {
                NewPostCreatedJob::dispatch($blogPost, app()->getLocale());
            }
            cache()->forget('posts');
            return true;
        } catch (Exception $exception) {
            session()->flash('error', $exception->getMessage());
        }
        return false;
    }

    public function update(BlogPostRequest $request, BlogPost $post): bool
    {
        if ($request->has('img')) {
            $path = $this->upload($request->file('img'), $this->postUploadPath, $post->slug, $post->image);
            $request->merge([
                'image' => $path,
            ]);
        }
        $keywordsInput = $request->input('keywords');
        $decodedData = json_decode($keywordsInput, true);
        $valuesArray = array_column($decodedData, 'value');
        $keywords = implode(', ', $valuesArray);

        $request->merge([
            'keywords' => $keywords,
        ]);
        try {
            $post->update($request->all());
            if ($request->has('notification') && $request->input('notification') == '1') {
                NewPostCreatedJob::dispatch($post, app()->getLocale());
            }
            cache()->forget('posts');
            return true;
        } catch (Exception $exception) {
            session()->flash('error', $exception->getMessage());
        }
        return false;
    }

    public function deleteMulti(array $ids): bool
    {
        try {
            $postImages = BlogPost::whereIn('id', $ids)->pluck('image')->toArray();
            BlogPost::destroy($ids);
            $this->deleteFile($postImages);
            cache()->forget('posts');
            return true;
        } catch (Exception $exception) {
            session()->flash('error', $exception->getMessage());
        }
        return false;
    }
}
