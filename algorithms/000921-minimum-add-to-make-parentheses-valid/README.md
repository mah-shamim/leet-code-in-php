921\. Minimum Add to Make Parentheses Valid

**Difficulty:** Medium

**Topics:** `String`, `Stack`, `Greedy`

A parentheses string is valid if and only if:

- It is the empty string,
- It can be written as `AB` (`A` concatenated with `B`), where `A` and `B` are valid strings, or
- It can be written as `(A)`, where `A` is a valid string.

You are given a parentheses string `s`. In one move, you can insert a parenthesis at any position of the string.

- For example, if `s = "()))"`, you can insert an opening parenthesis to be `"(()))"` or a closing parenthesis to be `"())))"`.

Return _the minimum number of moves required to make `s` valid_.

**Example 1:**

- **Input:** s = "())"
- **Output:** 1

**Example 2:**

- **Input:** s = "((("
- **Output:** 3

**Constraints:**

- `1 <= s.length <= 1000`
- `s[i]` is either `'('` or `')'`.



**Solution:**

We need to determine how many opening or closing parentheses need to be added to make the input string `s` valid. A valid string means that every opening parenthesis `'('` has a corresponding closing parenthesis `')'`.

We can solve this problem using a simple counter approach:

- We use a variable `balance` to keep track of the current balance between opening and closing parentheses.
- We use another variable `additions` to count the minimum number of parentheses required.

### Approach:

1. Loop through each character of the string `s`.
2. If the character is `'('`, increment `balance` by 1.
3. If the character is `')'`, decrement `balance` by 1:
   - If `balance` becomes negative, it means there are more closing parentheses than opening ones. We need to add an opening parenthesis to balance it, so increment `additions` by 1 and reset `balance` to 0.
4. At the end of the loop, if `balance` is greater than 0, it indicates there are unmatched opening parentheses, so add `balance` to `additions`.

Let's implement this solution in PHP: **[921. Minimum Add to Make Parentheses Valid](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000921-minimum-add-to-make-parentheses-valid/solution.php)**

```php
<?php
/**
 * @param String $s
 * @return Integer
 */
function minAddToMakeValid($s) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
$s1 = "())";
echo minAddToMakeValid($s1);  // Output: 1

$s2 = "(((";
echo minAddToMakeValid($s2);  // Output: 3
?>
```

### Explanation:


- For the string `s = "())"`:
   - `balance` becomes negative when the second `')'` is encountered, so `additions` is incremented.
   - At the end, `balance` is 0, and `additions` is 1, so we need 1 addition to make the string valid.
- For the string `s = "((("`:
   - `balance` becomes 3 because there are 3 unmatched `'('` at the end.
   - The result is `additions + balance`, which is `0 + 3 = 3`.

This solution has a time complexity of _**O(n)**_ where _**n**_ is the length of the string, and a space complexity of _**O(1)**_ since we only use a few variables.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**