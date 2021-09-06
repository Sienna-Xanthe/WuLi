<?php

namespace App\Http\Controllers;

use App\Models\Completion1;
use App\Models\Student;
use Illuminate\Http\Request;

class Completion1Controller extends Controller
{
    public function completion1(Request $request){

        $student_id = $request['student_id'];
        $r1 = $request['r1'];
        $r2 = $request['r2'];
        $r3 = $request['r3'];
        $r4 = $request['r4'];
        $r5 = $request['r5'];
        $r6 = $request['r6'];
        $r7 = $request['r7'];
        $r8 = $request['r8'];
        $r9 = $request['r9'];
        $r10 = $request['r10'];

        $res1 = Completion1::establish(
            $student_id,
            $r1,
            $r2,
            $r3,
            $r4,
            $r5,
            $r6,
            $r7,
            $r8,
            $r9,
            $r10
        );
        $grade = 0;
        $grade_xp = 0;

        if($r1 == 'A')
        {
            $grade_xp += 10;
        }
        if($r2 == 'C')
        {
            $grade_xp += 10;
        }
        if($r3 == 'A')
        {
            $grade_xp += 10;
        }
        if($r4 == 'B')
        {
            $grade_xp += 10;
        }
        if($r5 == 'A')
        {
            $grade_xp += 10;
        }
        if($r6 == 'B')
        {
            $grade_xp += 10;
        }
        if($r7 == 'A')
        {
            $grade_xp += 10;
        }
        if($r8 == 'C')
        {
            $grade_xp += 10;
        }
        if($r9 == 'A')
        {
            $grade_xp += 10;
        }
        if($r10 == 'C')
        {
            $grade_xp += 10;
        }

        $grade = $grade + $grade_xp;

        $res2 = Student::grade($student_id, $grade, $grade_xp);

        $res['res1'] = $res1;
        $res['res2'] = $res2;

        return $res ?
            json_success('操作成功!', null, 200) :
            json_fail('操作失败!', null, 100);
    }
}
