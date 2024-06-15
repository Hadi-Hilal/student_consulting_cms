<?php

namespace Modules\Page\Repositories;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Modules\Page\Http\Requests\PageRequest;
use Modules\Page\Models\Page;

interface PageRepository
{
    function paginate(Request $request, array $columns = ['*']): LengthAwarePaginator;

    function store(PageRequest $request): bool;

    function update(PageRequest $request, Page $page): bool;

    function deleteMulti(array $ids): bool;
}
