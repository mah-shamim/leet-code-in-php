3756\. Concatenate Non-Zero Digits and Multiply by Sum II

**Difficulty:** Medium

**Topics:** `Staff`, `Math`, `String`, `Prefix Sum`, `Weekly Contest 477`

You are given a string `s` of length `m` consisting of digits. You are also given a 2D integer array `queries`, where `queries[i] = [lᵢ, rᵢ]`.

For each `queries[i]`, extract the **substring[^1]** `s[lᵢ..rᵢ]`. Then, perform the following:

- Form a new integer `x` by concatenating all the **non-zero digits** from the substring in their original order. If there are no non-zero digits, `x = 0`.
- Let `sum` be the **sum of digits** in `x`. The answer is `x * sum`.

Return _an array of integers `answer` where `answer[i]` is the answer to the `iᵗʰ` query_.

Since the answers may be very large, return them **modulo** `10⁹ + 7`.

[^1]: **Substring:** A **substring** is a contiguous **non-empty** sequence of characters within a string.

**Example 1:**

- **Input:** s = "10203004", queries = [[0,7],[1,3],[4,6]]
- **Output:** [12340, 4, 9]
- **Explanation:**
  - `s[0..7] = "10203004"`
    - `x = 1234`
    - `sum = 1 + 2 + 3 + 4 = 10`
    - Therefore, answer is `1234 * 10 = 12340`.
  - `s[1..3] = "020"`
    - `x = 2`
    - `sum = 2`
    - Therefore, the answer is `2 * 2 = 4`.
  - `s[4..6] = "300"`
    - `x = 3`
    - `sum = 3`
    - Therefore, the answer is `3 * 3 = 9`.


**Example 2:**

- **Input:** s = "1000", queries = [[0,3],[1,1]]
- **Output:** [1, 0]
- **Explanation:**
  - `s[0..3] = "1000"`
    - `x = 1`
    - `sum = 1`
    - Therefore, the answer is `1 * 1 = 1`.
  - `s[1..1] = "0"`
    - `x = 0`
    - `sum = 0`
    - Therefore, the answer is `0 * 0 = 0`.


**Example 3:**

- **Input:** s = "9876543210", queries = [[0,9]]
- **Output:** [444444137]
- **Explanation:**
  - `s[0..9] = "9876543210"`
    - `x = 987654321`
    - `sum = 9 + 8 + 7 + 6 + 5 + 4 + 3 + 2 + 1 = 45`
    - Therefore, the answer is `987654321 * 45 = 44444444445`.
    - We return `44444444445 modulo (10⁹ + 7) = 444444137`.


**Example 4:**

- **Input:** s = "000", queries = [[0,2]]
- **Output:** [0]


**Example 5:**

- **Input:** s = "5", queries = [[0,0]]
- **Output:** [25]


**Example 6:**

- **Input:** s = "10101", queries = [[0,4]]
- **Output:** [1111 * 4 = 4444]


**Example 7:**

- **Input:** s = "120340", queries = [[2,2]]
- **Output:** [0]


**Example 8:**

- **Input:** s = "9", queries = [[0,0]]
- **Output:** [81]


**Constraints:**

- `1 <= m == s.length <= 10⁵`
- `s` consists of digits only.
- `1 <= queries.length <= 10⁵`
- `queries[i] = [lᵢ, rᵢ]`
- `0 <= lᵢ <= rᵢ < m`


**Hint:**
1. Track only nonzero digits: store their values and positions and keep a prefix sum for digit sums.
2. Also build prefix concatenation values `P`, `pow10`, and set `mod = 10⁹+7` so any compressed substring number is obtainable from prefixes.
3. Map each query `[l, r]` to the compressed list using precomputed mapping arrays (first nonzero at or after `i`
4. If the mapped range is empty return `0`; otherwise get `x` from `P`, get `sum` from the digit-prefix, and return `(x * sum) % mod`.


**Solution:**

We have implemented an efficient prefix-based solution that avoids reconstructing substrings for each query. By precomputing the positions, concatenation values, and digit sums of all non-zero digits, we can answer each query in _**O(log n)**_ or _**O(1)**_ time after _**O(n)**_ preprocessing.

## Approach

- **Preprocess non-zero digits**
   - Iterate through the string and store only non-zero digits along with their original positions.
   - Maintain two prefix arrays:
      - `prefixVal`: the integer formed by concatenating non-zero digits up to each index, modulo _**10⁹+7**_.
      - `prefixSum`: the sum of those digits.
   - Precompute powers of 10 modulo _**10⁹+7**_ to enable range concatenation extraction.

- **Efficient range mapping for queries**
   - Use binary search on the `positions` array to find the first and last non-zero digit indices within `[l, r]`.
   - If no non-zero digit exists in the range, return 0.

- **Compute `x` and `sum` for the range**
   - `x` is obtained from `prefixVal` using the formula:  
     `x = (prefixVal[last] - prefixVal[first-1] * 10⁽ˡᵃˢᵗ⁻ᶠᶦʳˢᵗ⁺¹⁾) mod MOD`
   - `sum` is obtained directly from `prefixSum` as a simple difference.

- **Return the product modulo _10⁹+7_**.

Let's implement this solution in PHP: **[3756. Concatenate Non-Zero Digits and Multiply by Sum II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003756-concatenate-non-zero-digits-and-multiply-by-sum-ii/solution.php)**

```php
<?php
/**
 * @param String $s
 * @param Integer[][] $queries
 * @return Integer[]
 */
function sumAndMultiply(string $s, array $queries): array
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo sumAndMultiply("10203004", [[0,7],[1,3],[4,6]]) .  "\n";       // Output: [12340, 4, 9]
echo sumAndMultiply("1000", [[0,3],[1,1]]) .  "\n";                 // Output: [1, 0]
echo sumAndMultiply("9876543210", [[0,9]]) .  "\n";                 // Output: [444444137]
echo sumAndMultiply("000", [[0,2]]) .  "\n";                        // Output: [0]
echo sumAndMultiply("5", [[0,0]]) .  "\n";                          // Output: [25]
echo sumAndMultiply("10101", [[0,4]]) .  "\n";                      // Output: 1111 * 4 = 4444
echo sumAndMultiply("120340", [[2,2]]) .  "\n";                     // Output: [0]
echo sumAndMultiply("9", [[0,0]]) .  "\n";                          // Output: [81]
?>
```

### Explanation:

- **Step 1: Parse and store non-zero digits**
   - We traverse the string once, saving each non-zero digit and its index.
   - For each saved digit, we update the prefix concatenation value and digit sum.

- **Step 2: Precompute powers of 10**
   - Powers are needed to shift the left part when extracting a substring of concatenated digits.

- **Step 3: Handle each query**
   - Use binary search to find the first and last non-zero positions within `[l, r]`.
   - If none exist, answer is 0.
   - Compute `x` using prefix concatenation and `sum` using prefix sum.
   - Multiply and take **modulo**.

- **Step 4: Return results**
   - Collect all answers in an array and return.

## Complexity Analysis

- **Time Complexity**:
   - Preprocessing: _**O(n)**_
   - Each query: _**O(log k)**_ where _**k**_ is the number of non-zero digits (via binary search).
   - Overall: _**O(n + q log n)**_ in the worst case.

- **Space Complexity**:
   - _**O(n)**_ for storing positions, prefix values, prefix sums, and powers of 10.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**