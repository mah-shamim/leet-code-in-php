3970\. Shortest Path With At Most K Consecutive Identical Characters

**Difficulty:** Medium

**Topics:** `Staff`, `String`, `Graph Theory`, `Heap (Priority Queue)`, `Shortest Path`, `Weekly Contest 507`

You are given an integer `n` representing the number of nodes in a **directed weighted** graph, numbered from 0 to `n - 1`. This is represented by a 2D integer array `edges`, where `edges[i] = [uᵢ, vᵢ, wᵢ]` represents a directed edge from node `uᵢ` to node `vᵢ` with weight `wᵢ`.

You are also given a string `labels` of length `n`, where `labels[i]` is the character assigned to node `i`, and an integer `k`.

Return the **minimum total** edge weight of a path from node 0 to node `n - 1` such that the concatenation of the labels of the nodes along the path contains **at most** `k` **consecutive identical** characters. If no valid path exists, return -1.

**Example 1:**

- **Input:** n = 3, edges = [[0,1,1],[1,2,1],[0,2,3]], labels = "aab", k = 1
- **Output:** 3
- **Explanation:**
  - The optimal valid path from node 0 to node 2 is as follows:
     - Use `edges[2] = [0, 2, 3]` to reach node 2 with a weight `wᵢ = 3`.
  - The corresponding concatenation of labels is `"ab"`, which satisfies at most `k = 1` consecutive identical characters. Thus, the answer is 3.

**Example 2:**

- **Input:** n = 3, edges = [[0,1,1],[1,2,1],[0,2,3]], labels = "aab", k = 2
- **Output:** 2
- **Explanation:**
  - The optimal valid path from node 0 to node 2 is as follows:
     - Use `edges[0] = [0, 1, 1]` to reach node 1 with weight `wᵢ = 1`.
     - Use `edges[1] = [1, 2, 1]` to reach node 2 with weight `wᵢ = 1`.
  - The corresponding concatenation of labels is `"aab"`, which satisfies at most `k = 2` consecutive identical characters. Thus, the answer is 2.

**Example 3:**

- **Input:** n = 3, edges = [[0,1,1],[1,2,1]], labels = "aaa", k = 2
- **Output:** -1
- **Explanation:** There is no valid path from node 0 to node 2 that satisfies at most `k = 2` consecutive identical characters. Thus, the answer is -1.
  **Example 4:**

- **Input:** n = 1, edges = [], labels = "a", k = 1
- **Output:** 0

**Example 5:**

- **Input:** n = 2, edges = [[0,1,5]], labels = "ab", k = 1
- **Output:** 5

**Example 6:**

- **Input:** n = 2, edges = [[0,1,5]], labels = "aa", k = 1
- **Output:** -1

**Example 7:**

- **Input:** n = 2, edges = [[0,1,5]], labels = "aa", k = 2
- **Output:** 5

**Example 8:**

- **Input:** n = 4, edges = [[0,1,1],[1,2,1],[2,3,1],[0,3,10]], labels = "aabb", k = 2
- **Output:** 3

**Example 9:**

- **Input:** n = 4, edges = [[0,1,1],[1,2,1],[2,3,1],[0,3,10]], labels = "aaab", k = 2
- **Output:** 10

**Example 10:**

- **Input:** n = 3, edges = [[0,1,1]], labels = "abc", k = 1
- **Output:** -1

**Example 11:**

- **Input:** n = 5, edges = [[0,1,1],[1,2,1],[2,3,1],[3,4,1]], labels = "aaaaa", k = 5
- **Output:** 4

**Example 12:**

- **Input:** n = 5, edges = [[0,1,1],[1,2,1],[2,3,1],[3,4,1]], labels = "aaaaa", k = 4
- **Output:** -1

**Example 13:**

- **Input:** n = 3, edges = [[0,1,2],[1,2,2],[0,2,5]], labels = "aba", k = 1
- **Output:** 4

**Example 14:**

- **Input:** n = 6, edges = [[0,1,1],[1,2,1],[2,5,1],[0,3,1],[3,4,1],[4,5,1]], labels = "aaabbb", k = 3
- **Output:** 3

**Example 15:**

