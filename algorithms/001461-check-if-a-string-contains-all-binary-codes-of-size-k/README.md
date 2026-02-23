1461\. Check If a String Contains All Binary Codes of Size K

**Difficulty:** Medium

**Topics:** `Senior`, `Hash Table`, `String`, `Bit Manipulation`, `Rolling Hash`, `Hash Function`, `Biweekly Contest 27`

Given a binary string `s` and an integer `k`, return `true` _if every binary code of length_ `k` _is a substring of_ `s`. Otherwise, return `false`.

**Example 1:**

- **Input:** s = "00110110", k = 2
- **Output:** true
- **Explanation:** The binary codes of length 2 are "00", "01", "10" and "11". They can be all found as substrings at indices 0, 1, 3 and 2 respectively.

**Example 2:**

- **Input:** s = "0110", k = 1
- **Output:** true
- **Explanation:** The binary codes of length 1 are "0" and "1", it is clear that both exist as a substring.

**Example 3:**

- **Input:** s = "0110", k = 2
- **Output:** false
- **Explanation:** The binary code "00" is of length 2 and does not exist in the array.

**Constraints:**

- `1 <= s.length <= 5 * 10⁵`
- `s[i]` is either `'0'` or `'1'`.
- `1 <= k <= 20`



**Hint:**
1. We need only to check all sub-strings of length `k`.
2. The number of distinct sub-strings should be exactly `2ᵏ`.






**Solution:**

We need to check whether **every** binary string of length `k` appears as a substring in `s`. Because `k` can be up to 20, the total number of distinct binary codes is `2ᵏ` (≤ 1,048,576). We can slide a window of size `k` over `s`, extract each substring, and store it in a set. If the set size equals `2ᵏ`, all codes exist.

### Approach:

- **Sliding Window with Bit Manipulation**  
  Process each contiguous substring of length `k` by maintaining an integer `val` that represents the current `k`-bit window.
- **Bitmask**  
  Use `mask = (1 << k) - 1` to keep only the lowest `k` bits when shifting the window.
- **Boolean Lookup Array**  
  Create an array `seen` of size `2ᵏ` to mark which codes have appeared.
- **Count Distinct Codes**  
  Maintain a counter `count` of distinct seen codes; if it reaches `2ᵏ`, return `true` immediately.
- **Edge Cases**  
  If the string length is less than `k`, it is impossible to contain all codes → return `false`.

Let's implement this solution in PHP: **[1461. Check If a String Contains All Binary Codes of Size K](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001461-check-if-a-string-contains-all-binary-codes-of-size-k/solution.php)**

```php
<?php
/**
 * @param String $s
 * @param Integer $k
 * @return Boolean
 */
function hasAllCodes(string $s, int $k): bool
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo hasAllCodes("00110110", 2) . "\n";        // Output: true
echo hasAllCodes("0110", 1) . "\n";            // Output: true
echo hasAllCodes("0110", 2) . "\n";            // Output: false
?>
```

### Explanation:

1. **Initialization**
   - Compute `total = 1 << k` (i.e., `2ᵏ`), the number of distinct binary codes of length `k`.
   - Create a boolean array `seen` of size `total`, initialized to `false`.
   - Define `mask = total - 1`, which is a binary number with `k` ones (e.g., for `k=3`, mask = `111` = 7).
   - Initialize an integer `val = 0` to hold the current window’s numeric value.

2. **Process the first window**
   - Iterate over the first `k` characters of `s`. For each character, shift `val` left by 1 and OR with the current bit (converted to 0/1).
   - After building the first value, mark `seen[val] = true` and increment `count` to 1.

3. **Slide the window**
   - For each new character from index `k` to `n-1`:
      - Update the value: `val = ((val << 1) & mask) | (int)($s[$i] == '1')`.  
        This left‑shifts the current value (dropping the highest bit), masks with `mask` to keep only `k` bits, then adds the new bit.
      - If `seen[val]` is not yet set, set it and increment `count`.
      - If `count` becomes equal to `total`, return `true` immediately (all codes found).

4. **Final check**
   - After processing all windows, return `count == total` to confirm whether all codes were seen.

### Complexity
- **Time Complexity**: _**O(n)**_, The algorithm processes each character of `s` exactly once. Each operation (bit shifts, mask, OR, array access) is _**O(1)**_
- **Space Complexity**: _**O(2ᵏ)**_, The boolean array `seen` requires `2ᵏ` entries. Since `k ≤ 20`, `2ᵏ ≤ 1,048,576`, which is acceptable. No other significant auxiliary space is used.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**