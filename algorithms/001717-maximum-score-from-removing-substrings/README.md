1717\. Maximum Score From Removing Substrings

Medium

You are given a string `s` and two integers `x` and `y`. You can perform two types of operations any number of times.

- Remove substring `"ab"` and gain `x` points.
    - For example, when removing `"ab"` from `"cabxbae"` it becomes `"cxbae"`.
- Remove substring `"ba"` and gain `y` points.
    - For example, when removing `"ba"` from `"cabxbae"` it becomes `"cabxe"`.

Return _the maximum points you can gain after applying the above operations on `s`_.

**Example 1:**

- **Input:** s = "cdbcbbaaabab", x = 4, y = 5
- **Output:** 19
- **Explanation:**
  - Remove the "ba" underlined in "cdbcbbaaabab". Now, s = "cdbcbbaaab" and 5 points are added to the score.
  - Remove the "ab" underlined in "cdbcbbaaab". Now, s = "cdbcbbaa" and 4 points are added to the score.
  - Remove the "ba" underlined in "cdbcbbaa". Now, s = "cdbcba" and 5 points are added to the score.
  - Remove the "ba" underlined in "cdbcba". Now, s = "cdbc" and 5 points are added to the score.\
    Total score = 5 + 4 + 5 + 5 = 19.

**Example 2:**

- **Input:** s = "aabbaaxybbaabb", x = 5, y = 4
- **Output:** 20

**Constraints:**

- <code>1 <= s.length <= 10<sup>5</sup></code>
- <code>1 <= x, y <= 10<sup>4</sup></code>
- s consists of lowercase English letters.


**Hint:**
1. Note that it is always more optimal to take one type of substring before another
2. You can use a stack to handle erasures

**Solution:**


Here's the step-by-step implementation in PHP:

1. **Determine the order of removal**: It is crucial to decide the order of removing "ab" and "ba". If `x > y`, it is better to remove "ab" first, otherwise, remove "ba" first. This is because removing the more valuable substring first maximizes the score.

2. **Use a stack to process the string**: By using a stack, you can efficiently manage the removals. You push characters onto the stack and check the top of the stack to see if you can remove the desired substring.

Here's the implementation in PHP: **[1717. Maximum Score From Removing Substrings](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001717-maximum-score-from-removing-substrings/solution.php)**

```php
<?php
// Example usage
$s = "cdbcbbaaabab";
$x = 4;
$y = 5;
echo maximumGain($s, $x, $y);  // Output: 19

$s = "aabbaaxybbaabb";
$x = 5;
$y = 4;
echo maximumGain($s, $x, $y);  // Output: 20

?>
```

### Explanation:
1. **Initial Check**: If `x` is less than `y`, we swap the values of `x` and `y`, and replace `a` with `b` and vice versa in the string to always prioritize the higher value removal.

2. **Stack Processing**: The `calculatePoints` function uses a stack to keep track of characters. When the top of the stack forms the substring to be removed (either "ab" or "ba"), it pops the top element, adds the points, and continues processing the rest of the string.

3. **Remove Substrings in Order**: First, the higher value substring ("ab" if `x >= y`) is removed, then the remaining string is processed to remove the lower value substring ("ba").

This ensures that you get the maximum possible score by prioritizing the removal of higher-value substrings first.


**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
