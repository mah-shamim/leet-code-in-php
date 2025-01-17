3243\. Shortest Distance After Road Addition Queries I

**Difficulty:** Medium

**Topics:** `Array`, `Breadth-First Search`, `Graph`

You are given an integer `n` and a 2D integer array `queries`.

There are `n` cities numbered from `0` to `n - 1`. Initially, there is a **unidirectional** road from city `i` to city `i + 1` for all `0 <= i < n - 1`.

<code>queries[i] = [u<sub>i</sub>, v<sub>i</sub>]</code> represents the addition of a new **unidirectional** road from city <code>u<sub>i</sub></code> to city <code>v<sub>i</sub></code>. After each query, you need to find the **length** of the **shortest path** from city `0` to city `n - 1`.

Return _an array `answer` where for each `i` in the range `[0, queries.length - 1]`, `answer[i]` is the length of the shortest path from city `0` to city `n - 1` after processing the **first** `i + 1` queries_.

**Example 1:**

- **Input:** n = 5, queries = [[2,4],[0,2],[0,4]]
- **Output:** [3,2,1]
- **Explanation:**
  ![image8](https://assets.leetcode.com/uploads/2024/06/28/image8.jpg)
  After the addition of the road from 2 to 4, the length of the shortest path from 0 to 4 is 3.
  ![image9](https://assets.leetcode.com/uploads/2024/06/28/image9.jpg)
  After the addition of the road from 0 to 2, the length of the shortest path from 0 to 4 is 2.
  ![image10](https://assets.leetcode.com/uploads/2024/06/28/image10.jpg)
  After the addition of the road from 0 to 4, the length of the shortest path from 0 to 4 is 1.

**Example 2:**

- **Input:** n = 4, queries = [[0,3],[0,2]]
- **Output:** [1,1]
- **Explanation:**
  ![image11](https://assets.leetcode.com/uploads/2024/06/28/image11.jpg)
  After the addition of the road from 0 to 3, the length of the shortest path from 0 to 3 is 1.
  ![image12](https://assets.leetcode.com/uploads/2024/06/28/image12.jpg)
  After the addition of the road from 0 to 2, the length of the shortest path remains 1.



**Constraints:**

- `3 <= n <= 500`
- `1 <= queries.length <= 500`
- `queries[i].length == 2`
- `0 <= queries[i][0] < queries[i][1] < n`
- `1 < queries[i][1] - queries[i][0]`
- There are no repeated roads among the queries.


**Hint:**
1. Maintain the graph and use an efficient shortest path algorithm after each update.
2. We use BFS/Dijkstra for each query.



**Solution:**

We need to simulate adding roads between cities and calculate the shortest path from city `0` to city `n - 1` after each road addition. Given the constraints and the nature of the problem, we can use **Breadth-First Search (BFS)** for unweighted graphs.

### Approach:
1. **Graph Representation:**
   - We can represent the cities and roads using an adjacency list. Initially, each city `i` will have a road to city `i + 1` for all `0 <= i < n - 1`.
   - After each query, we add the road from `u_i` to `v_i` into the graph.

2. **Shortest Path Calculation (BFS):**
   - We can use BFS to calculate the shortest path from city `0` to city `n - 1`. BFS works well here because all roads have equal weight (each road has a length of 1).

3. **Iterating over Queries:**
   - For each query, we will add the new road to the graph and then use BFS to find the shortest path from city `0` to city `n - 1`. After processing each query, we store the result in the output array.

4. **Efficiency:**
   - Since we are using BFS after each query, and the graph size can be at most `500` cities with up to `500` queries, the time complexity for each BFS is `O(n + m)`, where `n` is the number of cities and `m` is the number of roads. We need to perform BFS up to 500 times, so the solution will run efficiently within the problem's constraints.

Let's implement this solution in PHP: **[3243. Shortest Distance After Road Addition Queries I](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003243-shortest-distance-after-road-addition-queries-i/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @param Integer[][] $queries
 * @return Integer[]
 */
function shortestDistanceAfterQueries($n, $queries) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * Function to find the shortest path using BFS
 *
 * @param $graph
 * @param $n
 * @return int
 */
function bfs($graph, $n) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example 1
$n = 5;
$queries = [[2, 4], [0, 2], [0, 4]];
print_r(shortestDistanceAfterQueries($n, $queries));

// Example 2
$n = 4;
$queries = [[0, 3], [0, 2]];
print_r(shortestDistanceAfterQueries($n, $queries));
?>
```

### Explanation:


1. **Graph Initialization:**
   - An adjacency list `graph` is used to represent the cities and roads.
   - Initially, roads exist only between consecutive cities (`i` to `i+1`).

2. **BFS Function:**
   - BFS is used to compute the shortest distance from city `0` to city `n - 1`. We maintain a queue for BFS and an array `distances` to store the minimum number of roads (edges) to reach each city.
   - Initially, the distance to city `0` is set to `0`, and all other cities have a distance of infinity (`PHP_INT_MAX`).
   - As we process each city in the BFS queue, we update the distances for its neighboring cities and continue until all reachable cities are visited.

3. **Query Processing:**
   - For each query, the new road is added to the graph (`u -> v`).
   - BFS is called to calculate the shortest path from city `0` to city `n-1` after the update.
   - The result of BFS is stored in the `result` array.

4. **Output**:
   - The `result` array contains the shortest path lengths after each query.

5. **Time Complexity:**
   - Each BFS takes `O(n + m)`, where `n` is the number of cities and `m` is the number of roads. Since the number of queries is `q`, the overall time complexity is `O(q * (n + m))`, which should be efficient for the given constraints.

### Example Walkthrough:

For the input `n = 5` and `queries = [[2, 4], [0, 2], [0, 4]]`:
- Initially, the roads are `[0 -> 1 -> 2 -> 3 -> 4]`.
- After the first query `[2, 4]`, the roads are `[0 -> 1 -> 2 -> 3 -> 4]` and the shortest path from `0` to `4` is `3` (using the path `0 -> 1 -> 2 -> 4`).
- After the second query `[0, 2]`, the roads are `[0 -> 2, 1 -> 2 -> 3 -> 4]`, and the shortest path from `0` to `4` is `2` (using the path `0 -> 2 -> 4`).
- After the third query `[0, 4]`, the roads are `[0 -> 2, 1 -> 2 -> 3 -> 4]`, and the shortest path from `0` to `4` is `1` (direct road `0 -> 4`).

Thus, the output is `[3, 2, 1]`.

### Final Thoughts:
- The solution uses BFS for each query to efficiently calculate the shortest path.
- The graph is dynamically updated as new roads are added in each query.
- The solution works well within the problem's constraints and efficiently handles up to 500 queries with up to 500 cities.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
