3761\. Minimum Absolute Distance Between Mirror Pairs

**Difficulty:** Medium

**Topics:** `Staff`, `Array`, `Hash Table`, `Math`, `Weekly Contest 478`

You are given an integer array `nums`.

A **mirror pair** is a pair of indices `(i, j)` such that:

- `0 <= i < j < nums.length`, and
- `reverse(nums[i]) == nums[j]`, where `reverse(x)` denotes the integer formed by reversing the digits of `x`. Leading zeros are omitted after reversing, for example `reverse(120) = 21`.

Return the **minimum** absolute distance between the indices of any mirror pair. The absolute distance between indices `i` and `j` is `abs(i - j)`.

If no mirror pair exists, return `-1`.

**Example 1:**

- **Input:** nums = [12,21,45,33,54]
- **Output:** 1
- **Explanation:**
   - The mirror pairs are:
     - (0, 1) since `reverse(nums[0]) = reverse(12) = 21 = nums[1]`, giving an absolute distance `abs(0 - 1) = 1`.
     - (2, 4) since `reverse(nums[2]) = reverse(45) = 54 = nums[4]`, giving an absolute distance `abs(2 - 4) = 2`.
  - The minimum absolute distance among all pairs is 1.

**Example 2:**

- **Input:** nums = [120,21]
- **Output:** 1
- **Explanation:**
  - There is only one mirror pair (0, 1) since `reverse(nums[0]) = reverse(120) = 21 = nums[1]`.
  - The minimum absolute distance is 1.

**Example 3:**

- **Input:** nums = [21,120]
- **Output:** -1
- **Explanation:** There are no mirror pairs in the array.

**Example 4:**

- **Input:** nums = [1,10,100,1,10]
- **Output:** 1

**Constraints:**

- `1 <= nums.length <= 10⁵`
- `1 <= nums[i] <= 10⁹`



**Hint:**
1. Scan left to right with a hash map: for each `nums[i]`, if the map contains key `nums[i]` then set `ans = min(ans, i - map[nums[i]])`.
2. Store/update the current index under key `reverse(nums[i])`, so future matches use the most recent index.






**Solution:**

This solution finds the minimum absolute distance between indices of mirror pairs in an array. A mirror pair consists of two numbers where one is the digit-reversed version of the other. The algorithm uses a single pass with a hash map to track the most recent index of each number's reverse, efficiently finding the smallest index gap in _**O(n)**_ time.

### Approach:

- **Single-pass traversal** with hash map storage
- **Reverse number computation** for each array element
- **Look for existing matches** before storing current index
- **Track minimum distance** by comparing current index with previously stored index of the same number
- **Store current index** under the reversed number key for future matches

Let's implement this solution in PHP: **[3761. Minimum Absolute Distance Between Mirror Pairs](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003761-minimum-absolute-distance-between-mirror-pairs/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function minMirrorPairDistance(array $nums): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo minAbsoluteDistanceMirrorPairs([12, 21, 45, 33, 54]) . "\n";           // Output: 1
echo minAbsoluteDistanceMirrorPairs([120, 21]) . "\n";                      // Output: 1
echo minAbsoluteDistanceMirrorPairs([21, 120]) . "\n";                      // Output: -1
echo minAbsoluteDistanceMirrorPairs([1,10,100,1,10]) . "\n";                // Output: 1
?>
```

### Explanation:

- **Key Insight**: When scanning left to right, if we encounter a number that matches a previously stored reversed number, they form a mirror pair. The reverse of the previous number equals the current number, and vice versa.
- **Hash Map Strategy**: Store each number's latest index under the key equal to its reverse. This ensures that when we later see a number that matches a previously stored reverse, we can calculate the distance immediately.
- **Distance Calculation**: Since we always store the latest index for each reversed number, we minimize the distance for each potential pair. Using `abs(i - j)` simplifies to `i - j` because `i` is always greater than `j` during forward traversal.
- **Edge Cases**:
   - Numbers with trailing zeros (e.g., 120 → 21) are handled correctly by converting to integer after reversal
   - Single-element arrays or arrays with no mirror pairs return -1
   - Multiple occurrences of the same number are handled by overwriting the map entry, which actually helps find smaller gaps

### Complexity
- **Time Complexity**: _**O(n)**_ - single pass through the array with _**O(1)**_ operations per element (reversal of digits is _**O(log₁₀(num)**_) which is effectively constant as _**numbers ≤ 10⁹**_ have at most 10 digits)
- **Space Complexity**: _**O(n)**_ - in worst case, the hash map stores a unique entry for each distinct reversed number in the array


**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**