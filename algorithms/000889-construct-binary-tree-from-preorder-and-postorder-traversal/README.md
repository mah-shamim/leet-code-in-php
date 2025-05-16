889\. Construct Binary Tree from Preorder and Postorder Traversal

**Difficulty:** Medium

**Topics:** `Array`, `Hash Table`, `Divide and Conquer`, `Tree`, `Binary Tree`

Given two integer arrays, `preorder` and `postorder` where `preorder` is the preorder traversal of a binary tree of **distinct** values and `postorder` is the postorder traversal of the same tree, reconstruct and return _the binary tree_.

If there exist multiple answers, you can **return any** of them.

**Example 1:**

![lc-prepost](https://assets.leetcode.com/uploads/2021/07/24/lc-prepost.jpg)

- **Input:** preorder = [1,2,4,5,3,6,7], postorder = [4,5,2,6,7,3,1]
- **Output:** [1,2,3,4,5,6,7]

**Example 2:**

- **Input:** preorder = [1], postorder = [1]
- **Output:** [1]



**Constraints:**

- `1 <= preorder.length <= 30`
- `1 <= preorder[i] <= preorder.length`
- All the values of `preorder` are **unique**.
- `postorder.length == preorder.length`
- `1 <= postorder[i] <= postorder.length`
- All the values of `postorder` are **unique**.
- It is guaranteed that `preorder` and `postorder` are the preorder traversal and postorder traversal of the same binary tree.



**Solution:**

We need to construct a binary tree from its preorder and postorder traversals. The key challenge is to correctly identify the left and right subtrees from these traversals and recursively build the tree.

### Approach
1. **Identify the Root**: The root of the tree is the first element in the preorder traversal.
2. **Base Case**: If the tree has only one node (root), return it directly.
3. **Left Subtree Identification**: The left child of the root is the second element in the preorder traversal. Find the position of this left child in the postorder traversal to determine the boundary between the left and right subtrees.
4. **Split Traversals**: Using the position of the left child in the postorder traversal, split both the preorder and postorder arrays into left and right subtrees.
5. **Recursive Construction**: Recursively construct the left and right subtrees using the split arrays.

Let's implement this solution in PHP: **[889. Construct Binary Tree from Preorder and Postorder Traversal](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000889-construct-binary-tree-from-preorder-and-postorder-traversal/solution.php)**

```php
<?php
/**
 * Definition for a binary tree node.
 */
class TreeNode {
   public $val = null;
   public $left = null;
   public $right = null;
   function __construct($val = 0, $left = null, $right = null) {
      $this->val = $val;
      $this->left = $left;
      $this->right = $right;
   }
}

/**
 * @param Integer[] $preorder
 * @param Integer[] $postorder
 * @return TreeNode
 */
function constructFromPrePost($preorder, $postorder) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Helper function to print tree in level-order
function levelOrderTraversal($root) {
    if (!$root) return [];
    
    $queue = [$root];
    $result = [];
    
    while (!empty($queue)) {
        $node = array_shift($queue);
        $result[] = $node->val;
        
        if ($node->left) $queue[] = $node->left;
        if ($node->right) $queue[] = $node->right;
    }
    
    return $result;
}

// Test case
$preorder = [1,2,4,5,3,6,7];
$postorder = [4,5,2,6,7,3,1];

$tree = constructFromPrePost($preorder, $postorder);
print_r(levelOrderTraversal($tree)); // Expected Output: [1,2,3,4,5,6,7]
?>
```

### Explanation:

1. **Root Identification**: The root is the first element of the preorder array.
2. **Left Child Identification**: The second element in the preorder array is the left child of the root. The position of this left child in the postorder array helps determine the split between left and right subtrees.
3. **Splitting Arrays**: Using the position of the left child in the postorder array, we split the postorder array into left and right parts. Similarly, we split the preorder array based on the number of elements in the left subtree.
4. **Recursive Construction**: The left and right subtrees are constructed recursively using the split arrays until we reach the base case (a single node).

This approach efficiently reconstructs the binary tree by leveraging the properties of preorder and postorder traversals, ensuring correctness through recursive subdivision of the traversal arrays.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**