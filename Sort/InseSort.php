<?php
/**
 * Created by PhpStorm.
 * User: xxx
 * Date: 2020/1/19
 * Time: 16:47
 */

/**
 * 插入排序
 * 每次选择最小的数 -- 插入放在最左边的数组中 -- 不是交换
 * 从小到大排序
 * @param $arr
 * @return mixed
 */
function InseSort ($arr) {
    $num = count($arr);
    if ($num < 2) return $arr;

    // 6个数字需要5组排序；基本每个排序外层循环都是减一
    for ($i = 0; $i < $num - 1; $i++) {
        //获取当前准备需要插入已排序区域的元素值
        $temp = $arr[$i+1];

        // 0 <= x < $i 都是已经排好序的数字。
//        for ($j = 0; $j < $i + 1; $j++) { // 不顺序遍历，因为不好处理数组后移，改为倒序遍历好处理
        for ($j = $i; $j >= 0; $j--) {
            if ($arr[$j] > $temp) { // 由小到大，每次从末尾取一个数字跟前面已排序好的数字进行比较
                $arr[$j+1] = $arr[$j]; // 后移一位
                $arr[$j] = $temp;
            } else {
                // 如果当前要比较的数字，比已经排好序部分的最右边的（最大的数）数字还要大，则没有必要继续进行比较
                break;
            }
        }
    }
    return $arr;
}

$arr = [1, 9, 5, 6, 2, 8, 23];
var_dump(InseSort($arr));