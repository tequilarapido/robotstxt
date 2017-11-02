<?php

namespace Tequilarapido\RobotsTxt\Tests;

use Illuminate\Support\Facades\File;
use Tequilarapido\RobotsTxt\RobotsTxt;
use Tequilarapido\RobotsTxt\RobotsTxtProvider;

class RobotsTxtTest extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return [RobotsTxtProvider::class];
    }

    /** @test */
    public function it_set_robots_txt_to_disallow_by_default()
    {
        $this->assertEquals(File::get(public_path('robots.txt')), config('robots_txt.disallow_all'));
    }

    /** @test */
    public function it_set_robots_txt_to_allow()
    {
        config()->set('robots_txt.status', 'allow_all');

        app(RobotsTxt::class)->init();

        $this->assertEquals(File::get(public_path('robots.txt')), config('robots_txt.allow_all'));
    }

    /** @test */
    public function it_set_robots_txt_to_custom()
    {
        config()->set('robots_txt.status', 'custom');
        config()->set('robots_txt.custom', "User-agent: *\nDisallow: /folder1/\nAllow: /folder1/myfile.html");

        app(RobotsTxt::class)->init();

        $this->assertEquals(File::get(public_path('robots.txt')), config('robots_txt.custom'));
    }

    /** @test */
    public function it_does_not_rewrite_content_of_robots_txt_if_status_does_not_change()
    {
        config()->set('robots_txt.status', 'allow_all');

        app(RobotsTxt::class)->init();

        $this->assertEquals(File::get(public_path('robots.txt')), config('robots_txt.allow_all'));

        $this->assertFalse(app(RobotsTxt::class)->init());
    }

}