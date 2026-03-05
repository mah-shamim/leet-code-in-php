1758\. Minimum Changes To Make Alternating Binary String

**Difficulty:** Easy

**Topics:** `Mid Level`, `String`, `Weekly Contest 228`

You are given a string `s` consisting only of the characters `'0'` and `'1'`. In one operation, you can change any `'0'` to `'1'` or vice versa.

The string is called alternating if no two adjacent characters are equal. For example, the string `"010"` is alternating, while the string `"0100"` is not.

Return _the **minimum** number of operations needed to make `s` alternating_.

**Example 1:**

- **Input:** s = "0100"
- **Output:** 1
- **Explanation:** If you change the last character to `'1'`, `s` will be `"0101"`, which is alternating.

**Example 2:**

- **Input:** s = "10"
- **Output:** 0
- **Explanation:** `s` is already alternating.

**Example 3:**

- **Input:** s = "1111"
- **Output:** 2
- **Explanation:** You need two operations to reach `"0101"` or `"1010"`.

**Constraints:**

- `1 <= s.length <= 10⁴`
- `s[i]` is either `'0'` or `'1'`.


**Hint:**
1. Think about how the final string will look like.
2. It will either start with a `'0'` and be like `'010101010..'` or with a `'1'` and be like `'10101010..'`
3. Try both ways, and check for each way, the number of changes needed to reach it from the given string. The answer is the minimum of both ways.


**Similar Questions:**
1. [2957. Remove Adjacent Almost-Equal Characters](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002957-remove-adjacent-almost-equal-characters)






**Solution:**

The problem asks for the minimum number of character flips (changing `0` to `1` or vice versa) required to make a binary string `s` alternating (no two adjacent characters equal). The solution considers the two possible alternating patterns for a string of length `n`: starting with `'0'` (`"0101..."`) and starting with `'1'` (`"1010..."`). It counts the mismatches between the original string and each pattern, then returns the smaller count as the answer.

### Approach:

- Recognize that an alternating binary string of a given length has exactly two possible forms: one beginning with `'0'` and one beginning with `'1'`.
- For each position `i` in the string, determine the expected character for both patterns:
   - Pattern starting with `'0'`: even indices → `'0'`, odd indices → `'1'`.
   - Pattern starting with `'1'`: even indices → `'1'`, odd indices → `'0'`.
- Compare the actual character at position `i` with each expected character and increment the respective mismatch counters.
- After iterating through all positions, the minimum of the two mismatch counts is the minimum number of operations needed.

Let's implement this solution in PHP: **[1758. Minimum Changes To Make Alternating Binary String](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001758-minimum-changes-to-make-alternating-binary-string/solution.php)**

```php
<?php
/**
 * @param String $s
 * @return Integer
 */
function minOperations(string $s): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo minOperations("0100") . "\n";          // Output: 1
echo minOperations("10") . "\n";            // Output: 0
echo minOperations("1111") . "\n";          // Output: 2
?>
```

### Explanation:

- **Two candidate patterns** – For any length `n`, the only alternating strings are `"0101..."` (even indices `'0'`) and `"1010..."` (even indices `'1'`). Any other alternating string would be identical to one of these after accounting for the starting character.
- **Counting mismatches** – By scanning the string once, we can simultaneously compute how many changes are needed to transform `s` into the first pattern (`start0`) and into the second pattern (`start1`). At index `i`, if `s[i]` does not match the expected character for pattern 0, we increment `start0`; similarly for pattern 1.
- **Optimal choice** – Because the two patterns are the only possibilities, the minimal number of operations is simply the smaller of the two mismatch counts. This works because flipping a character to match one pattern automatically makes it differ from the other pattern (they are complementary).
- **Direct implementation** – The provided PHP code loops once, computes both counters, and returns `min($start0, $start1)`, which is both efficient and straightforward.

### Complexity
- **Time Complexity**: _**O(n)**_ – a single pass through the string of length `n`.
- **Space Complexity**: _**O(1)**_ – only two integer counters and a loop variable are used, no extra space dependent on input size.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**