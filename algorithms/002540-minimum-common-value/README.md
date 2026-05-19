2540\. Minimum Common Value

**Difficulty:** Easy

**Topics:** `Mid Level`, `Array`, `Hash Table`, `Two Pointers`, `Binary Search`, `Biweekly Contest 96`

Given two integer arrays `nums1` and `nums2`, sorted in non-decreasing order, return the **minimum integer common** to both arrays. If there is no common integer amongst `nums1` and `nums2`, return `-1`.

Note that an integer is said to be **common** to `nums1` and `nums2` if both arrays have **at least one** occurrence of that integer.

**Example 1:**

- **Input:** nums1 = [1,2,3], nums2 = [2,4]
- **Output:** 2
- **Explanation:** The smallest element common to both arrays is 2, so we return 2.

**Example 2:**

- **Input:** nums1 = [1,2,3,6], nums2 = [2,3,4,5]
- **Output:** 2
- **Explanation:** There are two common elements in the array 2 and 3 out of which 2 is the smallest, so 2 is returned.

**Example 3:**

- **Input:** nums1 = [1,2,3], nums2 = [4,5,6]

**Example 4:**

- **Input:** nums1 = [1,1,2,3], nums2 = [1,2,2,4]
- **Output:** 1

**Constraints:**

- `1 <= nums1.length, nums2.length <= 10⁵`
- `1 <= nums1[i], nums2[j] <= 10⁹`
- Both `nums1` and `nums2` are sorted in **non-decreasing** order.



**Hint:**
1. Try to use a set.
2. Otherwise, try to use a two-pointer approach.



**Similar Questions:**
1. [349. Intersection of Two Arrays](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000349-intersection-of-two-arrays)
2. [350. Intersection of Two Arrays II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000350-intersection-of-two-arrays-ii)






**Solution:**

The solution finds the smallest common integer between two **sorted** arrays using a **two-pointer technique**. It walks through both arrays simultaneously, moving the pointer of the smaller value forward until a match is found or one array is exhausted. This approach is efficient and avoids the overhead of using a hash set.

### Approach:

- **Two-pointer technique** Since both arrays are already sorted in non-decreasing order, we can traverse them with two indices.
- **Parallel traversal**  
  - Compare elements at the current pointers:
    - If equal → return that value (it’s the smallest common because we move forward from the beginning).
    - If `nums1[i] < nums2[j]` → increment `i`.
    - If `nums1[i] > nums2[j]` → increment `j`.
- **Early exit** The first match is automatically the smallest common value.
- **No match case** If pointers reach the end without a match, return `-1`.

Let's implement this solution in PHP: **[2540. Minimum Common Value](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002540-minimum-common-value/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums1
 * @param Integer[] $nums2
 * @return Integer
 */
function getCommon(array $nums1, array $nums2): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo getCommon([1,2,3], [2,4]) . "\n";                  // Output: 2
echo getCommon([1,2,3,6], [2,3,4,5]) . "\n";            // Output: 2
echo getCommon([1,2,3], [4,5,6]) . "\n";                // Output: -1
echo getCommon([1,1,2,3], [1,2,2,4]) . "\n";            // Output: 1
?>
```

### Explanation:

- **Initialize pointers** `i = 0`, `j = 0` to traverse `nums1` and `nums2` from the start.
- **Loop until one array is fully traversed** — because if one array ends, no more matches are possible.
- **Compare current elements**:
   - If equal → immediate return (guaranteed smallest due to sorted order and sequential traversal).
   - If `nums1[i]` smaller → move `i` forward to try and match the larger element in `nums2`.
   - If `nums2[j]` smaller → move `j` forward to try and match the larger element in `nums1`.
- **Exit loop** → no common value found, return `-1`.

### Complexity
- **Time Complexity**: _**O(n + m)**_ — each pointer moves at most `n` or `m` steps, where `n = len(nums1)`, `m = len(nums2)`.
- **Space Complexity**: _**O(1)**_ — only a constant amount of extra space is used (two pointers).

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**