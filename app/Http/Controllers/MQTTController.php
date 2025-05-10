<?php

namespace App\Http\Controllers;

use App\Services\HiveMQService;
use Illuminate\Http\Request;

class MQTTController extends Controller
{
    protected $hiveMQService;

    public function __construct(HiveMQService $hiveMQService)
    {
        $this->hiveMQService = $hiveMQService;
    }

    public function publishMessage(Request $request)
    {
        $topic = $request->input('topic');
        $message = $request->input('message');

        if (!$topic || !$message) {
            return response()->json([
                'success' => false,
                'message' => 'Topic and message are required.'
            ], 422);
        }

        try {
            $this->hiveMQService->connect();

            foreach ($topic as $key => $value) {
                $this->hiveMQService->publish($value, $message[$key]);
            }

            $this->hiveMQService->disconnect();

            return response()->json([
                'success' => true,
                'message' => 'Message published successfully.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to publish message.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
