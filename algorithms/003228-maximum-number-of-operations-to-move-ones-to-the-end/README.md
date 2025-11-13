3228\. Maximum Number of Operations to Move Ones to the End

**Difficulty:** Medium

**Topics:** `String`, `Greedy`, `Counting`, `Weekly Contest 407`

You are given a binary string `s`.

You can perform the following operation on the string **any** number of times:

- Choose **any** index `i` from the string where `i + 1 < s.length` such that `s[i] == '1'` and `s[i + 1] == '0'`.
- Move the character `s[i]` to the **right** until it reaches the end of the string or another `'1'`. For example, for `s = "010010"`, if we choose `i = 1`, the resulting string will be <code>s = "0<ins>**001**</ins>10"</code>.

Return the **maximum** number of operations that you can perform.

**Example 1:**

- **Input:** s = "1001101"
- **Output:** 4
- **Explanation:** We can perform the following operations:
  - Choose index `i = 0`. The resulting string is <code>s = "<ins>**001**</ins>101"</code>.
  - Choose index `i = 4`. The resulting string is <code>s = "0011<ins>**01**</ins>1"</code>.
  - Choose index `i = 3`. The resulting string is <code>s = "001<ins>**01**</ins>11"</code>.
  - Choose index `i = 2`. The resulting string is <code>s = "00<ins>**01**</ins>111"</code>.


**Example 2:**

- **Input:** s = "00111"
- **Output:** 0

**Constraints:**

- `1 <= s.length <= 10⁵`
- `s[i]` is either `'0'` or `'1'`.



**Hint:**
1. It is optimal to perform the operation on the lowest index possible each time.
2. Traverse the string from left to right and perform the operation every time it is possible.






**Solution:**

We need to determine the maximum number of operations that can be performed on a binary string. Each operation involves moving a '1' to the right until it reaches the end of the string or another '1'. The goal is to maximize the number of such operations.

### Approach:

1. **Identify Positions of '1's**: First, we traverse the string to record the positions of all '1's. This helps in understanding the gaps between consecutive '1's and the gaps after the last '1'.
2. **Calculate Gaps (d_i)**: For each '1' (except the last one), calculate the number of '0's between it and the next '1'. For the last '1', calculate the number of '0's after it until the end of the string.
3. **Compute Operations (m_i)**: Using the gaps calculated, compute the number of operations that can be performed for each '1'. The recurrence relation used is `m[i] = min(d[i], 1) + m[i+1]`, starting from the last '1' and moving backwards. This relation ensures that each '1' can be moved at least once if there is a gap, and additional operations are possible if subsequent '1's are moved.
4. **Sum Operations**: The total number of operations is the sum of all computed `m[i]` values.

Let's implement this solution in PHP: **[3228. Maximum Number of Operations to Move Ones to the End](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003228-maximum-number-of-operations-to-move-ones-to-the-end/solution.php)**

```php
<?php
/**
 * @param String $s
 * @return Integer
 */
function maxOperations($s) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
// Example 1
echo maxOperations("1001101") . PHP_EOL; // Output: 4

// Example 2
echo maxOperations("00111") . PHP_EOL;   // Output: 0
?>
```

### Explanation:

1. **Finding Positions**: We iterate through the string to collect the indices of all '1's. If there are no '1's, we return 0 since no operations can be performed.
2. **Calculating Gaps**: For each pair of consecutive '1's, the number of '0's between them is calculated by subtracting their indices and adjusting by 1. For the last '1', the number of '0's after it is determined by subtracting its index from the string length and adjusting by 1.
3. **Computing Operations**: We initialize an array `m` to store the number of operations per '1'. Starting from the last '1', we set `m[i]` to the minimum of the gap and 1. For each preceding '1', we set `m[i]` to the minimum of its gap and 1 plus the value of `m[i+1]`. This ensures that each '1' can be moved at least once if there is a gap, and additional moves are possible if the next '1' is moved, creating new gaps.
4. **Summing Operations**: The total number of operations is the sum of all values in `m`, which we return as the result.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**