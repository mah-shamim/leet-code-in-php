3097\. Shortest Subarray With OR at Least K II

**Difficulty:** Medium

**Topics:** `Array`, `Bit Manipulation`, `Sliding Window`

You are given an array `nums` of **non-negative** integers and an integer `k`.

An array is called **special** if the bitwise `OR` of all of its elements is **at least** `k`.

Return _the length of the **shortest special non-empty** subarray[^1] of `nums`, or return `-1` if no special subarray exists._

**Example 1:**

- **Input:** nums = [1,2,3], k = 2
- **Output:** 1
- **Explanation:** The subarray `[3]` has `OR` value of `3`. Hence, we return `1`.

**Example 2:**

- **Input:** nums = [2,1,8], k = 10
- **Output:** 3
- **Explanation:** The subarray `[2,1,8]` has `OR` value of `11`. Hence, we return `3`.


**Example 3:**

- **Input:** nums = [1,2], k = 0
- **Output:** 1
- **Explanation:** The subarray `[1]` has `OR` value of `1`. Hence, we return `1`.


**Constraints:**

- <code>1 <= nums.length <= 2 * 10<sup>5</sup></code>
- <code>0 <= nums[i] <= 10<sup>9</sup></code>
- <code>0 <= k <= 10<sup>9</sup></code>


**Hint:**
1. For each `nums[i]`, we can maintain each subarray’s bitwise `OR` result ending with it.
2. The property of bitwise `OR` is that it never unsets any bits and only sets new bits
3. So the number of different results for each `nums[i]` is at most the number of bits 32.

[^1]: _**Subarray** : A **subarray** is a contiguous **non-empty** sequence of elements within an array._


**Solution:**

We can use a sliding window approach combined with bit manipulation to keep track of the OR of elements in the window.

### Plan:
1. **Sliding Window Approach**: Iterate over the array using two pointers, maintaining a subarray whose OR value is checked.
2. **Bitwise OR**: The OR operation accumulates values. It never reduces the result (i.e., once a bit is set to `1`, it cannot be unset). This means as we extend the window, the OR value only increases or stays the same.
3. **Efficiency**: We can use a deque (double-ended queue) to maintain indices of the subarrays. This allows us to efficiently slide the window while keeping track of the minimum subarray length.

### Steps:
1. Traverse the array, for each element, maintain a running OR.
2. For each element, check if the OR exceeds or equals `k`. If it does, try to shrink the window from the left side.
3. The sliding window should be moved efficiently by keeping track of the OR value in a deque structure to allow constant time sliding and shrinking.

Let's implement this solution in PHP: **[3097. Shortest Subarray With OR at Least K II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003097-shortest-subarray-with-or-at-least-k-ii/solution.php)**

```php
<?php
class Solution {
    const K_MAX_BIT = 30; // Maximum bit position we will check

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function minimumSubarrayLength($nums, $k) {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }

    /**
     * @param $ors
     * @param $num
     * @param $count
     * @return int
     */
    private function orNum($ors, $num, &$count) {
        // Update the ors value and count bits that are set
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }

    /**
     * @param $ors
     * @param $num
     * @param $count
     * @return int
     */
    private function undoOrNum($ors, $num, &$count) {
        // Reverse the update on ors and count bits that are reset
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }
}

// Example usage
$solution = new Solution();
$nums1 = [1, 2, 3];
$k1 = 2;
echo $solution->minimumSubarrayLength($nums1, $k1) . "\n"; // Output: 1

$nums2 = [2, 1, 8];
$k2 = 10;
echo $solution->minimumSubarrayLength($nums2, $k2) . "\n"; // Output: 3

$nums3 = [1, 2];
$k3 = 0;
echo $solution->minimumSubarrayLength($nums3, $k3) . "\n"; // Output: 1
?>
```

### Explanation:

1. **`minimumSubarrayLength` Method**:
   - Initialize `ans` to an impossible high value (`$n + 1`).
   - Use two pointers `l` (left) and `r` (right) to expand and shrink the window.
   - Calculate the OR of the subarray as you expand the window with `orNum` and reduce it with `undoOrNum` when shrinking.
   - Whenever the OR result meets or exceeds `k`, check if the current window size is smaller than `ans`.

2. **`orNum` and `undoOrNum` Methods**:
   - `orNum` method: Adds bits to the cumulative OR by updating the `count` array. If a bit is newly set in the window (meaning `count[i]` becomes `1`), that bit is added to `ors`.
   - `undoOrNum` method: Removes bits from the cumulative OR when sliding the window leftward. If a bit is no longer set in any of the numbers in the window (meaning `count[i]` becomes `0`), that bit is removed from `ors`.

3. **Time Complexity**:
   - The time complexity is O(n) because each index is added and removed from the deque at most once.
   - `n` is the length of the input array.

4**Time Complexity**:
   - The space complexity is O(n) for storing the prefix OR array and the deque.


**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
