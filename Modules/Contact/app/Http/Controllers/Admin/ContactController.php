<?php

namespace Modules\Contact\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Contact\Exports\ContactExport;
use Modules\Contact\Models\Contact;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->setActive('contacts');
        $user = Auth::user();
        $this->checkPerm($user, 'Manage Contacts');
    }

    public function index()
    {
        $contacts = Contact::latest()->paginate($this->pageSize());
        return view('contact::admin.index', compact('contacts'));
    }

    public function export()
    {
        return Excel::download(new ContactExport, '#contacts.xlsx');
    }

    public function deleteMulti(Request $request)
    {
        $ids = $request->input('ids');
        Contact::destroy($ids);
        session()->flash('success', __('Contacts Deleted Successfully'));
        return redirect()->back();
    }
}
