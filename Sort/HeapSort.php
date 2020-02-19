<?php
/**
 * Created by PhpStorm.
 * User: xxx
 * Date: 2020/2/19
 * Time: 18:20
 */


/**
 * 堆排序
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
 *
 * @param $arr
 * @return mixed
 */
function heapSort ($arr)
{
    // 需要结合heap本身的结构写，所以查看 DataStructure/Heap.php 下的 heapSort 方法；
    return $arr;
}