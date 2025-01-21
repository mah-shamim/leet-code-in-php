786\. K-th Smallest Prime Fraction

**Difficulty:** Medium

**Topics:** `Array`, `Two Pointers`, `Binary Search`, `Sorting`, `Heap (Priority Queue)`

You are given a sorted integer array `arr` containing `1` and **prime** numbers, where all the integers of `arr` are unique. You are also given an integer `k`.

For every `i` and `j` where `0 <= i < j < arr.length`, we consider the fraction `arr[i] / arr[j]`.

Return _the <code>k<sup>th</sup></code> smallest fraction considered. Return your answer as an array of integers of size `2`, where `answer[0] == arr[i]` and `answer[1] == arr[j]`_.

**Example 1:**

- **Input:** arr = [1,2,3,5], k = 3
- **Output:** [2,5]
- **Explanation:** The fractions to be considered in sorted order are:\
  1/5, 1/3, 2/5, 1/2, 3/5, and 2/3.\
  The third fraction is 2/5.

**Example 2:**

- **Input:** arr = [1,7], k = 1
- **Output:** [1,7]


**Constraints:**

- `2 <= arr.length <= 1000`
- `1 <= arr[i] <= 3 * 104`
- `arr[0] == 1`
- `arr[i]` is a **prime** number for `i > 0`.
- All the numbers of `arr` are **unique** and sorted in **strictly increasing** order.
- `1 <= k <= arr.length * (arr.length - 1) / 2`

**Follow up:** Can you solve the problem with better than <code>O(n<sup>2</sup>)</code> complexity?



**Solution:**

Here is a detailed breakdown:

### Approach:
1. **Binary Search on Fractions**:
   We perform a binary search over the range of possible fraction values, starting from `0.0` to `1.0`. For each midpoint `m`, we count how many fractions are less than or equal to `m` and track the largest fraction in that range.

2. **Counting Fractions**:
   Using two pointers, for each prime `arr[i]`, we find the smallest `arr[j]` such that `arr[i] / arr[j]` is greater than the current midpoint `m`. We keep track of the number of valid fractions found and update the fraction closest to `m` but smaller than `m`.

3. **Binary Search Adjustments**:
   If the number of fractions less than or equal to `m` is exactly `k`, we return the best fraction found so far. If the count is more than `k`, we adjust the right boundary (`r`) of the search. Otherwise, we adjust the left boundary (`l`).


Let's implement this solution in PHP: **[786. K-th Smallest Prime Fraction](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000786-k-th-smallest-prime-fraction/solution.php)**

```php
<?php
/**
 * @param Integer[] $arr
 * @param Integer $k
 * @return Integer[]
 */
function kthSmallestPrimeFraction($arr, $k) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example 1:
$arr1 = [1, 2, 3, 5];
$k1 = 3;
$result1 = kthSmallestPrimeFraction($arr1, $k1);
echo "[" . implode(", ", $result1) . "]\n"; // Output: [2, 5]

// Example 2:
$arr2 = [1, 7];
$k2 = 1;
$result2 = kthSmallestPrimeFraction($arr2, $k2);
echo "[" . implode(", ", $result2) . "]\n"; // Output: [1, 7]
?>
```

### Explanation:

1. **Binary Search (`$l` and `$r`)**:
   We perform a binary search on the possible values of the fractions, starting with `0.0` (the smallest possible value) and `1.0` (the largest possible value). For each midpoint `m`, we check how many fractions are smaller than or equal to `m`.

2. **Counting Valid Fractions**:
   For each prime `arr[i]`, we use a pointer `j` to find the smallest `arr[j]` such that `arr[i] / arr[j] > m`. This ensures that we only count fractions smaller than `m`.

3. **Tracking the Closest Fraction**:
   While counting the fractions smaller than or equal to `m`, we also keep track of the largest fraction that is smaller than or equal to `m` using the condition `if ($p * $arr[$j] < $q * $arr[$i])`. This ensures we are tracking the closest fraction to `m` but smaller.

4. **Binary Search Updates**:
  - If the count of fractions less than or equal to `m` matches `k`, we return the fraction.
  - If the count is greater than `k`, we shrink the search range (`$r = $m`).
  - If the count is smaller than `k`, we expand the search range (`$l = $m`).

### Time Complexity:
- The binary search runs in _**O(log(precision))**_, where the precision refers to the range of fraction values we are considering.
- For each midpoint, counting the valid fractions and tracking the largest fraction takes _**O(n)**_, as we loop over the array.

Thus, the total time complexity is approximately _**O(n log(precision))**_, where _**n**_ is the length of the array and the precision is determined by how accurately we search for the midpoint. This is better than the brute-force _**O(n<sup>2</sup>)**_ approach.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**


