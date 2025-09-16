2197\. Replace Non-Coprime Numbers in Array

**Difficulty:** Hard

**Topics:** `Array`, `Math`, `Stack`, `Number Theory`, `Weekly Contest 283`

You are given an array of integers `nums`. Perform the following steps:

1. Find **any** two **adjacent** numbers in `nums` that are non-coprime.
2. If no such numbers are found, **stop** the process.
3. Otherwise, delete the two numbers and **replace** them with their **LCM (Least Common Multiple)**.
4. **Repeat** this process as long as you keep finding two adjacent non-coprime numbers.

Return the **final** modified array. It can be shown that replacing adjacent non-coprime numbers in **any** arbitrary order will lead to the same result.

The test cases are generated such that the values in the final array are **less than or equal** to <code>10<sup>8</sup></code>.

Two values `x` and `y` are **non-coprime** if `GCD(x, y) > 1` where `GCD(x, y)` is the **Greatest Common Divisor** of ``x` and `y`.

**Example 1:**

- **Input:** nums = [6,4,3,2,7,6,2]
- **Output:** [12,7,6]
- **Explanation:**
  - (6, 4) are non-coprime with LCM(6, 4) = 12. Now, nums = [12,3,2,7,6,2].
  - (12, 3) are non-coprime with LCM(12, 3) = 12. Now, nums = [12,2,7,6,2].
  - (12, 2) are non-coprime with LCM(12, 2) = 12. Now, nums = [12,7,6,2].
  - (6, 2) are non-coprime with LCM(6, 2) = 6. Now, nums = [12,7,6].
    There are no more adjacent non-coprime numbers in nums.
    Thus, the final modified array is [12,7,6].
    Note that there are other ways to obtain the same resultant array.

**Example 2:**

- **Input:** nums = [2,2,1,1,3,3,3]
- **Output:** [2,1,1,3]
- **Explanation:**
  - (3, 3) are non-coprime with LCM(3, 3) = 3. Now, nums = [2,2,1,1,3,3].
  - (3, 3) are non-coprime with LCM(3, 3) = 3. Now, nums = [2,2,1,1,3].
  - (2, 2) are non-coprime with LCM(2, 2) = 2. Now, nums = [2,1,1,3].
    There are no more adjacent non-coprime numbers in nums.
    Thus, the final modified array is [2,1,1,3].
    Note that there are other ways to obtain the same resultant array.

**Constraints:**

- <code>1 <= nums.length <= 10<sup>5</sup></code>
- <code>1 <= nums[i] <= 10<sup>5</sup></code>
- The test cases are generated such that the values in the final array are **less than or equal** to <code>10<sup>8</sup></code>


**Hint:**
1. Notice that the order of merging two numbers into their LCM does not matter so we can greedily merge elements to its left if possible.
2. If a new value is formed, we should recursively check if it can be merged with the value to its left.
3. To simulate the merge efficiently, we can maintain a stack that stores processed elements. When we iterate through the array, we only compare with the top of the stack (which is the value to its left).


**Similar Questions:**
1. [1209. Remove All Adjacent Duplicates in String II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001209-remove-all-adjacent-duplicates-in-string-ii)
2. [2001. Number of Pairs of Interchangeable Rectangles](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002001-number-of-pairs-of-interchangeable-rectangles)
3. [2584. Split the Array to Make Coprime Products](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002584-split-the-array-to-make-coprime-products)






**Solution:**

We need to repeatedly replace any two adjacent non-coprime numbers in an array with their Least Common Multiple (LCM) until no adjacent non-coprime pairs remain. The solution involves efficiently processing the array while ensuring that any merges are handled in a way that might require further merges with previous elements.

### Approach
1. **Stack-Based Processing**: We use a stack to process each element of the array. The stack helps keep track of the elements that have been processed and allows us to check and merge adjacent elements efficiently.
2. **GCD and LCM Calculation**: For each new element, we check it against the top of the stack. If they are non-coprime (i.e., their GCD is greater than 1), we merge them by replacing them with their LCM. This process is repeated with the new merged value and the next top of the stack until no more merges are possible.
3. **Efficiency**: The algorithm processes each element once and performs merge operations only when necessary. The stack ensures that we efficiently handle any chain reactions caused by merges, as each merge might create a new value that could further merge with previous elements.

Let's implement this solution in PHP: **[2197. Replace Non-Coprime Numbers in Array](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002197-replace-non-coprime-numbers-in-array/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer[]
 */
function replaceNonCoprimes($nums) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $a
 * @param $b
 * @return int|mixed
 */
function gcd($a, $b) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
$nums1 = [6,4,3,2,7,6,2];
print_r(replaceNonCoprimes($nums1));
// Output: [12, 7, 6]

$nums2 = [2,2,1,1,3,3,3];
print_r(replaceNonCoprimes($nums2));
// Output: [2, 1, 1, 3]
?>
```

### Explanation:

1. **Initialization**: We start with an empty stack to process each number in the input array.
2. **Processing Each Number**: For each number in the array, we set it as the current value. We then check this current value against the top of the stack. If they are non-coprime (GCD > 1), we pop the top value, compute the LCM of the current value and the popped value, and set the current value to this LCM. This step repeats until the current value and the new top of the stack are coprime.
3. **Pushing to Stack**: After ensuring no more merges are possible, we push the current value onto the stack.
4. **GCD Calculation**: The helper function `gcd` computes the greatest common divisor of two numbers using the Euclidean algorithm, which is efficient and widely used for this purpose.
5. **Result**: The stack eventually contains all the elements after all possible merges, which is returned as the result.

This approach efficiently processes the array by leveraging a stack to handle merges in a left-to-right manner, ensuring that all possible adjacent non-coprime pairs are merged correctly. The algorithm efficiently handles chain reactions caused by merges by repeatedly checking the merged value against the previous elements in the stack. The time complexity is linear with respect to the input size, making it suitable for large arrays.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://jackaltimer.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**