1464\. Maximum Product of Two Elements in an Array

**Difficulty:** Easy

**Topics:** `Mid Level`, `Array`, `Sorting`, `Heap (Priority Queue)`, `Weekly Contest 191`

Given the array of integers `nums`, you will choose two different indices `i` and `j` of that array. Return _the maximum value of `(nums[i]-1)*(nums[j]-1)`_.

**Example 1:**

- **Input:** nums = [3,4,5,2]
- **Output:** 12
- **Explanation:** If you choose the indices `i=1` and `j=2` (indexed from 0), you will get the maximum value, that is, `(nums[1]-1)*(nums[2]-1) = (4-1)*(5-1) = 3*4 = 12`.

**Example 2:**

- **Input:** nums = [1,5,4,5]
- **Output:** 16
- **Explanation:** Choosing the indices `i=1` and `j=3` (indexed from 0), you will get the maximum value of `(5-1)*(5-1) = 16`.

**Example 3:**

- **Input:** nums = [3,7]
- **Output:** 12

**Example 4:**

- **Input:** nums = [2,2]
- **Output:** 1

**Example 5:**

- **Input:** nums = [1000,999,1]
- **Output:** 998002

**Example 6:**

- **Input:** nums = [5,5,5,5]
- **Output:** 16

**Example 7:**

- **Input:** nums = [1,2,3,4,5]
- **Output:** 12

**Example 8:**

- **Input:** nums = [10,9,8,7]
- **Output:** 72

**Constraints:**

- `2 <= nums.length <= 500`
- `1 <= nums[i] <= 10³`


**Hint:**
1. Use brute force: two loops to select `i` and `j`, then select the maximum value of `(nums[i]-1)*(nums[j]-1)`.


**Solution:**

We implemented an efficient solution that finds the two largest numbers in the array in a single pass, then computes the maximum product of `(nums[i]-1)*(nums[j]-1)` using these two values. This avoids the _**O(n²)**_ brute force approach and handles all edge cases within the given constraints.

## Approach

- Identify that to maximize `(nums[i]-1)*(nums[j]-1)`, we need the two largest numbers in the array
- Use a single pass to track the largest (`max1`) and second largest (`max2`) values
- Initialize both trackers to the minimum possible integer value
- For each number, update the trackers appropriately:
   - If current number exceeds `max1`, shift `max1` to `max2` and set `max1` to current
   - Else if current number exceeds `max2`, update `max2` only
- Return `(max1 - 1) * (max2 - 1)`

Let's implement this solution in PHP: **[1464. Maximum Product of Two Elements in an Array](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001464-maximum-product-of-two-elements-in-an-array/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function maxProduct(array $nums): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo maxProduct([3,4,5,2]) .  "\n";         // Output: 12
echo maxProduct([1,5,4,5]) .  "\n";         // Output: 16
echo maxProduct([3,7]) .  "\n";             // Output: 12
echo maxProduct([2,2]) .  "\n";             // Output: 1
echo maxProduct([1000,999,1]) .  "\n";      // Output: 998002
echo maxProduct([5,5,5,5]) .  "\n";         // Output: 16
echo maxProduct([1,2,3,4,5]) .  "\n";       // Output: 12
echo maxProduct([10,9,8,7]) .  "\n";        // Output: 72
?>
```

### Explanation:

- **Single-pass tracking**: We only iterate through the array once, making the solution _**O(n)**_ time complexity
- **Two-variable approach**: Since we only need the top two values, we maintain exactly two variables instead of sorting the entire array
- **Minimal memory**: Uses only _**O(1)**_ extra space, regardless of input size
- **Correctness**: The largest product will always come from the two largest numbers because:
   - All numbers are positive `(≥ 1)`
   - Subtracting 1 preserves order (if `a ≥ b`, then `a-1 ≥ b-1`)
   - The product of two larger numbers is always ≥ product involving smaller numbers
- **Edge case handling**: Even if duplicate maximum values exist (e.g., `[5,5]`), the algorithm correctly captures both as `max1` and `max2`

## Complexity Analysis

- **Time Complexity**: _**O(n)**_ – single pass through the array of length `n`
- **Space Complexity**: _**O(1)**_ – only using two integer variables regardless of input size

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**