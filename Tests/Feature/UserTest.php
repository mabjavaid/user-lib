<?php

namespace MaabJavaid\UserLib\Tests\Feature;

use MaabJavaid\UserLib\Tests\TestCase;

class UserTest extends TestCase
{
    public function testUserPaginationList(): void
    {
        $response = $this->getJson(route('requer-user.show', $this->preparePaginationRequestPayload()))
        ->assertOk();
    }
}
