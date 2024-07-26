1334\. Find the City With the Smallest Number of Neighbors at a Threshold Distance

Medium

There are `n` cities numbered from `0` to `n-1`. Given the array `edges` where <code>edges[i] = [from<sub>i</sub>, to<sub>i</sub>, weight<sub>i</sub>]</code> represents a bidirectional and weighted edge between cities <code>from<sub>i</sub></code> and <code>to<sub>i</sub></code>, and given the integer `distanceThreshold`.

Return the city with the smallest number of cities that are reachable through some path and whose distance is **at most** `distanceThreshold`, If there are multiple such cities, return the city with the greatest number.

Notice that the distance of a path connecting cities **_i_** and **_j_** is equal to the sum of the edges' weights along that path.

**Example 1:**

![](https://assets.leetcode.com/uploads/2020/01/16/find_the_city_01.png)

- **Input:** n = 4, edges = [[0,1,3],[1,2,1],[1,3,4],[2,3,1]], distanceThreshold = 4
- **Output:** 3
- **Explanation:** The figure above describes the graph.\
  The neighboring cities at a distanceThreshold = 4 for each city are:\
  City 0 -> [City 1, City 2]\
  City 1 -> [City 0, City 2, City 3]\
  City 2 -> [City 0, City 1, City 3]\
  City 3 -> [City 1, City 2]\
  Cities 0 and 3 have 2 neighboring cities at a distanceThreshold = 4, but we have to return city 3 since it has the greatest number.

**Example 2:**

![](https://assets.leetcode.com/uploads/2020/01/16/find_the_city_02.png)

- **Input:** n = 5, edges = [[0,1,2],[0,4,8],[1,2,3],[1,4,2],[2,3,1],[3,4,1]], distanceThreshold = 2
- **Output:** 0
- **Explanation:** The figure above describes the graph.\
  The neighboring cities at a distanceThreshold = 2 for each city are:\
  City 0 -> [City 1]\
  City 1 -> [City 0, City 4]\
  City 2 -> [City 3, City 4]\
  City 3 -> [City 2, City 4]\
  City 4 -> [City 1, City 2, City 3]\
  The city 0 has 1 neighboring city at a distanceThreshold = 2.

**Constraints:**

- <code>2 <= n <= 100</code>
- <code>1 <= edges.length <= n * (n - 1) / 2</code>
- <code>edges[i].length == 3</code>
- <code>0 <= from<sub>i</sub> < to<sub>i</sub> < n</code>
- <code>1 <= weight<sub>i</sub>, distanceThreshold <= 10^4</code>
- All pairs <code>(from<sub>i</sub>, to<sub>i</sub>)</code> are distinct.


**Hint:**
1. Use Floyd-Warshall's algorithm to compute any-point to any-point distances. (Or can also do Dijkstra from every node due to the weights are non-negative).
2. For each city calculate the number of reachable cities within the threshold, then search for the optimal city.


**Solution:**


To solve this problem, we can follow these steps:

1. **Initialize the Distance Matrix:** Create a distance matrix `dist` where `dist[i][j]` represents the shortest distance between city `i` and city `j`. Initialize the matrix with `INF` (a large number representing infinity) and set `dist[i][i]` to 0 for all `i`.

2. **Populate the Distance Matrix with Given Edges:** Set the distances based on the given `edges`.

3. **Floyd-Warshall Algorithm:** Update the distance matrix using the Floyd-Warshall algorithm to find the shortest paths between all pairs of cities.

4. **Calculate Reachable Cities:** For each city, count the number of cities that can be reached within the `distanceThreshold`.

5. **Find the Desired City:** Identify the city with the smallest number of reachable cities. If there are multiple such cities, return the one with the greatest number.


Let's implement this solution in PHP: **[1334. Find the City With the Smallest Number of Neighbors at a Threshold Distance](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001334-find-the-city-with-the-smallest-number-of-neighbors-at-a-threshold-distance/solution.php)**

```php
<?php
// Example usage:
$n1 = 4;
$edges1 = [[0,1,3],[1,2,1],[1,3,4],[2,3,1]];
$distanceThreshold1 = 4;
echo findTheCity($n1, $edges1, $distanceThreshold1); // Output: 3

$n2 = 5;
$edges2 = [[0,1,2],[0,4,8],[1,2,3],[1,4,2],[2,3,1],[3,4,1]];
$distanceThreshold2 = 2;
echo findTheCity($n2, $edges2, $distanceThreshold2); // Output: 0

?>
```

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
