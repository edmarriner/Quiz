<?php

namespace Tests;

use App\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Laravel\Passport\Passport;

abstract class TestCase extends BaseTestCase
{

    use CreatesApplication;

    protected function authenticate($scopes = []){
        Passport::actingAs(User::factory()->create(), $scopes);
    }
}
