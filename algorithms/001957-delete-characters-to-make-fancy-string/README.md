1957\. Delete Characters to Make Fancy String

**Difficulty:** Easy

**Topics:** `String`

A **fancy string** is a string where no **three consecutive** characters are equal.

Given a string `s`, delete the **minimum** possible number of characters from `s` to make it **fancy**.

Return _the final string after the deletion. It can be shown that the answer will always be **unique**_.

**Example 1:**

- **Input:** s = "leeetcode"
- **Output:** "leetcode"
- **Explanation:**
  Remove an 'e' from the first group of 'e's to create "leetcode".
  No three consecutive characters are equal, so return "leetcode".

**Example 2:**

- **Input:** s = "aaabaaaa"
- **Output:** "aabaa"
- **Explanation:**
  Remove an 'a' from the first group of 'a's to create "aabaaaa".
  Remove two 'a's from the second group of 'a's to create "aabaa".
  No three consecutive characters are equal, so return "aabaa".


**Example 3:**

- **Input:** s = "aab"
- **Output:** "aab"
- **Explanation:** No three consecutive characters are equal, so return "aab".


**Constraints:**

- <code>1 <= s.length <= 10<sup>5</sup></code>
- `s` consists only of lowercase English letters.


**Hint:**
1. What's the optimal way to delete characters if three or more consecutive characters are equal?
2. If three or more consecutive characters are equal, keep two of them and delete the rest.



**Solution:**

We need to ensure that no three consecutive characters are the same in the final string. We'll iterate through the input string and build a new "fancy" string by keeping track of the previous two characters. If a third consecutive character matches the last two, we skip it. Otherwise, we add it to the output.

Let's implement this solution in PHP: **[1957. Delete Characters to Make Fancy String](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001957-delete-characters-to-make-fancy-string/solution.php)**

```php
<?php
/**
 * @param String $s
 * @return String
 */
function makeFancyString($s) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
echo makeFancyString("leeetcode"); // Output: "leetcode"
echo "\n";
echo makeFancyString("aaabaaaa");  // Output: "aabaa"
echo "\n";
echo makeFancyString("aab");       // Output: "aab"
?>
```

### Explanation:

1. **Initialize Variables**:
   - `$result`: This will store the final "fancy" string.

2. **Iterate through the String**:
   - For each character, check if it forms a trio with the last two characters in the result.
   - If it does, skip adding it to `$result`.
   - If not, add it to `$result`.

3. **Return the Result**:
   - The `$result` string now contains no three consecutive identical characters.

### Complexity Analysis

- **Time Complexity**: _**O(n)**_, where _**n**_ is the length of the input string, as we process each character once.
- **Space Complexity**: _**O(n)**_, for storing the output string.

This solution meets the constraints efficiently and ensures that the final string has no three consecutive identical characters.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**