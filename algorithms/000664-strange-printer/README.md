664\. Strange Printer

**Difficulty:** Hard

**Topics:** `String`, `Dynamic Programming`

There is a strange printer with the following two special properties:

- The printer can only print a sequence of **the same character** each time.
- At each turn, the printer can print new characters starting from and ending at any place and will cover the original existing characters.

Given a string `s,` return _the minimum number of turns the printer needed to print it_.

**Example 1:**

- **Input:** s = "aaabbb"
- **Output:** 2
- **Explanation:** Print "aaa" first and then print "bbb".

**Example 2:**

- **Input:** s = "aba"
- **Output:** 2
- **Explanation:** Print "aaa" first and then print "b" from the second place of the string, which will cover the existing character 'a'.

**Constraints:**

- <code>1 <= s.length <= 100</code>
- `s` consists of lowercase English letters.


**Solution:**

We can use dynamic programming. The idea is to minimize the number of turns required to print the string by breaking it down into subproblems.

The problem can be solved using dynamic programming. The idea is to divide the problem into smaller subproblems where you determine the minimum turns required to print every substring of `s`. We can leverage the following observation:

- If two adjacent characters are the same, you can extend a previous operation instead of counting it as a new operation.

### Dynamic Programming Solution

Let `dp[i][j]` be the minimum number of turns required to print the substring `s[i:j+1]`.

1. If `s[i] == s[j]`, then `dp[i][j] = dp[i][j-1]` because the last character `s[j]` can be printed with the previous operation.
2. Otherwise, `dp[i][j] = min(dp[i][k] + dp[k+1][j])` for all `i <= k < j`.


Let's implement this solution in PHP: **[664. Strange Printer](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000664-strange-printer/solution.php)**

```php
<?php
// Test the function with the given examples
echo strangePrinter("aaabbb") . "\n"; // Output: 2
echo strangePrinter("aba") . "\n";    // Output: 2
?>
```

### Explanation:

1. **DP Array:** The 2D array `dp[i][j]` represents the minimum number of turns required to print the substring from index `i` to `j`.

2. **Initialization:** We initialize `dp[i][i] = 1` because a single character can be printed in one turn.

3. **Filling the DP Table:**
   - If the characters at `i` and `j` are the same (`$s[$i] == $s[$j]`), then printing from `i` to `j` takes the same number of turns as printing from `i` to `j-1` since `$s[$j]` can be printed in the same turn as `$s[$i]`.
   - If they are different, we try to find the minimum number of turns by dividing the string at different points (`k`).

4. **Result:** The minimum number of turns required to print the entire string is stored in `dp[0][$n - 1]`.

This solution efficiently calculates the minimum number of turns required to print the string by considering all possible ways to split and print the string.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**

