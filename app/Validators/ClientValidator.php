<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 08/08/15
 * Time: 15:57
 */

namespace WideProject\Validators;


use Prettus\Validator\LaravelValidator;

class ClientValidator extends LaravelValidator
{

    protected $rules = [
        'name' => 'required|max:255',
        'responsible' => 'required|max:255',
        'email' => 'required|email',
        'phone' => 'required',
        'address' => 'required',
    ];

}