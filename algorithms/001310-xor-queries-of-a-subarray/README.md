1310\. XOR Queries of a Subarray

**Difficulty:** Medium

**Topics:** `Array`, `Bit Manipulation`, `Prefix Sum`

You are given an array `arr` of positive integers. You are also given the array `queries` where <code>queries[i] = [left<sub>i</sub>, right<sub>i</sub>]</code>.

For each query `i` compute the XOR of elements from <code>left<sub>i</sub></code> to <code>right<sub>i</sub></code> (that is, <code>arr[left<sub>i</sub>] XOR arr[left<sub>i</sub> + 1] XOR ... XOR arr[right<sub>i</sub>]</code> ).

Return _an array `answer` where `answer[i]` is the answer to the i<sup>th</sup> query_.

**Example 1:**

- **Input:** arr = [1,3,4,8], queries = [[0,1],[1,2],[0,3],[3,3]]
- **Output:** [2,7,14,8]
- **Explanation:**\
  The binary representation of the elements in the array are:\
  1 = 0001\
  3 = 0011\
  4 = 0100\
  8 = 1000\
  The XOR values for queries are:\
  [0,1] = 1 xor 3 = 2\
  [1,2] = 3 xor 4 = 7\
  [0,3] = 1 xor 3 xor 4 xor 8 = 14\
  [3,3] = 8

**Example 2:**

- **Input:** arr = [4,8,2,10], queries = [[2,3],[1,3],[0,0],[0,3]]
- **Output:** [8,0,4,4]



**Constraints:**

- <code>1 <= arr.length, queries.length <= 3 * 10<sup>4</sup></code>
- <code>1 <= arr[i] <= 10<sup>9</sup></code>
- <code>queries[i].length == 2</code>
- <code>0 <= left<sub>i</sub> <= right<sub>i</sub> < arr.length</code>


**Hint:**
1. What is the result of x ^ y ^ x ?
2. Compute the prefix sum for XOR.
3. Process the queries with the prefix sum values.



**Solution:**

We can make use of the **prefix XOR** technique. Here's how it works:

### Approach:
1. **Prefix XOR Array**: We compute a prefix XOR array where `prefix[i]` represents the XOR of all elements from the start of the array up to index `i`. This allows us to compute the XOR of any subarray in constant time.

2. **XOR of a subarray**:
   - To compute the XOR of elements between indices `left` and `right`:
      - If `left > 0`, we can compute the XOR from `left` to `right` as `prefix[right] ^ prefix[left - 1]`.
      - If `left == 0`, then the result is simply `prefix[right]`.

   This allows us to answer each query in constant time after constructing the prefix XOR array.

### Plan:
1. Build the prefix XOR array.
2. For each query, use the prefix XOR array to compute the XOR for the range `[left_i, right_i]`.

Let's implement this solution in PHP: **[1310. XOR Queries of a Subarray](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001310-xor-queries-of-a-subarray/solution.php)**

```php
<?php
/**
 * @param Integer[] $arr
 * @param Integer[][] $queries
 * @return Integer[]
 */
function xorQueries($arr, $queries) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example 1
$arr1 = [1, 3, 4, 8];
$queries1 = [[0, 1], [1, 2], [0, 3], [3, 3]];
print_r(xorQueries($arr1, $queries1)); // Output: [2, 7, 14, 8]

// Example 2
$arr2 = [4, 8, 2, 10];
$queries2 = [[2, 3], [1, 3], [0, 0], [0, 3]];
print_r(xorQueries($arr2, $queries2)); // Output: [8, 0, 4, 4]
?>
```

### Explanation:

1. **Prefix XOR Construction**:
   - The array `prefix` is built such that `prefix[i]` contains the XOR of all elements from `arr[0]` to `arr[i]`.
   - For example, given `arr = [1, 3, 4, 8]`, the `prefix` array will be `[1, 1^3, 1^3^4, 1^3^4^8]` or `[1, 2, 6, 14]`.

2. **Answering Queries**:
   - For each query `[left, right]`, we compute the XOR of the subarray `arr[left]` to `arr[right]` using:
      - `prefix[right] ^ prefix[left - 1]` (if `left > 0`)
      - `prefix[right]` (if `left == 0`)

### Time Complexity:
- **Building the prefix array**: O(n), where `n` is the length of the `arr`.
- **Processing the queries**: O(q), where `q` is the number of queries.
- **Overall Time Complexity**: O(n + q), which is efficient for the given constraints.

This approach ensures we can handle up to 30,000 queries on an array of size up to 30,000 efficiently.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
