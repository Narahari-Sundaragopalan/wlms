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
        DB::table('employees')->delete();
        Employee::create([  'empid' => 54118, 'empname' => 'Amelia Gaytan', 'positiontype' => 'full-time',
            'experience' => 'trained', 'labeler_rating' => '4', 'stocker_rating' => '3', 'language' => 'English', 'icer' => false, 'labeler' => true, 'mezzanine' => true,
            'stocker' => true, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 29268, 'empname' => 'Andrea Johnson', 'positiontype' => 'full-time',
            'experience' => 'trained', 'labeler_rating' => '5', 'stocker_rating' => '4', 'language' => 'English', 'icer' => false, 'labeler' => true, 'mezzanine' => true,
            'stocker' => true, 'runner' => true, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 48593, 'empname' => 'Berenice Bravo', 'positiontype' => 'full-time',
            'experience' => 'trained', 'labeler_rating' => '2', 'stocker_rating' => '3', 'language' => 'English', 'icer' => false, 'labeler' => true, 'mezzanine' => true,
            'stocker' => true, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 55596, 'empname' => 'Brandi Moore', 'positiontype' => 'full-time',
            'experience' => 'trained', 'labeler_rating' => '5', 'stocker_rating' => '5', 'language' => 'English', 'icer' => false, 'labeler' => true, 'mezzanine' => true,
            'stocker' => true, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 47773, 'empname' => 'Brenden Babb', 'positiontype' => 'full-time',
            'experience' => 'trained', 'labeler_rating' => '3', 'stocker_rating' => '3', 'language' => 'English', 'icer' => false, 'labeler' => true, 'mezzanine' => true,
            'stocker' => true, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 23663, 'empname' => 'Brent Brown', 'positiontype' => 'full-time',
            'experience' => 'trained', 'labeler_rating' => '1', 'stocker_rating' => '1', 'language' => 'English', 'icer' => false, 'labeler' => false, 'mezzanine' => true,
            'stocker' => false, 'runner' => false, 'qc' => false, 'cleaner' => true, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 50587, 'empname' => 'Candi Rider', 'positiontype' => 'full-time',
            'experience' => 'trained', 'labeler_rating' => '4', 'stocker_rating' => '3', 'language' => 'English', 'icer' => false, 'labeler' => true, 'mezzanine' => true,
            'stocker' => true, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 48218, 'empname' => 'Clarivel Murillo', 'positiontype' => 'full-time',
            'experience' => 'trained', 'labeler_rating' => '2', 'stocker_rating' => '2', 'language' => 'English', 'icer' => false, 'labeler' => false, 'mezzanine' => false,
            'stocker' => false, 'runner' => false, 'qc' => true, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 52545, 'empname' => 'Daniel Mart', 'positiontype' => 'full-time',
            'experience' => 'trained', 'labeler_rating' => '3', 'stocker_rating' => '4', 'language' => 'English', 'icer' => false, 'labeler' => false, 'mezzanine' => true,
            'stocker' => true, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

    /*Start Here*/    Employee::create([  'empid' => 25578, 'empname' => 'Delia Nolasco', 'positiontype' => 'full-time',
            'experience' => 'trained', 'labeler_rating' => '5', 'stocker_rating' => '1', 'language' => 'English', 'icer' => false, 'labeler' => true, 'mezzanine' => true,
            'stocker' => true, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 40515, 'empname' => 'Eric Blakely', 'positiontype' => 'full-time',
            'experience' => 'trained', 'labeler_rating' => '4', 'stocker_rating' => '3', 'language' => 'English', 'icer' => false, 'labeler' => true, 'mezzanine' => true,
            'stocker' => true, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 38383, 'empname' => 'Guisela Morales Fernandez', 'positiontype' => 'full-time',
            'experience' => 'trained', 'labeler_rating' => '2', 'stocker_rating' => '3', 'language' => 'English', 'icer' => false, 'labeler' => true, 'mezzanine' => true,
            'stocker' => true, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 31969, 'empname' => 'Hugo Zamorano', 'positiontype' => 'full-time',
            'experience' => 'trained', 'labeler_rating' => '1', 'stocker_rating' => '4', 'language' => 'English', 'icer' => false, 'labeler' => true, 'mezzanine' => true,
            'stocker' => true, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 17986, 'empname' => 'Isiah Velasquez', 'positiontype' => 'full-time',
            'experience' => 'trained', 'labeler_rating' => '4', 'stocker_rating' => '4', 'language' => 'English', 'icer' => false, 'labeler' => true, 'mezzanine' => true,
            'stocker' => true, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 9187, 'empname' => 'Jay Johnson', 'positiontype' => 'full-time',
            'experience' => 'trained', 'labeler_rating' => '3', 'stocker_rating' => '3', 'language' => 'English', 'icer' => false, 'labeler' => true, 'mezzanine' => true,
            'stocker' => true, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 47602, 'empname' => 'Jeff Athey', 'positiontype' => 'full-time',
            'experience' => 'trained', 'labeler_rating' => '2', 'stocker_rating' => '5', 'language' => 'English', 'icer' => false, 'labeler' => true, 'mezzanine' => true,
            'stocker' => true, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 48037, 'empname' => 'Jennifer Gregorio', 'positiontype' => 'full-time',
            'experience' => 'trained', 'labeler_rating' => '1', 'stocker_rating' => '1', 'language' => 'English', 'icer' => false, 'labeler' => false, 'mezzanine' => true,
            'stocker' => false, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 25725, 'empname' => 'Joel Velasquez', 'positiontype' => 'full-time',
            'experience' => 'trained', 'labeler_rating' => '4', 'stocker_rating' => '4', 'language' => 'English', 'icer' => false, 'labeler' => true, 'mezzanine' => true,
            'stocker' => true, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 34723, 'empname' => 'Joy Burnett', 'positiontype' => 'full-time',
            'experience' => 'trained', 'labeler_rating' => '3', 'stocker_rating' => '2', 'language' => 'English', 'icer' => false, 'labeler' => true, 'mezzanine' => true,
            'stocker' => true, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 33135, 'empname' => 'Kristine Athey', 'positiontype' => 'full-time',
            'experience' => 'trained', 'labeler_rating' => '3', 'stocker_rating' => '1', 'language' => 'English', 'icer' => false, 'labeler' => true, 'mezzanine' => true,
            'stocker' => true, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 8161, 'empname' => 'Laura Ealy', 'positiontype' => 'full-time',
            'experience' => 'trained', 'labeler_rating' => '4', 'stocker_rating' => '4', 'language' => 'English', 'icer' => false, 'labeler' => true, 'mezzanine' => true,
            'stocker' => true, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 44168, 'empname' => 'Lilliana Abrego', 'positiontype' => 'full-time',
            'experience' => 'trained', 'labeler_rating' => '3', 'stocker_rating' => '5', 'language' => 'English', 'icer' => false, 'labeler' => true, 'mezzanine' => true,
            'stocker' => true, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 29930, 'empname' => 'Lilliana Londono', 'positiontype' => 'full-time',
            'experience' => 'trained', 'labeler_rating' => '2', 'stocker_rating' => '4', 'language' => 'English', 'icer' => false, 'labeler' => true, 'mezzanine' => true,
            'stocker' => true, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 19897, 'empname' => 'Maria Arias', 'positiontype' => 'full-time',
            'experience' => 'trained', 'labeler_rating' => '1', 'stocker_rating' => '3', 'language' => 'English', 'icer' => false, 'labeler' => false, 'mezzanine' => true,
            'stocker' => true, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 20826, 'empname' => 'Maria Bautista', 'positiontype' => 'full-time',
            'experience' => 'trained', 'labeler_rating' => '4', 'stocker_rating' => '3', 'language' => 'English', 'icer' => false, 'labeler' => true, 'mezzanine' => true,
            'stocker' => true, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 38936, 'empname' => 'Maria Chavez', 'positiontype' => 'full-time',
            'experience' => 'trained', 'labeler_rating' => '4', 'stocker_rating' => '4', 'language' => 'English', 'icer' => false, 'labeler' => true, 'mezzanine' => true,
            'stocker' => true, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 31727, 'empname' => 'Maria Lira', 'positiontype' => 'full-time',
            'experience' => 'trained', 'labeler_rating' => '3', 'stocker_rating' => '3', 'language' => 'English', 'icer' => false, 'labeler' => true, 'mezzanine' => true,
            'stocker' => true, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 25632, 'empname' => 'Martin Perez', 'positiontype' => 'full-time',
            'experience' => 'trained', 'labeler_rating' => '4', 'stocker_rating' => '2', 'language' => 'English', 'icer' => false, 'labeler' => true, 'mezzanine' => true,
            'stocker' => false, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 42498, 'empname' => 'Mary Jo Stockdale', 'positiontype' => 'full-time',
            'experience' => 'trained', 'labeler_rating' => '4', 'stocker_rating' => '3', 'language' => 'English', 'icer' => false, 'labeler' => true, 'mezzanine' => true,
            'stocker' => true, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 30605, 'empname' => 'Matt Mcclintock', 'positiontype' => 'full-time',
            'experience' => 'trained', 'labeler_rating' => '4', 'stocker_rating' => '1', 'language' => 'English', 'icer' => false, 'labeler' => true, 'mezzanine' => true,
            'stocker' => false, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 53507, 'empname' => 'Michael Gruner', 'positiontype' => 'full-time',
            'experience' => 'trained', 'labeler_rating' => '4', 'stocker_rating' => '3', 'language' => 'English', 'icer' => false, 'labeler' => true, 'mezzanine' => true,
            'stocker' => true, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 53646, 'empname' => 'Michelle Johnson', 'positiontype' => 'full-time',
            'experience' => 'trained', 'labeler_rating' => '3', 'stocker_rating' => '3', 'language' => 'English', 'icer' => false, 'labeler' => true, 'mezzanine' => true,
            'stocker' => true, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 16687, 'empname' => 'Olga Herrera De Rodriguez', 'positiontype' => 'full-time',
            'experience' => 'trained', 'labeler_rating' => '3', 'stocker_rating' => '4', 'language' => 'English', 'icer' => false, 'labeler' => true, 'mezzanine' => true,
            'stocker' => true, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 45542, 'empname' => 'Patricia Campbell', 'positiontype' => 'full-time',
            'experience' => 'trained', 'labeler_rating' => '3', 'stocker_rating' => '3', 'language' => 'English', 'icer' => false, 'labeler' => true, 'mezzanine' => true,
            'stocker' => true, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 50374, 'empname' => 'Reinaldo Casares', 'positiontype' => 'full-time',
            'experience' => 'trained', 'labeler_rating' => '5', 'stocker_rating' => '5', 'language' => 'English', 'icer' => false, 'labeler' => true, 'mezzanine' => true,
            'stocker' => true, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 38737, 'empname' => 'Roberta Watson', 'positiontype' => 'full-time',
            'experience' => 'trained', 'labeler_rating' => '2', 'stocker_rating' => '3', 'language' => 'English', 'icer' => false, 'labeler' => true, 'mezzanine' => true,
            'stocker' => true, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 30222, 'empname' => 'Ryan Land', 'positiontype' => 'full-time',
            'experience' => 'trained', 'labeler_rating' => '3', 'stocker_rating' => '2', 'language' => 'English', 'icer' => false, 'labeler' => true, 'mezzanine' => true,
            'stocker' => true, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 53307, 'empname' => 'Scott Shelton', 'positiontype' => 'full-time',
            'experience' => 'trained', 'labeler_rating' => '3', 'stocker_rating' => '3', 'language' => 'English', 'icer' => false, 'labeler' => true, 'mezzanine' => true,
            'stocker' => true, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 54263, 'empname' => 'Shalako Hanover', 'positiontype' => 'full-time',
            'experience' => 'trained', 'labeler_rating' => '4', 'stocker_rating' => '4', 'language' => 'English', 'icer' => false, 'labeler' => true, 'mezzanine' => true,
            'stocker' => true, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 36610, 'empname' => 'Sonny Drummond', 'positiontype' => 'full-time',
            'experience' => 'trained', 'labeler_rating' => '5', 'stocker_rating' => '4', 'language' => 'English', 'icer' => false, 'labeler' => true, 'mezzanine' => true,
            'stocker' => true, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 35922, 'empname' => 'Teresa De Jesus', 'positiontype' => 'full-time',
            'experience' => 'trained', 'labeler_rating' => '4', 'stocker_rating' => '5', 'language' => 'English', 'icer' => false, 'labeler' => true, 'mezzanine' => true,
            'stocker' => true, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);

        Employee::create([  'empid' => 31111, 'empname' => 'Tim Rosenthal', 'positiontype' => 'full-time',
            'experience' => 'trained', 'labeler_rating' => '4', 'stocker_rating' => '3', 'language' => 'English', 'icer' => false, 'labeler' => true, 'mezzanine' => true,
            'stocker' => true, 'runner' => false, 'qc' => false, 'cleaner' => false, 'gift_box' => false, 'comment' => '',
            'created_at' => date_create(), 'updated_at' => date_create()]);
    }
}