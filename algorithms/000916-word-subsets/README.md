916\. Word Subsets

**Difficulty:** Medium

**Topics:** `Array`, `Hash Table`, `String`

You are given two string arrays `words1` and `words2`.

A string `b` is a **subset** of string `a` if every letter in `b` occurs in `a` including multiplicity.

- For example, `"wrr"` is a subset of `"warrior"` but is not a subset of `"world"`.

A string `a` from `words1` is **universal** if for every string `b` in `words2`, `b` is a subset of `a`.

Return _an array of all the **universal** strings in `words1`_. You may return the answer in **any order**.

**Example 1:**

- **Input:** words1 = ["amazon","apple","facebook","google","leetcode"], words2 = ["e","o"]
- **Output:** ["facebook","google","leetcode"]

**Example 2:**

- **Input:** words1 = ["amazon","apple","facebook","google","leetcode"], words2 = ["l","e"]
- **Output:** ["apple","google","leetcode"]



**Constraints:**

- <code>1 <= words1.length, words2.length <= 10<sup>4</sup></code>
- `1 <= words1[i].length, words2[i].length <= 10`
- `words1[i]` and `words2[i]` consist only of lowercase English letters.
- All the strings of `words1` are **unique**.




**Solution:**

We need to identify the words in `words1` that are "universal", meaning each string in `words2` is a subset of the word from `words1`.

### Approach:

1. **Count the Frequency of Characters in `words2`:**
   - First, we need to determine the maximum count for each character across all strings in `words2`. This gives us the required number of occurrences for each character to be a subset.

2. **Check Each Word in `words1`:**
   - For each word in `words1`, count the frequency of each character.
   - If the character counts in the word from `words1` meet or exceed the required counts from `words2`, then the word is universal.

3. **Return the Universal Words:**
   - After checking all words in `words1`, return the ones that are universal.

Let's implement this solution in PHP: **[916. Word Subsets](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000916-word-subsets/solution.php)**

```php
<?php
/**
 * @param String[] $words1
 * @param String[] $words2
 * @return String[]
 */
function wordSubsets($words1, $words2) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
$words1 = ["amazon", "apple", "facebook", "google", "leetcode"];
$words2 = ["e", "o"];
print_r(wordSubsets($words1, $words2));  // Output: ["facebook", "google", "leetcode"]

$words2 = ["l", "e"];
print_r(wordSubsets($words1, $words2));  // Output: ["apple", "google", "leetcode"]
?>
```

### Explanation:

1. **Building Frequency Map for `words2`:** We loop through each word in `words2` and calculate the frequency of each character. We keep track of the maximum frequency needed for each character across all words in `words2`.

2. **Checking `words1` Words:** For each word in `words1`, we calculate the frequency of each character and compare it with the required frequency from `words2`. If the word meets the requirements for all characters, it's considered universal.

3. **Result:** We store all the universal words in the result array and return it at the end.

### Time Complexity:
- **Building the frequency map for `words2`:** O(n * m), where `n` is the length of `words2` and `m` is the average length of words in `words2`.
- **Checking `words1`:** O(k * m), where `k` is the length of `words1` and `m` is the average length of words in `words1`.
- The total time complexity is approximately **O(n * m + k * m)**.

This approach ensures that we check each word efficiently and meets the problem's constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
