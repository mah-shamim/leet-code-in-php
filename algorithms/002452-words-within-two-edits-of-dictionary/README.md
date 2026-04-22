2452\. Words Within Two Edits of Dictionary

**Difficulty:** Medium

**Topics:** `Senior`, `Array`, `String`, `Trie`, `Biweekly Contest 90`

You are given two string arrays, `queries` and `dictionary`. All words in each array comprise of lowercase English letters and have the same length.

In one **edit** you can take a word from `queries`, and change any letter in it to any other letter. Find all words from `queries` that, after a **maximum** of two edits, equal some word from `dictionary`.

Return _a list of all words from `queries`, that match with some word from `dictionary` after a maximum of **two edits**_. Return _the words in the **same order** they appear in `queries`_.

**Example 1:**

- **Input:** queries = ["word","note","ants","wood"], dictionary = ["wood","joke","moat"]
- **Output:** ["word","note","wood"]
- **Explanation:**
  - Changing the 'r' in "word" to 'o' allows it to equal the dictionary word "wood".
  - Changing the 'n' to 'j' and the 't' to 'k' in "note" changes it to "joke".
  - It would take more than 2 edits for "ants" to equal a dictionary word.
  - "wood" can remain unchanged (0 edits) and match the corresponding dictionary word.
  - Thus, we return ["word","note","wood"].

**Example 2:**

- **Input:** queries = ["yes"], dictionary = ["not"]
- **Output:** []
- **Explanation:** Applying any two edits to "yes" cannot make it equal to "not". Thus, we return an empty array.

**Constraints:**

- `1 <= queries.length, dictionary.length <= 100`
- `n == queries[i].length == dictionary[j].length`
- `1 <= n <= 100`
- All `queries[i]` and `dictionary[j]` are composed of lowercase English letters.



**Hint:**
1. Try brute-forcing the problem.
2. For each word in queries, try comparing to each word in dictionary.
3. If there is a maximum of two edit differences, the word should be present in answer.



**Similar Questions:**
1. [127. Word Ladder](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000127-word-ladder)






**Solution:**

The problem requires identifying which words from `queries` can be transformed into **any** word from `dictionary` with **at most two letter changes** (edits). The brute-force approach compares each query word with each dictionary word, counting character mismatches, and stops early if more than two mismatches are found.

### Approach:

- **Brute-force comparison** between each query and each dictionary word.
- **Character-by-character mismatch counting** for each pair.
- **Early termination** if mismatch count exceeds 2.
- **Order preservation** by processing queries in their original order.

Let's implement this solution in PHP: **[2452. Words Within Two Edits of Dictionary](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002452-words-within-two-edits-of-dictionary/solution.php)**

```php
<?php
/**
 * @param String[] $queries
 * @param String[] $dictionary
 * @return String[]
 */
function twoEditWords(array $queries, array $dictionary): array
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo twoEditWords(["word","note","ants","wood"], ["wood","joke","moat"]) . "\n";    // Output: ["word","note","wood"]
echo twoEditWords(["yes"], ["not"]) . "\n";                                         // Output: []
?>
```

### Explanation:

- **Step 1 — Initialize result array**: An empty array `$result` is created to store query words that meet the condition.
- **Step 2 — Iterate through queries**: For each `$query`, assume initially it’s not matched (`$matched = false`).
- **Step 3 — Compare with dictionary**: Loop through `$dictionary`. For each `$dictWord`, compare characters with `$query`.
- **Step 4 — Count differences**: Track `$diffCount` for positions where characters differ.
- **Step 5 — Early stop**: If `$diffCount > 2`, break out of the inner loop for that dictionary word.
- **Step 6 — Match found**: If `$diffCount <= 2`, set `$matched = true` and break out of the dictionary loop.
- **Step 7 — Add to result**: If `$matched`, append `$query` to `$result`.
- **Step 8 — Return result**: After processing all queries, return `$result`.

### Complexity
- **Time Complexity**:
   - **_O(q . d . n)_** where **_q_** = number of queries, **_d_** = size of dictionary, **_n_** = length of each word.
   - In worst case, each comparison checks all **_n_** characters (up to 100), and **_q, d ≤ 100_**, so at most **_100 . 100 . 100 = 10⁶_** operations, which is acceptable.
- **Space Complexity**:
   - **_O(q)_** for the result array (excluding input storage).
   - No additional data structures proportional to input size beyond the result.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**