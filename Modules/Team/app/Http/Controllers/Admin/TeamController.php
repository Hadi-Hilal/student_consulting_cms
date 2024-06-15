<?php

namespace Modules\Team\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Team\Http\Requests\TeamRequest;
use Modules\Team\Models\Team;
use Modules\Team\Repositories\TeamRepository;

class TeamController extends Controller
{
    public function __construct(public TeamRepository $teamRepository)
    {
        $this->setActive('teams');
        $user = Auth::user();
        $this->checkPerm($user, 'Manage Teams');
    }

    public function index()
    {
        $teams = $this->teamRepository->paginate();
        return view('team::admin.index', compact('teams'));
    }

    public function store(TeamRequest $request)
    {
        $this->flushMessage($this->teamRepository->store($request));
        return redirect()->to(route('admin.teams.index'));
    }

    public function create()
    {
        return view('team::admin.create');
    }

    public function edit(Team $team)
    {
        return view('team::admin.edit', compact('team'));
    }


    public function update(TeamRequest $request, Team $team)
    {
        $this->flushMessage($this->teamRepository->update($request, $team));
        return redirect()->to(route('admin.teams.index'));
    }


    public function deleteMulti(Request $request)
    {
        $ids = $request['ids'];
        $this->flushMessage($this->teamRepository->deleteMulti($ids));
        return redirect()->to(route('admin.teams.index'));
    }
}
