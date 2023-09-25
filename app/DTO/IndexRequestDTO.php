<?php

namespace App\DTO;

use Spatie\DataTransferObject\DataTransferObject;

class IndexRequestDTO extends DataTransferObject
{
    /**
     * @var string|null
     */
    public ?string $status;

    /**
     * @var string|null
     */
    public ?string $created_at;

    /**
     * @var int
     */
    public int $page;

    /**
     * @var int
     */
    public int $per_page;
}
