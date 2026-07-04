2492\. Minimum Score of a Path Between Two Cities

**Difficulty:** Medium

**Topics:** `Staff`, `Depth-First Search`, `Breadth-First Search`, `Union-Find`, `Graph Theory`, `Weekly Contest 322`

You are given a positive integer `n` representing `n` cities numbered from `1` to `n`. You are also given a **2D** array `roads` where `roads[i] = [aᵢ, bᵢ, distanceᵢ]` indicates that there is a **bidirectional** road between cities `aᵢ` and `bᵢ` with a distance equal to `distanceᵢ`. The cities graph is not necessarily connected.

The **score** of a path between two cities is defined as the **minimum** distance of a road in this path.

Return _the **minimum** possible score of a path between cities `1` and `n`_.

**Note:**

- A path is a sequence of roads between two cities.
- It is allowed for a path to contain the same road **multiple** times, and you can visit cities `1` and `n` multiple times along the path.
- The test cases are generated such that there is **at least** one path between `1` and `n`.


**Example 1:**

![graph11](https://assets.leetcode.com/uploads/2022/10/12/graph11.png)

- **Input:** n = 4, roads = [[1,2,9],[2,3,6],[2,4,5],[1,4,7]]
- **Output:** 5
- **Explanation:** 
  - The path from city 1 to 4 with the minimum score is: 1 -> 2 -> 4. The score of this path is min(9,5) = 5.
  - It can be shown that no other path has less score.

**Example 2:**

![graph22](https://assets.leetcode.com/uploads/2022/10/12/graph22.png)

- **Input:** n = 4, roads = [[1,2,2],[1,3,4],[3,4,7]]
- **Output:** 2
- **Explanation:** The path from city 1 to 4 with the minimum score is: 1 -> 2 -> 1 -> 3 -> 4. The score of this path is min(2,2,4,7) = 2.

**Example 3:**

- **Input:** n = 3, roads = [[1,2,3],[2,3,1],[1,3,2]]
- **Output:** 1

**Example 4:**

- **Input:** n = 5, roads = [[1,2,10],[2,3,5],[3,4,8],[4,5,3]]
- **Output:** 3

**Example 5:**

- **Input:** n = 6, roads = [[1,2,15],[2,3,12],[3,4,20],[4,6,8],[1,5,6],[5,6,10]]
- **Output:** 6

**Example 6:**

- **Input:** n = 4, roads = [[1,2,5],[2,4,3],[3,1,8]]
- **Output:** 3

**Constraints:**

- `2 <= n <= 10⁵`
- `1 <= roads.length <= 10⁵`
- `roads[i].length == 3`
- `1 <= aᵢ, bᵢ <= n`
- `aᵢ != bᵢ`
- `1 <= distancei <= 10⁴`
- There are no repeated edges.
- There is at least one path between `1` and `n`.


**Hint:**
1. Can you solve the problem if the whole graph is connected?
2. Notice that if the graph is connected, you can always use any edge of the graph in your path.
3. How to solve the general problem in a similar way? Remove all the nodes that are not connected to 1 and n, then apply the previous solution in the new graph.


**Similar Questions:**
1. [1697. Checking Existence of Edge Length Limited Paths](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001697-checking-existence-of-edge-length-limited-paths)
2. [1724. Checking Existence of Edge Length Limited Paths II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001724-checking-existence-of-edge-length-limited-paths-ii)


**Solution:**

We have designed an efficient solution to find the minimum possible score of a path between cities 1 and n. The key insight is that since we can traverse roads multiple times and revisit cities, the minimum score along any path from city 1 to city n is simply the minimum edge weight among all edges that are reachable from city 1 in the connected component containing city 1. This works because we can always detour through any reachable edge and return to our path, effectively including that edge's weight in our path's score.

## Approach

- **Graph Connectivity Insight**: Since we can reuse roads and revisit cities, any edge that is reachable from city 1 can be included in a path from city 1 to city n (as long as city n is also reachable from city 1).
- **DFS Traversal**: We perform a Depth-First Search starting from city 1 to traverse the entire connected component containing city 1.
- **Score Tracking**: While traversing, we track the minimum edge weight encountered in the connected component. This minimum value represents the answer.
- **Reachability Guarantee**: The problem guarantees at least one path exists between city 1 and city n, so city n is in the same connected component as city 1.
- **Edge Case Handling**: The solution works regardless of whether the graph is connected or not, as we only traverse the component containing city 1.

Let's implement this solution in PHP: **[2492. Minimum Score of a Path Between Two Cities](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002492-minimum-score-of-a-path-between-two-cities/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @param Integer[][] $roads
 * @return Integer
 */
function minScore(int $n, array $roads): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo minScore(4, [[1,2,9],[2,3,6],[2,4,5],[1,4,7]]) .  "\n";                                // Output: 5
echo minScore(4, [[1,2,2],[1,3,4],[3,4,7]]) .  "\n";                                        // Output: 2
echo minScore(3, [[1,2,3],[2,3,1],[1,3,2]]) .  "\n";                                        // Output: 1
echo minScore(5, [[1,2,10],[2,3,5],[3,4,8],[4,5,3]]) .  "\n";                               // Output: 3
echo minScore(6, [[1,2,15],[2,3,12],[3,4,20],[4,6,8],[1,5,6],[5,6,10]]) .  "\n";            // Output: 6
echo minScore(4, [[1,2,5],[2,4,3],[3,1,8]]) .  "\n";                                        // Output: 3
```

### Explanation:

- **Why BFS/DFS works**: We use DFS (or BFS) to visit all nodes in the connected component containing city 1. For each edge we traverse, we update our minimum score.
- **Why revisiting edges helps**: The ability to traverse edges multiple times means we can go from city 1 to any reachable edge, traverse it, and return to continue our path to city n. This allows all reachable edges to contribute to the path's minimum score.
- **Example 1 Walkthrough**: In the first example, DFS from node 1 visits nodes 2 and 4, encountering edges with weights 9, 5, and 7. The minimum among reachable edges is 5, which matches the output.
- **Example 3 Walkthrough**: Starting from node 1, we visit nodes 2 and 3, encountering edges [1,2,2], [1,3,4], and [3,4,7]. The minimum is 2. Even though node 2 might seem like a dead end, we can go 1→2→1→3→4, incorporating the edge of weight 2 into our path.
- **Optimization**: We don't need to check both directions of bidirectional edges separately since our adjacency list already accounts for both directions.

## Complexity Analysis

- **Time Complexity**: _**O(n + m)**_, where n is the number of cities and m is the number of roads. Each node is visited at most once, and each edge is processed twice (once from each endpoint).
- **Space Complexity**: _**O(n + m)**_ for storing the adjacency list and _**O(n)**_ for the visited array, resulting in _**O(n + m)**_ total space.
- **Optimality**: The solution is optimal as we must at least read all edges reachable from city 1 to find the minimum, which requires _**O(n + m)**_ time in the worst case.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**