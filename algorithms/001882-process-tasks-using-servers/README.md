1882\. Process Tasks Using Servers

**Difficulty:** Medium

**Topics:** `Staff`, `Array`, `Heap (Priority Queue)`, `Weekly Contest 243`

You are given two **0-indexed** integer arrays `servers` and `tasks` of lengths `n` and `m` respectively. `servers[i]` is the **weight** of the `iᵗʰ` server, and `tasks[j]` is the **time needed** to process the `jᵗʰ` task **in seconds**.

Tasks are assigned to the servers using a **task queue**. Initially, all servers are free, and the queue is **empty**.

At second `j`, the `jᵗʰ` task is **inserted** into the queue (starting with the `0ᵗʰ` task being inserted at second `0`). As long as there are free servers and the queue is not empty, the task in the front of the queue will be assigned to a free server with the **smallest weight**, and in case of a tie, it is assigned to a free server with the **smallest index**.

If there are no free servers and the queue is not empty, we wait until a server becomes free and immediately assign the next task. If multiple servers become free at the same time, then multiple tasks from the queue will be assigned **in order of insertion** following the weight and index priorities above.

A server that is assigned task `j` at second `t` will be free again at second `t + tasks[j]`.

Build an array `ans` of length `m`, where `ans[j]` is the index of the server the `jᵗʰ` task will be assigned to.

Return _the array `ans`_.

**Example 1:**

- **Input:** servers = [3,3,2], tasks = [1,2,3,2,1,2]
- **Output:** [2,2,0,2,1,2]
- **Explanation:** 
  - Events in chronological order go as follows:
     - At second 0, task 0 is added and processed using server 2 until second 1.
     - At second 1, server 2 becomes free. Task 1 is added and processed using server 2 until second 3.
     - At second 2, task 2 is added and processed using server 0 until second 5.
     - At second 3, server 2 becomes free. Task 3 is added and processed using server 2 until second 5.
     - At second 4, task 4 is added and processed using server 1 until second 5.
     - At second 5, all servers become free. Task 5 is added and processed using server 2 until second 7.

**Example 2:**

- **Input:** servers = [5,1,4,3,2], tasks = [2,1,2,4,5,2,1]
- **Output:** [1,4,1,4,1,3,2]
- **Explanation:** 
  - Events in chronological order go as follows:
     - At second 0, task 0 is added and processed using server 1 until second 2.
     - At second 1, task 1 is added and processed using server 4 until second 2.
     - At second 2, servers 1 and 4 become free. Task 2 is added and processed using server 1 until second 4.
     - At second 3, task 3 is added and processed using server 4 until second 7.
     - At second 4, server 1 becomes free. Task 4 is added and processed using server 1 until second 9.
     - At second 5, task 5 is added and processed using server 3 until second 7.
     - At second 6, task 6 is added and processed using server 2 until second 7.

**Example 3:**

- **Input:** servers = [1], tasks = [1,1,1]
- **Output:** [0,0,0]

**Example 4:**

- **Input:** servers = [3,3,2], tasks = [1]
- **Output:** [2]

**Example 5:**

- **Input:** servers = [1,1], tasks = [10,10,10]
- **Output:** [0,1,0]

**Example 6:**

- **Input:** servers = [2,2,2], tasks = [5,5,5,5]
- **Output:** [0,1,2,0]

**Example 7:**

- **Input:** servers = [2,1], tasks = [1,1,1,1,1]
- **Output:** [1,1,1,1,1]

**Example 8:**

- **Input:** servers = [1,1], tasks = [2,2,2,2]
- **Output:** [0,1,0,1]

**Example 9:**

- **Input:** servers = [10,20,30], tasks = [1]
- **Output:** [0]

**Example 10:**

- **Input:** servers = [1,1,1], tasks = [1,1,1]
- **Output:** [0,0,0]

**Example 11:**

- **Input:** servers = [3,1,2], tasks = [5,1,1,1,1]
- **Output:** [1,2,2,2,2]

**Example 12:**

- **Input:** servers = [1,2,3], tasks = [1,1,1,1,1,1]
- **Output:** [0,0,0,0,0,0]

**Constraints:**

- `servers.length == n`
- `tasks.length == m`
- `1 <= n, m <= 2 * 10⁵`
- `1 <= servers[i], tasks[j] <= 2 * 10⁵`


**Hint:**

1. You can maintain a Heap of available Servers and a Heap of unavailable servers
2. Note that the tasks will be processed in the input order so you just need to find the x-th server that will be available according to the rules


**Similar Questions:**

1. [2050. Parallel Courses III](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002050-parallel-courses-iii)


**Solution:**

