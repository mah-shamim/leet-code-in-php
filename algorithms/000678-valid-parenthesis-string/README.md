678\. Valid Parenthesis String

**Difficulty:** Medium

**Topics:** `String`, `Dynamic Programming`, `Stack`, `Greedy`

Given a string `s` containing only three types of characters: `'('`, `')'` and `'*'`, return `true` if `s` is **valid**.

The following rules define a **valid** string:

* Any left parenthesis `'('` must have a corresponding right parenthesis `')'`.
* Any right parenthesis `')'` must have a corresponding left parenthesis `'('`.
* Left parenthesis `'('` must go before the corresponding right parenthesis `')'`.
* '*' could be treated as a single right parenthesis `')'` or a single left parenthesis `'('` or an empty string `""`.

**Example 1:**

**Input:** <code>**s = "()"**</code>
**Output:** <code>**true**</code>

**Example 2:**

**Input:** <code>**s = "(*)"**</code>
**Output:** <code>**true**</code>

**Example 3:**

**Input:** <code>**s = "(*))"**</code>
**Output:** <code>**true**</code>

**Constraints:**

* `1 <= s.length <= 100`
* `s[i]` is `'(', ')'` or `'*'`.


**Hint:**
1. Use backtracking to explore all possible combinations of treating '*' as either '(', ')', or an empty string. If any combination leads to a valid string, return true.
2. DP[i][j] represents whether the substring s[i:j] is valid.
3. Keep track of the count of open parentheses encountered so far. If you encounter a close parenthesis, it should balance with an open parenthesis. Utilize a stack to handle this effectively.
4. How about using 2 stacks instead of 1? Think about it.



**Solution:**

We can use a greedy approach with two counters to track the possible minimum and maximum number of open parentheses `(` that could be valid at any point in the string.

### Key Idea:
- We maintain two counters: `minOpen` and `maxOpen`.
    - `minOpen`: Tracks the minimum number of open parentheses that could still be valid.
    - `maxOpen`: Tracks the maximum number of open parentheses that could still be valid.

- As we iterate through the string:
    - If the current character is `'('`, we increment both `minOpen` and `maxOpen` since we have one more possible open parenthesis.
    - If the current character is `')'`, we decrement both `minOpen` and `maxOpen` since we close one open parenthesis.
    - If the current character is `'*'`, we increment `maxOpen` (treat `*` as `'('`), and we decrement `minOpen` (treat `*` as `')'` or an empty string).

- If at any point `maxOpen` becomes negative, we know it's impossible to balance the parentheses, so the string is invalid.
- At the end, `minOpen` must be zero for the string to be valid. This ensures that all open parentheses have been closed.

Let's implement this solution in PHP: **[678. Valid Parenthesis String](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000678-valid-parenthesis-string/solution.php)**

```php
<?php
function checkValidString($s) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo checkValidString("()") ? "true" : "false";  // Output: true
echo "\n";
echo checkValidString("(*)") ? "true" : "false";  // Output: true
echo "\n";
echo checkValidString("(*))") ? "true" : "false";  // Output: true
?>
```

### Explanation:

1. We initialize two counters, `minOpen` and `maxOpen`.
2. As we traverse the string:
    - For `'('`, both counters are incremented.
    - For `')'`, both counters are decremented (with `minOpen` clamped to 0 to avoid negative values).
    - For `'*'`, we adjust `minOpen` and `maxOpen` based on its flexibility (it can act as `(`, `)`, or `""`).
3. If `maxOpen` becomes negative at any point, we return `false` because it's impossible to balance.
4. Finally, we return `true` only if `minOpen` is 0, meaning all open parentheses are properly closed.

### Time Complexity:
- The time complexity is \(O(n)\), where \(n\) is the length of the string `s`, because we only traverse the string once.

### Space Complexity:
- The space complexity is \(O(1)\) because we use only two integer variables (`minOpen` and `maxOpen`), regardless of the size of the input.

### Output:
- For `s = "()"`, the output is `true`.
- For `s = "(*)"`, the output is `true`.
- For `s = "(*))"`, the output is `true`.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**