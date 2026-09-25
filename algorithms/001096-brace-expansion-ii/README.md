1096\. Brace Expansion II

**Difficulty:** Hard

**Topics:** `Principal`, `Hash Table`, `String`, `Backtracking`, `Stack`, `Breadth-First Search`, `Sorting`, `Weekly Contest 142`

Under the grammar given below, strings can represent a set of lowercase words. Let `R(expr)` denote the set of words the expression represents.

The grammar can best be understood through simple examples:

- Single letters represent a singleton set containing that word.
    - `R("a") = {"a"}`
    - `R("w") = {"w"}`
- When we take a comma-delimited list of two or more expressions, we take the union of possibilities.
    - `R("{a,b,c}") = {"a","b","c"}`
    - `R("{{a,b},{b,c}}") = {"a","b","c"}` (notice the final set only contains each word at most once)
- When we concatenate two expressions, we take the set of possible concatenations between two words where the first word comes from the first expression and the second word comes from the second expression.
    - `R("{a,b}{c,d}") = {"ac","ad","bc","bd"}`
    - `R("a{b,c}{d,e}f{g,h}") = {"abdfg", "abdfh", "abefg", "abefh", "acdfg", "acdfh", "acefg", "acefh"}`

Formally, the three rules for our grammar:

- For every lowercase letter `x`, we have `R(x) = {x}`.
- For expressions `e₁, e₂, ... , eₖ` with k >= 2, we have `R({e₁, e₂, ...}) = R(e₁) ∪ R(e₂) ∪ ...`
- For expressions `e₁` and `e₂`, we have `R(e₁ + e₂) = {a + b for (a, b) in R(e₁) × R(e₂)}`, where `+` denotes concatenation, and `×` denotes the cartesian product.

Given an expression representing a set of words under the given grammar, return _the sorted list of words that the expression represents_.

**Example 1:**

- **Input:** expression = "{a,b}{c,{d,e}}"
- **Output:** ["ac","ad","ae","bc","bd","be"]

**Example 2:**

- **Input:** expression = "{{a,z},a{b,c},{ab,z}}"
- **Output:** ["a","ab","ac","z"]
- **Explanation:** Each distinct word is written only once in the final answer.

**Example 3:**

- **Input:** expression = "a{b,c}{d,e}f{g,h}"
- **Output:** ["abdfg","abdfh","abefg","abefh","acdfg","acdfh","acefg","acefh"]

**Example 4:**

- **Input:** expression = "a"
- **Output:** ["a"]

**Example 5:**

- **Input:** expression = {a,b,c}
- **Output:** ["a","b","c"]

**Example 6:***

- **Input:** expression = "{{a,b},{b,c}}"
- **Output:** ["a","b","c"]

**Example 7:**

- **Input:** expression = "x{a,b}y"
- **Output:** ["xay","xby"]

**Example 8:**

- **Input:** expression = "{{a,b},c{d,e}}"
- **Output:** ["a","b","cd","ce"]

**Example 9:**

- **Input:** expression = "{a,b}{c,d}"
- **Output:** ["ac","ad","bc","bd"]

**Example 10:**

- **Input:** expression = "{a,b}{c,d}{e,f}"
- **Output:** ["ace","acf","ade","adf","bce","bcf","bde","bdf"]

**Constraints:**

- `1 <= expression.length <= 60`
- `expression[i]` consists of `'{'`, `'}'`, `','`or lowercase English letters.
- The given `expression` represents a set of words based on the grammar given in the description.


**Hint:**
1. You can write helper methods to parse the next ``"chunk"`` of the expression. If you see eg. ``"a"``, the answer is just the set ``{a}``. If you see ``"{"``, you parse until you complete the ``"}"`` (the number of ``{`` and ``}`` seen are equal) and that becomes a chunk that you find where the appropriate commas are, and parse each individual expression between the commas.


**Similar Questions:**
1. [1087. Brace Expansion](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001087-brace-expansion)


**Solution:**

We solve the brace expansion by recursively parsing the expression as sets of strings. Concatenation is handled with a Cartesian product, while comma-separated alternatives inside `{...}` are merged as a union. Associative arrays are used as sets to remove duplicates immediately, and the final result is sorted.

## Approach

- Use a recursive descent parser with a shared index `$i` into the expression string.
- `parseAlternative($i)` parses a concatenation sequence until it sees `,`, `}`, or the end of the string.
- Start each concatenation sequence with `['' => true]`, the identity for concatenation.
- When encountering `{`, recursively parse each comma-separated alternative and union them into a `$termSet`.
- When encountering a lowercase letter, treat it as a singleton term.
- Concatenate the current prefix set with the parsed term set using Cartesian product.
- Store generated words as array keys, e.g. `$next[$left . $right] = true`, to deduplicate.
- At the top level, call the parser, then `sort()` the final unique words.

Let's implement this solution in PHP: **[1096. Brace Expansion II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001096-brace-expansion-ii/solution.php)**

```php
<?php
function braceExpansionII(string $expression): array
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * Parse a concatenated expression until ',' or '}' or end of string.
 */
function parseAlternative(string $s, int &$i, int $n): array
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo braceExpansionII("{a,b}{c,{d,e}}") .  "\n";                // Output: ["ac","ad","ae","bc","bd","be"]
echo braceExpansionII("{{a,z},a{b,c},{ab,z}}") .  "\n";         // Output: ["a","ab","ac","z"]
echo braceExpansionII("a{b,c}{d,e}f{g,h}") .  "\n";                 // Output: ["abdfg","abdfh","abefg","abefh","acdfg","acdfh","acefg","acefh"]
echo braceExpansionII("a") .  "\n";                                 // Output: ["a"]
echo braceExpansionII("{a,b,c}") .  "\n";                           // Output: ["a","b","c"]
echo braceExpansionII("{{a,b},{b,c}}") .  "\n";                 // Output: ["a","b","c"]
echo braceExpansionII("x{a,b}y") .  "\n";                           // Output: ["xay","xby"]
echo braceExpansionII("{{a,b},c{d,e}}") .  "\n";                // Output: ["a","b","cd","ce"]
echo braceExpansionII("{a,b}{c,d}") .  "\n";                    // Output: ["ac","ad","bc","bd"]
echo braceExpansionII("{a,b}{c,d}{e,f}") .  "\n";               // Output: ["ace","acf","ade","adf","bce","bcf","bde","bdf"]
?>
```

### Explanation:

- The helper method stops naturally at `,` and `}`, which makes it suitable for parsing one alternative at a time inside braces.
- Nested braces work automatically because `{` triggers another recursive call.
- The `$termSet` represents the union of all alternatives inside a brace group.
- The `$set` represents all possible concatenations parsed so far in the current sequence.
- Starting with `''` ensures the first term is simply concatenated onto an empty prefix.
- Using `word => true` removes duplicates during both union and concatenation.
- The final `array_keys()` converts the set back into a list of words, and `sort()` gives the required lexicographical order.

## Complexity Analysis

- Let `n` be the expression length and `W` be the number of distinct output words.
- The output size `W` can be exponential in `n`, since brace expansion can generate many combinations.
- Time: parsing is `O(n)`, but combination generation depends on output size. Ignoring string-copy costs, it is roughly `O(n * W)`. Including string concatenation costs, up to `O(n² * W)`.
- Space: `O(n * W)` for stored intermediate/final words, plus `O(n)` recursion depth. Including full string storage, up to `O(n² * W)` characters.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**