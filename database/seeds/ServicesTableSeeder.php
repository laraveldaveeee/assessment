<?php

use Illuminate\Database\Seeder;
use App\Service;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //With ROC
        $rlm_new = Service::create([
        	'name' => 'RLM_NEW',
            'roc_fee'   => 60,
            'app_fee'   => 20,
            'filing_fee'   => 10,
            'dst_fee'   => 30,
            'types'     => 'NEW'
        ]);

        $groc_new = Service::create([
            'name' => 'GROC_NEW',
            'roc_fee'   => 60,
            'app_fee'   => 20,
            'filing_fee'   => 10,
            'dst_fee'   => 30,
            'types'     => 'NEW'
        ]);

        $phn_new_1 = Service::create([
            'name' => '1PHN_NEW',
            'roc_fee'   => 120,
            'dst_fee'   => 30,
            'types'     => 'NEW'
        ]);

        $rtg_new_2 = Service::create([
            'name' => '2RTG_NEW',
            'roc_fee'   => 120,
            'dst_fee'   => 30,
            'types'     => 'NEW'
        ]);

        $phn_new_2 = Service::create([
            'name' => '2PHN_NEW',
            'roc_fee'   => 100,
            'dst_fee'   => 30,
            'types'     => 'NEW'
        ]);

        $rmap_new = Service::create([
            'name' => 'RMAP_NEW',
            'roc_fee'   => 100,
            'dst_fee'   => 30,
            'types'     => 'NEW'
        ]);

        $phn_new_3 = Service::create([
            'name' => '3PHN_NEW',
            'roc_fee'   => 60,
            'dst_fee'   => 30,
            'types'     => 'NEW'
        ]);

        $rtg_new_3 = Service::create([
            'name' => '3RTG_NEW',
            'roc_fee'   => 60,
            'dst_fee'   => 30,
            'types'     => 'NEW'
        ]);

        $at_roc_new = Service::create([
            'name' => 'AT-ROC_NEW',
            'roc_fee'   => 60,
            'dst_fee'   => 30,
            'types'     => 'NEW'
        ]);


        $srop_fb_new = Service::create([
            'name' => 'SROP_NEW', //SROP-FB_NEW => Revise Name
            'roc_fee'   => 60,
            'app_fee'   => 20,
            'filing_fee'   => 20,
            'dst_fee'   => 30,
            'types'     => 'NEW'
        ]);

        $rtg_new_1 = Service::create([
            'name' => '1RTG_NEW',
            'roc_fee'   => 180,
            'dst_fee'   => 30,
            'types'     => 'NEW'
        ]);






        

        // AMATEUR with ROC and RSL

        $at_rsl_a_new = Service::create([
            'name'  => 'AT-RSL-A_New',
            'radio_station_license_fee' => 120,
            'roc_fee'   => 60,
            'dst_fee'   => 30,
            'types'     => 'NEW'
        ]);

        $at_rsl_b_new = Service::create([
            'name'  => 'AT-RSL-B_New',
            'radio_station_license_fee' => 132,
            'roc_fee'   => 60,
            'dst_fee'   => 30,
            'types'     => 'NEW'
        ]);

        $at_rsl_c_new = Service::create([
            'name'  => 'AT-RSL-C_New',
            'radio_station_license_fee' => 144,
            'roc_fee'   => 60,
            'dst_fee'   => 30,
            'types'     => 'NEW'
        ]);

        $at_rsl_d_new = Service::create([
            'name'  => 'AT-RSL-D_New',
            'radio_station_license_fee' => 156,
            'roc_fee'   => 60,
            'dst_fee'   => 30,
            'types'     => 'NEW'
        ]);

        $at_club_simplex_new = Service::create([
            'name'  => 'AT-CLUB-SIMPLEX_NEW',
            'filing_fee'    => 180,
            'purchase_permit_fee'   => 50,
            'possess_permit_fee'    => 50,
            'construction_permit_fee' => 600,
            'radio_station_license_fee' => 700,
            'dst_fee'   => 30,
            'types'     => 'NEW'
        ]);

        $at_club_duplex_new = Service::create([
            'name'  => 'AT-CLUB-DUPLEX_NEW',
            'filing_fee'    => 180,
            'purchase_permit_fee'   => 50,
            'possess_permit_fee'    => 50,
            'construction_permit_fee' => 600,
            'radio_station_license_fee' => 1320,
            'dst_fee'   => 30,
            'types'     => 'NEW'
        ]);

        $aircraft_rsl_hp_new = Service::create([

            'name'  => 'AIRCRAFT-RSL-HP_NEW',
            'filing_fee'    => 180,
            'purchase_permit_fee'   => 240,
            'possess_permit_fee'    => 120,
            'construction_permit_fee' => 960,
            'radio_station_license_fee' => 1320,
            'inspection_fee'    => 720,
            'dst_fee'   => 30,
            'types'     => 'NEW'

        ]);

        $aircraft_rsl_mp_new = Service::create([

            'name'  => 'AIRCRAFT-RSL-MP_NEW',
            'filing_fee'    => 180,
            'purchase_permit_fee'   => 120,
            'possess_permit_fee'    => 96,
            'construction_permit_fee' => 840,
            'radio_station_license_fee' => 1080,
            'inspection_fee'    => 720,
            'dst_fee'   => 30,
            'types'     => 'NEW'

        ]);

        $aircraft_rsl_lp_new = Service::create([

            'name'  => 'AIRCRAFT-RSL-LP_NEW',
            'filing_fee'    => 180,
            'purchase_permit_fee'   => 96,
            'possess_permit_fee'    => 60,
            'construction_permit_fee' => 720,
            'radio_station_license_fee' => 840,
            'inspection_fee'    => 720,
            'dst_fee'   => 30,
            'types'     => 'NEW'

        ]);


        $fa_hp_new = Service::create([

            'name'  => 'FA-HP_NEW',
            'filing_fee'    => 180,
            'purchase_permit_fee'   => 240,
            'possess_permit_fee'    => 120,
            'construction_permit_fee' => 1080,
            'radio_station_license_fee' => 1080,
            'inspection_fee'    => 720,
            'dst_fee'   => 30,
            'types'     => 'NEW'
        ]);

        $fa_mp_new = Service::create([

            'name'  => 'FA-MP_New',
            'filing_fee'    => 180,
            'purchase_permit_fee'   => 120,
            'possess_permit_fee'    => 96,
            'construction_permit_fee' => 840,
            'radio_station_license_fee' => 960,
            'inspection_fee'    => 720,
            'dst_fee'   => 30,
            'types'     => 'NEW'

        ]);

        $fa_lp_new = Service::create([

            'name'  => 'FA-LP_NEW',
            'filing_fee'    => 180,
            'purchase_permit_fee'   => 96,
            'possess_permit_fee'    => 60,
            'construction_permit_fee' => 720,
            'radio_station_license_fee' => 840,
            'inspection_fee'    => 720,
            'dst_fee'   => 30,
            'types'     => 'NEW'

        ]);


        $ms_hp_new = Service::create([

            'name'  => 'MS-HP_NEW',
            'filing_fee'    => 180,
            'purchase_permit_fee'   => 240,
            'possess_permit_fee'    => 120,
            'construction_permit_fee' => 720,
            'radio_station_license_fee' => 840,
            'inspection_fee'    => 720,
            'dst_fee'   => 30,
            'types'     => 'NEW'

        ]);

        $ms_mp_new = Service::create([

            'name'  => 'MS-MP_NEW',
            'filing_fee'    => 180,
            'purchase_permit_fee'   => 120,
            'possess_permit_fee'    => 96,
            'construction_permit_fee' => 600,
            'radio_station_license_fee' => 720,
            'inspection_fee'    => 720,
            'dst_fee'   => 30,
            'types'     => 'NEW'

        ]);

        $ms_lp_new = Service::create([

            'name'  => 'MS-LP_NEW',
            'filing_fee'    => 180,
            'purchase_permit_fee'   => 96,
            'possess_permit_fee'    => 60,
            'construction_permit_fee' => 480,
            'radio_station_license_fee' => 600,
            'inspection_fee'    => 720,
            'dst_fee'   => 30,
            'types'     => 'NEW'

        ]);


        $secs = Service::create([

            'name'  => 'SESC_NEW',
            'filing_fee'    => 180,
            'purchase_permit_fee'   => 360,
            'possess_permit_fee'    => 360,
            'construction_permit_fee' => 1200,
            'radio_station_license_fee' => 1440,
            'inspection_fee'    => 1200,
            'dst_fee'   => 30,
            'types'     => 'NEW'

        ]);

        $lrit = Service::create([

            'name'  => 'LRIT_New',
            'filing_fee'    => 180,
            'purchase_permit_fee'   => 360,
            'possess_permit_fee'    => 360,
            'construction_permit_fee' => 1200,
            'radio_station_license_fee' => 1440,
            'inspection_fee'    => 1200,
            'dst_fee'   => 30,
            'types'     => 'NEW'

        ]);


        $ssas = Service::create([

            'name'  => 'SSAS_New',
            'filing_fee'    => 180,
            'purchase_permit_fee'   => 360,
            'possess_permit_fee'    => 360,
            'construction_permit_fee' => 1200,
            'radio_station_license_fee' => 1440,
            'inspection_fee'    => 1200,
            'dst_fee'   => 30,
            'types'     => 'NEW'

        ]);

        $sesfb = Service::create([

            'name'  => 'SESFB_New',
            'filing_fee'    => 180,
            'purchase_permit_fee'   => 360,
            'possess_permit_fee'    => 360,
            'construction_permit_fee' => 1200,
            'radio_station_license_fee' => 1440,
            'inspection_fee'    => 1200,
            'dst_fee'   => 30,
            'types'     => 'NEW'

        ]);


        $int_srsl_hp_new = Service::create([

            'name'  => 'Int-SRSL-HP_New',
            'filing_fee'    => 180,
            'purchase_permit_fee'   => 240,
            'possess_permit_fee'    => 120,
            'construction_permit_fee' => 1200,
            'radio_station_license_fee' => 1500,
            'inspection_fee'    => 1200,
            'dst_fee'   => 30,
            'types'     => 'NEW'

        ]);

        $int_srsl_mp_new = Service::create([

            'name'  => 'Int-SRSL-MP_New',
            'filing_fee'    => 180,
            'purchase_permit_fee'   => 120,
            'possess_permit_fee'    => 96,
            'construction_permit_fee' => 1200,
            'radio_station_license_fee' => 1500,
            'inspection_fee'    => 1200,
            'dst_fee'   => 30,
            'types'     => 'NEW'

        ]);


        $int_srsl_lp_new = Service::create([

            'name'  => 'Int-SRSL-LP_New',
            'filing_fee'    => 180,
            'purchase_permit_fee'   => 96,
            'possess_permit_fee'    => 60,
            'construction_permit_fee' => 1200,
            'radio_station_license_fee' => 1500,
            'inspection_fee'    => 1200,
            'dst_fee'   => 30,
            'types'     => 'NEW'

        ]);

        $fc_hp_new = Service::create([

            'name'  => 'FC-HP_NEW',
            'filing_fee'    => 180,
            'purchase_permit_fee'   => 240,
            'possess_permit_fee'    => 120,
            'construction_permit_fee' => 1320,
            'radio_station_license_fee' => 1440,
            'inspection_fee'    => 720,
            'dst_fee'   => 30,
            'types'     => 'NEW'

        ]);

        $fc_mp_new = Service::create([

            'name'  => 'FC-MP_NEW',
            'filing_fee'    => 180,
            'purchase_permit_fee'   => 120,
            'possess_permit_fee'    => 96,
            'construction_permit_fee' => 960,
            'radio_station_license_fee' => 1200,
            'inspection_fee'    => 720,
            'dst_fee'   => 30,
            'types'     => 'NEW'

        ]);

        $fc_lp_new = Service::create([

            'name'  => 'FC-LP_NEW',
            'filing_fee'    => 180,
            'purchase_permit_fee'   => 96,
            'possess_permit_fee'    => 60,
            'construction_permit_fee' => 600,
            'radio_station_license_fee' => 1080,
            'inspection_fee'    => 720,
            'dst_fee'   => 30,
            'types'     => 'NEW'

        ]);

        $radio_telephony_hf_new = Service::create([

            'name'  => 'RADIO-TELEPHONY-HF_New',
            'filing_fee'    => 180,
            'purchase_permit_fee'   => 120,
            'possess_permit_fee'    => 96,
            'construction_permit_fee' => 480,
            'radio_station_license_fee' => 720,
            'inspection_fee'    => 720,
            'dst_fee'   => 30,
            'types'     => 'NEW'

        ]);


        $radio_telephony_vhf_new = Service::create([

            'name'  => 'RADIO-TELEPHONY-VHF_New',
            'filing_fee'    => 180,
            'purchase_permit_fee'   => 120,
            'possess_permit_fee'    => 96,
            'construction_permit_fee' => 480,
            'radio_station_license_fee' => 480,
            'inspection_fee'    => 480,
            'dst_fee'   => 30,
            'types'     => 'NEW'
        ]);

        // $rsl_sim_hp_fx_new = Service::create([
        //     'name'  => 'RSL-SIM-HP-FX_New',
        //     'construction_permit_fee' => 240,
        //     'radio_station_license_fee' => 1320,
        //     'inspection_fee'    => 480,
        //     'dst_fee'   => 30,
        //     'types'     => 'NEW'

        // ]);



        $rsl_hp_sim_fx_new = Service::create([
            'name'  => 'RSL-HP-SIM-FX_New',
            'construction_permit_fee' => 240,
            'radio_station_license_fee' => 600,
            'inspection_fee'    => 480,
            'dst_fee'   => 30,
            'types'     => 'NEW'

        ]);


        // $rsl_sim_hp_fx_fb_new = Service::create([
        //     'name'  => 'RSL-SIM-HP-FX-FB_New',
        //     'construction_permit_fee' => 240,
        //     'radio_station_license_fee' => 1320,
        //     'inspection_fee'    => 480,
        //     'dst_fee'   => 30,
        //     'types'     => 'NEW'
        // ]);


        $rsl_hp_sim_fx_fb_new = Service::create([
            'name'  => 'RSL-HP-SIM-FX-FB_New',
            'construction_permit_fee' => 240,
            'radio_station_license_fee' => 1320,
            'inspection_fee'    => 480,
            'dst_fee'   => 30,
            'types'     => 'NEW'
        ]);



        $rsl_hp_sim_fb_new = Service::create([
            'name'  => 'RSL-HP-SIM-FB_NEW',
            'construction_permit_fee' => 240,
            'radio_station_license_fee' => 720,
            'inspection_fee'    => 480,
            'dst_fee'   => 30,
            'types'     => 'NEW'

        ]);

        $rsl_hp_sim_ml_new = Service::create([
            'name'  => 'RSL-HP-SIM-ML_NEW',
            'construction_permit_fee' => 240,
            'radio_station_license_fee' => 480,
            'inspection_fee'    => 240,
            'dst_fee'   => 30,
            'types'     => 'NEW'

        ]);


        $rsl_hp_sim_p_new = Service::create([
            'name'  => 'RSL-HP-SIM-P_NEW',
            'radio_station_license_fee' => 480,
            'inspection_fee'    => 240,
            'dst_fee'   => 30,
            'types'     => 'NEW'

        ]);

        $rsl_mp_sim_fx_new = Service::create([
            'name'  => 'RSL-MP-SIM-FX_NEW',
            'construction_permit_fee' => 240,
            'radio_station_license_fee' => 480,
            'inspection_fee'    => 480,
            'dst_fee'   => 30,
            'types'     => 'NEW'

        ]);


        $rsl_mp_sim_fx_fb_new = Service::create([

            'name'  => 'RSL-MP-SIM-FX-FB_New',
            'construction_permit_fee' => 240,
            'radio_station_license_fee' => 1080,
            'inspection_fee'    => 480,
            'dst_fee'   => 30,
            'types'     => 'NEW'

        ]);


         $rsl_mp_sim_fb_mew = Service::create([
            'name' => 'RSL-MP-SIM-FB_NEW',
            'construction_permit_fee'   => 240,
            'radio_station_license_fee' => 600,
            'inspection_fee'    => 480,
            'dst_fee'   => 30,

        ]);


        $rsl_mp_sim_ml_new = Service::create([

            'name'  => 'RSL-MP-SIM-ML_NEW',
            'construction_permit_fee' => 240,
            'radio_station_license_fee' => 360,
            'inspection_fee'    => 240,
            'dst_fee'   => 30,
            'types'     => 'NEW'

        ]);



        $rsl_mp_sim_p_new = Service::create([

            'name'  => 'RSL-MP-SIM-P_NEW',
            'radio_station_license_fee' => 360,
            'inspection_fee'    => 240,
            'dst_fee'   => 30,
            'types'     => 'NEW'

        ]);

        $rsl_lp_sim_fx_new = Service::create([

            'name'  => 'RSL-LP-SIM-FX_NEW',
            'construction_permit_fee' => 240,
            'radio_station_license_fee' => 360,
            'inspection_fee'    => 480,
            'dst_fee'   => 30,
            'types'     => 'NEW'
        ]);

        $rsl_lp_sim_fx_fb_new = Service::create([

            'name'  => 'RSL-LP-SIM-FX-FB_NEW',
            'construction_permit_fee' => 240,
            'radio_station_license_fee' => 840,
            'inspection_fee'    => 480,
            'dst_fee'   => 30,
            'types'     => 'NEW'

        ]);

        $rsl_lp_sim_fb_new = Service::create([
            'name'  => 'RSL-LP-SIM-FB_NEW',
            'construction_permit_fee' => 240,
            'radio_station_license_fee' => 480,
            'inspection_fee'    => 480,
            'dst_fee'   => 30,
        ]);

        $rsl_lp_sim_ml_new = Service::create([

            'name'  => 'RSL-LP-SIM-ML_NEW',
            'construction_permit_fee' => 240,
            'radio_station_license_fee' => 240,
            'inspection_fee'    => 240,
            'dst_fee'   => 30,
            'types'     => 'NEW'

        ]);


        $rsl_lp_sim_p_new = Service::create([

            'name'  => 'RSL-LP-SIM-P_NEW',
            'radio_station_license_fee' => 240,
            'inspection_fee'    => 240,
            'dst_fee'   => 30,
            'types'     => 'NEW'
        ]);

        $rsl_hp_dup_fx_new = Service::create([

            'name'  => 'RSL-HP-DUP-FX_NEW',
            'construction_permit_fee' => 240,
            'radio_station_license_fee' => 1200,
            'inspection_fee'    => 480,
            'dst_fee'   => 30,
            'types'     => 'NEW'
        ]);

        $rsl_hp_dup_fx_fb_new = Service::create([
            'name'  => 'RSL-HP-DUP-FX_FB_New',
            'construction_permit_fee' => 240,
            'radio_station_license_fee' => 2640,
            'inspection_fee'    => 480,
            'dst_fee'   => 30,
            'types'     => 'NEW'

        ]);

        $rsl_hp_dup_fb_new = Service::create([
            'name'  => 'RSL-HP-DUP-FB_NEW',
            'construction_permit_fee' => 240,
            'radio_station_license_fee' => 1200,
            'inspection_fee'    => 480,
            'dst_fee'   => 30,
            'types'     => 'NEW'
        ]);

        $rsl_hp_dup_ml_new = Service::create([

            'name'  => 'RSL-HP-DUP-ML_NEW',
            'construction_permit_fee' => 240,
            'radio_station_license_fee' => 1400,
            'inspection_fee'    => 240,
            'dst_fee'   => 30,
            'types'     => 'NEW'

        ]);

        $rsl_hp_dup_p_new = Service::create([
            'name'  => 'RSL-HP-DUP-P_NEW',
            'radio_station_license_fee' => 960,
            'inspection_fee'    => 240,
            'dst_fee'   => 30,
            'types'     => 'NEW'
        ]);

        $rsl_mp_dup_fx_new = Service::create([
            'name'  => 'RSL-MP-DUP-FX_NEW',
            'construction_permit_fee' => 240,
            'radio_station_license_fee' => 1320,
            'inspection_fee'    => 480,
            'dst_fee'   => 30,
            'types'     => 'NEW'
        ]);

        $rsl_mp_dup_fx_fb_new = Service::create([
            'name'  => 'RSL-MP-DUP-FX-FB_New',
            'construction_permit_fee' => 240,
            'radio_station_license_fee' => 2160,
            'inspection_fee'    => 480,
            'dst_fee'   => 30,
            'types'     => 'NEW'

        ]);

        $rsl_mp_dup_fb_new = Service::create([
            'name'  => 'RSL-MP-DUP-FB_NEW',
            'construction_permit_fee' => 240,
            'radio_station_license_fee' => 960,
            'inspection_fee'    => 480,
            'dst_fee'   => 30,
            'types'     => 'NEW'
        ]);

        $rsl_mp_dup_ml_new = Service::create([
            'name'  => 'RSL-MP-DUP-ML_NEW',
            'construction_permit_fee' => 240,
            'radio_station_license_fee' => 1200,
            'inspection_fee'    => 240,
            'dst_fee'   => 30,
            'types'     => 'NEW'
        ]);

        $rsl_mp_dup_p_new = Service::create([
            'name'  => 'RSL-MP-DUP-P_NEW',
            'radio_station_license_fee' => 720,
            'inspection_fee'    => 240,
            'dst_fee'   => 30,
            'types'     => 'NEW'
        ]);

        $rsl_lp_dup_fx_new = Service::create([
            'name'  => 'RSL-LP-DUP-FX_NEW',
            'construction_permit_fee' => 600,
            'radio_station_license_fee' => 1320,
            'inspection_fee'    => 480,
            'dst_fee'   => 30,
            'types'     => 'NEW'
        ]);

        $rsl_lp_dup_fx_fb_new = Service::create([
            'name'  => 'RSL-LP-DUP-FX-FB_NEW',
            'construction_permit_fee' => 240,
            'radio_station_license_fee' => 1680,
            'inspection_fee'    => 480,
            'dst_fee'   => 30,
            'types'     => 'NEW'
        ]);

        $rsl_lp_dup_fb_new = Service::create([
            'name'  => 'RSL-LP-DUP-FB_NEW',
            'construction_permit_fee' => 240,
            'radio_station_license_fee' => 720,
            'inspection_fee'    => 480,
            'dst_fee'   => 30,
            'types'     => 'NEW'
        ]);


        $rsl_dup_lp_ml_new = Service::create([
            'name'  => 'RSL-LP-DUP-ML_NEW',
            'construction_permit_fee' => 240,
            'radio_station_license_fee' => 960,
            'inspection_fee'    => 240,
            'dst_fee'   => 30,
            'types'     => 'NEW'
        ]);

        $rsl_lp_dup_p_new = Service::create([
            'name'  => 'RSL-LP-DUP-P_NEW',
            'radio_station_license_fee' => 480,
            'inspection_fee'    => 240,
            'dst_fee'   => 30,
            'types'     => 'NEW'
        ]);
        

        
        //Renewal

        $rlm_ren = Service::create([

            'name'  => 'RLM_REN',
            'roc_fee'   => 60,
            'dst_fee'   => 30,
            'types'     => 'RENEW'

        ]);

        $groc_ren = Service::create([
            'name'  => 'GROC REN',
            'roc_fee'   => 60,
            'dst_fee'   => 30,
            'types'     => 'RENEW'
        ]);

        $phn_ren_1 = Service::create([
            'name'  => '1PHN REN',
            'roc_fee'   => 120,
            'dst_fee'   => 30,
            'types'     => 'RENEW'
        ]);

        $rtg_ren_2 = Service::create([
            'name'  => '2RTG REN',
            'roc_fee'   => 120,
            'dst_fee'   => 30,
            'types'     => 'RENEW'
        ]);

        $phn_ren_2  = Service::create([
            'name'  => '2PHN REN',
            'roc_fee'   => 100,
            'dst_fee'   => 30,
            'types'     => 'RENEW'
        ]);

        $rmap_ren =  Service::create([
            'name'  => '2PHN REN',
            'roc_fee'   => 100, 
            'dst_fee'   => 30,
            'types'     => 'RENEW'
        ]);

        $phn_ren_3 = Service::create([
            'name'  => '3PHN REN',
            'roc_fee'   => 60,
            'dst_fee'   => 30,
            'types'     => 'RENEW'
        ]);

        $rtg_ren_3  = Service::create([
            'name'  =>'3RTG REN',
            'roc_fee'   => 60,
            'dst_fee'   => 30,
            'types'     => 'RENEW'
        ]);

        $at_roc_ren = Service::create([
            'name'  =>'AT-ROC REN',
            'roc_fee'   => 60,
            'dst_fee'   => 30,
            'types'     => 'RENEW'
        ]);

        $srop_ren = Service::create([
            'name'  =>'SROP REN',
            'roc_fee'   => 60,
            'dst_fee'   => 30,
            'types'     => 'RENEW'
        ]);

        $rtg_1_ren = Service::create([
            'name'  =>'1RTG REN',
            'roc_fee'   => 180,
            'dst_fee'   => 30,
            'types'     => 'RENEW'
        ]);

        $at_rsl_a_ren = Service::create([
            'name'  =>'AT-RSL-A REN',
            'radio_station_license_fee' => 120,
            'roc_fee'   => 60,
            'dst_fee'   => 30,
            'types'     => 'RENEW'
        ]);

        $at_rsl_b_ren = Service::create([
            'name'  =>'AT-RSL-B REN',
            'radio_station_license_fee' => 132,
            'roc_fee'   => 60,
            'dst_fee'   => 30,
            'types'     => 'RENEW'
        ]);

        $at_rsl_c_ren = Service::create([
            'name'  =>'AT-RSL-C REN',
            'radio_station_license_fee' => 144,
            'roc_fee'   => 60,
            'dst_fee'   => 30,
            'types'     => 'RENEW'
        ]);

        $at_rsl_d_ren = Service::create([
            'name'  =>'AT-RSL-D REN',
            'radio_station_license_fee' => 156,
            'roc_fee'   => 60,
            'dst_fee'   => 30,
            'types'     => 'RENEW'
        ]);


        $at_club_simplex_ren = Service::create([
            'name'  => 'AT-Club-Simplex_REN',
            'radio_station_license_fee' => 700,
            'dst_fee'   => 30,
            'types'     => 'RENEW'
        ]);

        $at_club_duplex_ren = Service::create([
            'name'  => 'AT-Club-Duplex_REN',
            'radio_station_license_fee' => 1320,
            'dst_fee'   => 30,
            'types'     => 'RENEW'
        ]);

        $aircraft_rsl_hp_ren = Service::create([
            'name'  => 'AIRCRAFT-RSL-HP_REN',
            'radio_station_license_fee' => 1320,
            'inspection_fee'    => 720,
            'dst_fee'   => 30,
            'types'     => 'RENEW'
        ]);

        $aircraft_rsl_mp_ren = Service::create([
            'name'  => 'AIRCRAFT-RSL-MP_REN',
            'radio_station_license_fee' => 1080,
            'inspection_fee'    => 720,
            'dst_fee'   => 30,
            'types'     => 'RENEW'
        ]);

        $aircraft_rsl_lp_ren = Service::create([
            'name'  => 'AIRCRAFT-RSL-LP_REN',
            'radio_station_license_fee' => 840,
            'inspection_fee'    => 720,
            'dst_fee'   => 30,
            'types'     => 'RENEW'
        ]);

        $fa_hp_ren = Service::create([
            'name'  => 'FA-HP_REN',
            'radio_station_license_fee' => 1080,
            'inspection_fee'    => 720,
            'dst_fee'   => 30,
            'types'     => 'RENEW'
        ]);

        $fa_mp_ren = Service::create([
            'name'  => 'FA-MP_REN',
            'radio_station_license_fee' => 960,
            'inspection_fee'    => 720,
            'dst_fee'   => 30,
            'types'     => 'RENEW'
        ]);

        $fa_lp_ren = Service::create([
            'name'  => 'FA-LP_REN',
            'radio_station_license_fee' => 840,
            'inspection_fee'    => 720,
            'dst_fee'   => 30,
            'types'     => 'RENEW'
        ]);

        $ms_hp_ren = Service::create([
            'name'  => 'MS-HP_REN',
            'radio_station_license_fee' => 840,
            'inspection_fee'    => 720,
            'dst_fee'   => 30,
            'types'     => 'RENEW'
        ]);

        $ms_mp_ren = Service::create([

            'name'  => 'MS-MP_REN',
            'radio_station_license_fee' => 720,
            'inspection_fee'    => 720,
            'dst_fee'   => 30,
            'types'     => 'RENEW'
        ]);

        $ms_lp_ren = Service::create([
            'name'  => 'MS-LP_REN',
            'radio_station_license_fee' => 600,
            'inspection_fee'    => 720,
            'dst_fee'   => 30,
            'types'     => 'RENEW'
        ]);

        $secs_ren = Service::create([
            'name'  => 'SESC_REN',
            'radio_station_license_fee' => 1440,
            'inspection_fee'    => 1200,
            'dst_fee'   => 30,
            'types'     => 'RENEW'
        ]);

        $lrit_ren = Service::create([
            'name'  => 'LRIT_REN',
            'radio_station_license_fee' => 1440,
            'inspection_fee'    => 1200,
            'dst_fee'   => 30,
            'types'     => 'RENEW'
        ]);

        $ssas_ren = Service::create([
            'name'  => 'SSAS_REN',
            'radio_station_license_fee' => 1440,
            'inspection_fee'    => 1200,
            'dst_fee'   => 30,
            'types'     => 'RENEW'
        ]);

        $sesfb_ren = Service::create([
            'name'  => 'SESFB_REN',
            'radio_station_license_fee' => 1440,
            'inspection_fee'    => 1200,
            'dst_fee'   => 30,
            'types'     => 'RENEW'
        ]);

        $int_srsl_ren = Service::create([
            'name'  => 'INT-SRSL_REN',
            'radio_station_license_fee' => 1500,
            'inspection_fee'    => 1200,
            'dst_fee'   => 30,
            'types'     => 'RENEW'
        ]); //They have no New INT SRSL REN?

        $fc_hp_ren = Service::create([
            'name'  => 'FC-HP_REN',
            'radio_station_license_fee' => 1400,
            'inspection_fee'    => 720,
            'dst_fee'   => 30,
            'types'     => 'RENEW'
        ]);

        $fc_mp_ren = Service::create([
            'name'  => 'FC-MP_REN',
            'radio_station_license_fee' => 1200,
            'inspection_fee'    => 720,
            'dst_fee'   => 30,
            'types'     => 'RENEW'
        ]);

        $fc_lp_ren = Service::create([
            'name'  => 'FC-LP_REN',
            'radio_station_license_fee' => 1080,
            'inspection_fee'    => 720,
            'dst_fee'   => 30,
            'types'     => 'RENEW'
        ]);

        $radio_telephony_hf_ren = Service::create([
            'name'  => 'RADIO-TELEPHONY-HF_REN',
            'radio_station_license_fee' => 720,
            'inspection_fee'    => 720,
            'dst_fee'   => 30,
            'types'     => 'RENEW'
        ]);

        $radio_telephony_vhf_ren = Service::create([
            'name'  => 'RADIO-TELEPHONY-VHF_REN',
            'radio_station_license_fee' => 480,
            'inspection_fee'    => 480,
            'dst_fee'   => 30,
            'types'     => 'RENEW'
        ]);

        $rsl_sim_hp_fx_ren = Service::create([
            'name'  => 'RSL-HP-SIM-FX_REN',
            'radio_station_license_fee' => 600,
            'inspection_fee'    => 480,
            'dst_fee'   => 30,
            'types'     => 'RENEW'
        ]);

        $rsl_sim_hp_fx_fb_ren = Service::create([
            'name'  => 'RSL-HP-SIM-FX-FB_REN',
            'radio_station_license_fee' => 1320,
            'inspection_fee'    => 480,
            'dst_fee'   => 30,
            'types'     => 'RENEW'
        ]);

        $rsl_sim_hp_fb_ren = Service::create([
            'name'  => 'RSL-HP-SIM-FB_REN',
            'radio_station_license_fee' => 720,
            'inspection_fee'    => 480,
            'dst_fee'   => 30,
            'types'     => 'RENEW'
        ]);

        $rsl_sim_hp_ml_ren = Service::create([
            'name'  => 'RSL-HP-SIM-ML_REN',
            'radio_station_license_fee' => 480,
            'inspection_fee'    => 240,
            'dst_fee'   => 30,
            'types'     => 'RENEW'
        ]);

        $rsl_sim_hp_p_ren = Service::create([
            'name'  => 'RSL-HP-SIM-P_REN',
            'radio_station_license_fee' => 480,
            'inspection_fee'    => 240,
            'dst_fee'   => 30,
            'types'     => 'RENEW'
        ]);

        $rsl_mp_sim_fx_ren = Service::create([
            'name'  => 'RSL-MP-SIM-FX_REN',
            'radio_station_license_fee' => 480,
            'inspection_fee'    => 480,
            'dst_fee'   => 30,
            'types'     => 'RENEW'
        ]);

        $rsl_sim_mp_fx_fb_ren = Service::create([
            'name'  => 'RSL-MP-SIM-FX-FB_REN',
            'radio_station_license_fee' => 1080,
            'inspection_fee'    => 480,
            'dst_fee'   => 30,
            'types'     => 'RENEW'
        ]);

        $rsl_mp_sim_fb_ren = Service::create([
            'name'  => 'RSL-MP-SIM-FB_REN',
            'radio_station_license_fee' => 600,
            'inspection_fee'    => 480,
            'dst_fee'   => 30,
            'types'     => 'RENEW'
        ]);

        $rsl_mp_sim_ml_ren = Service::create([
            'name'  => 'RSL-MP-SIM-ML_REN',
            'radio_station_license_fee' => 360,
            'inspection_fee'    => 240,
            'dst_fee'   => 30,
            'types'     => 'RENEW'
        ]);

        $rsl_mp_sim_p_ren = Service::create([

            'name'  => 'RSL-MP-SIM-P_REN',
            'radio_station_license_fee' => 360,
            'inspection_fee'    => 240,
            'dst_fee'   => 30,
            'types'     => 'RENEW'

        ]);

        $rsl_sim_lp_fx_ren = Service::create([
            'name'  => 'RSL-LP-SIM-FX_REN',
            'radio_station_license_fee' => 360,
            'inspection_fee'    => 480,
            'dst_fee'   => 30,
            'types'     => 'RENEW'
        ]);

        $rsl_sim_lp_fx_fb_ren = Service::create([
            'name'  => 'RSL-LP-SIM-FX-FB_REN',
            'radio_station_license_fee' => 840,
            'inspection_fee'    => 480,
            'dst_fee'   => 30,
            'types'     => 'RENEW'
        ]);

        $rsl_sim_lp_fb_ren = Service::create([
            'name'  => 'RSL-LP-SIM-FB_REN',
            'radio_station_license_fee' => 480,
            'inspection_fee'    => 480,
            'dst_fee'   => 30,
            'types'     => 'RENEW'
        ]);

        $rsl_lp_sim_ml_ren = Service::create([
            'name'  => 'RSL-LP-SIM-ML_REN',
            'radio_station_license_fee' => 240,
            'inspection_fee'    => 240,
            'dst_fee'   => 30,
            'types'     => 'RENEW'
        ]);

        $rsl_sim_lp_p_ren = Service::create([
            'name'  => 'RSL-LP-SIM-P_REN',
            'radio_station_license_fee' => 240,
            'inspection_fee'    => 240,
            'dst_fee'   => 30,
            'types'     => 'RENEW'
        ]);

        $rsl_dup_hp_fx_ren = Service::create([
            'name'  => 'RSL-HP-DUP-FX_REN',
            'radio_station_license_fee' => 1200,
            'inspection_fee'    => 480,
            'dst_fee'   => 30,
            'types'     => 'RENEW'
        ]);

        $rsl_dup_hp_fx_fb_ren = Service::create([
            'name'  => 'RSL-HP-DUP-FX-FB_REN',
            'radio_station_license_fee' => 2640,
            'inspection_fee'    => 480,
            'dst_fee'   => 30,
            'types'     => 'RENEW'
        ]);

        $rsl_dup_hp_fb_ren = Service::create([
            'name'  => 'RSL-HP-DUP-FB_REN',
            'radio_station_license_fee' => 1200,
            'inspection_fee'    => 480,
            'dst_fee'   => 30,
            'types'     => 'RENEW'
        ]);

        $rsl_hp_dup_ml_ren = Service::create([
            'name'  => 'RSL-HP-DUP-ML_REN',
            'radio_station_license_fee' => 1440,
            'inspection_fee'    => 240,
            'dst_fee'   => 30,
        ]); 


        $rsl_dup_hp_p_ren = Service::create([
            'name'  => 'RSL-HP-DUP-P_REN',
            'radio_station_license_fee' => 960,
            'inspection_fee'    => 240,
            'dst_fee'   => 30,
            'types'     => 'RENEW'
        ]);

        $rsl_mp_dup_fx_ren = Service::create([
            'name'  => 'RSL-MP-DUP-FX_REN',
            'radio_station_license_fee' => 1320,
            'inspection_fee'    => 480,
            'dst_fee'   => 30,
            'types'     => 'RENEW'
        ]);

        $rsl_dup_mp_fx_fb_ren = Service::create([
            'name'  => 'RSL-MP-DUP-FX-FB_REN',
            'radio_station_license_fee' => 2160,
            'inspection_fee'    => 480,
            'dst_fee'   => 30,
            'types'     => 'RENEW'
        ]);

        $rsl_mp_dup_fb_ren = Service::create([
            'name'  => 'RSL-MP-DUP-FB_REN',
            'radio_station_license_fee' => 960,
            'inspection_fee'    => 480,
            'dst_fee'   => 30,
            'types'     => 'RENEW'

        ]);


        $rsl_mp_dup_ml_ren = Service::create([
            'name'  => 'RSL-MP-DUP-ML_REN',
            'radio_station_license_fee' => 1200,
            'inspection_fee'    => 480,
            'dst_fee'   => 30,
            'types'     => 'RENEW'
        ]);

        $rsl_dup_mp_p_ren = Service::create([
            'name'  => 'RSL-MP-DUP-P_REN',
            'radio_station_license_fee' => 720,
            'inspection_fee'    => 240,
            'dst_fee'   => 30,
            'types'     => 'RENEW'
        ]);

        $rsl_lp_dup_fx_ren = Service::create([
            'name'  => 'RSL-LP-DUP-FX_REN',
            'radio_station_license_fee' => 1320,
            'inspection_fee'    => 480,
            'dst_fee'   => 30,
            'types'     => 'RENEW'
        ]);

        $rsl_lp_dup_fx_fb_ren = Service::create([
            'name'  => 'RSL-LP-DUP-FX-FB_REN',
            'radio_station_license_fee' => 1680,
            'inspection_fee'    => 480,
            'dst_fee'   => 30,
            'types'     => 'RENEW'
        ]);

        $rsl_dup_lp_fb_ren = Service::create([
            'name'  => 'RSL-LP-DUP-FB_REN',
            'radio_station_license_fee' => 720,
            'inspection_fee'    => 480,
            'dst_fee'   => 30,
            'types'     => 'RENEW'
        ]);

        $rsl_lp_dup_ml_ren = Service::create([
            'name'  => 'RSL-LP-DUP-ML_REN',
            'radio_station_license_fee' => 960,
            'inspection_fee'    => 240,
            'dst_fee'   => 30,
            'types'     => 'RENEW'
        ]);

        $rsl_dup_lp_p_ren = Service::create([
            'name'  => 'RSL-LP-DUP-P_REN',
            'radio_station_license_fee' => 480,
            'inspection_fee'    => 240,
            'dst_fee'   => 30,
            'types'     => 'RENEW'
        ]);
         
    }
}
