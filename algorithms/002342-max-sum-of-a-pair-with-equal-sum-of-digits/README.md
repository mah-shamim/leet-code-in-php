2342\. Max Sum of a Pair With Equal Sum of Digits

**Difficulty:** Medium

**Topics:** `Array`, `Hash Table`, `Sorting`, `Heap (Priority Queue)`

You are given a **0-indexed** array `nums` consisting of **positive** integers. You can choose two indices `i` and `j`, such that `i != j`, and the sum of digits of the number `nums[i]` is equal to that of `nums[j]`.

Return _the **maximum** value of `nums[i] + nums[j]` that you can obtain over all possible indices `i` and `j` that satisfy the conditions_.

**Example 1:**

- **Input:** nums = [18,43,36,13,7]
- **Output:** 54
- **Explanation:** The pairs (i, j) that satisfy the conditions are:
  - (0, 2), both numbers have a sum of digits equal to 9, and their sum is 18 + 36 = 54.
  - (1, 4), both numbers have a sum of digits equal to 7, and their sum is 43 + 7 = 50.
    So the maximum sum that we can obtain is 54.

**Example 2:**

- **Input:** nums = [10,12,19,14]
- **Output:** -1
- **Explanation:** There are no two numbers that satisfy the conditions, so we return -1.



**Constraints:**

- <code>1 <= nums.length <= 10<sup>5</sup></code>
- <code>1 <= nums[i] <= 10<sup>9</sup></code>


**Hint:**
1. What is the largest possible sum of digits a number can have?
2. Group the array elements by the sum of their digits, and find the largest two elements of each group.



**Solution:**

The approach can be divided into several steps:

1. **Group the numbers by their sum of digits.**
   - We need to compute the sum of digits of each number in the array.
   - Use a hash table (or associative array in PHP) to group numbers that have the same sum of digits.

2. **For each group, find the two largest numbers.**
   - If a group has two or more numbers, we find the two largest numbers and compute their sum.

3. **Return the maximum sum.**
   - Track the maximum sum of any pair that satisfies the condition.

Let's implement this solution in PHP: **[2342. Max Sum of a Pair With Equal Sum of Digits](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002342-max-sum-of-a-pair-with-equal-sum-of-digits/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function maximumSum($nums) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * Helper function to calculate the sum of digits of a number
 *
 * @param $num
 * @return int
 */
function sumOfDigits($num) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage
$nums1 = [18, 43, 36, 13, 7];
$nums2 = [10, 12, 19, 14];

echo maxSum($nums1); // Output: 54
echo "\n";
echo maxSum($nums2); // Output: -1
?>
```

### Explanation:

1. **sumOfDigits function**: This function computes the sum of digits of a given number. It repeatedly takes the last digit of the number (using modulo 10) and adds it to the sum, then reduces the number by dividing it by 10.

2. **Main logic**:
   - We iterate over each number in the array and compute its sum of digits.
   - We store numbers in a hash table (`$digitSumMap`), where the key is the sum of digits and the value is an array of numbers that have that sum of digits.
   - For each group of numbers (with the same sum of digits), we sort them in descending order and check if there are at least two numbers. If so, we calculate the sum of the two largest numbers and track the maximum sum found.

3. **Edge cases**:
   - If no pair of numbers has the same sum of digits, the function returns `-1`.
   - If there are multiple pairs, it returns the maximum sum.

### Time Complexity:
- Calculating the sum of digits for each number is `O(log(num))`, where `num` is the number of digits in the number.
- Sorting each group of numbers can take `O(n log n)` in the worst case, where `n` is the number of elements in the group. Since the sum of digits is at most `81` (for the largest 9-digit number, 999,999,999), this leads to a total time complexity of `O(N log N)` for sorting all the groups.

### Space Complexity:
- The space complexity is `O(N)` due to the use of the hash table to store numbers by their sum of digits.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**