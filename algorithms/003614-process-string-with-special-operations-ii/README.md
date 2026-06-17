3614\. Process String with Special Operations II

**Difficulty:** Hard

**Topics:** `Senior Staff`, `String`, `Simulation`, `Weekly Contest 458`

You are given a string `s` consisting of lowercase English letters and the special characters: `'*'`, `'#'`, and `'%'`.

You are also given an integer `k`.

Build a new string `result` by processing `s` according to the following rules from left to right:

- If the letter is a **lowercase** English letter append it to `result`.
- A `'*'` **removes** the last character from `result`, if it exists.
- A `'#'` **duplicates** the current `result` and **appends** it to itself.
- A `'%'` **reverses** the current `result`.

Return the `kᵗʰ` character of the final string `result`. If `k` is out of the bounds of `result`, return `'.'`.

**Example 1:**

- **Input:** s = "a#b%*", k = 1
- **Output:** "a"
- **Explanation:**

  | `i`	 | `s[i]`	 | Operation	                 | Current `result` |
  |-----|--------|---------------------------|------------------|
  | 0	   | `'a'`	  | Append `'a'`	              | `"a"`            |
  | 1	   | `'#'`	  | Duplicate `result`	        | `"aa"`           |
  | 2	   | `'b'`	  | Append `'b'`	              | `"aab" `         |
  | 3	   | `'%'`	  | Reverse `result`	          | `"baa"`          |
  | 4	   | `'*'`	  | Remove the last character	 | `"ba"`           |

   - The final `result` is `"ba"`. The character at index `k = 1` is `'a'`.

**Example 2:**

- **Input:** s = "cd%#*#", k = 3
- **Output:** "d"
- **Explanation:**

  | `i`	 | `s[i]`	 | Operation	                 | Current `result` |
  |-----|--------|---------------------------|------------------|
  | 0	   | `'c'`	  | Append `'c'`	              | `"c"`            |
  | 1	   | `'d'`	  | Append `'d'`	              | `"cd"`           |
  | 2	   | `'%'`	  | Reverse `result`	          | `"dc"`           |
  | 3	   | `'#'`	  | Duplicate `result`	        | `"dcdc"`         |
  | 4	   | `'*'`	  | Remove the last character	 | `"dcd"`          |
  | 5	   | `'#'`	  | Duplicate `result`	        | `"dcddcd" `      |

   - The final `result` is `"dcddcd"`. The character at index `k = 3` is `'d'`.

**Example 3:**

- **Input:** s = "z*#", k = 0
- **Output:** "."
- **Explanation:**

  | `i`	 | `s[i]`	 | Operation	                 | Current `result` |
  |-----|--------|---------------------------|------------------|
  | 0	   | `'z'`	  | Append `'z'	`              | `"z"`            |
  | 1	   | `'*'`	  | Remove the last character	 | `""`             |
  | 2	   | `'#'`	  | Duplicate the string	      | `""`             |

  - The final `result` is `""`. Since index `k = 0` is out of bounds, the output is `'.'`.

**Constraints:**

- `1 <= s.length <= 10⁵`
- `s` consists of only lowercase English letters and special characters `'*'`, `'#'`, and `'%'`.
- `0 <= k <= 10¹⁵`
- The length of `result` after processing `s` will not exceed `10¹⁵`.


**Hint:**
1. Track the length of the string after each operation on `s`.
2. Walk backwards through `s`, undoing each `#` by using modulus on the tracked lengths, and undoing each % by mirroring across the midpoint, to pinpoint the `kᵗʰ` character.


**Solution:**

We simulate the process in reverse to avoid constructing strings that may be up to _**10¹⁵**_ characters long. First, we compute the length after each operation. Then, starting from the final index `k`, we walk backward through the operations, reversing their effects (`#` and `%`) until we identify which original letter corresponds to the desired position. This guarantees _**O(n)**_ time and _**O(n)**_ space.

## Approach

- **Forward length pass**  
  - Iterate through `s` once, maintaining the current length after each operation:
    - Letters → increment length
    - `*` → decrement if possible
    - `#` → double length
    - `%` → length unchanged
  - Store the length after each step in an array.

- **Validate `k`** If `k` is out of bounds of the final length, return `"."`.

- **Backward reduction**  
  - Traverse `s` from the last operation to the first. At each step:
    - **Letter**: If `k` points to the last position of the current length, return that letter. Otherwise, just move left.
    - `*`**: No change to `k`; the removed character is not relevant for earlier positions.
    - `#`**: If `k` is in the duplicated second half (`k >= prevLength`), map it to the first half by subtracting `prevLength`.
    - `%`**: Reverse the index within the previous length: `k = prevLength - 1 - k`.

- **Return result** If we exit the loop without finding a letter (should not happen for valid `k`), return `"."`.

Let's implement this solution in PHP: **[1. Process String with Special Operations II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003614-process-string-with-special-operations-ii/solution.php)**

```php
<?php
/**
 * @param String $s
 * @param Integer $k
 * @return String
 */
function processStr(string $s, int $k): string
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo processStr("a#b%*", 1);        // Output: "a"
echo processStr("cd%#*#", 3);       // Output: "d"
echo processStr("z*#", 0);          // Output: "."
?>
```

### Explanation:

- **Why process backwards?** Forward simulation would build enormous strings (up to 10¹⁵), which is infeasible. Backward processing lets us reduce the problem to finding which original letter generated a specific position.
- **Handling `#` (duplicate)** The duplicate operation creates two identical halves. If our target `k` falls in the second half, we simply subtract the first half’s length to map it to the corresponding position in the first half.
- **Handling `%` (reverse)** Reversal mirrors the string. The character at index `k` in the reversed string comes from index `prevLength - 1 - k` in the string before reversal. We apply that mirror transformation.
- **Handling `*` (deletion)** Since we only care about the final string, a deletion removes the last character. When walking backward, that last character is irrelevant for earlier indices, so we just ignore the operation.
- **Handling letters** When we encounter a letter appended at the end of the string, if `k` is exactly the last index of that current string, that letter is our answer. Otherwise, we continue backward to earlier operations.

### **Complexity Analysis**

- **Time complexity:** _**O(n)**_, where `n` is the length of `s` — one forward pass and one backward pass.
- **Space complexity:** _**O(n)**_ — to store the length array of size `n`.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**