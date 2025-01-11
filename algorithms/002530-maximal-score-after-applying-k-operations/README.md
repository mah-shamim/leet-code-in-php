2530\. Maximal Score After Applying K Operations

**Difficulty:** Medium

**Topics:** `Array`, `Greedy`, `Heap (Priority Queue)`

You are given a **0-indexed** integer array `nums` and an integer `k`. You have a **starting score** of `0`.

In one **operation**:

1. choose an index `i` such that `0 <= i < nums.length`,
2. increase your **score** by `nums[i]`, and
3 replace `nums[i]` with `ceil(nums[i] / 3)`.

Return the maximum possible **score** you can attain after applying **exactly** `k` operations.

The ceiling function `ceil(val)` is the least integer greater than or equal to `val`.



**Example 1:**

- **Input:** nums = [10,10,10,10,10], k = 5
- **Output:** 50
- **Explanation:** Apply the operation to each array element exactly once. The final score is 10 + 10 + 10 + 10 + 10 = 50.

**Example 2:**

- **Input:** nums = [1,10,3,3,3], k = 3
- **Output:** 17
- **Explanation:** You can do the following operations:
  - Operation 1: Select i = 1, so nums becomes [1,**4**,3,3,3]. Your score increases by 10.
  - Operation 2: Select i = 1, so nums becomes [1,**2**,3,3,3]. Your score increases by 4.
  - Operation 3: Select i = 2, so nums becomes [1,1,**1**,3,3]. Your score increases by 3.
  - The final score is 10 + 4 + 3 = 17.



**Constraints:**

- <code>1 <= nums.length, k <= 10<sup>5</sup></code>
- <code>1 <= nums[i] <= 10<sup>9</sup></code>

**Hint:**
1. It is always optimal to select the greatest element in the array.
2. Use a heap to query for the maximum in O(log n) time.


**Solution:**

Let's break down the solution for the "Maximal Score After Applying K Operations" problem:

### Approach:

1. **Use a Max Heap**: The problem requires us to maximize the score by selecting the largest available number in `nums` for `k` operations. A Max Heap (priority queue) is ideal here since it allows us to efficiently extract the largest element and then insert updated values.

2. **Extract the Maximum Element**: For each operation, extract the largest element from the heap. This element will be added to the score.

3. **Update the Extracted Element**: After using the largest element, replace it with `ceil(num / 3)` (rounding up). This simulates the reduction in the value of the chosen element as per the problem's requirement.

4. **Insert the Updated Element Back into the Heap**: Insert the updated value back into the heap so that it can be used in subsequent operations if it remains among the largest values.

5. **Repeat for `k` Operations**: Perform this process exactly `k` times to ensure the maximum possible score is achieved after `k` operations.

### Detailed Explanation:

- **Initialization**:
  - `SplMaxHeap` is used to maintain a max-heap (priority queue) to efficiently get the maximum element at each step.
  - `ans` keeps track of the cumulative score.
  - Insert all elements of `nums` into the max heap.

- **Processing Each Operation**:
  - Extract the largest element using `extract()`.
  - Add this value to the `sum`.
  - Calculate the new value of this element as `ceil(t / 3)`. Since PHP `int` division rounds down, we use `(int)($t + 2) / 3` to simulate the ceiling.
  - Insert the updated value back into the heap.

- **Return the Final Score**: After `k` operations, return the accumulated `sum`.

Let's implement this solution in PHP: **[2530. Maximal Score After Applying K Operations](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002530-maximal-score-after-applying-k-operations/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @param Integer $k
 * @return Integer
 */
function maxKelements($nums, $k) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}
?>
```

### Example Walkthrough:

**Example 1**: `nums = [10, 10, 10, 10, 10], k = 5`
- Initial Heap: `[10, 10, 10, 10, 10]`
- Extract 10, score += 10, insert `ceil(10/3) = 4`: New Heap: `[10, 10, 10, 10, 4]`
- Extract 10, score += 10, insert `ceil(10/3) = 4`: New Heap: `[10, 10, 4, 10, 4]`
- Repeat similarly for all elements. The final score will be 50.

**Example 2**: `nums = [1, 10, 3, 3, 3], k = 3`
- Initial Heap: `[10, 3, 3, 3, 1]`
- Extract 10, score += 10, insert `ceil(10/3) = 4`: New Heap: `[4, 3, 3, 3, 1]`
- Extract 4, score += 4, insert `ceil(4/3) = 2`: New Heap: `[3, 3, 3, 2, 1]`
- Extract 3, score += 3, insert `ceil(3/3) = 1`: New Heap: `[3, 3, 2, 1, 1]`
- Final score is 17.

### Complexity:

- **Time Complexity**: `O(k log n)`, where `k` is the number of operations and `n` is the size of the heap. Each extraction and insertion operation on the heap takes `O(log n)` time, and this is done `k` times.
- **Space Complexity**: `O(n)` for storing the elements in the max heap.

This solution efficiently maximizes the score by always choosing the largest available number and managing the decreasing values using a priority queue.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**