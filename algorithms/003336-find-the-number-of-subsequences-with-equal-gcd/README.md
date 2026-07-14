3336\. Find the Number of Subsequences With Equal GCD

**Difficulty:** Hard

**Topics:** `Senior Staff`, `Array`, `Math`, `Dynamic Programming`, `Number Theory`, `Weekly Contest 421`

You are given an integer array `nums`.

Your task is to find the number of pairs of **non-empty** subsequences[^1] (`seq1, seq2`) of `nums` that satisfy the following conditions:

- The subsequences `seq1` and `seq2` are **disjoint**, meaning **no index** of `nums` is common between them.
- The GCD[^2] of the elements of `seq1` is equal to the GCD of the elements of `seq2`.

Return the total number of such pairs.

Since the answer may be very large, return it **modulo** `10⁹ + 7`.

[^1]: **Subsequence:** A **subsequence** is an array that can be derived from another array by deleting some or no elements without changing the order of the remaining elements.

[^2]: **GCD:** The term `gcd(a, b)` denotes the **greatest common divisor** of `a` and `b`.

**Example 1:**

- **Input:** nums = [1,2,3,4]
- **Output:** 10
- **Explanation:**
  - The subsequence pairs which have the GCD of their elements equal to 1 are:
    - <code>([**<ins>1</ins>**, 2, 3, 4], [1, **<ins>2</ins>**, **<ins>3</ins>**, 4])</code>
    - <code>([**<ins>1</ins>**, 2, 3, 4], [1, **<ins>2</ins>**, **<ins>3</ins>**, **<ins>4</ins>**])</code>
    - <code>([**<ins>1</ins>**, 2, 3, 4], [1, 2, **<ins>3</ins>**, **<ins>4</ins>**])</code>
    - <code>([**<ins>1</ins>**, **<ins>2</ins>**, 3, 4], [1, 2, **<ins>3</ins>**, **<ins>4</ins>**])</code>
    - <code>([**<ins>1</ins>**, 2, 3, **<ins>4</ins>**], [1, **<ins>2</ins>**, **<ins>3</ins>**, 4])</code>
    - <code>([1, **<ins>2</ins>**, **<ins>3</ins>**, 4], [**<ins>1</ins>**, 2, 3, 4])</code>
    - <code>([1, **<ins>2</ins>**, **<ins>3</ins>**, 4], [**<ins>1</ins>**, 2, 3, **<ins>4</ins>**])</code>
    - <code>([1, **<ins>2</ins>**, **<ins>3</ins>**, **<ins>4</ins>**], [**<ins>1</ins>**, 2, 3, 4])</code>
    - <code>([1, 2, **<ins>3</ins>**, **<ins>4</ins>**], [**<ins>1</ins>**, 2, 3, 4])</code>
    - <code>([1, 2, **<ins>3</ins>**, **<ins>4</ins>**], [**<ins>1</ins>**, **<ins>2</ins>**, 3, 4])</code>


**Example 2:**

- **Input:** nums = [10,20,30]
- **Output:** 2
- **Explanation:**
   - The subsequence pairs which have the GCD of their elements equal to 10 are:
     - <code>([**<ins>10</ins>**, 20, 30], [10, **<ins>20</ins>**, **<ins>30</ins>**])</code>
     - <code>([10, **<ins>20</ins>**, **<ins>30</ins>**], [**<ins>10</ins>**, 20, 30])</code>


**Example 3:**

- **Input:** nums = [1,1,1,1]
- **Output:** 50


**Example 4:**

- **Input:** nums = [5]
- **Output:** 0


**Example 5:**

- **Input:** nums = [2,2]
- **Output:** 2


**Example 6:**

- **Input:** nums = [1,1]
- **Output:** 2


**Example 7:**

- **Input:** nums = [100,200,150]
- **Output:** 0


**Example 8:**

- **Input:** nums = [6,10,15]
- **Output:** 0


**Example 9:**

- **Input:** nums = [2,4,8]
- **Output:** 0


**Example 10:**

- **Input:** nums = [1]
- **Output:** 0


**Constraints:**

- `1 <= nums.length <= 200`
- `1 <= nums[i] <= 200`


**Hint:**
1. Use dynamic programming to store number of subsequences up till index `i` with GCD `g1` and `g2`.


**Similar Questions:**
1. [1979. Find Greatest Common Divisor of Array](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001979-find-greatest-common-divisor-of-array)


**Solution:**

We present a dynamic programming solution to count pairs of disjoint non-empty subsequences with equal GCD. Our approach tracks the number of ways to form two subsequences with specific GCD values simultaneously, processing each array element sequentially while deciding whether to skip it or assign it to either subsequence.

