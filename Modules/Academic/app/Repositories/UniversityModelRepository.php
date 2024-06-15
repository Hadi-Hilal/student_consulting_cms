<?php

namespace Modules\Academic\Repositories;

use Exception;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Config;
use JsonException;
use Modules\Academic\Http\Requests\UniversityRequest;
use Modules\Academic\Models\University;
use Modules\Core\Traits\FileTrait;

class UniversityModelRepository implements UniversityRepository
{

    use FileTrait;

    private string $uploadPath = 'universities';

    public function paginate(array $columns = ['*']): LengthAwarePaginator
    {
        return University::with('programs')->latest()->select($columns)->paginate(Config::get('core.page_size'));
    }

    /**
     * @throws JsonException
     */
    public function store(UniversityRequest $request): bool
    {
        if ($request->has('img')) {
            $imagePath = $this->upload($request->file('img'), $this->uploadPath);
        } else {
            session()->flash('error', __('The Image Is Required'));
            return false;
        }

        if ($request->has('ulogo')) {
            $logoPath = $this->upload($request->file('ulogo'), $this->uploadPath);
        } else {
            session()->flash('error', __('The Logo Is Required'));
            return false;
        }
        $keywordsInput = $request->input('keywords');
        $decodedData = json_decode($keywordsInput, true);
        $valuesArray = array_column($decodedData, 'value');
        $keywords = implode(', ', $valuesArray);
        $request->merge([
            'image' => $imagePath,
            'logo' => $logoPath,
            'keywords' => $keywords,
        ]);

        try {
            $university = University::create($request->all());
            $university->programs()->attach($request->input('program'));
            return true;
        } catch (Exception $exception) {
            session()->flash('error', $exception->getMessage());
        }
        return false;
    }

    public function update(UniversityRequest $request, University $university): bool
    {
        if ($request->has('img')) {
            $imagePath = $this->upload($request->file('img'), $this->uploadPath, old: $university->image);
            $request->merge([
                'image' => $imagePath,
            ]);
        }

        if ($request->has('ulogo')) {
            $logoPath = $this->upload($request->file('ulogo'), $this->uploadPath, old: $university->logo);
            $request->merge([
                'logo' => $logoPath,
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
            $university->update($request->all());
            $university->programs()->sync($request->input('program'));
            return true;
        } catch (Exception $exception) {
            session()->flash('error', $exception->getMessage());
        }
        return false;
    }

    public function deleteMulti(array $ids): bool
    {
        try {
            $universities = University::whereIn('id', $ids)->get();
            foreach ($universities as $university) {
                $university->programs()->detach();
                $university->delete();
                $this->deleteFile($university->image);
                $this->deleteFile($university->logo);
            }

            return true;
        } catch (Exception $exception) {
            session()->flash('error', $exception->getMessage());
        }
        return false;
    }
}
