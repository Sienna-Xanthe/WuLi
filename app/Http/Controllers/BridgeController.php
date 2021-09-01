<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;
use App\Models\Completion2;
use App\Models\Student;

class BridgeController extends Controller
{
    public function student(StudentRequest $request){
        $student_name = $request['student_name'];
        $student_level = $request['student_level'];
        $student_spec = $request['student_spec'];
        $student_year = $request['student_year'];
        $student_class = $request['student_class'];
        $student_num = $request['student_num'];
        $experiment_name = $request['experiment_name'];
        $course_name = $request['course_name'];
        $student_date = $request['student_date'];
        $student_teacher = $request['student_teacher'];

        $res = Student::establish($student_name,$student_level, $student_spec,$student_year, $student_num, $student_class, $experiment_name,$course_name,$student_date,$student_teacher);

        return $res ?
            json_success('操作成功!', $res, 200) :
            json_fail('操作失败!', null, 100);
    }

    public function completion(Request $request){
        
        $ra1 = $request['ra1'];
        $ra2 = $request['ra2'];
        $ra3 = $request['ra3'];
        $rx = $request['rx'];
        $rx1 = $request['rx1'];
        $rx2 = $request['rx2'];
        $rx3 = $request['rx3'];
        $rb1 = $request['rb1'];
        $rb2 = $request['rb2'];
        $rb3 = $request['rb3'];
        $rchange1a = $request['rchange1a'];
        $rchange2a = $request['rchange2a'];
        $rchange3a = $request['rchange3a'];
        $s1 = $request['s1'];
        $s2 = $request['s2'];
        $s3 = $request['s3'];
        $s = $request['s'];
        $rc1 = $request['rc1'];
        $rc2 = $request['rc2'];
        $rc3 = $request['rc3'];
        $rwait1 = $request['rwait1'];
        $rwait2 = $request['rwait2'];
        $rwait3 = $request['rwait3'];
        $rxx = $request['rxx'];
        $rd1 = $request['rd1'];
        $rd2 = $request['rd2'];
        $rd3 = $request['rd3'];
        $rchange1b = $request['rchange1a'];
        $rchange2b = $request['rchange2a'];
        $rchange3b = $request['rchange3a'];
        $ss1 = $request['ss1'];
        $ss2 = $request['ss2'];
        $ss3 = $request['ss3'];
        $ss = $request['ss'];
        $student_id = $request['student_id'];
        $grade_xp = $request['grade_xp'];//选择判断题分
        
 


        $res = Completion2::establish(
            $ra1,
            $ra2,
            $ra3,
            $rx,
            $rx1,
            $rx2,
            $rx3,
            $rb1,
            $rb2,
            $rb3,
            $rchange1a,
            $rchange2a,
            $rchange3a,
            $s1,
            $s2,
            $s3,
            $s,
            $rc1,
            $rc2,
            $rc3,
            $rwait1,
            $rwait2,
            $rwait3,
            $rxx,
            $rd1,
            $rd2,
            $rd3,
            $rchange1b,
            $rchange2b,
            $rchange3b,
            $ss1,
            $ss2,
            $ss3,
            $ss,
            $student_id
        );

        $grade = 0;

        if(0 < $ra1 && $ra1 < 9999){
            $grade += 2;

        }
        if(0 < $ra2 && $ra2 < 9999){
            $grade += 2;

        }
        if(0 < $ra3 && $ra3 < 9999){
            $grade += 2;

        }
        if(0 < $rx1 && $rx1 < 999 && $rx1 == $ra1*0.1){
            $grade += 2;
        }
        if(0 < $rx2 && $rx2 < 999 && $rx2 == $ra2*0.1){
            $grade += 2;
        }
        if(0 < $rx3 && $rx3 < 999 && $rx3 == $ra3*0.1){
            $grade += 2;
        }
        if($rx == ($rx1+$rx2+$rx3)/3){
            $grade += 2;
        }

        if($rb1 == $ra1){
            $grade += 2;
        }
        if($rb2 == $ra2){
            $grade += 2;
        }
        if($rb3 == $ra3){
            $grade += 2;
        }

        if($rchange1a < 900 && $rchange1a <$rchange2a && $rchange2a < $rchange3a){
            $grade += 2;
        }

        if($rchange2a < 1700 && $rchange1a <$rchange2a && $rchange2a < $rchange3a){
            $grade += 2;
        }
        if($rchange3a < 2300 && $rchange1a <$rchange2a && $rchange2a < $rchange3a){
            $grade += 2;
        }

        if($s1 == sprintf("%.2f",($rb1/$rchange1a)) && $s1 < 99 && $s1 > 0){
            $grade += 2;
        }

        if($s2 == sprintf("%.2f",(2 * $rb2/$rchange2a)) && $s2 < 99 && $s2 > 0){
            $grade += 2;
        }
        if($s3 == sprintf("%.2f",(3 * $rb3/$rchange3a)) && $s3 < 99 && $s3 > 0){
            $grade += 2;
        }
        if($s === ($s1+$s2+$s3)/3){
            $grade += 2;
        }
        



        return $res ? 
           json_success('操作成功',null, 200) :
           json_fail('操作失败',null,100);
    }
}
