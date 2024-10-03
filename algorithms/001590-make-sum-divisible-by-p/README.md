1590\. Make Sum Divisible by P

**Difficulty:** Medium

**Topics:** `Array`, `Hash Table`, `Prefix Sum`

Given an array of positive integers `nums`, remove the **smallest** subarray (possibly **empty**) such that the sum of the remaining elements is divisible by `p`. It is `not` allowed to remove the whole array.

Return _the length of the smallest subarray that you need to remove, or `-1` if it's impossible_.

A **subarray** is defined as a contiguous block of elements in the array.

**Example 1:**

- **Input:** nums = [3,1,4,2], p = 6
- **Output:** 1
- **Explanation:** The sum of the elements in nums is 10, which is not divisible by 6. We can remove the subarray [4], and the sum of the remaining elements is 6, which is divisible by 6.

**Example 2:**

- **Input:** nums = [6,3,5,2], p = 9
- **Output:** 2
- **Explanation:** We cannot remove a single element to get a sum divisible by 9. The best way is to remove the subarray [5,2], leaving us with [6,3] with sum 9.


**Example 3:**

- **Input:** nums = [1,2,3], p = 3
- **Output:** 0
- **Explanation:** Here the sum is 6. which is already divisible by 3. Thus we do not need to remove anything.



**Constraints:**

- <code>1 <= nums.length <= 10<sup>5</sup></code>
- <code>1 <= nums[i] <= 10<sup>9</sup></code>
- <code>1 <= p <= 10<sup>9</sup></code>



**Hint:**
1. Use prefix sums to calculate the subarray sums.
2. Suppose you know the remainder for the sum of the entire array. How does removing a subarray affect that remainder? What remainder does the subarray need to have in order to make the rest of the array sum up to be divisible by k?
3. Use a map to keep track of the rightmost index for every prefix sum % p.



**Solution:**

We can use a combination of prefix sums and a hash table to efficiently compute the smallest subarray that needs to be removed such that the sum of the remaining elements is divisible by `p`.

### Key Insights:
1. **Prefix Sum Modulo**: The sum of the entire array modulo `p` gives us the remainder when the array sum is divided by `p`. If this remainder is zero, the sum is already divisible by `p`, and no subarray needs to be removed. Otherwise, the goal is to remove a subarray that brings the sum modulo `p` to zero.

2. **Target Remainder**: If the total sum modulo `p` is `r`, we need to find a subarray whose sum modulo `p` is also `r`. Removing this subarray will result in the remaining sum being divisible by `p`.

3. **Efficient Search Using a Hash Map**: We can use a hash map to store the prefix sum modulo `p` and the index at which that sum occurs. This allows us to quickly find if we can remove a subarray that satisfies the required condition.

### Approach:
1. Compute the total sum of the array, and find its remainder when divided by `p`. Call this remainder `r`.
2. Traverse through the array while maintaining the current prefix sum and looking for a previously seen prefix sum that satisfies the condition (i.e., removing the elements between the current index and the previous index will result in a sum divisible by `p`).
3. Use a hash map to store the last occurrence of each prefix sum modulo `p`.

Let's implement this solution in PHP: **[1590. Make Sum Divisible by P](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001590-make-sum-divisible-by-p/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @param Integer $p
 * @return Integer
 */
function minSubarray($nums, $p) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
$nums1 = [3, 1, 4, 2];
$p1 = 6;
echo minSubarray($nums1, $p1) . "\n";  // Output: 1

$nums2 = [6, 3, 5, 2];
$p2 = 9;
echo minSubarray($nums2, $p2) . "\n";  // Output: 2

$nums3 = [1, 2, 3];
$p3 = 3;
echo minSubarray($nums3, $p3) . "\n";  // Output: 0
?>
```

### Explanation:

1. **Initialization**:
   - We calculate the total sum of the array and its remainder when divided by `p`. If the remainder `r` is zero, the array is already divisible by `p`, so we return `0`.
   - We initialize a hash map (`prefixMap`) to store the last occurrence of each prefix sum modulo `p`. The map starts with `0 => -1` to handle cases where the subarray starts from the beginning.

2. **Prefix Sum Calculation**:
   - As we iterate through the array, we maintain a running `prefixSum`. At each step, we compute `prefixSum % p`.

3. **Finding the Target**:
   - We need to check if there exists a previous prefix sum that, when subtracted from the current prefix sum, results in a sum divisible by `p`. This is achieved by calculating the `target = (prefixSum - r + p) % p`.

4. **Subarray Removal**:
   - If the `target` is found in the `prefixMap`, we compute the length of the subarray that would need to be removed to achieve the desired sum and update the `minLength` accordingly.

5. **Final Result**:
   - If no valid subarray is found (`minLength` remains `PHP_INT_MAX`), we return `-1`. Otherwise, we return the smallest subarray length found.

### Time Complexity:
- The solution runs in **O(n)** time, where `n` is the length of the array, since we traverse the array once and each operation (like hash map lookup and insertion) takes constant time.

### Space Complexity:
- The space complexity is **O(n)** due to the hash map storing at most `n` prefix sums.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**

