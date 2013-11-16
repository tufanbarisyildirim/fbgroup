<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if( ! function_exists('time_ago_en'))
{
    function time_ago_en($time)
    {
     
        if(!is_numeric($time))
            $time = strtotime($time);

        $periods = array("second", "minute", "hour", "day", "week", "month", "year", "age");
        $lengths = array("60","60","24","7","4.35","12","100");

        $now = time();

        $difference = $now - $time;
        
        var_dump($difference);
        
        if ($difference <= 10 && $difference >= 0)
            return $tense = 'a moment ago';
        elseif($difference > 0)
            $tense = 'ago';
        elseif($difference < 0)
            $tense = 'later';

        for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
            $difference /= $lengths[$j];
        }

        $difference = round($difference);

        $period =  $periods[$j] . ($difference >1 ? 's' : '');
        return "{$difference} {$period} {$tense} ";
    }


} 