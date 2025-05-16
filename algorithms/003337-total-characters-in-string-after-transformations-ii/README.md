3337\. Total Characters in String After Transformations II

**Difficulty:** Hard

**Topics:** `Hash Table`, `Math`, `String`, `Dynamic Programming`, `Counting`

You are given a string `s` consisting of lowercase English letters, an integer `t` representing the number of **transformations** to perform, and an array `nums` of size 26. In one **transformation**, every character in `s` is replaced according to the following rules:

- Replace `s[i]` with the **next** `nums[s[i] - 'a']` consecutive characters in the alphabet. For example, if `s[i] = 'a'` and `nums[0] = 3`, the character `'a'` transforms into the next 3 consecutive characters ahead of it, which results in `"bcd"`.
- The transformation **wraps** around the alphabet if it exceeds `'z'`. For example, if `s[i] = 'y'` and `nums[24] = 3`, the character `'y'` transforms into the next 3 consecutive characters ahead of it, which results in `"zab"`.

Return the length of the resulting string after **exactly** `t` transformations.

Since the answer may be very large, return it **modulo** <code>10<sub>9</sub> + 7</code>.

**Example 1:**

- **Input:** s = "abcyy", t = 2, nums = [1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,2]
- **Output:** 7
- **Explanation:**
  - **First Transformation (t = 1)**:
    - `'a'` becomes `'b'` as `nums[0] == 1`
    - `'b'` becomes `'c'` as `nums[1] == 1`
    - `'c'` becomes `'d'` as `nums[2] == 1`
    - `'y'` becomes `'z'` as `nums[24] == 1`
    - `'y'` becomes `'z'` as `nums[24] == 1`
    - String after the first transformation: `"bcdzz"`
  - **Second Transformation (t = 2)**:
    - `'b'` becomes `'c'` as `nums[1] == 1`
    - `'c'` becomes `'d'` as `nums[2] == 1`
    - `'d'` becomes `'e'` as `nums[3] == 1`
    - `'z'` becomes `'ab'` as `nums[25] == 2`
    - `'z'` becomes `'ab'` as `nums[25] == 2`
    - String after the second transformation: `"cdeabab"`
  - **Final Length of the string**: The string is `"cdeabab"`, which has 7 characters.



**Example 2:**

- **Input:** s = "azbk", t = 1, nums = [2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2]
- **Output:** 8
- **Explanation:**
  - **First Transformation (t = 1)**:
    - `'a'` becomes `'bc'` as `nums[0] == 2`
    - `'z'` becomes `'ab'` as `nums[25] == 2`
    - `'b'` becomes `'cd'` as `nums[1] == 2`
    - `'k'` becomes `'lm'` as `nums[10] == 2`
    - String after the first transformation:` "bcabcdlm"`
  - **Final Length of the string**: The string is `"bcabcdlm"`, which has 8 characters.




**Constraints:**

- <code>1 <= s.length <= 10<sup>5</sup></code>
- `s` consists only of lowercase English letters.
- <code>1 <= t <= 10<sup>9</sup></code>
- `nums.length == 26`
- `1 <= nums[i] <= 25`


**Hint:**
1. Model the problem as a matrix multiplication problem.
2. Use exponentiation to quickly multiply matrices.



**Solution:**

We need to determine the length of a string after applying a series of transformations. Each transformation replaces each character in the string with a specified number of consecutive characters, wrapping around the alphabet if necessary. Given the constraints, directly simulating each transformation is infeasible, so we use matrix exponentiation to efficiently compute the result after a large number of transformations.

### Approach
1. **Matrix Representation**: Represent each transformation step as a matrix where each entry (i, j) indicates how many times character j appears when character i is transformed.
2. **Matrix Exponentiation**: Use matrix exponentiation to compute the effect of applying the transformation t times. This allows us to efficiently handle the large number of transformations (up to 1e9).
3. **Dot Product Calculation**: For each character in the original string, compute its contribution to the final string length using the precomputed matrix and the given transformation counts.

Let's implement this solution in PHP: **[3337. Total Characters in String After Transformations II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003337-total-characters-in-string-after-transformations-ii/solution.php)**

```php
<?php
/**
 * @param String $s
 * @param Integer $t
 * @param Integer[] $nums
 * @return Integer
 */
function lengthAfterTransformations($s, $t, $nums) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $nums
 * @param $mod
 * @return array
 */
function buildMatrix($nums, $mod) {
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
 * @param $mod
 * @return array
 */
function matrix_multiply($a, $b, $mod) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $mat
 * @param $power
 * @param $mod
 * @return array
 */
function matrix_power($mat, $power, $mod) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @return array
 */
function matrix_identity() {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
$s = "abcyy";
$t = 2;
$nums = [1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,2];
echo lengthAfterTransformations($s, $t, $nums);  // Output: 7

$s = "azbk";
$t = 1;
$nums = [2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2];
echo lengthAfterTransformations($s, $t, $nums);  // Output: 8
?>
```

### Explanation:

1. **Matrix Construction**: The `buildMatrix` function constructs a 26x26 matrix where each entry (i, j) indicates how many times character j is generated when character i is transformed.
2. **Matrix Exponentiation**: The `matrix_power` function computes the matrix raised to the power of (t-1) using exponentiation by squaring, which efficiently handles large exponents.
3. **Contribution Calculation**: For each character in the original string, we compute its contribution to the final length by multiplying the corresponding row of the exponentiated matrix with the transformation counts array (`nums`), summing the results modulo 1e9+7.

This approach ensures that we efficiently compute the result even for very large values of t, leveraging matrix exponentiation to reduce the complexity from O(t) to O(log t).

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**