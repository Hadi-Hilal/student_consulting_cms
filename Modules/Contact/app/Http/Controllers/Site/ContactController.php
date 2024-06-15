<?php

namespace Modules\Contact\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Log;
use Modules\Contact\Http\Requests\ContactRequest;
use Modules\Contact\Models\Contact;
use Modules\Settings\Models\Settings;

class ContactController extends Controller
{
    public function index()
    {
        $settings = Settings::pluck('value', 'key');
        return view('contact::site.index', compact('settings'));

    }

    public function store(ContactRequest $request)
    {
        $request->merge([
            'ip' => $request->getClientIp()
        ]);
        try {
            Contact::create($request->all());
            $this->flushMessage(true);
        } catch (Exception $exception) {
            Log::error($exception->getMessage());
            $this->flushMessage(false);
        }
        return back();
    }
}
