3719\. Longest Balanced Subarray I

**Difficulty:** Medium

**Topics:** `Senior`, `Array`, `Hash Table`, `Divide and Conquer`, `Segment Tree`, `Prefix Sum`, `Weekly Contest 472`

You are given an integer array `nums`.

A **subarray[^1]** is called **balanced** if the number of **distinct even** numbers in the subarray is equal to the number of **distinct odd** numbers.

Return _the length of the **longest** balanced subarray_.

**Example 1:**

- **Input:** nums = [2,5,4,3]
- **Output:** 4
- **Explanation:**
  - The longest balanced subarray is `[2, 5, 4, 3]`.
  - It has 2 distinct even numbers `[2, 4]` and 2 distinct odd numbers `[5, 3]`. Thus, the answer is 4.


**Example 2:**

- **Input:** nums = [3,2,2,5,4]
- **Output:** 5
- **Explanation:**
  - The longest balanced subarray is `[3, 2, 2, 5, 4]`.
  - It has 2 distinct even numbers `[2, 4]` and 2 distinct odd numbers `[3, 5]`. Thus, the answer is 5.


**Example 3:**

- **Input:** nums = [1,2,3,2]
- **Output:** 3
- **Explanation:**
  - The longest balanced subarray is `[2, 3, 2]`.
  - It has 1 distinct even number `[2]` and 1 distinct odd number `[3]`. Thus, the answer is 3.


**Example 4:**

- **Input:** nums = [574,228,657,379,668,60,660,471,54,35,624,351,438,567,531,477,110,495,326,390,363,662,622,583,17,520]
- **Output:** 24


**Constraints:**

- `1 <= nums.length <= 1500`
- `1 <= nums[i] <= 10⁵`



**Hint:**
1. Use brute force
2. Try every subarray and use a map/set data structure to track the distinct even and odd numbers


[^1]: **Subarray:** A **subarray** is a contiguous **non-empty** sequence of elements within an array.



**Solution:**

We are going to solve the problem by checking every possible subarray and for each subarray, we count the distinct even and odd numbers.

### Approach:

**Brute Force Approach:**
Since `n ≤ 1500`, we can try all subarrays with O(n²) complexity. For each subarray, we can track distinct elements using sets.

**Key Insight:**
For each subarray, we only care about whether the count of distinct evens equals the count of distinct odds. We can:
1. Iterate through all possible starting points
2. For each starting point, extend the subarray while tracking distinct numbers
3. Compare counts and update max length when equal

## Implementation Plan

1. Initialize `max_len = 0`
2. For each starting index `i`:
   - Create two sets: `even_set` and `odd_set`
   - For each ending index `j` from `i` to end:
      - Add `nums[j]` to appropriate set based on parity
      - If `len(even_set) == len(odd_set)`, update `max_len`
3. Return `max_len`

Let's implement this solution in PHP: **[3719. Longest Balanced Subarray I](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003719-longest-balanced-subarray-i/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function longestBalanced(array $nums): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo longestBalanced([2,5,4,3]) . "\n";                                                                                                 // Output: 4
echo longestBalanced([3,2,2,5,4]) . "\n";                                                                                               // Output: 5
echo longestBalanced([1,2,3,2]) . "\n";                                                                                                 // Output: 3
echo longestBalanced([574,228,657,379,668,60,660,471,54,35,624,351,438,567,531,477,110,495,326,390,363,662,622,583,17,520]) . "\n";     // Output: 24
?>
```

### Explanation:

1. **Outer Loop:** Iterates through all possible starting indices
2. **Inner Loop:** Extends subarray from current start to each possible end
3. **Sets for Tracking:** Use associative arrays to track distinct values:
   - Even numbers: keys in `$even_set`
   - Odd numbers: keys in `$odd_set`
4. **Balance Check:** Compare counts after adding each element
5. **Length Update:** Update maximum length when counts are equal

### Complexity
- **Time Complexity**: O(n²) - Two nested loops
   - Outer loop runs n times
   - Inner loop runs up to n times
   - Set operations (insert/lookup) are O(1) average case
- **Space Complexity**: O(n) - Worst case when all elements are distinct

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**