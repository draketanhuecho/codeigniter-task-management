<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table         = 'tasks';
    protected $primaryKey    = 'id';
    protected $allowedFields = ['title', 'task_date', 'status', 'is_archived'];

    public function getActiveTasks()
    {
        return $this->where('is_archived', 0)->findAll();
    }
}