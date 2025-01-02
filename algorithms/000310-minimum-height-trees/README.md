310\. Minimum Height Trees

**Difficulty:** Medium

**Topics:** `Depth-First Search`, `Breadth-First Search`, `Graph`, `Topological Sort`

A tree is an undirected graph in which any two vertices are connected by _exactly_ one path. In other words, any connected graph without simple cycles is a tree.

Given a tree of `n` nodes labelled from `0` to `n - 1`, and an array of `n - 1` `edges` where <code>edges[i] = [a<sub>i</sub>, b<sub>i</sub>]</code> indicates that there is an undirected edge between the two nodes <code>a<sub>i</sub></code> and <code>b<sub>i</sub></code> in the tree, you can choose any node of the tree as the root. When you select a node `x` as the root, the result tree has height `h`. Among all possible rooted trees, those with minimum height (i.e. `min(h)`)  are called **minimum height trees** (MHTs).

Return _a list of all **MHTs'** root labels_. You can return the answer in **any order**.

The **height** of a rooted tree is the number of edges on the longest downward path between the root and a leaf.

**Example 1:**

![e1](https://assets.leetcode.com/uploads/2020/09/01/e1.jpg)

- **Input:** n = 4, edges = [[1,0],[1,2],[1,3]]
- **Output:** [1]
- **Explanation:** As shown, the height of the tree is 1 when the root is the node with label 1 which is the only MHT.

**Example 2:**

![e2](https://assets.leetcode.com/uploads/2020/09/01/e2.jpg)

- **Input:** n = 6, edges = [[3,0],[3,1],[3,2],[3,4],[5,4]]
- **Output:** [3,4]


**Constraints:**

- <code>1 <= n <= 2 * 10<sup>4</sup></code>
- <code>edges.length == n - 1</code>
- <code>0 <= a<sub>i</sub>, b<sub>i</sub> < n</code>
- <code>a<sub>i</sub> != b<sub>i</sub></code>
- All the pairs <code>(ai, bi)</code> are distinct.
- The given input is **guaranteed** to be a tree and there will be **no repeated** edges.

**Hint:**
1. How many MHTs can a graph have at most?




**Solution:**

We can use the concept of graph theory to find nodes that, when chosen as roots, minimize the height of the tree. The basic idea is to perform a two-pass Breadth-First Search (BFS) to find these nodes efficiently.

### Steps to Solve the Problem

1. **Build the Graph**: Represent the tree using an adjacency list. Each node will have a list of its connected nodes.

2. **Find the Leaf Nodes**: Leaf nodes are nodes with only one connection.

3. **Trim the Leaves**: Iteratively remove the leaf nodes and their corresponding edges from the graph until only one or two nodes remain. These remaining nodes are the potential roots for the minimum height trees.

4. **Return the Result**: The remaining nodes after trimming are the roots of minimum height trees.

Let's implement this solution in PHP: **[310. Minimum Height Trees](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000310-minimum-height-trees/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @param Integer[][] $edges
 * @return Integer[]
 */
function findMinHeightTrees($n, $edges) {
    ...
    ...
    ...
    /**
     * go to https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000310-minimum-height-trees/solution.php
     */
}

// Example usage:
$n1 = 4;
$edges1 = [[1,0],[1,2],[1,3]];
print_r(findMinHeightTrees($n1, $edges1)); // Output: [1]

$n2 = 6;
$edges2 = [[3,0],[3,1],[3,2],[3,4],[5,4]];
print_r(findMinHeightTrees($n2, $edges2)); // Output: [3,4]
?>
```

### Explanation:

1. **Graph Construction**: The adjacency list is constructed to represent the tree.

2. **Initial Leaves Identification**: Nodes with only one neighbor are identified as leaves.

3. **Layer-by-Layer Trimming**: Each layer of leaves is removed, updating the graph, and new leaves are identified until only 1 or 2 nodes are left.

4. **Result**: The remaining nodes are the roots that yield the minimum height trees.

This solution efficiently computes the minimum height trees in O(n) time complexity, which is suitable for large values of `n` up to 20,000.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**


