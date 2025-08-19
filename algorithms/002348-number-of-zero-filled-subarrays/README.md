2348\. Number of Zero-Filled Subarrays

**Difficulty:** Medium

**Topics:** `Array`, `Math`, `Biweekly Contest 83`

Given an integer array `nums`, return _the number of **subarrays** filled with `0`_.

A **subarray** is a contiguous non-empty sequence of elements within an array.

**Example 1:**

- **Input:** nums = [1,3,0,0,2,0,0,4]
- **Output:** 6
- **Explanation:**
  There are 4 occurrences of [0] as a subarray.
  There are 2 occurrences of [0,0] as a subarray.
  There is no occurrence of a subarray with a size more than 2 filled with 0. Therefore, we return 6.

**Example 2:**

- **Input:** nums = [0,0,0,2,0,0]
- **Output:** 9
- **Explanation:**
  There are 5 occurrences of [0] as a subarray.
  There are 3 occurrences of [0,0] as a subarray.
  There is 1 occurrence of [0,0,0] as a subarray.
  There is no occurrence of a subarray with a size more than 3 filled with 0. Therefore, we return 9.

**Example 3:**

- **Input:** nums = [2,10,2019]
- **Output:** 0
- **Explanation:** There is no subarray filled with 0. Therefore, we return 0.

**Constraints:**

- <code>1 <= nums.length <= 10<sup>5</sup></code>
- <code>-10<sup>9</sup> <= nums[i] <= 10<sup>9</sup></code>



**Hint:**
1. For each zero, you can calculate the number of zero-filled subarrays that end on that index, which is the number of consecutive zeros behind the current element + 1.
2. Maintain the number of consecutive zeros behind the current element, count the number of zero-filled subarrays that end on each index, sum it up to get the answer.


**Similar Questions:**
1. [413. Arithmetic Slices](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000413-arithmetic-slices)
2. [2110. Number of Smooth Descent Periods of a Stock](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002110-number-of-smooth-descent-periods-of-a-stock)
3. [2414. Length of the Longest Alphabetical Continuous Substring](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002414-length-of-the-longest-alphabetical-continuous-substring)
4. [2526. Find Consecutive Integers from a Data Stream](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002526-find-consecutive-integers-from-a-data-stream)






**Solution:**

We need to count the number of contiguous subarrays filled with zeros in a given integer array. The key insight here is recognizing that each segment of consecutive zeros contributes a certain number of zero-filled subarrays, which can be calculated using a mathematical formula.

### Approach
1. **Problem Analysis**: The task is to count all contiguous subarrays within the array that consist entirely of zeros. A subarray is defined as a contiguous sequence of elements in the array.
2. **Intuition**: For any segment of consecutive zeros of length `k`, the number of zero-filled subarrays within that segment is given by the formula `k * (k + 1) / 2`. This is because each single zero forms a subarray of length 1, each pair of consecutive zeros forms a subarray of length 2, and so on up to the entire segment of length `k`.
3. **Algorithm Selection**: Traverse the array while keeping track of the current count of consecutive zeros. Whenever a non-zero element is encountered or the end of the array is reached, compute the number of zero-filled subarrays for the current segment using the formula and add it to the result. Reset the count of consecutive zeros whenever a non-zero element is encountered.
4. **Complexity Analysis**: The algorithm processes each element of the array exactly once, resulting in a time complexity of O(n), where n is the length of the array. The space complexity is O(1) as only a few additional variables are used.

Let's implement this solution in PHP: **[2348. Number of Zero-Filled Subarrays](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002348-number-of-zero-filled-subarrays/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function zeroFilledSubarray($nums) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo zeroFilledSubarray([1,3,0,0,2,0,0,4]) . "\n"; // 6
echo zeroFilledSubarray([0,0,0,2,0,0]) . "\n";     // 9
echo zeroFilledSubarray([2,10,2019]) . "\n";       // 0
?>
```

### Explanation:

1. **Initialization**: The function initializes `$total` to accumulate the count of zero-filled subarrays and `$currentCount` to track the length of the current segment of consecutive zeros.
2. **Traversal**: The array is traversed element by element:
    - If the current element is zero, `$currentCount` is incremented.
    - If a non-zero element is encountered, the number of zero-filled subarrays for the current segment (if any) is calculated using the formula `$currentCount * ($currentCount + 1) / 2` and added to `$total`. The `$currentCount` is then reset to zero.
3. **Final Segment Handling**: After the loop, any remaining segment of consecutive zeros at the end of the array is processed similarly to ensure all possible subarrays are counted.
4. **Result**: The accumulated total count of zero-filled subarrays is returned as the result.

This approach efficiently counts all zero-filled subarrays by leveraging contiguous segments of zeros and applying a mathematical formula to each segment, ensuring optimal performance even for large input sizes.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**