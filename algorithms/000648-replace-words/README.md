648\. Replace Words

**Difficulty:** Medium

**Topics:** `Array`, `Hash Table`, `String`, `Trie`

In English, we have a concept called root, which can be followed by some other word to form another longer word - let's call this word **derivative**. For example, when the root `"help"` is followed by the word `"ful"`, we can form a derivative `"helpful"`.

Given a `dictionary` consisting of many **roots** and a `sentence` consisting of words separated by spaces, replace all the derivatives in the sentence with the **root** forming it. If a derivative can be replaced by more than one **root**, replace it with the **root** that has **the shortest length**.

Return _the `sentence` after the replacement_.

**Example 1:**

- **Input:** dictionary = ["cat","bat","rat"], sentence = "the cattle was rattled by the battery"
- **Output:** "the cat was rat by the bat"

**Example 2:**

- **Input:** dictionary = ["a","b","c"], sentence = "aadsfasf absbs bbab cadsfafs"
- **Output:** "a a b c"

**Constraints:**

- <code>1 <= dictionary.length <= 1000</code>
- <code>1 <= dictionary[i].length <= 100</code>
- <code>dictionary[i]</code> consists of only lower-case letters.
- <code>1 <= sentence.length <= 10<sup>6</sup></code>
- `sentence` consists of only lower-case letters and spaces.
- The number of words in `sentence` is in the range `[1, 1000]`
- The length of each word in `sentence` is in the range `[1, 1000]`
- Every two consecutive words in `sentence` will be separated by exactly one space.
- `sentence` does not have leading or trailing spaces.



**Solution:**

We can approach this using a **Trie** (prefix tree) to store the dictionary of roots. Then, we process each word in the sentence, replacing it with the shortest root if it exists in the Trie.

### Approach:
1. **Trie Structure**:
    - We'll build a Trie (prefix tree) from the dictionary of roots. This allows us to efficiently find the shortest root for each word in the sentence.

2. **Processing the Sentence**:
    - For each word in the sentence, we'll search the Trie to see if there's a root that matches the start of the word. Once we find the first matching root, we replace the word with that root.

3. **Efficiency**:
    - By using a Trie, searching for the root for each word will be faster than directly comparing the word with each root in the dictionary.

Let's implement this solution in PHP: **[648. Replace Words](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000648-replace-words/solution.php)**

```php
<?php
// Define a Trie Node class
class TrieNode {
    /**
     * @var array
     */
    public $children = [];
    /**
     * @var bool
     */
    public $isEndOfWord = false; // Marks the end of a root word
}

// Define a Trie class for storing the dictionary of roots
class Trie {
    /**
     * @var TrieNode
     */
    private $root;

    public function __construct() {
        $this->root = new TrieNode();
    }

    /**
     * Insert a word (root) into the Trie
     *
     * @param $word
     * @return void
     */
    public function insert($word) {
        ...
        ...
        ...
        /**
         * go to ./solution.php
         */
    }

    /**
     * Find the shortest root for a given word
     *
     * @param $word
     * @return mixed|string
     */
    public function findRoot($word) {
        ...
        ...
        ...
        /**
         * go to ./solution.php
         */
    }
}

/**
 * Function to replace words in the sentence
 * 
 * @param String[] $dictionary
 * @param String $sentence
 * @return String
 */
function replaceWords($dictionary, $sentence) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:

// Example 1:
$dictionary = ["cat", "bat", "rat"];
$sentence = "the cattle was rattled by the battery";
$result = replaceWords($dictionary, $sentence);
echo $result . "\n"; // Output: "the cat was rat by the bat"

// Example 2:
$dictionary2 = ["a", "b", "c"];
$sentence2 = "aadsfasf absbs bbab cadsfafs";
$result2 = replaceWords($dictionary2, $sentence2);
echo $result2 . "\n"; // Output: "a a b c"
?>
```

### Explanation:

1. **TrieNode Class**:
    - This class represents each node of the Trie. It contains:
        - `$children`: an associative array where each key is a character of a root.
        - `$isEndOfWord`: a boolean flag indicating if this node marks the end of a root in the Trie.

2. **Trie Class**:
    - `insert($word)`: Inserts a root word into the Trie character by character.
    - `findRoot($word)`: Searches for the shortest root for a given word. If found, it returns the root, otherwise, it returns the word itself.

3. **replaceWords Function**:
    - Builds the Trie using the dictionary of roots.
    - Processes each word in the sentence, checking for a replacement root using the `findRoot` method.
    - Reconstructs the modified sentence by joining the processed words.

### Example 1:

**Input**:
```php
$dictionary = ["cat", "bat", "rat"];
$sentence = "the cattle was rattled by the battery";
```

**Process**:
- `cattle` is replaced by `cat` (root: "cat").
- `rattled` is replaced by `rat` (root: "rat").
- `battery` is replaced by `bat` (root: "bat").

**Output**:
```
"the cat was rat by the bat"
```

### Example 2:

**Input**:
```php
$dictionary = ["a", "b", "c"];
$sentence = "aadsfasf absbs bbab cadsfafs";
```

**Output**:
```
"a a b c"
```

### Time Complexity:
- **Building the Trie**: Inserting all roots takes \(O(N \cdot L)\), where \(N\) is the number of roots, and \(L\) is the average length of the roots.
- **Processing the sentence**: For each word in the sentence, finding the root in the Trie takes \(O(L)\), where \(L\) is the length of the word. So, for \(M\) words in the sentence, the total time complexity is \(O(M \cdot L)\).

Thus, the overall time complexity is \(O(N \cdot L + M \cdot L)\), which is efficient given the constraints.

### Space Complexity:
The space complexity is \(O(N \cdot L)\) for storing the Trie.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
    