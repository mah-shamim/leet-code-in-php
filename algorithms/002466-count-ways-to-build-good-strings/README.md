2466\. Count Ways To Build Good Strings

**Difficulty:** Medium

**Topics:** `Dynamic Programming`

Given the integers `zero`, `one`, `low`, and `high`, we can construct a string by starting with an empty string, and then at each step perform either of the following:

- Append the character `'0'` `zero` times.
- Append the character `'1'` `one` times.

This can be performed any number of times.

A **good** string is a string constructed by the above process having a **length** between `low` and `high` (**inclusive**).

Return _the number of **different** good strings that can be constructed satisfying these properties_. Since the answer can be large, return it **modulo** <code>10<sup>9</sup> + 7</code>.

**Example 1:**

- **Input:** low = 3, high = 3, zero = 1, one = 1
- **Output:** 8
- **Explanation:**  
  One possible valid good string is "011".
  It can be constructed as follows: "" -> "0" -> "01" -> "011".
  All binary strings from "000" to "111" are good strings in this example.

**Example 2:**

- **Input:** low = 2, high = 3, zero = 1, one = 2
- **Output:** 5
- **Explanation:** The good strings are "00", "11", "000", "110", and "011".



**Constraints:**

- <code>1 <= low <= high <= 10<sup>5</sup></code>
- `1 <= zero, one <= low`


**Hint:**
1. Calculate the number of good strings with length less or equal to some constant `x`.
2. Apply dynamic programming using the group size of consecutive zeros and ones.



**Solution:**

We need to focus on constructing strings of different lengths and counting the number of valid strings that meet the given conditions. Let's break down the approach:

### Problem Breakdown
1. **State Definition:**
   Let `dp[i]` represent the number of valid strings of length `i` that can be constructed using the provided `zero` and `one` values.

2. **Recurrence Relation:**
   - From any length `i`, we can append either:
      - `zero` consecutive `0`s, so the previous string would be of length `i-zero`, and we would add `dp[i-zero]` ways.
      - `one` consecutive `1`s, so the previous string would be of length `i-one`, and we would add `dp[i-one]` ways.

   The recurrence relation becomes:
   <code>dp[i] = dp[i - zero] + dp[i - one] (mod 10<sup>9</sup> + 7)</code>

3. **Base Case:**
   - There is exactly one way to construct an empty string: `dp[0] = 1`.

4. **Final Computation:**
   - The total number of valid strings of length between `low` and `high` is the sum of `dp[i]` for all `i` from `low` to `high`.

### Solution Steps
1. Initialize a `dp` array of size `high + 1` where each index `i` represents the number of valid strings of length `i`.
2. Loop through each possible length `i` from 1 to `high`, updating `dp[i]` based on the recurrence relation.
3. Compute the sum of `dp[i]` from `low` to `high` to get the final result.

Let's implement this solution in PHP: **[2466. Count Ways To Build Good Strings](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002466-count-ways-to-build-good-strings/solution.php)**

```php
<?php
function countGoodStrings($low, $high, $zero, $one) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example Usage
$low = 3;
$high = 3;
$zero = 1;
$one = 1;
echo countGoodStrings($low, $high, $zero, $one); // Output: 8

$low = 2;
$high = 3;
$zero = 1;
$one = 2;
echo countGoodStrings($low, $high, $zero, $one); // Output: 5
?>
```

### Explanation:

1. **Initialization:** We start by setting the base case `dp[0] = 1`, meaning that there is one way to form a string of length `0` (the empty string).
2. **Dynamic Programming Update:** For each possible string length `i` from 1 to `high`, we check if we can append a string of length `zero` or `one` to a smaller string. We update `dp[i]` accordingly by adding the number of ways to form a string of length `i-zero` and `i-one`, ensuring that the result is taken modulo _**10<sup>9</sup> + 7**_.
3. **Final Result Calculation:** We sum up all values of `dp[i]` for `i` in the range `[low, high]` to get the final count of valid strings.

### Time Complexity:
- Filling the `dp` array takes `O(high)`.
- Summing the valid results between `low` and `high` takes `O(high - low + 1)`.

Thus, the overall time complexity is _** O(high) **_, which is efficient enough for the input limits.

### Space Complexity:
- We use an array `dp` of size `high + 1`, so the space complexity is _**O(high)**_.

This solution efficiently solves the problem within the constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
