2116\. Check if a Parentheses String Can Be Valid

**Difficulty:** Medium

**Topics:** `String`, `Stack`, `Greedy`

A parentheses string is a `non-empty` string consisting only of `'('` and `')'`. It is valid if any of the following conditions is `true`:

- It is `()`.
- It can be written as `AB` (`A` concatenated with `B`), where `A` and `B` are valid parentheses strings.
- It can be written as `(A)`, where `A` is a valid parentheses string.

You are given a parentheses string `s` and a string `locked`, both of length `n`. `locked` is a binary string consisting only of `'0'`s and `'1'`s. For **each** index `i` of `locked`,

- If locked[`i]` is `'1'`, you **cannot** change `s[i]`.
- But if `locked[i]` is `'0'`, you **can** change `s[i]` to either `'('` or `')'`.

Return _`true` if you can make `s` a valid parentheses string_. Otherwise, return `false`.

**Example 1:**

![eg1](https://assets.leetcode.com/uploads/2021/11/06/eg1.png)

- **Input:** s = "))()))", locked = "010100"
- **Output:** true
- **Explanation:** locked[1] == '1' and locked[3] == '1', so we cannot change s[1] or s[3].
  We change s[0] and s[4] to '(' while leaving s[2] and s[5] unchanged to make s valid.

**Example 2:**

- **Input:** s = "()()", locked = "0000"
- **Output:** true
- **Explanation:** We do not need to make any changes because s is already valid.


**Example 3:**

- **Input:** s = ")", locked = "0"
- **Output:** false
- **Explanation:** locked permits us to change s[0].
  Changing s[0] to either '(' or ')' will not make s valid.



**Constraints:**

- `n == s.length == locked.length`
- <code>1 <= n <= 10<sup>5</sup></code>
- `s[i]` is either `'('` or `')'`.
- `locked[i]` is either `'0'` or `'1'`.


**Hint:**
1. Can an odd length string ever be valid?
2. From left to right, if a locked ')' is encountered, it must be balanced with either a locked '(' or an unlocked index on its left. If neither exist, what conclusion can be drawn? If both exist, which one is more preferable to use?
3. After the above, we may have locked indices of '(' and additional unlocked indices. How can you balance out the locked '(' now? What if you cannot balance any locked '('?



**Solution:**

We can approach it step by step, keeping in mind the constraints and the behavior of the locked positions.

### Key Points:
1. If the length of the string is odd, we can immediately return `false` because a valid parentheses string must have an even length (each opening `(` needs a closing `)`).
2. We need to keep track of the number of open parentheses (`(`) and closed parentheses (`)`) as we iterate through the string. If at any point the number of closing parentheses exceeds the number of opening ones, it's impossible to balance the string and we return `false`.
3. We must carefully handle the positions that are locked (`locked[i] == '1'`) and unlocked (`locked[i] == '0'`). Unlocked positions allow us to change the character, but locked positions do not.

### Algorithm:
- **Step 1:** Check if the length of the string `s` is odd. If so, return `false` immediately.
- **Step 2:** Loop through the string from left to right to track the balance of parentheses.
    - Use a counter to track the balance between opening `(` and closing `)` parentheses.
    - If at any point, the number of closing parentheses exceeds the opening parentheses, check if the locked positions have enough flexibility to balance it.
    - After processing the entire string, check if the parentheses are balanced, i.e., if there are no leftover unmatched opening parentheses.

Let's implement this solution in PHP: **[2116. Check if a Parentheses String Can Be Valid](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002116-check-if-a-parentheses-string-can-be-valid/solution.php)**

```php
<?php
/**
 * @param String $s
 * @param String $locked
 * @return Boolean
 */
function canBeValid($s, $locked) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
$s = "))()))";
$locked = "010100";
var_dump(canBeValid($s, $locked));  // Output: bool(true)

$s = "()()";
$locked = "0000";
var_dump(canBeValid($s, $locked));  // Output: bool(true)

$s = ")";
$locked = "0";
var_dump(canBeValid($s, $locked));  // Output: bool(false)
?>
```

### Explanation:

1. **First pass (left to right):**
    - We iterate through the string and track the balance of open parentheses. Each time we encounter an open parenthesis `(`, we increment the `open` counter. For a closed parenthesis `)`, we decrement the `open` counter.
    - If the current character is unlocked (`locked[i] == '0'`), we can assume it to be `(` if needed to balance the parentheses.
    - If at any point the `open` counter goes negative, it means we have more closing parentheses than opening ones, and we return `false`.

2. **Second pass (right to left):**
    - We perform a similar operation in reverse to handle the scenario of unmatched opening parentheses that might be at the end of the string.
    - Here we track closing parentheses (`)`) with the `close` counter and ensure that no unbalanced parentheses exist.

3. **Edge Case:** If the string length is odd, we immediately return `false` because it cannot form a valid parentheses string.

### Time Complexity:
- Both passes (left-to-right and right-to-left) take linear time, O(n), where `n` is the length of the string. Thus, the overall time complexity is O(n), which is efficient for the input size constraints.

This solution correctly handles the problem within the given constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
