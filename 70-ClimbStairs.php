<?php
/**
 * Created by PhpStorm.
 * User: xxx
 * Date: 2020/2/23
 * Time: 10:46
 */

/**
 * 假设你正在爬楼梯。需要 n 阶你才能到达楼顶。

每次你可以爬 1 或 2 个台阶。你有多少种不同的方法可以爬到楼顶呢？

注意：给定 n 是一个正整数。

示例 1：

输入： 2
输出： 2
解释： 有两种方法可以爬到楼顶。
1.  1 阶 + 1 阶
2.  2 阶
示例 2：

输入： 3
输出： 3
解释： 有三种方法可以爬到楼顶。
1.  1 阶 + 1 阶 + 1 阶
2.  1 阶 + 2 阶
3.  2 阶 + 1 阶

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/climbing-stairs
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 * Class Solution
 */
class Solution {

    /**
     * 递归解法，当 n=46 时，结果会溢出。
     * @param Integer $n
     * @return Integer
     */
    function climbStairs($n)
    {
        if ($n == 1) return 1;
        if ($n == 2) return 2;
        return $this->climbStairs($n-1) + $this->climbStairs($n-2);
    }
    /**
     * 注：像这种递归，用人脑想象，很难模拟出来计算的情形，所以尽量画图，可采用 n 个递归就用 n 叉树的方法
     * 如：这里一个方法体内，用了两个递归方法，所以使用 2叉树 模拟递归的情形
     * 假设 n 为 4
     *                              4
     *                            /   \
     *                          3      2 (命中递归出口，结果为 2)
     *                        /  \
     *                     2（2）  1（1）
     * 所以这里
     * 节点为 3 的递归结果 为 3
     * 节点为 2 的递归结果 为 2
     * 节点为 4 的递归结果 为 5
     */

    /**
     * 循环解法
     * @param $n
     * @return int
     */
    function climbStairsFor ($n)
    {
        if ($n == 1) return 1; // 只有1阶楼梯时，只有1种走法
        if ($n == 2) return 2; // 只有2阶楼梯时，只有2种走法
        // 设置初始值
        $f1 = 1;
        $f2 = 2;
        $current = 0;
        for ($i = 3; $i <= $n; $i++) { // 注意这里要使用小于等于号
            $current = $f1 + $f2; //当前阶梯数的走法，为前面两个阶梯数的走法之和
            $f1 = $f2; // 更新第 n-2 个阶梯，给下一个循环的第 n 个阶梯使用
            $f2 = $current; // 更新第 n-1 个阶梯，给下一个循环的第 n 个阶梯使用
        }
        return $current;
    }

    function climbStairsDynamic ($n)
    {

    }
}
$s = new Solution();
echo "递归：" . $s->climbStairs(4) . "\n";
echo "循环：" . $s->climbStairsFor(4) . "\n";
echo "动态规划：" . $s->climbStairsDynamic(4) . "\n";