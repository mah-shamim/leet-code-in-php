1639\. Number of Ways to Form a Target String Given a Dictionary

**Difficulty:** Hard

**Topics:** `Array`, `String`, `Dynamic Programming`

You are given a list of strings of the **same length** `words` and a string `target`.

Your task is to form `target` using the given `words` under the following rules:

- `target` should be formed from left to right.
- To form the <code>i<sup>th</sup></code> character (**0-indexed**) of `target`, you can choose the <code>k<sup>th</sup></code> character of the <code>j<sup>th</sup></code> string in words if `target[i] = words[j][k]`.
- Once you use the <code>k<sup>th</sup></code> character of the <code>j<sup>th</sup></code> string of `words`, you **can no longer** use the <code>x<sup>th</sup></code> character of any string in `words` where `x <= k`. In other words, all characters to the left of or at index `k` become unusuable for every string.
- Repeat the process until you form the string `target`.

**Notice** that you can use **multiple characters** from the **same string** in `words` provided the conditions above are met.

Return _the number of ways to form `target` from `words`_. Since the answer may be too large, return it modulo <code>10<sup>9</sup> + 7</code>.

**Example 1:**

- **Input:** words = ["acca","bbbb","caca"], target = "aba"
- **Output:** 6
- **Explanation:** There are 6 ways to form target.
  "aba" -> index 0 ("acca"), index 1 ("bbbb"), index 3 ("caca")
  "aba" -> index 0 ("acca"), index 2 ("bbbb"), index 3 ("caca")
  "aba" -> index 0 ("acca"), index 1 ("bbbb"), index 3 ("acca")
  "aba" -> index 0 ("acca"), index 2 ("bbbb"), index 3 ("acca")
  "aba" -> index 1 ("caca"), index 2 ("bbbb"), index 3 ("acca")
  "aba" -> index 1 ("caca"), index 2 ("bbbb"), index 3 ("caca")

**Example 2:**

- **Input:** words = ["abba","baab"], target = "bab"
- **Output:** 4
- **Explanation:** There are 4 ways to form target.
  "bab" -> index 0 ("baab"), index 1 ("baab"), index 2 ("abba")
  "bab" -> index 0 ("baab"), index 1 ("baab"), index 3 ("baab")
  "bab" -> index 0 ("baab"), index 2 ("baab"), index 3 ("baab")
  "bab" -> index 1 ("abba"), index 2 ("baab"), index 3 ("baab")



**Constraints:**


- `1 <= words.length <= 1000`
- `1 <= words[i].length <= 1000`
- All strings in `words` have the same length.
- `1 <= target.length <= 1000`
- `words[i]` and `target` contain only lowercase English letters.



**Hint:**
1. For each index i, store the frequency of each character in the <code>i<sup>th</sup></code> row.
2. Use dynamic programing to calculate the number of ways to get the target string using the frequency array.



**Solution:**

The problem requires finding the number of ways to form a `target` string from a dictionary of `words`, following specific rules about character usage. This is a combinatorial problem that can be solved efficiently using **Dynamic Programming (DP)** and preprocessing character frequencies.


### **Key Points**
1. **Constraints**:
   - Words are of the same length.
   - Characters in words can only be used in a left-to-right manner.
2. **Challenges**:
   - Efficiently counting ways to form `target` due to large constraints.
   - Avoid recomputation with memoization.
3. **Modulo**:
   - Since the result can be large, all calculations are done modulo <code>10<sup>9</sup> + 7</code>.


### **Approach**
The solution uses:
1. **Preprocessing**:
   - Count the frequency of each character at every position across all words.
2. **Dynamic Programming**:
   - Use a 2D DP table to calculate the number of ways to form the `target` string.

**Steps**:
1. Preprocess `words` into a frequency array (`counts`).
2. Define a DP function to recursively find the number of ways to form `target` using the preprocessed counts.


### **Plan**
1. **Input Parsing**:
   - Accept `words` and `target`.
2. **Preprocess**:
   - Create a `counts` array where `counts[j][char]` represents the frequency of `char` at position `j` in all words.
3. **Dynamic Programming**:
   - Use a recursive function with memoization to compute the number of ways to form `target` using characters from valid positions in `words`.
4. **Return the Result**:
   - Return the total count modulo <code>10<sup>9</sup> + 7</code>.

Let's implement this solution in PHP: **[1639. Number of Ways to Form a Target String Given a Dictionary](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001639-number-of-ways-to-form-a-target-string-given-a-dictionary/solution.php)**

```php
<?php
const MOD = 1000000007;
/**
 * @param String[] $words
 * @param String $target
 * @return Integer
 */
function numWays($words, $target) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

/**
 * Helper function for DP
 *
 * @param $i
 * @param $j
 * @param $counts
 * @param $target
 * @param $memo
 * @return float|int|mixed
 */
private function dp($i, $j, $counts, $target, &$memo) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example Usage
$words = ["acca", "bbbb", "caca"];
$target = "aba";
echo numWays($words, $target) . "\n"; // Output: 6

$words = ["abba", "baab"];
$target = "bab";
echo numWays($words, $target) . "\n"; // Output: 4
?>
```

### Explanation:

1. **Preprocessing Step**:
   - Build a `counts` array:
      - For each column in `words`, count the occurrences of each character.
   - Example: If `words = ["acca", "bbbb", "caca"]`, for the first column, `counts[0] = {'a': 1, 'b': 1, 'c': 1}`.

2. **Recursive DP**:
   - Define `dp(i, j)`:
      - `i` is the current index in `target`.
      - `j` is the current position in `words`.
   - Base Cases:
      - If `i == len(target)`: Entire target formed → return 1.
      - If `j == len(words[0])`: No more columns to use → return 0.
   - Recurrence:
      - Option 1: Use `counts[j][target[i]]` characters from position `j`.
      - Option 2: Skip position `j`.

3. **Optimization**:
   - Use a memoization table to store results of overlapping subproblems.


### **Example Walkthrough**
**Input**:  
`words = ["acca", "bbbb", "caca"], target = "aba"`

1. **Preprocessing**:
   - `counts[0] = {'a': 2, 'b': 0, 'c': 1}`
   - `counts[1] = {'a': 0, 'b': 3, 'c': 0}`
   - `counts[2] = {'a': 1, 'b': 0, 'c': 2}`
   - `counts[3] = {'a': 2, 'b': 0, 'c': 1}`

2. **DP Calculation**:
   - `dp(0, 0)`: How many ways to form `"aba"` starting from column 0.
   - Recursively calculate, combining the use of `counts` and skipping columns.

**Output**: `6`


### **Time Complexity**
1. **Preprocessing**: _**O(n x m)**_, where `n` is the number of words and `m` is their length.
2. **Dynamic Programming**: _**O(l x m)**_, where `l` is the length of the target.
3. **Total**: _**O(n x m + l x m)**_.


### **Output for Example**
- **Input**:  
  `words = ["acca", "bbbb", "caca"], target = "aba"`
- **Output**: `6`


This problem is a great example of combining preprocessing and dynamic programming to solve a combinatorial challenge efficiently.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
