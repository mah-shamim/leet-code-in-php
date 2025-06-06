2434\. Using a Robot to Print the Lexicographically Smallest String

**Difficulty:** Medium

**Topics:** `Hash Table`, `String`, `Stack`, `Greedy`

You are given a string `s` and a robot that currently holds an empty string `t`. Apply one of the following operations until `s` and `t` **are both empty**:

- Remove the **first** character of a string `s` and give it to the robot. The robot will append this character to the string `t`.
- Remove the **last** character of a string `t` and give it to the robot. The robot will write this character on paper.

Return _the lexicographically smallest string that can be written on the paper_.

**Example 1:**

- **Input:** s = "zza"
- **Output:** "azz"
- **Explanation:** Let p denote the written string.
  Initially p="", s="zza", t="".
  Perform first operation three times p="", s="", t="zza".
  Perform second operation three times p="azz", s="", t="".

**Example 2:**

- **Input:** s = "bac"
- **Output:** "abc"
- **Explanation:** Let p denote the written string.
  Perform first operation twice p="", s="c", t="ba".
  Perform second operation twice p="ab", s="c", t="".
  Perform first operation p="ab", s="", t="c".
  Perform second operation p="abc", s="", t="".


**Example 3:**

- **Input:** s = "bdda"
- **Output:** "addb"
- **Explanation:** Let p denote the written string.
  Initially p="", s="bdda", t="".
  Perform first operation four times p="", s="", t="bdda".
  Perform second operation four times p="addb", s="", t="".



**Constraints:**

- <code>1 <= s.length <= 10<sup>5</sup></code>
- `s` consists of only English lowercase letters.


**Hint:**
1. If there are some character “a” ’ s in the string, they can be written on paper before anything else.
2. Every character in the string before the last “a” should be written in reversed order.
3. After the robot writes every “a” on paper, the same holds for other characters “b”, ”c”, …etc.



**Solution:**

We need to find the lexicographically smallest string that can be written on the paper by a robot using two operations: moving the first character of the string `s` to the robot's string `t` (stack), or moving the last character of `t` to the paper. The challenge is to determine the optimal sequence of operations that results in the smallest possible string.

### Approach
1. **Problem Analysis**: The robot can either push the first character of `s` onto a stack (`t`) or pop the top character from the stack to the result string (`p`). The goal is to arrange these operations such that the resulting string `p` is lexicographically smallest.
2. **Key Insight**: The lexicographically smallest string can be achieved by outputting the smallest available character as early as possible. To decide when to pop from the stack, we compare the top of the stack with the smallest remaining character in `s` (including the current position onwards). If the top of the stack is the smallest or smaller than any remaining character in `s`, it should be popped immediately.
3. **Algorithm Selection**:
    - **Precompute Minimums**: Compute an array `min_right` where `min_right[i]` stores the smallest character in the substring `s[i..n-1]`. This helps in efficiently determining the smallest remaining character during processing.
    - **Stack Simulation**: Iterate through each character in `s`, pushing it onto the stack. After each push, repeatedly pop characters from the stack if the top of the stack is less than or equal to the smallest remaining character in `s` (as determined by `min_right[i+1]`). This ensures that the smallest characters are output as early as possible.
4. **Complexity Analysis**:
    - **Time Complexity**: O(n), where n is the length of `s`. We traverse the string twice (once for computing `min_right` and once for processing characters) and each character is pushed and popped from the stack exactly once.
    - **Space Complexity**: O(n) for storing the `min_right` array and the stack.

Let's implement this solution in PHP: **[2434. Using a Robot to Print the Lexicographically Smallest String](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002434-using-a-robot-to-print-the-lexicographically-smallest-string/solution.php)**

```php
<?php
/**
 * @param String $s
 * @return String
 */
function robotWithString($s) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test Cases
echo robotWithString("zza") . "\n";  // Output: "azz"
echo robotWithString("bac") . "\n";  // Output: "abc"
echo robotWithString("bdda") . "\n"; // Output: "addb"
?>
```

### Explanation:

1. **Precompute Minimums**: The `min_right` array is filled from the end of the string to the start. Each entry `min_right[i]` holds the smallest character in the substring starting at index `i` to the end of the string. This allows O(1) access to the smallest remaining character during processing.
2. **Stack Processing**: As we iterate through each character in `s`, we push it onto the stack. After each push, we check if the top of the stack is less than or equal to the smallest character in the remaining part of `s` (using `min_right[i+1]`). If so, we pop the top of the stack and append it to the result string. This ensures that the smallest available characters are added to the result as early as possible.
3. **Result Construction**: The process continues until all characters are processed. The stack is emptied at the end by popping any remaining characters (since they are all larger than the sentinel value set in `min_right[n]`), ensuring the result string is lexicographically smallest.

This approach efficiently leverages preprocessing and stack operations to construct the desired result in linear time and space, meeting the problem constraints optimally.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**