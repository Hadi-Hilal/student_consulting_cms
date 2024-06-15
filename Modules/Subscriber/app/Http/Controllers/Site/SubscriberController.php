<?php

namespace Modules\Subscriber\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Modules\Subscriber\Models\Subscriber;

class SubscriberController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribers,email'
        ]);
        $request->merge([
            'ip' => $request->getClientIp(),
            'lang' => app()->getLocale(),
        ]);
        try {
            Subscriber::create($request->all());
            $this->flushMessage(true, __('Thanks For Subscription'));
        } catch (Exception $exception) {
            Log::error($exception->getMessage());
            $this->flushMessage(false);
        }
        return back();
    }
}
