2839\. Check if Strings Can be Made Equal With Operations I

**Difficulty:** Easy

**Topics:** `Mid Level`, `String`, `Biweekly Contest 112`

You are given two strings `s1` and `s2`, both of length `4`, consisting of **lowercase** English letters.

You can apply the following operation on any of the two strings any number of times:

- Choose any two indices `i` and `j` such that `j - i = 2`, then **swap** the two characters at those indices in the string.

Return _`true` if you can make the strings `s1` and `s2` equal, and `false` otherwise_.

**Example 1:**

- **Input:** s1 = "abcd", s2 = "cdab"
- **Output:** true
- **Explanation:** We can do the following operations on s1:
  - Choose the indices i = 0, j = 2. The resulting string is s1 = "cbad".
  - Choose the indices i = 1, j = 3. The resulting string is s1 = "cdab" = s2.

**Example 2:**

- **Input:** s1 = "abcd", s2 = "dacb"
- **Output:** false
- **Explanation:** It is not possible to make the two strings equal.

**Example 3:**

- **Input:** s1 = "abab", s2 = "abab"
- **Output:** true

**Example 4:**

- **Input:** s1 = "abcd", s2 = "acbd"
- **Output:** false

**Constraints:**

- `s1.length == s2.length == 4`
- `s1` and `s2` consist only of lowercase English letters.



**Hint:**
1. Since the strings are very small you can try a brute-force approach.
2. There are only `2` different swaps that are possible in a string.






**Solution:**

To determine whether two strings `s1` and `s2` (each of length 4) can be made equal using the allowed operation (swapping characters at indices where `j - i = 2`), we observe a key constraint:
* You can only swap:
   * Index `0` with `2`
   * Index `1` with `3`
This means:
* Characters at **even indices (0,2)** can only rearrange among themselves.
* Characters at **odd indices (1,3)** can only rearrange among themselves.
So, the problem reduces to checking whether:
* The even-index characters of both strings match (after sorting), and
* The odd-index characters of both strings match (after sorting).
If both conditions are satisfied → return `true`, otherwise `false`.

### Approach:

* Extract characters at:
   * Even indices `(0, 2)` from both strings.
   * Odd indices `(1, 3)` from both strings.
* Sort both even-index arrays.
* Sort both odd-index arrays.
* Compare:
   * Even-index arrays of `s1` and `s2`
   * Odd-index arrays of `s1` and `s2`
* Return `true` if both match; otherwise return `false`.

Let's implement this solution in PHP: **[2839. Check if Strings Can be Made Equal With Operations I](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002839-check-if-strings-can-be-made-equal-with-operations-i/solution.php)**

```php
<?php
/**
 * @param String $s1
 * @param String $s2
 * @return Boolean
 */
function canBeEqual(string $s1, string $s2): bool
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo canBeEqual("abcd", "cdab") . "\n";             // Output: true
echo canBeEqual("abcd", "dacb") . "\n";             // Output: false
echo canBeEqual("abab", "abab") . "\n";             // Output: true
echo canBeEqual("abcd", "acbd") . "\n";             // Output: false
?>
```

### Explanation:

* Only two swaps are possible:
   * Swap index `0` ↔ `2`
   * Swap index `1` ↔ `3`
* This creates **two independent groups**:
   * Even positions group
   * Odd positions group
* We cannot move characters between even and odd positions.
* Therefore:
   * The multiset (frequency) of even-index characters must match.
   * The multiset (frequency) of odd-index characters must match.
* Sorting both groups makes comparison easy.
* If both sorted groups are equal → transformation is possible.

### Complexity
- **Time Complexity**: _**O(1)**_, String length is fixed at 4, sorting 2 elements is constant time.
- **Space Complexity**: _**O(1)**_, Only small fixed-size arrays are used.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**