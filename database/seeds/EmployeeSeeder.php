<?php

use Illuminate\Database\Seeder;
use App\Employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Not used
 /*       DB::table('employees')->delete();
        Employee::create([  'empid' => 54118, 'empfname' => 'Amelia', 'emplname' =>  'Gaytan', 'positiontype' => 'Full-time',
            'experience' => 'Trained', 'labeler_rating' => '4', 'stocker_rating' => '3', 'english' => true, 'icer' => false, 'labeler' => true, 'mezzanine' => true,
            'stocker' => true, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 29268, 'empfname' => 'Andrea','emplname' => 'Johnson', 'positiontype' => 'Full-time',
            'experience' => 'Trained', 'labeler_rating' => '5', 'stocker_rating' => '4', 'english' => true, 'icer' => false, 'labeler' => true, 'mezzanine' => true,
            'stocker' => true, 'runner' => true, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 48593, 'empfname' => 'Berenice', 'emplname' =>  'Bravo', 'positiontype' => 'Full-time',
            'experience' => 'Trained', 'labeler_rating' => '2', 'stocker_rating' => '3', 'english' => true, 'icer' => false, 'labeler' => true, 'mezzanine' => true,
            'stocker' => true, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 55596, 'empfname' => 'Brandi', 'emplname' => 'Moore', 'positiontype' => 'Full-time',
            'experience' => 'Trained', 'labeler_rating' => '5', 'stocker_rating' => '5', 'english' => true, 'icer' => false, 'labeler' => true, 'mezzanine' => true,
            'stocker' => true, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 47773, 'empfname' => 'Brenden', 'emplname' => 'Babb', 'positiontype' => 'Full-time',
            'experience' => 'Trained', 'labeler_rating' => '3', 'stocker_rating' => '3', 'english' => true, 'icer' => false, 'labeler' => true, 'mezzanine' => true,
            'stocker' => true, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 23663, 'empfname' => 'Brent', 'emplname' => 'Brown', 'positiontype' => 'Full-time',
            'experience' => 'Trained', 'labeler_rating' => '1', 'stocker_rating' => '1', 'english' => true, 'icer' => false, 'labeler' => false, 'mezzanine' => true,
            'stocker' => false, 'runner' => false, 'qc' => false, 'cleaner' => true, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 50587, 'empfname' => 'Candi', 'emplname' => 'Rider', 'positiontype' => 'Full-time',
            'experience' => 'Trained', 'labeler_rating' => '4', 'stocker_rating' => '3', 'english' => true, 'icer' => false, 'labeler' => true, 'mezzanine' => true,
            'stocker' => true, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 48218, 'empfname' => 'Clarivel', 'emplname' => 'Murillo', 'positiontype' => 'Full-time',
            'experience' => 'Trained', 'labeler_rating' => '2', 'stocker_rating' => '2', 'english' => true, 'icer' => false, 'labeler' => false, 'mezzanine' => false,
            'stocker' => false, 'runner' => false, 'qc' => true, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 52545, 'empfname' => 'Daniel', 'emplname' => 'Mart', 'positiontype' => 'Full-time',
            'experience' => 'Trained', 'labeler_rating' => '3', 'stocker_rating' => '4', 'english' => true, 'icer' => false, 'labeler' => false, 'mezzanine' => true,
            'stocker' => true, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

       Employee::create([  'empid' => 25578, 'empfname' => 'Delia', 'emplname' => 'Nolasco', 'positiontype' => 'Full-time',
            'experience' => 'Trained', 'labeler_rating' => '5', 'stocker_rating' => '1', 'english' => true, 'icer' => false, 'labeler' => true, 'mezzanine' => true,
            'stocker' => true, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 40515, 'empfname' => 'Eric', 'emplname' => 'Blakely', 'positiontype' => 'Full-time',
            'experience' => 'Trained', 'labeler_rating' => '4', 'stocker_rating' => '3', 'english' => true, 'icer' => false, 'labeler' => true, 'mezzanine' => true,
            'stocker' => true, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 38383, 'empfname' => 'Guisela Morales', 'emplname' => 'Fernandez', 'positiontype' => 'Full-time',
            'experience' => 'Trained', 'labeler_rating' => '2', 'stocker_rating' => '3', 'english' => true, 'icer' => false, 'labeler' => true, 'mezzanine' => true,
            'stocker' => true, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 31969, 'empfname' => 'Hugo', 'emplname' => 'Zamorano', 'positiontype' => 'Full-time',
            'experience' => 'Trained', 'labeler_rating' => '1', 'stocker_rating' => '4', 'english' => true, 'icer' => false, 'labeler' => true, 'mezzanine' => true,
            'stocker' => true, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 17986, 'empfname' => 'Isiah', 'emplname' => 'Velasquez', 'positiontype' => 'Full-time',
            'experience' => 'Trained', 'labeler_rating' => '4', 'stocker_rating' => '4', 'english' => true, 'icer' => false, 'labeler' => true, 'mezzanine' => true,
            'stocker' => true, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 9187, 'empfname' => 'Jay', 'emplname' => 'Johnson', 'positiontype' => 'Full-time',
            'experience' => 'Trained', 'labeler_rating' => '3', 'stocker_rating' => '3', 'english' => true, 'icer' => false, 'labeler' => true, 'mezzanine' => true,
            'stocker' => true, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 47602, 'empfname' => 'Jeff', 'emplname' => 'Athey', 'positiontype' => 'Full-time',
            'experience' => 'Trained', 'labeler_rating' => '2', 'stocker_rating' => '5', 'english' => true, 'icer' => false, 'labeler' => true, 'mezzanine' => true,
            'stocker' => true, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 48037, 'empfname' => 'Jennifer', 'emplname' => 'Gregorio', 'positiontype' => 'Full-time',
            'experience' => 'Trained', 'labeler_rating' => '1', 'stocker_rating' => '1', 'english' => true, 'icer' => false, 'labeler' => false, 'mezzanine' => true,
            'stocker' => false, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 25725, 'empfname' => 'Joel', 'emplname' =>'Velasquez', 'positiontype' => 'Full-time',
            'experience' => 'Trained', 'labeler_rating' => '4', 'stocker_rating' => '4', 'english' => true, 'icer' => false, 'labeler' => true, 'mezzanine' => true,
            'stocker' => true, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 34723, 'empfname' => 'Joy', 'emplname' => 'Burnett', 'positiontype' => 'Full-time',
            'experience' => 'Trained', 'labeler_rating' => '3', 'stocker_rating' => '2', 'english' => true, 'icer' => false, 'labeler' => true, 'mezzanine' => true,
            'stocker' => true, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 33135, 'empfname' => 'Kristine', 'emplname' => 'Athey', 'positiontype' => 'Full-time',
            'experience' => 'Trained', 'labeler_rating' => '3', 'stocker_rating' => '1', 'english' => true, 'icer' => false, 'labeler' => true, 'mezzanine' => true,
            'stocker' => true, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 8161, 'empfname' => 'Laura', 'emplname' => 'Ealy', 'positiontype' => 'Full-time',
            'experience' => 'Trained', 'labeler_rating' => '4', 'stocker_rating' => '4', 'english' => true, 'icer' => false, 'labeler' => true, 'mezzanine' => true,
            'stocker' => true, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 44168, 'empfname' => 'Lilliana', 'emplname' => 'Abrego', 'positiontype' => 'Full-time',
            'experience' => 'Trained', 'labeler_rating' => '3', 'stocker_rating' => '5', 'english' => true, 'icer' => false, 'labeler' => true, 'mezzanine' => true,
            'stocker' => true, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 29930, 'empfname' => 'Lilliana', 'emplname' =>'Londono', 'positiontype' => 'Full-time',
            'experience' => 'Trained', 'labeler_rating' => '2', 'stocker_rating' => '4', 'english' => true, 'icer' => false, 'labeler' => true, 'mezzanine' => true,
            'stocker' => true, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 19897, 'empfname' => 'Maria', 'emplname' => 'Arias', 'positiontype' => 'Full-time',
            'experience' => 'Trained', 'labeler_rating' => '1', 'stocker_rating' => '3', 'english' => true, 'icer' => false, 'labeler' => false, 'mezzanine' => true,
            'stocker' => true, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 20826, 'empfname' => 'Maria', 'emplname' => 'Bautista', 'positiontype' => 'Full-time',
            'experience' => 'Trained', 'labeler_rating' => '4', 'stocker_rating' => '3', 'english' => true, 'icer' => false, 'labeler' => true, 'mezzanine' => true,
            'stocker' => true, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 38936, 'empfname' => 'Maria', 'emplname' => 'Chavez', 'positiontype' => 'Full-time',
            'experience' => 'Trained', 'labeler_rating' => '4', 'stocker_rating' => '4', 'english' => true, 'icer' => false, 'labeler' => true, 'mezzanine' => true,
            'stocker' => true, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 31727, 'empfname' => 'Maria', 'emplname' => 'Lira', 'positiontype' => 'Full-time',
            'experience' => 'Trained', 'labeler_rating' => '3', 'stocker_rating' => '3', 'english' => true, 'icer' => false, 'labeler' => true, 'mezzanine' => true,
            'stocker' => true, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 25632, 'empfname' => 'Martin', 'emplname' => 'Perez', 'positiontype' => 'Full-time',
            'experience' => 'Trained', 'labeler_rating' => '4', 'stocker_rating' => '2', 'english' => true, 'icer' => false, 'labeler' => true, 'mezzanine' => true,
            'stocker' => false, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 42498, 'empfname' => 'Mary Jo', 'emplname' => 'Stockdale', 'positiontype' => 'Full-time',
            'experience' => 'Trained', 'labeler_rating' => '4', 'stocker_rating' => '3', 'english' => true, 'icer' => false, 'labeler' => true, 'mezzanine' => true,
            'stocker' => true, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 30605, 'empfname' => 'Matt', 'emplname' => 'Mcclintock', 'positiontype' => 'Full-time',
            'experience' => 'Trained', 'labeler_rating' => '4', 'stocker_rating' => '1', 'english' => true, 'icer' => false, 'labeler' => true, 'mezzanine' => true,
            'stocker' => false, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 53507, 'empfname' => 'Michael', 'emplname' => 'Gruner', 'positiontype' => 'Full-time',
            'experience' => 'Trained', 'labeler_rating' => '4', 'stocker_rating' => '3', 'english' => true, 'icer' => false, 'labeler' => true, 'mezzanine' => true,
            'stocker' => true, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 53646, 'empfname' => 'Michelle', 'emplname' => 'Johnson', 'positiontype' => 'Full-time',
            'experience' => 'Trained', 'labeler_rating' => '3', 'stocker_rating' => '3', 'english' => true, 'icer' => false, 'labeler' => true, 'mezzanine' => true,
            'stocker' => true, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 16687, 'empfname' => 'Olga Herrera', 'emplname' =>'De Rodriguez', 'positiontype' => 'Full-time',
            'experience' => 'Trained', 'labeler_rating' => '3', 'stocker_rating' => '4', 'english' => true, 'icer' => false, 'labeler' => true, 'mezzanine' => true,
            'stocker' => true, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 45542, 'empfname' => 'Patricia', 'emplname' => 'Campbell', 'positiontype' => 'Full-time',
            'experience' => 'Trained', 'labeler_rating' => '3', 'stocker_rating' => '3', 'english' => true, 'icer' => false, 'labeler' => true, 'mezzanine' => true,
            'stocker' => true, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 50374, 'empfname' => 'Reinaldo', 'emplname' => 'Casares', 'positiontype' => 'Full-time',
            'experience' => 'Trained', 'labeler_rating' => '5', 'stocker_rating' => '5', 'english' => true, 'icer' => false, 'labeler' => true, 'mezzanine' => true,
            'stocker' => true, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 38737, 'empfname' => 'Roberta', 'emplname' => 'Watson', 'positiontype' => 'Full-time',
            'experience' => 'Trained', 'labeler_rating' => '2', 'stocker_rating' => '3', 'english' => true, 'icer' => false, 'labeler' => true, 'mezzanine' => true,
            'stocker' => true, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 30222, 'empfname' => 'Ryan','emplname' => 'Land', 'positiontype' => 'Full-time',
            'experience' => 'Trained', 'labeler_rating' => '3', 'stocker_rating' => '2', 'english' => true, 'icer' => false, 'labeler' => true, 'mezzanine' => true,
            'stocker' => true, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 53307, 'empfname' => 'Scott', 'emplname' => 'Shelton', 'positiontype' => 'Full-time',
            'experience' => 'Trained', 'labeler_rating' => '3', 'stocker_rating' => '3', 'english' => true, 'icer' => false, 'labeler' => true, 'mezzanine' => true,
            'stocker' => true, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 54263, 'empfname' => 'Shalako', 'emplname' => 'Hanover', 'positiontype' => 'Full-time',
            'experience' => 'Trained', 'labeler_rating' => '4', 'stocker_rating' => '4', 'english' => true, 'icer' => false, 'labeler' => true, 'mezzanine' => true,
            'stocker' => true, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 36610, 'empfname' => 'Sonny', 'emplname' => 'Drummond', 'positiontype' => 'Full-time',
            'experience' => 'Trained', 'labeler_rating' => '5', 'stocker_rating' => '4', 'english' => true, 'icer' => false, 'labeler' => true, 'mezzanine' => true,
            'stocker' => true, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 35922, 'empfname' => 'Teresa', 'emplname' =>'De Jesus', 'positiontype' => 'Full-time',
            'experience' => 'Trained', 'labeler_rating' => '4', 'stocker_rating' => '5', 'english' => true, 'icer' => false, 'labeler' => true, 'mezzanine' => true,
            'stocker' => true, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 31111, 'empfname' => 'Tim', 'emplname' => 'Rosenthal', 'positiontype' => 'Full-time',
            'experience' => 'Trained', 'labeler_rating' => '4', 'stocker_rating' => '3', 'english' => true, 'icer' => false, 'labeler' => true, 'mezzanine' => true,
            'stocker' => true, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);
    */}
}