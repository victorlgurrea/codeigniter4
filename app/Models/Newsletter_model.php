<?php

namespace App\Models;
use CodeIgniter\Model;

class Newsletter_model extends Model 
{
    protected $table = 'newsletter';
    protected $primary_key = 'id';

    protected $return_type = 'array';
    protected $useSofDeletes = true;

    //campos permitidos para insert
    protected $allowedFields = [
        "email",
        "added_at"
    ];

}