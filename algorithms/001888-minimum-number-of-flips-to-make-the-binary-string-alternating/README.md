1888\. Minimum Number of Flips to Make the Binary String Alternating

**Difficulty:** Medium

**Topics:** `Staff`, `String`, `Dynamic Programming`, `Sliding Window`, `Weekly Contest 244`

You are given a binary string `s`. You are allowed to perform two types of operations on the string in any sequence:

- **Type-1: Remove** the character at the start of the string `s` and **append** it to the end of the string.
- **Type-2:** Pick any character in `s` and **flip** its value, i.e., if its value is `'0'` it becomes `'1'` and vice-versa.

Return _the **minimum** number of **type-2** operations you need to perform such that `s` becomes **alternating**_.

The string is called **alternating** if no two adjacent characters are equal.

- For example, the strings `"010"` and `"1010"` are alternating, while the string `"0100"` is not.


**Example 1:**

- **Input:** s = "111000"
- **Output:** 2
- **Explanation:** Use the first operation two times to make s = "100011".
  Then, use the second operation on the third and sixth elements to make s = "10<ins>1</ins>0<ins>1</ins>0".

**Example 2:**

- **Input:** s = "010"
- **Output:** 0
- **Explanation:** The string is already alternating.

**Example 3:**

- **Input:** s = "1110"
- **Output:** 1
- **Explanation:** Use the second operation on the second element to make s = "1<ins>0</ins>10".

**Constraints:**

- `1 <= s.length <= 10⁵`
- `s[i]` is either `'0'` or `'1'`.


**Hint:**
1. Note what actually matters is how many 0s and 1s are in odd and even positions
2. For every cyclic shift we need to count how many 0s and 1s are at each parity and convert the minimum between them for each parity


**Similar Questions:**
1. [2170. Minimum Operations to Make the Array Alternating](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002170-minimum-operations-to-make-the-array-alternating)






**Solution:**

We are given a binary string and can perform free rotations (moving first character to end) and costly flips (changing a character). The goal is to find the minimum flips needed to make the string alternating (no two adjacent equal). By considering both possible alternating patterns (starting with `0` or `1`) and all rotations, we can efficiently compute the minimum flips using a sliding window over a doubled string and pre‑computed prefix sums.

### Approach:

- Duplicate the string to handle rotations easily (`s + s`).
- Pre‑compute two prefix sum arrays over the doubled string:
   - `prefix0[i]` = number of mismatches if the alternating pattern starting with `0` is applied up to index `i-1`.
   - `prefix1[i]` = similarly for the pattern starting with `1`.
- For each possible rotation starting index `i` (0 ≤ i < n), the flips needed for pattern `p` in the window `[i, i+n-1]` are `prefix_p[i+n] - prefix_p[i]`.
- Take the minimum over all `i` and both patterns.

Let's implement this solution in PHP: **[1888. Minimum Number of Flips to Make the Binary String Alternating](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001888-minimum-number-of-flips-to-make-the-binary-string-alternating/solution.php)**

```php
<?php
/**
 * @param String $s
 * @return Integer
 */
function minFlips(string $s): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo minFlips("111000") . "\n";         // Output: 2
echo minFlips("010") . "\n";            // Output: 0
echo minFlips("1110") . "\n";           // Output: 1
?>
```

### Explanation:

- An alternating string of length `n` must be exactly one of two patterns:
   - Pattern 0: `0,1,0,1,...` (even indices `0`)
   - Pattern 1: `1,0,1,0,...` (even indices `1`)
- Rotating the original string does not change the multiset of characters; it only shifts which positions are considered even/odd relative to the start.
- By concatenating the string with itself, every rotation of length `n` appears as a contiguous substring of length `n` in the doubled string.
- For a given rotation start `i`, we can compare each character in the window with the two patterns and count mismatches.
- Using prefix sums, the number of mismatches for a window is obtained in O(1) time, avoiding O(n²) brute force.
- After evaluating all rotations, the smallest flip count is the answer.

### Complexity
- **Time Complexity**: _**O(n)**_ – building prefix arrays and sliding over `n` rotations.
- **Space Complexity**: _**O(n)**_ – two prefix arrays of size 2n+1.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**