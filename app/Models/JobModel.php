<?php

namespace App\Models;

use CodeIgniter\Model;

class JobModel extends Model
{
    protected $table = 'jobs';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'title','company','location','description','url','source','posted_at'
    ];

    public function getLatestJobs()
    {
        return $this->orderBy('created_at', 'DESC')->findAll();
    }

    public function searchJobs($keyword)
    {
        return $this->like('title', $keyword)
                    ->orLike('company', $keyword)
                    ->findAll();
    }

    public function getJobDetail($id)
    {
        return $this->find($id);
    }

    public function insertIfNotExists($data)
    {
        if (!$this->where('url', $data['url'])->first()) {
            return $this->insert($data);
        }
    }
}