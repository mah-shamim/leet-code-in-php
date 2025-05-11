1399\. Count Largest Group

**Difficulty:** Easy

**Topics:** `Hash Table`, `Math`

You are given an integer `n`.

Each number from `1` to `n` is grouped according to the sum of its digits.

Return _the number of groups that have the largest size_.

**Example 1:**

- **Input:** n = 13
- **Output:** 4
- **Explanation:** There are 9 groups in total, they are grouped according sum of its digits of numbers from 1 to 13:
  [1,10], [2,11], [3,12], [4,13], [5], [6], [7], [8], [9].
  There are 4 groups with largest size.

**Example 2:**

- **Input:** n = 2
- **Output:** 2
- **Explanation:** There are 2 groups [1], [2] of size 1.



**Constraints:**

- <code>1 <= n <= 10<sup>4</sup></code>


**Hint:**
1. Count the digit sum for each integer in the range and find out the largest groups.



**Solution:**

We need to group numbers from 1 to n based on the sum of their digits and determine how many groups have the largest size.

### Approach
1. **Calculate Digit Sums**: For each number from 1 to n, compute the sum of its digits.
2. **Track Group Sizes**: Use a hash map (associative array in PHP) to count how many numbers fall into each digit sum group.
3. **Determine Largest Group**: Find the maximum size among all groups.
4. **Count Largest Groups**: Count how many groups have this maximum size.

Let's implement this solution in PHP: **[1399. Count Largest Group](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001399-count-largest-group/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @return Integer
 */
function countLargestGroup($n) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $num
 * @return int
 */
function digitSum($num) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
echo countLargestGroup(13); // Output: 4
echo countLargestGroup(2); // Output: 2
?>
```

### Explanation:

1. **Digit Sum Calculation**: The `digitSum` function computes the sum of digits of a number by repeatedly extracting the last digit using modulo 10 and then removing the last digit by integer division by 10.
2. **Group Counting**: As we iterate through each number from 1 to n, we use an associative array `$counts` to keep track of how many numbers correspond to each digit sum.
3. **Finding Maximum Group Size**: The `max` function is used to find the largest group size from the associative array.
4. **Counting Largest Groups**: We iterate through the counts to determine how many groups have the maximum size, which is our result.

This approach efficiently groups numbers by their digit sums and then processes these groups to find the required result, ensuring optimal performance even for the upper constraint of n = 10,000.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**