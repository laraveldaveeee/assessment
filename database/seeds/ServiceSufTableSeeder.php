<?php

use Illuminate\Database\Seeder;
use App\ServiceTemplate;
use App\SufRate;

class ServiceSufTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {  
       $rsl_hp_sim_fb_new = ServiceTemplate::firstOrCreate([
             'name'  => 'RSL-HP-SIM-FB_NEW'
        ]);

        $suf_pmr_mm_sim_fb = SufRate::create([
            'suf_name'  => 'SUF-PMR-MM-SIM-FB',
            'rates' => 20,
        ]);


        $suf_pmr_huc_sim_fb = SufRate::create([
            'suf_name'  => 'SUF-PMR-HUC-SIM-FB',
            'rates' => 10,
        ]);

      
        $suf_pmr_aoa_sim_fb = SufRate::create([
            'suf_name'  => 'SUF-PMR-AOA-SIM-FB',
            'rates' => 5
        ]);


        //RSL HP SIM ML NEW

        $rsl_hp_sim_ml_new = ServiceTemplate::firstOrCreate([
            'name'  => 'RSL-HP-SIM-ML_NEW',
        ]);


        $suf_pmb_mm_ml = SufRate::create([
            'suf_name'  => 'SUF-PMR-MM-ML',
            'rates' => 2
        ]);


        $suf_pmr_huc_ml = SufRate::create([
            'suf_name'  => 'SUF-PMR-HUC-ML',
            'rates' => 1
        ]);

        $suf_pmr_aoa_ml = SufRate::create([
            'suf_name'  => 'SUF-PMR-AOA-ML',
            'rates' => 0.5
        ]);


        //RSL MP SIM FB New
        $rsl_mp_sim_fb_new = ServiceTemplate::firstOrCreate([
            'name'  => 'RSL-MP-SIM-FB_NEW'
        ]);

        //RSL MP SIM ML NEW

        $rsl_mp_sim_ml_new = ServiceTemplate::firstOrCreate([
            'name'  => 'RSL-MP-SIM-ML_NEW'
        ]);


        //RSL MP SIM P NEW
        $rsl_mp_sim_p_new = ServiceTemplate::firstOrCreate([
            'name'  => 'RSL-MP-SIM-P_NEW'
        ]);

        $suf_pmr_mm_p = SufRate::create([
            'suf_name'  => 'SUF-PMR-MM-P',
            'rates' => 2
        ]);

        $suf_pmr_huc_p = SufRate::create([
            'suf_name'  => 'SUF-PMR-HUC-P',
            'rates' => 1
        ]);

        $suf_pmr_aoa_p = SufRate::create([
            'suf_name'  => 'SUF-PMR-AOA-P',
            'rates' => 0.5
        ]);


        //RSL LP SIM FB NEW
        $rsl_lp_sim_fb_new = ServiceTemplate::firstOrCreate([
            'name'  => 'RSL-LP-SIM-FB_NEW',
        ]);

        //RSL LP SIM ML NEW

        $rsl_lp_sim_ml_new = ServiceTemplate::firstOrCreate([

            'name'  => 'RSL-LP-SIM-ML_NEW',
        ]);

        $rsl_lp_sim_p_new = ServiceTemplate::firstOrCreate([
            'name'  => 'RSL-LP-SIM-P_NEW',

        ]);

        //RSL HP DUP FB NEW
        $rsl_hp_dup_fb_new = ServiceTemplate::firstOrCreate([
            'name'  => 'RSL-HP-DUP-FB_NEW',
        ]);

        $suf_pmr_mm_dup_fb = SufRate::create([

            'suf_name'  => 'SUF-PMR-MM-DUP-FB',
            'rates' => 50,
        ]);

        $suf_pmr_huc_dup_fb = SufRate::create([
            'suf_name'  => 'SUF-PMR-HUC-DUP-FB',
            'rates' => 25
        ]);

        $suf_pmr_aoa_dup_fb = SufRate::create([
            'suf_name'  => 'SUF-PMR-AOA-DUP-FB',
            'rates' => 12.5
        ]);

        //RSL HP DUP ML New
        $rsl_hp_dup_ml_new = ServiceTemplate::firstOrCreate([
            'name'  => 'RSL-HP-DUP-ML_NEW',
        ]);

