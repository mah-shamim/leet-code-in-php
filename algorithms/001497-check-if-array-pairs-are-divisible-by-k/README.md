1497\. Check If Array Pairs Are Divisible by k

**Difficulty:** Medium

**Topics:** `Array`, `Hash Table`, `Counting`

Given an array of integers `arr` of even length `n` and an integer `k`.

We want to divide the array into exactly `n / 2` pairs such that the sum of each pair is divisible by `k`.

Return _`true` If you can find a way to do that or `false` otherwise_.

**Example 1:**

- **Input:** arr = [1,2,3,4,5,10,6,7,8,9], k = 5
- **Output:** true
- **Explanation:** Pairs are (1,9),(2,8),(3,7),(4,6) and (5,10).

**Example 2:**

- **Input:** arr = [1,2,3,4,5,6], k = 7
- **Output:** true
- **Explanation:** Pairs are (1,6),(2,5) and(3,4).


**Example 3:**

- **Input:** arr = [1,2,3,4,5,6], k = 10
- **Output:** false
- **Explanation:** You can try all possible pairs to see that there is no way to divide arr into 3 pairs each with sum divisible by 10.

**Constraints:**

- `arr.length == n`
- <code>1 <= n <= 10<sup>5</sup></code>
- `n` is even.
- <code>-10<sup>9</sup> <= arr[i] <= 10<sup>9</sup></code>
- <code>1 <= k <= 10<sup>5</sup></code>

**Hint:**
1. Keep an array of the frequencies of ((x % k) + k) % k for each x in arr.
2. for each i in [0, k - 1] we need to check if freq[i] == freq[k - i]
3. Take care of the case when i == k - i and when i == 0



**Solution:**

We need to ensure that the array can be divided into pairs where the sum of each pair is divisible by `k`. To do this efficiently, we'll use a frequency count of the remainders of elements when divided by `k`.

### Key Idea:

For two numbers `a` and `b`, their sum is divisible by `k` if: `(a + b) % k == 0`

This is equivalent to: `(a % k + b % k) % k == 0`

This means for each number `x` in the array, if `x % k = r`, we need to pair it with another number `y` such that `y % k = k - r`.

### Steps to solve:
1. **Compute remainders**: For each element in the array, calculate its remainder when divided by `k`. This will give us the needed pairing information.
2. **Frequency count of remainders**: Keep track of how many elements have each remainder.
3. **Check pairing conditions**:
   - For remainder `0`, the number of such elements must be even because they can only pair with each other.
   - For each remainder `r`, we need the same number of elements with remainder `k - r` for pairing.
   - Special case: when `r == k/2`, the number of such elements must also be even because they need to pair among themselves.

Let's implement this solution in PHP: **[1497. Check If Array Pairs Are Divisible by k](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001497-check-if-array-pairs-are-divisible-by-k/solution.php)**

```php
<?php
/**
 * @param Integer[] $arr
 * @param Integer $k
 * @return Boolean
 */
function canArrange($arr, $k) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example 1
$arr1 = [1, 2, 3, 4, 5, 10, 6, 7, 8, 9];
$k1 = 5;
echo canArrange($arr1, $k1) ? 'true' : 'false'; // Output: true

// Example 2
$arr2 = [1, 2, 3, 4, 5, 6];
$k2 = 7;
echo canArrange($arr2, $k2) ? 'true' : 'false'; // Output: true

// Example 3
$arr3 = [1, 2, 3, 4, 5, 6];
$k3 = 10;
echo canArrange($arr3, $k3) ? 'true' : 'false'; // Output: false
?>
```

### Explanation:

1. **Modulo Operation**: To account for negative numbers, we use this formula to always get a positive remainder:
   ```php
   ($num % $k + $k) % $k;
   ```
   This ensures that even negative numbers are handled properly.

2. **Frequency Array**: We create an array `freq` of size `k` where `freq[i]` counts how many numbers have a remainder `i` when divided by `k`.

3. **Conditions**:
   - For each remainder `i`, we need to check if the count of numbers with remainder `i` is the same as the count of numbers with remainder `k - i`.
   - Special cases:
      - `i = 0`: The number of elements with remainder 0 must be even, as they need to pair with each other.
      - `i = k/2`: If `k` is even, then elements with remainder `k/2` must also be even, as they can only pair with themselves.

### Time Complexity:
- The time complexity is O(n) where `n` is the length of the array because we iterate over the array once to calculate remainders and once again to check the pairing conditions.

This solution efficiently checks whether it's possible to divide the array into pairs such that each pair's sum is divisible by `k`.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
