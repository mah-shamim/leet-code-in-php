3518\. Smallest Palindromic Rearrangement II

**Difficulty:** Hard

**Topics:** `Senior Staff`, `Hash Table`, `Math`, `String`, `Combinatorics`, `Counting`, `Weekly Contest 445`

You are given a **palindromic[^1]** string `s` and an integer `k`.

Return the **k-th** **lexicographically smallest[^2]** palindromic permutation[^3] of `s`. If there are fewer than `k` distinct palindromic permutations, return an empty string.

**Note:** Different rearrangements that yield the same palindromic string are considered identical and are counted once.

[^1]: **Palindrome:** A **palindrome** is a string that reads the same forward and backward.

[^2]: **Lexicographically Smaller:** A string `a` is **lexicographically smaller** than a string `b` if in the first position where `a` and `b` differ, string `a` has a letter that appears earlier in the alphabet than the corresponding letter in `b`. If the first `min(a.length, b.length)` characters do not differ, then the shorter string is the lexicographically smaller one.

[^3]: **Permutation:** A **permutation** is a rearrangement of all the characters of a string.

**Example 1:**

- **Input:** s = "abba", k = 2
- **Output:** "baab"
- **Explanation:**
  - The two distinct palindromic rearrangements of `"abba"` are `"abba"` and `"baab"`.
  - Lexicographically, `"abba"` comes before `"baab"`. Since `k = 2`, the output is `"baab"`.


**Example 2:**

- **Input:** s = "aa", k = 2
- **Output:** ""
- **Explanation:**
  - There is only one palindromic rearrangement: `"aa"`.
  - The output is an empty string since `k = 2` exceeds the number of possible rearrangements.


**Example 3:**

- **Input:** s = "bacab", k = 1
- **Output:** "abcba"
- **Explanation:**
  - The two distinct palindromic rearrangements of `"bacab"` are `"abcba"` and `"bacab"`.
  - Lexicographically, `"abcba"` comes before `"bacab"`. Since `k = 1`, the output is `"abcba"`.


**Example 4:**

- **Input:** s = "ngxgvdibmbbqbbdodhnnhdodbbqbbmbidvgxgn", k = 663276
- **Output:** "bbbbbdddgmoxhninvqggqvninhxomgdddbbbbb"


**Example 5:**

- **Input:** s = "z", k = 1
- **Output:** "z"


**Example 6:**

- **Input:** s = "aaaa", k = 1
- **Output:** "aaaa"


**Example 7:**

- **Input:** s = "aabb", k = 2
- **Output:** "baab"


**Example 8:**

- **Input:** s = "abcba", k = 2
- **Output:** "abcba"


**Constraints:**

- `1 <= s.length <= 10⁴`
- `s` consists of lowercase English letters.
- `s` is guaranteed to be palindromic.
- `1 <= k <= 10⁶`


**Hint:**
1. Only build `floor(n / 2)` characters (the rest are determined by symmetry).
2. Count character frequencies and use half the counts for construction.
3. Incrementally choose each character (from smallest to largest) and calculate how many valid arrangements result if that character is chosen at the current index.
4. If the count is at least `k`, fix that character; otherwise, subtract the count from `k` and try the next candidate.
5. Use combinatorics to compute the number of permutations at each step.


**Solution:**

We are given a palindromic string `s` and an integer `k`, and we need to return the k-th lexicographically smallest distinct palindromic permutation of `s`. If fewer than `k` such permutations exist, return an empty string. The key insight is that any palindromic permutation is fully determined by its first half, since the second half is the reverse. Therefore, we only need to construct the left half using half the character counts (and possibly one middle character if the total length is odd). We then use combinatorial counting to decide, character by character, which one goes at each position of the left half, subtracting counts of skipped permutations until we reach the k-th one. This approach avoids generating all permutations explicitly and works efficiently even for strings up to length 10⁴.

## Approach

