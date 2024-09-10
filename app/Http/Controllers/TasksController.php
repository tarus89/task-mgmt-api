<?php


namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Services\TaskServiceInterface;

class TasksController extends Controller
{
    protected $taskService;

    public function __construct(TaskServiceInterface $taskService)
    {
        $this->taskService = $taskService;
    }

    public function index()
    {
        $filters = request()->only(['status', 'due_date', 'title']);
        return response()->json($this->taskService->getAllTasks($filters));
    }

    public function show($id)
    {
        return response()->json($this->taskService->getTaskById($id));
    }

    public function store(StoreTaskRequest $request)
    {
        $task = $this->taskService->createTask($request->validated());
        return response()->json($task, 201);
    }

    public function update(UpdateTaskRequest $request, $id)
    {
        $task = $this->taskService->updateTask($id, $request->validated());
        return response()->json($task);
    }

    public function destroy($id)
    {
        $res = $this->taskService->deleteTask($id);
        if (!$res)
            return response()->json([
                'message' => 'Task not found!.'
            ], 500);
        return response()->json([
            'message' => 'The task has been removed from the system.'
        ], 200);
    }
}
