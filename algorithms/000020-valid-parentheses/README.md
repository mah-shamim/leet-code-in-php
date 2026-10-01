20\. Valid Parentheses

**Difficulty:** Easy

**Topics:** `String`, `Stack`, `Bracket Sequences`

Given a string `s` containing just the characters `'('`, `')'`, `'{'`, `'}'`, `'['` and `']'`, determine if the input string is valid.

An input string is valid if:

1. Open brackets must be closed by the same type of brackets.
2. Open brackets must be closed in the correct order.
3. Every close bracket has a corresponding open bracket of the same type.


**Example 1:**

- **Input:** s = "()"
- **Output:** true

**Example 2:**

- **Input:** s = "()[]{}"
- **Output:** true

**Example 3:**

- **Input:** s = "(]"
- **Output:** false

**Example 4:**

- **Input:** s = "([])"
- **Output:** true

**Example 5:**

- **Input:** s = "([)]"
- **Output:** false

**Example 6:**

- **Input:** s = "{[]}"
- **Output:** true

**Example 7:**

- **Input:** s = "([]"
- **Output:** false

**Example 8:**

- **Input:** s = "((()))"
- **Output:** true

**Example 9:**

- **Input:** s = "((("
- **Output:** false

**Example 10:**

- **Input:** s = ")))"
- **Output:** false

**Example 11:**

- **Input:** s = "}{"
- **Output:** false

**Example 12:**

- **Input:** s = "[({})]"
- **Output:** true

**Example 13:**

- **Input:** s = "[(])"
- **Output:** false

**Constraints:**

- `1 <= s.length <= 10⁴`
- `s` consists of parentheses only `'()[]{}'`.


**Hint:**

1. Use a stack of characters.
2. When you encounter an opening bracket, push it to the top of the stack.
3. When you encounter a closing bracket, check if the top of the stack was the opening for it. If yes, pop it from the stack. Otherwise, return false.


**Similar Questions:**

1. [22. Generate Parentheses](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000022-generate-parentheses)
2. [32. Longest Valid Parentheses](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000032-longest-valid-parentheses)
3. [301. Remove Invalid Parentheses](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000301-remove-invalid-parentheses)
4. [1003. Check If Word Is Valid After Substitutions](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001003-check-if-word-is-valid-after-substitutions)
5. [2116. Check if a Parentheses String Can Be Valid](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002116-check-if-a-parentheses-string-can-be-valid)
6. [2337. Move Pieces to Obtain a String](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002337-move-pieces-to-obtain-a-string)


**Solution:**

We solve **Valid Parentheses** by scanning the string from left to right and using a **stack** to track unmatched opening brackets. Every closing bracket must match the most recent unmatched opening bracket. If the stack is empty at the end, the string is valid.

## Approach

- Initialize an empty stack.
- Create a mapping from each closing bracket to its matching opening bracket:
    - `)` → `(`
    - `]` → `[`
    - `}` → `{`
- Traverse each character in the string `s`.
- If the character is an opening bracket, push it onto the stack.
- If the character is a closing bracket:
    - If the stack is empty, return `false`.
    - Pop the top element from the stack.
    - If the popped opening bracket does not match the current closing bracket, return `false`.
- After processing all characters, return `true` only if the stack is empty.

Let's implement this solution in PHP: **[20. Valid Parentheses](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000020-valid-parentheses/solution.php)**

```php
<?php
/**
 * @param String $s
 * @return Boolean
 */
function isValid(string $s): bool
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo isValid("()") ? "true" : "false";          // Output: true
echo isValid("()[]{}") ? "true" : "false";      // Output: true
echo isValid("(]") ? "true" : "false";          // Output: false
echo isValid("([])") ? "true" : "false";        // Output: true
echo isValid("([)]") ? "true" : "false";        // Output: false
echo isValid("{[]}") ? "true" : "false";        // Output: true
echo isValid("([]") ? "true" : "false";         // Output: false
echo isValid("((()))") ? "true" : "false";      // Output: true
echo isValid("(((") ? "true" : "false";         // Output: false
echo isValid(")))") ? "true" : "false";         // Output: false
echo isValid("}{") ? "true" : "false";          // Output: false
echo isValid("[({})]") ? "true" : "false";      // Output: true
echo isValid("[(])") ? "true" : "false";        // Output: false
?>
```

### Explanation:

- The stack follows **LIFO** order, which naturally handles nested brackets.
- Opening brackets are stored until their matching closing bracket appears.
- A closing bracket must close the most recently opened unmatched bracket.
- If a closing bracket appears with an empty stack, it has no matching opening bracket.
- If a closing bracket does not match the top of the stack, the order or type is invalid.
- If any opening brackets remain in the stack after the loop, they were never closed.

## Complexity Analysis

- **Time Complexity:** `O(n)`
    - Each character is processed once.
    - Each opening bracket is pushed once and popped at most once.
- **Space Complexity:** `O(n)`
    - In the worst case, the stack stores all opening brackets, such as `"((((((("`.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**