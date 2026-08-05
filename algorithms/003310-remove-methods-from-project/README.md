3310\. Remove Methods From Project

**Difficulty:** Medium

**Topics:** `Staff`, `Depth-First Search`, `Breadth-First Search`, `Graph Theory`, `Weekly Contest 418`

You are maintaining a project that has `n` methods numbered from `0` to `n - 1`.

You are given two integers `n` and `k`, and a 2D integer array `invocations`, where `invocations[i] = [aᵢ, bᵢ]` indicates that method `aᵢ` invokes method `bᵢ`.

There is a known bug in method `k`. Method `k`, along with any method invoked by it, either **directly** or **indirectly**, are considered **suspicious**, and we aim to remove them.

A group of methods can only be removed if no method **outside** the group invokes any methods **within** it.

Return an array containing all the remaining methods after removing all the **suspicious** methods. You may return the answer in _any order_. If it is not possible to remove **all** the suspicious methods, **none** should be removed.

**Example 1:**

- **Input:** n = 4, k = 1, invocations = [[1,2],[0,1],[3,2]]
- **Output:** [0,1,2,3]
- **Explanation:**

  ![graph-2](https://assets.leetcode.com/uploads/2024/07/18/graph-2.png)
  Method 2 and method 1 are suspicious, but they are directly invoked by methods 3 and 0, which are not suspicious. We return all elements without removing anything.

**Example 2:**

- **Input:** n = 5, k = 0, invocations = [[1,2],[0,2],[0,1],[3,4]]
- **Output:** [3,4]
- **Explanation:**

   ![graph-3](https://assets.leetcode.com/uploads/2024/07/18/graph-3.png)
   Methods 0, 1, and 2 are suspicious, and they are not directly invoked by any other method. We can remove them.

**Example 3:**

- **Input:** n = 3, k = 2, invocations = [[1,2],[0,1],[2,0]]
- **Output:** []
- **Explanation:**

   ![graph](https://assets.leetcode.com/uploads/2024/07/20/graph.png)
   All methods are suspicious. We can remove them.

**Example 4:**

- **Input:** n = 3, k = 0, invocations = []
- **Output:** [1,2]

**Example 5:**

- **Input:** n = 2, k = 1, invocations = [[0,1]]
- **Output:** [0,1]

**Example 6:**

- **Input:** n = 6, k = 2, invocations = [[0,1],[2,3],[3,4],[5,5]]
- **Output:** [0,1,5]

**Constraints:**

- `1 <= n <= 10⁵`
- `0 <= k <= n - 1`
- `0 <= invocations.length <= 2 * 10⁵`
- `invocations[i] == [aᵢ, bᵢ]`
- `0 <= aᵢ, bᵢ <= n - 1`
- `aᵢ != bᵢ`
- `invocations[i] != invocations[j]`


**Hint:**

1. Use DFS from node `k`.
2. Mark all the nodes visited from node `k`, and then check if they can be visited from the other nodes.


**Solution:**

We have implemented a solution that identifies and removes suspicious methods (those reachable from the buggy method `k` via direct or indirect invocations) while ensuring that no external method invokes any method within the suspicious group. If such an external invocation exists, we preserve all methods; otherwise, we return only the non-suspicious methods. Our approach uses a breadth-first search to mark suspicious methods and a single pass over the invocation list to validate the removal condition.

## Approach

- **Build adjacency list:** Represent the invocation graph using an adjacency list where each node points to the methods it directly invokes.
- **Identify suspicious methods:** Perform a BFS (or DFS) starting from method `k` to mark all methods reachable from it as suspicious.
- **Validate removal condition:** Iterate through all invocations. If any non-suspicious method invokes a suspicious method, removal is invalid.
- **Return result:** If invalid, return all methods (`0` to `n-1`). Otherwise, return all methods not marked as suspicious.

Let's implement this solution in PHP: **[3310. Remove Methods From Project](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003310-remove-methods-from-project/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @param Integer $k
 * @param Integer[][] $invocations
 * @return Integer[]
 */
function remainingMethods(int $n, int $k, array $invocations): array
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo remainingMethods(4, 1, [[1,2],[0,1],[3,2]]) .  "\n";               // Output: [0,1,2,3]
echo remainingMethods(5, 0, [[1,2],[0,2],[0,1],[3,4]]) .  "\n";         // Output: [3,4]
echo remainingMethods(3, 2, [[1,2],[0,1],[2,0]]) .  "\n";               // Output: []
echo remainingMethods(3, 0, []) .  "\n";                                // Output: [1,2]
echo remainingMethods(2, 1, [[0,1]]) .  "\n";                           // Output: [0,1]
echo remainingMethods(6, 2, [[0,1],[2,3],[3,4],[5,5]]) .  "\n";         // Output: [0,1,5]
?>
```

### Explanation:

- **Graph construction:** We create an array of lists where `graph[a]` contains all `b` such that `a` invokes `b`. This allows efficient traversal from any method.
- **Suspicious marking via BFS:** Starting from `k`, we traverse all reachable nodes using a queue. Every visited node is marked `true` in the `suspicious` array. This captures the exact set of methods that are bug-affected.
- **Removal condition check:** We examine every invocation `[a, b]`.
   - If `a` is **not** suspicious but `b` **is** suspicious, then an external method invokes a suspicious one.
   - According to the problem, such a scenario prevents us from removing the suspicious group, so we return all methods unchanged.
- **Result construction:** When removal is permissible, we iterate through all `n` methods and collect those that are not suspicious. These are the methods that remain after removal.
- **Edge cases handled:**
   - No invocations → BFS only visits `k`, and if no external invokes `k`, all other methods remain.
   - All methods suspicious → result will be empty (valid removal).
   - Methods with cycles → BFS handles cycles using the visited check.

## Complexity Analysis

- **Time Complexity:** `O(n + m)`
   - Building adjacency list: `O(m)` where `m = invocations.length`.
   - BFS traversal: `O(n + m)` in the worst case (visits all nodes and edges).
   - Validation pass: `O(m)`.
   - Overall linear with respect to the input size.

- **Space Complexity:** `O(n + m)`
   - Adjacency list stores all edges: `O(m)`.
   - `suspicious` array and queue store up to `n` elements: `O(n)`.
   - Result array stores up to `n` elements: `O(n)`.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**