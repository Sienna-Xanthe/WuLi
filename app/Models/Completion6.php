<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Completion6 extends Model
{
    protected $table = "completion6";
    public $timestamps = true;
    protected $primaryKey = "id";
    protected $guarded = [];


    public static function establish(
        $ig1,
        $rg1,
        $e,
        $ra,
        $e1,
        $i,
        $ig2,
        $r1,
        $e2,
        $rb,
        $rg2,
        $r2,
        $r3,
        $r4,
        $rx,
        $p1,
        $p2,
        $student_id
    ) {
        try {
            $res = Completion6::create(
                [
                    'ig1' => $ig1,
                    'rg1' => $rg1,
                    'e' => $e,
                    'ra' => $ra,
                    'e1' => $e1,
                    'i' => $i,
                    'ig2' => $ig2,
                    'r1' => $r1,
                    'e2' => $e2,
                    'rb' => $rb,
                    'rg2' => $rg2,
                    'r2' => $r2,
                    'r3' => $r3,
                    'r4' => $r4,
                    'rx' => $rx,
                    'p1' => $p1,
                    'p2' => $p2,
                    'student_id' => $student_id
                ]

            );

            return $res ?
                $res :
                false;
        } catch (\Exception $e) {
            logError('搜索错误', [$e->getMessage()]);
            return false;
        }
    }



    public static function show6($student_id)
    {
        try {
            $res = Completion6::
            join('student', 'student.id', '=', 'completion6.student_id')
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


                    'ig1',
                    'rg1',
                    'e',
                    'ra',
                    'e1',
                    'i',
                    'ig2',
                    'r1',
                    'e2',
                    'rb',
                    'rg2',
                    'r2',
                    'r3',
                    'r4',
                    'rx',
                    'p1',
                    'p2'
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
