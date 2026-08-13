3090\. Maximum Length Substring With Two Occurrences

**Difficulty:** Easy

**Topics:** `Mid Level`, `Hash Table`, `String`, `Sliding Window`, `Weekly Contest 390`

Given a string `s`, return the **maximum** length of a substring[^1] such that it contains _at most two occurrences_ of each character.

[^1]: **Substring:** A **substring** is a contiguous sequence of characters within a string.

**Example 1:**

- **Input:** s = "bcbbbcba"
- **Output:** 4
- **Explanation:** The following substring has a length of 4 and contains at most two occurrences of each character: <code>"bcbb<ins>bcba</ins>"</code>.

**Example 2:**

- **Input:** s = "aaaa"
- **Output:** 2
- **Explanation:** The following substring has a length of 2 and contains at most two occurrences of each character: <code>"<ins>aa</ins>aa"</code>.

**Example 3:**

- **Input:** s = "abc"
- **Output:** 3

**Example 4:**

- **Input:** s = "aabbcc"
- **Output:** 6

**Example 5:**

- **Input:** s = "ababab"
- **Output:** 4

**Example 6:**

- **Input:** s = "a"
- **Output:** 1

**Example 7:**

- **Input:** s = "zzzzz"
- **Output:** 2

**Example 8:**

- **Input:** s = "abcabc"
- **Output:** 6

**Example 9:**

- **Input:** s = "abcaabc"
- **Output:** 5

**Constraints:**

- `2 <= s.length <= 100`
- `s` consists only of lowercase English letters.


**Hint:**
1. We can try all substrings by brute-force since the constraints are very small.


**Solution:**

We determined the optimal solution by leveraging the small input constraint (`n ≤ 100`) to evaluate every possible substring, tracking character frequencies, and stopping extension as soon as any character exceeds the allowed two occurrences.

## Approach

- **Brute‑force over all substrings** – Since the string length is at most 100, we can safely check every start and end index.
- **Frequency array** – Maintain a count of each character (26 lowercase letters) for the current substring.
- **Early termination** – As we extend the substring by one character, if that character’s count becomes 3, we break because adding more characters cannot fix the violation.
- **Update maximum** – Before breaking or after each valid extension, update the answer with the current substring length.

Let's implement this solution in PHP: **[3090. Maximum Length Substring With Two Occurrences](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003090-maximum-length-substring-with-two-occurrences/solution.php)**

```php
<?php
/**
 * @param String $s
 * @return Integer
 */
function maximumLengthSubstring(string $s): int
{
    $maxLen = 0;
    $n = strlen($s);

    for ($i = 0; $i < $n; $i++) {
        $freq = array_fill(0, 26, 0);
        for ($j = $i; $j < $n; $j++) {
            $index = ord($s[$j]) - ord('a');
            $freq[$index]++;
            if ($freq[$index] > 2) {
                break;
            }
            $maxLen = max($maxLen, $j - $i + 1);
        }
    }

    return $maxLen;
}

// Test cases
echo maximumLengthSubstring("bcbbbcba") .  "\n";            // Output: 4
echo maximumLengthSubstring("aaaa") .  "\n";                // Output: 2
echo maximumLengthSubstring("abc") .  "\n";                 // Output: 3
echo maximumLengthSubstring("aabbcc") .  "\n";              // Output: 6
echo maximumLengthSubstring("ababab") .  "\n";              // Output: 4
echo maximumLengthSubstring("a") .  "\n";                   // Output: 1
echo maximumLengthSubstring("zzzzz") .  "\n";               // Output: 2
echo maximumLengthSubstring("abcabc") .  "\n";              // Output: 6
echo maximumLengthSubstring("abcaabc") .  "\n";             // Output: 5
?>
```

### Explanation:

- **Outer loop** (`$i`) defines the starting index of the substring.
- **Inner loop** (`$j`) defines the ending index, expanding one character at a time.
- For each new character, increment its frequency.
- If the frequency of any character exceeds 2, the inner loop stops (no longer valid substring starting from `$i` with this `$j`).
- Otherwise, the current substring is valid, so we update `$maxLen` with `$j - $i + 1`.
- After the loops finish, `$maxLen` holds the length of the longest valid substring.

## Complexity Analysis

- **Time Complexity:** _**O(n²)**_ – For each start (`n`), we may iterate up to the end (`n`), so worst-case `~10,000` operations for `n=100`, which is trivial.
- **Space Complexity:** _**O(1)**_ – We only use a fixed-size array of 26 integers regardless of input size.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**


#3235, #3236 leetcode problems 003090-maximum-length-substring-with-two-occurrences submissions 2107035869


Thanks for solving the problem of "Maximum Length Substring With Two Occurrences"