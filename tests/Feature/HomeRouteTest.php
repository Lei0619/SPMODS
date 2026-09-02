<?php

namespace Tests\Feature;

use Inertia\Testing\AssertableInertia as Assert;
use Tests\TestCase;

class HomeRouteTest extends TestCase
{
    public function test_guest_home_page_has_safe_auth_payload()
    {
        $response = $this->get(route('home'));

        $response->assertOk();
        $response->assertInertia(fn (Assert $page) => $page
            ->component('welcome')
            ->where('auth', fn ($auth) => $auth === null || ! isset($auth['user']) || $auth['user'] === null)
        );
    }
}