        //RSL HP DUP P NEW 
        $rsl_hp_dup_p_new = ServiceTemplate::firstOrCreate([
            'name'  => 'RSL-HP-DUP-P_New',
        ]);

        //RSL MP DUP FB NEW
        $rsl_mp_dup_fb_new = ServiceTemplate::firstOrCreate([

            'name'  => 'RSL-MP-DUP-FB_NEW',
        ]);

        //RSL MP DUP ML NEW
        $rsl_mp_dup_ml_new = ServiceTemplate::firstOrCreate([

            'name'  => 'RSL-MP-DUP-ML_NEW',
        ]);

        //RSL MP DUP P NEW
        $rsl_mp_dup_p_new = ServiceTemplate::firstOrCreate([
            'name'  => 'RSL-MP-DUP-P_NEW'
        ]);

        //RSL LP DUP FB NEW
        $rsl_lp_dup_fb_new = ServiceTemplate::firstOrCreate([
            'name'  => 'RSL-LP-DUP-FB_NEW',
        ]);

        //RSL LP DUP ML NEW 
        $rsl_lp_dup_ml_new = ServiceTemplate::firstOrCreate([
            'name'  => 'RSL-LP-DUP-ML_NEW',
        ]);

        $rsl_lp_dup_p_new = ServiceTemplate::firstOrCreate([
            'name'  => 'RSL-LP-DUP-P_NEW',
        ]);

        //RSL-HP-SIM-FB_REN
        $rsl_hp_sim_fb_ren = ServiceTemplate::firstOrCreate([
            'name'  => 'RSL-HP-SIM-FB_REN'
        ]);

       


        $suf_pmr_mm_sim_fb->serviceTemplates()->attach($rsl_hp_sim_fb_new);
        $suf_pmr_huc_sim_fb->serviceTemplates()->attach($rsl_hp_sim_fb_new);
        $suf_pmr_aoa_sim_fb->serviceTemplates()->attach($rsl_hp_sim_fb_new);

        //RSL HP SIM ML NEW
        $suf_pmb_mm_ml->serviceTemplates()->attach($rsl_hp_sim_ml_new);
        $suf_pmr_huc_ml->serviceTemplates()->attach($rsl_hp_sim_ml_new);
        $suf_pmr_aoa_ml->serviceTemplates()->attach($rsl_hp_sim_ml_new);


        //RSL MP SIM FB New
        $suf_pmr_mm_sim_fb->serviceTemplates()->attach($rsl_mp_sim_fb_new);
        $suf_pmr_huc_sim_fb->serviceTemplates()->attach($rsl_mp_sim_fb_new);
        $suf_pmr_aoa_sim_fb->serviceTemplates()->attach($rsl_mp_sim_fb_new);

        //RSL MP SIM ML NEW
        $suf_pmb_mm_ml->serviceTemplates()->attach($rsl_mp_sim_ml_new);
        $suf_pmr_huc_ml->serviceTemplates()->attach($rsl_mp_sim_ml_new);
        $suf_pmr_aoa_ml->serviceTemplates()->attach($rsl_mp_sim_ml_new);

        //RSL MP SIM P NEW 
        $suf_pmr_mm_p->serviceTemplates()->attach($rsl_mp_sim_p_new);
        $suf_pmr_huc_p->serviceTemplates()->attach($rsl_mp_sim_p_new);
        $suf_pmr_aoa_p->serviceTemplates()->attach($rsl_mp_sim_p_new);

        //RSL LP SIM FB NEW
        $suf_pmr_mm_sim_fb->serviceTemplates()->attach($rsl_lp_sim_fb_new);
        $suf_pmr_huc_sim_fb->serviceTemplates()->attach($rsl_lp_sim_fb_new);
        $suf_pmr_aoa_sim_fb->serviceTemplates()->attach($rsl_lp_sim_fb_new);

        //RSL LP SIN ML NEW
        $suf_pmb_mm_ml->serviceTemplates()->attach($rsl_lp_sim_ml_new);
        $suf_pmr_huc_ml->serviceTemplates()->attach($rsl_lp_sim_ml_new);
        $suf_pmr_aoa_ml->serviceTemplates()->attach($rsl_lp_sim_ml_new);


