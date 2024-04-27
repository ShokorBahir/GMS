<?php
namespace Database\Seeders;

use App\Models\User;
use App\Support\GMS\PermissionEnglishCreator;
use App\Support\GMS\PersionPermissionTranslation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $collection = collect([
            'Faculty',
            'Department',
            'Student File',
            'User',
            'Role',
            'Permission'
            // ... // List all your Models you want to have Permissions for.
        ]);

        $collection->each(function ($item, $key) {
            // create permissions for each collection item
            Permission::create(['group' => trans($item), 'name' => PermissionEnglishCreator::viewAny($item), 'fa_name' => PersionPermissionTranslation::viewAny(trans($item))]);
            Permission::create(['group' => trans($item), 'name' => PermissionEnglishCreator::view($item), 'fa_name' => PersionPermissionTranslation::view(trans($item))]);
            Permission::create(['group' => trans($item), 'name' => PermissionEnglishCreator::create($item), 'fa_name' => PersionPermissionTranslation::create(trans($item))]);
            Permission::create(['group' => trans($item), 'name' => PermissionEnglishCreator::update($item), 'fa_name' => PersionPermissionTranslation::update(trans($item))]);
            Permission::create(['group' => trans($item), 'name' => PermissionEnglishCreator::delete($item), 'fa_name' => PersionPermissionTranslation::delete(trans($item))]);
            Permission::create(['group' => trans($item), 'name' => PermissionEnglishCreator::destroy($item), 'fa_name' => PersionPermissionTranslation::destroy(trans($item))]);
            Permission::create(['group' => trans($item), 'name' => PermissionEnglishCreator::restore($item), 'fa_name' => PersionPermissionTranslation::restore(trans($item))]);
        });

        // Create a Super-Admin Role and assign all Permissions
        $role = Role::create(['name' => 'super-admin']);

        // Give all Permissions to the Super-Admin Role
        $role->givePermissionTo(Permission::all());

        // Create Admin Account
        $user = User::factory()
            ->withPersonalTeam()
            ->create([
                'name' => 'admin',
                'email' => 'admin@ku.af',
                'password' => Hash::make('123')
            ]);

        // Give User Super-Admin Role
        $user->assignRole('super-admin');
    }
}
