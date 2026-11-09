1606\. Find Servers That Handled Most Number of Requests

**Difficulty:** Hard

**Topics:** `Principal`, `Array`, `Heap (Priority Queue)`, `Simulation`, `Ordered Set`, `Biweekly Contest 36`

You have `k` servers numbered from `0` to `k-1` that are being used to handle multiple requests simultaneously. Each server has infinite computational capacity but **cannot handle more than one request at a time**. The requests are assigned to servers according to a specific algorithm:

- The `iᵗʰ` (0-indexed) request arrives.
- If all servers are busy, the request is dropped (not handled at all).
- If the `(i % k)ᵗʰ` server is available, assign the request to that server.
- Otherwise, assign the request to the next available server (wrapping around the list of servers and starting from 0 if necessary). For example, if the `iᵗʰ` server is busy, try to assign the request to the `(i+1)ᵗʰ` server, then the `(i+2)ᵗʰ` server, and so on.

You are given a **strictly increasing** array `arrival` of positive integers, where `arrival[i]` represents the arrival time of the `iᵗʰ` request, and another array `load`, where `load[i]` represents the load of the `iᵗʰ` request (the time it takes to complete). Your goal is to find the **busiest server(s)**. A server is considered **busiest** if it handled the most number of requests successfully among all the servers.

Return _a list containing the IDs (0-indexed) of the **busiest server(s)**_. You may return the IDs in any order.

**Example 1:**

