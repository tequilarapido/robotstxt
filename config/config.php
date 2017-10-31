<?php

return [
    // allow_all, disallow_all, custom
    'status' => env('ROBOTS_TXT', 'disallow_all'),

    'allow_all' => 'User-agent: *',
    'disallow_all' => "User-agent: *\nDisallow: /",
    'custom' => env('ROBOTS_TXT_CUSTOM', '')
];