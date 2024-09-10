<?php


namespace App\Services;

interface TaskServiceInterface
{
    public function getAllTasks($filters = []);

    public function getTaskById($id);

    public function createTask($data);

    public function updateTask($id, $data);

    public function deleteTask($id);
}
