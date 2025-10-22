3347\. Maximum Frequency of an Element After Performing Operations II

**Difficulty:** Hard

**Topics:** `Array`, `Binary Search`, `Sliding Window`, `Sorting`, `Prefix Sum`, `Biweekly Contest 143`

You are given an integer array `nums` and two integers `k` and `numOperations`.

You must perform an **operation** `numOperations` times on `nums`, where in each operation you:

- Select an index `i` that was **not** selected in any previous operations.
- Add an integer in the range `[-k, k]` to `nums[i]`.

Return _the **maximum** possible frequency[^1] of any element in `nums` after performing the **operations**_.

**Example 1:**

- **Input:** nums = [1,4,5], k = 1, numOperations = 2
- **Output:** 2
- **Explanation:** We can achieve a maximum frequency of two by:
  - Adding 0 to `nums[1]`, after which `nums` becomes `[1, 4, 5]`.
  - Adding -1 to `nums[2]`, after which `nums` becomes `[1, 4, 4]`.


**Example 2:**

- **Input:** nums = [5,11,20,20], k = 5, numOperations = 1
- **Output:** 2
- **Explanation:** We can achieve a maximum frequency of two by:
  - Adding 0 to nums[1].


**Example 3:**

- **Input:** nums = [5,64], k = 42, numOperations = 2
- **Output:** 2


**Example 4:**

- **Input:** nums = [42,11,52], k = 96, numOperations = `2`
- **Output:** 2


**Example 5:**

- **Input:** nums = [999999997,999999999,999999999], k = 999999999, numOperations = 2
- **Output:** 3

**Constraints:**

- `1 <= nums.length <= 10⁵`
- `1 <= nums[i] <= 10⁹`
- `0 <= k <= 10⁹`
- `0 <= numOperations <= nums.length`



**Hint:**
1. The optimal values to check are `nums[i] - k`, `nums[i]`, and `nums[i] + k`.


[^1]: **Frequency:** The **frequency** of an element `x` is the number of times it occurs in the array.

**Similar Questions:**
1. [1838. Frequency of the Most Frequent Element](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001838-frequency-of-the-most-frequent-element)
2. [3005. Count Elements With Maximum Frequency](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003005-count-elements-with-maximum-frequency)




**Solution:**

We need to find the maximum frequency of any element after performing operations where we can modify elements by adding values in the range `[-k, k]`.

### Approach:

1. Sort the input array `nums`.
2. Generate all possible **candidate target values** — `nums[i] - k`, `nums[i]`, and `nums[i] + k`.
3. For each candidate target `T`:

   * Find how many elements fall inside `[T - k, T + k]` using binary search.
   * Count how many elements are already equal to `T`.
4. Compute the possible frequency as:
   ```
   possibleFrequency = equal + min(numOperations, inRange - equal)
   
   ```
5. Keep track of the **maximum** possible frequency among all candidates.

Let's implement this solution in PHP: **[3347. Maximum Frequency of an Element After Performing Operations II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003347-maximum-frequency-of-an-element-after-performing-operations-ii/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @param Integer $k
 * @param Integer $numOperations
 * @return Integer
 */
function maxFrequency($nums, $k, $numOperations) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * Find first index >= target
 *
 * @param array $arr
 * @param int $target
 * @return int
 */
function lower_bound(array $arr, int $target): int {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * Find first index > target
 *
 * @param array $arr
 * @param int $target
 * @return int
 */
function upper_bound(array $arr, int $target): int {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo maxFrequency([1,4,5], 1, 2) . PHP_EOL; // expected 2
echo maxFrequency([5,11,20,20], 5, 1) . PHP_EOL; // expected 2
echo maxFrequency([5,64], 42, 2) . PHP_EOL; // expected 2
echo maxFrequency([42,11,52], 96, 1) . PHP_EOL; // expected 2
echo maxFrequency([999999997,999999999,999999999], 999999999, 2) . PHP_EOL; // expected 3
?>
```

### Explanation:

* Each element can be adjusted within a range of `[nums[i] - k, nums[i] + k]`.
* The goal is to make as many elements as possible equal to one target number `T`.
* The **best targets** occur at the **boundary points** of these ranges (`nums[i] ± k`).
* Sorting allows efficient range lookup with binary search.
* For each target, count how many numbers can be changed to match it.
* Since only `numOperations` elements can be modified, take the minimum of those available.
* The answer is the **largest possible frequency** achievable under these constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://jackaltimer.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://www.buymeacoffee.com/assets/img/custom_images/orange_img.png" alt="Buy Me A Coffee" style="height: 41px !important;width: 174px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**