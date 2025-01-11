1963\. Minimum Number of Swaps to Make the String Balanced

**Difficulty:** Medium

**Topics:** `Two Pointers`, `String`, `Stack`, `Greedy`

You are given a **0-indexed** string `s` of **even** length `n`. The string consists of **exactly** `n / 2` opening brackets `'['` and `n / 2` closing brackets `']'`.

A string is called **balanced** if and only if:

- It is the empty string, or
- It can be written as `AB`, where both `A` and `B` are **balanced** strings, or
- It can be written as `[C]`, where `C` is a **balanced** string.

You may swap the brackets at **any** two indices **any** number of times.

Return _the **minimum** number of swaps to make `s` **balanced**_.

**Example 1:**

- **Input:** s = "][]["
- **Output:** 1
- **Explanation:** You can make the string balanced by swapping index 0 with index 3.\
  The resulting string is "[[]]".

**Example 2:**

- **Input:** s = "]]][[["
- **Output:** 2
- **Explanation:** You can do the following to make the string balanced:
  - Swap index 0 with index 4. s = "[]][][".
  - Swap index 1 with index 5. s = "[[][]]".\
    The resulting string is "[[][]]".


**Example 3:**

- **Input:** s = "[]"
- **Output:** 0
- **Explanation:** The string is already balanced.


**Constraints:**

- `n == s.length`
- <code>2 <= n <= 10<sup>6</sup></code>
- `n` is even.
- `s[i]` is either `'['` or `']'`.
- The number of opening brackets `'['` equals `n / 2`, and the number of closing brackets `']'` equals `n / 2`.


**Hint:**
1. Iterate over the string and keep track of the number of opening and closing brackets on each step.
2. If the number of closing brackets is ever larger, you need to make a swap.
3. Swap it with the opening bracket closest to the end of s.



**Solution:**

We can use a **two-pointers** approach, which is efficient given the constraints.

### Approach:
1. **Track Balance**: As we iterate through the string, we can track the balance between opening and closing brackets:
   - Increment the balance when encountering `'['`.
   - Decrement the balance when encountering `']'`.

2. **Identify Imbalance**: When the balance becomes negative, it indicates that there are more closing brackets `']'` than opening brackets `'['` at that point in the string. This is where we need to swap brackets to make the string balanced.

3. **Count Swaps**: To correct an imbalance:
   - Keep a counter `max_imbalance` to track the maximum imbalance observed during the iteration.
   - The required number of swaps is equal to `(max_imbalance + 1) / 2`, which effectively gives the minimum number of swaps needed to make the string balanced.

Let's implement this solution in PHP: **[1963. Minimum Number of Swaps to Make the String Balanced](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001963-minimum-number-of-swaps-to-make-the-string-balanced/solution.php)**

```php
<?php
/**
 * @param String $s
 * @return Integer
 */
function minSwaps($s) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
$s1 = "][][";
echo minSwaps($s1); // Output: 1

$s2 = "]]][[[";
echo minSwaps($s2); // Output: 2

$s3 = "[]";
echo minSwaps($s3); // Output: 0
?>
```

### Explanation:

1. **Balance Tracking**:
   - `balance` keeps track of the difference between the number of `'['` and `']'`.
   - If `balance` becomes negative, it indicates that there are more `']'` than `'['` at that point.

2. **Calculate Maximum Imbalance**:
   - `max_imbalance` stores the largest imbalance encountered during the iteration.
   - If `balance` becomes negative, update `max_imbalance` with the larger of `max_imbalance` or `-balance`.

3. **Calculate Swaps**:
   - To fix an imbalance, the minimum swaps required is `(max_imbalance + 1) / 2`.

### Time Complexity:
- The time complexity is **O(n)**, where `n` is the length of the string. We iterate through the string once to determine the `max_imbalance`.
- The space complexity is **O(1)** as we use a few variables for tracking the balance and maximum imbalance.

This solution ensures that we meet the constraints, even for large inputs.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**