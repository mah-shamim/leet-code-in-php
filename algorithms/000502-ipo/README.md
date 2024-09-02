502\. IPO

**Difficulty:** Hard

**Topics:** `Array`, `Greedy`, `Sorting`, `Heap (Priority Queue)`

Suppose LeetCode will start its **IPO** soon. In order to sell a good price of its shares to Venture Capital, LeetCode would like to work on some projects to increase its capital before the **IPO**. Since it has limited resources, it can only finish at most `k` distinct projects before the **IPO**. Help LeetCode design the best way to maximize its total capital after finishing at most `k` distinct projects.

You are given `n` projects where the <code>i<sup>th</sup></code> project has a pure profit `profits[i]` and a minimum capital of `capital[i]` is needed to start it.

Initially, you have `w` capital. When you finish a project, you will obtain its pure profit and the profit will be added to your total capital.

Pick a list of **at most** `k` distinct projects from given projects to **maximize your final capital**, and return _the final maximized capital_.

The answer is guaranteed to fit in a 32-bit signed integer.

**Example 1:**

- **Input:** k = 2, w = 0, profits = [1,2,3], capital = [0,1,1]
- **Output:** 4
- **Explanation:** Since your initial capital is 0, you can only start the project indexed 0.\
  After finishing it you will obtain profit 1 and your capital becomes 1.\
  With capital 1, you can either start the project indexed 1 or the project indexed 2.\
  Since you can choose at most 2 projects, you need to finish the project indexed 2 to get the maximum capital.\
  Therefore, output the final maximized capital, which is 0 + 1 + 3 = 4.

**Example 2:**

- **Input:** k = 3, w = 0, profits = [1,2,3], capital = [0,1,2]
- **Output:** 6

**Constraints:**

- <code>1 <= k <= 10<sup>5</sup></code>
- <code>0 <= w <= 10<sup>9</sup></code>
- <code>n == profits.length</code>
- <code>n == capital.length</code>
- <code>1 <= n <= 10<sup>5</sup></code>
- <code>0 <= profits[i] <= 10<sup>4</sup></code>
- <code>0 <= capital[i] <= 10<sup>9</sup></code>



**Solution:**

We need to pick the projects that will maximize the final capital after finishing at most `k` projects, given the initial capital `w`.

### Approach

1. **Sort Projects by Capital:**
  - First, we need to filter the projects based on the available capital. For this, we sort the projects based on the minimum required capital. This allows us to efficiently access the projects that can be started given the current capital.

2. **Use a Max-Heap to Track Profits:**
  - We maintain a max-heap (priority queue) to keep track of the profits of the projects that can be undertaken with the current capital. This ensures that at each step, we can always choose the project with the highest profit.

3. **Simulate the Process:**
  - For each project up to `k`, we add all the projects that can be started with the current capital into the max-heap.
  - Then, we select the project with the highest profit from the max-heap and add its profit to the current capital.
  - We repeat this process until we have selected `k` projects or there are no more projects that can be started.

Let's implement this solution in PHP: **[502. IPO](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000502-ipo/solution.php)**

```php
<?php
function findMaximizedCapital($k, $w, $profits, $capital) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example Usage

//Example 1
$k = 2;
$w = 0;
$profits = [1, 2, 3];
$capital = [0, 1, 1];

echo findMaximizedCapital($k, $w, $profits, $capital);  // Output: 4
//Example 2
$k = 3;
$w = 0;
$profits = [1, 2, 3];
$capital = [0, 1, 2];

echo findMaximizedCapital($k, $w, $profits, $capital);  // Output: 6
?>
```

### Explanation:

1. **Initialization:** We start by preparing an array of projects where each project is represented as a tuple `(capital, profit)`. We sort this array by the required capital so that we can efficiently pick projects as the available capital increases.

2. **Max-Heap for Profits:** We then iterate through the sorted projects and add all the projects that can be started with the current capital to a max-heap. The max-heap ensures that we always pick the most profitable project first.

3. **Project Selection:** In each iteration, we extract the maximum profit from the heap and add it to our current capital. This process continues until we have selected `k` projects or no more projects can be started.

This approach efficiently handles the constraints and ensures that we maximize the final capital.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**

