<?php

namespace App\DTO;

use App\Enums\RequestStatusesEnum;
use Spatie\DataTransferObject\DataTransferObject;

class UpdateRequestDTO extends DataTransferObject
{
    /**
     * @var int
     */
    public int $id;

    /**
     * @var string
     */
    public string $comment;

    /**
     * @var RequestStatusesEnum|null
     */
    public ?RequestStatusesEnum $status;

}
