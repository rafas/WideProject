<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 08/08/15
 * Time: 15:57
 */

namespace WideProject\Validators;


use Prettus\Validator\LaravelValidator;

class ProjectNoteValidator extends LaravelValidator
{

    protected $rules = [
        'project_id' => 'required|integer',
        'title' => 'required',
        'note' => 'required',
    ];

}