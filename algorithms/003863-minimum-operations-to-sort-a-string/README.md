3863\. Minimum Operations to Sort a String

**Difficulty:** Medium

**Topics:** `Staff`, `String`, `Weekly Contest 492`

You are given a string `s` consisting of lowercase English letters.

In one operation, you can select any **substring[^1]** of `s` that is **not** the entire string and sort it in **non-descending alphabetical** order.

Return the **minimum** number of operations required to make `s` sorted in **non-descending** order. If it is not possible, return -1.

[^1]: **Substring:** A **substring** is a contiguous **non-empty** sequence of characters within a string.

**Example 1:**

- **Input:** s = "dog"
- **Output:** 1
- **Explanation:**
  - Sort substring `"og"` to `"go"`.
  - Now, `s = "dgo"`, which is sorted in ascending order. Thus, the answer is 1.

**Example 2:**

- **Input:** s = "card"
- **Output:** 2
- **Explanation:**
  - Sort substring `"car"` to `"acr"`, so `s = "acrd"`.
  - Sort substring `"rd"` to `"dr"`, making `s = "acdr"`, which is sorted in ascending order. Thus, the answer is 2.

**Example 3:**

- **Input:** s = "gf"
- **Output:** -1
- **Explanation:** It is impossible to sort `s` under the given constraints. Thus, the answer is -1.

**Example 4:**

- **Input:** s = "abc"
- **Output:** 0

**Example 5:**

- **Input:** s = "a"
- **Output:** 0

**Example 6:**

- **Input:** s = "aa"
- **Output:** 0

**Example 7:**

- **Input:** s = "ba"
- **Output:** -1

**Example 8:**

- **Input:** s = "cba"
- **Output:** 3

**Example 9:**

- **Input:** s = "acb"
- **Output:** 1

**Example 10:**

- **Input:** s = "bac"
- **Output:** 1

**Example 11:**

- **Input:** s = "bca"
- **Output:** 2

**Example 12:**

- **Input:** s = "cab"
- **Output:** 2

**Example 13:**

- **Input:** s = "dcba"
- **Output:** 3

**Constraints:**

- `1 <= s.length <= 10⁵`
- `s` consists of only lowercase English letters.


**Hint:**

1. If `s` is already sorted, answer is `0`.
2. Let `mn` be the minimum char and `mx` be the maximum char; if `mn` appears at the beginning (not whole string) or `mx` appears at the end (not whole string), answer is `1`.
3. If `s` cannot be transformed into a sorted string, return `-1`.
4. If no `mn` exists in any proper prefix and no `mx` exists in any proper suffix, answer is `3`; otherwise answer is `2`


**Solution:**

We use a constant-space case analysis based on whether the string is already sorted and where the global minimum and maximum characters appear. The answer is always one of `0`, `1`, `2`, `3`, or `-1`, and the string can be checked in linear time.

## Approach

- Return `0` if `s` is already sorted in non-descending order.
- If `n == 2` and `s` is not sorted, return `-1`, because the only proper substrings have length `1` and sorting them changes nothing.
- Find the global minimum character `mn` and global maximum character `mx`.
- If `s[0] == mn`, sorting the suffix `s[1..n-1]` makes the whole string sorted, so return `1`.
- If `s[n-1] == mx`, sorting the prefix `s[0..n-2]` makes the whole string sorted, so return `1`.
- If `mn` appears in a proper prefix, i.e. anywhere except the last position, we can sort a prefix to bring `mn` to the front, then sort the remaining suffix. Return `2`.
- If `mx` appears in a proper suffix, i.e. anywhere except the first position, we can sort a suffix to move `mx` to the end, then sort the remaining prefix. Return `2`.
- Otherwise, `mx` is only at the front and `mn` is only at the end. For `n >= 3`, this can be fixed in `3` operations.
- Return `3`.

Let's implement this solution in PHP: **[3863. Minimum Operations to Sort a String](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003863-minimum-operations-to-sort-a-string/solution.php)**

```php
<?php
/**
 * @param String $s
 * @return Integer
 */
function minOperations(string $s): int
{
    $n = strlen($s);

    // Check if already sorted.
    $sorted = true;
    for ($i = 1; $i < $n; $i++) {
        if ($s[$i - 1] > $s[$i]) {
            $sorted = false;
            break;
        }
    }
    if ($sorted) {
        return 0;
    }

    // For length 2, the only proper substrings have length 1,
    // so an unsorted string cannot be changed.
    if ($n === 2) {
        return -1;
    }

    $mn = 'z';
    $mx = 'a';

    for ($i = 0; $i < $n; $i++) {
        $c = $s[$i];
        if ($c < $mn) $mn = $c;
        if ($c > $mx) $mx = $c;
    }

    // If the minimum is already first, sort the suffix.
    // If the maximum is already last, sort the prefix.
    if ($s[0] === $mn || $s[$n - 1] === $mx) {
        return 1;
    }

    // If minimum appears in a proper prefix, we can move it to front,
    // then sort the remaining suffix.
    for ($i = 0; $i < $n - 1; $i++) {
        if ($s[$i] === $mn) {
            return 2;
        }
    }

    // If maximum appears in a proper suffix, we can move it to end,
    // then sort the remaining prefix.
    for ($i = 1; $i < $n; $i++) {
        if ($s[$i] === $mx) {
            return 2;
        }
    }

    // Otherwise the string starts with maximum and ends with minimum,
    // which requires 3 operations for n >= 3.
    return 3;
}

// Test cases
echo minOperations("dog") .  "\n";      // Output: 1
echo minOperations("card") .  "\n";     // Output: 2
echo minOperations("gf") .  "\n";       // Output: -1
echo minOperations("dog") . "\n";       // Output: 1
echo minOperations("card") . "\n";      // Output: 2
echo minOperations("gf") . "\n";        // Output: -1
echo minOperations("abc") . "\n";       // Output: 0
echo minOperations("a") . "\n";         // Output: 0
echo minOperations("aa") . "\n";        // Output: 0
echo minOperations("ba") . "\n";        // Output: -1
echo minOperations("cba") . "\n";       // Output: 3
echo minOperations("acb") . "\n";       // Output: 1
echo minOperations("bac") . "\n";       // Output: 1
echo minOperations("bca") . "\n";       // Output: 2
echo minOperations("cab") . "\n";       // Output: 2
echo minOperations("dcba") . "\n";      // Output: 3
?>
```

### Explanation:

- Sorting the whole string is forbidden, so we must use proper substrings only.
- If the smallest character is already first, sorting the suffix is enough because every other character is at least as large as the first character.
- Similarly, if the largest character is already last, sorting the prefix is enough because every other character is at most as large as the last character.
- If the minimum appears in a proper prefix, one operation can move it to the front by sorting that prefix. After that, sorting the suffix completes the sort.
- If the maximum appears in a proper suffix, one operation can move it to the end by sorting that suffix. After that, sorting the prefix completes the sort.
- If neither shortcut works, the first character is the maximum and the last character is the minimum. For length at least `3`, three operations are always sufficient:
    1. Sort the prefix excluding the last character.
    2. Sort the suffix excluding the first character.
    3. Sort the prefix excluding the last character again.
- For length `2`, an unsorted string cannot be changed because the only allowed substrings have length `1`.

## Complexity Analysis

- **Time complexity:** `O(n)`, where `n` is the length of `s`. We scan the string a constant number of times.
- **Space complexity:** `O(1)`, since only a few character variables and indices are used.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**