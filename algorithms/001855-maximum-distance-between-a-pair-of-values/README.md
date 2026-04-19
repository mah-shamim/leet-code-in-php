1855\. Maximum Distance Between a Pair of Values

**Difficulty:** Medium

**Topics:** `Senior`, `Array`, `Two Pointers`, `Binary Search`, `Weekly Contest 240`

You are given two **non-increasing 0-indexed** integer arrays `nums1` and `nums2`.

A pair of indices `(i, j)`, where `0 <= i < nums1.length` and `0 <= j < nums2.length`, is **valid** if both `i <= j` and `nums1[i] <= nums2[j]`. The **distance** of the pair is `j - i`.

Return _the **maximum distance** of any **valid** pair `(i, j)`. If there are no valid pairs, return `0`_.

An array `arr` is **non-increasing** if `arr[i-1] >= arr[i]` for every `1 <= i < arr.length`.

**Example 1:**

- **Input:** nums1 = [55,30,5,4,2], nums2 = [100,20,10,10,5]
- **Output:** 2
- **Explanation:** 
  - The valid pairs are (0,0), (2,2), (2,3), (2,4), (3,3), (3,4), and (4,4).
  - The maximum distance is 2 with pair (2,4).

**Example 2:**

- **Input:** nums1 = [2,2,2], nums2 = [10,10,1]
- **Output:** 1
- **Explanation:** 
  - The valid pairs are (0,0), (0,1), and (1,1).
  - The maximum distance is 1 with pair (0,1).

**Example 3:**

- **Input:** nums1 = [30,29,19,5], nums2 = [25,25,25,25,25]
- **Output:** 2
- **Explanation:** 
  - The valid pairs are (2,2), (2,3), (2,4), (3,3), and (3,4).
  - The maximum distance is 2 with pair (2,4).

**Constraints:**

- `1 <= nums1.length, nums2.length <= 10⁵`
- `1 <= nums1[i], nums2[j] <= 10⁵`
- Both `nums1` and `nums2` are **non-increasing**.



**Hint:**
1. Since both arrays are sorted in a non-increasing way this means that for each value in the first array. We can find the farthest value smaller than it using binary search.
2. There is another solution using a two pointers approach since the first array is non-increasing the farthest `j` such that `nums2[j] ≥ nums1[i]` is at least as far as the farthest `j` such that `nums2[j] ≥ nums1[i-1]`



**Similar Questions:**
1. [2078. Two Furthest Houses With Different Colors](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002078-two-furthest-houses-with-different-colors)






**Solution:**

We need to find the maximum `j - i` such that `i <= j` and `nums1[i] <= nums2[j]`, given both arrays are **non-increasing**.  
The solution uses a **two-pointer technique** to efficiently find the farthest valid `j` for each `i`, leveraging the sorted property to avoid nested loops.

### Approach:

- **Two-pointer traversal**: One pointer `i` for `nums1`, one pointer `j` for `nums2`.
- **Greedy expansion of `j`**: If `nums1[i] <= nums2[j]`, we have a valid pair, so we try to increase `j` to maximize distance.
- **Adjusting `i` when condition fails**: If `nums1[i] > nums2[j]`, we move `i` forward (since arrays are non-increasing, `nums1[i]` will decrease, possibly satisfying condition later).
- **Maintain `j >= i`**: When moving `i` forward, we ensure `j` is at least `i` to keep `j - i` non-negative.

Let's implement this solution in PHP: **[1855. Maximum Distance Between a Pair of Values](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001855-maximum-distance-between-a-pair-of-values/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums1
 * @param Integer[] $nums2
 * @return Integer
 */
function maxDistance(array $nums1, array $nums2): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo maxDistance([55,30,5,4,2], [100,20,10,10,5]) . "\n";           // Output: 2
echo maxDistance([2,2,2], [10,10,1]) . "\n";                        // Output: 1
echo maxDistance([30,29,19,5], [25,25,25,25,25]) . "\n";            // Output: 2
?>
```

### Explanation:

- Start with `i = 0`, `j = 0`, `ans = 0`.
- While `i < n` and `j < m`:
   - **If `nums1[i] <= nums2[j]`**:
      - It's a valid pair, so update `ans = max(ans, j - i)`.
      - Move `j` forward to try to get a larger `j` for same `i`.
   - **Else (`nums1[i] > nums2[j]`)**:
      - Condition fails, so move `i` forward (since `nums1[i]` will decrease, may become `<=` later).
      - If `j < i`, set `j = i` to maintain `j >= i`.
- Return `ans`.

### Complexity
- **Time Complexity**: _**O(n + m)**_, Each pointer moves at most `n + m` times.
- **Space Complexity**: _**O(1)**_, Only a few integer variables used.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**