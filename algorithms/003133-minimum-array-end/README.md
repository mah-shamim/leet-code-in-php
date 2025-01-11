3133\. Minimum Array End

**Difficulty:** Medium

**Topics:** `Bit Manipulation`

You are given two integers `n` and `x`. You have to construct an array of **positive** integers `nums` of size `n` where for every `0 <= i < n - 1`, `nums[i + 1]` is **greater than** `nums[i]`, and the result of the bitwise `AND` operation between all elements of `nums` is `x`.

Return _the **minimum** possible value of `nums[n - 1]`_.

**Example 1:**

- **Input:** n = 3, x = 4
- **Output:** 6
- **Explanation:** `nums` can be `[4,5,6]` and its last element is 6.

**Example 2:**

- **Input:** n = 2, x = 7
- **Output:** 15
- **Explanation:** `nums` can be `[7,15]` and its last element is 15.


**Example 3:**

- **Input:** cost = [[2, 5, 1], [3, 4, 7], [8, 1, 2], [6, 2, 4], [3, 8, 8]]
- **Output:** 10



**Constraints:**

- <code>1 <= n, x <= 10<sup>8</sup></code>


**Hint:**
1. Each element of the array should be obtained by “merging” `x` and `v` where `v = 0, 1, 2, …(n - 1)`.
2. To merge `x` with another number `v`, keep the set bits of `x` untouched, for all the other bits, fill the set bits of `v` from right to left in order one by one.
3. So the final answer is the “merge” of `x` and `n - 1`.



**Solution:**

We need to construct an array `nums` of positive integers of size `n`, where each successive element is greater than the previous. The bitwise `AND` of all elements in `nums` should yield `x`. We are asked to find the minimum possible value of `nums[n-1]`.

Here’s the breakdown:

1. **Bit Manipulation Insight**: We can observe that `nums[i]` should be built by merging `x` with integers `0, 1, ..., n-1`. This will help ensure the bitwise `AND` result yields `x` since we start with a base of `x`.

2. **Building the Array Elements**: Each element can be thought of as `x` merged with some integer, and we aim to keep `x`'s bits intact. We fill in additional bits from the integer to get increasing numbers while maintaining the `AND` outcome as `x`.

3. **Merging Strategy**: To find the minimum `nums[n-1]`, we only need to merge `x` with `n-1`. Merging in this context means that if any bit in `x` is `1`, it remains `1`. We use bits from `n-1` to add any required additional bits without altering the bits set in `x`.


Let's implement this solution in PHP: **[3133. Minimum Array End](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003133-minimum-array-end/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @param Integer $x
 * @return Integer
 */
function minEnd($n, $x) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example 1
echo minimumArrayEnd(3, 4) . "\n";  // Output: 6

// Example 2
echo minimumArrayEnd(2, 7) . "\n";  // Output: 15
?>
```

### Explanation:

1. **Bit Checking and Setting**:
    - We check each bit of `ans` (starting from `x`), and if a bit is `0` in `ans`, we look to the corresponding bit in `k` (which is `n-1`).
    - If that bit in `k` is `1`, we set the bit in `ans` to `1`. This process ensures the minimum increment in value while preserving bits set in `x`.

2. **Loop Constraints**:
    - We iterate through each bit position up to a calculated maximum (`kMaxBit`), ensuring that we cover the bits necessary from both `x` and `n`.

3. **Result**:
    - The final value of `ans` is the minimum possible value for `nums[n-1]` that satisfies the conditions.

### Complexity:
- The algorithm operates in constant time since the number of bits in any integer in this range is bounded by 32, making this approach efficient even for large values of `n` and `x`.

This solution yields the desired minimum `nums[n-1]` while maintaining the required properties.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
