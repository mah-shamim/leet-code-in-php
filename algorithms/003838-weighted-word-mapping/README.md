3838\. Weighted Word Mapping

**Difficulty:** Easy

**Topics:** `Mid Level`, `Array`, `String`, `Simulation`, `Biweekly Contest 176`

You are given an array of strings `words`, where each string represents a word containing lowercase English letters.

You are also given an integer array `weights` of length 26, where `weights[i]` represents the weight of the `iᵗʰ` lowercase English letter.

The **weight** of a word is defined as the **sum** of the weights of its characters.

For each word, take its weight modulo 26 and map the result to a lowercase English letter using reverse alphabetical order (`0 -> 'z', 1 -> 'y', ..., 25 -> 'a'`).

Return _a string formed by concatenating the mapped characters for all words in order_.

**Example 1:**

- **Input:** words = ["abcd","def","xyz"], weights = [5,3,12,14,1,2,3,2,10,6,6,9,7,8,7,10,8,9,6,9,9,8,3,7,7,2]
- **Output:** "rij"
- **Explanation:**
  - The weight of `"abcd"` is `5 + 3 + 12 + 14 = 34`. The result modulo 26 is `34 % 26 = 8`, which maps to `'r'`.
  - The weight of `"def"` is `14 + 1 + 2 = 17`. The result modulo 26 is `17 % 26 = 17`, which maps to `'i'`.
  - The weight of `"xyz"` is `7 + 7 + 2 = 16`. The result modulo 26 is `16 % 26 = 16`, which maps to `'j'`.
  - Thus, the string formed by concatenating the mapped characters is `"rij"`.

**Example 2:**

- **Input:** words = ["a","b","c"], weights = [1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1]
- **Output:** "yyy"
- **Explanation:**
  - Each word has weight 1. The result modulo 26 is `1 % 26 = 1`, which maps to `'y'`.
  - Thus, the string formed by concatenating the mapped characters is `"yyy"`.

**Example 3:**

- **Input:** words = ["abcd"], weights = [7,5,3,4,3,5,4,9,4,2,2,7,10,2,5,10,6,1,2,2,4,1,3,4,4,5]
- **Output:** "g"
- **Explanation:**
  - The weight of `"abcd"` is `7 + 5 + 3 + 4 = 19`. The result modulo 26 is `19 % 26 = 19`, which maps to `'g'`.
  - Thus, the string formed by concatenating the mapped characters is `"g"`.

**Constraints:**

- `1 <= words.length <= 100`
- `1 <= words[i].length <= 10`
- `weights.length == 26`
- `1 <= weights[i] <= 100`
- `words[i]` consists of lowercase English letters.



**Hint:**
1. For each word, sum character weights using `weights[c - 'a']`
2. Take the sum modulo `26`
3. Map the value to a character using reverse order: `char = 'z' - value`
4. Append all mapped characters in order to form the result string






**Solution:**

This solution computes the weighted sum of characters for each word using a given letter-weight mapping, reduces the sum modulo 26, then maps the result to a lowercase letter in reverse alphabetical order (0 → `'z'`, 1 → `'y'`, …). The mapped letters are concatenated to form the final output string.

### Approach:

- Loop through each word in the input array.
- For each character in a word, find its corresponding weight using the `weights` array.
- Sum the weights to get the total word weight.
- Apply modulo 26 to the sum.
- Map the result to a letter using the formula: `chr(ord('z') - modulo_value)`.
- Append this letter to the result string.
- Return the result string after processing all words.

Let's implement this solution in PHP: **[3838. Weighted Word Mapping](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003838-weighted-word-mapping/solution.php)**

```php
<?php
/**
 * @param String[] $words
 * @param Integer[] $weights
 * @return String
 */
function mapWordWeights(array $words, array $weights): string
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo mapWordWeights(["abcd","def","xyz"], [5,3,12,14,1,2,3,2,10,6,6,9,7,8,7,10,8,9,6,9,9,8,3,7,7,2]) . "\n";        // Output: "rij"
echo mapWordWeights(["a","b","c"], [1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1]) . "\n";                   // Output: "yyy"
echo mapWordWeights(["abcd"], [7,5,3,4,3,5,4,9,4,2,2,7,10,2,5,10,6,1,2,2,4,1,3,4,4,5]) . "\n";                      // Output: "g"
?>
```

### Explanation:

- The weight of a word is the sum of weights of its characters (where `weights[0]` corresponds to `'a'`, `weights[1]` to `'b'`, etc.).
- `sum % 26` ensures the result stays in the range 0–25.
- The mapping `0 → 'z'`, `1 → 'y'`, … is achieved by subtracting the modulo value from `ord('z')`.
- The example `"abcd"` with weights `[5,3,12,14]` gives sum 34, 34 % 26 = 8, `'z' - 8 = 'r'`.
- The process repeats for each word, concatenating results in order.

### Complexity
- **Time Complexity**: _**O(N × L)**_, where N = number of words, L = average word length. Each character is processed once.
- **Space Complexity**: _**O(N)**_, for the result string, ignoring input storage. Constant extra space is used for computation.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**