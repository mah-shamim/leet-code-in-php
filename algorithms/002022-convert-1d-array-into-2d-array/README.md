2022\. Convert 1D Array Into 2D Array

**Difficulty:** Easy

**Topics:** `Array`, `Matrix`, `Simulation`

You are given a **0-indexed** 1-dimensional (1D) integer array `original`, and two integers, `m` and `n`. You are tasked with creating a 2-dimensional (2D) array with  `m` rows and `n` columns using all the elements from `original`.

The elements from indices `0` to `n - 1` (**inclusive**) of `original` should form the first row of the constructed 2D array, the elements from indices `n` to `2 * n - 1` (**inclusive**) should form the second row of the constructed 2D array, and so on.

Return _an `m x n` 2D array constructed according to the above procedure, or an empty 2D array if it is impossible_.

**Example 1:**

![image-20210826114243-1](https://assets.leetcode.com/uploads/2021/08/26/image-20210826114243-1.png)

- **Input:** original = [1,2,3,4], m = 2, n = 2
- **Output:** [[1,2],[3,4]]
- **Explanation:** The constructed 2D array should contain 2 rows and 2 columns.
  The first group of n=2 elements in original, [1,2], becomes the first row in the constructed 2D array.
  The second group of n=2 elements in original, [3,4], becomes the second row in the constructed 2D array.

**Example 2:**

![ex2](https://assets.leetcode.com/uploads/2020/09/03/ex2.jpg)

- **Input:** original = [1,2,3], m = 1, n = 3
- **Output:** [[1,2,3]]
- **Explanation:** The constructed 2D array should contain 1 row and 3 columns.
  Put all three elements in original into the first row of the constructed 2D array.


**Example 3:**

- **Input:** original = [1,2], m = 1, n = 1
- **Output:** []
- **Explanation:** There are 2 elements in original.
  It is impossible to fit 2 elements in a 1x1 2D array, so return an empty 2D array.



**Constraints:**

- <code>1 <= original.length <= 5 * 10<sup>4</sup></code>
- <code>1 <= original[i] <= 10<sup>5</sup></code>
- <code>1 <= m, n <= 4 * 10<sup>4</sup></code>


**Hint:**
1. When is it possible to convert original into a 2D array and when is it impossible?
2. It is possible if and only if m * n == original.length
3. If it is possible to convert original to a 2D array, keep an index i such that original[i] is the next element to add to the 2D array.



**Solution:**

We need to follow these steps:

1. **Check if Conversion is Possible**: The conversion from a 1D array to a 2D array is only possible if the total number of elements in the 1D array (`original.length`) is exactly equal to `m * n`, where `m` is the number of rows and `n` is the number of columns. If this condition is not met, return an empty array.

2. **Create the 2D Array**: If the conversion is possible, initialize a 2D array with `m` rows and `n` columns, and populate it by iterating over the 1D array and filling in the 2D array row by row.

Let's implement this solution in PHP: **[2022. Convert 1D Array Into 2D Array](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002022-convert-1d-array-into-2d-array/solution.php)**

```php
<?php
/**
 * @param Integer[] $original
 * @param Integer $m
 * @param Integer $n
 * @return Integer[][]
 */
function construct2DArray($original, $m, $n) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
//Example 1
$original = array(1, 2, 3, 4);
$m = 2;
$n = 2;
print_r(construct2DArray($original, $m, $n)); //Output: [[1,2],[3,4]]

//Example 2
$original = array(1, 2, 3);
$m = 1;
$n = 3;
print_r(construct2DArray($original, $m, $n)); //Output: [[1,2,3]]

//Example 3
$original = array(1, 2);
$m = 1;
$n = 1;
print_r(construct2DArray($original, $m, $n)); //Output: []
?>
```

### Explanation:

- **Input Validation**:
   - We first calculate the length of the original array.
   - If the length does not equal `m * n`, the conversion is impossible, and we return an empty array.

- **2D Array Construction**:
   - We initialize a 2D array named `$result`.
   - We use a nested loop where the outer loop runs `m` times (for each row) and the inner loop runs `n` times (for each column in a row).
   - We maintain an index `$index` that tracks our position in the original array, incrementing it as we place elements into the 2D array.

### Example Output:

For the provided example:

```php
$original = array(1, 2, 3, 4);
$m = 2;
$n = 2;
print_r(construct2DArray($original, $m, $n));
```

The output will be:

```php
Array
(
    [0] => Array
        (
            [0] => 1
            [1] => 2
        )

    [1] => Array
        (
            [0] => 3
            [1] => 4
        )
)
```

This approach ensures that the 1D array is correctly converted into the desired 2D array, and it efficiently handles edge cases by checking whether the conversion is possible.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
