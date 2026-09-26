1807\. Evaluate the Bracket Pairs of a String

**Difficulty:** Medium

**Topics:** `Staff`, `Array`, `Hash Table`, `String`, `Weekly Contest 234`

You are given a string `s` that contains some bracket pairs, with each pair containing a **non-empty** key.

- For example, in the string `"(name)is(age)yearsold"`, there are **two** bracket pairs that contain the keys `"name"` and `"age"`.

You know the values of a wide range of keys. This is represented by a 2D string array `knowledge` where each `knowledge[i] = [keyᵢ, valueᵢ]` indicates that key `keyᵢ` has a value of `valueᵢ`.

You are tasked to evaluate **all** of the bracket pairs. When you evaluate a bracket pair that contains some key `keyᵢ`, you will:

- Replace `keyᵢ` and the bracket pair with the key's corresponding `valueᵢ`.
- If you do not know the value of the key, you will replace `keyᵢ` and the bracket pair with a question mark `"?"` (without the quotation marks).

Each key will appear at most once in your `knowledge`. There will not be any nested brackets in `s`.

Return _the resulting string after evaluating **all** of the bracket pairs_.

**Example 1:**

- **Input:** s = "(name)is(age)yearsold", knowledge = [["name","bob"],["age","two"]]
- **Output:** "bobistwoyearsold"
- **Explanation:**
  - The key "name" has a value of "bob", so replace "(name)" with "bob".
  - The key "age" has a value of "two", so replace "(age)" with "two".

**Example 2:**

- **Input:** s = "hi(name)", knowledge = [["a","b"]]
- **Output:** "hi?"
- **Explanation:** As you do not know the value of the key "name", replace "(name)" with "?".

**Example 3:**

- **Input:** s = "(a)(a)(a)aaa", knowledge = [["a","yes"]]
- **Output:** "yesyesyesaaa"
- **Explanation:** 
  - The same key can appear multiple times.
  - The key "a" has a value of "yes", so replace all occurrences of "(a)" with "yes".
  - Notice that the "a"s not in a bracket pair are not evaluated.

**Example 4:**

- **Input:** s = "abc", knowledge = []
- **Output:** "abc"

**Example 5:**

- **Input:** s = "(unknown)", knowledge = []
- **Output:** "?"

**Example 6:**

- **Input:** s = "(x)(y)(x)", knowledge = [["x","1"],["y","2"]]
- **Output:** "121"

**Example 7:**

- **Input:** s = "a(b)c(d)e", knowledge = [["b","B"],["d","D"]]
- **Output:** "aBcDe"

**Example 8:**

- **Input:** s = "(a)(b)(a)", knowledge = [["a","A"]]
- **Output:** "A?A"

**Example 9:**

- **Input:** s = "(key)", knowledge = [["key","value"]]
- **Output:** "value"

**Example 10:**

- **Input:** s = "prefix(mid)suffix", knowledge = [["mid","M"]]
- **Output:** "prefixMsuffix"

**Constraints:**

- `1 <= s.length <= 10⁵`
- `0 <= knowledge.length <= 10⁵`
- `knowledge[i].length == 2`
- `1 <= keyᵢ.length, valuei.length <= 10`
- `s` consists of lowercase English letters and round brackets `'('` and `')'`.
- Every open bracket ``'('`` in `s` will have a corresponding close bracket `')'`.
- The key in each bracket pair of `s` will be non-empty.
- There will not be any nested bracket pairs in `s`.
- `keyᵢ` and `valueᵢ` consist of lowercase English letters.
- Each `keyᵢ` in `knowledge` is unique.


**Hint:**

1. Process pairs from right to left to handle repeats
2. Keep track of the current enclosed string using another string


**Similar Questions:**
1. [3481. Apply Substitutions](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003481-apply-substitutions)


**Solution:**

We can solve this by storing `knowledge` in a hash map, then scanning `s` once and replacing each `(key)` with its mapped value or `?`.

## Approach

- Build an associative array `$map` from `knowledge`, where each `key => value`.
- Traverse the string `$s` from left to right.
- If the current character is not `'('`, append it directly to the result.
- If the current character is `'('`, find the next `')'`.
- Extract the key between `'('` and `')'`.
- Append `$map[$key] ?? '?'`.
- Move the index to the closing `')'` to skip the already-processed bracket pair.
- Return the final result string.

Let's implement this solution in PHP: **[1807. Evaluate the Bracket Pairs of a String](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001807-evaluate-the-bracket-pairs-of-a-string/solution.php)**

```php
<?php
/**
 * @param String $s
 * @param String[][] $knowledge
 * @return String
 */
function evaluate(string $s, array $knowledge): string
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo evaluate("(name)is(age)yearsold", [["name","bob"],["age","two"]]) .  "\n";     // Output: "bobistwoyearsold"
echo evaluate("hi(name)", [["a","b"]]) .  "\n";                                     // Output: "hi?"
echo evaluate("(a)(a)(a)aaa", [["a","yes"]]) .  "\n";                               // Output: "yesyesyesaaa"
echo evaluate("(abc", []) .  "\n";                                                  // Output: "abc"
echo evaluate("(unknown)", []) .  "\n";                                             // Output: "?"
echo evaluate("(x)(y)(x)", [["x","1"],["y","2"]]) .  "\n";                          // Output: "121"
echo evaluate("a(b)c(d)e", [["b","B"],["d","D"]]) .  "\n";                          // Output: "aBcDe"
echo evaluate("(a)(b)(a)", [["a","A"]]) .  "\n";                                    // Output: "A?A"
echo evaluate("(key)", [["key","value"]]) .  "\n";                                  // Output: "value"
echo evaluate("prefix(mid)suffix", [["mid","M"]]) .  "\n";                          // Output: "prefixMsuffix"
?>
```

### Explanation:

- Since there are no nested brackets, the first `')'` after `'('` is always the matching closing bracket.
- The hash map gives `O(1)` average lookup for each key.
- Unknown keys become `"?"` using PHP’s null coalescing operator.
- Repeated keys work naturally because every occurrence performs a fresh map lookup.
- Characters outside brackets are copied unchanged.

## Complexity Analysis

- **Time Complexity:** `O(n + k)`, where `n = strlen($s)` and `k = count($knowledge)`. Building the map takes `O(k)`, and scanning/replacing in `s` takes `O(n)`.
- **Space Complexity:** `O(k + n)`, where `O(k)` is for the hash map and `O(n)` is for the result string.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**