2163\. Minimum Difference in Sums After Removal of Elements

**Difficulty:** Hard

**Topics:** `Array`, `Dynamic Programming`, `Heap (Priority Queue)`

You are given a **0-indexed** integer array `nums` consisting of `3 * n` elements.

You are allowed to remove any **subsequence** of elements of size **exactly** `n` from `nums`. The remaining `2 * n` elements will be divided into two **equal** parts:

- The first `n` elements belonging to the first part and their sum is <code>sum<sub>first</sub></code></code>.
- The next `n` elements belonging to the second part and their sum is <code>sum<sub>second</sub></code></code>.

The **difference in sums** of the two parts is denoted as <code>sum<sub>first</sub> - sum<sub>second</sub></code></code>.

- For example, if <code>sum<sub>first</sub></code> = 3</code> and <code>sum<sub>second</sub></code> = 2</code>, their difference is `1`.
- Similarly, if <code>sum<sub>first</sub></code> = 2</code> and <code>sum<sub>second</sub></code> = 3</code>, their difference is `-1`.

Return _the **minimum difference** possible between the sums of the two parts after the removal of `n` elements_.


**Example 1:**

- **Input:** nums = [3,1,2]
- **Output:** -1
- **Explanation:** 
  - Here, nums has 3 elements, so n = 1.
  - Thus we have to remove 1 element from nums and divide the array into two equal parts.
  - If we remove nums[0] = 3, the array will be [1,2]. The difference in sums of the two parts will be 1 - 2 = -1.
  - If we remove nums[1] = 1, the array will be [3,2]. The difference in sums of the two parts will be 3 - 2 = 1.
  - If we remove nums[2] = 2, the array will be [3,1]. The difference in sums of the two parts will be 3 - 1 = 2.
  - The minimum difference between sums of the two parts is min(-1,1,2) = -1.

**Example 2:**

- **Input:** nums = [7,9,5,8,1,3]
- **Output:** 1
- **Explanation:** Here n = 2. So we must remove 2 elements and divide the remaining array into two parts containing two elements each.
  If we remove nums[2] = 5 and nums[3] = 8, the resultant array will be [7,9,1,3]. The difference in sums will be (7+9) - (1+3) = 12.
  To obtain the minimum difference, we should remove nums[1] = 9 and nums[4] = 1. The resultant array becomes [7,5,8,3]. The difference in sums of the two parts is (7+5) - (8+3) = 1.
  It can be shown that it is not possible to obtain a difference smaller than 1.

**Constraints:**

- `nums.length == 3 * n`
- <code>1 <= n <= 10<sup>5</sup></code>
- <code>1 <= nums[i] <= 10<sup>5</sup></code>


**Hint:**
1. The lowest possible difference can be obtained when the sum of the first n elements in the resultant array is minimum, and the sum of the next n elements is maximum.
2. For every index i, think about how you can find the minimum possible sum of n elements with indices lesser or equal to i, if possible.
3. Similarly, for every index i, try to find the maximum possible sum of n elements with indices greater or equal to i, if possible.
4. Now for all indices, check if we can consider it as the partitioning index and hence find the answer.


**Similar Questions:**
1. [238. Product of Array Except Self](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000238-product-of-array-except-self)
2. [2099. Find Subsequence of Length K With the Largest Sum](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002099-find-subsequence-of-length-k-with-the-largest-sum)
3. [3469. Find Minimum Cost to Remove Array Elements](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003469-find-minimum-cost-to-remove-array-elements)






**Solution:**

We need to find the minimum difference between the sums of two equal parts of an array after removing exactly `n` elements from the original array of size `3n`. The remaining `2n` elements are divided into two parts: the first `n` elements and the next `n` elements. The difference is calculated as the sum of the first part minus the sum of the second part.

### Approach
1. **Problem Analysis**: The problem requires us to remove any `n` elements from the array such that the remaining elements are split into two parts of equal size. The goal is to minimize the difference between the sums of these two parts. The key insight is that the first part must consist of the smallest `n` elements from the left segment of the array, and the second part must consist of the largest `n` elements from the right segment. This ensures the difference `(sum of first part - sum of second part)` is minimized.

2. **Intuition**: For each possible split point `k` (from `n` to `2n`), we consider the left segment `[0, k-1]` and the right segment `[k, 3n-1]`. From the left segment, we select the smallest `n` elements to minimize their sum. From the right segment, we select the largest `n` elements to maximize their sum. The difference between these sums gives a candidate for the minimum difference. We evaluate all possible split points to find the overall minimum difference.

3. **Algorithm Selection**:
    - **Left Segment Processing**: Use a max-heap to keep track of the smallest `n` elements in the left segment. As we iterate from `n` to `2n`, we add new elements to the heap and remove the largest element to maintain only `n` smallest elements.
    - **Right Segment Processing**: Use a min-heap to keep track of the largest `n` elements in the right segment. As we iterate from `2n` down to `n`, we add new elements to the heap and remove the smallest element to maintain only `n` largest elements.
    - **Difference Calculation**: For each split point `k`, compute the difference between the sum of the left segment and the sum of the right segment. Track the minimum difference encountered.

4. **Complexity Analysis**:
    - **Time Complexity**: The algorithm processes each element once for both left and right segments, with heap operations taking `O(log n)` time per element. Thus, the overall time complexity is `O(n log n)`.
    - **Space Complexity**: The algorithm uses two heaps of size `O(n)` and arrays to store intermediate sums, resulting in `O(n)` space complexity.

Let's implement this solution in PHP: **[2163. Minimum Difference in Sums After Removal of Elements](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002163-minimum-difference-in-sums-after-removal-of-elements/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function minimumDifference($nums) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
print minimumDifference([3, 1, 2]) . "\n"; // Output: -1
print minimumDifference([7, 9, 5, 8, 1, 3]) . "\n"; // Output: 1
?>
```

### Explanation:

1. **Initialization**: The array size is `3n`. We initialize two arrays, `left` and `right`, to store sums of selected elements for possible split points.
2. **Left Segment Processing**:
    - **Initial Setup**: The first `n` elements are added to a max-heap, and their sum is stored as `left[n]`.
    - **Iteration**: For each subsequent index `k` from `n+1` to `2n`, add the current element to the heap, update the sum, and remove the largest element to maintain `n` smallest elements. Store the updated sum in `left[k]`.
3. **Right Segment Processing**:
    - **Initial Setup**: The last `n` elements are added to a min-heap, and their sum is stored as `right[2n]`.
    - **Iteration**: For each index `k` from `2n-1` down to `n`, add the current element to the heap, update the sum, and remove the smallest element to maintain `n` largest elements. Store the updated sum in `right[k]`.
4. **Difference Calculation**: For each split point `k` from `n` to `2n`, compute the difference between `left[k]` and `right[k]` and track the minimum difference encountered.
5. **Result**: The minimum difference found is returned as the solution.

This approach efficiently processes the array using heaps to maintain optimal elements for each segment, ensuring the solution is both optimal and computationally feasible.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**