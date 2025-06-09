2942\. Find Words Containing Character

**Difficulty:** Easy

**Topics:** `Array`, `String`

You are given a **0-indexed** array of strings `words` and a character `x`.

Return _an **array of indices** representing the words that contain the character `x`_.

**Note** that the returned array may be in **any** order.

**Example 1:**

- **Input:** words = ["leet","code"], x = "e"
- **Output:** [0,1]
- **Explanation:** "e" occurs in both words: "l<ins>**ee**</ins>t", and "cod<ins>**e**</ins>". Hence, we return indices 0 and 1.

**Example 2:**

- **Input:** words = ["abc","bcd","aaaa","cbc"], x = "a"
- **Output:** [0,2]
- **Explanation:** "a" occurs in "<ins>**a**</ins>bc", and "<ins>**aaaa**</ins>". Hence, we return indices 0 and 2.


**Example 3:**

- **Input:** words = ["abc","bcd","aaaa","cbc"], x = "z"
- **Output:** []
- **Explanation:** "z" does not occur in any of the words. Hence, we return an empty array.



**Constraints:**

- `1 <= words.length <= 50`
- `1 <= words[i].length <= 50`
- `x` is a lowercase English letter.
- `words[i]` consists only of lowercase English letters.


**Hint:**
1. Use two nested loops.



**Solution:**

We need to find the indices of words in a given list that contain a specific character. The solution involves iterating through each word and checking if the character is present, then collecting the indices of those words.

### Approach
1. **Initialize an empty array** to store the indices of words that contain the specified character.
2. **Iterate through each word** in the input list while keeping track of the current index.
3. **Check if the character exists** in the current word using the `strpos` function. If the character is found, add the current index to the result array.
4. **Return the result array** after processing all words.

This approach efficiently checks each word for the presence of the character using a linear scan through the list of words, resulting in a time complexity of O(n*m), where n is the number of words and m is the maximum length of the words. This is efficient given the problem constraints.

Let's implement this solution in PHP: **[2942. Find Words Containing Character](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002942-find-words-containing-character/solution.php)**

```php
<?php
/**
 * @param String[] $words
 * @param String $x
 * @return Integer[]
 */
function findWordsContaining($words, $x) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example 1:
$words1 = array("leet", "code");
$x1 = "e";
print_r(findWordsContaining($words1, $x1)); // Output: [0,1]

// Example 2:
$words2 = array("abc", "bcd", "aaaa", "cbc");
$x2 = "a";
print_r(findWordsContaining($words2, $x2)); // Output: [0,2]

// Example 3:
$words3 = array("abc", "bcd", "aaaa", "cbc");
$x3 = "z";
print_r(findWordsContaining($words3, $x3)); // Output: []
?>
```

### Explanation:

- **Initialization**: We start by creating an empty array `$result` to hold the indices of words containing the character.
- **Iteration**: Using a loop, we go through each word in the input array. For each word, we check if the character `x` is present using `strpos`, which returns the position of the first occurrence of `x` or `false` if not found.
- **Check and Collect Indices**: If `strpos` returns a valid position (i.e., not `false`), we add the current index to `$result`.
- **Return Result**: Finally, after processing all words, we return the array of indices.

This solution efficiently handles the constraints and ensures that we correctly identify all words containing the specified character, returning their indices in any order.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**