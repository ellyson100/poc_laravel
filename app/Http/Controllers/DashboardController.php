<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        
        // Total de tarefas
        $totalTasks = $user->tasks()->count();
        
        // Tarefas por status
        $tasksByStatus = $user->tasks()
            ->selectRaw('status, count(*) as count')
            ->groupBy('status')
            ->get()
            ->pluck('count', 'status')
            ->toArray();
        
        // Tarefas por prioridade
        $tasksByPriority = $user->tasks()
            ->selectRaw('priority, count(*) as count')
            ->groupBy('priority')
            ->get()
            ->pluck('count', 'priority')
            ->toArray();
        
        // Tarefas recentes
        $recentTasks = $user->tasks()
            ->latest()
            ->take(5)
            ->get();
        
        // Tarefas vencidas
        $overdueTasks = $user->tasks()
            ->where('due_date', '<', now())
            ->where('status', '!=', 'completed')
            ->count();
        
        return view('dashboard', compact(
            'totalTasks',
            'tasksByStatus',
            'tasksByPriority',
            'recentTasks',
            'overdueTasks'
        ));
    }
}