- **Input:** n = 6, edges = [[0,1,1],[1,2,1],[2,5,1],[0,3,1],[3,4,1],[4,5,1]], labels = "aaaaaa", k = 3
- **Output:** -1

**Example 16:**

- **Input:** n = 3, edges = [[0,1,100],[1,2,1],[0,2,50]], labels = "abc", k = 50
- **Output:** 50

**Example 17:**

- **Input:** n = 2, edges = [[0,1,10000]], labels = "aa", k = 50
- **Output:** 10000

**Constraints:**

- `1 <= n == labels.length <= 5 * 10⁴`
- `0 <= edges.length <= 5 * 10⁴`
- `edges[i] == [uᵢ, vᵢ, wᵢ]`
- `0 <= uᵢ, vᵢ <= n - 1`
- `uᵢ != vᵢ`
- `1 <= wᵢ <= 10⁴`
- `labels` consists of lowercase English letters
- `1 <= k <= 50`


**Hint:**

1. The validity of a path depends not only on the current node, but also on how many consecutive times the current node’s label has appeared at the end of the path.
2. Use Dijkstra on states `(node, count)`, where `count` is the current consecutive run length of `labels[node]`.
3. When moving from node `u` to node `v`, the next count becomes `count + 1` if `labels[u] == labels[v]`, otherwise it becomes 1. Ignore transitions where the next count exceeds `k`.
4. The answer is the minimum distance among all states ending at node `n - 1`.


**Solution:**

We solve this problem by modeling it as a **shortest path on an expanded state graph** and applying **Dijkstra's algorithm**. Since a node alone is not enough to determine validity (we also need to know how many identical characters are currently at the end of the path), we expand each node into `k` states `(node, consecutiveCount)` where `consecutiveCount ∈ [1, k]` represents the current run-length of the label of `node`. We encode the state as a single integer `node * k + (count - 1)` to keep storage compact, then run Dijkstra starting from `(0, 1)` with distance 0. When relaxing an edge `u → v`, the new run-length becomes `count + 1` if `labels[u] == labels[v]` (invalid if it exceeds `k`), otherwise it resets to `1`. As soon as we pop a state whose node is `n - 1` from the min-heap, its distance is the optimal answer.

## Approach

- **State expansion:** Instead of tracking only the current node, track `(node, runLength)` where `runLength` is the number of consecutive trailing characters equal to `labels[node]`.
- **State encoding:** `state = node * k + (runLength - 1)`, giving `n * k ≤ 5·10⁴ · 50 = 2.5·10⁶` states.
- **Dijkstra initialization:** Distance array of size `n * k` set to `INF`; the start state `(0, 1)` has distance `0`. Push `(state=0, dist=0)` into the min-heap.
- **Relaxation rule:** For an edge `u → v` with weight `w`:
  - If `labels[v] == labels[u]`, `nextRun = run + 1`; skip if `nextRun > k`.
  - Otherwise `nextRun = 1`.
  - Candidate `nextDist = d + w`; relax if smaller than `dist[nextState]`.
- **Early termination:** Because Dijkstra pops states in non-decreasing distance order, the first time we pop a state where `node == n - 1`, that distance is optimal — return it immediately.
- **Custom binary min-heap:** Implemented with two `SplFixedArray`s (`heapState`, `heapDist`) sized `k · |edges| + 2` for performance and memory efficiency in PHP.
- **Stale entry handling:** Skip popped entries whose recorded distance no longer matches `dist[state]` (lazy deletion).
- **Failure case:** If the heap empties before reaching node `n - 1`, return `-1`.

Let's implement this solution in PHP: **[3970. Shortest Path With At Most K Consecutive Identical Characters](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003970-shortest-path-with-at-most-k-consecutive-identical-characters/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @param Integer[][] $edges
 * @param String $labels
 * @param Integer $k
 * @return Integer
 */
