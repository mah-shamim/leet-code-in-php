1249\. Minimum Remove to Make Valid Parentheses

**Difficulty:** Medium

**Topics:** `String`, `Stack`

Given a string s of `'('` , `')'` and lowercase English characters.

Your task is to remove the minimum number of parentheses ( `'('` or `')'`, in any positions ) so that the resulting parentheses string is valid and return **any** valid string.

Formally, a <i>parentheses string</i> is valid if and only if:

* It is the empty string, contains only lowercase characters, or
* It can be written as `AB` (`A` concatenated with `B`), where `A` and `B` are valid strings, or
* It can be written as `(A)`, where `A` is a valid string.



**Example 1:**

- **Input:** s = "lee(t(c)o)de)"
- **Output:** "lee(t(c)o)de"
- **Explanation:** "lee(t(co)de)" , "lee(t(c)ode)" would also be accepted.

**Example 2:**

- **Input:** s = "a)b(c)d"
- **Output:** "ab(c)d"

**Example 3:**

- **Input:** s = "))(("
- **Output:** ""
- **Explanation:** An empty string is also valid.



**Constraints:**

* <code>1 <= s.length <= 10<sup>5</sup></code>
* `s[i]` is either`'('` , `')'`, or lowercase English letter`.`


**Hint:**
1. Each prefix of a balanced parentheses has a number of open parentheses greater or equal than closed parentheses, similar idea with each suffix.
2. Check the array from left to right, remove characters that do not meet the property mentioned above, same idea in backward way.



**Solution:**

The task is to remove the minimum number of parentheses from a given string to make it a valid parentheses string. A valid parentheses string is defined as:
- It is empty or contains only lowercase letters.
- It can be written as `AB`, where `A` and `B` are valid parentheses strings.
- It can be written as `(A)`, where `A` is a valid parentheses string.

### Key Points
1. **Valid Parentheses String**: The number of opening and closing parentheses must match. Each opening parenthesis `(` must have a corresponding closing parenthesis `)` in a valid order.
2. **Strategy**: We need to remove the invalid parentheses while keeping the valid characters (both letters and valid parentheses) in the resulting string.
3. **Two-pass Approach**: The solution involves two passes through the string:
    - **First pass**: Remove invalid closing parentheses `)` that don't have a matching opening parenthesis `(`.
    - **Second pass**: Remove invalid opening parentheses `(` that don't have a matching closing parenthesis `)`.

### Approach

1. **First Pass**: Iterate over the string from left to right. Use a counter (`openCount`) to keep track of the balance between opening and closing parentheses.
    - If we encounter a `)` and the counter `openCount` is zero, it means there is no preceding `(` to balance it, so skip this `)`.
    - For each `(`, increase the counter, and for each valid `)`, decrease the counter.
    - Save all valid characters in a temporary stack.

2. **Second Pass**: After the first pass, iterate over the temporary stack in reverse. Use a counter to track the number of `)` characters.
    - If we encounter an `(` and the counter for `)` is zero, it means there is no closing parenthesis to balance it, so skip this `(`.
    - Save all valid characters in the final result list.

3. **Return the Result**: The result list will be in reverse order, so reverse it back and return as a string.

### Plan
1. **Step 1**: Traverse the string from left to right to filter out unnecessary closing parentheses.
2. **Step 2**: Traverse the filtered string from right to left to filter out unnecessary opening parentheses.
3. **Step 3**: Reverse the final list of valid characters and join them into a string.

Let's implement this solution in PHP: **[1249. Minimum Remove to Make Valid Parentheses](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001249-minimum-remove-to-make-valid-parentheses/solution.php)**

```php
<?php
/**
 * @param String $s
 * @return String
 */
function minRemoveToMakeValid(string $s): string
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
$s1 = "lee(t(c)o)de)";
$s2 = "a)b(c)d";
$s3 = "))((";

echo minRemoveToMakeValid($s1) . "\n"; // Output: "lee(t(c)o)de"
echo minRemoveToMakeValid($s2) . "\n"; // Output: "ab(c)d"
echo minRemoveToMakeValid($s3) . "\n"; // Output: ""
?>
```

### Explanation:

The algorithm uses two passes to ensure that only valid parentheses are kept:
- **First pass** ensures that we remove invalid closing parentheses `)` which don’t have matching opening parentheses `(`.
- **Second pass** ensures that we remove invalid opening parentheses `(` which don’t have matching closing parentheses `)`.

Each pass modifies the string based on the matching parentheses, making sure the final string is valid.

### Example Walkthrough

**Example 1**:
```text
Input: "lee(t(c)o)de)"
First pass (remove invalid closing parentheses):
Result after first pass: "lee(t(c)o)de"
Second pass (remove invalid opening parentheses):
Final result: "lee(t(c)o)de"
```

**Example 2**:
```text
Input: "a)b(c)d"
First pass (remove invalid closing parentheses):
Result after first pass: "ab(c)d"
Second pass (no change needed as all parentheses are valid):
Final result: "ab(c)d"
```

**Example 3**:
```text
Input: "))(("
First pass (remove invalid closing parentheses):
Result after first pass: ""
Second pass (no change needed as there are no valid parentheses):
Final result: ""
```

### Time Complexity

- **Time Complexity**: O(n), where n is the length of the input string.
    - We traverse the string twice, each traversal taking O(n) time.
- **Space Complexity**: O(n), where n is the length of the input string.
    - We use a temporary stack to store intermediate results, which could store up to the length of the input.

This approach ensures that we can efficiently remove invalid parentheses in a two-pass solution. By using a stack and maintaining a balance between opening and closing parentheses, we can guarantee a valid output string with minimal removals. The solution is both time-efficient and space-efficient, handling large input sizes within the problem's constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
