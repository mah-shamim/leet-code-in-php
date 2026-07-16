3867\. Sum of GCD of Formed Pairs

**Difficulty:** Medium

**Topics:** `Senior`, `Array`, `Math`, `Two Pointers`, `Sorting`, `Simulation`, `Number Theory`, `Biweekly Contest 178`

You are given an integer array `nums` of length `n`.

Construct an array `prefixGcd` where for each index `i`:

- Let `mxᵢ = max(nums[0], nums[1], ..., nums[i])`.
- `prefixGcd[i] = gcd(nums[i], mxᵢ)`.

After constructing `prefixGcd`:

- Sort `prefixGcd` in **non-decreasing** order.
- Form pairs by taking the **smallest unpaired** element and the **largest unpaired** element.
- Repeat this process until no more pairs can be formed.
- For each formed pair, **compute** the `gcd` of the two elements.
- If `n` is odd, the **middle** element in the `prefixGcd` array remains **unpaired** and should be ignored.

Return an integer denoting the **sum of the GCD** values of all formed pairs.
The term `gcd(a, b)` denotes the **greatest common divisor** of `a` and `b`.

**Example 1:**

- **Input:** nums = [2,6,4]
- **Output:** 2
- **Explanation:**
   - Construct `prefixGcd`:
  
   | `i`	 | `nums[i]`	 | `mxᵢ`	 | `prefixGcd[i]` |
   |-----|-----------|-------|----------------|
   | 0	   | 2	         | 2	     | 2              |
   | 1	   | 6	         | 6	     | 6              |
   | 2	   | 4	         | 6	     | 2              |

   - `prefixGcd = [2, 6, 2]`. After sorting, it forms `[2, 2, 6]`.
   - Pair the smallest and largest elements: `gcd(2, 6) = 2`. The remaining middle element 2 is ignored. Thus, the sum is 2.

**Example 2:**

- **Input:** nums = [3,6,2,8]
- **Output:** 5
- **Explanation:**
   - Construct `prefixGcd`:

   | `i`	 | `nums[i]`	 | `mxᵢ`	 | `prefixGcd[i]` |
   |-----|-----------|-------|----------------|
   | 0	   | 3	         | 3	     | 3              |
   | 1	   | 6	         | 6	     | 6              |
   | 2	   | 2	         | 6	     | 2              |
   | 3	   | 8	         | 8	     | 8              |

   - `prefixGcd = [3, 6, 2, 8]`. After sorting, it forms `[2, 3, 6, 8]`.
   - Form pairs: `gcd(2, 8) = 2` and `gcd(3, 6) = 3`. Thus, the sum is `2 + 3 = 5`.

**Example 3:**

- **Input:** nums =[5,5,5]
- **Output:** 5

**Example 4:**

- **Input:** nums = [7]
- **Output:** 0

**Example 5:**

- **Input:** nums = [1,2,3,4]
- **Output:** 2

**Example 6:**

- **Input:** nums = [1000000000, 999999937, 1000000000]
- **Output:** 1

**Example 7:**

- **Input:** nums = [1,1,1,1]
- **Output:** 2


**Constraints:**

- `1 <= n == nums.length <= 10⁵`
- `1 <= nums[i] <= 10⁹`


**Hint:**
1. Maintain a running prefix maximum `mxᵢ` while iterating nums to compute `prefixGcd[i] = gcd(nums[i], mxᵢ)`.
2. Sort `prefixGcd` in non-decreasing order.
3. Form pairs by combining the smallest unpaired and largest unpaired elements.
4. Compute gcd for each pair and sum them; ignore middle element if `n` is odd.


**Solution:**

We implemented a solution that constructs the `prefixGcd` array by maintaining a running maximum and computing GCDs, then sorts the array and pairs the smallest with the largest to sum their GCDs, ignoring the middle element when `n` is odd. This approach runs in _**O(n log n)**_ time and uses _**O(n)**_ extra space.

## Approach

- Iterate through the array while maintaining the maximum value seen so far.
- For each index, compute the GCD of the current number and the current maximum, and store it in `prefixGcd`.
- Sort `prefixGcd` in non‑decreasing order.
- Use two pointers (`left` and `right`) to pair the smallest unpaired element with the largest unpaired element.
- For each pair, compute the GCD and add it to the total sum.
- If `n` is odd, the middle element is automatically ignored because the loop stops when `left < right`.

Let's implement this solution in PHP: **[3867. Sum of GCD of Formed Pairs](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003867-sum-of-gcd-of-formed-pairs/solution.php)**

```php
<?php
/**
 * @param Integer[] $nums
 * @return Integer
 */
function gcdSum(array $nums): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * Helper GCD function
 *
 * @param $a
 * @param $b
 * @return int|mixed
 */
function gcd($a, $b): mixed
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo gcdSum([2,6,4]) .  "\n";                                   // Output: 2
echo gcdSum([3,6,2,8]) .  "\n";                                 // Output: 5
echo gcdSum([5,5,5]) .  "\n";                                   // Output: 5
echo gcdSum([7]) .  "\n";                                       // Output: 0
echo gcdSum([1,2,3,4]) .  "\n";                                 // Output: 2
echo gcdSum([1000000000, 999999937, 1000000000]) .  "\n";       // Output: 1
echo gcdSum([1,1,1,1]) .  "\n";                                 // Output: 2
?>
```

### Explanation:

- **Step 1 – Build `prefixGcd`:**
   - Maintain `mx` as the maximum value from `nums[0]` to `nums[i]`.
   - Compute `gcd(nums[i], mx)` and push it into the `prefixGcd` array.
- **Step 2 – Sort:**
   - Sorting ensures that the smallest and largest elements are accessible via two pointers.
- **Step 3 – Pairing and Summing:**
   - Initialize `left = 0` and `right = n - 1`.
   - While `left < right`:
      - Compute `gcd(prefixGcd[left], prefixGcd[right])`.
      - Add the result to `sum`.
      - Move `left` forward and `right` backward.
   - When `n` is odd, the middle element (at `left == right`) is never processed, so it’s ignored as required.
- **GCD Helper:**
   - Use the Euclidean algorithm (iterative) to compute GCD efficiently.

## Complexity Analysis

- **Time Complexity:**
   - Building `prefixGcd`: _**O(n)**_
   - Sorting: _**O(n log n)**_
   - Pairing: _**O(n)**_
   - **Overall:** _**O(n log n)**_

- **Space Complexity:**
   - _**O(n)**_ for storing `prefixGcd`.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**