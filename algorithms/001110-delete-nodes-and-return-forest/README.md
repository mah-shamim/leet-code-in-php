1110\. Delete Nodes And Return Forest

**Difficulty:** Medium

**Topics:** `Array`, `Hash Table`, `Tree`, `Depth-First Search`, `Binary Tree`

Given the `root` of a binary tree, each node in the tree has a distinct value.

After deleting all nodes with a value in `to_delete`, we are left with a forest (a disjoint union of trees).

Return the roots of the trees in the remaining forest. You may return the result in any order.

**Example 1:**

![screen-shot-2019-07-01-at-53836-pm](https://assets.leetcode.com/uploads/2019/07/01/screen-shot-2019-07-01-at-53836-pm.png)

- **Input:** root = [1,2,3,4,5,6,7], to_delete = [3,5]
- **Output:** [[1,2,null,4],[6],[7]]

**Example 2:**

- **Input:** root = [1,2,4,null,3], to_delete = [3]
- **Output:** [[1,2,4]]

**Constraints:**

- The number of nodes in the given tree is at most `1000`.
- Each node has a distinct value between `1` and `1000`.
- `to_delete.length <= 1000`
- `to_delete` contains distinct values between `1` and `1000`.


**Solution:**


To solve this problem, we can follow these steps:

1. Traverse the tree using a helper function.
2. If a node is marked for deletion, add its children to the result forest if they are not null.
3. Recursively delete nodes and adjust the tree accordingly.
4. Return the list of root nodes of the remaining forest.

Let's implement this solution in PHP: **[1110. Delete Nodes And Return Forest](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001110-delete-nodes-and-return-forest/solution.php)**

```php
<?php
/**
 * @param TreeNode $root
 * @param Integer[] $to_delete
 * @return TreeNode[]
 */
function delNodes($root, $to_delete) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $node
 * @param $forest
 * @param $to_delete_set
 * @return mixed|null
 */
function helper($node, &$forest, $to_delete_set) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
$root = buildTree([1, 2, 3, 4, 5, 6, 7]);
$to_delete = [3, 5];
$forestRoot = new Solution();

$forest = $forestRoot->delNodes($root, $to_delete);

function printForest($forest) {
    foreach ($forest as $tree) {
        printTree($tree);
        echo "\n";
    }
}

function printTree($node) {
    if ($node === null) {
        return;
    }
    echo $node->val . " ";
    printTree($node->left);
    printTree($node->right);
}

printForest($forest);
?>
```

### Explanation:
1. **TreeNode Class**: Defines the structure of a tree node.
2. **delNodes Function**: Main function to delete specified nodes and return the forest.
    - **$to_delete_set**: Converts the list of nodes to delete into a set for quick lookups.
    - **helper Function**: Recursively processes each node, checking if it should be deleted. If a node is deleted, its children are added to the forest.
3. **buildTree Function**: Helper function to build a binary tree from a list representation (used for testing).
4. **printForest Function**: Helper function to print the trees in the forest (used for testing).


**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**