1208\. Get Equal Substrings Within Budget

**Difficulty:** Medium

**Topics:** `String`, `Binary Search`, `Sliding Window`, `Prefix Sum`

You are given two strings `s` and `t` of the same length and an integer `maxCost`.

You want to change `s` to `t`. Changing the <code>i<sup>th</sup></code> character of s to ith character of `t` costs `|s[i] - t[i]|` (i.e., the absolute difference between the ASCII values of the characters).

Return _the maximum length of a substring of `s` that can be changed to be the same as the corresponding substring of `t` with a cost less than or equal to `maxCost`. If there is no substring from `s` that can be changed to its corresponding substring from `t`, return `0`_.

**Example 1:**

- **Input:** s = "abcd", t = "bcdf", maxCost = 3
- **Output:** 3
- **Explanation:** "abc" of s can change to "bcd".\
  That costs 3, so the maximum length is 3.


**Example 2:**

- **Input:** s = "abcd", t = "cdef", maxCost = 3
- **Output:** 1
- **Explanation:** Each character in s costs 2 to change to character in t,  so the maximum length is 1.


**Example 3:**

- **Input:** s = "abcd", t = "acde", maxCost = 0
- **Output:** 1
- **Explanation:** You cannot make any change, so the maximum length is 1.


**Constraints:**

- <code>1 <= s.length <= 10<sup>5</sup></code>
- <code>t.length == s.length</code>
- <code>0 <= maxCost <= 10<sup>6</sup></code>
- `s` and `t` consist of only lowercase English letters.


**Hint:**
1. Calculate the differences between s[i] and t[i].
2. Use a sliding window to track the longest valid substring.



**Solution:**

The problem asks us to find the maximum length of a substring in string `s` that can be transformed into a substring in string `t` with a cost not exceeding `maxCost`. The cost of changing a character is the absolute difference between the ASCII values of corresponding characters in `s` and `t`. We need to determine the longest substring that can be changed without exceeding the given `maxCost`.

### **Key Points:**
- The problem involves calculating the difference in ASCII values of corresponding characters in two strings.
- We need to use a **sliding window** approach to efficiently find the longest substring whose total transformation cost does not exceed `maxCost`.
- The difference between characters can be computed using the absolute difference of their ASCII values: `|s[i] - t[i]|`.

### **Approach:**
1. **Calculate the Cost:**
  - For each index `i` in the string, compute the cost as `|s[i] - t[i]|` (the absolute difference between the characters).

2. **Sliding Window Technique:**
  - The sliding window technique will be used to maintain a valid substring where the total cost does not exceed `maxCost`. We will use two pointers (`i` and `j`) to represent the window.
  - Start with `i = 0` and `j = 0`. As we iterate through the string, we add the cost of each character change (`|s[i] - t[i]|`) to a running total.
  - If the running total exceeds `maxCost`, we increment `j` to shrink the window until the total cost is within the budget again.
  - Track the maximum length of valid substrings during this process.

3. **Result:**
  - The maximum length of a valid substring where the total cost is less than or equal to `maxCost` will be our result.

### **Plan:**
1. Create an array of costs based on the differences between characters in `s` and `t`.
2. Use two pointers to slide across the array and calculate the maximum length of substrings that meet the cost constraint.
3. Return the maximum length found.

Let's implement this solution in PHP: **[1208. Get Equal Substrings Within Budget](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001208-get-equal-substrings-within-budget/solution.php)**

```php
<?php
/**
 * @param String $s
 * @param String $t
 * @param Integer $maxCost
 * @return Integer
 */
function equalSubstring($s, $t, $maxCost) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
$s = "abcd";
$t = "bcdf";
$maxCost = 3;
echo equalSubstring($s, $t, $maxCost) . "\n"; // Output: 3

$s = "abcd";
$t = "cdef";
$maxCost = 3;
echo equalSubstring($s, $t, $maxCost) . "\n"; // Output: 1

$s = "abcd";
$t = "acde";
$maxCost = 0;
echo equalSubstring($s, $t, $maxCost) . "\n"; // Output: 1
?>
```

### Explanation:

1. **Calculate the Cost for Each Character Pair:**
  - The cost for each character pair in `s` and `t` is `abs(ord(s[i]) - ord(t[i]))`.

2. **Sliding Window:**
  - Initialize two pointers, `i` and `j`, representing the window's start and end positions.
  - Iterate through the string with `i`, and add the corresponding costs to a running total.
  - If the running total exceeds `maxCost`, increment `j` to reduce the window size and subtract the costs of characters that are no longer in the window.
  - Track the maximum window size during the iteration.

### **Example Walkthrough:**

**Example 1:**
```php
$s = "abcd";
$t = "bcdf";
$maxCost = 3;
```
- Cost Array: `[1, 1, 1, 3]`
- Start with `j = 0` and `i = 0`. The total cost starts at 0.
  - At `i = 0`: Add cost of 1 (`abs(ord('a') - ord('b'))`).
  - At `i = 1`: Add cost of 1 (`abs(ord('b') - ord('c'))`).
  - At `i = 2`: Add cost of 1 (`abs(ord('c') - ord('d'))`).
  - At `i = 3`: Add cost of 3 (`abs(ord('d') - ord('f'))`), total cost = 6, which exceeds `maxCost`.
  - Shrink window by incrementing `j`, subtract cost of 1 (`abs(ord('a') - ord('b'))`), total cost = 5.
  - Shrink window by incrementing `j` again, subtract cost of 1, total cost = 4.
  - Shrink window by incrementing `j` again, subtract cost of 1, total cost = 3.
- Maximum valid substring length is 3.

**Example 2:**
```php
$s = "abcd";
$t = "cdef";
$maxCost = 3;
```
- Cost Array: `[2, 2, 2, 2]`
- Start with `j = 0` and `i = 0`.
  - At `i = 0`: Add cost of 2.
  - At `i = 1`: Add cost of 2, total cost = 4, which exceeds `maxCost`.
  - Shrink window by incrementing `j`.
  - Maximum valid substring length is 1.

### **Time Complexity:**
- **O(n)**: We process each character once and use the sliding window technique to maintain a valid substring in linear time.

### **Output for Example:**

**Example 1:**
```php
$s = "abcd";
$t = "bcdf";
$maxCost = 3;
```
- Output: `3`

**Example 2:**
```php
$s = "abcd";
$t = "cdef";
$maxCost = 3;
```
- Output: `1`

The sliding window approach efficiently solves the problem by maintaining a valid substring whose transformation cost does not exceed `maxCost`. By leveraging two pointers (`i` and `j`), we can efficiently find the longest valid substring in linear time. This approach handles the problem's constraints effectively, ensuring optimal performance.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
