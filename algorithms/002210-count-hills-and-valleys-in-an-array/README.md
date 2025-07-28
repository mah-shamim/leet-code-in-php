2210\. Count Hills and Valleys in an Array

**Difficulty:** Easy

**Topics:** `Array`, `Weekly Contest 285`

You are given a **0-indexed** integer array `nums`. An index `i` is part of a **hill** in `nums` if the closest non-equal neighbors of `i` are smaller than `nums[i]`. Similarly, an index `i` is part of a **valley** in `nums` if the closest non-equal neighbors of `i` are larger than `nums[i]`. Adjacent indices `i` and `j` are part of the **same** hill or valley if `nums[i] == nums[j]`.

Note that for an index to be part of a hill or valley, it must have a non-equal neighbor on **both** the left and right of the index.

Return _the number of hills and valleys in `nums`_.

**Example 1:**

- **Input:** nums = [2,4,1,1,6,5]
- **Output:** 3
- **Explanation:**
  At index 0: There is no non-equal neighbor of 2 on the left, so index 0 is neither a hill nor a valley.
  At index 1: The closest non-equal neighbors of 4 are 2 and 1. Since 4 > 2 and 4 > 1, index 1 is a hill.
  At index 2: The closest non-equal neighbors of 1 are 4 and 6. Since 1 < 4 and 1 < 6, index 2 is a valley.
  At index 3: The closest non-equal neighbors of 1 are 4 and 6. Since 1 < 4 and 1 < 6, index 3 is a valley, but note that it is part of the same valley as index 2.
  At index 4: The closest non-equal neighbors of 6 are 1 and 5. Since 6 > 1 and 6 > 5, index 4 is a hill.
  At index 5: There is no non-equal neighbor of 5 on the right, so index 5 is neither a hill nor a valley.
  There are 3 hills and valleys so we return 3.

**Example 2:**

- **Input:** nums = [6,6,5,5,4,1]
- **Output:** 0
- **Explanation:**
  At index 0: There is no non-equal neighbor of 6 on the left, so index 0 is neither a hill nor a valley.
  At index 1: There is no non-equal neighbor of 6 on the left, so index 1 is neither a hill nor a valley.
  At index 2: The closest non-equal neighbors of 5 are 6 and 4. Since 5 < 6 and 5 > 4, index 2 is neither a hill nor a valley.
  At index 3: The closest non-equal neighbors of 5 are 6 and 4. Since 5 < 6 and 5 > 4, index 3 is neither a hill nor a valley.
  At index 4: The closest non-equal neighbors of 4 are 5 and 1. Since 4 < 5 and 4 > 1, index 4 is neither a hill nor a valley.
  At index 5: There is no non-equal neighbor of 1 on the right, so index 5 is neither a hill nor a valley.
  There are 0 hills and valleys so we return 0.

**Constraints:**

- `3 <= nums.length <= 100`
- `1 <= nums[i] <= 100`


**Hint:**
1. For each index, could you find the closest non-equal neighbors?
2. Ensure that adjacent indices that are part of the same hill or valley are not double-counted.


**Similar Questions:**
1. [162. Find Peak Element](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000162-find-peak-element)
2. [896. Monotonic Array](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000896-monotonic-array)
3. [1403. Minimum Subsequence in Non-Increasing Order](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001403-minimum-subsequence-in-non-increasing-order)






**Solution:**

We need to count the number of hills and valleys in an array. A hill is an index where the closest non-equal neighbors on both sides are smaller than the current element. Similarly, a valley is an index where the closest non-equal neighbors on both sides are larger than the current element. Adjacent indices with the same value are considered part of the same hill or valley.

### Approach
1. **Preprocess the Array**: Remove consecutive duplicates from the array. This step groups adjacent indices with the same value into a single segment, as they are considered part of the same hill or valley.
2. **Check for Hills and Valleys**: Traverse the processed array (excluding the first and last elements since they lack neighbors on one side). For each element, check if it is greater than both neighbors (hill) or smaller than both neighbors (valley).
3. **Count Valid Hills and Valleys**: Increment the count for each valid hill or valley encountered during the traversal.

Let's implement this solution in PHP: **[2210. Count Hills and Valleys in an Array](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002210-count-hills-and-valleys-in-an-array/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function countHillValley($nums) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo countHillValley([2,4,1,1,6,5]); // Output: 3
echo countHillValley([6,6,5,5,4,1]); // Output: 0
?>
```

### Explanation:

1. **Preprocessing**: The array is processed to remove consecutive duplicates. For example, `[2, 4, 1, 1, 6, 5]` becomes `[2, 4, 1, 6, 5]`. This step ensures that adjacent indices with the same value are treated as a single segment.
2. **Edge Handling**: If the processed array has fewer than 3 elements, it's impossible to have both left and right neighbors, so the result is 0.
3. **Traversal**: The processed array is traversed from the second element to the second-to-last element. For each element, it checks if the element is either:
    - **Hill**: Greater than both adjacent elements.
    - **Valley**: Smaller than both adjacent elements.
4. **Counting**: Each valid hill or valley increments the count. The final count is returned as the result.

This approach efficiently counts hills and valleys by first simplifying the array to avoid redundant checks on consecutive duplicates, then systematically evaluating each relevant element's neighbors. The solution handles all edge cases and processes the array in linear time.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**