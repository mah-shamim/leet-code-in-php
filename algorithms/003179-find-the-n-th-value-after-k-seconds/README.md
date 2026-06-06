3179\. Find the N-th Value After K Seconds

**Difficulty:** Easy

**Topics:** `Mid Level`, `Array`, `Prefix Sum`, `Weekly Contest 334`

You are given two integers `n` and `k`.

Initially, you start with an array `a` of `n` integers where `a[i] = 1` for all `0 <= i <= n - 1`. After each second, you simultaneously update each element to be the sum of all its preceding elements plus the element itself. For example, after one second, `a[0]` remains the same, `a[1]` becomes `a[0] + a[1]`, `a[2]` becomes `a[0] + a[1] + a[2]`, and so on.

Return the **value** of `a[n - 1]` after `k` seconds.

Since the answer may be very large, return it **modulo** `10⁹ + 7`.

**Example 1:**

- **Input:** n = 4, k = 5
- **Output:** 56
- **Explanation:**
  
   | Second	 | State After |
   |--------|-------------|
   | 0      | [1,1,1,1]   |
   | 1      | [1,2,3,4]   |
   | 2      | [1,3,6,10]  |
   | 3      | [1,4,10,20] |
   | 4      | [1,5,15,35] |
   | 5      | [1,6,21,56] |

**Example 2:**

- **Input:** n = 5, k = 3
- **Output:** 35
- **Explanation:**

  | Second	 | State After    |
  |--------|----------------|
  | 0	      | [1,1,1,1,1]    |
  | 1	      | [1,2,3,4,5]    |
  | 2	      | [1,3,6,10,15]  |
  | 3	      | [1,4,10,20,35] |


**Constraints:**

- `1 <= nums.length <= 1000`
- `1 <= nums[i] <= 10⁵`



**Hint:**
1. For each index `i`, maintain two variables `leftSum` and `rightSum`.
2. Iterate on the range `j: [0 … i - 1]` and add `nums[j]` to the `leftSum` and similarly iterate on the range `j: [i + 1 … nums.length - 1]` and add `nums[j]` to the `rightSum`.



**Similar Questions:**
1. [724. Find Pivot Index](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000724-find-pivot-index)
2. [1991. Find the Middle Index in Array](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001991-find-the-middle-index-in-array)
3. [2670. Find the Distinct Difference Array](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002670-find-the-distinct-difference-array)
4. [3179. Find the N-th Value After K Seconds](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003179-find-the-n-th-value-after-k-seconds)






**Solution:**

We start with an array of length `n` filled with `1`s. At each second, every element becomes the cumulative sum of all preceding elements plus itself. 
After `k` seconds, we need the value of the last element (`a[n-1]`) modulo _**10⁹+7**_. The problem reduces to computing the binomial 
coefficient _**\binom{k+n-1}{n-1}**_ modulo _**10⁹+7**_.

### Approach:

- **Observation**: The sequence of transformations follows the pattern of combinations with repetition.
- **Mathematical insight**: After `k` seconds, `a[n-1]` equals _**\binom{k+n-1}{n-1}**_.
- **Computational method**: Use modular arithmetic to compute _**\binom{k+n-1}{n-1} \mod (10⁹+7)**_ efficiently.
- **Modular inverse**: Since _**10⁹+7**_ is prime, use Fermat's little theorem for modular division.
- **Iterative product**: Compute the product _**\prod_{i=1}^{n-1} \frac{k+i}{i}**_ modulo _**10⁹+7**_.

Let's implement this solution in PHP: **[3179. Find the N-th Value After K Seconds](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003179-find-the-n-th-value-after-k-seconds/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @param Integer $k
 * @return Integer
 */
function valueAfterKSeconds(int $n, int $k): int
{
    $mod = 1000000007;
    $result = 1;

    // We need C(k + n - 1, n - 1)
    // formula: result = (k + n - 1)! / ((n - 1)! * k!)
    // But we compute iteratively:
    // result = product_{i=1}^{n-1} (k + i) / i  (mod M)

    for ($i = 1; $i <= $n - 1; $i++) {
        $result = $result * (($k + $i) % $mod) % $mod;
        $result = $result * modInverse($i, $mod) % $mod;
    }

    return $result;
}

/**
 * Modular inverse using Fermat's little theorem
 *
 * @param $a
 * @param $mod
 * @return int
 */
function modInverse($a, $mod): int
{
    return powMod($a, $mod - 2, $mod);
}

/**
 * Modular exponentiation
 *
 * @param $base
 * @param $exp
 * @param $mod
 * @return int
 */
function powMod($base, $exp, $mod): int
{
    $result = 1;
    $base %= $mod;
    while ($exp > 0) {
        if ($exp & 1) {
            $result = ($result * $base) % $mod;
        }
        $base = ($base * $base) % $mod;
        $exp >>= 1;
    }
    return $result;
}

// Test cases
echo valueAfterKSeconds(4, 5) . "\n";           // Output: 56
echo valueAfterKSeconds(5, 3) . "\n";           // Output: 35
?>
```

### Explanation:

- **Initial array**: All elements = 1.
- **After 1 second**: `a[i] = i+1` for 0-based indexing.
- **After k seconds**: Value at index `n-1` = _**\binom{k+n-1}{n-1}**_.
- **Why binomial coefficient**: This is a stars-and-bars problem — each step adds previous values, equivalent to choosing positions for increments.
- **Computation trick**:  
  \[
  \binom{k+n-1}{n-1} = \prod_{i=1}^{n-1} \frac{k+i}{i}
  \]  
  Compute numerator mod _**M**_, multiply by modular inverse of denominator mod _**M**_.
- **Modular inverse**: Use _**x^{-1} \equiv x^{M-2} \pmod{M}**_ (Fermat).
- **Exponentiation**: Use fast exponentiation (`powMod`) for efficiency.

### Complexity
- **Time complexity**: _**O(n \log M)**_, where _**M = 10⁹+7**_ (for modular inverse).
- **Space complexity**: _**O(1)**_, only a few variables.
- **Optimal for constraints**: Works even for large `n` and `k` within modulo limits.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**