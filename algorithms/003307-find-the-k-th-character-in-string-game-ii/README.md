3307\. Find the K-th Character in String Game II

**Difficulty:** Hard

**Topics:** `Math`, `Bit Manipulation`, `Recursion`

Alice and Bob are playing a game. Initially, Alice has a string `word = "a"`.

You are given a **positive** integer `k`. You are also given an integer array `operations`, where `operations[i]` represents the **type** of the <code>i<sup>th</sup></code> operation.

Now Bob will ask Alice to perform **all** operations in sequence:

- If `operations[i] == 0`, **append** a copy of `word` to itself.
- If `operations[i] == 1`, generate a new string by **changing** each character in `word` to its **next** character in the English alphabet, and **append** it to the _original_ `word`. For example, performing the operation on `"c"` generates `"cd"` and performing the operation on `"zb"` generates `"zbac"`.

Return _the value of the <code>k<sup>th</sup></code> character in `word` after performing all the operations_.

**Note** that the character `'z'` can be changed to `'a'` in the second type of operation.

**Example 1:**

- **Input:** k = 5, operations = [0,0,0]
- **Output:** "a"
- **Explanation:** Initially, `word == "a"`. Alice performs the three operations as follows:
  Appends `"a"` to `"a"`, `word` becomes `"aa"`.
  Appends `"aa"` to `"aa"`, `word` becomes `"aaaa"`.
  Appends `"aaaa"` to `"aaaa"`, `word` becomes `"aaaaaaaa"`.


**Example 2:**

- **Input:** k = 10, operations = [0,1,0,1]
- **Output:** "b"
- **Explanation:** nitially, `word == "a"`. Alice performs the four operations as follows:
  Appends `"a"` to `"a"`, `word` becomes `"aa"`.
  Appends `"bb"` to `"aa"`, `word` becomes `"aabb"`.
  Appends `"aabb"` to `"aabb"`, `word` becomes `"aabbaabb"`.
  Appends `"bbccbbcc"` to `"aabbaabb"`, `word` becomes `"aabbaabbbbccbbcc"`.


**Constraints:**

- <code>1 <= k <= 10<sup>14</sup></code>
- `1 <= operations.length <= 100`
- `operations[i]` is either 0 or 1.
- The input is generated such that `word` has **at least** `k` characters after all operations.


**Hint:**
1. Try to replay the operations <code>k<sup>th</sup></code> character was part of.
2. The <code>k<sup>th</sup></code> character is only affected if it is present in the first half of the string.


**Similar Questions:**
1. [848. Shifting Letters](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000848-shifting-letters)






**Solution:**

We need to determine the k-th character in a string after performing a series of operations. The string starts as "a", and each operation either appends a copy of the current string to itself (operation 0) or appends a transformed version of the string where each character is incremented by 1 in the alphabet (operation 1, with 'z' wrapping around to 'a'). Given that k can be as large as _**10<sup>14</sup>**_ and the number of operations can be up to 100, we need an efficient approach that avoids explicitly constructing the string.

### Approach
1. **Problem Analysis**: The key observation is that each operation doubles the length of the string. For operation 0, the second half is an exact copy of the first half. For operation 1, the second half is each character of the first half incremented by 1. The challenge is to efficiently determine the k-th character without constructing the entire string, especially since the final string length can be _**2<sup>100</sup>**_, which is infeasible to handle directly.

2. **Backward Simulation**: Instead of processing operations forward to build the string, we simulate the operations backward. Starting from the final string length _**2<sup>n</sup>**_ (where _**n**_ is the number of operations), we reduce the problem step-by-step:
   - For each operation from last to first, check if the k-th character is in the first half or the second half of the current string.
   - If it's in the first half, we simply proceed to the previous state (half the length).
   - If it's in the second half, we adjust k by subtracting half the length. If the operation was type 1, we note that the character was transformed (incremented by 1) and will need to reverse this transformation later.
   - To handle large lengths efficiently, we skip detailed processing when the half-length exceeds _**2<sup>48</sup>**_ (since _**2<sup>48</sup> > 10<sup>14</sup>**_), ensuring k is always in the first half in such cases.

3. **Base Case Handling**: After processing all operations backward, the base string is "a". The total transformations (shifts) applied during the backward pass are summed up modulo 26. The final character is derived by applying these shifts to 'a'.

Let's implement this solution in PHP: **[3307. Find the K-th Character in String Game II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003307-find-the-k-th-character-in-string-game-ii/solution.php)**

```php
<?php
/**
 * @param Integer $k
 * @param Integer[] $operations
 * @return String
 */
function kthCharacter($k, $operations) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
// Example 1
$k = 5;
$operations = [0, 0, 0];
echo kthCharacter($k, $operations) . "\n"; // Output: a

// Example 2
$k = 10;
$operations = [0, 1, 0, 1];
echo kthCharacter($k, $operations) . "\n"; // Output: b
?>
```

### Explanation:

1. **Initialization**: We start with `total_shift` set to 0, which will accumulate the number of transformations (increments) applied to the base character 'a'. The exponent `exp` is initialized to the number of operations _**n**_, representing the initial string length _**2<sup>n</sup>**_.

2. **Backward Processing**:
   - For each operation from last to first, we check if the current half-length (_**2<sup>exp-1</sup>**_) is manageable (less than _**2<sup>48</sup>**_). If so, we compute the half-length.
   - If _**k**_ is in the second half of the current string, we adjust _**k**_ by subtracting the half-length. If the operation was type 1, we increment `total_shift`.
   - If the half-length is too large (≥ _**2<sup>48</sup>**_), we skip detailed processing since _**k**_ will always be in the first half.
   - We decrement `exp` after each operation to move to the previous state (half the string length).

3. **Final Character Calculation**: After processing all operations, `total_shift` is taken modulo 26 to handle wrap-around. The result is obtained by shifting 'a' by `total_shift` positions in the alphabet.

This approach efficiently narrows down the position _**k**_ through backward simulation, avoiding the need to handle the exponentially large string directly, and leverages modular arithmetic to handle character transformations. The complexity is _**O(n)**_, where _**n**_ is the number of operations, making it suitable for large _**k**_.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**