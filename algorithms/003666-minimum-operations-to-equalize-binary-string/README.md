3666\. Minimum Operations to Equalize Binary String

**Difficulty:** Hard

**Topics:** `Senior Staff`, `Math`, `String`, `Breadth-First Search`, `Union-Find`, `Ordered Set`, `Biweekly Contest 164`

You are given a binary string `s`, and an integer `k`.

In one operation, you must choose **exactly** `k` **different** indices and **flip** each `'0'` to `'1'` and each `'1'` to `'0'`.

Return the **minimum** number of operations required to make all characters in the string equal to `'1'`. If it is not possible, return `-1`.

**Example 1:**

- **Input:** s = "110", k = 1
- **Output:** 1
- **Explanation:**
  - There is one `'0'` in `s`.
  - Since `k = 1`, we can flip it directly in one operation.


**Example 2:**

- **Input:** s = "0101", k = 3
- **Output:** 2
- **Explanation:**
   - One optimal set of operations choosing `k = 3` indices in each operation is:
     - Operation 1: Flip indices `[0, 1, 3]`. `s` changes from `"0101"` to `"1000"`.
     - Operation 2: Flip indices `[1, 2, 3]`. `s` changes from `"1000"` to `"1111"`.
   - Thus, the minimum number of operations is 2.

**Example 3:**

- **Input:** s = "101", k = 2
- **Output:** -1
- **Explanation:** Since `k = 2` and `s` has only one `'0'`, it is impossible to flip exactly `k` indices to make all `'1'`. Hence, the answer is `-1`.

**Constraints:**

- `1 <= s.length <= 10⁵`
- `s[i]` is either `'0'` or `'1'`.
- `1 <= k <= s.length`


**Hint:**
1. Model state as `z` = number of zeros; flipping `k` picks `i` zeros (`i` between `max(0, k - (n - z))` and `min(k, z)`) and transforms `z` to `z'` = `z + k - 2 * i`, so `z'` lies in a contiguous range and has parity `(z + k) % 2`.
2. Build a graph on states `0..n` and run `BFS` from initial `z` to reach `0`; each edge from `z` goes to all `z'` in that computed interval.
3. For speed, keep two ordered sets of unvisited states by parity and erase ranges with `lower_bound` while `BFSing` to achieve near `O(n log n)` time.






**Solution:**

The problem asks for the minimum number of operations to turn all characters of a binary string `s` into `'1'`. In each operation we must flip exactly `k` distinct indices (`0` ↔ `1`). The solution models the state as the number of zeros (`z`) in the string. Flipping `k` indices transforms `z` to `z' = z + k - 2i`, where `i` is the number of zeros among the chosen indices. This yields a contiguous range of possible new zero counts with the same parity as `z + k`. A BFS on the graph of zero counts (vertices `0..n`) finds the shortest path to `0`. To handle the potentially large number of transitions efficiently, two union‑find structures (for even and odd states) are used to skip already visited nodes and iterate only over unvisited states in each range. The BFS runs in near‑linear time.

### Approach:

- **State representation**: Let `z` be the number of zeros in the current string. The goal is to reach `z = 0`.
- **Transition formula**: From a state `z`, after flipping exactly `k` indices, the new zero count becomes `z' = z + k - 2i`, where `i` is the number of zeros flipped.
   - `i` must satisfy: `max(0, k - (n - z)) ≤ i ≤ min(k, z)`.
   - Consequently, `z'` takes all values in the interval `[z_min, z_max]` that have parity `(z + k) % 2`, where  
     `z_min = z + k - 2·min(k, z)` and `z_max = z + k - 2·max(0, k - (n - z))`.
- **Graph BFS**: The vertices are integers from `0` to `n` (number of zeros possible). Edges connect `z` to every `z'` in the above interval with the required parity. BFS finds the minimum steps to `0`.
- **Efficient traversal**: Because the graph is dense, we cannot explicitly list all edges. Instead, we maintain two disjoint‑set (union‑find) structures – one for even states, one for odd states – that allow us to quickly obtain the next unvisited vertex in a given range. Once a vertex is visited, it is removed from its parity set.
- **Result**: The BFS level when we first reach `0` is the answer; if `0` is never reached, return `-1`.

Let's implement this solution in PHP: **[3666. Minimum Operations to Equalize Binary String](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003666-minimum-operations-to-equalize-binary-string/solution.php)**

```php
<?php
/**
 * @param String $s
 * @param Integer $k
 * @return Integer
 */
function minOperations(string $s, int $k): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo minFlips("110", 1) . "\n";   // Output: 1
echo minFlips("0101", 3) . "\n";  // Output: 2
echo minFlips("101", 2) . "\n";   // Output: -1
?>
```

### Explanation:

1. **Count zeros**  
   Iterate through the string and count how many `'0'` are present. If the count is already zero, return `0` immediately.

2. **Initialize disjoint‑set structures**  
   Create two arrays (or dictionaries) `parentEven` and `parentOdd` for indices `0..n`.
   - For every even index `e` (0,2,4,…) set `parentEven[e] = e`.
   - For every odd index `o` (1,3,5,…) set `parentOdd[o] = o`.  
     These arrays will be used to find the next unvisited state of a given parity.

3. **Mark the initial state**  
   The starting zero count `z0` is removed from its parity set by setting its parent to the next unvisited index of the same parity (using a helper function that skips visited ones). Mark `z0` as visited and push it into the BFS queue.

4. **BFS loop**  
   While the queue is not empty, process all nodes at the current level:
   - Pop a state `z`. If `z == 0`, return the current level.
   - Compute:
      - `ones = n - z`
      - `i_min = max(0, k - ones)`
      - `i_max = min(k, z)`
      - `z_min = z + k - 2 * i_max`
      - `z_max = z + k - 2 * i_min`
      - `parity = (z + k) % 2`
   - Based on `parity`, select the appropriate DSU (`parentEven` for parity 0, `parentOdd` for parity 1).
   - Use a `findNext` function (which follows parent pointers) to get the first unvisited index ≥ `z_min` of that parity.
   - While that index exists and is ≤ `z_max`:
      - Mark it visited, enqueue it, and remove it from the DSU by linking its parent to the next unvisited index after it (again found by `findNext`).
      - Move to the next unvisited index.
   - After processing all neighbors of this level, increment the level counter.

5. **Final answer** 
   If the queue empties without reaching `0`, return `-1`.

### Complexity
- **Time Complexity**: Each vertex `(0..n)` is inserted into the queue and removed from its DSU exactly once. The `find` and union operations are nearly constant due to path compression (inverse Ackermann). The total time is **O(n α(n))**, effectively **O(n log n)** because of the ordered‑set‑like behavior.
- **Space Complexity**: We store two parent arrays of size about `n/2` each, a queue, and a visited array – **O(n)**.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**