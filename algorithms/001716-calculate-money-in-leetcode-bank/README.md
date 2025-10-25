1716\. Calculate Money in Leetcode Bank

**Difficulty:** Easy

**Topics:** `Math`, `Biweekly Contest 43`

Hercy wants to save money for his first car. He puts money in the Leetcode bank **every day**.

He starts by putting in `$1` on Monday, the first day. Every day from Tuesday to Sunday, he will put in `$1` more than the day before. On every subsequent Monday, he will put in `$1` more than the **previous Monday**.

Given `n`, return _the total amount of money he will have in the Leetcode bank at the end of the `nᵗʰ` day_.

**Example 1:**

- **Input:** n = 4
- **Output:** 10
- **Explanation:** After the 4ᵗʰ day, the total is 1 + 2 + 3 + 4 = 10.

**Example 2:**

- **Input:** n = 10
- **Output:** 37
- **Explanation:** After the 10ᵗʰ day, the total is (1 + 2 + 3 + 4 + 5 + 6 + 7) + (2 + 3 + 4) = 37. Notice that on the 2ⁿᵈ Monday, Hercy only puts in $2.

**Example 3:**

- **Input:** n = 20
- **Output:** 96
- **Explanation:** After the 20ᵗʰ day, the total is (1 + 2 + 3 + 4 + 5 + 6 + 7) + (2 + 3 + 4 + 5 + 6 + 7 + 8) + (3 + 4 + 5 + 6 + 7 + 8) = 96.

**Constraints:**
- `1 <= n <= 1000`


**Hint:**
1. Simulate the process by keeping track of how much money Hercy is putting in and which day of the week it is, and use this information to deduce how much money Hercy will put in the next day.



**Similar Questions:**
1. [2591. Distribute Money to Maximum Children](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002591-distribute-money-to-maximum-children)






**Solution:**

We need to calculate the total amount of money Hercy saves in the Leetcode bank over `n` days. Hercy starts by putting in $1 on the first day (Monday) and increases the amount by $1 each subsequent day. On every following Monday, he increases the base amount by $1 compared to the previous Monday.

### Approach
1. **Problem Analysis**: The problem involves calculating the sum of an increasing sequence where each week the starting amount increases by $1. The sequence for each week starts from the week number (1 for the first week, 2 for the second, etc.) and increases by $1 each day for up to 7 days in a week.
2. **Key Insight**: The total days `n` can be divided into complete weeks and remaining days. For each complete week, the sum can be calculated using the arithmetic series formula. The remaining days are handled by calculating the sum starting from the next week's base amount.
3. **Algorithm Selection**: Use integer division to determine the number of complete weeks and the remaining days. For each complete week, compute the sum of the arithmetic series starting from the week number up to the week number plus 6. For the remaining days, compute the sum starting from the next week's base amount up to the base amount plus the number of remaining days minus one.

Let's implement this solution in PHP: **[1716. Calculate Money in Leetcode Bank](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001716-calculate-money-in-leetcode-bank/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @return Integer
 */
function totalMoney($n) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo totalMoney(4) . "\n";   // Output: 10
echo totalMoney(10) . "\n";  // Output: 37
echo totalMoney(20) . "\n";  // Output: 96
?>
```

### Explanation:

1. **Initialization**: Initialize `total` to accumulate the total savings.
2. **Complete Weeks Calculation**: Calculate the number of complete weeks (`weeks`) and remaining days (`remainingDays`). For each complete week, compute the sum of the arithmetic series from the starting amount (week number) to the starting amount plus 6 (the Sunday amount).
3. **Remaining Days Calculation**: For the remaining days, compute the sum from the next week's base amount up to the base amount plus the number of remaining days minus one.
4. **Return Result**: The accumulated total is returned after processing all complete weeks and remaining days.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://jackaltimer.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://www.buymeacoffee.com/assets/img/custom_images/orange_img.png" alt="Buy Me A Coffee" style="height: 41px !important;width: 174px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**