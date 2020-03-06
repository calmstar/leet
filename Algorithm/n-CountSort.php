<?php
/**
 * Created by PhpStorm.
 * User: xxx
 * Date: 2020/3/5
 * Time: 18:44
 */


// 对数组进行排序
//$arr = [1,3,3,2];
$arr = [30, 22, 37, 22];
/**
 * 计数排序：适用于数据量大，但取值范围小的数组
 *
 * 计数排序的两个问题：
 *              1 开始索引距离0很远 -- 在PHP中不存在这种情况，因为PHP的数组可以不从0开始，本质是哈希表。（其他语言，可以用偏移量解决）
 *              2 不是稳定的排序（原地排序）
 *
 * @param $arr
 * @param $min
 * @param $max
 * @return mixed
 */
function countSort ($arr, $min, $max)
{
    $countArr = [];
    foreach ($arr as $k => $v) {
        if (!isset($countArr[$v])) {
            $countArr[$v] = 1; // 将要排序数组的值，当作key，存入计数数组中，并记录出现的次数
        } else {
            $countArr[$v]++;
        }
    }

    $z = 0;
    for ($i = $min; $i <= $max; $i++) {
        if (!isset($countArr[$i])) continue; // 由于上面只初始化了 $min-$max 的部分数据，所以要加个判断
        while ($countArr[$i]-- > 0) {
            $arr[$z++] = $i; // 继续使用 $arr , 减少内存空间开销
        }
    }
    return $arr;
}
var_dump(countSort($arr,22, 37));



echo "\n========== 以上为练习，下面范例 ===== \n\n" ;


/**
 * 计数排序：适用于数据量大，但取值范围小的数组
 * @param $my_array
 * @param $min
 * @param $max
 * @return mixed
 */
function counting_sort($my_array, $min, $max)
{
    $count = array();
    for ($i = $min; $i <= $max; $i++) {
        $count[$i] = 0;
    }
    foreach ($my_array as $number) {
        $count[$number]++; // 把要排序的数组$my_array的值，取出来作为新数组$count的key
    }
    $z = 0;
    for ($i = $min; $i <= $max; $i++) {
        while ($count[$i]-- > 0) {
            $my_array[$z++] = $i; // 将 key 对应的值和次数依次取出，就得到排序好的数组
        }
    }
    return $my_array;
}

$test_array = array(3, 0, 2, 5, -1, 4, 1);
echo "原始数组 :\n";
echo implode(', ', $test_array);
echo "\n排序后数组:\n";
echo implode(', ', counting_sort($test_array, -1, 5)) . PHP_EOL;


