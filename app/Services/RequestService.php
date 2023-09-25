<?php

namespace App\Services;

use App\DTO\CreateRequestDTO;
use App\DTO\IndexRequestDTO;
use App\DTO\UpdateRequestDTO;
use App\Enums\RequestStatusesEnum;
use App\Jobs\RequestMailJob;
use App\Models\Request;

use App\Repositories\RequestRepository;
use Carbon\Carbon;

class RequestService
{
    /**
     * @param RequestRepository $requestRepository
     */
    public function __construct(
        protected RequestRepository $requestRepository
    ){
    }

    /**
     * @param CreateRequestDTO $data
     * @return Request
     */
    public function create(CreateRequestDTO $data): Request
    {
        $data->status = RequestStatusesEnum::Active;
        return $this->requestRepository->create($data);
    }

    /**
     * @param UpdateRequestDTO $data
     * @return Request
     */
    public function update(UpdateRequestDTO $data): Request
    {
        $data->status = RequestStatusesEnum::Resolved;
        return $this->requestRepository->update($data);
    }

    /**
     * @param IndexRequestDTO $data
     * @return mixed
     */
    public function getData(IndexRequestDTO $data): mixed
    {
        $created_at = null;
        if (!empty($data->created_at)) {
            $created_at = Carbon::createFromFormat('Y-m-d', $data->created_at);
        }
        return $this->requestRepository->getData($data, $created_at);
    }

    /**
     * @param Request $request
     * @return void
     */
    public function sendMail(Request $request): void
    {
        RequestMailJob::dispatch($request);
    }
}
