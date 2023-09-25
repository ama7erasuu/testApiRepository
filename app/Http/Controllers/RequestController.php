<?php

namespace App\Http\Controllers;

use App\DTO\CreateRequestDTO;
use App\DTO\IndexRequestDTO;
use App\DTO\UpdateRequestDTO;
use App\Http\Requests\CreateRequest;
use App\Http\Requests\IndexRequest;
use App\Http\Requests\UpdateRequest;
use App\Services\RequestService;
use Illuminate\Http\JsonResponse;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class RequestController extends Controller
{
    /**
     * @param RequestService $requestService
     */
    public function __construct(
        protected RequestService $requestService
    ){
    }

    /**
     * @param IndexRequest $request
     * @return JsonResponse
     * @throws UnknownProperties
     */
    public function index(IndexRequest $request): JsonResponse
    {
        $data = new IndexRequestDTO($request->validated());
        $requests = $this->requestService->getData($data);
        return response()->json($requests);
    }

    /**
     * @param CreateRequest $request
     * @return JsonResponse
     * @throws UnknownProperties
     */
    public function save(CreateRequest $request): JsonResponse
    {
        $data = new CreateRequestDTO($request->validated());
        $newRequest = $this->requestService->create($data);
        return response()->json($newRequest, 201);
    }

    /**
     * @param UpdateRequest $request
     * @return JsonResponse
     * @throws UnknownProperties
     */
    public function update(UpdateRequest $request): JsonResponse
    {
        $data = new UpdateRequestDTO($request->validated());
        $updatedRequest = $this->requestService->update($data);
        $this->requestService->sendMail($updatedRequest);
        return response()->json($updatedRequest);
    }
}
