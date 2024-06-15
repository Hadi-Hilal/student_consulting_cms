<?php

namespace Modules\Blog\Repositories;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Modules\Blog\Http\Requests\BlogPostRequest;
use Modules\Blog\Models\BlogPost;

interface PostRepository
{
    function paginate(Request $request, array $columns = ['*']): LengthAwarePaginator;

    function store(BlogPostRequest $request): bool;

    function update(BlogPostRequest $request, BlogPost $post): bool;

    function deleteMulti(array $ids): bool;
}
