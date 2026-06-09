<?php

use Illuminate\Database\Seeder;

use App\ServiceTemplate;

class ServiceFeeTemplateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// ROC 
        $rlm_new = ServiceTemplate::create([
        	'name'	=> 'RLM_NEW',
        ]);

        $groc_new = ServiceTemplate::create([
        	'name'	=> 'GROC_NEW',
        ]);

        $phn_new_1 = ServiceTemplate::create([
        	'name'	=> '1PHN_NEW'
        ]);

        $rtg_new_2 = ServiceTemplate::create([
        	'name'	=> '2RTG_NEW',
        ]);

        $phn_new_2 = ServiceTemplate::create([
        	'name'	=> '2PHN_NEW',
        ]);

        $rmap_new = ServiceTemplate::create([
        	'name'	=> 'RMAP_NEW',
        ]);

        $phn_new_3 = ServiceTemplate::create([
        	'name'	=> '3PHN_NEW'
        ]);

        $rtg_new_3 = ServiceTemplate::create([
        	'name'	=> '3RTG_NEW',
        ]);

        $at_roc_new = ServiceTemplate::create([
        	'name'	=> 'AT-ROC_NEW',
        ]);

        $srop_fb_new = ServiceTemplate::create([
        	'name'	=> 'SROP_NEW',
        ]);

        $rtg_new_1 = ServiceTemplate::create([
        	'name'	=> '1RTG_NEW'
        ]);

         // AMATEUR with ROC and RSL

        $at_rsl_a_new = ServiceTemplate::create([
        	'name'	=> 'AT-RSL-A_NEW',
        ]);

        $at_rsl_b_new = ServiceTemplate::create([
        	'name' => 'AT-RSL-B_NEW',
        ]);

        $at_rsl_c_new = ServiceTemplate::create([
        	'name'	=> 'AT-RSL-C_NEW',
        ]);

        $at_rsl_d_new = ServiceTemplate::create([
        	'name'	=> 'AT-RSL-D_NEW'
        ]);

        // $at_club_simplex_new = ServiceTemplate::create([
        // 	'name'	=>	'AT-CLUB-SIMPLEX_NEW',
        // ]);

        //  $at_club_duplex_new = ServiceTemplate::create([
        //     'name'  => 'AT-CLUB-DUPLEX_NEW',
      
        // ]);

        // $aircraft_rsl_hp_new = ServiceTemplate::create([

        //     'name'  => 'AIRCRAFT-RSL-HP_NEW',

        // ]);

        // $aircraft_rsl_mp_new = ServiceTemplate::create([

        //     'name'  => 'AIRCRAFT-RSL-MP_NEW',
          

        // ]);

        // $aircraft_rsl_lp_new = ServiceTemplate::create([
        //     'name'  => 'AIRCRAFT-RSL-LP_NEW',
        // ]);


        // $fa_hp_new = ServiceTemplate::create([
        //     'name'  => 'FA-HP_NEW',
          
        // ]);

        // $fa_mp_new = ServiceTemplate::create([
        //     'name'  => 'FA-MP_New',
        // ]);

        // $fa_lp_new = ServiceTemplate::create([

        //     'name'  => 'FA-LP_NEW',

        // ]);


        // $ms_hp_new = ServiceTemplate::create([
        //     'name'  => 'MS-HP_NEW',
        // ]);

        // $ms_mp_new = ServiceTemplate::create([
        //     'name'  => 'MS-MP_NEW',
        // ]);

        // $ms_lp_new = ServiceTemplate::create([
        //     'name'  => 'MS-LP_NEW',
        // ]);


        // $secs = ServiceTemplate::create([
        //     'name'  => 'SESC_NEW',
        // ]);

        // $lrit = ServiceTemplate::create([

        //     'name'  => 'LRIT_NEW',
        // ]);


        // $ssas = ServiceTemplate::create([

        //     'name'  => 'SSAS_NEW',
        // ]);

        // $sesfb = ServiceTemplate::create([
        //     'name'  => 'SESFB_NEW',
        // ]);


        // $int_srsl_hp_new = ServiceTemplate::create([
        //     'name'  => 'Int-SRSL-HP_NEW',
        // ]);

        // $int_srsl_mp_new = ServiceTemplate::create([
        //     'name'  => 'Int-SRSL-MP_NEW',
        // ]);


        // $int_srsl_lp_new = ServiceTemplate::create([
        //     'name'  => 'Int-SRSL-LP_NEW',
        // ]);

        // $fc_hp_new = ServiceTemplate::create([
        //     'name'  => 'FC-HP_NEW',
        // ]);

        // $fc_mp_new = ServiceTemplate::create([
        //     'name'  => 'FC-MP_NEW',
        // ]);

        // $fc_lp_new = ServiceTemplate::create([
        //     'name'  => 'FC-LP_NEW',
        // ]);

        // $radio_telephony_hf_new = ServiceTemplate::create([
        //     'name'  => 'RADIO-TELEPHONY-HF_NEW',
        // ]);


        // $radio_telephony_vhf_new = ServiceTemplate::create([
        //     'name'  => 'RADIO-TELEPHONY-VHF_NEW',
        // ]);

        // $rsl_sim_hp_fx_new = ServiceTemplate::create([
        //     'name'  => 'RSL-SIM-HP-FX_New',
        //     'construction_permit_fee' => 240,
        //     'radio_station_license_fee' => 1320,
        //     'inspection_fee'    => 480,
        //     'dst_fee'   => 30,
        //     'types'     => 'NEW'

        // ]);



        $rsl_hp_sim_fx_new = ServiceTemplate::create([
            'name'  => 'RSL-HP-SIM-FX_New',
        ]);


        // $rsl_sim_hp_fx_fb_new = ServiceTemplate::create([
        //     'name'  => 'RSL-SIM-HP-FX-FB_New',
        //     'construction_permit_fee' => 240,
        //     'radio_station_license_fee' => 1320,
        //     'inspection_fee'    => 480,
        //     'dst_fee'   => 30,
        //     'types'     => 'NEW'
        // ]);


        $rsl_hp_sim_fx_fb_new = ServiceTemplate::create([
            'name'  => 'RSL-HP-SIM-FX-FB_NEW',
       
        ]);



        $rsl_hp_sim_fb_new = ServiceTemplate::create([
            'name'  => 'RSL-HP-SIM-FB_NEW',
        ]);

        $rsl_hp_sim_ml_new = ServiceTemplate::create([
            'name'  => 'RSL-HP-SIM-ML_NEW',
        ]);


        $rsl_hp_sim_p_new = ServiceTemplate::create([
            'name'  => 'RSL-HP-SIM-P_NEW',
        ]);

        $rsl_mp_sim_fx_new = ServiceTemplate::create([
            'name'  => 'RSL-MP-SIM-FX_NEW',
        ]);


        $rsl_mp_sim_fx_fb_new = ServiceTemplate::create([
            'name'  => 'RSL-MP-SIM-FX-FB_NEW',
        ]);


         $rsl_mp_sim_fb_new = ServiceTemplate::create([
            'name' => 'RSL-MP-SIM-FB_NEW',

        ]);


        $rsl_mp_sim_ml_new = ServiceTemplate::create([
            'name'  => 'RSL-MP-SIM-ML_NEW',
        ]);



        $rsl_mp_sim_p_new = ServiceTemplate::create([
            'name'  => 'RSL-MP-SIM-P_NEW',
        ]);
  

        $rsl_lp_sim_fx_new = ServiceTemplate::create([
            'name'  => 'RSL-LP-SIM-FX_NEW',
        ]);

        $rsl_lp_sim_fx_fb_new = ServiceTemplate::create([
            'name'  => 'RSL-LP-SIM-FX-FB_NEW',

        ]);

        $rsl_lp_sim_fb_new = ServiceTemplate::create([
            'name'  => 'RSL-LP-SIM-FB_NEW',
        ]);

        $rsl_lp_sim_ml_new = ServiceTemplate::create([
            'name'  => 'RSL-LP-SIM-ML_NEW',

        ]);


        $rsl_lp_sim_p_new = ServiceTemplate::create([
            'name'  => 'RSL-LP-SIM-P_NEW',

        ]);

        $rsl_hp_dup_fx_new = ServiceTemplate::create([
            'name'  => 'RSL-HP-DUP-FX_NEW',
        ]);

        $rsl_hp_dup_fx_fb_new = ServiceTemplate::create([
            'name'  => 'RSL-HP-DUP-FX_FB_NEW',
        ]);

        $rsl_hp_dup_fb_new = ServiceTemplate::create([
            'name'  => 'RSL-HP-DUP-FB_NEW',
        ]);

        $rsl_hp_dup_ml_new = ServiceTemplate::create([
            'name'  => 'RSL-HP-DUP-ML_NEW',

        ]);

        $rsl_hp_dup_p_new = ServiceTemplate::create([
            'name'  => 'RSL-HP-DUP-P_NEW',
        ]);

        $rsl_mp_dup_fx_new = ServiceTemplate::create([
            'name'  => 'RSL-MP-DUP-FX_NEW',
        ]);

        $rsl_mp_dup_fx_fb_new = ServiceTemplate::create([
            'name'  => 'RSL-MP-DUP-FX-FB_NEW',
        ]);

        $rsl_mp_dup_fb_new = ServiceTemplate::create([
            'name'  => 'RSL-MP-DUP-FB_NEW',
        ]);

        $rsl_mp_dup_ml_new = ServiceTemplate::create([
            'name'  => 'RSL-MP-DUP-ML_NEW',
        ]);

        $rsl_mp_dup_p_new = ServiceTemplate::create([
            'name'  => 'RSL-MP-DUP-P_NEW',
        ]);

        $rsl_lp_dup_fx_new = ServiceTemplate::create([
            'name'  => 'RSL-LP-DUP-FX_NEW',
        ]);

        $rsl_lp_dup_fx_fb_new = ServiceTemplate::create([
            'name'  => 'RSL-LP-DUP-FX-FB_NEW',
        ]);

        $rsl_lp_dup_fb_new = ServiceTemplate::create([
            'name'  => 'RSL-LP-DUP-FB_NEW',
        ]);


        $rsl_dup_lp_ml_new = ServiceTemplate::create([
            'name'  => 'RSL-LP-DUP-ML_NEW'
        ]);

        $rsl_lp_dup_p_new = ServiceTemplate::create([
            'name'  => 'RSL-LP-DUP-P_NEW',

        ]);

        //Renewal

        $rlm_ren = ServiceTemplate::create([

            'name'  => 'RLM_REN',

        ]);

        $groc_ren = ServiceTemplate::create([
            'name'  => 'GROC REN',
         
        ]);

        $phn_ren_1 = ServiceTemplate::create([
            'name'  => '1PHN REN',
          
        ]);

        $rtg_ren_2 = ServiceTemplate::create([
            'name'  => '2RTG REN',
          
        ]);

        $phn_ren_2  = ServiceTemplate::create([
            'name'  => '2PHN REN',
          
        ]);

        $rmap_ren =  ServiceTemplate::create([
            'name'  => 'RMAP REN',
          
        ]);

        $phn_ren_3 = ServiceTemplate::create([
            'name'  => '3PHN REN',
       
        ]);

        $rtg_ren_3  = ServiceTemplate::create([
            'name'  =>'3RTG REN',
        
        ]);

        $at_roc_ren = ServiceTemplate::create([
            'name'  =>'AT-ROC REN',
          
        ]);

        $srop_ren = ServiceTemplate::create([
            'name'  =>'SROP REN',
         
        ]);

        $rtg_1_ren = ServiceTemplate::create([
            'name'  =>'1RTG REN',
           
        ]);

        $at_rsl_a_ren = ServiceTemplate::create([
            'name'  =>'AT-RSL-A REN',
         
        ]);

        $at_rsl_b_ren = ServiceTemplate::create([
            'name'  =>'AT-RSL-B REN',
        
        ]);

        $at_rsl_c_ren = ServiceTemplate::create([
            'name'  =>'AT-RSL-C REN',
         
        ]);

        $at_rsl_d_ren = ServiceTemplate::create([
            'name'  =>'AT-RSL-D REN',
        
        ]);


        $at_club_simplex_ren = ServiceTemplate::create([
            'name'  => 'AT-Club-Simplex_REN',
          
        ]);

        $at_club_duplex_ren = ServiceTemplate::create([
            'name'  => 'AT-Club-Duplex_REN',
          
        ]);

        $aircraft_rsl_hp_ren = ServiceTemplate::create([
            'name'  => 'AIRCRAFT-RSL-HP_REN',
         
        ]);

        $aircraft_rsl_mp_ren = ServiceTemplate::create([
            'name'  => 'AIRCRAFT-RSL-MP_REN',
           
        ]);

        $aircraft_rsl_lp_ren = ServiceTemplate::create([
            'name'  => 'AIRCRAFT-RSL-LP_REN',
          
        ]);

        $fa_hp_ren = ServiceTemplate::create([
            'name'  => 'FA-HP_REN',
          
        ]);

        $fa_mp_ren = ServiceTemplate::create([
            'name'  => 'FA-MP_REN',
          
        ]);

        $fa_lp_ren = ServiceTemplate::create([
            'name'  => 'FA-LP_REN',
          
        ]);

        $ms_hp_ren = ServiceTemplate::create([
            'name'  => 'MS-HP_REN',
           
        ]);

        $ms_mp_ren = ServiceTemplate::create([

            'name'  => 'MS-MP_REN',
          
        ]);

        $ms_lp_ren = ServiceTemplate::create([
            'name'  => 'MS-LP_REN',
          
        ]);

        $secs_ren = ServiceTemplate::create([
            'name'  => 'SESC_REN',
           
        ]);

        $lrit_ren = ServiceTemplate::create([
            'name'  => 'LRIT_REN',
          
        ]);

        $ssas_ren = ServiceTemplate::create([
            'name'  => 'SSAS_REN',
          
        ]);

        $sesfb_ren = ServiceTemplate::create([
            'name'  => 'SESFB_REN',
          
        ]);

        $int_srsl_ren = ServiceTemplate::create([
            'name'  => 'INT-SRSL_REN',
         
        ]); //They have no New INT SRSL REN?

        $fc_hp_ren = ServiceTemplate::create([
            'name'  => 'FC-HP_REN',
         
        ]);

        $fc_mp_ren = ServiceTemplate::create([
            'name'  => 'FC-MP_REN',
        
        ]);

        $fc_lp_ren = ServiceTemplate::create([
            'name'  => 'FC-LP_REN',
      
        ]);

        $radio_telephony_hf_ren = ServiceTemplate::create([
            'name'  => 'RADIO-TELEPHONY-HF_REN',
          
        ]);

        $radio_telephony_vhf_ren = ServiceTemplate::create([
            'name'  => 'RADIO-TELEPHONY-VHF_REN',
          
        ]);

        $rsl_sim_hp_fx_ren = ServiceTemplate::create([
            'name'  => 'RSL-HP-SIM-FX_REN',
         
        ]);

        $rsl_sim_hp_fx_fb_ren = ServiceTemplate::create([
            'name'  => 'RSL-HP-SIM-FX-FB_REN',
         
        ]);

        $rsl_hp_sim_fb_ren = ServiceTemplate::create([
            'name'  => 'RSL-HP-SIM-FB_REN',
           
        ]);

        $rsl_sim_hp_ml_ren = ServiceTemplate::create([
            'name'  => 'RSL-HP-SIM-ML_REN',
        ]);

        $rsl_sim_hp_p_ren = ServiceTemplate::create([
            'name'  => 'RSL-HP-SIM-P_REN',
         
        ]);

        $rsl_mp_sim_fx_ren = ServiceTemplate::create([
            'name'  => 'RSL-MP-SIM-FX_REN',
          
        ]);

        $rsl_sim_mp_fx_fb_ren = ServiceTemplate::create([
            'name'  => 'RSL-MP-SIM-FX-FB_REN',
          
        ]);

        $rsl_mp_sim_fb_ren = ServiceTemplate::create([
            'name'  => 'RSL-MP-SIM-FB_REN',
         
        ]);

        $rsl_mp_sim_ml_ren = ServiceTemplate::create([
            'name'  => 'RSL-MP-SIM-ML_REN',
          
        ]);

        $rsl_mp_sim_p_ren = ServiceTemplate::create([

            'name'  => 'RSL-MP-SIM-P_REN',
          
        ]);

        $rsl_sim_lp_fx_ren = ServiceTemplate::create([
            'name'  => 'RSL-LP-SIM-FX_REN',
         
        ]);

        $rsl_sim_lp_fx_fb_ren = ServiceTemplate::create([
            'name'  => 'RSL-LP-SIM-FX-FB_REN',
          
        ]);

        $rsl_sim_lp_fb_ren = ServiceTemplate::create([
            'name'  => 'RSL-LP-SIM-FB_REN',
       
        ]);

        $rsl_lp_sim_ml_ren = ServiceTemplate::create([
            'name'  => 'RSL-LP-SIM-ML_REN',
        
        ]);

        $rsl_sim_lp_p_ren = ServiceTemplate::create([
            'name'  => 'RSL-LP-SIM-P_REN',
        
        ]);

        $rsl_dup_hp_fx_ren = ServiceTemplate::create([
            'name'  => 'RSL-HP-DUP-FX_REN',
        
        ]);

        $rsl_dup_hp_fx_fb_ren = ServiceTemplate::create([
            'name'  => 'RSL-HP-DUP-FX-FB_REN',
       
        ]);

        $rsl_dup_hp_fb_ren = ServiceTemplate::create([
            'name'  => 'RSL-HP-DUP-FB_REN',
        
        ]);

        $rsl_hp_dup_ml_ren = ServiceTemplate::create([
            'name'  => 'RSL-HP-DUP-ML_REN',
      
        ]); 


        $rsl_dup_hp_p_ren = ServiceTemplate::create([
            'name'  => 'RSL-HP-DUP-P_REN',
         
        ]);

        $rsl_mp_dup_fx_ren = ServiceTemplate::create([
            'name'  => 'RSL-MP-DUP-FX_REN',
        
        ]);

        $rsl_mp_dup_fx_fb_ren = ServiceTemplate::create([
            'name'  => 'RSL-MP-DUP-FX-FB_REN',
         
        ]);

        $rsl_mp_dup_fb_ren = ServiceTemplate::create([
            'name'  => 'RSL-MP-DUP-FB_REN',
           

        ]);


        $rsl_mp_dup_ml_ren = ServiceTemplate::create([
            'name'  => 'RSL-MP-DUP-ML_REN',
         
        ]);

        $rsl_dup_mp_p_ren = ServiceTemplate::create([
            'name'  => 'RSL-MP-DUP-P_REN',
          
        ]);

        $rsl_lp_dup_fx_ren = ServiceTemplate::create([
            'name'  => 'RSL-LP-DUP-FX_REN',
           
        ]);

        $rsl_lp_dup_fx_fb_ren = ServiceTemplate::create([
            'name'  => 'RSL-LP-DUP-FX-FB_REN',
      
        ]);

        $rsl_dup_lp_fb_ren = ServiceTemplate::create([
            'name'  => 'RSL-LP-DUP-FB_REN',
       
        ]);

        $rsl_lp_dup_ml_ren = ServiceTemplate::create([
            'name'  => 'RSL-LP-DUP-ML_REN',
         
        ]);

        $rsl_dup_lp_p_ren = ServiceTemplate::create([
            'name'  => 'RSL-LP-DUP-P_REN',
          
        ]);

        //OTHERS

        $examination = ServiceTemplate::create([
            'name'  => 'Examination'
        ]);

        $duplicate = ServiceTemplate::create([
            'name'  => 'Duplicate'
        ]);

        $at_roc_mod = ServiceTemplate::create([
            'name'  => 'AT-ROC_MOD'
        ]);

        $com_roc_mod = ServiceTemplate::create([
            'name'  => 'COM-ROC_MOD'
        ]);

        $at_rsl_mod  = ServiceTemplate::create([
            'name'  => 'AT-RSL_MOD'
        ]);

        $at_lifeTime = ServiceTemplate::create([
            'name'  => 'AT-Lifetime',
        ]);

        $reg_porta = ServiceTemplate::create([
            'name'  => 'REG_PORTA'
        ]);
        
    }
}
