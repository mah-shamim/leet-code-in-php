762\. Prime Number of Set Bits in Binary Representation

**Difficulty:** Easy

**Topics:** `Junior`, `Math`, `Bit Manipulation`, `Weekly Contest 67`

Given two integers `left` and `right`, return _the **count** of numbers in the **inclusive** range `[left, right]` having a **prime number of set bits** in their binary representation_.

Recall that the **number of set bits** an integer has is the number of `1`'s present when written in binary.

- For example, `21` written in binary is `10101`, which has `3` set bits.


**Example 1:**

- **Input:** left = 6, right = 10
- **Output:** 4
- **Explanation:**
  6  -> 110 (2 set bits, 2 is prime)
  7  -> 111 (3 set bits, 3 is prime)
  8  -> 1000 (1 set bit, 1 is not prime)
  9  -> 1001 (2 set bits, 2 is prime)
  10 -> 1010 (2 set bits, 2 is prime)
  4 numbers have a prime number of set bits.

**Example 2:**

- **Input:** left = 10, right = 15
- **Output:** 5
- **Explanation:**
  10 -> 1010 (2 set bits, 2 is prime)
  11 -> 1011 (3 set bits, 3 is prime)
  12 -> 1100 (2 set bits, 2 is prime)
  13 -> 1101 (3 set bits, 3 is prime)
  14 -> 1110 (3 set bits, 3 is prime)
  15 -> 1111 (4 set bits, 4 is not prime)
  5 numbers have a prime number of set bits.

**Constraints:**

- `1 <= left <= right <= 10⁶`
- `0 <= right - left <= 10⁴`



**Hint:**
1. Write a helper function to count the number of set bits in a number, then check whether the number of set bits is 2, 3, 5, 7, 11, 13, 17 or 19.



**Similar Questions:**
1. [191. Number of 1 Bits](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000191-number-of-1-bits)






**Solution:**

The task is to count all integers in a given inclusive range `[left, right]` whose binary representation has a prime number of `1` bits (set bits). The solution iterates through each number, counts its set bits manually, and checks whether that count is a prime number using a pre‑computed set of primes (2,3,5,7,11,13,17,19). The range length is at most 10⁴, and the maximum possible bit count for numbers ≤ 10⁶ is 20, so the prime set covers all relevant cases.

### Approach:

- Recognize that numbers up to 10⁶ require at most 20 bits (since 2²⁰ ≈ 1.05×10⁶).
- Pre‑define the primes that can appear as a bit count in this range: 2,3,5,7,11,13,17,19.
- For each number from `left` to `right`:
   - Count the number of `1` bits using a loop that repeatedly checks the lowest bit and shifts right.
   - Look up the bit count in a hash map of the prime set (for O(1) verification).
   - If the count is prime, increment the result counter.
- Return the total count.

Let's implement this solution in PHP: **[762. Prime Number of Set Bits in Binary Representation](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000762-prime-number-of-set-bits-in-binary-representation/solution.php)**

```php
<?php
/**
 * @param Integer $left
 * @param Integer $right
 * @return Integer
 */
function countPrimeSetBits(int $left, int $right): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo countPrimeSetBits(6,10) . "\n";            // Output: 4
echo countPrimeSetBits(10, 15) . "\n";          // Output: 5
?>
```

### Explanation:

1. **Prime set preparation** An array `$primes` holds all prime numbers that could possibly equal the set‑bit count of any number ≤ 10⁶ (i.e., from 2 to 19). `array_flip` creates an associative array `$primeMap` for fast `isset` lookups.
2. **Iterate the range** The `for` loop runs through every integer from `$left` to `$right`.
3. **Count set bits manually** For each number `$num`, we copy it to `$n` and count its set bits:
   - `$bits` accumulates the count.
   - `$n & 1` isolates the least significant bit; if it is 1, we add 1 to `$bits`.
   - `$n >>= 1` shifts the bits right by one position, discarding the bit we just examined.
   - The loop continues until `$n` becomes 0.
4. **Prime check** After obtaining `$bits`, we test `isset($primeMap[$bits])`. Because the map contains only prime keys, this condition is `true` exactly when the bit count is prime.
5. **Count accumulation** When the condition is true, we increase `$result` by 1.
6. **Return** After processing all numbers, `$result` holds the required count and is returned.

### Complexity

- **Time Complexity:** O((right−left+1) * log₂(right)), In the worst case, we examine each of the up to 10⁴ numbers, and for each we perform up to ~20 iterations (because numbers ≤ 10⁶ have at most 20 bits). The constant‑time prime lookup does not affect the asymptotic bound. Thus, the solution runs quickly within the constraints.
- **Space Complexity:** O(1), Only a few scalar variables and a tiny fixed‑size array are used, regardless of the input range.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**