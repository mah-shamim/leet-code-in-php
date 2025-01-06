179\. Largest Number

**Difficulty:** Medium

**Topics:** `Array`, `String`, `Greedy`, `Sorting`

Given a list of non-negative integers `nums`, arrange them such that they form the largest number and return it.

Since the result may be very large, so you need to return a string instead of an integer.

**Example 1:**

- **Input:** nums = [10,2]
- **Output:** "210"

**Example 2:**

- **Input:** nums = [3,30,34,5,9]
- **Output:** "9534330"


**Constraints:**

- <code>1 <= nums.length <= 100</code>
- <code>0 <= nums[i] <= 10<sup>9</sup></code>


**Solution:**

We need to compare numbers based on their concatenated results. For two numbers `a` and `b`, we compare `ab` (a concatenated with b) and `ba` (b concatenated with a), and decide the order based on which forms a larger number.

### Approach:
1. **Custom Sorting**: Implement a custom comparator function that sorts the numbers by comparing the concatenated results.
2. **Edge Case**: If the largest number after sorting is `0`, then the result is `"0"`, as all numbers must be zero.
3. **Concatenation**: After sorting, concatenate the numbers to form the final result.

Let's implement this solution in PHP: **[179. Largest Number](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000179-largest-number/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return String
 */
function largestNumber($nums) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
$nums1 = [10, 2];
echo largestNumber($nums1);  // Output: "210"

$nums2 = [3, 30, 34, 5, 9];
echo largestNumber($nums2);  // Output: "9534330"
?>
```

### Explanation:

1. **`usort($nums, $comparator)`**: We sort the array using a custom comparator. For each pair of numbers `a` and `b`, we compare the concatenated strings `a . b` and `b . a`.
2. **Comparison Logic**: The `strcmp($order2, $order1)` ensures that we get a descending order based on the concatenated strings.
3. **Edge Case Handling**: If the first character of the resulting concatenated string is `0`, we return `"0"`, which happens when all elements of the array are zeros.
4. **Time Complexity**: Sorting the numbers takes `O(n log n)`, and concatenating them takes `O(n)`, where `n` is the number of numbers in the input array.

This solution handles the constraints efficiently and returns the largest possible number as a string.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
