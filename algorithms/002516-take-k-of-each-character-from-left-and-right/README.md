2516\. Take K of Each Character From Left and Right

**Difficulty:** Medium

**Topics:** `Hash Table`, `String`, `Sliding Window`

You are given a string `s` consisting of the characters `'a'`, `'b'`, and `'c'` and a non-negative integer `k`. Each minute, you may take either the **leftmost** character of `s`, or the **rightmost** character of `s`.

Return _the **minimum** number of minutes needed for you to take **at least** `k` of each character, or return `-1` if it is not possible to take `k` of each character_.

**Example 1:**

- **Input:** s = "aabaaaacaabc", k = 2
- **Output:** 8
- **Explanation:**  
  Take three characters from the left of s. You now have two 'a' characters, and one 'b' character.
  Take five characters from the right of s. You now have four 'a' characters, two 'b' characters, and two 'c' characters.
  A total of 3 + 5 = 8 minutes is needed.
  It can be proven that 8 is the minimum number of minutes needed.

**Example 2:**

- **Input:** s = "a", k = 1
- **Output:** -1
- **Explanation:** It is not possible to take one 'b' or 'c' so return -1.

**Constraints:**

- <code>1 <= s.length <= 10<sup>5</sup></code>
- `s` consists of only the letters `'a'`, `'b'`, and `'c'`.
- `0 <= k <= s.length`


**Hint:**
1. Start by counting the frequency of each character and checking if it is possible.
2. If you take x characters from the left side, what is the minimum number of characters you need to take from the right side? Find this for all values of x in the range 0 ≤ x ≤ s.length.
3. Use a two-pointers approach to avoid computing the same information multiple times.



**Solution:**

We can use a sliding window technique with two pointers to find the minimum number of minutes needed to take at least `k` of each character ('a', 'b', 'c') from both the left and right of the string.

### Problem Breakdown:
- We are given a string `s` containing only 'a', 'b', and 'c'.
- We need to take at least `k` occurrences of each character, either from the leftmost or rightmost characters of the string.
- We need to determine the **minimum number of minutes** required to achieve this or return `-1` if it's impossible.

### Approach:

1. **Initial Checks**:
   - If `k == 0`, we can directly return `0` since no characters are required.
   - If `k` exceeds the number of occurrences of any character in the string, return `-1` immediately.

2. **Frequency Count**:
   - We need to count how many times 'a', 'b', and 'c' appear in the string `s` to ensure that it's even possible to gather `k` of each character.

3. **Sliding Window Technique**:
   - Use a sliding window approach with two pointers (`left` and `right`).
   - Maintain two pointers and slide them from both ends of the string to gather the required characters.
   - For every number of characters taken from the left, calculate the minimum number of characters that need to be taken from the right to satisfy the requirement.

4. **Optimization**:
   - Instead of recalculating the character counts repeatedly for each window, we can keep track of character counts as we expand or contract the window.

Let's implement this solution in PHP: **[2516. Take K of Each Character From Left and Right](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002516-take-k-of-each-character-from-left-and-right/solution.php)**

```php
<?php
/**
 * @param String $s
 * @param Integer $k
 * @return Integer
 */
function takeCharacters($s, $k) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example 1
echo takeCharacters("aabaaaacaabc", 2);  // Output: 8

// Example 2
echo takeCharacters("a", 1);  // Output: -1
?>
```

### Explanation:

1. **Initial Setup**:
   - We count the occurrences of `'a'`, `'b'`, and `'c'` in the entire string to ensure it's possible to gather at least `k` of each character.
   - If any character count is less than `k`, return `-1`.

2. **Sliding Window**:
   - We use two pointers (`left` and `right`) to create a sliding window from both ends.
   - We expand the window by moving the `right` pointer and increment the count of the characters encountered.
   - Once we have at least `k` of each character in the current window, we try to shrink the window from the left to minimize the number of minutes (characters taken).

3. **Minimize Time**:
   - We track the minimum number of minutes required by comparing the size of the window each time we collect `k` characters of all types.

### Time Complexity:
- Counting characters initially takes O(n).
- The sliding window operation takes O(n), as both `left` and `right` pointers move across the string once.
- Overall time complexity is O(n).

### Edge Cases:
- If `k == 0`, return `0`.
- If it's impossible to take `k` of each character, return `-1`.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
