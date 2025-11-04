3318\. Find X-Sum of All K-Long Subarrays I

**Difficulty:** Easy

**Topics:** `Array`, `Hash Table`, `Sliding Window`, `Heap (Priority Queue)`, `Weekly Contest 419`

You are given an array `nums` of `n` integers and two integers `k` and `x`.

The **x-sum** of an array is calculated by the following procedure:

- Count the occurrences of all elements in the array.
- Keep only the occurrences of the top `x` most frequent elements. If two elements have the same number of occurrences, the element with the **bigger** value is considered more frequent.
- Calculate the sum of the resulting array.

**Note** that if an array has less than `x` distinct elements, its **x-sum** is the sum of the array.

Return an integer array `answer` of length `n - k + 1` where `answer[i]` is the **x-sum** of the subarray[^1] `nums[i..i + k - 1]`.

**Example 1:**

- **Input:** nums = [1,1,2,2,3,4,2,3], k = 6, x = 2
- **Output:** [6,10,12]
- **Explanation:**
  - For subarray `[1, 1, 2, 2, 3, 4]`, only elements 1 and 2 will be kept in the resulting array. Hence, `answer[0] = 1 + 1 + 2 + 2`.
  - For subarray `[1, 2, 2, 3, 4, 2]`, only elements 2 and 4 will be kept in the resulting array. Hence, `answer[1] = 2 + 2 + 2 + 4`. Note that 4 is kept in the array since it is bigger than 3 and 1 which occur the same number of times.
  - For subarray `[2, 2, 3, 4, 2, 3]`, only elements 2 and 3 are kept in the resulting array. Hence, `answer[2] = 2 + 2 + 2 + 3 + 3`.


**Example 2:**

- **Input:** nums = [3,8,7,8,7,5], k = 2, x = 2
- **Output:** [11,15,15,15,12]
- **Explanation:** Since `k == x`, `answer[i]` is equal to the sum of the subarray `nums[i..i + k - 1]`.

**Constraints:**

- `1 <= n == nums.length <= 50`
- `1 <= nums[i] <= 50`
- `1 <= x <= k <= nums.length`



**Hint:**
1. Implement the x-sum function. Then, run x-sum on every subarray of nums of size k.



[^1]: **Subarray:** A **subarray** is a contiguous **non-empty** sequence of elements within an array.





**Solution:**

We need to calculate the x-sum for every contiguous subarray of length `k` in the given array `nums`. The x-sum of an array is defined as the sum of all elements that belong to the top `x` most frequent elements. If there are ties in frequency, the element with the larger value is considered more frequent. If there are fewer than `x` distinct elements, the x-sum is simply the sum of all elements in the subarray.

### Approach

1. **Sliding Window Technique**: We use a sliding window of size `k` to iterate through all possible subarrays of length `k` in `nums`.
2. **Frequency Counting**: For each window, we count the frequency of each element using a hash map.
3. **Sorting by Frequency and Value**: We sort the distinct elements in the window based on their frequencies (descending) and their values (descending) to determine the top `x` elements.
4. **Calculate x-sum**: We compute the sum of all elements in the window that are among the top `x` elements identified in the previous step.

Let's implement this solution in PHP: **[3318. Find X-Sum of All K-Long Subarrays I](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003318-find-x-sum-of-all-k-long-subarrays-i/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @param Integer $k
 * @param Integer $x
 * @return Integer[]
 */
function findXSum($nums, $k, $x) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
// Example 1
$nums = array(1, 1, 2, 2, 3, 4, 2, 3);
$k = 6;
$x = 2;
print_r(findXSum($nums, $k, $x));
// Output: [6, 10, 12]

// Example 2
$nums = array(3, 8, 7, 8, 7, 5);
$k = 2;
$x = 2;
print_r(findXSum($nums, $k, $x));
// Output: [11, 15, 15, 15, 12]
?>
```

### Explanation:

1. **Initialization**: We initialize the result array to store the x-sum for each window.
2. **Sliding Window**: For each starting index `i` from `0` to `n - k`, we extract the subarray of length `k` starting at `i`.
3. **Frequency Map**: We count the occurrences of each element in the current window using a hash map.
4. **Sorting**: We sort the distinct elements in the window first by their frequency in descending order, and then by their value in descending order to handle ties.
5. **Top x Elements**: We select the top `x` elements from the sorted distinct elements.
6. **Sum Calculation**: We iterate through the window and sum all elements that are in the top `x` elements.
7. **Store Result**: The computed sum for the current window is stored in the result array.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**