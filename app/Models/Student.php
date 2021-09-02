<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = "student";
    public $timestamps = true;
    protected $primaryKey = "id";
    protected $guarded = [];

    public static function establish($student_name,$student_level, $student_spec,$student_year, $student_num, $student_class, $experiment_name,$course_name,$student_date,$student_teacher)
    {

        try {
             Student::create(
                [
                    'student_name' => $student_name,
                    'student_level' => $student_level,
                    'student_spec' => $student_spec,
                    'student_year' => $student_year,
                    'student_class' => $student_class,
                    'student_num' => $student_num,
                    'experiment_name' => $experiment_name,
                    'course_name' => $course_name,
                    'student_date' => $student_date,
                    'student_teacher' => $student_teacher
                ]

            );
            $res = Student::where('student_num','=',$student_num)
            ->get('id');

            return $res ?
                $res :
                false;
        } catch (\Exception $e) {
            logError('搜索错误', [$e->getMessage()]);
            return false;
        }
    }

    public static function grade($student_id, $grade,$grade_xp)
    {


        try {

            $res = Student::where('student.id', '=', $student_id)

                ->update(['grade' => $grade,'grade_xp' => $grade_xp]);



            return $res ?
                $res :
                false;
        } catch (\Exception $e) {
            logError('搜索错误', [$e->getMessage()]);
            return false;
        }
    }


    public static function show($student_id)
    {
        try {

            $res = Student::
            join('completion', 'student.id', '=', 'completion.student_id')
            ->where('student.id', '=', $student_id)
                ->select(
                    'student.student_name',
                    'student.student_level',
                    'student.student_spec',
                    'student.student_year',
                    'student.student_class',
                    'student.student_num',
                    'student.experiment_name',
                    'student.course_name',
                    'student.student_date',
                    'student.student_teacher',

                    'student.grade',
                    'student.grade_xp',

                    'completion.completion_1',
                    'completion.completion_2',
                    'completion.completion_3',
                    'completion.completion_4',
                    'completion.completion_5',
                    'completion.completion_6',
                    'completion.completion_l1',
                    'completion.completion_l2',
                    'completion.completion_l3',
                    'completion.completion_m',
                    'completion.completion_d',
                    'completion.completion_xz1',
                    'completion.completion_xz2',
                    'completion.completion_pd1',
                    'completion.completion_pd2',
                    'completion.completion_pd3'


                )->get();

            return $res ?
                $res :
                false;
        } catch (\Exception $e) {
            logError('搜索错误', [$e->getMessage()]);
            return false;
        }

        
    }

    public static function show2($student_id){
        try {

            $res = Student::
            join('completion2', 'student.id', '=', 'completion2.student_id')
            ->where('student.id', '=', $student_id)
                ->select(
                    'student.student_name',
                    'student.student_level',
                    'student.student_spec',
                    'student.student_year',
                    'student.student_class',
                    'student.student_num',
                    'student.experiment_name',
                    'student.course_name',
                    'student.student_date',
                    'student.student_teacher',

                    'student.grade',
                    'student.grade_xp',


                    'completion2.ra1',
                    'completion2.ra2',
                    'completion2.ra3',
                    'completion2.rx1',
                    'completion2.rx2',
                    'completion2.rx3',
                    'completion2.rx',
                    'completion2.rb1',
                    'completion2.rb2',
                    'completion2.rb3',
                    'completion2.rchange1a',
                    'completion2.rchange2a',
                    'completion2.rchange3a',
                    'completion2.s1',
                    'completion2.s2',
                    'completion2.s3',
                    'completion2.s',
                    'completion2.rc1',
                    'completion2.rc2',
                    'completion2.rc3',
                    'completion2.rwait1',
                    'completion2.rwait2',
                    'completion2.rwait3',
                    'completion2.rxx',
                    'completion2.rd1',
                    'completion2.rd2',
                    'completion2.rd3',
                    'completion2.rchange1b',
                    'completion2.rchange2b',
                    'completion2.rchange3b',
                    'completion2.ss1',
                    'completion2.ss2',
                    'completion2.ss3',
                    'completion2.ss',
                    
                    
                )->get();



            return $res ?
                $res :
                false;
        } catch (\Exception $e) {
            logError('搜索错误', [$e->getMessage()]);
            return false;
        }

    }
}
