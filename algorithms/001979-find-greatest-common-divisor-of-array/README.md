1979\. Find Greatest Common Divisor of Array

**Difficulty:** Easy

**Topics:** `Mid Level`, `Array`, `Math`, `Number Theory`, `Weekly Contest 255`

Given an integer array `nums`, return _the **greatest common divisor** of the smallest number and largest number in `nums`_.

The **greatest common divisor** of two numbers is the largest positive integer that evenly divides both numbers.

**Example 1:**

- **Input:** nums = [2,5,6,9,10]
- **Output:** 2
- **Explanation:**
  - The smallest number in nums is 2.
  - The largest number in nums is 10.
  - The greatest common divisor of 2 and 10 is 2.

**Example 2:**

- **Input:** nums = [7,5,6,8,3]
- **Output:** 1
- **Explanation:**
  - The smallest number in nums is 3.
  - The largest number in nums is 8.
  - The greatest common divisor of 3 and 8 is 1.

**Example 3:**

- **Input:** nums = [3,3]
- **Output:** 3
- **Explanation:**
  - The smallest number in nums is 3.
  - The largest number in nums is 3.
  - The greatest common divisor of 3 and 3 is 3.

**Example 4:**

- **Input:** nums = [12, 18, 24]
- **Output:** 12

**Example 5:**

- **Input:** nums = [100, 1, 50]
- **Output:** 1

**Example 6:**

- **Input:** nums = [16, 8, 4, 2]
- **Output:** 2

**Example 7:**

- **Input:** nums = [1, 2, 3, 4, 5]
- **Output:** 1

**Example 8:**

- **Input:** nums = [999, 1000]
- **Output:** 1

**Example 9:**

- **Input:** nums = [6, 6, 6]
- **Output:** 6


**Constraints:**

- `2 <= nums.length <= 1000`
- `1 <= nums[i] <= 1000`


**Hint:**
1. Find the minimum and maximum in one iteration. Let them be mn and mx.
2. Try all the numbers in the range [1, mn] and check the largest number which divides both of them.


**Similar Questions:**
1. [1071. Greatest Common Divisor of Strings](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001071-greatest-common-divisor-of-strings)
2. [1819. Number of Different Subsequences GCDs](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001819-number-of-different-subsequences-gcds)
3. [1952. Three Divisors](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001952-three-divisors)
4. [2413. Smallest Even Multiple](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002413-smallest-even-multiple)
5. [2447. Number of Subarrays With GCD Equal to K](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002447-number-of-subarrays-with-gcd-equal-to-k)
6. [3336. Find the Number of Subsequences With Equal GCD](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003336-find-the-number-of-subsequences-with-equal-gcd)
7. [3411. Maximum Subarray With Equal Products](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003411-maximum-subarray-with-equal-products)


**Solution:**

We've implemented an efficient solution that finds the greatest common divisor (GCD) of the minimum and maximum values in the given array using a backward iteration approach.

## Approach

- We first find the smallest (`min`) and largest (`max`) numbers in the array using PHP's built-in `min()` and `max()` functions.
- We then iterate from `min` down to `1`, checking if the current number evenly divides both `min` and `max`.
- The first number that satisfies this condition is the GCD and is immediately returned.
- If no divisor is found (which shouldn't happen since `1` always divides everything), we return `1`.

Let's implement this solution in PHP: **[1979. Find Greatest Common Divisor of Array](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001979-find-greatest-common-divisor-of-array/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function findGCD(array $nums): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo findGCD([2, 5, 6, 9, 10]) .  "\n";     // Output: 2
echo findGCD([7, 5, 6, 8, 3]) .  "\n";      // Output: 1
echo findGCD([3, 3]) .  "\n";               // Output: 3
echo findGCD([12, 18, 24]) .  "\n";         // Output: 12
echo findGCD([100, 1, 50]) .  "\n";         // Output: 1
echo findGCD([16, 8, 4, 2]) .  "\n";        // Output: 2
echo findGCD([1, 2, 3, 4, 5]) .  "\n";      // Output: 1
echo findGCD([999, 1000]) .  "\n";          // Output: 1
echo findGCD([6, 6, 6]) .  "\n";            // Output: 6
?>
```

### Explanation:

- **Find min and max**: By using `min()` and `max()`, we efficiently get the two values we need in O(n) time.
- **Start from the largest possible divisor**: The GCD cannot exceed the smaller of the two numbers, so we start from `min` and go downward.
- **Check divisibility**: For each `i` from `min` down to `1`, we test if both `min` and `max` are divisible by `i` using the modulo operator (`%`).
- **Return on first match**: The first `i` that divides both numbers is the greatest common divisor, so we return it immediately.
- **Fallback**: If the loop completes without returning (which only happens if `min` is `0`, but constraints guarantee `nums[i] >= 1`), we return `1`.

## Complexity Analysis

- **Time complexity**: _**O(n + min_val)**_
    - Finding min and max takes _**O(n)**_.
    - The loop runs at most `min` times, which is ≤ 1000 (as per constraints).
    - Overall, this is _**O(n + 1000)**_ → effectively _**O(n)**_ for practical limits.
- **Space complexity**: _**O(1)**_
    - We use only a few variables, no extra data structures.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**