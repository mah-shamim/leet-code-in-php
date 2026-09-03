3876\. Construct Uniform Parity Array II

**Difficulty:** Medium

**Topics:** `Senior`, `Array`, `Math`, `Weekly Contest 494`

You are given an array `nums1` of `n` **distinct** integers.

You want to construct another array `nums2` of length `n` such that the elements in `nums2` are either **all odd or all even**.

For each index `i`, you must choose **exactly one** of the following (in any order):

- `nums2[i] = nums1[i]`
- `nums2[i] = nums1[i] - nums1[j]`, for an index `j != i`, such that `nums1[i] - nums1[j] >= 1`

Return _`true` if it is possible to construct such an array_, otherwise return _`false`_.

**Example 1:**

- **Input:** nums1 = [1,4,7]
- **Output:** true
- **Explanation:**
  - Set `nums2[0] = nums1[0] = 1`.
  - Set `nums2[1] = nums1[1] - nums1[0] = 4 - 1 = 3`.
  - Set `nums2[2] = nums1[2] = 7`.
  - `nums2 = [1, 3, 7]`, and all elements are odd. Thus, the answer is `true`.


**Example 2:**

- **Input:** nums1 = [2,3]
- **Output:** false
- **Explanation:** It is not possible to construct `nums2` such that all elements have the same parity. Thus, the answer is `false`.

**Example 3:**

- **Input:** nums1 = [4,6]
- **Output:** true
- **Explanation:**
  - Set `nums2[0] = nums1[0] = 4`.
  - Set `nums2[1] = nums1[1] = 6`.
  - `nums2 = [4, 6]`, and all elements are even. Thus, the answer is `true`.

**Example 4:**

- **Input:** nums1 = [11,16]
- **Output:** true

**Example 5:**

- **Input:** nums1 = [2,4,6]
- **Output:** true

**Example 6:**

- **Input:** nums1 = [1,3,5]
- **Output:** true

**Example 7:**

- **Input:** nums1 = [1,2]
- **Output:** true

**Example 8:**

- **Input:** nums1 = [5,10]
- **Output:** true

**Example 9:**

- **Input:** nums1 = [8,9]
- **Output:** false

**Example 10:**

- **Input:** nums1 = [3,6,9]
- **Output:** true


**Constraints:**

- `1 <= n == nums1.length <= 10⁵`
- `1 <= nums1[i] <= 10⁹`
- `nums1` consists of distinct integers.


**Hint:**
1. Try fixing the parity to either all even or all odd.
2. Use the smallest odd/even element if a subtraction is needed to match the chosen parity.


**Solution:**

We solve the problem by checking both possible target parities (all odd or all even) for `nums2`. For each target parity, we determine whether every element in `nums1` can either stay as is (if it already matches the target parity) or be transformed by subtracting the smallest number of the opposite parity, as long as the result remains positive. If either parity works, we return `true`; otherwise, `false`.

## Approach

- **Fix target parity:** Try to make all elements in `nums2` odd, then try to make all even.
- **Key observation:** To change the parity of an element, we must subtract an odd number (since odd – odd = even, even – odd = odd). The best candidate for subtraction is the **smallest odd number** in `nums1`, because using a larger odd number would make the result smaller and could go below 1, making it invalid.
- **Check validity for each parity:**
   - For **all odd**: Any even number must be subtracted by the smallest odd number `minOdd`, and the result must be at least 1.
   - For **all even**: Any odd number must be subtracted by `minOdd` (an odd number) to become even, and the result must be at least 1.
- **Special case:** If there are no odd numbers, all elements are already even, so all-even is trivially possible.

Let's implement this solution in PHP: **[3876. Construct Uniform Parity Array II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003876-construct-uniform-parity-array-ii/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums1
 * @return Boolean
 */
function uniformArray(array $nums1): bool
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo uniformArray([1,4,7]) .  "\n";     // Output: true
echo uniformArray([2,3]) .  "\n";       // Output: false
echo uniformArray([4,6]) .  "\n";       // Output: true
echo uniformArray([11,16]) .  "\n";     // Output: true
echo uniformArray([2,4,6]) .  "\n";     // Output: true
echo uniformArray([1,3,5]) .  "\n";     // Output: true
echo uniformArray([1,2]) .  "\n";       // Output: true
echo uniformArray([5,10]) .  "\n";      // Output: true
echo uniformArray([8,9]) .  "\n";       // Output: false
echo uniformArray([3,6,9]) .  "\n";     // Output: true
?>
```

### Explanation:

- We first find the minimum odd number in `nums1`. This is crucial because subtracting any odd number preserves the parity change but the smallest one gives the largest possible result, avoiding negative or zero values.
- To check **all odd**:
   - Iterate through `nums1`.
   - If a number is already odd, we can keep it as is.
   - If it’s even, we must subtract `minOdd`. If `minOdd` doesn’t exist or `num - minOdd < 1`, this parity fails.
- To check **all even**:
   - If no odd numbers exist, all are even → success.
   - Otherwise, for each odd number, subtract `minOdd`; if the result is less than 1, this parity fails.
- If either check passes, return `true`; else `false`.

## Complexity Analysis

- **Time Complexity:** _**O(n)**_ — We scan the array a constant number of times (to find min odd and to validate each parity).
- **Space Complexity:** _**O(1)**_ — We use only a few extra variables.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**