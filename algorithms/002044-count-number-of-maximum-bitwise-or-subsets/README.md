2044\. Count Number of Maximum Bitwise-OR Subsets

**Difficulty:** Medium

**Topics:** `Array`, `Backtracking`, `Bit Manipulation`, `Enumeration`

Given an integer array `nums`, find the **maximum** possible **bitwise OR** of a subset of `nums` and return _the **number of different non-empty subsets** with the maximum bitwise OR_.

An array `a` is a **subset** of an array `b` if `a` can be obtained from `b` by deleting some (possibly zero) elements of `b`. Two subsets are considered **different** if the indices of the elements chosen are different.

The bitwise OR of an array `a` is equal to `a[0] OR a[1] OR ... OR a[a.length - 1]` (**0-indexed**).

**Example 1:**

- **Input:** nums = [3,1]
- **Output:** 2
- **Explanation:** The maximum possible bitwise OR of a subset is 3. There are 2 subsets with a bitwise OR of 3:
  - [3]
  - [3,1]

**Example 2:**

- **Input:** nums = [2,2,2]
- **Output:** 7
- **Explanation:** All non-empty subsets of [2,2,2] have a bitwise OR of 2. There are 23 - 1 = 7 total subsets.


**Example 3:**

- **Input:** nums = [3,2,1,5]
- **Output:** 6
- **Explanation:** The maximum possible bitwise OR of a subset is 7. There are 6 subsets with a bitwise OR of 7:
  - [3,5]
  - [3,1,5]
  - [3,2,5]
  - [3,2,1,5]
  - [2,5]
  - [2,1,5]



**Constraints:**

- `1 <= nums.length <= 16`
- <code>1 <= nums[i] <= 10<sup>5</sup></code>


**Hint:**
1. Can we enumerate all possible subsets?
2. The maximum bitwise-OR is the bitwise-OR of the whole array.



**Solution:**

We can follow these steps:

1. **Calculate the Maximum Bitwise OR**: The maximum bitwise OR of a subset can be determined by performing a bitwise OR operation across all elements of the array. This gives us the maximum possible bitwise OR.

2. **Enumerate All Subsets**: Since the size of the array is small (up to 16), we can enumerate all possible subsets using a bit manipulation technique. For an array of size `n`, there are `2^n` possible subsets.

3. **Count Valid Subsets**: For each subset, compute its bitwise OR and check if it matches the maximum bitwise OR. If it does, increment a counter.

Let's implement this solution in PHP: **[2044. Count Number of Maximum Bitwise-OR Subsets](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002044-count-number-of-maximum-bitwise-or-subsets/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function countMaxBitwiseORSubsets($nums) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage
$nums1 = [3, 1];
echo countMaxBitwiseORSubsets($nums1) . "\n"; // Output: 2

$nums2 = [2, 2, 2];
echo countMaxBitwiseORSubsets($nums2) . "\n"; // Output: 7

$nums3 = [3, 2, 1, 5];
echo countMaxBitwiseORSubsets($nums3) . "\n"; // Output: 6
?>
```

### Explanation:
1. **Maximum Bitwise OR Calculation**:
    - We use a loop to calculate the maximum bitwise OR of the array by performing a bitwise OR on each element.

2. **Subset Enumeration**:
    - We loop through all numbers from `1` to `2^n - 1` (where `n` is the length of `nums`), representing all non-empty subsets.
    - For each number, we check each bit to see which elements are included in the subset.

3. **Valid Subset Count**:
    - After calculating the bitwise OR for the current subset, we check if it equals `maxOR`. If it does, we increment our counter.

This solution is efficient given the constraints and should work well for arrays of size up to 16, resulting in at most 65,535 subsets to evaluate.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
