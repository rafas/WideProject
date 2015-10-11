<?php

namespace WideProject\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use WideProject\Entities\ProjectMember;

/**
 * Class ProjectMemberRepositoryEloquent
 * @package namespace WideProject\Repositories;
 */
class ProjectMemberRepositoryEloquent extends BaseRepository implements ProjectMemberRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProjectMember::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria( app(RequestCriteria::class) );
    }

    /**
     * @param $projectId
     * @param $memberId
     * @return mixed
     */
    public function removeMember($projectId, $memberId)
    {
        if($this->model->where(['project_id' => $projectId, 'member_id' => $memberId])->delete()){
            return true;
        }
        return false;
    }

    /**
     * @param $projectId
     * @param $memberId
     * @return true or false
     */
    public function isMember($projectId, $memberId)
    {
        return $this->findWhere(['project_id' => $projectId, 'member_id' => $memberId])->count() ? true : false;
    }
}