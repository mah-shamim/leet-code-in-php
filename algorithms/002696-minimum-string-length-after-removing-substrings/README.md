2696\. Minimum String Length After Removing Substrings

**Difficulty:** Easy

**Topics:** `String`, `Stack`, `Simulation`

You are given a string s consisting only of **uppercase** English letters.

You can apply some operations to this string where, in one operation, you can remove any occurrence of one of the substrings `"AB"` or `"CD"` from `s`.

Return _the **minimum** possible length of the resulting string that you can obtain_.

**Note** that the string concatenates after removing the substring and could produce new `"AB"` or `"CD"` substrings.

**Example 1:**

- **Input:** s = "ABFCACDB"
- **Output:** 2
- **Explanation:** We can do the following operations:
  - Remove the substring "ABFCACDB", so s = "FCACDB".
  - Remove the substring "FCACDB", so s = "FCAB".
  - Remove the substring "FCAB", so s = "FC".\
    So the resulting length of the string is 2.\
    It can be shown that it is the minimum length that we can obtain.

**Example 2:**

- **Input:** s = "ACBBD"
- **Output:** 5
- **Explanation:** We cannot do any operations on the string so the length remains the same.


**Constraints:**

- `1 <= s.length <= 100`
- `s` consists only of uppercase English letters.


**Hint:**
1. Can we use brute force to solve the problem?
2. Repeatedly traverse the string to find and remove the substrings “AB” and “CD” until no more occurrences exist.



**Solution:**

We'll use a **stack** to handle the removal of substrings `"AB"` and `"CD"`. The stack approach ensures that we efficiently remove these substrings as they occur during traversal of the string.

### Approach:

1. **Use a Stack**:
   - Traverse the string character by character.
   - Push each character onto the stack.
   - If the top two characters on the stack form the substring `"AB"` or `"CD"`, pop these two characters from the stack (remove them).
   - Continue this process for all characters in the input string.
2. **Final String**:
   - At the end of the traversal, the stack will contain the reduced string.
   - The minimum possible length will be the size of the stack.

Let's implement this solution in PHP: **[2696. Minimum String Length After Removing Substrings](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002696-minimum-string-length-after-removing-substrings/solution.php)**

```php
<?php
/**
 * @param String $s
 * @return Integer
 */
function minLengthAfterRemovals($s) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
echo minLengthAfterRemovals("ABFCACDB"); // Output: 2
echo "\n";
echo minLengthAfterRemovals("ACBBD");    // Output: 5
?>
```

### Explanation:

- We initialize an empty stack (`$stack`).
- Loop through each character of the string `s`.
- Check the top character of the stack:
   - If the top character and the current character form the substrings `"AB"` or `"CD"`, we remove the top character using `array_pop`.
   - Otherwise, push the current character onto the stack.
- The stack will hold the characters that remain after all possible removals.
- Finally, `count($stack)` gives the length of the resulting string.

### Complexity:

- **Time Complexity**: `O(n)`, where `n` is the length of the string. Each character is processed at most twice (once pushed, once popped).
- **Space Complexity**: `O(n)` for the stack, in the worst case where no removals are possible.

This solution effectively minimizes the string by removing all possible occurrences of `"AB"` and `"CD"` until no more can be found.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
