1458\. Remove Max Number of Edges to Keep Graph Fully Traversable

**Difficulty:** Hard

**Topics:** `Array`, `Dynamic Programming`, `Weekly Contest 190`

Given two arrays `nums1` and `nums2`.

Return the maximum dot product between **non-empty** subsequences of nums1 and nums2 with the same length.

A subsequence of a array is a new array which is formed from the original array by deleting some (can be none) of the characters without disturbing the relative positions of the remaining characters. (ie, `[2,3,5]` is a subsequence of `[1,2,3,4,5]` while `[1,5,3]` is not).

**Example 1:**

- **Input:** nums1 = [2,1,-2,5], nums2 = [3,0,-6]
- **Output:** 18
- **Explanation:** Take subsequence [2,-2] from nums1 and subsequence [3,-6] from nums2.
  Their dot product is (2*3 + (-2)*(-6)) = 18.

**Example 2:**

- **Input:** nums1 = [3,-2], nums2 = [2,-6,7]
- **Output:** 21
- **Explanation:** Take subsequence [3] from nums1 and subsequence [7] from nums2.
  Their dot product is (3*7) = 21.

**Example 3:**

- **Input:** nums1 = [-1,-1], nums2 = [1,1]
- **Output:** -1
- **Explanation:** Take subsequence [-1] from nums1 and subsequence [1] from nums2.
  Their dot product is -1.

**Constraints:**

- `1 <= nums1.length, nums2.length <= 500`
- `-1000 <= nums1[i], nums2[i] <= 1000`



**Hint:**
1. Use dynamic programming, define `DP[i][j]` as the maximum dot product of two subsequences starting in the position `i` of `nums1` and position `j` of `nums2`.






**Solution:**

We need to find two subsequences (one from `nums1`, one from `nums2`) of the same length such that their dot product is maximized. The subsequences don't have to be contiguous, but they must maintain the original order.

### Approach:

1. **Dynamic Programming State Definition**:  
   Define `dp[i][j]` as the maximum dot product achievable using subsequences from `nums1[0..i-1]` and `nums2[0..j-1]`, where `i` and `j` represent the lengths of the considered subsequences.

2. **State Transition**:  
   For each pair `(i, j)`:
   - We can pair `nums1[i-1]` with `nums2[j-1]` and add it to the best result for the previous lengths `(i-1, j-1)`
   - We can start a new subsequence pair with just `nums1[i-1] * nums2[j-1]`
   - We can skip `nums1[i-1]` and take the best from `(i-1, j)`
   - We can skip `nums2[j-1]` and take the best from `(i, j-1)`

3. **Initialization**:  
   Use `INT_MIN` to represent negative infinity, ensuring we always choose valid non-empty subsequences.

4. **Space Optimization**:  
   Use only two rows (`prev` and `curr`) instead of a full 2D array to reduce space complexity to O(n).

5. **Base Cases**:  
   Initialize with `INT_MIN` since dot products can be negative, and we need to ensure we only consider valid non-empty subsequences.

Let's implement this solution in PHP: **[1458. Remove Max Number of Edges to Keep Graph Fully Traversable](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001458-max-dot-product-of-two-subsequences/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums1
 * @param Integer[] $nums2
 * @return Integer
 */
function maxDotProduct(array $nums1, array $nums2): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo maxDotProduct([2,1,-2,5], [3,0,-6]) . "\n";        // Output: 18
echo maxDotProduct([3,-2], [2,-6,7]) . "\n";            // Output: 21
echo maxDotProduct([-1,-1], [1,1]) . "\n";              // Output: -1
?>
```

### Explanation:

1. **Problem Interpretation**:  
   We need to find subsequences (not necessarily contiguous) of equal length from two arrays that maximize their dot product. The subsequences must be non-empty.

2. **Key Observations**:
   - We can skip elements in either array when forming subsequences
   - The optimal solution may pair elements in different orders than their original positions
   - Negative numbers complicate the problem because:
      - A negative product might be necessary if all elements are negative
      - We might need to skip some negative products to get a better overall result

3. **Dynamic Programming Reasoning**:
   - `dp[i][j]` considers the first `i` elements of `nums1` and first `j` elements of `nums2`
   - At each step, we have four choices:
      1. Take the current pair and add to previous best: `dp[i-1][j-1] + product`
      2. Start fresh with just the current pair: `product`
      3. Skip the current element of `nums1`: `dp[i-1][j]`
      4. Skip the current element of `nums2`: `dp[i][j-1]`
   - We take the maximum of these four options

4. **Handling Negative Numbers**:
   - The initialization to `INT_MIN` ensures we don't accidentally consider "empty" subsequences as valid
   - When all products are negative, we must still return the maximum (least negative) product
   - The recurrence naturally handles negative values by always choosing the maximum

5. **Time and Space Complexity**:
   - **Time**: O(m × n) where m and n are lengths of the input arrays
   - **Space**: O(n) using the optimized two-row approach

6. **Example Walkthrough**:  
   For `nums1 = [2,1,-2,5]`, `nums2 = [3,0,-6]`:
   - The optimal subsequences are `[2,-2]` and `[3,-6]`
   - Dot product = (2×3) + (-2×-6) = 6 + 12 = 18
   - The DP table systematically explores all possible pairings to find this maximum

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**