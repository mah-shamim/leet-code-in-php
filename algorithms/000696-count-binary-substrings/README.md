696\. Count Binary Substrings

**Difficulty:** Easy

**Topics:** `Staff`, `Two Pointers`, `String`

Given a binary string `s`, return the number of non-empty substrings that have the same number of `0`'s and `1`'s, and all the `0`'s and all the `1`'s in these substrings are grouped consecutively.

Substrings that occur multiple times are counted the number of times they occur.

**Example 1:**

- **Input:** s = "00110011"
- **Output:** 6
- **Explanation:** There are 6 substrings that have equal number of consecutive 1's and 0's: "0011", "01", "1100", "10", "0011", and "01".
  Notice that some of these substrings repeat and are counted the number of times they occur.
  Also, "00110011" is not a valid substring because all the 0's (and 1's) are not grouped together.

**Example 2:**

- **Input:** s = "10101"
- **Output:** 4
- **Explanation:** There are 4 substrings: "10", "01", "10", "01" that have equal number of consecutive 1's and 0's.

**Constraints:**

- `1 <= s.length <= 10⁵`
- `s[i]` is either `'0'` or `'1'`.



**Hint:**
1. How many valid binary substrings exist in "000111", and how many in "11100"? What about "00011100"?



**Similar Questions:**
1. [271. Encode and Decode Strings](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000271-encode-and-decode-strings)
2. [2489. Number of Substrings With Fixed Ratio](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002489-number-of-substrings-with-fixed-ratio)
3. [3234. Count the Number of Substrings With Dominant Ones](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003234-count-the-number-of-substrings-with-dominant-ones)






**Solution:**

We can require counting all non-empty substrings of a binary string where the number of 0s and 1s is equal, and all 0s and all 1s are grouped consecutively. The given solution efficiently counts these substrings in O(n) time and O(1) space by grouping consecutive identical characters and, for each adjacent pair of groups, adding the minimum of their lengths to the total count.

### Approach:

- **Group consecutive characters**: Traverse the string and record the lengths of consecutive runs of the same digit.
- **Compare adjacent groups**: For every adjacent pair of groups (e.g., a run of 0s followed by a run of 1s), the number of valid substrings that can be formed from them is the smaller of the two group lengths.
- **Iterative counting**: Maintain two variables – the length of the previous group (`prevGroupLength`) and the length of the current group (`currentGroupLength`).
- **Update on character change**: When the digit changes, add `min(prevGroupLength, currentGroupLength)` to the result, then set `prevGroupLength = currentGroupLength` and reset `currentGroupLength = 1` for the new group.
- **Final addition**: After the loop, add the contribution of the last pair of groups (`min(prevGroupLength, currentGroupLength)`).

Let's implement this solution in PHP: **[696. Count Binary Substrings](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000696-count-binary-substrings/solution.php)**

```php
<?php
/**
 * @param String $s
 * @return Integer
 */
function countBinarySubstrings(string $s): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo countBinarySubstrings("00110011") . "\n";      // Output: 6
echo countBinarySubstrings("10101") . "\n";         // Output: 4
?>
```

### Explanation:

- **Why grouping works**: A valid substring must consist of one group of identical digits followed immediately by another group of the opposite digit, because all 0s and 1s must be consecutive within the substring. For example, `"000111"` yields substrings `"01"`, `"0011"`, `"000111"` – exactly 3, which equals the minimum of the two group lengths (3 and 3 → min = 3).
- **Minimum of lengths**: If the first group has length `a` and the second has length `b`, the longest possible substring is `a+b` long, but it must contain equal numbers of each digit. The substring must use the first `k` digits of the first group and the first `k` digits of the second group, where `1 ≤ k ≤ min(a,b)`. Hence there are exactly `min(a,b)` such substrings for that adjacent pair.
- **Counting across the string**: By iterating through the string once and tracking group lengths, we effectively compute the sum of `min(a,b)` for every consecutive pair of groups.
- **Edge cases**: Strings shorter than 2 have no valid substrings. The algorithm handles single‑character groups and repeated runs correctly.

### Complexity
- **Time Complexity**: _**O(n)**_ – we make one pass through the string.
- **Space Complexity**: _**O(1)**_ – only a few integer variables are used.


**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**