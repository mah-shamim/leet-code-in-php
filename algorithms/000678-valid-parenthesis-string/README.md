678\. Valid Parenthesis String

Medium

Given a string `s` containing only three types of characters: `'('`, `')'` and `'*'`, return `true` if `s` is **valid**.

The following rules define a **valid** string:

* Any left parenthesis `'('` must have a corresponding right parenthesis `')'`.
* Any right parenthesis `')'` must have a corresponding left parenthesis `'('`.
* Left parenthesis `'('` must go before the corresponding right parenthesis `')'`.
* '*' could be treated as a single right parenthesis `')'` or a single left parenthesis `'('` or an empty string `""`.

**Example 1:**

**Input:** <code>**s = "()"**</code>
**Output:** <code>**true**</code>

**Example 2:**

**Input:** <code>**s = "(*)"**</code>
**Output:** <code>**true**</code>

**Example 3:**

**Input:** <code>**s = "(*))"**</code>
**Output:** <code>**true**</code>

**Constraints:**

* `1 <= s.length <= 100`
* `s[i]` is `'(', ')'` or `'*'`.
