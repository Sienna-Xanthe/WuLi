<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Completion1 extends Model
{
    protected $table = "completion1";
    public $timestamps = true;
    protected $primaryKey = "id";
    protected $guarded = [];

    public static function establish(
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
    ){
        try {
            $res = Completion1::create(
                [
                    'r1' => $r1,
                    'r2' => $r2,
                    'r3' => $r3,
                    'r4' => $r4,
                    'r5' => $r5,
                    'r6' => $r6,
                    'r7' => $r7,
                    'r8' => $r8,
                    'r9' => $r9,
                    'r10' => $r10,

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
}
