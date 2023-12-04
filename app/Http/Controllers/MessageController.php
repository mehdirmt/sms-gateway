<?php

namespace App\Http\Controllers;

use App\Http\Requests\Message\SendRequest;
use App\Services\Interfaces\IMessageService;

class MessageController extends Controller
{
    public function __construct(
        protected IMessageService $messageService
    )
    {}

    public function send(SendRequest $request)
    {
        $validated = $request->validated();

        $result = $this->messageService->send($validated['receptor'], $validated['message']);

        if (false === $result) {
            return response()->json([
                'status'  => 'fail',
                'message' => 'send message fail'
            ], 500);
        }

        return response()->json([
            'status'  => 'success',
            'message' => 'send message success'
        ]);
    }
}
