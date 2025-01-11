2028\. Find Missing Observations

**Difficulty:** Medium

**Topics:** `Array`, `Math`, `Simulation`

You have observations of `n + m` **6-sided** dice rolls with each face numbered from `1` to `6`. `n` of the observations went missing, and you only have the observations of `m` rolls. Fortunately, you have also calculated the **average value** of the `n + m` rolls.

You are given an integer array `rolls` of length m where `rolls[i]` is the value of the <code>i<sup>th</sup></code> observation. You are also given the two integers `mean` and `n`.

Return _an array of length `n` containing the missing observations such that the average value of the `n + m` rolls is exactly `mean`_. If there are multiple valid answers, return any of them. If no such array exists, return _an empty array_.

The **average value** of a set of `k` numbers is the sum of the numbers divided by `k`.

**Note** that `mean` is an integer, so the sum of the `n + m `rolls should be divisible by `n + m`.

**Example 1:**

- **Input:** rolls = [3,2,4,3], mean = 4, n = 2
- **Output:** [6,6]
- **Explanation:** The mean of all n + m rolls is (3 + 2 + 4 + 3 + 6 + 6) / 6 = 4.

**Example 2:**

- **Input:** rolls = [1,5,6], mean = 3, n = 4
- **Output:** [2,3,2,2]
- **Explanation:** The mean of all n + m rolls is (1 + 5 + 6 + 2 + 3 + 2 + 2) / 7 = 3.

**Example 3:**

- **Input:** rolls = [1,2,3,4], mean = 6, n = 4
- **Output:** []
- **Explanation:** It is impossible for the mean to be 6 no matter what the 4 missing rolls are.



**Constraints:**

- <code>m == rolls.length</code>
- <code>1 <= n, m <= 10<sup>5</sup></code>
- <code>1 <= rolls[i], mean <= 6</code>


**Hint:**
1. What should the sum of the n rolls be?
2. Could you generate an array of size n such that each element is between 1 and 6?



**Solution:**

We need to determine an array of missing rolls such that the average of all `n + m` dice rolls is exactly equal to `mean`. Here's the step-by-step breakdown of the solution:

### Steps to Approach:

1. **Calculate the total sum for `n + m` rolls:**
   Given that the average value of `n + m` rolls is `mean`, the total sum of all the rolls should be `total_sum = (n + m) * mean`.

2. **Determine the missing sum:**
   The sum of the `m` rolls is already known. Thus, the sum of the missing `n` rolls should be:
   ```
   missing_sum = total_sum - ∑(rolls)
   ```
   where `∑(rolls)` is the sum of the elements in the `rolls` array.

3. **Check for feasibility:**
   Each roll is a 6-sided die, so the missing values must be between 1 and 6 (inclusive). Therefore, the sum of the missing `n` rolls must be between:
   ```
   min_sum = n X 1 = n
   ```
   and
   ```
   max_sum = n X 6 = 6n
   ```
   If the `missing_sum` is outside this range, it's impossible to form valid missing observations, and we should return an empty array.

4. **Distribute the missing sum:**
   If `missing_sum` is valid, we distribute it across the `n` rolls by initially filling each element with `1` (the minimum possible value). Then, we increment elements from 1 to 6 until we reach the required `missing_sum`.

Let's implement this solution in PHP: **[2028. Find Missing Observations](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002028-find-missing-observations/solution.php)**

```php
<?php
/**
 * @param Integer[] $rolls
 * @param Integer $mean
 * @param Integer $n
 * @return Integer[]
 */
function missingRolls($rolls, $mean, $n) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example 1
$rolls = [3, 2, 4, 3];
$mean = 4;
$n = 2;
print_r(missingRolls($rolls, $mean, $n));

// Example 2
$rolls = [1, 5, 6];
$mean = 3;
$n = 4;
print_r(missingRolls($rolls, $mean, $n));

// Example 3
$rolls = [1, 2, 3, 4];
$mean = 6;
$n = 4;
print_r(missingRolls($rolls, $mean, $n));
?>
```

### Explanation:

1. **Input:**
    - `rolls = [3, 2, 4, 3]`
    - `mean = 4`
    - `n = 2`

2. **Steps:**
    - The total number of rolls is `n + m = 6`.
    - The total sum needed is `6 * 4 = 24`.
    - The sum of the given rolls is `3 + 2 + 4 + 3 = 12`.
    - The sum required for the missing rolls is `24 - 12 = 12`.

   We need two missing rolls that sum up to 12, and the only possibility is `[6, 6]`.

3. **Result:**
    - For example 1: The output is `[6, 6]`.
    - For example 2: The output is `[2, 3, 2, 2]`.
    - For example 3: No valid solution, so the output is `[]`.

### Time Complexity:
- Calculating the sum of `rolls` takes O(m), and distributing the `missing_sum` takes O(n). Hence, the overall time complexity is **O(n + m)**, which is efficient for the input constraints.

This solution ensures that we either find valid missing rolls or return an empty array when no solution exists.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
