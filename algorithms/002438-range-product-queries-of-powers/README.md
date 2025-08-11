2438\. Range Product Queries of Powers

**Difficulty:** Medium

**Topics:** `Array`, `Bit Manipulation`, `Prefix Sum`, `Biweekly Contest 89`

Given a positive integer `n`, there exists a **0-indexed** array called `powers`, composed of the **minimum** number of powers of `2` that sum to `n`. The array is sorted in **non-decreasing** order, and there is **only one** way to form the array.

You are also given a **0-indexed** 2D integer array `queries`, where <code>queries[i] = [left<sub>i</sub>, right<sub>i</sub>]</code>. Each `queries[i]` represents a query where you have to find the product of all `powers[j]` with <code>left<sub>i</sub> <= j <= right<sub>i</sub></code>.

Return _an array `answers`, equal in length to `queries`, where `answers[i]` is the answer to the <code>i<sup>th</sup></code> query_. Since the answer to the <code>i<sup>th</sup></code> query may be too large, each `answers[i]` should be returned modulo <code>10<sup>9</sup> + 7</code>.

**Example 1:**

- **Input:** n = 15, queries = [[0,1],[2,2],[0,3]]
- **Output:** [2,4,64]
- **Explanation:**
  For n = 15, powers = [1,2,4,8]. It can be shown that powers cannot be a smaller size.
  Answer to 1st query: powers[0] * powers[1] = 1 * 2 = 2.
  Answer to 2nd query: powers[2] = 4.
  Answer to 3rd query: powers[0] * powers[1] * powers[2] * powers[3] = 1 * 2 * 4 * 8 = 64.
  Each answer modulo 10<sup>9</sup> + 7 yields the same answer, so [2,4,64] is returned.

**Example 2:**

- **Input:** n = 2, queries = [[0,0]]
- **Output:** [2]
- **Explanation:**
  For n = 2, powers = [2].
  The answer to the only query is powers[0] = 2. The answer modulo 10<sup>9</sup> + 7 is the same, so [2] is returned.

**Constraints:**

- <code>1 <= n <= 10<sup>9</sup></code>
- <code>1 <= queries.length <= 10<sup>5</sup></code>
- <code>0 <= start<sub>i</sub> <= end<sub>i</sub> < powers.length</code>


**Hint:**
1. The `powers` array can be created using the binary representation of `n`.
2. Once `powers` is formed, the products can be taken using brute force.






**Solution:**

We need to efficiently answer multiple range product queries on an array derived from the binary representation of a given positive integer `n`. The array consists of the minimum number of distinct powers of 2 that sum to `n`, sorted in non-decreasing order. Each query requires computing the product of elements within a specified range in this array, modulo _**10<sup>9</sup> + 7**_.

### Approach
1. **Generate Powers Array**:
    - The powers array is constructed by decomposing `n` into its binary representation. Each set bit in the binary form of `n` corresponds to a power of 2. For example, if `n` is 15 (binary `1111`), the powers array will be `[1, 2, 4, 8]`.
    - We iterate through each bit of `n` from the least significant bit (LSB) to the most significant bit (MSB). For each set bit, we include the corresponding power of 2 in the array. This ensures the array is sorted in non-decreasing order.

2. **Process Queries**:
    - For each query `[left, right]`, compute the product of elements in the powers array from index `left` to `right`.
    - To handle large numbers, each multiplication is followed by taking modulo _**10<sup>9</sup> + 7**_. This prevents integer overflow and ensures results fit within standard data types.

Let's implement this solution in PHP: **[2438. Range Product Queries of Powers](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002438-range-product-queries-of-powers/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @param Integer[][] $queries
 * @return Integer[]
 */
function productQueries($n, $queries) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
$n = 15;
$queries = [[0,1],[2,2],[0,3]];
print_r(productQueries($n, $queries)); // Output: [2, 4, 64]

$n = 2;
$queries = [[0,0]];
print_r(productQueries($n, $queries)); // Output: [2]
?>
```

### Explanation:

1. **Generating the Powers Array**:
    - We start with `current = 1` (representing _**2<sup>0</sup>**_) and process each bit of `n` from LSB to MSB.
    - For each bit, if it is set (`$temp & 1` is true), we add `current` to the `powers` array.
    - We then right-shift `temp` to process the next bit and double `current` to move to the next power of 2.

2. **Answering Queries**:
    - For each query, we initialize `product` to 1.
    - We iterate from the start index `l` to the end index `r` of the query, multiplying each element in the `powers` array within this range.
    - After each multiplication, we take modulo _**10<sup>9</sup> + 7**_ to keep the intermediate results manageable and avoid overflow.
    - The final product for each query is stored in the `ans` array, which is returned after processing all queries.

This approach efficiently handles the constraints by leveraging the binary decomposition of `n` to create a compact powers array and processes each query in linear time relative to the length of the query range, which is optimal given the small size of the powers array (up to 31 elements for _**n ≤ 10<sup>9</sup>**_). The modulo operation ensures that all operations remain within feasible computational limits.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**