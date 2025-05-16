1462\. Course Schedule IV

**Difficulty:** Medium

**Topics:** `Depth-First Search`, `Breadth-First Search`, `Graph`, `Topological Sort`

There are a total of `numCourses` courses you have to take, labeled from `0` to `numCourses - 1`. You are given an array `prerequisites` where <code>prerequisites[i] = [a<sub>i</sub>, b<sub>i</sub>]</code> indicates that you **must** take course <code>a<sub>i</sub></code> first if you want to take course <code>b<sub>i</sub></code>.

- For example, the pair `[0, 1]` indicates that you have to take course `0` before you can take course `1`.

Prerequisites can also be **indirect**. If course `a` is a prerequisite of course `b`, and course `b` is a prerequisite of course `c`, then course `a` is a prerequisite of course `c`.

You are also given an array `queries` where <code>queries[j] = [u<sub>j</sub>, v<sub>j</sub>]</code>. For the <code>j<sup>th</sup></code> query, you should answer whether course <code>u<sub>j</sub></code> is a prerequisite of course <code>v<sub>j</sub></code> or not.

Return _a boolean array `answer`, where `answer[j]` is the answer to the <code>j<sup>th</sup></code> query_.

**Example 1:**

![courses4-1-graph](https://assets.leetcode.com/uploads/2021/05/01/courses4-1-graph.jpg)

- **Input:** numCourses = 2, prerequisites = [[1,0]], queries = [[0,1],[1,0]]
- **Output:** [false,true]
- **Explanation:** The pair [1, 0] indicates that you have to take course 1 before you can take course 0.
  Course 0 is not a prerequisite of course 1, but the opposite is true.

**Example 2:**

- **Input:** numCourses = 2, prerequisites = [], queries = [[1,0],[0,1]]
- **Output:** [false,false]
- **Explanation:** There are no prerequisites, and each course is independent.


**Example 3:**

![courses4-3-graph](https://assets.leetcode.com/uploads/2021/05/01/courses4-3-graph.jpg)

- **Input:** numCourses = 3, prerequisites = [[1,2],[1,0],[2,0]], queries = [[1,0],[1,2]]
- **Output:** [true,true]



**Constraints:**

- `2 <= numCourses <= 100`
- `0 <= prerequisites.length <= (numCourses * (numCourses - 1) / 2)`
- `prerequisites[i].length == 2`
- <code>0 <= a<sub>i</sub>, b<sub>i</sub> <= numCourses - 1</code>
- <code>a<sub>i</sub> != b<sub>i</sub></code>
- All the pairs <code>[a<sub>i</sub>, b<sub>i</sub>]</code> are unique.
- The prerequisites graph has no cycles.
- <code>1 <= queries.length <= 10<sup>4</sup></code>
- <code>0 <= u<sub>i</sub>, v<sub>i</sub> <= numCourses - 1</code>
- <code>u<sub>i</sub> != v<sub>i</sub></code>


**Hint:**
1. Imagine if the courses are nodes of a graph. We need to build an array isReachable[i][j].
2. Start a bfs from each course i and assign for each course j you visit isReachable[i][j] = True.
3. Answer the queries from the isReachable array.



**Solution:**

We can use a **graph representation** and the **Floyd-Warshall algorithm** to compute whether each course is reachable from another course. This approach will efficiently handle the prerequisite relationships and allow us to answer the queries directly.

Let's implement this solution in PHP: **[1462. Course Schedule IV](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001462-course-schedule-iv/solution.php)**

```php
<?php
/**
 * @param Integer $numCourses
 * @param Integer[][] $prerequisites
 * @param Integer[][] $queries
 * @return Boolean[]
 */
function checkIfPrerequisite($numCourses, $prerequisites, $queries) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:

$numCourses = 2;
$prerequisites = [[1,0]];
$queries = [[0,1],[1,0]];

$result = checkIfPrerequisite($numCourses, $prerequisites, $queries);
print_r($result); // Output: [false,true]

$numCourses = 2;
$prerequisites = [];
$queries = [[1,0],[0,1]]

$result = checkIfPrerequisite($numCourses, $prerequisites, $queries);
print_r($result); // Output: [false,false]

$numCourses = 3;
$prerequisites = [[1, 2], [1, 0], [2, 0]];
$queries = [[1, 0], [1, 2]];

$result = checkIfPrerequisite($numCourses, $prerequisites, $queries);
print_r($result); // Output: [true, true]
?>
```

### Explanation:

1. **Graph Initialization:**
   - The `$isReachable` 2D array is initialized to `false`, representing that no course is reachable from another initially.

2. **Direct Prerequisites:**
   - We populate the `$isReachable` array based on the `prerequisites`. For every prerequisite `[a, b]`, course `a` must be taken before course `b`.

3. **Floyd-Warshall Algorithm:**
   - This algorithm calculates the transitive closure of the graph.
   - For every intermediate course `k`, we check if course `i` is reachable from course `j` through `k`. If yes, we mark `$isReachable[i][j] = true`.

4. **Query Evaluation:**
   - Each query `[u, v]` is answered by simply checking the value of `$isReachable[u][v]`.

### Complexity:
- **Time Complexity:**
   - Floyd-Warshall algorithm: _**O(numCourses<sup>3</sup>)**_
   - Queries: _**O(queries.length)**_
   - Total: _**O(numCourses<sup>3</sup> + queries.length)**_
- **Space Complexity:**
   - The space used by the `$isReachable` array is _**O(numCourses<sup>2</sup>)**_.

### Example Walkthrough:

#### Input:
```php
$numCourses = 3;
$prerequisites = [[1, 2], [1, 0], [2, 0]];
$queries = [[1, 0], [1, 2]];
```

#### Execution:
1. After initializing the graph:
   ```
   $isReachable = [
       [false, false, false],
       [false, false, true],
       [false, false, false]
   ];
   ```

2. After Floyd-Warshall:
   ```
   $isReachable = [
       [false, false, false],
       [true, false, true],
       [true, false, false]
   ];
   ```

3. Answering queries:
   - Query `[1, 0]`: `true`
   - Query `[1, 2]`: `true`

#### Output:
```php
[true, true]
```

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**