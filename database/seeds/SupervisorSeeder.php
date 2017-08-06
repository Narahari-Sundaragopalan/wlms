<?php

use Illuminate\Database\Seeder;
use App\Supervisor;

class SupervisorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('supervisors')->delete();
        Supervisor::create(['supid' => 31969, 'supfname' => 'Hugo', 'suplname' => 'Zamorano', 'position' => 'Coordinator',
            'created_at' => date_create(), 'updated_at' => date_create()]);
        Supervisor::create(['supid' => 17986, 'supfname' => 'Isiah', 'suplname' => 'Velasquez', 'position' => 'Coordinator',
            'created_at' => date_create(), 'updated_at' => date_create()]);
        Supervisor::create(['supid' => 25725, 'supfname' => 'Joel', 'suplname' => 'Velasquez', 'position' => 'Coordinator',
            'created_at' => date_create(), 'updated_at' => date_create()]);
        Supervisor::create(['supid' => 30605, 'supfname' => 'Matt', 'suplname' => 'Mcclintock', 'position' => 'Coordinator',
            'created_at' => date_create(), 'updated_at' => date_create()]);
        Supervisor::create(['supid' => 31111, 'supfname' => 'Tim', 'suplname' => 'Rosenthal', 'position' => 'Mezzanine Coordinator',
            'created_at' => date_create(), 'updated_at' => date_create()]);
    }
}