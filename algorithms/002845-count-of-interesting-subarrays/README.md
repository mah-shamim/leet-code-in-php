2845\. Count of Interesting Subarrays

**Difficulty:** Medium

**Topics:** `Array`, `Hash Table`, `Prefix Sum`

You are given a **0-indexed** integer array `nums`, an integer `modulo`, and an integer `k`.

Your task is to find the count of subarrays that are **interesting**.

A **subarray** `nums[l..r]` is **interesting** if the following condition holds:

- Let `cnt` be the number of indices `i` in the range `[l, r]` such that `nums[i] % modulo == k`. Then, `cnt % modulo == k`.

Return _an integer denoting the count of interesting subarrays_.

**Note:** A subarray is _a contiguous non-empty sequence of elements within an array_.

**Example 1:**

- **Input:** nums = [3,2,4], modulo = 2, k = 1
- **Output:** 3
- **Explanation:** 
  - In this example the interesting subarrays are:
    - The subarray nums[0..0] which is [3].
  - There is only one index, i = 0, in the range [0, 0] that satisfies nums[i] % modulo == k.
  - Hence, cnt = 1 and cnt % modulo == k.  
    - The subarray nums[0..1] which is [3,2].
  - There is only one index, i = 0, in the range [0, 1] that satisfies nums[i] % modulo == k.
  - Hence, cnt = 1 and cnt % modulo == k.
    - The subarray nums[0..2] which is [3,2,4].
  - There is only one index, i = 0, in the range [0, 2] that satisfies nums[i] % modulo == k.
  - Hence, cnt = 1 and cnt % modulo == k.
    - It can be shown that there are no other interesting subarrays. So, the answer is 3.

**Example 2:**

- **Input:** nums = [3,1,9,6], modulo = 3, k = 0
- **Output:** 2
- **Explanation:** 
  - In this example the interesting subarrays are:
    - The subarray nums[0..3] which is [3,1,9,6].
  - There are three indices, i = 0, 2, 3, in the range [0, 3] that satisfy nums[i] % modulo == k.
  - Hence, cnt = 3 and cnt % modulo == k.
    - The subarray nums[1..1] which is [1].
  - There is no index, i, in the range [1, 1] that satisfies nums[i] % modulo == k.
  - Hence, cnt = 0 and cnt % modulo == k.
    - It can be shown that there are no other interesting subarrays. So, the answer is 2.



**Constraints:**

- <code>1 <= nums.length <= 10<sup>5</sup></code> 
- <code>1 <= nums[i] <= 10<sup>9</sup></code>
- <code>1 <= modulo <= 10<sup>9</sup></code>
- `0 <= k < modulo`


**Hint:**
1. The problem can be solved using prefix sums.
2. Let `count[i]` be the number of indices where `nums[i] % modulo == k` among the first `i` indices.
3. `count[0] = 0` and `count[i] = count[i - 1] + (nums[i - 1] % modulo == k ? 1 : 0)` for `i = 1, 2, ..., n`.
4. Now we want to calculate for each `i = 1, 2, ..., n`, how many indices `j < i` such that `(count[i] - count[j]) % modulo == k`.
5. Rewriting `(count[i] - count[j]) % modulo == k` becomes `count[j] = (count[i] + modulo - k) % modulo`.
6. Using a map data structure, for each `i = 0, 1, 2, ..., n`, we just sum up all `map[(count[i] + modulo - k) % modulo]` before increasing `map[count[i] % modulo]`, and the total sum is the final answer.



**Solution:**

We need to count the number of interesting subarrays in a given array `nums` based on specific conditions. A subarray is considered interesting if the count of elements in it that satisfy a certain modulo condition, when taken modulo `modulo`, equals `k`.

### Approach
1. **Prefix Sum with Modulo Handling**: We use a prefix sum approach to keep track of the count of elements that meet the modulo condition as we iterate through the array.
2. **Hash Map for Efficient Lookup**: We maintain a hash map to store the frequency of each prefix sum modulo `modulo`. This allows us to efficiently check how many times a specific value has been encountered, which helps in determining the number of interesting subarrays ending at each position.

Let's implement this solution in PHP: **[2845. Count of Interesting Subarrays](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002845-count-of-interesting-subarrays/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @param Integer $modulo
 * @param Integer $k
 * @return Integer
 */
function countInterestingSubarrays($nums, $modulo, $k) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
$nums1 = array(3, 2, 4);
$modulo1 = 2;
$k1 = 1;
echo countInterestingSubarrays($nums1, $modulo1, $k1) . "\n"; // Output: 3

$nums2 = array(3, 1, 9, 6);
$modulo2 = 3;
$k2 = 0;
echo countInterestingSubarrays($nums2, $modulo2, $k2) . "\n"; // Output: 2
?>
```

### Explanation:

1. **Initialization**: We start with a hash map initialized to `{0: 1}` to account for the prefix sum of 0 before any elements are processed.
2. **Iterating through Elements**: For each element in the array, we check if it meets the modulo condition `nums[i] % modulo == k` and update the current count of such elements.
3. **Target Calculation**: For each element, we compute the target value, which is the modulo-adjusted value of the current count minus `k`. This target helps us find how many previous prefix sums would form an interesting subarray ending at the current element.
4. **Result Update**: We look up the target value in the hash map and add its frequency to the result. This gives the number of valid subarrays ending at the current position.
5. **Updating Hash Map**: After processing each element, we update the hash map with the current prefix sum modulo `modulo` to include the current count in future lookups.

This approach efficiently counts the interesting subarrays in linear time, making it suitable for large input sizes as specified in the problem constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**