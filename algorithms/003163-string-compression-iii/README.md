3163\. String Compression III

**Difficulty:** Medium

**Topics:** `String`

Given a string `word`, compress it using the following algorithm:

- Begin with an empty string `comp`. While `word` is **not** empty, use the following operation:
  - Remove a maximum length prefix of `word` made of a _single character_ `c` repeating **at most** 9 times.
  - Append the length of the prefix followed by `c` to `comp`.

Return _the string **comp**_.

**Example 1:**

- **Input:** word = "abcde"
- **Output:** "1a1b1c1d1e"
- **Explanation:** Initially, `comp = ""`. Apply the operation 5 times, choosing `"a"`, `"b"`, `"c"`, `"d"`, and `"e"` as the prefix in each operation.
  - For each prefix, append `"1"` followed by the character to `comp`.

**Example 2:**

- **Input:** word = "aaaaaaaaaaaaaabb"
- **Output:** "9a5a2b"
- **Explanation:** Initially, `comp = ""`. Apply the operation 3 times, choosing `"aaaaaaaaa"`, `"aaaaa"`, and `"bb"` as the prefix in each operation.
  - For prefix `"aaaaaaaaa"`, append `"9"` followed by `"a"` to `comp`.
  - For prefix `"aaaaa"`, append `"5"` followed by `"a"` to `comp`.
  - For prefix `"bb"`, append `"2"` followed by `"b"` to `comp`.

**Constraints:**

- <code>1 <= word.length <= 2 * 10<sup>5</sup></code>
- `word` consists only of lowercase English letters.


**Hint:**
1. Each time, just cut the same character in prefix up to at max 9 times. It’s always better to cut a bigger prefix.



**Solution:**

We can use a greedy approach to compress the string by taking the longest possible prefix of repeating characters (up to 9 occurrences at a time) and then appending the length of the prefix along with the character to the result.

Here's the step-by-step solution:

1. **Initialize Variables**:
   - `comp` (the compressed string) starts as an empty string.
   - Use a pointer or index `i` to track the position in the `word`.

2. **Loop through `word`**:
   - While there are characters left in `word`, find the longest prefix of repeating characters that does not exceed 9 characters.
   - Count how many times the current character repeats consecutively, up to a maximum of 9.

3. **Append to Compressed String**:
   - Append the count followed by the character to `comp`.
   - Move the pointer `i` forward by the number of characters processed.

4. **Return Result**:
   - After processing the entire string, return the compressed string `comp`.

Let's implement this solution in PHP: **[3163. String Compression III](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003163-string-compression-iii/solution.php)**

```php
<?php
/**
 * @param String $word
 * @return String
 */
function compressString($word) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo compressString("abcde");          // Output: "1a1b1c1d1e"
echo "\n";
echo compressString("aaaaaaaaaaaaaabb"); // Output: "9a5a2b"
?>
```

### Explanation:

- **Counting Loop**: We use a `while` loop inside the main loop to count consecutive characters (up to 9) for each unique character in `word`.
- **Appending Results**: After counting each sequence, we append the count and character directly to `comp`.
- **Pointer Update**: The main loop pointer `i` moves forward by the number of characters counted, effectively reducing the size of the remaining string in each iteration.

### Complexity Analysis

- **Time Complexity**: _**O(n)**_, where _**n**_ is the length of `word`. Each character is processed once.
- **Space Complexity**: _**O(n)**_ for the compressed result stored in `comp`.

This solution is efficient and handles edge cases, such as sequences shorter than 9 characters or a single occurrence of each character.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**