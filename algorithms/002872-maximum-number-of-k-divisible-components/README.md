2872\. Maximum Number of K-Divisible Components

**Difficulty:** Hard

**Topics:** `Tree`, `Depth-First Search`

There is an undirected tree with `n` nodes labeled from `0` to `n - 1`. You are given the integer `n` and a 2D integer array `edges` of length` n - 1`, where <code>edges[i] = [a<sub>i</sub>, b<sub>i</sub>]</code> indicates that there is an edge between nodes <code>a<sub>i</sub></code> and <code>b<sub>i</sub></code> in the tree.

You are also given a **0-indexed** integer array `values` of length `n`, where `values[i]` is the value associated with the <code>i<sup>th</sup></code> node, and an integer `k`.

A **valid split** of the tree is obtained by removing any set of edges, possibly empty, from the tree such that the resulting components all have values that are divisible by `k`, where the **value of a connected component** is the sum of the values of its nodes.

Return _the **maximum number of components** in any valid split_.

**Example 1:**

![example12-cropped2svg](https://assets.leetcode.com/uploads/2023/08/07/example12-cropped2svg.jpg)

- **Input:** n = 5, edges = [[0,2],[1,2],[1,3],[2,4]], values = [1,8,1,4,4], k = 6
- **Output:** 2
- **Explanation:** We remove the edge connecting node 1 with 2. The resulting split is valid because:
  - The value of the component containing nodes 1 and 3 is values[1] + values[3] = 12.
  - The value of the component containing nodes 0, 2, and 4 is values[0] + values[2] + values[4] = 6.
    It can be shown that no other valid split has more than 2 connected components.

**Example 2:**

![example21svg-1](https://assets.leetcode.com/uploads/2023/08/07/example21svg-1.jpg)

- **Input:** n = 7, edges = [[0,1],[0,2],[1,3],[1,4],[2,5],[2,6]], values = [3,0,6,1,5,2,1], k = 3
- **Output:** 3
- **Explanation:** We remove the edge connecting node 0 with 2, and the edge connecting node 0 with 1. The resulting split is valid because:
  - The value of the component containing node 0 is values[0] = 3.
  - The value of the component containing nodes 2, 5, and 6 is values[2] + values[5] + values[6] = 9.
  - The value of the component containing nodes 1, 3, and 4 is values[1] + values[3] + values[4] = 6.
    It can be shown that no other valid split has more than 3 connected components.



**Constraints:**

- <code>1 <= n <= 3 * 10<sup>4</sup></code>
- `edges.length == n - 1`
- `edges[i].length == 2`
- `0 <= ai, bi < n`
- `values.length == n`
- <code>0 <= values[i] <= 10<sup>9</sup></code>
- <code>1 <= k <= 10<sup>9</sup></code>
- Sum of `values` is divisible by `k`.
- The input is generated such that `edges` represents a valid tree.


**Hint:**
1. Root the tree at node `0`.
2. If a leaf node is not divisible by `k`, it must be in the same component as its parent node so we merge it with its parent node.
3. If a leaf node is divisible by `k`, it will be in its own components so we separate it from its parent node.
4. In each step, we either cut a leaf node down or merge a leaf node. The number of nodes on the tree reduces by one. Repeat this process until only one node is left.



**Solution:**

We can implement a Depth-First Search (DFS) approach to explore the tree, track the values of components, and find the maximum number of valid splits.

### Key Points:

- **Tree Structure:** We are working with an undirected tree where each node has an associated value. We need to find the maximum number of connected components we can get by splitting the tree such that the sum of values of each component is divisible by `k`.
- **DFS Traversal:** We use Depth-First Search (DFS) to traverse the tree and calculate the subtree sums.
- **Divisibility Check:** After calculating the sum of a subtree, if it's divisible by `k`, it means the subtree can be considered as a valid component by itself.
- **Edge Removal:** By removing edges that connect nodes whose subtree sums aren't divisible by `k`, we can maximize the number of valid components.

### Approach:

1. **Tree Representation:** Convert the `edges` list into an adjacency list to represent the tree.
2. **DFS Traversal:** Start from node 0 and recursively calculate the sum of values in each subtree. If the sum is divisible by `k`, we can cut that subtree off from its parent, effectively forming a valid component.
3. **Global Count:** Maintain a global counter (`result`) that tracks the number of valid components formed by cutting edges.
4. **Final Check:** At the end of the DFS traversal, ensure that if the root's total subtree sum is divisible by `k`, it counts as a valid component.

### Plan:

1. **Input Parsing:** Convert the input into a usable form. Specifically, create an adjacency list representation for the tree.
2. **DFS Function:** Write a recursive function `dfs(node)` that computes the sum of values in the subtree rooted at `node`. If this sum is divisible by `k`, increment the `result` counter and "cut" the edge by returning 0 to prevent merging back into the parent.
3. **Start DFS from Root:** Call `dfs(0)` and then check the final value of `result`.

### Solution Steps:

1. **Build the Tree:** Convert the edge list into an adjacency list for easier traversal.
2. **Initialize Visited Array:** Use a `visited` array to ensure we don't revisit nodes.
3. **DFS Traversal:** Perform DFS starting from node `0`. For each node, calculate the sum of values of its subtree.
4. **Check Divisibility:** If the sum of a subtree is divisible by `k`, increment the `result` and reset the subtree sum to 0.
5. **Final Component Check:** After the DFS traversal, check if the entire tree (rooted at node 0) has a sum divisible by `k` and account for it as a separate component if necessary.

Let's implement this solution in PHP: **[2872. Maximum Number of K-Divisible Components](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002872-maximum-number-of-k-divisible-components/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @param Integer[][] $edges
 * @param Integer[] $values
 * @param Integer $k
 * @return Integer
 */
function maxKDivisibleComponents($n, $edges, $values, $k) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * DFS Function
 *
 * @param $graph
 * @param $node
 * @param $parent
 * @param $values
 * @param $k
 * @param $ans
 * @return array|bool|int|int[]|mixed|null
 */
private function dfs($graph, $node, $parent, &$values, $k, &$ans) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example 1
$n = 5;
$edges = [[0,2],[1,2],[1,3],[2,4]];
$values = [1,8,1,4,4];
$k = 6;
echo maxKDivisibleComponents($n, $edges, $values, $k) . "\n"; // Output: 2

// Example 2
$n = 7;
$edges = [[0,1],[0,2],[1,3],[1,4],[2,5],[2,6]];
$values = [3,0,6,1,5,2,1];
$k = 3;
echo maxKDivisibleComponents($n, $edges, $values, $k) . "\n"; // Output: 3
?>
```

### Explanation:

1. **Tree Construction:** We build an adjacency list to represent the tree structure. Each edge connects two nodes, and we use this adjacency list to traverse the tree.
2. **DFS Traversal:** The DFS function recursively calculates the sum of the subtree rooted at each node. If the sum of the subtree is divisible by `k`, we increment the `result` and consider the subtree as a separate valid component.
3. **Returning Subtree Sum:** For each node, the DFS function returns the sum of values for its subtree. If a subtree is divisible by `k`, we effectively "cut" the edge by returning a sum of 0, preventing further merging back with the parent node.
4. **Final Check:** At the end of the DFS, we ensure that if the sum of the entire tree is divisible by `k`, it counts as a valid component.

### Example Walkthrough:

**Example 1:**

Input:
- `n = 5`, `edges = [[0,2],[1,2],[1,3],[2,4]]`, `values = [1,8,1,4,4]`, `k = 6`.

DFS starts from node 0:
- Node 0: subtree sum = 1
- Node 2: subtree sum = 1 + 1 + 4 = 6 (divisible by 6, so we can cut this edge)
- Node 1: subtree sum = 8 + 4 = 12 (divisible by 6, cut this edge)
- Final count of components = 2.

**Example 2:**

Input:
- `n = 7`, `edges = [[0,1],[0,2],[1,3],[1,4],[2,5],[2,6]]`, `values = [3,0,6,1,5,2,1]`, `k = 3`.

DFS starts from node 0:
- Node 0: subtree sum = 3
- Node 2: subtree sum = 6 + 2 + 1 = 9 (divisible by 3, cut this edge)
- Node 1: subtree sum = 0 + 5 = 5 (not divisible by 3, merge this sum)
- Final count of components = 3.

### Time Complexity:

- **DFS Time Complexity:** O(n), where `n` is the number of nodes. We visit each node once and perform constant-time operations at each node.
- **Space Complexity:** O(n) for the adjacency list, visited array, and recursion stack.

Thus, the overall time and space complexity is O(n), making this approach efficient for the given problem constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
