2213\. Longest Substring of One Repeating Character

**Difficulty:** Hard

**Topics:** `Senior Staff`, `Array`, `String`, `Segment Tree`, `Ordered Set`, `Weekly Contest 285`

You are given a **0-indexed** string `s`. You are also given a **0-indexed** string `queryCharacters` of length `k` and a **0-indexed** array of integer **indices** `queryIndices` of length `k`, both of which are used to describe `k` queries.

The `iᵗʰ` query updates the character in `s` at index `queryIndices[i]` to the character `queryCharacters[i]`.

Return an array `lengths` of length `k` where `lengths[i]` is the **length** of the **longest substring** of `s` consisting of **only one repeating** character **after** the `iᵗʰ` query is performed.

**Example 1:**

- **Input:** s = "babacc", queryCharacters = "bcb", queryIndices = [1,3,3]
- **Output:** [3,3,4]
- **Explanation:**
  - 1ˢᵗ query updates s = "<ins>b**b**b</ins>acc". The longest substring consisting of one repeating character is "bbb" with length 3.
  - 2ⁿᵈ query updates s = "bbb<ins>**c**cc</ins>".
    - The longest substring consisting of one repeating character can be "bbb" or "ccc" with length 3.
  - 3ʳᵈ query updates s = "<ins>bbb**b**</ins>cc". The longest substring consisting of one repeating character is "bbbb" with length 4.
    - Thus, we return [3,3,4].

**Example 2:**

- **Input:** s = "abyzz", queryCharacters = "aa", queryIndices = [2,1]
- **Output:** [2,3]
- **Explanation:**
  - 1ˢᵗ query updates s = "ab**a**<ins>zz</ins>". The longest substring consisting of one repeating character is "zz" with length 2.
  - 2ⁿᵈ query updates s = "<ins>a**a**a</ins>zz". The longest substring consisting of one repeating character is "aaa" with length 3.
    - Thus, we return [2,3].

**Example 3:**

- **Input:** s = "a", queryCharacters = "b", queryIndices = [0]
- **Output:** [1]

**Example 4:**

- **Input:** s = "aaaa", queryCharacters = "b", queryIndices = [2]
- **Output:** [2]

**Example 5:**

- **Input:** s = "abc", queryCharacters = "a", queryIndices = [0]
- **Output:** [1]

**Example 6:**

- **Input:** s = "ababab", queryCharacters = "a", queryIndices = [1]
- **Output:** [2]

**Constraints:**

- `1 <= s.length <= 10⁵`
- `s` consists of lowercase English letters.
- `k == queryCharacters.length == queryIndices.length`
- `1 <= k <= 10⁵`
- `queryCharacters` consists of lowercase English letters.
- `0 <= queryIndices[i] < s.length`


**Hint:**
1. Use a segment tree to perform fast point updates and range queries.
2. We need each segment tree node to store the length of the longest substring of that segment consisting of only 1 repeating character.
3. We will also have each segment tree node store the leftmost and rightmost character of the segment, the max length of a prefix substring consisting of only 1 repeating character, and the max length of a suffix substring consisting of only 1 repeating character.
4. Use this information to properly merge the two segment tree nodes together.


**Similar Questions:**
1. [56. Merge Intervals](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000056-merge-intervals)
2. [424. Longest Repeating Character Replacement](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000424-longest-repeating-character-replacement)
3. [1446. Consecutive Characters](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001446-consecutive-characters)
4. [1649. Create Sorted Array through Instructions](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001649-create-sorted-array-through-instructions)
5. [2407. Longest Increasing Subsequence II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002407-longest-increasing-subsequence-ii)


**Solution:**

We implement a segment tree solution to efficiently handle point updates and range queries for finding the longest substring of identical characters after each update. The segment tree stores five key pieces of information per node: leftmost character, rightmost character, longest prefix length, longest suffix length, and the overall maximum length. By merging child nodes with careful boundary checks, we maintain the correct state after each character update in _**O(log n)**_ time.

## Approach

- **Segment Tree Design**: Each node represents a segment of the string and stores comprehensive information to determine the longest run of identical characters within that segment.
- **Node Information**: For each segment, we store:
   - Leftmost character (`treeLeftChar`)
   - Rightmost character (`treeRightChar`)
   - Longest prefix of identical characters (`treePrefix`)
   - Longest suffix of identical characters (`treeSuffix`)
   - Longest substring of identical characters (`treeMax`)
