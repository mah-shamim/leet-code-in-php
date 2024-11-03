796\. Rotate String

**Difficulty:** Easy

**Topics:** `String`, `String Matching`

Given two strings `s` and `goal`, return _`true` if and only if `s` can become `goal` after some number of **shifts** on `s`_.

A **shift** on `s` consists of moving the leftmost character of `s` to the rightmost position.

- For example, if `s = "abcde"`, then it will be `"bcdea"` after one shift.

**Example 1:**

- **Input:** s = "abcde", goal = "cdeab"
- **Output:** true

**Example 2:**

- **Input:** s = "abcde", goal = "abced"
- **Output:** false


**Constraints:**

- `1 <= s.length, goal.length <= 100`
- `s` and `goal` consist of lowercase English letters.


**Solution:**

We can take advantage of the properties of string concatenation. Specifically, if we concatenate the string `s` with itself (i.e., `s + s`), all possible rotations of `s` will appear as substrings within that concatenated string. This allows us to simply check if `goal` is a substring of `s + s`.

Let's implement this solution in PHP: **[796. Rotate String](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000796-rotate-string/solution.php)**

```php
<?php
/**
 * @param String $s
 * @param String $goal
 * @return Boolean
 */
function rotateString($s, $goal) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
?>
```

### Explanation:

1. **Length Check**: We first check if the lengths of `s` and `goal` are the same. If they are not, we immediately return `false`, as it's impossible for `s` to be transformed into `goal`.

2. **Concatenation**: We concatenate the string `s` with itself to create `doubleS`.

3. **Substring Check**: We use the `strpos()` function to check if `goal` exists as a substring in `doubleS`. If it does, we return `true`; otherwise, we return `false`.

### Complexity:
- **Time Complexity**: O(n), where n is the length of the string, due to the concatenation and substring search.
- **Space Complexity**: O(n) for the concatenated string.

This solution efficiently determines if one string can become another through rotations.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
