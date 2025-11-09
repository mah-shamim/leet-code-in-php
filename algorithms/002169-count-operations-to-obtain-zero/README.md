2169\. Count Operations to Obtain Zero

**Difficulty:** Easy

**Topics:** `Math`, `Simulation`, `Weekly Contest 280`

You are given two **non-negative** integers `num1` and `num2`.

In one **operation**, if `num1 >= num2`, you must subtract `num2` from `num1`, otherwise subtract `num1` from `num2`.

- For example, if `num1 = 5` and `num2 = 4`, subtract `num2` from `num1`, thus obtaining `num1 = 1` and `num2 = 4`. However, if `num1 = 4` and `num2 = 5`, after one operation, `num1 = 4` and `num2 = 1`.

Return _the **number of operations** required to make either `num1 = 0` or `num2 = 0`_.

**Example 1:**

- **Input:** num1 = 2, num2 = 3
- **Output:** 3
- **Explanation:**
  - Operation 1: num1 = 2, num2 = 3. Since num1 < num2, we subtract num1 from num2 and get num1 = 2, num2 = 3 - 2 = 1.
  - Operation 2: num1 = 2, num2 = 1. Since num1 > num2, we subtract num2 from num1.
  - Operation 3: num1 = 1, num2 = 1. Since num1 == num2, we subtract num2 from num1.
  - Now num1 = 0 and num2 = 1. Since num1 == 0, we do not need to perform any further operations.
  - So the total number of operations required is 3.

**Example 2:**

- **Input:** num1 = 10, num2 = 10
- **Output:** 1
- **Explanation:**
  - Operation 1: num1 = 10, num2 = 10. Since num1 == num2, we subtract num2 from num1 and get num1 = 10 - 10 = 0.
  - Now num1 = 0 and num2 = 10. Since num1 == 0, we are done.
  - So the total number of operations required is 1.

**Constraints:**

- `0 <= num1, num2 <= 10⁵`


**Hint:**
1. Try simulating the process until either of the two integers is zero.
2. Count the number of operations done.



**Similar Questions:**
1. [1342. Number of Steps to Reduce a Number to Zero](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001342-number-of-steps-to-reduce-a-number-to-zero)






**Solution:**

We need to determine the number of operations required to reduce either of two given non-negative integers to zero by repeatedly subtracting the smaller number from the larger one. The operations continue until one of the numbers becomes zero.

### Approach

1. **Simulation with Optimization**: Instead of simulating each subtraction step one by one (which could be inefficient for large numbers), we use integer division to calculate how many operations can be performed in one go.
2. **Efficient Subtraction**: For each step, if `num1` is greater than or equal to `num2`, we calculate how many times `num2` can be subtracted from `num1` using integer division. This count is added to the total operations, and `num1` is updated to the remainder of `num1` divided by `num2`. Similarly, if `num2` is larger, we do the same for `num2` using `num1`.
3. **Termination Check**: The loop continues until either `num1` or `num2` becomes zero. The total count of operations performed is then returned.

Let's implement this solution in PHP: **[2169. Count Operations to Obtain Zero](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002169-count-operations-to-obtain-zero/solution.php)**

```php
<?php
/**
 * @param Integer $num
 * @param Integer $num
 * @return Integer
 */
function countOperations($num1, $num2) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo countOperations(2, 3) . PHP_EOL;   // Output: 3
echo countOperations(10, 10) . PHP_EOL; // Output: 1
?>
```

### Explanation:

1. **Initialization**: We start with a count of zero operations.
2. **Loop Execution**: The loop runs as long as both numbers are non-zero. In each iteration:
   - If `num1` is greater than or equal to `num2`, we compute how many times `num2` can be subtracted from `num1` using integer division. This quotient is added to the count, and `num1` is updated to the remainder of `num1` divided by `num2`.
   - If `num2` is greater than `num1`, we compute how many times `num1` can be subtracted from `num2` similarly, update the count, and set `num2` to the remainder.
3. **Termination**: Once either `num1` or `num2` becomes zero, the loop exits, and the total count of operations is returned.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**