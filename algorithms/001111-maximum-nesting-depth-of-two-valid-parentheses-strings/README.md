1111\. Maximum Nesting Depth of Two Valid Parentheses Strings

**Difficulty:** Medium

**Topics:** `Senior Staff`, `String`, `Stack`, `Bracket Sequences`, `Weekly Contest 144`

A string is a _valid parentheses string_ (denoted VPS) if and only if it consists of `"("` and `")"` characters only, and:

- It is the empty string, or
- It can be written as `AB` (`A` concatenated with `B`), where `A` and `B` are VPS's, or
- It can be written as `(A)`, where `A` is a VPS.

We can similarly define the _nesting depth_ `depth(S)` of any VPS `S` as follows:

- `depth("") = 0`
- `depth(A + B) = max(depth(A), depth(B))`, where `A` and `B` are VPS's
- `depth("(" + A + ")") = 1 + depth(A)`, where `A` is a VPS.

For example, `""`, `"()()"`, and `"()(()())"` are VPS's (with nesting depths 0, 1, and 2), and `")("` and `"(()"` are not VPS's.

Given a VPS seq, split it into two disjoint subsequences `A` and `B`, such that `A` and `B` are VPS's (and `A.length + B.length = seq.length`). The subsequences may not necessarily be contiguous.

For example, for the sequence `123456789`, one possible split is:

- `A = {1, 3, 5, 7, 9}`,
- `B = {2, 4, 6, 8}`.

This corresponds to the output `[0, 1, 0, 1, 0, 1, 0, 1, 0]`  where 0 indicates membership in `A` and 1 indicates membership in `B`.

Now choose **any** such `A` and `B` such that `max(depth(A), depth(B))` is the minimum possible value.

Return an `answer` array (of length `seq.length`) that encodes such a choice of `A` and `B`:  `answer[i] = 0` if `seq[i]` is part of `A`, else `answer[i] = 1`.  Note that even though multiple answers may exist, you may return any of them.

**Example 1:**

- **Input:** seq = "(()())"
- **Output:** [0,1,1,1,1,0]

**Example 2:**

- **Input:** seq = "()(())()"
- **Output:** [0,0,0,1,1,0,1,1]

**Example 3:**

- **Input:** seq = "()"
- **Output:** [0,0]

**Example 4:**

- **Input:** seq = "(())"
- **Output:** [0,1,1,0]

**Example 5:**

- **Input:** seq = "((()))"
- **Output:** [0,1,0,0,1,0]

**Example 6:**

- **Input:** seq = "(((())))"
- **Output:** [0,1,0,1,1,0,1,0]

**Constraints:**

- `1 <= seq.size <= 10000`


**Similar Questions:**

1. [1614. Maximum Nesting Depth of the Parentheses](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001614-maximum-nesting-depth-of-the-parentheses)


**Solution:**

We split the valid parentheses string by scanning left to right and tracking the current nesting depth. Each matched pair is assigned to `A` or `B` based on the parity of its depth, so nested levels alternate between the two subsequences. This keeps both `A` and `B` valid and minimizes `max(depth(A), depth(B))`.

## Approach

- Initialize `depth = 0` and `ans = []`.
- Traverse each character in `seq`.
- If the character is `'('`:
    - Assign `ans[i] = depth % 2`.
    - Increment `depth`.
- If the character is `')'`:
    - Decrement `depth` first.
    - Assign `ans[i] = depth % 2`.
- Return `ans`, where `0` means part of `A` and `1` means part of `B`.

Let's implement this solution in PHP: **[1111. Maximum Nesting Depth of Two Valid Parentheses Strings](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001111-maximum-nesting-depth-of-two-valid-parentheses-strings/solution.php)**

```php
<?php
/**
 * @param String $seq
 * @return Integer[]
 */
function maxDepthAfterSplit(string $seq): array
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo maxDepthAfterSplit("(()())") .  "\n";          // Output: [0,1,1,1,1,0]
echo maxDepthAfterSplit("()(())()") .  "\n";        // Output: [0,0,0,1,1,0,1,1]
echo maxDepthAfterSplit("()") .  "\n";              // Output: [0,0]
echo maxDepthAfterSplit("(())") .  "\n";            // Output: [0,1,1,0]
echo maxDepthAfterSplit("((()))") .  "\n";          // Output: [0,1,0,0,1,0]
echo maxDepthAfterSplit("(((())))") .  "\n";        // Output: [0,1,0,1,1,0,1,0]
?>
```

### Explanation:

- The current `depth` before reading `'('` represents the nesting level of the pair being opened.
- For `')'`, decrementing first gives the same nesting level as its matching `'('`.
- Therefore, both characters of a matched pair receive the same parity and go to the same subsequence.
- Alternating by parity divides each nested chain between `A` and `B`.
- This guarantees both subsequences are valid parentheses strings.
- The maximum depth of each subsequence is at most half of the original maximum depth, which is optimal.
- Multiple valid answers may exist; this parity-based assignment returns one optimal answer.

## Complexity Analysis

- Time Complexity: `O(n)`, where `n = strlen(seq)`.
- Space Complexity: `O(n)` for the output array.
- Auxiliary Space: `O(1)` excluding the output array.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**