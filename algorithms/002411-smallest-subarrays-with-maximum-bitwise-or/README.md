2411\. Smallest Subarrays With Maximum Bitwise OR

**Difficulty:** Medium

**Topics:** `Array`, `Binary Search`, `Bit Manipulation`, `Sliding Window`, `Biweekly Contest 87`

You are given a **0-indexed** array `nums` of length `n`, consisting of non-negative integers. For each index `i` from `0` to `n - 1`, you must determine the size of the **minimum sized** non-empty subarray of `nums` starting at `i` (**inclusive**) that has the **maximum** possible **bitwise OR**.

- In other words, let <code>B<sub>ij</sub></code> be the bitwise OR of the subarray `nums[i...j]`. You need to find the smallest subarray starting at `i`, such that bitwise OR of this subarray is equal to <code>max(B<sub>ik</sub>)</code> where `i <= k <= n - 1`.

The bitwise OR of an array is the bitwise OR of all the numbers in it.

Return _an integer array `answer` of size `n` where `answer[i]` is the length of the **minimum** sized subarray starting at `i` with **maximum** bitwise OR_.

A **subarray** is a contiguous non-empty sequence of elements within an array.

**Example 1:**

- **Input:** nums = [1,0,2,1,3]
- **Output:** [3,3,2,2,1]
- **Explanation:** 
  The maximum possible bitwise OR starting at any index is 3.
  - Starting at index 0, the shortest subarray that yields it is [1,0,2].
  - Starting at index 1, the shortest subarray that yields the maximum bitwise OR is [0,2,1].
  - Starting at index 2, the shortest subarray that yields the maximum bitwise OR is [2,1].
  - Starting at index 3, the shortest subarray that yields the maximum bitwise OR is [1,3].
  - Starting at index 4, the shortest subarray that yields the maximum bitwise OR is [3].
  Therefore, we return [3,3,2,2,1].

**Example 2:**

- **Input:** nums = [1,2]
- **Output:** [2,1]
- **Explanation:**
  Starting at index 0, the shortest subarray that yields the maximum bitwise OR is of length 2.
  Starting at index 1, the shortest subarray that yields the maximum bitwise OR is of length 1.
  Therefore, we return [2,1].

**Constraints:**

- `n == nums.length`
- <code>1 <= n <= 10<sup>5</sup></code>
- <code>0 <= nums[i] <= 10<sup>9</sup></code>


**Hint:**
1. Consider trying to solve the problem for each bit position separately.
2. For each bit position, find the position of the next number that has a 1 in that position, if any.
3. Take the maximum distance to such a number, including the current number.
4. Iterate backwards to achieve a linear complexity.


**Similar Questions:**
1. [23. Merge k Sorted Lists](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000023-merge-k-sorted-lists)
2. [898. Bitwise ORs of Subarrays](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000898-bitwise-ors-of-subarrays)
3. [2419. Longest Subarray With Maximum Bitwise AND](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002419-longest-subarray-with-maximum-bitwise-and)






**Solution:**

We need to find, for each starting index `i` in the given array, the smallest subarray starting at `i` that achieves the maximum possible bitwise OR for any subarray starting at `i`. The bitwise OR of a subarray is the bitwise OR of all elements in that subarray. The challenge is to efficiently compute this for each index in the array.

### Approach
1. **Problem Analysis**: The key observation is that the maximum bitwise OR for any subarray starting at index `i` is the bitwise OR of the entire subarray from `i` to the end of the array. This is because the bitwise OR operation is monotonic; adding more elements can only set more bits, never unset them. Therefore, the maximum OR value for subarrays starting at `i` is the OR of `nums[i..n-1]`.

2. **Intuition**: For each starting index `i`, we need the smallest subarray `nums[i..j]` such that the bitwise OR of this subarray equals the OR of the entire suffix starting at `i`. To achieve this, we must ensure that for every bit set in the suffix OR, there is at least one element in the subarray `nums[i..j]` that has that bit set. The minimal `j` for which this condition is satisfied will be the rightmost position among the next occurrences of each bit set in the suffix OR.

3. **Algorithm Selection**:
    - **Backward Pass**: We process the array from right to left. This allows us to efficiently track the next occurrence of each bit (0 to 31) as we move leftwards.
    - **Bit Tracking**: For each index `i`, we update the next occurrence positions of all bits present in `nums[i]`.
    - **Suffix OR Calculation**: As we move left, we maintain the cumulative OR of the suffix starting at the current index.
    - **Finding Minimal Subarray**: For each index `i`, we determine the smallest `j` such that all bits set in the suffix OR are covered by elements in `nums[i..j]`. This `j` is the maximum of the next occurrence positions of all bits set in the suffix OR.

4. **Complexity Analysis**: The algorithm processes each element once, and for each element, it checks up to 32 bits. Thus, the time complexity is O(32 * n) = O(n), which is efficient for the given constraints <code>(n ≤ 10<sup>5</sup>)</code>.

Let's implement this solution in PHP: **[2411. Smallest Subarrays With Maximum Bitwise OR](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002411-smallest-subarrays-with-maximum-bitwise-or/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer[]
 */
function smallestSubarrays($nums) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
// Example 1:
$nums = [1, 0, 2, 1, 3];
print_r(smallestSubarrays($nums)); // Output: [3,3,2,2,1]

// Example 2:
$nums = [1, 2];
print_r(smallestSubarrays($nums)); // Output: [2,1]
?>
```

### Explanation:

1. **Initialization**: We initialize an array `ans` to store results, an array `next_occurrence` to track the most recent (leftmost) positions of each bit (0-31), and a variable `curOR` to accumulate the bitwise OR of the suffix.
2. **Backward Pass**: Starting from the end of the array, for each element:
    - **Update Bit Positions**: For each bit set in the current element, update `next_occurrence` to the current index.
    - **Update Suffix OR**: Accumulate the OR of the current element into `curOR`.
    - **Determine Minimal Subarray**: For each bit set in `curOR`, find the farthest (rightmost) next occurrence of that bit. The minimal subarray length is the distance from the current index to this farthest occurrence plus one.
3. **Result Construction**: Store the computed subarray length in `ans` for the current index.
4. **Return Result**: After processing all elements, return the `ans` array containing the minimal subarray lengths for each starting index.

This approach efficiently computes the desired result by leveraging bit manipulation and a backward pass through the array, ensuring optimal performance even for large input sizes.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**