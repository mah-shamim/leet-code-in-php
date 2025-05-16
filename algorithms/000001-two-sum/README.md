1\. Two Sum

**Difficulty:** Easy

**Topics:** `Array`, `Hash Table`

Given an array of integers `nums` and an integer `target`, return _indices of the two numbers such that they add up to `target`_.

You may assume that each input would have **_exactly_ one solution**, and you may not use the _same_ element twice.

You can return the answer in any order.

**Example 1:**

- **Input:** nums = [2,7,11,15], target = 9
- **Output:** [0,1]
- **Explanation:** Because nums[0] + nums[1] == 9, we return [0, 1]. 

**Example 2:**

- **Input:** nums = [3,2,4], target = 6
- **Output:** [1,2] 

**Example 3:**

- **Input:** nums = [3,3], target = 6
- **Output:** [0,1] 

**Constraints:**

- <code>2 <= nums.length <= 10<sup>4</sup></code>
- <code>-10<sup>9</sup> <= nums[i] <= 10<sup>9</sup></code>
- <code>-10<sup>9</sup> <= target <= 10<sup>9</sup></code>
- **Only one valid answer exists.**

**Follow-up:** Can you come up with an algorithm that is less than <code>O(n<sup>2</sup>)</code> time complexity?

**Hint:**
1. A really brute force way would be to search for all possible pairs of numbers but that would be too slow. Again, it's best to try out brute force solutions for just for completeness. It is from these brute force solutions that you can come up with optimizations.
2. So, if we fix one of the numbers, say `x`, we have to scan the entire array to find the next number `y` which is `value - x` where value is the input parameter. Can we change our array somehow so that this search becomes faster?
3. The second train of thought is, without changing the array, can we use additional space somehow? Like maybe a hash map to speed up the search?


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
