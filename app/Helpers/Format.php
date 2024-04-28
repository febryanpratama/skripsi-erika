<?php

namespace App\Helpers;

use App\Models\QuizScore;

class Format{
    static function getScore($carbon_date){

        $data = QuizScore::whereDate('created_at', $carbon_date)->get();

        $list = [];

        if($data->isEmpty()){
            $list[] = 0;
        }else{

            foreach($data as $val){
                // dd($val);
                $list[] = $val->score ?? 0;
            }
        }

        // dd($list);

        $total = array_sum($list)/count($list);

        return floor($total);

    }
}