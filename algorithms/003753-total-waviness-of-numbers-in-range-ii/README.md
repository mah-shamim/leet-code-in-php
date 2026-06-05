3753\. Total Waviness of Numbers in Range II

**Difficulty:** Hard

**Topics:** `Senior Staff`, `Math`, `Dynamic Programming`, `Biweekly Contest 170`

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
  - In the range `[120, 130]`:
    - `120`: middle digit 2 is a peak, waviness = 1.
    - `121`: middle digit 2 is a peak, waviness = 1.
    - `130`: middle digit 3 is a peak, waviness = 1.
    - All other numbers in the range have a waviness of 0.
  - Thus, total waviness is `1 + 1 + 1 = 3`.

**Example 2:**

- **Input:** num1 = 198, num2 = 202
- **Output:** 3
- **Explanation:**
     - In the range `[198, 202]`:
       - `198`: middle digit 9 is a peak, waviness = 1.
       - `201`: middle digit 0 is a valley, waviness = 1.
       - `202`: middle digit 0 is a valley, waviness = 1.
    - All other numbers in the range have a waviness of 0.
     - Thus, total waviness is `1 + 1 + 1 = 3`.

**Example 3:**

- **Input:** num1 = 4848, num2 = 4848
- **Output:** 2
- **Explanation:** Number `4848`: the second digit 8 is a peak, and the third digit 4 is a valley, giving a waviness of 2.

**Example 4:**

- **Input:** num1 = 63, num2 = 101
- **Output:** 1

**Constraints:**

- `1 <= num1 <= num2 <= 10¹⁵`


**Hint:**
1. Use digit dynamic programming
2. Build a digit-DP state `(position, tight, lastDigit, secondLastDigit)`






**Solution:**

This solution calculates the **total sum of waviness** for all numbers in a given inclusive range `[num1, num2]`.  
Waviness is defined as the count of **peaks** and **valleys** in the digit sequence of a number (excluding first and last digits).  
The approach uses **digit dynamic programming (digit DP)** to efficiently process ranges up to `10^15`, avoiding brute-force enumeration.  
The function `totalWaviness(num1, num2)` computes the result as `solve(num2) - solve(num1 - 1)`, where `solve(n)` returns the total waviness for `[1, n]`.

### Approach:

- **Digit DP** – We recursively process digits from most significant to least significant.
- **State** – `(position, tight, started, secondLast, last)` tracks:
   - current index in the number
   - whether we are bound by the prefix of `n` (`tight`)
   - whether we have started placing non-leading digits (`started`)
   - the previous two digits (`secondLast`, `last`) to detect peaks/valleys
- **Memoization** – For `!tight` states, we store results to reuse across different numbers.
- **Contribution counting** – When we place a new digit:
   - If we have at least 3 digits so far (`secondLast !== -1`), we check if the middle digit (`last`) is a peak or valley.
   - If yes, we add `1 × (number of valid suffixes)` to the waviness sum.
- **Base case** – When all digits are placed (`pos == len`), return `count = 1, waviness = 0`.
- **Range subtraction** – `totalWaviness(num1, num2) = solve(num2) - solve(num1 - 1)`.

Let's implement this solution in PHP: **[3753. Total Waviness of Numbers in Range II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003753-total-waviness-of-numbers-in-range-ii/solution.php)**

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
 * @param int $n
 * @return int|mixed
 */
function sumWavinessUpTo(int $n): mixed
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
echo totalWaviness(63, 101) . "\n";             // Output: 1
?>
```

### Explanation:

- **Peak & Valley definition**  
  - A digit `d` is a **peak** if `prev < d > next`.  
  - A digit `d` is a **valley** if `prev > d < next`.  
  - First and last digits are ignored.
- **Digit DP state** We need the **last two digits** to know if the current position (as the second last) is a peak/valley when the next digit is chosen.
- **Transition**  
  - At position `pos`, we try digits `0..limit`:
     - If not started and digit is 0, stay in `not started`.
     - If not started and digit > 0, start the number, store it as `last`, `secondLast = -1`.
     - If started, compute if `last` (which is the middle digit between `secondLast` and `digit`) is peak/valley, and add to waviness accordingly.
- **Memoization** The result for a state `(pos, started, secondLast, last)` with `tight = 0` can be reused across different higher prefixes.
- **Complexity** State count is `O(len × 2 × 10 × 10)` with `len ≤ 16` → very fast.

### Complexity
- **Time Complexity**: _**O(len × 2 × 10 × 10 × 10) ≈ O(16 × 1000) = O(16000)**_ per `solve(n)`, which is trivial for input sizes up to `10¹⁵`.
- **Space Complexity**: _**O(len × 2 × 10 × 10)**_ for memoization table.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**