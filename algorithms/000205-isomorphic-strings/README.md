205\. Isomorphic Strings

**Difficulty:** Easy

**Topics:** `Hash Table`, `String`

Given two strings `s` and `t`, _determine if they are isomorphic_.

Two strings `s` and `t` are isomorphic if the characters in `s` can be replaced to get `t`.

All occurrences of a character must be replaced with another character while preserving the order of characters. No two characters may map to the same character, but a character may map to itself.

**Example 1:**

- **Input:** `s = "egg", t = "add"`
- **Output:** `true`

**Example 2:**

- **Input:** `s = "foo", t = "bar"`
- **Output:** `false` 

**Example 3:**

- **Input:** `s = "paper", t = "title"`
- **Output:** `true` 

**Constraints:**

- <code>1 <= s.length <= 5 * 10<sup>4</sup></code>
- <code>t.length == s.length</code>
- `s` and `t` consist of any valid ascii character.

**Follow-up:** Can you come up with an algorithm that is less than <code>O(n<sup>2</sup>)</code> time complexity?


**Solution:**


We can use two hash maps (or associative arrays in PHP) to track the mappings of characters from `s` to `t` and vice versa.

Let's implement this solution in PHP: **[205. Isomorphic Strings](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000205-isomorphic-strings/solution.php)**

```php
<?php
// Test cases
echo isIsomorphic("egg", "add") ? 'true' : 'false'; // Output: true
echo "\n";
echo isIsomorphic("foo", "bar") ? 'true' : 'false'; // Output: false
echo "\n";
echo isIsomorphic("paper", "title") ? 'true' : 'false'; // Output: true
?>
```

### Explanation:

1. **Length Check:** First, we check if the lengths of the two strings are equal. If not, they cannot be isomorphic.

2. **Mapping Creation:** We use two associative arrays, `$mapST` and `$mapTS`, to track the mappings:
    - `$mapST` stores the mapping from characters in `s` to characters in `t`.
    - `$mapTS` stores the mapping from characters in `t` to characters in `s`.

3. **Iteration:**
    - We iterate through each character in the strings `s` and `t`.
    - If a mapping already exists, we check if it is consistent. If not, we return `false`.
    - If no mapping exists, we create a new one.

4. **Return:** If we successfully iterate through the entire string without finding any inconsistencies, we return `true`, indicating that the strings are isomorphic.

This approach runs in O(n) time complexity, where n is the length of the strings, making it efficient for the input constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**

