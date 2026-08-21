3116\. Kth Smallest Amount With Single Denomination Combination

**Difficulty:** Hard

**Topics:** `Senior Staff`, `Array`, `Math`, `Binary Search`, `Bit Manipulation`, `Combinatorics`, `Number Theory`, `Weekly Contest 393`

You are given an integer array `coins` representing coins of different denominations and an integer `k`.

You have an infinite number of coins of each denomination. However, you are **not allowed** to combine coins of different denominations.

Return the `kᵗʰ` **smallest** amount that can be made using these coins.

**Example 1:**

- **Input:** coins = [3,6,9], k = 3
- **Output:** 9
- **Explanation:** 
  - The given coins can make the following amounts:
  - Coin 3 produces multiples of 3: 3, 6, 9, 12, 15, etc.
  - Coin 6 produces multiples of 6: 6, 12, 18, 24, etc.
  - Coin 9 produces multiples of 9: 9, 18, 27, 36, etc.
  - All of the coins combined produce: 3, 6, <ins>**9**</ins>, 12, 15, etc.

**Example 2:**

- **Input:** coins = [5,2], k = 7
- **Output:** 12
- **Explanation:** 
  - The given coins can make the following amounts:
  - Coin 5 produces multiples of 5: 5, 10, 15, 20, etc.
  - Coin 2 produces multiples of 2: 2, 4, 6, 8, 10, 12, etc.
  - All of the coins combined produce: 2, 4, 5, 6, 8, 10, <ins>**12**</ins>, 14, 15, etc.

**Example 3:**

- **Input:** coins = [6,5], k = 1435065516
- **Output:** 4305196548

**Example 4:**

- **Input:** coins = [2], k = 5
- **Output:** 10

**Example 5:**

- **Input:** coins = [2,3,5], k = 10
- **Output:** 18

**Example 6:**

- **Input:** coins = [4,6,9], k = 5
- **Output:** 16

**Example 7:**

- **Input:** coins = [7,11,13], k = 100
- **Output:** 1092

**Example 8:**

- **Input:** coins = [1], k = 1
- **Output:** 1

**Example 9:**

- **Input:** coins = [10,15,20], k = 1
- **Output:** 10

**Example 10:**

- **Input:** coins = [2,4,8,16], k = 20
- **Output:** 40

**Constraints:**

- `1 <= coins.length <= 15`
- `1 <= coins[i] <= 25`
- `1 <= k <= 2 * 10⁹`
- `coins` contains pairwise distinct integers.


**Hint:**
1. Binary search the answer `x`.
2. Use the inclusion-exclusion principle to count the number of distinct amounts that can be made up to `x`.


**Similar Questions:**
1. [668. Kth Smallest Number in Multiplication Table](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000668-kth-smallest-number-in-multiplication-table)
2. [3317. Find the Number of Possible Ways for an Event](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003317-find-the-number-of-possible-ways-for-an-event)


**Solution:**

We implemented an efficient solution to find the kth smallest amount that can be formed using any single coin denomination from the given set. The solution employs **binary search** combined with the **inclusion-exclusion principle** to count how many reachable amounts exist up to a given value. This approach efficiently handles the constraints of up to 15 coin denominations and `k` values up to `2×10⁹`.

## Approach

- **Binary Search Framework**
   - Search space: `[min(coins), k * min(coins)]` as the upper bound is safe because using the smallest coin repeatedly gives at least `k` multiples
   - Standard binary search to find the smallest `x` where `countAtMost(x) >= k`
- **Counting Reachable Amounts `≤ x`**
   - Use **Inclusion-Exclusion Principle** to count distinct numbers that are multiples of at least one coin
   - Iterate through all non-empty subsets of coins (`2ⁿ - 1` subsets, `n ≤ 15 → max 32767 subsets`)
   - For each subset, compute LCM of selected coins
   - Count = `floor(x / LCM)` (`numbers ≤ x divisible` by all coins in subset)
   - Apply inclusion-exclusion: add counts for odd-sized subsets, subtract for even-sized subsets
- **Optimization Techniques**
   - Early break when LCM exceeds `x` to avoid unnecessary computations
   - Efficient GCD/LCM calculations using Euclidean algorithm

Let's implement this solution in PHP: **[3116. Kth Smallest Amount With Single Denomination Combination](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003116-kth-smallest-amount-with-single-denomination-combination/solution.php)**

```php
<?php
/**
 * @param Integer[] $coins
 * @param Integer $k
 * @return Integer
 */
function findKthSmallest(array $coins, int $k): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * Count how many numbers ≤ x are multiples of at least one coin
 * Using Inclusion-Exclusion Principle
 *
 * @param array $coins
 * @param int $x
 * @return int
 */
function countAtMost(array $coins, int $x): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * Greatest Common Divisor (Euclidean algorithm)
 *
 * @param int $a
 * @param int $b
 * @return int
 */
function gcd(int $a, int $b): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * Least Common Multiple
 *
 * @param int $a
 * @param int $b
 * @return float|int
 */
function lcm(int $a, int $b): float|int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo findKthSmallest([3,6,9], 3) .  "\n";               // Output: 9
echo findKthSmallest([5,2], 7) .  "\n";                 // Output: 12
echo findKthSmallest([6,5], 1435065516) .  "\n";        // Output: 4305196548
echo findKthSmallest([2], 5) .  "\n";                   // Output: 10
echo findKthSmallest([2,3,5], 10) .  "\n";              // Output: 18
echo findKthSmallest([4,6,9], 5) .  "\n";               // Output: 16
echo findKthSmallest([7,11,13], 100) .  "\n";           // Output: 1092
echo findKthSmallest([1], 1) .  "\n";                   // Output: 1
echo findKthSmallest([10,15,20], 1) .  "\n";            // Output: 10
echo findKthSmallest([2,4,8,16], 20) .  "\n";           // Output: 40
?>
```

### Explanation:

- **Binary Search Justification**: The count function `countAtMost(x)` is monotonically non-decreasing, making binary search applicable for finding the kth smallest value
- **Inclusion-Exclusion Principle Application**:
   - Without inclusion-exclusion, numbers that are multiples of multiple coins would be counted multiple times
   - Example: coins = [2, 3], x = 12
      - Multiples of 2: {2,4,6,8,10,12} → 6 numbers
      - Multiples of 3: {3,6,9,12} → 4 numbers
      - Union should be {2,3,4,6,8,9,10,12} → 8 numbers
      - Formula: 6 + 4 - floor(12/6) = 10 - 2 = 8
- **LCM Computation**: For a subset of coins, a number is a multiple of all coins in the subset iff it's a multiple of their LCM
- **Upper Bound Selection**: `k * min(coins)` works because even with the smallest coin, we need at least k distinct multiples, and `k * min(coin)` is the kth multiple of that coin
- **Pairwise Distinct Denominations**: The constraint ensures we don't have duplicate coins to handle

## Complexity Analysis

- **Time Complexity**: _**O(2ⁿ · n · log(k · min(coins)))**_
   - Binary search: _**O(log(k · min(coins))) ≈ O(log(k))**_
   - Each count evaluation: Iterates through `2ⁿ` subsets, computing LCM with up to n coins
   - `n ≤ 15 → max 32768 subsets × up to 15 coins = ~491,520` operations per count
   - Total: `~491K × 31` iterations _**(log₂2×10⁹ ≈ 31) ≈ 15**_ million operations, well within limits
- **Space Complexity**: _**O(1)**_
   - Only constant extra space used for variables
   - No recursion overhead in iterative implementation

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**