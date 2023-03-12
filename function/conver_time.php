<?php

function time_elapsed_string($ptime)
{
    $etime = time() - $ptime;

    if ($etime < 1) {
        return 'Vừa xong';
    }

    $a = array(
        365 * 24 * 60 * 60  =>  'năm',
        30 * 24 * 60 * 60  =>  'tháng',
        24 * 60 * 60  =>  'ngày',
        60 * 60  =>  'giờ',
        60  =>  'phút',
        1  =>  'giây'
    );
    $a_plural = array(
        'năm'  => 'năm',
        'tháng' => 'tháng',
        'ngày' => 'ngày',
        'giờ'  => 'giờ',
        'phút' => 'phút',
        'giây' => 'giây'
    );

    foreach ($a as $secs => $str) {
        $d = $etime / $secs;
        if ($d >= 1) {
            $r = round($d);
            return $r . ' ' . ($r > 1 ? $a_plural[$str] : $str) . ' trước';
        }
    }
}

?>