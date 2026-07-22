3501\. Maximize Active Section with Trade II

**Difficulty:** Hard

**Topics:** `Principal`, `Array`, `String`, `Binary Search`, `Segment Tree`, `Biweekly Contest 153`

You are given a binary string `s` of length `n`, where:

- `'1'` represents an **active** section.
- `'0'` represents an **inactive** section.

You can perform **at most one trade** to maximize the number of active sections in `s`. In a trade, you:

- Convert a contiguous block of `'1'`s that is surrounded by `'0'`s to all `'0'`s.
- Afterward, convert a contiguous block of `'0'`s that is surrounded by `'1'`s to all `'1'`s.

Additionally, you are given a **2D array** `queries`, where `queries[i] = [lᵢ, rᵢ]` represents a **substring[^1]** `s[lᵢ...rᵢ]`.

For each query, determine the **maximum** possible number of active sections in `s` after making the optimal trade on the substring `s[lᵢ...rᵢ]`.

Return an array `answer`, where `answer[i]` is the result for `queries[i]`.

**Note**
- For each query, treat `s[li...ri]` as if it is **augmented** with a `'1'` at both ends, forming `t = '1' + s[lᵢ...rᵢ] + '1'`. The augmented `'1'`s **do not** contribute to the final count.
- The queries are independent of each other.

[^1]: **Substring:** A **substring** is a contiguous **non-empty** sequence of characters within a string.

**Example 1:**

- **Input:** s = "01", queries = [[0,1]]
- **Output:** [1]
- **Explanation:** Because there is no block of `'1'`s surrounded by `'0'`s, no valid trade is possible. The maximum number of active sections is 1.

**Example 2:**

- **Input:** s = "0100", queries = [[0,3],[0,2],[1,3],[2,3]]
- **Output:** [4,3,1,1]
- **Explanation:**
  - Query `[0, 3]` → Substring `"0100"` → Augmented to `"101001"`
    - Choose `"0100"`, convert `"0100"` → `"0000"` → `"1111"`.
    - The final string without augmentation is `"1111"`. The maximum number of active sections is 4.
  - Query `[0, 2]` → Substring `"010"` → Augmented to `"10101"`
    - Choose `"010"`, convert `"010"` → `"000"` → `"111"`.
    - The final string without augmentation is `"1110"`. The maximum number of active sections is 3.
  - Query `[1, 3]` → Substring `"100"` → Augmented to "11001"
    - Because there is no block of `'1'`s surrounded by `'0'`s, no valid trade is possible. The maximum number of active sections is 1.
  - Query `[2, 3]` → Substring `"00"` → Augmented to `"1001"`
    - Because there is no block of `'1'`s surrounded by `'0'`s, no valid trade is possible. The maximum number of active sections is 1.


**Example 3:**

- **Input:** s = "1000100", queries = [[1,5],[0,6],[0,4]]
- **Output:** [6,7,2]
- **Explanation:**
  - Query `[1, 5]` → Substring `"00010"` → Augmented to `"1000101"`
    - Choose `"00010"`, convert `"00010"` → `"00000"` → `"11111"`.
    - The final string without augmentation is `"1111110"`. The maximum number of active sections is 6.
  - Query `[0, 6]` → Substring `"1000100"` → Augmented to `"110001001"`
    - Choose `"000100"`, convert `"000100"` → `"000000"` → `"111111"`.
    - The final string without augmentation is `"1111111"`. The maximum number of active sections is 7.
  - Query `[0, 4]` → Substring `"10001"` → Augmented to `"1100011"`
    - Because there is no block of `'1'`s surrounded by `'0'`s, no valid trade is possible. The maximum number of active sections is 2.


**Example 4:**

