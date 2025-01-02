1367\. Linked List in Binary Tree

**Difficulty:** Medium

**Topics:** `Linked List`, `Tree`, `Depth-First Search`, `Breadth-First Search`, `Binary Tree`

Given a binary tree `root` and a linked list with `head` as the first node.

Return True if all the elements in the linked list starting from the `head` correspond to some _downward path_ connected in the binary tree otherwise return _False_.

In this context downward path means a path that starts at some node and goes downwards.

**Example 1:**

![sample_1_1720](https://assets.leetcode.com/uploads/2020/02/12/sample_1_1720.png)

- **Input:** head = [4,2,8], root = [1,4,4,null,2,2,null,1,null,6,8,null,null,null,null,1,3]
- **Output:** true
- **Explanation:** Nodes in blue form a subpath in the binary Tree.

**Example 2:**

![sample_2_1720](https://assets.leetcode.com/uploads/2020/02/12/sample_2_1720.png)

- **Input:** head = [1,4,2,6], root = [1,4,4,null,2,2,null,1,null,6,8,null,null,null,null,1,3]
- **Output:** true


**Example 3:**

- **Input:** head = [1,4,2,6,8], root = [1,4,4,null,2,2,null,1,null,6,8,null,null,null,null,1,3]
- **Output:** false
- **Explanation:** There is no path in the binary tree that contains all the elements of the linked list from `head`.



**Constraints:**

- The number of nodes in the tree will be in the range `[1, 2500]`.
- The number of nodes in the list will be in the range `[1, 100]`.
- `1 <= Node.val <= 100` for each node in the linked list and binary tree.


**Hint:**
1. Create recursive function, given a pointer in a Linked List and any node in the Binary Tree. Check if all the elements in the linked list starting from the head correspond to some downward path in the binary tree.



**Solution:**

We need to recursively check whether a linked list can match a downward path in a binary tree. We'll use depth-first search (DFS) to explore the binary tree and attempt to match the linked list from its head to the leaf nodes.

Here’s how we can approach the solution:

### Steps:
1. **Recursive function to match linked list**: Create a helper function that takes a linked list node and a tree node. This function checks if the linked list starting from the current node matches a downward path in the binary tree.
2. **DFS through the tree**: Traverse the binary tree using DFS, and at each node, check if there is a match starting from that node.
3. **Base conditions**: The recursion should stop and return `true` if the linked list is fully traversed, and return `false` if the binary tree node is null or the values do not match.
4. **Start search at every node**: Begin the match check at every tree node to find potential starting points for the linked list.

Let's implement this solution in PHP: **[1367. Linked List in Binary Tree](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001367-linked-list-in-binary-tree/solution.php)**

```php
<?php
// Definition for a singly-linked list node.
class ListNode {
    public $val = 0;
    public $next = null;
    function __construct($val = 0, $next = null) {
        $this->val = $val;
        $this->next = $next;
    }
}

// Definition for a binary tree node.
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

class Solution {

    /**
     * @param ListNode $head
     * @param TreeNode $root
     * @return Boolean
     */
    function isSubPath($head, $root) {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }

    // Helper function to match the linked list starting from the current tree node.
    function dfs($head, $root) {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }
}

// Example usage:

// Linked List: 4 -> 2 -> 8
$head = new ListNode(4);
$head->next = new ListNode(2);
$head->next->next = new ListNode(8);

// Binary Tree:
//      1
//     / \
//    4   4
//     \   \
//      2   2
//     / \ / \
//    1  6 8  8
$root = new TreeNode(1);
$root->left = new TreeNode(4);
$root->right = new TreeNode(4);
$root->left->right = new TreeNode(2);
$root->right->left = new TreeNode(2);
$root->left->right->left = new TreeNode(1);
$root->left->right->right = new TreeNode(6);
$root->right->left->right = new TreeNode(8);
$root->right->left->right = new TreeNode(8);

$solution = new Solution();
$result = $solution->isSubPath($head, $root);
echo $result ? "true" : "false"; // Output: true
?>
```

### Explanation:

1. **`isSubPath($head, $root)`**:
   - This function recursively checks whether the linked list starting from `$head` corresponds to any downward path in the tree.
   - It first checks if the current root node is the start of the list (by calling `dfs`).
   - If not, it recursively searches the left and right subtrees.

2. **`dfs($head, $root)`**:
   - This helper function checks if the linked list matches the tree starting at the current tree node.
   - If the list is fully traversed (`$head === null`), it returns `true`.
   - If the tree node is `null` or values don’t match, it returns `false`.
   - Otherwise, it continues to check the left and right children.

### Example Execution:

For input `head = [4,2,8]` and `root = [1,4,4,null,2,2,null,1,null,6,8]`, the algorithm will:
- Start at the root (node 1), fail to match.
- Move to the left child (node 4), match 4, then move down and match 2, then match 8, returning `true`.

### Complexity:
- **Time Complexity**: O(N * min(L, H)), where N is the number of nodes in the binary tree, L is the length of the linked list, and H is the height of the binary tree.
- **Space Complexity**: O(H) due to the recursion depth of the binary tree.

This solution efficiently checks for the subpath in the binary tree using DFS.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**