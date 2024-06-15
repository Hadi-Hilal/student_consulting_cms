<?php

namespace Modules\FileManger\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FileMangerController extends Controller
{
    public function __construct()
    {
        $this->setActive('FileManager');
        $user = Auth::user();
        $this->checkPerm($user, 'Manage FileManager');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('filemanger::admin.index');
    }

}
