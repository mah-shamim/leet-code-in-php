2916\. Subarrays Distinct Element Sum of Squares II

**Difficulty:** Hard

**Topics:** `Principal`, `Array`, `Hash Table`, `Binary Indexed Tree`, `Segment Tree`, `Biweekly Contest 116`

You are given a **0-indexed** integer array nums.

The **distinct count** of a subarray of nums is defined as:

- Let `nums[i..j]` be a subarray of `nums` consisting of all the indices from `i` to `j` such that `0 <= i <= j < nums.length`. Then the number of distinct values in `nums[i..j]` is called the distinct count of `nums[i..j]`.

Return _the sum of the **squares** of **distinct counts** of all subarrays of `nums`_.

Since the answer may be very large, return it **modulo** `10⁹ + 7`.

A subarray is a contiguous **non-empty** sequence of elements within an array.

**Example 1:**

- **Input:** nums = [1,2,1]
- **Output:** 15
- **Explanation:** 
  - Six possible subarrays are:
    - [1]: 1 distinct value
    - [2]: 1 distinct value
    - [1]: 1 distinct value
    - [1,2]: 2 distinct values
    - [2,1]: 2 distinct values
    - [1,2,1]: 2 distinct values
  - The sum of the squares of the distinct counts in all subarrays is equal to 1² + 1² + 1² + 2² + 2² + 2² = 15.

**Example 2:**

- **Input:** nums = [2,2]
- **Output:** 3
- **Explanation:** 
  - Three possible subarrays are:
    - [2]: 1 distinct value
    - [2]: 1 distinct value
    - [2,2]: 1 distinct value
  - The sum of the squares of the distinct counts in all subarrays is equal to 12 + 12 + 12 = 3.

**Example 3:**

- **Input:** nums = [1]
- **Output:** 1

**Example 4:**

- **Input:** nums = [1,2,3]
- **Output:** 20

**Example 5:**

- **Input:** nums = [1,1,1]
- **Output:** 6

**Example 7:**

- **Input:** nums = [1,2,1,2]
- **Output:** 28

**Example 8:**

- **Input:** nums = [2,2,2,2]
- **Output:** 10

**Constraints:**

- `1 <= nums.length <= 10⁵`
- `1 <= nums[i] <= 10⁵`


**Hint:**

1. Consider the sum of the count of distinct values of subarrays ending with index `i`, let’s call it `sum`. Now if you need the sum of all subarrays ending with index `i + 1` think how it can be related to `sum` and what extra will be needed to add to this.
2. You can find that extra sum using the segment tree.


**Solution:**

We scan the array by right endpoint `i` and maintain a segment tree over all possible left endpoints `j`. For each `j`, the tree stores the distinct count of `nums[j..i]`. When a new element `nums[i] = x` appears, only left endpoints after the previous occurrence of `x` gain one new distinct value, so we range-add `+1` on `[last[x] + 1, i]`. The segment tree maintains both `sum` and `sum of squares`, so after each update the root’s square-sum gives the total for all subarrays ending at `i`. We accumulate this modulo `1e9 + 7`.

## Approach

- Let `last[x]` be the previous index where `x` appeared before the current index.
- For a fixed right endpoint `i`, define `f(j)` as the distinct count of `nums[j..i]`.
- When processing `nums[i] = x`:
    - If `x` did not appear in `nums[j..i-1]`, then `f(j)` increases by `1`.
    - This happens exactly when `j > last[x]`.
    - So we range-add `+1` to all left endpoints in `[last[x] + 1, i]`.
- Maintain these values in a lazy segment tree.
- Each node stores:
    - `sum`: sum of values in its segment.
    - `sq`: sum of squares of values in its segment.
    - `lazy`: pending range addition.
- After each range update, `sq[1]` is the sum of squares of distinct counts of all subarrays ending at `i`.
- Add `sq[1]` to the answer modulo `1e9 + 7`.
- Update `last[x] = i`.

Let's implement this solution in PHP: **[2916. Subarrays Distinct Element Sum of Squares II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002916-subarrays-distinct-element-sum-of-squares-ii/solution.php)**

```php
<?php
/**
 * @param $sum
 * @param $sq
 * @param $lazy
 * @param $node
 * @param $l
 * @param $r
 * @param $val
 * @return void
 */
function apply(&$sum, &$sq, &$lazy, $node, $l, $r, $val)
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $sum
 * @param $sq
 * @param $lazy
 * @param $node
 * @param $l
 * @param $r
 * @return void
 */
function push(&$sum, &$sq, &$lazy, $node, $l, $r)
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $sum
 * @param $sq
 * @param $lazy
 * @param $node
 * @param $l
 * @param $r
 * @param $ql
 * @param $qr
 * @param $val
 * @return void
 */
function rangeAdd(
    &$sum,
    &$sq,
    &$lazy,
    $node,
    $l,
    $r,
    $ql,
    $qr,
    $val
) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param Integer[] $nums
 * @return Integer
 */
function sumCounts(array $nums): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo sumCounts([1,2,1]) .  "\n";        // Output: 15
echo sumCounts([2,2]) .  "\n";          // Output: 3
echo sumCounts([1]) .  "\n";            // Output: 1
echo sumCounts([1,2,3]) .  "\n";        // Output: 20
echo sumCounts([1,1,1]) .  "\n";        // Output: 6
echo sumCounts([1,2,1,2]) .  "\n";      // Output: 28
echo sumCounts([2,2,2,2]) .  "\n";      // Output: 10
?>
```

### Explanation:

- A range addition of `val` to a segment changes each value `a` into `a + val`.
- Therefore:
    - New `sum = old sum + len * val`
    - New `sq = old sq + 2 * old sum * val + len * val * val`
- The segment tree propagates lazy additions to children only when needed.
- Leaves with index greater than the current right endpoint remain `0`, so the root effectively covers only valid subarrays ending at the current index.
- The final answer is the sum over all right endpoints of the squared distinct counts of all subarrays ending there.

## Complexity Analysis

- **Time Complexity:** `O(n log n)`
    - Each element causes one range update, costing `O(log n)`.
    - Root query after each update is `O(1)`.
- **Space Complexity:** `O(n)`
    - Segment tree arrays use `O(4n)`.
    - The `last` hash map stores at most `n` entries.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**