3539\. Find Sum of Array Product of Magical Sequences

**Difficulty:** Hard

**Topics:** `Array`, `Math`, `Dynamic Programming`, `Bit Manipulation`, `Combinatorics`, `Bitmask`, `Weekly Contest 448`

You are given two integers, `m` and k, and an integer array `nums`.
A sequence of integers `seq` is called **magical** if:

- `seq` has a size of `m`.
- `0 <= seq[i] < nums.length`
- The **binary representation** of <code>2<sup>seq[0]</sup> + 2<sup>seq[1]</sup> + ... + 2<sup>seq[m - 1]</sup></code> has `k` **set bits**.

The **array product** of this sequence is defined as `prod(seq) = (nums[seq[0]] * nums[seq[1]] * ... * nums[seq[m - 1]])`.

Return _the **sum** of the **array products** for all valid **magical** sequences_.

Since the answer may be large, return it **modulo** `10⁹ + 7`.

A **set bit** refers to a bit in the binary representation of a number that has a value of 1.

**Example 1:**

- **Input:** m = 5, k = 5, nums = [1,10,100,10000,1000000]
- **Output:** 991600007
- **Explanation:** All permutations of `[0, 1, 2, 3, 4]` are magical sequences, each with an array product of 10¹³.

**Example 2:**

- **Input:** m = 2, k = 2, nums = [5,4,3,2,1]
- **Output:** 170
- **Explanation:** The magical sequences are `[0, 1]`, `[0, 2]`, `[0, 3]`, `[0, 4]`, `[1, 0]`, `[1, 2]`, `[1, 3]`, `[1, 4]`, `[2, 0]`, `[2, 1]`, `[2, 3]`, `[2, 4]`, `[3, 0]`, `[3, 1]`, `[3, 2]`, `[3, 4]`, `[4, 0]`, `[4, 1]`, `[4, 2]`, and `[4, 3]`.

**Example 3:**

- **Input:** m = 1, k = 1, nums = [28]
- **Output:** 28
- **Explanation:** The only magical sequence is `[0]`.

**Constraints:**

- `1 <= k <= m <= 30`
- `1 <= nums.length <= 50`
- `1 <= nums[i] <= 10⁸`



**Hint:**
1. Use Dynamic Programming
2. Let `dp[i][j][mask]` be the state after choosing `i` numbers (indices)
3. The partial sum <code>S = 2<sup>(seq[0])</sup> + 2<sup>(seq[1])</sup> + ... + 2<sup>(seq[i - 1])</sup></code> has produced exactly `j` set bits once you’ve fully propagated any carries
4. The `mask` represents the "window" of lower-order bits from `S` that have not yet been fully processed (i.e. bits that might later create new set bits when additional terms are added)
5. Use combinatorics
6. How many ways are there to permute a sequence of entities where some are repetitive?


**Similar Questions:**
1. [238. Product of Array Except Self](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000238-product-of-array-except-self)
2. [3370. Smallest Number With All Set Bits](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003370-smallest-number-with-all-set-bits)






**Solution:**

We need to find the sum of array products for all magical sequences where:
- Sequence has size `m`
- Each element is a valid index into `nums`
- The binary representation of the sum of powers of 2 has exactly `k` set bits

The solution uses dynamic programming with state tracking for remaining elements, remaining set bits, current index in nums, and carry from binary addition.

Let's implement this solution in PHP: **[3539. Find Sum of Array Product of Magical Sequences](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003539-find-sum-of-array-product-of-magical-sequences/solution.php)**

```php
<?php
const MOD = 1000000007;

/**
 * @param Integer $m
 * @param Integer $k
 * @param Integer[] $nums
 * @return Integer
 */
function magicalSum($m, $k, $nums) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $m
 * @param $k
 * @param $i
 * @param $carry
 * @param $nums
 * @param $mem
 * @param $comb
 * @return int|mixed
 */
private function dp($m, $k, $i, $carry, $nums, &$mem, $comb) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $n
 * @param $k
 * @return array
 */
private function getComb($n, $k) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $x
 * @param $n
 * @return int
 */
private function modPow($x, $n) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $x
 * @return int
 */
private function popcount($x) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo magicalSum(5, 5, [1,10,100,10000,1000000]); // expected 991600007
echo magicalSum(2, 2, [5,4,3,2,1]);               // expected 170
echo magicalSum(1, 1, [28]);                      // expected 28
?>
```

### Explanation:

The solution uses dynamic programming with memoization to count all valid sequences:

1. **State Definition**: `dp(m, k, i, carry)` represents:
   - `m`: remaining numbers to choose
   - `k`: remaining set bits needed
   - `i`: current index in nums array
   - `carry`: carry from binary addition of previous choices

2. **Base Cases**:
   - If we've chosen all `m` numbers, check if remaining carry gives exactly `k` set bits
   - If we've processed all indices or run out of set bits, return 0

3. **Transition**: For each index `i`, we can choose it `count` times (0 to remaining `m`):
   - Calculate contribution: combination count × (nums[i]<sup>count</sup>)
   - Update carry: `newCarry = carry + count`
   - Recursively process remaining indices

4. **Memoization**: Store computed results to avoid redundant calculations

The algorithm efficiently explores all possible sequences while leveraging combinatorial mathematics and dynamic programming to handle the constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://jackaltimer.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**