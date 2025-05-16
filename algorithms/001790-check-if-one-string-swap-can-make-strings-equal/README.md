1790\. Check if One String Swap Can Make Strings Equal

**Difficulty:** Easy

**Topics:** `Hash Table`, `String`, `Counting`

You are given two strings `s1` and `s2` of equal length. A **string swap** is an operation where you choose two indices in a string (not necessarily different) and swap the characters at these indices.

Return _`true` if it is possible to make both strings equal by performing **at most one string swap** on e**xactly one** of the strings_. Otherwise, return _`false`_.

**Example 1:**

- **Input:** s1 = "bank", s2 = "kanb"
- **Output:** true
- **Explanation:** For example, swap the first character with the last character of s2 to make "bank".

**Example 2:**

- **Input:** s1 = "attack", s2 = "defend"
- **Output:** false
- **Explanation:** It is impossible to make them equal with one string swap.


**Example 3:**

- **Input:** s1 = "kelb", s2 = "kelb"
- **Output:** true
- **Explanation:** The two strings are already equal, so no string swap operation is required.



**Constraints:**

- `1 <= s1.length, s2.length <= 100`
- `s1.length == s2.length`
- `s1` and `s2` consist of only lowercase English letters.


**Hint:**
1. The answer is false if the number of nonequal positions in the strings is not equal to `0` or `2`.
2. Check that these positions have the same set of characters.



**Solution:**

We need to determine if we can make two given strings equal by performing at most one string swap on exactly one of the strings.

### Approach
1. **Immediate Check for Equality**: If the two strings are already equal, return `true` immediately as no swap is needed.
2. **Collect Differing Indices**: Traverse both strings and collect the indices where the characters differ.
3. **Check Differing Indices Count**: If the number of differing indices is not exactly 2, return `false` because a single swap can only correct two differing positions.
4. **Validate Swap Possibility**: Check if swapping the characters at the two differing indices in one of the strings would make them equal. This is verified by ensuring the characters at the differing indices in the first string match the characters at the corresponding indices in the second string when swapped.

Let's implement this solution in PHP: **[1790. Check if One String Swap Can Make Strings Equal](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001790-check-if-one-string-swap-can-make-strings-equal/solution.php)**

```php
<?php
/**
 * @param String $s1
 * @param String $s2
 * @return Boolean
 */
function areAlmostEqual($s1, $s2) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage
$s1 = "bank";
$s2 = "kanb";
var_dump(canSwapToMakeEqual($s1, $s2)); // Output: true

$s1 = "attack";
$s2 = "defend";
var_dump(canSwapToMakeEqual($s1, $s2)); // Output: false

$s1 = "kelb";
$s2 = "kelb";
var_dump(canSwapToMakeEqual($s1, $s2)); // Output: true
?>
```

### Explanation:

1. **Immediate Check**: If the strings are already identical, we return `true` immediately.
2. **Collect Differences**: We iterate through each character of the strings and collect indices where characters differ. If we collect more than two indices, we return `false` immediately as more than one swap is needed.
3. **Check Indices Count**: If exactly two indices differ, we check if swapping the characters at these indices in one of the strings would make them equal. This is done by verifying that the characters at these positions in each string are cross-equal (i.e., the character at the first index in the first string matches the character at the second index in the second string and vice versa).

### Complexity:
- **Time Complexity:** _**O(n)**_, where _**n**_ is the length of the strings, as we loop through the strings once.
- **Space Complexity:** _**O(1)**_ (excluding the input size), as we use a small array to store at most two indices.

This approach efficiently checks the necessary conditions with a time complexity of O(n), where n is the length of the strings, ensuring optimal performance.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**