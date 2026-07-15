3658\. GCD of Odd and Even Sums

**Difficulty:** Easy

**Topics:** `Mid Level`, `Math`, `Number Theory`, `Weekly Contest 464`

You are given an integer `n`. Your task is to compute the **GCD** (greatest common divisor) of two values:

- `sumOdd`: the sum of the smallest `n` positive odd numbers.
- `sumEven`: the sum of the smallest `n` positive even numbers.

Return the GCD of `sumOdd` and `sumEven`.

**Example 1:**

- **Input:** n = 4
- **Output:** 4
- **Explanation:**
  - Sum of the first 4 odd numbers `sumOdd = 1 + 3 + 5 + 7 = 16`
  - Sum of the first 4 even numbers `sumEven = 2 + 4 + 6 + 8 = 20`
  - Hence, `GCD(sumOdd, sumEven) = GCD(16, 20) = 4`.

**Example 2:**

- **Input:** n = 5
- **Output:** 5
- **Explanation:**
  - Sum of the first 5 odd numbers `sumOdd = 1 + 3 + 5 + 7 + 9 = 25`
  - Sum of the first 5 even numbers `sumEven = 2 + 4 + 6 + 8 + 10 = 30`
  - Hence, `GCD(sumOdd, sumEven) = GCD(25, 30) = 5`.

**Example 3:**

- **Input:** n = 1
- **Output:** 1

**Example 4:**

- **Input:** n = 2
- **Output:** 2

**Example 5:**

- **Input:** n = 3
- **Output:** 3

**Example 6:**

- **Input:** n = 10
- **Output:** 10

**Example 7:**

- **Input:** n = 100
- **Output:** 100

**Example 8:**

- **Input:** n = 1000
- **Output:** 1000

**Constraints:**

- `1 <= n <= 1000`


**Hint:**
1. The first `n` odd numbers sum to `n * n`
2. First `n` even numbers sum to `n * (n + 1)`
3. `gcd(n, n + 1) = 1`, so the answer is `n`


**Solution:**

We solved the problem by recognizing that the GCD of the sum of the first `n` odd numbers and the sum of the first `n` even numbers simplifies directly to `n`. We identified that `sumOdd = n²` and `sumEven = n(n+1)`, and since `n` and `n+1` are consecutive integers (always coprime), their GCD is 1. Therefore, the answer is simply `n`, making the solution _**O(1)**_ time and space complexity.

## Approach

- **Identify the formulas** for the sum of the first `n` odd and even numbers
- **Recognize** that `sumOdd = n²` and `sumEven = n(n+1)`
- **Apply GCD properties**: `gcd(n², n(n+1)) = n × gcd(n, n+1)`
- **Use the fact** that consecutive integers are always coprime: `gcd(n, n+1) = 1`
- **Simplify** to get the answer: `n × 1 = n`
- **Return** `n` directly without computing large sums

Let's implement this solution in PHP: **[3658. GCD of Odd and Even Sums](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003658-gcd-of-odd-and-even-sums/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @return Integer
 */
function gcdOfOddEvenSums(int $n): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo gcdOfOddEvenSums(4) .  "\n";       // Output: 4
echo gcdOfOddEvenSums(5) .  "\n";       // Output: 5
echo gcdOfOddEvenSums(1) .  "\n";       // Output: 1
echo gcdOfOddEvenSums(2) .  "\n";       // Output: 2
echo gcdOfOddEvenSums(3) .  "\n";       // Output: 3
echo gcdOfOddEvenSums(10) .  "\n";      // Output: 10
echo gcdOfOddEvenSums(100) .  "\n";     // Output: 100
echo gcdOfOddEvenSums(1000) .  "\n";    // Output: 1000
?>
```

### Explanation:

- **Sum of first n odd numbers**: The sequence is 1, 3, 5, ..., (2n-1). The sum formula is `n²`
- **Sum of first n even numbers**: The sequence is 2, 4, 6, ..., 2n. The sum formula is `n(n+1)`
- **GCD calculation**: We need `gcd(n², n(n+1))`
- **Factor out n**: `n × gcd(n, n+1)` since both terms share a factor of `n`
- **Consecutive property**: `n` and `n+1` have no common factors other than 1
- **Final result**: `n × 1 = n`, which matches all test cases
- **Optimization**: No loops or array storage needed; the answer is always the input `n`

## Complexity Analysis

- **Time Complexity**: _**O(1)**_ - constant time operation, regardless of input size
- **Space Complexity**: _**O(1)**_ - no additional memory allocation required

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**