        //RSL LP SIM P NEW

        $suf_pmr_mm_p->serviceTemplates()->attach($rsl_lp_sim_p_new);
        $suf_pmr_huc_p->serviceTemplates()->attach($rsl_lp_sim_p_new);
        $suf_pmr_aoa_p->serviceTemplates()->attach($rsl_lp_sim_p_new);

        //RSL HP DUP FB NEW
        $suf_pmr_mm_dup_fb->serviceTemplates()->attach($rsl_hp_dup_fb_new);
        $suf_pmr_huc_dup_fb->serviceTemplates()->attach($rsl_hp_dup_fb_new);
        $suf_pmr_aoa_dup_fb->serviceTemplates()->attach($rsl_hp_dup_fb_new);

        //RSL HP DUP ML NEW
        $suf_pmb_mm_ml->serviceTemplates()->attach($rsl_hp_dup_ml_new);
        $suf_pmr_huc_ml->serviceTemplates()->attach($rsl_hp_dup_ml_new);
        $suf_pmr_aoa_ml->serviceTemplates()->attach($rsl_hp_dup_ml_new);

        //RSL HP DUP P NEW
        $suf_pmr_mm_p->serviceTemplates()->attach($rsl_hp_dup_p_new);
        $suf_pmr_huc_p->serviceTemplates()->attach($rsl_hp_dup_p_new);
        $suf_pmr_aoa_p->serviceTemplates()->attach($rsl_hp_dup_p_new);

        //RSL MP DUP FB NEW
        $suf_pmr_mm_dup_fb->serviceTemplates()->attach($rsl_mp_dup_fb_new);
        $suf_pmr_huc_dup_fb->serviceTemplates()->attach($rsl_mp_dup_fb_new);
        $suf_pmr_aoa_dup_fb->serviceTemplates()->attach($rsl_mp_dup_fb_new);

        //RSL MP DUP ML NEW
        $suf_pmb_mm_ml->serviceTemplates()->attach($rsl_mp_dup_ml_new);
        $suf_pmr_huc_ml->serviceTemplates()->attach($rsl_mp_dup_ml_new);
        $suf_pmr_aoa_ml->serviceTemplates()->attach($rsl_mp_dup_ml_new);

        //RSL MP DUP P NEW
        $suf_pmr_mm_p->serviceTemplates()->attach($rsl_mp_dup_p_new);
        $suf_pmr_huc_p->serviceTemplates()->attach($rsl_mp_dup_p_new);
        $suf_pmr_aoa_p->serviceTemplates()->attach($rsl_mp_dup_p_new);

        //RSL LP DUP FB NEW
        $suf_pmr_mm_dup_fb->serviceTemplates()->attach($rsl_lp_dup_fb_new);
        $suf_pmr_huc_dup_fb->serviceTemplates()->attach($rsl_lp_dup_fb_new);
        $suf_pmr_aoa_dup_fb->serviceTemplates()->attach($rsl_lp_dup_fb_new);

        //RSL LP DUP ML NEW

        $suf_pmb_mm_ml->serviceTemplates()->attach($rsl_lp_dup_ml_new);
        $suf_pmr_huc_ml->serviceTemplates()->attach($rsl_lp_dup_ml_new);
        $suf_pmr_aoa_ml->serviceTemplates()->attach($rsl_lp_dup_ml_new);

        //RSL LP DUP ML NEW 
        $suf_pmr_mm_p->serviceTemplates()->attach($rsl_lp_dup_p_new);
        $suf_pmr_huc_p->serviceTemplates()->attach($rsl_lp_dup_p_new);
        $suf_pmr_aoa_p->serviceTemplates()->attach($rsl_lp_dup_p_new);

        //REN

        $suf_pmr_mm_sim_fb->serviceTemplates()->attach($rsl_hp_sim_fb_ren);
        $suf_pmr_huc_sim_fb->serviceTemplates()->attach($rsl_hp_sim_fb_ren);
        $suf_pmr_aoa_sim_fb->serviceTemplates()->attach($rsl_hp_sim_fb_ren);
    }
}

