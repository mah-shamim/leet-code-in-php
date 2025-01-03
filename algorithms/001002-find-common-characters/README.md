1002\. Find Common Characters

**Difficulty:** Easy

**Topics:** `Array`, `Hash Table`, `String`

Given a string array `words`, return _an array of all characters that show up in all strings within the `words` (including duplicates). You may return the answer in **any order**_.

**Example 1:**

- **Input:** words = ["bella","label","roller"]
- **Output:** ["e","l","l"]

**Example 2:**

- **Input:** words = ["cool","lock","cook"]
- **Output:** ["c","o"]

**Constraints:**

- <code>1 <= words.length <= 100</code>
- <code>1 <= words[i].length <= 100</code>
- <code>words[i]</code> consists of lowercase English letters.


**Solution:**

The problem asks us to find the common characters that appear in all the strings of a given array. This includes duplicates, meaning if a character appears twice in all strings, it should appear twice in the output. The result can be in any order.

### **Key Points**

1. **Input:** An array of strings `words` with lowercase letters.
2. **Output:** An array of characters that are common across all strings.
3. **Constraints:**
    - Array length and string length are small enough to allow a brute-force approach.
    - Case sensitivity and duplicates need to be handled.

### **Approach**

The main idea is to:
1. Maintain a global count of the minimum frequency of each character across all strings.
2. For each word, count the frequency of characters and update the global count.
3. Use this global count to construct the final output.

### **Plan**

1. **Initialize a global frequency array:** Create an array of size 26 (for each letter) and set all values to `PHP_INT_MAX` to simulate infinity.
2. **Iterate through each word:**
    - Count the frequency of characters in the current word.
    - Update the global frequency array by taking the minimum count for each letter.
3. **Build the result:** Iterate through the global frequency array and append characters to the result based on their minimum frequency.
4. **Return the result array.**

Let's implement this solution in PHP: **[1002. Find Common Characters](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001002-find-common-characters/solution.php)**

```php
<?php
/**
 * @param String[] $words
 * @return String[]
 */
function commonChars($words) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example 1
$words = ["bella","label","roller"];
echo commonChars($words);  // Output: ["e","l","l"]

// Example 2
$words = ["cool","lock","cook"];
echo commonChars($words);  // Output: ["c","o"]
?>
```

### Explanation:

#### **Step-by-Step Breakdown**

1. **Global Frequency Array:**
    - Represented as `letterCount` of size 26 (for 'a' to 'z').
    - Initialized with `PHP_INT_MAX` since we are looking for the minimum frequency.

2. **Iterate Over Words:**
    - For each word, calculate the frequency of characters in `wordLetterCount`.
    - Update the global `letterCount` by comparing it with `wordLetterCount` and taking the minimum.

3. **Construct Result:**
    - For each letter, if its count is greater than 0 in the global array, add it that many times to the result.

4. **Return the Result:**
    - The result is the final list of common characters.

### **Example Walkthrough**

#### Example 1:

**Input:** `words = ["bella", "label", "roller"]`

1. **Initialization:**
    - `letterCount` = `[PHP_INT_MAX, PHP_INT_MAX, ..., PHP_INT_MAX]`.

2. **Process Each Word:**
    - Word "bella":
        - `wordLetterCount` = `[0, 1, 0, ..., 1, 2]` (frequency of 'b', 'e', 'l', etc.)
        - Update `letterCount`: `[0, 1, 0, ..., 1, 2]`.

    - Word "label":
        - `wordLetterCount` = `[1, 1, 0, ..., 2, 1]`.
        - Update `letterCount`: `[0, 1, 0, ..., 1, 1]`.

    - Word "roller":
        - `wordLetterCount` = `[0, 0, 0, ..., 1, 2]`.
        - Update `letterCount`: `[0, 0, 0, ..., 1, 1]`.

3. **Build Result:**
    - Add 'e', 'l', 'l' based on `letterCount`.

**Output:** `["e", "l", "l"]`.

### **Time Complexity**

1. **Frequency Count per Word:** _**O(N x L)**_, where _**N**_ is the number of words and _**L**_ is the average length of a word.
2. **Result Construction:** _**O(26)**_.

**Overall Complexity:** _**O(N x L)**_.

### **Output for Example**

#### Example 1:
**Input:** `["bella", "label", "roller"]`  
**Output:** `["e", "l", "l"]`

#### Example 2:
**Input:** `["cool", "lock", "cook"]`  
**Output:** `["c", "o"]`


This solution efficiently handles the problem within the constraints. It uses the concept of frequency arrays and minimizes space by using constant storage for the alphabet. The logic is simple, and the result respects duplicates.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**

