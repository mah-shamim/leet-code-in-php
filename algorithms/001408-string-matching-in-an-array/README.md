1408\. String Matching in an Array

**Difficulty:** Easy

**Topics:** `Array`, `String`, `String Matching`

Given an array of string `words`, return _all strings in `words` that is a **substring** of another word_. You can return the answer in **any order**.

A **substring** is a contiguous sequence of characters within a string

**Example 1:**

- **Input:** words = ["mass","as","hero","superhero"]
- **Output:** ["as","hero"]
- **Explanation:** "as" is substring of "mass" and "hero" is substring of "superhero".
  ["hero","as"] is also a valid answer.

**Example 2:**

- **Input:** words = ["leetcode","et","code"]
- **Output:** ["et","code"]
- **Explanation:** "et", "code" are substring of "leetcode".


**Example 3:**

- **Input:** words = ["blue","green","bu"]
- **Output:** []
- **Explanation:** No string of words is substring of another string.



**Constraints:**

- `1 <= words.length <= 100`
- `1 <= words[i].length <= 30`
- `words[i]` contains only lowercase English letters.
- All the strings of `words` are **unique**.


**Hint:**
1. Bruteforce to find if one string is substring of another or use KMP algorithm.



**Solution:**

We need to find all strings in the `words` array that are substrings of another word in the array, you can use a brute force approach. The approach involves checking each string in the list and verifying if it's a substring of any other string.

Let's implement this solution in PHP: **[1408. String Matching in an Array](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001408-string-matching-in-an-array/solution.php)**

```php
<?php
/**
 * @param String[] $words
 * @return String[]
 */
function stringMatching($words) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example 1
$words = ["mass", "as", "hero", "superhero"];
print_r(stringMatching($words));

// Example 2
$words = ["leetcode", "et", "code"];
print_r(stringMatching($words));

// Example 3
$words = ["blue", "green", "bu"];
print_r(stringMatching($words));
?>
```

### Explanation:

1. The function `stringMatching` loops through all the words in the input array.
2. For each word, it compares it with every other word in the array using a nested loop.
3. It uses PHP's `strpos()` function to check if one string is a substring of another. The `strpos()` function returns `false` if the substring is not found.
4. If a substring is found, we add the word to the result array and break out of the inner loop, as we only need to record the word once.
5. Finally, the function returns the result array containing all the substrings.

### Time Complexity:
- The time complexity is _**O(n<sup>2</sup> x m)**_, where _**n**_ is the number of words and _**m**_ is the maximum length of a word. This is because we are performing a substring search for each word within every other word.

### Example Outputs:

For input `["mass", "as", "hero", "superhero"]`, the output will be:
```php
Array
(
    [0] => as
    [1] => hero
)
```

For input `["leetcode", "et", "code"]`, the output will be:
```php
Array
(
    [0] => et
    [1] => code
)
```

For input `["blue", "green", "bu"]`, the output will be:
```php
Array
(
)
```

This solution works well for the given problem constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
