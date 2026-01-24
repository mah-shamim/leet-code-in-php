1877\. Minimize Maximum Pair Sum in Array

**Difficulty:** Medium

**Topics:** `Array`, `Two Pointers`, `Greedy`, `Sorting`, `Biweekly Contest 53`

The **pair sum** of a pair `(a,b)` is equal to `a + b`. The **maximum pair sum** is the largest **pair sum** in a list of pairs.
- For example, if we have pairs `(1,5)`, `(2,3)`, and `(4,4)`, the **maximum pair sum** would be `max(1+5, 2+3, 4+4) = max(6, 5, 8) = 8`.

Given an array `nums` of **even** length `n`, pair up the elements of `nums` into `n / 2` pairs such that:
- Each element of `nums` is in **exactly one** pair, and
- The **maximum pair sum** is **minimized**.

Return _the minimized **maximum pair sum** after optimally pairing up the elements_.

**Example 1:**

- **Input:** nums = [3,5,2,3]
- **Output:** 7
- **Explanation:** The elements can be paired up into pairs (3,3) and (5,2).
  The maximum pair sum is max(3+3, 5+2) = max(6, 7) = 7.

**Example 2:**

- **Input:** nums = [3,5,4,2,4,6]
- **Output:** 8
- **Explanation:** The elements can be paired up into pairs (3,5), (4,4), and (6,2).
  The maximum pair sum is max(3+5, 4+4, 6+2) = max(8, 8, 8) = 8.

**Constraints:**

- `n == nums.length`
- `2 <= n <= 10⁵`
- `n` is **even**.
- `1 <= nums[i] <= 10⁵`



**Hint:**
1. Would sorting help find the optimal order?
2. Given a specific element, how would you minimize its specific pairwise sum?






**Solution:**

We are given an array of even length. We need to pair all elements into `n/2` pairs such that the maximum sum of any pair is minimized.
We want to minimize the maximum pair sum. Intuition: if we pair the largest with the smallest, then the maximum pair sum might be high because the largest is paired with a small number, but then the second largest might be paired with the second smallest, etc.

### Approach:

1. **Sort the array** in ascending order
2. **Pair the smallest element with the largest element**, the second smallest with the second largest, and so on
3. **Track the maximum pair sum** encountered during this pairing process
4. **Return the maximum pair sum**

Let's implement this solution in PHP: **[1877. Minimize Maximum Pair Sum in Array](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001877-minimize-maximum-pair-sum-in-array/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function minPairSum(array $nums): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo minPairSum([3,5,2,3]) . "\n";              // Output: 7
echo minPairSum([5, 4, 3, 2, 1]) . "\n";        // Output: 8
?>
```

### Explanation:

1. **Sorting**: First, we sort the array. This allows us to easily pair the smallest elements with the largest ones.

2. **Two-pointer approach**:
   - We use a loop that runs for half the array length (n/2 iterations)
   - For each iteration `i`, we pair `nums[i]` (the i-th smallest element) with `nums[n-1-i]` (the i-th largest element)
   - This strategy ensures that we don't pair two large numbers together, which would create a very large pair sum

3. **Track maximum**: We keep track of the maximum pair sum encountered and return it at the end.

### Complexity
- **Time Complexity**:
  - **O(n log n)** due to sorting
  - **O(n)** for the pairing loop
  - Overall: **O(n log n)**
- **Space Complexity**:
  - **O(1)** if we don't count the space used by the sort function (PHP's sort is in-place)
  - **O(log n)** for the recursive stack in the sort algorithm


**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**