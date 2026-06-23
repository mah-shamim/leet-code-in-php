3699\. Number of ZigZag Arrays I

**Difficulty:** Hard

**Topics:** `Senior Staff`, `Dynamic Programming`, `Prefix Sum`, `Weekly Contest 469`

You are given three integers `n`, `l`, and `r`.

A **ZigZag** array of length `n` is defined as follows:

- Each element lies in the range `[l, r]`.
- No **two** adjacent elements are equal.
- No **three** consecutive elements form a **strictly increasing** or **strictly decreasing** sequence.

Return the total number of valid **ZigZag** arrays.

Since the answer may be large, return it **modulo** `10⁹ + 7`.

A `sequence` is said to be `strictly increasing` if each element is strictly greater than its previous one (if exists).

A `sequence` is said to be `strictly decreasing` if each element is strictly smaller than its previous one (if exists).

**Example 1:**

- **Input:** n = 3, l = 4, r = 5
- **Output:** 2
- **Explanation:** 
  - There are only 2 valid ZigZag arrays of length `n = 3` using values in the range `[4, 5]`:
    - `[4, 5, 4]`
    - `[5, 4, 5]`


**Example 2:**

- **Input:** n = 3, l = 1, r = 3
- **Output:** 10
  - **Explanation:**
     - There are 10 valid ZigZag arrays of length `n = 3` using values in the range `[1, 3]`:
      - `[1, 2, 1]`, `[1, 3, 1]`, `[1, 3, 2]`
      - `[2, 1, 2]`, `[2, 1, 3]`, `[2, 3, 1]`, `[2, 3, 2]`
      - `[3, 1, 2]`, `[3, 1, 3]`, `[3, 2, 3]`
   - All arrays meet the ZigZag conditions.


**Example 3:**

- **Input:** n = 3, l = 1, r = 2
- **Output:** 2

**Constraints:**

- `3 <= n <= 2000`
- `1 <= l < r <= 2000`


**Hint:**
1. Use dynamic programming: let `dp[i][dir][x]` be the count of length-`i` sequences ending at value `x` where `dir` is the required next comparison (0 = down, 1 = up).
2. If the required move is `up` (dir=1) do `dp[i+1][0][y] += sum(dp[i][1][x]) for x < y`; if the required move is `down` (dir=0) do `dp[i+1][1][y] += sum(dp[i][0][x]) for x > y`.
3. Speed up with prefix/suffix sums so each layer updates in O(`m`) instead of O(`m`²); take values mod `10⁹+7`.


**Solution:**

We developed a dynamic programming solution to count all valid ZigZag arrays of length `n` with values in `[l, r]`. The solution efficiently computes the number of sequences avoiding equal adjacent elements and three-element monotonic runs, using prefix/suffix sums to achieve _**O(n * m)**_ time complexity where `m = r - l + 1`.

## Approach

- **Dynamic Programming State**: We maintain two DP arrays for each value position:
   - `dpUp[i]`: Count of valid sequences of current length ending with value `i` where the **last step was UP** (i.e., the next element must go DOWN)
   - `dpDown[i]`: Count of valid sequences ending with value `i` where the **last step was DOWN** (i.e., the next element must go UP)
- **Transition Logic**:
   - To extend a sequence with an UP move, the previous element must be smaller: `newUp[y] = sum(dpDown[x])` for all `x < y`
   - To extend with a DOWN move, the previous element must be larger: `newDown[y] = sum(dpUp[x])` for all `x > y`
   - This automatically enforces the "no three consecutive monotonic" rule by alternating directions
- **Optimization Technique**:
   - Instead of _**O(m²)**_ transitions per layer, we precompute prefix sums of `dpDown` for UP transitions
   - Precompute suffix sums of `dpUp` for DOWN transitions
   - This reduces each layer update to _**O(m)**_
- **Initialization**: For length 1, every value can start a sequence in either direction state, so both `dpUp[i] = 1` and `dpDown[i] = 1`

Let's implement this solution in PHP: **[3699. Number of ZigZag Arrays I](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003699-number-of-zigzag-arrays-i/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @param Integer $l
 * @param Integer $r
 * @return Integer
 */
function zigZagArrays(int $n, int $l, int $r): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo zigZagArrays(3, 4, 5) .  "\n"; // Output: 2
echo zigZagArrays(3, 1, 3) .  "\n"; // Output: 10
echo zigZagArrays(3, 1, 2) .  "\n"; // Output: 2
?>
```

### Explanation:

- **Avoiding Equal Adjacent Elements**: The transition formulas use strict inequalities (`x < y` for **UP**, `x > y` for **DOWN**), which naturally prevents equal adjacent values
- **No Three Consecutive Monotonic**: By forcing alternating direction states (**UP** then **DOWN** then **UP**...), we ensure that three consecutive elements cannot be strictly increasing or decreasing, as that would require two UP moves or two DOWN moves in a row
- **Prefix Sum Strategy**: For `newUp[i]`, we sum all `dpDown[0..i-1]`. The prefix sum array gives this in _**O(1)**_ per position
- **Suffix Sum Strategy**: For `newDown[i]`, we sum all `dpUp[i+1..m-1]`. The suffix sum array gives this in _**O(1)**_ per position
- **Final Answer**: Sum all values from both `dpUp` and `dpDown` for length n, as sequences can end with either direction state

## Complexity Analysis

- **Time Complexity**: _**O(n * m)**_ where `n` is the sequence length and `m = r - l + 1` (range size)
   - Each iteration computes prefix sums _**O(m)**_, suffix sums _**O(m)**_, and updates _**O(m)**_
   - No nested loops over _**m²**_ in transitions due to prefix/suffix optimization
- **Space Complexity**: _**O(m)**_ for the DP arrays (constant number of arrays of size _**m**_)

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**