- **Input:** s = "01010", queries = [[0,3],[1,4],[1,3]]
- **Output:** [4,4,2]
- **Explanation:**
  - Query `[0, 3]` → Substring `"0101"` → Augmented to `"101011"`
    - Choose `"010"`, convert `"010"` → `"000"` → `"111"`.
    - The final string without augmentation is `"11110"`. The maximum number of active sections is 4.
  - Query `[1, 4]` → Substring `"1010"` → Augmented to `"110101"`
    - Choose `"010"`, convert `"010"` → `"000"` → `"111"`.
    - The final string without augmentation is `"01111"`. The maximum number of active sections is 4.
  - Query `[1, 3]` → Substring `"101"` → Augmented to `"11011"`
    - Because there is no block of `'1'`s surrounded by `'0'`s, no valid trade is possible. The maximum number of active sections is 2.


**Example 5:**

- **Input:** s = "1111", queries = [[0,3]]
- **Output:** [4]


**Example 6:**

- **Input:** "0000", queries = [[0,3]]
- **Output:** [0]


**Example 7:**

- **Input:** s = "01010", queries = [[0,0], [4,4]]
- **Output:** [1,1]


**Example 8:**

- **Input:** s = "001100", queries = [[0,5], [1,4]]
- **Output:** [4,4]


**Example 9:**

- **Input:** "1001001", queries = [[0,6]]
- **Output:** [7]


**Example 10:**

- **Input:** s = "100010001", queries = [[0,8]]
- **Output:** [7]


**Constraints:**

- `1 <= n == s.length <= 10⁵`
- `1 <= queries.length <= 10⁵`
- `s[i]` is either `'0'` or `'1'`.
- `queries[i] = [lᵢ, rᵢ]`
- `0 <= lᵢ <= rᵢ < n`


**Hint:**
1. Split consecutive zeros and ones into segments and give each segment an ID.
2. The answer should be the maximum of `ans[i] = len[i - 1] + len[i + 1]`, where `i` is a one-segment.
3. For a zero-segment, define `ans[i] = 0`.
4. Note that all three segments (`i - 1`, `i`, and `i + 1`) should be fully covered by the substring.
5. Use a segment tree to perform range maximum queries on the answer. The query to the segment tree is not straightforward since we need to ensure the zero-segments are fully covered. Handle the first and last segments separately.


**Solution:**

We developed a solution to maximize active sections after performing at most one trade on substrings of a binary string. Our approach efficiently handles up to 10⁵ length strings and 10⁵ queries by precomputing zero-group information and using a sparse table for range maximum queries. The key insight is that a trade effectively swaps a block of zeros surrounded by ones with a block of ones surrounded by zeros, and the optimal trade always involves merging two adjacent zero segments plus their surrounding one segments.

## Approach

