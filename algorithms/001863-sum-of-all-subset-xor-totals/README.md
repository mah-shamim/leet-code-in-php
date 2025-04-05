1863\. Sum of All Subset XOR Totals

**Difficulty:** Easy

**Topics:** `Array`, `Math`, `Backtracking`, `Bit Manipulation`, `Combinatorics`, `Enumeration`

The **XOR total** of an array is defined as the bitwise `XOR` of **all its elements**, or `0` if the array is empty.

- For example, the **XOR total** of the array `[2,5,6]` is `2 XOR 5 XOR 6 = 1`.

Given an array `nums`, return _the **sum** of **all XOR totals** for every **subset** of `nums`._

**Note:** Subsets with the **same** elements should be counted **multiple** times.

An array `a` is a **subset** of an array `b` if `a` can be obtained from `b` by deleting some (possibly zero) elements of `b`.

**Example 1:**

- **Input:** nums = [1,3]
- **Output:** 28
- **Explanation:** The 4 subsets of [1,3] are:
  - The empty subset has an XOR total of 0.
  - [1] has an XOR total of 1.
  - [3] has an XOR total of 3.
  - [1,3] has an XOR total of 1 XOR 3 = 2.

`0 + 1 + 3 + 2 = 6`

**Example 2:**

- **Input:**nums = [5,1,6]
- **Output:** 28
- **Explanation:** The 8 subsets of [5,1,6] are:
  - The empty subset has an XOR total of 0.
  - [5] has an XOR total of 5.
  - [1] has an XOR total of 1.
  - [6] has an XOR total of 6.
  - [5,1] has an XOR total of 5 XOR 1 = 4.
  - [5,6] has an XOR total of 5 XOR 6 = 3.
  - [1,6] has an XOR total of 1 XOR 6 = 7.
  - [5,1,6] has an XOR total of 5 XOR 1 XOR 6 = 2.

`0 + 5 + 1 + 6 + 4 + 3 + 7 + 2 = 28`

**Example 3:**

- **Input:** nums = [3,4,5,6,7,8]
- **Output:** 480
- **Explanation:** The sum of all XOR totals for every subset is 480.

**Constraints:**

- <code>1 <= nums.length <= 12</code>
- <code>1 <= nums[i] <= 20</code>


**Hint:**
1. Is there a way to iterate through all the subsets of the array?
2. Can we use recursion to efficiently iterate through all the subsets?



**Solution:**

We need to calculate the sum of all XOR totals for every subset of a given array. The key insight here is to leverage bit manipulation and mathematical properties to avoid generating all subsets explicitly, which would be computationally expensive.

### Approach
The XOR total of a subset is determined by the bitwise XOR of all its elements. For each bit position, the XOR result will have that bit set if an odd number of elements in the subset have that bit set.

1. **Bitwise OR Calculation**: The bitwise OR of all elements in the array helps identify which bits are set in at least one element. If a bit is set in the OR result, it means there is at least one element in the array with that bit set.
2. **Contribution Calculation**: Each bit that is set in the OR result contributes to the final sum. The number of subsets where a bit is set can be determined by the formula _**2<sup>n-1</sup>**_, where _**n**_ is the number of elements in the array. This is because for each bit, half of all possible subsets (excluding the empty subset) will have an odd count of elements with that bit set.

Let's implement this solution in PHP: **[1863. Sum of All Subset XOR Totals](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001863-sum-of-all-subset-xor-totals/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function subsetXORSum($nums) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

subsetXORSum([1,3]);       // Output: 6
subsetXORSum([5,1,6]);     // Output: 28
subsetXORSum([3,4,5,6,7,8]); // Output: 480
?>
```

### Explanation:

1. **Bitwise OR Calculation**: The `array_reduce` function is used to compute the bitwise OR of all elements in the array. This gives a number where each bit is set if it is set in at least one element of the array.
2. **Contribution Calculation**: The result of the OR operation is then shifted left by _**n-1**_ positions, where _**n**_ is the number of elements in the array. This is equivalent to multiplying the OR result by _**2<sup>n-1</sup>**_, which accounts for the contribution of each bit being set in all valid subsets.

This approach efficiently computes the required sum in _**O(n)**_ time complexity, where _**n**_ is the number of elements in the array, making it highly efficient even for the upper constraint of _**n = 12**_.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**