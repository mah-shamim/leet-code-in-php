857\. Minimum Cost to Hire K Workers

**Difficulty:** Hard

**Topics:** `Array`, `Greedy`, `Sorting`, `Heap (Priority Queue)`

There are `n` workers. You are given two integer arrays `quality` and wage where `quality[i]` is the quality of the <code>i<sup>th</sup></code> worker and `wage[i]` is the minimum wage expectation for the <code>i<sup>th</sup></code> worker.

We want to hire exactly `k` workers to form a **paid group**. To hire a group of `k` workers, we must pay them according to the following rules:

1. Every worker in the paid group must be paid at least their minimum wage expectation.
2. In the group, each worker's pay must be directly proportional to their quality. This means if a worker’s quality is double that of another worker in the group, then they must be paid twice as much as the other worker.

Given the integer `k`, return _the least amount of money needed to form a paid group satisfying the above conditions. Answers within <code>10<sup>-5</sup></code> of the actual answer will be accepted._

**Example 1:**

- **Input:** quality = [10,20,5], wage = [70,50,30], k = 2
- **Output:** 105.00000
- **Explanation:** We pay 70 to 0<sup>th</sup> worker and 35 to 2<sup>nd</sup> worker.

**Example 2:**

- **Input:** quality = [3,1,10,10,1], wage = [4,8,2,2,7], k = 3
- **Output:** 30.66667
- **Explanation:** We pay 4 to 0<sup>th</sup> worker, 13.33333 to 2<sup>nd</sup> and 3<sup>rd</sup> workers separately.

**Example 3:**

- **Input:** quality = [4,4,4,5], wage = [13,12,13,12], k = 2
- **Output:** 26.00000


**Constraints:**

- <code>n == quality.length == wage.length</code>
- <code>1 <= k <= n <= 10<sup>4</sup></code>
- <code>1 <= quality[i], wage[i] <= 10<sup>4</sup></code>



**Solution:**

We need to hire exactly `k` workers while ensuring two conditions:
1. Each worker is paid at least their minimum wage.
2. The pay is proportional to the worker's quality.

### Key Insights:
1. **Ratio of Wage to Quality**: The ratio `wage[i] / quality[i]` defines the minimum acceptable payment rate per unit of quality for worker `i`. If we decide to hire a worker at this ratio, every other worker in the group must be paid according to this ratio.
2. **Greedy Approach**: To minimize the total cost, we must ensure that the payment is based on the smallest possible wage-to-quality ratio for the group of workers.

### Steps:
1. **Sort by wage-to-quality ratio**: We first sort the workers by their `wage[i] / quality[i]` ratio.
2. **Use a Max-Heap for Quality**: As we iterate through the workers in increasing order of the wage-to-quality ratio, we maintain a group of exactly `k` workers. To ensure the total quality is minimized, we use a max-heap to keep track of the largest quality workers. If we encounter a worker with higher quality than one already in the heap, we remove the largest quality worker (since that would increase the total cost).
3. **Calculate the Total Cost**: For each valid group of `k` workers, we compute the total cost as the sum of the qualities of the `k` workers multiplied by the current wage-to-quality ratio.

Let's implement this solution in PHP: **[857. Minimum Cost to Hire K Workers](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000857-minimum-cost-to-hire-k-workers/solution.php)**

```php
<?php
/**
 * @param Integer[] $quality
 * @param Integer[] $wage
 * @param Integer $k
 * @return Float
 */
function mincostToHireWorkers(array $quality, array $wage, int $k): float
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example 1
$quality1 = [10, 20, 5];
$wage1 = [70, 50, 30];
$k1 = 2;
echo mincostToHireWorkers($quality1, $wage1, $k1) . "\n";  // Output: 105.00000

// Example 2
$quality2 = [3, 1, 10, 10, 1];
$wage2 = [4, 8, 2, 2, 7];
$k2 = 3;
echo mincostToHireWorkers($quality2, $wage2, $k2) . "\n";  // Output: 30.66667

// Example 3
$quality3 = [4, 4, 4, 5];
$wage3 = [13, 12, 13, 12];
$k3 = 2;
echo mincostToHireWorkers($quality3, $wage3, $k3) . "\n";  // Output: 26.00000
?>
```

### Explanation:

1. **Sorting**: First, we calculate the `wage/quality` ratio for each worker and sort them in ascending order. This allows us to consider groups with the smallest wage-to-quality ratio first.

2. **Heap Maintenance**: We maintain a max-heap (using PHP's `SplMaxHeap`) to track the highest quality workers in our group of size `k`. If adding a new worker causes the heap to have more than `k` workers, we remove the one with the highest quality, as it would contribute more to the overall cost.

3. **Cost Calculation**: For each valid group of `k` workers, we calculate the total wage as `qualitySum * wagePerQuality`. The minimum wage is updated with each new group of `k` workers.

### Example Walkthrough:

#### Example 1:
- Input: `quality = [10, 20, 5]`, `wage = [70, 50, 30]`, `k = 2`
- Step 1: Calculate the `wage/quality` ratio for each worker:
    - Worker 0: `70/10 = 7`
    - Worker 1: `50/20 = 2.5`
    - Worker 2: `30/5 = 6`
- Step 2: Sort workers by ratio: `[(2.5, 20), (6, 5), (7, 10)]`
- Step 3: Use a max-heap to track the top `k=2` workers. The final cost is `105`.

#### Example 2:
- Input: `quality = [3, 1, 10, 10, 1]`, `wage = [4, 8, 2, 2, 7]`, `k = 3`
- Step 1: Calculate the `wage/quality` ratio:
    - Worker 0: `4/3 ≈ 1.33`
    - Worker 1: `8/1 = 8`
    - Worker 2: `2/10 = 0.2`
    - Worker 3: `2/10 = 0.2`
    - Worker 4: `7/1 = 7`
- Step 2: Sort workers: `[(0.2, 10), (0.2, 10), (1.33, 3), (7, 1), (8, 1)]`
- Step 3: The final cost for `k=3` is `30.66667`.

### Time Complexity:
- Sorting the workers takes **O(n log n)**.
- Inserting and removing from the heap takes **O(log k)**.
- The overall complexity is **O(n log n)**, which is efficient given the constraints (`n <= 10^4`).

This solution ensures that the least amount of money is paid while maintaining fairness and proportionality based on worker quality.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
