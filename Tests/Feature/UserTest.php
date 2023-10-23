<?php

namespace MaabJavaid\UserLib\Tests\Feature;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Http;
use MaabJavaid\UserLib\Tests\TestCase;

class UserTest extends TestCase
{
    public function testSuccessfulUserPaginationList(): void
    {
        Http::fake([
            config('user-lib.services.url') . 'users/*' => Http::response($this->paginatedUserListPayload(), Response::HTTP_OK),
        ]);

        $this->getJson(route('requer-user.index', $this->preparePaginationRequestPayload()))
            ->assertOk();
    }

    public function testSuccessfulFetchSingleUser(): void
    {
        $mockPayload = [];
        $mockPayload['data'] = $this->singleUserPayload();
        Http::fake([
            config('user-lib.services.url') . 'users/*' => Http::response($mockPayload, Response::HTTP_OK),
        ]);

        $this->getJson(route('requer-user.show', ['requer_user' => 1]))
            ->assertOk();
    }

    public function testSuccessfulCreatedAUser(): void
    {
        $mockPayload = [
            'name'      => $this->faker->name,
            'job'       => $this->faker->jobTitle,
            'id'        => $this->faker->numberBetween(1, 20),
            'createdAt' => today()
        ];

        Http::fake([
            config('user-lib.services.url') . 'users/*' => Http::response($mockPayload, Response::HTTP_CREATED),
        ]);

        $this->postJson(route('requer-user.store', $this->prepareStoreRequestPayload()))
            ->assertOk();
    }
}
