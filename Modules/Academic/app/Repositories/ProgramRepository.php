<?php

namespace Modules\Academic\Repositories;

use Illuminate\Pagination\LengthAwarePaginator;
use Modules\Academic\Http\Requests\ProgramRequest;
use Modules\Academic\Models\Program;

interface ProgramRepository
{
    function paginate(array $columns = ['*']): LengthAwarePaginator;

    function store(ProgramRequest $request): bool;

    function update(ProgramRequest $request, Program $program): bool;

    function deleteMulti(array $ids): bool;
}
