402\. Remove K Digits

**Difficulty:** Medium

**Topics:** `String`, `Stack`, `Greedy`, `Monotonic Stack`

Given string num representing a non-negative integer `num`, and an integer `k`, return <i>the smallest possible integer after removing</i> `k` <i>digits from</i> `num`.



**Example 1:**

- **Input:** <code>**num = "1432219", k = 3**</code>
- **Output:** <code>**"1219"**</code>
- **Explanation:** <code>**Remove the three digits 4, 3, and 2 to form the new number 1219 which is the smallest.**</code>

**Example 2:**

- **Input:** <code>**num = "10200", k = 1**</code>
- **Output:** <code>**"200"**</code>
- **Explanation:** <code>**Remove the leading 1 and the number is 200. Note that the output must not contain leading zeroes.**</code>

**Example 3:**

- **Input:** <code>**num = "10", k = 2**</code>
- **Output:** <code>**"0"**</code>
- **Explanation:** <code>**Remove all the digits from the number, and it is left with nothing which is 0.**</code>



**Constraints:**

- <code>1 <= k <= num.length <= 10<sup>5</sup></code>
- `num` consists of only digits.
- `num` does not have any leading zeros except for the zero itself.



**Solution:**

We can use a greedy approach with a stack. The goal is to build the smallest possible number by iteratively removing digits from the given number while maintaining the smallest possible sequence.

### Approach:
1. **Use a Stack:** Traverse through each digit of the number. Push digits onto a stack while ensuring that the digits in the stack form the smallest possible number.
2. **Pop from Stack:** If the current digit is smaller than the top of the stack, and we still have `k` digits to remove, pop the stack to remove the larger digits.
3. **Handle Remaining Digits:** If there are still digits to remove after processing all the digits in `num`, remove them from the end of the stack.
4. **Build the Result:** Construct the final number from the digits left in the stack. Ensure to strip any leading zeros.
5. **Edge Cases:** If the result is an empty string after all removals, return "0".


Let's implement this solution in PHP: **[402. Remove K Digits](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000402-remove-k-digits/solution.php)**

```php
<?php
/**
 * @param String $num
 * @param Integer $k
 * @return String
 */
function removeKdigits($num, $k) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
echo removeKdigits("1432219", 3); // Output: "1219"
echo removeKdigits("10200", 1);   // Output: "200"
echo removeKdigits("10", 2);      // Output: "0"
?>
```

### Explanation:

- **Stack-Based Greedy Approach:** We maintain a stack to store the digits of the smallest possible number. As we iterate through the digits in `num`, we compare the current digit with the top of the stack. If the current digit is smaller and we still have digits to remove (`k > 0`), we pop the stack to remove the larger digit.
- **Post-Processing:** After processing all digits, if we still need to remove more digits (`k > 0`), we pop from the stack until `k` becomes `0`.
- **Edge Cases:** We handle leading zeros by using `ltrim` to remove them. If the result is an empty string, we return "0".

### Time Complexity:
The time complexity of this solution is \(O(n)\), where `n` is the length of the input string `num`. This is because each digit is pushed and popped from the stack at most once.

This solution efficiently handles the constraints and provides the correct output for the given examples.


**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**