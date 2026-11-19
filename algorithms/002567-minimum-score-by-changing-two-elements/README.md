2567\. Minimum Score by Changing Two Elements

**Difficulty:** Medium

**Topics:** `Senior`, `Array`, `Greedy`, `Sorting`, `Biweekly Contest 98`

You are given an integer array `nums`.

- The **low** score of `nums` is the **minimum** absolute difference between any two integers.
- The **high** score of `nums` is the **maximum** absolute difference between any two integers.
- The **score** of `nums` is the sum of the **high** and **low** scores.

Return _the **minimum score** after **changing two elements** of `nums`_.

**Example 1:**

- **Input:** nums = [1,4,7,8,5]
- **Output:** 3
- **Explanation:**
  - Change `nums[0]` and `nums[1]` to be 6 so that `nums` becomes [6,6,7,8,5].
  - The low score is the minimum absolute difference: |6 - 6| = 0.
  - The high score is the maximum absolute difference: |8 - 5| = 3.
  - The sum of high and low score is 3.


**Example 2:**

- **Input:** nums = [1,4,3]
- **Output:** 0
- **Explanation:**
  - Change `nums[1]` and `nums[2]` to 1 so that `nums` becomes [1,1,1].
  - The sum of maximum absolute difference and minimum absolute difference is 0.

**Example 3:**

- **Input:** nums = [1,2,3,4,5]
- **Output:** 2

**Example 4:**

- **Input:** nums = [10,20,30,40]
- **Output:** 10

**Example 5:**

- **Input:** nums = [1,1,1,1]
- **Output:** 0

**Example 6:**

- **Input:** nums = [5,5,9,9,20]
- **Output:** 4


**Constraints:**

- `3 <= nums.length <= 10⁵`
- `1 <= nums[i] <= 10⁹`


**Hint:**

1. Changing the minimum or maximum values will only minimize the score.
2. Think about what all possible pairs of minimum and maximum values can be changed to form the minimum score.


**Solution:**

We sort the array, force the low score to `0` by assigning the two changed elements to an existing value, and minimize the high score by considering the three possible ways to remove two extreme elements. The answer is the minimum of three candidate ranges.

## Approach

- Sort `nums` in ascending order.
- The low score can always be made `0` by changing two elements to the same value as an existing element.
- Therefore, only the high score matters: minimize the remaining range after changing two elements.
- Since changing interior elements does not help reduce the range, the two changed elements should come from the extremes.
- Check the three exhaustive possibilities:
  - Change the two largest elements: remaining range is `nums[n-3] - nums[0]`.
  - Change one smallest and one largest element: remaining range is `nums[n-2] - nums[1]`.
  - Change the two smallest elements: remaining range is `nums[n-1] - nums[2]`.
- Return the minimum of these three values.

Let's implement this solution in PHP: **[2567. Minimum Score by Changing Two Elements](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002567-minimum-score-by-changing-two-elements/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function minimizeSum(array $nums): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo minimizeSum([1,4,7,8,5]) . "\n";           // Output: 3
echo minimizeSum([1,4,3]) . "\n";               // Output: 0
echo minimizeSum([1,2,3,4,5]) . "\n";           // Output: 2
echo minimizeSum([10,20,30,40]) . "\n";         // Output: 10
echo minimizeSum([1,1,1,1]) . "\n";             // Output: 0
echo minimizeSum([5,5,9,9,20]) . "\n";          // Output: 4
?>
```

## Explanation

- After sorting, the high score is determined only by the smallest and largest remaining values.
- Changing two elements gives us the ability to eliminate up to two extreme values.
- Any optimal solution must eliminate elements from either the left end, the right end, or both ends.
- For each candidate, set the changed elements equal to an existing remaining value. This makes the low score `0` without increasing the high score.
- Thus, the total score equals the candidate high score, and taking the minimum over the three candidates gives the optimal answer.
- The provided PHP code implements this correctly using `sort()` and `min()`.

## Complexity Analysis

- Time Complexity: `O(n log n)` due to sorting.
- Space Complexity: `O(1)` extra space, ignoring the internal space used by the sorting algorithm; depending on the sort implementation, it may be `O(log n)`.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**