<?php

namespace MaabJavaid\UserLib\DTO;

use JsonSerializable;

class PaginatedUser implements JsonSerializable
{
    public function __construct(
        public int $page,
        public string $perPage,
        public string $total,
        public string $totalPages,
        public array $data
    )
    {
    }

    public function jsonSerialize(): array
    {
        return [
            'page'        => $this->page,
            'per_page'    => $this->perPage,
            'total'       => $this->total,
            'total_pages' => $this->totalPages,
            'data'        => $this->data,
        ];
    }

    public function toArray(): array
    {
        return $this->jsonSerialize();
    }
}
