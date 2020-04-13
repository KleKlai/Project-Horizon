<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();

        $roles = [
            [
            'name'  => 'System Adminstrator',
            ],
            [
            'name'  => 'Clerk',
            ],
            [
            'name'  => 'Chief of Staff',
            ],
            [
            'name'  => 'Lawyer',
            ],
            [
            'name'  => 'Admin Head',
            ],
        ];

        Role::insert($roles);
    }
}
