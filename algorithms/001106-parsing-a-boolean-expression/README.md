1106\. Parsing A Boolean Expression

**Difficulty:** Hard

**Topics:** `String`, `Stack`, `Recursion`

A **boolean expression** is an expression that evaluates to either `true` or `false`. It can be in one of the following shapes:

- `'t'` that evaluates to `true`.
- `'f'` that evaluates to `false`.
- `'!(subExpr)'` that evaluates to **the logical NOT** of the inner expression `subExpr`.
- <code>'&(subExpr<sub>1</sub>, subExpr<sub>2</sub>, ..., subExpr<sub>n</sub>)'</code> that evaluates to **the logical AND** of the inner expressions <code>subExpr<sub>1</sub>, subExpr<sub>2</sub>, ..., subExpr<sub>n</sub></code> where `n >= 1`.
- <code>'|(subExpr<sub>1</sub>, subExpr<sub>2</sub>, ..., subExpr<sub>n</sub>)'</code> that evaluates to **the logical OR** of the inner expressions <code>subExpr<sub>1</sub>, subExpr<sub>2</sub>, ..., subExpr<sub>n</sub></code> where `n >= 1`.

Given a string `expression` that represents a **boolean expression**, return _the evaluation of that expression_.

It is **guaranteed** that the given expression is valid and follows the given rules.

**Example 1:**

- **Input:** expression = "&(|(f))"
- **Output:** false
- **Explanation:**\
  First, evaluate |(f) --> f. The expression is now "&(f)".\
  Then, evaluate &(f) --> f. The expression is now "f".\
  Finally, return false.

**Example 2:**

- **Input:** expression = "|(f,f,f,t)"
- **Output:** true
- **Explanation:** The evaluation of (false OR false OR false OR true) is true.


**Example 3:**

- **Input:** expression = "!(&(f,t))"
- **Output:** true
- **Explanation:**\
  First, evaluate &(f,t) --> (false AND true) --> false --> f. The expression is now "!(f)".\
  Then, evaluate !(f) --> NOT false --> true. We return true.



**Constraints:**

- <code>1 <= expression.length <= 2 * 10<sup>4</sup></code>
- expression[i] is one following characters: `'('`, `')'`, `'&'`, `'|'`, `'!'`, `'t'`, `'f'`, and `','`.


**Hint:**
1. Write a function "parse" which calls helper functions "parse_or", "parse_and", "parse_not".



**Solution:**

We will break down the solution into smaller functions that handle parsing and evaluating different types of expressions: `parse_or`, `parse_and`, `parse_not`, and a main `parse` function that handles the parsing of the expression recursively. We will use a stack to keep track of nested expressions and evaluate them step-by-step.

### Approach:

1. **Parsing and Recursion**:
   - Use a stack to keep track of expressions when encountering nested parentheses.
   - Process characters sequentially and manage the stack for nested evaluations.
   - When encountering a closing parenthesis `)`, extract the last set of expressions and apply the logical operation (`&`, `|`, or `!`).

2. **Helper Functions**:
   - `parse_or`: Evaluates `|(expr1, expr2, ..., exprN)` by returning `true` if at least one sub-expression is `true`.
   - `parse_and`: Evaluates `&(expr1, expr2, ..., exprN)` by returning `true` only if all sub-expressions are `true`.
   - `parse_not`: Evaluates `!(expr)` by returning the opposite of the sub-expression.

3. **Expression Handling**:
   - Single characters like `t` and `f` directly translate to `true` and `false`.
   - When an operation is encountered (`&`, `|`, `!`), the inner expressions are evaluated based on their respective rules.

Let's implement this solution in PHP: **[1106. Parsing A Boolean Expression](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001106-parsing-a-boolean-expression/solution.php)**

```php
<?php
/**
 * @param String $expression
 * @return Boolean
 */
function parseBooleanExpression($expression) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * the logical AND
 * 
 * @param $subExpr
 * @return bool
 */
function parse_and($subExpr) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * the logical OR
 * 
 * @param $subExpr
 * @return bool
 */
function parse_or($subExpr) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}
/**
 * the logical NOT
 * 
 * @param $subExpr
 * @return bool
 */
function parse_not($subExpr) {
    // subExpr contains only one element for NOT operation
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo parseBooleanExpression("&(|(f))") ? "true" : "false"; // Output: false
echo "\n";
echo parseBooleanExpression("|(f,f,f,t)") ? "true" : "false"; // Output: true
echo "\n";
echo parseBooleanExpression("!(&(f,t))") ? "true" : "false"; // Output: true
?>
```

### Explanation:

- **Main Function (`parseBooleanExpression`)**:
   - Iterates through the expression and pushes characters to a stack.
   - When encountering a `)`, it collects all the elements inside the parentheses and evaluates them based on the operation (`&`, `|`, `!`).
   - Converts results to `'t'` (true) or `'f'` (false) and pushes them back to the stack.

- **Helper Functions**:
   - `parse_and`: Returns `true` if all sub-expressions are `'t'` (true).
   - `parse_or`: Returns `true` if any sub-expression is `'t'`.
   - `parse_not`: Reverses the boolean value of a single sub-expression.

### Example Walkthrough:

1. Input: `"&(|(f))"`
   - Stack processing:
      - `&`, `(`, `|`, `(`, `f`, `)`, `)` → The inner expression `|(f)` is evaluated to `f`.
      - Resulting in `&(f)`, which evaluates to `f`.
   - Output: `false`.

2. Input: `"|(f,f,f,t)"`
   - Evaluates the `|` operation:
      - Finds one `'t'`, thus evaluates to `true`.
   - Output: `true`.

3. Input: `"!(&(f,t))"`
   - Stack processing:
      - `!`, `(`, `&`, `(`, `f`, `,`, `t`, `)`, `)` → `&(f,t)` evaluates to `f`.
      - `!(f)` is then evaluated to `true`.
   - Output: `true`.

### Complexity:

- **Time Complexity**: O(N), where N is the length of the expression. Each character is processed a limited number of times.
- **Space Complexity**: O(N), due to the stack used to keep track of nested expressions.

This solution is well-suited for the constraints and should handle the input size effectively.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
