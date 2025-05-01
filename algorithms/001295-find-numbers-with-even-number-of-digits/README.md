1295\. Find Numbers with Even Number of Digits

**Difficulty:** Easy

**Topics:** `Array`, `Math`

Given an array `nums` of integers, return _how many of them contain an **even number** of digits_.

**Example 1:**

- **Input:** nums = [12,345,2,6,7896]
- **Output:** 2
- **Explanation:**
  12 contains 2 digits (even number of digits).
  345 contains 3 digits (odd number of digits).
  2 contains 1 digit (odd number of digits).
  6 contains 1 digit (odd number of digits).
  7896 contains 4 digits (even number of digits).
  Therefore only 12 and 7896 contain an even number of digits.

**Example 2:**

- **Input:** nums = [555,901,482,1771]
- **Output:** 1
- **Explanation:** Only 1771 contains an even number of digits.



**Constraints:**

- `1 <= nums.length <= 500`
- <code>1 <= nums[i] <= 10<sup>5</sup></code>


**Hint:**
1. How to compute the number of digits of a number ?
2. Divide the number by 10 again and again to get the number of digits.



**Solution:**

We need to determine how many numbers in a given array have an even number of digits.

### Approach
The approach involves converting each number in the array to a string and checking the length of that string. If the length is even, we count that number. This method is straightforward and efficient given the constraints.

1. **Convert each number to a string**: This allows us to easily determine the number of digits by checking the string length.
2. **Check if the string length is even**: If the length is even, increment the count.
3. **Return the count**: After processing all numbers, return the count of numbers with an even number of digits.

Let's implement this solution in PHP: **[1295. Find Numbers with Even Number of Digits](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001295-find-numbers-with-even-number-of-digits/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function findNumbers($nums) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test Cases
echo findNumbers([12, 345, 2, 6, 7896]) . "\n";     // Output: 2
echo findNumbers([555, 901, 482, 1771]) . "\n";     // Output: 1
?>
```

### Explanation:

1. **Initialization**: We start by initializing a counter to zero.
2. **Iterate through the array**: For each number in the array, convert it to a string.
3. **Check string length**: Determine the length of the string representation of the number. If the length is even, increment the counter.
4. **Return result**: After processing all elements, the counter holds the number of elements with an even number of digits, which is returned as the result.

This approach efficiently handles the problem constraints and ensures that we correctly count the numbers with even digit lengths using straightforward string conversion and length checking.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**