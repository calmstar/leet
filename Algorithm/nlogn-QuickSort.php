<?php
/**
 * Created by PhpStorm.
 * User: xxx
 * Date: 2020/2/19
 * Time: 15:42
 */

/**
 * 快速排序
 * @param $arr
 * @return array
 */
function quickSort ($arr)
{
    $cou = count($arr);
    if ($cou < 2) return $arr;
    $left = $right = array();
    $mid = $arr[0];

    for ($i = 1; $i < $cou; $i++) {
        if ($arr[$i] > $mid) {
            $right[] = $arr[$i];
        } else {
            $left[] = $arr[$i];
        }
    }
    $midArr[] = $mid;
    return array_merge(quickSort($left), $midArr, quickSort($right));
}

$arr = [1, 9, 5, 6, 2, 8, 23];
var_dump(quickSort($arr));
