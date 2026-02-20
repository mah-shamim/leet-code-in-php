761\. Special Binary String

**Difficulty:** Hard

**Topics:** `Principal`, `String`, `Divide and Conquer`, `Sorting`, `Weekly Contest 66`

**Special binary strings** are binary strings with the following two properties:

- The number of `0`'s is equal to the number of `1`'s.
- Every prefix of the binary string has at least as many `1`'s as `0`'s.

You are given a **special binary** string `s`.

A move consists of choosing two consecutive, non-empty, special substrings of `s`, and swapping them. Two strings are consecutive if the last character of the first string is exactly one index before the first character of the second string.

Return _the lexicographically largest resulting string possible after applying the mentioned operations on the string_.

**Example 1:**

- **Input:** s = "11011000"
- **Output:** "11100100"
- **Explanation:** The strings `"10"` [`occuring` at `s[1]`] and `"1100"` [at `s[3]`] are swapped.
  This is the lexicographically largest string possible after some number of swaps.

**Example 2:**

- **Input:** s = "10"
- **Output:** "10"

**Example 3:**

- **Input:** s = "101011001110011010001111100000"
- **Output:** "111110000011101001100011001010"

**Constraints:**

- `1 <= s.length <= 50`
- `s[i]` is either `'0'` or `'1'`.
- `s` is a special binary string.



**Hint:**
1. Draw a line from (x, y) to (x+1, y+1) if we see a "1", else to (x+1, y-1). A special substring is just a line that starts and ends at the same y-coordinate, and that is the lowest y-coordinate reached. Call a mountain a special substring with no special prefixes - ie. only at the beginning and end is the lowest y-coordinate reached. If F is the answer function, and S has mountain decomposition M1,M2,M3,...,Mk, then the answer is: reverse_sorted(F(M1), F(M2), ..., F(Mk)). However, you'll also need to deal with the case that S is a mountain, such as 11011000 -> 11100100.



**Similar Questions:**
1. [678. Valid Parenthesis String](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000678-valid-parenthesis-string)
2. [2533. Number of Good Binary Strings](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002533-number-of-good-binary-strings)






**Solution:**

This problem asks to transform a special binary string (where '1's and '0's are balanced and every prefix has at least as many '1's as '0's) into the lexicographically largest possible string by repeatedly swapping any two consecutive non‑empty special substrings. The solution uses a recursive divide‑and‑conquer approach: it decomposes the string into its **primitive** components (minimal special substrings that cannot be split further), recursively optimizes the inner part of each primitive, then sorts the resulting primitives in descending lexicographic order and concatenates them. This yields the maximal lexicographic result because primitives can be arbitrarily reordered via allowed swaps.

### Approach:

- **Mapping to parentheses** – Interpret `'1'` as `'('` and `'0'` as `')'`. A special binary string then corresponds to a valid parentheses string.
- **Primitive decomposition** – Scan the string while keeping a balance counter (increment on `'1'`, decrement on `'0'`). Whenever the counter returns to zero, a primitive substring has been found. Each primitive has the form `1 <inner> 0`, where `<inner>` is itself a special string (possibly empty or a concatenation of smaller primitives).
- **Recursive transformation** – For each primitive, recursively apply the same procedure to its inner part to obtain the largest arrangement of the inner special substrings. Then reconstruct the primitive as `'1' + recursive(inner) + '0'`.
- **Sorting primitives** – After processing all primitives of the current level, sort them in **descending lexicographic order**. This is valid because swapping adjacent primitives (allowed by the problem) effectively enables any permutation, and the descending order maximizes the overall string.
- **Concatenation** – Join the sorted primitives to form the result for the current recursion level.

Let's implement this solution in PHP: **[761. Special Binary String](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000761-special-binary-string/solution.php)**

```php
<?php
/**
 * @param String $s
 * @return String
 */
function makeLargestSpecial(string $s): string
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo makeLargestSpecial("11011000") . "\n";                                 // Output: "11100100"
echo makeLargestSpecial("10") . "\n";                                       // Output: "10"
echo makeLargestSpecial("101011001110011010001111100000") . "\n";           // Output: "111110000011101001100011001010"
?>
```

### Explanation:

1. **Base case** – If the input string is empty, return an empty string.
2. **Scan for primitives** – Initialize `balance = 0` and `start = 0`. Iterate through the string:
   - If character is `'1'`, increment balance; if `'0'`, decrement balance.
   - When balance becomes `0`, the substring from `start` to current index is a primitive.
      - Extract the inner substring (without the outer `'1'` and `'0'`): `inner = s[start+1 … i-1]`.
      - Recursively compute the largest arrangement of the inner part: `rec(inner)`.
      - Form the transformed primitive: `'1' + rec(inner) + '0'` and add it to a list.
      - Set `start = i + 1` to look for the next primitive.
3. **Sort the primitives** – Use a custom comparator to sort the list in descending lexicographic order (largest first).
4. **Return** the concatenated sorted list as the result for the current recursion level.
5. **Why this works** – The recursive decomposition respects the nested structure of special strings. Sorting the primitives descending ensures that at every level, the outer primitives are ordered from largest to smallest lexicographically. Because the allowed swaps act only on consecutive special substrings, we can bubble‑sort the primitives into this order, achieving the global maximum.

### Complexity
- **Time complexity** – _**O(n²)**_ in the worst case. Each level of recursion processes the entire string, and string concatenations as well as comparisons during sorting can take O(n) time per operation. Since the total length is at most 50, the practical runtime is very small.
- **Space complexity** – _**O(n)**_ for the recursion stack (depth up to n) and for storing the list of primitives at each level.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**