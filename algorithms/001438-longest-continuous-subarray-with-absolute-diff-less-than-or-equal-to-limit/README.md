1438\. Longest Continuous Subarray With Absolute Diff Less Than or Equal to Limit

**Difficulty:** Medium

**Topics:** `Array`, `Queue`, `Sliding Window`, `Heap (Priority Queue)`, `Ordered Set`, `Monotonic Queue`

Given an array of integers `nums` and an integer `limit`, return the size of the longest **non-empty** subarray such that the absolute difference between any two elements of this subarray is less than or equal to `limit`.

**Example 1:**

- **Input:** nums = [8,2,4,7], limit = 4
- **Output:** 2
- **Explanation:** All subarrays are:\
  [8] with maximum absolute diff |8-8| = 0 <= 4.\
  [8,2] with maximum absolute diff |8-2| = 6 > 4.\
  [8,2,4] with maximum absolute diff |8-2| = 6 > 4.\
  [8,2,4,7] with maximum absolute diff |8-2| = 6 > 4.\
  [2] with maximum absolute diff |2-2| = 0 <= 4.\
  [2,4] with maximum absolute diff |2-4| = 2 <= 4.\
  [2,4,7] with maximum absolute diff |2-7| = 5 > 4.\
  [4] with maximum absolute diff |4-4| = 0 <= 4.\
  [4,7] with maximum absolute diff |4-7| = 3 <= 4.\
  [7] with maximum absolute diff |7-7| = 0 <= 4.\
  Therefore, the size of the longest subarray is 2.\

**Example 2:**

- **Input:** nums = [10,1,2,4,7,2], limit = 5
- **Output:** 4
- **Explanation:** The subarray [2,4,7,2] is the longest since the maximum absolute diff is |2-7| = 5 <= 5.

**Example 3:**

- **Input:** nums = [4,2,2,2,4,4,2,2], limit = 0
- **Output:** 3 

**Example 4:**

- **Input:** nums = [2,2,2,4,4,2,5,5,5,5,5,2], limit = 2
- **Output:** 6 

**Constraints:**

- <code>1 <= nums.length <= 10<sup>5</sup></code>
- <code>1 <= nums[i] <= 10<sup>9</sup></code>
- <code>0 <= limit <= 10<sup>9</sup></code>


**Hint:**
1. Use a sliding window approach keeping the maximum and minimum value using a data structure like a multiset from STL in C++.
2. More specifically, use the two pointer technique, moving the right pointer as far as possible to the right until the subarray is not valid (maxValue - minValue > limit), then moving the left pointer until the subarray is valid again (maxValue - minValue <= limit). Keep repeating this process.



**Solution:**

The problem asks for the longest subarray where the absolute difference between any two elements is less than or equal to a given `limit`. This requires efficiently finding subarrays that satisfy this condition. The challenge lies in the size of the input (`nums.length` up to _**10^5\)), which necessitates an efficient solution that avoids brute force methods.

### **Key Points:**
- **Sliding Window**: The core idea is to use the sliding window technique with two pointers (`l` and `r`), where `l` is the left pointer and `r` is the right pointer.
- **Maintaining Min and Max**: To check whether the subarray is valid, we need to keep track of the minimum and maximum elements in the current subarray. This is done using queues.
- **Efficiency**: The approach must efficiently manage the minimum and maximum values as the window expands and contracts.

### **Approach:**
1. **Sliding Window with Two Pointers**: We maintain a sliding window using two pointers (`l` and `r`). The window is valid if the difference between the maximum and minimum elements in the window is less than or equal to `limit`.
2. **Deques to Track Min/Max**: A deque (double-ended queue) will be used to track the minimum and maximum values in the current window. The sliding window is expanded by moving the right pointer `r` and contracted by moving the left pointer `l` when the condition is violated.
3. **Adjust Window**: For every valid window, we calculate the size of the window and update the answer. When the window is invalid, we increment the left pointer until the condition is satisfied.

