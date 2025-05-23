3108\. Minimum Cost Walk in Weighted Graph

**Difficulty:** Hard

**Topics:** `Array`, `Bit Manipulation`, `Union Find`, `Graph`

There is an undirected weighted graph with `n` vertices labeled from `0` to `n - 1`.

You are given the integer `n` and an array `edges`, where <code>edges[i] = [u<sub>i</sub>, v<sub>i</sub>, w<sub>i</sub>]</code> indicates that there is an edge between vertices <code>u<sub>i</sub></code> and <code>v<sub>i</sub></code> with a weight of <code>w<sub>i</sub></code>.

A walk on a graph is a sequence of vertices and edges. The walk starts and ends with a vertex, and each edge connects the vertex that comes before it and the vertex that comes after it. It's important to note that a walk may visit the same edge or vertex more than once.

The **cost** of a walk starting at node `u` and ending at node `v` is defined as the bitwise `AND` of the weights of the edges traversed during the walk. In other words, if the sequence of edge weights encountered during the walk is <code>w<sub>0</sub>, w<sub>1</sub>, w<sub>2</sub>, ..., w<sub>k</sub></code>, then the cost is calculated as <code>w<sub>0</sub> & w<sub>1</sub> & w<sub>2</sub> & ... & w<sub>k</sub></code>, where `&` denotes the bitwise `AND` operator.

You are also given a 2D array `query`, where <code>query[i] = [s<sub>i</sub>, t<sub>i</sub>]</code>. For each query, you need to find the minimum cost of the walk starting at vertex <code>s<sub>i</sub></code> and ending at vertex <code>t<sub>i</sub></code>. If there exists no such walk, the answer is `-1`.

Return _the array `answer`, where `answer[i]` denotes the **minimum** cost of a walk for query `i`_.

**Example 1:**

- **Input:** n = 5, edges = [[0,1,7],[1,3,7],[1,2,1]], query = [[0,3],[3,4]]
- **Output:** [1,-1]
- **Explanation:**

![q4_example1-1](https://assets.leetcode.com/uploads/2024/01/31/q4_example1-1.png)
To achieve the cost of 1 in the first query, we need to move on the following edges: `0->1` (weight 7), `1->2` (weight 1), `2->1` (weight 1), `1->3` (weight 7).

In the second query, there is no walk between nodes 3 and 4, so the answer is -1.

**Example 2:**

- **Input:** n = 3, edges = [[0,2,7],[0,1,15],[1,2,6],[1,2,1]], query = [[1,2]]
- **Output:** [0]
- **Explanation:**

![q4_example2e](https://assets.leetcode.com/uploads/2024/01/31/q4_example2e.png)
To achieve the cost of 0 in the first query, we need to move on the following edges: `1->2` (weight 1), `2->1` (weight 6), `1->2` (weight 1).



**Constraints:**

- <code>2 <= n <= 10<sup>5</sup></code>
- <code>0 <= edges.length <= 10<sup>5</sup></code>
- `edges[i].length == 3`
- <code>0 <= u<sub>i</sub>, v<sub>i</sub> <= n - 1</code>
- <code>u<sub>i</sub> != v<sub>i</sub></code>
- <code>0 <= w<sub>i</sub> <= 10<sup>5</sup></code>
- <code>1 <= query.length <= 10<sup>5</sup></code>
- `query[i].length == 2`
- <code>0 <= s<sub>i</sub>, t<sub>i</sub> <= n - 1</code>
- <code>s<sub>i</sub> != t<sub>i</sub></code>


**Hint:**
1. The intended solution uses Disjoint Set Union.
2. Notice that, if `u` and `v` are not connected then the answer is `-1`, otherwise we can use all the edges from the connected component where both belong to.



**Solution:**

We need to determine the minimum cost of a walk between two nodes in a weighted undirected graph, where the cost is defined as the bitwise AND of the weights of all edges traversed during the walk. If no such walk exists, the answer should be -1.

### Approach
1. **Disjoint Set Union (DSU)**: First, we use DSU to identify connected components in the graph. This helps us quickly determine if two nodes are reachable from each other.
2. **Compute Component AND Values**: For each connected component, compute the bitwise AND of all edge weights within that component. This value represents the minimum possible cost for any walk within the component.
3. **Query Processing**: For each query, check if the start and end nodes belong to the same connected component. If they do, return the precomputed AND value for that component; otherwise, return -1.

Let's implement this solution in PHP: **[3108. Minimum Cost Walk in Weighted Graph](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003108-minimum-cost-walk-in-weighted-graph/solution.php)**

```php
<?php
class DSU {
    /**
     * @var array
     */
    private $parent;
    /**
     * @var array
     */
    private $rank;

    /**
     * @param $n
     */
    public function __construct($n) {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }

    /**
     * @param $x
     * @return mixed
     */
    public function find($x) {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }

    /**
     * @param $x
     * @param $y
     * @return bool
     */
    public function union($x, $y) {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }
}

/**
 * @param Integer $n
 * @param Integer[][] $edges
 * @param Integer[][] $query
 * @return Integer[]
 */
function minimumCost($n, $edges, $query) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
$n = 5;
$edges = [[0,1,7],[1,3,7],[1,2,1]];
$query = [[0,3],[3,4]];
print_r(minimumCost($n, $edges, $query));  // Output: [1,-1]

$n = 3;
$edges = [[0,2,7],[0,1,15],[1,2,6],[1,2,1]];
$query = [[1,2]];
print_r(minimumCost($n, $edges, $query));  // Output: [0]
?>
```

### Explanation:

1. **DSU Initialization**: We initialize the DSU structure to keep track of connected components. Each node starts as its own parent, and we use union by rank to optimize merging components.
2. **Union Operations**: For each edge, we unite the nodes it connects, effectively building the connected components.
3. **Component AND Calculation**: After forming the connected components, we compute the bitwise AND of all edge weights in each component. This is done by iterating over each edge and updating the AND value for the root of its connected component.
4. **Query Handling**: For each query, we check if the start and end nodes are in the same component using the DSU find operation. If they are, we return the precomputed AND value for that component; otherwise, we return -1.

This approach efficiently handles the problem constraints using union-find for connectivity and bitwise operations to determine the minimum path cost.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**