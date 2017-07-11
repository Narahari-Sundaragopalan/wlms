<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Employee;
use App\Schedule;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ScheduleController extends Controller
{

    public function __construct()
    {
        $this->schedule_array = [];
        $this->schedule_array_2 = [];
        $this->mezzanineArray = [];
        $this->runnerArray = [];

        $this->viewData = ['schedule_array' => $this->schedule_array, 'schedule_array_2' => $this->schedule_array_2, 'mezzanineArray' => $this->mezzanineArray, 'runnerArray' => $this->runnerArray];
    }

    public function index() {
        return view ('schedule.index');
    }

    public function create() {
        $conveyorLines = range(0,12);
        $masteredLines = range(0,32);
        return view('schedule.create', compact('conveyorLines', 'masteredLines'));
    }

    public function generate(Request $request) {

        $conveyorLines = $request['conveyor_line'];
        $masteredLines = $request['mastered_line'];

        $count = 0; $i = intval($conveyorLines);
        $line = [];
        $labeler_array = [];
        $index = 1;
        $employees = Employee::all();

        // Generate Line Setup for Conveyor Lines
        while($i > 0) {
            $labelerSet = false; $labeler = '';
            foreach ($employees as $employee) {
                if($employee->labeler && !($labelerSet)) {
                    if(!(array_search($employee->empname, $labeler_array, true))) {
                        $labeler = $employee->empname;
                        $labelerSet = true;
                        $count++;
                        $labeler_array[$index++] = $employee->empname;
                    }
                }
                if($labelerSet) {
                    break;
                }
            }
            if($labeler == '') {
                $labeler = 'T';
                $count++;
            }
            $line = ['line_number' => $count, 'labeler' => $labeler, 'icer' => 'T'];
            array_push($this->schedule_array, $line);
            $i--;
        }

        $j = intval($masteredLines);
        $line = [];
        $stocker_array = []; $stock_index = 1;

        // Generate Line Setup for Mastered Lines
        while($j > 0) {
            $labelerSet = false; $stockerSet = false;
            $labeler = ''; $stocker = '';
            foreach ($employees as $employee) {
                if ($employee->labeler && !($labelerSet)) {
                    if(!(array_search($employee->empname, $labeler_array, true)) && !(array_search($employee->empname, $stocker_array, true))) {
                        $labeler = $employee->empname;
                        $labelerSet = true;
                        $labeler_array[$index++] = $employee->empname;
                    }
                } elseif ($employee->stocker && !($stockerSet)) {
                    /* Check for Labeler array as well ? */
                    if(!(array_search($employee->empname, $stocker_array, true)) && !(array_search($employee->empname, $labeler_array, true))) {
                        $stocker = $employee->empname;
                        $stockerSet = true;
                        $stocker_array[$stock_index++] = $employee->empname;
                        $count++;
                    }
                }
                if($labelerSet && $stockerSet) {
                    break;
                }
            }
            // If Labeler and Stocker are not set, set them as Default Temps
            if($labeler == '') {
                $labeler = 'T';
            }
            if ($stocker == '') {
                $stocker = 'T';
                $count++;
            }
            $line = ['line_number' => $count, 'labeler' => $labeler, 'stocker' => $stocker, 'icer' => 'T'];
            array_push($this->schedule_array_2, $line);
            $j--;
        }

        //Set Mezzanine
        $total_lines = intval($conveyorLines) + intval($masteredLines);
        $numOfMezzanineWorkers = intval($total_lines / 3);
        if(intval($total_lines) % 3 != 0) {
            $numOfMezzanineWorkers += 1;
        }
        $arr = array();

        //Function to create Line number setup for mezzanine workers
        $arr =  $this->createMezzanineArray($total_lines, $numOfMezzanineWorkers);
        $lineIndexer = 1;
        $startIndexer = 0; $endIndex = 0;
        $lineArray= [];

        //Create line number setup
        for($i = 0; $i < sizeof($arr); $i++) {
            $endIndex += $arr[$i];
            $lineArray [$i] = $lineIndexer . '-' . $endIndex;
            $lineIndexer+= $arr[$i];
        }

        //Array for Mezzanine
        //Index to maintain in array
        $mezIndex = 1; $k = 0;
        //Array to save assigned workers
        $mezArray = [];

        while ($k < $numOfMezzanineWorkers) {
            $mezzanine = 'T';$mezzanineSet = false;
            foreach ($employees as $employee) {
                if ($employee->mezzanine && !($mezzanineSet)) {
                    if (!(array_search($employee->empname, $labeler_array, true)) && !(array_search($employee->empname, $stocker_array, true)) && !(array_search($employee->empname, $mezArray, true))) {
                        $mezzanine = $employee->empname;
                        $mezArray[$mezIndex++] = $mezzanine;
                        $mezzanineSet = true;
                    }
                }
                if($mezzanineSet) {
                    break;
                }
            }
            $line = ['lines' => $lineArray[$k], 'name' => $mezzanine];
            array_push($this->mezzanineArray, $line);
            $k++;
        }

        //Array for Runners in Schedule

        $numOfRunners = intval($total_lines / 6);
        if(intval($total_lines % 6) != 0) {
            $numOfRunners += 1;
        }
        $arr = $this->createMezzanineArray($total_lines, $numOfRunners);
        $lineIndexer = 1;
        $startIndexer = 0; $endIndex = 0;
        $lineArray= [];

        //Create line number setup
        for($i = 0; $i < sizeof($arr); $i++) {
            $endIndex += $arr[$i];
            $lineArray [$i] = $lineIndexer . '-' . $endIndex;
            $lineIndexer+= $arr[$i];
        }

        $runnerIndex = 1; $r = 0;
        //Array to save assigned runners
        $runnerArray = [];

        while($r < $numOfRunners) {
            $runner = 'T'; $runnerSet = false;
            foreach ($employees as $employee) {
                if($employee->runner && !($runnerSet)) {
                    if (!(array_search($employee->empname, $labeler_array, true)) && !(array_search($employee->empname, $stocker_array, true)) && !(array_search($employee->empname, $mezArray, true))) {
                        $runner = $employee->empname;
                        $runnerArray[$runnerIndex] = $runner;
                        $runnerSet = true;
                    }
                }
                if($runnerSet) {
                    break;
                }
            }
            $line = ['lines' => $lineArray[$r], 'name' => $runner];
            array_push($this->runnerArray, $line);
            $r++;
        }



        $this->viewData['schedule_array'] = $this->schedule_array;
        $this->viewData['schedule_array_2'] = $this->schedule_array_2;
        $this->viewData['mezzanineArray'] = $this->mezzanineArray;
        $this->viewData['runnerArray'] = $this->runnerArray;


        $timeOfSchedule = $request['schedule_time'];
        $coolersShipped = $request['coolers_shipped'];
        $scheduleDate = $request['schedule_date'];
        //Save the Schedule Array as JSON in Database
        $schedule = new Schedule();
        $schedule->schedule = json_encode($this->viewData);
        $schedule->date = $scheduleDate;
        $schedule->time = $timeOfSchedule;
        $schedule->save();

        return view ('schedule.generate', $this->viewData);
    }

    public function createMezzanineArray($lines, $workers) {

        $arr = [];
        for($i = 0; $i < $workers; $i++) {
            $arr[$i] = intval($lines / $workers);
        }

        for ($i = 0; $i < ($lines % $workers); $i++) {
            $arr[$i] += 1;
        }
        return $arr;

    }

    public function downloadReport(Request $request) {

        $scheduler = Schedule::all()->last();
        $timeOfSchedule = $scheduler->time;
        $coolersShipped = $request['coolers_shipped'];
        $scheduleDate = $scheduler->date;
        $this->viewData = json_decode($scheduler->schedule, true);
        $labelerArray = $this->viewData['schedule_array'];
        $masterLineArray = $this->viewData['schedule_array_2'];
        $runnerArray = $this->viewData['runnerArray'];
        $mezzanineArray = $this->viewData['mezzanineArray'];

        Excel::create('Schedule', function($excel) use ($timeOfSchedule, $scheduleDate, $labelerArray, $masterLineArray, $mezzanineArray, $runnerArray) {
            $excel->sheet('Lineup', function($sheet) use ($timeOfSchedule, $scheduleDate, $labelerArray, $masterLineArray, $mezzanineArray, $runnerArray) {
                $sheet->cell('I1', function ($cell) {
                    $cell->setValue('Time');
                    $cell->setFontWeight($bold = true);
                    $cell->setFontSize(16);
                });

                $sheet->getRowDimension(1)->setRowHeight(10);
                $sheet->getColumnDimension('A')->setWidth(100);

                $sheet->cell('J1', function ($cell) use ($timeOfSchedule) {
                    $cell->setValue($timeOfSchedule);
                    $cell->setFontWeight($bold = true);
                    $cell->setFontSize(16);
                });
                $sheet->mergeCells('K1:L1');
                $sheet->cell('K1', function($cell) {
                    $cell->setValue('Coolers Shipped');
                    $cell->setFontWeight($bold = true);
                    $cell->setFontSize(16);
                });
                $sheet->cell('M1', function($cell) {
                    $cell->setValue('1200');
                    $cell->setFontWeight($bold = true);
                    $cell->setFontSize(16);
                });
                $sheet->cell('N1', function ($cell) {
                    $cell->setValue('Date');
                    $cell->setFontWeight($bold = true);
                    $cell->setFontSize(16);
                });
                $sheet->cell('O1', function ($cell) use ($scheduleDate) {
                    $cell->setValue($scheduleDate);
                    $cell->setFontWeight($bold = true);
                    $cell->setFontSize(16);
                });

                // Fill Conveyor Lines in Excel Sheet Format
                $column = 'A'; $row = 5;
                $lineNumber = 12;

                for ($i = 0; $i < 12; $i++) {

                    $cellNumber = $column . $row;

                    $sheet->cell($cellNumber, function ($cell) use ($lineNumber) {
                        $cellValue = 'LINE #' . $lineNumber;
                        $cell->setValue($cellValue);
                        $cell->setFontWeight($bold = true);
                        $cell->setFontSize(14);

                    });
                    $column++;
                    $column++;
                    $lineNumber--;
                }


                $column = 'A'; $row = 6;
                for ($i = 0; $i < 12; $i++) {
                    $cellNumber = $column . $row;
                    $sheet->cell($cellNumber, function ($cell) {
                        $cellValue = 'Labeler';
                        $cell->setValue($cellValue);
                        $cell->setFontSize(14);
                    });
                    $column++;
                    $column++;
                }


                $column = 'A'; $row = 9;
                for ($i = 0; $i < 12; $i++) {
                    $cellNumber = $column . $row;
                    $sheet->cell($cellNumber, function ($cell) {
                        $cellValue = 'Icer';
                        $cell->setValue($cellValue);
                        $cell->setFontSize(14);
                    });
                    $column++;
                    $column++;
                }


                //Fill values for Labeler
                $column = 'W'; $row = 7;
                for ($index = 0; $index < sizeof($labelerArray); $index++) {
                    $cellNumber = $column . $row;
                    $sheet->cell($cellNumber, function ($cell) use ($labelerArray, $index) {
                        //global $labelerArray;
                        //global $index;
                        $cellValue = $labelerArray[$index]['labeler'];
                        $cell->setValue($cellValue);
                        $cell->setFontSize(14);
                    });
                    $column = chr(ord($column) -  1);
                    $column = chr(ord($column) -  1);
                }

                //Fill values for Icer
                $column = 'W'; $row = 10;
                for ($index = 0; $index < sizeof($labelerArray); $index++) {
                    $cellNumber = $column . $row;
                    $sheet->cell($cellNumber, function ($cell) {
                        $cellValue = 'Temp';
                        $cell->setValue($cellValue);
                        $cell->setFontSize(14);
                    });
                    $column = chr(ord($column) -  1);
                    $column = chr(ord($column) -  1);
                }


                // Fill Mastered Lines
                $column = 'A'; $row = 14;
                $lineNumber = 24;
                for ($i = 0; $i < 24; $i++) {
                    //After first row of Master Lines are set, reset for 2nd row
                    //Setting Line Numbers for Master Line
                    if($lineNumber == 12) {
                        $column = 'A'; $row = 26; $lineNumber = 36;
                    }
                    $cellNumber = $column . $row;
                    $sheet->cell($cellNumber, function ($cell) use($lineNumber) {
                        $cellValue = 'LINE #' . $lineNumber;
                        $cell->setValue($cellValue);
                        $cell->setFontWeight($bold = true);
                        $cell->setFontSize(14);

                    });
                    $column++;
                    $column++;
                    $lineNumber--;
                }


                $column = 'A'; $row = 15;
                $lineNumber = 24;
                for ($i = 0; $i < 24; $i++) {
                    //After first row of Master Lines are set, reset for 2nd row
                    //Setting Labeler Heading for Master Line
                    if($lineNumber == 12) {
                        $column = 'A'; $row = 27; $lineNumber = 36;
                    }
                    $cellNumber = $column . $row;
                    $sheet->cell($cellNumber, function ($cell) {
                        $cellValue = 'Labeler';
                        $cell->setValue($cellValue);
                        $cell->setFontSize(14);
                    });
                    $column++;
                    $column++;
                    $lineNumber--;
                }

                $column = 'A'; $row = 18;
                $lineNumber = 24;
                for ($i = 0; $i < 24; $i++) {
                    //After first row of Master Lines are set, reset for 2nd row
                    //Setting Stocker Heading for Master Line
                    if($lineNumber == 12) {
                        $column = 'A'; $row = 30; $lineNumber = 36;
                    }
                    $cellNumber = $column . $row;
                    $sheet->cell($cellNumber, function ($cell) {
                        $cellValue = 'Stocker';
                        $cell->setValue($cellValue);
                        $cell->setFontSize(14);

                    });
                    $column++;
                    $column++;
                    $lineNumber--;
                }


                $column = 'A'; $row = 21;
                $lineNumber = 24;
                for ($i = 0; $i < 24; $i++) {
                    //After first row of Master Lines are set, reset for 2nd row
                    //Setting Icer Heading for Master Line
                    if($lineNumber == 12) {
                        $column = 'A'; $row = 32; $lineNumber = 36;
                    }
                    $cellNumber = $column . $row;

                    $sheet->cell($cellNumber, function ($cell) {
                        $cellValue = 'Icer';
                        $cell->setValue($cellValue);
                        $cell->setFontSize(14);
                    });
                    $column++;
                    $column++;
                    $lineNumber--;
                }

                //Fill values for Labeler
                $column = 'W'; $row = 16;
                for ($index = 0; $index < sizeof($masterLineArray); $index++) {
                    if($index == 12) {
                        $column = 'W';
                        $row = 28;
                    }
                    $cellNumber = $column . $row;
                    $sheet->cell($cellNumber, function ($cell) use ($masterLineArray, $index) {
                        $cellValue = $masterLineArray[$index]['labeler'];
                        $cell->setValue($cellValue);
                        $cell->setFontSize(14);
                    });
                    $column = chr(ord($column) -  1);
                    $column = chr(ord($column) -  1);
                }


                //Fill values for Stocker
                $column = 'W'; $row = 19;
                for ($index = 0; $index < sizeof($masterLineArray); $index++) {
                    if($index == 12) {
                        $column = 'W';
                        $row = 31;
                    }
                    $cellNumber = $column . $row;
                    $sheet->cell($cellNumber, function ($cell) use ($masterLineArray, $index) {
                        $cellValue = $masterLineArray[$index]['stocker'];
                        $cell->setValue($cellValue);
                        $cell->setFontSize(14);
                    });
                    $column = chr(ord($column) -  1);
                    $column = chr(ord($column) -  1);
                }


                //Fill values for Icer
                $column = 'W'; $row = 22;
                for ($index = 0; $index < sizeof($masterLineArray); $index++) {
                    if($index == 12) {
                        $column = 'W';
                        $row = 33;
                    }
                    $cellNumber = $column . $row;
                    $sheet->cell($cellNumber, function ($cell) use ($masterLineArray, $index) {
                        $cellValue = $masterLineArray[$index]['icer'];
                        $cell->setValue($cellValue);
                        $cell->setFontSize(14);
                    });
                    $column = chr(ord($column) -  1);
                    $column = chr(ord($column) -  1);
                }

                //$column = 'A'; $row = 35;
                $sheet->cell('A35', function ($cell) {
                    $cell->setValue('Mezzanine');
                    $cell->setFontWeight($bold = true);
                    $cell->setFontSize(16);
                });

                $sheet->cell('A36', function ($cell) {
                    $cell->setValue('Lines');
                    $cell->setFontWeight($bold = true);
                    $cell->setFontSize(14);
                });

                $column = 'B'; $row = 35;
                for ($index = 0; $index < sizeof($mezzanineArray); $index++) {
                    $cellNumber = $column . $row;
                    $sheet->cell($cellNumber, function ($cell) use ($mezzanineArray, $index) {
                        $cellValue = $mezzanineArray[$index]['name'];
                        $cell->setValue($cellValue);
                        $cell->setFontSize(14);
                    });
                    $column++;
                }

                $column = 'B'; $row = 36;
                for ($index = 0; $index < sizeof($mezzanineArray); $index++) {
                    $cellNumber = $column . $row;
                    $sheet->cell($cellNumber, function ($cell) use ($mezzanineArray, $index) {
                        $cellValue = $mezzanineArray[$index]['lines'];
                        $cell->setValue($cellValue);
                        $cell->setFontSize(14);
                    });
                    $column++;
                }



            });
        })->download('xls');

    }

    public function show() {
        echo "Show Function to be implemented with View Old Schedules";
    }
}
