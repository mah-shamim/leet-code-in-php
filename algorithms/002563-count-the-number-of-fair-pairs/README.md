2563\. Count the Number of Fair Pairs

**Difficulty:** Medium

**Topics:** `Array`, `Two Pointers`, `Binary Search`, `Sorting`

Given a **0-indexed** integer array `nums` of size `n` and two integers `lower` and `upper`, return _the number of fair pairs_.

A pair `(i, j)` is **fair** if:

- `0 <= i < j < n`, and
- `lower <= nums[i] + nums[j] <= upper`


**Example 1:**

- **Input:** nums = [0,1,7,4,4,5], lower = 3, upper = 6
- **Output:** 6
- **Explanation:** There are 6 fair pairs: (0,3), (0,4), (0,5), (1,3), (1,4), and (1,5).

**Example 2:**

- **Input:** nums = [1,7,9,2,5], lower = 11, upper = 11
- **Output:** 1
- **Explanation:** There is a single fair pair: (2,3).


**Constraints:**

- <code>1 <= nums.length <= 10<sup>5</sup></code>
- nums.length == n
- <code>-10<sup>9</sup> <= nums[i] <= 10<sup>9</sup></code>
- <code>-10<sup>9</sup> <= lower <= upper <= 10<sup>9</sup></code>


**Hint:**
1. Sort the array in ascending order.
2. For each number in the array, keep track of the smallest and largest numbers in the array that can form a fair pair with this number.
3. As you move to larger number, both boundaries move down.



**Solution:**

We can use the following approach:

1. **Sort the Array**: Sorting helps us leverage the two-pointer technique and perform binary searches more effectively.
2. **Two-Pointer Technique**: For each element in the sorted array, we can calculate the range of elements that can form a fair pair with it. We use binary search to find this range.
3. **Binary Search for Bounds**: For each element `nums[i]`, find the range `[lower, upper] - nums[i]` for `j > i`. We use binary search to find the smallest and largest indices that satisfy this range.

Let's implement this solution in PHP: **[2563. Count the Number of Fair Pairs](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002563-count-the-number-of-fair-pairs/solution.php)**

```php
<?php
/**
* @param Integer[] $nums
* @param Integer $lower
* @param Integer $upper
* @return Integer
*/
function countFairPairs($nums, $lower, $upper) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
* Helper function for binary search to find left boundary
*
* @param $arr
* @param $target
* @param $start
* @return int|mixed
*/
function lowerBound($arr, $target, $start) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
* Helper function for binary search to find right boundary
*
* @param $arr
* @param $target
* @param $start
* @return int|mixed
*/
function upperBound($arr, $target, $start) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
$nums = [0, 1, 7, 4, 4, 5];
$lower = 3;
$upper = 6;
echo countFairPairs($nums, $lower, $upper);  // Output: 6
?>
```

### Explanation:

1. **Sorting**: We sort the array `nums` to make it easier to find valid pairs with binary search.
2. **Binary Search Bounds**:
   - For each element `nums[i]`, we find the `low` and `high` values, which are the bounds we want the sum to fall within.
   - We use two binary searches to find the range of indices `[left, right)` where `nums[i] + nums[j]` falls within `[lower, upper]`.
3. **Counting Pairs**: We add the count of valid indices between `left` and `right` for each `i`.

This approach has a time complexity of _**O(n log n)**_ due to sorting and binary search for each element, which is efficient enough for large inputs.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
