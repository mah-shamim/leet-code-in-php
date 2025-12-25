3075\. Maximize Happiness of Selected Children

**Difficulty:** Medium

**Topics:** `Array`, `Greedy`, `Sorting`, `Weekly Contest 388`

You are given an array `happiness` of length `n`, and a **positive** integer `k`.

There are `n` children standing in a queue, where the <code>i<sup>th</sup></code> child has **happiness value** `happiness[i].` You want to select `k` children from these `n` children in `k` turns.

In each turn, when you select a child, the **happiness value** of all the children that have **not** been selected till now decreases by `1`. Note that the happiness value **cannot** become negative and gets decremented **only** if it is positive.

Return _the **maximum** sum of the happiness values of the selected children you can achieve by selecting `k` children._

**Example 1:**

- **Input:** `happiness = [1,2,3], k = 2`
- **Output:** `4`
- **Explanation:** We can pick `2` children in the following way:
  - Pick the child with the happiness `value == 3`. The happiness value of the remaining children becomes `[0,1]`.
  - Pick the child with the happiness `value == 1`. The happiness value of the remaining child becomes `[0]`. Note that the happiness value cannot become less than `0`.\
    The sum of the happiness values of the selected children is `3 + 1 = 4`. 

**Example 2:**

- **Input:** happiness = `[1,1,1,1], k = 2`
- **Output:** `1` 
- **Explanation:** We can pick `2` children in the following way:
  - Pick any child with the happiness `value == 1`. The happiness value of the remaining children becomes `[0,0,0]`.
  - Pick the child with the happiness `value == 0`. The happiness value of the remaining child becomes `[0,0]`.\
    The sum of the happiness values of the selected children is `1 + 0 = 1`.

**Example 3:**

- **Input:** `happiness = [2,3,4,5], k = 1`
- **Output:** `5`
- **Explanation:** We can pick `1` child in the following way:
  - Pick the child with the happiness `value == 5`. The happiness value of the remaining children becomes `[1,2,3]`.\
    The sum of the happiness values of the selected children is `5`.

**Constraints:**

- `1 <= n == happiness.length <= 2 * 10⁵`
- `1 <= happiness[i] <= 10⁸`
- `1 <= k <= n`



**Hint:**
1. Since all the unselected numbers are decreasing at the same rate, we should greedily select `k` largest values.
2. The `iᵗʰ` largest number (`i = 1, 2, 3,…k`) should decrease by `(i - 1)` when it is picked.
3. Add `0` if the decreased value is negative.



**Similar Questions:**
1. [2226. Maximum Candies Allocated to K Children](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002226-maximum-candies-allocated-to-k-children)






**Solution:**

We are given an array of happiness values and we need to pick `k` children in `k` turns.
In each turn, when we pick a child, the happiness of every other child that hasn't been selected decreases by 1 (but not below 0).

### Approach:

- **Sort in descending order**: Sort the happiness array in descending order so we can select children with the highest happiness values first.
- **Greedy selection**: Iterate `k` times to select `k` children. For the `i-th` selection (0-indexed), the child's effective happiness is `max(0, happiness[i] - i)` because:
  - Each previous selection reduces all remaining children's happiness by 1
  - The first selected child (index 0) has no reduction
  - The second selected child (index 1) has been reduced by 1 (from the first selection)
  - The third selected child (index 2) has been reduced by 2 (from the first two selections), etc.
- **Accumulate sum**: Add the effective happiness value to the total sum, ensuring we don't add negative values.

Let's implement this solution in PHP: **[3075. Maximize Happiness of Selected Children](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003075-maximize-happiness-of-selected-children/solution.php)**

```php
<?php
/**
 * @param Integer[] $happiness
 * @param Integer $k
 * @return Integer
 */
function maximumHappinessSum(array $happiness, int $k): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo maximumHappinessSum([1,2,3], 2) . "\n";        // Output: 4
echo maximumHappinessSum([1,1,1,1], 2) . "\n";      // Output: 1
echo maximumHappinessSum([2,3,4,5], 1) . "\n";      // Output: 5
?>
```

### Explanation:

- **Why sorting works**: Since unselected children's happiness decreases equally by 1 each turn, it's optimal to always select the child with the highest current happiness. This is equivalent to selecting the k largest values initially, then accounting for the reductions.
- **Reduction logic**: When we select the i-th largest child (where i starts at 0), it has already been reduced by i (from the previous i selections). So its contribution is `max(0, happiness[i] - i)`.
- **No negative values**: We use `max(0, ...)` because happiness cannot go below zero.
- **Time complexity**: O(n log n) due to sorting, where n is the length of the happiness array.
- **Space complexity**: O(1) additional space (excluding sorting space, which is O(log n) for quicksort in PHP).

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**