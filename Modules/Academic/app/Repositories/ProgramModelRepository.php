<?php

namespace Modules\Academic\Repositories;

use Exception;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Config;
use JsonException;
use Modules\Academic\Http\Requests\ProgramRequest;
use Modules\Academic\Models\Program;
use Modules\Core\Traits\FileTrait;

class ProgramModelRepository implements ProgramRepository
{

    use FileTrait;

    private string $uploadPath = 'programs';

    public function paginate(array $columns = ['*']): LengthAwarePaginator
    {
        return Program::with(['levels', 'universities'])->latest()->select($columns)->paginate(Config::get('core.page_size'));
    }

    /**
     * @throws JsonException
     */
    public function store(ProgramRequest $request): bool
    {
        if ($request->has('img')) {
            $path = $this->upload($request->file('img'), $this->uploadPath);
        } else {
            session()->flash('error', __('The Image Is Required'));
            return false;
        }
        $request->merge([
            'image' => $path,
            'lang' => json_encode($request->input('lang'), JSON_THROW_ON_ERROR)
        ]);

        try {
            $program = Program::create($request->all());
            $program->levels()->attach($request->input('level'));
            return true;
        } catch (Exception $exception) {
            session()->flash('error', $exception->getMessage());
        }
        return false;
    }

    public function update(ProgramRequest $request, Program $program): bool
    {
        if ($request->has('img')) {
            $path = $this->upload($request->file('img'), $this->uploadPath, old: $program->image);
            $request->merge([
                'image' => $path,
            ]);
        }
        $request->merge([
            'lang' => json_encode($request->input('lang'), JSON_THROW_ON_ERROR)
        ]);
        try {
            $program->update($request->all());
            $program->levels()->sync($request->input('level'));
            return true;
        } catch (Exception $exception) {
            session()->flash('error', $exception->getMessage());
        }
        return false;
    }

    public function deleteMulti(array $ids): bool
    {
        try {
            $programs = Program::whereIn('id', $ids)->get();
            foreach ($programs as $program) {
                $program->levels()->detach();
                $program->delete();
                $this->deleteFile($program->image);
            }

            return true;
        } catch (Exception $exception) {
            session()->flash('error', $exception->getMessage());
        }
        return false;
    }
}
