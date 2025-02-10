3174\. Clear Digits

**Difficulty:** Easy

**Topics:** `String`, `Stack`, `Simulation`

You are given a string `s`.

Your task is to remove **all** digits by doing this operation repeatedly:

- Delete the _first_ digit and the **closest non-digit** character to its _left_.

Return _the resulting string after removing all digits_.

**Example 1:**

- **Input:** s = "abc"
- **Output:** "abc"
- **Explanation:** There is no digit in the string.

**Example 2:**

- **Input:** s = "cb34"
- **Output:** ""
- **Explanation:**
First, we apply the operation on s[2], and s becomes "c4".
Then we apply the operation on s[1], and s becomes "".



**Constraints:**

- `1 <= s.length <= 100`
- `s` consists only of lowercase English letters and digits.
- The input is generated such that it is possible to delete all digits.


**Hint:**
1. Process string `s` from left to right, if `s[i]` is a digit, mark the nearest unmarked non-digit index to its left.
2. Delete all digits and all marked characters.



**Solution:**

We need to remove all digits from a string by repeatedly deleting each digit and the closest non-digit character to its left. The goal is to efficiently simulate this process and return the resulting string after all deletions.

### Approach
The key insight is to use a stack to keep track of non-digit characters as we process the string from left to right. When we encounter a digit, we remove the closest non-digit character to its left, which is the top element of the stack. This approach ensures that we efficiently track and remove the necessary characters in a single pass through the string.

1. **Stack Initialization**: Use an array to simulate a stack.
2. **Iterate Through Characters**: For each character in the string:
   - If the character is a digit, pop the top element from the stack (if it is not empty), which represents the closest non-digit character to the left of the current digit.
   - If the character is a non-digit, push it onto the stack.
3. **Result Construction**: After processing all characters, the stack will contain the resulting string with all digits and their corresponding non-digit characters removed.

Let's implement this solution in PHP: **[3174. Clear Digits](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003174-clear-digits/solution.php)**

```php
<?php
/**
 * @param String $s
 * @return String
 */
function clearDigits($s) {
    $stack = array();
    foreach (str_split($s) as $char) {
        if (ctype_digit($char)) {
            if (!empty($stack)) {
                array_pop($stack);
            }
        } else {
            array_push($stack, $char);
        }
    }
    return implode('', $stack);
}

// Example usage:
$s1 = "abc";
$s2 = "cb34";

echo clearDigits($s1) . "\n"; // Output: "abc"
echo clearDigits($s2) . "\n"; // Output: ""

?>
```

### Explanation:

- **Stack Usage**: The stack helps keep track of the non-digit characters in the order they appear. When a digit is encountered, the top element of the stack (the most recent non-digit) is removed, simulating the deletion of the digit and its closest non-digit to the left.
- **Efficiency**: This approach processes each character exactly once, leading to an O(n) time complexity, where n is the length of the string. The space complexity is also O(n) in the worst case, where all characters are non-digits and remain in the stack.

This method efficiently simulates the required deletions using a stack, ensuring that we handle each character in a single pass and maintain optimal performance.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**