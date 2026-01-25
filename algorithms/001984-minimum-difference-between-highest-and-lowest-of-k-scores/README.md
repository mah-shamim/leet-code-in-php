1984\. Minimum Difference Between Highest and Lowest of K Scores

**Difficulty:** Easy

**Topics:** `Array`, `Sliding Window`, `Sorting`, `Weekly Contest 256`

You are given a **0-indexed** integer array `nums`, where `nums[i]` represents the score of the `iᵗʰ` student. You are also given an integer `k`.

Pick the scores of any `k` students from the array so that the **difference** between the **highest** and the **lowest** of the `k` scores is **minimized**.

Return _the **minimum** possible difference_.

**Example 1:**

- **Input:** nums = [90], k = 1
- **Output:** 0
- **Explanation:** There is one way to pick score(s) of one student:
  - [**<ins>90</ins>**]. The difference between the highest and lowest score is 90 - 90 = 0.
    The minimum possible difference is 0.

**Example 2:**

- **Input:** nums = [9,4,1,7], k = 2
- **Output:** 2
- **Explanation:** There are six ways to pick score(s) of two students:
  - [**<ins>9</ins>**,**<ins>4</ins>**,1,7]. The difference between the highest and lowest score is 9 - 4 = 5.
  - [**<ins>9</ins>**,4,**<ins>1</ins>**,7]. The difference between the highest and lowest score is 9 - 1 = 8.
  - [**<ins>9</ins>**,4,1,**<ins>7</ins>**]. The difference between the highest and lowest score is 9 - 7 = 2.
  - [9,**<ins>4</ins>**,**<ins>1</ins>**,7]. The difference between the highest and lowest score is 4 - 1 = 3.
  - [9,**<ins>4</ins>**,1,**<ins>7</ins>**]. The difference between the highest and lowest score is 7 - 4 = 3.
  - [9,4,**<ins>1</ins>**,**<ins>7</ins>**]. The difference between the highest and lowest score is 7 - 1 = 6.
    The minimum possible difference is 2.

**Constraints:**

- `1 <= k <= nums.length <= 1000`
- `0 <= nums[i] <= 10⁵`



**Hint:**
1. For the difference between the highest and lowest element to be minimized, the k chosen scores need to be as close to each other as possible.
2. What if the array was sorted?
3. After sorting the scores, any contiguous k scores are as close to each other as possible.
4. Apply a sliding window solution to iterate over each contiguous k scores, and find the minimum of the differences of all windows.



**Similar Questions:**
1. [561. Array Partition](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000561-array-partition)






**Solution:**

We'll implement a solution that sorts the array first, then uses a sliding window approach to find the minimum difference among k consecutive elements.

### Approach:

1. **Sorting**:
   - First, sort the array `nums` in non-decreasing order. This ensures that scores that are close to each other are grouped together.

2. **Sliding Window**:
   - Use a sliding window of size `k` over the sorted array. For each window, calculate the difference between the maximum (last element) and minimum (first element).
   - Track the smallest difference across all windows.

3. **Edge Cases**:
   - If `k` equals 1, the difference is always 0, as the highest and lowest score are the same.
   - If `k` equals the length of `nums`, the difference is simply the difference between the largest and smallest elements in the entire array.

Let's implement this solution in PHP: **[1984. Minimum Difference Between Highest and Lowest of K Scores](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001984-minimum-difference-between-highest-and-lowest-of-k-scores/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @param Integer $k
 * @return Integer
 */
function minimumDifference(array $nums, int $k): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo minimumDifference([90], 1) . "\n";             // Output: 0
echo minimumDifference([9,4,1,7], 2) . "\n";        // Output: 2
?>
```

### Explanation:

- **Why Sorting?**  
  Sorting brings similar values together, ensuring that any `k` consecutive elements are as close as possible, which minimizes their range.

- **Why Sliding Window?**  
  After sorting, the optimal set of `k` scores must be contiguous. By sliding a window of size `k`, we efficiently check every possible contiguous group, avoiding the need to consider non-contiguous combinations.

- **Complexity**:
   - **Time Complexity**: _**O(n log n)**_ due to sorting. The sliding window pass takes _**O(n)**_.
   - **Space Complexity**: _**O(1)**_ additional space, as sorting is done in-place.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**