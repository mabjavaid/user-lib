<?php

namespace MaabJavaid\UserLib\Tests;

use Illuminate\Foundation\Testing\WithFaker;
use Orchestra\Testbench\Concerns\WithWorkbench;
use Orchestra\Testbench\TestCase as Test;

class TestCase extends Test
{
    use WithFaker, WithWorkbench;

    public function prepareStoreRequestPayload(): array
    {
        return [
            'name' => $this->faker->name,
            'job' => $this->faker->jobTitle
        ];
    }

    public function preparePaginationRequestPayload(): array
    {
        return [
            'requer_user' => 1
        ];
    }

    public function paginatedUserListPayload(): array
    {
        $userData = [];
        for ($userCount = 0; $userCount < 5; $userCount++) {
            $userData[$userCount] = $this->singleUserPayload();
        }

        return [
            'id'          => $this->faker->numberBetween(1, 20),
            'per_page'    => $this->faker->numberBetween(1, 20),
            'total'       => $this->faker->numberBetween(1, 20),
            'total_pages' => $this->faker->numberBetween(1, 20),
            'data'        => $userData
        ];
    }

    public function singleUserPayload(): array
    {
        return [
            'id'         => $this->faker->numberBetween(1, 20),
            'email'      => $this->faker->email,
            'first_name' => $this->faker->firstName(),
            'last_name'  => $this->faker->lastName(),
            'avatar'     => $this->faker->url
        ];
    }
}
