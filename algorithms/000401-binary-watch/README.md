401\. Binary Watch

**Difficulty:** Easy

**Topics:** `Junior`, `Backtracking`, `Bit Manipulation`

A binary watch has 4 LEDs on the top to represent the hours (0-11), and 6 LEDs on the bottom to represent the minutes (0-59). Each LED represents a zero or one, with the least significant bit on the right.

- For example, the below binary watch reads `"4:51"`.

![binarywatch](https://assets.leetcode.com/uploads/2021/04/08/binarywatch.jpg)

Given an integer `turnedOn` which represents the number of LEDs that are currently on (ignoring the PM), return _all possible times the watch could represent_. You may return the answer in **any order**.

The hour must not contain a leading zero.

- For example, `"01:00"` is not valid. It should be `"1:00"`.

The minute must consist of two digits and may contain a leading zero.

- For example, `"10:2"` is not valid. It should be `"10:02"`.


**Example 1:**

- **Input:** turnedOn = 1
- **Output:** ["0:01","0:02","0:04","0:08","0:16","0:32","1:00","2:00","4:00","8:00"]

**Example 2:**

- **Input:** turnedOn = 9
- **Output:** []

**Constraints:**

- `0 <= turnedOn <= 10`


**Hint:**
1. Simplify by seeking for solutions that involve comparing bit counts.
2. Consider calculating all possible times for comparison purposes.


**Similar Questions:**
1. [17. Letter Combinations of a Phone Number](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000017-letter-combinations-of-a-phone-number)
2. [191. Number of 1 Bits](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000191-number-of-1-bits)






**Solution:**

We need to generate all possible times (hour from 0 to 11, minute from 0 to 59) such that the total number of 1 bits in the binary representation of hour and minute combined equals turnedOn. The hour is represented by 4 bits (0-11, but note that hours can go up to 11, so the binary representation of hour uses up to 4 bits; for hour=11, binary 1011 has 3 bits set). The minute is represented by 6 bits (0-59). For each hour and minute combination, count the total number of bits set (popcount). If equal to turnedOn, format as "h:mm" (hour without leading zero, minute with two digits). Return all such times. Since turnedOn <= 10, maximum bits possible is 10 (4+6) but constraints limit hour <=11, minute <=59, so some combinations with many bits may not be possible.

### Approach:

- Iterate over all possible hours from `0` to `11` (4 bits, so 12 valid hour values).
- For each hour, iterate over all possible minutes from `0` to `59` (6 bits, so 60 valid minute values).
- For each combination `(h, m)`, count the number of `1` bits in the binary representation of `h` and `m` using `decbin()` and `substr_count()` (or equivalent bit-counting function).
- If the total number of `1` bits equals the given `turnedOn`, the time is valid. Format it as `h:mm` (hour without leading zero, minute always two digits with leading zero if needed) and add it to the result array.
- Return the result array.

Let's implement this solution in PHP: **[401. Binary Watch](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000401-binary-watch/solution.php)**

```php
<?php
/**
 * @param Integer $turnedOn
 * @return String[]
 */
function readBinaryWatch(int $turnedOn): array
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
print_r(readBinaryWatch(1)) . "\n";         // Output: ["0:01","0:02","0:04","0:08","0:16","0:32","1:00","2:00","4:00","8:00"]
print_r(readBinaryWatch(9)) . "\n";         // Output: []
?>
```

### Explanation:

- The watch has 4 LEDs for hours (0–11) and 6 LEDs for minutes (0–59). Each LED corresponds to a bit: the hour uses 4 bits (values 1,2,4,8) and the minute uses 6 bits (values 1,2,4,8,16,32).
- Since the hour range is 0–11, we only need to check hours up to 11; similarly minutes up to 59.
- For every possible hour and minute, we compute the number of LEDs turned on by counting set bits. This matches the physical watch: each `1` bit means that specific LED is on.
- If the sum of set bits equals `turnedOn`, that time could be displayed.
- Formatting ensures the output matches the required string format: hour as an integer (no leading zero) and minute always two digits (with a leading zero if needed).

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**