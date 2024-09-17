826\. Most Profit Assigning Work

**Difficulty:** Medium

**Topics:** `Array`, `Two Pointers`, `Binary Search`, `Greedy`, `Sorting`

You have `n` jobs and `m` workers. You are given three arrays: `difficulty`, `profit`, and `worker` where:

- `difficulty[i]` and `profit[i]` are the difficulty and the profit of the <code>i<sup>th</sup></code> job, and
- `worker[j]` is the ability of <code>j<sup>th</sup></code> worker (i.e., the <code>j<sup>th</sup></code> worker can only complete a job with difficulty at most `worker[j]`).

Every worker can be assigned **at most one job**, but one job can be **completed multiple times**.

- For example, if three workers attempt the same job that pays `$1`, then the total profit will be `$3`. If a worker cannot complete any job, their profit is `$0`.

Return _the maximum profit we can achieve after assigning the workers to the jobs_.

**Example 1:**

- **Input:** `difficulty = [2,4,6,8,10]`, `profit = [10,20,30,40,50]`, `worker = [4,5,6,7]`
- **Output:** `100`
- **Explanation:** Workers are assigned jobs of `difficulty [4,4,6,6]` and they get a `profit of [20,20,30,30]` separately.

**Example 2:**

- **Input:** `difficulty = [85,47,57]`, `profit = [24,66,99]`, `worker = [40,25,25]`
- **Output:** 0

**Constraints:**

- <code>n == difficulty.length</code>
- <code>n == profit.length</code>
- <code>m == worker.length</code>
- <code>1 <= n, m <= 10<sup>4</sup></code>
- <code>1 <= difficulty[i], profit[i], worker[i] <= 10<sup>5</sup></code>



**Solution:**

We need to assign workers to jobs in such a way that each worker can only do jobs they are capable of based on their ability (which means their ability must be greater than or equal to the job's difficulty). The goal is to maximize the total profit, and one job can be completed multiple times by different workers.

### Plan:
1. **Sort the jobs by difficulty** so that we can match workers to the most profitable job they can do.
2. **Sort the workers by their ability**, so that we can easily assign the best job to each worker.
3. Use a **greedy strategy**: For each worker, find the highest profit they can earn from jobs whose difficulty is less than or equal to their ability.

### Steps:
1. Combine the difficulty and profit of jobs into a list of tuples and sort them by difficulty. This ensures we process easier jobs first.
2. Sort the worker array to process workers in increasing order of their ability.
3. As we iterate over the workers, for each one, assign them the most profitable job they can handle using a two-pointer or binary search approach.

Let's implement this solution in PHP: **[826. Most Profit Assigning Work](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000826-most-profit-assigning-work/solution.php)**

```php
<?php
/**
 * @param Integer[] $difficulty
 * @param Integer[] $profit
 * @param Integer[] $worker
 * @return Integer
 */
function maxProfitAssignment($difficulty, $profit, $worker) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
$difficulty = [2, 4, 6, 8, 10];
$profit = [10, 20, 30, 40, 50];
$worker = [4, 5, 6, 7];
echo maxProfitAssignment($difficulty, $profit, $worker); // Output: 100

$difficulty = [85, 47, 57];
$profit = [24, 66, 99];
$worker = [40, 25, 25];
echo maxProfitAssignment($difficulty, $profit, $worker); // Output: 0
?>
```

### Explanation:

1. **Combining jobs**: We create a new array where each job is represented as a tuple `[difficulty, profit]`.
2. **Sorting jobs**: We sort the jobs by difficulty and, in case of a tie, by profit in descending order. This makes sure we are always trying to assign the most profitable job available that a worker can do.
3. **Processing workers**: For each worker (sorted by their ability), we move through the sorted job list and assign them the most profitable job they can do.
4. **Tracking max profit**: The variable `$maxProfit` keeps track of the best profit the worker can earn based on their ability.

### Time Complexity:
- Sorting jobs and workers both take **O(n log n + m log m)** where `n` is the number of jobs and `m` is the number of workers.
- The while loop processes each job once, so it is **O(n + m)**.
- Thus, the overall complexity is **O(n log n + m log m)**.

### Space Complexity:
- The space complexity is **O(n)** due to the additional array of jobs.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