### **Plan:**
1. Initialize two deques: `minQ` for the minimum values and `maxQ` for the maximum values.
2. Use a loop to expand the window with the right pointer (`r`), pushing elements into the deques while maintaining their order.
3. For each new element added to the window, check if the absolute difference between the max and min values exceeds `limit`. If it does, increment the left pointer (`l`) and adjust the deques.
4. Track the maximum window size where the difference condition holds.

Let's implement this solution in PHP: **[1438. Longest Continuous Subarray With Absolute Diff Less Than or Equal to Limit](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001438-longest-continuous-subarray-with-absolute-diff-less-than-or-equal-to-limit/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @param Integer $limit
 * @return Integer
 */
function longestSubarray($nums, $limit) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
$nums = [8,2,4,7];
$limit = 4;
echo longestSubarray($nums, $limit) . "\n"; // Output: 2

$nums = [10,1,2,4,7,2];
$limit = 5;
echo longestSubarray($nums, $limit) . "\n"; // Output: 4

$nums = [4,2,2,2,4,4,2,2];
$limit = 0;
echo longestSubarray($nums, $limit) . "\n"; // Output: 3
?>
```

### Explanation:

1. **Deques for Min/Max**: The deques maintain the elements in the order required to find the min and max in constant time. For `minQ`, we pop elements from the back as long as they are greater than the current element (`nums[r]`) to ensure the smallest elements are at the front. Similarly, for `maxQ`, we pop elements from the back as long as they are smaller than the current element (`nums[r]`), ensuring the largest elements are at the front.

2. **Validating the Window**: As we expand the window by moving `r` forward, we check the difference between the max and min values. If it's greater than `limit`, we shrink the window from the left by incrementing `l` until the condition is satisfied.

3. **Updating the Result**: Every time a valid window is found, we calculate the size of the current subarray and update the result (`ans`).

### **Example Walkthrough:**

#### Example 1:
**Input**: nums = [8, 2, 4, 7], limit = 4  
**Output**: 2

- Start with `l = 0` and `r = 0`. The initial window contains only one element: [8]. The condition holds since the max-min = 0 <= 4.
- Expand the window by moving `r` to 1. The window becomes [8, 2]. The max-min = 6 > 4, so move `l` to 1.
- The next valid window is [2], which has size 1.
- Move `r` to 2. The window becomes [2, 4]. The max-min = 2 <= 4, so it's valid.
- Move `r` to 3. The window becomes [2, 4, 7]. The max-min = 5 > 4, so move `l` to 2.
- The valid subarray is [4, 7], with size 2.
- The result is 2, which is the longest subarray.

#### Example 2:
**Input**: nums = [10, 1, 2, 4, 7, 2], limit = 5  
**Output**: 4

- Start with `l = 0` and expand the window until the subarray [2, 4, 7, 2] is the longest valid one, giving a result of 4.

### **Time Complexity:**
- **Time Complexity**: _**O(n)**_, where _**n**_ is the length of the array. Each element is added and removed from the deques at most once, leading to linear time complexity.
- **Space Complexity**: _**O(n)**_, due to the storage of deques that can hold at most _**n**_ elements.

### **Output for Example:**
For **Example 1**:
```plaintext
Input: nums = [8, 2, 4, 7], limit = 4
Output: 2
```

For **Example 2**:
```plaintext
Input: nums = [10, 1, 2, 4, 7, 2], limit = 5
Output: 4
```

This approach efficiently finds the longest subarray that satisfies the condition using a sliding window technique with two deques. The sliding window ensures that we only need to traverse the array once, making the solution scalable for large inputs. The deques allow constant-time access to the maximum and minimum values, making this approach optimal for the problem constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**


#273, #274 leetcode problems 001438-longest-continuous-subarray-with-absolute-diff-less-than-or-equal-to-limit submissions 1297931948
