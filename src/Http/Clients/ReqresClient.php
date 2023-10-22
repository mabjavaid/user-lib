<?php

namespace MaabJavaid\UserLib\Http;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use MaabJavaid\UserLib\DTO\PaginatedUser;
use MaabJavaid\UserLib\DTO\User;
use Symfony\Component\HttpFoundation\Response;

class ReqresClient
{
    public function getUserById(int $userId): array
    {
        $url =  config('user-lib.services.url') . 'users/' . $userId;

        $response = Http::asJson()
            ->timeout(config('user-lib.services.request-timeout'))
            ->get($url);

        Log::info('Reqres client response for single user list GET request', compact('url') + [
                'responseStatus' => $response->status()
            ]);

        $response->throwUnlessStatus(Response::HTTP_OK);
        $payload = $response->json();

        $userDataTransferObject = new User(
            data_get($payload, 'data.id'),
            data_get($payload, 'data.email'),
            data_get($payload, 'data.first_name'),
            data_get($payload, 'data.last_name'),
            data_get($payload, 'data.avatar')
        );

        return $userDataTransferObject->toArray();
    }

    public function getPaginatedListOfUsers(array $payload): array
    {
        $url =  config('user-lib.services.url') . 'users?page=' . data_get($payload, 'pageNumber');

        $response = Http::asJson()
            ->timeout(config('user-lib.services.request-timeout'))
            ->get($url);

        Log::info('Reqres client response for paginated user list GET request', compact('url') + [
                'responseStatus' => $response->status()
            ]);

        $response->throwUnlessStatus(Response::HTTP_OK);
        $responsePayload = $response->json();

        $userDataTransferObject = new PaginatedUser(
            data_get($responsePayload, 'page'),
            data_get($responsePayload, 'per_page'),
            data_get($responsePayload, 'total'),
            data_get($responsePayload, 'total_pages'),
            data_get($responsePayload, 'data')
        );

        return $userDataTransferObject->toArray();
    }

    public function createUser(array $payload): int
    {
        $url =  config('user-lib.services.url') . 'users';

        $response = Http::asJson()
            ->timeout(config('user-lib.services.request-timeout'))
            ->post($url, $payload);

        Log::info('Reqres client response for user creation POST request', compact('url') + [
                'responseStatus' => $response->status()
            ]);

        $response->throwUnlessStatus(Response::HTTP_CREATED);

        return data_get($response->json(), 'id');
    }
}
