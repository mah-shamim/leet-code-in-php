2040\. Kth Smallest Product of Two Sorted Arrays

**Difficulty:** Hard

**Topics:** `Array`, `Binary Search`

Given two **sorted 0-indexed** integer arrays `nums1` and `nums2` as well as an integer `k`, return the <code>k<sup>th</sup></code> (**1-based**) smallest product of `nums1[i] * nums2[j]` where `0 <= i < nums1.length` and `0 <= j < nums2.length`.

**Example 1:**

- **Input:** nums1 = [2,5], nums2 = [3,4], k = 2
- **Output:** 8
- **Explanation:** The 2 smallest products are:
  - nums1[0] * nums2[0] = 2 * 3 = 6
  - nums1[0] * nums2[1] = 2 * 4 = 8
  - The 2<sup>nd</sup> smallest product is 8.

**Example 2:**

- **Input:** nums1 = [-4,-2,0,3], nums2 = [2,4], k = 6
- **Output:** 0
- **Explanation:** The 6 smallest products are:
  - nums1[0] * nums2[1] = (-4) * 4 = -16
  - nums1[0] * nums2[0] = (-4) * 2 = -8
  - nums1[1] * nums2[1] = (-2) * 4 = -8
  - nums1[1] * nums2[0] = (-2) * 2 = -4
  - nums1[2] * nums2[0] = 0 * 2 = 0
  - nums1[2] * nums2[1] = 0 * 4 = 0
  - The 6<sup>th</sup> smallest product is 0.

**Example 3:**

- **Input:** nums1 = [-2,-1,0,1,2], nums2 = [-3,-1,2,4,5], k = 3
- **Output:** -6
- **Explanation:** The 3 smallest products are:
  - nums1[0] * nums2[4] = (-2) * 5 = -10
  - nums1[0] * nums2[3] = (-2) * 4 = -8
  - nums1[4] * nums2[0] = 2 * (-3) = -6
  - The 3<sup>rd</sup> smallest product is -6.

**Constraints:**

- <code>1 <= nums1.length, nums2.length <= 5 * 10<sup>4</sup></code>
- <code>-10<sup>5</sup> <= nums1[i], nums2[j] <= 10<sup>5</sup></code>
- `1 <= k <= nums1.length * nums2.length`
- `nums1` and `nums2` are sorted.


**Hint:**
1. Can we split this problem into four cases depending on the sign of the numbers?
2. Can we binary search the value?


**Similar Questions:**
1. [373. Find K Pairs with Smallest Sums](https://leetcode.com/problems/find-k-pairs-with-smallest-sums/description/)
2. [532. K-diff Pairs in an Array](https://leetcode.com/problems/k-diff-pairs-in-an-array/description/)
3. [2398. Maximum Number of Robots Within Budget](https://leetcode.com/problems/maximum-number-of-robots-within-budget/description/)






**Solution:**

We need to find the k-th smallest product of pairs from two sorted arrays. The challenge lies in efficiently handling both negative and non-negative numbers while leveraging the sorted nature of the arrays to avoid a brute-force approach.

### Approach
1. **Separate Arrays by Sign**:
    - Split each array into two parts: one containing the absolute values of negative numbers (sorted in ascending order) and another containing non-negative numbers (including zeros).

2. **Count Negative Products**:
    - Calculate the total number of strictly negative products. This is derived from combinations of negative numbers from one array and non-negative numbers from the other array.

3. **Determine Sign and Adjust k**:
    - If `k` exceeds the count of negative products, the k-th smallest product is non-negative. Adjust `k` by subtracting the count of negative products.
    - Otherwise, the k-th smallest product is negative. Adjust `k` to find the corresponding absolute value among negative products and swap the non-negative and negative parts of the second array to simplify counting.

4. **Binary Search for k-th Product**:
    - Use binary search on the possible product values (from 0 to _**10<sup>10</sup>**_) to find the smallest value `m` such that the count of products (absolute values for negative products) less than or equal to `m` is at least `k`.
    - For each candidate `m` during binary search, count the number of valid products in both parts of the separated arrays using a two-pointer technique for efficiency.

5. **Return Result**:
    - Multiply the found product value by the determined sign (1 for non-negative, -1 for negative) to get the k-th smallest product.

Let's implement this solution in PHP: **[2040. Kth Smallest Product of Two Sorted Arrays](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002040-kth-smallest-product-of-two-sorted-arrays/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums1
 * @param Integer[] $nums2
 * @param Integer $k
 * @return Integer
 */
function kthSmallestProduct($nums1, $nums2, $k) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $arr
 * @param $neg
 * @param $nonNeg
 * @return void
 */
function separate($arr, &$neg, &$nonNeg) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $A
 * @param $B
 * @param $m
 * @return int
 */
function numProductNoGreaterThan($A, $B, $m) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo kthSmallestProduct([2, 5], [3, 4], 2) . "\n"; // Output: 8
echo kthSmallestProduct([-4, -2, 0, 3], [2, 4], 6) . "\n"; // Output: 0
echo kthSmallestProduct([-2, -1, 0, 1, 2], [-3, -1, 2, 4, 5], 3) . "\n"; // Output: -6
?>
```

### Explanation:

1. **Separation by Sign**: The arrays `nums1` and `nums2` are split into negative and non-negative parts. Negative numbers are stored as their absolute values and reversed to ensure ascending order.
2. **Negative Product Count**: The total number of strictly negative products is computed by considering combinations of negative numbers from one array with non-negative numbers from the other.
3. **Adjust k Based on Sign**: If `k` is within the range of negative products, we adjust `k` to find the corresponding absolute value among negative products and swap parts of the second array. Otherwise, we proceed to find the k-th non-negative product.
4. **Binary Search**: The binary search is performed over possible product values (0 to _**10<sup>10</sup>**_). For each midpoint `m`, we count how many products (from both parts of the separated arrays) are less than or equal to `m` using an efficient two-pointer approach.
5. **Result Calculation**: The result is derived by multiplying the smallest valid product found during binary search by the determined sign (1 or -1), ensuring the correct k-th smallest product is returned.

This approach efficiently narrows down the search space using binary search and leverages the sorted nature of arrays to count valid products in linear time, making it suitable for large input sizes.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**