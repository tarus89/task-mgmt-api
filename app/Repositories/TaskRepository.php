<?php


namespace App\Repositories;

use App\Models\Task;

class TaskRepository implements TaskRepositoryInterface
{
    public function all()
    {
        return Task::select('tasks.id', 'tasks.title', 'tasks.status', 'tasks.description', 'tasks.due_date', 'tasks.created_at', 'users.name as created_by')
            ->leftJoin('users', 'tasks.user_id', 'users.id')
            ->orderBy('tasks.created_at', 'desc')
            ->paginate(10);
    }

    public function find($id)
    {
        return Task::find($id);
    }

    public function create(array $data)
    {
        $data['user_id'] = auth()->id();
        return Task::create($data);
    }

    public function update(Task $task, array $data)
    {
        $task->update($data);
        return $task;
    }

    public function delete(Task $task)
    {
        return $task->delete();
    }
}
