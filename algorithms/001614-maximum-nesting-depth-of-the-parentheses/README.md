1614\. Maximum Nesting Depth of the Parentheses

**Difficulty:** Easy

**Topics:** `String`, `Stack`, `Weekly Contest 210`

A string is a **valid parentheses string** (denoted **VPS**) if it meets one of the following:

- It is an empty string `""`, or a single character not equal to `"("` or `")"`,
- It can be written as `AB` (`A` concatenated with `B`), where `A` and `B` are **VPS**'s, or
- It can be written as `(A)`, where `A` is a **VPS**.

We can similarly define the **nesting depth** `depth(S)` of any VPS `S` as follows:

- `depth("") = 0`
- `depth(C) = 0`, where `C` is a string with a single character not equal to `"("` or `")"`.
- `depth(A + B) = max(depth(A), depth(B))`, where `A` and `B` are **VPS**'s.
- `depth("(" + A + ")") = 1 + depth(A)`, where `A` is a **VPS**.

For example, `""`, `"()()"`, and `"()(()())"` are **VPS**'s (with nesting depths 0, 1, and 2), and `")("` and `"(()"` are not **VPS**'s.

~~Given a **VPS** represented as string `s`, return the <code><i>nesting depth</i></code> of `s`.~~
Given a **valid parentheses string** `s`, return the **nesting depth** of `s`. The nesting depth is the **maximum** number of nested parentheses.




**Example 1:**

- **Input:** <code>**s = "(1+(2*3)+((8)/4))+1"**</code>
- **Output:** <code>**3**</code>
- **Explanation:** <code>**Digit `8` is inside of `3` nested parentheses in the string.**</code>

**Example 2:**

- **Input:** <code>**s = "(1)+((2))+(((3)))"**</code>
- **Output:** <code>**3**</code>



**Constraints:**

- `1 <= s.length <= 100`
- `s` consists of digits `0-9` and characters `'+'`, `'-'`, `'*'`, `'/'`, `'('`, and `')'`.
- It is guaranteed that parentheses expression `s` is a **VPS**.


**Hint:**
1. The depth of any character in the VPS is the ( number of left brackets before it ) - ( number of right brackets before it )



**Similar Questions:**
1. [1111. Maximum Nesting Depth of Two Valid Parentheses Strings](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001111-maximum-nesting-depth-of-two-valid-parentheses-strings)






**Solution:**

We need to determine the maximum nesting depth of parentheses in a given valid parentheses string (VPS). The nesting depth is defined as the maximum number of nested parentheses at any point in the string.

### Approach
1. **Problem Analysis**: The input string is a VPS, meaning the parentheses are correctly matched and nested. The string can also contain digits and arithmetic operators, which do not affect the nesting depth.
2. **Intuition**: As we traverse the string, we keep track of the current nesting depth by incrementing a counter each time we encounter an opening parenthesis '(' and decrementing it when we encounter a closing parenthesis ')'. The maximum value of this counter during the traversal gives us the maximum nesting depth.
3. **Algorithm Selection**: We iterate through each character in the string. For each character:
    - If it is '(', we increment the current depth and update the maximum depth if the current depth exceeds the previously recorded maximum.
    - If it is ')', we decrement the current depth.
    - All other characters are ignored as they do not affect the nesting depth.
4. **Complexity Analysis**: The algorithm runs in O(n) time, where n is the length of the string, as we process each character exactly once. The space complexity is O(1) since we only use a few extra variables.

Let's implement this solution in PHP: **[1614. Maximum Nesting Depth of the Parentheses](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001614-maximum-nesting-depth-of-the-parentheses/solution.php)**

```php
<?php
/**
 * @param String $s
 * @return Integer
 */
function maxDepth($s) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo maxDepth("(1+(2*3)+((8)/4))+1") . "\n"; // Output: 3
echo maxDepth("(1)+((2))+(((3)))") . "\n";   // Output: 3
?>
```

### Explanation:

- **Initialization**: We start with `maxDepth` and `currentDepth` both set to 0.
- **Traversal**: For each character in the string:
    - **Opening Parenthesis '('**: When encountered, we increment `currentDepth` and check if it exceeds `maxDepth`. If so, we update `maxDepth`.
    - **Closing Parenthesis ')'**: When encountered, we decrement `currentDepth` to indicate that we are exiting a nested level.
    - **Other Characters**: These are ignored as they do not affect the nesting depth.
- **Result**: After processing all characters, `maxDepth` holds the maximum nesting depth encountered, which we return as the result.

This approach efficiently tracks the nesting depth in real-time as we traverse the string, ensuring optimal performance with minimal space usage. The solution leverages the properties of a valid parentheses string to simplify the depth calculation.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**