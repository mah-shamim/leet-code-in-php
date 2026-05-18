1345\. Jump Game IV

**Difficulty:** Hard

**Topics:** `Senior Staff`, `Array`, `Hash Table`, `Breadth-First Search`, `Biweekly Contest 19`

Given an array of integers `arr`, you are initially positioned at the first index of the array.

In one step you can jump from index `i` to index:

- `i + 1` where: `i + 1 < arr.length`.
- `i - 1` where: `i - 1 >= 0`.
- `j` where: `arr[i] == arr[j]` and `i != j`.

Return _the minimum number of steps_ to reach the **last index** of the array.

Notice that you can not jump outside of the array at any time.

**Example 1:**

- **Input:** arr = [100,-23,-23,404,100,23,23,23,3,404]
- **Output:** 3
- **Explanation:** You need three jumps from index `0 --> 4 --> 3 --> 9`. Note that index `9` is the last index of the array.

**Example 2:**

- **Input:** arr = [7]
- **Output:** 0
- **Explanation:** Start index is the last index. You do not need to jump.

**Example 3:**

- **Input:** arr = [7,6,9,6,9,6,9,7]
- **Output:** 1
- **Explanation:** You can jump directly from index 0 to index 7 which is last index of the array.

**Example 4:**

- **Input:** arr = [1,2,3,4,5,6,7,8,9,1]
- **Output:** 1

**Example 5:**

- **Input:** arr = [1,2,3,4,5]
- **Output:** 4

**Constraints:**

- `1 <= arr.length <= 5 * 10⁴`
- `-108 <= arr[i] <= 10⁸`



**Hint:**
1. Build a graph of n nodes where nodes are the indices of the array and edges for node `i` are nodes `i+1`, `i-1`, `j` where `arr[i] == arr[j]`.
2. Start bfs from node `0` and keep distance. The answer is the distance when you reach node `n-1`.



**Similar Questions:**
1. [1871. Jump Game VII](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001871-jump-game-vi)
2. [2297. Jump Game VIII](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002297-jump-game-viii)
3. [2770. Maximum Number of Jumps to Reach the Last Index](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002770-maximum-number-of-jumps-to-reach-the-last-index)






**Solution:**

The solution treats the problem as a shortest-path search in an unweighted graph, where nodes are array indices and edges represent allowed jumps.  
By using **Breadth-First Search (BFS)** and a value-to-indices hash map, it efficiently explores neighbors while avoiding redundant processing of same-valued indices.  
The BFS guarantees the minimal number of steps to reach the last index.

### Approach:

- **Graph interpretation** — Each index is a node, edges are `i+1`, `i-1`, and all indices with the same value `arr[i]`.
- **BFS for shortest path** — Since all jumps cost 1 step, BFS naturally finds the minimum steps.
- **Value grouping** — Use a hash map to quickly find all indices with the same value, enabling same-value jumps.
- **Visited tracking** — Prevent re-processing indices to avoid cycles and infinite loops.
- **Early exit** — Stop BFS as soon as the last index is reached.

Let's implement this solution in PHP: **[1345. Jump Game IV](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001345-jump-game-iv/solution.php)**

```php
<?php
/**
 * @param Integer[] $arr
 * @return Integer
 */
function minJumps(array $arr): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo minJumps([100,-23,-23,404,100,23,23,23,3,404]) . "\n";         // Output: 3
echo minJumps([7]) . "\n";                                          // Output: 0
echo minJumps([7,6,9,6,9,6,9,7]) . "\n";                            // Output: 1
echo minJumps([1,2,3,4,5,6,7,8,9,1]) . "\n";                        // Output: 1
echo minJumps([1,2,3,4,5]) . "\n";                                  // Output: 4
?>
```

### Explanation:

- **Edge case** — If array has one element, return 0 immediately.
- **Build value-to-indices mapping** — Group indices by their array values to enable fast same-value jumps.
- **BFS initialization** — Start from index 0 with distance 0, mark visited.
- **Process each index in queue**:
   - Check left neighbor (`i-1`), add if valid and unvisited.
   - Check right neighbor (`i+1`), add if valid and unvisited.
   - Check all same-value indices, add if unvisited.
- **Optimization** — After visiting all same-value indices for a given value, delete that entry from the map to avoid revisiting them through other same-valued nodes (crucial for performance).
- **Return** — When reaching `n-1`, return current distance + 1.

### Complexity
- **Time Complexity**:
   - Building the map: `O(n)`
   - BFS traversal: Each index enqueued once, each neighbor check is `O(1)` amortized (due to deletion of same-value groups).
   - **Total:** `O(n)`
- **Space Complexity**:
   - Hash map storing indices by value: `O(n)` in worst case.
   - Visited array: `O(n)`
   - Queue: `O(n)`
   - **Total:** `O(n)`

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**