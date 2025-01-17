567\. Permutation in String

**Difficulty:** Medium

**Topics:** `Hash Table`, `Two Pointers`, `String`, `Sliding Window`

Given two strings `s1` and `s2`, return _`true` if `s2` contains a permutation[^1] of `s1`, or `false` otherwise_.

In other words, return _`true` if one of `s1`'s permutations is the substring of `s2`_.

**Example 1:**

- **Input:** s1 = "ab", s2 = "eidbaooo"
- **Output:** true
- **Explanation:** s2 contains one permutation of s1 ("ba").

**Example 2:**

- **Input:** s1 = "ab", s2 = "eidboaoo"
- **Output:** false



**Constraints:**

- <code>1 <= s1.length, s2.length <= 10<sup>4</sup></code>
- `s1` and `s2` consist of lowercase English letters.


**Hint:**
1. Obviously, brute force will result in TLE. Think of something else.
2. How will you check whether one string is a permutation of another string?
3. One way is to sort the string and then compare. But, Is there a better way?
4. If one string is a permutation of another string then they must have one common metric. What is that?
5. Both strings must have same character frequencies, if one is permutation of another. Which data structure should be used to store frequencies?
6. What about hash table? An array of size 26?

[^1]: **Permutation** `A permutation is a rearrangement of all the characters of a string.`


**Solution:**

We can use the **sliding window** technique with a frequency counter, rather than trying every possible substring permutation (which would be too slow for large inputs).

### Key Idea:
1. If a permutation of `s1` is a substring of `s2`, both strings must have the same character frequencies for the letters present in `s1`.
2. We can use a sliding window of length `s1` over `s2` to check if the substring within the window is a permutation of `s1`.

### Steps:
- Create a frequency counter for `s1` (i.e., count the occurrences of each character).
- Slide a window over `s2` of size equal to `s1` and check if the frequency of characters in the window matches the frequency of characters in `s1`.
- If the frequencies match, it means that the substring in the window is a permutation of `s1`.

### Algorithm:
1. Create a frequency array (`count1`) for `s1`.
2. Use another frequency array (`count2`) for the current window in `s2`.
3. Slide the window over `s2` and update the frequency array for the window as you move.
4. If the frequency arrays match at any point, return `true`.
5. If you slide through all of `s2` without finding a match, return `false`.

Let's implement this solution in PHP: **[567. Permutation in String](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000567-permutation-in-string/solution.php)**

```php
<?php
/**
 * @param String $s1
 * @param String $s2
 * @return Boolean
 */
function checkInclusion($s1, $s2) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage
$s1 = "ab";
$s2 = "eidbaooo";
echo checkInclusion($s1, $s2) ? "true" : "false"; // Output: true
?>
```

### Explanation:

1. **Frequency Arrays**:
   - We use two arrays (`count1` for `s1` and `count2` for the sliding window in `s2`) of size 26, corresponding to the 26 lowercase letters.
   - Each array keeps track of how many times each character appears.

2. **Sliding Window**:
   - We first initialize the frequency of the first window (the first `len1` characters of `s2`) and compare it to `count1`.
   - Then, we slide the window one character at a time. For each step, we update the frequency array by:
      - Adding the character that is entering the window.
      - Removing the character that is leaving the window.
   - After each slide, we compare the two frequency arrays.

3. **Efficiency**:
   - Instead of recalculating the frequency for every new window, we efficiently update the frequency array by adjusting just two characters.
   - This gives an overall time complexity of **O(n)**, where `n` is the length of `s2`.

### Time and Space Complexity:
- **Time Complexity**: `O(n)` where `n` is the length of `s2`. We iterate over `s2` once, updating the frequency arrays in constant time.
- **Space Complexity**: `O(1)`, as we are only using fixed-size arrays (size 26) to store the frequency counts of characters.

This approach ensures that the solution is efficient even for larger inputs.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**