function shortestPath(int $n, array $edges, string $labels, int $k): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo shortestPath(3, [[0,1,1],[1,2,1],[0,2,3]], "aab", 1) . "\n";                                // Output: 3
echo shortestPath(3, [[0,1,1],[1,2,1],[0,2,3]], "aab", 2) . "\n";                                // Output: 2
echo shortestPath(3, [[0,1,1],[1,2,1]], "aaa", 2) . "\n";                                        // Output: -1
echo shortestPath(1, [], "a", 1) . "\n";                                                         // Output: 0
echo shortestPath(2, [[0,1,5]], "ab", 1) . "\n";                                                 // Output: 5
echo shortestPath(2, [[0,1,5]], "aa", 1) . "\n";                                                 // Output: -1
echo shortestPath(2, [[0,1,5]], "aa", 2) . "\n";                                                 // Output: 5
echo shortestPath(4, [[0,1,1],[1,2,1],[2,3,1],[0,3,10]], "aabb", 2) . "\n";                      // Output: 3
echo shortestPath(4, [[0,1,1],[1,2,1],[2,3,1],[0,3,10]], "aaab", 2) . "\n";                      // Output: 10
echo shortestPath(3, [[0,1,1]], "abc", 1) . "\n";                                                // Output: -1
echo shortestPath(5, [[0,1,1],[1,2,1],[2,3,1],[3,4,1]], "aaaaa", 5) . "\n";                      // Output: 4
echo shortestPath(5, [[0,1,1],[1,2,1],[2,3,1],[3,4,1]], "aaaaa", 4) . "\n";                      // Output: -1
echo shortestPath(3, [[0,1,2],[1,2,2],[0,2,5]], "aba", 1) . "\n";                                // Output: 4
echo shortestPath(6, [[0,1,1],[1,2,1],[2,5,1],[0,3,1],[3,4,1],[4,5,1]], "aaabbb", 3) . "\n";     // Output: 3
echo shortestPath(6, [[0,1,1],[1,2,1],[2,5,1],[0,3,1],[3,4,1],[4,5,1]], "aaaaaa", 3) . "\n";     // Output: -1
echo shortestPath(3, [[0,1,100],[1,2,1],[0,2,50]], "abc", 50) . "\n";                            // Output: 50
echo shortestPath(2, [[0,1,10000]], "aa", 50) . "\n";                                            // Output: 10000
?>
```

## Explanation
- **Why state matters:** The same node can be reached with different trailing run-lengths, and future validity depends on the run-length. Collapsing these into one distance would be incorrect, so we keep a distance per `(node, run)` pair.
- **Why Dijkstra works:** All edge weights are positive (`1 ≤ wᵢ`), so the greedy "pop smallest, finalize" property holds for the expanded state graph.
- **Run-length transition correctness:**
  - If the next label is the same as the previous node's label, the run continues; exceeding `k` prunes the transition (this is how Example 3 returns `-1` for `"aaa"` with `k = 2`).
  - Otherwise, the run resets to `1` (only counting the new node's label).
- **Starting run-length is 1, not 0:** The path includes node 0's own label, so a single-node path has a run of 1. This makes the edge case `n = 1` return `0` correctly (start state is already `n - 1`).
- **Example walkthrough (Example 2):** Start `(0, 'a', run=1)` at dist 0 → relax `0→1` (labels `a,a`, run=2, dist=1) → relax `1→2` (labels `a,b`, run=1, dist=2). Pop `(2, 1)`, which is `n - 1`, return 2.
- **Example walkthrough (Example 3):** Start `(0, 'a', run=1)` → `0→1` (labels `a,a`, run=2, dist=1) → `1→2` requires run=3 > k=2, pruned. Heap empties → return `-1`.

## Complexity Analysis

- Let `N = n`, `E = |edges|`, and `K = k`.
- **Number of states:** `S = N · K`.
- **Number of transitions:** Each edge can be relaxed once per state reachable at `u`, so at most `K · E` relaxations.
- **Time Complexity:** `O((N·K + E·K) · log(N·K)) = O(K · (N + E) · log(N·K))`.
  - With constraints: `~ 50 · (5·10⁴ + 5·10⁴) · log(2.5·10⁶) ≈ 5·10⁶ · 21 ≈ 10⁸` operations in the worst case, well within limits with the custom heap.
- **Space Complexity:** 
  - `dist` array: `O(N·K)`.
  - Heap: `O(K·E)` worst-case entries → `O(K·E)`.
  - Adjacency list: `O(N + E)`.
  - **Total:** `O(N·K + K·E)`.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**