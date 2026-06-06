2574\. Left and Right Sum Differences

**Difficulty:** Easy

**Topics:** `Mid Level`, `Array`, `Prefix Sum`, `Weekly Contest 334`

You are given a **0-indexed** integer array `nums` of size `n`.

Define two arrays `leftSum` and `rightSum` where:

- `leftSum[i]` is the sum of elements to the left of the index `i` in the array `nums`. If there is no such element, `leftSum[i] = 0`.
- `rightSum[i]` is the sum of elements to the right of the index `i` in the array `nums`. If there is no such element, `rightSum[i] = 0`.

Return an integer array `answer` of size `n` where `answer[i] = |leftSum[i] - rightSum[i]|`.

**Example 1:**

- **Input:** nums = [10,4,8,3]
- **Output:** [15,1,11,22]
- **Explanation:**
  - The array leftSum is [0,10,14,22] and the array rightSum is [15,11,3,0].
  - The array answer is [|0 - 15|,|10 - 11|,|14 - 3|,|22 - 0|] = [15,1,11,22].

**Example 2:**

- **Input:** nums = [1]
- **Output:** [0]
- **Explanation:** 
  - The array leftSum is [0] and the array rightSum is [0].
  - The array answer is [|0 - 0|] = [0].


**Constraints:**

- `1 <= nums.length <= 1000`
- `1 <= nums[i] <= 10⁵`



**Hint:**
1. For each index `i`, maintain two variables `leftSum` and `rightSum`.
2. Iterate on the range `j: [0 … i - 1]` and add `nums[j]` to the `leftSum` and similarly iterate on the range `j: [i + 1 … nums.length - 1]` and add `nums[j]` to the `rightSum`.



**Similar Questions:**
1. [724. Find Pivot Index](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000724-find-pivot-index)
2. [1991. Find the Middle Index in Array](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001991-find-the-middle-index-in-array)
3. [2670. Find the Distinct Difference Array](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002670-find-the-distinct-difference-array)
4. [3179. Find the N-th Value After K Seconds](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003179-find-the-n-th-value-after-k-seconds)






**Solution:**

The solution computes the absolute difference between the sum of elements to the left and the sum of elements to the right for each index in the array. It uses prefix and suffix sums to achieve this efficiently without nested loops.

### Approach:

- Use prefix sums to calculate `leftSum[i]` as the sum of all elements before index `i`.
- Use suffix sums to calculate `rightSum[i]` as the sum of all elements after index `i`.
- For each index `i`, compute the absolute difference between `leftSum[i]` and `rightSum[i]`.

Let's implement this solution in PHP: **[2574. Left and Right Sum Differences](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002574-left-and-right-sum-differences/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer[]
 */
function leftRightDifference(array $nums): array
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo leftRightDifference([10,4,8,3]) . "\n";        // Output: [15,1,11,22]
echo leftRightDifference([1]) . "\n";               // Output: [0]
?>
```

### Explanation:

- Create arrays `leftSum` and `rightSum` of the same length as `nums`, initialized to `0`.
- First pass from left to right:
   - `leftSum[i] = leftSum[i-1] + nums[i-1]`
   - This accumulates sums of elements before the current index.
- Second pass from right to left:
   - `rightSum[i] = rightSum[i+1] + nums[i+1]`
   - This accumulates sums of elements after the current index.
- Third pass through indices:
   - Compute `answer[i] = |leftSum[i] - rightSum[i]|`
- Return the `answer` array.

### Complexity
- **Time Complexity**: _**O(n)**_ — each element is processed three times (once for left sum, once for right sum, once for answer).
- **Space Complexity**: _**O(n)**_ — two extra arrays of size `n` are used for left and right sums.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**