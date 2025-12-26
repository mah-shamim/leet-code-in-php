2483\. Minimum Penalty for a Shop

**Difficulty:** Medium

**Topics:** `String`, `Prefix Sum`, `Biweekly Contest 92`

You are given the customer visit log of a shop represented by a **0-indexed** string customers consisting only of characters `'N'` and `'Y'`:

- if the `iᵗʰ` character is `'Y'`, it means that customers come at the `iᵗʰ` hour
- whereas `'N'` indicates that no customers come at the `iᵗʰ` hour.

If the shop closes at the `jᵗʰ` hour (`0 <= j <= n`), the **penalty** is calculated as follows:

- For every hour when the shop is open and no customers come, the penalty increases by `1`.
- For every hour when the shop is closed and customers come, the penalty increases by `1`.

Return _the **earliest** hour at which the shop must be closed to incur a **minimum** penalty_.

**Note** that if a shop closes at the `jᵗʰ` hour, it means the shop is closed at the hour `j`.

**Example 1:**

- **Input:** customers = "YYNY"
- **Output:** 2
- **Explanation:**
  - Closing the shop at the 0th hour incurs in 1+1+0+1 = 3 penalty.
  - Closing the shop at the 1st hour incurs in 0+1+0+1 = 2 penalty.
  - Closing the shop at the 2nd hour incurs in 0+0+0+1 = 1 penalty.
  - Closing the shop at the 3rd hour incurs in 0+0+1+1 = 2 penalty.
  - Closing the shop at the 4th hour incurs in 0+0+1+0 = 1 penalty.
  - Closing the shop at 2nd or 4th hour gives a minimum penalty. Since 2 is earlier, the optimal closing time is 2.

**Example 2:**

- **Input:** customers = "NNNNN"
- **Output:** 0
- **Explanation:** It is best to close the shop at the 0ᵗʰ hour as no customers arrive.

**Example 3:**

- **Input:** customers = "YYYY"
- **Output:** 4
- **Explanation:** It is best to close the shop at the 4ᵗʰ hour as customers arrive at each hour.

**Constraints:**

- `1 <= customers.length <= 10⁵`
- `customers` consists only of characters `'Y'` and `'N'`.



**Hint:**
1. At any index, the penalty is the sum of prefix count of ‘N’ and suffix count of ‘Y’.
2. Enumerate all indices and find the minimum such value.



**Similar Questions:**
1. [2483. Minimum Penalty for a Shop](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002483-minimum-penalty-for-a-shop)






**Solution:**

We need to find the best time to close a shop to minimize penalty:
- Penalty = number of customers who come when shop is closed (`N` in prefix) + number of customers who don't come when shop is open (`Y` in suffix)
- We need to find the index (hour) that gives minimum penalty

## Approach

1. For each position `i` (0 to n), calculate:
   - Prefix count of `N` (customers who come when shop is closed before hour i)
   - Suffix count of `Y` (customers who don't come when shop is open from hour i onward)
2. Sum these two values for each position
3. Find the minimum sum

Let's implement this solution in PHP: **[2483. Minimum Penalty for a Shop](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002483-minimum-penalty-for-a-shop/solution.php)**

```php
<?php
/**
 * @param String $customers
 * @return Integer
 */
function bestClosingTime($customers) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo bestClosingTime("YYNY") . "\n";    // Output: 2
echo bestClosingTime("NNNNN") . "\n";   // Output: 0
echo bestClosingTime("YYYY") . "\n";    // Output: 4
?>
```

### Explanation:

1. Start with penalty 0 (closing at hour 0)
2. Traverse through each hour:
   - If customer comes ('Y'): Staying open gives -1 penalty (good)
   - If customer doesn't come ('N'): Staying open gives +1 penalty (bad)
3. Track the minimum penalty and the hour where it occurs
4. The best closing hour is when the penalty is minimized

**Time Complexity:** O(n) - single pass through the string  
**Space Complexity:** O(1) - constant extra space

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**