1079\. Letter Tile Possibilities

**Difficulty:** Medium

**Topics:** `Hash Table`, `String`, `Backtracking`, `Counting`

You have `n`  `tiles`, where each tile has one letter `tiles[i]` printed on it.

Return _the number of possible non-empty sequences of letters you can make using the letters printed on those `tiles`_.

**Example 1:**

- **Input:** tiles = "AAB"
- **Output:** 8
- **Explanation:** The possible sequences are "A", "B", "AA", "AB", "BA", "AAB", "ABA", "BAA".

**Example 2:**

- **Input:** tiles = "AAABBC"
- **Output:** 188


**Example 3:**

- **Input:** tiles = "V"
- **Output:** 1



**Constraints:**

- `1 <= tiles.length <= 7`
- `tiles` consists of uppercase English letters.


**Hint:**
1. Try to build the string with a backtracking DFS by considering what you can put in every position.



**Solution:**

We need to determine the number of distinct non-empty sequences that can be formed using the letters from a given set of tiles. Each tile has a letter printed on it, and sequences are considered distinct based on the order of letters, even if they use the same letters from different tiles.

### Approach
The approach involves using backtracking to generate all possible permutations of the tiles for all possible lengths from 1 to the length of the tiles string. We use a frequency map to keep track of the count of each letter and ensure that we do not generate duplicate sequences by carefully managing the counts of each letter during the backtracking process.

1. **Frequency Map**: First, we create a frequency map to count the occurrences of each character in the input string.
2. **Backtracking**: For each possible length from 1 to the length of the tiles string, we use a backtracking function to generate all valid permutations. The backtracking function will:
   - Decrease the count of a character when it is used.
   - Recur to build longer permutations.
   - Restore the count of the character after backtracking to explore other permutations.
3. **Summing Results**: Sum the results of all valid permutations for each possible length to get the final answer.

Let's implement this solution in PHP: **[1079. Letter Tile Possibilities](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001079-letter-tile-possibilities/solution.php)**

```php
<?php
/**
 * @param String $tiles
 * @return Integer
 */
function numTilePossibilities($tiles) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $counts
 * @param $k
 * @param $currentLength
 * @param $result
 * @return void
 */
function backtrack(&$counts, $k, $currentLength, &$result) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test Cases
echo numTilePossibilities("AAB") . "\n";    // Output: 8
echo numTilePossibilities("AAABBC") . "\n"; // Output: 188
echo numTilePossibilities("V") . "\n";      // Output: 1
?>
```

### Explanation:

1. **Frequency Map Creation**: The `array_count_values` function is used to create a frequency map of the characters in the input string.
2. **Backtracking Function**: The `backtrack` function recursively builds permutations by considering each character that still has a positive count. It decrements the count of a character when it is used, recursively processes the next position, and then restores the count to allow other permutations to be explored.
3. **Result Calculation**: For each possible length `k` from 1 to the length of the input string, the backtracking function is called to count all valid permutations of that length. These counts are summed to get the total number of distinct sequences.

This approach efficiently avoids generating duplicate sequences by managing the counts of each character and ensuring each permutation is unique through careful backtracking. The complexity is manageable due to the constraint of the input length being up to 7, making the backtracking approach feasible.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**