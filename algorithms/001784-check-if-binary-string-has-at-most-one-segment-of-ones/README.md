1784\. Check if Binary String Has at Most One Segment of Ones

**Difficulty:** Easy

**Topics:** `Mid Level`, `String`, `Weekly Contest 231`

Given a binary string `s` **without leading zeros**, return _`true` if `s` contains **at most one contiguous segment of ones**_. Otherwise, return `false`.

**Example 1:**

- **Input:** s = "1001"
- **Output:** false
- **Explanation:** The ones do not form a contiguous segment.

**Example 2:**

- **Input:** s = "110"
- **Output:** true

**Example 3:**

- **Input:** s = "1"
- **Output:** true

**Example 4:**

- **Input:** s = "111"
- **Output:** true

**Example 5:**

- **Input:** s = "101"
- **Output:** false

**Example 6:**

- **Input:** s = "10"
- **Output:** true

**Constraints:**

- `1 <= s.length <= 100`
- `s[i]` is either `'0'` or `'1'`.
- `s[0]` is `'1'`.


**Hint:**
1. It's guaranteed to have at least one segment
2. The string size is small so you can count all segments of ones with no that have no adjacent ones.


**Similar Questions:**
1. [1869. Longer Contiguous Segments of Ones than Zeros](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001869-longer-contiguous-segments-of-ones-than-zeros)






**Solution:**

We need to determine if a binary string `s` (which starts with `'1'`) contains **at most one contiguous segment of ones**.  
A contiguous segment of ones is a maximal group of consecutive `'1'` characters.  
Since the string has no leading zeros, the first character is always `'1'`, so there is at least one segment.  
The task reduces to checking whether after the first zero appears, any `'1'` occurs again. If yes, there are at least two segments; otherwise, only one.

### Approach:

- Use `strpos` to locate the first occurrence of the character `'0'` in the string.
- If no `'0'` exists (`strpos` returns `false`), the whole string is one contiguous segment of ones → return `true`.
- If a zero is found, record its position.
- Search for any `'1'` that appears after that zero using `strpos` with the offset set to `firstZero + 1`.
- If such a `'1'` is found, it means there is another segment of ones after a zero segment → return `false`.
- Otherwise, no `'1'` exists after the first zero, so there is only one segment of ones at the beginning → return `true`.

Let's implement this solution in PHP: **[1784. Check if Binary String Has at Most One Segment of Ones](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001784-check-if-binary-string-has-at-most-one-segment-of-ones/solution.php)**

```php
<?php
/**
 * @param String $s
 * @return Boolean
 */
function checkOnesSegment(string $s): bool
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo checkOnesSegment("1001") . "\n";           // Output: false
echo checkOnesSegment("110") . "\n";            // Output: true
echo checkOnesSegment("1") . "\n";              // Output: true
echo checkOnesSegment("111") . "\n";            // Output: true
echo checkOnesSegment("101") . "\n";            // Output: false
echo checkOnesSegment("10") . "\n";             // Output: true
?>
```

### Explanation:

- The string is guaranteed to start with `'1'`, so the first segment of ones always exists.
- By identifying the first zero, we mark the boundary between the initial ones and the following zeros.
- If a zero is present, any `'1'` after that zero would form a separate segment of ones, violating the “at most one segment” rule.
- The algorithm avoids a full scan by using built-in string search functions, but conceptually it still examines the string until the second segment is found (or not).

### Complexity
- **Time Complexity**: _**O(n)**_ in the worst case, where n is the length of the string. Both `strpos` calls may traverse the string, but the second search starts after the first zero, so total scans are linear.
- **Space Complexity**: _**O(1)**_ – only a few integer variables are used.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**