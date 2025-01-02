650\. 2 Keys Keyboard

**Difficulty:** Medium

**Topics:** `Math`, `Dynamic Programming`

There is only one character `'A'` on the screen of a notepad. You can perform one of two operations on this notepad for each step:

- Copy All: You can copy all the characters present on the screen (a partial copy is not allowed).
- Paste: You can paste the characters which are copied last time.

Given an integer `n`, return _the minimum number of operations to get the character `'A'` exactly `n` times on the screen_.



**Example 1:**

- **Input:** n = 3
- **Output:** 3
- **Explanation:** Initially, we have one character 'A'.\
  In step 1, we use Copy All operation.\
  In step 2, we use Paste operation to get 'AA'.\
  In step 3, we use Paste operation to get 'AAA'.

**Example 2:**

- **Input:** n = 1
- **Output:** 0

**Example 3:**

- **Input:** n = 10
- **Output:** 7

**Example 2:**

- **Input:** n = 24
- **Output:** 9

**Constraints:**

- <code>1 <= n <= 1000</code>

**Hint:**
1. How many characters may be there in the clipboard at the last step if n = 3? n = 7? n = 10? n = 24?


**Solution:**


We need to find the minimum number of operations to get exactly `n` characters `'A'` on the screen. We'll use a dynamic programming approach to achieve this.

1. **Understanding the Problem:**
    - We start with one `'A'` on the screen.
    - We can either "Copy All" (which copies the current screen content) or "Paste" (which pastes the last copied content).
    - We need to determine the minimum operations required to have exactly `n` characters `'A'` on the screen.

2. **Dynamic Programming Approach:**
    - Use a dynamic programming (DP) array `dp` where `dp[i]` represents the minimum number of operations required to get exactly `i` characters on the screen.
    - Initialize `dp[1] = 0` since it takes 0 operations to have one `'A'` on the screen.
    - For each number of characters `i` from 2 to `n`, calculate the minimum operations by checking every divisor of `i`. If `i` is divisible by `d`, then:
        - The number of operations needed to reach `i` is the sum of the operations to reach `d` plus the operations required to multiply `d` to get `i`.

3. **Steps to Solve:**
    - Initialize a DP array with `INF` (or a large number) for all values except `dp[1]`.
    - For each `i` from 2 to `n`, iterate through possible divisors of `i` and update `dp[i]` based on the operations needed to reach `i` by copying and pasting.

Let's implement this solution in PHP: **[650. 2 Keys Keyboard](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000650-2-keys-keyboard/solution.php)**

```php
<?php
// Example usage
echo minOperations(3); // Output: 3
echo minOperations(1); // Output: 0
echo minOperations(10) . "\n"; // Output: 7
echo minOperations(24) . "\n"; // Output: 9
?>
```

### Explanation:

- **Initialization:** `dp` is initialized with a large number (`PHP_INT_MAX`) to represent an initially unreachable state.
- **Divisor Check:** For each number `i`, check all divisors `d`. Update `dp[i]` by considering the operations required to reach `d` and then multiplying to get `i`.
- **Output:** The result is the value of `dp[n]`, which gives the minimum operations required to get exactly `n` characters on the screen.

This approach ensures we compute the minimum operations efficiently for the given constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
