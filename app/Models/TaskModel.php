<?php

namespace App\Models;

class TaskModel extends \CodeIgniter\Model
{
    protected $table = 'task';

    protected $allowedFields = ['title', 'description', 'content', 'user_id'];

    protected $returnType = 'App\Entities\Task';

    protected $useTimestamps = true;

    protected $validationRules = [
        'title' => 'required',
        'description' => 'required',
        'content' => 'required',
        'user_id' => 'required',
    ];

    protected $validationMessages = [
        'description' => [
            'required' => 'Please enter a description',
        ],
    ];

    public function search($term)
    {
        if ($term === null) {

            return [];
        }

        return $this->select('id, title')
            ->like('title', $term)
            ->get()
            ->getResultArray();
    }
}
