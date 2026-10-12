2897\. Apply Operations on Array to Maximize Sum of Squares

**Difficulty:** Hard

**Topics:** `Senior Staff`, `Array`, `Hash Table`, `Greedy`, `Bit Manipulation`, `Weekly Contest 366`

You are given a **0-indexed** integer array nums and a **positive** integer k.

You can do the following operation on the array **any** number of times:

- Choose any two distinct indices `i` and `j` and **simultaneously** update the values of `nums[i]` to `(nums[i] AND nums[j])` and `nums[j]` to `(nums[i] OR nums[j])`. Here, `OR` denotes the bitwise `OR` operation, and `AND` denotes the bitwise `AND` operation.

You have to choose `k` elements from the final array and calculate the sum of their **squares**.

Return _the **maximum** sum of squares you can achieve_.

Since the answer can be very large, return it **modulo** `10⁹ + 7`.

**Example 1:**

- **Input:** nums = [2,6,5,8], k = 2
- **Output:** 261
- **Explanation:** 
  - We can do the following operations on the array:
    - Choose `i = 0` and `j = 3`, then change `nums[0]` to `(2 AND 8) = 0` and `nums[3]` to `(2 OR 8) = 10`. The resulting array is `nums = [0,6,5,10]`.
    - Choose `i = 2` and `j = 3`, then change `nums[2]` to `(5 AND 10) = 0` and `nums[3]` to `(5 OR 10) = 15`. The resulting array is `nums = [0,6,0,15]`.
  - We can choose the elements `15` and `6` from the final array. The sum of squares is `152 + 62 = 261`.
  - It can be shown that this is the maximum value we can get.

**Example 2:**

- **Input:** nums = [4,5,4,7], k = 3
- **Output:** 90
- **Explanation:** 
  - We do not need to apply any operations. 
  - We can choose the elements `7`, `5`, and `4` with a sum of squares: `7² + 5² + 4² = 90`.
  - It can be shown that this is the maximum value we can get.

**Example 3:**

- **Input:** nums = [1], k = 1
- **Output:** 1

**Example 4:**

- **Input:** nums = [1,2,4,8], k = 2
- **Output:** 225

**Example 5:**

- **Input:** nums = [7,7,7], k = 3
- **Output:** 147

**Example 6:**

- **Input:** nums = [1,1,1], k = 2
- **Output:** 2

**Example 7:**

- **Input:** nums = [10,10], k = 2
- **Output:** 200

**Constraints:**

- `1 <= k <= nums.length <= 10⁵`
- `1 <= nums[i] <= 10⁹`


**Hint:**

1. The operation described only transfers some bits from one element to another in their binary representation.
2. To have a maximum sum of squares, it is optimal to greedily make each number as big as possible.


**Similar Questions:**

1. [3022. Minimize OR of Remaining Elements Using Operations](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003022-minimize-or-of-remaining-elements-using-operations)


**Solution:**

We observe that the allowed operation only redistributes bits between numbers; it never changes how many numbers contain a given bit. Therefore, we count the frequency of every bit, then greedily construct the `k` largest possible numbers by assigning each bit to as many of those `k` numbers as possible. Finally, we sum the squares of these `k` numbers modulo `10⁹ + 7`.

## Approach

- Count how many numbers have each bit set, for bits `0` through `30`.
- Build `k` numbers greedily:
    - For each of the `k` positions, create a new value `val = 0`.
    - For every bit `b`, if `cnt[b] > 0`, set that bit in `val` and decrement `cnt[b]`.
    - Add `val * val` to the answer modulo `10⁹ + 7`.
- Return the accumulated answer.

Let's implement this solution in PHP: **[2897. Apply Operations on Array to Maximize Sum of Squares](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002897-apply-operations-on-array-to-maximize-sum-of-squares/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @param Integer $k
 * @return Integer
 */
function maxSum(array $nums, int $k): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo maxSum([2,6,5,8], 2) .  "\n";      // Output: 261
echo maxSum([4,5,4,7], 3) .  "\n";      // Output: 90
echo maxSum([1], 1) .  "\n";            // Output: 1
echo maxSum([1,2,4,8], 2) .  "\n";      // Output: 225
echo maxSum([7,7,7], 3) .  "\n";        // Output: 147
echo maxSum([1,1,1], 2) .  "\n";        // Output: 2
echo maxSum([10,10], 2) .  "\n";        // Output: 200
?>
```

### Explanation:

- The operation `(nums[i] AND nums[j])` and `(nums[i] OR nums[j])` preserves the total number of set bits at every bit position.
    - If both bits are `0` or both are `1`, the counts do not change.
    - If one bit is `1` and the other is `0`, the `1` simply moves from one number to the other.
- To maximize the sum of squares, we want to concentrate bits into the largest possible numbers because squares grow faster for larger values.
- For each bit with frequency `c`, at most `min(c, k)` of the chosen `k` numbers can contain that bit.
- The greedy construction assigns each available bit to the first `min(c, k)` numbers, making the earlier numbers as large as possible.
- This produces the optimal `k` numbers.

## Complexity Analysis

- **Time Complexity:** `O(31 * (n + k))`, which is effectively `O(n + k)` since `31` is constant.
- **Space Complexity:** `O(31)`, which is `O(1)`.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**