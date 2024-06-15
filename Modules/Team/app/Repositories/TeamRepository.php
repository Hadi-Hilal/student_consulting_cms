<?php

namespace Modules\Team\Repositories;

use Illuminate\Pagination\LengthAwarePaginator;
use Modules\Team\Http\Requests\TeamRequest;
use Modules\Team\Models\Team;


interface TeamRepository
{
    function paginate(array $columns = ['*']): LengthAwarePaginator;

    function store(TeamRequest $request): bool;

    function update(TeamRequest $request, Team $team): bool;

    function deleteMulti(array $ids): bool;
}
