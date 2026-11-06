2747\. Count Zero Request Servers

**Difficulty:** Medium

**Topics:** `Staff`, `Array`, `Hash Table`, `Sliding Window`, `Sorting`, `Biweekly Contest 107`

You are given an integer `n` denoting the total number of servers and a **2D 0-indexed** integer array `logs`, where `logs[i] = [server_id, time]` denotes that the server with id `server_id` received a request at time `time`.

You are also given an integer `x` and a **0-indexed** integer array `queries`.

Return _a **0-indexed** integer array `arr` of length `queries.length` where `arr[i]` represents the number of servers that **did not receive** any requests during the time interval `[queries[i] - x, queries[i]]`_.

**Note** that the time intervals are inclusive.

**Example 1:**

- **Input:** n = 3, logs = [[1,3],[2,6],[1,5]], x = 5, queries = [10,11]
- **Output:** [1,2]
- **Explanation:**  
  - **For `queries[0]`:** The servers with ids 1 and 2 get requests in the duration of `[5, 10]`. Hence, only server 3 gets zero requests.
  - **For `queries[1]`:** Only the server with id 2 gets a request in duration of `[6,11]`. Hence, the servers with ids 1 and 3 are the only servers that do not receive any requests during that time period.

**Example 2:**

- **Input:** n = 3, logs = [[2,4],[2,1],[1,2],[3,1]], x = 2, queries = [3,4]
- **Output:** [0,1]
- **Explanation:**  
  - **For `queries[0]`:** All servers get at least one request in the duration of `[1, 3]`.
  - **For `queries[1]`:** Only server with id 3 gets no request in the duration `[2,4]`.
    **Example 3:**

- **Input:** n = 1, logs = [[1,1]], x = 1, queries = [2]
- **Output:** [0]

**Example 4:**

- **Input:** n = 1, logs = [[1,1]], x = 1, queries = [100]
- **Output:** [1]

**Example 5:**

- **Input:** n = 4, logs = [[1,10]], x = 5, queries = [10]
- **Output:** [3]

**Example 6:**

- **Input:** n = 3, logs = [[1,1],[2,2],[3,3]], x = 10, queries = [100]
- **Output:** [3]

**Example 7:**

- **Input:** n = 3, logs = [[1,1],[2,2],[3,3]], x = 1, queries = [1,2,3]
- **Output:** [2,1,1]

**Example 8:**

- **Input:** n = 5, logs = [[1,5],[1,5],[2,5]], x = 3, queries = [5]
- **Output:** [3]

**Example 9:**

- **Input:** n = 2, logs = [[1,1],[2,2]], x = 5, queries = [1,2,3,4,5]
- **Output:** [1,0,0,0,0]

**Example 10:**

- **Input:** n = 3, logs = [[1,1],[2,1],[3,1]], x = 2, queries = [1,2,3,4]
- **Output:** [0,0,0,3]

**Example 11:**

- **Input:** n = 10, logs = [[1,1],[1,1000000]], x = 1, queries = [1,1000000]
- **Output:** [9,9]

**Example 12:**

- **Input:** n = 100000, logs = [[i,i] for i in 1..100000], x = 1, queries = [1,2,...,100000]
- **Output:** [99999, 99998, 99998, ..., 99998]

**Constraints:**

- `1 <= n <= 10⁵`
- `1 <= logs.length <= 10⁵`
- `1 <= queries.length <= 10⁵`
- `logs[i].length == 2`
- `1 <= logs[i][0] <= n`
- `1 <= logs[i][1] <= 10⁶`
- `1 <= x <= 10⁵`
- `x < queries[i] <= 10⁶`


**Hint:**

1. Can we use sorting and two-pointer approach here?
2. Sort the queries array and logs array based on time in increasing order.
3. For every window of size x, use sliding window and two-pointer approach to find the answer to the queries.


**Solution:**

We solve this problem by using a **sliding window with sorting and two-pointer technique**. Since queries may arrive out of order, we first sort both the logs and queries by time. For each query in ascending order, we maintain a sliding window `[query - x, query]` that contains only those log entries whose timestamps fall within this range. A frequency map (`freq`) tracks how many requests each server has within the window, and `activeServers` counts the number of distinct servers that have received at least one request in the window. The answer for each query is `n - activeServers` (total servers minus active servers). Because the window moves monotonically forward with sorted queries, each log entry is added once and removed once, giving near-linear performance.

## Approach

