22\. Generate Parentheses

**Difficulty:** Medium

**Topics:** `String`, `Dynamic Programming`, `Backtracking`, `Bracket Sequences`

Given `n` pairs of parentheses, write a function to _generate all combinations of well-formed parentheses_.

**Example 1:**

- **Input:** n = 3
- **Output:** ["((()))","(()())","(())()","()(())","()()()"]

**Example 2:**

- **Input:** n = 1
- **Output:** ["()"]

**Example 3:**

- **Input:** n = 2
- **Output:** ["(())","()()"]

**Example 4:**

- **Input:** n = 4
- **Output:** ["(((())))", "((()()))", "((())())", "((()))()", "(()(()))", "(()()())", "(()())()", "(())(())", "(())()()", "()((()))", "()(()())", "()(())()", "()()(())", "()()()()"]

**Constraints:**

- `1 <= n <= 8`


****Similar Questions:**

1. [17. Letter Combinations of a Phone Number](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000017-letter-combinations-of-a-phone-number)
2. [20. Valid Parentheses](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000020-valid-parentheses)
3. [2116. Check if a Parentheses String Can Be Valid](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002116-check-if-a-parentheses-string-can-be-valid)


**Solution:**

We use a backtracking algorithm to build valid parentheses strings one character at a time. At each step, we only add `'('` if we still have opening brackets left, and we only add `')'` if it will not make the prefix invalid. Once the string reaches length `2 * n`, it is a complete well-formed combination.

## Approach

- Start with an empty string and two counters: `open` and `close`.
- If the current string length is `2 * n`, add it to the result.
- If `open < n`, append `'('` and recurse.
- If `close < open`, append `')'` and recurse.
- Return all generated valid strings.

Let's implement this solution in PHP: **[22. Generate Parentheses](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000022-generate-parentheses/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @return String[]
 */
function generateParenthesis(int $n): array
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param int $n
 * @param string $current
 * @param int $open
 * @param int $close
 * @param array $result
 * @return void
 */
function backtrack(int $n, string $current, int $open, int $close, array &$result): void {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}


// Test cases
print_r(generateParenthesis(3)) . "\n"; // Output: ["((()))","(()())","(())()","()(())","()()()"]
print_r(generateParenthesis(1)) . "\n"; // Output: ["()"]
print_r(generateParenthesis(2)) . "\n"; // Output: ["(())","()()"]
print_r(generateParenthesis(4)) . "\n"; // Output: ["(((())))", "((()()))", "((())())", "((()))()", "(()(()))", "(()()())", "(()())()", "(())(())", "(())()()", "()((()))", "()(()())", "()(())()", "()()(())", "()()()()"]
?>
```

### Explanation:

- A valid parentheses sequence must never have more closing brackets than opening brackets in any prefix.
- Therefore, `')'` can only be added when `close < open`.
- We cannot use more than `n` opening brackets, so `'('` can only be added when `open < n`.
- This prunes invalid branches early and only explores valid prefixes.
- When the string length becomes `2 * n`, both counters must be `n`, so the string is complete and valid.

## Complexity Analysis

- Number of valid combinations is the Catalan number: `C_n = (1 / (n + 1)) * binomial(2n, n)`
- Time complexity: `O(n * C_n)` because each valid string has length `2n` and we build strings by concatenation.
- Auxiliary space: `O(n)` for the recursion stack.
- Output space: `O(n * C_n)` to store all valid strings.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**