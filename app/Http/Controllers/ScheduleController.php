<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Employee;
use App\Schedule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;
use Validator;
use DateTime;
use Auth;
class ScheduleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->schedule_array = [];
        $this->schedule_array_2 = [];
        $this->mezzanineArray = [];
        $this->runnerArray = [];
        $this->qc = [];
        $this->giftBox = [];
        $this->cleaner = [];
        $this->freezer = [];
        $this->heading = 'Schedule';

        $this->viewData = ['schedule_array' => $this->schedule_array, 'schedule_array_2' => $this->schedule_array_2,
            'mezzanineArray' => $this->mezzanineArray, 'runnerArray' => $this->runnerArray, 'qc' => $this->qc,
            'cleaner' => $this->cleaner, 'giftBox' => $this->giftBox, 'freezer' => $this->freezer, 'heading' => $this->heading];
    }

    public function index() {
         $user = Auth::user();
        return view ('schedule.index', compact('user'));
    }

    public function create() {
        
        $conveyorLines = range(1,12);
        array_unshift($conveyorLines, "");
        unset($conveyorLines[0]);

        $supportLines = range(1,24);
        array_unshift($supportLines, "");
        unset($supportLines[0]);

        return view('schedule.create', compact('conveyorLines', 'supportLines'));
    }

    public function generate(Request $request) {


        $validator = Validator::make($request->all(), [
            'schedule_date' => 'bail|required',
            'schedule_time' => 'required',
            'conveyor_line' => 'required|numeric|not_in:0',
            'support_line' => 'required|numeric|not_in:0',
        ]);

        if ($validator->fails()) {
            return redirect('/schedule/createSchedule')->withErrors($validator)->withInput();
        }

        $conveyorLines = $request['conveyor_line'];
        $supportLines = $request['support_line'];

        $count = 0; $i = intval($conveyorLines);
        $line = []; $numberOfTemps = 0;
        $labeler_array = []; $icerArray = [];
        $index = 1; $icerIndex = 1;
        $employees = Employee::all();
        $isLangEnglish = false;
        $isLangSpanish = false;

        // Generate Line Setup for Conveyor Lines
        while($i > 0) {
            $labelerSet = false; $labeler = ''; $icerSet = false; $icer = '';
            foreach ($employees as $employee) {
                if($employee->labeler && !($labelerSet)) {
                    if(!(array_search($employee->id, $labeler_array, true)) && !(array_search($employee->id, $icerArray, true))) {
                        $labeler = $employee->empfname . ' ' . $employee->emplname[0];
                        $labelerSet = true;
                        $isLangEnglish = $employee->english;
                        $isLangSpanish = $employee->spanish;
                        $labeler_array[$index++] = $employee->id;
                    }
                } elseif ($employee->icer && !($icerSet)) {
                    if(!(array_search($employee->id, $labeler_array, true)) && !(array_search($employee->id, $icerArray, true))) {
                        if(($employee->english && $isLangEnglish) || ($employee->spanish && $isLangSpanish)) {
                            $icer = $employee->empfname . ' ' . $employee->emplname[0];
                            $icerSet = true;
                            $icerArray[$icerIndex] = $employee->id;
                            $count++;
                        } else {
                            continue;
                        }

                    }
                }
                if($labelerSet && $icerSet) {
                    break;
                }
            }
            if($labeler == '') {
                $labeler = 'Temp';
                $numberOfTemps++;
            }
            if ($icer == '') {
                $icer = 'Temp';
                $count++;
                $numberOfTemps++;
            }
            $line = ['line_number' => $count, 'labeler' => $labeler, 'icer' => $icer];
            array_push($this->schedule_array, $line);
            $i--;
        }

        $j = intval($supportLines);
        $line = [];
        $count = 12; // Set Count to the end of Conveyor Line Number
        $stocker_array = []; $stock_index = 1;

        // Generate Line Setup for Support Lines
        while($j > 0) {
            $labelerSet = false; $stockerSet = false; $icerSet = false;
            $labeler = ''; $stocker = ''; $icer = '';
            foreach ($employees as $employee) {
                if ($employee->labeler && !($labelerSet)) {
                    if(!(array_search($employee->id, $labeler_array, true)) && !(array_search($employee->id, $stocker_array, true)) && !(array_search($employee->id, $icerArray, true))) {
                        $labeler = $employee->empfname . ' ' . $employee->emplname[0];
                        $labelerSet = true;
                        $isLangEnglish = $employee->english;
                        $isLangSpanish = $employee->spanish;
                        $labeler_array[$index++] = $employee->id;
                    }
                } elseif ($employee->stocker && !($stockerSet)) {
                    if(!(array_search($employee->id, $stocker_array, true)) && !(array_search($employee->id, $labeler_array, true)) && !(array_search($employee->id, $icerArray, true))) {
                        if(($employee->english && $isLangEnglish) || ($employee->spanish && $isLangSpanish)) {
                            $stocker = $employee->empfname . ' ' . $employee->emplname[0];
                            $stockerSet = true;
                            $stocker_array[$stock_index++] = $employee->id;
                        }
                    }
                } elseif ($employee->icer && !($icerSet)) {
                    if(!(array_search($employee->id, $stocker_array, true)) && !(array_search($employee->id, $labeler_array, true)) && !(array_search($employee->id, $icerArray, true))) {
                        if(($employee->english && $isLangEnglish) || ($employee->spanish && $isLangSpanish)) {
                            $icer = $employee->empfname . ' ' . $employee->emplname[0];
                            $icerSet = true;
                            $icerArray[$icerIndex++] = $employee->id;
                            $count++;
                        } else {
                            continue;
                        }
                    }
                }
                if($labelerSet && $stockerSet && $icerSet) {
                    break;
                }
            }

            // If Labeler and Stocker are not set, set them as Default Temps
            if($labeler == '') {
                $labeler = 'Temp';
                $numberOfTemps++;
            }
            if ($stocker == '') {
                $stocker = 'Temp';
                $numberOfTemps++;
            }
            if($icer == '') {
                $icer = 'Temp';
                $count++;
                $numberOfTemps++;
            }
            $line = ['line_number' => $count, 'labeler' => $labeler, 'stocker' => $stocker, 'icer' => $icer];
            array_push($this->schedule_array_2, $line);
            $j--;
        }

        //Create Line Setup for Mezzanine
        $mezzanineFlag = true;
        $lineArray = $this->createLineSetup($conveyorLines, $supportLines, $mezzanineFlag);

        //Array for Mezzanine
        $numOfMezzanineWorkers = (intval($conveyorLines / 3) + intval($supportLines / 3));
        if(intval($conveyorLines) % 3 != 0) {
            $numOfMezzanineWorkers += 1;
        }
        if(intval($supportLines) % 3 != 0) {
            $numOfMezzanineWorkers += 1;
        }


        //Index to maintain in array
        $mezIndex = 1; $k = 0;
        //Array to save assigned workers
        $mezArray = [];

        while ($k < $numOfMezzanineWorkers) {
            $mezzanine = '';$mezzanineSet = false;
            foreach ($employees as $employee) {
                if ($employee->mezzanine && !($mezzanineSet)) {
                    if (!(array_search($employee->id, $labeler_array, true)) && !(array_search($employee->id, $stocker_array, true))
                        && !(array_search($employee->id, $mezArray, true)) && !(array_search($employee->id, $icerArray, true))) {
                        $mezzanine = $employee->empfname . ' ' . $employee->emplname[0];
                        $mezArray[$mezIndex++] = $employee->id;
                        $mezzanineSet = true;
                    }
                }
                if($mezzanineSet) {
                    break;
                }
            }
            if($mezzanine == '') {
                $mezzanine = 'Temp';
                $numberOfTemps++;
            }
            $line = ['startLine' => $lineArray[$k]['startLine'], 'endLine' => $lineArray[$k]['endLine'], 'name' => $mezzanine];
            array_push($this->mezzanineArray, $line);
            $k++;
        }

        //Create Line Setup for Runners
        $mezzanineFlag = false;
        $lineArray = $this->createLineSetup($conveyorLines, $supportLines, $mezzanineFlag);

        //Array for Runners in Schedule
        $numOfRunners = (intval($conveyorLines / 6) + intval($supportLines / 6));
        if(intval($conveyorLines % 6) != 0) {
            $numOfRunners += 1;
        }
        if(intval($supportLines % 6) != 0) {
            $numOfRunners += 1;
        }

        $runnerIndex = 1; $r = 0;
        //Array to save assigned runners
        $runnerArray = [];

        while($r < $numOfRunners) {
            $runner = ''; $runnerSet = false;
            foreach ($employees as $employee) {
                if($employee->runner && !($runnerSet)) {
                    if (!(array_search($employee->id, $labeler_array, true)) && !(array_search($employee->id, $stocker_array, true))
                        && !(array_search($employee->id, $mezArray, true)) && !(array_search($employee->id, $runnerArray, true))
                        && !(array_search($employee->id, $icerArray, true))) {

                        $runner = $employee->empfname . ' ' . $employee->emplname[0];
                        $runnerArray[$runnerIndex] = $employee->id;
                        $runnerSet = true;
                    }
                }
                if($runnerSet) {
                    break;
                }
            }
            if($runner == '') {
                $runner = 'Temp';
                $numberOfTemps++;
            }
            $line = ['startLine' => $lineArray[$r]['startLine'], 'endLine' => $lineArray[$r]['endLine'], 'name' => $runner];
            array_push($this->runnerArray, $line);
            $r++;
        }



        $this->viewData['schedule_array'] = $this->schedule_array;
        $this->viewData['schedule_array_2'] = $this->schedule_array_2;
        $this->viewData['mezzanineArray'] = $this->mezzanineArray;
        $this->viewData['runnerArray'] = $this->runnerArray;
        $this->viewData['qc'] = $this->qc;
        $this->viewData['cleaner'] = $this->cleaner;
        $this->viewData['giftBox'] = $this->giftBox;
        $this->viewData['freezer'] = $this->freezer;
        $this->viewData['Temps'] = $numberOfTemps;

        $timeOfSchedule = $request['schedule_time'];
        $coolersShipped = $request['coolers_shipped'];
        $scheduleDate = $request['schedule_date'];
        //Save the Schedule Array as JSON in Database
        $schedule = new Schedule();
        $schedule->schedule = json_encode($this->viewData);
        $schedule->coolers_shipped = $coolersShipped;
        $schedule->date = $scheduleDate;
        $schedule->time = $timeOfSchedule;
        $schedule->save();

        $currentSchedule = Schedule::all()->last()->id;
        $this->viewData['id'] = $currentSchedule;
        $this->viewData['heading'] = 'DC WEST LINE UP - '. $scheduleDate . ' - ' . $timeOfSchedule;
        $this->viewData['coolersShipped'] = $coolersShipped;
        // $this->viewData['Temps'] = $numberOfTemps;

        return view ('schedule.generate', $this->viewData);
    }


    public function createLineSetup($cLines, $sLines, $mezzanineFlag) {
        $divisor = 1;
        if ($mezzanineFlag) {
            $divisor = 3;
        } else {
            $divisor = 6;
        }

        $workers = intval($cLines / $divisor);
        if(intval($cLines) % $divisor != 0) {
            $workers += 1;
        }

        $arr = $this->distributeLines($cLines, $workers);
        $lineArray = []; $startIndexer = 0; $i = 0; $setupIndex = 0;
        while($i < sizeof($arr)) {
            $endIndexer = ($startIndexer + $arr[$i] - 1);
            $lineArray [$setupIndex] = ['startLine' => $this->schedule_array[$startIndexer]['line_number'], 'endLine' => $this->schedule_array[$endIndexer]['line_number']];
            $startIndexer = $endIndexer + 1;
            $i++;
            $setupIndex++;
        }


        $workers = intval($sLines / $divisor);
        if(intval($sLines) % $divisor != 0) {
            $workers += 1;
        }

        $arr = $this->distributeLines($sLines, $workers);
        $startIndexer = 0; $i = 0;
        while($i < sizeof($arr)) {
            $endIndexer = ($startIndexer + $arr[$i] - 1);
            $lineArray [$setupIndex] = ['startLine' => $this->schedule_array_2[$startIndexer]['line_number'], 'endLine' => $this->schedule_array_2[$endIndexer]['line_number']];
            $startIndexer = $endIndexer + 1;
            $i++;
            $setupIndex++;
        }

        return $lineArray;
    }

    public function distributeLines($lines, $numOfWorkers) {

        $arr = [];
        for($i = 0; $i < $numOfWorkers; $i++) {
            $arr[$i] = intval($lines / $numOfWorkers);
        }

        $keys = array_keys($arr);
        $index = end($keys);

        for ($i = ($lines % $numOfWorkers); $i > 0; $i--) {
            $arr[$index] += 1;
            $index--;
        }
        return $arr;
    }


    public function downloadReport($id) {

        $scheduler = Schedule::where('id', $id)->first();
        $timeOfSchedule = $scheduler->time;
        $coolersShipped = $scheduler->coolers_shipped;
        $scheduleDate = $scheduler->date;
        $this->viewData = json_decode($scheduler->schedule, true);
        $labelerArray = $this->viewData['schedule_array'];
        $supportLineArray = $this->viewData['schedule_array_2'];
        $runnerArray = $this->viewData['runnerArray'];
        $mezzanineArray = $this->viewData['mezzanineArray'];
        $numberOfTemps = $this->viewData['Temps'];
        if(isset($this->viewData['qc'])) {
            $qcArray = $this->viewData['qc'];
        } else {
            $qcArray = $this->qc;
        }
        if(isset($this->viewData['giftBox'])) {
            $giftBoxArray = $this->viewData['giftBox'];
        } else {
            $giftBoxArray = $this->giftBox;
        }
        if(isset($this->viewData['freezer'])) {
            $freezerArray = $this->viewData['freezer'];
        } else {
            $freezerArray = $this->freezer;
        }
        if(isset($this->viewData['cleaner'])) {
            $cleanerArray = $this->viewData['cleaner'];
        } else {
            $cleanerArray = $this->cleaner;
        }

        Excel::create('DC WEST LINE UP@'.$scheduleDate.'@'.$timeOfSchedule, function($excel) use ($timeOfSchedule, $scheduleDate, $labelerArray, $supportLineArray, $mezzanineArray, $runnerArray, $coolersShipped, $cleanerArray, $qcArray, $giftBoxArray, $freezerArray, $numberOfTemps) {
            $excel->sheet('Lineup', function($sheet) use ($timeOfSchedule, $scheduleDate, $labelerArray, $supportLineArray, $mezzanineArray, $runnerArray, $coolersShipped, $cleanerArray, $qcArray, $giftBoxArray, $freezerArray, $numberOfTemps) {
                $sheet->cell('I1', function ($cell) {
                    $cell->setValue('Time');
                    $cell->setFontWeight($bold = true);
                });

                $sheet->getRowDimension(1)->setRowHeight(50);

                $sheet->setWidth(array(
                    'A'     =>  12, 'B'     =>  12, 'C'     =>  12, 'D'     =>  12,
                    'E'     =>  12, 'F'     =>  12, 'G'     =>  12, 'H'     =>  12,
                    'I'     =>  12, 'J'     =>  12, 'K'     =>  12, 'L'     =>  12,
                    'M'     =>  12, 'N'     =>  12, 'O'     =>  12, 'P'     =>  12,
                    'Q'     =>  12, 'R'     =>  12, 'S'     =>  12, 'T'     =>  12,
                    'U'     =>  12, 'V'     =>  12, 'W'     =>  12, 'X'     =>  12,

                ));


                $sheet->setFontFamily('Calibri');
                $sheet->setFontSize(10);

                $sheet->cell('J1', function ($cell) use ($timeOfSchedule) {
                    $cell->setValue($timeOfSchedule);
                    $cell->setFontWeight($bold = true);
                    $cell->setFontSize(14);
                });

                $sheet->mergeCells('K1:L1');
                $sheet->cell('K1', function($cell) {
                    $cell->setValue('Coolers Shipped');
                    $cell->setFontWeight($bold = true);
                    $cell->setAlignment('center');
                    $cell->setValignment('center');

                });
                $sheet->cell('M1', function($cell) use ($coolersShipped) {
                    $cell->setValue($coolersShipped);
                    $cell->setFontWeight($bold = true);
                    $cell->setFontSize(14);
                });

                $sheet->cell('N1', function ($cell) {
                    $cell->setValue('Date');
                    $cell->setFontWeight($bold = true);
                });

                $sheet->setSize('O1', 15, 50);
                $sheet->cell('O1', function ($cell) use ($scheduleDate) {
                    $cell->setValue($scheduleDate);
                    $cell->setFontWeight($bold = true);
                    $cell->setFontSize(14);
                });

                $sheet->cell('A37', function ($cell) {
                    $cell->setValue('Tim');
                    $cell->setFontWeight($bold = true);
                });

                $sheet->cell('A1', function ($cell) {
                    $cell->setValue('Coordinator');
                    $cell->setFontWeight($bold = true);
                });

                $sheet->cell('A2', function ($cell) {
                    $cell->setValue('Team Lead');
                    $cell->setFontWeight($bold = true);
                });

                $sheet->cell('B1', function ($cell) {
                    $cell->setValue('Hugo');
                    $cell->setFontWeight($bold = true);
                });

                $sheet->cell('C1', function ($cell) {
                    $cell->setValue('Isaiah');
                    $cell->setFontWeight($bold = true);
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
                    });
                    $column++;
                    $column++;
                }


                //Fill values for Labeler
                $column = 'W'; $row = 7;
                for ($index = 0; $index < sizeof($labelerArray); $index++) {
                    $linePos = $labelerArray[$index]['line_number'];
                    $offsetIndex = ($linePos - 1) * 2;
                    $column = chr(ord($column) -  $offsetIndex);
                    $cellNumber = $column . $row;
                    $sheet->cell($cellNumber, function ($cell) use ($labelerArray, $index) {
                        $cellValue = $labelerArray[$index]['labeler'];
                        $cell->setValue($cellValue);
                    });
                    $column = 'W';
                }

                //Fill values for Icer
                $column = 'W'; $row = 10;
                for ($index = 0; $index < sizeof($labelerArray); $index++) {
                    $linePos = $labelerArray[$index]['line_number'];
                    $offsetIndex = ($linePos - 1) * 2;
                    $column = chr(ord($column) -  $offsetIndex);
                    $cellNumber = $column . $row;
                    $sheet->cell($cellNumber, function ($cell) use ($labelerArray, $index) {
                        $cellValue = $labelerArray[$index]['icer'];
                        $cell->setValue($cellValue);
                    });
                    $column = 'W';
                }


                // Fill Support Lines
                $column = 'A'; $row = 14;
                $lineNumber = 24;
                for ($i = 0; $i < 24; $i++) {
                    //After first row of Support Lines are set, reset for 2nd row
                    //Setting Line Numbers for Support Line
                    if($lineNumber == 12) {
                        $column = 'A'; $row = 26; $lineNumber = 36;
                    }
                    $cellNumber = $column . $row;
                    $sheet->cell($cellNumber, function ($cell) use($lineNumber) {
                        $cellValue = 'LINE #' . $lineNumber;
                        $cell->setValue($cellValue);
                        $cell->setFontWeight($bold = true);

                    });
                    $column++;
                    $column++;
                    $lineNumber--;
                }


                $column = 'A'; $row = 15;
                $lineNumber = 24;
                for ($i = 0; $i < 24; $i++) {
                    //After first row of Support Lines are set, reset for 2nd row
                    //Setting Labeler Heading for Support Line
                    if($lineNumber == 12) {
                        $column = 'A'; $row = 27; $lineNumber = 36;
                    }
                    $cellNumber = $column . $row;
                    $sheet->cell($cellNumber, function ($cell) {
                        $cellValue = 'Labeler';
                        $cell->setValue($cellValue);
                    });
                    $column++;
                    $column++;
                    $lineNumber--;
                }

                $column = 'A'; $row = 18;
                $lineNumber = 24;
                for ($i = 0; $i < 24; $i++) {
                    //After first row of Support Lines are set, reset for 2nd row
                    //Setting Stocker Heading for Support Line
                    if($lineNumber == 12) {
                        $column = 'A'; $row = 30; $lineNumber = 36;
                    }
                    $cellNumber = $column . $row;
                    $sheet->cell($cellNumber, function ($cell) {
                        $cellValue = 'Stocker';
                        $cell->setValue($cellValue);

                    });
                    $column++;
                    $column++;
                    $lineNumber--;
                }


                $column = 'A'; $row = 21;
                $lineNumber = 24;
                for ($i = 0; $i < 24; $i++) {
                    //After first row of Support Lines are set, reset for 2nd row
                    //Setting Icer Heading for Support Line
                    if($lineNumber == 12) {
                        $column = 'A'; $row = 32; $lineNumber = 36;
                    }
                    $cellNumber = $column . $row;

                    $sheet->cell($cellNumber, function ($cell) {
                        $cellValue = 'Icer';
                        $cell->setValue($cellValue);
                    });
                    $column++;
                    $column++;
                    $lineNumber--;
                }

                //Fill values for Labeler
                $column = 'W'; $row = 16;
                for ($index = 0; $index < sizeof($supportLineArray); $index++) {

                    $linePos = $supportLineArray[$index]['line_number'];
                    if($index >= 12) {
                        $linePos -= 24;
                        $row = 28;
                    } else {
                        $linePos -= 12;
                    }

                    $offsetIndex = ($linePos - 1) * 2;
                    $column = chr(ord($column) -  $offsetIndex);

                    $cellNumber = $column . $row;
                    $sheet->cell($cellNumber, function ($cell) use ($supportLineArray, $index) {
                        $cellValue = $supportLineArray[$index]['labeler'];
                        $cell->setValue($cellValue);
                    });
                    $column = 'W';
                }


                //Fill values for Stocker
                $column = 'W'; $row = 19;
                for ($index = 0; $index < sizeof($supportLineArray); $index++) {

                    $linePos = $supportLineArray[$index]['line_number'];
                    if($index >= 12) {
                        $linePos -= 24;
                        $row = 31;
                    } else {
                        $linePos -= 12;
                    }

                    $offsetIndex = ($linePos - 1) * 2;
                    $column = chr(ord($column) -  $offsetIndex);

                    $cellNumber = $column . $row;
                    $sheet->cell($cellNumber, function ($cell) use ($supportLineArray, $index) {
                        $cellValue = $supportLineArray[$index]['stocker'];
                        $cell->setValue($cellValue);
                    });
                    $column = 'W';
                }


                //Fill values for Icer
                $column = 'W'; $row = 22;
                for ($index = 0; $index < sizeof($supportLineArray); $index++) {

                    $linePos = $supportLineArray[$index]['line_number'];
                    if($index >= 12) {
                        $linePos -= 24;
                        $row = 33;
                    } else {
                        $linePos -= 12;
                    }
                    $offsetIndex = ($linePos - 1) * 2;
                    $column = chr(ord($column) -  $offsetIndex);

                    $cellNumber = $column . $row;
                    $sheet->cell($cellNumber, function ($cell) use ($supportLineArray, $index) {
                        $cellValue = $supportLineArray[$index]['icer'];
                        $cell->setValue($cellValue);
                    });
                    $column = 'W';
                }


                $sheet->cell('A35', function ($cell) {
                    $cell->setValue('Mezzanine');
                    $cell->setFontWeight($bold = true);
                });

                $sheet->cell('A36', function ($cell) {
                    $cell->setValue('Lines');
                    $cell->setFontWeight($bold = true);
                });


                $sheet->cell('S35', function ($cell) {
                    $cell->setValue('Freezer');
                    $cell->setFontWeight($bold = true);
                });

                $column = 'S'; $row = 36;
                for ($index = 0; $index < sizeof($freezerArray); $index++) {
                    $cellNumber = $column . $row;
                    $sheet->cell($cellNumber, function ($cell) use ($freezerArray, $index) {
                        $cellValue = $freezerArray[$index];
                        $cell->setValue($cellValue);
                    });
                    $row++;
                }

                $sheet->cell('U35', function ($cell) {
                    $cell->setValue('Clean');
                    $cell->setFontWeight($bold = true);
                });

                $column = 'U'; $row = 36;
                for ($index = 0; $index < sizeof($cleanerArray); $index++) {
                    $cellNumber = $column . $row;
                    $sheet->cell($cellNumber, function ($cell) use ($cleanerArray, $index) {
                        $cellValue = $cleanerArray[$index];
                        $cell->setValue($cellValue);
                    });
                    $row++;
                }

                $sheet->cell('V35', function ($cell) {
                    $cell->setValue('Gift Box');
                    $cell->setFontWeight($bold = true);
                });

                $column = 'V'; $row = 36;
                for ($index = 0; $index < sizeof($giftBoxArray); $index++) {
                    $cellNumber = $column . $row;
                    $sheet->cell($cellNumber, function ($cell) use ($giftBoxArray, $index) {
                        $cellValue = $giftBoxArray[$index];
                        $cell->setValue($cellValue);
                    });
                    $row++;
                }


                $sheet->cell('W35', function ($cell) {
                    $cell->setValue('QC');
                    $cell->setFontWeight($bold = true);
                });

                $column = 'W'; $row = 36;
                for ($index = 0; $index < sizeof($qcArray); $index++) {
                    $cellNumber = $column . $row;
                    $sheet->cell($cellNumber, function ($cell) use ($qcArray, $index) {
                        $cellValue = $qcArray[$index];
                        $cell->setValue($cellValue);
                    });
                    $row++;
                }

                $column = 'B'; $row = 35;
                for ($index = 0; $index < sizeof($mezzanineArray); $index++) {
                    $cellNumber = $column . $row;
                    $sheet->cell($cellNumber, function ($cell) use ($mezzanineArray, $index) {
                        $cellValue = $mezzanineArray[$index]['name'];
                        $cell->setValue($cellValue);
                    });
                    $column++;
                }

                $column = 'B'; $row = 36;
                for ($index = 0; $index < sizeof($mezzanineArray); $index++) {
                    $cellNumber = $column . $row;
                    $sheet->cell($cellNumber, function ($cell) use ($mezzanineArray, $index) {
                        $cellValue = $mezzanineArray[$index]['startLine'] . '-' . $mezzanineArray[$index]['endLine'];
                        $cell->setValue($cellValue);
                    });
                    $column++;
                }

                $row = 3;
                for($index = 0; $index < sizeof($runnerArray); $index++) {
                    $startLine = $runnerArray[$index]['startLine'];
                    $endLine = $runnerArray[$index]['endLine'];
                    $column = 'W';

                    $offsetIndex = 1;


                    // Check which set of Lines are being processed (1-12 or 13-24 or 25-36)
                    if($startLine < 12) {
                        $offsetIndex = $startLine;
                    } elseif($startLine > 12 && $startLine < 24) {
                        $row = 12;
                        $offsetIndex = $startLine - 12;
                    } elseif($startLine > 24) {
                        $row = 24;
                        $offsetIndex = $startLine - 24;
                    }

                    $offset_1 = ($offsetIndex - 1) * 2;

                    $startPos = chr(ord($column) -  $offset_1);

                    $offset_3 = ($endLine - $startLine);
                    $runnerPos = chr(ord($startPos) - $offset_3);
                    $cellNumber = $runnerPos . $row;
                    $sheet->cell($cellNumber, function ($cell) {
                        $cellValue = 'RUNNER';
                        $cell->setValue($cellValue);
                        $cell->setFontWeight($bold = true);
                    });

                }

                //Fill Runners in Scheduler Dynamically based on the number of Assigned Runners
                $row = 4;
                for($index = 0; $index < sizeof($runnerArray); $index++) {
                    $startLine = $runnerArray[$index]['startLine'];
                    $endLine = $runnerArray[$index]['endLine'];
                    $column = 'W';


                    $offsetIndex = 1; // Variable to specify Line Number Index


                    // Check which set of Lines are being processed (1-12 or 13-24 or 25-36)
                    //Set the offset Index based on the Line Number
                    if($startLine < 12) {
                        $offsetIndex = $startLine;
                    } elseif($startLine > 12 && $startLine < 24) {
                        $row = 13;
                        $offsetIndex = $startLine - 12;
                    } elseif($startLine > 24) {
                        $row = 25;
                        $offsetIndex = $startLine - 24;
                    }

                    // Index to indicate the starting Line for current Runner
                    $offset_1 = ($offsetIndex - 1) * 2;
                    // Index Position to indicate Column Number for current Runner
                    $startPos = chr(ord($column) -  $offset_1);
                    //Index to indicate position of current Runner
                    $offset_3 = ($endLine - $startLine);
                    $runnerPos = chr(ord($startPos) - $offset_3);
                    $cellNumber = $runnerPos . $row;
                    $sheet->cell($cellNumber, function ($cell) use ($runnerArray, $index) {
                        $cellValue = $runnerArray[$index]['name'];
                        $cell->setValue($cellValue);
                    });

                    $borderOffset = ($endLine - $startLine);
                    $startBorder = chr(ord($runnerPos) +  $borderOffset);
                    $endBorder = chr(ord($runnerPos) -  $borderOffset);
                    $startBorder .= $row;
                    $endBorder .= $row;
                    $range = $endBorder . ":" . $startBorder;
                    $sheet->cells($range, function($cells) {
                        $cells->setBorder('none', 'none', 'thick', 'none');
                    });


                }

                $range = "A34:W34";
                $sheet->cells($range, function($cells) {
                    $cells->setBorder('none', 'none', 'thick', 'none');
                });

                $range = "W1:W59";
                $sheet->cells($range, function($cells) {
                    $cells->setBorder('none', 'thick', 'none', 'none');
                });

                $range = "A59:W59";
                $sheet->cells($range, function($cells) {
                    $cells->setBorder('none', 'none', 'thick', 'none');
                });

                $range = "A1:W59";
                $sheet->cells($range, function($cells) {
                    $cells->setAlignment('center');
                    $cells->setValignment('center');
                });

            });
        })->download('xls');

    }

    public function edit($id) {

        $scheduler = Schedule::find($id);
        $employees = Employee::all();
        $empLabelers = []; $empStockers = []; $empIcers = []; $empRunners = [];
        $empMezzanines = []; $empList = []; $empCleaners =[]; $empgiftBoxs = []; $empQCs = []; $empFreezers = [];

        foreach ($employees as $employee) {
            if($employee->labeler) {
                array_push($empLabelers, $employee->getEmpNameAttribute());
            }

            if ($employee->stocker) {
                array_push($empStockers, $employee->getEmpNameAttribute());
            }

            if ($employee->icer) {
                array_push($empIcers, $employee->getEmpNameAttribute());
            }

            if ($employee->runner) {
                array_push($empRunners, $employee->getEmpNameAttribute());
            }

            if ($employee->mezzanine) {
                array_push($empMezzanines, $employee->getEmpNameAttribute());
            }
            if ($employee->qc) {
                array_push($empQCs, $employee->getEmpNameAttribute());
            }
            if ($employee->gift_box) {
                array_push($empgiftBoxs, $employee->getEmpNameAttribute());
            }
            if ($employee->cleaner) {
                array_push($empCleaners, $employee->getEmpNameAttribute());
            }

            array_push($empList, $employee->getEmpNameAttribute());
        }
        $empFreezers = $empList;

        $conveyorLines = range(1,12);
        array_unshift($conveyorLines, "");
        unset($conveyorLines[0]);

        $supportLines = range(13,36);
        array_unshift($supportLines, "");
        unset($supportLines[0]);

        $totalLines = range(1,36);
        array_unshift($totalLines, "");
        unset($totalLines[0]);


        $this->viewData = json_decode($scheduler->schedule, true);
        $currentSchedule['schedule_array'] = $this->viewData['schedule_array'];
        $currentSchedule['schedule_array_2'] = $this->viewData['schedule_array_2'];
        $currentSchedule['runnerArray'] = $this->viewData['runnerArray'];
        $currentSchedule['mezzanineArray'] = $this->viewData['mezzanineArray'];
        $currentSchedule['qcArray'] = $this->viewData['qc'];
        $currentSchedule['giftBoxArray'] = $this->viewData['giftBox'];
        $currentSchedule['cleanerArray'] = $this->viewData['cleaner'];
        $currentSchedule['freezerArray'] = $this->viewData['freezer'];
        $currentSchedule['coolersShipped'] = $scheduler->coolers_shipped;
        $currentSchedule['Temps'] = $this->viewData['Temps'];


        $currentSchedule['empLabelers'] = $empLabelers;
        $currentSchedule['empStockers'] = $empStockers;
        $currentSchedule['empIcers'] = $empIcers;
        $currentSchedule['empRunners'] = $empRunners;
        $currentSchedule['empMezzanines'] = $empMezzanines;
        $currentSchedule['empQCs'] = $empQCs;
        $currentSchedule['empCleaners'] = $empCleaners;
        $currentSchedule['empgiftBoxs'] = $empgiftBoxs;
        $currentSchedule['empFreezers'] = $empFreezers;
        $currentSchedule['employees'] = $empList;

        $empNonLabelers = array_diff($empList, $empLabelers);
        $empNonStockers = array_diff($empList, $empStockers);
        $empNonIcers = array_diff($empList, $empIcers);
        $empNonRunners = array_diff($empList, $empRunners);
        $empNonMezzanines = array_diff($empList, $empMezzanines);
        $empNonCleaners = array_diff($empList, $empCleaners);
        $empNongiftBoxs = array_diff($empList, $empgiftBoxs);
        $empNonQCs = array_diff($empList, $empQCs);

        $currentSchedule['empNonLabelers'] = $empNonLabelers;
        $currentSchedule['empNonStockers'] = $empNonStockers;
        $currentSchedule['empNonIcers'] = $empNonIcers;
        $currentSchedule['empNonRunners'] = $empNonRunners;
        $currentSchedule['empNonMezzanines'] = $empNonMezzanines;
        $currentSchedule['empNonQCs'] = $empNonQCs;
        $currentSchedule['empNonCleaners'] = $empNonCleaners;
        $currentSchedule['empNongiftBoxs'] = $empNongiftBoxs;

        $currentSchedule['id'] = $id;
        $currentSchedule['conveyorLines'] = $conveyorLines;
        $currentSchedule['supportLines'] = $supportLines;
        $currentSchedule['totalLines'] = $totalLines;
        $currentSchedule['heading'] = 'Edit LINE UP - ' . $scheduler->date . ' - ' . $scheduler->time;

        return view ('schedule.edit', $currentSchedule);
    }

    public function update($id, Request $request) {

        //Get the current schedule from the database
        $scheduler = Schedule::find($id);
        $this->viewData = json_decode($scheduler->schedule, true);
        $schedule_array = $this->viewData['schedule_array'];
        $schedule_array_2 = $this->viewData['schedule_array_2'];
        $runnerArray = $this->viewData['runnerArray'];
        $mezzanineArray = $this->viewData['mezzanineArray'];
        $qcArray = $this->viewData['qc'];
        $giftBoxArray = $this->viewData['giftBox'];
        $freezerArray = $this->viewData['freezer'];
        $cleanerArray = $this->viewData['cleaner'];

        $labeler_ConveyorLine = $request['labeler_conveyor'];
        $labeler_SupportLine = $request['labeler_support'];
        $stocker_SupportLine = $request['stocker_support'];
        $mezzanine = $request['mezzanine'];
        $runner = $request['runner'];
        $icer_Conveyor = $request['icer_conveyor'];
        $icer_Support = $request['icer_support'];
        $conveyorLine = $request['conveyor_lines'];
        $supportLine = $request['support_lines'];
        $mezzanineStartLines = $request['mezzanine_Startlines'];
        $mezzanineEndLines = $request['mezzanine_Endlines'];
        $runnerStartLines = $request['runner_Startlines'];
        $runnerEndLines = $request['runner_Startlines'];
        $qc = $request['qc'];
        $cleaner = $request['cleaner'];
        $giftBox = $request['giftBox'];
        $freezer = $request['freezer'];


        for($i = 0; $i < sizeof($labeler_ConveyorLine); $i++) {
            if(!empty($labeler_ConveyorLine[$i])) {
                $schedule_array[$i]['labeler'] = $labeler_ConveyorLine[$i];
            }
        }

        $msg = '';
        $fieldToCompare = 'labeler';
        $duplicate = $this->checkArrayDuplicate($schedule_array, $fieldToCompare);
        if($duplicate) {
            $msg = "Conveyor Lines cannot have same Labeler in multiple lines\n";
        }

        for($i = 0; $i < sizeof($labeler_SupportLine); $i++) {
            if(!empty($labeler_SupportLine[$i])) {
                $schedule_array_2[$i]['labeler'] = $labeler_SupportLine[$i];
            }
        }

        $duplicate = $this->checkArrayDuplicate($schedule_array_2, $fieldToCompare);
        if($duplicate) {
            $msg .= "Support Lines cannot have same Labeler in multiple lines\n";
        }


        for($i = 0; $i < sizeof($stocker_SupportLine); $i++) {
            if(!empty($stocker_SupportLine[$i])) {
                $schedule_array_2[$i]['stocker'] = $stocker_SupportLine[$i];
            }
        }

        $fieldToCompare = 'stocker';
        $duplicate = $this->checkArrayDuplicate($schedule_array_2, $fieldToCompare);
        if($duplicate) {
            $msg .= "Support Lines cannot have same Stocker in multiple lines\n";
        }


        for($i = 0; $i < sizeof($mezzanine); $i++) {
            if(!empty($mezzanine[$i])) {
                $mezzanineArray[$i]['name'] = $mezzanine[$i];
            }
        }

        $fieldToCompare = 'name';
        $duplicate = $this->checkArrayDuplicate($mezzanineArray, $fieldToCompare);
        if($duplicate) {
            $msg .= "Mezzanine cannot be same for multiple set of lines\n";
        }

        for($i = 0; $i < sizeof($runner); $i++) {
            if(!empty($runner[$i])) {
                $runnerArray[$i]['name'] = $runner[$i];
            }
        }
        $duplicate = $this->checkArrayDuplicate($runnerArray, $fieldToCompare);
        if($duplicate) {
            $msg .= "Runner cannot be same for multiple set of lines\n";
        }

        for($i = 0; $i < sizeof($icer_Conveyor); $i++) {
            if(!empty($icer_Conveyor[$i])) {
                $schedule_array[$i]['icer'] = $icer_Conveyor[$i];
            }
        }

        $fieldToCompare = 'icer';
        $duplicate = $this->checkArrayDuplicate($schedule_array, $fieldToCompare);
        if($duplicate) {
            $msg .= "Conveyor Lines cannot have same Icer in multiple lines\n";
        }

        for($i = 0; $i < sizeof($icer_Support); $i++) {
            if(!empty($icer_Support[$i])) {
                $schedule_array_2[$i]['icer'] = $icer_Support[$i];
            }
        }

        $duplicate = $this->checkArrayDuplicate($schedule_array_2, $fieldToCompare);
        if($duplicate) {
            $msg .= "Support Lines cannot have same Icer in multiple lines\n";
        }



        $fieldToCompare = 'line_number';
        for($i = 0; $i < sizeof($conveyorLine); $i++) {
            if(!empty($conveyorLine[$i])) {
                $schedule_array[$i]['line_number'] = $conveyorLine[$i];
            }
        }

        $duplicate = $this->checkArrayDuplicate($schedule_array, $fieldToCompare);
        if($duplicate) {
            $msg .= "Conveyor Line # cannot be same in multiple lines\n";
        }


        for($i = 0; $i < sizeof($supportLine); $i++) {
            if(!empty($supportLine[$i])) {
                $schedule_array_2[$i]['line_number'] = $supportLine[$i];
            }
        }

        $duplicate = $this->checkArrayDuplicate($schedule_array_2, $fieldToCompare);
        if($duplicate) {
            $msg .= "Support Line # cannot be same in multiple lines\n";
        }

        for($i = 0; $i < sizeof($mezzanineStartLines) && $i < sizeof($mezzanineEndLines); $i++ ) {
            if(!empty($mezzanineStartLines[$i]) && !empty($mezzanineEndLines[$i])) {
                $mezzanineArray[$i]['startLine'] = $mezzanineStartLines[$i];
                $mezzanineArray[$i]['endLine'] = $mezzanineEndLines[$i];
            }
        }

        for($i = 0; $i < sizeof($runnerStartLines) && $i < sizeof($runnerEndLines); $i++ ) {
            if(!empty($runnerStartLines[$i]) && !empty($runnerEndLines[$i])) {
                $runnerArray[$i]['startLine'] = $runnerStartLines[$i];
                $runnerArray[$i]['endLine'] = $runnerEndLines[$i];
            }
        }



        $qcArray = $qc;
        $giftBoxArray = $giftBox;
        $freezerArray = $freezer;
        $cleanerArray = $cleaner;

        if(!empty($msg)) {
            Session::flash('message', $msg);
            return Redirect::back();
        }


        $this->schedule_array = $schedule_array;
        $this->schedule_array_2 = $schedule_array_2;
        $this->mezzanineArray = $runnerArray;
        $this->runnerArray = $mezzanineArray;
        $this->qc = $qcArray;
        $this->cleaner = $cleanerArray;
        $this->giftBox = $giftBoxArray;
        $this->freezer = $freezerArray;


        $this->viewData['schedule_array'] = $schedule_array;
        $this->viewData['schedule_array_2'] = $schedule_array_2;
        $this->viewData['runnerArray'] = $runnerArray;
        $this->viewData['mezzanineArray'] = $mezzanineArray;
        $this->viewData['qc'] = $qcArray;
        $this->viewData['giftBox'] = $giftBoxArray;
        $this->viewData['freezer'] = $freezerArray;
        $this->viewData['cleaner'] = $cleanerArray;
        $this->viewData['id'] = $id;
        $this->viewData['heading'] = 'DC WEST LINE UP - '. $scheduler->date . ' - ' . $scheduler->time;
        $this->viewData['coolersShipped'] = $scheduler->coolers_shipped;
        $scheduler->schedule = json_encode($this->viewData);
        $scheduler->update();


        return view ('schedule.generate', $this->viewData);

    }

    public function checkArrayDuplicate ($array, $field) {

        $duplicate = false;

        for($e = 0; $e < count($array); $e++)
        {
            for ($ee = $e+1; $ee < count($array); $ee++)
            {
                if($array[$ee][$field] == 'Temp' && $array[$e][$field] == 'Temp') {
                    // If the employee is a Temp, skip name validation
                    continue;
                }

                if (strcmp($array[$ee][$field],$array[$e][$field]) === 0)
                {
                    $duplicate = true;
                    break 2;
                }
            }
        }
        return $duplicate;
    }


    public function getScheduleDetails(Request $request) {

        $scheduleDate = $request['schedule_date'];
        $scheduleTime = $request['schedule_time'];

        $schedules = Schedule::where([
            ['date', '=',  $scheduleDate],
            ['time', '=', $scheduleTime],
        ])->get();

        $user = Auth::user();

        return view ('schedule.showschedule', compact('schedules', 'user'));

    }

    public function showSchedule ($id) {
        $currentSchedule = Schedule::findorfail($id);

        $this->viewData = json_decode($currentSchedule->schedule, true);
        $this->viewData['heading'] = 'DC WEST LINE UP - '. $currentSchedule->date . ' - ' . $currentSchedule->time;
        $this->viewData['id'] = $id;
        $this->viewData['coolersShipped'] = $currentSchedule->coolers_shipped;

        return view ('schedule.showCurrentSchedule', $this->viewData);

    }

    public function requestSchedule() {

        $user = Auth::user();
        $this->viewData['heading'] = 'Request Schedule';
        return view ('schedule.requestschedule', compact('user'), $this->viewData);

    }
}
