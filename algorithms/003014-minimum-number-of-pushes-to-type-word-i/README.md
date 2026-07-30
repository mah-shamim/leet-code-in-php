3014\. Minimum Number of Pushes to Type Word I

**Difficulty:** Easy

**Topics:** `Mid Level`, `Math`, `String`, `Greedy`, `Weekly Contest 381`

You are given a string `word` containing **distinct** lowercase English letters.

Telephone keypads have keys mapped with **distinct** collections of lowercase English letters, which can be used to form words by pushing them. For example, the key `2` is mapped with `["a","b","c"]`, we need to push the key one time to type `"a"`, two times to type `"b"`, and three times to type `"c"`.

It is allowed to remap the keys numbered `2` to `9` to **distinct** collections of letters. The keys can be remapped to **any** amount of letters, but each letter **must** be mapped to **exactly** one key. You need to find the **minimum** number of times the keys will be pushed to type the string `word`.

Return _the **minimum** number of pushes needed to type `word` after remapping the keys_.

An example mapping of letters to keys on a telephone keypad is given below. Note that `1`, `*`, `#,` and `0` do **not** map to any letters.

![keypaddesc](https://assets.leetcode.com/uploads/2023/12/26/keypaddesc.png)

**Example 1:**

![keypadv1e1](https://assets.leetcode.com/uploads/2023/12/26/keypadv1e1.png)

- **Input:** word = "abcde"
- **Output:** 5
- **Explanation:**
  - The remapped keypad given in the image provides the minimum cost.
    - "a" -> one push on key 2
    - "b" -> one push on key 3
    - "c" -> one push on key 4
    - "d" -> one push on key 5
    - "e" -> one push on key 6
    - Total cost is 1 + 1 + 1 + 1 + 1 = 5.
  - It can be shown that no other mapping can provide a lower cost.

**Example 2:**

![keypadv1e2](https://assets.leetcode.com/uploads/2023/12/26/keypadv1e2.png)

- **Input:** word = "xycdefghij"
- **Output:** 12
- **Explanation:**
  - The remapped keypad given in the image provides the minimum cost.
    - "x" -> one push on key 2
    - "y" -> two pushes on key 2
    - "c" -> one push on key 3
    - "d" -> two pushes on key 3
    - "e" -> one push on key 4
    - "f" -> one push on key 5
    - "g" -> one push on key 6
    - "h" -> one push on key 7
    - "i" -> one push on key 8
    - "j" -> one push on key 9
    - Total cost is 1 + 2 + 1 + 2 + 1 + 1 + 1 + 1 + 1 + 1 = 12.
  - It can be shown that no other mapping can provide a lower cost.

**Example 3:**

- **Input:** word = "abcdefghijklmnopqrstuvwxyz"
- **Output:** 58

**Example 4:**

- **Input:** word = "a"
- **Output:** 1

**Example 5:**

- **Input:** word = "abcdefgh"
- **Output:** 8

**Example 6:**

- **Input:** word = "abcdefghi"
- **Output:** 10

**Constraints:**

- `1 <= word.length <= 26`
- `word` consists of lowercase English letters.
- All letters in `word` are distinct.


**Hint:**
1. We have 8 keys in total. We can type 8 characters with one push each, 8 different characters with two pushes each, and so on.
2. The optimal way is to map letters to keys evenly.


**Similar Questions:**
1. [17. Letter Combinations of a Phone Number](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000017-letter-combinations-of-a-phone-number)


**Solution:**

We solve the problem by observing that all letters are distinct, and we have exactly 8 keys available (2–9). The optimal strategy is to assign as many letters as possible to the first press position (1 push per letter), then the next batch to the second press position (2 pushes per letter), and so on, until all letters are mapped. This greedy distribution minimizes the total pushes because each additional press level costs more per letter.

## Approach

- We have exactly 8 keys, so at most 8 letters can be typed with 1 push, 8 more with 2 pushes, etc.
- Since all letters are distinct, their individual frequencies are all 1, so we don’t need to sort by frequency—every letter costs the same per press level.
- We greedily fill the lowest press-count levels first:
   - First, assign up to 8 letters to press count = 1.
   - Then, assign up to 8 remaining letters to press count = 2.
   - Continue until all letters are assigned.
- Sum the products of (number of letters at that level) × (press count) to get the total minimum pushes.

Let's implement this solution in PHP: **[3014. Minimum Number of Pushes to Type Word I](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003014-minimum-number-of-pushes-to-type-word-i/solution.php)**

```php
<?php
/**
 * @param String $word
 * @return Integer
 */
function minimumPushes(string $word): float|int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo minimumPushes("abcde") .  "\n";                            // Output: 5
echo minimumPushes("xycdefghij") .  "\n";                       // Output: 12
echo minimumPushes("abcdefghijklmnopqrstuvwxyz") .  "\n";       // Output: 58
echo minimumPushes("a") .  "\n";                                // Output: 1
echo minimumPushes("abcdefgh") .  "\n";                         // Output: 8
echo minimumPushes("**xycdefghij**") .  "\n";                   // Output: 10
?>
```

### Explanation:

- **Step 1:** Initialize `keys = 8` (since keys 2–9 are available), `pressCount = 1`, and `pushes = 0`.
- **Step 2:** While there are unassigned letters (`n > 0`):
   - Compute how many letters can be placed at the current press level: `canPlace = min(n, keys)`.
   - Add `canPlace * pressCount` to the total pushes.
   - Subtract `canPlace` from the remaining letters.
   - Increment `pressCount` for the next level.
- **Step 3:** Return the total pushes.
- This works because each press level has exactly 8 slots, and filling lower-cost slots first is always optimal since all letters have equal weight.

## Complexity Analysis

- **Time Complexity:** _**O(1)**_ – The loop runs at most 4 times because there are only 26 letters and 8 keys (26/8 ≈ 4 levels).
- **Space Complexity:** _**O(1)**_ – We use only a few integer variables.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**