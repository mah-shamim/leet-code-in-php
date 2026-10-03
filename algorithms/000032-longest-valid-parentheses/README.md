32\. Longest Valid Parentheses

**Difficulty:** Hard

**Topics:** `String`, `Dynamic Programming`, `Stack`, `Bracket Sequences`

Given a string containing just the characters `'('` and `')'`, return _the length of the longest valid (well-formed) parentheses **substring[^1]**_.

[^1]: **Substring:** A **substring** is a contiguous **non-empty** sequence of characters within a string.

**Example 1:**

- **Input:** s = "(()"
- **Output:** 2
- **Explanation:** The longest valid parentheses substring is "()".

**Example 2:**

- **Input:** s = ")()())"
- **Output:** 4
- **Explanation:** The longest valid parentheses substring is "()()".

**Example 3:**

- **Input:** s = ""
- **Output:** 0

**Example 4:**

- **Input:** s = "("
- **Output:** 0

**Example 5:**

- **Input:** s = ")"
- **Output:** 0

**Example 6:**

- **Input:** s = "()"
- **Output:** 2

**Example 7:**

- **Input:** s = "()()"
- **Output:** 4

**Example 8:**

- **Input:** s = "(())"
- **Output:** 4

**Example 9:**

- **Input:** s = "(()())"
- **Output:** 6

**Example 10:**

- **Input:** s = "()(())"
- **Output:** 6

**Example 11:**

- **Input:** s = "((()))"
- **Output:** 6

**Example 12:**

- **Input:** s = ")("
- **Output:** 0

**Example 13:**

- **Input:** s = "())"
- **Output:** 2

**Example 14:**

- **Input:** s = "((())"
- **Output:** 4

**Example 15:**

- **Input:** s = "()(()"
- **Output:** 2

**Example 16:**

- **Input:** s = "())(()"
- **Output:** 2


**Constraints:**

- `0 <= s.length <= 3 * 10⁴`
- `s[i]` is `'('`, or `')'`.


**Similar Questions:**
1. [20. Valid Parentheses](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000020-valid-parentheses)


**Solution:**

We use a single-pass stack-based solution. The stack stores indices of unmatched `'('` characters plus a base index for the last invalid position. Whenever a valid pair is closed, we compute the current valid substring length using the index at the top of the stack.

## Approach

- Initialize `$stack = [-1]` as the base index before the string starts.
- Traverse the string from left to right.
- If the current character is `'('`, push its index onto the stack.
- If the current character is `')'`, pop the top index.
- If the stack becomes empty after popping, push the current index as the new base.
- Otherwise, calculate the valid substring length as `currentIndex - stackTop`.
- Keep track of the maximum length seen.

Let's implement this solution in PHP: **[32. Longest Valid Parentheses](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000032-longest-valid-parentheses/solution.php)**

```php
<?php
/**
 * @param String $s
 * @return Integer
 */
function longestValidParentheses(string $s): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo longestValidParentheses("(()") .  "\n";        // Output: 2
echo longestValidParentheses(")()())") .  "\n";     // Output: 4
echo longestValidParentheses("") .  "\n";           // Output: 0
echo longestValidParentheses("(") .  "\n";          // Output: 0
echo longestValidParentheses(")") .  "\n";          // Output: 0
echo longestValidParentheses("()") .  "\n";         // Output: 2
echo longestValidParentheses("()()") .  "\n";       // Output: 4
echo longestValidParentheses("(())") .  "\n";       // Output: 4
echo longestValidParentheses("(()())") .  "\n";     // Output: 6
echo longestValidParentheses("()(())") .  "\n";     // Output: 6
echo longestValidParentheses("((()))") .  "\n";     // Output: 6
echo longestValidParentheses(")(") .  "\n";         // Output: 0
echo longestValidParentheses("())") .  "\n";        // Output: 2
echo longestValidParentheses("((())") .  "\n";      // Output: 4
echo longestValidParentheses("()(()") .  "\n";      // Output: 2
echo longestValidParentheses("())(()") .  "\n";     // Output: 2
?>
```

### Explanation:

- The stack always keeps track of unmatched `'('` indices and the most recent invalid `')'` base index.
- For `'('`, we cannot know yet if it forms a valid pair, so we store its index.
- For `')'`, popping simulates matching it with the most recent unmatched `'('`.
- If no unmatched `'('` exists, the current `')'` is invalid and becomes the new base.
- If a match exists, the distance from the current index to the new stack top gives the length of the current valid **parentheses** substring.
- This works for both contiguous valid substrings like `"()()"` and nested ones like `"(())"`.

## Complexity Analysis

- **Time Complexity:** `O(n)`, where `n` is the length of the string. Each character is processed once.
- **Space Complexity:** `O(n)` in the worst case, because the stack may store all opening parentheses.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**