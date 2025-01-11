3203\. Find Minimum Diameter After Merging Two Trees

**Difficulty:** Hard

**Topics:** `Tree`, `Depth-First Search`, `Breadth-First Search`, `Graph`

There exist two **undirected** trees with `n` and `m` nodes, numbered from `0` to `n - 1` and from `0` to `m - 1`, respectively. You are given two 2D integer arrays `edges1` and `edges2` of lengths `n - 1` and `m - 1`, respectively, where <code>edges1[i] = [a<sub>i</sub>, b<sub>i</sub>]</code> indicates that there is an edge between nodes <code>a<sub>i</sub></code> and <code>b<sub>i</sub></code> in the first tree and <code>edges2[i] = [u<sub>i</sub>, v<sub>i</sub>]</code> indicates that there is an edge between nodes <code>u<sub>i</sub></code> and <code>v<sub>i</sub></code> in the second tree.

You must connect one node from the first tree with another node from the second tree with an edge.

Return _the **minimum** possible **diameter** of the resulting tree_.

The **diameter** of a tree is the length of the _longest_ path between any two nodes in the tree.

**Example 1:**

![example11-transformed](https://assets.leetcode.com/uploads/2024/04/22/example11-transformed.png)

- **Input:** edges1 = [[0,1],[0,2],[0,3]], edges2 = [[0,1]]
- **Output:** 3
- **Explanation:** We can obtain a tree of diameter 3 by connecting node 0 from the first tree with any node from the second tree.

**Example 2:**

![example211](https://assets.leetcode.com/uploads/2024/04/22/example211.png)

- **Input:** edges1 = [[0,1],[0,2],[0,3],[2,4],[2,5],[3,6],[2,7]], edges2 = [[0,1],[0,2],[0,3],[2,4],[2,5],[3,6],[2,7]]
- **Output:** 5
- **Explanation:** We can obtain a tree of diameter 5 by connecting node 0 from the first tree with node 0 from the second tree.


**Constraints:**

- <code>1 <= n, m <= 10<sup>5</sup></code>
- `edges1.length == n - 1`
- `edges2.length == m - 1`
- `edges1[i].length == edges2[i].length == 2`
- <code>edges1[i] = [a<sub>i</sub>, b<sub>i</sub>]</code>
- <code>0 <= a<sub>i</sub>, b<sub>i</sub> < n</code>
- <code>edges2[i] = [u<sub>i</sub>, v<sub>i</sub>]</code>
- <code>0 <= u<sub>i</sub>, v<sub>i</sub> < m</code>
- The input is generated such that `edges1` and `edges2` represent valid trees.


**Hint:**
1. Suppose that we connected node a in tree1 with node b in tree2. The diameter length of the resulting tree will be the largest of the following 3 values:
   1. The diameter of tree 1.
   2. The diameter of tree 2.
   3. The length of the longest path that starts at node a and that is completely within Tree 1 + The length of the longest path that starts at node b and that is completely within Tree 2 + 1.
   The added one in the third value is due to the additional edge that we have added between trees 1 and 2.
2. Values 1 and 2 are constant regardless of our choice of a and b. Therefore, we need to pick a and b in such a way that minimizes value 3.
3. If we pick `a` and `b` optimally, they will be in the diameters of Tree 1 and Tree 2, respectively. Exactly which nodes of the diameter should we pick?
4. `a` is the center of the diameter of tree 1, and `b` is the center of the diameter of tree 2.



**Solution:**

We need to approach it step-by-step with a focus on understanding how to calculate the diameter of a tree and how connecting the two trees influences the overall diameter.

### Steps to solve:

1. **Find the diameter of each tree**:
   - The diameter of a tree is the longest path between any two nodes. To find it, we can use the following two-step process:
      1. Perform a BFS (or DFS) from an arbitrary node to find the farthest node (let's call this node `A`).
      2. Perform another BFS (or DFS) starting from `A` to find the farthest node from `A` (let's call this node `B`), and the distance from `A` to `B` will be the diameter of the tree.

2. **Determine the optimal nodes to connect**:
   - From the hint in the problem, the best way to minimize the additional diameter when connecting two trees is to connect the centers of the diameters of both trees. This will minimize the longest path caused by the new edge.
   - The optimal node in a tree's diameter is typically the "center", which can be found by performing a BFS from the endpoints of the diameter and finding the middle of the longest path.

3. **Minimize the total diameter**:
   - Once we find the centers of both trees, the new diameter is the maximum of:
      - The diameter of Tree 1.
      - The diameter of Tree 2.
      - The sum of the longest path within Tree 1, the longest path within Tree 2, and 1 for the new connecting edge.

Let's implement this solution in PHP: **[3203. Find Minimum Diameter After Merging Two Trees](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003203-find-minimum-diameter-after-merging-two-trees/solution.php)**

```php
<?php
/**
 * @param Integer[][] $edges1
 * @param Integer[][] $edges2
 * @return Integer
 */
function minimumDiameterAfterMerge($edges1, $edges2) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * Helper function to find the diameter of a tree and the farthest node from a start node
 *
 * @param $n
 * @param $edges
 * @param $start
 * @return array
 */
function bfs($n, $edges, $start) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * Helper function to find the diameter of a tree and its center
 *
 * @param $n
 * @param $edges
 * @return array
 */
function getDiameterAndCenter($n, $edges) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example 1
$edges1 = [[0,1],[0,2],[0,3]];
$edges2 = [[0,1]];
echo minimumDiameterAfterMerge($edges1, $edges2);  // Output: 3

// Example 2
$edges1 = [[0,1],[0,2],[0,3],[2,4],[2,5],[3,6],[2,7]];
$edges2 = [[0,1],[0,2],[0,3],[2,4],[2,5],[3,6],[2,7]];
echo minimumDiameterAfterMerge($edges1, $edges2);  // Output: 5
?>
```

### Explanation:

1. **BFS Helper Function**: The `bfs` function calculates the farthest node from a given starting node and returns the distance array and the farthest node found. This is essential for calculating the diameter of the tree.

2. **Get Diameter and Center**: The `getDiameterAndCenter` function finds the diameter of a tree and its center. The center of the tree is crucial for minimizing the new tree's diameter when merging two trees.

3. **Main Solution**:
   - We first build adjacency lists for both trees.
   - We calculate the diameter and center for both trees.
   - We perform BFS from the centers of both trees to get the longest paths within each tree.
   - Finally, we calculate the maximum of the three values to get the minimum diameter of the merged tree.

### Time Complexity:
- Constructing the adjacency list: O(n + m)
- BFS traversal: O(n + m)
- Overall time complexity is O(n + m), which is efficient for the input size limit of <code>10<sup>5</sup></code>.

This approach ensures we find the minimum possible diameter when merging the two trees.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
