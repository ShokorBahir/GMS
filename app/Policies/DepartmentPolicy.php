<?php

namespace App\Policies;

use App\Models\Department;
use App\Models\User;
use App\Support\GMS\PermissionEnglishCreator;
use Illuminate\Auth\Access\Response;

class DepartmentPolicy
{
    public $resource ="Department";
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo(PermissionEnglishCreator::viewAny($this->resource));
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Department $department): bool
    {
        return $user->hasPermissionTo(PermissionEnglishCreator::view($this->resource));
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo(PermissionEnglishCreator::create($this->resource));
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Department $department): bool
    {
        return $user->hasPermissionTo(PermissionEnglishCreator::update($this->resource));
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Department $department): bool
    {
        return $user->hasPermissionTo(PermissionEnglishCreator::delete($this->resource));
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Department $department): bool
    {
        return $user->hasPermissionTo(PermissionEnglishCreator::restore($this->resource));
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Department $department): bool
    {
        return $user->hasPermissionTo(PermissionEnglishCreator::destroy($this->resource));
    }
}
