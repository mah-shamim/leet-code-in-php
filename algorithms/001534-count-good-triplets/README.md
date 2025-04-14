1534\. Count Good Triplets

**Difficulty:** Easy

**Topics:** `Array`, `Enumeration`

Given an array of integers `arr`, and three integers `a`, `b` and `c`. You need to find the number of good triplets.

A triplet `(arr[i], arr[j], arr[k])` is **good** if the following conditions are true:

- `0 <= i < j < k < arr.length`
- `|arr[i] - arr[j]| <= a`
- `|arr[j] - arr[k]| <= b`
- `|arr[i] - arr[k]| <= c`

Where `|x|` denotes the absolute value of `x`.

Return _the number of good triplets_.

**Example 1:**

- **Input:** arr = [3,0,1,1,9,7], a = 7, b = 2, c = 3
- **Output:** 4
- **Explanation:** There are 4 good triplets: [(3,0,1), (3,0,1), (3,1,1), (0,1,1)].

**Example 2:**

- **Input:** arr = [1,1,2,2,3], a = 0, b = 0, c = 1
- **Output:** 0
- **Explanation:** No triplet satisfies all conditions.



**Constraints:**

- `3 <= arr.length <= 100`
- `0 <= arr[i] <= 1000`
- `0 <= a, b, c <= 1000`


**Hint:**
1. Notice that the constraints are small enough for a brute force solution to pass.
2. Loop through all triplets, and count the ones that are good.



**Solution:**

We need to count the number of good triplets in an array. A triplet is considered good if it meets specific conditions involving absolute differences between elements at different indices.

### Approach
1. **Brute Force Enumeration**: Given the constraints (array length up to 100), a brute force approach is feasible. We will check all possible triplets (i, j, k) where 0 <= i < j < k < arr.length.
2. **Conditions Check**: For each triplet, we check the following conditions:
   - The absolute difference between elements at indices i and j must be <= a.
   - The absolute difference between elements at indices j and k must be <= b.
   - The absolute difference between elements at indices i and k must be <= c.
3. **Optimization**: Early termination of inner loops when a condition fails to save unnecessary computations.

Let's implement this solution in PHP: **[1534. Count Good Triplets](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001534-count-good-triplets/solution.php)**

```php
<?php
/**
 * @param Integer[] $arr
 * @param Integer $a
 * @param Integer $b
 * @param Integer $c
 * @return Integer
 */
function countGoodTriplets($arr, $a, $b, $c) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example 1
$arr1 = array(3, 0, 1, 1, 9, 7);
$a1 = 7;
$b1 = 2;
$c1 = 3;
echo "Output 1: " . countGoodTriplets($arr1, $a1, $b1, $c1) . "\n"; // Output: 4

// Example 2
$arr2 = array(1, 1, 2, 2, 3);
$a2 = 0;
$b2 = 0;
$c2 = 1;
echo "Output 2: " . countGoodTriplets($arr2, $a2, $b2, $c2) . "\n"; // Output: 0
?>
```

### Explanation:

1. **Loop Structure**: We use three nested loops to generate all possible triplets (i, j, k) where i < j < k. The outer loop runs from 0 to n-3, the middle loop from i+1 to n-2, and the inner loop from j+1 to n-1.
2. **Early Termination**: If the difference between elements at i and j exceeds `a`, we skip to the next j. Similarly, if the difference between j and k exceeds `b`, we skip to the next k.
3. **Check All Conditions**: For each valid triplet (i, j, k) that passes the first two checks, we compute the difference between i and k and check if it meets the third condition. If all conditions are satisfied, we increment the count.

This approach ensures that we efficiently check all possible triplets while adhering to the problem constraints, making it both effective and straightforward.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**