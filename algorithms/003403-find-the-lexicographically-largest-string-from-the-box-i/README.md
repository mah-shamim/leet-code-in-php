3403\. Find the Lexicographically Largest String From the Box I

**Difficulty:** Medium

**Topics:** `Two Pointers`, `String`, `Enumeration`

You are given a string `word`, and an integer `numFriends`.

Alice is organizing a game for her `numFriends` friends. There are multiple rounds in the game, where in each round:

- `word` is split into `numFriends` **non-empty** strings, such that no previous round has had the **exact** same split.
- All the split words are put into a box.

Find the lexicographically largest[^1] string from the box after all the rounds are finished.

**Example 1:**

- **Input:** word = "dbca", numFriends = 2
- **Output:** "dbc"
- **Explanation:** All possible splits are:
    - `"d"` and `"bca"`.
    - `"db"` and `"ca"`.
    - `"dbc"` and `"a"`.


**Example 2:**

- **Input:** word = "gggg", numFriends = 4
- **Output:** "g"
- **Explanation:** The only possible split is: `"g"`, `"g"`, `"g"`, and `"g"`.


**Example 3:**

- **Input:** word = "gh", numFriends = 1
- **Output:** "gh"


**Example 4:**

- **Input:** word = "cgwzebexlahnfqsetbeaybmfdzywpvehjybpwiotnciddjonfi", numFriends = 21
- **Output:** "zywpvehjybpwiotnciddjonfi"



**Constraints:**

- <code>1 <= word.length <= 5 * 10<sup>3</sup></code>
- `word` consists only of lowercase English letters.
- `1 <= numFriends <= word.length`


**Hint:**
1. Find lexicographically largest substring of size `n - numFriends + 1` or less starting at every index.

[^1]: **Lexicographically Smaller** : A string `a` is **lexicographically smaller** than a string `b` if in the first position where `a` and `b` differ, string `a` has a letter that appears earlier in the alphabet than the corresponding letter in `b`. 
If the first `min(a.length, b.length)` characters do not differ, then the shorter string is the lexicographically smaller one.

**Solution:**

We need to find the lexicographically largest string from a box that contains all possible non-empty substrings obtained by splitting the given string into `numFriends` non-empty contiguous parts in all distinct ways. The key insight is recognizing that the lexicographically largest string in the box must be a contiguous substring of the original string with a maximum length of `n - numFriends + 1`, where `n` is the length of the string.

### Approach
1. **Special Case Handling for Single Friend**: If `numFriends` is 1, the only possible split is the entire string itself, so we directly return the entire string.
2. **Determine Maximum Length**: For other cases, calculate the maximum possible length of any substring in the box, which is `n - numFriends + 1`.
3. **Iterate Over All Possible Substrings**: For each starting index in the string, consider the substring starting at that index with a length up to the minimum of the remaining characters from that index and the maximum length calculated.
4. **Track the Lexicographically Largest Substring**: Compare each candidate substring with the current largest substring found, updating the largest substring whenever a lexicographically larger one is encountered. This comparison is done efficiently by comparing character by character to avoid unnecessary substring extractions.

Let's implement this solution in PHP: **[3403. Find the Lexicographically Largest String From the Box I](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003403-find-the-lexicographically-largest-string-from-the-box-i/solution.php)**

```php
<?php
/**
 * @param String $word
 * @param Integer $numFriends
 * @return String
 */
function answerString($word, $numFriends) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example Test Cases
// Test Case 1
echo answerString("dbca", 2) . "\n"; // Output: "dbc"

// Test Case 2
echo answerString("gggg", 4) . "\n"; // Output: "g"

// Test Case 3
echo answerString("gh", 1) . "\n";   // Output: "gh"

// Test Case 4
echo answerString("cgwzebexlahnfqsetbeaybmfdzywpvehjybpwiotnciddjonfi", 21) . "\n"; // Output: "zywpvehjybpwiotnciddjonfi"
?>
```

### Explanation:

1. **Special Case Handling**: If there's only one friend, the entire string is the only possible substring in the box, so it is returned immediately.
2. **Maximum Length Calculation**: The maximum length of any substring in the box is derived from the formula `n - numFriends + 1`, ensuring the remaining parts of the string can be split into `numFriends - 1` non-empty substrings.
3. **Substring Comparison**: For each starting index, the algorithm checks the substring of length up to `maxLen` or the remaining characters. The comparison with the current largest substring is done character by character:
    - If a differing character is found, the substring with the higher character becomes the new candidate.
    - If one substring is a prefix of the other, the longer substring is chosen.
4. **Efficiency**: By comparing characters directly and only storing the start index and length of the candidate substring, the algorithm efficiently avoids repeated substring extraction, optimizing both time and space complexity.

This approach ensures that we efficiently find the lexicographically largest substring by leveraging direct character comparisons and optimal substring length constraints. The algorithm efficiently handles the worst-case scenarios with a time complexity of O(n^2), which is feasible given the problem constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**