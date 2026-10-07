<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $table = 'customers';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'full_name',
        'email'
    ];

    protected $returnType = 'array';

    protected $useTimestamps = false;
}