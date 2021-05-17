<?php

namespace App\Models;
use CodeIgniter\Model;

class Categories_model extends Model 
{
    protected $table = 'categories';
    protected $primary_key = 'id';

    protected $return_type = 'array';
    protected $useSofDeletes = true;

    //campos permitidos para insert
    protected $allowedFields = [
        "name",
    ];

}