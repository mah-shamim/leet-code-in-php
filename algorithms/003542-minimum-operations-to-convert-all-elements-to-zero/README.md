3542\. Minimum Operations to Convert All Elements to Zero

**Difficulty:** Medium

**Topics:** `Array`, `Hash Table`, `Stack`, `Greedy`, `Monotonic Stack`, `Biweekly Contest 156`

You are given an array `nums` of size `n`, consisting of **non-negative** integers. 
Your task is to apply some (possibly zero) operations on the array so that **all** elements become 0.

In one operation, you can select a subarray[^1] `[i, j]` (where `0 <= i <= j < n`) and set all occurrences of the **minimum non-negative** integer in that subarray to 0.

Return _the **minimum** number of operations required to make all elements in the array 0_.

**Example 1:**

- **Input:** nums = [0,2]
- **Output:** 1
- **Explanation:**
  - Select the subarray `[1,1]` (which is `[2]`), where the minimum non-negative integer is `2`. Setting all occurrences of `2` to `0` results in `[0,0]`.
  - Thus, the minimum number of operations required is `1`.


**Example 2:**

- **Input:** nums = [3,1,2,1]
- **Output:** 3
- **Explanation:**
  - Select subarray `[1,3]` (which is `[1,2,1]`), where the minimum non-negative integer is `1`. Setting all occurrences of `1` to `0` results in `[3,0,2,0]`.
  - Select subarray `[2,2]` (which is `[2]`), where the minimum non-negative integer is `2`. Setting all occurrences of `2` to `0` results in `[3,0,0,0]`.
  - Select subarray `[0,0]` (which is `[3]`), where the minimum non-negative integer is `3`. Setting all occurrences of `3` to `0` results in `[0,0,0,0]`.
  - Thus, the minimum number of operations required is `3`.


**Example 3:**

- **Input:** nums = [1,2,1,2,1,2]
- **Output:** 4
- **Explanation:**
  - Select subarray `[0,5]` (which is `[1,2,1,2,1,2]`), where the minimum non-negative integer is `1`. Setting all occurrences of `1` to `0` results in `[0,2,0,2,0,2]`.
  - Select subarray `[1,1]` (which is `[2]`), where the minimum non-negative integer is `2`. Setting all occurrences of `2` to `0` results in `[0,0,0,2,0,2]`.
  - Select subarray `[3,3]` (which is `[2]`), where the minimum non-negative integer is `2`. Setting all occurrences of `2` to `0` results in `[0,0,0,0,0,2]`.
  - Select subarray `[5,5]` (which is `[2]`), where the minimum non-negative integer is `2`. Setting all occurrences of `2` to `0` results in `[0,0,0,0,0,0]`.
  - Thus, the minimum number of operations required is `4`.


**Example 4:**

- **Input:** nums = [7,2,0,4,2]
- **Output:** 4


**Constraints:**

- `1 <= n == nums.length <= 10⁵`
- `0 <= nums[i] <= 10⁵`



**Hint:**
1. Process the values in nums from smallest to largest (excluding `0`).
2. For each target value `v`, identify its maximal contiguous segments (subarrays where `nums[i] == v`); each segment can be zeroed out in one operation.
3. After setting those segments to zero, dynamically update the remaining array and repeat with the next value.


[^1]: **Subarray:** A **subarray** is a contiguous sequence of elements within an array.



**Solution:**

We want to find the **minimum number of operations** to make all elements in the array `nums` equal to zero.
The key observation is that we only need to **count the number of increasing “steps”** in the array when we move from left to right.

### Approach:

* In each operation, we can select a subarray and make the **minimum non-zero** element in it zero.
* So, every time the array **increases to a new positive height**, we need a **new operation** to handle that value later.
* When the array **decreases or remains the same**, we don’t need to increment the operation count, because smaller values (or zeros) can be handled in the same or earlier operations.

Thus, we can use a **monotonic stack** to track the increasing sequence of numbers:

* Keep popping from the stack while the top of the stack is **greater than the current number** — this means we’ve returned to a lower or equal height.
* If the current number is **greater than the last number in the stack**, it indicates a new “step up,” requiring a **new operation**.
* Push this number to the stack.
* The final count of such “step-ups” gives the **minimum number of operations**.

Let's implement this solution in PHP: **[3542. Minimum Operations to Convert All Elements to Zero](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003542-minimum-operations-to-convert-all-elements-to-zero/solution.php)**

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

// Test cases
$nums1 = [0, 2];
$nums2 = [3, 1, 2, 1];
$nums3 = [1, 2, 1, 2, 1, 2];

echo minOperations($nums1) . "\n"; // Output: 1
echo minOperations($nums2) . "\n"; // Output: 3
echo minOperations($nums3) . "\n"; // Output: 4
?>
```

### Explanation:

1. **Pop larger elements:**
   - While the top of the stack is greater than the current number, we remove it.
   - This means we’ve gone down to a smaller or equal value, so higher values are no longer relevant.

2. **Count new increases:**
   - If the current number is greater than the top of the stack, it indicates a new “increase” or a new unique positive value that will eventually need to be zeroed out in its own operation.
   - Therefore, we increment the operation count and push the current number onto the stack.

## Time and Space Complexity

- **Time Complexity:** `O(n)`
  - Each element is pushed and popped at most once from the stack.

- **Space Complexity:** `O(n)`
  - In the worst case (strictly increasing array), the stack may hold all elements.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**