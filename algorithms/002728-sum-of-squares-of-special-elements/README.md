2728\. Sum of Squares of Special Elements

**Difficulty:** Easy

**Topics:** `Mid Level`, `Array`, `Enumeration`, `Weekly Contest 354`

You are given a **1-indexed** integer array `nums` of length `n`.

An element `nums[i]` of `nums` is called **special** if `i` divides `n`, i.e. `n % i == 0`.

Return _the **sum of the squares** of all special **elements** of nums_.

**Example 1:**

- **Input:** nums = [1,2,3,4]
- **Output:** 21
- **Explanation:** 
  - There are exactly 3 special elements in nums: `nums[1]` since 1 divides 4, `nums[2]` since 2 divides 4, and `nums[4]` since 4 divides 4.
  - Hence, the sum of the squares of all special elements of nums is `nums[1] * nums[1] + nums[2] * nums[2] + nums[4] * nums[4] = 1 * 1 + 2 * 2 + 4 * 4 = 21`.

**Example 2:**

- **Input:** nums = [2,7,1,19,18,3]
- **Output:** 63
- **Explanation:** 
  - There are exactly 4 special elements in nums: `nums[1]` since 1 divides 6, `nums[2]` since 2 divides 6, `nums[3]` since 3 divides 6, and `nums[6]` since 6 divides 6.
  - Hence, the sum of the squares of all special elements of nums is `nums[1] * nums[1] + nums[2] * nums[2] + nums[3] * nums[3] + nums[6] * nums[6] = 2 * 2 + 7 * 7 + 1 * 1 + 3 * 3 = 63`.

**Example 3:**

- **Input:** nums = [5]
- **Output:** 25

**Example 4:**

- **Input:** nums = [1,2]
- **Output:** 5

**Example 5:**

- **Input:** nums = [50,50]
- **Output:** 5000

**Constraints:**

- `1 <= nums.length == n <= 50`
- `1 <= nums[i] <= 50`


**Hint:**

1. Iterate over all the elements of the array. For each index `i`, check if it is special using the modulo operator.
2. if `n%i == 0`, index `i` is special, and you should add `nums[i]` to the answer.


**Similar Questions:**
1. [633. Sum of Square Numbers](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/00633-sum-of-square-numbers)
2. [1588. Sum of All Odd Length Subarrays](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001588-sum-of-all-odd-length-subarrays)


**Solution:**

We solve the problem by iterating over the **1-indexed** positions of `nums`, checking whether each position `i` divides the array length `n`. If it does, we add the square of the corresponding element to the total sum.

## Approach

- Let `n = count($nums)`.
- Iterate `i` from `1` to `n`, because the problem uses 1-based indexing.
- Check if `n % i == 0`.
- If true, `i` is a special index.
- Convert the 1-based index to PHP’s 0-based index using `$i - 1`.
- Add `nums[$i - 1] * nums[$i - 1]` to the result.
- Return the accumulated sum.

Let's implement this solution in PHP: **[2728. Sum of Squares of Special Elements](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002728-sum-of-squares-of-special-elements/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function sumOfSquares(array $nums): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo sumOfSquares([1,2,3,4]) .  "\n";               // Output: 21
echo sumOfSquares([2,7,1,19,18,3]) .  "\n";         // Output: 63
echo sumOfSquares([5]) .  "\n";                     // Output: 25
echo sumOfSquares([1,2]) .  "\n";                   // Output: 5
echo sumOfSquares([50,50]) .  "\n";                 // Output: 5000
?>
```

### Explanation:

- In PHP, arrays start at index `0`, but the problem defines special positions using 1-based indexing.
- For example, `nums[1]` in the problem corresponds to `$nums[0]` in PHP.
- The condition `n % i == 0` checks whether position `i` divides the total length `n`.
- For each valid special position, we square the value and add it to the answer.
- This directly follows the hint: check divisibility and accumulate squared values.

## Complexity Analysis

- **Time Complexity:** `O(n)` — we check each index from `1` to `n` exactly once.
- **Space Complexity:** `O(1)` — only a few scalar variables are used.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**