2553\. Separate the Digits in an Array

**Difficulty:** Easy

**Topics:** `Mid Level`, `Array`, `Simulation`, `Biweekly Contest 97`

Given an array of positive integers `nums`, return _an array `answer` that consists of the digits of each integer in `nums` after separating them in **the same order** they appear in `nums`_.

To separate the digits of an integer is to get all the digits it has in the same order.

- For example, for the integer `10921`, the separation of its digits is `[1,0,9,2,1]`.


**Example 1:**

- **Input:** nums = [13,25,83,77]
- **Output:** [1,3,2,5,8,3,7,7]
- **Explanation:**
  - The separation of 13 is [1,3].
  - The separation of 25 is [2,5].
  - The separation of 83 is [8,3].
  - The separation of 77 is [7,7].
  - answer = [1,3,2,5,8,3,7,7]. Note that answer contains the separations in the same order.

**Example 2:**

- **Input:** nums = [7,1,3,9]
- **Output:** [7,1,3,9]
- **Explanation:** 
  - The separation of each integer in nums is itself.
  - answer = [7,1,3,9].

**Constraints:**

- `1 <= nums.length <= 1000`
- `1 <= nums[i] <= 10⁵`



**Hint:**
1. Convert each number into a list and append that list to the answer.
2. You can convert the integer into a string to do that easily.



**Similar Questions:**
1. [2180. Count Integers With Even Digit Sum](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002180-count-integers-with-even-digit-sum)
2. [2544. Alternating Digit Sum](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002544-alternating-digit-sum)






**Solution:**

The problem requires taking an array of positive integers and returning a new array that contains the individual digits of each number, in the original order of numbers and digits.  
The solution uses string conversion to split each number into its digits, then appends those digits to the result array.

### Approach:

- Iterate through each integer in the input array.
- Convert each integer to a string to easily access each character (digit).
- Split the string into an array of characters.
- Convert each character back to an integer and append it to the result array.
- Return the final array of digits.

Let's implement this solution in PHP: **[2553. Separate the Digits in an Array](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002553-separate-the-digits-in-an-array/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer[]
 */
function separateDigits(array $nums): array
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
print_r(separateDigits([13,25,83,77])) . "\n";          // Output: [1,3,2,5,8,3,7,7]
print_r(separateDigits([7,1,3,9])) . "\n";              // Output: [7,1,3,9]
?>
```

### Explanation:

- **Step 1:** Initialize an empty array `$answer` to hold the final digits.
- **Step 2:** Loop through each number `$num` in `$nums`.
- **Step 3:** Convert `$num` to a string and split it into individual characters using `str_split()`.
- **Step 4:** Loop through each character in the split array, cast it to an integer, and push it to `$answer`.
- **Step 5:** After processing all numbers, return `$answer`.

### Complexity
- **Time Complexity**: _**O(n * m)**_, where `n` is the number of integers in `nums` and `m` is the maximum number of digits in any integer (up to 6 digits since `nums[i] ≤ 10⁵`).
- **Space Complexity**: _**O(total digits)**_ for the output array, which is the sum of digits across all numbers in `nums`.
- **Efficiency:** The approach is optimal because we must output each digit exactly once.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**