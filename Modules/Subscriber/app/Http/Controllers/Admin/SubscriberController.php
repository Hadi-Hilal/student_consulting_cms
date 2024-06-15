<?php

namespace Modules\Subscriber\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Subscriber\Exports\SubscriberExport;
use Modules\Subscriber\Imports\SubscriberImport;
use Modules\Subscriber\Models\Subscriber;

class SubscriberController extends Controller
{
    public function __construct()
    {
        $this->setActive('subscribers');
        $user = Auth::user();
        $this->checkPerm($user, 'Manage Subscribers');
    }

    public function index()
    {
        $subscribers = Subscriber::paginate($this->pageSize());
        return view('subscriber::admin.index', compact('subscribers'));
    }

    public function export()
    {
        return Excel::download(new SubscriberExport, '#subscribers.xlsx');
    }

    public function import(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|mimes:csv,xlsx,xls',
        ]);
        $file = $request->file('excel_file');
        Excel::import(new SubscriberImport(), $file);
        session()->flash('success', __('Subscribers Excel file has been imported successfully'));
        return redirect()->back();
    }

    public function deleteMulti(Request $request)
    {
        $ids = $request->input('ids');
        Subscriber::destroy($ids);
        session()->flash('success', __('Subscribers Deleted Successfully'));
        return redirect()->back();
    }

}