- **Validate palindrome possibility:** A palindromic permutation exists iff at most one character has an odd frequency in the original string.
- **Build half-counts and middle character:** Divide each character's frequency by 2 to get the count for the left half. If one character has an odd count, it will be the middle character; otherwise, the middle is empty.
- **Check if k is within total permutations:** Compute total number of distinct permutations of the left half using multinomial formula. If `k > total`, return `""`.
- **Construct left half character by character:** For each position in the left half, iterate through characters `'a'` to `'z'`. Tentatively place a character, decrement its count, and count how many permutations would result from the remaining multiset. If that count is at least `k`, fix the character and proceed. Otherwise, subtract the count from `k` and try the next character.
- **Form the final palindrome:** Concatenate the constructed left half, the middle character (if any), and the reverse of the left half.

Let's implement this solution in PHP: **[3518. Smallest Palindromic Rearrangement II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003518-smallest-palindromic-rearrangement-ii/solution.php)**

```php
<?php
/**
 * @param String $s
 * @param Integer $k
 * @return String
 */
function smallestPalindrome(string $s, int $k): string
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $count
 * @return bool
 */
function isPalindromePossible($count): bool
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $count
 * @return array
 */
function getHalfCountAndMidLetter($count): array
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $halfCount
 * @return int
 */
function calculateTotalPermutations($halfCount): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $halfCount
 * @param $k
 * @return array
 */
function generateLeftHalf(&$halfCount, $k): array
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $count
 * @return int
 */
function countArrangements($count): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $n
 * @param $k
 * @return int
 */
function nCk($n, $k): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo smallestPalindrome("abba", 2) .  "\n";                                             // Output: "baab"
echo smallestPalindrome("aa", 2) .  "\n";                                               // Output: ""
echo smallestPalindrome("bacab", 1) .  "\n";                                            // Output: "abcba"
echo smallestPalindrome("ngxgvdibmbbqbbdodhnnhdodbbqbbmbidvgxgn", 663276) .  "\n";      // Output: "bbbbbdddgmoxhninvqggqvninhxomgdddbbbbb"
echo smallestPalindrome("z", 1) .  "\n";                                                // Output: "z"
echo smallestPalindrome("aaaa", 1) .  "\n";                                             // Output: "aaaa"
echo smallestPalindrome("aabb", 2) .  "\n";                                             // Output: "baab"
echo smallestPalindrome("abcba", 2) .  "\n";                                            // Output: "bacab"
?>
```

### Explanation:

- **Why only half the string matters**  
  - In a palindrome, the second half is a mirror of the first. Thus, building only the first half and mirroring it covers all possibilities.
- **Counting permutations with duplicates**  
  - The number of distinct arrangements of a multiset is given by the multinomial coefficient: total! / (count1! * count2! * ...). This is computed iteratively using combinations.
- **Lexicographic ordering**  
  - By trying characters from smallest to largest at each position, we naturally generate permutations in lexicographic order. Using the count of permutations starting with a candidate character allows us to jump to the k-th one without generating all.
- **Early stopping with k > total**  
  - We cap counts at a value slightly above `1e6` (since `k` is at most `1e6`) to avoid integer overflow and unnecessary computation.
- **Edge cases**  
  - If the string length is 1, the left half is empty, and the only palindrome is the string itself.  
  - If `k = 1`, the function returns the smallest lexicographic palindrome.

## Complexity Analysis

- **Time Complexity:**
   - Counting frequencies: _**O(n)**_
   - Generating left half: For each position (at most `n/2`), we try up to 26 characters. For each try, we compute arrangements in `O(26)` operations.
   - Overall: _**O(n * 26 * 26) ≈ O(n)**_ since 26 is constant.
   - In practice: _**O(n)**_ with a small constant factor.

- **Space Complexity:**
   - _**O(1)**_ auxiliary space (fixed 26-element arrays for counts), plus _**O(n)**_ for the output string.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**