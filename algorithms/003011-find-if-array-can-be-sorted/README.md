3011\. Find if Array Can Be Sorted

**Difficulty:** Medium

**Topics:** `Array`, `Bit Manipulation`, `Sorting`

You are given a **0-indexed** array of **positive** integers `nums`.

In one **operation**, you can swap any two **adjacent** elements if they have the **same** number of set bits[^1]. You are allowed to do this operation **any** number of times (**including zero**).

Return _`true` if you can sort the array, else return `false`_.

**Example 1:**

- **Input:** nums = [8,4,2,30,15]
- **Output:** true
- **Explanation:** Let's look at the binary representation of every element. The numbers 2, 4, and 8 have one set bit each with binary representation "10", "100", and "1000" respectively. The numbers 15 and 30 have four set bits each with binary representation "1111" and "11110".
  We can sort the array using 4 operations:
  - Swap nums[0] with nums[1]. This operation is valid because 8 and 4 have one set bit each. The array becomes [4,8,2,30,15].
  - Swap nums[1] with nums[2]. This operation is valid because 8 and 2 have one set bit each. The array becomes [4,2,8,30,15].
  - Swap nums[0] with nums[1]. This operation is valid because 4 and 2 have one set bit each. The array becomes [2,4,8,30,15].
  - Swap nums[3] with nums[4]. This operation is valid because 30 and 15 have four set bits each. The array becomes [2,4,8,15,30].
    The array has become sorted, hence we return true.
    Note that there may be other sequences of operations which also sort the array.

**Example 2:**

- **Input:** nums = [1,2,3,4,5]
- **Output:** true
- **Explanation:** The array is already sorted, hence we return true.


**Example 3:**

- **Input:** nums = [3,16,8,4,2]
- **Output:** false
- **Explanation:** It can be shown that it is not possible to sort the input array using any number of operations.

**Example 4:**

- **Input:** nums = [75,34,30]
- **Output:** false
- **Explanation:** It can be shown that it is not possible to sort the input array using any number of operations.


**Constraints:**

- `1 <= nums.length <= 100`
- <code>1 <= nums[i] <= 2<sup>8</sup></code>


**Hint:**
1. Split the array into segments. Each segment contains consecutive elements with the same number of set bits.
2. From left to right, the previous segment’s largest element should be smaller than the current segment’s smallest element.

[^1]: **Set Bit** A set bit refers to a bit in the binary representation of a number that has a value of `1`.

**Solution:**

We need to determine if the array can be sorted by only swapping adjacent elements that have the same number of set bits in their binary representation. Here’s the plan:

### Solution Steps:

1. **Key Observation**: The operation allows us to swap adjacent elements only if they have the same number of set bits. This restricts swapping across elements with different numbers of set bits.

2. **Plan**:
   - Group elements by the number of set bits in their binary representation.
   - Sort each group individually, since within a group, elements can be rearranged by swaps.
   - After sorting each group, merge the sorted groups back together.
   - Check if this merged array is sorted. If it is, then sorting the array using the allowed operations is possible.

3. **Steps**:
   - Count the set bits in each number and group numbers with the same set bit count.
   - Sort each group individually.
   - Reconstruct the array from these sorted groups and verify if the result is sorted.

Let's implement this solution in PHP: **[3011. Find if Array Can Be Sorted](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003011-find-if-array-can-be-sorted/solution.php)**

```php
<?php
/**
 * Helper function to count set bits in a number
 *
 * @param $n
 * @return int
 */
function countSetBits($n) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param Integer[] $nums
 * @return Boolean
 */
function canSortArray($nums) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
$nums1 = [8, 4, 2, 30, 15];
$nums2 = [1, 2, 3, 4, 5];
$nums3 = [3, 16, 8, 4, 2];
$nums4 = [75, 34, 30];

echo canBeSorted($nums1) ? 'true' : 'false'; // Expected output: true
echo "\n";
echo canBeSorted($nums2) ? 'true' : 'false'; // Expected output: true
echo "\n";
echo canBeSorted($nums3) ? 'true' : 'false'; // Expected output: false
echo "\n";
echo canBeSorted($nums4) ? 'true' : 'false'; // Expected output: false
?>
```

### Explanation:

1. **countSetBits Function**: Counts the number of set bits in a number using bitwise operations.
2. **Grouping Elements**: `bitGroups` is an associative array where each key represents the set bit count, and each value is an array of numbers with that many set bits.
3. **Sorting and Rebuilding**:
   - We iterate over `nums` to group elements by their set bit count.
   - We sort each group independently.
   - We then reconstruct the array by inserting each sorted group element in its original order.
   - Finally, we check if the reconstructed array is sorted in non-decreasing order. If it is, return `true`; otherwise, return `false`.

4. **Final Comparison**: Compare the rebuilt array with a fully sorted version of `nums`. If they match, return `true`; otherwise, return `false`.

### Complexity Analysis

- **Time Complexity**: _**O(n log n)**_ due to the sorting within each group and the final comparison.
- **Space Complexity**: _**O(n)**_ for storing the bit groups.

This solution ensures that we only swap adjacent elements with the same set bit count, achieving a sorted order if possible.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
