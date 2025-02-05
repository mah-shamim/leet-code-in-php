58\. Length of Last Word

**Difficulty:** Easy

Given a string `s` consisting of words and spaces, return the length of the **last** word in the string.

A **word** is a maximal substring[^1] consisting of non-space characters only.


**Example 1:**

- **Input:** `s = "Hello World"`
- **Output:** `5`
- **Explanation:** `The last word is "World" with length 5.`

**Example 2:**

- **Input:** `s = "   fly me   to   the moon  "`
- **Output:** `4`
- **Explanation:** `The last word is "moon" with length 4.`

**Example 3:**

- **Input:** `s = "luffy is still joyboy"`
- **Output:** `6`
- **Explanation:** `The last word is "joyboy" with length 6.`



**Constraints:**

- `1 <= s.length <= 104`
- `s` consists of only English letters and spaces ` `.
- There will be at least one word in `s`.

[^1]: **Substring** `A substring is a contiguous non-empty sequence of characters within a string.`

**Solution:**


To solve this problem, we can follow these steps:

1. **Trim the String**: Remove any leading or trailing spaces.
2. **Split the String into Words**: Use spaces as the delimiter to split the string into an array of words.
3. **Find the Last Word**: Get the last element of the resulting array.
4. **Calculate the Length**: Return the length of the last word.


Let's implement this solution in PHP: **[58. Length of Last Word](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000058-length-of-last-word/solution.php)**

```php
<?php
// Example usage:
$s1 = "Hello World";
$s2 = "   fly me   to   the moon  ";
$s3 = "luffy is still joyboy";

echo lengthOfLastWord($s1); // Output: 5
echo lengthOfLastWord($s2); // Output: 4
echo lengthOfLastWord($s3); // Output: 6

?>
```

### Explanation:

1. **Trim the String**: The `trim` function removes any leading and trailing whitespace from the string. This ensures that we don't have extra spaces affecting our word splitting.

2. **Split the String**: The `explode` function splits the string into an array of words using a space `' '` as the delimiter.

3. **Get the Last Word**: The `end` function moves the internal pointer of the array to its last element and returns its value, which is the last word in our case.

4. **Calculate the Length**: The `strlen` function returns the length of the string, which is the length of the last word.

### Example Walkthrough:

- For `s = "Hello World"`:
    - Trimmed string: `"Hello World"`
    - Words array: `["Hello", "World"]`
    - Last word: `"World"`
    - Length of last word: `5`

- For `s = "   fly me   to   the moon  "`:
    - Trimmed string: `"fly me   to   the moon"`
    - Words array: `["fly", "me", "to", "the", "moon"]`
    - Last word: `"moon"`
    - Length of last word: `4`

- For `s = "luffy is still joyboy"`:
    - Trimmed string: `"luffy is still joyboy"`
    - Words array: `["luffy", "is", "still", "joyboy"]`
    - Last word: `"joyboy"`
    - Length of last word: `6`

This code handles the given constraints and ensures that we correctly find the length of the last word in any valid input string.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
