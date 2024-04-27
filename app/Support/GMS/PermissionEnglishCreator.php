<?php

namespace App\Support\GMS;

class PermissionEnglishCreator
{
    public static function viewAny(string $resource): string
    {
        return "ViewAny $resource";
    }
    public static function view(string $resource): string
    {
        return "View $resource";
    }
    public static function create(string $resource): string
    {
        return "Create $resource";
    }
    public static function update(string $resource): string
    {
        return "Update $resource";
    }
    public static function delete(string $resource): string
    {
        return "Delete $resource";
    }
    public static function restore(string $resource): string
    {
        return "Restore $resource";
    }
    public static function destroy(string $resource): string
    {
        return "Destroy $resource";
    }
}
