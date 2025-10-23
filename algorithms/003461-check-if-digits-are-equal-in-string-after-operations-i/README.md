3461\. Check If Digits Are Equal in String After Operations I

**Difficulty:** Easy

**Topics:** `Math`, `String`, `Simulation`, `Combinatorics`, `Number Theory`, `Weekly Contest 438`

You are given a string `s` consisting of digits. Perform the following operation repeatedly until the string has **exactly** two digits:

- For each pair of consecutive digits in `s`, starting from the first digit, calculate a new digit as the sum of the two digits **modulo** 10.
- Replace `s` with the sequence of newly calculated digits, _maintaining_ the order in which they are computed.

Return `true` if the final two digits in `s` are the **same**; otherwise, return `false`.

**Example 1:**

- **Input:** s = "3902"
- **Output:** true
- **Explanation:**
  - Initially, `s = "3902"`
  - First operation:
    - `(s[0] + s[1]) % 10 = (3 + 9) % 10 = 2`
    - `(s[1] + s[2]) % 10 = (9 + 0) % 10 = 9`
    - `(s[2] + s[3]) % 10 = (0 + 2) % 10 = 2`
    - `s` becomes `"292"`
  - Second operation:
    - `(s[0] + s[1]) % 10 = (2 + 9) % 10 = 1`
    - `(s[1] + s[2]) % 10 = (9 + 2) % 10 = 1`
    - `s` becomes `"11"`
  - Since the digits in `"11"` are the same, the output is `true`.


**Example 2:**

- **Input:** s = "34789"
- **Output:** false
- **Explanation:**
  - Initially, `s = "34789"`.
  - After the first operation, `s = "7157"`.
  - After the second operation, `s = "862"`.
  - After the third operation, `s = "48"`.
  - Since `'4' != '8'`, the output is `false`.


**Constraints:**

- `3 <= s.length <= 100`
- `s` consists of only digits.



**Hint:**
1. Simulate the operations as described.






**Solution:**

We need to repeatedly perform operations on a string of digits until only two digits remain. Each operation involves calculating a new digit from each pair of consecutive digits by taking their sum modulo 10, and then replacing the string with these new digits in order. The goal is to determine if the final two digits are the same.

### Approach
1. **Simulation**: The problem can be solved by simulating the operations as described. We repeatedly process the string until its length is reduced to exactly two digits.
2. **Operation Details**: For each operation, we iterate through the current string, compute the new digits for each consecutive pair, and form a new string from these computed digits.
3. **Termination Check**: Once the string length becomes two, we check if both digits are identical. If they are, return `true`; otherwise, return `false`.

Let's implement this solution in PHP: **[3461. Check If Digits Are Equal in String After Operations I](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003461-check-if-digits-are-equal-in-string-after-operations-i/solution.php)**

```php
<?php
/**
 * @param String $s
 * @return Boolean
 */
function hasSameDigits($s) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
// Example 1
$s1 = "3902";
echo hasSameDigits($s1) ? "true\n" : "false\n";  // Output: true

// Example 2
$s2 = "34789";
echo hasSameDigits($s2) ? "true\n" : "false\n";  // Output: false
?>
```

### Explanation:

1. **Initialization**: Start with the given string `s`.
2. **Loop Until Two Digits**: Continue processing the string until its length is reduced to two.
3. **Compute New Digits**: For each pair of consecutive digits in the current string, compute their sum modulo 10 and append the result to a new string.
4. **Update String**: Replace the current string with the newly formed string after processing all consecutive pairs.
5. **Check Final Digits**: Once the loop exits, check if the two remaining digits are the same and return the result.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://www.buymeacoffee.com/assets/img/custom_images/orange_img.png" alt="Buy Me A Coffee" style="height: 41px !important;width: 174px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**