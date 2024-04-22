<?php

namespace App\Policies;

use App\Models\StudentFile;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class StudentFilePolicy
{

    public $resource = "StudentFile";
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('viewAnyStudent_file');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, StudentFile $studentFile): bool
    {
        return $user->hasPermissionTo('viewStudent_file');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('createStudent_file');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, StudentFile $studentFile): bool
    {
        return $user->hasPermissionTo('updateStudent_file');

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, StudentFile $studentFile): bool
    {
        return $user->hasPermissionTo('deleteStudent_file');

    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, StudentFile $studentFile): bool
    {
        //return $user->hasPermissionTo('restoreStudent-file');
        return true;

    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, StudentFile $studentFile): bool
    {
        //return $user->hasPermissionTo('forceDeleteStudent_file');
        return true;
    }
}
