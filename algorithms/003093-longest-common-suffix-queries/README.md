3093\. Longest Common Suffix Queries

**Difficulty:** Hard

**Topics:** `Senior Staff`, `Array`, `String`, `Trie`, `Weekly Contest 390`

You are given two arrays of strings `wordsContainer` and `wordsQuery`.

For each `wordsQuery[i]`, you need to find a string from `wordsContainer` that has the **longest common suffix** with `wordsQuery[i]`. If there are two or more strings in `wordsContainer` that share the longest common suffix, find the string that is the **smallest** in length. If there are two or more such strings that have the **same** smallest length, find the one that occurred **earlier** in `wordsContainer`.

Return _an array of integers `ans`, where `ans[i]` is the index of the string in `wordsContainer` that has the **longest common suffix** with `wordsQuery[i]`_.

**Example 1:**

- **Input:** wordsContainer = ["abcd","bcd","xbcd"], wordsQuery = ["cd","bcd","xyz"]
- **Output:** [1,1,1]
- **Explanation:**
   - Let's look at each `wordsQuery[i]` separately:
     - For `wordsQuery[0] = "cd"`, strings from `wordsContainer` that share the longest common suffix `"cd"` are at indices 0, 1, and 2. Among these, the answer is the string at index 1 because it has the shortest length of 3.
     - For `wordsQuery[1] = "bcd"`, strings from `wordsContainer` that share the longest common suffix `"bcd"` are at indices 0, 1, and 2. Among these, the answer is the string at index 1 because it has the shortest length of 3.
     - For `wordsQuery[2] = "xyz"`, there is no string from `wordsContainer` that shares a common suffix. Hence the longest common suffix is `""`, that is shared with strings at index 0, 1, and 2. Among these, the answer is the string at index 1 because it has the shortest length of 3.


**Example 2:**

- **Input:** wordsContainer = ["abcdefgh","poiuygh","ghghgh"], wordsQuery = ["gh","acbfgh","acbfegh"]
- **Output:** [2,0,2]
- **Explanation:**
   - Let's look at each `wordsQuery[i]` separately:
     - For `wordsQuery[0] = "gh"`, strings from wordsContainer that share the longest common suffix `"gh"` are at indices 0, 1, and 2. Among these, the answer is the string at index 2 because it has the shortest length of 6.

**Constraints:**

- `1 <= wordsContainer.length, wordsQuery.length <= 10⁴`
- `1 <= wordsContainer[i].length <= 5 * 10³`
- `1 <= wordsQuery[i].length <= 5 * 10³`
- `wordsContainer[i]` consists only of lowercase English letters.
- `wordsQuery[i]` consists only of lowercase English letters.
- Sum of `wordsContainer[i].length` is at most `5 * 1⁵`.
- Sum of `wordsQuery[i].length` is at most `5 * 10⁵`.



**Hint:**
1. If we reverse the strings, the problem changes to finding the longest common prefix.
2. Build a Trie, each node is a letter and only saves the best word’s index in each node, based on the criteria.



**Similar Questions:**
1. [14. Longest Common Prefix](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000014-longest-common-prefix)
2. [3043. Find the Length of the Longest Common Prefix](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003043-find-the-length-of-the-longest-common-prefix)






**Solution:**

The problem requires finding, for each query string, the index of a container string that shares the **longest common suffix** with the query.  
Tie-breaking rules:
1. Prefer the **shortest** string among those with the longest common suffix.
2. If lengths are equal, prefer the **earliest** index in `wordsContainer`.

The solution **reverses all strings** and builds a **trie** on the reversed container strings, storing the best (shortest length, earliest index) string at each node.  
Each query is reversed and traversed in the trie; the last reachable node gives the best container index.

### Approach:

- **Reverse strings** to convert the problem into a **longest common prefix** problem in a trie.
- **Build a trie** from reversed container strings.
- **Store in each trie node** the best container word index based on:
   - Primary: shortest length of original word
   - Secondary: smallest index if lengths are equal
- **Process each query** by reversing it and walking the trie as far as possible.
- The **best index** at the final node is the answer.

Let's implement this solution in PHP: **[3093. Longest Common Suffix Queries](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003093-longest-common-suffix-queries/solution.php)**

```php
<?php
/**
 * @param String[] $wordsContainer
 * @param String[] $wordsQuery
 * @return Integer[]
 */
function stringIndices(array $wordsContainer, array $wordsQuery): array
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}


// Test cases
echo stringIndices(["abcd","bcd","xbcd"], ["cd","bcd","xyz"]) . "\n";                           // Output: [1,1,1]
echo stringIndices(["abcdefgh","poiuygh","ghghgh"], ["gh","acbfgh","acbfegh"]) . "\n";          // Output: [2,0,2]
?>
```

### Explanation:

- **Step 1 — Reverse strings** Reversing turns "longest common suffix" into "longest common prefix" in a trie.

- **Step 2 — Initialize trie and root node** Root node’s best index/length are updated from all container words, since an empty suffix is always valid.

- **Step 3 — Insert each container word (reversed) into trie**
   - At each node (including root), check if the current word’s length is shorter than stored best length, or equal length but earlier index → update best.
   - This ensures later queries can quickly get the best match for any prefix.

- **Step 4 — Query processing**  
  - Reverse query string, walk down trie character by character.  
  - Stop when a character is missing in children.  
  - The last successfully reached node’s stored best index is the answer.

- **Step 5 — Complexity handling** Total container + query length is large (up to ~5×10⁵), so trie traversal is efficient.

### Complexity
- **Time Complexity**:
   - Building trie: _**O(∑ |wordsContainer[i]|)**_
   - Query processing: _**O(∑ |wordsQuery[i]|)**_
   - Total: _**O(total length of all strings)**_
- **Space Complexity**:
   - Trie nodes: _**O(∑ |wordsContainer[i]|)**_
   - Each node stores children map and two integers.
   - Total: _**O(total length of all container strings)**_


**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**


#3167, #3168 leetcode problems 003093-longest-common-suffix-queries submissions 2015652626

