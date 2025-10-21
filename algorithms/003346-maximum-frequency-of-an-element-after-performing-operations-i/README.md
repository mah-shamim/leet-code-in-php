3346\. Maximum Frequency of an Element After Performing Operations I

**Difficulty:** Medium

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
    - Adding 0 to `nums[1]`. `nums` becomes `[1, 4, 5]`.
    - Adding -1 to `nums[2]`. `nums` becomes `[1, 4, 4]`.


**Example 2:**

- **Input:** nums = [5,11,20,20], k = 5, numOperations = 1
- **Output:** 2
- **Explanation:** We can achieve a maximum frequency of two by:
  - Adding 0 to `nums[1]`.


**Example 3:**

- **Input:** nums = [88,53], k = 27, numOperations = 2
- **Output:** 2


**Example 4:**

- **Input:** nums = [2,70,73], k = 39, numOperations = 2
- **Output:** 2


**Example 5:**

- **Input:** nums = [58,80,5], k = 58, numOperations = 2
- **Output:** 3


**Example 6:**

- **Input:** nums = [2,49], k = 97, numOperations = 0
- **Output:** 1

**Constraints:**

- `1 <= nums.length <= 10⁵`
- `1 <= nums[i] <= 10⁵`
- `0 <= k <= 10⁵`
- `0 <= numOperations <= nums.length`



**Hint:**
1. Sort the array and try each value in range as a candidate.



**Similar Questions:**
1. [1838. Frequency of the Most Frequent Element](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001838-frequency-of-the-most-frequent-element)
2. [3005. Count Elements With Maximum Frequency](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003005-count-elements-with-maximum-frequency)


[^1]: **Frequency**: The **frequency** of an element `x` is the number of times it occurs in the array.



**Solution:**

We need to find the maximum frequency of any element after performing operations where we can add values in the range `[-k, k]` to distinct elements.

## Approach

The key insight is that for any target value `x`, the number of elements that can be transformed to `x` is:
- Elements already equal to `x`
- Plus elements within range `[x-k, x+k]` that can be transformed to `x`
- But limited by the number of operations available

The solution works by:
1. Finding the range of possible target values (from `minV-k` to `maxV+k`)
2. Using a difference array to efficiently count how many elements can reach each possible target
3. For each target value, calculating the maximum possible frequency considering both the elements that can reach it and the operations available


Let's implement this solution in PHP: **[3346. Maximum Frequency of an Element After Performing Operations I](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003346-maximum-frequency-of-an-element-after-performing-operations-i/solution.php)**

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

// Test cases
$nums1 = [1, 4, 5];
$k1 = 1;
$numOperations1 = 2;
echo "Output 1: " . maxFrequency($nums1, $k1, $numOperations1) . "\n"; // Expected: 2

$nums2 = [5, 11, 20, 20];
$k2 = 5;
$numOperations2 = 1;
echo "Output 2: " . maxFrequency($nums2, $k2, $numOperations2) . "\n"; // Expected: 2

// Example 3
$nums = [88, 53];
$k = 27;
$numOperations = 2;
echo "Output: " . maxFrequency($nums, $k, $numOperations) . "\n"; // Expected: 2

// Example 4
$nums = [2,70,73];
$k = 39;
$numOperations = 2;
echo "Output: " . maxFrequency($nums, $k, $numOperations) . "\n"; // Expected: 2

// Example 5
$nums = [58,80,5];
$k = 58;
$numOperations = 3;
echo "Output: " . maxFrequency($nums, $k, $numOperations) . "\n"; // Expected: 3

// Example 6
$nums = [2,49];
$k = 58;
$numOperations = 0;
echo "Output: " . maxFrequency($nums, $k, $numOperations) . "\n"; // Expected: 1
?>
```

### Explanation:

1. **Range Calculation**: We determine the range of possible target values by considering the minimum and maximum values in the array, extended by `±k`.

2. **Difference Array**: We use a difference array technique to efficiently mark ranges. For each element `v`, it can contribute to all target values in `[v-k, v+k]`.

3. **Exact Count**: We also track how many elements are exactly equal to each possible target value.

4. **Frequency Calculation**: For each target value `x`, the maximum frequency is the minimum of:
    - Number of elements that can reach `x` (coverage)
    - Number of exact matches at `x` plus available operations

5. **Result**: We return the maximum frequency found across all possible target values.

## Complexity Analysis

- **Time Complexity**: O(n + range), where n is the length of `nums` and range is `(maxV - minV) + 2*k + 1`
- **Space Complexity**: O(range) for the difference and exact arrays

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://jackaltimer.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://www.buymeacoffee.com/assets/img/custom_images/orange_img.png" alt="Buy Me A Coffee" style="height: 41px !important;width: 174px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**