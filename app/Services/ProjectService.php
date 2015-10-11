<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 08/08/15
 * Time: 15:38
 */

namespace WideProject\Services;


use Prettus\Validator\Exceptions\ValidatorException;
use WideProject\Repositories\ProjectMemberRepository;
use WideProject\Repositories\ProjectRepository;
use WideProject\Validators\ProjectValidator;

/**
 * Class ProjectService
 * @package WideProject\Services
 */
class ProjectService
{

    /**
     * @var ProjectRepository
     */
    protected $repository;

    /**
     * @var ProjectValidator
     */
    protected $validator;

    /**
     * @var ProjectMemberRepository
     */
    private $member;

    /**
     * @param ProjectRepository $repository
     * @param ProjectMemberRepository $member
     * @param ProjectValidator $validator
     */
    public function __construct(ProjectRepository $repository, ProjectMemberRepository $member, ProjectValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->member = $member;
    }

    /**
     * @param array $data
     * @return array|mixed
     */
    public function create(array $data)
    {
        try {
            $this->validator->with($data)->passesOrFail();
            return $this->repository->create($data);

        } catch (ValidatorException $e) {
            return [
                'error' => true,
                'message' => $e->getMessageBag()
            ];
        }
    }

    /**
     * @param array $data
     * @param $id
     * @return array|mixed
     */
    public function update(array $data, $id)
    {
        try {
            $this->validator->with($data)->passesOrFail();
            return $this->repository->update($data, $id);

        } catch (ValidatorException $e) {
            return [
                'error' => true,
                'message' => $e->getMessageBag()
            ];
        }
    }

    /**
     * @param $projectId
     * @param $memberId
     * @return mixed
     */
    public function addMember($projectId, $memberId)
    {
        if($this->isMember($projectId, $memberId)){
            return false;
        }
        return $this->member->create(['project_id' => $projectId, 'member_id' => $memberId]);
    }

    /**
     * @param $projectId
     * @param $memberId
     * @return mixed
     */
    public function removeMember($projectId, $memberId)
    {
        return $this->member->removeMember($projectId, $memberId);
    }

    /**
     * @param $projectId
     * @param $memberId
     * @return true or false
     */
    public function isMember($projectId, $memberId)
    {
        return $this->member->isMember($projectId, $memberId);
    }

    /**
     * @param $projectId
     * @param $userId
     * @return true or false
     */
    public function isOwner($projectId, $userId)
    {
        return $this->repository->isOwner($projectId, $userId);
    }

}