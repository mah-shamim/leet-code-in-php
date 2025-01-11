1405\. Longest Happy String

**Difficulty:** Medium

**Topics:** `String`, `Greedy`, `Heap (Priority Queue)`

A string `s` is called **happy** if it satisfies the following conditions:

- `s` only contains the letters `'a'`, `'b'`, and `'c'`.
- `s` does not contain any of `"aaa"`, `"bbb"`, or `"ccc"` as a substring.
- `s` contains at most `a` occurrences of the letter `'a'`.
- `s` contains at most `b` occurrences of the letter `'b'`.
- `s contains at most `c` occurrences of the letter `'c'`.

Given three integers `a`, `b`, and `c`, return _the **longest possible happy** string_. If there are multiple longest happy strings, return _any of them_. If there is no such string, return _the empty string `""`_.

A **substring** is a contiguous sequence of characters within a string.

**Example 1:**

- **Input:** a = 1, b = 1, c = 7
- **Output:** "ccaccbcc"
- **Explanation:** "ccbccacc" would also be a correct answer.

**Example 2:**

- **Input:** a = 7, b = 1, c = 0
- **Output:** "aabaa"
- **Explanation:** It is the only correct answer in this case.


**Constraints:**

- `0 <= a, b, c <= 100`
- `a + b + c > 0`


**Hint:**
1. Use a greedy approach.
2. Use the letter with the maximum current limit that can be added without breaking the condition.



**Solution:**

We can employ a greedy algorithm. The approach is based on the following steps:

1. **Use a Priority Queue (Max Heap)**:
   - We can use a max heap to keep track of the characters and their remaining counts. This allows us to always choose the character with the highest remaining count while ensuring that we don't exceed two consecutive occurrences of the same character.

2. **Construct the String**:
   - Continuously extract the character with the highest count from the heap and append it to the result string.
   - If the last two characters in the result string are the same, we cannot append the same character again. Instead, we will append the next character with the highest count.
   - If we can append a character, we reduce its count and continue the process.

3. **Return the Result**:
   - If at any point we can't append a character without breaking the happy string conditions, we stop the process.

Let's implement this solution in PHP: **[1405. Longest Happy String](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001405-longest-happy-string/solution.php)**

```php
<?php
/**
 * @param Integer $a
 * @param Integer $b
 * @param Integer $c
 * @return String
 */
function longestHappyString($a, $b, $c) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage
$a1 = 1; $b1 = 1; $c1 = 7;
echo "Input: a = $a1, b = $b1, c = $c1\n";
echo "Output: " . longestHappyString($a1, $b1, $c1) . "\n"; // Output: "ccaccbcc" or similar

$a2 = 7; $b2 = 1; $c2 = 0;
echo "Input: a = $a2, b = $b2, c = $c2\n";
echo "Output: " . longestHappyString($a2, $b2, $c2) . "\n"; // Output: "aabaa"
?>
```

### Explanation:

1. **Max Heap Creation**:
   - We initialize an array `$maxHeap` with the counts of characters `'a'`, `'b'`, and `'c'`.

2. **Sorting the Heap**:
   - We use `usort` to sort the heap based on the remaining counts in descending order.

3. **Building the Result String**:
   - While there are characters in the heap:
      - Sort the heap to ensure we always access the character with the highest count.
      - If the last two characters in the result string are the same as the character with the highest count, we need to check if we can add a different character.
      - If we can add the character, we decrement its count and continue.

4. **Return**:
   - Finally, we return the constructed happy string.

### Complexity Analysis
- **Time Complexity**: The solution runs in _**O(n log m)**_ where _**n**_ is the total number of characters we might output (i.e., _**a + b + c**_), and _**m**_ is the number of different characters (which is at most 3).
- **Space Complexity**: The space complexity is _**O(1)**_ for the counts since we only keep a constant number of characters in the heap.

This solution efficiently constructs the longest happy string while adhering to the constraints specified in the problem.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**