<?php

use Illuminate\Database\Seeder;
use App\Role;
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::firstOrCreate([
        	'label'	=> 'Administrator',
        	'name'	=> 'Administrator',

        ]);

        $role = Role::firstOrCreate([
         	'label'	=> 'Assessor',
        	'name'	=> 'assessor',
         ]);


        $role = Role::firstOrCreate([ 
         	'label'	=> 'Cashier',
        	'name'	=> 'cashier',
         ]);

        $role = Role::firstOrCreate([
         	'label'	=> 'Accounting',
        	'name'	=> 'accounting',
         ]);

        $role = Role::firstOrCreate([
         	'label'	=> 'Processor',
        	'name'	=> 'processor',
         ]);

        $role = Role::firstOrCreate([
            'label' => 'Chief Engineer',
            'name'  => 'chief engineer',
        ]);

        $role = Role::firstOrCreate([
            'label' => 'Admin Aide',
            'name'  => 'admin aide'
        ]);
    }
}
