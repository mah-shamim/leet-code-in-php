2523\. Closest Prime Numbers in Range

**Difficulty:** Medium

**Topics:** `Math`, `Number Theory`

Given two positive integers `left` and `right`, find the two integers `num1` and `num2` such that:

- `left <= num1 < num2 <= right` .
- Both `num1` and `num2` are  prime numbers[^1].
- `num2 - num1` is the **minimum** amongst all other pairs satisfying the above conditions.

Return the positive integer array `ans = [num1, num2]`. If there are multiple pairs satisfying these conditions, return the one with the **smallest** `num1` value. If no such numbers exist, return `[-1, -1]`.

**Example 1:**

- **Input:** left = 10, right = 19
- **Output:** [11,13]
- **Explanation:** The prime numbers between 10 and 19 are 11, 13, 17, and 19.
  The closest gap between any pair is 2, which can be achieved by [11,13] or [17,19].
  Since 11 is smaller than 17, we return the first pair.

**Example 2:**

- **Input:** left = 4, right = 6
- **Output:** [-1,-1]
- **Explanation:** There exists only one prime number in the given range, so the conditions cannot be satisfied.



**Constraints:**

- <code>1 <= left <= right <= 10<sup>6</sup></code>

**Hint:**
1. Use Sieve of Eratosthenes to mark numbers that are primes.
2. Iterate from right to left and find pair with the minimum distance between marked numbers.

[^1]: **Prime** `A prime number is a natural number greater than 1 with only two factors, 1 and itself.`




**Solution:**

We need to find the two closest prime numbers within a given range [left, right]. If there are multiple pairs with the same minimum difference, we return the pair with the smallest starting prime. If there are fewer than two primes in the range, we return [-1, -1].

### Approach
1. **Generate Primes Efficiently**: Use the Sieve of Eratosthenes algorithm to generate all prime numbers up to the given `right` value. This algorithm efficiently marks non-prime numbers, allowing us to quickly identify primes within the range.
2. **Collect Primes in Range**: Extract all prime numbers from the generated sieve that lie within the range [left, right].
3. **Find Closest Primes**: Iterate through the collected primes and compute the differences between consecutive primes. Track the minimum difference and the corresponding pair of primes.

Let's implement this solution in PHP: **[2523. Closest Prime Numbers in Range](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002523-closest-prime-numbers-in-range/solution.php)**

```php
<?php
/**
 * @param Integer $left
 * @param Integer $right
 * @return Integer[]
 */
function closestPrimes($left, $right) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example test cases
echo json_encode(closestPrimes(10, 19)); // Output: [11,13]
echo "\n";
echo json_encode(closestPrimes(4, 6));   // Output: [-1,-1]
?>
```

### Explanation:

1. **Sieve of Eratosthenes**: This algorithm efficiently marks non-prime numbers by iterating through each number starting from 2 and marking its multiples. This ensures that by the end of the process, only prime numbers remain marked as true in the sieve array.
2. **Prime Collection**: After generating the sieve, we collect all primes within the specified range [left, right]. This step filters out primes that are outside the given bounds.
3. **Finding Closest Primes**: By iterating through the collected primes and comparing consecutive pairs, we determine the pair with the smallest difference. The first occurrence of the minimum difference is chosen to ensure the smallest starting prime in case of ties.

This approach ensures that we efficiently generate primes and find the closest pair using optimal time and space complexity.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**