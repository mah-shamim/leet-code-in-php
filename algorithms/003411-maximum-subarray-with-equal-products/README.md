3411\. Maximum Subarray With Equal Products

**Difficulty:** Easy

**Topics:** `Mid Level`, `Array`, `Math`, `Sliding Window`, `Enumeration`, `Number Theory`, `Weekly Contest 431`

You are given an array of **positive** integers nums.

An array `arr` is called **product equivalent** if `prod(arr) == lcm(arr) * gcd(arr)`, where:

- `prod(arr)` is the product of all elements of `arr`.
- `gcd(arr)` is the **GCD[^1]** of all elements of `arr`.
- `lcm(arr)` is the **LCM[^2]** of all elements of `arr`.

Return the length of the **longest product equivalent** **subarray[^3]** of `nums`.


[^1]: **GCD:** The term `gcd(a, b)` denotes the **greatest common divisor** of `a` and `b`.
[^2]: **LCM:** The term `lcm(a, b)` denotes the **least common multiple** of `a` and `b`.
[^3]: **Subarray:** A **subarray** is a contiguous **non-empty** sequence of elements within an array.

**Example 1:**

- **Input:** nums = [1,2,1,2,1,1,1]
- **Output:** 5
- **Explanation:** The longest product equivalent subarray is `[1, 2, 1, 1, 1]`, where `prod([1, 2, 1, 1, 1]) = 2`, `gcd([1, 2, 1, 1, 1]) = 1`, and `lcm([1, 2, 1, 1, 1]) = 2`.

**Example 2:**

- **Input:** nums = [2,3,4,5,6]
- **Output:** 3
- **Explanation:** The longest product equivalent subarray is `[3, 4, 5]`.

**Example 3:**

- **Input:** nums = [1,2,3,1,4,5,1]
- **Output:** 5
  **Example 4:**

- **Input:** nums = [1,1]
- **Output:** 2

**Example 5:**

- **Input:** nums = [2,2]
- **Output:** 2

**Example 6:**

- **Input:** nums = [10,10]
- **Output:** 2

**Example 7:**

- **Input:** nums = [2,3,5,7]
- **Output:** 4

**Example 8:**

- **Input:** nums = [6,10,15]
- **Output:** 2

**Example 9:**

- **Input:** nums = [4,6]
- **Output:** 2

**Example 10:**

- **Input:** nums = [1,1,1,1,1]
- **Output:** 5

**Example 11:**

- **Input:** nums = [2,4,8]
- **Output:** 2

**Example 12:**

- **Input:** nums = [9,9,9]
- **Output:** 2

**Example 13:**

- **Input:** nums = [3,3]
- **Output:** 2

**Example 14:**

- **Input:** nums = [1,10,1]
- **Output:** 3

**Constraints:**

- `2 <= nums.length <= 100`
- `1 <= nums[i] <= 10`


**Hint:**

1. What is the maximum possible lcm?


**Similar Questions:**

1. [1979. Find Greatest Common Divisor of Array](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001979-find-greatest-common-divisor-of-array)


**Solution:**

We solve this problem by exploiting a key mathematical bound: since `nums[i] <= 10`, the LCM of any subarray divides `lcm(1..10) = 2520`, and the GCD is at most `10`. Therefore, `lcm(arr) * gcd(arr) <= 25200`. We enumerate all subarrays starting at each index, tracking product, GCD, and LCM incrementally, and **break early** once the running product exceeds `25200` (equality becomes impossible). This prunes the search dramatically while keeping the code simple.

## Approach

- Iterate over every starting index `i` in `nums`.
- For each `i`, extend a subarray to the right (`j = i, i+1, ...`), maintaining:
  - `prod` = product of elements so far
  - `g` = running GCD
  - `l` = running LCM
- After adding `nums[j]`:
  - If `prod > 25200`, break (equality can no longer hold).
  - Update `g = gcd(g, x)` and `l = l / gcd(l, x) * x`.
  - If `prod == l * g`, update the answer with the subarray length.
- Return the maximum length found.

