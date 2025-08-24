1493\. Longest Subarray of 1's After Deleting One Element

**Difficulty:** Medium

**Topics:** `Array`, `Dynamic Programming`, `Sliding Window`, `Biweekly Contest 29`

Given a binary array `nums`, you should delete one element from it.

Return _the size of the longest non-empty subarray containing only `1`'s in the resulting array_. Return _`0` if there is no such subarray_.

**Example 1:**

- **Input:** nums = [1,1,0,1]
- **Output:** 3
- **Explanation:** After deleting the number in position 2, [1,1,1] contains 3 numbers with value of 1's.

**Example 2:**

- **Input:** nums = [0,1,1,1,0,1,1,0,1]
- **Output:** 5
- **Explanation:** After deleting the number in position 4, [0,1,1,1,1,1,0,1] longest subarray with value of 1's is [1,1,1,1,1].

**Example 3:**

- **Input:** nums = [1,1,1]
- **Output:** 2
- **Explanation:** You must delete one element.

**Constraints:**

- <code>1 <= nums.length <= 10<sup>5</sup></code>
- `nums[i]` is either `0` or `1`.



**Hint:**
1. Maintain a sliding window where there is at most one zero in it.



**Similar Questions:**
1. [1004. Max Consecutive Ones III](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001004-max-consecutive-ones-iii)






**Solution:**

We need to find the longest contiguous subarray of 1's after deleting exactly one element from the given binary array. The solution involves using a sliding window technique to maintain a window that contains at most one zero. The key insight is that by allowing at most one zero in the window, we can simulate the deletion of that zero to obtain a contiguous segment of 1's. The length of this segment will be the window length minus one, accounting for the deleted element.

### Approach
1. **Sliding Window Technique**: We maintain a window defined by two pointers, `left` and `right`. The `right` pointer expands the window by moving forward, while the `left` pointer contracts the window if the number of zeros exceeds one.
2. **Zero Counter**: We keep track of the number of zeros in the current window. If the count exceeds one, we move the `left` pointer forward until the zero count is reduced to one.
3. **Max Length Calculation**: For each valid window (containing at most one zero), the potential length of the contiguous 1's after deleting one element is `right - left`. We update the maximum length found during the iteration.

Let's implement this solution in PHP: **[1493. Longest Subarray of 1's After Deleting One Element](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001493-longest-subarray-of-1s-after-deleting-one-element/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function longestSubarray($nums) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo longestSubarray([1,1,0,1]) . "\n"; // 3
echo longestSubarray([0,1,1,1,0,1,1,0,1]) . "\n"; // 5
echo longestSubarray([1,1,1]) . "\n"; // 2
?>
```

### Explanation:

1. **Initialization**: We initialize `left` pointer and `zeros` counter to zero. The `max_len` variable will store the result.
2. **Expanding Window**: The `right` pointer traverses each element in the array. For each element, if it is zero, we increment the `zeros` counter.
3. **Contracting Window**: If the number of zeros exceeds one, we move the `left` pointer forward. If the element at `left` is zero, we decrement the `zeros` counter. This ensures the window always contains at most one zero.
4. **Updating Result**: For each valid window, the length of contiguous 1's after deleting one element is `right - left`. We update `max_len` if this value is greater than the current maximum.
5. **Result**: After processing all elements, `max_len` holds the length of the longest contiguous subarray of 1's after deleting one element.

This approach efficiently processes the array in linear time, making it optimal for large inputs. The sliding window ensures that we only traverse each element once, maintaining an O(n) time complexity. The space complexity is O(1) as we use only a few variables.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://arrivinglivelinesshop.com/xivbsatfw?key=a7e4ffd76750c3e2f4afa05276f66af7)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**