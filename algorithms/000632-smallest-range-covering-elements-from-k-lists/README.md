632\. Smallest Range Covering Elements from K Lists

**Difficulty:** Hard

**Topics:** `Array`, `Hash Table`, `Greedy`, `Sliding Window`, `Sorting`, `Heap (Priority Queue)`

You have `k` lists of sorted integers in **non-decreasing order**. Find the **smallest** range that includes at least one number from each of the `k` lists.

We define the range `[a, b]` is smaller than range `[c, d]` if `b - a < d - c` **or** `a < c` if `b - a == d - c`.

**Example 1:**

- **Input:** nums = [[4,10,15,24,26],[0,9,12,20],[5,18,22,30]]
- **Output:** [20,24]
- **Explanation:**
  - List 1: [4, 10, 15, 24,26], 24 is in range [20,24].
  - List 2: [0, 9, 12, 20], 20 is in range [20,24].
  - List 3: [5, 18, 22, 30], 22 is in range [20,24].

**Example 2:**

- **Input:** nums = [[1,2,3],[1,2,3],[1,2,3]]
- **Output:** [1,1]

**Constraints:**

- `nums.length == k`
- `1 <= k <= 3500`
- `1 <= nums[i].length <= 50`
- <code>-10<sup>5</sup> <= nums[i][j] <= 10<sup>5</sup></code>
- `nums[i]` is sorted in **non-decreasing** order.


**Solution:**

We can use a **min-heap** (or priority queue) to track the smallest element from each list while maintaining a sliding window to find the smallest range that includes at least one element from each list.

### Approach

1. **Min-Heap Initialization**: Use a min-heap to store the current elements from each of the `k` lists. Each heap entry will be a tuple containing the value, the index of the list it comes from, and the index of the element in that list.
2. **Max Value Tracking**: Keep track of the maximum value in the current window. This is important because the range is determined by the difference between the smallest element (from the heap) and the current maximum.
3. **Iterate Until End of Lists**: For each iteration:
   - Extract the minimum element from the heap.
   - Update the range if the current range `[min_value, max_value]` is smaller than the previously recorded smallest range.
   - Move to the next element in the list from which the minimum element was taken. Update the max value and add the new element to the heap.
4. **Termination**: The process ends when any list is exhausted.

Let's implement this solution in PHP: **[632. Smallest Range Covering Elements from K Lists](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000632-smallest-range-covering-elements-from-k-lists/solution.php)**

```php
<?php
/**
 * @param Integer[][] $nums
 * @return Integer[]
 */
function smallestRange($nums) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
$nums = [[4, 10, 15, 24, 26], [0, 9, 12, 20], [5, 18, 22, 30]];
$result = smallestRange($nums);
print_r($result); // Output: [20, 24]
?>
```

### Explanation:

1. **Heap Initialization**:
   - The initial heap contains the first element from each list. We also keep track of the maximum element among the first elements.
2. **Processing the Heap**:
   - Extract the minimum element from the heap, and then try to extend the range by adding the next element from the same list (if available).
   - After adding a new element to the heap, update the `maxValue` if the new element is larger.
   - Update the smallest range whenever the difference between the `maxValue` and `minValue` is smaller than the previously recorded range.
3. **Termination**:
   - The loop stops when any list runs out of elements, as we cannot include all lists in the range anymore.

### Complexity Analysis
- **Time Complexity**: `O(n * log k)`, where `n` is the total number of elements across all lists, and `k` is the number of lists. The complexity comes from inserting and removing elements from the heap.
- **Space Complexity**: `O(k)` for storing elements in the heap.

This solution efficiently finds the smallest range that includes at least one number from each of the `k` sorted lists.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**