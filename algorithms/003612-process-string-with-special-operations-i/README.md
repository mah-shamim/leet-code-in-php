3612\. Process String with Special Operations I

**Difficulty:** Medium

**Topics:** `Senior`, `String`, `Simulation`, `Weekly Contest 458`

You are given a string `s` consisting of lowercase English letters and the special characters: `'*'`, `'#'`, and `%`.

Build a new string `result` by processing `s` according to the following rules from left to right:

- If the letter is a **lowercase** English letter append it to `result`.
- A `'*'` **removes** the last character from `result`, if it exists.
- A `'#'` **duplicates** the current `result` and **appends** it to itself.
- A `'%'` **reverses** the current `result`.

Return the final string `result` after processing all characters in `s`.

**Example 1:**

- **Input:** s = "a#b%*"
- **Output:** "ba"
- **Explanation:**

    | `i`	 | `s[i]`	 | Operation	                 | Current `result` |
    |-----|--------|---------------------------|------------------|
    | 0	   | `'a'`	  | Append `'a'`	              | `"a"`            |
    | 1	   | `'#'`	  | Duplicate `result`	        | `"aa"`           |
    | 2	   | `'b'`	  | Append `'b'`	              | `"aab"`          |
    | 3	   | `'%'`	  | Reverse `result`	          | "baa"            |
    | 4	   | `'*'`	  | Remove the last character	 | `"ba"`           |

    - Thus, the final `result` is `"ba"`.

**Example 2:**

- **Input:** s = "z*#"
- **Output:** ""
- **Explanation:**

  | `i`	 | `s[i]`	 | Operation	                 | Current `result` |
  |-----|--------|---------------------------|------------------|
  | 0	   | `'z'`	  | Append `'z'`	              | `"z"`            |
  | 1	   | `'*'`	  | Remove the last character	 | `""`             |
  | 2	   | `'#'`	  | Duplicate the string	      | `""`             |

    - Thus, the final `result` is `""`.

**Constraints:**

- `1 <= s.length <= 20`
- `s` consists of only lowercase English letters and special characters `*`, `#,` and `%`.


**Hint:**
1. Simulate as described


**Solution:**

The problem requires simulating a string transformation where regular letters are appended, and special characters (`*`, `#`, `%`) trigger specific operations—removal, duplication, or reversal of the current result. Since constraints are small (`len ≤ 20`), a direct left‑to‑right simulation using string operations is straightforward and efficient.

## Approach

- **Linear Scan**: Iterate through the input string from left to right, applying operations as defined.
- **Use PHP String Functions**:
    - `.=` for appending letters.
    - `substr($result, 0, -1)` for safe removal of the last character.
    - `$result .= $result` for duplication.
    - `strrev()` for reversal.
- **Edge Cases**:
    - `*` on empty string does nothing.
    - `#` on empty string stays empty.
    - `%` on empty string stays empty.
- **No Extra Data Structures**: Since only the final string is needed, maintain a single string variable.

Let's implement this solution in PHP: **[1. Process String with Special Operations I](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003612-process-string-with-special-operations-i/solution.php)**

```php
<?php
/**
 * @param String $s
 * @return String
 */
function processStr(string $s): string
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo processStr("a#b%*");       // Output: "ba"
echo processStr("z*#");         // Output: ""
?>
```

### Explanation:

1. **Initialize** `$result` as an empty string to hold the output.
2. **Loop** through each character `$char` in the input string `$s`.
3. **If `$char` is a lowercase letter**, append it directly to `$result`.
4. **If `$char` is `'*'`**:
    - Check if `$result` is not empty.
    - If yes, remove its last character using `substr()`.
5. **If `$char` is `'#'`**:
    - Duplicate the current `$result` by appending a copy of itself (`$result .= $result`).
6. **If `$char` is `'%'`**:
    - Reverse `$result` using `strrev()`.
7. After the loop, return the final `$result`.

### Complexity Analysis
- **Time Complexity**: **O(n × m)** in the worst case, where `n` is the length of `s` and `m` is the length of `result`.
    - Each append, removal, duplication, and reversal takes O(m) time in PHP due to string copying.
    - With `n ≤ 20`, this is negligible.
- **Space Complexity**: **O(m)**, where `m` is the length of the final `result`.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**