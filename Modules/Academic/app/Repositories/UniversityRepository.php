<?php

namespace Modules\Academic\Repositories;

use Illuminate\Pagination\LengthAwarePaginator;
use Modules\Academic\Http\Requests\UniversityRequest;
use Modules\Academic\Models\University;

interface UniversityRepository
{
    function paginate(array $columns = ['*']): LengthAwarePaginator;

    function store(UniversityRequest $request): bool;

    function update(UniversityRequest $request, University $university): bool;

    function deleteMulti(array $ids): bool;
}
