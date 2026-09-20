3498\. Reverse Degree of a String

**Difficulty:** Easy

**Topics:** `Mid Level`, `String`, `Simulation`, `Biweekly Contest 153`

Given a string `s`, calculate its **reverse degree**.

The **reverse degree** is calculated as follows:

- For each character, multiply its position in the reversed alphabet (``'a'`` = 26, ``'b'`` = 25, ..., `'z'` = 1) with its position in the string (**1-indexed**).
- Sum these products for all characters in the string.

Return the **reverse degree** of `s`.

**Example 1:**

- **Input:**  s = "abc"
- **Output:** 148
- **Explanation:**
  |Letter	|Index in Reversed Alphabet	|Index in String	|Product|
  |---------|---------------------------|-------------------|-------|
  |`'a'`	|26	|1	|26|
  |`'b'`	|25	|2	|50|
  |`'c'`	|24	|3	|72|
    - The reversed degree is `26 + 50 + 72 = 148`.

**Example 2:**

- **Input:** s = "zaza"
- **Output:** 160
- **Explanation:**
  |Letter	|Index in Reversed Alphabet	|Index in String	|Product|
  |---------|----------------------------|-------------------|-------|
  |`'z'`	|1	|1	|1|
  |`'a'`	|26	|2	|52|
  |`'z'`	|1	|3	|3|
  |`'a'`	|26	|4	|104|
    - The reverse degree is `1 + 52 + 3 + 104 = 160`.

**Example 3:**

- **Input:** s = "a"
- **Output:** 26

**Example 4:**

- **Input:** s = "z"
- **Output:** 1

**Example 5:**

- **Input:** s = "az"
- **Output:** 28

**Example 6:**

- **Input:** s = "za"
- **Output:** 53

**Example 7:**

- **Input:** s = "aaaa"
- **Output:** 260

**Example 8:**

- **Input:** s = "zzzz"
- **Output:** 10

**Constraints:**

- `1 <= s.length <= 1000`
- `s` contains only lowercase English letters.


**Hint:**

1. Simulate the operations as described.


**Solution:**

We iterate through `s`, map each character to its reverse alphabet value, multiply by its 1-indexed position, and sum all products.

## Approach

- Initialize `sum = 0`.
- Traverse `s` using a zero-based loop index `$i`.
- Convert `$i` to the 1-based string position: `$i + 1`.
- Convert the character to its reverse alphabet value:
    - `ord($s[$i]) - ord('a')` gives `0` for `'a'`, `25` for `'z'`.
    - `26 - value` gives `'a' -> 26`, `'z' -> 1`.
- Add `positionInString * positionInReversedAlphabet` to `$sum`.
- Return `$sum`.

Let's implement this solution in PHP: **[3498. Reverse Degree of a String](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003498-reverse-degree-of-a-string/solution.php)**

```php
<?php
/**
 * @param String $s
 * @return Integer
 */
function reverseDegree(string $s): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo reverseDegree("abc") . "\n";       // Output: 148
echo reverseDegree("zaza") . "\n";      // Output: 160
echo reverseDegree("a") . "\n";         // Output: 26
echo reverseDegree("z") . "\n";         // Output: 1
echo reverseDegree("az") . "\n";        // Output: 28
echo reverseDegree("za") . "\n";        // Output: 53
echo reverseDegree("aaaa") . "\n";      // Output: 260
echo reverseDegree("zzzz") . "\n";      // Output: 10
?>
```

### Explanation:

- `'a'` has reversed alphabet index `26`.
- `'z'` has reversed alphabet index `1`.
- For `"abc"`: `(1 * 26) + (2 * 25) + (3 * 24) = 26 + 50 + 72 = 148`.
- For `"zaza"`: `(1 * 1) + (2 * 26) + (3 * 1) + (4 * 26) = 1 + 52 + 3 + 104 = 160`.
- The solution directly simulates the problem definition, so no sorting or extra mapping array is needed.

## Complexity Analysis

- Time Complexity: `O(n)`, where `n = strlen(s)`, because each character is processed once.
- Space Complexity: `O(1)`, because only a few integer variables are used.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**