<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Completion1 extends Model
{
    protected $table = "completion1";
    public $timestamps = true;
    protected $primaryKey = "id";
    protected $guarded = [];

    public static function show($student_id)
    {
        try {

            $res = Completion1::
            join('student', 'student.id', '=', 'completion1.student_id')
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


                    'r1',
                    'r2',
                    'r3',
                    'r4',
                    'r5',
                    'r6',
                    'r7',
                    'r8',
                    'r9',
                    'r10'
                )->get();

            return $res ?
                $res :
                false;
        } catch (\Exception $e) {
            logError('搜索错误', [$e->getMessage()]);
            return false;
        }

        echo 1;
    }
}
