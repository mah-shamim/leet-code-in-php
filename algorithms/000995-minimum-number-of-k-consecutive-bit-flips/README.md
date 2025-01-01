995\. Minimum Number of K Consecutive Bit Flips

**Difficulty:** Hard

**Topics:** `Array`, `Bit Manipulation`, `Queue`, `Sliding Window`, `Prefix Sum`

You are given a binary array `nums` and an integer `k`.

A k-bit flip is choosing a subarray of length `k` from `nums` and simultaneously changing every `0` in the subarray to `1`, and every `1` in the subarray to `0`.

Return _the minimum number of **k-bit flips** required so that there is no `0` in the array. If it is not possible, return `-1`_.

A **subarray** is a **contiguous** part of an array.

**Example 1:**

- **Input:** nums = [0,1,0], k = 1
- **Output:** 2
- **Explanation:** Flip nums[0], then flip nums[2].

**Example 2:**

- **Input:** nums = [1,1,0], k = 2
- **Output:** -1
- **Explanation:** No matter how we flip subarrays of size 2, we cannot make the array become [1,1,1].

**Example 3:**

- **Input:** nums = [0,0,0,1,0,1,1,0], k = 3
- **Output:** 3
- **Explanation:**  \
  Flip nums[0],nums[1],nums[2]: nums becomes [1,1,1,1,0,1,1,0]\
  Flip nums[4],nums[5],nums[6]: nums becomes [1,1,1,1,1,0,0,0]\
  Flip nums[5],nums[6],nums[7]: nums becomes [1,1,1,1,1,1,1,1]

**Constraints:**

- <code>1 <= nums.length <= 10<sup>5</sup></code>
- <code>1 <= k <= nums.length</code>


**Solution:**

We are given a binary array `nums` and an integer `k`. Our goal is to transform all `0`s in the array into `1`s using a minimum number of **k-bit flips**. A k-bit flip involves choosing a contiguous subarray of length `k`, and flipping every bit in that subarray: changing `0` to `1` and `1` to `0`. The task is to find the minimum number of k-bit flips required to make the entire array consist of `1`s. If it's not possible, we should return `-1`.

### **Key Points:**
- **k-bit flip**: A flip operation on a contiguous subarray of length `k` that reverses the bits (i.e., 0 becomes 1, and 1 becomes 0).
- The aim is to find the minimum number of flips that convert all `0`s to `1`s.
- If it's not possible to flip enough bits due to constraints (such as exceeding the array length), the function should return `-1`.

### **Approach:**
1. **Sliding Window Technique**:
  - We need to traverse the array and flip the bits when required.
  - Instead of directly flipping bits, we use a **flip tracking mechanism** to efficiently manage flips over the array.
  - We utilize a window of size `k` to track valid flips, maintaining a count of flips that affect the current position.

2. **Flip Tracking**:
  - We use an array `flipped` to keep track of whether a position has been flipped.
  - A variable `validFlipsFromPastWindow` is used to track the cumulative effect of flips in the current window.
  - For each position in the array:
    - If the current bit is incorrect (i.e., it doesn't match the desired `1`), we flip the window starting at that position.
    - We maintain the effect of flips by updating the flip count and adjusting the valid flips from past windows.
  - If a flip goes beyond the length of the array, return `-1`.

### **Plan**:
1. Initialize an array `flipped` to track which positions have been flipped.
2. Use a variable `validFlipsFromPastWindow` to track the number of flips that affect the current position.
3. Traverse the array and for each element:
  - Determine whether a flip is required.
  - If necessary, flip a subarray of size `k` and update the tracking variables.
4. At the end of the traversal, return the total number of flips made.
5. If a flip is not possible (due to bounds constraints), return `-1`.

Let's implement this solution in PHP: **[995. Minimum Number of K Consecutive Bit Flips](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000995-minimum-number-of-k-consecutive-bit-flips/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @param Integer $k
 * @return Integer
 */
function minKBitFlips($nums, $k) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example 1
$nums = [0,1,0];
$k = 1;
echo minKBitFlips($nums, $k);  // Output: 2

// Example 2
$nums = [1,1,0];
$k = 2;
echo minKBitFlips($nums, $k);  // Output: -1

// Example 3
$nums = [0,0,0,1,0,1,1,0];
$k = 3;
echo minKBitFlips($nums, $k);  // Output: 3
?>
```

### Explanation:

- We traverse the array while keeping track of the cumulative effect of flips in a sliding window of size `k`.
- Each time we encounter a `0` (or a flipped `0`), we decide whether a flip is required by checking if the flip count up to that point is even or odd.
- If a flip goes beyond the array length, we return `-1` as it's impossible to flip.

### **Example Walkthrough**:
Let's walk through **Example 1**:

**Input**: `nums = [0, 1, 0], k = 1`

- Start with `flipped = [false, false, false]` and `validFlipsFromPastWindow = 0`.
- For `i = 0`:
  - The bit is `0` and no flip has occurred yet, so we flip the subarray starting at index 0.
  - The array becomes `[1, 1, 0]`, `flipped = [true, false, false]`, and `flipCount = 1`.
  - Now, the bit at index 0 is correct.
- For `i = 2`:
  - The bit is `0` (after the first flip) and requires another flip.
  - The array becomes `[1, 1, 1]`, `flipped = [true, false, true]`, and `flipCount = 2`.
  - Now, the bit at index 2 is correct.
- The final result is `flipCount = 2`.

### **Time Complexity**:
- **Time Complexity**: `O(n)` where `n` is the length of the `nums` array. We perform a single pass over the array and use constant-time operations for each element.
- **Space Complexity**: `O(n)` for the `flipped` array used to track the flip states.

### **Output for Example**:
- For the input `nums = [0,1,0]` and `k = 1`, the output is `2`.

This approach efficiently solves the problem by using a sliding window technique combined with flip tracking. By ensuring that we only flip the necessary bits and adjusting the flips dynamically, we can minimize the number of flips required. If the problem constraints are such that it's impossible to achieve the desired result, we handle that with an early exit. This method ensures optimal time and space complexity for large inputs.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
