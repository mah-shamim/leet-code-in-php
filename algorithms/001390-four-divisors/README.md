1390\. Four Divisors

**Difficulty:** Medium

**Topics:** `Array`, `Math`, `Weekly Contest 181`

Given an integer array `nums`, return _the sum of divisors of the integers in that array that have exactly four divisors_. If there is no such integer in the array, return `0`.

**Example 1:**

- **Input:** nums = [21,4,7]
- **Output:** 32
- **Explanation:**
  21 has 4 divisors: 1, 3, 7, 21
  4 has 3 divisors: 1, 2, 4
  7 has 2 divisors: 1, 7
  The answer is the sum of divisors of 21 only.

**Example 2:**

- **Input:** nums = [21,21]
- **Output:** 64

**Example 3:**

- **Input:** nums = [1,2,3,4,5]
- **Output:** 0

**Constraints:**

- `1 <= nums.length <= 10⁴`
- `1 <= nums[i] <= 10⁵`



**Hint:**
1. Find the divisors of each element in the array.
2. You only need to loop to the square root of a number to find its divisors.






**Solution:**

We need to check for each number in the array whether it has exactly four divisors. Here's a PHP solution that follows the hint about only checking up to the square root:

### Approach:

- For each number in the array, check if it has exactly 4 divisors
- Use the property that if a number has exactly 4 divisors, it must be either:
   1. A product of two distinct prime numbers (p × q)
   2. A cube of a prime number (p³)
- Instead of finding all divisors, we can efficiently determine if a number has exactly 4 divisors by checking its prime factorization
- For each qualifying number, calculate the sum of its divisors

Let's implement this solution in PHP: **[1390. Four Divisors](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001390-four-divisors/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return float|int
 */
function sumFourDivisors(array $nums): float|int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $n
 * @return float|int
 */
function sumIfHasFourDivisors($n): float|int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo sumFourDivisors([21,4,7]) . "\n";          // Output: 32
echo sumFourDivisors([21,21]) . "\n";           // Output: 64
echo sumFourDivisors([1,2,3,4,5]) . "\n";       // Output: 0
?>
```

### Explanation:

1. **Main Algorithm**:
   - Iterate through each number in the input array
   - For each number, determine if it has exactly 4 divisors
   - If it does, calculate and accumulate the sum of those divisors

2. **Efficient Divisor Counting**:
   - Instead of checking all numbers up to n, we only check up to √n
   - When we find a divisor i, we also get its pair n/i (unless i = n/i)
   - Keep track of:
      - Count of divisors found so far
      - Sum of divisors found so far
   - Early exit if count exceeds 4 (no need to continue checking)

3. **Key Observations**:
   - Numbers with exactly 4 divisors are of two types:
      - p × q where p and q are distinct primes: divisors are 1, p, q, p×q
      - p³ where p is prime: divisors are 1, p, p², p³
   - The algorithm handles both cases by checking all divisors up to √n

4. **Complexity Analysis**:
   - Time Complexity: O(n × √m) where n is array length, m is max number value
   - Space Complexity: O(1) (excluding input array)

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**