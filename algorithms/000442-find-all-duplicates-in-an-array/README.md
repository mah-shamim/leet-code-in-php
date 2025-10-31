442\. Find All Duplicates in an Array

**Difficulty:** Medium

**Topics:** `Array`, `Hash Table`

Given an integer array `nums` of length `n` where all the integers of `nums` are in the range `[1, n]` and each integer appears **at most twice**, return _an array of all the integers that appears **twice**_.

You must write an algorithm that runs in `O(n)` time and uses only _constant_ auxiliary space, excluding the space needed to store the output

**Example 1:**

- **Input:** nums = [4,3,2,7,8,2,3,1]
- **Output:** [2,3]

**Example 2:**

- **Input:** nums = [1,1,2]
- **Output:** [1]

**Example 3:**

- **Input:** nums = [1]
- **Output:** []

**Constraints:**

- `n == nums.length`
- `1 <= n <= 10⁵`
- `1 <= nums[i] <= n`
- Each element in `nums` appears **once** or **twice**.



**Similar Questions:**
1. [448. Find All Numbers Disappeared in an Array](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000448-find-all-numbers-disappeared-in-an-array)
2. [2615. Sum of Distances](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002615-sum-of-distances)
3. [3289. The Two Sneaky Numbers of Digitville](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003289-the-two-sneaky-numbers-of-digitville)






**Solution:**

We need to find all numbers that appear exactly twice in an array where all numbers are between 1 and n, and each appears at most twice.

The key constraints are:
- O(n) time complexity
- Constant auxiliary space (excluding output)
- Numbers range from 1 to n

**Approach:**
Since all numbers are positive and between 1 and n, I can use the array itself as a marker. For each number, I'll treat it as an index (after adjusting for 0-based indexing) and mark the position as visited by making it negative. If I encounter a number that's already negative, it means I've seen it before.

Let's implement this solution in PHP: **[442. Find All Duplicates in an Array](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000442-find-all-duplicates-in-an-array/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer[]
 */
function findDuplicates($nums) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
print_r(findDuplicates([4,3,2,7,8,2,3,1])); // [2,3]
print_r(findDuplicates([1,1,2]));           // [1]
print_r(findDuplicates([1]));               // []
?>
```

### Explanation:

1. **Use the array as a marker:** Since all numbers are between 1 and n, we can use the array indices (0 to n-1) to track which numbers we've seen.
2. **Mark visited numbers:** For each number, we look at the position `num - 1`. If the value at that position is positive, we mark it as visited by making it negative.
3. **Detect duplicates:** If we encounter a number where the value at position `num - 1` is already negative, it means we've seen this number before, so we add it to our result.

**Example walkthrough with [4,3,2,7,8,2,3,1]:**
- Process 4: Look at index 3 (value 7), mark it as -7
- Process 3: Look at index 2 (value 2), mark it as -2
- Process 2: Look at index 1 (value 3), mark it as -3
- Process 7: Look at index 6 (value 3), mark it as -3
- Process 8: Look at index 7 (value 1), mark it as -1
- Process 2: Look at index 1 (value -3, already negative) → found duplicate 2
- Process 3: Look at index 2 (value -2, already negative) → found duplicate 3
- Process 1: Look at index 0 (value 4), mark it as -4

**Result:** [2, 3]

**Time Complexity:** O(n) - single pass through the array
**Space Complexity:** O(1) auxiliary space (excluding the output array)

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**

#2365, #2366 leetcode problems 000442-find-all-duplicates-in-an-array submissions 1816838318

Thanks for solving the problem of "Find All Duplicates in an Array"