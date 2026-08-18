3471\. Find the Largest Almost Missing Integer

**Difficulty:** Easy

**Topics:** `Mid Level`, `Array`, `Hash Table`, `Weekly Contest 439`

You are given an integer array `nums` and an integer `k`.

An integer `x` is **almost missing** from `nums` if `x` appears in exactly one subarray of size `k` within `nums`.

Return the **largest almost missing** integer from `nums`. If no such integer exists, return `-1`.
A **subarray** is a contiguous sequence of elements within an array.

**Example 1:**

- **Input:** nums = [3,9,2,1,7], k = 3
- **Output:** 7
- **Explanation:**
  - 1 appears in 2 subarrays of size 3: `[9, 2, 1]` and `[2, 1, 7]`.
  - 2 appears in 3 subarrays of size 3: `[3, 9, 2]`, `[9, 2, 1], [2, 1, 7]`.
  - 3 appears in 1 subarray of size 3: `[3, 9, 2]`.
  - 7 appears in 1 subarray of size 3: `[2, 1, 7]`.
  - 9 appears in 2 subarrays of size 3: `[3, 9, 2]`, and `[9, 2, 1]`.
  - We return 7 since it is the largest integer that appears in exactly one subarray of size `k`.

**Example 2:**

- **Input:** nums = [3,9,7,2,1,7], k = 4
- **Output:** 3
- **Explanation:**
  - 1 appears in 2 subarrays of size 4: `[9, 7, 2, 1]`, `[7, 2, 1, 7]`.
  - 2 appears in 3 subarrays of size 4: `[3, 9, 7, 2]`, `[9, 7, 2, 1]`, `[7, 2, 1, 7]`.
  - 3 appears in 1 subarray of size 4: `[3, 9, 7, 2]`.
  - 7 appears in 3 subarrays of size 4: `[3, 9, 7, 2]`, `[9, 7, 2, 1]`, `[7, 2, 1, 7]`.
  - 9 appears in 2 subarrays of size 4: `[3, 9, 7, 2]`, `[9, 7, 2, 1]`.
  - We return 3 since it is the largest and only integer that appears in exactly one subarray of size `k`.

**Example 3:**

- **Input:** nums = [0,0], k = 1
- **Output:** -1
- **Explanation:** There is no integer that appears in only one subarray of size 1.

**Example 4:**

- **Input:** nums = [1,2,3,4,5], k = 1
- **Output:** 5

**Example 5:**

- **Input:** nums = [5,5,5,5,5], k = 5
- **Output:** 5

**Example 6:**

- **Input:** nums = [1,2,3,4], k = 2
- **Output:** 4

**Example 7:**

- **Input:** nums = [2,2,2], k = 2
- **Output:** -1

**Example 8:**

- **Input:** nums = [1,2,1,3,4,3], k = 2
- **Output:** 4

**Constraints:**

- `1 <= nums.length <= 50`
- `0 <= nums[i] <= 50`
- `1 <= k <= nums.length`


**Hint:**
1. Solve the problem for three different cases: `k = 1`, `k = n`, and `1 < k < n`
2. If `k = 1`, return the largest element that occurs exactly once in `nums`
3. If `k = n`, return the largest element in `nums`
4. If `1 < k < n`, all elements different from `nums[0]` and `nums[n - 1]` will occur in more than one subarray of size `k`. Hence, the answer is the largest of `nums[0]` and `nums[n - 1]` if they both occur exactly once in the array. If one of them occurs more than once, return the other. If both of them occur more than once, return -1.


**Similar Questions:**
1. [268. Missing Number](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/00268-missing-number)


**Solution:**

We implemented a solution that efficiently finds the largest integer appearing in exactly one subarray of size `k` within the given array. Our approach handles three distinct cases based on the relationship between `k` and the array length `n`, leveraging frequency counting and the unique properties of subarray boundaries to optimize the search.

## Approach

- **Case 1 (k = 1)**: Count the frequency of each element using `array_count_values()` and return the maximum value that appears exactly once
- **Case 2 (k = n)**: Return the maximum value in the entire array since there's only one subarray (the whole array)
- **Case 3 (1 < k < n)**: Only the first and last elements of the array can appear in exactly one subarray of size `k`; all other elements appear in multiple subarrays
- **Optimization**: For Case 3, check if the first and last elements appear exactly once in the entire array using frequency counts
- **Edge Cases**: Handle scenarios where no integer satisfies the condition by returning `-1`

Let's implement this solution in PHP: **[3471. Find the Largest Almost Missing Integer](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003471-find-the-largest-almost-missing-integer/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @param Integer $k
 * @return Integer
 */
function largestInteger(array $nums, int $k): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo largestInteger([3,9,2,1,7], 3) .  "\n";            // Output: 7
echo largestInteger([3,9,7,2,1,7], 4) .  "\n";          // Output: 3
echo largestInteger([0,0], 1) .  "\n";                  // Output: -1
echo largestInteger([1,2,3,4,5], 1) .  "\n";            // Output: 5
echo largestInteger([5,5,5,5,5], 5) .  "\n";            // Output: 5
echo largestInteger([1,2,3,4], 2) .  "\n";              // Output: 4
echo largestInteger([2,2,2], 2) .  "\n";                // Output: -1
echo largestInteger([1,2,1,3,4,3], 2) .  "\n";          // Output: 4
?>
```

### Explanation:

- **Frequency Counting**: We use `array_count_values()` to create a frequency map of all elements in O(n) time, which is crucial for determining if elements appear exactly once
- **Subarray Analysis for k = 1**: Each element appears in exactly one subarray (itself), so we need elements with frequency exactly 1 in the entire array
- **Subarray Analysis for k = n**: Only one subarray exists (the entire array), so every element appears once; we return the maximum
- **Boundary Element Property**: For `1 < k < n`, the first element `nums[0]` appears only in the first subarray, and `nums[n-1]` appears only in the last subarray. All middle elements appear in 2 or more subarrays
- **Candidate Selection**: In Case 3, we only consider `nums[0]` and `nums[n-1]` as potential candidates, checking if their total frequency in the array is exactly 1
- **Result Determination**: We compare candidates and return the maximum value, or `-1` if no valid candidates exist

## Complexity Analysis

- **Time Complexity**: _**O(n)**_ where n is the length of `nums`, as we perform a single pass for frequency counting and constant-time operations for each case
- **Space Complexity**: _**O(n)**_ in the worst case for the frequency hash map (when all elements are distinct), and _**O(1)**_ for the remaining operations

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**