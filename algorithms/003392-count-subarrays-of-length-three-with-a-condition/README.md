3392\. Count Subarrays of Length Three With a Condition

**Difficulty:** Easy

**Topics:** `Array`

Given an integer array `nums`, return the number of subarray[^1] of length 3 such that the sum of the first and third numbers equals _exactly_ half of the second number.

**Example 1:**

- **Input:** nums = [1,2,1,4,1]
- **Output:** 1
- **Explanation:** Only the subarray `[1,4,1]` contains exactly 3 elements where the sum of the first and third numbers equals half the middle number.

**Example 2:**

- **Input:** nums = [1,1,1]
- **Output:** 0
- **Explanation:** `[1,1,1]` is the only subarray of length 3. However, its first and third numbers do not add to half the middle number.



**Constraints:**

- `3 <= nums.length <= 100`
- `-100 <= nums[i] <= 100`


**Hint:**
1. The constraints are small. Consider checking every subarray.

[^1]: **Subarray**: `A subarray is a contiguous non-empty sequence of elements within an array.`

**Solution:**

We need to count the number of subarrays of length 3 where the sum of the first and third elements equals exactly half of the second element.

### Approach
1. **Iterate through Possible Subarrays**: For each starting index from 0 to `n-3` (where `n` is the length of the array), consider the subarray starting at that index with length 3.
2. **Check Middle Element Parity**: For each subarray, first check if the middle element is even. If it is odd, the condition cannot be satisfied and we skip to the next subarray.
3. **Check Sum Condition**: If the middle element is even, compute half of it and check if the sum of the first and third elements of the subarray equals this half value. If it does, increment the count.

Let's implement this solution in PHP: **[3392. Count Subarrays of Length Three With a Condition](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003392-count-subarrays-of-length-three-with-a-condition/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function countSubarrays($nums) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
$nums1 = array(1, 2, 1, 4, 1);
echo countSubarrays($nums1) . "\n"; // Output: 1

$nums2 = array(1, 1, 1);
echo countSubarrays($nums2) . "\n"; // Output: 0
?>
```

### Explanation:

1. **Iteration**: The loop runs from the start of the array to the point where a subarray of length 3 can still be formed. This ensures we check all possible valid subarrays.
2. **Even Check**: The middle element must be even for the sum of the first and third elements to potentially equal half of it. This check quickly skips invalid subarrays.
3. **Sum Check**: By computing half of the middle element and comparing it to the sum of the first and third elements, we efficiently determine if the subarray meets the required condition.

This approach ensures we check each subarray in linear time, making the solution efficient given the problem constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**