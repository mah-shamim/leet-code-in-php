301\. Remove Invalid Parentheses

**Difficulty:** Hard

**Topics:** `String`, `Backtracking`, `Breadth-First Search`

Given a string `s` that contains parentheses and letters, remove the minimum number of invalid parentheses to make the input string valid.

Return _a list of **unique strings** that are valid with the minimum number of removals_. You may return the answer in **any order**.

**Example 1:**

- **Input:** s = "()())()"
- **Output:** ["(())()","()()()"]

**Example 2:**

- **Input:** s = "(a)())()"
- **Output:** ["(a())()","(a)()()"]

**Example 3:**

- **Input:** s = ")( "
- **Output:** [""]

**Example 4:**

- **Input:** s = "() "
- **Output:** ["()"]

**Example 5:**

- **Input:** s = "("
- **Output:** [""]

**Example 6:**

- **Input:** s = ")"
- **Output:** [""]

**Example 7:**

- **Input:** s = "a"
- **Output:** ["a"]

**Example 8:**

- **Input:** s = "((("
- **Output:** [""]

**Example 9:**

- **Input:** s = ")))"
- **Output:** [""]

**Example 10:**

- **Input:** s = "()()"
- **Output:** ["()()"]

**Example 11:**

- **Input:** s = "(()"
- **Output:** ["()"]

**Example 12:**

- **Input:** s = "())"
- **Output:** ["()"]

**Example 13:**

- **Input:** s = "((())"
- **Output:** ["((()))"]

**Constraints:**

- `1 <= s.length <= 25`
- `s` consists of lowercase English letters and parentheses `'('` and `')'`.
- There will be at most `20` parentheses in `s`.


**Hint:**

1. Since we do not know which brackets can be removed, we try all the options! We can use recursion.
2. In the recursion, for each bracket, we can either use it or remove it.
3. Recursion will generate all the valid parentheses strings but we want the ones with the least number of parentheses deleted.
4. We can count the number of invalid brackets to be deleted and only generate the valid strings in the recusrion.


**Similar Questions:**
1. [20. Valid Parentheses](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000020-valid-parentheses)
2. [1963. Minimum Number of Swaps to Make the String Balanced](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001963-minimum-number-of-swaps-to-make-the-string-balanced)


**Solution:**

We count the minimum number of unmatched `(` and `)` that must be removed in one scan, then use DFS/backtracking to build every valid string that removes exactly that many parentheses. Results are stored in an associative array so duplicate valid strings are automatically removed.

## Approach

- First pass over `s`:
    - Increment `balance` for `'('`.
    - For `')'`, if `balance > 0`, match it and decrement `balance`; otherwise count it as `rightRem`.
- After the scan, `leftRem = balance`, representing unmatched `'('`.
- Minimum removals are exactly `leftRem + rightRem`.
- DFS from index `0` with state:
    - current index
    - remaining removable `'('`
    - remaining removable `')'`
    - current balance
    - current built string
    - result map
- At each character:
    - `'('`: either remove it if `leftRem > 0`, or keep it and increase balance.
    - `')'`: either remove it if `rightRem > 0`, or keep it only if `balance > 0`.
    - letter: always keep it.
- Accept a path when the end is reached, no removals remain, and balance is `0`.
- Use `$result[$path] = true` and return `array_keys($result)` for uniqueness.

Let's implement this solution in PHP: **[301. Remove Invalid Parentheses](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000301-remove-invalid-parentheses/solution.php)**

```php
<?php
/**
 * @param String $s
 * @return String[]
 */
function removeInvalidParentheses(string $s): array
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * @param $s
 * @param $n
 * @param $i
 * @param $leftRem
 * @param $rightRem
 * @param $balance
 * @param $path
 * @param $result
 * @return void
 */
function dfs($s, $n, $i, $leftRem, $rightRem, $balance, $path, &$result): void
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo implode(", ", removeInvalidParentheses("()())()")) .  "\n";        // Output: ["(())()","()()()"]
echo implode(", ", removeInvalidParentheses("(a)())()")) .  "\n";       // Output: ["(a())()","(a)()()"]
echo implode(", ", removeInvalidParentheses(")(")) .  "\n";             // Output: [""]
echo implode(", ", removeInvalidParentheses("()")) .  "\n";             // Output: ["()"]
echo implode(", ", removeInvalidParentheses("(")) .  "\n";              // Output: [""]
echo implode(", ", removeInvalidParentheses(")")) .  "\n";              // Output: [""]
echo implode(", ", removeInvalidParentheses("a")) .  "\n";              // Output: ["a"]
echo implode(", ", removeInvalidParentheses("(((")) .  "\n";            // Output: [""]
echo implode(", ", removeInvalidParentheses(")))")) .  "\n";            // Output: [""]
echo implode(", ", removeInvalidParentheses("()()")) .  "\n";           // Output: ["()()"]
echo implode(", ", removeInvalidParentheses("(()")) .  "\n";            // Output: ["()"]
echo implode(", ", removeInvalidParentheses("())")) .  "\n";            // Output: ["()"]
echo implode(", ", removeInvalidParentheses("((())")) .  "\n";          // Output: ["((()))"]
?>
```

### Explanation:

- The first pass finds the minimum deletions because unmatched `')'` cannot be fixed without removing them, and unmatched `'('` remain at the end.
- DFS explores only two choices for parentheses: keep or remove.
- Keeping `')'` is allowed only when there is an unmatched `'('` available, preventing invalid prefixes.
- The recursion enforces exactly the minimum removals by tracking `leftRem` and `rightRem`.
- The final `balance === 0` check guarantees the generated string is fully valid.
- Storing paths as keys deduplicates identical valid strings.

## Complexity Analysis

Let `n` be the length of `s` and `p` be the number of parentheses.

- Counting pass: `O(n)`.
- DFS: at most `O(2^p)` recursive branches.
- String concatenation may cost up to `O(n)` per branch, so worst-case time is `O(n * 2^p)`.
- Space: `O(p)` recursion depth plus `O(n * R)` for output, where `R` is the number of unique valid results.
- Since `p <= 20`, this is acceptable.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**