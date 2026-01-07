1339\. Maximum Product of Splitted Binary Tree

**Difficulty:** Medium

**Topics:** `Tree`, `Depth-First Search`, `Binary Tree`, `Weekly Contest 174`

Given the `root` of a binary tree, split the binary tree into two subtrees by removing one edge such that the product of the sums of the subtrees is maximized.

Return the maximum product of the sums of the two subtrees. Since the answer may be too large, return it **modulo** `10⁹ + 7`.

**Note** that you need to maximize the answer before taking the mod and not after taking it.

**Example 1:**

![sample_1_1699](https://assets.leetcode.com/uploads/2020/01/21/sample_1_1699.png)

- **Input:** root = [1,2,3,4,5,6]
- **Output:** 110
- **Explanation:** Remove the red edge and get 2 binary trees with sum 11 and 10. Their product is 110 (11*10)

**Example 2:**

![sample_2_1699](https://assets.leetcode.com/uploads/2020/01/21/sample_2_1699.png)

- **Input:** root = [1,null,2,3,4,null,null,5,6]
- **Output:** 90
- **Explanation:** Remove the red edge and get 2 binary trees with sum 15 and 6.Their product is 90 (15*6)

**Constraints:**

- The number of nodes in the tree is in the range `[2, 5 * 10⁴]`.
- `1 <= Node.val <= 10⁴`



**Hint:**
1. If we know the sum of a subtree, the answer is max( (total_sum - subtree_sum) * subtree_sum) in each node.



**Similar Questions:**
1. [2049. Count Nodes With the Highest Score](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002049-count-nodes-with-the-highest-score)






**Solution:**

We need to split a binary tree into two subtrees by removing one edge, then compute the product of the sums of the two resulting subtrees. The challenge is to maximize this product.

### Approach:

1. **Compute total sum**: First traverse the entire tree to calculate the sum of all node values.
2. **Traverse with subtree sum calculation**: Perform a second traversal to compute the sum of each subtree rooted at each node.
3. **Calculate potential products**: For each subtree sum `S`, calculate the product `S * (total_sum - S)`. This represents the product if we cut the edge above this subtree.
4. **Track maximum**: Keep track of the maximum product found during the traversal.
5. **Apply modulo**: Return the maximum product modulo 10⁹ + 7.

Let's implement this solution in PHP: **[1339. Maximum Product of Splitted Binary Tree](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001339-maximum-product-of-splitted-binary-tree/solution.php)**

```php
<?php
/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($val = 0, $left = null, $right = null) {
 *         $this->val = $val;
 *         $this->left = $left;
 *         $this->right = $right;
 *     }
 * }
 */


class Solution {

    private int $totalSum = 0;
    private int $maxProduct = 0;
    private int $mod = 1000000007;

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function maxProduct(TreeNode $root): int
    {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }

    /**
     * Compute sum of all nodes in the tree
     */
    private function computeSum($node) {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }

    /**
     * Compute subtree sums and track maximum product
     * Returns the sum of the current subtree
     */
    private function computeSubtreeSum($node) {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }
}

/**
* @param $arr
* @return TreeNode|null
*/
function buildTree($arr) {
    if (empty($arr)) return null;

    $root = new TreeNode(array_shift($arr));
    $queue = [$root];

    while (!empty($queue) && !empty($arr)) {
        $node = array_shift($queue);

        if ($arr[0] !== null) {
            $node->left = new TreeNode(array_shift($arr));
            $queue[] = $node->left;
        } else {
            array_shift($arr);
        }

        if (!empty($arr)) {
            if ($arr[0] !== null) {
                $node->right = new TreeNode(array_shift($arr));
                $queue[] = $node->right;
            } else {
                array_shift($arr);
            }
        }
    }
    return $root;
}

$solution = new Solution();

// Test Case 1
$root1 = buildTree([1, 2, 3, 4, 5, 6]);
echo $solution->maxProduct($root1) . "\n"; 
// Output: 110

// Test Case 2
$root2 = buildTree([1, null, 2, 3, 4, null, null, 5, 6]);
echo $solution->maxProduct($root2) . "\n"; 
// Output: 90

// Test Case 3 (Simple tree)
$root3 = buildTree([2, 1, 1]);
echo $solution->maxProduct($root3) . "\n"; 
// Output: 2

// Test Case 4 (Balanced tree)
$root4 = buildTree([10, 5, 15, 3, 7, null, 18]);
echo $solution->maxProduct($root4) . "\n"; 
// Output: 1020

// Test Case 5 (Skewed tree)
$root5 = buildTree([1, 2, null, 3, null, 4, null]);
echo $solution->maxProduct($root5) . "\n"; 
// Output: 24
?>
```

### Explanation:

- **Two-pass DFS solution**:
   - First pass calculates the total sum of all nodes in the tree using DFS.
   - Second pass recursively computes each subtree's sum while tracking the maximum product.

- **Why this works**:
   - Removing any edge splits the tree into two components: the subtree below the edge and the rest of the tree.
   - If we know the sum of a subtree and the total sum of all nodes, the sum of the other component is `total_sum - subtree_sum`.
   - The product is maximized when the two sums are as close to equal as possible (but not exactly equal unless necessary).

- **Complexity**:
   - **Time complexity**: O(N), where N is the number of nodes. We traverse each node twice.
   - **Space complexity**: O(H), where H is the height of the tree for the recursion stack.

- **Key insight**: We need to find the split that maximizes `subtree_sum * (total_sum - subtree_sum)` for all possible subtrees (excluding the entire tree).

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**