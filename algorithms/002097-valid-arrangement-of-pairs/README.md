2097\. Valid Arrangement of Pairs

**Difficulty:** Hard

**Topics:** `Depth-First Search`, `Graph`, `Eulerian Circuit`

You are given a **0-indexed** 2D integer array `pairs` where <code>pairs[i] = [start<sub>i</sub>, end<sub>i</sub>]</code>. An arrangement of `pairs` is **valid** if for every index `i` where `1 <= i < pairs.length`, we have <code>end<sub>i-1</sub> == start<sub>i</sub></code>.

Return _**any** valid arrangement of `pairs`_.

**Note**: The inputs will be generated such that there exists a valid arrangement of `pairs`.

**Example 1:**

- **Input:** pairs = [[5,1],[4,5],[11,9],[9,4]]
- **Output:** [[11,9],[9,4],[4,5],[5,1]]
- **Explanation:** This is a valid arrangement since end<sub>i-1</sub> always equals start<sub>i</sub>.
  - end<sub>0</sub> = 9 == 9 = start<sub>1</sub>
  - end<sub>1</sub> = 4 == 4 = start<sub>2</sub>
  - end<sub>2</sub> = 5 == 5 = start<sub>3</sub>

**Example 2:**

- **Input:** pairs = [[1,3],[3,2],[2,1]]
- **Output:** [[1,3],[3,2],[2,1]]
- **Explanation:** This is a valid arrangement since end<sub>i-1</sub> always equals start<sub>i</sub>.
  - end<sub>0</sub> = 3 == 3 = start<sub>1</sub>
  - end<sub>1</sub> = 2 == 2 = start<sub>2</sub>
  - The arrangements [[2,1],[1,3],[3,2]] and [[3,2],[2,1],[1,3]] are also valid.


**Example 3:**

- **Input:** pairs = [[1,2],[1,3],[2,1]]
- **Output:** [[1,2],[2,1],[1,3]]
- **Explanation:** This is a valid arrangement since end<sub>i-1</sub> always equals start<sub>i</sub>.
  - end<sub>0</sub> = 2 == 2 = start<sub>1</sub>
  - end<sub>1</sub> = 1 == 1 = start<sub>2</sub>



**Constraints:**

- <code>1 <= pairs.length <= 10<sup>5</sup></code>
- `pairs[i].length == 2`
- <code>0 <= start<sub>i</sub>, end<sub>i</sub> <= 10<sup>9</sup></code>
- <code>start<sub>i</sub> != end<sub>i</sub></code>
- No two pairs are exactly the same.
- There **exists** a valid arrangement of `pairs`.


**Hint:**
1. Could you convert this into a graph problem?
2. Consider the pairs as edges and each number as a node.
3. We have to find an Eulerian path of this graph. Hierholzer’s algorithm can be used.



**Solution:**

We can approach it as an Eulerian Path problem in graph theory. In this case, the pairs can be treated as edges, and the values within the pairs (the `start` and `end`) can be treated as nodes. We need to find an Eulerian path, which is a path that uses every edge exactly once, and the end of one edge must match the start of the next edge.

### Key Steps:
1. **Graph Representation**: Each unique number in the pairs will be a node, and each pair will be an edge from `start[i]` to `end[i]`.
2. **Eulerian Path Criteria**:
    - An Eulerian path exists if there are exactly two nodes with odd degrees, and the rest must have even degrees.
    - We need to make sure that the graph is connected (though this is guaranteed by the problem statement).
3. **Hierholzer's Algorithm**: This algorithm can be used to find the Eulerian path. It involves:
    - Starting at a node with an odd degree (if any).
    - Traversing through the edges, marking them as visited.
    - If a node is reached with unused edges, continue traversing until all edges are used.

### Plan:
- Build a graph using a hash map to store the adjacency list (each node and its connected nodes).
- Track the degree (in-degree and out-degree) of each node.
- Use Hierholzer's algorithm to find the Eulerian path.

Let's implement this solution in PHP: **[2097. Valid Arrangement of Pairs](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002097-valid-arrangement-of-pairs/solution.php)**

```php
<?php
/**
 * @param Integer[][] $pairs
 * @return Integer[][]
 */
function validArrangement($pairs) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
$pairs1 = [[5, 1], [4, 5], [11, 9], [9, 4]];
$pairs2 = [[1, 3], [3, 2], [2, 1]];
$pairs3 = [[1, 2], [1, 3], [2, 1]];

print_r(validArrangement($pairs1)); // Output: [[11, 9], [9, 4], [4, 5], [5, 1]]
print_r(validArrangement($pairs2)); // Output: [[1, 3], [3, 2], [2, 1]]
print_r(validArrangement($pairs3)); // Output: [[1, 2], [2, 1], [1, 3]]
?>
```

### Explanation:

1. **Graph Construction**:
    - We build the graph using an adjacency list where each key is a `start` node, and the value is a list of `end` nodes.
    - We also maintain the out-degree and in-degree for each node, which will help us find the start node for the Eulerian path.

2. **Finding the Start Node**:
    - An Eulerian path starts at a node where the out-degree is greater than the in-degree by 1 (if such a node exists).
    - If no such node exists, the graph is balanced, and we can start at any node.

3. **Hierholzer's Algorithm**:
    - We start from the `startNode` and repeatedly follow edges, marking them as visited by removing them from the adjacency list.
    - Once we reach a node with no more outgoing edges, we backtrack and build the result.

4. **Return the Result**:
    - The result is constructed in reverse order because of the way we backtrack, so we reverse it at the end.

### Example Output:
```php
Array
(
    [0] => Array
        (
            [0] => 11
            [1] => 9
        )

    [1] => Array
        (
            [0] => 9
            [1] => 4
        )

    [2] => Array
        (
            [0] => 4
            [1] => 5
        )

    [3] => Array
        (
            [0] => 5
            [1] => 1
        )
)
```

### Time Complexity:
- **Building the graph**: O(n), where n is the number of pairs.
- **Hierholzer's Algorithm**: O(n), because each edge is visited once.
- **Overall Time Complexity**: O(n).

This approach efficiently finds a valid arrangement of pairs by treating the problem as an Eulerian path problem in a directed graph.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
