592\. Fraction Addition and Subtraction

**Difficulty:** Medium

**Topics:** `Math`, `String`, `Simulation`

Given a string `expression` representing an expression of fraction addition and subtraction, return the calculation result in string format.

The final result should be an [irreducible fraction](https://en.wikipedia.org/wiki/Irreducible_fraction). If your final result _is an integer, change it to the format of a fraction that has a denominator `1`_. So in this case, `2` should be converted to `2/1`.

**Example 1:**

- **Input:** expression = "-1/2+1/2"
- **Output:** "0/1"

**Example 2:**

- **Input:** expression = "-1/2+1/2+1/3"
- **Output:** "1/3"

**Example 3:**

- **Input:** expression = "1/3-1/2"
- **Output:** "-1/6"


**Constraints:**


- The input string only contains `'0'` to `'9'`, `'/'`, `'+'` and `'-'`. So does the output.
- Each fraction (input and output) has the format `±numerator/denominator`. If the first input fraction or the output is positive, then `'+'` will be omitted.
- The input only contains valid **irreducible fractions**, where the **numerator** and **denominator** of each fraction will always be in the range `[1, 10]`. If the denominator is `1`, it means this fraction is actually an integer in a fraction format defined above.
- The number of given fractions will be in the range `[1, 10]`.
- The numerator and denominator of the **final result** are guaranteed to be valid and in the range of **32-bit** int.


**Solution:**

We need to carefully parse the input string and perform arithmetic operations on the fractions. The steps are as follows:

1. **Parse the Input Expression**: Extract individual fractions from the expression string.
2. **Compute the Result**: Add or subtract the fractions step by step.
3. **Simplify the Result**: Convert the final fraction to its irreducible form.

Let's implement this solution in PHP: **[592. Fraction Addition and Subtraction](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000592-fraction-addition-and-subtraction/solution.php)**

```php
<?php
// Example usage
echo fractionAddition("-1/2+1/2"); // Output: "0/1"
echo "\n";
echo fractionAddition("-1/2+1/2+1/3"); // Output: "1/3"
echo "\n";
echo fractionAddition("1/3-1/2"); // Output: "-1/6"
?>
```

### Explanation:

- **gcd function**: Computes the greatest common divisor of two numbers, which helps in simplifying the fraction.
- **addFractions function**: Adds two fractions. It computes the common denominator, adjusts the numerators accordingly, adds them, and then simplifies the resulting fraction.
- **fractionAddition function**: This is the main function that parses the input expression, uses regular expressions to extract all the fractions, and iteratively adds them up using the `addFractions` function.

### Test Cases:
- `fractionAddition("-1/2+1/2")` returns `"0/1"`.
- `fractionAddition("-1/2+1/2+1/3")` returns `"1/3"`.
- `fractionAddition("1/3-1/2")` returns `"-1/6"`.

This solution handles all the required operations and returns the correct output for each given expression.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**

