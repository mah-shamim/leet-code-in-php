2182\. Construct String With Repeat Limit

**Difficulty:** Medium

**Topics:** `Hash Table`, `String`, `Greedy`, `Heap (Priority Queue)`, `Counting`

You are given a string `s` and an integer `repeatLimit`. Construct a new string `repeatLimitedString` using the characters of `s` such that no letter appears **more than** `repeatLimit` times **in a row**. You do **not** have to use all characters from `s`.

Return _the **lexicographically largest** `repeatLimitedString` possible_.

A string `a` is **lexicographically larger** than a string `b` if in the first position where `a` and `b` differ, string `a` has a letter that appears later in the alphabet than the corresponding letter in `b`. If the first `min(a.length, b.length)` characters do not differ, then the longer string is the lexicographically larger one.

**Example 1:**

- **Input:** s = "cczazcc", repeatLimit = 3
- **Output:** "zzcccac"
- **Explanation:** We use all of the characters from s to construct the repeatLimitedString "zzcccac".
  - The letter 'a' appears at most 1 time in a row.
  - The letter 'c' appears at most 3 times in a row.
  - The letter 'z' appears at most 2 times in a row.
  - Hence, no letter appears more than repeatLimit times in a row and the string is a valid repeatLimitedString.
  - The string is the lexicographically largest repeatLimitedString possible so we return "zzcccac".
  - Note that the string "zzcccca" is lexicographically larger but the letter 'c' appears more than 3 times in a row, so it is not a valid repeatLimitedString.

**Example 2:**

- **Input:** s = "aababab", repeatLimit = 2
- **Output:** "bbabaa"
- **Explanation:** We use only some of the characters from s to construct the repeatLimitedString "bbabaa".
  - The letter 'a' appears at most 2 times in a row.
  - The letter 'b' appears at most 2 times in a row.
  - Hence, no letter appears more than repeatLimit times in a row and the string is a valid repeatLimitedString.
  - The string is the lexicographically largest repeatLimitedString possible so we return "bbabaa".
  - Note that the string "bbabaaa" is lexicographically larger but the letter 'a' appears more than 2 times in a row, so it is not a valid repeatLimitedString.



**Constraints:**

- <code>1 <= repeatLimit <= s.length <= 10<sup>5</sup></code>
- `s` consists of lowercase English letters.


**Hint:**
1. Start constructing the string in descending order of characters.
2. When repeatLimit is reached, pick the next largest character.



**Solution:**

We use a **greedy approach** to prioritize lexicographically larger characters while ensuring that no character exceeds the `repeatLimit` consecutively. The approach uses a **priority queue** (max heap) to process characters in lexicographically descending order and ensures that no character appears more than the `repeatLimit` times consecutively.

### **Solution Explanation**

1. **Count Characters**: Count the frequency of each character in the string `s` using an array.
2. **Max Heap**: Use a max heap (priority queue) to sort and extract characters in descending lexicographical order.
3. **Greedy Construction**:
   - Add the largest character available up to `repeatLimit` times.
   - If the `repeatLimit` for the current character is reached, switch to the next largest character, insert it once, and then reinsert the first character into the heap for further use.
4. **Edge Handling**: Properly manage when a character cannot be used any further.

Let's implement this solution in PHP: **[2182. Construct String With Repeat Limit](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002182-construct-string-with-repeat-limit/solution.php)**

```php
<?php
/**
 * @param String $s
 * @param Integer $repeatLimit
 * @return String
 */
function repeatLimitedString($s, $repeatLimit) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */

}

// Test Cases
echo repeatLimitedString("cczazcc", 3) . "\n"; // Output: zzcccac
echo repeatLimitedString("aababab", 2) . "\n"; // Output: bbabaa
?>
```

### Explanation:

1. **Frequency Count:**
   - Iterate through the string `s` to count the occurrences of each character.
   - Store the frequency in an associative array `$freq`.

2. **Sort in Descending Order:**
   - Use `krsort()` to sort the characters by their lexicographical order in **descending** order.

3. **Build the Result:**
   - Continuously append the lexicographically largest character (`$char`) to the result string.
   - If a character reaches its `repeatLimit`, stop appending it temporarily.
   - Use a temporary queue to hold characters that still have remaining counts but are temporarily skipped.

4. **Handle Repeat Limit:**
   - If the current character has hit the `repeatLimit`, use the next lexicographically largest character from the queue.
   - Reinsert the previous character back into the frequency map to continue processing it later.

5. **Edge Cases:**
   - Characters may not use up their full counts initially.
   - After handling a backup character from the queue, the current character resumes processing.

### **How It Works**

1. **Character Count**: `$freq` keeps track of occurrences for all characters.
2. **Max Heap**: `SplPriorityQueue` is used as a max heap, where characters are prioritized by their ASCII value (descending order).
3. **String Construction**:
   - If the current character has reached its `repeatLimit`, fetch the next largest character.
   - Use the next largest character once and reinstate the previous character into the heap for future use.
4. **Final Result**: The resulting string is the lexicographically largest string that satisfies the `repeatLimit` constraint.

### **Example Walkthrough**

**Input:**  
`s = "cczazcc"`, `repeatLimit = 3`

**Steps:**
1. Frequency count:  
   `['a' => 1, 'c' => 4, 'z' => 2]`

2. Sort in descending order:  
   `['z' => 2, 'c' => 4, 'a' => 1]`

3. Append characters while respecting `repeatLimit`:
   - Append `'z'` → "zz" (`z` count = 0)
   - Append `'c'` 3 times → "zzccc" (`c` count = 1)
   - Append `'a'` → "zzccca" (`a` count = 0)
   - Append remaining `'c'` → "zzcccac"

**Output:** `"zzcccac"`

### **Time Complexity**
- **Character Frequency Counting**: _**O(n)**_, where _**n**_ is the length of the string.
- **Heap Operations**: _**O(26 log 26)**_, as the heap can hold up to 26 characters.
- **Overall Complexity**: _**O(n + 26 log 26) ≈ O(n)**_.

### **Space Complexity**
- _**O(26)**_ for the frequency array.
- _**O(26)**_ for the heap.

### **Test Cases**

```php
echo repeatLimitedString("cczazcc", 3) . "\n"; // Output: "zzcccac"
echo repeatLimitedString("aababab", 2) . "\n"; // Output: "bbabaa"
echo repeatLimitedString("aaaaaaa", 2) . "\n"; // Output: "aa"
echo repeatLimitedString("abcabc", 1) . "\n";  // Output: "cba"
```

### **Edge Cases**

1. `s` contains only one unique character (e.g., `"aaaaaaa"`, `repeatLimit = 2`): The output will only include as many characters as allowed consecutively.
2. `repeatLimit = 1`: The output alternates between available characters.
3. All characters in `s` are unique: The output is sorted in descending order.

This implementation works efficiently within the constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
