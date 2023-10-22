<?php

namespace MaabJavaid\UserLib\Http\Controllers\Api\V1;

//use Illuminate\Routing\Controller;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use MaabJavaid\UserLib\Facades\ReqresClient;
use MaabJavaid\UserLib\Http\Requests\Reqres\IndexRequest;
use MaabJavaid\UserLib\Http\Requests\Reqres\StoreRequest;

class UserController extends Controller
{
    public function index(IndexRequest $request): JsonResponse
    {
        return response()->json(ReqresClient::getPaginatedListOfUsers($request->validated()));
    }

    public function show(int $reqresUserId): JsonResponse
    {
        return response()->json(ReqresClient::getUserById($reqresUserId));
    }

    public function store(StoreRequest $request): JsonResponse
    {
        return response()->json(ReqresClient::createUser($request->validated()));
    }
}
