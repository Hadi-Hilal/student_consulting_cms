<?php

namespace Modules\Academic\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Academic\Http\Requests\ProgramRequest;
use Modules\Academic\Models\Level;
use Modules\Academic\Models\Program;
use Modules\Academic\Repositories\ProgramRepository;

class ProgramController extends Controller
{
    public function __construct(protected ProgramRepository $repository)
    {
        $this->setActive('academic');
        $this->setActive('programs');
        $user = Auth::user();
        $this->checkPerm($user, 'Manage Academic');
    }

    public function index()
    {
        $programs = $this->repository->paginate();
        return view('academic::admin.programs.index', compact('programs'));
    }

    public function store(ProgramRequest $request)
    {
        $this->flushMessage($this->repository->store($request));
        return redirect()->to(route('admin.programs.index'));
    }

    public function create()
    {
        $levels = Level::all();
        return view('academic::admin.programs.create', compact('levels'));
    }

    public function edit(Program $program)
    {
        $levels = Level::all();
        return view('academic::admin.programs.edit', compact('program', 'levels'));
    }


    public function update(ProgramRequest $request, Program $program)
    {
        $this->flushMessage($this->repository->update($request, $program));
        return redirect()->to(route('admin.programs.index'));
    }


    public function deleteMulti(Request $request)
    {
        $ids = $request['ids'];
        $this->flushMessage($this->repository->deleteMulti($ids));
        return redirect()->to(route('admin.programs.index'));
    }
}
