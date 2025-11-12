2654\. Minimum Number of Operations to Make All Array Elements Equal to 1

**Difficulty:** Medium

**Topics:** `Array`, `Math`, `Number Theory`, `Weekly Contest 342`

You are given a **0-indexed** array `nums` consisting of **positive** integers. You can do the following operation on the array **any** number of times:

- Select an index `i` such that `0 <= i < n - 1` and replace either of `nums[i]` or `nums[i+1]` with their gcd value.

Return _the **minimum** number of operations to make all elements of `nums` equal to `1`_. If it is impossible, return `-1`.

The gcd of two integers is the greatest common divisor of the two integers.

**Example 1:**

- **Input:** nums = [2,6,3,4]
- **Output:** 4
- **Explanation:** We can do the following operations:
  - Choose index i = 2 and replace nums[2] with gcd(3,4) = 1. Now we have nums = [2,6,1,4].
  - Choose index i = 1 and replace nums[1] with gcd(6,1) = 1. Now we have nums = [2,1,1,4].
  - Choose index i = 0 and replace nums[0] with gcd(2,1) = 1. Now we have nums = [1,1,1,4].
  - Choose index i = 2 and replace nums[3] with gcd(1,4) = 1. Now we have nums = [1,1,1,1].

**Example 2:**

- **Input:** nums = [2,10,6,14]
- **Output:** -1
- **Explanation:** It can be shown that it is impossible to make all the elements equal to 1.

**Constraints:**

- `2 <= nums.length <= 50`
- `1 <= nums[i] <= 10⁶`



**Hint:**
1. Note that if you have at least one occurrence of 1 in the array, then you can make all the other elements equal to 1 with one operation each.
2. Try finding the shortest subarray with a gcd equal to 1.






**Solution:**

We need to find the minimum number of operations to make all array elements equal to 1.

### Approach:

1. **If there's already at least one 1 in the array**: I can spread the 1 to adjacent elements, so the answer would be `n - count_of_ones`.

2. **If there's no 1 in the array**: I need to first create a 1, then spread it. To create a 1, I need to find the smallest subarray whose GCD is 1. The number of operations to create a 1 from a subarray of length `k` is `k-1`, then I need `n-1` more operations to spread it to all elements.

Let's implement this solution in PHP: **[2654. Minimum Number of Operations to Make All Array Elements Equal to 1](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002654-minimum-number-of-operations-to-make-all-array-elements-equal-to-1/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function minOperations($nums) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * Helper function to calculate GCD
 *
 * @param $a
 * @param $b
 * @return int|mixed
 */
function gcd($a, $b) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
$nums1 = [2, 6, 3, 4];
$nums2 = [2, 10, 6, 14];

echo "Input: [2,6,3,4] => Output: " . minOperations($nums1) . PHP_EOL;
echo "Input: [2,10,6,14] => Output: " . minOperations($nums2) . PHP_EOL;
?>
```

### Explanation:

1. **Count 1s**: If there's at least one 1, we can convert each non-1 element with one operation each.

2. **Find minimum subarray with GCD = 1**: We check all possible subarrays to find the shortest one whose GCD equals 1. This represents the minimum operations needed to create our first 1.

3. **Calculate total operations**:
   - `(minLength - 1)` operations to create the first 1
   - `(n - 1)` operations to spread it to all other elements

**Time Complexity**: O(n² * log(max(nums))) - We check O(n²) subarrays and calculate GCD for each.

**Space Complexity**: O(1) - We only use a constant amount of extra space.

Let's test with the examples:

- **Example 1**: `[2,6,3,4]`
   - No 1s initially
   - Shortest subarray with GCD = 1 is `[3,4]` (length 2)
   - Operations = `(2-1) + (4-1) = 1 + 3 = 4`

- **Example 2**: `[2,10,6,14]`
   - No subarray has GCD = 1, so return `-1`

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**