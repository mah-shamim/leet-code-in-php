1523\. Count Odd Numbers in an Interval Range

**Difficulty:** Easy

**Topics:** `Math`, `Biweekly Contest 31`

Given two non-negative integers `low` and `high`. Return _the count of odd numbers between `low` and `high` (inclusive)_.

**Example 1:**

- **Input:** low = 3, high = 7
- **Output:** 3
- **Explanation:** The odd numbers between 3 and 7 are [3,5,7].

**Example 2:**

- **Input:** low = 8, high = 10
- **Output:** 1
- **Explanation:** The odd numbers between 8 and 10 are [9].

**Constraints:**

- `0 <= low <= high <= 10⁹`


**Hint:**
1. If the range (high - low + 1) is even, the number of even and odd numbers in this range will be the same.
2. If the range (high - low + 1) is odd, the solution will depend on the parity of high and low.



**Similar Questions:**
1. [2980. Check if Bitwise OR Has Trailing Zeros](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002980-check-if-bitwise-or-has-trailing-zeros)






**Solution:**

We are given two non-negative integers low and high. We need to count the number of odd numbers between low and high (inclusive).

The straightforward way is to iterate from low to high and count the odd numbers. However, this would be O(n) and might be too slow for large inputs (up to 10⁹). Therefore, we need a mathematical approach.

### Approach:

- Calculate the number of odd numbers from 0 to `high` using integer division: `(high + 1) // 2`
- Calculate the number of odd numbers from 0 to `low - 1` using integer division: `low // 2`
- Subtract the second result from the first to get the count of odd numbers in the range `[low, high]`

Let's implement this solution in PHP: **[1523. Count Odd Numbers in an Interval Range](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001523-count-odd-numbers-in-an-interval-range/solution.php)**

```php
<?php
/**
 * @param Integer $low
 * @param Integer $high
 * @return Integer
 */
function countOdds($low, $high) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo countOdds(3, 7) . "\n";        // Output: 3
echo countOdds(8, 10) . "\n";       // Output: 1
?>
```

### Explanation:

- The number of odd numbers from 0 to any non-negative integer `n` is `(n + 1) // 2` (integer division)
- For example, from 0 to 7: odd numbers are [1,3,5,7] → `(7+1)//2 = 4`
- The count of odd numbers in `[low, high]` equals the count in `[0, high]` minus the count in `[0, low-1]`
- This gives us: `((high + 1) // 2) - (low // 2)`
- This formula handles all cases correctly, including when `low = 0` or when `low = high`

**Time Complexity:** O(1)  
**Space Complexity:** O(1)

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**