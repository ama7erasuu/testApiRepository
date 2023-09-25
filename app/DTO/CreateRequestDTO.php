<?php

namespace App\DTO;

use App\Enums\RequestStatusesEnum;
use Spatie\DataTransferObject\DataTransferObject;

class CreateRequestDTO extends DataTransferObject
{
    /**
     * @var string
     */
    public string $name;

    /**
     * @var string
     */
    public string $email;

    /**
     * @var string
     */
    public string $message;

    /**
     * @var RequestStatusesEnum|null
     */
    public ?RequestStatusesEnum $status;
}
