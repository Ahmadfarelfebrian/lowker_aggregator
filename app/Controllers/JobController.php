<?php

namespace App\Controllers;

use App\Models\JobModel;

class JobController extends BaseController
{
    public function index()
    {
        $model = new JobModel();

        $keyword = $this->request->getGet('q');

        if ($keyword) {
            $data['jobs'] = $model->searchJobs($keyword);
        } else {
            $data['jobs'] = $model->getLatestJobs();
        }

        return view('jobs/index', $data);
    }

    public function detail($id)
    {
        $model = new JobModel();
        $data['job'] = $model->getJobDetail($id);

        return view('jobs/detail', $data);
    }
}