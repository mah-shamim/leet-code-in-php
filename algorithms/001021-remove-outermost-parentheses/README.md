1021\. Remove Outermost Parentheses

**Difficulty:** Easy

**Topics:** `Staff`, `String`, `Stack`, `Bracket Sequences`, `Weekly Contest 131`

A valid parentheses string is either empty `""`, `"(" + A + ")"`, or `A + B`, where `A` and `B` are valid parentheses strings, and `+` represents string concatenation.

- For example, `""`, `"()"`, `"(())()"`, and `"(()(()))"` are all valid parentheses strings.

A valid parentheses string `s` is primitive if it is nonempty, and there does not exist a way to split it into `s = A + B`, with `A` and `B` nonempty valid parentheses strings.

Given a valid parentheses string `s`, consider its primitive decomposition: `s = P₁ + P₂ + ... + Pₖ`, where `Pᵢ` are primitive valid parentheses strings.

Return _`s` after removing the outermost parentheses of every primitive string in the primitive decomposition of `s`_.

**Example 1:**

- **Input:** s = "(()())(())"
- **Output:** "()()()"
- **Explanation:**
  - The input string is "(()())(())", with primitive decomposition "(()())" + "(())".
  - After removing outer parentheses of each part, this is "()()" + "()" = "()()()".

**Example 2:**

- **Input:** s = "(()())(())(()(()))"
- **Output:** "()()()()(())"
- **Explanation:**
  - The input string is "(()())(())(()(()))", with primitive decomposition "(()())" + "(())" + "(()(()))".
  - After removing outer parentheses of each part, this is "()()" + "()" + "(())" = "()()()()(())".

**Example 3:**

- **Input:** s = "()()"
- **Output:** ""
- **Explanation:**
  - The input string is "()()", with primitive decomposition "()" + "()".
  - After removing outer parentheses of each part, this is "" + "" = "".

**Example 4:**

- **Input:** s = "()"
- **Output:** ""

**Example 5:**

- **Input:** s = "(())"
- **Output:** "()"

**Example 6:**

- **Input:** s = "((()))"
- **Output:** "(())"

**Example 7:**

- **Input:** s = "(()(()))"
- **Output:** "()(())"

**Example 8:**

- **Input:** s = "()(())()"
- **Output:** "()"

**Example 9:**

- **Input:** s = "((()))()"
- **Output:** "(())"

**Example 10:**

- **Input:** s = "((()()))"
- **Output:** "(()())"

**Constraints:**

- `1 <= s.length <= 10⁵`
- `s[i]` is either `'('` or `')'`.
- `s` is a valid parentheses string.


**Hint:**

1. Can you find the primitive decomposition? The number of ( and ) characters must be equal.


**Solution:**

We scan the valid parentheses string once while tracking the current nesting depth. For each primitive valid parentheses component, we skip its first `'('` and its matching last `')'`, while keeping every inner parenthesis. This directly builds the required result without explicitly splitting the string into primitive components.

## Approach

- Initialize `result = ""` and `depth = 0`.
- Traverse each character of `s`.
- If the character is `'('`:
    - Append it only when `depth > 0`.
    - Then increment `depth`.
- If the character is `')'`:
    - Decrement `depth` first.
    - Append it only when `depth > 0` after decrementing.
- Return `result`.

Let's implement this solution in PHP: **[1021. Remove Outermost Parentheses](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001021-remove-outermost-parentheses/solution.php)**

```php
<?php
/**
 * @param String $s
 * @return String
 */
function removeOuterParentheses(string $s): string
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo removeOuterParentheses("(()())(())") .  "\n";              // Output: "()()()"
echo removeOuterParentheses("(()())(())(()(()))") .  "\n";      // Output: "()()()()(())"
echo removeOuterParentheses("()()") .  "\n";                    // Output: ""
echo removeOuterParentheses("()") .  "\n";                      // Output: ""
echo removeOuterParentheses("(())") .  "\n";                    // Output: "()"
echo removeOuterParentheses("((()))") .  "\n";                  // Output: "(())"
echo removeOuterParentheses("(()(()))") .  "\n";                // Output: "()(())"
echo removeOuterParentheses("()(())()") .  "\n";                // Output: "()"
echo removeOuterParentheses("((()))()") .  "\n";                // Output: "(())"
echo removeOuterParentheses("((()()))") .  "\n";                // Output: "(()())"
?>
```

### Explanation:

- A primitive valid parentheses string starts when `depth` goes from `0` to `1`.
- The opening `'('` that starts a primitive part is outermost, so we skip it by checking `depth > 0` before appending.
- Inner `'('` characters occur when `depth` is already greater than `0`, so they are kept.
- For `')'`, we decrement first because this closing bracket may end the current primitive part.
- If `depth` becomes `0`, that `')'` is the outermost closing bracket, so we skip it.
- If `depth` remains greater than `0`, it is an inner closing bracket, so we keep it.
- This works naturally for concatenated primitive strings such as `"(()())(())"`.

## Complexity Analysis

- Time Complexity: `O(n)`, where `n` is the length of `s`. We traverse the string once.
- Space Complexity: `O(n)` for the output string. Auxiliary space is `O(1)` because only a few variables are used.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**