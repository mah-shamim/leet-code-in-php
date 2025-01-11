2381\. Shifting Letters II

**Difficulty:** Medium

**Topics:** `Array`, `String`, `Prefix Sum`

You are given a string `s` of lowercase English letters and a 2D integer array `shifts` where <code>shifts[i] = [start<sub>i</sub>, end<sub>i</sub>, direction<sub>i</sub>]</code>. For every `i`, **shift** the characters in `s` from the index <code>start<sub>i</sub></code> to the index <code>end<sub>i</sub></code> (**inclusive**) forward if <code>direction<sub>i</sub> = 1</code>, or shift the characters backward if <code>direction<sub>i</sub> = 0</code>.

Shifting a character **forward** means replacing it with the next letter in the alphabet (wrapping around so that `'z'` becomes `'a'`). Similarly, shifting a character **backward** means replacing it with the **previous** letter in the alphabet (wrapping around so that `'a'` becomes `'z'`).

Return _the final string after all such shifts to `s` are applied_.

**Example 1:**

- **Input:** s = "abc", shifts = [[0,1,0],[1,2,1],[0,2,1]]
- **Output:** "ace"
- **Explanation:** Firstly, shift the characters from index 0 to index 1 backward. Now s = "zac".
  Secondly, shift the characters from index 1 to index 2 forward. Now s = "zbd".
  Finally, shift the characters from index 0 to index 2 forward. Now s = "ace".

**Example 2:**

- **Input:** s = "dztz", shifts = [[0,0,0],[1,1,1]]
- **Output:** "catz"
- **Explanation:** Firstly, shift the characters from index 0 to index 0 backward. Now s = "cztz".
  Finally, shift the characters from index 1 to index 1 forward. Now s = "catz".



**Constraints:**

- <code>1 <= s.length, shifts.length <= 5 * 10<sup>4</sup></code>
- `shifts[i].length == 3`
- <code>0 <= start<sub>i</sub> <= end<sub>i</sub> < s.length</code>
- <code>0 <= direction<sub>i</sub> <= 1</code>
- `s` consists of lowercase English letters.


**Hint:**
1. Instead of shifting every character in each shift, could you keep track of which characters are shifted and by how much across all shifts?
2. Try marking the start and ends of each shift, then perform a prefix sum of the shifts.



**Solution:**

We need to avoid shifting the characters one by one for each shift, as this would be too slow for large inputs. Instead, we can use a more optimal approach by leveraging a technique called the **prefix sum**.

### Steps:
1. **Mark the shift boundaries**: Instead of shifting each character immediately, we mark the shift effects at the start and end of each range.
2. **Apply prefix sum**: After marking all the shifts, we can compute the cumulative shifts at each character using the prefix sum technique. This allows us to efficiently apply the cumulative shifts to each character.
3. **Perform the shifts**: Once we know the total shift for each character, we can apply the shifts (either forward or backward) to the string.

Let's implement this solution in PHP: **[2381. Shifting Letters II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002381-shifting-letters-ii/solution.php)**

```php
<?php
/**
 * @param String $s
 * @param Integer[][] $shifts
 * @return String
 */
function shiftingLetters($s, $shifts) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test the function
$s1 = "abc";
$shifts1 = [[0, 1, 0], [1, 2, 1], [0, 2, 1]];
echo shiftingLetters($s1, $shifts1) . "\n";  // Output: "ace"

$s2 = "dztz";
$shifts2 = [[0, 0, 0], [1, 1, 1]];
echo shiftingLetters($s2, $shifts2) . "\n";  // Output: "catz"
?>
```

### Explanation:

1. For each shift `[start, end, direction]`, we'll increment a `shift` array at `start` and decrement at `end + 1`. This allows us to track the start and end of the shift range.
2. After processing all the shifts, we apply a prefix sum on the `shift` array to get the cumulative shift at each index.
3. Finally, we apply the cumulative shift to each character in the string.

### Explanation of Code:
1. **Input Parsing**: We convert the input string `s` into an array of characters for easier manipulation.
2. **Shift Array**: We initialize a `shift` array of size `n + 1` to zero. This array is used to track the shift effects. For each shift `[start, end, direction]`, we adjust the values at `shift[start]` and `shift[end + 1]` to reflect the start and end of the shift.
3. **Prefix Sum**: We calculate the total shift for each character by iterating over the `shift` array and maintaining a cumulative sum of shifts.
4. **Character Shifting**: For each character in the string, we compute the final shifted character using the formula `(ord(currentChar) - ord('a') + totalShift) % 26`, which accounts for the circular nature of the alphabet.
5. **Return Result**: The final string is obtained by converting the character array back into a string and returning it.

### Time Complexity:
- **Time complexity**: `O(n + m)`, where `n` is the length of the string `s` and `m` is the number of shifts. This is because we iterate through the string and the list of shifts once each.
- **Space complexity**: `O(n)`, where `n` is the length of the string `s`, due to the space needed for the `shift` array.

This solution efficiently handles the problem even with the upper limits of the input constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
