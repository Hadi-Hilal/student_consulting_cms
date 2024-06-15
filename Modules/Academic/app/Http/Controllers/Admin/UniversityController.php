<?php

namespace Modules\Academic\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Academic\Exports\UniversityExport;
use Modules\Academic\Http\Requests\UniversityRequest;
use Modules\Academic\Models\Program;
use Modules\Academic\Models\University;
use Modules\Academic\Repositories\UniversityRepository;

class UniversityController extends Controller
{
    public function __construct(protected UniversityRepository $repository)
    {
        $this->setActive('academic');
        $this->setActive('universities');
        $user = Auth::user();
        $this->checkPerm($user, 'Manage Academic');
    }

    public function index()
    {
        $universities = $this->repository->paginate();
        return view('academic::admin.universities.index', compact('universities'));
    }

    public function store(UniversityRequest $request)
    {
        $this->flushMessage($this->repository->store($request));
        return redirect()->to(route('admin.universities.index'));
    }

    public function create()
    {
        $programs = Program::all();
        return view('academic::admin.universities.create', compact('programs'));
    }

    public function edit(University $university)
    {
        $programs = Program::all();
        return view('academic::admin.universities.edit', compact('university', 'programs'));
    }


    public function update(UniversityRequest $request, University $university)
    {
        $this->flushMessage($this->repository->update($request, $university));
        return redirect()->to(route('admin.universities.index'));
    }


    public function deleteMulti(Request $request)
    {
        $ids = $request['ids'];
        $this->flushMessage($this->repository->deleteMulti($ids));
        return redirect()->to(route('admin.universities.index'));
    }

    public function export()
    {
        return Excel::download(new UniversityExport(), '#universities.xlsx');
    }
}
