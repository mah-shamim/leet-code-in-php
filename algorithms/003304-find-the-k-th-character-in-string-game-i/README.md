3304\. Find the K-th Character in String Game I

**Difficulty:** Easy

**Topics:** `Math`, `Bit Manipulation`, `Recursion`, `Simulation`

Alice and Bob are playing a game. Initially, Alice has a string `word = "a"`.

You are given a **positive** integer `k`.

Now Bob will ask Alice to perform the following operation **forever**:

- Generate a new string by **changing** each character in `word` to its **next** character in the English alphabet, and **append** it to the _original_ `word`.

For example, performing the operation on `"c"` generates `"cd" `and performing the operation on `"zb"` generates `"zbac"`.

Return the value of the <code>k<sup>th</sup></code> character in `word`, after enough operations have been done for `word` to have at least `k` characters.

Note that the character `'z'` can be changed to `'a'` in the operation.

**Example 1:**

- **Input:** k = 5
- **Output:** "b"
- **Explanation:** Initially, `word = "a"`. We need to do the operation three times:
   - Generated string is `"b"`, word becomes `"ab"`.
   - Generated string is `"bc"`, word becomes `"abbc"`.
   - Generated string is `"bccd"`, word becomes `"abbcbccd"`.


**Example 2:**

- **Input:** k = 10
- **Output:** "c"

**Constraints:**
- `1 <= k <= 500`


**Hint:**
1. The constraints are small. Construct the string by simulating the operations.


**Similar Questions:**
1. [848. Shifting Letters](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000848-shifting-letters)






**Solution:**

We need to find the k-th character in a string that is constructed by repeatedly performing operations where each character in the current string is replaced by its next character in the alphabet (with 'z' wrapping around to 'a'), and this new string is appended to the original string. The initial string is "a".

### Approach
1. **Initialization**: Start with the initial string "a".
2. **Simulation of Operations**: While the length of the current string is less than `k`, perform the following operations:
   - **Generate Next String**: For each character in the current string, replace it with the next character in the alphabet ('a' follows 'z').
   - **Append Next String**: Append this newly generated string to the original string.
3. **Result Extraction**: Once the string's length is at least `k`, return the k-th character (1-based index) of the constructed string.

This approach efficiently builds the string by simulating each operation step-by-step until the string has at least `k` characters. Given the constraint that `k` is at most 500, the maximum length of the string after 9 operations is 512 (2<sup>9</sup>), which is manageable and ensures the solution is efficient.

Let's implement this solution in PHP: **[3304. Find the K-th Character in String Game I](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003304-find-the-k-th-character-in-string-game-i/solution.php)**

```php
<?php
/**
 * @param Integer $k
 * @return String
 */
function kthCharacter($k) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo kthCharacter(5);  // Output: b
echo "\n";
echo kthCharacter(10); // Output: c
?>
```

### Explanation:

1. **Initialization**: The initial string `$s` is set to "a".
2. **Loop Until String Length >= k**: The loop continues as long as the length of `$s` is less than `k`.
   - **Generate Next String (`$t`)**: For each character in `$s`, the next character in the alphabet is computed. If the character is 'z', it wraps around to 'a'; otherwise, it is incremented to the next character (e.g., 'a' becomes 'b').
   - **Append Next String**: The generated string `$t` is appended to `$s`, effectively doubling the length of `$s` in each iteration.
3. **Return k-th Character**: Once the loop exits, the k-th character (1-based) is accessed at index `$k - 1` in the string `$s` and returned.

This approach efficiently constructs the string by leveraging the operations described, ensuring that the k-th character is found by directly simulating the process until the string is sufficiently long. The solution handles the character wrapping from 'z' to 'a' and efficiently builds the string in logarithmic time relative to `k`.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**