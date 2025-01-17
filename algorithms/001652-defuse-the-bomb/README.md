1652\. Defuse the Bomb

**Difficulty:** Easy

**Topics:** `Array`, `Sliding Window`

You have a bomb to defuse, and your time is running out! Your informer will provide you with a **circular** array `code` of length of `n` and a key `k`.

To decrypt the code, you must replace every number. All the numbers are replaced **simultaneously**.

- If `k > 0`, replace the <code>i<sup>th</sup></code> number with the sum of the **next** `k` numbers.
- If `k < 0`, replace the <code>i<sup>th</sup></code> number with the sum of the **previous** `k` numbers.
- If `k == 0`, replace the <code>i<sup>th</sup></code> number with `0`.

As `code` is circular, the next element of `code[n-1]` is `code[0]`, and the previous element of `code[0]` is `code[n-1]`.

Given the **circular** array `code` and an integer key `k`, return _the decrypted code to defuse the bomb_!

**Example 1:**

- **Input:** code = [5,7,1,4], k = 3
- **Output:** [12,10,16,13]
- **Explanation:** Each number is replaced by the sum of the next 3 numbers. The decrypted code is [7+1+4, 1+4+5, 4+5+7, 5+7+1]. Notice that the numbers wrap around.

**Example 2:**

- **Input:** code = [1,2,3,4], k = 0
- **Output:** [0,0,0,0]
- **Explanation:** When k is zero, the numbers are replaced by 0.


**Example 3:**

- **Input:** code = [2,4,9,3], k = -2
- **Output:** [12,5,6,13]
- **Explanation:** The decrypted code is [3+9, 2+3, 4+2, 9+4]. Notice that the numbers wrap around again. If k is negative, the sum is of the previous numbers.


**Constraints:**

- `n == code.length`
- `1 <= n <= 100`
- `1 <= code[i] <= 100`
- `-(n - 1) <= k <= n - 1`


**Hint:**
1. As the array is circular, use modulo to find the correct index.
2. The constraints are low enough for a brute-force solution.



**Solution:**

We can implement a function that iterates over the `code` array and computes the sum of the appropriate numbers based on the value of `k`.

The general approach will be as follows:
1. If `k == 0`, replace all elements with 0.
2. If `k > 0`, replace each element with the sum of the next `k` elements in the circular array.
3. If `k < 0`, replace each element with the sum of the previous `k` elements in the circular array.

The circular nature of the array means that for indices that exceed the bounds of the array, you can use modulo (`%`) to "wrap around" the array.

Let's implement this solution in PHP: **[1652. Defuse the Bomb](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001652-defuse-the-bomb/solution.php)**

```php
<?php
/**
 * @param Integer[] $code
 * @param Integer $k
 * @return Integer[]
 */
function decrypt($code, $k) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example Usage
$code1 = [5, 7, 1, 4];
$k1 = 3;
print_r(decrypt($code1, $k1)); // Output: [12, 10, 16, 13]

$code2 = [1, 2, 3, 4];
$k2 = 0;
print_r(decrypt($code2, $k2)); // Output: [0, 0, 0, 0]

$code3 = [2, 4, 9, 3];
$k3 = -2;
print_r(decrypt($code3, $k3)); // Output: [12, 5, 6, 13]
?>
```

### Explanation:

1. **Initialization**:
   - We create a result array initialized with zeros using `array_fill`.

2. **Handling `k == 0`**:
   - If `k` is zero, the output array is simply filled with zeros, as required by the problem.

3. **Iterating Through the Array**:
   - For each index `i` in the array:
      - If `k > 0`, sum the next `k` elements using modulo arithmetic to wrap around.
      - If `k < 0`, sum the previous `|k|` elements using modulo arithmetic with an offset to handle negative indices.

4. **Modulo Arithmetic**:
   - We use `($i + $j) % $n` to wrap around to the beginning of the array when accessing indices greater than `n - 1`.
   - Similarly, `($i - $j + $n) % $n` handles backward wrapping for negative indices.

5. **Complexity**:
   - Time Complexity: _**O(n . |k|)**_, where _**n**_ is the size of the array and _**|k|**_ is the absolute value of _**k**_.
   - Space Complexity: _**O(n)**_ for the result array.

### Outputs:
The provided examples match the expected results. Let me know if you need further explanation or optimizations!

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
