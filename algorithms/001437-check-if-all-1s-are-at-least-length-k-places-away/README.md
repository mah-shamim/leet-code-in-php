1437\. Check If All 1's Are at Least Length K Places Away

**Difficulty:** Easy

**Topics:** `Array`, `Weekly Contest 187`

Given an binary array `nums` and an integer `k`, return _`true` if all `1`'s are at least `k` places away from each other, otherwise return `false`_.

**Example 1:**

![sample_1_1791](https://assets.leetcode.com/uploads/2020/04/15/sample_1_1791.png)

- **Input:** nums = [1,0,0,0,1,0,0,1], k = 2
- **Output:** true
- **Explanation:** Each of the 1s are at least 2 places away from each other.

**Example 2:**

![sample_2_1791](https://assets.leetcode.com/uploads/2020/04/15/sample_2_1791.png)

- **Input:** nums = [1,0,0,1,0,1], k = 2
- **Output:** false
- **Explanation:** The second 1 and third 1 are only one apart from each other.

**Constraints:**

- `1 <= nums.length <= 10⁵`
- `0 <= k <= nums.length`
- `nums[i]` is `0` or `1`



**Hint:**
1. Each time you find a number 1, check whether or not it is K or more places away from the next one. If it's not, return false.



**Similar Questions:**
1. [2365. Task Scheduler II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002365-task-scheduler-ii)






**Solution:**

We need to determine if all the 1's in a given binary array are at least `k` places away from each other. The solution involves iterating through the array, tracking the positions of the 1's, and checking the distance between consecutive 1's to ensure they meet the required separation.

### Approach:

1. **Initialization**: We initialize a variable to keep track of the last index where a 1 was found. Initially, this is set to `-1` to indicate that no 1 has been encountered yet.
2. **Iteration**: We iterate through each element of the array. For each element that is 1:
   - If this is not the first 1 encountered (i.e., `lastOneIndex` is not `-1`), we check the distance between the current 1 and the previous 1. The distance is calculated as `currentIndex - lastOneIndex - 1`. If this distance is less than `k`, we immediately return `false`.
   - Update `lastOneIndex` to the current index.
3. **Completion**: If we complete the iteration without finding any pair of 1's that are too close, we return `true`.

Let's implement this solution in PHP: **[1437. Check If All 1's Are at Least Length K Places Away](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001437-check-if-all-1s-are-at-least-length-k-places-away/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @param Integer $k
 * @return Boolean
 */
function kLengthApart($nums, $k) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo kLengthApart([1,0,0,0,1,0,0,1], 2) . "\n"; // Output: true
echo kLengthApart([1,0,0,1,0,1], 2) . "\n";     // Output: false4
?>
```

### Explanation:

- **Initialization**: `lastOneIndex` is initialized to `-1` to indicate that no 1 has been found yet.
- **Loop Through Array**: For each element in the array:
   - If the element is 1, check if a previous 1 was found. If so, calculate the number of elements between the current and previous 1. If this count is less than `k`, return `false`.
   - Update `lastOneIndex` to the current index if the element is 1.
- **Return Result**: If the loop completes without returning `false`, all 1's are sufficiently spaced, so return `true`.

This approach efficiently checks the required condition in a single pass through the array, ensuring optimal performance with a time complexity of O(n), where n is the length of the input array. The space complexity is O(1) as only a few variables are used.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**