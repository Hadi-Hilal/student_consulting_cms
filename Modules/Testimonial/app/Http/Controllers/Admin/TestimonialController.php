<?php

namespace Modules\Testimonial\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Testimonial\Http\Requests\TestimonialRequest;
use Modules\Testimonial\Models\Testimonial;
use Modules\Testimonial\Repositories\TestimonialRepository;

class TestimonialController extends Controller
{
    public function __construct(public TestimonialRepository $testimonialRepository)
    {
        $this->setActive('testimonials');
        $user = Auth::user();
        $this->checkPerm($user, 'Manage Testimonials');
    }

    public function index()
    {
        $testimonials = $this->testimonialRepository->paginate();
        return view('testimonial::admin.index', compact('testimonials'));
    }

    public function store(TestimonialRequest $request)
    {
        $this->flushMessage($this->testimonialRepository->store($request));
        return redirect()->to(route('admin.testimonials.index'));
    }

    public function create()
    {
        return view('testimonial::admin.create');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('testimonial::admin.edit', compact('testimonial'));
    }


    public function update(TestimonialRequest $request, Testimonial $testimonial)
    {
        $this->flushMessage($this->testimonialRepository->update($request, $testimonial));
        return redirect()->to(route('admin.testimonials.index'));
    }


    public function deleteMulti(Request $request)
    {
        $ids = $request['ids'];
        $this->flushMessage($this->testimonialRepository->deleteMulti($ids));
        return redirect()->to(route('admin.testimonials.index'));
    }
}
