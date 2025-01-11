1190\. Reverse Substrings Between Each Pair of Parentheses

**Difficulty:** Medium

**Topics:** `String`, `Stack`

You are given a string `s` that consists of lower case English letters and brackets.

Reverse the strings in each pair of matching parentheses, starting from the innermost one.

Your result should **not** contain any brackets.

**Example 1:**

- **Input:** s = "(abcd)"
- **Output:** "dcba"

**Example 2:**

- **Input:** s = "(u(love)i)"
- **Output:** "iloveu"
- **Explanation:** The substring "love" is reversed first, then the whole string is reversed.

**Example 3:**

- **Input:** s = "(ed(et(oc))el)"
- **Output:** "leetcode"
- **Explanation:** First, we reverse the substring "oc", then "etco", and finally, the whole string.

**Constraints:**

- `1 <= s.length <= 2000`
- `s` only contains lower case English characters and parentheses.
- It is guaranteed that all parentheses are balanced.


**Hint:**
1. Find all brackets in the string.
2. Does the order of the reverse matter ?
3. The order does not matter.


**Solution:**


Here's the step-by-step plan:

1. Use a stack to keep track of the characters and nested parentheses.
2. Traverse each character in the string.
3. If you encounter an opening parenthesis '(', push it onto the stack.
4. If you encounter a closing parenthesis ')', pop from the stack until you reach an opening parenthesis '('. Reverse the substring collected and push it back onto the stack.
5. Finally, concatenate the stack contents to get the result.

Here's the implementation in PHP: **[1190. Reverse Substrings Between Each Pair of Parentheses](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001190-reverse-substrings-between-each-pair-of-parentheses/solution.php)**

```php
<?php
/**
 * @param String $s
 * @return String
 */
function reverseParentheses($s) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example 1
echo reverseParentheses("(abcd)") . "\n"; // Output: "dcba"

// Example 2
echo reverseParentheses("(u(love)i)") . "\n"; // Output: "iloveu"

// Example 3
echo reverseParentheses("(ed(et(oc))el)") . "\n"; // Output: "leetcode"
?>
```

### Explanation
- The function `reverseParentheses` takes a string `s` as input.
- A stack is used to keep track of characters and nested parentheses.
- As we traverse the string:
    - If we encounter a closing parenthesis `)`, we start popping from the stack until we find an opening parenthesis `(`.
    - We collect the characters popped (which are inside the parentheses), reverse them, and push them back onto the stack.
    - If the character is not a closing parenthesis, it is directly pushed onto the stack.
- Finally, we concatenate the elements of the stack to form the result string, ensuring that the brackets are not included.

This method efficiently handles nested parentheses and ensures the correct order of characters after reversing the substrings within each pair of parentheses.



**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**