2501\. Longest Square Streak in an Array

**Difficulty:** Medium

**Topics:** `Array`, `Hash Table`, `Binary Search`, `Dynamic Programming`, `Sorting`

You are given an integer array `nums`. A subsequence of `nums` is called a **square streak** if:

- The length of the subsequence is at least `2`, and
- **after** sorting the subsequence, each element (except the first element) is the **square** of the previous number.

Return _the length of the **longest square streak** in `nums`, or return `-1` if there is no **square streak**_.

A **subsequence** is an array that can be derived from another array by deleting some or no elements without changing the order of the remaining elements.

**Example 1:**

- **Input:** nums = [4,3,6,16,8,2]
- **Output:** 3
- **Explanation:** Choose the subsequence [4,16,2]. After sorting it, it becomes [2,4,16].
  - 4 = 2 * 2.
  - 16 = 4 * 4.\
    Therefore, [4,16,2] is a square streak.\
    It can be shown that every subsequence of length 4 is not a square streak.

**Example 2:**

- **Input:** nums = [2,3,5,6,7]
- **Output:** -1
- **Explanation:** There is no square streak in nums so return -1.


**Constraints:**

- <code>2 <= nums.length <= 10<sup>5</sup></code>
- <code>2 <= nums[i] <= 10<sup>5</sup></code>


**Hint:**
1. With the constraints, the length of the longest square streak possible is 5.
2. Store the elements of nums in a set to quickly check if it exists.



**Solution:**

We need to identify the longest square streak in the `nums` array. A square streak is a subsequence where each subsequent element is the square of the previous element, and it must be at least two elements long.

Here's the solution approach:

1. **Use a Set for Quick Lookup**:
   - Store the numbers in a set to quickly verify if an element's square is also in the array.

2. **Iterate Through the Array**:
   - For each number in the array, try to build a square streak starting from that number.
   - Check if the square of the current number exists in the set and keep extending the streak until there’s no further square match.

3. **Track Maximum Length**:
   - Track the maximum length of all possible square streaks encountered. If no square streak is found, return `-1`.

4. **Optimization**:
   - Sort the array before checking each element to ensure the subsequence is checked in ascending order. This will help avoid redundant checks.

Let's implement this solution in PHP: **[2501. Longest Square Streak in an Array](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002501-longest-square-streak-in-an-array/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function longestSquareStreak($nums) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
$nums1 = [4, 3, 6, 16, 8, 2];
echo longestSquareStreak($nums1) . "\n";  // Output: 3

$nums2 = [2, 3, 5, 6, 7];
echo longestSquareStreak($nums2) . "\n";  // Output: -1
?>
```

### Explanation:

- **Sorting**: Sorting `nums` ensures we can check sequences in ascending order.
- **Set Lookup**: Using `array_flip` creates a set-like structure for `$numSet` with `$nums` as keys, allowing fast existence checks.
- **Loop through each number**: For each `num` in `nums`, check if the square of the current number is in the set. If it is, continue the streak. Otherwise, break the streak and check if it’s the longest found.

### Complexity Analysis

- **Time Complexity**: _**O(n log n)**_ due to sorting, where _**n**_ is the number of elements in `nums`. The subsequent lookups and square streak checks are _**O(n)**_.
- **Space Complexity**: _**O(n)**_, mainly for storing `nums` in the set.

This solution efficiently finds the longest square streak or returns `-1` if no valid streak exists.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
