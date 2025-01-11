1894\. Find the Student that Will Replace the Chalk

**Difficulty:** Medium

**Topics:** `Array`, `Binary Search`, `Simulation`, `Prefix Sum`

There are `n` students in a class numbered from `0` to `n - 1`. The teacher will give each student a problem starting with the student number `0`, then the student number `1`, and so on until the teacher reaches the student number `n - 1`. After that, the teacher will restart the process, starting with the student number `0` again.

You are given a **0-indexed** integer array `chalk` and an integer `k`. There are initially `k` pieces of chalk. When the student number `i` is given a problem to solve, they will use `chalk[i]` pieces of chalk to solve that problem. However, if the current number of chalk pieces is **strictly less** than `chalk[i]`, then the student number `i` will be asked to **replace** the chalk.

Return _the **index** of the student that will **replace** the chalk pieces_.

**Example 1:**

- **Input:** chalk = [5,1,5], k = 22
- **Output:** 0
- **Explanation:** The students go in turns as follows:
  - Student number 0 uses 5 chalk, so k = 17.
  - Student number 1 uses 1 chalk, so k = 16.
  - Student number 2 uses 5 chalk, so k = 11.
  - Student number 0 uses 5 chalk, so k = 6.
  - Student number 1 uses 1 chalk, so k = 5.
  - Student number 2 uses 5 chalk, so k = 0.
  - Student number 0 does not have enough chalk, so they will have to replace it.

**Example 2:**

- **Input:** chalk = [3,4,1,2], k = 25
- **Output:** 1
- **Explanation:** The students go in turns as follows:
  - Student number 0 uses 3 chalk so k = 22.
  - Student number 1 uses 4 chalk so k = 18.
  - Student number 2 uses 1 chalk so k = 17.
  - Student number 3 uses 2 chalk so k = 15.
  - Student number 0 uses 3 chalk so k = 12.
  - Student number 1 uses 4 chalk so k = 8.
  - Student number 2 uses 1 chalk so k = 7.
  - Student number 3 uses 2 chalk so k = 5.
  - Student number 0 uses 3 chalk so k = 2.
  - Student number 1 does not have enough chalk, so they will have to replace it.

**Constraints:**

- <code>chalk.length == n</code>
- <code>1 <= n <= 10<sup>5</sup></code>
- <code>1 <= chalk[i] <= 10<sup>5</sup></code>
- <code>1 <= k <= 10<sup>9</sup></code>


**Hint:**
1. Subtract the sum of chalk from k until k is less than the sum of chalk.
2. Now iterate over the array. If chalk[i] is less than k, this is the answer. Otherwise, subtract chalk[i] from k and continue.



**Solution:**

Let's break down the problem step by step:

### Approach:

1. **Total Chalk Consumption:**
   First, calculate the total amount of chalk needed for one complete round (from student `0` to student `n-1`). This will help us reduce the value of `k` by taking into account how many complete rounds can be covered by `k` pieces of chalk.

2. **Reduce `k` by Modulo:**
   If `k` is larger than the total chalk required for one complete round, we can simplify the problem by taking `k % total_chalk`. This operation will give us the remaining chalk after as many full rounds as possible, leaving us with a smaller problem to solve.

3. **Find the Student Who Runs Out of Chalk:**
   Iterate through each student's chalk consumption, subtracting it from `k` until `k` becomes less than the current student's chalk requirement. The index of this student is our answer.

### Example Walkthrough:

Let's take an example `chalk = [3, 4, 1, 2]` and `k = 25`:

1. **Total Chalk Consumption:**
   ```
   text{total_chalk} = 3 + 4 + 1 + 2 = 10
   ```

2. **Reduce `k`:**
   ```
   k % 10 = 25 % 10 = 5
   ```
   Now we have `k = 5` after subtracting as many full rounds as possible.

3. **Find the Student:**
   - Student `0` uses `3` chalk, so `k = 5 - 3 = 2`.
   - Student `1` requires `4` chalk, but `k = 2`, which is less than `4`.
   - Therefore, student `1` will be the one who needs to replace the chalk.

Let's implement this solution in PHP: **[1894. Find the Student that Will Replace the Chalk](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001894-find-the-student-that-will-replace-the-chalk/solution.php)**

```php
<?php
/**
 * @param Integer[] $chalk
 * @param Integer $k
 * @return Integer
 */
function chalkReplacer($chalk, $k) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:

//Example 1
$chalk = [5,1,5];
$k = 22;
echo chalkReplacer($chalk, $k);  // Output: 0

//Example 2
$chalk = [3, 4, 1, 2];
$k = 25;
echo chalkReplacer($chalk, $k);  // Output: 1
?>
```

### Explanation:

1. **Total Chalk Sum:** We sum up all the chalk requirements to get the total for one complete round.
2. **Modulo Operation:** Using modulo with `k`, we get the effective number of chalks to distribute after full rounds.
3. **Find the Student:** We then iterate through the students, checking if the remaining chalk is sufficient. The first time it's insufficient, that student's index is the answer.

### Complexity:
- **Time Complexity:** O(n) — we sum the array and then iterate through it once.
- **Space Complexity:** O(1) — only a few variables are used, independent of the input size.

This approach ensures that the problem is solved efficiently even for large inputs.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**

