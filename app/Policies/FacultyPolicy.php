<?php

namespace App\Policies;

use App\Models\Faculty;
use App\Models\User;
use App\Support\PermissionCreator;
use Illuminate\Auth\Access\Response;


class FacultyPolicy
{

    public $resource = "Faculty";
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo("viewAnyFaculty");
        // return $user->hasPermissionTo(PermissionCreator::viewAny($this->resource));
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Faculty $faculty): bool
    {        return $user->hasPermissionTo("viewFaculty");
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo("createFaculty");
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Faculty $faculty): bool
    {
        return $user->hasPermissionTo("updateFaculty");
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Faculty $faculty): bool
    {
        return $user->hasPermissionTo("deleteFaculty");
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Faculty $faculty): bool
    {
        return $user->hasPermissionTo('restoreFaculty');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Faculty $faculty): bool
    {
        return $user->hasPermissionTo('forceDeleteFaculty');
    }
}
