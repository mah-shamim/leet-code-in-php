3136\. Valid Word

**Difficulty:** Easy

**Topics:** `String`

A word is considered **valid** if:
- It contains a **minimum** of 3 characters.
- It contains only digits (0-9), and English letters (uppercase and lowercase).
- It includes **at least** one **vowel**.
- It includes **at least** one **consonant**.

You are given a string `word`.

Return `true` if `word` is valid, otherwise, return `false`.

**Notes:**
- `'a'`, `'e'`, `'i'`, `'o'`, `'u'`, and their uppercases are **vowels**.
- A **consonant** is an English letter that is not a vowel.


**Example 1:**

- **Input:** word = "234Adas"
- **Output:** true
- **Explanation:** This word satisfies the conditions.

**Example 2:**

- **Input:** word = "b3"
- **Output:** false
- **Explanation:** The length of this word is fewer than 3, and does not have a vowel.

**Example 3:**

- **Input:** word = "a3$e"
- **Output:** false
- **Explanation:** This word contains a `'$'` character and does not have a consonant.

**Constraints:**

- `1 <= word.length <= 20`
- `word` consists of English uppercase and lowercase letters, digits, `'@'`, `'#'`, and `'$'`.


**Hint:**
1. Use if-else to check all the conditions.






**Solution:**

We need to determine if a given word meets specific criteria for validity. The criteria are:
1. The word must contain at least 3 characters.
2. The word must consist only of digits (0-9) and English letters (both uppercase and lowercase).
3. The word must include at least one vowel (a, e, i, o, u, or their uppercase counterparts).
4. The word must include at least one consonant (any English letter that is not a vowel).

### Approach
1. **Check Length**: First, verify if the word's length is at least 3 characters. If not, the word is invalid.
2. **Check Valid Characters**: Ensure all characters in the word are either digits (0-9) or English letters (both uppercase and lowercase). If any character fails this check (like '@', '#', '$'), the word is invalid.
3. **Check for Vowel and Consonant**: Traverse through each character in the word. For each English letter (ignoring digits), check if it is a vowel or a consonant. If at least one vowel and one consonant are found, the word is valid; otherwise, it is invalid.

Let's implement this solution in PHP: **[3136. Valid Word](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003136-valid-word/solution.php)**

```php
<?php
/**
 * @param String $word
 * @return Boolean
 */
function isValid($word) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
var_dump(isValid("234Adas"));  // true
var_dump(isValid("b3"));       // false
var_dump(isValid("a3\$e"));    // false
?>
```

### Explanation:

1. **Length Check**: The function first checks if the word length is less than 3. If so, it returns `false` immediately.
2. **Character Validity Check**: The function iterates through each character in the word to ensure they are either digits or English letters. If any character is outside these ranges (like special characters), the function returns `false`.
3. **Vowel and Consonant Check**: The function then checks each character again. For each English letter, it determines if the letter is a vowel or a consonant. If both at least one vowel and one consonant are found, the function returns `true`; otherwise, it returns `false`.

This approach efficiently verifies all the given conditions step-by-step, ensuring the word meets all criteria for validity. The solution handles edge cases like words with insufficient length, invalid characters, or missing vowels/consonants appropriately.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**