We implement `assignTasks()` using **two `SplPriorityQueue` heaps** — one for currently available servers (ordered by smallest weight, then smallest index) and one for busy servers (ordered by earliest free time). We iterate through tasks in arrival order, releasing any servers whose free-time has passed, and if none are free, we fast-forward the clock to the earliest server's free time. This efficiently simulates the exact priority rules described in the problem.

## Approach

- **Encode server priority** into a single integer using `weight * (n + 1) + index`, so a min-heap on that value produces the required tie-breaking (smallest weight → smallest index).
- **Two heaps**:
  - `available`: all free servers; top = best choice for next task.
  - `busy`: all busy servers; top = earliest freeing server (`freeTime` first, then arbitrary since we re-add to `available`).
- **Clock management**: `currentTime` advances to the max of the current second `j` and any required wait time when servers are busy.
- **Release / assign cycle** per task:
  1. Advance clock to `max(currentTime, j)`.
  2. Pop every busy server whose `freeTime ≤ currentTime` back into `available`.
  3. If `available` is empty, pop the earliest finishing busy server, set `currentTime` to its `freeTime`, and release any servers free at or before that time.
  4. Pop the best server from `available`, record its index in `ans`, and push `(currentTime + duration, index)` into `busy`.
- Since `SplPriorityQueue` is a **max-heap**, we negate numeric priorities to simulate min-heap behavior.

Let's implement this solution in PHP: **[1882. Process Tasks Using Servers](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001882-process-tasks-using-servers/solution.php)**

```php
<?php
/**
 * @param Integer[] $servers
 * @param Integer[] $tasks
 * @return Integer[]
 */
function assignTasks(array $servers, array $tasks): array
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
// Note: use json_encode() because PHP cannot echo an array directly.

echo json_encode(assignTasks([3,3,2], [1,2,3,2,1,2])) . "\n";       // Output: [2,2,0,2,1,2]
echo json_encode(assignTasks([5,1,4,3,2], [2,1,2,4,5,2,1])) . "\n"; // Output: [1,4,1,4,1,3,2]
echo json_encode(assignTasks([1], [1,1,1])) . "\n";                 // Output: [0,0,0]
echo json_encode(assignTasks([3,3,2], [1])) . "\n";                 // Output: [2]
echo json_encode(assignTasks([1,1], [10,10,10])) . "\n";            // Output: [0,1,0]
echo json_encode(assignTasks([2,2,2], [5,5,5,5])) . "\n";           // Output: [0,1,2,0]
echo json_encode(assignTasks([2,1], [1,1,1,1,1])) . "\n";           // Output: [1,1,1,1,1]
echo json_encode(assignTasks([1,1], [2,2,2,2])) . "\n";             // Output: [0,1,0,1]
echo json_encode(assignTasks([10,20,30], [1])) . "\n";              // Output: [0]
echo json_encode(assignTasks([1,1,1], [1,1,1])) . "\n";             // Output: [0,0,0]
echo json_encode(assignTasks([3,1,2], [5,1,1,1,1])) . "\n";         // Output: [1,2,2,2,2]
echo json_encode(assignTasks([1,2,3], [1,1,1,1,1,1])) . "\n";       // Output: [0,0,0,0,0,0]
?>
```

## Explanation

- **Priority packing**: With `base = n + 1`, `weight * base + index` is unique per server and preserves lexicographic order (weight, then index) under numeric comparison. Negating it turns the max-heap into the desired min-heap.
- **Busy heap** stores `[freeTime, serverIndex]` with priority `-freeTime`, so the smallest `freeTime` is always extracted first.
- **Releasing servers**: Before each task assignment, all servers that have finished by `currentTime` are moved back to `available`, so the next task correctly sees the freshest set of free servers.
- **Forced wait**: When `available` is empty (all servers busy), we pop the next-to-finish busy server, jump the clock forward, and release it (plus any ties) — guaranteeing at least one server is ready before assignment.
- **Same-second ties**: Handled naturally because after freeing one server we continue draining the busy heap for all `freeTime ≤ currentTime` before picking.
- **Order of queue processing**: Tasks are inserted in input order `j = 0, 1, 2, …`; because we process tasks sequentially and only advance the clock up to `j`, insertion order is preserved exactly as in the problem statement.

## Complexity Analysis

- **Time Complexity**: `O((n + m) log n)`
  - Initial build of `available`: `O(n log n)`.
  - Per task: `O(log n)` heap insert + extract, plus amortized releases (each server is released at most once per task, so total releases over the run is bounded by `m`).
  - `m` tasks × `O(log n)` = `O(m log n)`.
  - Combined: `O((n + m) log n)`.
- **Space Complexity**: `O(n + m)`
  - `available` holds ≤ `n` servers; `busy` holds ≤ `n` servers → `O(n)`.
  - `ans` output array is `O(m)`.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**