1636\. Sort Array by Increasing Frequency

Easy

Given an array of integers `nums`, sort the array in **increasing** order based on the frequency of the values. If multiple values have the same frequency, sort them in **decreasing** order.

_Return the sorted array_.

**Example 1:**

- **Input:** nums = [1,1,2,2,2,3]
- **Output:** [3,1,1,2,2,2]
- **Explanation:** '3' has a frequency of 1, '1' has a frequency of 2, and '2' has a frequency of 3.

**Example 2:**

- **Input:** nums = [2,3,1,3,2]
- **Output:** [1,3,3,2,2]
- **Explanation:** '2' and '3' both have a frequency of 2, so they are sorted in decreasing order.

**Example 3:**

- **Input:** nums = [-1,1,-6,4,5,-6,1,4,1]
- **Output:** [5,-1,4,4,-6,-6,1,1,1]

**Constraints:**

- <code>1 <= nums.length <= 100</code>
- <code>-100 <= nums[i] <= 100</code>

**Hint:**
1. Count the frequency of each value.
2. Use a custom comparator to compare values by their frequency. If two values have the same frequency, compare their values.


**Solution:**


To solve this problem, we can follow these steps:

Let's implement this solution in PHP: **[1. Two Sum](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000001-two-sum/solution.php)**

```php
<?php
// Test the function with example inputs
print_r(twoSum([2, 7, 11, 15], 9)); // Output: [0, 1]
print_r(twoSum([3, 2, 4], 6)); // Output: [1, 2]
print_r(twoSum([3, 3], 6)); // Output: [0, 1]
?>
```

### Explanation:

1. **Initialization**:
    - Create an empty associative array `$map` to store the numbers and their indices.

2. **Iteration**:
    - Loop through the array using a `foreach` loop.
    - For each number, calculate its complement (`$target - $num`).

3. **Check for Complement**:
    - If the complement exists in the associative array (`isset($map[$complement])`), return the index of the complement and the current index.
    - If not, store the current number and its index in the associative array (`$map[$num] = $index`).

4. **Return**:
    - The function will return an array containing the indices of the two numbers that add up to the target.

This solution has a time complexity of \(O(n)\) and a space complexity of \(O(n)\), making it efficient for large input sizes.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
