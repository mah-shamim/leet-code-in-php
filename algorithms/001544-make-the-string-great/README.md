1544\. Make The String Great

**Difficulty:** Easy

**Topics:** `String`, `Stack`

Given a string `s` of lower and upper case English letters.

A good string is a string which doesn't have **two adjacent characters** `s[i]` and `s[i + 1]` where:

- `0 <= i <= s.length - 2`
- `s[i]` is a lower-case letter and `s[i + 1]` is the same letter but in upper-case or **vice-versa**.

To make the string good, you can choose **two adjacent** characters that make the string bad and remove them. You can keep doing this until the string becomes good.

Return _the string_ after making it good. The answer is guaranteed to be unique under the given constraints.

**Notice** that an empty string is also good.

**Example 1:**

- **Input:** `s = "leEeetcode"`
- **Output:** `"leetcode"`
- **Explanation:** `In the first step, either you choose i = 1 or i = 2, both will result "leEeetcode" to be reduced to "leetcode".` 

**Example 2:**

- **Input:** `"abBAcC"`
- **Output:** `""`
- **Explanation**: We have many possible scenarios, and all lead to the same answer. For example:
```
"abBAcC" --> "aAcC" --> "cC" --> ""
"abBAcC" --> "abBA" --> "aA" --> ""
```


**Example 3:**

- **Input:** `s = "s"`
- **Output:** `"s"`

**Constraints:**

*   <code>1 <= s.length <= 100</code>
*   `s` contains only lower and upper case English letters.


**Hint:**
1. The order you choose 2 characters to remove doesn't matter.
2. Keep applying the mentioned step to s till the length of the string is not changed.



**Solution:**

The problem asks us to make a given string "good" by removing adjacent characters that form a "bad pair." A "bad pair" is defined as two adjacent characters where one is the uppercase version of the other (or vice versa). The goal is to repeatedly remove these bad pairs until no more exist in the string.

### Key Points:

- The string consists of lowercase and uppercase English letters.
- A "bad pair" occurs when a character is the lowercase version of the next character, or the next character is the uppercase version of the previous character.
- We must return the string after removing all bad pairs.
- The solution should be efficient given the constraints (1 <= s.length <= 100).

### Approach:

1. **Stack-based solution**: A stack is ideal for this problem because:
    - It allows us to efficiently check the current character against the top character.
    - If a bad pair is found, we pop the stack, simulating the removal of the pair.
    - If no bad pair is found, we push the character onto the stack.

2. **Bad Pair Check**: The key check is whether the current character is a bad pair with the character at the top of the stack. This can be checked using the condition:
    - `a != b && strtolower(a) == strtolower(b)`, where `a` is the character at the top of the stack and `b` is the current character.

3. **Continue until no more bad pairs exist**: Keep processing characters until no more bad pairs can be removed.

### Plan:

1. Initialize an empty stack.
2. Loop through the string and for each character:
    - If the stack is non-empty and the character forms a bad pair with the top of the stack, pop the stack.
    - Otherwise, push the character onto the stack.
3. After processing all characters, the stack will contain the final "good" string. Convert the stack into a string and return it.

Let's implement this solution in PHP: **[1544. Make The String Great](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001544-make-the-string-great/solution.php)**

```php
<?php
/**
 * @param String $s
 * @return String
 */
function makeGood(string $s): string
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $a
 * @param $b
 * @return bool
 */
private function isBadPair($a, $b): bool
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
$s1 = "leEeetcode";
$s2 = "abBAcC";
$s3 = "s";

echo makeGood($s1) . "\n"; // Output: "leetcode"
echo makeGood($s2) . "\n"; // Output: ""
echo makeGood($s3) . "\n"; // Output: "s"
?>
```

### Explanation:

1. **Stack Initialization**: Start with an empty stack.
2. **Iterate over the string**: For each character, check if it forms a bad pair with the character at the top of the stack.
3. **Bad Pair Check**: If a bad pair is found, remove the last character from the stack (i.e., simulate removal of the pair).
4. **Final Result**: After processing the string, the stack contains the good string, which is returned as the final result.

### Example Walkthrough:

#### Example 1:
**Input**: `"leEeetcode"`

- Initial stack: `[]`
- Process `'l'`: Stack becomes `['l']`.
- Process `'e'`: Stack becomes `['l', 'e']`.
- Process `'E'`: Forms a bad pair with `'e'`. Pop `'e'`. Stack becomes `['l']`.
- Process `'e'`: Stack becomes `['l', 'e']`.
- Process `'t'`: Stack becomes `['l', 'e', 't']`.
- Process `'c'`: Stack becomes `['l', 'e', 't', 'c']`.
- Process `'o'`: Stack becomes `['l', 'e', 't', 'c', 'o']`.
- Process `'d'`: Stack becomes `['l', 'e', 't', 'c', 'o', 'd']`.
- Process `'e'`: Stack becomes `['l', 'e', 't', 'c', 'o', 'd', 'e']`.

**Final output**: `"leetcode"`

#### Example 2:
**Input**: `"abBAcC"`

- Initial stack: `[]`
- Process `'a'`: Stack becomes `['a']`.
- Process `'b'`: Stack becomes `['a', 'b']`.
- Process `'B'`: Forms a bad pair with `'b'`. Pop `'b'`. Stack becomes `['a']`.
- Process `'A'`: Forms a bad pair with `'a'`. Pop `'a'`. Stack becomes `[]`.
- Process `'c'`: Stack becomes `['c']`.
- Process `'C'`: Forms a bad pair with `'c'`. Pop `'c'`. Stack becomes `[]`.

**Final output**: `""`

#### Example 3:
**Input**: `"s"`

- Initial stack: `[]`
- Process `'s'`: Stack becomes `['s']`.

**Final output**: `"s"`

### Time Complexity:

- **Time complexity**: O(n), where `n` is the length of the string.
    - We traverse the string once, and for each character, we either push it to the stack or pop from it. Both operations are O(1).

- **Space complexity**: O(n), where `n` is the length of the string. The stack can store at most `n` characters in the worst case.

### Output for Examples:

1. **Input**: `"leEeetcode"`
    - **Output**: `"leetcode"`

2. **Input**: `"abBAcC"`
    - **Output**: `""`

3. **Input**: `"s"`
    - **Output**: `"s"`


This problem can be efficiently solved using a stack-based approach. The stack ensures that we can check and remove bad pairs in O(1) time, making the overall solution run in linear time. By applying the above approach, we ensure that the string becomes "good" after processing all characters, providing the correct output for all given cases.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**


#283, #284 leetcode problems 001544-make-the-string-great submissions 1235154388