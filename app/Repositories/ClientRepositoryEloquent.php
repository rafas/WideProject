<?php
/**
 * Created by PhpStorm.
 * User: rafael
 * Date: 08/08/15
 * Time: 08:53
 */

namespace WideProject\Repositories;


use Prettus\Repository\Eloquent\BaseRepository;
use WideProject\Entities\Client;

class ClientRepositoryEloquent extends BaseRepository implements ClientRepository
{

    public function model()
    {
        return Client::class;
    }

}