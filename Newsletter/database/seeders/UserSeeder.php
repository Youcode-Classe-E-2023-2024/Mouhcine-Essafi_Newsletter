<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['name' => 'Administrateur'],
            ['name' => 'Rédacteur'],
            ['name' => 'Membre']
        ];
        foreach ($roles as $role) {
            Role::create($role);
        }

        $permissions = [
            ['name' => 'create media'],
            ['name' => 'delete media'],
            ['name' => 'create template'],
            ['name' => 'delete template'],
            ['name' => 'update template'],
            ['name' => 'send newsletters']
        ];

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }

    }
}
