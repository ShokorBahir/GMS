<?php

namespace App\Support\GMS;

class PersionPermissionTranslation
{
    public static function viewAny(string $resource): string
    {
        return "قابلیت دیدن همه $resource";
    }
    public static function view(string $resource): string
    {
        return "قابلیت دیدن $resource";
    }
    public static function create(string $resource): string
    {
        return "قابلیت ایجاد $resource";
    }
    public static function update(string $resource): string
    {
        return "قابلیت ویرایش $resource";
    }
    public static function delete(string $resource): string
    {
        return "قابلیت حذف $resource";
    }
    public static function restore(string $resource): string
    {
        return "قابلیت بازګرداندن $resource";
    }
    public static function destroy(string $resource): string
    {
        return "قابلیت حذف کلی $resource";
    }
}
