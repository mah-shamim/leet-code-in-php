3875\. Construct Uniform Parity Array I

**Difficulty:** Easy

**Topics:** `Mid Level`, `Array`, `Math`, `Weekly Contest 494`

You are given an array `nums1` of n **distinct** integers.

You want to construct another array `nums2` of length `n` such that the elements in `nums2` are either **all odd or all even**.

For each index `i`, you must choose **exactly one** of the following (in any order):

- `nums2[i] = nums1[i]`
- `nums2[i] = nums1[i] - nums1[j], for an index j != i`

Return _`true` if it is possible to construct such an array_, otherwise, return _`false`_.

**Example 1:**

- **Input:** nums1 = [2,3]
- **Output:** true
- **Explanation:**
  - Choose `nums2[0] = nums1[0] - nums1[1] = 2 - 3 = -1`.
  - Choose `nums2[1] = nums1[1] = 3`.
  - `nums2 = [-1, 3]`, and both elements are odd. Thus, the answer is `true`.


**Example 2:**

- **Input:** nums1 = [4,6]
- **Output:** true
- **Explanation:**
  - Choose `nums2[0] = nums1[0] = 4`.
  - Choose `nums2[1] = nums1[1] = 6`.
  - `nums2 = [4, 6]`, and all elements are even. Thus, the answer is `true`.


**Example 3:**

- **Input:** nums1 = [1, 3, 5]
- **Output:** true


**Example 4:**

- **Input:** nums1 = [2, 4, 6]
- **Output:** true


**Example 5:**

- **Input:** nums1 = [1, 2, 3]
- **Output:** true


**Example 6:**

- **Input:** nums1 = [5]
- **Output:** true


**Example 7:**

- **Input:** nums1 = [2]
- **Output:** true


**Example 8:**

- **Input:** nums1 = [1, 4, 7, 10]
- **Output:** true


**Example 9:**

- **Input:** nums1 = [3, 6, 9, 12]
- **Output:** true


**Example 10:**

- **Input:** nums1 = [100, 99]
- **Output:** true


**Constraints:**

- `1 <= n == nums1.length <= 100`
- `1 <= nums1[i] <= 100`
- `nums1` consists of distinct integers.


**Hint:**
1. There is only one possible answer.


**Solution:**

We have determined that the construction of `nums2` is **always possible** for any valid input array `nums1` of distinct integers. The key insight is that we have enough flexibility in choosing either the original value or a difference with another element to force all elements in `nums2` to share the same parity. The parity of a difference between two numbers is determined solely by their parity relationship, and since we can choose a different `j` for each `i` (or even use the same `j` for multiple `i`), we can always achieve uniform parity.

## Approach

- **Observation:** The operation `nums1[i] - nums1[j]` changes the parity of `nums2[i]` based on the parity of `nums1[j]`:
   - If `nums1[i]` and `nums1[j]` have the same parity, their difference is even.
   - If they have different parity, their difference is odd.
- **Base Case:** For any `i`, we can always choose `nums2[i] = nums1[i]`, preserving its original parity.
- **Strategy:** We can choose to make all elements either odd or even by:
   - If all numbers are already even, keep them all as even.
   - If all numbers are already odd, keep them all as odd.
   - If there is a mix of even and odd numbers, we can use differences to flip parity for some elements.
- **Critical Insight:** With at least one even and one odd number in `nums1`, for any index `i`:
   - If `nums1[i]` is even, we can make it odd by subtracting an odd number (`nums1[j]` where `nums1[j]` is odd).
   - If `nums1[i]` is odd, we can make it even by subtracting an even number (`nums1[j]` where `nums1[j]` is even).
   - Therefore, we can choose the parity for each element independently, and we can choose all elements to be odd or all to be even.
- **Edge Cases:** When `n = 1`, there is no `j != i`, so we must use `nums2[0] = nums1[0]`. This single element is trivially uniform (both all odd or all even), so the answer is always `true`.

Let's implement this solution in PHP: **[3875. Construct Uniform Parity Array I](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003875-construct-uniform-parity-array-i/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums1
 * @return Boolean
 */
function uniformArray($c, $connections, $queries) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo uniformArray([2, 3]) .  "\n";              // Output: true
echo uniformArray([4, 6]) .  "\n";              // Output: true
echo uniformArray([1, 3, 5]) .  "\n";           // Output: true
echo uniformArray([2, 4, 6]) .  "\n";           // Output: true
echo uniformArray([1, 2, 3]) .  "\n";           // Output: true
echo uniformArray([5]) .  "\n";                 // Output: true
echo uniformArray([2]) .  "\n";                 // Output: true
echo uniformArray([1, 4, 7, 10]) .  "\n";       // Output: true
echo uniformArray([3, 6, 9, 12]) .  "\n";       // Output: true
echo uniformArray([100, 99]) .  "\n";           // Output: true
?>
```

### Explanation:
- **Step 1:** Check if all elements in `nums1` are even → choose `nums2[i] = nums1[i]` for all `i` → all even → `true`.
- **Step 2:** Check if all elements in `nums1` are odd → choose `nums2[i] = nums1[i]` for all `i` → all odd → `true`.
- **Step 3:** If there is a mix of even and odd numbers in `nums1`:
   - Let `E` be an even element and `O` be an odd element from `nums1`.
   - For any index `i`:
      - To make `nums2[i]` even:
         - If `nums1[i]` is even → use `nums2[i] = nums1[i]` (even).
         - If `nums1[i]` is odd → use `nums2[i] = nums1[i] - E` (odd - even = odd? Wait, odd - even = odd, that's not even). Actually: odd - even = odd, not even. Let's correct:
            - For odd `nums1[i]`, to get even: use `nums2[i] = nums1[i] - O`? No, odd - odd = even. So use `nums2[i] = nums1[i] - O` where `O` is an odd element.
      - To make `nums2[i]` odd:
         - If `nums1[i]` is odd → use `nums2[i] = nums1[i]` (odd).
         - If `nums1[i]` is even → use `nums2[i] = nums1[i] - O` (even - odd = odd).
- **Step 4:** Since we can always choose the appropriate operation for each index independently, we can construct `nums2` with all elements being either odd or even.
- **Step 5:** Therefore, the answer is always `true` for all valid inputs.

## Complexity Analysis

- **Time Complexity:** _**O(1)**_ - The solution performs no iterative operations over the array; it simply returns `true`.
- **Space Complexity:** _**O(1)**_ - No additional data structures are used.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**