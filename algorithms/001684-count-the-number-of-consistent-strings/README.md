1684\. Count the Number of Consistent Strings

**Difficulty:** Easy

**Topics:** `Array`, `Hash Table`, `String`, `Bit Manipulation`, `Counting`

You are given a string `allowed` consisting of distinct characters and an array of strings `words`. A string is **consistent** if all characters in the string appear in the string `allowed`.

Return _the number of **consistent** strings in the array `words`_.

**Example 1:**

- **Input:** allowed = "ab", words = ["ad","bd","aaab","baa","badab"]
- **Output:** 2
- **Explanation:** Strings "aaab" and "baa" are consistent since they only contain characters 'a' and 'b'.

**Example 2:**

- **Input:** allowed = "abc", words = ["a","b","c","ab","ac","bc","abc"]
- **Output:** 7
- **Explanation:** All strings are consistent.


**Example 3:**

- **Input:** allowed = "cad", words = ["cc","acd","b","ba","bac","bad","ac","d"]
- **Output:** 4
- **Explanation:** Strings "cc", "acd", "ac", and "d" are consistent.



**Constraints:**

- <code>1 <= words.length <= 10<sup>4</sup></code>
- <code>1 <= allowed.length <= 26</code>
- <code>1 <= words[i].length <= 10</code>
- The characters in `allowed` are **distinct**.
- `words[i]` and `allowed` contain only lowercase English letters.


**Hint:**
1. A string is incorrect if it contains a character that is not allowed
2. Constraints are small enough for brute force



**Solution:**

The idea is to check if each word in the `words` array is **consistent** with the characters in the `allowed` string. A word is **consistent** if all its characters are present in the `allowed` string.

### Plan

1. **Allowed Characters Set**:
   - We can convert the `allowed` string into a set of characters to efficiently check if each character in the word exists in the set.

2. **Word Consistency Check**:
   - For each word in the `words` array, check if all its characters exist in the `allowed` set.

3. **Count Consistent Words**:
   - Initialize a counter. For each word that is consistent, increment the counter.

4. **Return the Count**:
   - Once all words are processed, return the count of consistent words.

Let's implement this solution in PHP: **[1684. Count the Number of Consistent Strings](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001684-count-the-number-of-consistent-strings/solution.php)**

```php
<?php
/**
 * @param String $allowed
 * @param String[] $words
 * @return Integer
 */
function countConsistentStrings($allowed, $words) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:

// Example 1:
$allowed = "ab";
$words = ["ad", "bd", "aaab", "baa", "badab"];
echo countConsistentStrings($allowed, $words); // Output: 2

// Example 2:
$allowed = "abc";
$words = ["a","b","c","ab","ac","bc","abc"];
echo countConsistentStrings($allowed, $words); // Output: 7

// Example 3:
$allowed = "cad";
$words =  ["cc","acd","b","ba","bac","bad","ac","d"];
echo countConsistentStrings($allowed, $words); // Output: 4
?>
```

### Explanation:

1. **Allowed Set**:
   - We create an associative array `$allowedSet` where each key is a character from the `allowed` string. This allows for fast lookups.

2. **Word Consistency**:
   - For each word in the `words` array, we loop through its characters and check if they are in `$allowedSet`. If we find any character that isn't in the set, the word is marked as inconsistent, and we move on to the next word.

3. **Counting**:
   - Every time we find a consistent word, we increment the counter `$consistentCount`.

4. **Return the Result**:
   - After processing all words, the counter holds the number of consistent strings, which we return.

### Time Complexity:

- **Time Complexity**: O(n * m), where `n` is the number of words and `m` is the average length of the words. We are iterating through all the words and their characters.

### Example Walkthrough:

For the input:
```php
$allowed = "ab";
$words = ["ad", "bd", "aaab", "baa", "badab"];
```
- We create a set: `allowedSet = ['a' => true, 'b' => true]`.
- Checking each word:
   - "ad" is inconsistent (contains 'd').
   - "bd" is inconsistent (contains 'd').
   - "aaab" is consistent (only contains 'a' and 'b').
   - "baa" is consistent (only contains 'a' and 'b').
   - "badab" is inconsistent (contains 'd').

Thus, the function returns `2`.

### Constraints Handling:

- Since `allowed` can only have up to 26 distinct characters, and `words` has at most 10,000 entries, this brute-force solution is efficient enough given the constraints. Each word can have a maximum length of 10, making it feasible to iterate over all characters.


**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
