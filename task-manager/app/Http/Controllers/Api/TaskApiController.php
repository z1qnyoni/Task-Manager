<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskApiController extends Controller
{
    // Return authenticated user's tasks as JSON
    public function index(Request $request)
    {
        // Get tasks for the current authenticated user
        $tasks = Task::where('user_id', $request->user()->id)->get();

        // Return JSON response
        return response()->json([
            'success' => true,
            'data' => $tasks
        ]);
    }
}