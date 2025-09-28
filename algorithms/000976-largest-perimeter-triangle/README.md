976\. Largest Perimeter Triangle

**Difficulty:** Easy

**Topics:** `Array`, `Math`, `Greedy`, `Sorting`, `Weekly Contest 119`

Given an integer array `nums`, return _the largest perimeter of a triangle with a non-zero area, formed from three of these lengths_. If it is impossible to form any triangle of a non-zero area, return `0`.

**Example 1:**

- **Input:** nums = [2,1,2]
- **Output:** 5
- **Explanation:** You can form a triangle with three side lengths: 1, 2, and 2.

**Example 2:**

- **Input:** nums = [1,2,1,10]
- **Output:** 0
- **Explanation:**
  You cannot use the side lengths 1, 1, and 2 to form a triangle.
  You cannot use the side lengths 1, 1, and 10 to form a triangle.
  You cannot use the side lengths 1, 2, and 10 to form a triangle.
  As we cannot use any three side lengths to form a triangle of non-zero area, we return 0.

**Constraints:**

- <code>3 <= nums.length <= 10<sup>4</sup></code>
- <code>1 <= nums[i] <= 10<sup>6</sup></code>



**Similar Questions:**
1. [812. Largest Triangle Area](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000812-largest-triangle-area)






**Solution:**

We need to find the largest perimeter of a triangle with non-zero area using three lengths from the given array. The key insight is that for three lengths to form a triangle, the sum of the two smaller lengths must be greater than the largest length.

### Approach
1. **Sorting**: First, we sort the array in non-decreasing order. This allows us to efficiently check triplets of lengths starting from the largest possible values.
2. **Checking Triplets**: Starting from the end of the sorted array, we check consecutive triplets of lengths. For each triplet (a, b, c) where a ≤ b ≤ c, we check if a + b > c. If this condition holds, these three lengths can form a triangle with the largest possible perimeter starting from the current position.
3. **Early Termination**: By starting from the largest values and moving backwards, the first valid triplet we find will give the largest perimeter. This is because we are checking the largest possible triplets first.

Let's implement this solution in PHP: **[976. Largest Perimeter Triangle](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000976-largest-perimeter-triangle/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function largestPerimeter($nums) {
    rsort($nums);
    for ($i = 0; $i < count($nums) - 2; $i++) {
        if ($nums[$i + 1] + $nums[$i + 2] > $nums[$i]) {
            return $nums[$i] + $nums[$i + 1] + $nums[$i + 2];
        }
    }
    return 0;
}

// Test cases
echo largestPerimeter([2,1,2]) . "\n";     // Output: 5
echo largestPerimeter([1,2,1,10]) . "\n"; // Output: 0
echo largestPerimeter([3,6,2,3]) . "\n";  // Output: 8
?>
```

### Explanation:

1. **Sorting**: The array is sorted in descending order using `rsort($nums)`. This means the largest elements are at the beginning of the array.
2. **Iterating Through Triplets**: We iterate through the array, checking each triplet of consecutive elements. For each triplet, we check if the sum of the two smaller elements (which are the next two elements in the sorted array) is greater than the largest element (the current element in the iteration).
3. **Returning Result**: If a valid triplet is found, we immediately return the sum of its elements as the largest perimeter. If no valid triplet is found after checking all possible triplets, we return 0.

This approach efficiently narrows down the possible triplets by leveraging sorting and a greedy check, ensuring optimal performance with a time complexity dominated by the sorting step, which is O(n log n). The space complexity is O(1) as no additional space is used beyond the input array.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://jackaltimer.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**