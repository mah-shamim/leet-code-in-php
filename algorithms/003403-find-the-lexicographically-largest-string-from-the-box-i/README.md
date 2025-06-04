3403\. Find the Lexicographically Largest String From the Box I

**Difficulty:** Medium

**Topics:** `Two Pointers`, `String`, `Enumeration`

You are given a string `word`, and an integer `numFriends`.

Alice is organizing a game for her `numFriends` friends. There are multiple rounds in the game, where in each round:

- `word` is split into `numFriends` **non-empty** strings, such that no previous round has had the **exact** same split.
- All the split words are put into a box.

Find the lexicographically largest[^1] string from the box after all the rounds are finished.

**Example 1:**

- **Input:** word = "dbca", numFriends = 2
- **Output:** "dbc"
- **Explanation:** All possible splits are:
    - `"d"` and `"bca"`.
    - `"db"` and `"ca"`.
    - `"dbc"` and `"a"`.


**Example 2:**

- **Input:** word = "gggg", numFriends = 4
- **Output:** "g"
- **Explanation:** The only possible split is: `"g"`, `"g"`, `"g"`, and `"g"`.



**Constraints:**

- <code>1 <= word.length <= 5 * 10<sup>3</sup></code>
- `word` consists only of lowercase English letters.
- `1 <= numFriends <= word.length`


**Hint:**
1. Find lexicographically largest substring of size `n - numFriends + 1` or less starting at every index.

[^1]: **Lexicographically Smaller** : A string `a` is **lexicographically smaller** than a string `b` if in the first position where `a` and `b` differ, string `a` has a letter that appears earlier in the alphabet than the corresponding letter in `b`. 
If the first `min(a.length, b.length)` characters do not differ, then the shorter string is the lexicographically smaller one.

**Solution:**

We can leverage dynamic programming with bitmasking. The idea is to minimize the cost by considering each point in the first group and trying to connect it to all points in the second group.

### Dynamic Programming (DP) Approach with Bitmasking

#### Steps:
1. **State Representation**:
   - Use a DP table `dp[i][mask]` where:
      - `i` is the index in the first group (ranging from `0` to `size1-1`).
      - `mask` is a bitmask representing which points in the second group have been connected.

2. **State Transition**:
   - For each point in the first group, try connecting it to every point in the second group, updating the DP table accordingly.
   - If a new point in the second group is connected, update the corresponding bit in the mask.

3. **Base Case**:
   - Start with `dp[0][0] = 0` (no connections initially).

4. **Goal**:
   - Compute the minimum cost for `dp[size1][(1 << size2) - 1]`, which represents connecting all points from both groups.

Let's implement this solution in PHP: **[3403. Find the Lexicographically Largest String From the Box I](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003403-find-the-lexicographically-largest-string-from-the-box-i/solution.php)**

```php
<?php
/**
 * @param Integer[][] $cost
 * @return Integer
 */
function connectTwoGroups($cost) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test Case 1
echo answerString("dbca", 2) . "\n"; // Output: "dbc"

// Test Case 2
echo answerString("gggg", 4) . "\n"; // Output: "g"
?>
```

### Explanation:

- The DP array `dp[i][mask]` stores the minimum cost to connect the first `i` points from group 1 with the points in group 2 as indicated by `mask`.
- The nested loops iterate over each combination of `i` and `mask`, trying to find the optimal cost by considering all possible connections.
- In the end, the solution calculates the minimum cost considering the scenarios where some points in the second group may still be unconnected, ensuring all points are connected.

This approach efficiently handles the problem's constraints and ensures the minimum cost for connecting the two groups.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**


#443, #444 leetcode problems 003403-find-the-lexicographically-largest-string-from-the-box-i submissions 1374515723

Thanks for solving the problem of "Find the Lexicographically Largest String From the Box I"