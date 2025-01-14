1248\. Count Number of Nice Subarrays

**Difficulty:** Medium

**Topics:** `Array`, `Hash Table`, `Math`, `Sliding Window`, `Prefix Sum`

Given an array of integers `nums` and an integer `k`. A continuous subarray is called nice if there are `k` odd numbers on it.

Return _the number of **nice** sub-arrays_.

**Example 1:**

- **Input:** nums = [1,1,2,1,1], k = 3
- **Output:** 2
- **Explanation:** The only sub-arrays with 3 odd numbers are [1,1,2,1] and [1,2,1,1].

**Example 2:**

- **Input:** nums = [2,4,6], k = 1
- **Output:** 0
- **Explanation:** There are no odd numbers in the array.

**Example 3:**

- **Input:** nums = [2,2,2,1,2,2,1,2,2,2], k = 2
- **Output:** 16 

**Constraints:**

- <code>1 <= nums.length <= 50000</code>
- <code>1 <= nums[i] <= 10^5</code>
- <code>1 <= k <= nums.length</code>


**Hint:**
1. After replacing each even by zero and every odd by one can we use prefix sum to find answer ?
2. Can we use two pointers to count number of sub-arrays ?
3. Can we store the indices of odd numbers and for each k indices count the number of sub-arrays that contains them ?



**Solution:**

The problem requires finding the number of subarrays in an integer array `nums` that contain exactly `k` odd numbers. Subarrays are contiguous, and we need to optimize for performance due to constraints on the size of the array.

### Key Points:
1. **Continuous Subarrays**: The solution must consider only contiguous parts of the array.
2. **Odd Numbers Identification**: Odd numbers can be identified by checking if `num % 2 != 0` or using bitwise operation `num & 1`.
3. **Constraints**:
    - Array size can be up to 50,000, so a brute-force approach (checking all possible subarrays) would be too slow.
4. **Optimal Solution**:
    - Using prefix sums or a sliding window approach efficiently counts the valid subarrays.

### Approach:
The problem can be solved using the **sliding window** technique combined with prefix sums. The main idea is to efficiently track the number of odd numbers within a moving subarray and count the valid subarrays.

### Plan:
1. **Transform the Array**: Replace odd numbers with `1` and even numbers with `0` to simplify counting.
2. **Prefix Sum with Sliding Window**:
    - Maintain a count of subarrays with exactly `k` odd numbers using a prefix sum and a hash table.
    - Track how many times each prefix sum has occurred to efficiently calculate the number of valid subarrays ending at the current position.
3. **Two Pointers Sliding Window**:
    - Track the indices of odd numbers and compute the valid subarrays based on the indices of the first and last `k` odd numbers in the window.

Let's implement this solution in PHP: **[1248. Count Number of Nice Subarrays](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001248-count-number-of-nice-subarrays/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @param Integer $k
 * @return Integer
 */
function numberOfSubarrays($nums, $k) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
$nums = [1,1,2,1,1];
$k = 3;
echo numberOfSubarrays($nums, $k) . "\n"; // Output: 2

$nums = [2,4,6];
$k = 1;
echo numberOfSubarrays($nums, $k) . "\n"; // Output: 0

$nums = [2,2,2,1,2,2,1,2,2,2];
$k = 2;
echo numberOfSubarrays($nums, $k) . "\n"; // Output: 16
?>
```

### Explanation:

We iterate through the array while maintaining the following:
1. **`r[1]`**: Number of odd numbers in the current window.
2. **`pre`**: Position of the left boundary of the valid window (updated when `r[1]` equals `k`).
3. **`cur`**: Tracks the first valid subarray start for the current window.
4. Count subarrays by determining how many valid windows can be formed.

### Example Walkthrough:

#### Example 1:
**Input**: `nums = [1, 1, 2, 1, 1], k = 3`

1. Convert the array to `[1, 1, 0, 1, 1]`.
2. Use a sliding window to count:
    - Window `[1, 1, 0, 1]`: 3 odd numbers → Count = 1.
    - Window `[1, 0, 1, 1]`: 3 odd numbers → Count = 1.
3. **Result**: `2`.

#### Example 2:
**Input**: `nums = [2, 4, 6], k = 1`

1. Convert the array to `[0, 0, 0]`.
2. No odd numbers → **Result**: `0`.

#### Example 3:
**Input**: `nums = [2, 2, 2, 1, 2, 2, 1, 2, 2, 2], k = 2`

1. Convert the array to `[0, 0, 0, 1, 0, 0, 1, 0, 0, 0]`.
2. Count valid windows:
    - For each pair of odd numbers (`k = 2`), calculate all subarrays containing them.
    - **Result**: `16`.

### Time Complexity:
- **Sliding Window Update**: O(n) — Each element is processed once.
- **Overall Complexity**: O(n).

### Space Complexity:
- O(1) — Constant space for tracking counts.

### Output for Examples:
1. Example 1: Output = 2.
2. Example 2: Output = 0.
3. Example 3: Output = 16.

The sliding window with prefix sums efficiently counts the number of "nice" subarrays. This approach is optimal for handling large arrays due to its linear time complexity.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**