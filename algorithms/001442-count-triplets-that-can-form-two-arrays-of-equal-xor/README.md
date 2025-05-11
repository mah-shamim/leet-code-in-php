1442\. Count Triplets That Can Form Two Arrays of Equal XOR

**Difficulty:** Medium

**Topics:** `Array`, `Hash Table`, `Math`, `Bit Manipulation`, `Prefix Sum`

Given an array of integers `arr`.

We want to select three indices `i`, `j` and `k` where `(0 <= i < j <= k < arr.length)`.

Let's define `a` and `b` as follows:

- `a = arr[i] ^ arr[i + 1] ^ ... ^ arr[j - 1]`
- `b = arr[j] ^ arr[j + 1] ^ ... ^ arr[k]`

Note that ^ denotes the **bitwise-xor** operation.

Return _the number of triplets (`i`, `j` and `k`) Where `a == b`._

**Example 1:**

- **Input:** arr = [2,3,1,6,7]
- **Output:** 4
- **Explanation:** The triplets are (0,1,2), (0,2,2), (2,3,4) and (2,4,4) 

**Example 2:**

- **Input:** arr = [1,1,1,1,1]
- **Output:** 10

**Constraints:**

- <code>1 <= arr.length <= 300</code>
- <code>1 <= arr[i] <= 10<sup>8</sup></code>


**Hint:**
1. We are searching for sub-array of length ≥ 2 and we need to split it to 2 non-empty arrays so that the xor of the first array is equal to the xor of the second array. This is equivalent to searching for sub-array with xor = 0.
2. Keep the prefix xor of arr in another array, check the xor of all sub-arrays in O(n^2), if the xor of sub-array of length x is 0 add x-1 to the answer.



**Solution:**

The problem asks us to count the number of triplets `(i, j, k)` where the XOR of elements between `i` and `j-1` (inclusive) equals the XOR of elements between `j` and `k` (inclusive) in the given array `arr`.

The XOR operation is a bitwise operation where each bit is evaluated independently, and the result is `1` if the corresponding bits in the operands are different, and `0` if they are the same.

### Key Points:
- We are given an array of integers `arr`.
- We need to find triplets `(i, j, k)` such that the XOR of elements from index `i` to `j-1` equals the XOR of elements from index `j` to `k`.
- The XOR operation has some important properties, such as `x ^ x = 0` and `x ^ 0 = x`, which can help optimize the solution.

### Approach:
To solve this problem efficiently, we can utilize the concept of prefix XORs, which allows us to calculate the XOR of any subarray in constant time. The main idea is to compute the cumulative XOR for each element and use it to determine if the conditions of the triplets are met.

### Plan:
1. **Prefix XORs:** Compute an array `xors` where `xors[i]` holds the XOR of all elements from `arr[0]` to `arr[i-1]`. This helps calculate the XOR of any subarray efficiently.
2. **Loop through `j`:** Iterate through possible values for `j`. For each `j`, try all possible values for `i` and `k`.
3. **Condition check:** For each combination of `i`, `j`, and `k`, check if the XOR from `i` to `j-1` is equal to the XOR from `j` to `k`.
4. **Count valid triplets:** If the condition is met, increment the count.

Let's implement this solution in PHP: **[1442. Count Triplets That Can Form Two Arrays of Equal XOR](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001442-count-triplets-that-can-form-two-arrays-of-equal-xor/solution.php)**

```php
<?php
/**
 * @param Integer[] $arr
 * @return Integer
 */
function countTriplets($arr) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
$arr1 = [2,3,1,6,7];
$arr2 = [1,1,1,1,1];

echo countTriplets($arr1) . "\n"; // Output: 4
echo countTriplets($arr2) . "\n"; // Output: 10
?>
```

### Explanation:

- `prefix = arr[i] ^ arr[i + 1] ^ ... ^ arr[j - 1]`
- `b = arr[j] ^ arr[j + 1] ^ ... ^ arr[k]`
- We use an auxiliary array `xors[]` to store the cumulative XOR values, which allows us to compute the XOR of any subarray in constant time.
- For each pair of indices `i` and `j`, we can check if the XOR between them is the same as the XOR between `j` and `k`, thus finding the valid triplets.

### Example Walkthrough:
#### Example 1:
Input: `[2, 3, 1, 6, 7]`

- We first calculate the prefix XORs for the array:
    - `xors = [0, 2, 1, 0, 6, 1]`

Now, we loop through possible values for `j`:
- For `j = 1`, check all possible pairs `(i, k)`:
    - Triplet `(0,1,2)`: `2 == 2` (valid)
    - Triplet `(0,2,2)`: `2 == 2` (valid)
- For `j = 2`, check:
    - Triplet `(2,3,4)`: `0 == 0` (valid)
    - Triplet `(2,4,4)`: `0 == 0` (valid)

Thus, the output is `4`.

#### Example 2:
Input: `[1, 1, 1, 1, 1]`

- Calculate prefix XORs:
    - `xors = [0, 1, 0, 1, 0, 1]`

Now, loop through possible values for `j`:
- For `j = 1`, we check all combinations and find valid triplets.
- Continue checking for each subsequent value of `j` until the final answer is reached.

Output: `10`

### Time Complexity:
- **Time Complexity:** The solution iterates through the possible values of `i`, `j`, and `k`. For each `j`, there is an `O(n)` loop for `i` and another `O(n)` loop for `k`, resulting in a time complexity of **O(n^3)**.
- **Space Complexity:** The space complexity is **O(n)** due to the storage required for the `xors` array.

### Output for Example:
1. For `arr = [2, 3, 1, 6, 7]`, the output is `4`.
2. For `arr = [1, 1, 1, 1, 1]`, the output is `10`.

This solution efficiently calculates the number of valid triplets using prefix XORs. While the time complexity can be improved further, the approach provides a straightforward way to solve the problem by utilizing properties of the XOR operation.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**