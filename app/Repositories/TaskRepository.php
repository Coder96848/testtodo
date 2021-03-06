<?php


namespace App\Repositories;


class TaskRepository
{
    public function forUser(User $user)
    {
        return $user->tasks()
            ->orderBy('created_at', 'asc')
            ->get();
    }
}
