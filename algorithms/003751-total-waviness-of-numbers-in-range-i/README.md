3751\. Total Waviness of Numbers in Range I

**Difficulty:** Medium

**Topics:** `Senior`, `Math`, `Dynamic Programming`, `Enumeration`, `Biweekly Contest 170`

You are given two integers `num1` and `num2` representing an **inclusive** range `[num1, num2]`.

The **waviness** of a number is defined as the total count of its **peaks** and **valleys**:

- A digit is a **peak** if it is **strictly greater** than both of its immediate neighbors.
- A digit is a **valley** if it is **strictly less** than both of its immediate neighbors.
- The first and last digits of a number **cannot** be peaks or valleys.
- Any number with fewer than 3 digits has a waviness of 0.

Return the total sum of waviness for all numbers in the range `[num1, num2]`.

**Example 1:**

- **Input:** num1 = 120, num2 = 130
- **Output:** 3
- **Explanation:** 
  - In the range [120, 130]:
    - `120`: middle digit 2 is a peak, waviness = 1.
    - `121`: middle digit 2 is a peak, waviness = 1.
    - `130`: middle digit 3 is a peak, waviness = 1.
    - All other numbers in the range have a waviness of 0.
  - Thus, total waviness is `1 + 1 + 1 = 3`.

**Example 2:**

- **Input:** num1 = 198, num2 = 202
- **Output:** 3
- **Explanation:** 
  - In the range [198, 202]:
    - `198`: middle digit 9 is a peak, waviness = 1.
    - `201`: middle digit 0 is a valley, waviness = 1.
    - `202`: middle digit 0 is a valley, waviness = 1.
    - All other numbers in the range have a waviness of 0.Thus,
  - total waviness is `1 + 1 + 1 = 3`.

**Example 3:**

- **Input:** num1 = 4848, num2 = 4848
- **Output:** 2
- **Explanation:** Number `4848`: the second digit 8 is a peak, and the third digit 4 is a valley, giving a waviness of 2.

**Constraints:**

- `1 <= num1 <= num2 <= 10⁵`



**Hint:**
1. Use bruteforce






**Solution:**

We compute the waviness of each number in the inclusive range from `num1` to `num2` and sum the results. Waviness counts internal digits that are strictly greater than both neighbors (peaks) or strictly less than both neighbors (valleys). Numbers with fewer than 3 digits automatically have 0 waviness.

### Approach:

- Iterate through every number in the range.
- Convert each number to a string to access its digits.
- Skip numbers with fewer than 3 digits.
- Check each interior digit (excluding first and last) for peak or valley conditions.
- Sum the waviness for the number.
- Accumulate the total over all numbers.

Let's implement this solution in PHP: **[3751. Total Waviness of Numbers in Range I](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003751-total-waviness-of-numbers-in-range-i/solution.php)**

```php
<?php
/**
 * @param Integer $num1
 * @param Integer $num2
 * @return Integer
 */
function totalWaviness(int $num1, int $num2): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $num
 * @return int
 */
function wavinessOfNumber($num): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo totalWaviness(120, 130) . "\n";            // Output: 3
echo totalWaviness(198, 202) . "\n";            // Output: 3
echo totalWaviness(4848, 4848) . "\n";          // Output: 2
?>
```

### Explanation:

- **Brute force enumeration** is feasible here because the range is at most 100,000 numbers.
- `wavinessOfNumber()` handles the logic for a single number:
   - Split digits into an array.
   - Loop from index 1 to `len-2` (inclusive) to avoid first and last digits.
   - Compare each digit with its immediate left and right neighbors.
   - Increment waviness if the digit is a peak (`mid > left && mid > right`) or a valley (`mid < left && mid < right`).
- The main function `totalWaviness()` loops from `num1` to `num2`, calling the helper and adding to the total.

### Complexity
- **Time Complexity**: _**O(N * D)**_ where N = range size (num2 - num1 + 1) and D = max digit length (≤ 6 for numbers ≤ 10⁵).
   - Here, D is small, so effectively _**O(N)**_.
- **Space Complexity**: _**O(D)**_, as only a few variables are used.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**