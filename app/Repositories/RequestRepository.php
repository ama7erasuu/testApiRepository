<?php

namespace App\Repositories;

use App\DTO\CreateRequestDTO;
use App\DTO\IndexRequestDTO;
use App\DTO\UpdateRequestDTO;
use App\Models\Request;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;


class RequestRepository
{
    /**
     * Create new request
     * @param CreateRequestDTO $data
     * @return Request
     */
    public function create(CreateRequestDTO $data): Request
    {
        return Request::create($data->all());
    }

    /**
     * Update Request
     * @param UpdateRequestDTO $data
     * @return Request
     */
    public function update(UpdateRequestDTO $data): Request
    {
        $requestModel = Request::find($data->id);
        $requestModel->update($data->except('id')->toArray());
        return $requestModel;
    }

    /**
     * @param IndexRequestDTO $data
     * @param Carbon|null $created_at
     * @return Request
     */
    public function getData(IndexRequestDTO $data, ?Carbon $created_at): mixed
    {
        return Request::when($data->status, function (Builder $query, string $status) {
            $query->where('status', $status);
        })
            ->when($created_at, function (Builder $query, string $created_at) {
                $query->where('created_at', '<', $created_at);
            })
            ->paginate($data->per_page, ['*'], 'page', $data->page);
    }
}
