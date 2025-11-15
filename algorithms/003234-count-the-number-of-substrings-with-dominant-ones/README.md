3234\. Count the Number of Substrings With Dominant Ones

**Difficulty:** Medium

**Topics:** `String`, `Sliding Window`, `Enumeration`, `Weekly Contest 408`

You are given a binary string `s`.

Return the number of substrings[^1] with **dominant** ones.

A string has **dominant** ones if the number of ones in the string is **greater than or equal** to the **square** of the number of zeros in the string.

**Example 1:**

- **Input:** s = "00011"
- **Output:** 2
- **Explanation:** The substrings with dominant ones are shown in the table below.
  
  | i	 | j	 | s[i..j]	 | Number of Zeros	 | Number of Ones |
  |----|----|----------|------------------|----------------|
  | 3	 | 3	 | 1	       | 0	               | 1              |
  | 4	 | 4	 | 1	       | 0	               | 1              |
  | 2	 | 3	 | 01	      | 1	               | 1              |
  | 3	 | 4	 | 11	      | 0	               | 2              |
  | 2	 | 4	 | 011	     | 1	               | 2              |

**Example 2:**

- **Input:** s = "101101"
- **Output:** 16
- **Explanation:** The substrings with non-dominant ones are shown in the table below.
  - Since there are 21 substrings total and 5 of them have non-dominant ones, it follows that there are 16 substrings with dominant ones.
  
  | i	 | j	 | s[i..j]	 | Number of Zeros	 | Number of Ones |
  |----|----|----------|------------------|----------------|
  | 1	 | 1	 | 0	       | 1	               | 0              |
  | 4	 | 4	 | 0	       | 1	               | 0              |
  | 1	 | 4	 | 0110	    | 2	               | 2              |
  | 0	 | 4	 | 10110	   | 2	               | 3              |
  | 1	 | 5	 | 01101	   | 2	               | 3              |

**Constraints:**

- `1 <= s.length <= 4 * 10⁴`
- `s` consists only of characters `'0'` and `'1'`.



**Hint:**
1. Let us fix the starting index `l` of the substring and count the number of indices `r` such that `l <= r` and the substring `s[l..r]` has dominant ones.
2. A substring with dominant ones has at most `sqrt(n)` zeros.
3. We cannot iterate over every `r` and check if the `s[l..r]` has dominant ones. Instead, we iterate over the next `sqrt(n)` zeros to the left of `l` and count the number of substrings with dominant ones where the current zero is the rightmost zero of the substring.




**Similar Questions:**
1. [696. Count Binary Substrings](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000696-count-binary-substrings)



[^1]: **Substring:** A **substring** is a contiguous **non-empty** sequence of characters within a string.






**Solution:**

We need to count the number of substrings in a binary string where the number of ones is greater than or equal to the square of the number of zeros. The challenge is to efficiently compute this without checking every possible substring explicitly, which would be computationally expensive for large strings.

### Approach:

1. **Problem Analysis**: The problem requires checking all possible substrings of the given binary string to determine if they meet the condition where the number of ones is at least the square of the number of zeros. Directly checking all substrings would result in an O(n^2) solution, which is inefficient for large strings (n up to 40,000).

2. **Key Insight**: For any substring to satisfy the condition, the number of zeros in the substring must be limited. Specifically, if a substring has `k` zeros, it must have at least `k^2` ones. Given the constraints, the maximum number of zeros in any valid substring cannot exceed a certain limit (since `k^2` must be ≤ the substring length). This limit is approximately the square root of the string length, which is around 200 for n=40,000.

3. **Algorithm Selection**: We use a sliding window approach combined with preprocessing to efficiently count valid substrings. The steps are:
   - Precompute the positions of all zeros in the string.
   - For each starting index `l` of the substring, determine the range of ending indices `r` such that the substring `s[l..r]` has at most 200 zeros and satisfies the condition.
   - Use the precomputed zero positions to quickly find the number of zeros in any substring and check the condition.

4. **Complexity Analysis**: The algorithm processes each starting index `l` and checks up to 200 possible zeros, leading to an O(200 * n) time complexity, which is efficient for the given constraints.

Let's implement this solution in PHP: **[3234. Count the Number of Substrings With Dominant Ones](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003234-count-the-number-of-substrings-with-dominant-ones/solution.php)**

```php
<?php
/**
 * @param String $s
 * @return Integer
 */
function numberOfSubstrings($s) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo numberOfSubstrings("00011") . "\n";    // Output: 5
echo numberOfSubstrings("101101") . "\n";   // Output: 16
?>
```

### Explanation:

1. **Preprocessing**: We first compute an array `pre0` where `pre0[i]` stores the number of zeros from the start of the string up to index `i-1`. We also store the positions of all zeros in the array `zeros`.

2. **Counting Valid Substrings**: For each starting index `l`, we calculate the number of valid substrings starting at `l`:
   - **Zero-length check**: For substrings with zero zeros (all ones), all substrings starting at `l` until the first zero are valid. This is handled by `$count += ($firstZero - $l)`.
   - **Non-zero zeros**: For substrings with `k` zeros (from 1 to 200), we check if the substring length is at least `k^2 + k`. Using the precomputed zero positions, we determine the range of `r` where the substring `s[l..r]` has exactly `k` zeros and meets the length condition. The count of such valid substrings is added to the total.

3. **Efficiency**: By limiting the check to at most 200 zeros per starting index, the algorithm efficiently computes the result in linear time relative to the string length, making it suitable for large inputs.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**