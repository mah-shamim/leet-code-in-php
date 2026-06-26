3739\. Count Subarrays With Majority Element II

**Difficulty:** Hard

**Topics:** `Senior Staff`, `Array`, `Hash Table`, `Divide and Conquer`, `Segment Tree`, `Merge Sort`, `Prefix Sum`, `Biweekly Contest 169`

You are given an integer array `nums` and an integer `target`.

Return the number of **subarrays[^1]** of `nums` in which `target` is the **majority element**.

The **majority element** of a subarray is the element that appears **strictly more than half** of the times in that subarray.

[^1]: **Subarray:** A subarray is a contiguous non-empty sequence of elements within an array.

**Example 1:**

- **Input:** nums = [1,2,2,3], target = 2
- **Output:** 5
- **Explanation:**
   - Valid subarrays with `target = 2` as the majority element:
     - `nums[1..1] = [2]`
     - `nums[2..2] = [2]`
     - `nums[1..2] = [2,2]`
     - `nums[0..2] = [1,2,2]`
     - `nums[1..3] = [2,2,3]`
   - So there are 5 such subarrays.

**Example 2:**

- **Input:** nums = [1,1,1,1], target = 1
- **Output:** 10
- **Explanation:** All 10 subarrays have 1 as the majority element.

**Example 3:**

- **Input:** nums = [1,2,3], target = 4
- **Output:** 0
- **Explanation:** `target = 4` does not appear in `nums` at all. Therefore, there cannot be any subarray where 4 is the majority element. Hence the answer is 0.

**Constraints:**

- `1 <= nums.length <= 10⁵`
- `1 <= nums[i] <= 10⁹`
- `1 <= target <= 10⁹`


**Hint:**
1. Convert to +1/-1: let `arr[i] = 1` if `nums[i] == target` else `-1`.
2. Build prefix sums: `pref[0]=0`, `pref[k] = pref[k - 1] + arr[k - 1]` for `k=1..n`.
3. Count pairs `(i < j)` with `pref[j] > pref[i]` (these correspond to subarrays where `target` is majority).
4. Use coordinate compression on all `pref` values and a Fenwick tree / ordered map: iterate `k` from `0..n`, query how many previous `pref` are < current, add to `ans`, then update.
5. If `target` never appears return `0`.


**Solution:**

We solved the problem by transforming it into a prefix-sum inversion counting task. The key insight is that for `target` to be a majority in a subarray, the sum of `+1` (for `target`) and `-1` (for others) must be positive, which translates to finding prefix-sum pairs where the later prefix is larger than the earlier one.

## Approach

- Convert `nums` into an array `arr` where `target` becomes `+1` and all other elements become `-1`.
- Build prefix sums `pref[0..n]` where `pref[i]` is the sum of the first `i` elements of `arr`.
- A subarray `(i, j)` (0-based) has `target` as majority iff `pref[j+1] > pref[i]`.
- Thus, the problem reduces to counting pairs `(i, j)` with `i < j` such that `pref[j] > pref[i]`.
- Use coordinate compression on all prefix sums to map them to 1-based indices.
- Iterate through prefix sums in order, query a Fenwick tree for how many previous prefix sums are smaller than the current one, add that count to the answer, then insert the current prefix sum into the Fenwick tree.

Let's implement this solution in PHP: **[3739. Count Subarrays With Majority Element II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003739-count-subarrays-with-majority-element-ii/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @param Integer $target
 * @return Integer
 */
function countMajoritySubarrays(array $nums, int $target): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $bit
 * @param $idx
 * @param $delta
 * @return void
 */
function bitUpdate(&$bit, $idx, $delta): void
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $bit
 * @param $idx
 * @return int|mixed
 */
function bitQuery($bit, $idx): mixed
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * Binary search helper for 0-based index
 *
 * @param $arr
 * @param $target
 * @return int
 */
function binarySearch($arr, $target): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo countMajoritySubarrays([1,2,2,3], 2) .  "\n";      // Output: 5
echo countMajoritySubarrays([1,1,1,1], 1) .  "\n";      // Output: 10
echo countMajoritySubarrays([1,2,3], 4) .  "\n";        // Output: 0
?>
```

### Explanation:

- **Transformation:** We map `target` to `+1` and everything else to `-1`. A subarray's sum equals `(#target - #non-target)`. For target to be majority, this sum must be `> 0`.
- **Prefix sums:** The sum of subarray `(i, j)` is `pref[j+1] - pref[i]`. So condition becomes `pref[j+1] > pref[i]`.
- **Counting pairs:** We iterate over `j` from `0` to `n` (where `pref[j]` is the prefix sum up to index `j-1`), and for each `j`, we count how many previous `i < j` have `pref[i] < pref[j]`.
- **Fenwick tree:** To efficiently count previous prefix sums less than current, we coordinate-compress all prefix sums and use a Fenwick tree (BIT) for dynamic prefix-sum queries.
- **Early exit:** If `target` is not present in `nums`, we return `0` immediately because it can never be a majority.

## Complexity Analysis

- **Time Complexity:** `O(n log n)`
   - `O(n)` to build `arr` and prefix sums.
   - `O(n log n)` for sorting prefix sums (coordinate compression) and `O(n log n)` for Fenwick tree operations (each query and update is `O(log n)`).
- **Space Complexity:** `O(n)`
   - We store prefix sums, compressed indices, and the Fenwick tree, all of size `O(n)`.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**