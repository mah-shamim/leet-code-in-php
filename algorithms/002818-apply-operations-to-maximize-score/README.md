2818\. Apply Operations to Maximize Score

**Difficulty:** Hard

**Topics:** `Array`, `Math`, `Stack`, `Greedy`, `Sorting`, `Monotonic Stack`, `Number Theory`

You are given an array `nums` of `n` positive integers and an integer `k`.

Initially, you start with a score of `1`. You have to maximize your score by applying the following operation at most `k` times:

- Choose any **non-empty** subarray `nums[l, ..., r]` that you haven't chosen previously.
- Choose an element `x` of `nums[l, ..., r]` with the highest prime score. If multiple such elements exist, choose the one with the smallest index.
- Multiply your score by `x`.

Here, `nums[l, ..., r]` denotes the subarray of `nums` starting at index `l` and ending at the index `r`, both ends being inclusive.

The **prime score** of an integer `x` is equal to the number of distinct prime factors of `x`. For example, the prime score of `300` is `3` since `300 = 2 * 2 * 3 * 5 * 5`.

Return _the **maximum possible score** after applying at most `k` operations_.

Since the answer may be large, return it modulo <code>10<sup>9</sup> + 7</code>.

**Example 1:**

- **Input:** nums = [8,3,9,3,8], k = 2
- **Output:** 81
- **Explanation:** To get a score of 81, we can apply the following operations:
  - Choose subarray nums[2, ..., 2]. nums[2] is the only element in this subarray. Hence, we multiply the score by nums[2]. The score becomes 1 * 9 = 9.
  - Choose subarray nums[2, ..., 3]. Both nums[2] and nums[3] have a prime score of 1, but nums[2] has the smaller index. Hence, we multiply the score by nums[2]. The score becomes 9 * 9 = 81.
    It can be proven that 81 is the highest score one can obtain.

**Example 2:**

- **Input:** nums = [19,12,14,6,10,18], k = 3
- **Output:** 4788
- **Explanation:** To get a score of 4788, we can apply the following operations:
  - Choose subarray nums[0, ..., 0]. nums[0] is the only element in this subarray. Hence, we multiply the score by nums[0]. The score becomes 1 * 19 = 19.
  - Choose subarray nums[5, ..., 5]. nums[5] is the only element in this subarray. Hence, we multiply the score by nums[5]. The score becomes 19 * 18 = 342.
  - Choose subarray nums[2, ..., 3]. Both nums[2] and nums[3] have a prime score of 2, but nums[2] has the smaller index. Hence, we multipy the score by nums[2]. The score becomes 342 * 14 = 4788.
    It can be proven that 4788 is the highest score one can obtain.



**Constraints:**

- <code>1 <= nums.length == n <= 10<sup>5</sup></code>
- <code>1 <= nums[i] <= 10<sup>5</sup></code>
- <code>1 <= k <= min(n * (n + 1) / 2, 10<sup>9</sup>)</code>


**Hint:**
1. Calculate `nums[i]`'s prime score `s[i]` by factoring in `O(sqrt(nums[i]))` time.
2. For each `nums[i]`, find the nearest index `left[i]` on the left (if any) such that `s[left[i]] >= s[i]`. if none is found, set `left[i]` to `-1`. Similarly, find the nearest index `right[i]` on the right (if any) such that `s[right[i]] > s[i]`. If none is found, set `right[i]` to `n`.
3. Use a monotonic stack to compute `right[i]` and `left[i]`.
4. For each index `i`, if `left[i] + 1 <= l <= i <= r <= right[i] - 1`, then `s[i]` is the maximum value in the range `[l, r]`. For this particular `i`, there are `ranges[i] = (i - left[i]) * (right[i] - i)` ranges where index `i` will be chosen.
5. Loop over all elements of `nums` by non-increasing prime score, each element will be chosen `min(ranges[i], remainingK)` times, where `reaminingK` denotes the number of remaining operations. Therefore, the score will be multiplied by `s[i]^min(ranges[i],remainingK)`.
6. Use fast exponentiation to quickly calculate `A^B mod C`.



**Solution:**

We need to maximize the score by applying operations on subarrays of the given array. Each operation involves selecting a subarray and multiplying the score by the element with the highest prime score in that subarray. The prime score of an element is the number of distinct prime factors it has.

### Approach
1. **Prime Score Calculation**: Calculate the prime score for each element in the array. The prime score is the number of distinct prime factors of a number.
2. **Monotonic Stack for Boundaries**: Use monotonic stacks to determine the left and right boundaries for each element where it is the maximum prime score element. This helps in identifying the valid subarrays where each element is the maximum.
3. **Range Calculation**: For each element, compute the number of subarrays where it is the maximum element based on its left and right boundaries.
4. **Sorting Elements**: Sort the elements based on their value _**(x)**_ in descending order, followed by their prime score _**(s)**_ in descending order, and finally by their index in ascending order. This ensures that we prioritize elements with higher values and higher prime scores first.
5. **Greedy Multiplication**: Multiply the score by the highest possible values first, using fast exponentiation to handle large powers efficiently modulo **_<code>10<sup>9</sup> + 7</code>_**.

Let's implement this solution in PHP: **[2818. Apply Operations to Maximize Score](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002818-apply-operations-to-maximize-score/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @param Integer $k
 * @return Integer
 */
function maximumScore($nums, $k) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $x
 * @return int
 */
function primeScore($x) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $x
 * @param $n
 * @param $mod
 * @return int
 */
function powmod($x, $n, $mod) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example Usage:
$nums = [8,3,9,3,8];
$k = 2;
echo maximizeScore($nums, $k) . "\n";  // Output: 81

$nums = [19,12,14,6,10,18];
$k = 3;
echo maximizeScore($nums, $k) . "\n";  // Output: 4788
?>
```

### Explanation:

1. **Prime Score Calculation**: Each element's prime score is determined by counting its distinct prime factors.
2. **Monotonic Stacks**: These are used to efficiently find the nearest left and right boundaries where the current element is the maximum in terms of prime score.
3. **Range Calculation**: For each element, the number of valid subarrays where it is the maximum is calculated using the boundaries.
4. **Sorting**: Elements are sorted by their value, prime score, and index to ensure the highest contributions are considered first.
5. **Greedy Multiplication**: The score is maximized by multiplying by the highest values first, using fast exponentiation to handle large powers efficiently. This ensures the solution is optimal and runs in a reasonable time frame.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**