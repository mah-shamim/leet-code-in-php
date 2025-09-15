1935\. Maximum Number of Words You Can Type

**Difficulty:** Easy

**Topics:** `Hash Table`, `String`, `Weekly Contest 250`

There is a malfunctioning keyboard where some letter keys do not work. All other keys on the keyboard work properly.

Given a string `text` of words separated by a single space (no leading or trailing spaces) and a string `brokenLetters` of all **distinct** letter keys that are broken, return _the **number of words** in `text` you can fully type using this keyboard_.

**Example 1:**

- **Input:** text = "hello world", brokenLetters = "ad"
- **Output:** 1
- **Explanation:** We cannot type "world" because the 'd' key is broken.

**Example 2:**

- **Input:** text = "leet code", brokenLetters = "lt"
- **Output:** 1
- **Explanation:** We cannot type "leet" because the 'l' and 't' keys are broken.

**Example 3:**

- **Input:** text = "leet code", brokenLetters = "e"
- **Output:** 0
- **Explanation:** We cannot type either word because the 'e' key is broken.

**Constraints:**

- <code>1 <= text.length <= 10<sup>4</sup></code>
- `0 <= brokenLetters.length <= 26`
- `text` consists of words separated by a single space without any leading or trailing spaces.
- Each word only consists of lowercase English letters.
- `brokenLetters` consists of **distinct** lowercase English letters.


**Hint:**
1. Check each word separately if it can be typed.
2. A word can be typed if all its letters are not broken.






**Solution:**

We need to determine how many words in a given string can be fully typed using a keyboard where some keys are broken. The solution involves checking each word in the input string to see if it contains any of the broken letters. If a word does not contain any broken letters, it can be typed completely.

### Approach
1. **Split the Text into Words**: The input string `text` consists of words separated by single spaces. We split this string into individual words.
2. **Create a Set of Broken Letters**: Convert the string `brokenLetters` into a set (or an array) for efficient lookup. This allows us to quickly check if a letter is broken.
3. **Check Each Word**: For each word, check every character. If any character is found in the set of broken letters, skip the word. Otherwise, increment the count of typable words.
4. **Return the Count**: After processing all words, return the count of words that can be fully typed without encountering any broken letters.

Let's implement this solution in PHP: **[1935. Maximum Number of Words You Can Type](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001935-maximum-number-of-words-you-can-type/solution.php)**

```php
<?php
/**
 * @param String $text
 * @param String $brokenLetters
 * @return Integer
 */
function canBeTypedWords($text, $brokenLetters) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo canBeTypedWords("hello world", "ad") . "\n";   // Output: 1
echo canBeTypedWords("leet code", "lt") . "\n";     // Output: 1
echo canBeTypedWords("leet code", "e") . "\n";      // Output: 0
?>
```

### Explanation:

1. **Splitting the Text**: The `explode` function splits the input string `text` into an array of words using space as the delimiter.
2. **Broken Letters Set**: The `str_split` function converts the string `brokenLetters` into an array of characters, allowing us to check each character efficiently.
3. **Checking Words**: For each word, we iterate through its characters. If any character is found in the `brokenSet`, we mark the word as untypable and move to the next word. If no broken characters are found, we increment the count.
4. **Result**: The count of typable words is returned after processing all words.

This approach efficiently checks each word for broken characters using a set for quick lookups, ensuring optimal performance even for the upper constraint limits. The solution is straightforward and leverages basic string and array operations to achieve the desired result.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://jackaltimer.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**