## Approach

- **State Definition**: Use `dp[g1][g2]` to store the number of ways to build two subsequences where the first has GCD `g1` and the second has GCD `g2`
- **Base Case**: Initialize `dp[0][0] = 1` representing empty subsequences for both
- **Transition**: For each element `x` in `nums`:
   - Skip the element (copy current dp state)
   - Add `x` to first subsequence: update GCD from `g1` to `gcd(g1, x)`
   - Add `x` to second subsequence: update GCD from `g2` to `gcd(g2, x)`
- **Result Collection**: Sum all `dp[g][g]` for `g >= 1` to count pairs with equal GCD
- **Modulo Operations**: Apply `mod = 10⁹ + 7` to prevent overflow

Let's implement this solution in PHP: **[3336. Find the Number of Subsequences With Equal GCD](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003336-find-the-number-of-subsequences-with-equal-gcd/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function subsequencePairCount(array $nums): int
{
    $mod = 1000000007;
    $maxVal = 200;

    // dp[g1][g2] = number of ways
    $dp = array_fill(0, $maxVal + 1, array_fill(0, $maxVal + 1, 0));
    $dp[0][0] = 1; // empty subsequences

    foreach ($nums as $x) {
        $newDp = $dp; // skip current element

        for ($g1 = 0; $g1 <= $maxVal; $g1++) {
            for ($g2 = 0; $g2 <= $maxVal; $g2++) {
                if ($dp[$g1][$g2] == 0) continue;
                $val = $dp[$g1][$g2];

                // Add x to first subsequence
                $ng1 = $g1 == 0 ? $x : gcd($g1, $x);
                $newDp[$ng1][$g2] = ($newDp[$ng1][$g2] + $val) % $mod;

                // Add x to second subsequence
                $ng2 = $g2 == 0 ? $x : gcd($g2, $x);
                $newDp[$g1][$ng2] = ($newDp[$g1][$ng2] + $val) % $mod;
            }
        }

        $dp = $newDp;
    }

    $result = 0;
    for ($g = 1; $g <= $maxVal; $g++) {
        $result = ($result + $dp[$g][$g]) % $mod;
    }

    return $result;
}

/**
 * @param $a
 * @param $b
 * @return mixed
 */
function gcd($a, $b): mixed
{
    while ($b != 0) {
        $t = $b;
        $b = $a % $b;
        $a = $t;
    }
    return $a;
}

// Test cases
echo subsequencePairCount([1,2,3,4]) .  "\n";           // Output: 10
echo subsequencePairCount([10,20,30]) .  "\n";          // Output: 2
echo subsequencePairCount([1,1,1,1]) .  "\n";           // Output: 50
echo subsequencePairCount([5]) .  "\n";                 // Output: 0
echo subsequencePairCount([2,2]) .  "\n";               // Output: 2
echo subsequencePairCount([1,1]) .  "\n";               // Output: 2
echo subsequencePairCount([100,200,150]) .  "\n";       // Output: 0
echo subsequencePairCount([6,10,15]) .  "\n";           // Output: 0
echo subsequencePairCount([2,4,8]) .  "\n";             // Output: 0
echo subsequencePairCount([1]) .  "\n";                 // Output: 0
?>
```

### Explanation:

- **GCD Transition Logic**: When GCD is 0 (empty subsequence), adding an element sets the GCD to that element's value. Otherwise, we compute `gcd(current_gcd, new_element)`.
- **Disjointness Guarantee**: By processing each element once with three choices (skip, add to seq1, add to seq2), we ensure each index belongs to at most one subsequence.
- **Non-empty Constraint**: We exclude `dp[0][0]` from the final result since both subsequences must be non-empty.
- **Time-Optimized DP**: The maximum GCD value is bounded by `max(nums[i]) ≤ 200`, allowing a `201×201` DP table regardless of array length.
- **Combinatorial Counting**: Each path through the DP represents a unique assignment of elements to subsequences or skip, mapping directly to a valid subsequence pair.
- **Edge Case Handling**: Elements with value 1 work correctly since `gcd(1, x) = 1` for any `x`.

## Complexity Analysis

- **Time Complexity**: `O(n * M² * log M)` where `n = len(nums)`, `M = max(nums) ≤ 200`. The `log M` factor comes from computing gcd during transitions. With `M` fixed at `200`, this is essentially `O(n)` with a constant factor of 40,000 state transitions per element.
- **Space Complexity**: `O(M²)` for the DP table, which is constant at `201 × 201 = 40401` cells, independent of input size.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**