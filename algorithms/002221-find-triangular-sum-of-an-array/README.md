2221\. Find Triangular Sum of an Array

**Difficulty:** Medium

**Topics:** `Array`, `Math`, `Simulation`, `Combinatorics`, `Biweekly Contest 75`

You are given a **0-indexed** integer array `nums`, where `nums[i]` is a digit between `0` and `9` (**inclusive**).

The **triangular sum** of `nums` is the value of the only element present in `nums` after the following process terminates:

1. Let `nums` comprise of `n` elements. If `n == 1`, **end** the process. Otherwise, **create** a new **0-indexed** integer array `newNums` of length `n - 1`.
2. For each index `i`, where `0 <= i < n - 1`, **assign** the value of `newNums[i]` as `(nums[i] + nums[i+1]) % 10`, where `%` denotes modulo operator.
3. **Replace** the array `nums` with `newNums`.
4. **Repeat** the entire process starting from step 1.

Return _the triangular sum of `nums`_.

**Example 1:**

![ex1drawio](https://assets.leetcode.com/uploads/2022/02/22/ex1drawio.png)

- **Input:** nums = [1,2,3,4,5]
- **Output:** 8
- **Explanation:** The above diagram depicts the process from which we obtain the triangular sum of the array.

**Example 2:**

- **Input:** nums = [5]
- **Output:** 5
- **Explanation:** Since there is only one element in nums, the triangular sum is the value of that element itself.

**Constraints:**

- `1 <= nums.length <= 1000`
- `0 <= nums[i] <= 9`



**Hint:**
1. Try simulating the entire process.
2. To reduce space, use a temporary array to update nums in every step instead of creating a new array at each step.



**Similar Questions:**
1. [119. Pascal's Triangle II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000119-pascals-triangle-ii)
2. [2243. Calculate Digit Sum of a String](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002243-calculate-digit-sum-of-a-string)
3. [2293. Min Max Game](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002293-min-max-game)






**Solution:**

We need to find the triangular sum of an array by repeatedly reducing the array until only one element remains. Each reduction step involves creating a new array where each element is the sum of two adjacent elements modulo 10.

### Approach
1. **Simulation**: The problem can be solved by simulating the reduction process step-by-step. We start with the original array and repeatedly compute a new array where each element is the sum of the current element and the next element, modulo 10. This process continues until only one element remains.
2. **In-place Update**: To optimize space, we can perform the operations in-place. For each reduction step, we update the array from the start, ensuring that each new element is computed and stored in the position of the original array. This avoids the need for creating new arrays at each step, thus saving memory.

Let's implement this solution in PHP: **[2221. Find Triangular Sum of an Array](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002221-find-triangular-sum-of-an-array/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function triangularSum($nums) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
// Example 1
$nums1 = array(1, 2, 3, 4, 5);
echo "Input: [1,2,3,4,5]\n";
echo "Output: " . triangularSum($nums1) . "\n"; // Expected 8

// Example 2
$nums2 = array(5);
echo "Input: [5]\n";
echo "Output: " . triangularSum($nums2) . "\n"; // Expected 5
?>
```

### Explanation:

1. **Initialization**: The function starts by determining the length of the input array `nums`.
2. **Reduction Loop**: The outer loop continues as long as the effective length of the array (`$n`) is greater than 1. In each iteration, the inner loop computes the new values for the array by summing adjacent elements and taking modulo 10. The result of each pair is stored back in the array at the position of the first element of the pair.
3. **Termination**: Once the effective length of the array reduces to 1, the loop terminates, and the first element of the array (which now contains the triangular sum) is returned.

This approach efficiently computes the triangular sum by leveraging in-place updates, ensuring optimal space usage while maintaining clarity and simplicity in the solution. The time complexity is O(n²) due to the nested loops, which is acceptable given the constraints (array length up to 1000).

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://jackaltimer.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**