- **Sort the logs by time** — so we can process them in chronological order as the window moves forward.
- **Sort the queries by value while keeping original indices** — because the window must expand/shrink monotonically; we store `[queryValue, originalIndex]` pairs.
- **Use two pointers `left` and `right` over the sorted logs**:
  - `right` pointer adds logs whose `time <= query` (i.e., inside the upper bound of the window).
  - `left` pointer removes logs whose `time < query - x` (i.e., outside the lower bound of the window).
- **Maintain a frequency array `freq[serverId]`** and an `activeServers` counter:
  - When a server's frequency changes from `0 → 1`, increment `activeServers`.
  - When it changes from `1 → 0`, decrement `activeServers`.
- **Record the result** for each query as `n - activeServers` in the corresponding original index.

Let's implement this solution in PHP: **[2747. Count Zero Request Servers](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002747-count-zero-request-servers/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @param Integer[][] $logs
 * @param Integer $x
 * @param Integer[] $queries
 * @return Integer[]
 */
function countServers(int $n, array $logs, int $x, array $queries): array
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo countServers(3, [[1,3],[2,6],[1,5]], 5, [10,11]) .  "\n";                      // Output: [1, 2]
echo countServers(3, [[2,4],[2,1],[1,2],[3,1]], 2, [3,4]) .  "\n";                  // Output: [0, 1]
echo countServers(1, [[1,1]], 1, [2]) .  "\n";                                      // Output: [0]
echo countServers(1, [[1,1]], 1, [100]) .  "\n";                                    // Output: [1]
echo countServers(4, [[1,10]], 5, [10]) .  "\n";                                    // Output: [3]
echo countServers(3, [[1,1],[2,2],[3,3]], 10, [100]) .  "\n";                       // Output: [0]
echo countServers(3, [[1,1],[2,2],[3,3]], 1, [1,2,3]) .  "\n";                      // Output: [2, 2, 2]
echo countServers(5, [[1,5],[1,5],[2,5]], 3, [5]) .  "\n";                          // Output: [3]
echo countServers(2, [[1,1],[2,2]], 5, [1,2,3,4,5]) .  "\n";                        // Output: [1, 0, 0, 0, 0]
echo countServers(3, [[1,1],[2,1],[3,1]], 2, [1,2,3,4]) .  "\n";                    // Output: [0, 0, 3, 3]
echo countServers(10, [[1,1],[1,1000000]], 1, [1,1000000]) .  "\n";                 // Output: [9, 9]

// Stress test case (max constraints)
$logs = array_map(fn($i) => [$i, $i], range(1, 100000));
$queries = range(1, 100000);
echo countServers(100000, $logs, 1, $queries) .  "\n";                              // Output: Array of 100000 elements, each 99999
?>
```

## Explanation

- **Sorting logs**: Logs are given unsorted; sorting them ensures we can add them to the window as `right` advances and remove them as `left` advances without ever needing to look back.
- **Sorting queries with indices**: Since queries come in arbitrary order, we need to answer them in ascending order for the sliding window to only move forward (not backward). We map each answer back to the original query position at the end.
- **Window expansion (`right` pointer)**: For a given query `q`, we include every log with `time <= q`. This builds the right edge of the window `[q - x, q]`.
- **Window contraction (`left` pointer)**: We then evict every log with `time < q - x`, keeping the window inclusive on both sides. Since `q` is non-decreasing across sorted queries, `left` never needs to move backward.
- **`activeServers` counter**: Rather than recounting distinct servers each time, we update this counter incrementally:
  - When a log for server `s` is added and `freq[s]` goes from 0 → 1, that server becomes "active".
  - When a log for server `s` is removed and `freq[s]` goes from 1 → 0, that server becomes "inactive".
- **Answer computation**: The number of servers that received zero requests in the window is simply `n - activeServers`.
- **Edge cases handled**:
  - Duplicate log entries for the same server at different times are handled by counting in `freq`.
  - Multiple logs for the same server at the same time are also handled naturally.
  - The window is inclusive on both ends, matching the problem statement.

## Complexity Analysis

- **Time Complexity:** `O(L log L + Q log Q + L + Q)` where:
  - `L = logs.length`, `Q = queries.length`.
  - Sorting logs: `O(L log L)`.
  - Sorting queries: `O(Q log Q)`.
  - Two-pointer sweep over logs: `O(L)` total (each log is added once and removed at most once).
  - Processing queries: `O(Q)`.
  - Overall: **`O(L log L + Q log Q)`**.
- **Space Complexity:** `O(n + Q + L)` due to:
  - `freq` array of size `n + 1`.
  - `sortedQueries` array of size `Q`.
  - `ans` array of size `Q`.
  - Sorting overhead for `logs` (in place) and `sortedQueries`.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**