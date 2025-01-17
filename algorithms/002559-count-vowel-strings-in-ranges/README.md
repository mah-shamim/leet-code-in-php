2559\. Count Vowel Strings in Ranges

**Difficulty:** Medium

**Topics:** `Array`, `String`, `Prefix Sum`

You are given a **0-indexed** array of strings `words` and a 2D array of integers `queries`.

Each query <code>queries[i] = [l<sub>i</sub>, r<sub>i</sub>]</code> asks us to find the number of strings present in the range <code>l<sub>i</sub></code> to <code>r<sub>i</sub></code> (both inclusive) of `words` that start and end with a vowel.

Return _an array `ans` of size `queries.length`, where `ans[i]` is the answer to the <code>i<sup>th</sup></code> query_.

**Note** that the vowel letters are `'a'`, `'e'`, `'i'`, `'o'`, and `'u'`.

**Example 1:**

- **Input:** words = ["aba","bcb","ece","aa","e"], queries = [[0,2],[1,4],[1,1]]
- **Output:** [2,3,0]
- **Explanation:** The strings starting and ending with a vowel are "aba", "ece", "aa" and "e".
  The answer to the query [0,2] is 2 (strings "aba" and "ece").
  to query [1,4] is 3 (strings "ece", "aa", "e").
  to query [1,1] is 0.
  We return [2,3,0].

**Example 2:**

- **Input:** words = ["a","e","i"], queries = [[0,2],[0,1],[2,2]]
- **Output:** [3,2,1]
- **Explanation:** Every string satisfies the conditions, so we return [3,2,1].


**Constraints:**

- <code>1 <= words.length <= 10<sup>5</sup></code>
- `1 <= words[i].length <= 40`
- `words[i]` consists only of lowercase English letters.
- <code>sum(words[i].length) <= 3 * 10<sup>5</sup></code>
- <code>1 <= queries.length <= 10<sup>5</sup></code>
- <code>0 <= l<sub>i</sub> <= r<sub>i</sub> < words.length</code>


**Hint:**
1. Precompute the prefix sum of strings that start and end with vowels.
2. Use unordered_set to store vowels.
3. Check if the first and last characters of the string are present in the vowels set.
4. Subtract prefix sum for range `[l-1, r]` to find the number of strings starting and ending with vowels.



**Solution:**

We can follow these steps:

1. **Check for Vowel Strings:** Create a helper function to determine whether a string starts and ends with a vowel.
2. **Precompute Prefix Sums:** Use a prefix sum array to store the cumulative count of strings that start and end with vowels.
3. **Answer Queries:** Use the prefix sum array to efficiently calculate the number of such strings within the specified range for each query.

Let's implement this solution in PHP: **[2559. Count Vowel Strings in Ranges](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002559-count-vowel-strings-in-ranges/solution.php)**

```php
<?php
/**
 * @param String[] $words
 * @param Integer[][] $queries
 * @return Integer[]
 */
function vowelStrings($words, $queries) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * Helper function to check if a string starts and ends with a vowel
 *
 * @param $word
 * @return bool
 */
function isVowelString($word) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example 1
$words1 = ["aba", "bcb", "ece", "aa", "e"];
$queries1 = [[0, 2], [1, 4], [1, 1]];
print_r(countVowelStringsInRanges($words1, $queries1)); // Output: [2, 3, 0]

// Example 2
$words2 = ["a", "e", "i"];
$queries2 = [[0, 2], [0, 1], [2, 2]];
print_r(countVowelStringsInRanges($words2, $queries2)); // Output: [3, 2, 1]
?>
```

### Explanation:

1. **`isVowelString` Function:**
   - Checks if the first and last characters of the string are vowels.
   - Uses `in_array` to determine if the characters are in the predefined list of vowels.

2. **Prefix Sum Array:**
   - `prefixSum[i]` stores the cumulative count of vowel strings up to index `i-1`.
   - If the current word satisfies the condition, increment the count.

3. **Query Resolution:**
   - For a range `[l, r]`, the count of vowel strings is `prefixSum[r + 1] - prefixSum[l]`.

4. **Efficiency:**
   - Constructing the prefix sum array takes _**O(n)**_, where _**n**_ is the number of words.
   - Resolving each query takes _**O(1)**_, making the overall complexity _**O(n + q)**_, where _**q**_ is the number of queries.

### Edge Cases:
- All strings start and end with vowels.
- No strings start and end with vowels.
- Single-element ranges in the queries.

This approach efficiently handles the constraints of the problem.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
