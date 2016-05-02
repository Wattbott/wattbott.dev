<?php 
class RunsSeeder extends Seeder {

    public function run()
    {
        DB::table('runs')->delete();

       	require public_path() . "/sample.php";
        $run = serialize($run);
        User::create(array('run' => $run));
    }

}