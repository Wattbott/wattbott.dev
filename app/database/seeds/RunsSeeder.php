<?php 
class RunsSeeder extends Seeder {

    public function run()
    {
        DB::table('runs')->truncate();

       	require public_path() . "/sample.php";
        // $run = serialize($run);
        Run::create(array('run' => $run));

        $run['user_input']['energy_data']['elec']['energy']['total']=NULL;
        $run['user_input']['energy_data']['gas']['energy']['total']=NULL;
        $run['user_input']['energy_data']['elec']['cost']['total']=NULL;
        $run['user_input']['energy_data']['gas']['cost']['total']=NULL;
        Run::create(array('run' => $run));

      
        foreach ($run['user_input']['energy_data'] as &$source) {   
            foreach ($source as &$c_or_e) {
                foreach ($c_or_e as $key => &$value) {
                   if($key=='feb'|| $key=='apr'||$key=='may'||$key=='jul'){
                       $value = ''; 
                   } 
                }
            }
        }
        Run::create(array('run' => $run));
 
        array_pop($run);
        array_pop($run);
        array_pop($run);
        Run::create(array('run' => $run));
    }

}