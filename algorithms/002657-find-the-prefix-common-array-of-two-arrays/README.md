2657\. Find the Prefix Common Array of Two Arrays

**Difficulty:** Medium

**Topics:** `Array`, `Hash Table`, `Bit Manipulation`

You are given two **0-indexed** integer permutations `A` and `B` of length `n`.

A **prefix common array** of `A` and `B` is an array `C` such that `C[i]` is equal to the count of numbers that are present at or before the index `i` in both `A` and `B`.

Return _the **prefix common array** of `A` and `B`_.

A sequence of `n` integers is called a **permutation** if it contains all integers from `1` to `n` exactly once.

**Example 1:**

- **Input:** A = [1,3,2,4], B = [3,1,2,4]
- **Output:** [0,2,3,4]
- **Explanation:** At i = 0: no number is common, so C[0] = 0.
  At i = 1: 1 and 3 are common in A and B, so C[1] = 2.
  At i = 2: 1, 2, and 3 are common in A and B, so C[2] = 3.
  At i = 3: 1, 2, 3, and 4 are common in A and B, so C[3] = 4.

**Example 2:**

- **Input:** A = [2,3,1], B = [3,1,2]
- **Output:** [0,1,3]
- **Explanation:** At i = 0: no number is common, so C[0] = 0.
  At i = 1: only 3 is common in A and B, so C[1] = 1.
  At i = 2: 1, 2, and 3 are common in A and B, so C[2] = 3.



**Constraints:**

- `1 <= A.length == B.length == n <= 50`
- `1 <= A[i], B[i] <= n`
- `It is guaranteed that A and B are both a permutation of n integers.`


**Hint:**
1. Consider keeping a frequency array that stores the count of occurrences of each number till index i.
2. If a number occurred two times, it means it occurred in both A and B since they’re both permutations so add one to the answer.



**Solution:**

We can iterate over the two arrays A and B while keeping track of the numbers that have occurred at or before the current index in both arrays. Since both arrays are permutations of the same set of numbers, we can utilize two hash sets (or arrays) to store which numbers have appeared at or before the current index in both arrays. For each index, we can count the common numbers that have appeared in both arrays up to that point.

### Solution Approach:
1. Use two arrays to keep track of the occurrences of numbers in both `A` and `B` up to index `i`.
2. For each index `i`, check if both `A[i]` and `B[i]` have been seen before. If so, increment the common count.
3. Use a frequency array to track the presence of numbers from `1` to `n` in both arrays.

Let's implement this solution in PHP: **[2657. Find the Prefix Common Array of Two Arrays](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002657-find-the-prefix-common-array-of-two-arrays/solution.php)**

```php
<?php
/**
 * @param Integer[] $A
 * @param Integer[] $B
 * @return Integer[]
 */
function findThePrefixCommonArray($A, $B) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
$A = [1, 3, 2, 4];
$B = [3, 1, 2, 4];
print_r(findThePrefixCommonArray($A, $B)); // Output: [0, 2, 3, 4]

$A = [2, 3, 1];
$B = [3, 1, 2];
print_r(findThePrefixCommonArray($A, $B)); // Output: [0, 1, 3]
?>
```

### Explanation:

1. **Frequency Arrays**: We maintain two frequency arrays, `freqA` and `freqB`, where each index represents a number in the permutation.
   - When we encounter a number in `A[i]` or `B[i]`, we increase the corresponding value in the frequency array.
2. **Common Count**: After updating the frequency arrays for both `A[i]` and `B[i]`, we check for each number if it has appeared in both arrays up to index `i`. If so, we increase the `commonCount`.
3. **Result**: The common count is stored in the `result` array for each index.

### Example Walkthrough:

For the input:
```php
$A = [1, 3, 2, 4];
$B = [3, 1, 2, 4];
```

- At `i = 0`: No common numbers yet → `C[0] = 0`
- At `i = 1`: Numbers `1` and `3` are common → `C[1] = 2`
- At `i = 2`: Numbers `1`, `2`, and `3` are common → `C[2] = 3`
- At `i = 3`: Numbers `1`, `2`, `3`, and `4` are common → `C[3] = 4`

Output: `[0, 2, 3, 4]`

### Time Complexity:
- **O(n<sup>2)</sup>**: For each index `i`, we are checking every element from `1` to `n` to see if it's common, making this solution quadratic in time complexity. This is acceptable given the constraint _**n ≤ 50**_.

This should work within the given constraints effectively.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
