1524\. Number of Sub-arrays With Odd Sum

**Difficulty:** Medium

**Topics:** `Array`, `Math`, `Dynamic Programming`, `Prefix Sum`

Given an array of integers `arr`, return _the number of subarrays with an **odd** sum_.

Since the answer can be very large, return it modulo <code>10<sup>9</sup> + 7</code>.

**Example 1:**

- **Input:** arr = [1,3,5]
- **Output:** 4
- **Explanation:** All subarrays are [[1],[1,3],[1,3,5],[3],[3,5],[5]]
  All sub-arrays sum are [1,4,9,3,8,5].
  Odd sums are [1,9,3,5] so the answer is 4.

**Example 2:**

- **Input:** arr = [2,4,6]
- **Output:** 0
- **Explanation:** All subarrays are [[2],[2,4],[2,4,6],[4],[4,6],[6]]
  All sub-arrays sum are [2,6,12,4,10,6].
  All sub-arrays have even sum and the answer is 0.


**Example 3:**

- **Input:** arr = [1,2,3,4,5,6,7]
- **Output:** 16



**Constraints:**

- <code>1 <= arr.length <= 10<sup>5</sup></code>
- `1 <= arr[i] <= 100`


**Hint:**
1. Can we use the accumulative sum to keep track of all the odd-sum sub-arrays ?
2. if the current accu sum is odd, we care only about previous even accu sums and vice versa.



**Solution:**

We need to determine the number of subarrays with an odd sum in an efficient manner. Directly calculating the sum of all possible subarrays would be computationally expensive, so we use a more optimized approach based on prefix sums and their parity (even or odd).

### Approach
1. **Prefix Sum Parity**: Instead of tracking the actual sum of subarrays, we track the parity (even or odd) of the prefix sums. This helps in reducing the problem to counting the occurrences of even and odd prefix sums.
2. **Opposite Parity Count**: For a subarray sum to be odd, the difference between two prefix sums must be odd. This happens when one prefix sum is even and the other is odd. Thus, for each current prefix sum, the number of valid subarrays ending at that index is determined by the count of previous prefix sums of the opposite parity.
3. **Efficient Updates**: We maintain counts of even and odd prefix sums encountered so far. As we iterate through the array, we update these counts based on the current prefix sum's parity and use them to determine the number of valid subarrays ending at each index.

Let's implement this solution in PHP: **[1524. Number of Sub-arrays With Odd Sum](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001524-number-of-sub-arrays-with-odd-sum/solution.php)**

```php
<?php
/**
 * @param Integer[] $arr
 * @return Integer
 */
function numOfSubarrays($arr) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test Cases
echo numOfSubarrays([1,3,5]) . "\n"; // Output: 4
echo numOfSubarrays([2,4,6]) . "\n"; // Output: 0
echo numOfSubarrays([1,2,3,4,5,6,7]) . "\n"; // Output: 16
?>
```

### Explanation:

1. **Initialization**: We start with `even` set to 1 because the prefix sum before the first element is 0 (even). `odd` is initialized to 0 as no odd prefix sums have been encountered yet.
2. **Iterating Through the Array**: For each element in the array, we update the current prefix sum's parity. If the parity is odd, we add the count of previous even prefix sums to the result (since an odd minus even sum is odd). If the parity is even, we add the count of previous odd prefix sums.
3. **Updating Counts**: After determining the contribution of the current index to the result, we update the count of even or odd prefix sums based on the current parity.
4. **Modulo Operation**: Since the result can be large, we take modulo `10^9 + 7` at each step to ensure the values remain within integer limits.

This approach efficiently computes the number of subarrays with an odd sum in O(n) time complexity, making it suitable for large input sizes up to 100,000 elements.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**