1498\. Number of Subsequences That Satisfy the Given Sum Condition

**Difficulty:** Medium

**Topics:** `Array`, `Two Pointers`, `Binary Search`, `Sorting`

You are given an array of integers `nums` and an integer `target`.

Return _the number of **non-empty** subsequences of `nums` such that the sum of the minimum and maximum element on it is less or equal to `target`_. Since the answer may be too large, return it **modulo** <code>10<sup>9</sup> + 7</code>.

**Example 1:**

- **Input:** nums = [3,5,6,7], target = 9
- **Output:** 4
- **Explanation:** There are 4 subsequences that satisfy the condition.
  [3] -> Min value + max value <= target (3 + 3 <= 9)
  [3,5] -> (3 + 5 <= 9)
  [3,5,6] -> (3 + 6 <= 9)
  [3,6] -> (3 + 6 <= 9)

**Example 2:**

- **Input:** nums = [3,3,6,8], target = 10
- **Output:** 6
- **Explanation:** There are 6 subsequences that satisfy the condition. (nums can have repeated numbers).
  [3] , [3] , [3,3], [3,6] , [3,6] , [3,3,6]

**Example 3:**

- **Input:** nums = [2,3,3,4,6,7], target = 12
- **Output:** 61
- **Explanation:** There are 63 non-empty subsequences, two of them do not satisfy the condition ([6,7], [7]).
  Number of valid subsequences (63 - 2 = 61).

**Constraints:**

- <code>1 <= nums.length <= 10<sup>5</sup></code>
- <code>1 <= nums[i] <= 10<sup>6</sup></code>
- <code>1 <= target <= 10<sup>6</sup></code>


**Hint:**
1. Sort the array nums.
2. Use two pointers approach: Given an index i (choose it as the minimum in a subsequence) find the maximum j where j ≥ i and nums[i] +nums[j] ≤ target.
3. Count the number of subsequences.


**Similar Questions:**
1. [2835. Minimum Operations to Form Subsequence With Target Sum](https://leetcode.com/problems/minimum-operations-to-form-subsequence-with-target-sum/description/)
2. [3098. Find the Sum of Subsequence Powers](https://leetcode.com/problems/find-the-sum-of-subsequence-powers/description/)
3. [3082. Find the Sum of the Power of All Subsequences](https://leetcode.com/problems/find-the-sum-of-the-power-of-all-subsequences/description/)






**Solution:**

We need to count the number of non-empty subsequences in an array where the sum of the minimum and maximum elements in each subsequence is less than or equal to a given target. Given the constraints, a brute-force approach is infeasible, so we use sorting and a two-pointer technique to efficiently count valid subsequences.

### Approach
1. **Sort the Array**: Sorting helps in efficiently determining the valid subsequences by allowing us to use two pointers to find the range of elements that can form valid subsequences with a given minimum element.
2. **Precompute Powers of Two**: Since the number of valid subsequences for a given range can be _**2<sup>(j-i)</sup>**_ (where _**i**_ is the starting index and _**j**_ is the ending index of the valid range), we precompute powers of two modulo _**10<sup>9</sup> + 7**_ up to the maximum possible exponent (the length of the array) for quick access.
3. **Two Pointers Technique**:
   - Initialize a pointer `j` starting from the end of the sorted array.
   - For each element at index `i` (treated as the minimum element in the subsequence), move `j` leftwards until the sum of the elements at `i` and `j` is less than or equal to the target.
   - The valid range from `i` to `j` allows any subset of elements between `i+1` and `j` to form subsequences with the element at `i`. The count of such subsequences is _**2<sup>(j-i)</sup>**_.
   - Sum these counts for all valid starting indices `i`.

Let's implement this solution in PHP: **[1498. Number of Subsequences That Satisfy the Given Sum Condition](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001498-number-of-subsequences-that-satisfy-the-given-sum-condition/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @param Integer $target
 * @return Integer
 */
function numSubseq($nums, $target) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
$nums1 = [3, 5, 6, 7];
$target1 = 9;
echo numSubseq($nums1, $target1) . "\n"; // Output: 4

$nums2 = [3, 3, 6, 8];
$target2 = 10;
echo numSubseq($nums2, $target2) . "\n"; // Output: 6

$nums3 = [2, 3, 3, 4, 6, 7];
$target3 = 12;
echo numSubseq($nums3, $target3) . "\n"; // Output: 61
?>
```

### Explanation:

1. **Sorting the Array**: The array is sorted to facilitate the two-pointer approach. This ensures that for any element at index `i`, all subsequent elements are greater than or equal to it, simplifying the process of finding valid maximum elements.
2. **Precomputing Powers of Two**: The array `$pow2` stores _**2<sup>k</sup> mod 10<sup>9</sup> + 7**_ for all _**k**_ from 0 to _**n-1**_. This allows O(1) access to the number of valid subsequences for any range length _**k**_.
3. **Two Pointers Technique**:
   - The pointer `j` starts at the end of the array. For each `i` (starting from the beginning), `j` is moved left until the sum of elements at `i` and `j` is within the target.
   - The number of valid subsequences starting with `nums[i]` is _**2<sup>(j-i)</sup>**_, as each element between `i+1` and `j` can either be included or excluded.
   - The result is accumulated modulo _**10<sup>9</sup> + 7**_ to handle large numbers.
4. **Early Termination**: If `j` becomes less than `i`, it means no valid subsequences exist for the remaining elements, so the loop terminates early.

This approach efficiently counts all valid subsequences by leveraging sorting, precomputation, and a two-pointer technique, ensuring optimal performance for large input sizes.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**