<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Administrator
        $user = User::create([
        	'name'		=> 'Dave Del Rosario',
            'avatar'    => '/img/boy_01.png',
        	'username'	=> 'admin',
        	'password' 	=> bcrypt('123456')
        ]);


        $role = Role::create([
        	'label'   => 'Administrator',
        	'name'    => 'administrator',
        ]);


        //Wilson O. Lejarde
        $chiefEngineerWilson = User::create([
            'name'      => 'Wilson O. Lejarde',
            'avatar'     => '/img/boy.png',
            'username'  => 'wilson',
            'password'  => bcrypt('123456')
        ]);


        $roleChiefEngineerWithWol = Role::firstOrCreate([
            'label'   => 'Chief engineer',
            'name'    => 'chief engineer',
        ]);

        //George Bernal
        $chiefEngineerGeorge = User::create([
            'name'      => 'George M. Bernal',
            'avatar'     => '/img/man.png',
            'username'  => 'george',
            'password'  => bcrypt('123456')
        ]);


        $roleChiefEngineerWithGmb = Role::firstOrCreate([
            'label'   => 'Chief engineer',
            'name'    => 'chief engineer',
        ]);
 
        //Mark Anthony A. Lopez
        $assessorMark = User::create([
            'name'      => 'Mark Anthony A. Lopez',
            'avatar'    => '/img/mark.png',
            'username'  => 'mark',
            'password'  => bcrypt('123456')
        ]);


        $roleAssessorWithMal = Role::firstOrCreate([
            'label'   => 'Assessor',
            'name'    => 'assessor',
        ]);  

        //Karen 
        $assessorKaren = User::create([
            'name'      => 'Karen G. Baybayon',
            'avatar'     => '/img/karen.png',
            'username'  => 'karen',
            'password'  => bcrypt('123456')
        ]);


        $roleAssessorWithKGB = Role::firstOrCreate([
            'label'   => 'Assessor',
            'name'    => 'assessor',
        ]);

       //Jane Del Rosario 
        $assessorJane = User::create([
            'name'      => 'MaryJane F. Del Rosario',
            'avatar'     => '/img/jane.png',
            'username'  => 'jane',
            'password'  => bcrypt('123456')
        ]);

        $roleAssessorWithMfd = Role::firstOrCreate([
            'label'   => 'Assessor',
            'name'    => 'assessor',
        ]);

       //Abigail M. Dahino
        $assessorAbi = User::create([
            'name'      => 'Abigail M. Dahino',
            'avatar'     => '/img/abi.png',
            'username'  => 'abigail',
            'password'  => bcrypt('123456')
        ]);

        $roleAssessorWithAmd = Role::firstOrCreate([
            'label'   => 'Assessor',
            'name'    => 'assessor',
        ]);


        //Marivic O. Gumalo
        $cashierMarivic = User::create([
            'name'      => 'Marivic O. Gumalo',
            'avatar'    => '/img/marivic.png',
            'username'  => 'marivic',
            'password'  => bcrypt('123456')
        ]);

        $roleCashierWithMog = Role::firstOrCreate([
            'label'   => 'Cashier',
            'name'    => 'cashier',
        ]);


        //Dianne S. Garcia
        $cashierDianne = User::create([
            'name'      => 'Dianne S. Garcia',
            'avatar'    => '/img/girl.png',
            'username'  => 'dianne',
            'password'  => bcrypt('123456')
        ]);

        $roleCashierWithDsg = Role::firstOrCreate([
            'label' => 'Cashier',
            'name'  => 'cashier'
        ]);


        //Realyn S. Dayrit
        $accountingRealyn = User::create([
            'name'      => 'Realyn S. Dayrit',
            'avatar'     => '/img/rea.png',
            'username'  => 'realyn',
            'password'  => bcrypt('123456')
        ]);

        $roleAccountingWithRsd = Role::firstOrCreate([
            'label'   => 'Accounting',
            'name'    => 'accounting',
        ]);

        //Francisco C. Ancheta Jr
        $accountingKiko = User::create([
            'name'      => 'Francisco C. Ancheta Jr.',
            'avatar'     => '/img/kiko.png',
            'username'  => 'francisco',
            'password'  => bcrypt('123456')
        ]);

        $roleAccountingWithFca = Role::firstOrCreate([
            'label'   => 'Accounting',
            'name'    => 'accounting',
        ]);

        //Manuelito Tolentino
        $accountingNoli = User::create([
            'name'      => 'Noli Tolentino',
            'avatar'     => '/img/noli.png',
            'username'  => 'noli',
            'password'  => bcrypt('123456')
        ]);

        $roleAccountingWithMrt = Role::firstOrCreate([
            'label'   => 'Accounting',
            'name'    => 'accounting',
        ]);


        //Rene P. Abacan

        $processorRene = User::create([
            'name'      => 'Rene P. Abacan',
            'avatar'     => '/img/rene.png',
            'username'  => 'rene',
            'password'  => bcrypt('123456')
        ]);

        $roleProcessorWithRpa = Role::firstOrCreate([
            'label'   => 'Processor',
            'name'    => 'processor',
        ]);


        //Jenny B. Magtoto
        $adminAideJenny = User::create([
            'name'      => 'Jenny B. Magtoto',
            'avatar'    => '/img/girl_02.png',
            'username'  => 'jenny',
            'password'  => bcrypt('123456')
        ]);


        $roleAdminAideJbm = Role::firstOrCreate([
            'label'   => 'Admin Aide',
            'name'    => 'admin aide',
        ]);       

        //Jenny B. Magtoto
        $adminAideLeny= User::create([
            'name'      => 'Leny Gelit',
            'avatar'    => '/img/girl_03.png',
            'username'  => 'leny',
            'password'  => bcrypt('123456')
        ]);


        $roleAdminAideLcg = Role::firstOrCreate([
            'label'   => 'Admin Aide',
            'name'    => 'admin aide',
        ]);



        $user->role()->associate($role)->save();
        $chiefEngineerWilson->role()->associate($roleChiefEngineerWithWol)->save();
        $chiefEngineerGeorge->role()->associate($roleChiefEngineerWithGmb)->save();
        $assessorMark->role()->associate($roleAssessorWithMal)->save();
        $assessorJane->role()->associate($roleAssessorWithMfd)->save();
        $assessorKaren->role()->associate($roleAssessorWithKGB)->save();
        $assessorAbi->role()->associate($roleAssessorWithAmd)->save();
        $cashierMarivic->role()->associate($roleCashierWithMog)->save();
        $cashierDianne->role()->associate($roleCashierWithDsg)->save();
        $accountingRealyn->role()->associate($roleAccountingWithRsd)->save();
        $accountingKiko->role()->associate($roleAccountingWithFca)->save();
        $accountingNoli->role()->associate($roleAccountingWithMrt)->save();
        $processorRene->role()->associate($roleProcessorWithRpa)->save();
        $adminAideJenny->role()->associate($roleAdminAideJbm)->save();
        $adminAideLeny->role()->associate($roleAdminAideLcg)->save();
    }
}
