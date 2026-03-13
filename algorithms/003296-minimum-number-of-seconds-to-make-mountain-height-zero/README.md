3296\. Minimum Number of Seconds to Make Mountain Height Zero

**Difficulty:** Medium

**Topics:** `Staff`, `Array`, `Math`, `Binary Search`, `Greedy`, `Heap (Priority Queue)`, `Weekly Contest 416`

You are given an integer `mountainHeight` denoting the height of a mountain.

You are also given an integer array `workerTimes` representing the work time of workers in **seconds**.

The workers work **simultaneously** to **reduce** the height of the mountain. For worker `i`:

- To decrease the mountain's height by `x`, it takes `workerTimes[i] + workerTimes[i] * 2 + ... + workerTimes[i] * x` seconds. For example:
   - To reduce the height of the mountain by 1, it takes `workerTimes`[i] seconds.
   - To reduce the height of the mountain by 2, it takes `workerTimes[i] + workerTimes[i] * 2` seconds, and so on.

Return an integer representing the **minimum** number of seconds required for the workers to make the height of the mountain 0.

**Example 1:**

- **Input:** mountainHeight = 4, workerTimes = [2,1,1]
- **Output:** 3
- **Explanation:**
   - One way the height of the mountain can be reduced to 0 is:
     - Worker 0 reduces the height by 1, taking `workerTimes[0] = 2` seconds.
     - Worker 1 reduces the height by 2, taking `workerTimes[1] + workerTimes[1] * 2 = 3` seconds.
     - Worker 2 reduces the height by 1, taking `workerTimes[2] = 1` second.
   - Since they work simultaneously, the minimum time needed is `max(2, 3, 1) = 3` seconds.

**Example 2:**

- **Input:** mountainHeight = 10, workerTimes = [3,2,2,4]
- **Output:** 12
- **Explanation:**
  - Worker 0 reduces the height by 2, taking `workerTimes[0] + workerTimes[0] * 2 = 9` seconds.
  - Worker 1 reduces the height by 3, taking `workerTimes[1] + workerTimes[1] * 2 + workerTimes[1] * 3 = 12` seconds.
  - Worker 2 reduces the height by 3, taking `workerTimes[2] + workerTimes[2] * 2 + workerTimes[2] * 3 = 12` seconds.
  - Worker 3 reduces the height by 2, taking `workerTimes[3] + workerTimes[3] * 2 = 12` seconds. 
  - The number of seconds needed is `max(9, 12, 12, 12) = 12` seconds.

**Example 3:**

- **Input:** mountainHeight = 5, workerTimes = [1]
- **Output:** 15
- **Explanation:** There is only one worker in this example, so the answer is `workerTimes[0] + workerTimes[0] * 2 + workerTimes[0] * 3 + workerTimes[0] * 4 + workerTimes[0] * 5 = 15`.

**Constraints:**

- `1 <= mountainHeight <= 10⁵`
- `1 <= workerTimes.length <= 10⁴`
- `1 <= workerTimes[i] <= 10⁶`


**Hint:**
1. Can we use binary search to solve this problem?
2. Do a binary search on the number of seconds to check if it's enough to reduce the mountain height to 0 or less with all workers working simultaneously.






**Solution:**

The problem asks for the minimum number of seconds required for multiple workers, each with a given base time, to reduce a mountain of a given height to zero. Workers work simultaneously and the time for a worker to reduce the height by `x` units is the sum of an arithmetic progression: `workerTimes[i] * (1 + 2 + ... + x) = workerTimes[i] * x * (x + 1) / 2`. The solution uses **binary search on the total time** and a greedy feasibility check to see if all workers together can reduce the required height within that time.

### Approach:

- **Binary search** the answer between `1` and a safe upper bound (when one worker does all the work: `max(workerTimes) * mountainHeight * (mountainHeight + 1) / 2`).
- For a candidate time `T`, determine if it's possible to reduce the mountain to zero:
   - For each worker, compute the **maximum number of units** that worker can contribute within `T` seconds.
   - This is done via another binary search on `x` (units) for that worker, solving `workerTimes[i] * x * (x + 1) / 2 ≤ T`.
   - Sum the units from all workers. If the total is at least `mountainHeight`, then `T` is feasible.
- Use the feasibility result to adjust the binary search bounds: if feasible, try smaller `T`; otherwise, increase `T`.
- Return the smallest feasible time.

Let's implement this solution in PHP: **[3296. Minimum Number of Seconds to Make Mountain Height Zero](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003296-minimum-number-of-seconds-to-make-mountain-height-zero/solution.php)**

```php
<?php
/**
 * @param Integer $mountainHeight
 * @param Integer[] $workerTimes
 * @return Integer
 */
function minNumberOfSeconds(int $mountainHeight, array $workerTimes): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * Check whether it is possible to reduce the mountain height to zero within T seconds.
 *
 * @param int $T
 * @param int $H
 * @param array $workerTimes
 * @return bool
 */
function canReduce(int $T, int $H, array $workerTimes): bool {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo minNumberOfSeconds(4, [2,1,1]) . "\n";                 // Output: 3
echo minNumberOfSeconds(10, [3,2,2,4]) . "\n";              // Output: 12
echo minNumberOfSeconds(5, [1]) . "\n";                     // Output: 15
?>
```

### Explanation:

- **Why binary search on time?** The required time is monotonic: if we can finish in `T` seconds, we can certainly finish in any larger time. Hence we can binary search for the minimum `T`.
- **Upper bound calculation:** A loose but safe upper bound is when the slowest worker does all the work: `max(workerTimes) * (1 + 2 + ... + mountainHeight) = max(workerTimes) * mountainHeight * (mountainHeight + 1) / 2`. This ensures the search space is correct.
- **Feasibility check (`canReduce`):**
   - For a given worker with base time `w` and time limit `T`, we want the largest `x` such that `w * x * (x + 1) / 2 ≤ T`.  
     This is a quadratic inequality; we solve it with a binary search on `x` (0 to mountainHeight) because the sum grows monotonically with `x`.
   - The product `w * x * (x + 1)` is divided by 2. Since `x * (x + 1)` is always even, the division yields an integer, avoiding floating-point issues.
   - Accumulate the total possible units across all workers. As soon as the total reaches or exceeds `mountainHeight`, we can return `true` early.
- **Binary search on `x` for each worker:** In the worst case we perform about `log₂(mountainHeight)` steps per worker, which is efficient given the constraints (mountainHeight ≤ 1e5, workers ≤ 1e4).

### Complexity
- **Time complexity:**
   - Outer binary search: `O(log (maxTime))` where `maxTime ≈ max(workerTimes) * H²` (about `log(1e6 * 1e10) ≈ 55` steps).
   - For each candidate `T`, we iterate over all `n` workers and perform a binary search on `x` (range 0..H): `O(n * log H)`.
   - Overall: `O(log(maxTime) * n * log H)`. With `H ≤ 1e5`, `n ≤ 1e4`, this is acceptable.
- **Space complexity:** `O(1)` additional space (excluding input storage).

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**