<?php

namespace App\Models;
use CodeIgniter\Model;

class Comments_model extends Model 
{
    protected $table = 'comments';
    protected $primary_key = 'id';

    protected $return_type = 'array';
    protected $useSofDeletes = true;

    //campos permitidos para insert
    protected $allowedFields = [
        "post_id",
        "name",
        "email",
        "comment",
        "date"
    ];

}