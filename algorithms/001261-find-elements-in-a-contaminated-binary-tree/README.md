1261\. Find Elements in a Contaminated Binary Tree

**Difficulty:** Medium

**Topics:** `Hash Table`, `Tree`, `Depth-First Search`, `Breadth-First Search`, `Design`, `Binary Tree`

Given a binary tree with the following rules:

1. `root.val == 0`
2. For any `treeNode`:
   1. If `treeNode.val` has a value `x` and `treeNode.left != null`, then `treeNode.left.val == 2 * x + 1`
   2. If `treeNode.val` has a value `x` and `treeNode.right != null`, then `treeNode.right.val == 2 * x + 2`

Now the binary tree is contaminated, which means all `treeNode.val` have been changed to `-1`.

Implement the `FindElements` class:

- `FindElements(TreeNode* root)` Initializes the object with a contaminated binary tree and recovers it.
- `bool find(int target)` Returns `true` if the `target` value exists in the recovered binary tree.


**Example 1:**

![untitled-diagram-4-1](https://assets.leetcode.com/uploads/2019/11/06/untitled-diagram-4-1.jpg)

- **Input:**
  ```
  ["FindElements","find","find"]
  [[[-1,null,-1]],[1],[2]]
  ```
- **Output:** [null,false,true]
- **Explanation:**
  FindElements findElements = new FindElements([-1,null,-1]);
  findElements.find(1); // return False
  findElements.find(2); // return True

**Example 2:**

![untitled-diagram-4](https://assets.leetcode.com/uploads/2019/11/06/untitled-diagram-4.jpg)

- **Input:**
  ```
   ["FindElements","find","find","find"]
   [[[-1,-1,-1,-1,-1]],[1],[3],[5]]
  ```
- **Output:** [null,true,true,false]
- **Explanation:**
  FindElements findElements = new FindElements([-1,-1,-1,-1,-1]);
  findElements.find(1); // return True
  findElements.find(3); // return True
  findElements.find(5); // return False


**Example 3:**

![untitled-diagram-4-1-1](https://assets.leetcode.com/uploads/2019/11/07/untitled-diagram-4-1-1.jpg)

- **Input:**
  ```
  ["FindElements","find","find","find","find"]
   [[[-1,null,-1,-1,null,-1]],[2],[3],[4],[5]]
  ```
- **Output:** [null,true,false,false,true]
- **Explanation:**
  FindElements findElements = new FindElements([-1,null,-1,-1,null,-1]);
  findElements.find(2); // return True
  findElements.find(3); // return False
  findElements.find(4); // return False
  findElements.find(5); // return True



**Constraints:**

- `TreeNode.val == -1`
- The height of the binary tree is less than or equal to `20`
- The total number of nodes is between <code>[1, 10<sup>4</sup>]</code>
- Total calls of `find()` is between <code>[1, 10<sup>4</sup>]</code>
- <code>0 <= target <= 10<sup>6</sup></code>


**Hint:**
1. Use DFS to traverse the binary tree and recover it.
2. Use a hashset to store TreeNode.val for finding.



**Solution:**

We need to recover the values of a contaminated binary tree and efficiently check if a target value exists in the recovered tree. The tree's structure is preserved, but all node values are set to -1. The original tree follows specific rules where each node's value determines its children's values. We need to recover these values and provide an efficient way to check for the existence of a target value.

### Approach
1. **Recover the Tree**: Use a Breadth-First Search (BFS) traversal starting from the root. The root value is set to 0. For each node, compute its left and right children's values based on the rules provided (left child: 2 * parent's value + 1, right child: 2 * parent's value + 2).
2. **Store Values**: During the BFS traversal, store each recovered value in a hash set. This allows O(1) time complexity for checking the existence of a target value.
3. **Check Target**: For each target value check, simply verify if it exists in the hash set.

Let's implement this solution in PHP: **[1261. Find Elements in a Contaminated Binary Tree](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001261-find-elements-in-a-contaminated-binary-tree/solution.php)**

```php
<?php
/**
 * Definition for a binary tree node
 */
class TreeNode {
    public $val = 0;
    public $left = null;
    public $right = null;
    
    function __construct($val = 0, $left = null, $right = null) {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }
}

class FindElements {
    private $values;
    /**
     * @param TreeNode $root
     */
    function __construct($root) {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }

    /**
     * @param Integer $target
     * @return Boolean
     */
    function find($target) {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }
}

// ========== USAGE EXAMPLES ==========

// Example 1:
// Input: ["FindElements","find","find"]
//        [[[-1,null,-1]],[1],[2]]
// Output: [null, false, true]

$root1 = new TreeNode(-1);
$root1->right = new TreeNode(-1);
$findElements1 = new FindElements($root1);

echo "Example 1:\n";
echo $findElements1->find(1) ? 'true' : 'false'; // Output: false
echo "\n";
echo $findElements1->find(2) ? 'true' : 'false'; // Output: true
echo "\n\n";

// Example 2:
// Input: ["FindElements","find","find","find"]
//        [[[-1,-1,-1,-1,-1]],[1],[3],[5]]
// Output: [null,true,true,false]

$root2 = new TreeNode(-1);
$root2->left = new TreeNode(-1);
$root2->right = new TreeNode(-1);
$root2->left->left = new TreeNode(-1);
$root2->left->right = new TreeNode(-1);
$findElements2 = new FindElements($root2);

echo "Example 2:\n";
echo $findElements2->find(1) ? 'true' : 'false'; // Output: true
echo "\n";
echo $findElements2->find(3) ? 'true' : 'false'; // Output: true
echo "\n";
echo $findElements2->find(5) ? 'true' : 'false'; // Output: false
echo "\n\n";

// Example 3:
// Input: ["FindElements","find","find","find","find"]
//        [[[-1,null,-1,-1,null,-1]],[2],[3],[4],[5]]
// Output: [null,true,false,false,true]

$root3 = new TreeNode(-1);
$root3->right = new TreeNode(-1);
$root3->right->left = new TreeNode(-1);
$root3->right->left->right = new TreeNode(-1);
$findElements3 = new FindElements($root3);

echo "Example 3:\n";
echo $findElements3->find(2) ? 'true' : 'false'; // Output: true
echo "\n";
echo $findElements3->find(3) ? 'true' : 'false'; // Output: false
echo "\n";
echo $findElements3->find(4) ? 'true' : 'false'; // Output: false
echo "\n";
echo $findElements3->find(5) ? 'true' : 'false'; // Output: true
echo "\n";
?>
```

### Explanation:

1. **Recovery Process**: The constructor initializes the recovery process by setting the root value to 0 and using a BFS traversal to update each node's value according to the given rules. Each node's left and right children values are computed and stored in the hash set.
2. **Efficient Lookup**: The hash set allows O(1) time complexity for checking if a target value exists in the tree, making the `find` method highly efficient even for a large number of calls.

This approach ensures that the tree is recovered correctly and efficiently, and target checks are performed in constant time, providing an optimal solution to the problem.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**