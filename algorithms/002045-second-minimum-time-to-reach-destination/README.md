2045\. Second Minimum Time to Reach Destination

Hard

A city is represented as a **bi-directional connected** graph with `n` vertices where each vertex is labeled from `1` to `n` (**inclusive**). The edges in the graph are represented as a 2D integer array `edges`, where each <code>edges[i] = [u<sub>i</sub>, v<sub>i</sub>]</code> denotes a bi-directional edge between vertex <code>u<sub>i</sub></code> and vertex <code>v<sub>i</sub></code>. Every vertex pair is connected by **at most one** edge, and no vertex has an edge to itself. The time taken to traverse any edge is `time` minutes.

Each vertex has a traffic signal which changes its color from **green** to **red** and vice versa every `change` minutes. All signals change **at the same time**. You can enter a vertex at **any time**, but can leave a vertex **only when the signal is green**. You **cannot wait** at a vertex if the signal is **green**.

The **second minimum value** is defined as the smallest value **strictly larger** than the minimum value.

- For example the second minimum value of `[2, 3, 4]` is `3`, and the second minimum value of `[2, 2, 4]` is `4`.

Given `n`, `edges`, `time`, and `change`, return _the **second minimum time** it will take to go from vertex `1` to vertex `n`_.

**Notes:**

- You can go through any vertex **any** number of times, **including** `1` and `n`.
- You can assume that when the journey **starts**, all signals have just turned **green**.

**Example 1:**

![](https://assets.leetcode.com/uploads/2021/09/29/e1.png)
![](https://assets.leetcode.com/uploads/2021/09/29/e2.png)

- **Input:** n = 5, edges = [[1,2],[1,3],[1,4],[3,4],[4,5]], time = 3, change = 5
- **Output:** [7,0,8]
- **Explanation:**\
  The figure on the left shows the given graph.\
  The blue path in the figure on the right is the minimum time path.\
  The time taken is:
  - Start at 1, time elapsed=0
  - 1 -> 4: 3 minutes, time elapsed=3
  - 4 -> 5: 3 minutes, time elapsed=6
    Hence the minimum time needed is 6 minutes.

   The red path shows the path to get the second minimum time.
   - Start at 1, time elapsed=0
   - 1 -> 3: 3 minutes, time elapsed=3
   - 3 -> 4: 3 minutes, time elapsed=6
   - Wait at 4 for 4 minutes, time elapsed=10
   - 4 -> 5: 3 minutes, time elapsed=13\
     Hence the second minimum time is 13 minutes.

**Example 2:**

![](https://assets.leetcode.com/uploads/2021/09/29/eg2.png)

- **Input:** n = 2, edges = [[1,2]], time = 3, change = 2
- **Output:** 11
- **Explanation:**\
  The minimum time path is 1 -> 2 with time = 3 minutes.\
  The second minimum time path is 1 -> 2 -> 1 -> 2 with time = 11 minutes.

**Constraints:**

- <code>2 <= n <= 10<sup>4</sup></code>
- <code>n - 1 <= edges.length <= min(2 * 10<sup>4</sup>, n * (n - 1) / 2)</code>
- <code>edges[i].length == 2</code>
- <code>1 <= u<sub>i</sub>, v<sub>i</sub> <= n</code>
- <code>u<sub>i</sub> != v<sub>i</sub></code>
- There are no duplicate edges.
- Each vertex can be reached directly or indirectly from every other vertex.
- <code>1 <= time, change <= 10<sup>3</sup></code>

**Hint:**
1. How much is change actually necessary while calculating the required path?
2. How many extra edges do we need to add to the shortest path?




**Solution:**


To solve this problem, we can follow these steps:

1. **Model the Graph**: Represent the graph using an adjacency list.
2. **Modified BFS**: Use a BFS-like approach but keep track of the time taken to reach each node. Maintain a queue that stores the current node and the time at which it was reached.
3. **Track Minimum Times**: Use an array to store the minimum and second minimum times to reach each node.
4. **Consider Traffic Signals**: When traversing to the next node, calculate the waiting time if the signal is red at the moment of arrival.


Let's implement this solution in PHP: **[2045. Second Minimum Time to Reach Destination](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002045-second-minimum-time-to-reach-destination/solution.php)**

```php
<?php
// Example usage
$solution = new Solution();
$n = 5;
$edges = [[1, 2], [1, 3], [1, 4], [3, 4], [4, 5]];
$time = 3;
$change = 5;
echo $solution->secondMinimum($n, $edges, $time, $change) . "\n"; // Output: 13

$n = 2;
$edges = [[1, 2]];
$time = 3;
$change = 2;
echo $solution->secondMinimum($n, $edges, $time, $change) . "\n"; // Output: 11

?>
```

### Explanation:

1. **Graph Representation**: We initialize the graph as an adjacency list using a 2D array.
2. **Initialization**:
    - `minTime` array is initialized with PHP's `PHP_INT_MAX` to simulate infinite time.
    - `minTime[1][0]` is set to `0` because the start vertex (1) has a travel time of `0`.
3. **Queue Setup**: We use `SplQueue` for BFS and enqueue the starting node and time.
4. **BFS Traversal**:
    - For each node, compute the wait time if the signal is red.
    - Calculate the `newTime` it would take to move to each neighbor.
    - Update the `minTime` array and enqueue the new state if it's either a new minimum or a second minimum.
5. **Return the Result**: Once the second minimum time to reach node `n` is found, return it.


**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
