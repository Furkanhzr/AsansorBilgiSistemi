<?php

namespace Database\Seeders;

use App\Helpers\Permission\Permission as HelperPermission;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{

    public function run()
    {
        app()['cache']->forget('spatie.permission.cache');
        $permissions = new HelperPermission();

        foreach ($permissions->get_permissions() as $key => $permission) {
            $super_admin_permissions[$key] = [
                'create',
                'read',
                'update',
                'delete'
            ];
        }
        $super_admin = new  Role();
        $super_admin->name = 'Süper Admin';
        $super_admin->guard_name = 'web';
        $super_admin->save();

        foreach ($permissions->get_permissions() as $key => $permission) {
            $create = new  Permission();
            $create->name = 'create '.$key;
            $create->save();
            if (in_array('create', $super_admin_permissions[$key])) {
                $super_admin->givePermissionTo($create);
            }
            $read = new  Permission();
            $read->name = 'read '.$key;
            $read->save();
            if (in_array('read', $super_admin_permissions[$key])) {
                $super_admin->givePermissionTo($read);
            }
            $update = new  Permission();
            $update->name = 'update '.$key;
            $update->save();
            if (in_array('update', $super_admin_permissions[$key])) {
                $super_admin->givePermissionTo($update);
            }
            $delete = new  Permission();
            $delete->name = 'delete '.$key;
            $delete->save();
            if (in_array('delete', $super_admin_permissions[$key])) {
                $super_admin->givePermissionTo($delete);
            }
        }
    }
}
