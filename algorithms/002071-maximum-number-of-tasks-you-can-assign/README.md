2071\. Maximum Number of Tasks You Can Assign

**Difficulty:** Hard

**Topics:** `Array`, `Binary Search`, `Greedy`, `Queue`, `Sorting`, `Monotonic Queue`

You have `n` tasks and `m` workers. Each task has a strength requirement stored in a **0-indexed** integer array `tasks`, with the <code>i<sup>th</sup></code> task requiring `tasks[i]` strength to complete. The strength of each worker is stored in a **0-indexed** integer array `workers`, with the <code>j<sup>th</sup></code> worker having `workers[j]` strength. Each worker can only be assigned to a **single** task and must have a strength **greater than or equal** to the task's strength requirement (i.e., `workers[j] >= tasks[i]`).

Additionally, you have `pills` magical pills that will **increase a worker's strength** by `strength`. You can decide which workers receive the magical pills, however, you may only give each worker **at most one** magical pill.

Given the **0-indexed** integer arrays `tasks` and `workers` and the integers `pills` and `strength`, return _the **maximum** number of tasks that can be completed_.

**Example 1:**

- **Input:** tasks = [**3**,**2**,**1**], workers = [**0**,**3**,**3**], pills = 1, strength = 1
- **Output:** 3
- **Explanation:** We can assign the magical pill and tasks as follows:
  - Give the magical pill to worker 0.
  - Assign worker 0 to task 2 (0 + 1 >= 1)
  - Assign worker 1 to task 1 (3 >= 2)
  - Assign worker 2 to task 0 (3 >= 3)

**Example 2:**

- **Input:** tasks = [**5**,4], workers = [**0**,0,0], pills = 1, strength = 5
- **Output:** 1
- **Explanation:** We can assign the magical pill and tasks as follows:
  - Give the magical pill to worker 0.
  - Assign worker 0 to task 0 (0 + 5 >= 5)


**Example 3:**

- **Input:** tasks = [**10**,**15**,30], workers = [******0**,**10**,10,10,10], pills = 3, strength = 10
- **Output:** 2
- **Explanation:** We can assign the magical pills and tasks as follows:
- Give the magical pill to worker 0 and worker 1.
  - Assign worker 0 to task 0 (0 + 10 >= 10)
  - Assign worker 1 to task 1 (10 + 10 >= 15)
    The last pill is not given because it will not make any worker strong enough for the last task.


**Example 4:**

- **Input:** tasks = [5,9,8,5,9], workers = [1,6,4,2,6], pills = 1, strength = 5
- **Output:** 3


**Example 5:**

- **Input:** tasks = [5181,2717,7678,7730,5931,8066,2266,5873,3645,6636,3308,2848,2082,7158,5398,4030,4942,1723,6614,5165,8086,7526,9503,2051,5305,6606,7514,5078,1149,5782,4717,5969,4966,1292,4370,3863,4111,1140,2980,5295,5347,8700,2833,6750,2352,7604,6305,2697,7501,7719,7955,7901,1779,6850,6456,1040,9230,2712,8129,9875,9385,1814,8167,2960,9191,3588,7339,2255,5314,2873,3294,5375,6745,5984,9717,4983,2558,8075,7988,6490,4499,7236,2097,8097,2923,2972,8609,8993,6354,6502,3340,1666,1281,9703,8869,5274,8150,5270,3437,3171,7423,5865,1995,7002,8550,9908,7114,8777,1250,5855,3501,9316,5380,3877], workers = [2167,4646,1582,1102,2113,1258,4341,3193,3136,4096,3311,1501,3499,1815,1282,4914,772,4785,2632,1223,3479,3010,3505,1613,4257,1192,2918,2664,4274,4036,1039,1250,4713,3443,4514,4117,3400,3825,1782,3552,2386,865,2290,3618,793,1297,908,2187,3273,4531,3859,605,4274,3951,583,1135,2802,3585,727,2359,4011,4071,2035,4775,764,4702,2050,3304,3876,3772,4946,4371,1993,4746,1124,1221,1368,831,2337,506,951,3874,3094,2744,4258,4704,3229,1015,4876,1893,3098,4464,4189,4201,3986,3673,4126,2424,4280,2780,1748,1650,1591,753,3392,2498,835,608,1746,1243,3778,1382,4207,1909,832,4501,781,1274,973,4966,1873,2512,3644,3244,1120,4979,3945,1481,2172,4410,3572,4597,3414,4306,4714,4047,3239,4557,3226,3273,4997,3374], pills = 139, strength = 2075
- **Output:** 77



