<?php

namespace Tests;

use Faker\Factory as Faker;

abstract class ApiTest extends TestCase
{
    protected $fake;

    function __construct()
    {
        $this->fake = Faker::create();

        parent::__construct();
    }

    protected function getJson($uri)
    {
        return json_encode($this->call('GET', $uri)->getContent());
    }
}
