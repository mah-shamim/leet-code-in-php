1371\. Find the Longest Substring Containing Vowels in Even Counts

**Difficulty:** Medium

**Topics:** `Hash Table`, `String`, `Bit Manipulation`, `Prefix Sum`

Given the string `s`, return _the size of the longest substring containing each vowel an even number of times_. That is, `'a'`, `'e'`, `'i'`, `'o'`, and `'u'` must appear an even number of times.

**Example 1:**

- **Input:** s = "eleetminicoworoep"
- **Output:** 13
- **Explanation:** The longest substring is "leetminicowor" which contains two each of the vowels: **e**, **i** and **o** and zero of the vowels: **a** and **u**.

**Example 2:**

- **Input:** s = "leetcodeisgreat"
- **Output:** 5
- **Explanation:** The longest substring is "leetc" which contains two **e**'s.


**Example 3:**

- **Input:** s = "bcbcbc"
- **Output:** 6
- **Explanation:** In this case, the given string "bcbcbc" is the longest because all vowels: **a**, **e**, **i**, **o** and **u** appear zero times.



**Constraints:**

- `1 <= s.length <= 5 x 10^5`
- `s` contains only lowercase English letters.


**Hint:**
1. Represent the counts (odd or even) of vowels with a bitmask.
2. Precompute the prefix xor for the bitmask of vowels and then get the longest valid substring.



**Solution:**

We can use **bit manipulation** to track the parity (even or odd) of vowels, along with a **hash table** to store prefix states. Here's how it can be approached:

### Steps:
1. **Bitmask Representation:** Since there are five vowels (`a, e, i, o, u`), we can use a 5-bit integer (bitmask) to represent whether the count of each vowel is odd or even. For each character:
   - Bit `0` represents whether the count of 'a' is odd.
   - Bit `1` represents whether the count of 'e' is odd.
   - Bit `2` represents whether the count of 'i' is odd.
   - Bit `3` represents whether the count of 'o' is odd.
   - Bit `4` represents whether the count of 'u' is odd.

   For example, a bitmask `00110` means `i` and `o` appear an odd number of times, while `a`, `e`, and `u` appear an even number of times.

2. **Prefix Sum with Bitmask:** Traverse the string and keep track of the current bitmask state as we encounter each character. If we encounter a bitmask that has been seen before, it means the substring between the previous occurrence of this bitmask and the current index has an even number of vowels for each vowel.

3. **Hash Table:** Store the first occurrence of each bitmask in a hash table (or associative array) to allow quick lookup.

4. **Initialization:** The bitmask starts at 0 (all vowels have been seen an even number of times initially).

5. **Edge Case:** If no vowels appear, the longest substring is the entire string since the count of vowels is trivially even (0 occurrences).

Let's implement this solution in PHP: **[1371. Find the Longest Substring Containing Vowels in Even Counts](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001371-find-the-longest-substring-containing-vowels-in-even-counts/solution.php)**

```php
<?php
/**
 * @param String $s
 * @return Integer
 */
function findTheLongestSubstring($s) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo findTheLongestSubstring("eleetminicoworoep") . "\n";  // Output: 13
echo findTheLongestSubstring("leetcodeisgreat") . "\n";    // Output: 5
echo findTheLongestSubstring("bcbcbc") . "\n";             // Output: 6
?>
```

### Explanation:

1. **Bitmask Updates:**
   - For each character in the string, if it's a vowel, its corresponding bit in the bitmask is flipped using XOR.

2. **Hash Table (`$mask_position`):**
   - This stores the first occurrence of each bitmask.
   - If the same bitmask appears again, the substring between the two indices has an even count of vowels.

3. **Iterating Through the String:**
   - For each character, check the current bitmask.
   - If the bitmask has been seen before, calculate the length of the substring.
   - If not, store the index of this new bitmask.

### Time Complexity:
- **Time Complexity:** O(n), where n is the length of the string. We only pass through the string once and perform constant-time operations for each character.
- **Space Complexity:** O(1) for the bitmask and O(n) for the hash table.

### Example Walkthrough:

For the input `"eleetminicoworoep"`:
- The longest valid substring is `"leetminicowor"`, which contains `e, i, o` two times each, and `a, u` zero times.

For the input `"leetcodeisgreat"`:
- The longest valid substring is `"leetc"`, where the vowels `e` appear twice.

For the input `"bcbcbc"`:
- Since there are no vowels, the entire string is valid. Hence, the output is `6`.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
