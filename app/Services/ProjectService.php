<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 08/08/15
 * Time: 15:38
 */

namespace WideProject\Services;


use Prettus\Validator\Exceptions\ValidatorException;
use WideProject\Repositories\ProjectRepository;
use WideProject\Validators\ProjectValidator;

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

    public function __construct(ProjectRepository $repository, ProjectValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function create(array $data)
    {
        try {
            $this->validator->with($data)->passesOrFail();
            return $this->repository->create($data);

        } catch(ValidatorException $e) {
            return [
                'error' => true,
                'message' => $e->getMessageBag()
            ];
        }
    }

    public function update(array $data, $id)
    {
        try {
            $this->validator->with($data)->passesOrFail();
            return $this->repository->update($data, $id);

        } catch(ValidatorException $e) {
            return [
                'error' => true,
                'message' => $e->getMessageBag()
            ];
        }
    }

}