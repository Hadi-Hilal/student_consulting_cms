<?php

namespace Modules\Team\Repositories;

use Exception;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Config;
use Modules\Core\Traits\FileTrait;
use Modules\Team\Http\Requests\TeamRequest;
use Modules\Team\Models\Team;


class TeamModelRepository implements TeamRepository
{

    use FileTrait;

    private string $uploadPath = 'team';

    public function paginate(array $columns = ['*']): LengthAwarePaginator
    {
        return Team::latest()->select($columns)->paginate(Config::get('core.page_size'));
    }

    public function store(TeamRequest $request): bool
    {
        if ($request->has('img')) {
            $path = $this->upload($request->file('img'), $this->uploadPath);
        } else {
            session()->flash('error', __('The Image Is Required'));
            return false;
        }
        $request->merge([
            'avatar' => $path,
            'publish' => $request->has('publish') ? 'published' : 'archived',
        ]);
        try {
            Team::create($request->all());
            cache()->forget('team');
            return true;
        } catch (Exception $exception) {
            session()->flash('error', $exception->getMessage());
        }
        return false;
    }

    public function update(TeamRequest $request, Team $team): bool
    {
        if ($request->has('img')) {
            $path = $this->upload($request->file('img'), $this->uploadPath, old: $team->avatar);
            $request->merge([
                'avatar' => $path,
            ]);
        }
        $request->merge([
            'publish' => $request->has('publish') ? 'published' : 'archived',
        ]);
        try {
            $team->update($request->all());
            cache()->forget('team');
            return true;
        } catch (Exception $exception) {
            session()->flash('error', $exception->getMessage());
        }
        return false;
    }

    public function deleteMulti(array $ids): bool
    {
        try {
            $teamImages = Team::whereIn('id', $ids)->pluck('avatar')->toArray();
            Team::destroy($ids);
            $this->deleteFile($teamImages);
            cache()->forget('team');
            return true;
        } catch (Exception $exception) {
            session()->flash('error', $exception->getMessage());
        }
        return false;
    }

}