**Key bound justification:**
- `lcm(arr)` divides `lcm(1..10) = 2520`.
- `gcd(arr) <= 10`.
- So `lcm * gcd <= 2520 * 10 = 25200`.
- Any subarray whose product exceeds `25200` can never satisfy the condition.

Let's implement this solution in PHP: **[3411. Maximum Subarray With Equal Products](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003411-process-string-with-special-operations-i/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function maxLength(array $nums): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $a
 * @param $b
 * @return int
 */
function gcd($a, $b): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo maxLength([1,2,1,2,1,1,1]) .  "\n";            // Output: 5  (Example 1)
echo maxLength([2,3,4,5,6]) .  "\n";                // Output: 3  (Example 2)
echo maxLength([1,2,3,1,4,5,1]) .  "\n";            // Output: 5  (Example 3)
echo maxLength([1,1]) .  "\n";                      // Output: 2  (prod=1, gcd=1, lcm=1 → 1=1×1)
echo maxLength([2,2]) .  "\n";                      // Output: 2  (prod=4, gcd=2, lcm=2 → 4=2×2)
echo maxLength([10,10]) .  "\n";                    // Output: 2  (prod=100, gcd=10, lcm=10 → 100=10×10)
echo maxLength([2,3,5,7]) .  "\n";                  // Output: 4  (pairwise coprime: gcd=1, lcm=prod → prod=prod×1)  [corrected]
echo maxLength([6,10,15]) .  "\n";                  // Output: 2  ([6,10]: 60=30×2)                                  [corrected]
echo maxLength([4,6]) .  "\n";                      // Output: 2  (prod=24, gcd=2, lcm=12 → 24=12×2)
echo maxLength([1,1,1,1,1]) .  "\n";                // Output: 5  (all ones: prod=1, gcd=1, lcm=1)
echo maxLength([2,4,8]) .  "\n";                    // Output: 2  ([2,4]:8=4×2; [4,8]:32=8×4)                      [corrected]
echo maxLength([9,9,9]) .  "\n";                    // Output: 2  ([9,9]:81=9×9)                                   [corrected]
echo maxLength([3,3]) .  "\n";                      // Output: 2  (prod=9, gcd=3, lcm=3 → 9=3×3)
echo maxLength([1,10,1]) .  "\n";                   // Output: 3  (prod=10, gcd=1, lcm=10 → 10=10×1)
?>
```

## Explanation

- **Why the bound works:** Because all `nums[i] <= 10`, the maximum LCM any subarray can achieve is `2520`. This is the LCM of `{1,2,3,4,5,6,7,8,9,10}`. GCD is bounded by the smallest element, so `gcd <= 10`. Thus the RHS `lcm * gcd` is bounded by `25200`.
- **Product grows fast:** For positive integers, multiplying by values `>= 2` grows the product quickly. Once `prod > 25200`, adding more elements only increases it further, so equality with `lcm * gcd` is impossible — we can break.
- **Incremental GCD/LCM:** GCD uses Euclid's algorithm; LCM uses `lcm(a,b) = a / gcd(a,b) * b` to avoid overflow from `a*b`.
- **Why this beats brute force:** A naive O(n²) checks every subarray fully. Here the inner loop usually stops within ~15 non-1 elements, keeping the practical work tiny (though 1-heavy arrays can still extend).
- **Numeric types:** PHP integers are 64-bit, so `l * g` (≤ 25200) and `prod` (≤ 25200 before break) fit safely; the `intdiv` ensures integer division.

## Complexity Analysis

- **Time Complexity:**  
  - Worst case: **O(n²)** (e.g., an all-`1`s array, where `prod` never exceeds the limit and the inner loop runs to the end).
  - Practical/typical: **O(n · k)** where `k ≈ 15 + (# of 1s in the run)` — the product bound truncates the inner loop quickly.
  - With `n <= 100`, O(n²) = 10,000 operations is trivially fast.

- **Space Complexity:** **O(1)** — only a few scalar variables are used; no extra arrays or recursion.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**