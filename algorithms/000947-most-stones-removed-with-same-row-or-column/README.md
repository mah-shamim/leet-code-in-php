947\. Most Stones Removed with Same Row or Column

**Difficulty:** Medium

**Topics:** `Hash Table`, `Depth-First Search`, `Union Find`, `Graph`

On a 2D plane, we place `n` stones at some integer coordinate points. Each coordinate point may have at most one stone.

A stone can be removed if it shares either **the same row or the same column** as another stone that has not been removed.

Given an array `stones` of length n where `stones[i] = [xi, yi]` represents the location of the <code>i<sup>th</sup></code> stone, return _the largest possible number of stones that can be removed_.

**Example 1:**

- **Input:** stones = [[0,0],[0,1],[1,0],[1,2],[2,1],[2,2]]
- **Output:** 5
- **Explanation:** One way to remove 5 stones is as follows:
  1. Remove stone [2,2] because it shares the same row as [2,1].
  2. Remove stone [2,1] because it shares the same column as [0,1].
  3. Remove stone [1,2] because it shares the same row as [1,0].
  4. Remove stone [1,0] because it shares the same column as [0,0].
  5. Remove stone [0,1] because it shares the same row as [0,0].
  6. Stone [0,0] cannot be removed since it does not share a row/column with another stone still on the plane.

**Example 2:**

- **Input:** stones = [[0,0],[0,2],[1,1],[2,0],[2,2]]
- **Output:** 3
- **Explanation:** One way to make 3 moves is as follows:
  1. Remove stone [2,2] because it shares the same row as [2,0].
  2. Remove stone [2,0] because it shares the same column as [0,0].
  3. Remove stone [0,2] because it shares the same row as [0,0].
  4. Stones [0,0] and [1,1] cannot be removed since they do not share a row/column with another stone still on the plane.

**Example 3:**

- **Input:** stones = [[0,0]]
- **Output:** 0
- **Explanation:** [0,0] is the only stone on the plane, so you cannot remove it.

**Constraints:**

- `1 <= stones.length <= 1000`
- <cpde>0 <= x<sub>i</sub>, y<sub>i</sub> <= 10<sup>4</sup></code>
- No two stones are at the same coordinate point.


**Solution:**

We can implement the solution using a Depth-First Search (DFS) approach. The idea is to consider stones that are connected by rows or columns as part of the same connected component. Once you find all connected components, the maximum number of stones that can be removed is the total number of stones minus the number of connected components.

Let's implement this solution in PHP: **[947. Most Stones Removed with Same Row or Column](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000947-most-stones-removed-with-same-row-or-column/solution.php)**

```php
<?php
function removeStones($stones) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

function dfs($stoneIndex, &$stones, &$visited) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
$stones1 = array(
    array(0, 0),
    array(0, 1),
    array(1, 0),
    array(1, 2),
    array(2, 1),
    array(2, 2)
);
echo removeStones($stones1); // Output: 5

$stones2 = array(
    array(0, 0),
    array(0, 2),
    array(1, 1),
    array(2, 0),
    array(2, 2)
);
echo removeStones($stones2); // Output: 3

$stones3 = array(
    array(0, 0)
);
echo removeStones($stones3); // Output: 0
?>
```

### Explanation:

1. **DFS Function**:
   - The `dfs` function is used to explore all stones that are in the same connected component. If a stone is connected (in the same row or column) to the current stone, we recursively perform DFS on that stone.

2. **Main Function**:
   - We iterate over all stones, and for each stone that hasn't been visited, we perform a DFS to mark all stones in the same connected component.
   - We count the number of connected components, and the result is the total number of stones minus the number of connected components (`$n - $numComponents`).

3. **Example Execution**:
   - For the first example, it correctly finds 5 stones can be removed, leaving 1 stone that cannot be removed.

### Complexity:
- **Time Complexity**: O(n^2) due to the nested loops and DFS traversal.
- **Space Complexity**: O(n) for storing visited stones.

This solution should work efficiently within the given constraints.


**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**

