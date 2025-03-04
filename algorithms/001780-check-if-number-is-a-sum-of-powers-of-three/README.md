1780\. Check if Number is a Sum of Powers of Three

**Difficulty:** Medium

**Topics:** `Math`

Given an integer `n`, return _`true` if it is possible to represent `n` as the sum of distinct powers of three_. Otherwise, return `false`.

An integer `y` is a power of three if there exists an integer `x` such that <code>y == 3<sup>x</sup></code>.

**Example 1:**

- **Input:** n = 12
- **Output:** true
- **Explanation:** <code>12 = 3<sup>1</sup> + 3<sup>2</sup></code>

**Example 2:**

- **Input:** n = 91
- **Output:** true
- **Explanation:** <code>91 = 3<sup>0</sup> + 3<sup>2</sup> + 3<sup>4</sup></code>


**Example 3:**

- **Input:** n = 21
- **Output:** false



**Constraints:**
- <code>1 <= n <= 10<sup>7</sup></code>

**Hint:**
1. Let's note that the maximum power of 3 you'll use in your soln is 3^16
2. The number can not be represented as a sum of powers of 3 if it's ternary presentation has a 2 in it



**Solution:**

We need to determine if a given integer `n` can be expressed as the sum of distinct powers of three. This means each power of three can be used at most once in the sum.

### Approach
The key insight here is to recognize that if a number can be represented as a sum of distinct powers of three, its ternary (base 3) representation should only contain the digits 0 and 1. If any digit in the ternary representation is 2, it means that power of three is used more than once, which is not allowed. Thus, the solution involves converting the number to its base 3 representation and checking for the presence of the digit 2.

Let's implement this solution in PHP: **[1780. Check if Number is a Sum of Powers of Three](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001780-check-if-number-is-a-sum-of-powers-of-three/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @return Boolean
 */
function checkPowersOfThree($n) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test Cases
echo checkPowersOfThree(12) ? "true\n" : "false\n";  // Output: true
echo checkPowersOfThree(91) ? "true\n" : "false\n";  // Output: true
echo checkPowersOfThree(21) ? "true\n" : "false\n";  // Output: false
?>
```

### Explanation:

1. **Convert to Base 3**: The number `n` is repeatedly divided by 3, and the remainder at each step is checked.
2. **Check for Invalid Digit**: If any remainder is 2, it indicates that the number cannot be represented as a sum of distinct powers of three, so we return `false`.
3. **Termination Condition**: The loop continues until `n` becomes 0. If the loop completes without finding any remainder of 2, the function returns `true`.

This approach efficiently checks the necessary condition by leveraging the properties of number representation in different bases, specifically base 3, ensuring that each power of three is used at most once. The time complexity is O(log n) due to the repeated division by 3, making it efficient even for large values of `n`.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**