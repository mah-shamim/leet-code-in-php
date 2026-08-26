2904\. Shortest and Lexicographically Smallest Beautiful String

**Difficulty:** Medium

**Topics:** `Senior`, `String`, `Sliding Window`, `Weekly Contest 367`

You are given a binary string `s` and a positive integer `k`.

A substring of `s` is **beautiful** if the number of `1`'s in it is exactly `k`.

Let `len` be the length of the **shortest** beautiful substring.

Return _the lexicographically **smallest** beautiful substring of string `s` with length equal to `len`_. If `s` doesn't contain a beautiful substring, return _an **empty** string_.

A string `a` is lexicographically **larger** than a string `b` (of the same length) if in the first position where `a` and `b` differ, `a` has a character strictly larger than the corresponding character in `b`.

- For example, `"abcd"` is lexicographically larger than `"abcc"` because the first position they differ is at the fourth character, and `d` is greater than `c`.


**Example 1:**

- **Input:** s = "100011001", k = 3
- **Output:** "11001"
- **Explanation:** 
  - There are 7 beautiful substrings in this example:
    1. The substring "<ins>100011</ins>001".
    2. The substring "<ins>1000110</ins>01".
    3. The substring "<ins>10001100</ins>1".
    4. The substring "1<ins>00011001</ins>".
    5. The substring "10<ins>0011001</ins>".
    6. The substring "100<ins>011001</ins>".
    7. The substring "1000<ins>11001</ins>".
  - The length of the shortest beautiful substring is 5.
  - The lexicographically smallest beautiful substring with length 5 is the substring "11001".

**Example 2:**

- **Input:** s = "1011", k = 2
- **Output:** "11"
- **Explanation:** 
  - There are 3 beautiful substrings in this example:
    1. The substring "<ins>101</ins>1".
    2. The substring "1<ins>011</ins>".
    3. The substring "10<ins>11</ins>".
  - The length of the shortest beautiful substring is 2.
  - The lexicographically smallest beautiful substring with length 2 is the substring "11".

**Example 3:**

- **Input:** s = "000", k = 1
- **Output:** ""
- **Explanation:** There are no beautiful substrings in this example.

**Example 4:**

- **Input:** s = "111", k = 3
- **Output:** "111"

**Example 5:**

- **Input:** s = "01010", k = 1
- **Output:** "1"

**Example 6:**

- **Input:** s = "10101", k = 2
- **Output:** "101"

**Example 7:**

- **Input:** s = "1111", k = 2
- **Output:** "11"

**Example 8:**

- **Input:** s = "1001", k = 4
- **Output:** ""

**Constraints:**

- `1 <= s.length <= 100`
- `1 <= k <= s.length`


**Hint:**
1. Notice that if we consider that index `i` is the leftmost index of a beautiful substring, it has only one candidate `j`, such that `s[i:j]` is beautiful and shortest too.
2. We can iterate over all possibilities of leftmost index `i` take `s[i:j]` and compare with the shortest and the lexicographically smallest beautiful string we could get before index `i`.


**Solution:**

We solve the problem by iterating through all possible starting positions in the string, extending each substring until we find exactly `k` ones, which gives us the shortest beautiful substring starting at that position. We then track the global minimum length and lexicographically smallest among substrings of that minimum length, ensuring an efficient and correct solution.

## Approach

- **Brute force with early termination:** For each starting index `i`, we extend the substring to the right, counting ones until we either exceed `k` (break) or reach exactly `k` ones.
- **Candidate selection:** When we reach exactly `k` ones, the current substring is the shortest beautiful substring starting at `i` (since extending further would only increase length unnecessarily).
- **Global comparison:** We compare this candidate with our best result so far—preferring shorter length first, and for equal lengths, the lexicographically smaller string.
- **Edge case handling:** If no beautiful substring is found (less than `k` ones total), return an empty string.

Let's implement this solution in PHP: **[2904. Shortest and Lexicographically Smallest Beautiful String](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002904-shortest-and-lexicographically-smallest-beautiful-string/solution.php)**

```php
<?php
/**
 * @param String $s
 * @param Integer $k
 * @return String
 */
function shortestBeautifulSubstring(string $s, int $k): string
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo shortestBeautifulSubstring("100011001", 3) . "\n";     // Output: "11001"
echo shortestBeautifulSubstring("10110", 3) . "\n";         // Output: "110"
echo shortestBeautifulSubstring("000", 1) . "\n";           // Output: ""
echo shortestBeautifulSubstring("111", 3) . "\n";           // Output: "111"
echo shortestBeautifulSubstring("01010", 1) . "\n";         // Output: "1"
echo shortestBeautifulSubstring("10101", 2) . "\n";         // Output: "101"
echo shortestBeautifulSubstring("1111", 2) . "\n";          // Output: "11"
echo shortestBeautifulSubstring("1001", 4) . "\n";          // Output: ""
?>
```

### Explanation:

- **Sliding window concept:** We don't use a traditional sliding window, but rather a nested loop where the inner loop stops as soon as the condition is met, making it efficient for each start position.
- **Why `break` after finding `k` ones:** For a fixed start `i`, the first time we reach `k` ones gives the shortest length possible. Any longer substring starting at `i` would be longer and thus not needed for shortest-length consideration.
- **Lexicographical comparison:** PHP's string comparison (`<`) works lexicographically, so we can directly compare substrings of the same length.
- **Time complexity optimization:** The inner loop breaks early, and the total operations are bounded by the number of substrings considered (at most `n²` in worst case, but with pruning).

## Complexity Analysis

- **Time Complexity:** _**O(n²)**_ in the worst case, where `n` is the length of `s`. Although we have nested loops, the inner loop terminates early when `k` ones are found or exceeded. In a string with sparse ones, it may scan more, but with `n ≤ 100`, this is acceptable.
- **Space Complexity:** _**O(n)**_ for storing the substring and the result, or _**O(1)**_ if we consider only the output string length.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**