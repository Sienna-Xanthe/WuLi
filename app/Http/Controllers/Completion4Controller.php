<?php

namespace App\Http\Controllers;


use App\Http\Requests\Completion4Request;
use App\Http\Requests\PdfRequest;
use App\Models\Completion4;
use App\Models\Student;
use Mpdf;

class Completion4Controller extends Controller
{
    /***
     * 牛顿环 -Completion4
     */

    public function completion4(Completion4Request $request){

        $n1 =sprintf("%.3f",$request['n1']);
        $n5 =sprintf("%.3f",$request['n5']);
        $n10 =sprintf("%.3f",$request['n10']);
        $n15 =sprintf("%.3f",$request['n15']);
        $n20 =sprintf("%.3f",$request['n20']);
        $n25 =sprintf("%.3f",$request['n25']);
        $n30 =sprintf("%.3f",$request['30']);
        $n35 =sprintf("%.3f",$request['n35']);
        $n40 =sprintf("%.3f",$request['n40']);
        $r   =sprintf("%.3f",$request['n40']);
        $xz1 =$request['xz1'];
        $xz2 =$request['xz2'];
        $xz3 =$request['xz3'];
        $xz4 =$request['xz4'];
        $pd1 =$request['pd1'];
        $pd2 =$request['pd2'];
        $pd3 =$request['pd3'];

        $student_id =$request['student_id'];
        $l1=sprintf("%.3f",$request['l1']);
        $l2=sprintf("%.3f",$request['l2']);
        $l3=sprintf("%.3f",$request['l3']);
        $l4=sprintf("%.3f",$request['l4']);
        $l5=sprintf("%.3f",$request['l5']);
        $l6=sprintf("%.3f",$request['l6']);
        $l7=sprintf("%.3f",$request['l7']);


        $res1 = Completion4::establish(
            $n1,
            $n5,
            $n10,
            $n15,
            $n20,
            $n25,
            $n30,
            $n35,
            $n40,
            $r,
            $xz1,
            $xz2,
            $xz3,
            $xz4,
            $pd1,
            $pd2,
            $pd3,
            $student_id,
            $l1,
            $l2,
            $l3,
            $l4,
            $l5,
            $l6,
            $l7

        );

        $grade = 0;
        $grade_xp = 0;

        if ($n1 == 500.0) {
            $grade += 3;
        }
        if ( $n5 == 560.0) {
            $grade += 3;
        }
        if ($n10 == 1.5) {
            $grade += 3;
        }

        if ($n15 == 1) {
            $grade += 3;
        }

        if ($n20 == 29.5) {
            $grade += 3;
        }
        if ($n25 == 28.0) {
            $grade += 3;
        }
        if ($n30 == 10.0) {
            $grade += 3;
        }
        if ($n35 == 1) {
            $grade += 3;
        }
        if ($n40 == 5.0) {
            $grade += 3;
        }
        if ($l1 == 57.810) {
            $grade += 3;
        }
        if ($l2 == 58.182) {
            $grade += 3;
        }
        if ($l3 == 58.410) {
            $grade += 3;
        }
        if ($l4 == 59.009) {
            $grade += 3;
        }
        if ($l5 == 59.772) {
            $grade += 3;
        }
        if ($l6 == 60.200) {
            $grade += 3;
        }
        if ($l7 == 60.738) {
            $grade += 3;
        }
        if ($r == 10.0) {
            $grade += 10;
        }
        if ($xz1 == "C") {
            $grade_xp += 6;
        }

        if ($xz2 == "D") {
            $grade_xp += 6;
        }
        if ($xz3 == "C") {
            $grade_xp += 6;
        }
        if ($xz4 == "A") {
            $grade_xp+= 6;
        }
        if ($pd1 == 1) {
            $grade_xp += 6;
        }
        if ($pd2 == 1) {
            $grade_xp += 6;
        }
        if ($pd3 == 0) {
            $grade_xp+= 6;
        }


        $grade = $grade + $grade_xp;



        $res2 = Student::grade($student_id, $grade,$grade_xp);

        $res['res1'] = $res1;
        $res['res2'] = $res2;

        return $res ?
            json_success('操作成功!', null, 200) :
            json_fail('操作失败!', null, 100);
    }


    public function pdf4(PdfRequest $request)
    {

        $student_id = $request['student_id'];

        $student_a = Completion4::show($student_id);

        $student_b = json_decode($student_a);
        $n1 = $student_b[0]->n1;
        $n5 = $student_b[0]->n5;
        $n10 = $student_b[0]->n10;
        $n15 = $student_b[0]->n15;
        $n20 = $student_b[0]->n20;
        $n25 = $student_b[0]->n25;
        $n30 = $student_b[0]->n30;
        $n35 = $student_b[0]->n35;
        $n40 = $student_b[0]->n40;
        $r = $student_b[0]->r;
        $xz1 = $student_b[0]->xz1;
        $xz2 = $student_b[0]->xz2;
        $xz3 = $student_b[0]->xz3;
        $xz4 = $student_b[0]->xz4;
        $pd1 = $student_b[0]->pd1;
        $pd2 = $student_b[0]->pd2;
        $pd3 = $student_b[0]->pd3;
        $l1 = $student_b[0]->l1;
        $l2 = $student_b[0]->l2;
        $l3 = $student_b[0]->l3;
        $l4 = $student_b[0]->l4;
        $l5 = $student_b[0]->l5;
        $l6 = $student_b[0]->l6;
        $l7 = $student_b[0]->l7;

        $student_name = $student_b[0]->student_name;
        $student_level = $student_b[0]->student_level;
        $student_spec = $student_b[0]->student_spec;
        $student_year = $student_b[0]->student_year;
        $student_class = $student_b[0]->student_class;
        $student_num = $student_b[0]->student_num;
        $experiment_name = $student_b[0]->experiment_name;
        $course_name = $student_b[0]->course_name;
        $student_date = $student_b[0]->student_date;
        $student_teacher = $student_b[0]->student_teacher;
        $grade = $student_b[0]->grade;
        $grade_xp = $student_b[0]->grade_xp;



        $res = view('niudunhuan', [
            'name' => $student_name,
            'student_level' => $student_level,
            'student_spec' => $student_spec,
            'student_year' => $student_year,
            'experiment_name' => $experiment_name,
            'course_name' => $course_name,
            'student_date' => $student_date,
            'student_teacher' => $student_teacher,
            'student_num' => $student_num,
            'student_class' => $student_class,
            'grade' => $grade,
            'grade_xp' => $grade_xp,
            'grade_tk' => ($grade - $grade_xp),

            'n1' => $n1,
            'n5' => $n5,
            'n10' => $n10,
            'n15' => $n15,
            'n20' => $n20,
            'n25' => $n25,
            'n30' => $n30,
            'n35' => $n35,
            'n40' => $n40,
            'r' => $r,
            'xz1' => $xz1,
            'xz2' => $xz2,
            'xz3' => $xz3,
            'xz4' => $xz4,
            'pd1' => $pd1,
            'pd2' => $pd2,
            'pd3' => $pd3,
            'student_id' => $student_id,
            'l1' => $l1,
            'l2' => $l2,
            'l3' => $l3,
            'l4' => $l4,
            'l5' => $l5,
            'l6' => $l6,
            'l7' => $l7,

        ]);



        $mpdf = new Mpdf\Mpdf(['utf-8', 'A4', 16, '', 10, 10, 15, 15]);


        $mpdf->showImageErrors = true;

        $mpdf->WriteHTML($res);

        $mpdf->Output('实验报告.pdf', "I");

        exit;
    }

}
