<?php
/**
 * Created by PhpStorm.
 * User: xxx
 * Date: 2020/1/16
 * Time: 21:29
 */

/**
 * @param $arr
 * @param $target
 * @return int
 */
function binSearch ($arr, $target)
{
    $num = count($arr);
    if (!$num) return -1;

    $low = 0;
    $heigh = $num - 1;
    while ($low <= $heigh) {
        $mid = (int)ceil(($low + $heigh) / 2);
        if ($arr[$mid] == $target) {
            return $mid;
        } elseif ($arr[$mid] > $target) {
            $heigh = $mid - 1;
        } else {
            $low = $mid + 1;
        }
    }
    return -1;
}

var_dump(binSearch([1,2,3,6,8,9], 9));