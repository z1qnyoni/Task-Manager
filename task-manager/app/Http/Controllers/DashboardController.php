<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $tasks = $user->tasks()->get();
        
        
       
        $stats = [
            'new' => $tasks->where('status', 'jauns')->count(),
            'in_progress' => $tasks->where('status', 'procesā')->count(),
            'completed' => $tasks->where('status', 'Pabeigts')->count(),
            'total' => $tasks->count(),
        ];
        $stats['completion_rate'] = $stats['total'] > 0
            ? round($stats['completed'] / $stats['total'] * 100)
            : 0;

        return view('dashboard', compact('stats'));
    }
}
