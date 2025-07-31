898\. Bitwise ORs of Subarrays

**Difficulty:** Medium

**Topics:** `Array`, `Dynamic Programming`, `Bit Manipulation`, `Weekly Contest 100`

Given an integer array `arr`, return _the number of distinct bitwise ORs of all the non-empty subarrays of `arr`_.

The bitwise OR of a subarray is the bitwise OR of each integer in the subarray. The bitwise OR of a subarray of one integer is that integer.

A **subarray** is a contiguous non-empty sequence of elements within an array.

**Example 1:**

- **Input:** arr = [0]
- **Output:** 1
- **Explanation:** There is only one possible result: 0.

**Example 2:**

- **Input:** arr = [1,1,2]
- **Output:** 3
- **Explanation:** The possible subarrays are [1], [1], [2], [1, 1], [1, 2], [1, 1, 2].
  These yield the results 1, 1, 2, 1, 3, 3.
  There are 3 unique values, so the answer is 3.

**Example 3:**

- **Input:** arr = [1,2,4]
- **Output:** 6
- **Explanation:** The possible results are 1, 2, 3, 4, 6, and 7.

**Constraints:**

- <Code>1 <= arr.length <= 5 * 10<sup>4</sup></code>
- <Code>0 <= arr[i] <= 10<sup>9</sup></code>


**Similar Questions:**
1. [2401. Longest Nice Subarray](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002401-longest-nice-subarray)
2. [2411. Smallest Subarrays With Maximum Bitwise OR](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002411-smallest-subarrays-with-maximum-bitwise-or)
3. [2505. Bitwise OR of All Subsequence Sums](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002505-bitwise-or-of-all-subsequence-sums)
4. [3287. Find the Maximum Sequence Value of Array](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003287-find-the-maximum-sequence-value-of-array)






**Solution:**

We need to find the number of distinct bitwise ORs of all non-empty contiguous subarrays in a given integer array. The challenge is to compute this efficiently given the constraints, especially since a brute-force approach would be infeasible for large arrays.

### Approach
1. **Problem Analysis**: The task involves processing all possible contiguous subarrays of the given array and computing their bitwise ORs. The key insight is recognizing that the number of distinct OR values for subarrays ending at each position is bounded by the number of bits in the integers (up to 32 bits), which allows for an efficient solution.
2. **Dynamic Tracking**: For each element in the array, maintain a set of OR values for all subarrays ending at the current position. This set is constructed by OR-ing the current element with each value from the set of ORs of subarrays ending at the previous position, and also including the current element itself.
3. **Efficiency**: By leveraging the fact that the size of the OR set for each position is bounded (due to the limited number of bits), the solution efficiently processes each element in O(32) time per element, leading to an overall O(n) time complexity, where n is the length of the array.

Let's implement this solution in PHP: **[898. Bitwise ORs of Subarrays](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000898-bitwise-ors-of-subarrays/solution.php)**

```php
<?php
/**
 * @param Integer[] $arr
 * @return Integer
 */
function subarrayBitwiseORs($arr) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
$arr1 = [0];
$arr2 = [1, 1, 2];
$arr3 = [1, 2, 4];

echo subarrayBitwiseORs($arr1) . "\n"; // Output: 1
echo subarrayBitwiseORs($arr2) . "\n"; // Output: 3
echo subarrayBitwiseORs($arr3) . "\n"; // Output: 6
?>
```

### Explanation:

1. **Initialization**: We start with two empty associative arrays, `$ans` to store all distinct OR values encountered and `$cur` to store OR values of subarrays ending at the current position.
2. **Processing Each Element**: For each element `$x` in the array:
    - **Initialize `$next_cur`**: This set starts with the current element `$x`.
    - **Update `$next_cur`**: For each value in `$cur` (OR values from subarrays ending at the previous position), compute the OR with `$x` and add the result to `$next_cur`.
    - **Update `$cur`**: Set `$cur` to `$next_cur` for processing the next element.
    - **Update `$ans`**: Merge all values from `$cur` into `$ans` to accumulate distinct OR values.
3. **Result**: The size of `$ans` gives the number of distinct bitwise ORs for all non-empty subarrays.

This approach efficiently tracks distinct OR values by leveraging the bounded nature of bitwise operations, ensuring optimal performance even for large input sizes.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**