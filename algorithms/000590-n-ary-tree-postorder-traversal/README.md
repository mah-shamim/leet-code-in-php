590\. N-ary Tree Postorder Traversa


**Difficulty:** Easy

**Topics:** `Stack`, `Tree`, `Depth-First Search`

Given the `root` of an n-ary tree, return _the postorder traversal of its nodes' values_.

Nary-Tree input serialization is represented in their level order traversal. Each group of children is separated by the null value (See examples)

**Example 1:**

![narytreeexample](https://assets.leetcode.com/uploads/2018/10/12/narytreeexample.png)

- **Input:** root = [1,null,3,2,4,null,5,6]
- **Output:** [5,6,3,2,4,1]

**Example 2:**

![sample_4_964](https://assets.leetcode.com/uploads/2019/11/08/sample_4_964.png)

- **Input:** root = [1,null,2,3,4,5,null,null,6,7,null,8,null,9,10,null,null,11,null,12,null,13,null,null,14]
- **Output:** [2,6,14,11,7,3,12,8,4,13,9,10,5,1]


**Constraints:**

- The number of the nodes in the tree is in the range <code>[0, 100<sup>4</sup>]</code>.
- <code>-100 <= Node.val <= 100<sup>4</sup></code>
- The height of the n-ary tree is less than or equal to `1000`.

**Follow up:** Recursive solution is trivial, could you do it iteratively?



**Solution:**

We can approach it both recursively and iteratively. Since the follow-up asks for an iterative solution, we'll focus on that. Postorder traversal means visiting the children nodes first and then the parent node.


Let's implement this solution in PHP: **[590. N-ary Tree Postorder Traversal](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000590-n-ary-tree-postorder-traversal/solution.php)**

```php
<?php
//Definition for a Node.
class Node {
    public $val = null;
    public $children = [];

    public function __construct($val) {
        $this->val = $val;
    }
}

/**
 * @param Node $root
 * @return integer[]
 */
function postorder($root) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example 1:
$root1 = new Node(1);
$root1->children = [
    $node3 = new Node(3),
    new Node(2),
    new Node(4)
];
$node3->children = [
    new Node(5),
    new Node(6)
];

print_r(postorder($root1)); // Output: [5, 6, 3, 2, 4, 1]

// Example 2:
$root2 = new Node(1);
$root2->children = [
    new Node(2),
    $node3 = new Node(3),
    $node4 = new Node(4),
    $node5 = new Node(5)
];
$node3->children = [
    $node6 = new Node(6),
    $node7 = new Node(7)
];
$node4->children = [
    $node8 = new Node(8)
];
$node5->children = [
    $node9 = new Node(9),
    $node10 = new Node(10)
];
$node7->children = [
    new Node(11)
];
$node8->children = [
    new Node(12)
];
$node9->children = [
    new Node(13)
];
$node11 = $node7->children[0];
$node11->children = [
    new Node(14)
];

print_r(postorder($root2)); // Output: [2, 6, 14, 11, 7, 3, 12, 8, 4, 13, 9, 10, 5, 1]
?>
```

### Explanation:

1. **Initialization**:
   - Create a stack and push the root node onto it.
   - Create an empty array `result` to store the final postorder traversal.

2. **Traversal**:
   - Pop the node from the stack, insert its value at the beginning of the `result` array.
   - Push all its children onto the stack.
   - Continue until the stack is empty.

3. **Result**:
   - The result array will contain the nodes in postorder after the loop finishes.

This iterative approach effectively simulates the postorder traversal by using a stack and reversing the process typically done by recursion.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**

