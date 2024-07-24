1530\. Number of Good Leaf Nodes Pairs

Medium

You are given the `root` of a binary tree and an integer `distance`. A pair of two different **leaf** nodes of a binary tree is said to be good if the length of **the shortest path** between them is less than or equal to `distance`.

Return _the number of good leaf node pairs in the tree_.

**Example 1:**

![](https://assets.leetcode.com/uploads/2020/07/09/e1.jpg)

- **Input:** root = [1,2,3,null,4], distance = 3
- **Output:** 1
- **Explanation:** The leaf nodes of the tree are 3 and 4 and the length of the shortest path between them is 3. This is the only good pair.

**Example 2:**

![](https://assets.leetcode.com/uploads/2020/07/09/e2.jpg)

- **Input:** root = [1,2,3,4,5,6,7], distance = 3
- **Output:** 2
- **Explanation:** The good pairs are [4,5] and [6,7] with shortest path = 2. The pair [4,6] is not good because the length of ther shortest path between them is 4.

**Example 3:**

- **Input:** root = [7,1,4,6,null,5,3,null,null,null,null,null,2], distance = 3
- **Output:** 1
- **Explanation:** The only good pair is [2,5].

**Constraints:**

- The number of nodes in the `tree` is in the range <code>[1, 2<sup>10</sup>]</code>.
- `1 <= Node.val <= 100`
- `1 <= distance <= 10`

**Hint:**
1. Start DFS from each leaf node. stop the DFS when the number of steps done > distance.
2. If you reach another leaf node within distance steps, add 1 to the answer.
3. Note that all pairs will be counted twice so divide the answer by 2.


**Solution:**

To solve this problem, we can follow these steps:

1. Tree Representation: Define the structure of the binary tree nodes.
2. DFS Traversal: Implement a DFS traversal to gather distances of leaf nodes.
3. Counting Good Pairs: During the DFS traversal, count the number of good leaf node pairs.

Let's implement this solution in PHP: **[1530. Number of Good Leaf Nodes Pairs](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001530-number-of-good-leaf-nodes-pairs/solution.php)**

```php
<?php
// Example usage:
$root = new TreeNode(1);
$root->left = new TreeNode(2);
$root->right = new TreeNode(3);
$root->left->right = new TreeNode(4);

$distance = 3;
$solution = new Solution();
echo $solution->countPairs($root, $distance); // Output: 1
?>
```

### Explanation:

1. **TreeNode Class:** Defines the structure for the tree nodes.
2. **Solution Class:** Contains the `countPairs` function which initiates the DFS traversal and returns the result.
3. **dfs Function:**
   - It recursively traverses the tree.
   - If a leaf node is found, it returns an array with a single element representing the distance from the leaf to itself (which is 1).
   - It then merges the distances from the left and right subtrees, checking if the sum of any pair of distances is less than or equal to the given distance.
   - It returns the updated distances incremented by 1 (for the parent node).

This approach ensures that we only consider leaf nodes and efficiently count pairs using the properties of the binary tree.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