- **Build Phase**: Recursively construct the segment tree from the initial string, setting leaf nodes with value 1 for all fields.
- **Merge Operation**: When combining two child segments, we:
   - Determine if the prefix extends across the boundary when the right child's leftmost char matches the left child's rightmost char
   - Similarly compute suffix extension across the boundary
   - Calculate the maximum run that crosses the boundary by adding suffix of left child and prefix of right child
- **Update Phase**: Perform point updates by traversing to the leaf, updating it, then merging back up the tree.
- **Query Response**: After each update, the answer is simply `treeMax[1]` (the root node's maximum).

Let's implement this solution in PHP: **[2213. Longest Substring of One Repeating Character](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002213-longest-substring-of-one-repeating-character/solution.php)**

```php
<?php
/**
 * @param String $s
 * @param String $queryCharacters
 * @param Integer[] $queryIndices
 * @return Integer[]
 */
function longestRepeating(string $s, string $queryCharacters, array $queryIndices): array
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * Build segment tree
 * 
 * @param $node
 * @param $l
 * @param $r
 * @param $s
 * @param $treeLeftChar
 * @param $treeRightChar
 * @param $treePrefix
 * @param $treeSuffix
 * @param $treeMax
 * @return void
 */
function build($node, $l, $r, $s, &$treeLeftChar, &$treeRightChar, &$treePrefix, &$treeSuffix, &$treeMax): void
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * Merge two child nodes
 * 
 * @param $node
 * @param $l
 * @param $mid
 * @param $r
 * @param $treeLeftChar
 * @param $treeRightChar
 * @param $treePrefix
 * @param $treeSuffix
 * @param $treeMax
 * @return void
 */
function merge($node, $l, $mid, $r, &$treeLeftChar, &$treeRightChar, &$treePrefix, &$treeSuffix, &$treeMax): void
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * Update a position in the segment tree
 * 
 * @param $node
 * @param $l
 * @param $r
 * @param $idx
 * @param $char
 * @param $treeLeftChar
 * @param $treeRightChar
 * @param $treePrefix
 * @param $treeSuffix
 * @param $treeMax
 * @return void
 */
function update($node, $l, $r, $idx, $char, &$treeLeftChar, &$treeRightChar, &$treePrefix, &$treeSuffix, &$treeMax): void
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo longestRepeating("babacc", "bcb", [1,3,3]) .  "\n";        // Output: [3, 3, 4]
echo longestRepeating("abyzz", "aa", [2,1]) .  "\n";            // Output: [2, 3]
echo longestRepeating("a", "b", [0]) .  "\n";                   // Output: [1]
echo longestRepeating("aaaa", "b", [2]) .  "\n";                // Output: [2]
echo longestRepeating("abc", "a", [0]) .  "\n";                 // Output: [1]
echo longestRepeating("ababab", "a", [1]) .  "\n";              // Output: [2]
?>
```

### Explanation:

- **Leaf Node Initialization**: For a single character, all metrics are set to 1, and both left and right characters are that character.
- **Prefix Calculation**: The prefix of the merged node is either:
   - The prefix of the left child, OR
   - If the entire left child is a run and its rightmost char matches the left child's rightmost char, add the prefix of the right child
- **Suffix Calculation**: Similarly, the suffix is either:
   - The suffix of the right child, OR
   - If the entire right child is a run and its leftmost char matches the left child's rightmost char, add the suffix of the left child
- **Maximum Calculation**: The maximum is:
   - The maximum of the two children's maximums
   - PLUS a potential crossing run: when the boundary chars match, the crossing run length = suffix of left child + prefix of right child
- **Efficient Updates**: Each update only affects _**O(log n)**_ nodes, making this approach efficient for up to `10⁵` queries.

## Complexity Analysis

- **Time Complexity**: _**O((n + k) log n)**_ where `n` is string length and `k` is number of queries
   - Building the tree: _**O(n)**_
   - Each update: _**O(log n)**_
   - Total: _**O(n + k log n)**_
- **Space Complexity**: _**O(n)**_ for the segment tree arrays (`4 * n space`)

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**