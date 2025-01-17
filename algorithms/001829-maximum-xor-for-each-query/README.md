1829\. Maximum XOR for Each Query

**Difficulty:** Medium

**Topics:** `Array`, `Bit Manipulation`, `Prefix Sum`

You are given a **sorted** array `nums` of `n` non-negative integers and an integer `maximumBit`. You want to perform the following query `n` **times**:

- Find a non-negative integer <code>k < 2<sup>maximumBit</sup></code> such that `nums[0] XOR nums[1] XOR ... XOR nums[nums.length-1] XOR k` is **maximized**. `k` is the answer to the <code>i<sup>th</sup></code> query.
- Remove the **last** element from the current array `nums`.

Return _an array `answer`, where `answer[i]` is the answer to the <code>i<sup>th</sup></code> query_.

**Example 1:**

- **Input:** nums = [0,1,1,3], maximumBit = 2
- **Output:** [0,3,2,3]
- **Explanation:** The queries are answered as follows:
  1<sup>st</sup>st query: nums = [0,1,1,3], k = 0 since 0 XOR 1 XOR 1 XOR 3 XOR 0 = 3.
  2<sup>nd</sup> query: nums = [0,1,1], k = 3 since 0 XOR 1 XOR 1 XOR 3 = 3.
  3<sup>rd</sup> query: nums = [0,1], k = 2 since 0 XOR 1 XOR 2 = 3.
  4<sup>th</sup> query: nums = [0], k = 3 since 0 XOR 3 = 3.

**Example 2:**

- **Input:** nums = [2,3,4,7], maximumBit = 3
- **Output:** [5,2,6,5]
- **Explanation:** The queries are answered as follows:
  1<sup>st</sup>st query: nums = [2,3,4,7], k = 5 since 2 XOR 3 XOR 4 XOR 7 XOR 5 = 7.
  2<sup>nd</sup> query: nums = [2,3,4], k = 2 since 2 XOR 3 XOR 4 XOR 2 = 7.
  3<sup>rd</sup> query: nums = [2,3], k = 6 since 2 XOR 3 XOR 6 = 7.
  4<sup>th</sup> query: nums = [2], k = 5 since 2 XOR 5 = 7.


**Example 3:**

- **Input:** nums = [0,1,2,2,5,7], maximumBit = 3
- **Output:** [4,3,6,4,6,7]



**Constraints:**

- `nums.length == n`
- <code>1 <= n <= 10<sup>5</sup></code>
- `1 <= maximumBit <= 20`
- <code>0 <= nums[i] < 2<sup>maximumBit</sup></code>
- `nums​​​` is sorted in **ascending** order.


**Hint:**
1. Note that the maximum possible XOR result is always <code>2<sup>(maximumBit) - 1</sup></code>
2. So the answer for a prefix is the XOR of that prefix XORed with <code>2<sup>(maximumBit)-1</sup></code>



**Solution:**

We need to efficiently calculate the XOR of elements in the array and maximize the result using a value `k` such that `k` is less than `2^maximumBit`. Here's the approach for solving this problem:

### Observations and Approach

1. **Maximizing XOR**:
   The maximum number we can XOR with any prefix sum for `maximumBit` bits is \( 2^{\text{maximumBit}} - 1 \). This is because XORing with a number of all `1`s (i.e., `111...1` in binary) will always maximize the result.

2. **Prefix XOR Calculation**:
   Instead of recalculating the XOR for each query, we can maintain a cumulative XOR for the entire array. Since XOR has the property that `A XOR B XOR B = A`, removing the last element from the array can be achieved by XORing out that element from the cumulative XOR.

3. **Algorithm**:
   - Compute the XOR of all elements in `nums` initially. Let's call this `currentXOR`.
   - For each query (from last to first):
      - Calculate the optimal value of `k` for that query by XORing `currentXOR` with `maxNum` where `maxNum = 2^maximumBit - 1`.
      - Append `k` to the result list.
      - Remove the last element from `nums` by XORing it out of `currentXOR`.
   - The result list will contain the answers in reverse order, so reverse it at the end.

Let's implement this solution in PHP: **[1829. Maximum XOR for Each Query](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001829-maximum-xor-for-each-query/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @param Integer $maximumBit
 * @return Integer[]
 */
function getMaximumXor($nums, $maximumBit) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
$nums = [0,1,1,3];
$maximumBit = 2;
print_r(getMaximumXor($nums, $maximumBit));  // Output should be [0, 3, 2, 3]
?>
```

### Explanation:

1. **Calculate `maxNum`**:
   - `maxNum` is calculated as `2^maximumBit - 1`, which is the number with all `1`s in binary for the specified bit length.

2. **Initial XOR Calculation**:
   - We XOR all elements in `nums` to get the cumulative XOR (`currentXOR`), representing the XOR of all numbers in the array.

3. **Iterate Backwards**:
   - We start from the last element in `nums` and calculate the maximum XOR for each step:
      - `currentXOR ^ maxNum` gives the maximum `k` for the current state.
      - Append `k` to `answer`.
   - We then XOR the last element of `nums` with `currentXOR` to "remove" it from the XOR sum for the next iteration.

4. **Return the Answer**:
   - Since we processed the list in reverse, `answer` will contain the values in reverse order, so the final list is already arranged correctly for our requirements.

### Complexity Analysis

- **Time Complexity**: _**O(n)**_, since we compute the initial XOR in _**O(n)**_ and each query is processed in constant time.
- **Space Complexity**: _**O(n)**_, for storing the `answer`.

This code is efficient and should handle the upper limits of the constraints well.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
