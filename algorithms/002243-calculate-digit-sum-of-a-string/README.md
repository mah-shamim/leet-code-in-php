2243\. Calculate Digit Sum of a String

**Difficulty:** Easy

**Topics:** `Mid Level`, `String`, `Simulation`, `Weekly Contest 289`

You are given a string `s` consisting of digits and an integer `k`.

A **round** can be completed if the length of `s` is greater than `k`. In one round, do the following:

1. **Divide** `s` into **consecutive groups** of size `k` such that the first `k` characters are in the first group, the next `k` characters are in the second group, and so on. **Note** that the size of the last group can be smaller than `k`.
2. **Replace** each group of `s` with a string representing the sum of all its digits. For example, `"346"` is replaced with `"13"` because `3 + 4 + 6 = 13`.
3. **Merge** consecutive groups together to form a new string. If the length of the string is greater than `k`, repeat from step `1`.

Return _`s` after all rounds have been completed_.

**Example 1:**

- **Input:** s = "11111222223", k = 3
- **Output:** "135"
- **Explanation:**
  - For the first round, we divide s into groups of size 3: "111", "112", "222", and "23".
     - Then we calculate the digit sum of each group: 1 + 1 + 1 = 3, 1 + 1 + 2 = 4, 2 + 2 + 2 = 6, and 2 + 3 = 5.
     - So, s becomes "3" + "4" + "6" + "5" = "3465" after the first round.
  - For the second round, we divide s into "346" and "5".
     - Then we calculate the digit sum of each group: 3 + 4 + 6 = 13, 5 = 5.
     - So, s becomes "13" + "5" = "135" after second round.
     - Now, s.length <= k, so we return "135" as the answer.

**Example 2:**

- **Input:** s = "00000000", k = 3
- **Output:** "000"
- **Explanation:** 
  - We divide s into "000", "000", and "00".
  - Then we calculate the digit sum of each group: 0 + 0 + 0 = 0, 0 + 0 + 0 = 0, and 0 + 0 = 0.
  - s becomes "0" + "0" + "0" = "000", whose length is equal to k, so we return "000".

**Example 3:**

- **Input:** s = "1234", k = 5
- **Output:** "1234"

**Example 4:**

- **Input:** s = "1234", k = 2
- **Output:** "37"

**Example 5:**

- **Input:** s = "999", k = 2
- **Output:** "99"

**Example 6:**

- **Input:** s = "1", k = 2
- **Output:** "1"

**Example 7:**

- **Input:** s = "1111", k = 3
- **Output:** "31"

**Example 8:**

- **Input:** s = "000", k = 2
- **Output:** "00"

**Constraints:**

- `1 <= s.length <= 100`
- `2 <= k <= 100`
- `s` consists of digits only.


**Hint:**

1. Try simulating the entire process to find the final answer.


**Similar Questions:**

1. [258. Add Digits](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000258-add-digits)
2. [2221. Find Triangular Sum of an Array](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002221-find-triangular-sum-of-an-array)


**Solution:**

We simulate the required grouping and digit-sum process until the string length becomes less than or equal to `k`. In each round, we split the current string into consecutive groups of size `k`, sum the digits in each group, convert each sum back to a string, concatenate the results, and repeat if necessary.

## Approach

- While the length of `s` is greater than `k`, perform one round.
- Traverse `s` in chunks of size `k`.
- For each chunk, calculate the sum of its digit characters.
- Convert each group sum to a string and append it to a new string.
- Replace `s` with the newly formed string.
- Return `s` once its length is less than or equal to `k`.

Let's implement this solution in PHP: **[2243. Calculate Digit Sum of a String](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002243-calculate-digit-sum-of-a-string/solution.php)**

```php
<?php
/**
 * @param String $s
 * @param Integer $k
 * @return String
 */
function digitSum(string $s, int $k): string
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo digitSum("11111222223", 3) . "\n";  // Output: "135"
echo digitSum("00000000", 3)    . "\n";  // Output: "000"
echo digitSum("1234", 5)        . "\n";  // Output: "1234"
echo digitSum("1234", 2)        . "\n";  // Output: "37"
echo digitSum("999", 2)         . "\n";  // Output: "99"
echo digitSum("1", 2)           . "\n";  // Output: "1"
echo digitSum("1111", 3)        . "\n";  // Output: "31"
echo digitSum("000", 2)         . "\n";  // Output: "00"
?>
```

## Explanation

- The outer `while` loop continues until no more rounds are needed.
- The variable `$i += $k` moves through the string group by group.
- `$end = min($i + $k, $n)` handles the final group, which may be shorter than `k`.
- The inner loop adds each digit by converting it using `ord($s[$j]) - ord('0')`.
- `$newS .= (string) $sum` concatenates the digit sum of each group.
- After processing all groups, `$s = $newS` prepares the string for the next round.

## Complexity Analysis

- **Time Complexity:** `O(R * L)`, where `L` is the current string length and `R` is the number of rounds. Each round scans every character of the current string once. With the given constraints, `R` is small.
- **Space Complexity:** `O(L)` for building the new string during each round.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**