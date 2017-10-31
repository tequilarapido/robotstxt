<?php

namespace Robots;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;

class RobotsTxt
{
    public function init()
    {
        $status = config('robots_txt.status');

        if ($this->getStatus() === $status) {
            return false;
        }

        File::put(public_path('robots.txt'), config('robots_txt.'.$status));

        return $this->setStatus($status);
    }

    protected function getStatus()
    {
        return Cache::get('robots_status');
    }

    protected function setStatus($status)
    {
        return Cache::forever('robots_status', $status);
    }
}
