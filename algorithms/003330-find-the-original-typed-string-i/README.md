3330\. Find the Original Typed String I

**Difficulty:** Easy

**Topics:** `String`

Alice is attempting to type a specific string on her computer. However, she tends to be clumsy and **may** press a key for too long, resulting in a character being typed **multiple** times.

Although Alice tried to focus on her typing, she is aware that she may still have done this **at most** _once_.

You are given a string `word`, which represents the **final** output displayed on Alice's screen.

Return the total number of _possible_ original strings that Alice _might_ have intended to type.

**Example 1:**

- **Input:** word = "abbcccc"
- **Output:** 5
- **Explanation:** The possible strings are: `"abbcccc"`, `"abbccc"`, `"abbcc"`, `"abbc"`, and `"abcccc"`.

**Example 2:**

- **Input:** word = "abcd"
- **Output:** 1
- **Explanation:** The only possible string is `"abcd"`.

**Example 3:**

- **Input:** word = "aaaa"
- **Output:** 4

**Constraints:**

- `1 <= word.length <= 100`
- `word` consists only of lowercase English letters.


**Hint:**
1. Any group of consecutive characters might have been the mistake.


**Similar Questions:**
1. [500. Keyboard Row](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000500-keyboard-row)
2. [2810. Faulty Keyboard](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002810-faulty-keyboard)





**Solution:**

We need to determine the number of possible original strings Alice might have intended to type, given that she may have pressed a key for too long at most once, resulting in one or more duplicate characters in a contiguous run. The key insight is that each contiguous run of characters in the input string could be the source of the mistake, and for each run of length `L`, there are `L-1` possible original strings (since the original run could have been of any length from 1 to `L-1`). Additionally, the original string without any mistake is also a possibility.

### Approach
1. **Problem Analysis**: The problem involves analyzing the input string to identify contiguous runs of the same character. For each such run, if its length is `L`, Alice could have intended the run to be of any length from 1 to `L-1` (since pressing a key too long would extend the run by at least one character). The total number of possible original strings is the sum of:
   - The original string itself (1 possibility).
   - For each run of length `L`, `L-1` possibilities where one or more extra characters from that run are removed (leaving at least one character in the run).

2. **Algorithm Selection**: The algorithm involves traversing the string to break it into contiguous runs of the same character. For each run, the number of possibilities contributed is `L-1`, where `L` is the length of the run. The total number of original strings is then `1 + sum(L-1 for all runs)`.

3. **Complexity Analysis**: The algorithm processes each character in the string exactly once, making the time complexity O(n), where n is the length of the string. The space complexity is O(1) as no additional data structures are used beyond simple variables.

Let's implement this solution in PHP: **[3330. Find the Original Typed String I](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/003330-find-the-original-typed-string-i/solution.php)**

```php
<?php
/**
 * @param String $word
 * @return Integer
 */
function possibleStringCount($word) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo possibleStringCount("abbcccc") . "\n"; // Output: 5
echo possibleStringCount("abcd") . "\n";    // Output: 1
echo possibleStringCount("aaaa") . "\n";    // Output: 4
?>
```

### Explanation:

1. **Initialization**: Start with `total = 1` to account for the original string without any mistake.
2. **Traverse the String**: Use a while loop to process each character in the string:
   - **Identify Runs**: For each character at position `i`, find the end of the contiguous run (`j`) where all characters from `i` to `j-1` are the same.
   - **Calculate Run Length**: The length of the run is `j - i`.
   - **Update Total**: Add `len - 1` to `total` (since each run of length `L` contributes `L-1` possible original strings).
   - **Move to Next Run**: Set `i = j` to skip the processed run and move to the next distinct character.
3. **Return Result**: The final value of `total` is the number of possible original strings Alice might have intended to type.

This approach efficiently counts all possible original strings by considering each contiguous run's potential contributions, leveraging the constraint that at most one mistake (a single extended run) could have occurred. The solution optimally processes the string in linear time.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**