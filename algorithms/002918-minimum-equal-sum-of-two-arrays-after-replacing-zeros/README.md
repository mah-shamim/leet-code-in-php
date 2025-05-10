2918\. Minimum Equal Sum of Two Arrays After Replacing Zeros

**Difficulty:** Medium

**Topics:** `Array`, `Greedy`

You are given two arrays `nums1` and `nums2` consisting of positive integers.

You have to replace **all** the `0`'s in both arrays with **strictly** positive integers such that the sum of elements of both arrays becomes **equal**.

Return _the **minimum** equal sum you can obtain, or `-1` if it is impossible_.

**Example 1:**

- **Input:** nums1 = [3,2,0,1,0], nums2 = [6,5,0]
- **Output:** 12
- **Explanation:** We can replace 0's in the following way:
  - Replace the two 0's in nums1 with the values 2 and 4. The resulting array is nums1 = [3,2,2,1,4].
  - Replace the 0 in nums2 with the value 1. The resulting array is nums2 = [6,5,1].
    Both arrays have an equal sum of 12. It can be shown that it is the minimum sum we can obtain.

**Example 2:**nums1 = [2,0,2,0], nums2 = [1,4]

- **Input:** nums1 = [2,0,2,0], nums2 = [1,4]
- **Output:** -1
- **Explanation:** It is impossible to make the sum of both arrays equal.



**Constraints:**

- <code>1 <= nums1.length, nums2.length <= 10<sup>5</sup></code>
- <code>0 <= nums1[i], nums2[i] <= 10<sup>6</sup></code>


**Hint:**
1. Consider we replace all the 0’s with 1’s on both arrays, the answer will be `-1` if there was no `0` in the array with the smaller sum of elements.
2. Otherwise, how can you update the value of exactly one of these `1`’s to make the sum of the two arrays equal?



**Solution:**

We need to replace all zeros in two given arrays with strictly positive integers such that the sums of both arrays become equal, and we need to find the minimum possible equal sum. If it's impossible, we return -1.

### Approach
1. **Calculate Sums and Zeros**: For each array, compute the sum of non-zero elements and count the number of zeros.
2. **Determine Minimum Possible Sums**: For each array, the minimum possible sum after replacing zeros with 1s (smallest positive integer) is calculated. This is done by adding the sum of non-zero elements to the count of zeros (since each zero is replaced by 1).
3. **Check Conditions**:
   - If both arrays have zeros, the minimum possible equal sum is the maximum of their minimum possible sums.
   - If neither array has zeros, check if their sums are already equal.
   - If one array has zeros and the other doesn't, check if the fixed sum of the non-zero array is greater than or equal to the minimum possible sum of the array with zeros.

Let's implement this solution in PHP: **[2918. Minimum Equal Sum of Two Arrays After Replacing Zeros](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002918-minimum-equal-sum-of-two-arrays-after-replacing-zeros/solution.php)**

```php
<?php
/**
* @param Integer[] $nums1
* @param Integer[] $nums2
* @return Integer
*/
function minSum($nums1, $nums2) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
print_r(minSum([3, 2, 0, 1, 0], [6, 5, 0])); // Output: 12
print_r(minSum([2, 0, 2, 0], [1, 4]));       // Output: -1
?>
```

### Explanation:

1. **Sum and Zero Calculation**: For each array, iterate through the elements to compute the sum of non-zero elements and count the zeros.
2. **Minimum Possible Sum**: For each array, if there are zeros, the minimum sum is the sum of non-zero elements plus the number of zeros (each zero replaced by 1). If there are no zeros, the sum remains as is.
3. **Conditions Check**:
   - **Both Arrays Have Zeros**: The minimum possible equal sum is the maximum of the two minimum possible sums because each array can adjust its sum upwards.
   - **No Zeros in Either Array**: Check if their sums are equal.
   - **One Array Has Zeros**: The fixed sum of the array without zeros must be greater than or equal to the minimum possible sum of the array with zeros to form an equal sum.

This approach efficiently determines the minimum possible equal sum by leveraging the constraints and properties of the arrays, ensuring optimal performance.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**