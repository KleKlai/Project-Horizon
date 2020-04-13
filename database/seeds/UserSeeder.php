<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $system_admin       = Role::where('name', 'System Adminstrator')->first();
        $clerk              = Role::where('name', 'Clerk')->first();
        $cos                = Role::where('name', 'Chief of Staff')->first();
        $lawyer             = Role::where('name', 'Lawyer')->first();
        $admin_head         = Role::where('name', 'Admin Head')->first();

        $system_admin_user = User::create([
            'name'          =>  'System Adminstrator',
            'email'         =>  'sysadmin@comelec.gov.ph',
            'password'      =>   Hash::make('bxtr1605'),
        ]);

        $clerk_user = User::create([
            'name'          =>  'Clerk',
            'email'         =>  'clerk@comelec.gov.ph',
            'password'      =>   Hash::make('bxtr1605'),
        ]);

        $cos_user = User::create([
            'name'          =>  'COS',
            'email'         =>  'cos@comelec.gov.ph',
            'password'      =>   Hash::make('bxtr1605'),
        ]);

        $lawyer_user = User::create([
            'name'          =>  'Lawyer',
            'email'         =>  'lawyer@comelec.gov.ph',
            'password'      =>   Hash::make('bxtr1605'),
        ]);

        $admin_head_user = User::create([
            'name'          =>  'Admin Head',
            'email'         =>  'adminhead@comelec.gov.ph',
            'password'      =>   Hash::make('bxtr1605'),
        ]);

        $system_admin_user->roles()->attach($system_admin);
        $clerk_user->roles()->attach($clerk);
        $cos_user->roles()->attach($cos);
        $lawyer_user->roles()->attach($lawyer);
        $admin_head_user->roles()->attach($admin_head);
    }
}
