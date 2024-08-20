2134\. Minimum Swaps to Group All 1's Together II

Medium

A **swap** is defined as taking two **distinct** positions in an array and swapping the values in them.

A **circular** array is defined as an array where we consider the **first** element and the **last** element to be **adjacent**.

Given a **binary circular** array `nums`, return _the minimum number of swaps required to group all `1`'s present in the array together at **any location**_.

**Example 1:**

- **Input:** nums = [0,1,0,1,1,0,0]
- **Output:** 1
- **Explanation:** Here are a few of the ways to group all the 1's together:\
  [0,0,1,1,1,0,0] using 1 swap.\
  [0,1,1,1,0,0,0] using 1 swap.\
  [1,1,0,0,0,0,1] using 2 swaps (using the circular property of the array).\
  There is no way to group all 1's together with 0 swaps.\
  Thus, the minimum number of swaps required is 1. 

**Example 2:**

- **Input:** nums = [0,1,1,1,0,0,1,1,0]
- **Output:** 2
- **Explanation:** Here are a few of the ways to group all the 1's together:\
  [1,1,1,0,0,0,0,1,1] using 2 swaps (using the circular property of the array).\
  [1,1,1,1,1,0,0,0,0] using 2 swaps.\
  There is no way to group all 1's together with 0 or 1 swaps.\
  Thus, the minimum number of swaps required is 2.

**Example 3:**

- **Input:** nums = [1,1,0,0,1]
- **Output:** 0
- **Explanation:** All the 1's are already grouped together due to the circular property of the array.\
  Thus, the minimum number of swaps required is 0.

**Constraints:**

- <code>1 <= nums.length <= 10<sup>5</sup></code>
- `nums[i]` is either `0` or `1`.

**Hint:**
1. Notice that the number of 1’s to be grouped together is fixed. It is the number of 1's the whole array has.
2. Call this number total. We should then check for every subarray of size total (possibly wrapped around), how many swaps are required to have the subarray be all 1’s.
3. The number of swaps required is the number of 0’s in the subarray.
4. To eliminate the circular property of the array, we can append the original array to itself. Then, we check each subarray of length total.
5. How do we avoid recounting the number of 0’s in the subarray each time? The Sliding Window technique can help.


**Solution:**


To solve this problem, we can follow these steps:

1. **Count the Total Number of `1`s**: This will be the number of `1`s we need to group together.
2. **Extend the Array**: To handle the circular nature, append the array to itself.
3. **Use Sliding Window Technique**: Apply the sliding window technique on the extended array to find the minimum number of swaps required.

Let's implement this solution in PHP: **[2134. Minimum Swaps to Group All 1's Together II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002134-minimum-swaps-to-group-all-1s-together-ii/solution.php)**

```php
<?php
// Example usage
$nums1 = [0,1,0,1,1,0,0];
$nums2 = [0,1,1,1,0,0,1,1,0];
$nums3 = [1,1,0,0,1];

echo minSwaps($nums1) . "\n"; // Output: 1
echo minSwaps($nums2) . "\n"; // Output: 2
echo minSwaps($nums3) . "\n"; // Output: 0

?>
```

### Explanation:

1. **Count the Total Number of `1`s**: Calculate the total number of `1`s in the original array.
2. **Extend the Array**: Concatenate the original array to itself to handle the circular nature.
3. **Initial Window**: Count the number of `0`s in the initial window of size equal to the total number of `1`s.
4. **Sliding Window**: Slide the window across the extended array. For each new position, update the count of `0`s based on the elements entering and leaving the window.
5. **Find Minimum**: Keep track of the minimum number of `0`s encountered, which corresponds to the minimum number of swaps needed.

This solution efficiently handles the circular array by transforming it into a linear problem and uses the sliding window technique to maintain a running count of `0`s in each window of size equal to the total number of `1`s.


**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
