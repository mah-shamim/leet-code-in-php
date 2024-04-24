3121\. Count the Number of Special Characters II

Easy

You are given a string `word`. A letter `c` is called **special** if it appears **both** in lowercase and uppercase in `word`, and `every` lowercase occurrence of `c` appears before the **first** uppercase occurrence of `c`.

Return the number of **special** letters in `word`.

**Example 1:**

- **Input:** word = "aaAbcBC"
- **Output:** 3
- **Explanation:** The special characters are `'a'`, `'b'`, and `'c'`.

**Example 2:**

**Input:** word = "abc"
**Output:** 0
**Explanation:** There are no special characters in `word`.

**Example 3:**

**Input:** "AbBCab"
**Output:** [0,1]
**Explanation:** There are no special characters in `word`.

**Constraints:**

- <code>1 <= word.length <= 2 * 10<sup>5</sup></code>
- `word` consists of only lowercase and uppercase English letters.
