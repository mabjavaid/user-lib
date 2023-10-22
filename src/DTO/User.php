<?php

namespace MaabJavaid\UserLib\DTO;

use JsonSerializable;

class User implements JsonSerializable
{
    public function __construct(
        public int $id,
        public string $email,
        public string $firstName,
        public string $lastName,
        public string $avatar
    )
    {
    }

    public function jsonSerialize(): array
    {
        return [
            'id'         => $this->id,
            'email'      => $this->email,
            'first_name' => $this->firstName,
            'last_name'  => $this->lastName,
            'avatar'     => $this->avatar
        ];
    }

    public function toArray(): array
    {
        return $this->jsonSerialize();
    }
}