**Constraints:**

- `n == tasks.length`
- `m == workers.length`
- <code>1 <= n, m <= 5 * 10<sup>4</sup></code>
- `0 <= pills <= m`
- <code>0 <= tasks[i], workers[j], strength <= 10<sup>9</sup></code>


**Hint:**
1. Is it possible to assign the first `k` smallest tasks to the workers?
2. How can you efficiently try every `k`?



**Solution:**

We need to determine the maximum number of tasks that can be assigned to workers given that each worker can use a pill to boost their strength. The solution involves using a binary search approach combined with a greedy algorithm to efficiently check if a certain number of tasks can be completed.

### Approach
1. **Binary Search**: We perform a binary search on the number of tasks (from 0 to the minimum of the number of tasks and workers) to determine the maximum number of tasks that can be assigned.
2. **Greedy Algorithm with Binary Search**: For each midpoint value during the binary search, we check if it's possible to complete that number of tasks using the k strongest workers. This check is done using a greedy approach where we process tasks from the largest to smallest and try to assign the smallest possible worker (either directly or with a pill).

Let's implement this solution in PHP: **[2071. Maximum Number of Tasks You Can Assign](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002071-maximum-number-of-tasks-you-can-assign/solution.php)**

```php
<?php
/**
 * @param Integer[] $tasks
 * @param Integer[] $workers
 * @param Integer $pills
 * @param Integer $strength
 * @return Integer
 */
public function maxTaskAssign($tasks, $workers, $pills, $strength) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $tasks
 * @param $workers
 * @param $pills
 * @param $strength
 * @param $m
 * @return bool
 */
private function canComplete($tasks, $workers, $pills, $strength, $m) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $arr
 * @param $target
 * @return int
 */
private function findCeiling($arr, $target) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage
$tasks = [3, 2, 1];
$workers = [0, 3, 3];
$pills = 1;
$strength = 1;

echo maxTaskAssign($tasks, $workers, $pills, $strength) . "\n"; // Output: 3

$tasks = [5,4];
$workers = [0,0,0];
$pills = 1;
$strength = 5;

echo maxTaskAssign($tasks, $workers, $pills, $strength) . "\n"; // Output: 1

$tasks = [10,15,30];
$workers = [0,10,10,10,10];
$pills = 3;
$strength = 10;

echo maxTaskAssign($tasks, $workers, $pills, $strength) . "\n"; // Output: 2

$tasks = [5,9,8,5,9];
$workers = [1,6,4,2,6];
$pills = 1;
$strength = 5;

echo maxTaskAssign($tasks, $workers, $pills, $strength) . "\n"; // Output: 3
?>
```

### Explanation:

1. **Binary Search**: The main function `maxTaskAssign` uses binary search to determine the maximum number of tasks that can be completed. For each midpoint value, it checks if it's possible to complete that number of tasks using the `canComplete` function.
2. **Greedy Algorithm**: The `canComplete` function checks if `m` tasks can be completed using `m` strongest workers. It processes tasks from largest to smallest, trying to assign the smallest possible worker (either directly or using a pill if necessary).
3. **Efficient Worker Assignment**: The `findCeiling` function uses binary search to efficiently find the smallest worker that can handle a task, either directly or with a pill. This ensures that we use the optimal worker for each task, preserving stronger workers for larger tasks when possible.

This approach ensures that we efficiently check each possible number of tasks using binary search and a greedy algorithm, leading to an optimal solution.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**