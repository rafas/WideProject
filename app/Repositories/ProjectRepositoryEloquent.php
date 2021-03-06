<?php

namespace WideProject\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use WideProject\Entities\Project;

/**
 * Class ProjectRepositoryEloquent
 * @package namespace WideProject\Repositories;
 */
class ProjectRepositoryEloquent extends BaseRepository implements ProjectRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Project::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria( app(RequestCriteria::class) );
    }

    /**
     * @param $id
     * @param $userId
     * @return mixed
     */
    public function isOwner($id, $userId)
    {
        return $this->findWhere(['id'=>$id, 'owner_id'=>$userId])->count() ? true : false;
    }
}