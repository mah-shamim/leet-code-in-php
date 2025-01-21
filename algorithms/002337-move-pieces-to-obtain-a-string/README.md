2337\. Move Pieces to Obtain a String

**Difficulty:** Medium

**Topics:** `Two Pointers`, `String`

You are given two strings `start` and `target`, both of length `n`. Each string consists only of the characters `'L'`, `'R'`, and `'_'` where:

- The characters `'L'` and `'R'` represent pieces, where a piece `'L'` can move to the **left** only if there is a **blank** space directly to its left, and a piece `'R'` can move to the **right** only if there is a **blank** space directly to its right.
- The character `'_'` represents a blank space that can be occupied by **any** of the `'L'` or `'R'` pieces.

Return _`true` if it is possible to obtain the string `target` by moving the pieces of the string `start` any number of times. Otherwise, return `false`_.

**Example 1:**

- **Input:** start = "_L__R__R_", target = "L______RR"
- **Output:** true
- **Explanation:** We can obtain the string target from start by doing the following moves:
  - Move the first piece one step to the left, start becomes equal to "**L**___R__R_".
  - Move the last piece one step to the right, start becomes equal to "L___R___R".
  - Move the second piece three steps to the right, start becomes equal to "L______RR".
    Since it is possible to get the string target from start, we return true.

**Example 2:**

- **Input:** start = "R_L_", target = "__LR"
- **Output:** false
- **Explanation:** The 'R' piece in the string start can move one step to the right to obtain "_**R**L_".
  After that, no pieces can move anymore, so it is impossible to obtain the string target from start.


**Example 3:**

- **Input:** start = "_R", target = "R_"
- **Output:** false
- **Output:** The piece in the string start can move only to the right, so it is impossible to obtain the string target from start.



**Constraints:**

- `n == start.length == target.length`
- <code>1 <= n <= 10<sup>5</sup></code>
- `start` and `target` consist of the characters `'L'`, `'R'`, and `'_'`.


**Hint:**
1. After some sequence of moves, can the order of the pieces change?
2. Try to match each piece in s with a piece in e.



**Solution:**

We need to check if we can transform the string `start` into the string `target` by moving pieces ('L' and 'R') as per the given rules. The main constraints to consider are:

- 'L' can only move left (and cannot cross other 'L' or 'R' pieces).
- 'R' can only move right (and cannot cross other 'L' or 'R' pieces).
- We can use any blank spaces ('_') to move pieces around.

### Plan:

1. **Length Check**: First, check if both strings have the same length. If they don't, return `false` immediately.

2. **Character Frequency Check**: The number of 'L's, 'R's, and '_' in the `start` string must match the respective counts in the `target` string because the pieces cannot be duplicated or destroyed, only moved.

3. **Piece Matching Using Two Pointers**:
   - Traverse through both strings (`start` and `target`).
   - Check if each piece ('L' or 'R') in `start` can move to its corresponding position in `target`.
   - Specifically:
      - 'L' should always move to the left (i.e., it must not be in a position where a piece in `target` should move right).
      - 'R' should always move to the right (i.e., it must not be in a position where a piece in `target` should move left).

### Algorithm Explanation:

1. **Filter `L` and `R` Positions:**
   - Remove all `_` from both strings `start` and `target` to compare the sequence of `L` and `R`. If the sequences differ, return `false` immediately.

2. **Two-Pointer Traversal:**
   - Use two pointers to iterate over the characters in `start` and `target`.
   - Ensure that:
      - For `L`, the piece in `start` can only move **left**, so its position in `start` should be greater than or equal to its position in `target`.
      - For `R`, the piece in `start` can only move **right**, so its position in `start` should be less than or equal to its position in `target`.

3. **Output Result:**
   - If all conditions are satisfied during traversal, return `true`. Otherwise, return `false`.

Let's implement this solution in PHP: **[2337. Move Pieces to Obtain a String](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002337-move-pieces-to-obtain-a-string/solution.php)**

```php
<?php
/**
 * @param String $start
 * @param String $target
 * @return Boolean
 */
function canChange($start, $target) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
var_dump(canChange("_L__R__R_", "L______RR")); // true
var_dump(canChange("R_L_", "__LR"));          // false
var_dump(canChange("_R", "R_"));              // false
?>
```

### Explanation:

1. **Initial Checks**: First, we check the length of both strings and ensure the counts of 'L' and 'R' are the same in both strings. If not, return `false`.

2. **Two Pointers Logic**: We use two pointers, `i` and `j`, to traverse both strings:
   - Skip over the blank spaces ('_') since they don't affect the movement of the pieces.
   - If the characters at `i` and `j` in `start` and `target` differ, return `false` (as we cannot move pieces to different characters).
   - If an 'L' is found in `start` and is at a position greater than its target position, or if an 'R' is found in `start` and is at a position smaller than its target position, return `false` (since 'L' can only move left and 'R' can only move right).

3. **Edge Cases**: The solution handles all possible edge cases, such as:
   - Different counts of 'L' or 'R' in `start` and `target`.
   - Inability to move pieces due to constraints.

### Time Complexity:

- The time complexity is O(n), where `n` is the length of the input strings. This is because we traverse each string only once.

### Space Complexity:

- The space complexity is O(1), as we are only using a fixed amount of extra space.

### Complexity Analysis:
1. **Time Complexity:**
   - Filtering underscores takes _**O(n)**_.
   - Two-pointer traversal takes _**O(n)**_.
   - Overall: _**O(n)**_.

2. **Space Complexity:**
   - Two strings (`$startNoUnderscore` and `$targetNoUnderscore`) are created, each of size _**O(n)**_.
   - Overall: _**O(n)**_.

### Explanation of Test Cases:
1. **Input:** `_L__R__R_`, `L______RR`
   - The sequence of `L` and `R` matches.
   - Each piece can be moved to the required position following the rules.
   - **Output:** `true`.

2. **Input:** `R_L_`, `__LR`
   - The sequence of `L` and `R` matches.
   - The `R` piece cannot move left; hence, the transformation is impossible.
   - **Output:** `false`.

3. **Input:** `_R`, `R_`
   - The `R` piece cannot move left; hence, the transformation is impossible.
   - **Output:** `false`.

This implementation is efficient and adheres to the problem constraints, making it suitable for large input sizes.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
