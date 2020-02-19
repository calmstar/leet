<?php
/**
 * Created by PhpStorm.
 * User: xxx
 * Date: 2020/2/19
 * Time: 21:15
 */

/**
 * 堆
 * 参考视频：https://www.bilibili.com/video/av47196993?from=search&seid=14755150340235478837
 *
 * 可以使用数组形式存储。
 * （由于堆必须是一棵完全二叉树，所以子节点都是从上往下、从左到右依次展示的，不会有元素跳过的情况存在，符合数组的存储特点）
 *
 * 树：某个节点有一个或多个子节点的数据结构
 * 二叉树：子节点最多有两个
 * 满二叉树：子节点只能有两个。与下面的完全二叉树，是同一个维度下概念。
 * 完全二叉树：叶子节点都在最底下两层，最后一层叶子节都靠左排列，并且除了最后一层，其他层的节点个数都要达到最大（2个）
 *
 * 堆：基础条件是一棵完全二叉树。
 * 大顶堆：每个节点的值都大于或等于其左右孩子节点的值
 * 小顶堆：每个节点的值都小于或等于其左右孩子节点的值
 * 知道某个节点位置i，计算得到子节点：左（2i+1），右（2i+2）,父（(i-1)/2）
 */

/**
 * 例子：这是一棵完全二叉树，下面进行堆化
 *           4           堆化后 ：      10
 *         /   \                    /   \
 *        10    3                  5    3
 *       /  \  /                 /  \  /
 *      5   1 2                 4   1 2
 */

function main ()
{
    // 根据上面的二叉树元素位置，依次存储到数组中，从上到下，从左到右
    $arr = [4, 10, 3, 5, 1, 9];
    $arr = buildHeap($arr);
    var_dump($arr);
}

/**
 *  倒序堆化的顺序： 3 -> 10 -> 4
 *    开始：  4       父节点3进行堆化 ：  4      父节点10进行堆化 ：  4    父节点4进行堆化① ： 10   父节点4进行堆化② ：  10
 *         /   \                    /   \                    /   \                  /   \                    /   \
 *        10    3                 10    9                  10    9                4    9                    5    9
 *       /  \  /                 /  \  /                 /  \  /                /  \  /                   /  \  /
 *      5   1 9                 5   1 3                 5   1 3                5   1 3                   4   1 3
 *
 * @param $arr
 * @return mixed
 */
function buildHeap ($arr)
{
    $cou = count($arr);
    $lastNode = $cou - 1; // 完全二叉树，用数组存储，最后一个叶子节点的索引就等于数组末尾索引
    $lastNodeParent = ($lastNode - 1) / 2;

    // 倒序将一棵棵完全二叉树堆化
    for ($i = $lastNodeParent; $i >= 0; $i--) {
        heapify($arr, $i);// 引用传值，直接修改数组 $arr 内的值
    }
    // 返回从内部修改过位置的数组，则此数组就可以表示堆
    return $arr;
}

/**
 * 堆化
 * 一次堆化,只能堆化一条路径下来，不能把一棵完全二叉树完全堆化下来。
 * 所以上面 buildHeap 函数就进行了多次堆化
 * @param $arr 需要进行堆化的数组
 * @param $index 需要从哪个位置开始进行向下堆化
 */
function heapify (&$arr, $index)
{
    // 递归出口
    $cou = count($arr);
    if ($index >= $cou) {
        return ;
    }

    $leftChild = 2 * $index + 1;
    $rightChild = 2 * $index + 2;
    $maxIndex = $index;

    // 假设索引i为当前这棵二叉树的父元素，依次跟左右两个子节点进行比较，得到该棵树最大的元素索引，然后替换值到父节点上
    if ($leftChild <= $cou &&$arr[$leftChild] > $arr[$maxIndex]) {
        $maxIndex = $leftChild;
    }
    if ($rightChild <= $cou && $arr[$rightChild] > $arr[$maxIndex]) {
        $maxIndex = $rightChild;
    }
    if ($maxIndex != $index) {
        swap($arr, $index, $maxIndex);
        heapify($arr, $maxIndex);
    }
}

/**
 * 交换元素的位置，引用传值
 * @param $arr
 * @param $i
 * @param $j
 */
function swap (&$arr, $i, $j) {
    $temp = $arr[$i];
    $arr[$i] = $arr[$j];
    $arr[$j] = $temp;
}

main();