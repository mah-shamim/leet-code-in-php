264\. Ugly Number II

**Difficulty:** Medium

**Topics:** `Hash Table`, `Math`, `Dynamic Programming`, `Heap (Priority Queue)`

An **ugly number** is a positive integer whose prime factors are limited to `2`, `3`, and `5`.

Given an integer `n`, return _the <code>n<sup>th</sup></code> **ugly number**_.

**Example 1:**

- **Input:** n = 10
- **Output:** 12
- **Explanation:** [1, 2, 3, 4, 5, 6, 8, 9, 10, 12] is the sequence of the first 10 ugly numbers.

**Example 2:**

- **Input:** n = 1
- **Output:** 1
- **Explanation:** 1 has no prime factors, therefore all of its prime factors are limited to 2, 3, and 5.

**Constraints:**

- <code>1 <= n <= 1690</code>

**Hint:**
1. The naive approach is to call `isUgly` for every number until you reach the <code>n<sup>th</sup></code> one. Most numbers are _not_ ugly. Try to focus your effort on generating only the ugly ones.
2. An ugly number must be multiplied by either 2, 3, or 5 from a smaller ugly number.
3. The key is how to maintain the order of the ugly numbers. Try a similar approach of merging from three sorted lists: L<sub>1</sub>, L<sub>2</sub>, and L<sub>3</sub>.
4. Assume you have U<sub>k</sub>, the k<sup>th</sup> ugly number. Then U<sub>k+1</sub> must be Min(L<sub>1</sub> * 2, L<sub>2</sub> * 3, L<sub>3</sub> * 5).


**Solution:**


We can use a dynamic programming approach. We'll maintain an array to store the ugly numbers and use three pointers to multiply by 2, 3, and 5.

Let's implement this solution in PHP: **[264. Ugly Number II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000264-ugly-number-ii/solution.php)**

```php
<?php
// Example usage:
$n1 = 10;
echo nthUglyNumber($n1);  // Output: 12
$n2 = 1;
echo nthUglyNumber($n2);  // Output: 1
?>
```

### Explanation:

- **Dynamic Programming Array:** We maintain an array `uglyNumbers` where each element corresponds to the next ugly number in the sequence.
- **Pointers (`i2`, `i3`, `i5`):** These pointers track the current position in the sequence for multiplying by 2, 3, and 5, respectively.
- **Next Multiples (`next2`, `next3`, `next5`):** These variables hold the next potential multiples of 2, 3, and 5.
- **Main Loop:** We iterate from 1 to `n-1`, and in each iteration, we determine the next ugly number by taking the minimum of `next2`, `next3`, and `next5`. Depending on which value is the minimum, we update the corresponding pointer and calculate the next multiple.
- **Return:** Finally, we return the nth ugly number.

This solution ensures that we generate the sequence of ugly numbers efficiently, focusing only on valid ugly numbers and skipping non-ugly numbers.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
