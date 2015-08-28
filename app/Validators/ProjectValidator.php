<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 08/08/15
 * Time: 15:57
 */

namespace WideProject\Validators;


use Prettus\Validator\LaravelValidator;

class ProjectValidator extends LaravelValidator
{

    protected $rules = [
        'owner_id' => 'required|integer',
        'client_id' => 'required|integer',
        'name' => 'required',
        'description' => 'required',
        'progress' => 'required',
        'status' => 'required',
        'due_date' => 'required|date',
    ];

}