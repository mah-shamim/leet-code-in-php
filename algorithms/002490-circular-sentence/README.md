2490\. Circular Sentence

**Difficulty:** Easy

**Topics:** `String`

A **sentence** is a list of words that are separated by a **single** space with no leading or trailing spaces.

- For example, `"Hello World"`, `"HELLO"`, `"hello world hello world"` are all sentences.

Words consist of **only** uppercase and lowercase English letters. Uppercase and lowercase English letters are considered different.

A sentence is **circular** if:

- The last character of a word is equal to the first character of the next word.
- The last character of the last word is equal to the first character of the first word.

For example, `"leetcode exercises sound delightful"`, `"eetcode"`, `"leetcode eats soul"` are all circular sentences. However, `"Leetcode is cool"`, `"happy Leetcode"`, `"Leetcode"` and `"I like Leetcode"` are **not** circular sentences.

Given a string `sentence`, return `_true` if it is circular_. Otherwise, return _`false`_.

**Example 1:**

- **Input:** sentence = "leetcode exercises sound delightful"
- **Output:** true
- **Explanation:** The words in sentence are ["leetcode", "exercises", "sound", "delightful"].
  - leetcode's last character is equal to exercises's first character.
  - exercises's last character is equal to sound's first character.
  - sound's last character is equal to delightful's first character.
  - delightful's last character is equal to leetcode's first character.
    The sentence is circular.

**Example 2:**

- **Input:** sentence = "eetcode"
- **Output:** true
- **Explanation:** The words in sentence are ["eetcode"].
  - eetcode's last character is equal to eetcode's first character.
    The sentence is circular.


**Example 3:**

- **Input:** sentence = "Leetcode is cool"
- **Output:** false
- **Explanation:** The words in sentence are ["Leetcode", "is", "cool"].
  - Leetcode's last character is not equal to is's first character.
    The sentence is not circular.


**Constraints:**

- `1 <= sentence.length <= 500`
- `sentence` consist of only lowercase and uppercase English letters and spaces.
- The words in `sentence` are separated by a single space.
- There are no leading or trailing spaces.

**Hint:**
1. Check the character before the empty space and the character after the empty space.
2. Check the first character and the last character of the sentence.



**Solution:**

We need to verify two conditions:

1. Each word’s last character should match the next word’s first character.
2. The last character of the final word should match the first character of the first word, making it circular.

Let's implement this solution in PHP: **[2490. Circular Sentence](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002490-circular-sentence/solution.php)**

```php
<?php
/**
 * @param String $sentence
 * @return Boolean
 */
function isCircularSentence($sentence) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
$sentence1 = "leetcode exercises sound delightful";
$sentence2 = "eetcode";
$sentence3 = "Leetcode is cool";

echo isCircularSentence($sentence1) ? "true\n" : "false\n"; // Output: true
echo isCircularSentence($sentence2) ? "true\n" : "false\n"; // Output: true
echo isCircularSentence($sentence3) ? "true\n" : "false\n"; // Output: false
?>
```

### Explanation:

1. **Splitting the Sentence**: Use `explode(" ", $sentence)` to split the sentence into words.
2. **Looping through Words**:
   - For each word, get its last character using `substr($words[$i], -1)`.
   - Get the first character of the next word. For the last word, we use modulo (`%`) to wrap around to the first word.
3. **Comparison**:
   - If the last character of a word doesn’t match the first character of the next word, return `false`.
   - If the loop completes without finding any mismatch, the sentence is circular, so return `true`.

This code efficiently checks the circular condition for each word pair, making it simple and optimal.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
