<?php

namespace WideProject\Http\Controllers;

use Illuminate\Http\Request;
use WideProject\Repositories\ProjectRepository;
use WideProject\Services\ProjectService;


/**
 * Class ProjectController
 * @package WideProject\Http\Controllers
 */
class ProjectController extends Controller
{

    /**
     * @var ProjectRepository
     */
    private $repository;

    /**
     * @var ProjectService
     */
    private $service;

    /**
     * @param ProjectRepository $repository
     * @param ProjectService $service
     */
    public function __construct(ProjectRepository $repository, ProjectService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return $this->repository->with(['client', 'owner'])->all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        return $this->service->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        return $this->repository->with(['client', 'owner', 'notes', 'tasks'])->find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        return $this->service->update($request->all(), $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->repository->find($id)->delete();
    }

    /**
     * @param $projectId
     */
    public function getMembers($projectId)
    {
        return $this->repository->find($projectId)->members;
    }

    /**
     * @param $projectId
     * @param $memberId
     * @return mixed
     */
    public function addMember($projectId, $memberId)
    {
        if($new = $this->service->addMember($projectId, $memberId)) {
            return $new;
        }
        return ['success' => false];
    }

    /**
     * @param $projectId
     * @param $memberId
     * @return mixed
     */
    public function removeMember($projectId, $memberId)
    {
        if($this->service->removeMember($projectId, $memberId)) {
            return ['success' => true];
        }
        return ['success' => false];
    }

    /**
     * @param $projectId
     * @param $memberId
     * @return true
     */
    public function isMember($projectId, $memberId)
    {
        if ($this->service->isMember($projectId, $memberId)) {
            return ['success' => true];
        }
        return ['success' => false];
    }

    /**
     * @param $projectId
     * @param $userId
     * @return true
     */
    public function isOwner($projectId, $userId)
    {
        if ($this->service->isOwner($projectId, $userId)) {
            return ['success' => true];
        }
        return ['success' => false];
    }
}
