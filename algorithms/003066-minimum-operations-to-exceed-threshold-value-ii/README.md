3066\. Minimum Operations to Exceed Threshold Value II

**Difficulty:** Medium

**Topics:** `Array`, `Heap (Priority Queue)`, `Simulation`

You are given a **0-indexed** integer array `nums`, and an integer `k`.

In one operation, you will:

- Take the two smallest integers `x` and `y` in `nums`.
- Remove `x` and `y` from `nums`.
- Add `min(x, y) * 2 + max(x, y)` anywhere in the array.

**Note** that you can only apply the described operation if `nums` contains at least two elements.

Return _the **minimum** number of operations needed so that all elements of the array are greater than or equal to `k`_.

**Example 1:**

- **Input:** nums = [2,11,10,1,3], k = 10
- **Output:** 2
- **Explanation:** In the first operation, we remove elements 1 and 2, then add 1 * 2 + 2 to nums. nums becomes equal to [4, 11, 10, 3].
  In the second operation, we remove elements 3 and 4, then add 3 * 2 + 4 to nums. nums becomes equal to [10, 11, 10].
  At this stage, all the elements of nums are greater than or equal to 10 so we can stop.
  It can be shown that 2 is the minimum number of operations needed so that all elements of the array are greater than or equal to 10.

**Example 2:**

- **Input:** nums = [1,1,2,4,9], k = 20
- **Output:** 4
- **Explanation:** After one operation, nums becomes equal to [2, 4, 9, 3].
  After two operations, nums becomes equal to [7, 4, 9].
  After three operations, nums becomes equal to [15, 9].
  After four operations, nums becomes equal to [33].
  At this stage, all the elements of nums are greater than 20 so we can stop.
  It can be shown that 4 is the minimum number of operations needed so that all elements of the array are greater than or equal to 20.



**Constraints:**

- <code>2 <= nums.length <= 2 * 10<sup>5</sup></code>
- <code>1 <= nums[i] <= 10<sup>9</sup></code>
- <code>1 <= k <= 10<sup>9</sup></code>
- The input is generated such that an answer always exists. That is, there exists some sequence of operations after which all elements of the array are greater than or equal to `k`.


**Hint:**
1. Use priority queue to keep track of minimum elements.
2. Remove the minimum two elements, perform the operation, and insert the resulting number into the priority queue.



**Solution:**

We need to determine the minimum number of operations required to ensure all elements in a given array are greater than or equal to a specified threshold value `k`. Each operation involves combining the two smallest elements in the array into a new element using a specific formula and repeating this process until all elements meet the threshold.

### Approach
1. **Use a Min-Heap**: A min-heap (priority queue) is used to efficiently retrieve the smallest elements from the array. This allows us to repeatedly combine the two smallest elements until all elements meet the threshold.
2. **Combine Elements**: In each operation, the two smallest elements are combined using the formula `new_val = 2 * x + y` (where `x` and `y` are the two smallest elements). This new value is then added back to the heap.
3. **Check Threshold**: After each operation, check if the smallest element in the heap meets the threshold `k`. If it does, all subsequent elements will also meet the threshold, so we can stop the process.

Let's implement this solution in PHP: **[3066. Minimum Operations to Exceed Threshold Value II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003066-minimum-operations-to-exceed-threshold-value-ii/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @param Integer $k
 * @return Integer
 */
function minOperations($nums, $k) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example Test Cases
$nums1 = [2, 11, 10, 1, 3];
$k1 = 10;
echo minOperations($nums1, $k1) . "\n"; // Output: 2

$nums2 = [1, 1, 2, 4, 9];
$k2 = 20;
echo minOperations($nums2, $k2) . "\n"; // Output: 4
?>
```

### Explanation:

1. **Heap Initialization**: Convert the input array into a min-heap to efficiently access the smallest elements.
2. **Processing Elements**: Continuously extract the two smallest elements from the heap. If either of these elements is less than `k`, combine them into a new value using the formula and push this new value back into the heap.
3. **Termination Condition**: The loop terminates when the smallest element in the heap meets or exceeds `k`, ensuring all elements in the heap are at least `k`.

This approach ensures that we minimize the number of operations by always combining the smallest elements first, which helps in quickly increasing the values to meet the threshold. The use of a min-heap allows efficient retrieval and insertion operations, making the solution optimal for large input sizes.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**