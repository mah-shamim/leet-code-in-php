1579\. Remove Max Number of Edges to Keep Graph Fully Traversable

**Difficulty:** Hard

**Topics:** `Union Find`, `Graph`

Alice and Bob have an undirected graph of `n` nodes and three types of edges:

- Type 1: Can be traversed by Alice only.
- Type 2: Can be traversed by Bob only.
- Type 3: Can be traversed by both Alice and Bob.

Given an array `edges` where <code>edges[i] = [type<sub>i</sub>, u<sub>i</sub>, v<sub>i</sub>]</code> represents a bidirectional edge of type <code>type<sub>i</sub></code> between nodes <code>u<sub>i</sub></code> and <code>v<sub>i</sub></code>, find the maximum number of edges you can remove so that after removing the edges, the graph can still be fully traversed by both Alice and Bob. The graph is fully traversed by Alice and Bob if starting from any node, they can reach all other nodes.

Return _the maximum number of edges you can remove, or return `-1` if Alice and Bob cannot fully traverse the graph_.

**Example 1:**

![ex1](https://assets.leetcode.com/uploads/2020/08/19/ex1.png)

- **Input:** n = 4, edges = [[3,1,2],[3,2,3],[1,1,3],[1,2,4],[1,1,2],[2,3,4]]
- **Output:** 2
- **Explanation:** If we remove the 2 edges [1,1,2] and [1,1,3]. The graph will still be fully traversable by Alice and Bob. Removing any additional edge will not make it so. So the maximum number of edges we can remove is 2.

**Example 2:**

![ex2](https://assets.leetcode.com/uploads/2020/08/19/ex2.png)

- **Input:** n = 4, edges = [[3,1,2],[3,2,3],[1,1,4],[2,1,4]]
- **Output:** 0
- **Explanation:** Notice that removing any edge will not make the graph fully traversable by Alice and Bob.

**Example 3:**

![ex3](https://assets.leetcode.com/uploads/2020/08/19/ex3.png)

- **Input:** n = 4, edges = [[3,2,3],[1,1,2],[2,3,4]]
- **Output:** -1
- **Explanation:** In the current graph, Alice cannot reach node 4 from the other nodes. Likewise, Bob cannot reach 1. Therefore it's impossible to make the graph fully traversable.

**Constraints:**


- <code>1 <= n <= 10<sup>5</sup></code>
- <code>1 <= edges.length <= min(10<sup>5</sup>, 3 * n * (n - 1) / 2)</code>
- <code>edges[i].length == 3</code>
- <code>1 <= type<sub>i</sub> <= 3</code>
- <code>1 <= u<sub>i</sub> < v<sub>i</sub> <= n</code>
- All tuples <code>(type<sub>i</sub>, u<sub>i</sub>, v<sub>i</sub>)</code> are distinct.


**Hint:**
1. Build the network instead of removing extra edges.
2. Suppose you have the final graph (after removing extra edges). Consider the subgraph with only the edges that Alice can traverse. What structure does this subgraph have? How many edges are there?
3. Use disjoint set union data structure for both Alice and Bob.
4. Always use Type 3 edges first, and connect the still isolated ones using other edges.



**Solution:**

We need to find the maximum number of edges that can be removed from an undirected graph such that the graph remains fully traversable by both Alice and Bob. The graph consists of three types of edges: type 1 (Alice only), type 2 (Bob only), and type 3 (both Alice and Bob). The solution involves using Union-Find (Disjoint Set Union, DSU) data structures to efficiently manage and check connectivity for both Alice and Bob.

### Approach
1. **Problem Analysis**: The problem requires us to ensure that after removing some edges, both Alice and Bob can traverse the entire graph. This means the graph must remain connected for both Alice (using type 1 and type 3 edges) and Bob (using type 2 and type 3 edges). The goal is to maximize the number of edges removed while maintaining connectivity for both.

2. **Intuition**:
    - **Priority for Type 3 Edges**: Since type 3 edges can be used by both Alice and Bob, they are more valuable. We should process these edges first to connect as many nodes as possible for both users simultaneously.
    - **Union-Find Data Structure**: This helps efficiently manage and check connectivity. We maintain two separate Union-Find structures: one for Alice and one for Bob.
    - **Edge Processing Order**: Process edges in descending order of type (type 3 first, then type 1 and type 2). This ensures that type 3 edges are utilized first, optimizing connectivity for both users early on.

3. **Algorithm Selection**:
    - **Union-Find**: Used to manage the connected components for Alice and Bob. It supports two operations: `find` (to determine the root of a node) and `union` (to merge two sets).
    - **Sorting Edges**: Edges are sorted in descending order based on type to prioritize type 3 edges.
    - **Connectivity Check**: After processing all edges, verify if both Alice's and Bob's graphs are fully connected by checking if all nodes share the same root as node 1.

4. **Complexity Analysis**:
    - **Time Complexity**: Sorting the edges takes _**O(E log E)**_, where _**E**_ is the number of edges. The Union-Find operations (find and union) are nearly constant time due to path compression and union by rank, leading to an overall time complexity of _**O(E α(N))**_, where _**α**_ is the inverse Ackermann function.
    - **Space Complexity**: _**O(N)**_ for storing parent and rank arrays in the Union-Find structures, where _**N**_ is the number of nodes.

Let's implement this solution in PHP: **[1579. Remove Max Number of Edges to Keep Graph Fully Traversable](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001579-remove-max-number-of-edges-to-keep-graph-fully-traversable/solution.php)**

```php
<?php
class UnionFind {
    private $parent;
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
 * @return Integer
 */
function maxNumEdgesToRemove($n, $edges) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
$n = 4;
$edges = [[3,1,2],[3,2,3],[1,1,3],[1,2,4],[1,1,2],[2,3,4]];
echo maxNumEdgesToRemove($n, $edges); // Output: 2

$n = 4;
$edges = [[3,1,2],[3,2,3],[1,1,4],[2,1,4]];
echo maxNumEdgesToRemove($n, $edges); // Output: 0

$n = 4;
$edges = [[3,2,3],[1,1,2],[2,3,4]];
echo maxNumEdgesToRemove($n, $edges); // Output: -1
?>
```

### Explanation:

1. **Union-Find Initialization**: Two instances of the Union-Find data structure are created, one for Alice and one for Bob. These structures help manage the connected components for each user.
2. **Edge Sorting**: Edges are sorted in descending order based on type to prioritize type 3 edges, which benefit both users.
3. **Edge Processing**:
    - **Type 3 Edges**: Processed first. If connecting nodes in either Alice's or Bob's graph, the edge is counted as required.
    - **Type 1 Edges**: Processed next. Only counted if they connect nodes in Alice's graph.
    - **Type 2 Edges**: Processed last. Only counted if they connect nodes in Bob's graph.
4. **Connectivity Check**: After processing all edges, verify that both Alice's and Bob's graphs are fully connected by ensuring all nodes share the same root as node 1 in their respective Union-Find structures.
5. **Result Calculation**: The number of edges that can be removed is the total edges minus the required edges. If either graph is not fully connected, return -1.

This approach efficiently ensures the graph remains traversable for both users while maximizing the number of edges removed.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**