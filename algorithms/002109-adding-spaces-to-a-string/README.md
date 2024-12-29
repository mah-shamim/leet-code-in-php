2109\. Adding Spaces to a String

**Difficulty:** Medium

**Topics:** `Array`, `Two Pointers`, `String`, `Simulation`

You are given a 0-indexed string s and a 0-indexed integer array spaces that describes the indices in the original string where spaces will be added. Each space should be inserted before the character at the given index.

- For example, given `s = "EnjoyYourCoffee"` and `spaces = [5, 9]`, we place spaces before `'Y'` and `'C'`, which are at indices `5` and `9` respectively. Thus, we obtain `"Enjoy Your Coffee"`.

Return _the modified string **after** the spaces have been added_.

**Example 1:**

- **Input:** s = "LeetcodeHelpsMeLearn", spaces = [8,13,15]
- **Output:** "Leetcode Helps Me Learn"
- **Explanation:** The indices 8, 13, and 15 correspond to the underlined characters in "LeetcodeHelpsMeLearn".
  We then place spaces before those characters.

**Example 2:**

- **Input:** s = "icodeinpython", spaces = [1,5,7,9]
- **Output:** "i code in py thon"
- **Explanation:** The indices 1, 5, 7, and 9 correspond to the underlined characters in "icodeinpython".
  We then place spaces before those characters.


**Example 3:**

- **Input:** s = "spacing", spaces = [0,1,2,3,4,5,6]
- **Output:** " s p a c i n g"
- **Explanation:** We are also able to place spaces before the first character of the string.



**Constraints:**

- <code>1 <= s.length <= 3 * 10<sup>5</sup></code>
- `s` consists only of lowercase and uppercase English letters.
- <code>1 <= spaces.length <= 3 * 10<sup>5</sup></code>
- `0 <= spaces[i] <= s.length - 1`
- All the values of `spaces` are **strictly increasing**.


**Hint:**
1. Create a new string, initially empty, as the modified string. Iterate through the original string and append each character of the original string to the new string. However, each time you reach a character that requires a space before it, append a space before appending the character.
2. Since the array of indices for the space locations is sorted, use a pointer to keep track of the next index to place a space. Only increment the pointer once a space has been appended.
3. Ensure that your append operation can be done in O(1).



**Solution:**

We can use an efficient approach with two pointers. Here's how the implementation in PHP 5.6 would look:

### Solution Explanation:
1. Use a pointer `spaceIndex` to track the current position in the `spaces` array.
2. Iterate through the string `s` using a loop.
3. Check whether the current index in the string matches the current value in the `spaces` array. If it does, append a space to the result and move the `spaceIndex` pointer forward.
4. Append the current character of the string to the result.
5. Return the final result as a single string.

This approach ensures that we process the input efficiently, taking advantage of the sorted order of the `spaces` array.

Let's implement this solution in PHP: **[2109. Adding Spaces to a String](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002109-adding-spaces-to-a-string/solution.php)**

```php
<?php
 /**
 * @param String $s
 * @param Integer[] $spaces
 * @return String
 */
function addSpaces($s, $spaces) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example 1
$s1 = "LeetcodeHelpsMeLearn";
$spaces1 = [8, 13, 15];
echo addSpaces($s1, $spaces1) . "\n"; // Output: "Leetcode Helps Me Learn"

// Example 2
$s2 = "icodeinpython";
$spaces2 = [1, 5, 7, 9];
echo addSpaces($s2, $spaces2) . "\n"; // Output: "i code in py thon"

// Example 3
$s3 = "spacing";
$spaces3 = [0, 1, 2, 3, 4, 5, 6];
echo addSpaces($s3, $spaces3) . "\n"; // Output: " s p a c i n g"
?>
```

### Explanation:

1. **Efficient Appending:** The `.` operator in PHP is used to append strings efficiently.
2. **Two Pointers:** The `spaceIndex` pointer ensures we only process the `spaces` array once.
3. **Time Complexity:**
   - Iterating over the string takes _**O(n)**_, where _**n**_ is the length of the string.
   - Checking against the `spaces` array pointer takes _**O(m)**_, where _**m**_ is the length of the `spaces` array.
   - Combined: _**O(n + m)**_, which is optimal given the constraints.

This solution adheres to the constraints and is efficient even for large inputs.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**



