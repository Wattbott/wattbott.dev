<?php 
class RunsSeeder extends Seeder {

    public function run()
    {
        DB::table('runs')->truncate();

       	require public_path() . "/sample.php";
        // $run = serialize($run);
        Run::create(array('run' => $run));

        $run['user_input']['energy_data']['elec']['energy']['total']='';
        $run['user_input']['energy_data']['gas']['energy']['total']='';
        Run::create(array('run' => $run));

        array_pop($run);
        array_pop($run);
        Run::create(array('run' => $run));

    }

}