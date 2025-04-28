2302\. Count Subarrays With Score Less Than K

**Difficulty:** Hard

**Topics:** `Array`, `Binary Search`, `Sliding Window`, `Prefix Sum`

The **score** of an array is defined as the **product** of its sum and its length.

    For example, the score of `[1, 2, 3, 4, 5]` is `(1 + 2 + 3 + 4 + 5) * 5 = 75`.

Given a positive integer array `nums` and an integer `k`, return _the **number of non-empty subarrays** of `nums` whose score is **strictly less** than `k`_.

A **subarray** is a contiguous sequence of elements within an array.

**Example 1:**

- **Input:** nums = [2,1,4,3,5], k = 10
- **Output:** 6
- **Explanation:** The 6 subarrays having scores less than 10 are:
  - [2] with score 2 * 1 = 2.
  - [1] with score 1 * 1 = 1.
  - [4] with score 4 * 1 = 4.
  - [3] with score 3 * 1 = 3.
  - [5] with score 5 * 1 = 5.
  - [2,1] with score (2 + 1) * 2 = 6.
    Note that subarrays such as [1,4] and [4,3,5] are not considered because their scores are 10 and 36 respectively, while we need scores strictly less than 10.

**Example 2:**

- **Input:** nums = [1,1,1], k = 5
- **Output:** 4
- **Explanation:**
  Every subarray except [1,1,1] has a score less than 5.
  [1,1,1] has a score (1 + 1 + 1) * 3 = 9, which is greater than 5.
  Thus, there are 5 subarrays having scores less than 5.



**Constraints:**

- <code>1 <= nums.length <= 10<sup>5</sup></code>
- <code>1 <= nums[i] <= 10<sup>5</sup></code>
- <code>1 <= k <= 10<sup>15</sup></code>


**Hint:**
1. If we add an element to a list of elements, how will the score change?
2. How can we use this to determine the number of subarrays with score less than k in a given range?
3. How can we use “Two Pointers” to generalize the solution, and thus count all possible subarrays?



**Solution:**

We need to count the number of non-empty subarrays of a given array whose score (defined as the product of the subarray's sum and its length) is strictly less than a given integer _**k**_. Given the constraints, an efficient approach is necessary to avoid a brute-force solution.

### Approach
The key insight here is that for a given starting index _**i**_, the score of the subarray starting at _**i**_ and ending at _**j**_ increases as _**j**_ increases. This allows us to use a binary search approach to efficiently determine the maximum valid _**j**_ for each starting index _**i**_.

1. **Prefix Sum Array**: Compute a prefix sum array to quickly calculate the sum of any subarray.
2. **Binary Search**: For each starting index _**i**_, use binary search to find the maximum ending index _**j**_ such that the score of the subarray from _**i**_ to _**j**_ is less than _**k**_.
3. **Count Valid Subarrays**: For each valid starting index _**i**_, the number of valid subarrays ending at _**j**_ is _**j - i + 1**_.

Let's implement this solution in PHP: **[2302. Count Subarrays With Score Less Than K](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002302-count-subarrays-with-score-less-than-k/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @param Integer $k
 * @return Integer
 */
function countSubarrays($nums, $k) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example 1
$nums = [2, 1, 4, 3, 5];
$k = 10;
echo countSubarrays($nums, $k) . "\n"; // Output: 6

// Example 2
$nums = [1, 1, 1];
$k = 5;
echo countSubarrays($nums, $k) . "\n"; // Output: 5
?>
```

### Explanation:

1. **Prefix Sum Array**: The prefix sum array allows us to compute the sum of any subarray in constant time. For example, the sum of the subarray from index _**i**_ to _**j**_ can be found using _**prefix[j+1] - prefix[i]**_.

2. **Binary Search**: For each starting index _**i**_, we perform a binary search on the possible ending indices _**j**_. The binary search helps efficiently determine the largest _**j**_ such that the score of the subarray _**[i, j]**_ is less than _**k**_.

3. **Counting Valid Subarrays**: Once the maximum valid _**j**_ is found for a starting index _**i**_, all subarrays starting at _**i**_ and ending at any index from _**i**_ to _**j**_ are valid. The count of such subarrays is _**j - i + 1**_.

This approach ensures that we efficiently count all valid subarrays in _**O(n log n)**_ time, making it suitable for large input sizes up to _**10<sup>5</sup>**_.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**