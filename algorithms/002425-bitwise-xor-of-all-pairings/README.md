2425\. Bitwise XOR of All Pairings

**Difficulty:** Medium

**Topics:** `Array`, `Bit Manipulation`, `Brainteaser`

You are given two **0-indexed** arrays, `nums1` and `nums2`, consisting of non-negative integers. There exists another array, `nums3`, which contains the bitwise XOR of **all pairings** of integers between `nums1` and `nums2` (every integer in `nums1` is paired with every integer in `nums2` **exactly once**).

Return _the **bitwise XOR** of all integers in `nums3`_.

**Example 1:**

- **Input:** nums1 = [2,1,3], nums2 = [10,2,5,0]
- **Output:** 13
- **Explanation:**
  A possible nums3 array is [8,0,7,2,11,3,4,1,9,1,6,3].
  The bitwise XOR of all these numbers is 13, so we return 13.

**Example 2:**

- **Input:** nums1 = [1,2], nums2 = [3,4]
- **Output:** 0
- **Explanation:**
  All possible pairs of bitwise XORs are nums1[0] ^ nums2[0], nums1[0] ^ nums2[1], nums1[1] ^ nums2[0], and nums1[1] ^ nums2[1].
  Thus, one possible nums3 array is [2,5,1,6].
  2 ^ 5 ^ 1 ^ 6 = 0, so we return 0.



**Constraints:**

- <code>1 <= nums1.length, nums2.length <= 10<sup>5</sup></code>
- <code>0 <= nums1[i], nums2[j] <= 10<sup>9</sup></code>


**Hint:**
1. Think how the count of each individual integer affects the final answer.
2. If the length of nums1 is m and the length of nums2 is n, then each number in nums1 is repeated n times and each number in nums2 is repeated m times.



**Solution:**

We need to think carefully about how the bitwise XOR operates and how the pairing of elements in `nums1` and `nums2` affects the result.

### Key Observations:
1. Each element in `nums1` pairs with every element in `nums2`, and vice versa.
2. In `nums3`, each number from `nums1` and `nums2` appears multiple times:
   - Each number from `nums1` appears `n` times (where `n` is the length of `nums2`).
   - Each number from `nums2` appears `m` times (where `m` is the length of `nums1`).

3. The XOR operation has a property that if a number appears an even number of times, it will cancel out (because `x ^ x = 0`), and if it appears an odd number of times, it contributes to the final XOR result.

### Approach:
- For each bit position (from 0 to 31, since `nums1[i]` and `nums2[j]` are at most `10^9`), we will calculate how many times this bit is set (i.e., `1`) in the XOR result of all pairings.
- Each number in `nums1` contributes to the final XOR `n` times, and each number in `nums2` contributes to the final XOR `m` times.

Using these observations, we can reduce the problem to counting the number of times each bit is set (odd number of times) across all pairings.

### Plan:
1. Count the number of `1`s in each bit position for `nums1` and `nums2`.
2. For each bit, check whether the total count of `1`s (from both `nums1` and `nums2`) for that bit is odd or even.
3. If the count is odd, set that bit in the final XOR result.

Let's implement this solution in PHP: **[2425. Bitwise XOR of All Pairings](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002425-bitwise-xor-of-all-pairings/solution.php)**

```php
<?php
function xorAllNums($nums1, $nums2) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example 1
$nums1 = [2, 1, 3];
$nums2 = [10, 2, 5, 0];
echo xorAllNums($nums1, $nums2); // Output: 13

// Example 2
$nums1 = [1, 2];
$nums2 = [3, 4];
echo xorAllNums($nums1, $nums2); // Output: 0
?>
```

### Explanation:

- **`$m` and `$n`:** Store the lengths of `nums1` and `nums2` respectively.
- **`$result`:** This variable will store the final XOR result.
- **Loop over 32 bits:** Since each number is at most `10^9`, we only need to consider the first 32 bits.
- **Counting bits:** For each bit position, we count how many times this bit is set in `nums1` and `nums2`.
- **Calculate total counts:** Each bit from `nums1` contributes `n` times to the total count, and each bit from `nums2` contributes `m` times.
- **XOR result update:** If the total count for a particular bit is odd, we update the result to set that bit.

### Complexity:
- **Time Complexity**: _**O(m + n)**_, where _**m**_ and _**n**_ are the lengths of `nums1` and `nums2`, respectively.
- **Space Complexity**: _**O(1)**_, as we use constant extra space.

### Example Walkthrough:

**Example 1:**
```php
$nums1 = [2, 1, 3];
$nums2 = [10, 2, 5, 0];
echo xorAllPairings($nums1, $nums2);  // Output: 13
```

**Example 2:**
```php
$nums1 = [1, 2];
$nums2 = [3, 4];
echo xorAllPairings($nums1, $nums2);  // Output: 0
```

This solution is efficient and works within the problem's constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
