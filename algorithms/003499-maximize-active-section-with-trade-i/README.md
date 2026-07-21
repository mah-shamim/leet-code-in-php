3499\. Maximize Active Section with Trade I

**Difficulty:** Medium

**Topics:** `Senior`, `String`, `Enumeration`, `Biweekly Contest 153`

You are given a binary string `s` of length `n`, where:

- `'1'` represents an **active** section.
- `'0'` represents an **inactive** section.

You can perform **at most one trade** to maximize the number of active sections in `s`. In a trade, you:

- Convert a contiguous block of `'1'`s that is surrounded by `'0'`s to all `'0'`s.
- Afterward, convert a contiguous block of `'0'`s that is surrounded by `'1'`s to all `'1'`s.

Return the **maximum** number of active sections in `s` after making the optimal trade.

**Note:** Treat `s` as if it is **augmented** with a `'1'` at both ends, forming `t = '1' + s + '1'`. The augmented `'1'`s **do not** contribute to the final count.

**Example 1:**

- **Input:** s = "01"
- **Output:** 1
- **Explanation:** Because there is no block of `'1'`s surrounded by `'0'`s, no valid trade is possible. The maximum number of active sections is 1.

**Example 2:**

- **Input:** s = "0100"
- **Output:** 4
- **Explanation:**
  - String `"0100"` → Augmented to `"101001"`.
  - Choose `"0100"`, convert <code>"10<ins>**1**</ins>001"</code> → <code>"1<ins>**0000**</ins>1"</code> → <code>"1<ins>**1111**</ins>1"</code>.
  - The final string without augmentation is `"1111"`. The maximum number of active sections is 4.


**Example 3:**

- **Input:** s = "1000100"
- **Output:** 7
- **Explanation:**
  - String `"1000100"` → Augmented to `"110001001"`.
  - Choose `"000100"`, convert <code>"11000<ins>**1**</ins>001"</code> → <code>"11<ins>**000000**</ins>1"</code> → <code>"11<ins>**111111**</ins>1"</code>.
  - The final string without augmentation is `"1111111"`. The maximum number of active sections is 7.



**Example 4:**

- **Input:** s = "01010"
- **Output:** 4
- **Explanation:**
  - String `"01010"` → Augmented to `"1010101"`.
  - Choose `"010"`, convert <code>"10<ins>**1**</ins>0101"</code> → <code>"1<ins>**000**</ins>101"</code> → <code>"1<ins>**111**</ins>101"</code>.
  - The final string without augmentation is `"11110"`. The maximum number of active sections is 4.



**Example 5:**

- **Input:** s = "1"
- **Output:** 1



**Example 6:**

- **Input:** s = "0"
- **Output:** 0



**Example 7:**

- **Input:** s = "101"
- **Output:** 2



**Example 8:**

- **Input:** s = "1001"
- **Output:** 4



**Example 9:**

- **Input:** s = "10001"
- **Output:** 5



**Example 10:**

- **Input:** s = "010010"
- **Output:** 6


**Constraints:**

- `1 <= n == s.length <= 10⁵`
- `s[i]` is either `'0'` or `'1'`


**Hint:**
1. Split the string into several zero-one segments.
2. For each one-segment, if it has two neighbors (i.e., it is surrounded by two zero-segments), the total sum of their lengths is one of the candidates for `delta`.
3. Find the maximum `delta` and add it to the total number of ones in the string.


**Solution:**

We approached this problem by recognizing that the optimal trade effectively allows us to merge two zero groups that are separated by exactly one group of ones. Since a trade removes a block of ones (surrounded by zeros) and then turns a surrounding block of zeros (surrounded by ones) into ones, the net gain is the sum of the lengths of the two zero groups on either side of a one‑group. Therefore, the maximum possible increase in active sections equals the maximum sum of two adjacent zero‑groups. Adding this gain to the original count of ones gives the answer.

## Approach

- **Identify zero groups:** Traverse the string and record the lengths of consecutive `'0'` groups.
- **Compute maximum possible gain:** For every pair of adjacent zero groups (meaning they are separated by at least one `'1'`), compute their sum. The trade can merge these two zero groups into ones, so the gain is that sum.
- **Count original ones:** Count the total number of `'1'` characters in the original string.
- **Return result:** The maximum active sections = original ones + maximum zero‑group sum.
- **Edge cases:** If there is only one zero group, or no zero group at all, the maximum gain remains `0`, meaning no valid trade is possible.

Let's implement this solution in PHP: **[3499. Maximize Active Section with Trade I](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003499-maximize-active-section-with-trade-i/solution.php)**

```php
<?php
/**
 * @param String $s
 * @return Integer
 */
function maxActiveSectionsAfterTrade(string $s): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo maxActiveSectionsAfterTrade("01") .  "\n";             // Output: 1
echo maxActiveSectionsAfterTrade("0100") .  "\n";           // Output: 4
echo maxActiveSectionsAfterTrade("1000100") .  "\n";        // Output: 7
echo maxActiveSectionsAfterTrade("01010") .  "\n";          // Output: 4
echo maxActiveSectionsAfterTrade("1") .  "\n";              // Output: 1
echo maxActiveSectionsAfterTrade("0") .  "\n";              // Output: 0
echo maxActiveSectionsAfterTrade("101") .  "\n";            // Output: 2
echo maxActiveSectionsAfterTrade("1001") .  "\n";           // Output: 4
echo maxActiveSectionsAfterTrade("10001") .  "\n";          // Output: 5
echo maxActiveSectionsAfterTrade("010010") .  "\n";         // Output: 6
?>
```

### Explanation:

- **Trade mechanics simplified:** A trade removes a block of ones (surrounded by zeros) and then turns a block of zeros (surrounded by ones) into ones. The net gain is exactly the size of the zero block that gets converted.
- **Choosing the best zero block:** The only zero blocks that can be turned into ones are those that have ones on both sides. In terms of groups, this corresponds to a zero group that lies between two one‑groups. However, because converting one zero group also requires removing a one‑group, the trade effectively merges two zero groups (the one before and the one after the removed one‑group) into ones. Thus, the best gain is the sum of two adjacent zero groups.
- **Why adjacent zero groups:** Two zero groups are considered "adjacent" if there is exactly one group of ones between them. Removing that one‑group allows both zero groups to become ones.
- **No trade possible:** If the string has fewer than two zero groups, no zero group is surrounded by ones, so the trade cannot be performed, and the gain is `0`.

## Complexity Analysis

- **Time Complexity:** _**O(n)**_ – We traverse the string once to collect zero‑group lengths, and then iterate over the zero groups to find the maximum sum of adjacent pairs. Counting ones also takes _**O(n)**_.
- **Space Complexity:** _**O(n)**_ in the worst case (e.g., alternating `0` and `1`), as we store the lengths of all zero groups. This can be optimized to _**O(1)**_ by tracking only the previous group length, but the current implementation uses _**O(n)**_.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**