1625\. Lexicographically Smallest String After Applying Operations

**Difficulty:** Medium

**Topics:** `String`, `Depth-First Search`, `Breadth-First Search`, `Enumeration`, `Weekly Contest 211`

You are given a string `s` of **even length** consisting of digits from `0` to `9`, and two integers `a` and `b`.

You can apply either of the following two operations any number of times and in any order on `s`:

- Add `a` to all odd indices of `s` (**0-indexed**). Digits post `9` are cycled back to `0`. For example, if `s = "3456"` and `a = 5`, `s` becomes `"3951"`.
- Rotate `s` to the right by `b` positions. For example, if `s = "3456"` and `b = 1`, `s` becomes `"6345"`.

Return _the **lexicographically smallest** string you can obtain by applying the above operations any number of times on `s`_.

A string `a` is lexicographically smaller than a string `b` (of the same length) if in the first position where `a` and `b` differ, string `a` has a letter that appears earlier in the alphabet than the corresponding letter in `b`. For example, `"0158"` is lexicographically smaller than `"0190"` because the first position they differ is at the third letter, and `'5'` comes before `'9'`.

**Example 1:**

- **Input:** s = "5525", a = 9, b = 2
- **Output:** "2050"
- **Explanation:** We can apply the following operations:
  Start:  "5525"
  Rotate: "2555"
  Add:    "2454"
  Add:    "2353"
  Rotate: "5323"
  Add:    "5222"
  Add:    "5121"
  Rotate: "2151"
  Add:    "2050"
  There is no way to obtain a string that is lexicographically smaller than "2050".

**Example 2:**

- **Input:** s = "74", a = 5, b = 1
- **Output:** "24"
- **Explanation:** We can apply the following operations:
  Start:  "74"
  Rotate: "47"
  Add:    "42"
  Rotate: "24"
  There is no way to obtain a string that is lexicographically smaller than "24".

**Example 3:**

- **Input:** s = "0011", a = 4, b = 2
- **Output:** "0011"
- **Explanation:** There are no sequence of operations that will give us a lexicographically smaller string than "0011".

**Constraints:**

- `2 <= s.length <= 100`
- `s.length` is even.
- `s` consists of digits from `0` to `9` only.
- `1 <= a <= 9`
- `1 <= b <= s.length - 1`



**Hint:**
1. Since the length of s is even, the total number of possible sequences is at most 10 * 10 * s.length.
2. You can generate all possible sequences and take their minimum.
3. Keep track of already generated sequences so they are not processed again.



**Similar Questions:**
1. [2734. Lexicographically Smallest String After Substring Operation](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002734-lexicographically-smallest-string-after-substring-operation)
2. [3216. Lexicographically Smallest String After a Swap](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003216-lexicographically-smallest-string-after-a-swap)






**Solution:**

We need to find the lexicographically smallest string by applying two operations:
1. Add `a` to all odd indices (0-indexed), with digits wrapping around (mod 10)
2. Rotate the string right by `b` positions

Since the string length is at most 100, I can use BFS to explore all possible states.

## Approach
1. Use BFS to explore all reachable string states
2. Keep track of visited strings to avoid cycles
3. For each string, generate two new strings:
   - One by applying the "add to odd indices" operation
   - One by applying the rotation operation
4. Track the lexicographically smallest string found

Let's implement this solution in PHP: **[1625. Lexicographically Smallest String After Applying Operations](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001625-lexicographically-smallest-string-after-applying-operations/solution.php)**

```php
<?php
/**
 * @param String $s
 * @param Integer $a
 * @param Integer $b
 * @return String
 */
function findLexSmallestString($s, $a, $b) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo findLexSmallestString("5525", 9, 2) . "\n"; // Output: "2050"
echo findLexSmallestString("74", 5, 1) . "\n";   // Output: "24"
echo findLexSmallestString("0011", 4, 2) . "\n"; // Output: "0011"
?>
```

### Explanation:

1. **Initialization**: Start with the original string `s` in both the queue and visited set.
2. **BFS Loop**: Process each string in the queue:
    - Compare with current best string
    - Generate two new strings by applying both operations
    - Add new strings to queue if not visited before
3. **Operation 1 (Add to odd indices)**: For each odd index in the string, add `a` to the digit and take modulo 10 to handle wrapping.
4. **Operation 2 (Rotation)**: Rotate the string right by `b` positions by concatenating the last `b` characters with the first `n-b` characters.
5. **Termination**: When the queue is empty, return the best string found.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://jackaltimer.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://www.buymeacoffee.com/assets/img/custom_images/orange_img.png" alt="Buy Me A Coffee" style="height: 41px !important;width: 174px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**