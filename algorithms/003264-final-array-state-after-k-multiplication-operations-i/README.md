3264\. Final Array State After K Multiplication Operations I

**Difficulty:** Easy

**Topics:** `Array`, `Math`, `Heap (Priority Queue)`, `Simulation`

You are given an integer array `nums`, an integer `k`, and an integer `multiplier`.

You need to perform `k` operations on `nums`. In each operation:

- Find the minimum value `x` in `nums`. If there are multiple occurrences of the minimum value, select the one that appears **first**.
- Replace the selected minimum value `x` with `x * multiplier`.

Return _an integer array denoting the final state of `nums` after performing all `k` operations_.

**Example 1:**

- **Input:** nums = [2,1,3,5,6], k = 5, multiplier = 2
- **Output:** [8,4,6,5,6]
- **Explanation:**

  | Operation         | Result          |
  |-------------------|-----------------|
  | After operation 1 | [2, 2, 3, 5, 6] |
  | After operation 2 | [4, 2, 3, 5, 6] |
  | After operation 3 | [4, 4, 3, 5, 6] |
  | After operation 4 | [4, 4, 6, 5, 6] |
  | After operation 5 | [8, 4, 6, 5, 6] |


**Example 2:**

- **Input:** nums = [1,2], k = 3, multiplier = 4
- **Output:** [16,8]
- **Explanation:**

  | Operation         | Result          |
    |-------------------|-----------------|
  | After operation 1 | [2, 2, 3, 5, 6] |
  | After operation 2 | [4, 2, 3, 5, 6] |
  | After operation 3 | [4, 4, 3, 5, 6] |
  | After operation 4 | [4, 4, 6, 5, 6] |
  | After operation 5 | [8, 4, 6, 5, 6] |



**Constraints:**

- `1 <= nums.length <= 100`
- `1 <= nums[i] <= 100`
- `1 <= k <= 10`
- `1 <= multiplier <= 5`


**Hint:**
1. Maintain sorted pairs `(nums[index], index)` in a priority queue.
2. Simulate the operation `k` times.



**Solution:**

We need to implement the operations as described in the problem statement. The key steps are to find the minimum value in the array, replace it with the value multiplied by the given multiplier, and then repeat this process `k` times.

Given that we need to select the first occurrence of the minimum value and replace it, we can approach this by keeping track of the index of the minimum value during each operation. The PHP implementation will use a priority queue (min-heap) to efficiently retrieve and update the minimum value during each operation.

Let's implement this solution in PHP: **[3264. Final Array State After K Multiplication Operations I](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003264-final-array-state-after-k-multiplication-operations-i/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @param Integer $k
 * @param Integer $multiplier
 * @return Integer[]
 */
function finalArrayState($nums, $k, $multiplier) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test Case 1
$nums1 = [2, 1, 3, 5, 6];
$k1 = 5;
$multiplier1 = 2;
$result1 = finalArrayState($nums1, $k1, $multiplier1);
echo "Output: [" . implode(", ", $result1) . "]\n";

// Test Case 2
$nums2 = [1, 2];
$k2 = 3;
$multiplier2 = 4;
$result2 = finalArrayState($nums2, $k2, $multiplier2);
echo "Output: [" . implode(", ", $result2) . "]\n";
?>
```

### Explanation:


1. **Initialization**: Loop `k` times since you need to perform `k` operations.
2. **Find Minimum Value**:
   - Iterate over the array `nums` to find the smallest value and its **first occurrence index**.
3. **Multiply Minimum Value**:
   - Replace the value at the identified index with the product of the current value and `multiplier`.
4. **Repeat**:
   - Repeat the above steps for `k` iterations.
5. **Return the Final Array**:
   - Return the modified array after all operations.

### Test Output

For the provided test cases:

#### Test Case 1:
Input:
```php
$nums = [2, 1, 3, 5, 6];
$k = 5;
$multiplier = 2;
```
Output:
```text
Output: [8, 4, 6, 5, 6]
```

#### Test Case 2:
Input:
```php
$nums = [1, 2];
$k = 3;
$multiplier = 4;
```
Output:
```text
Output: [16, 8]
```

### Complexity

1. **Time Complexity**:
   - For each of the `k` operations, finding the minimum value in the array requires `O(n)`.
   - Total: _**O(k x n)**_, where _**n**_ is the size of the array.

2. **Space Complexity**:
   - The solution uses _**O(1)**_ extra space.

This solution adheres to the constraints and provides the expected results for all test cases.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
