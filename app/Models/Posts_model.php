<?php

namespace App\Models;
use CodeIgniter\Model;

class Posts_model extends Model 
{
    protected $table = 'posts';
    protected $primary_key = 'id';

    protected $return_type = 'array';
    protected $useSofDeletes = true;

    //campos permitidos para insert
    protected $allowedFields = [
        "banner",
        "title",
        "slug",
        "intro",
        "content",
        "category",
        "tags",
        "created_at",
        "created_by"
    ];

}