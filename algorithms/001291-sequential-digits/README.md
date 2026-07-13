1291\. Sequential Digits

**Difficulty:** Medium

**Topics:** `Staff`, `Enumeration`, `Weekly Contest 167`

An integer has _sequential digits_ if and only if each digit in the number is one more than the previous digit.

Return a **sorted** list of all the integers in the range `[low, high]` inclusive that have sequential digits.

**Example 1:**

- **Input:** low = 100, high = 300
- **Output:** [123,234]

**Example 2:**

- **Input:** low = 1000, high = 13000
- **Output:** [1234,2345,3456,4567,5678,6789,12345]

**Example 3:**

- **Input:** low = 10, high = 20
- **Output:** [12]

**Example 4:**

- **Input:** low = 5, high = 9
- **Output:** []

**Example 5:**

- **Input:** low = 123, high = 123
- **Output:** [123]

**Example 6:**

- **Input:** low = 1000, high = 1100
- **Output:** []

**Example 7:**

- **Input:** low = 123456789, high = 123456789
- **Output:** [123456789]

**Constraints:**

- `10 <= low <= high <= 10⁹`


**Hint:**
1. Generate all numbers with sequential digits and check if they are in the given range.
2. Fix the starting digit then do a recursion that tries to append all valid digits.


**Solution:**

We implemented a direct generation strategy that builds all sequential-digit numbers from scratch and filters those within the given range, ensuring sorted output.

## Approach

- **Generate all sequential-digit numbers** by fixing a starting digit from 1 to 9.
- **Append consecutive digits** one by one while the next digit is ≤ 9 and the current number does not exceed `high`.
- **Check range** during generation: if the constructed number falls between `low` and `high`, store it.
- **Sort** the final result to guarantee ascending order (though generation order is mostly increasing, sorting ensures correctness).

Let's implement this solution in PHP: **[1291. Sequential Digits](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001291-sequential-digits/solution.php)**

```php
<?php
/**
 * @param Integer $low
 * @param Integer $high
 * @return Integer[]
 */
function sequentialDigits(int $low, int $high): array
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo sequentialDigits(100, 300) .  "\n";                    // Output: [123, 234]
echo sequentialDigits(1000, 13000) .  "\n";                 // Output: [1234, 2345, 3456, 4567, 5678, 6789, 12345]
echo sequentialDigits(10, 20) .  "\n";                      // Output: [12]
echo sequentialDigits(5, 9) .  "\n";                        // Output: []
echo sequentialDigits(123, 123) .  "\n";                    // Output: [123]
echo sequentialDigits(1000, 1100) .  "\n";                  // Output: []
echo sequentialDigits(123456789, 123456789) .  "\n";        // Output: [123456789]
?>
```

### Explanation:

- We loop over every possible starting digit (`1–9`).
- For each start, we initialize the number with that digit and set the next expected digit to `start + 1`.
- In a loop, we repeatedly append the next digit (e.g., `1→12→123`) until we either exceed 9 as the next digit or the number exceeds `high`.
- After appending each new digit, we check if the value is within `[low, high]` and add it to the result array.
- Since we generate numbers in a non‑decreasing order for each start, and starts increase, we call `sort()` at the end for a fully sorted list.
- This method avoids iterating over every integer in the range, making it efficient even when `high` is large (up to `10⁹`).

## Complexity Analysis

- **Time Complexity:** _**O(1)**_ — There are at most `9` starting digits and at most `9` digits per number, so at most `9×9 = 81` numbers generated, which is constant.
- **Space Complexity:** _**O(1)**_ — apart from the output array, we use only a few variables.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**