<?php


namespace App\Http\Controllers;


use App\Models\Completion11;
use Illuminate\Http\Request;

use Mpdf;

class Completion11Controller extends Controller
{
    public function pdf(Request $request)
    {

        $student_id = $request['student_id'];

        $student_a = Completion11::show($student_id);

        $student_b = json_decode($student_a);
        $one_ig		 = $student_b[0]->one_ig;
        $one_rg		 = $student_b[0]->one_rg;
        $one_e		 = $student_b[0]->one_e;
        $two_one_r1gs = $student_b[0]->two_one_r1gs;
        $two_one_r1	 = $student_b[0]->two_one_r1;
        $two_two_rn	 = $student_b[0]->two_two_rn;
        $two_two_im	 = $student_b[0]->two_two_im;
        $two_two_r2gs = $student_b[0]->two_two_r2gs;
        $two_two_vm	 = $student_b[0]->two_two_vm;
        $two_two_im2 = $student_b[0]->two_two_im2;
        $two_two_rn2 = $student_b[0]->two_two_rn2;
        $two_two_r2	 = $student_b[0]->two_two_r2;
        $two_thr_r4	 = $student_b[0]->two_thr_r4;
        $two_thr_e	 = $student_b[0]->two_thr_e	;
        $two_thr_im2 = $student_b[0]->two_thr_im2;
        $two_thr_rn	 = $student_b[0]->two_thr_rn;
        $two_thr_r42 = $student_b[0]->two_thr_r42;
        $two_four_e	 = $student_b[0]->two_four_e;
        $two_four_r4 = $student_b[0]->two_four_r4;
        $two_four_rn4 = $student_b[0]->two_four_rn4;
        $two_four_r3 = $student_b[0]->two_four_r3;
        $thr_one_r1	 = $student_b[0]->thr_one_r1;
        $thr_one_ix	 = $student_b[0]->thr_one_ix;
        $thr_one_ds	 = $student_b[0]->thr_one_ds;
        $thr_two_r2	 = $student_b[0]->thr_two_r2;
        $thr_two_vx	 = $student_b[0]->thr_two_vx;
        $thr_two_ds	 = $student_b[0]->thr_two_ds;
        $thr_thr_r4	 = $student_b[0]->thr_thr_r4;
        $thr_thr_r3	 = $student_b[0]->thr_thr_r3;
        $thr_thr_rx	 = $student_b[0]->thr_thr_rx;
        $thr_thr_ds	 = $student_b[0]->thr_thr_ds;
        $four_one_r1 = $student_b[0]->four_one_r1;
        $four_one_r2 = $student_b[0]->four_one_r2;
        $four_one_r3 = $student_b[0]->four_one_r3;
        $four_one_r4 = $student_b[0]->four_one_r4;
        $four_one_ix = $student_b[0]->four_one_ix;
        $four_two_1	 = $student_b[0]->four_two_1;
        $four_two_2	 = $student_b[0]->four_two_2;
        $four_two_3	 = $student_b[0]->four_two_3;
        $four_two_4	 = $student_b[0]->four_two_4;
        $four_two_5	 = $student_b[0]->four_two_5;





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




        $res = view('wanyongbiao', [
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



            'one_ig' => $one_ig,
            'one_rg' => $one_rg,
            'one_e' => sprintf("%.1f",$one_e),
            'two_one_r1gs' => $two_one_r1gs,
            'two_one_r1' => sprintf("%.1f",$two_one_r1),
            'two_two_rn' => $two_two_rn,
            'two_two_im' => $two_two_im,
            'two_two_r2gs' => $two_two_r2gs,
            'two_two_vm' =>  $two_two_vm,
            'two_two_im2' => $two_two_im2,
            'two_two_rn2' => $two_two_rn2,
            'two_two_r2' =>  $two_two_r2,
            'two_thr_r4' => $two_thr_r4,
            'two_thr_e' => sprintf("%.1f",$two_thr_e),
            'two_thr_im2' => $two_thr_im2,
            'two_thr_rn' => $two_thr_rn,
            'two_thr_r42' => $two_thr_r42,
            'two_four_e' => sprintf("%.1f",$two_four_e),
            'two_four_r4' => $two_four_r4,
            'two_four_rn4'=> $two_four_rn4,
            'two_four_r3' => $two_four_r3,
            'thr_one_r1'  => sprintf("%.1f",$thr_one_r1),
            'thr_one_ix' =>  $thr_one_ix,
            'thr_one_ds'  => $thr_one_ds,
            'thr_two_r2' =>  $thr_two_r2,
            'thr_two_vx' => sprintf("%.1f",$thr_two_vx),
            'thr_two_ds' => $thr_two_ds,
            'thr_thr_r4' => sprintf("%.1f",$thr_thr_r4),
            'thr_thr_r3' => $thr_thr_r3,
            'thr_thr_rx' => $thr_thr_rx,
            'thr_thr_ds' => $thr_thr_ds,
            'four_one_r1' => sprintf("%.1f",$four_one_r1),
            'four_one_r2' => $four_one_r2,
            'four_one_r3' => $four_one_r3,
            'four_one_r4' => sprintf("%.1f",$four_one_r4),
            'four_one_ix' => sprintf("%.1f",$four_one_ix),
            'four_two_1' => $four_two_1,
            'four_two_2' => $four_two_2,
            'four_two_3' => $four_two_3,
            'four_two_4' => $four_two_4,
            'four_two_5' => $four_two_5,

        ]);



        $mpdf = new Mpdf\Mpdf(['utf-8', 'A4', 16, '', 10, 10, 15, 15]);


        $mpdf->showImageErrors = true;

        $mpdf->WriteHTML($res);

        $mpdf->Output('实验报告.pdf', "I");

        exit;
    }
}
