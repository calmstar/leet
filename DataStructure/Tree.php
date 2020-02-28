<?php
/**
 * Created by PhpStorm.
 * User: xxx
 * Date: 2020/2/22
 * Time: 15:31
 */

/**
 *
 * 视频资料：https://www.bilibili.com/video/av10472337
 *
 * 树：以二叉树为例讲解
 *
 * 遍历：前序、中序、后序遍历（分别代表根节点的遍历顺序）
 *
 * 例子：
 *            4
 *         /   \
 *        10    3
 *       /  \  /
 *      5   1 2
 *
 * 注意，不要单纯看文字表述的顺序，要看递归的方式写法来看.
 * (每一次递归到的节点，都当作根节点，依此展开左右两棵树，然后按顺序遍历)
 * 前序（根节点->左节点->右节点）：4，10，5，1，3，2
 * 中序（左节点->根节点->右节点）：5, 10, 1, 4, 2, 3
 * 后序（左节点->右节点->根节点）：5, 1, 10, 2, 3, 4
 */
function main () {
    // 上图二叉树的代码结构
    $node1 = new Node();
    $node2 = new Node();
    $node3 = new Node();
    $node4 = new Node();
    $node5 = new Node();
    $node6 = new Node();

    $node1->data = 4;
    $node2->data = 10;
    $node3->data = 3;
    $node4->data = 5;
    $node5->data = 1;
    $node6->data = 2;

    $node1->left = $node2;
    $node1->right = $node3;
    $node2->left = $node4;
    $node2->right = $node5;
    $node3->left = $node6;
    $node3->right = null;
    $node4->left = null;
    $node4->right = null;
    $node5->left = null;
    $node5->right = null;
    $node6->left = null;
    $node6->right = null;

    echo "\n前序遍历：\n";
    preOrder($node1);
    echo "\n中序遍历：\n";
    inOrder($node1);
    echo "\n后序遍历：\n";
    postOrder($node1);

}

class Node {
    public $data = null;
    public $left = null;
    public $right = null;
}


/**
 * (每一次递归到的节点，都当作根节点，依此展开左右两棵树，然后按 根左右 顺序遍历)
 * 前序遍历: 根节点->左节点->右节点
 * @param Node $node
 */
function preOrder (Node $node) {
    if (!empty($node)) {
        echo $node->data . ", ";
        $node->left && preOrder($node->left);
        $node->right && preOrder($node->right);
    }
}

/**
 * (每一次递归到的节点，都当作根节点，依此展开左右两棵树，然后按 左根右 顺序遍历)
 * 中序遍历：左节点->根节点->右节点
 * @param Node $node
 */
function inOrder (Node $node) {
    if (!empty($node)) {
        $node->left && inOrder($node->left);
        echo $node->data . ", ";
        $node->right && inOrder($node->right);
    }
}

/**
 * (每一次递归到的节点，都当作根节点，依此展开左右两棵树，然后按 左右根 顺序遍历)
 * 后序遍历：左节点->右节点->根节点
 * @param Node $node
 */
function postOrder (Node $node) {
    if (!empty($node)) {
        $node->left && postOrder($node->left);
        $node->right && postOrder($node->right);
        echo $node->data . ", ";
    }
}

main();