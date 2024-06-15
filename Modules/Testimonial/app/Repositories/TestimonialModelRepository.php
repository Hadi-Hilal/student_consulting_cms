<?php

namespace Modules\Testimonial\Repositories;

use Exception;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Config;
use Modules\Core\Traits\FileTrait;
use Modules\Testimonial\Http\Requests\TestimonialRequest;
use Modules\Testimonial\Models\Testimonial;


class TestimonialModelRepository implements TestimonialRepository
{

    use FileTrait;

    private string $testimonialUploadPath = 'testimonials';

    public function paginate(array $columns = ['*']): LengthAwarePaginator
    {
        return Testimonial::latest()->select($columns)->paginate(Config::get('core.page_size'));
    }

    public function store(TestimonialRequest $request): bool
    {
        if ($request->has('img')) {
            $path = $this->upload($request->file('img'), $this->testimonialUploadPath);
        } else {
            session()->flash('error', __('The Image Is Required'));
            return false;
        }
        $request->merge([
            'avatar' => $path,
            'publish' => $request->has('publish') ? 'published' : 'archived',
        ]);
        try {
            Testimonial::create($request->all());
            cache()->forget('testimonials');
            return true;
        } catch (Exception $exception) {
            session()->flash('error', $exception->getMessage());
        }
        return false;
    }

    public function update(TestimonialRequest $request, Testimonial $testimonial): bool
    {
        if ($request->has('img')) {
            $path = $this->upload($request->file('img'), $this->testimonialUploadPath, old: $testimonial->avatar);
            $request->merge([
                'avatar' => $path,
            ]);
        }
        $request->merge([
            'publish' => $request->has('publish') ? 'published' : 'archived',
        ]);
        try {
            $testimonial->update($request->all());
            cache()->forget('testimonials');
            return true;
        } catch (Exception $exception) {
            session()->flash('error', $exception->getMessage());
        }
        return false;
    }

    public function deleteMulti(array $ids): bool
    {
        try {
            $testimonialsImages = Testimonial::whereIn('id', $ids)->pluck('avatar')->toArray();
            Testimonial::destroy($ids);
            $this->deleteFile($testimonialsImages);
            cache()->forget('testimonials');
            return true;
        } catch (Exception $exception) {
            session()->flash('error', $exception->getMessage());
        }
        return false;
    }

}
