<?php

namespace Modules\Faq\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Modules\Faq\Http\Requests\FaqRequest;
use Modules\Faq\Models\Faq;

class FaqController extends Controller
{
    public function __construct()
    {
        $this->setActive('faqs');
        $user = Auth::user();
        $this->checkPerm($user, 'Manage FAQs');
    }


    public function index()
    {
        $faqs = Faq::latest()->paginate($this->pageSize());
        return view('faq::admin.index', compact('faqs'));
    }

    public function store(FaqRequest $request): RedirectResponse
    {
        $request->merge([
            'publish' => $request->has('publish') ? 'published' : 'archived',
        ]);
        try {
            Faq::create($request->all());
            cache()->forget('faqs');
            $this->flushMessage(true);
        } catch (Exception $exception) {
            $this->flushMessage(false, $exception->getMessage());
            return redirect()->back()->withInput();
        }

        return redirect()->to(route('admin.faqs.index'));
    }

    public function create()
    {

        return view('faq::admin.create');
    }

    public function edit(Faq $faq)
    {
        return view('faq::admin.edit', compact('faq'));
    }

    public function update(FaqRequest $request, Faq $faq): RedirectResponse
    {
        $request->merge([
            'publish' => $request->has('publish') ? 'published' : 'archived',
        ]);
        try {
            $faq->update($request->all());
            $this->flushMessage(true);
            cache()->forget('faqs');
        } catch (Exception $exception) {
            $this->flushMessage(false, $exception->getMessage());
            return redirect()->back()->withInput();
        }
        return redirect()->to(route('admin.faqs.index'));
    }


    public function deleteMulti(): RedirectResponse
    {
        $ids = request()->input('ids');
        try {
            Faq::destroy($ids);
            $this->flushMessage(true);
            cache()->forget('faqs');
        } catch (Exception $exception) {
            $this->flushMessage(false, $exception->getMessage());
            return redirect()->back()->withInput();
        }
        return redirect()->to(route('admin.faqs.index'));
    }
}
