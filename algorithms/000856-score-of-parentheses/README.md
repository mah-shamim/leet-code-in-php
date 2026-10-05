856\. Score of Parentheses

**Difficulty:** Medium

**Topics:** `Staff`, `String`, `Stack`, `Bracket Sequences`, `Weekly Contest 90`

Given a balanced parentheses string `s`, return _the **score** of the string_.

The **score** of a balanced parentheses string is based on the following rule:

- `"()"` has score `1`.
- `AB` has score `A + B`, where `A` and `B` are balanced parentheses strings.
- `(A)` has score `2 * A`, where `A` is a balanced parentheses string.


**Example 1:**

- **Input:** s = "()"
- **Output:** 1

**Example 2:**

- **Input:** s = "(())"
- **Output:** 2

**Example 3:**

- **Input:** s = "()()"
- **Output:** 2

**Example 4:**

- **Input:** s = "(()())"
- **Output:** 4

**Example 5:**

- **Input:** s = "((()))"
- **Output:** 4

**Example 6:**

- **Input:** s = "()(())"
- **Output:** 3

**Example 7:**

- **Input:** s = "(())()"
- **Output:** 3

**Example 8:**

- **Input:** s = "(()(()))"
- **Output:** 6

**Constraints:**

- `2 <= s.length <= 50`
- `s` consists of only `'('` and `')'`.
- `s` is a balanced parentheses string.



**Solution:**

we use a stack-based solution to evaluate the balanced parentheses string level by level. Each `(` starts a new nested score frame, and each `)` closes the current frame, converts it into the correct score, then adds it to its parent frame.

## Approach

- Maintain a stack where each value represents the accumulated score at the current nesting level.
- Start with `[0]` for the outermost level.
- When seeing `(`:
    - Push `0` to start a new nested level.
- When seeing `)`:
    - Pop the completed inner score.
    - If the popped score is `0`, this pair is `"()"`, so its score is `1`.
    - Otherwise, this is `"(A)"`, so its score is `2 * innerScore`.
    - Add the computed score to the parent level, which is now the top of the stack.
- After processing all characters, `stack[0]` contains the total score.

Let's implement this solution in PHP: **[856. Score of Parentheses](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000856-score-of-parentheses/solution.php)**

```php
<?php
/**
 * @param String $s
 * @return Integer
 */
function scoreOfParentheses(string $s): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo scoreOfParentheses("()") . "\n";           // Output: 1
echo scoreOfParentheses("(())") . "\n";         // Output: 2
echo scoreOfParentheses("()()") . "\n";         // Output: 2
echo scoreOfParentheses("((()))") . "\n";       // Output: 4
echo scoreOfParentheses("((()))") . "\n";       // Output: 4
echo scoreOfParentheses("()(())") . "\n";       // Output: 3
echo scoreOfParentheses("(())()") . "\n";       // Output: 3
echo scoreOfParentheses("(()(()))") . "\n";     // Output: 6
?>
```

### Explanation:

- `"()"` contributes `1` because the popped inner score is `0`.
- `"(A)"` contributes `2 * A` because the popped inner score is `A`.
- `"AB"` is handled naturally by adding sibling scores into the same parent stack frame.
- The stack lets us correctly handle arbitrary nesting depth without recursion.

## Complexity Analysis

- **Time Complexity:** `O(n)` — each character is processed once.
- **Space Complexity:** `O(n)` — the stack can grow up to the maximum nesting depth.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**