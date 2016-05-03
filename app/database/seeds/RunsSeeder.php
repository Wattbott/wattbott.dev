<?php 
class RunsSeeder extends Seeder {

    public function run()
    {
        DB::table('runs')->truncate();

       	require public_path() . "/sample.php";
        // $run = serialize($run);
        Run::create(array('run' => $run));
    }

}