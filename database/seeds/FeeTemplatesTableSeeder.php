<?php

use Illuminate\Database\Seeder;
use App\FeeTemplate;
use App\ServiceTemplate;

class FeeTemplatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	//START RLM NEW
    	$rlmNew = ServiceTemplate::firstOrCreate([
    		'name'	=> 'RLM_NEW'
    	]);

    	$rlmNew->feeTemplates()->firstOrCreate([
    		'name_fees' 			   => 'ROC Fee',
    		'amount'				   => 60,
    		'enabled_year_computation' => 1,
            'enabled_surcharge'        => 0
    	]);

    	$rlmNew->feeTemplates()->firstOrCreate([
    		'name_fees' 			   => 'App Fee',
    		'amount'				   => 20,
    		'enabled_year_computation' => 0,
            'enabled_surcharge'        => 0
    	]);

    	$rlmNew->feeTemplates()->firstOrCreate([
    		'name_fees' 			   => 'Filling Fee',
    		'amount'				   => 10,
    		'enabled_year_computation' => 0,
            'enabled_surcharge'        => 0
    	]);

    	$rlmNew->feeTemplates()->firstOrCreate([
    		'name_fees' 			   => 'DST',
    		'amount'				   => 30,
    		'enabled_year_computation' => 0,
            'enabled_surcharge'        => 0
    	]);

    	//End RLM NEW

    	//START GROC NEW

    	$grocNew = ServiceTemplate::firstOrCreate([
    		'name'	=> 'GROC_NEW',
    	]);

    	$grocNew->feeTemplates()->firstOrCreate([
    		'name_fees' 			   => 'ROC Fee',
    		'amount'				   => 60,
    		'enabled_year_computation' => 1,
            'enabled_surcharge'        => 0
    	]);

    	$grocNew->feeTemplates()->firstOrCreate([
    		'name_fees' 			   => 'App Fee',
    		'amount'				   => 20,
    		'enabled_year_computation' => 0,
            'enabled_surcharge'        => 0
    	]);

    	$grocNew->feeTemplates()->firstOrCreate([
    		'name_fees' 			   => 'Filling Fee',
    		'amount'				   => 10,
    		'enabled_year_computation' => 0,
            'enabled_surcharge'        => 0
    	]);

    	$grocNew->feeTemplates()->firstOrCreate([
    		'name_fees' 			   => 'DST',
    		'amount'				   => 30,
    		'enabled_year_computation' => 0,
            'enabled_surcharge'        => 0
    	]);

    	//END GROC NEW

    	//START 1PHN NEW
    	$_1PhnNew = ServiceTemplate::firstOrCreate([
    		'name'	=> '1PHN_NEW'
    	]); 

    	$_1PhnNew->feeTemplates()->firstOrCreate([
    		'name_fees'	=> 'ROC Fee',
    		'amount'	=> 120,
    		'enabled_year_computation'	=> 1,
    		'enabled_surcharge'	=> 0,
    	]);

    	$_1PhnNew->feeTemplates()->firstOrCreate([
    		'name_fees'	=> 'DST',
    		'amount'	=> 30,
    		'enabled_year_computation'	=> 0,
    		'enabled_surcharge'	=> 0,
    	]);

    	//END 1PHN NEW

        //START RTG2 NEW 

        $rtg_new_2 = ServiceTemplate::firstOrCreate([
            'name'  => '2RTG_NEW',
        ]);

        $rtg_new_2->feeTemplates()->firstOrCreate([
            'name_fees' => 'ROC Fee',
            'amount'    => 120,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0,
        ]);

        $rtg_new_2->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0,
        ]);




    	//START 2PHN NEW

    	$_2PhnNew = ServiceTemplate::firstOrCreate([
    		'name'	=> '2PHN_NEW'
    	]);

    	$_2PhnNew->feeTemplates()->firstOrCreate([
    		'name_fees'	=> 'ROC Fee',
    		'amount'	=> 60,
    		'enabled_year_computation'	=> 1,
    		'enabled_surcharge'	=> 0,
    	]);

    	$_2PhnNew->feeTemplates()->firstOrCreate([
    		'name_fees'	=> 'DST',
    		'amount'	=> 30,
    		'enabled_year_computation'	=> 0,
    		'enabled_surcharge'	=> 0,
    	]);

    	//END 2PHN NEW

    	//START RMAP NEW

    	$rmapNew = ServiceTemplate::firstOrCreate([
    		'name'	=> 'RMAP_NEW',
    	]);

    	$rmapNew->feeTemplates()->firstOrCreate([
    		'name_fees'	=> 'ROC Fee',
    		'amount'	=> 100,
    		'enabled_year_computation'	=> 1,
    		'enabled_surcharge'	=> 0
    	]);

    	$rmapNew->feeTemplates()->firstOrCreate([
    		'name_fees'	=> 'DST',
    		'amount'	=> 30,
    		'enabled_year_computation'	=> 0,
    		'enabled_surcharge'	=> 0
    	]);

        //END RMAP NEW

        $_3Rphn = ServiceTemplate::firstOrCreate([
            'name'  => '3PHN_NEW',
        ]);

       $_3Rphn->feeTemplates()->firstOrCreate([
            'name_fees' => 'ROC Fee',
            'amount'    => 60,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);

        $_3Rphn->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        //END 3RPHN

        //START 3RTG NEW

        $_3Rtg = ServiceTemplate::firstOrCreate([

            'name'  => '3RTG_NEW'
        ]);

        $_3Rtg->feeTemplates()->firstOrCreate([
            'name_fees' => 'ROC Fee',
            'amount'    => 60,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);

        $_3Rtg->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        //END 3RTG

        //START AT ROC NEW

        $at_roc_new = ServiceTemplate::firstOrCreate([
            'name'  => 'AT-ROC_NEW'
        ]);

        $at_roc_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'ROC Fee',
            'amount'    => 60,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);

        $at_roc_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        //END AT ROC NEW

        //START SROP_New

        $srop_fb_new = ServiceTemplate::firstOrCreate([
            'name'  => 'SROP_NEW'
        ]);

        $srop_fb_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'ROC Fee',
            'amount'    => 60,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);

        $srop_fb_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'App Fee',
            'amount'    => 20,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);


        $srop_fb_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Filing Fee',
            'amount'    => 20,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        $srop_fb_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        //END SROP_NEW

        $rtg_new_1 = ServiceTemplate::firstOrCreate([
            'name'  => '1RTG_NEW'
        ]);

        $rtg_new_1->feeTemplates()->firstOrCreate([
            'name_fees' => 'ROC Fee',
            'amount'    => 180,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0

        ]);

         $rtg_new_1->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0

        ]);

         // END SROP NEW
        // AMATEUR with ROC and RSL

        //AT RSL A NEW
        $at_rsl_a_new = ServiceTemplate::firstOrCreate([
            'name'  => 'AT-RSL-A_NEW',
        ]);

        $at_rsl_a_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad Station Lic Fee',
            'amount'    => 120,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);

        $at_rsl_a_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'ROC Fee',
            'amount'    => 60,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);

        $at_rsl_a_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        //END AT RSL B NEW

        $at_rsl_b_new = ServiceTemplate::firstOrCreate([
            'name' => 'AT-RSL-B_NEW',
        ]);

         $at_rsl_b_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad Station Lic Fee',
            'amount'    => 132,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);

         $at_rsl_b_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'ROC Fee',
            'amount'    => 60,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);

        $at_rsl_b_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        //END RSL B NEW

        //START RSL C NEW

        $at_rsl_c_new = ServiceTemplate::firstOrCreate([
            'name'  => 'AT-RSL-C_NEW',
        ]);

         $at_rsl_c_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad Station Lic Fee',
            'amount'    => 144,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);

        $at_rsl_c_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'ROC Fee',
            'amount'    => 60,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);

         $at_rsl_c_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        //END RSL C NEW

        //START RSL D NEW

        $at_rsl_d_new = ServiceTemplate::firstOrCreate([
            'name'  => 'AT-RSL-D_NEW'
        ]);

        $at_rsl_d_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad Station Lic Fee',
            'amount'    => 156,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);

        $at_rsl_d_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'ROC Fee',
            'amount'    => 60,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);

        $at_rsl_d_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        //END AT RSL D NEW

        //SART AT-CLUB-SIMLEX-NEW

        // $at_club_simplex_new = ServiceTemplate::firstOrCreate([
        //     'name'  =>  'AT-CLUB-SIMPLEX_NEW',
        // ]);

        // $at_club_simplex_new->feeTemplates()->firstOrCreate([
        //     'name_fees' => 'Filing Fee',
        //     'amount'    => 180,
        //     'enabled_year_computation'  => 1,
        //     'enabled_surcharge' => 0
        // ]);


        // $at_club_simplex_new->feeTemplates()->firstOrCreate([
        //     'name_fees' => 'Purchase Fee',
        //     'amount'    => 50,
        //     'enabled_year_computation'  => 1,
        //     'enabled_surcharge' => 0
        // ]);

        // $at_club_simplex_new->feeTemplates()->firstOrCreate([
        //     'name_fees' => 'Possess Fee',
        //     'amount'    => 50,
        //     'enabled_year_computation'  => 1,
        //     'enabled_surcharge' => 0
        // ]);

        // $at_club_simplex_new->feeTemplates()->firstOrCreate([
        //     'name_fees' => 'Construction Fee',
        //     'amount'    => 600,
        //     'enabled_year_computation'  => 1,
        //     'enabled_surcharge' => 0
        // ]);

        // $at_club_simplex_new->feeTemplates()->firstOrCreate([
        //     'name_fees' => 'Rad. Station Lic. Fee',
        //     'amount'    => 700,
        //     'enabled_year_computation'  => 1,
        //     'enabled_surcharge' => 0
        // ]);

        // $at_club_simplex_new->feeTemplates()->firstOrCreate([
        //     'name_fees' => 'DST',
        //     'amount'    => 30,
        //     'enabled_year_computation'  => 0,
        //     'enabled_surcharge' => 0
        // ]);

        // //AT CLUB SIMPLEX NEW

        //  $at_club_duplex_new = ServiceTemplate::firstOrCreate([
        //     'name'  => 'AT-CLUB-DUPLEX_NEW',
      
        // ]);

        //  $at_club_duplex_new->feeTemplates()->firstOrCreate([
        //     'name_fees' => 'Filing Fee',
        //     'amount'    => 180,
        //     'enabled_year_computation'  => 1,
        //     'enabled_surcharge' => 0
        //  ]);

        //  $at_club_duplex_new->feeTemplates()->firstOrCreate([
        //     'name_fees' => 'Purchase Fee',
        //     'amount'    => 50,
        //     'enabled_year_computation'  => 1,
        //     'enabled_surcharge' => 0
        // ]);

        // $at_club_duplex_new->feeTemplates()->firstOrCreate([
        //     'name_fees' => 'Possess Fee',
        //     'amount'    => 50,
        //     'enabled_year_computation'  => 1,
        //     'enabled_surcharge' => 0
        // ]);

        // $at_club_duplex_new->feeTemplates()->firstOrCreate([
        //     'name_fees' => 'Construction Fee',
        //     'amount'    => 600,
        //     'enabled_year_computation'  => 1,
        //     'enabled_surcharge' => 0
        // ]);

        // $at_club_duplex_new->feeTemplates()->firstOrCreate([
        //     'name_fees' => 'Rad. Station Lic. Fee',
        //     'amount'    => 1320,
        //     'enabled_year_computation'  => 1,
        //     'enabled_surcharge' => 0
        // ]);

        // $at_club_duplex_new->feeTemplates()->firstOrCreate([
        //     'name_fees' => 'DST',
        //     'amount'    => 30,
        //     'enabled_year_computation'  => 0,
        //     'enabled_surcharge' => 0
        // ]);

        //END AT CLUB DUPLEX NEW


        //SRART AIRCRAFT RSL HP NEW
        // $aircraft_rsl_hp_new = ServiceTemplate::firstOrCreate([
        //     'name'  => 'AIRCRAFT-RSL-HP_NEW',
        // ]);

        // $aircraft_rsl_hp_new->feeTemplates()->firstOrCreate([
        //     'name_fees' => 'Filing Fee',
        //     'amount'    => 180,
        //     'enabled_year_computation'  => 1,
        //     'enabled_surcharge' => 0,
        // ]);


        // $aircraft_rsl_hp_new->feeTemplates()->firstOrCreate([
        //     'name_fees' => 'Purchase Fee',
        //     'amount'    => 240,
        //     'enabled_year_computation'  => 1,
        //     'enabled_surcharge' => 0,
        // ]);

        // $aircraft_rsl_hp_new->feeTemplates()->firstOrCreate([
        //     'name_fees' => 'Possess Fee',
        //     'amount'    => 120,
        //     'enabled_year_computation'  => 1,
        //     'enabled_surcharge' => 0,
        // ]);

        // $aircraft_rsl_hp_new->feeTemplates()->firstOrCreate([
        //     'name_fees' => 'Construction Fee',
        //     'amount'    => 960,
        //     'enabled_year_computation'  => 1,
        //     'enabled_surcharge' => 0,
        // ]);

        // $aircraft_rsl_hp_new->feeTemplates()->firstOrCreate([
        //     'name_fees' => 'Rad. Station Lic. Fee',
        //     'amount'    => 1320,
        //     'enabled_year_computation'  => 1,
        //     'enabled_surcharge' => 0,
        // ]);

        // $aircraft_rsl_hp_new->feeTemplates()->firstOrCreate([
        //     'name_fees' => 'Inspection Fee',
        //     'amount'    => 720,
        //     'enabled_year_computation'  => 1,
        //     'enabled_surcharge' => 0,
        // ]);

        // $aircraft_rsl_hp_new->feeTemplates()->firstOrCreate([
        //     'name_fees' => 'DST',
        //     'amount'    => 30,
        //     'enabled_year_computation'  => 0,
        //     'enabled_surcharge' => 0,
        // ]);

        //END AIRCRAFT RSL HP NEW

        //  $aircraft_rsl_mp_new = ServiceTemplate::firstOrCreate([
        //     'name'  => 'AIRCRAFT-RSL-MP_NEW',
        // ]);

        //START RSL HP SIM FX NEW
        $rsl_hp_sim_fx_new = ServiceTemplate::firstOrCreate([
            'name'  => 'RSL-HP-SIM-FX_New',
        ]);

        $rsl_hp_sim_fx_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Construction Fee',
            'amount'    => 240,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        $rsl_hp_sim_fx_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 600,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);

        $rsl_hp_sim_fx_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Inspection Fee',
            'amount'    => 480,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);

        $rsl_hp_sim_fx_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        //END RSL HP SIM FX NEW

        //START RSL HP SIM FX FB NEW

        $rsl_hp_sim_fx_fb_new = ServiceTemplate::firstOrCreate([
            'name'  => 'RSL-HP-SIM-FX-FB_NEW',
       
        ]);

        $rsl_hp_sim_fx_fb_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Construction Fee',
            'amount'    => 240,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]); 

        $rsl_hp_sim_fx_fb_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 1320,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);

        $rsl_hp_sim_fx_fb_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Inspection Fee',
            'amount'    => 480,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);

        $rsl_hp_sim_fx_fb_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        //END RSL HP SIM FX FB

        $rsl_hp_sim_fb_new = ServiceTemplate::firstOrCreate([
            'name'  => 'RSL-HP-SIM-FB_NEW',
        ]);

        $rsl_hp_sim_fx_fb_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Construction Fee',
            'amount'    => 240,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        $rsl_hp_sim_fb_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 720,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);

        $rsl_hp_sim_fb_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Inspection Fee',
            'amount'    => 480,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);

        $rsl_hp_sim_fb_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);
        
        //END  RSL HP FB NEW

        //START RSL_HP_SIM_ML_NEW

         $rsl_hp_sim_ml_new = ServiceTemplate::firstOrCreate([
            'name'  => 'RSL-HP-SIM-ML_NEW',

        ]);

        $rsl_hp_sim_ml_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Construction Fee',
            'amount'    => 240,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0,
        ]);

        $rsl_hp_sim_ml_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 480,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0,
        ]);

        $rsl_hp_sim_ml_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Inspection Fee',
            'amount'    => 240,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0,
        ]); 

        $rsl_hp_sim_ml_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0,
        ]); 

        //END RSL HP SIM ML NEW

        //START RSL-HP-SIM-P_New

        $rsl_hp_sim_p_new = ServiceTemplate::firstOrCreate([
            'name'  => 'RSL-HP-SIM-P_NEW',
        ]);

        $rsl_hp_sim_p_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 480,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0,
        ]);

        $rsl_hp_sim_p_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Inspection Fee',
            'amount'    => 240,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0,
        ]);

        $rsl_hp_sim_p_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0,
        ]);

        //END RSL-HP-SIM-P_NEW

        //START RSL-MP-SIM-FX_New

        $rsl_mp_sim_fx_new = ServiceTemplate::firstOrCreate([
            'name'  => 'RSL-MP-SIM-FX_New',
        ]);

        $rsl_mp_sim_fx_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Construction Fee',
            'amount'    => 240,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        $rsl_mp_sim_fx_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 480,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);

        $rsl_mp_sim_fx_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Inspection Fee',
            'amount'    => 480,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);

        $rsl_mp_sim_fx_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        //END RSL-MP-SIM-FX_New

        //START RSL-MP-SIM-FX-FB_NEW
        $rsl_mp_sim_fx_fb_new = ServiceTemplate::firstOrCreate([
            'name'  => 'RSL-MP-SIM-FX-FB_NEW',
        ]);

        $rsl_mp_sim_fx_fb_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Construction Fee',
            'amount'    => 240,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0,
        ]);

        $rsl_mp_sim_fx_fb_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 1080,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0,
        ]);

        $rsl_mp_sim_fx_fb_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Inspection Fee',
            'amount'    => 480,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0,
        ]);

        $rsl_mp_sim_fx_fb_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0,
        ]);

        //END RSL-MP-SIM-FX-FB_NEW

        //START RSL-MP-SIM-FB_NEW

        $rsl_mp_sim_fb_new = ServiceTemplate::firstOrCreate([
            'name' => 'RSL-MP-SIM-FB_NEW',

        ]);

        $rsl_mp_sim_fb_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Construction Fee',
            'amount'    => 240,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        $rsl_mp_sim_fb_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 600,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);

        $rsl_mp_sim_fb_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Inspection Fee',
            'amount'    => 480,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);

        $rsl_mp_sim_fb_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        //END RSL-MP-SIM-FB_NEW

        //START RSL-MP-SIM-ML_NEW

        $rsl_mp_sim_ml_new = ServiceTemplate::firstOrCreate([
            'name'  => 'RSL-MP-SIM-ML_NEW',
        ]);

        $rsl_mp_sim_ml_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Construction Fee',
            'amount'    => 240,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        $rsl_mp_sim_ml_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 360,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);

        $rsl_mp_sim_ml_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Inspection Fee',
            'amount'    => 240,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);

        $rsl_mp_sim_ml_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        //END RSL-MP-SIM-ML_NEW

        //START RSL-MP-SIM-P_NEW

        $rsl_mp_sim_p_new = ServiceTemplate::firstOrCreate([
            'name'  => 'RSL-MP-SIM-P_NEW',
        ]);

        $rsl_mp_sim_p_new->feeTemplates()->firstOrCreate([

            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 360,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);

        $rsl_mp_sim_p_new->feeTemplates()->firstOrCreate([

            'name_fees' => 'Inspection Fee',
            'amount'    => 240,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);

        $rsl_mp_sim_p_new->feeTemplates()->firstOrCreate([

            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        //END RSL-MP-SIM-P_NEW
  
        //START RSL-LP-SIM-FX_New

        $rsl_lp_sim_fx_new = ServiceTemplate::firstOrCreate([
            'name'  => 'RSL-LP-SIM-FX_NEW',
        ]);

        $rsl_lp_sim_fx_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Construction Fee',
            'amount'    => 240,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]); 

        $rsl_lp_sim_fx_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 360,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);

        $rsl_lp_sim_fx_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Inspection Fee',
            'amount'    => 480,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);

        $rsl_lp_sim_fx_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);
        
        //END RSL-LP-SIM-FX_NEW 

        //START RSL-LP-SIM-FX-FB_NEW

        $rsl_lp_sim_fx_fb_new = ServiceTemplate::firstOrCreate([
            'name'  => 'RSL-LP-SIM-FX-FB_NEW',

        ]);

        $rsl_lp_sim_fx_fb_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Construction Fee',
            'amount'    => 240,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        $rsl_lp_sim_fx_fb_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 840,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);

        $rsl_lp_sim_fx_fb_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Inspection Fee',
            'amount'    => 480,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);

        $rsl_lp_sim_fx_fb_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        //END RSL-LP-SIM-FX-FB_NEW

        //START RSL-LP-SIM-FB_NEW
        $rsl_lp_sim_fb_new = ServiceTemplate::firstOrCreate([
            'name'  => 'RSL-LP-SIM-FB_NEW',
        ]);

        $rsl_lp_sim_fb_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Construction Fee',
            'amount'    => 240,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        $rsl_lp_sim_fb_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 480,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);

        $rsl_lp_sim_fb_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Inspection Fee',
            'amount'    => 480,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);

        $rsl_lp_sim_fb_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        //END RSL-LP-SIM-FB_NEW 

        //START RSL-LP-SIM-ML_NEW
        $rsl_lp_sim_ml_new = ServiceTemplate::firstOrCreate([
            'name'  => 'RSL-LP-SIM-ML_NEW',

        ]);

        $rsl_lp_sim_ml_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Construction Fee',
            'amount'    => 240,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        $rsl_lp_sim_ml_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 240,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);

        $rsl_lp_sim_ml_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Inspection Fee',
            'amount'    => 240,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);

        $rsl_lp_sim_ml_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        //END RSL-LP-SIM-ML_NEW

        //START RSL-LP-SIM-P_NEW

        $rsl_lp_sim_p_new = ServiceTemplate::firstOrCreate([
            'name'  => 'RSL-LP-SIM-P_NEW',

        ]);

        $rsl_lp_sim_p_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 240,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);

        $rsl_lp_sim_p_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Inspection Fee',
            'amount'    => 240,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);

        $rsl_lp_sim_p_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        //END RSL-LP-SIM-P_NEW

        //START RSL-HP-DUP-FX_NEW
        $rsl_hp_dup_fx_new = ServiceTemplate::firstOrCreate([
            'name'  => 'RSL-HP-DUP-FX_NEW',
        ]);

        $rsl_hp_dup_fx_new->feeTemplates()->firstOrCreate([
            'name_fees'     => 'Construction Fee',
            'amount'    => 240,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        $rsl_hp_dup_fx_new->feeTemplates()->firstOrCreate([
            'name_fees'     => 'Rad. Station Lic. Fee',
            'amount'    => 1200,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);

        $rsl_hp_dup_fx_new->feeTemplates()->firstOrCreate([
            'name_fees'     => 'Inspection Fee',
            'amount'    => 480,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);

        $rsl_hp_dup_fx_new->feeTemplates()->firstOrCreate([
            'name_fees'     => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);
        //END RSL-HP-DUP-FX_NEW

        //START RSL-HP-DUP-FX-FB_NEW
        $rsl_hp_dup_fx_fb_new = ServiceTemplate::firstOrCreate([
            'name'  => 'RSL-HP-DUP-FX_FB_NEW',
        ]);

        $rsl_hp_dup_fx_fb_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Construction Fee',
            'amount'    => 240,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        $rsl_hp_dup_fx_fb_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 2640,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]); 

        $rsl_hp_dup_fx_fb_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Inspection Fee',
            'amount'    => 480,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]); 

        $rsl_hp_dup_fx_fb_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]); 

        //END RSL-HP-DUP-FX-FB_NEW

        //START RSL-HP-DUP-FB_NEW
        $rsl_hp_dup_fb_new = ServiceTemplate::firstOrCreate([
            'name'  => 'RSL-HP-DUP-FB_NEW',
        ]);

        $rsl_hp_dup_fb_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Construction Fee',
            'amount'    => 240,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0,
        ]);

        $rsl_hp_dup_fb_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 1200,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0,
        ]);

        $rsl_hp_dup_fb_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Inspection Fee',
            'amount'    => 480,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0,
        ]);

        $rsl_hp_dup_fb_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0,
        ]);

        //END RSL-HP-DUP-FB_NEW

        //START RSL-HP-DUP-ML_NEW
        $rsl_hp_dup_ml_new = ServiceTemplate::firstOrCreate([
            'name'  => 'RSL-HP-DUP-ML_NEW',
        ]); 

        $rsl_hp_dup_ml_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Construction Fee',
            'amount'    => 240,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        $rsl_hp_dup_ml_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 1440,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);

        $rsl_hp_dup_ml_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Inspection Fee',
            'amount'    => 240,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]); 

        $rsl_hp_dup_ml_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        //END RSL-HP-DUP-ML_NEW

        //START RSL-HP-DUP-P_NEW

        $rsl_hp_dup_p_new = ServiceTemplate::firstOrCreate([
            'name'  => 'RSL-HP-DUP-P_NEW',
        ]);

        $rsl_hp_dup_p_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 960,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);

        $rsl_hp_dup_p_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Inspection Fee',
            'amount'    => 240,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]); 

        $rsl_hp_dup_p_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        //END RSL-HP-DUP-P_NEW

        //START RSL-MP-DUP-FX_NEW
        $rsl_mp_dup_fx_new = ServiceTemplate::firstOrCreate([
            'name'  => 'RSL-MP-DUP-FX_NEW',
        ]);

        $rsl_mp_dup_fx_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Construction Fee',
            'amount'    => 240,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        $rsl_mp_dup_fx_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 1320,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);

        $rsl_mp_dup_fx_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Inspection Fee',
            'amount'    => 480,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);

        $rsl_mp_dup_fx_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        //END RSL-MP-DUP-FX_NEW

        //START RSL-MP-DUP-FX-FB_New

        $rsl_mp_dup_fx_fb_new = ServiceTemplate::firstOrCreate([
            'name'  => 'RSL-MP-DUP-FX-FB_NEW',
        ]);

        $rsl_mp_dup_fx_fb_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Construction Fee',
            'amount'    => 240,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        $rsl_mp_dup_fx_fb_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 2160,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]); 

        $rsl_mp_dup_fx_fb_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Inspection Fee',
            'amount'    => 480,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);

        $rsl_mp_dup_fx_fb_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]); 

        //END RSL-MP-FX-FB_NEW

        $rsl_mp_dup_fb_new = ServiceTemplate::firstOrCreate([
            'name'  => 'RSL-MP-DUP-FB_NEW',
        ]);


        $rsl_mp_dup_fb_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Construction Fee',
            'amount'    => 240,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);        

        $rsl_mp_dup_fb_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 960,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);

        $rsl_mp_dup_fb_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Inspection Fee',
            'amount'    => 480,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);

        $rsl_mp_dup_fb_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        //END RSL-MP-DUP-FB_NEW

        $rsl_mp_dup_ml_new = ServiceTemplate::firstOrCreate([
            'name'  => 'RSL-MP-DUP-ML_NEW',
        ]);

        $rsl_mp_dup_ml_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Construction Fee',
            'amount'    => 240,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        $rsl_mp_dup_ml_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 1200,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);        

        $rsl_mp_dup_ml_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Inspection Fee',
            'amount'    => 240,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);        

        $rsl_mp_dup_ml_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        $rsl_mp_dup_p_new = ServiceTemplate::firstOrCreate([
            'name'  => 'RSL-MP-DUP-P_NEW',
        ]);

        $rsl_mp_dup_p_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 720,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);

        $rsl_mp_dup_p_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Inspection Fee',
            'amount'    => 240,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);

        $rsl_mp_dup_p_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        //END RSL-MP-P-NEW
        //START RSL-LP-DUP-FX_NEW
        $rsl_lp_dup_fx_new = ServiceTemplate::firstOrCreate([
            'name'  => 'RSL-LP-DUP-FX_NEW',
        ]);

        $rsl_lp_dup_fx_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Construction Fee',
            'amount'    => 600,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]); 

        $rsl_lp_dup_fx_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 1320,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        //END RSL-LP-DUP-FX_NEW

        //START RSL-LP-DUP-FX_New

         $rsl_lp_dup_fx_new = ServiceTemplate::firstOrCreate([
            'name'  => 'RSL-LP-DUP-FX_NEW',
        ]);


        $rsl_lp_dup_fx_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Construction Fee',
            'amount'    => 600,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        $rsl_lp_dup_fx_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 1320,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);

        $rsl_lp_dup_fx_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Inspection Feee',
            'amount'    => 480,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);

        $rsl_lp_dup_fx_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        //END RSL-LP-DUP-FX_NEW

        //START RSL-LP-DUP-FX-FB_New

        $rsl_lp_dup_fx_fb_new = ServiceTemplate::firstOrCreate([
            'name'  => 'RSL-LP-DUP-FX-FB_NEW',
        ]);

        $rsl_lp_dup_fx_fb_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Construction Fee',
            'amount'    => 240,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);        

        $rsl_lp_dup_fx_fb_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 1680,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);       

        $rsl_lp_dup_fx_fb_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Inspection Fee',
            'amount'    => 480,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);

        $rsl_lp_dup_fx_fb_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        //END RSL-LP-DUP-FX-FB_NEW

        //START RSL-LP-DUP-FB_NEW

        $rsl_lp_dup_fb_new = ServiceTemplate::firstOrCreate([
            'name'  => 'RSL-LP-DUP-FB_NEW',
        ]);

        $rsl_lp_dup_fb_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Construction Fee',
            'amount'    => 240,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        $rsl_lp_dup_fb_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 720,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);

        $rsl_lp_dup_fb_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Inspection Fee',
            'amount'    => 480,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);
        
        $rsl_lp_dup_fb_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        //END RSL-LP-DUP-FB_NEW

        $rsl_dup_lp_ml_new = ServiceTemplate::firstOrCreate([
            'name'  => 'RSL-LP-DUP-ML_NEW'
        ]);

        $rsl_dup_lp_ml_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Construction Fee',
            'amount'    => 240,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);     

        $rsl_dup_lp_ml_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 960,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);

        $rsl_dup_lp_ml_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Inspection Fee',
            'amount'    => 240,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);

        $rsl_dup_lp_ml_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        //END RSL-LP-DUP-ML_NEW

        //START RSL-LP-DUP-P_NEW
        $rsl_lp_dup_p_new = ServiceTemplate::firstOrCreate([
            'name'  => 'RSL-LP-DUP-P_NEW',
        ]);

        $rsl_lp_dup_p_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 480,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);

        $rsl_lp_dup_p_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'Inspection Fee',
            'amount'    => 240,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);        

        $rsl_lp_dup_p_new->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);
        //END RSL-LP-DUP-P_NEW

        //RLM RENEW
        $rlm_ren = ServiceTemplate::firstOrCreate([
            'name'  => 'RLM_REN',
        ]); 

        $rlm_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'ROC Fee',
            'amount'    => 60,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 1
        ]);

        $rlm_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        //END RLM_REN

        //START GROC_REN
        $groc_ren = ServiceTemplate::firstOrCreate([
            'name'  => 'GROC REN',
        ]);

        $groc_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'ROC Fee',
            'amount'    => 60,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 1
        ]);

        $groc_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        //END GROC REN

        //START 1PHN REN
        $phn_ren_1 = ServiceTemplate::firstOrCreate([
            'name'  => '1PHN REN',
        ]);

        $phn_ren_1->feeTemplates()->firstOrCreate([
            'name_fees' => 'ROC Fee',
            'amount'    => 120,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 1
        ]);

         $phn_ren_1->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);


        //END 1PHN REN

        //START 2RTG REN
        $rtg_ren_2 = ServiceTemplate::firstOrCreate([
            'name'  => '2RTG REN',
        ]);

        $rtg_ren_2->feeTemplates()->firstOrCreate([
            'name_fees' => 'ROC Fee',
            'amount'    => 120,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 1
        ]);

        $rtg_ren_2->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);
        //END 2RTG REN

        //START 2PHN REN
        $phn_ren_2  = ServiceTemplate::firstOrCreate([
            'name'  => '2PHN REN',
          
        ]);

        $phn_ren_2->feeTemplates()->firstOrCreate([
            'name_fees' => 'ROC Fee',
            'amount'    => 100,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 1
        ]);

        $phn_ren_2->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        //END 2PHN REN

        //START RMAP REN
        $rmap_ren =  ServiceTemplate::firstOrCreate([
            'name'  => 'RMAP REN',
        ]);

        $rmap_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'ROC Fee',
            'amount'    => 100,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 1
        ]);

        $rmap_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        //END RMAP REN


        //START 3PHN REN
        $phn_ren_3 = ServiceTemplate::firstOrCreate([
            'name'  => '3PHN REN',
        ]);

        $phn_ren_3->feeTemplates()->firstOrCreate([
            'name_fees' => 'ROC Fee',
            'amount'    => 60,
            'enabled_year_computation'  => 1,
            'enabled_surcharge'  => 1,
        ]);   

        $phn_ren_3->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge'  => 0,
        ]);
        //END 3PHN_REN

        //START 3RTG REN

        $rtg_ren_3  = ServiceTemplate::firstOrCreate([
            'name'  =>'3RTG REN',
        ]);
        
        $rtg_ren_3->feeTemplates()->firstOrCreate([
            'name_fees' => 'ROC Fee',
            'amount'    => 60,
            'enabled_year_computation'  => 1,
            'enabled_surcharge'  => 1,
        ]);   

        $rtg_ren_3->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge'  => 0,
        ]);

        //END 3RTG REN

        //START AT ROC REN

        $at_roc_ren = ServiceTemplate::firstOrCreate([
            'name'  =>'AT-ROC REN',
        ]);

        $at_roc_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'ROC Fee',
            'amount'    => 60,
            'enabled_year_computation'  => 1,
            'enabled_surcharge'  => 1,
        ]);   

        $at_roc_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge'  => 0,
        ]);
        //END AT-ROC-REN
        
        //START SROP REN

        $srop_ren  = ServiceTemplate::firstOrCreate([
            'name'  =>'SROP REN',
        ]);

        $srop_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'ROC Fee',
            'amount'    => 60,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 1
        ]);

        $srop_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge'  => 0,
        ]);

        //END SROP REN

        //START 1RTG REN

        $rtg_1_ren = ServiceTemplate::firstOrCreate([
            'name'  =>'1RTG REN',
        ]);

        $rtg_1_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'ROC Fee',
            'amount'    => 180,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 1
        ]);

        $rtg_1_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge'  => 0,
        ]);

        //END 1RTG REN

        //START AT-RSL-A REN
        $at_rsl_a_ren = ServiceTemplate::firstOrCreate([
            'name'  =>'AT-RSL-A REN',
        ]);

        $at_rsl_a_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad Station Lic Fee',
            'amount'    => 120,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 1
        ]);
 
        $at_rsl_a_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'ROC Fee',
            'amount'    => 60,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 1
        ]);

        $at_rsl_a_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        //END AT-RSL-A_REN

        //START AT-RSL_B_REN
        $at_rsl_b_ren = ServiceTemplate::firstOrCreate([
            'name'  =>'AT-RSL-B REN',
        ]);

        $at_rsl_b_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad Station Lic Fee',
            'amount'    => 132,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 1
        ]);


        $at_rsl_b_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'ROC Fee',
            'amount'    => 60,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 1
        ]);

        $at_rsl_b_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        //END AT-RSL-B-REN

        //AT_RSL-C_REN
        $at_rsl_c_ren = ServiceTemplate::firstOrCreate([
            'name'  =>'AT-RSL-C REN',
        ]);

        $at_rsl_c_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad Station Lic Fee',
            'amount'    => 144,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 1
        ]);

        $at_rsl_c_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'ROC Fee',
            'amount'    => 60,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 1
        ]);        

        $at_rsl_c_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        //END AT-RSL-C_REN 

        //START AT AT-RSL-D_Ren

        $at_rsl_d_ren = ServiceTemplate::firstOrCreate([
            'name'  =>'AT-RSL-D REN',
        ]);

        $at_rsl_d_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad Station Lic Fee',
            'amount'    => 156,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 1
        ]);       

        $at_rsl_d_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'ROC Fee',
            'amount'    => 60,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 1
        ]);

        $at_rsl_d_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        //END AT-RSL-D_REN
        //AT-Club-Simplex_REN
        $at_club_simplex_ren = ServiceTemplate::firstOrCreate([
            'name'  => 'AT-Club-Simplex_REN',
        ]);

        $at_club_simplex_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 700,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 1
        ]);        

        $at_club_simplex_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        //END AT-CLUB-SIMPLEX_REN

        $at_club_duplex_ren = ServiceTemplate::firstOrCreate([
            'name'  => 'AT-Club-Duplex_REN',
        ]);

        $at_club_duplex_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 1320,
            'enabled_year_computation'  => 1,
            'enabled_surcharge'  => 1,
        ]);        

        $at_club_duplex_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    =>  30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge'  => 0,
        ]);

        //AT-CLUB-DUPLEX-REN

        //START AIRCRAFT-RSL-HP_REN
        $aircraft_rsl_hp_ren = ServiceTemplate::firstOrCreate([
            'name'  => 'AIRCRAFT-RSL-HP_REN',
        ]);

        $aircraft_rsl_hp_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 1320,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 1
        ]);

        $aircraft_rsl_hp_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Inspection Fee',
            'amount'    => 720,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);

        $aircraft_rsl_hp_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        //END AIRCRAFT-RSL-HP_REN

        //START AIRCRAFT-RSL-MP_REN

        $aircraft_rsl_mp_ren = ServiceTemplate::firstOrCreate([
            'name'  => 'AIRCRAFT-RSL-MP_REN',
        ]);

        $aircraft_rsl_mp_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 1080,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 1
        ]);

        $aircraft_rsl_mp_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Inspection Fee',
            'amount'    => 720,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);        

        $aircraft_rsl_mp_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        //END AIRCRAFT_RSL_MP_REN

        //START AIRCRAFT-RSL-LP_Ren
        
        $aircraft_rsl_lp_ren = ServiceTemplate::firstOrCreate([
            'name'  => 'AIRCRAFT-RSL-LP_REN',
        ]);

        $aircraft_rsl_lp_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 840,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 1
        ]);

        $aircraft_rsl_lp_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Inspection Fee',
            'amount'    => 720,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);

        $aircraft_rsl_lp_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]); 

        //END AIRCRAFT-RSL-LP-REN

        //START FA HP REN
        $fa_hp_ren = ServiceTemplate::firstOrCreate([
            'name'  => 'FA-HP_REN',
        ]);
        
        $fa_hp_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 1080,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 1,
        ]);


        $fa_hp_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Inspection Fee',
            'amount'    => 720,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0,
        ]);

        $fa_hp_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0,
        ]);

        //END FA HP-REN
        //START FA MP REN
        $fa_mp_ren = ServiceTemplate::firstOrCreate([
            'name'  => 'FA-MP_REN',
        ]);

        $fa_mp_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 960,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 1
        ]);         

        $fa_mp_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Inspection Fee',
            'amount'    => 720,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]); 

        $fa_mp_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]); 

        //END FA MP_REN

        //START FA LP REN
        $fa_lp_ren = ServiceTemplate::firstOrCreate([
            'name'  => 'FA-LP_REN',
        ]);

        $fa_lp_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 840,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]); 

        $fa_lp_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Inspection Fee',
            'amount'    => 840,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]); 

        $fa_lp_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]); 

        //END FA LP REN

        $ms_hp_ren = ServiceTemplate::firstOrCreate([
            'name'  => 'MS-HP_REN',   
        ]);

        $ms_hp_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 840,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 1
        ]);

        $ms_hp_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Inspection Fee',
            'amount'    => 720,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);
                
        $ms_hp_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);
        
        //END MS_HP_REN
        //START MS MP REN
        $ms_mp_ren = ServiceTemplate::firstOrCreate([
            'name'  => 'MS-MP_REN',
        ]);

        $ms_mp_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 720,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 1
        ]);         

        $ms_mp_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Inspection Fee',
            'amount'    => 720,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]); 

        $ms_mp_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]); 
        
        //END MS MP REN

        $ms_lp_ren = ServiceTemplate::firstOrCreate([
            'name'  => 'MS-LP_REN',  
        ]);

        $ms_lp_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 600,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 1,
        ]);

        $ms_lp_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Inspection Fee',
            'amount'    => 720,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0,
        ]);        

        $ms_lp_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0,
        ]);
        //END MS LP REN

        $secs_ren = ServiceTemplate::firstOrCreate([
            'name'  => 'SESC_REN',
        ]);

        $secs_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 1440,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 1
        ]);
        $secs_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Inspection Fee',
            'amount'    => 1200,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);
        
        $secs_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        //END SECS REN

        //START LRIT REN
        
        $lrit_ren = ServiceTemplate::firstOrCreate([
            'name'  => 'LRIT_REN',
        ]);

        $lrit_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 1440,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 1
        ]);
        $lrit_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Inspection Fee',
            'amount'    => 1200,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);
        
        $lrit_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        //END LRIT REN

        //START SSAS REN
        $ssas_ren = ServiceTemplate::firstOrCreate([
            'name'  => 'SSAS_REN',
        ]);

        $ssas_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 1440,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 1
        ]);
        $ssas_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Inspection Fee',
            'amount'    => 1200,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);
        
        $ssas_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);
        //END SSAS REM

        //START SESFB

        $sesfb_ren = ServiceTemplate::firstOrCreate([
            'name'  => 'SESFB_REN',
          
        ]);

        $sesfb_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 1440,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 1
        ]);
        $sesfb_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Inspection Fee',
            'amount'    => 1200,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);
        
        $sesfb_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);
        //END SESFB_REN

        //START IN SRSL REN
        $int_srsl_ren = ServiceTemplate::firstOrCreate([
            'name'  => 'INT-SRSL_REN', 
        ]);

        $int_srsl_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 1500,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 1
        ]);

        $int_srsl_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Inspection Fee',
            'amount'    => 1200,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);

        $int_srsl_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]); 

        //END INT SRSL REN

        //START FC_HP_REN
        $fc_hp_ren = ServiceTemplate::firstOrCreate([
            'name'  => 'FC-HP_REN',
         
        ]);        

        $fc_hp_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 1440,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 1,
        ]);        

        $fc_hp_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Inspection Fee',
            'amount'    => 720,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0,
        ]);        

        $fc_hp_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0,
        ]);

        //END FC HP REN

        //START FC MP REN
        $fc_mp_ren = ServiceTemplate::firstOrCreate([
            'name'  => 'FC-MP_REN',
        ]);

        $fc_mp_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 1200,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 1
        ]);   

        $fc_mp_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Inspection Fee',
            'amount'    => 720,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);

        $fc_mp_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        //END FC_MP_REN

        //START FC_LP_REN
        $fc_lp_ren = ServiceTemplate::firstOrCreate([
            'name'  => 'FC-LP_REN',
        ]);

        $fc_lp_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 1080,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 1
        ]);

        $fc_lp_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Inspection Fee',
            'amount'    => 720,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);

        $fc_lp_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        //END FC_LP_REN
        //START RADIO TELEPHONY HF REN
        $radio_telephony_hf_ren = ServiceTemplate::firstOrCreate([
            'name'  => 'RADIO-TELEPHONY-HF_REN',
        ]);

        $radio_telephony_hf_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 720,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 1,
        ]);

        $radio_telephony_hf_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Inspection Fee',
            'amount'    => 720,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0,
        ]);

        $radio_telephony_hf_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0,
        ]);

        //END RADIO TELEPHONY HF REN

        $radio_telephony_vhf_ren = ServiceTemplate::firstOrCreate([
            'name'  => 'RADIO-TELEPHONY-VHF_REN',
        ]);

        $radio_telephony_vhf_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 480,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 1,
        ]);

        $radio_telephony_vhf_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Inspection Fee',
            'amount'    => 480,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0,
        ]);

        $radio_telephony_vhf_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0,
        ]);

        //END RADIO TELEPHONY VHF REN

        //START RSL HP SIM FX REN
        $rsl_sim_hp_fx_ren = ServiceTemplate::firstOrCreate([
            'name'  => 'RSL-HP-SIM-FX_REN', 
        ]);

        $rsl_sim_hp_fx_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 600,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 1
        ]);

        $rsl_sim_hp_fx_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Inspection Fee',
            'amount'    => 480,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);        

        $rsl_sim_hp_fx_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        //END SIM HP FX REN

        //START RSL-HP-SIM-FX-FB_REN

        $rsl_sim_hp_fx_fb_ren = ServiceTemplate::firstOrCreate([
            'name'  => 'RSL-HP-SIM-FX-FB_REN',
         
        ]);

        $rsl_sim_hp_fx_fb_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 1320,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 1
        ]);

        $rsl_sim_hp_fx_fb_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Inspection Fee',
            'amount'    => 480,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);

        $rsl_sim_hp_fx_fb_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        //END RSL SIM HP FX FB REN

        //START RSL-HP-SIM-FB_REN

        $rsl_hp_sim_fb_ren = ServiceTemplate::firstOrCreate([
            'name'  => 'RSL-HP-SIM-FB_REN',
        ]);

        $rsl_hp_sim_fb_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 720,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 1,
        ]);        

        $rsl_hp_sim_fb_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Inspection Fee',
            'amount'    => 480,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0,
        ]);

        $rsl_hp_sim_fb_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0,
        ]);

        //END RSL SIM HP FB REN

        //START RSL-HP-SIM-ML_Ren
        $rsl_sim_hp_ml_ren = ServiceTemplate::firstOrCreate([
            'name'  => 'RSL-HP-SIM-ML_REN',
        ]);

        $rsl_sim_hp_ml_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 480,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 1,
        ]);

        $rsl_sim_hp_ml_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Inspection Fee',
            'amount'    => 240,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0,
        ]);

        $rsl_sim_hp_ml_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0,
        ]);

        //END RSL SIM-HP-ML_REN

        //START  RSL-HP-SIM-P_REN
        $rsl_sim_hp_p_ren = ServiceTemplate::firstOrCreate([
            'name'  => 'RSL-HP-SIM-P_REN',
        ]);

        $rsl_sim_hp_p_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 480,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 1,
        ]);        

        $rsl_sim_hp_p_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Inspection Fee',
            'amount'    => 240,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0,
        ]);        

        $rsl_sim_hp_p_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0,
        ]);

        //END RSL SIM HP P REN

        //START 

        $rsl_mp_sim_fx_ren = ServiceTemplate::firstOrCreate([
            'name'  => 'RSL-MP-SIM-FX_REN',
          
        ]);

        $rsl_mp_sim_fx_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 480,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 1,
        ]);

        $rsl_mp_sim_fx_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Inspection Fee',
            'amount'    => 480,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0,
        ]);

        $rsl_mp_sim_fx_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0,
        ]);
        //END RSL MP SIM FX REN

        //START 

        $rsl_sim_mp_fx_fb_ren = ServiceTemplate::firstOrCreate([
            'name'  => 'RSL-MP-SIM-FX-FB_REN',
        ]);

        $rsl_sim_mp_fx_fb_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 1080,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 1
        ]);        

        $rsl_sim_mp_fx_fb_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Inspection Fee',
            'amount'    => 480,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);        

        $rsl_sim_mp_fx_fb_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        //END RSL MP SIM FX FB REN

        $rsl_mp_sim_fb_ren = ServiceTemplate::firstOrCreate([
            'name'  => 'RSL-MP-SIM-FB_REN',
        ]);

        $rsl_mp_sim_fb_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 600,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 1
        ]);

        $rsl_mp_sim_fb_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Inspection Fee',
            'amount'    => 480,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);

        $rsl_mp_sim_fb_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        //END RSL MP SIM FB REN

        //START RSL-MP-SIM-ML_Ren

        $rsl_mp_sim_ml_ren = ServiceTemplate::firstOrCreate([
            'name'  => 'RSL-MP-SIM-ML_REN',
        ]);

        $rsl_mp_sim_ml_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 360,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 1,
        ]);        

        $rsl_mp_sim_ml_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Inspection Fee',
            'amount'    => 240,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0,
        ]);

        $rsl_mp_sim_ml_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0,
        ]);

        //END RSL MP SIM ML REN

        //START 

        $rsl_mp_sim_p_ren = ServiceTemplate::firstOrCreate([
            'name'  => 'RSL-MP-SIM-P_REN',
        ]);

        $rsl_mp_sim_p_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 360,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 1
        ]);        

        $rsl_mp_sim_p_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Inspection Fee',
            'amount'    => 240,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);

        $rsl_mp_sim_p_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);
        
        //END RSL_MP_SIM_P REN

        //START RSL-LP-SIM-FX_REN
        $rsl_sim_lp_fx_ren = ServiceTemplate::firstOrCreate([
            'name'  => 'RSL-LP-SIM-FX_REN',
        ]);

        $rsl_sim_lp_fx_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 360,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 1,
        ]);       

        $rsl_sim_lp_fx_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Inspection Fee',
            'amount'    => 480,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 1,
        ]);        

        $rsl_sim_lp_fx_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0,
        ]);

        //END RSL-SIM-LP-FX_REN

        //START RSL-LP-SIM-FX-FB_REN

        $rsl_sim_lp_fx_fb_ren = ServiceTemplate::firstOrCreate([
            'name'      => 'RSL-LP-SIM-FX-FB_REN', 
        ]);

        $rsl_sim_lp_fx_fb_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 840,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 1
        ]);

        $rsl_sim_lp_fx_fb_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Inspection Fee',
            'amount'    => 480,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);        

        $rsl_sim_lp_fx_fb_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        //END RSL-SIM-LP-FX-FB_REN 

        //START RSL-LP-SIM-FB_REN
        $rsl_sim_lp_fb_ren = ServiceTemplate::firstOrCreate([
            'name'  => 'RSL-LP-SIM-FB_REN',
       
        ]);

        $rsl_sim_lp_fb_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 480,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 1
        ]);

        $rsl_sim_lp_fb_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Inspection Fee',
            'amount'    => 480,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);

        $rsl_sim_lp_fb_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        //END RSL SIM LP FB REN

        //START RSL-LP-SIM-ML_REN

        $rsl_lp_sim_ml_ren = ServiceTemplate::firstOrCreate([
            'name'  => 'RSL-LP-SIM-ML_REN',
        ]);

        $rsl_lp_sim_ml_ren->feeTemplates()->firstOrCreate([
            'name_fees'  => 'Rad. Station Lic. Fee',
            'amount'    => 240,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 1
        ]);

        $rsl_lp_sim_ml_ren->feeTemplates()->firstOrCreate([
            'name_fees'  => 'Inspection Fee',
            'amount'    => 240,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);

        $rsl_lp_sim_ml_ren->feeTemplates()->firstOrCreate([
            'name_fees'  => 'Inspection Fee',
            'amount'    => 240,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);

        $rsl_lp_sim_ml_ren->feeTemplates()->firstOrCreate([
            'name_fees'  => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        //END RSL LP SIM ML REN

        //START RSL-LP-SIM-P_Ren

        $rsl_sim_lp_p_ren = ServiceTemplate::firstOrCreate([
            'name'  => 'RSL-LP-SIM-P_REN',
        ]);

        $rsl_sim_lp_p_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 240,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 1
        ]);

        $rsl_sim_lp_p_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Inspection Fee',
            'amount'    => 240,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);

        $rsl_sim_lp_p_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        // END  RSL SIM LP P REN

        // START RSL-HP-DUP-FX_REN
        $rsl_dup_hp_fx_ren = ServiceTemplate::firstOrCreate([
            'name'  => 'RSL-HP-DUP-FX_REN',
        ]);

        $rsl_dup_hp_fx_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 1200,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 1
        ]);
         
        $rsl_dup_hp_fx_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Inspection Fee',
            'amount'    => 480,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);

        $rsl_dup_hp_fx_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        //END RSL-HP-DUP-FX_REN

        //START RSL-HP-DUP-FX-FB_REN

        $rsl_dup_hp_fx_fb_ren = ServiceTemplate::firstOrCreate([
            'name'  => 'RSL-HP-DUP-FX-FB_REN',
       
        ]);

        $rsl_dup_hp_fx_fb_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 2640,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 1
        ]);

        $rsl_dup_hp_fx_fb_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Inspection Fee',
            'amount'    => 480,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);

        $rsl_dup_hp_fx_fb_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        //END RSL-DUP-HP-FX-FB_REN
        //START RSL DUP HP_FB_REN

        $rsl_dup_hp_fb_ren = ServiceTemplate::firstOrCreate([
            'name'  => 'RSL-HP-DUP-FB_REN',
        
        ]);

        $rsl_dup_hp_fb_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 1200,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 1,
        ]);

        $rsl_dup_hp_fb_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Inspection Fee',
            'amount'    => 480,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0,
        ]);        

        $rsl_dup_hp_fb_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0,
        ]);

        //END RSL-HP-DUP-FB_REN

        //START RSL-HP-DUP-ML_REN

        $rsl_hp_dup_ml_ren = ServiceTemplate::firstOrCreate([
            'name'  => 'RSL-HP-DUP-ML_REN',
        ]); 

        $rsl_hp_dup_ml_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 1440,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 1
        ]);

        $rsl_hp_dup_ml_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Inspection Fee',
            'amount'    => 240,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);

        $rsl_hp_dup_ml_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        //END RSL_HP_DUP_ML_REN

        $rsl_dup_hp_p_ren = ServiceTemplate::firstOrCreate([
            'name'  => 'RSL-HP-DUP-P_REN',
        ]);

        $rsl_dup_hp_p_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 960,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 1
        ]);

        $rsl_dup_hp_p_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Inspection Fee',
            'amount'    => 240,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);        

        $rsl_dup_hp_p_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        //END RSL-HP-DUP-P_REN

        //START 

        $rsl_mp_dup_fx_ren = ServiceTemplate::firstOrCreate([
            'name'  => 'RSL-MP-DUP-FX_REN',
        ]);

        $rsl_mp_dup_fx_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 1320,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 1
        ]);

        $rsl_mp_dup_fx_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Inspection Fee',
            'amount'    => 480,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);

        $rsl_mp_dup_fx_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        //END RSL MP_DUP_FX_REN

        //START RSL-MP-DUP-FX-FB_REN

        $rsl_mp_dup_fx_fb_ren = ServiceTemplate::firstOrCreate([
            'name'  => 'RSL-MP-DUP-FX-FB_REN',
        ]);

        $rsl_mp_dup_fx_fb_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 2160,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 1
        ]);

        $rsl_mp_dup_fx_fb_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Inspection Fee',
            'amount'    => 480,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);

        $rsl_mp_dup_fx_fb_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        //END RSL MP DUP FX FB REN

        //START 

        $rsl_mp_dup_fb_ren = ServiceTemplate::firstOrCreate([
            'name'  => 'RSL-MP-DUP-FB_REN',
        ]);

        $rsl_mp_dup_fb_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 960,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 1
        ]);

        $rsl_mp_dup_fb_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Inspection Fee',
            'amount'    => 480,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);

        $rsl_mp_dup_fb_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        //END RSL_MP_DUP_FB_REN

        //START 

        $rsl_mp_dup_ml_ren = ServiceTemplate::firstOrCreate([
            'name'  => 'RSL-MP-DUP-ML_REN', 
        ]);

        $rsl_mp_dup_ml_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 1200,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 1,
        ]);

        $rsl_mp_dup_ml_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Inspection Fee',
            'amount'    => 240,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0,
        ]);

        $rsl_mp_dup_ml_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0,
        ]);

        //END RSL_MP_DUP_ML_REN
        //START RSL-MP-DUP-P_REN


        $rsl_dup_mp_p_ren = ServiceTemplate::firstOrCreate([
            'name'  => 'RSL-MP-DUP-P_REN',
        ]);

        $rsl_dup_mp_p_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 720,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 1
        ]);

        $rsl_dup_mp_p_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Inspection Fee',
            'amount'    => 240,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);

        $rsl_dup_mp_p_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        //END RSL_MP_DUP_P_REN

        //START RSL-LP-DUP-FX_REN

        $rsl_lp_dup_fx_ren = ServiceTemplate::firstOrCreate([
            'name'  => 'RSL-LP-DUP-FX_REN',
        ]);

        $rsl_lp_dup_fx_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 1320,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 1
        ]); 

        $rsl_lp_dup_fx_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Inspection Fee',
            'amount'    => 480,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]); 

        $rsl_lp_dup_fx_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]); 

        //END RSL-LP-DUP_FX_REN

        //START 
        $rsl_lp_dup_fx_fb_ren = ServiceTemplate::firstOrCreate([
            'name'  => 'RSL-LP-DUP-FX-FB_REN',
        ]);

        $rsl_lp_dup_fx_fb_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 1680,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 1,
        ]);

        $rsl_lp_dup_fx_fb_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Inspection Fee',
            'amount'    => 480,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0,
        ]);

        $rsl_lp_dup_fx_fb_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0,
        ]);

        //END RSL LP DUP FX FB REN
        $rsl_dup_lp_fb_ren = ServiceTemplate::firstOrCreate([
            'name'  => 'RSL-LP-DUP-FB_REN',
        ]);

        $rsl_dup_lp_fb_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 720,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 1,
        ]);        

        $rsl_dup_lp_fb_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Inspection Fee',
            'amount'    => 480,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0,
        ]);

        $rsl_dup_lp_fb_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0,
        ]);

        //END RSL DUP LP FB REN

        //START 

        $rsl_lp_dup_ml_ren = ServiceTemplate::firstOrCreate([
            'name'  => 'RSL-LP-DUP-ML_REN',
        ]);

        $rsl_lp_dup_ml_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 960,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 1,
        ]);        

        $rsl_lp_dup_ml_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Inspection Fee',
            'amount'    => 240,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0,
        ]);

        $rsl_lp_dup_ml_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0,
        ]);

        //END RSL LP DUP ML REN

        //START RSL-LP-DUP-P_REN

        $rsl_dup_lp_p_ren = ServiceTemplate::firstOrCreate([
            'name'  => 'RSL-LP-DUP-P_REN',
        ]);

        $rsl_dup_lp_p_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad. Station Lic. Fee',
            'amount'    => 480,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 1
        ]);        

        $rsl_dup_lp_p_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'Inspection Fee',
            'amount'    => 240,
            'enabled_year_computation'  => 1,
            'enabled_surcharge' => 0
        ]);        

        $rsl_dup_lp_p_ren->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        //OTHERS FEE
        
        //START EXAMINATION FEE
        $examination = ServiceTemplate::firstOrCreate([
            'name'  => 'Examination'
        ]);

        $examination->feeTemplates()->firstOrCreate([
            'name_fees' => 'Exam Fee',
            'amount'    => 50,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        //END EXAMINATION FEE

        //START DUPLICATE FEE

        $duplicate = ServiceTemplate::firstOrCreate([
            'name'  => 'Duplicate'
        ]);

        $duplicate->feeTemplates()->firstOrCreate([
            'name_fees' => 'Dup Fee',
            'amount'    => 120,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        //END DUP

        //START ROC_MOD

        $at_roc_mod = ServiceTemplate::firstOrCreate([
            'name'  => 'AT-ROC_MOD'
        ]);

        $at_roc_mod->feeTemplates()->firstOrCreate([
            'name_fees' => 'Mod Fee',
            'amount'    => 50,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);        

        $at_roc_mod->feeTemplates()->firstOrCreate([
            'name_fees' => 'Filing Fee',
            'amount'    => 60,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        $at_roc_mod->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        //END AT ROC_MOD

        //START COM ROC MOD

        $com_roc_mod = ServiceTemplate::firstOrCreate([
            'name'  => 'COM-ROC_MOD'
        ]);

        $com_roc_mod->feeTemplates()->firstOrCreate([
            'name_fees' => 'Mod Fee',
            'amount'    => 120,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);        

        $com_roc_mod->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        //END COM ROC MOD

        //START 
        $at_rsl_mod  = ServiceTemplate::firstOrCreate([
            'name'  => 'AT-RSL_MOD'
        ]);

        $at_rsl_mod->feeTemplates()->firstOrCreate([
            'name_fees' => 'Filing Fee',
            'amount'    => 60,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        $at_rsl_mod->feeTemplates()->firstOrCreate([
            'name_fees' => 'Mod Fee',
            'amount'    => 50,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        $at_rsl_mod->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        //END AT RSL MOD

        //START AT LIFETIME

        $at_lifeTime = ServiceTemplate::firstOrCreate([
            'name'  => 'AT-Lifetime',
        ]);

        $at_lifeTime->feeTemplates()->firstOrCreate([
            'name_fees' => 'Filing Fee',
            'amount'    => 60,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);        

        $at_lifeTime->feeTemplates()->firstOrCreate([
            'name_fees' => 'Rad Station Lic Fee',
            'amount'    => 50,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        $at_lifeTime->feeTemplates()->firstOrCreate([
            'name_fees' => 'DST',
            'amount'    => 30,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        //END AT LIFETIME


        //Others Fee
        $reg_porta = ServiceTemplate::firstOrCreate([
            'name'  => 'REG_PORTA'
        ]);

        $reg_porta->feeTemplates()->firstOrCreate([
            'name_fees' => 'Registration Fee',
            'amount'    => 1500,
            'enabled_year_computation'  => 0,
            'enabled_surcharge' => 0
        ]);

        


    }       
}

