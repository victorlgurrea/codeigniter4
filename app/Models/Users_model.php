<?php

namespace App\Models;
use CodeIgniter\Model;

class Users_model extends Model 
{
    protected $table = 'users';
    protected $primary_key = 'id';

    protected $return_type = 'array';
    protected $useSofDeletes = true;

    //campos permitidos para insert
    protected $allowedFields = [
        "name",
        "username",
        "password",
        "role",
        "last_login",
        "deleted"
    ];

}