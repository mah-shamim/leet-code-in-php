3227\. Vowels Game in a String

**Difficulty:** Medium

**Topics:** `Math`, `String`, `Brainteaser`, `Game Theory`, `Weekly Contest 407`

Alice and Bob are playing a game on a string.

You are given a string `s`, Alice and Bob will take turns playing the following game where Alice starts **first**:

- On Alice's turn, she has to remove any **non-empty** substring[^1] from s that contains an **odd** number of vowels.
- On Bob's turn, he has to remove any **non-empty** substring[^1] from s that contains an **even** number of vowels.

The first player who cannot make a move on their turn loses the game. We assume that both Alice and Bob play **optimally**.

Return `true` if Alice wins the game, and `false` otherwise.

The English vowels are: `a`, `e`, `i`, `o`, and `u`.

**Example 1:**

- **Input:** s = "leetcoder"
- **Output:** true
- **Explanation:** Alice can win the game as follows:
  - Alice plays first, she can delete the underlined substring in <code>s = "<ins>leetco</ins>der"</code> which contains 3 vowels. The resulting string is `s = "der"`.
  - Bob plays second, he can delete the underlined substring in <code>s = "<ins>d</ins>er"</code> which contains 0 vowels. The resulting string is `s = "er"`.
  - Alice plays third, she can delete the whole string <code>s = "<ins>er</ins>"</code> which contains 1 vowel.
  - Bob plays fourth, since the string is empty, there is no valid play for Bob. So Alice wins the game.


**Example 2:**

- **Input:** s = "bbcd"
- **Output:** false
- **Explanation:** There is no valid play for Alice in her first turn, so Alice loses the game.

**Constraints:**

- <code>1 <= s.length <= 10<sup>5</sup></code>
- `s` consists only of lowercase English letters.


**Hint:**
1. If there are no vowels in the initial string, then Bob wins.
2. If the number of vowels in the initial string is odd, then Alice can remove the whole string on her first turn and win.
3. What if the number of vowels in the initial string is even? What’s the optimal play for Alice’s first turn?


[^1]: **Substring:** A **substring** is a contiguous sequence of characters within a string.



**Solution:**

We are going to solve the problem by analyzing the game theory properties of the string based on the count of vowels.

### Approach:

1. **Problem Analysis**: The game involves Alice and Bob taking turns to remove substrings from the string based on the number of vowels in the substring. Alice wins if she can make a move when Bob cannot.
2. **Key Insight**: If the string contains at least one vowel, Alice can always make a move that eventually leads to her victory. She can strategically remove substrings to leave Bob in a position where he cannot make a move. If there are no vowels, Alice cannot make her first move, so she loses.
3. **Algorithm**: Check for the presence of any vowel in the string. If found, return `true` indicating Alice wins; otherwise, return `false`.

Let's implement this solution in PHP: **[3227. Vowels Game in a String](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003227-vowels-game-in-a-string/solution.php)**

```php
<?php
/**
 * @param String $s
 * @return Boolean
 */
function doesAliceWin($s) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
var_dump(doesAliceWin("leetcoder")); // true
var_dump(doesAliceWin("bbcd"));      // false
var_dump(doesAliceWin("a"));         // true
var_dump(doesAliceWin("ae"));        // true
var_dump(doesAliceWin("zzz"));       // false
?>
```

### Explanation:

- The solution checks each character in the string to see if it is a vowel (a, e, i, o, u).
- If any vowel is found, Alice can win the game by making optimal moves, so the function returns `true`.
- If no vowels are found, Alice cannot make her first move, so the function returns `false`.

This approach efficiently determines the winner by leveraging the presence of vowels, ensuring optimal performance with a linear scan of the string. The time complexity is O(n), where n is the length of the string.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://jackaltimer.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**