![load-1](https://assets.leetcode.com/uploads/2020/09/08/load-1.png)

- **Input:** k = 3, arrival = [1,2,3,4,5], load = [5,2,3,3,3]
- **Output:** [1]
- **Explanation:**
  - All of the servers start out available.
  - The first 3 requests are handled by the first 3 servers in order.
  - Request 3 comes in. Server 0 is busy, so it's assigned to the next available server, which is 1.
  - Request 4 comes in. It cannot be handled since all servers are busy, so it is dropped.
  - Servers 0 and 2 handled one request each, while server 1 handled two requests. Hence server 1 is the busiest server.

**Example 2:**

- **Input:** k = 3, arrival = [1,2,3,4], load = [1,2,1,2]
- **Output:** [0]
- **Explanation:**  
  - The first 3 requests are handled by first 3 servers.
  - Request 3 comes in. It is handled by server 0 since the server is available.
  - Server 0 handled two requests, while servers 1 and 2 handled one request each. Hence server 0 is the busiest server.

**Example 3:**

- **Input:** k = 3, arrival = [1,2,3], load = [10,12,11]
- **Output:** [0,1,2]
- **Explanation:** Each server handles a single request, so they are all considered the busiest.

**Example 4:**

- **Input:** k = 1, arrival = [1,2,3], load = [1,1,1]
- **Output:** [0]

**Example 5:**

- **Input:** k = 1, arrival = [1,2], load = [5,5]
- **Output:** [0]

**Example 6:**

- **Input:** k = 3, arrival = [1], load = [5]
- **Output:** [0]

**Example 7:**

- **Input:** k = 4, arrival = [1,2,3,4,5], load = [100,100,100,100,1]
- **Output:** [0,1,2,3]

**Example 8:**

- **Input:** k = 3, arrival = [1,2,3,4,8], load = [2,2,2,2,2]
- **Output:** [0,1]

**Example 9:**

- **Input:** k = 2, arrival = [1,2,3], load = [10,10,10]
- **Output:** [0,1]

**Example 10:**

- **Input:** k = 5, arrival = [1,2,3,4,5,6,7,8,9,10], load = [1,1,1,1,1,1,1,1,1,1]
- **Output:** [0,1,2,3,4]

**Example 11:**

- **Input:** k = 10, arrival = [1,2,3,4,5], load = [1000000000,1000000000,1000000000,1000000000,1000000000]
- **Output:** [0,1,2,3,4]

**Example 12:**

- **Input:** k = 5, arrival = [1,3,5,7,9], load = [2,2,2,2,2]
- **Output:** [0,1,2,3,4]

**Example 13:**

- **Input:** k = 1, arrival = [1], load = [1]
- **Output:** [0]

**Example 14:**

- **Input:** k = 1, arrival = [1,2,3], load = [10,10,10]
- **Output:** [0]

**Example 15:**

- **Input:** k = 4, arrival = [1,2,3,4], load = [1,1,1,1]
- **Output:** [0,1,2,3]

**Example 16:**

- **Input:** k = 2, arrival = [1,2,3], load = [5,5,5]
- **Output:** [0,1]

**Example 17:**

- **Input:** k = 3, arrival = [1,10,100], load = [1,1,1]
- **Output:** [0,1,2]

**Example 18:**

- **Input:** k = 2, arrival = [1,2,3], load = [2,2,1]
- **Output:** [0]

**Example 19:**

- **Input:** k = 5, arrival = [1], load = [100]
- **Output:** [0]

**Constraints:**

- `1 <= k <= 10⁵`
- `1 <= arrival.length, load.length <= 10⁵`
- `arrival.length == load.length`
- `1 <= arrival[i], load[i] <= 10⁹`
- `arrival` is strictly increasing.


**Hint:**

1. To speed up the next available server search, keep track of the available servers in a sorted structure such as an ordered set.
2. To determine if a server is available, keep track of the end times for each task in a heap and add the server to the available set once the soonest task ending time is less than or equal to the next task to add.


**Similar Questions:**

1. [2402. Meeting Rooms III](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002402-meeting-rooms-iii)


**Solution:**

We solve the "Busiest Servers" problem by combining a **Fenwick Tree (Binary Indexed Tree)** to track which servers are currently free in sorted order and a **min-heap** (via `SplPriorityQueue` with negated priorities) to track when busy servers finish. For each incoming request, we (1) release any servers whose tasks ended by the current arrival time, (2) find the first available server starting from `i % k` and wrapping around using the Fenwick tree's order statistics, and (3) mark that server busy and push its end time onto the heap. Dropped requests are simply skipped when no server is free. After processing, we scan the per-server request counts and return the IDs with the maximum.

## Approach

- **Data structures chosen:**
  - **Fenwick tree** of size `k` where each leaf is `1` if the server is free, `0` if busy. Supports `add(pos, delta)`, prefix `sum(i)`, and `kth(k)` (find the position of the `k`-th available server) all in `O(log k)`.
  - **Min-heap** (`SplPriorityQueue`, which is a max-heap — so we push `-endTime` as priority) storing `[endTime, serverId]` pairs. Yields the soonest-finishing server in `O(log k)`.
  - **`$handled` array** counting requests per server.
- **Per-request loop:**
  - Pop all heap entries with `endTime <= arrival[i]`; for each, mark its server available again (`add(server+1, +1)`, increment `$available`).
  - If `$available == 0`, drop the request (`continue`).
  - Compute `start = i % k` (0-indexed desired server).
  - Let `before = sum(start)` = number of free servers with 0-indexed ID `< start`.
  - If `available > before`, the target available server lies at/after `start` → pick `kth(before + 1)`.
  - Otherwise, wrap around → pick `kth(1)` (the smallest-ID free server).
  - Convert 1-based Fenwick position back to 0-based `server = pos - 1`, update `$handled`, mark busy, push `[arrival[i] + load[i], server]`.
- **Final step:** compute `max($handled)` and collect all server IDs achieving it.

Let's implement this solution in PHP: **[1606. Find Servers That Handled Most Number of Requests](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001606-find-servers-that-handled-most-number-of-requests/solution.php)**

```php
<?php
/**
 * @param Integer $k
 * @param Integer[] $arrival
 * @param Integer[] $load
 * @return Integer[]
 */

function busiestServers(int $k, array $arrival, array $load): array
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo busiestServers(3, [1,2,3,4,5], [5,2,3,3,3]) .  "\n";                                                       // Output: [1]
echo busiestServers(3, [1,2,3,4], [1,2,1,2]) .  "\n";                                                           // Output: [0]
echo busiestServers(3, [1,2,3], [10,12,11]) .  "\n";                                                            // Output: [0,1,2]
echo busiestServers(1, [1], [1]) .  "\n";                                                                       // Output: [0]
echo busiestServers(1, [1,2,3], [10,10,10]) .  "\n";                                                            // Output: [0]
echo busiestServers(4, [1,2,3,4], [1,1,1,1]) .  "\n";                                                           // Output: [0,1,2,3]
echo busiestServers(2, [1,2,3], [5,5,5]) .  "\n";                                                               // Output: [0,1]
echo busiestServers(3, [1,10,100], [1,1,1]) .  "\n";                                                            // Output: [0,1,2]
echo busiestServers(2, [1,2,3], [2,2,1]) .  "\n";                                                               // Output: [0]
echo busiestServers(5, [1], [100]) .  "\n";                                                                     // Output: [0]
echo busiestServers(4, [1,2,3,4,5], [100,100,100,100,1]) .  "\n";                                               // Output: [0,1,2,3]
echo busiestServers(3, [1,2,3,4,8], [2,2,2,2,2]) .  "\n";                                                       // Output: [0,1]
echo busiestServers(2, [1,2,3], [10,10,10]) .  "\n";                                                            // Output: [0,1]
echo busiestServers(5, [1,2,3,4,5,6,7,8,9,10], [1,1,1,1,1,1,1,1,1,1]) .  "\n";                                  // Output: [0,1,2,3,4]
echo busiestServers(10, [1,2,3,4,5], [1000000000,1000000000,1000000000,1000000000,1000000000]) .  "\n";         // Output: [0,1,2,3,4]
echo busiestServers(5, [1,3,5,7,9], [2,2,2,2,2]) .  "\n";                                                       // Output: [0,1,2,3,4]
?>
```

## Explanation

- **Why a Fenwick tree instead of a plain sorted set?** PHP has no built-in balanced BST / ordered set. A Fenwick tree gives us "count of free servers in a prefix" and "find the `k`-th free server" in `O(log k)`, which is exactly what we need for the "next available server starting from `i % k` with wraparound" logic.
- **Wraparound correctness:** `sum(start)` counts free servers strictly to the left of the desired index. If there are more free servers than those, one must exist at or after `start` — so `kth(before + 1)` returns it. If not, all free servers are to the left, so `kth(1)` returns the smallest ID, which is the correct wrap target.
- **Why min-heap on end time works:** A request that ends earlier frees its server earlier, so we only ever need the smallest end time at the front. Negating priorities converts PHP's max-heap into a min-heap.
- **Busy vs. available invariant:** Each server is either present in the Fenwick tree (free, `1`) or in the heap (busy). On release we do `add(pos, +1)` and `available++`; on assignment we do `add(pos, -1)`, `available--`. The two structures stay perfectly in sync.
- **Strictly increasing arrivals:** No need to sort requests; process left-to-right, releasing servers as time advances.
- **Drop condition:** When `available == 0` after releasing, all servers are busy, so the request is dropped — we just `continue` without touching the heap.
- **Tie in end times:** The while loop uses `endTime > time` as the break condition, so every server finishing at or before the current arrival is drained in one pass regardless of heap tie ordering.
- **Verification on Example 1:** Server 0 handles request 0 → busy until 6. Server 1 handles request 1 → busy until 4. Server 2 handles request 2 → busy until 6. Request 3 at time 4: server 1 releases (endTime 4 ≤ 4); target `3 % 3 = 0` is busy, `before = sum(0) = 0`, so `kth(1)` picks server 1 → it handles request 3. Request 4 at time 5: all busy (6, 6, 7) → dropped. Result: server 1 with 2 requests → `[1]`.

## Complexity Analysis

- **Time Complexity**:
  - Fenwick initialization (`k` insertions): `O(k log k)`.
  - Each of the `n` requests does at most one prefix `sum`, one `kth`, one `add`, one heap `insert` → `O(log k)`.
  - Across all requests, at most `n` heap extractions total (each push is extracted at most once) → `O(n log k)`.
  - Final scan of `$handled`: `O(k)`.
  - **Total:** `O((n + k) log k)` time.
- **Space Complexity**: 
  - Fenwick tree: `O(k)`.
  - Heap: at most `k` simultaneous entries (one per busy server) → `O(k)`.
  - `$handled` array: `O(k)`.
  - **Total:** `O(k)` auxiliary space (input arrays aside).
- **Constraints fit:** `k, n ≤ 10^5`, `log k ≤ 17` → well within time limits.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**