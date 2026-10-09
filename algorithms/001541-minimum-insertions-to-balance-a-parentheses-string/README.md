1541\. Minimum Insertions to Balance a Parentheses String

**Difficulty:** Medium

**Topics:** `Staff`, `String`, `Stack`, `Greedy`, `Bracket Sequences`, `Biweekly Contest 32`

Given a parentheses string `s` containing only the characters `'('` and `')'`. A parentheses string is **balanced** if:

- Any left parenthesis `'('` must have a corresponding two consecutive right parenthesis `'))'`.
- Left parenthesis `'('` must go before the corresponding two consecutive right parenthesis `'))'`.

In other words, we treat `'('` as an opening parenthesis and `'))'` as a closing parenthesis.

- For example, `"())"`, `"())(())))"` and `"(())())))"` are balanced, `")()"`, `"()))"` and `"(()))"` are not balanced.

You can insert the characters `'('` and `')'` at any position of the string to balance it if needed.

Return _the minimum number of insertions_ needed to make `s` balanced.

**Example 1:**

- **Input:** s = "(()))"
- **Output:** 1
- **Explanation:** The second '(' has two matching '))', but the first '(' has only ')' matching. We need to add one more ')' at the end of the string to be "(())))" which is balanced.

**Example 2:**

- **Input:** s = "())"
- **Output:** 0
- **Explanation:** The string is already balanced.

**Example 3:**

- **Input:** s = "))())("
- **Output:** 3
- **Explanation:** Add '(' to match the first '))', Add '))' to match the last '('.

**Example 4:**

- **Input:** s = ")"
- **Output:** 2

**Example 5:**

- **Input:** s = "()"
- **Output:** 1

**Example 6:**

- **Input:** s = "((("
- **Output:** 6

**Example 7:**

- **Input:** s = "(()"
- **Output:** 3

**Example 8:**

- **Input:** s = "())())"
- **Output:** 0

**Example 9:**

- **Input:** s = "()())"
- **Output:** 1

**Example 10:**

- **Input:** s = "))"
- **Output:** 1

**Example 11:**

- **Input:** s = ")("
- **Output:** 4

**Example 12:**

- **Input:** s = "))("
- **Output:** 3

**Constraints:**

- `1 <= s.length <= 10⁵`
- `s` consists of `'('` and `')'` only.


**Hint:**

1. Use a stack to keep opening brackets. If you face single closing `')'` add 1 to the answer and consider it as `'))'`.
2. If you have `'))'` with empty stack, add 1 to the answer, If after finishing you have `x` opening remaining in the stack, add `2x` to the answer.


**Similar Questions:**

1. [1963. Minimum Number of Swaps to Make the String Balanced](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001963-minimum-number-of-swaps-to-make-the-string-balanced)


**Solution:**

We scan `s` left-to-right, tracking unmatched `'('` and greedily inserting only the characters needed to form valid `'))'` closures. This gives the minimum insertions in `O(n)` time and `O(1)` extra space.

## Approach

- Initialize `$open = 0` for unmatched `'('` and `$ans = 0` for insertions.
- Traverse the string once.
- When seeing `'('`, increment `$open`.
- When seeing `')'`:
    - If the next character is also `')'` and `$open > 0`, consume both as `'))'`, decrement `$open`, and skip the next character.
    - Else if `$open > 0`, the current `')'` is a lone closing parenthesis; insert one more `')'`, increment `$ans`, and decrement `$open`.
    - Else there is no unmatched `'('`:
        - If the next character is `')'`, insert `'('` before `'))'`, increment `$ans`, and skip the next character.
        - Otherwise, insert both `'('` and `')'`, adding `2` to `$ans`.
- After the loop, each remaining unmatched `'('` needs `'))'`, so add `2 * $open` to `$ans`.

Let's implement this solution in PHP: **[1541. Minimum Insertions to Balance a Parentheses String](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001541-minimum-insertions-to-balance-a-parentheses-string/solution.php)**

```php
<?php
/**
 * @param String $s
 * @return Integer
 */
function minInsertions(string $s): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo minInsertions("(()))") .  "\n";        // Output: 1
echo minInsertions("())") .  "\n";          // Output: 0
echo minInsertions("))())(") .  "\n";       // Output: 3
echo minInsertions(")") .  "\n";            // Output: 2
echo minInsertions("()") .  "\n";           // Output: 1
echo minInsertions("(((") .  "\n";          // Output: 6
echo minInsertions("(()") .  "\n";          // Output: 3
echo minInsertions("())())") .  "\n";       // Output: 0
echo minInsertions("()())") .  "\n";        // Output: 1
echo minInsertions("))") .  "\n";           // Output: 1
echo minInsertions(")(") .  "\n";           // Output: 4
echo minInsertions("))(") .  "\n";          // Output: 3
?>
```

### Explanation:

- A valid closing unit is exactly `'))'`, not a single `')'`.
- Greedy matching is safe because each `'))'` can only close an earlier unmatched `'('`.
- If an unmatched `'('` exists and only one `')'` is available, we must insert the missing second `')'`.
- If no unmatched `'('` exists, a `'))'` needs an inserted `'('`; a lone `')'` needs both an inserted `'('` and an extra `')'`.
- Any leftover `'('` at the end has no closure, so each costs two insertions.

## Complexity Analysis

- Time: `O(n)` — one pass over the string; skipped characters are not revisited.
- Space: `O(1)` — only integer counters are used.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**