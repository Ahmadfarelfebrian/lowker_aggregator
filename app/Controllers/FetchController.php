<?php

namespace App\Controllers;

use App\Models\JobModel;

class FetchController extends BaseController
{
    public function index()
    {
        $sources = [
            [
                'name' => 'RemoteOK',
                'url' => 'https://remoteok.com/remote-dev-jobs.rss'
            ],
            [
                'name' => 'WeWorkRemotely',
                'url' => 'https://weworkremotely.com/remote-jobs.rss'
            ]
        ];

        $model = new JobModel();

        foreach ($sources as $src) {

            libxml_use_internal_errors(true);
            $rss = simplexml_load_file($src['url']);

            if (!$rss) continue;

            foreach ($rss->channel->item as $item) {

                $url = (string) $item->link;

                // 🔥 SKIP kalau link tidak valid
                if (empty($url) || strpos($url, 'example.com') !== false) {
                    continue;
                }

                $data = [
                    'title'       => (string) $item->title,
                    'company'     => $src['name'],
                    'location'    => 'Remote',
                    'description' => (string) $item->description,
                    'url'         => $url,
                    'source'      => $src['name'],
                    'posted_at'   => date('Y-m-d H:i:s', strtotime($item->pubDate))
                ];

                $model->insert($data);
            }
        }

        return "Fetch sukses!";
    }
    
}