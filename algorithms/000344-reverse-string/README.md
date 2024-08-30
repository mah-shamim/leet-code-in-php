344\. Reverse String

**Difficulty:** Easy

**Topics:** `Two Pointers`, `String`

Write a function that reverses a string. The input string is given as an array of characters `s`.

You must do this by modifying the input array [in-place](https://en.wikipedia.org/wiki/In-place_algorithm) with `O(1)` extra memory.

**Example 1:**

- **Input:** s = ["h","e","l","l","o"]
- **Output:** ["o","l","l","e","h"]

**Example 2:**

- **Input:** s = ["H","a","n","n","a","h"]
- **Output:** ["h","a","n","n","a","H"]

**Constraints:**

- <code>21 <= s.length <= 10<sup>5</sup></code>
- `s[i]` is a [printable ascii character](https://en.wikipedia.org/wiki/ASCII#Printable_characters).

**Hint:**
1. The entire logic for reversing a string is based on using the opposite directional two-pointer approach!


**Solution:**

To solve this problem, we can follow these steps:

Let's implement this solution in PHP: **[344. Reverse String](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000344-reverse-string/solution.php)**

```php
<?php
/**
 * @param String[] $s
 * @return NULL
 */
function reverseString(&$s) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example 1:
$s1 = ["h", "e", "l", "l", "o"];
reverseString($s1);
print_r($s1); // Output: ["o", "l", "l", "e", "h"]

// Example 2:
$s2 = ["H", "a", "n", "n", "a", "h"];
reverseString($s2);
print_r($s2); // Output: ["h", "a", "n", "n", "a", "H"]
?>
```

### Explanation:

1. **Initialization**:
    - Set two pointers: `left` starting from the beginning (`0`) and `right` from the end (`count($s) - 1`).

2. **Swapping**:
    - Swap the elements at `left` and `right` positions.
    - Increment the `left` pointer and decrement the `right` pointer after each swap.

3. **Loop**:
    - Continue the swapping until `left` is less than `right`.

4. **In-Place Modification**:
    - The input array `$s` is modified in place, meaning the original array is reversed without using any additional arrays.

This solution has a time complexity of `O(n)` and a space complexity of `O(1)`, as required.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
