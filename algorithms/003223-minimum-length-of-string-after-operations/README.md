3223\. Minimum Length of String After Operations

**Difficulty:** Medium

**Topics:** `Hash Table`, `String`, `Counting`

You are given a string `s`.

You can perform the following process on `s` **any** number of times:

- Choose an index `i` in the string such that there is **at least** one character to the left of index `i` that is equal to `s[i]`, and **at least** one character to the right that is also equal to `s[i]`.
- Delete the **closest** character to the **left** of index `i` that is equal to `s[i]`.
- Delete the **closest** character to the **right** of index `i` that is equal to `s[i]`.

Return _the **minimum** length of the final string `s` that you can achieve_.

**Example 1:**

- **Input:** s = "abaacbcbb"
- **Output:** 5
- **Explanation:** We do the following operations:
  - Choose index 2, then remove the characters at indices 0 and 3. The resulting string is s = "bacbcbb".
  - Choose index 3, then remove the characters at indices 0 and 5. The resulting string is s = "acbcb".


**Example 2:**

- **Input:** s = "aa"
- **Output:** 2
- **Explanation:** We cannot perform any operations, so we return the length of the original string.



**Constraints:**

- <code>1 <= s.length <= 2 * 10<sup>5</sup></code>
- `s` consists only of lowercase English letters.


**Hint:**
1. Only the frequency of each character matters in finding the final answer.
2. If a character occurs less than 3 times, we cannot perform any process with it.
3. Suppose there is a character that occurs at least 3 times in the string, we can repeatedly delete two of these characters until there are at most 2 occurrences left of it.



**Solution:**

We need to focus on the frequency of each character in the string. Here’s the approach to solve it:

### Approach:
1. **Count Character Frequencies**:
   - Use a frequency table to count how many times each character appears in the string.

2. **Reduce Characters with Frequency >= 3**:
   - If a character appears 3 or more times, we can repeatedly delete two of them until only 2 occurrences are left.

3. **Calculate the Minimum Length**:
   - Sum up the remaining counts of all characters after reducing the frequencies.

Let's implement this solution in PHP: **[3223. Minimum Length of String After Operations](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003223-minimum-length-of-string-after-operations/solution.php)**

```php
<?php
/**
 * @param String $s
 * @return Integer
 */
function minimumLength($s) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example 1
$s1 = "abaacbcbb";
echo "Input: $s1\n";
echo "Output: " . minimumLength($s1) . "\n";

// Example 2
$s2 = "aa";
echo "Input: $s2\n";
echo "Output: " . minimumLength($s2) . "\n";
?>
```

### Explanation:

1. **Frequency Count**:
   - Iterate through the string, and for each character, increment its count in the `$frequency` array.

2. **Reduction of Characters**:
   - For each character in the `$frequency` array, check if its count is 3 or more. If so, reduce it to at most 2.

3. **Calculate the Result**:
   - Sum the values in the `$frequency` array to get the minimum possible length of the string.

### Example Walkthrough:

#### Example 1:
- Input: `s = "abaacbcbb"`
- Frequencies: `['a' => 3, 'b' => 4, 'c' => 2]`
- After reduction:
   - `'a' => 2` (reduced from 3),
   - `'b' => 2` (reduced from 4),
   - `'c' => 2` (no reduction needed).
- Minimum length: `2 + 2 + 2 = 6`.

#### Example 2:
- Input: `s = "aa"`
- Frequencies: `['a' => 2]`
- No reduction needed since no character has a frequency of 3 or more.
- Minimum length: `2`.

### Complexity:
1. **Time Complexity**:
   - Counting frequencies: _**O(n)**_, where _**n**_ is the length of the string.
   - Reduction: _**O(1)**_ (constant time, as there are only 26 lowercase letters).
   - Summing frequencies: _**O(1)**_.
   - Overall: _**O(n)**_.

2. **Space Complexity**:
   - _**O(1)**_, since the frequency array has at most 26 entries.

This solution is efficient and works well within the problem's constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
