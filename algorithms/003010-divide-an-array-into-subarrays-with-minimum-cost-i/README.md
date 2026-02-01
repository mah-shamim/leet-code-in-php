3010\. Divide an Array Into Subarrays With Minimum Cost I

**Difficulty:** Easy

**Topics:** `Array`, `Sorting`, `Enumeration`, `Biweekly Contest 122`

You are given an array of integers `nums` of length `n`.

The **cost** of an array is the value of its **first** element. For example, the cost of `[1,2,3]` is `1` while the cost of `[3,4,1]` is `3`.

You need to divide `nums` into `3` **disjoint contiguous** subarrays[^1].

Return _the **minimum** possible **sum** of the cost of these subarrays_.

**Example 1:**

- **Input:** nums = [1,2,3,12]
- **Output:** 6
- **Explanation:** The best possible way to form 3 subarrays is: [1], [2], and [3,12] at a total cost of 1 + 2 + 3 = 6.
  The other possible ways to form 3 subarrays are:
  - [1], [2,3], and [12] at a total cost of 1 + 2 + 12 = 15.
  - [1,2], [3], and [12] at a total cost of 1 + 3 + 12 = 16.

**Example 2:**

- **Input:** nums = [5,4,3]
- **Output:** 12
- **Explanation:** The best possible way to form 3 subarrays is: [5], [4], and [3] at a total cost of 5 + 4 + 3 = 12.
  It can be shown that 12 is the minimum cost achievable.

**Example 3:**

- **Input:** nums = [10,3,1,1]
- **Output:** 12
- **Explanation:** The best possible way to form 3 subarrays is: [10,3], [1], and [1] at a total cost of 10 + 1 + 1 = 12.
  It can be shown that 12 is the minimum cost achievable.

**Constraints:**

- `3 <= n <= 50`
- `1 <= nums[i] <= 50`


[^1]: **Subarray:** A subarray is a contiguous non-empty sequence of elements within an array.



**Solution:**

We need to split the array into 3 contiguous subarrays and minimize the sum of their first elements. Since `n` is small (≤ 50), we can use a straightforward approach.

### Approach:

1. **Understanding the cost**: Each subarray's cost is its first element. So we need to choose two split points `i` and `j` where:
   - First subarray: `nums[0..i-1]`, cost = `nums[0]`
   - Second subarray: `nums[i..j-1]`, cost = `nums[i]`
   - Third subarray: `nums[j..n-1]`, cost = `nums[j]`

2. **Constraints on split points**:
   - `1 ≤ i ≤ n-2` (need at least 1 element for second and third subarrays)
   - `i+1 ≤ j ≤ n-1` (third subarray needs at least 1 element)

3. **Fixed first cost**: The first subarray always starts at index 0, so its cost is always `nums[0]`. We can't change this.

4. **Optimization**: We need to minimize `nums[0] + nums[i] + nums[j]` where `i` and `j` are valid split indices.

5. **Approach**: Try all possible pairs `(i, j)` and find the minimum sum.

Let's implement this solution in PHP: **[3010. Divide an Array Into Subarrays With Minimum Cost I](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003010-divide-an-array-into-subarrays-with-minimum-cost-i/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function minimumCost(array $nums): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo minimumCost([1,2,3,12]) . "\n";        // Output: 6
echo minimumCost([5,4,3]) . "\n";           // Output: 12
echo minimumCost([10,3,1,1]) . "\n";        // Output: 12
?>
```

### Explanation:

1. **Initialization**: Set `minCost` to a very large value (`PHP_INT_MAX`).

2. **Fixed first cost**: The first subarray's cost is always `nums[0]`.

3. **Nested loops**:
   - Outer loop: `i` from 1 to `n-2` (ensures we have at least 2 elements after `i` for second and third subarrays)
   - Inner loop: `j` from `i+1` to `n-1` (ensures third subarray has at least 1 element)

4. **Calculate cost**: For each valid `(i, j)` pair, compute the total cost as `nums[0] + nums[i] + nums[j]`.

5. **Update minimum**: Keep track of the minimum cost found.

### Complexity

- **Time Complexity**: O(n²) - We try all pairs of split points. With `n ≤ 50`, this is efficient.
- **Space Complexity**: O(1) - We only use a few variables.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**