<?php

namespace App\Services;

use App\Repositories\TaskRepositoryInterface;

class TaskService implements TaskServiceInterface
{
    protected $taskRepository;

    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function getAllTasks($filters = [])
    {
        $query = $this->taskRepository->all();

        if (isset($filters['status']))
            $query->where('status', $filters['status']);

        if (isset($filters['due_date']))
            $query->whereDate('due_date', $filters['due_date']);

        if (isset($filters['title']))
            $query->where('title', 'like', '%' . $filters['title'] . '%');

        return $query;
    }

    public function getTaskById($id)
    {
        return $this->taskRepository->find($id);
    }

    public function createTask($data)
    {
        return $this->taskRepository->create($data);
    }

    public function updateTask($id, $data)
    {
        $task = $this->taskRepository->find($id);
        return $this->taskRepository->update($task, $data);
    }

    public function deleteTask($id)
    {
        $task = $this->taskRepository->find($id);
        if ($task)
            return $this->taskRepository->delete($task);
        return false;
    }
}
