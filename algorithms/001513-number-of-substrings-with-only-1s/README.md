1513\. Number of Substrings With Only 1s

**Difficulty:** Medium

**Topics:** `Math`, `String`, `Weekly Contest 197`

Given a binary string `s`, return _the number of substrings with all characters `1`'s_. Since the answer may be too large, return it modulo `10⁹ + 7`.

**Example 1:**

- **Input:** s = "0110111"
- **Output:** 9
- **Explanation:** There are 9 substring in total with only 1's characters.
  "1" -> 5 times.
  "11" -> 3 times.
  "111" -> 1 time.

**Example 2:**

- **Input:** s = "101"
- **Output:** 2
- **Explanation:** Substring "1" is shown 2 times in s.

**Example 3:**

- **Input:** s = "111111"
- **Output:** 21
- **Explanation:** Each substring contains only 1's characters.

**Constraints:**

- `1 <= s.length <= 10⁵`
- `s[i]` is either `'0'` or `'1'`.



**Hint:**
1. Count number of 1s in each consecutive-1 group. For a group with n consecutive 1s, the total contribution of it to the final answer is` (n + 1) * n // 2`.



**Similar Questions:**
1. [1759. Count Number of Homogenous Substrings](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001759-count-number-of-homogenous-substrings)
2. [2062. Count Vowel Substrings of a String](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002062-count-vowel-substrings-of-a-string)






**Solution:**

We need to count all substrings that contain only '1's in a binary string.

### Approach:

The key insight is that for a contiguous group of n '1's:
- The number of substrings within that group is n*(n+1)/2
- For example, "111" has 6 substrings: "1", "1", "1", "11", "11", "111"

So we can:
1. Find all contiguous groups of '1's
2. For each group of length n, calculate n*(n+1)/2
3. Sum all these values

Let's implement this solution in PHP: **[1513. Number of Substrings With Only 1s](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001513-number-of-substrings-with-only-1s/solution.php)**

```php
<?php
/**
 * @param String $s
 * @return Integer
 */
function numSub($s) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo numSub("0110111") . "\n";  // Output: 9
echo numSub("101") . "\n";      // Output: 2
echo numSub("111111") . "\n";   // Output: 21
?>
```

### Explanation:

1. **Initialization:** I set up variables to track the total count and the current streak of '1's.

2. **Iterate through the string:** For each character:
   - If it's '1', I increment the current streak counter
   - If it's '0', I calculate the number of substrings for the current streak using the formula n*(n+1)/2, add it to the total, and reset the streak counter

3. **Handle the final group:** After the loop, I check if there's a remaining streak of '1's and include it in the total.

4. **Modulo operation:** Since the result can be very large, I use modulo 10^9+7 at each addition step.

**Time Complexity:** O(n) where n is the length of the string  
**Space Complexity:** O(1)

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**