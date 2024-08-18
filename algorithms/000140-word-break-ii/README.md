140\. Word Break II

**Difficulty:** Hard

**Topics:** `Array`, `Hash Table`, `String`, `Dynamic Programming`, `Backtracking`, `Trie`, `Memoization`

Given a string `s` and a dictionary of strings `wordDict`, add spaces in `s` to construct a sentence where each word is a valid dictionary word. Return all such possible sentences in **any order**.

**Note** that the same word in the dictionary may be reused multiple times in the segmentation.

**Example 1:**

- **Input:** s = "catsanddog", wordDict = ["cat","cats","and","sand","dog"]
- **Output:** ["cats and dog","cat sand dog"]

**Example 2:**

- **Input:** s = "pineapplepenapple", wordDict = ["apple","pen","applepen","pine","pineapple"]
- **Output:** ["pine apple pen apple","pineapple pen apple","pine applepen apple"]
- **Explanation:** Note that you are allowed to reuse a dictionary word.

**Example 3:**

- **Input:** s = "catsandog", wordDict = ["cats","dog","sand","and","cat"]
- **Output:** [] 

**Constraints:**

- <code>1 <= s.length <= 20</code>
- <code>1 <= wordDict.length <= 1000</code>
- <code>1 <= wordDict[i].length <= 10</code>
- `s` and `wordDict[i]` consist of only lowercase English letters.
- All the strings of `wordDict` are **unique**.
- Input is generated in a way that the length of the answer doesn't exceed <code>10<sup>5</sup></code>.


**Solution:**


To solve this problem, we can follow these steps:

- **Purpose:** To return all possible sentences that can be constructed from the string `s` using the words in `wordDict`, where each word can be used multiple times.

### Key Components

1. **Memoization Check (`$this->map`):**
    - The function uses a property `$this->map` to store previously computed results for substrings. This prevents redundant computations and improves efficiency.
    - If the substring `s` is already present in `$this->map`, the function returns the cached result for that substring.

2. **Base Case:**
    - If the length of `s` is 0 (i.e., an empty string), it means we have successfully segmented the string up to this point, so we add an empty string to the result array and store this result in `$this->map` for future reference.

3. **Recursive Case:**
    - The function iterates through each word in `wordDict`. For each word, it checks if the word is a prefix of the string `s` (`strpos($s, $word) === 0`).
    - If it is a prefix, it recursively calls `wordBreak` on the remaining substring after removing the prefix (`substr($s, strlen($word))`).
    - For each result from the recursive call (`$subWords`), it concatenates the current word with each result from the recursive call, separating them by a space if necessary.

4. **Storing and Returning Results:**
    - After processing all possible prefixes and constructing all possible sentences, the results are stored in `$this->map` for the current substring `s`.
    - Finally, the function returns the result array.

Let's implement this solution in PHP: **[140. Word Break II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000140-word-break-ii/solution.php)**

```php
<?php
// Example usage:
$s = "catsanddog";
$wordDict = array("cat","cats","and","sand","dog");
print_r(wordBreak($s, $wordDict));  // Output: ["cats and dog","cat sand dog"]

$s = "pineapplepenapple";
$wordDict = array("apple","pen","applepen","pine","pineapple");
print_r(wordBreak($s, $wordDict));  // Output: ["pine apple pen apple","pineapple pen apple","pine applepen apple"]

$s = "catsandog";
$wordDict = array("cats","dog","sand","and","cat");
print_r(wordBreak($s, $wordDict));  // Output: []
?>
```

### Explanation:

- **Memoization:** Uses `$this->map` to store results for substrings and avoid redundant calculations.
- **Recursive Processing:** Tries every word in `wordDict` as a potential prefix and processes the remaining string recursively.
- **Building Results:** Concatenates words and results from recursive calls to form all possible sentences.

This approach is effective but may not be the most efficient for large inputs due to its exponential nature. The memoization helps mitigate redundant computations, but the overall complexity can still be high.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