- **Segment Identification**: We identify all contiguous zero segments and assign each character an index mapping to its zero segment (or `-1` if it's a `'1'`)
- **Precomputation**: For each pair of adjacent zero segments, we compute the potential gain (sum of their lengths) which represents the maximum additional active sections we can get
- **Range Query Optimization**: We use a sparse table to answer range maximum queries on the precomputed gains in _**O(1)**_ time
- **Trade Validity Check**: A trade is valid only when a zero segment is completely contained in the query substring, as we need a block of ones surrounded by zeros to convert
- **Edge Case Handling**: We handle partial zero segments at the query boundaries separately since they can only be partially used in a trade

Let's implement this solution in PHP: **[3501. Maximize Active Section with Trade II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003501-maximize-active-section-with-trade-ii/solution.php)**

```php
<?php
/**
 * @param String $s
 * @param Integer[][] $queries
 * @return Integer[]
 */
function maxActiveSectionsAfterTrade(string $s, array $queries): array
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * Returns the zero groups and the index of the zero group that contains the i-th character.
 *
 * @param string $s
 * @return array{0: Group[], 1: int[]}
 */
function getZeroGroups(string $s): array {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * Returns the sums of the lengths of the adjacent groups.
 *
 * @param Group[] $zeroGroups
 * @return int[]
 */
function getZeroMergeLengths(array $zeroGroups): array {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * Returns the indices of the adjacent groups that contain l and r completely.
 *
 * @param int $startGroupIndex
 * @param int $endGroupIndex
 * @return int[]
 */
function mapToAdjacentGroupIndices(int $startGroupIndex, int $endGroupIndex): array {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo maxActiveSectionsAfterTrade("01", [[0,1]]) .  "\n";                        // Output: [1]
echo maxActiveSectionsAfterTrade("0100", [[0,3],[0,2],[1,3],[2,3]]) .  "\n";    // Output: [4,3,1,1]
echo maxActiveSectionsAfterTrade("1000100", [[1,5],[0,6],[0,4]]) .  "\n";       // Output: [6,7,2]
echo maxActiveSectionsAfterTrade("01010", [[0,3],[1,4],[1,3]]) .  "\n";         // Output: [4,4,2]
echo maxActiveSectionsAfterTrade("1111", [[0,3]]) .  "\n";                      // Output: [4]
echo maxActiveSectionsAfterTrade("0000", [[0,3]]) .  "\n";                      // Output: [0]
echo maxActiveSectionsAfterTrade("01010", [[0,0], [4,4]]) .  "\n";              // Output: [1,1]
echo maxActiveSectionsAfterTrade("001100", [[0,5], [1,4]]) .  "\n";             // Output: [4,4]
echo maxActiveSectionsAfterTrade("1001001", [[0,6]]) .  "\n";                   // Output: [7]
echo maxActiveSectionsAfterTrade("100010001", [[0,8]]) .  "\n";                 // Output: [7]
?>
```

### Explanation:

- **Core Idea**: The trade operation can be viewed as: find a zero segment, convert it to ones, and convert an adjacent one segment to zeros. Since we want to maximize active sections, we want to choose the zero segment and its adjacent one segments that yield the maximum gain
- **Optimal Trade Structure**: The optimal trade always uses:
   - A zero segment that is completely inside the query (to convert to ones)
   - The adjacent one segments on both sides (to convert to zeros, but they become ones anyway through the trade)
   - The actual gain is the length of the zero segment being converted to ones, minus the length of one adjacent one segment that gets converted to zeros (but this is offset by the fact that the other adjacent one segment remains as ones)
   - Net gain = length of zero segment (converted to ones) - min(length of left one segment, length of right one segment) if we consider the standard trade, but our simplification shows it's optimal to take a zero segment and its two neighboring one segments
- **Simplified View**: After analyzing the trade mechanics, the maximum gain from a trade is the maximum sum of two adjacent zero segments that are fully covered by the query. This is because:
   - Converting a zero segment to ones gives us its length in new ones
   - The adjacent one segments on both sides must be converted to zeros, but these are the same one segments that are "surrounded by zeros" in the augmented string
   - The net gain is `length(zero segment i) + length(zero segment i+1)` when both are fully covered
- **Query Processing**: For each query:
   - Start with total ones in the string
   - Find the first and last zero segment indices that intersect the query
   - If the query fully covers one or more complete zero segments, use the sparse table to find the maximum adjacent pair sum
   - Handle boundary cases where the query cuts through zero segments by considering partial gains
   - The answer is the maximum of the original count and the enhanced count
- **Sparse Table Benefits**: Using a sparse table allows _**O(1)**_ range maximum queries after _**O(n log n)**_ preprocessing, which is crucial for handling up to `10⁵` queries efficiently

## Complexity Analysis

- **Time Complexity**: _**O((n + q) log n)**_ where `n` is string length and `q` is number of queries
   - _**O(n)**_ for zero group identification and preprocessing
   - _**O(n log n**_) for sparse table construction
   - _**O(1)**_ per query for range maximum queries using sparse table
   - _**O(1)**_ per query for boundary case handling
- **Space Complexity**: _**O(n log n)**_ for the sparse table, _**O(n)**_ for auxiliary arrays

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**