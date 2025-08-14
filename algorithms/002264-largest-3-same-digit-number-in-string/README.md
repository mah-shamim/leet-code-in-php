2264\. Largest 3-Same-Digit Number in String

**Difficulty:** Easy

**Topics:** `String`, `Weekly Contest 292`

You are given a string `num` representing a large integer. An integer is **good** if it meets the following conditions:

- It is a **substring** of `num` with length `3`.
- It consists of only one unique digit.

Return the **maximum good** integer as a **string** or an empty string `""` if no such integer exists.

Note:

- A **substring** is a contiguous sequence of characters within a string.
- There may be **leading zeroes** in `num` or a good integer.


**Example 1:**

- **Input:** num = "6<ins>777</ins>133339"
- **Output:** "777"
- **Explanation:** There are two distinct good integers: "777" and "333". "777" is the largest, so we return "777".

**Example 2:**

- **Input:** num = "23<ins>000</ins>19"
- **Output:** "000"
- **Explanation:** "000" is the only good integer.

**Example 3:**

- **Input:** num = "42352338"
- **Output:** ""
- **Explanation:** No substring of length 3 consists of only one unique digit. Therefore, there are no good integers.

**Constraints:**

- `3 <= num.length <= 1000`
- `num` only consists of digits.



**Hint:**
1. We can sequentially check if “999”, “888”, “777”, … , “000” exists in num in that order. The first to be found is the maximum good integer.
2. If we cannot find any of the above integers, we return an empty string “”.


**Similar Questions:**
1. [1903. Largest Odd Number in String](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001903-largest-odd-number-in-string)






**Solution:**

We need to find the largest 3-digit substring in a given string of digits where all three digits are the same. The solution involves checking for the presence of such substrings in descending order of digit values, from '999' down to '000'. The first substring found in this order will be the largest possible good integer.

### Approach
1. **Problem Analysis**: The task is to find a substring of length 3 in the input string where all three characters are identical. The solution should return the largest such substring if multiple exist. The largest substring is determined by the digit value (e.g., '999' is larger than '888').
2. **Intuition**: By checking substrings from the highest possible digit ('999') down to the lowest ('000'), the first valid substring encountered will inherently be the largest possible good integer.
3. **Algorithm Selection**: Iterate from digit 9 down to 0. For each digit, generate a candidate string of three identical digits. Check if this candidate exists in the input string. If found, return the candidate immediately. If no candidate is found after checking all digits, return an empty string.
4. **Complexity Analysis**: The algorithm checks at most 10 candidates (digits 9 to 0). Each check for substring existence in a string of length _** n **_ is _** O(n) **_. Thus, the overall complexity is _** O(10 × n) = O(n) **_, which is efficient for the given constraints (string length up to 1000).

Let's implement this solution in PHP: **[2264. Largest 3-Same-Digit Number in String](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002264-largest-3-same-digit-number-in-string/solution.php)**

```php
<?php
/**
 * @param String $num
 * @return String
 */
function largestGoodInteger($num) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo largestGoodInteger("6777133339") . "\n"; // Output: "777"
echo largestGoodInteger("2300019") . "\n";    // Output: "000"
echo largestGoodInteger("42352338") . "\n";   // Output: ""
?>
```

### Explanation:

1. **Initialization**: The function `largestGoodInteger` starts by iterating from the digit 9 down to 0.
2. **Candidate Generation**: For each digit, it creates a candidate string composed of three identical digits (e.g., '999', '888', ..., '000').
3. **Substring Check**: The function checks if the candidate string exists within the input string `$num`. The check accounts for both cases where the substring might be at the start of the string (index 0) or elsewhere.
4. **Return Result**: The first candidate found during the iteration is returned immediately as it is the largest possible good integer. If no candidate is found after checking all digits, an empty string is returned.

This approach efficiently locates the largest 3-same-digit substring by leveraging a descending digit iteration and early termination upon finding the first valid candidate. The solution handles edge cases such as leading zeros and absence of any valid substring gracefully.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**