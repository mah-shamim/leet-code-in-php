2416\. Sum of Prefix Scores of Strings

**Difficulty:** Hard

**Topics:** `Array`, `String`, `Trie`, `Counting`

You are given an array `words` of size `n` consisting of **non-empty** strings.

We define the **score** of a string `word` as the **number** of strings `words[i]` such that `word` is a **prefix** of `words[i]`.

- For example, if `words = ["a", "ab", "abc", "cab"]`, then the score of `"ab"` is `2`, since `"ab"` is a prefix of both `"ab"` and `"abc"`.

Return _an array `answer` of size `n` where `answer[i]` is the **sum** of scores of every **non-empty** prefix of `words[i]`_.

**Note** that a string is considered as a prefix of itself.

**Example 1:**

- **Input:** words = ["abc","ab","bc","b"]
- **Output:** [5,4,3,2]
- **Explanation:** The answer for each string is the following:
  - "abc" has 3 prefixes: "a", "ab", and "abc".
  - There are 2 strings with the prefix "a", 2 strings with the prefix "ab", and 1 string with the prefix "abc".
    - The total is answer[0] = 2 + 2 + 1 = 5.
  - "ab" has 2 prefixes: "a" and "ab".
  - There are 2 strings with the prefix "a", and 2 strings with the prefix "ab".
    - The total is answer[1] = 2 + 2 = 4.
  - "bc" has 2 prefixes: "b" and "bc".
  - There are 2 strings with the prefix "b", and 1 string with the prefix "bc".
    - The total is answer[2] = 2 + 1 = 3.
  - "b" has 1 prefix: "b".
  - There are 2 strings with the prefix "b".
    - The total is answer[3] = 2.

**Example 2:**

- **Input:** words = ["abcd"]
- **Output:** [4]
- **Explanation:**
  - "abcd" has 4 prefixes: "a", "ab", "abc", and "abcd".
  - Each prefix has a score of one, so the total is answer[0] = 1 + 1 + 1 + 1 = 4.



**Constraints:**

- `1 <= words.length <= 1000`
- `1 <= words[i].length <= 1000`
- `words[i]` consists of lowercase English letters.



**Hint:**
1. What data structure will allow you to efficiently keep track of the score of each prefix?
2. Use a Trie. Insert all the words into it, and keep a counter at each node that will tell you how many times we have visited each prefix.



**Solution:**

We can use a **Trie** data structure, which is particularly efficient for working with prefixes. Each node in the Trie will represent a letter of the words, and we'll maintain a counter at each node to store how many times that prefix has been encountered. This allows us to efficiently calculate the score of each prefix by counting how many words start with that prefix.

### Approach:

1. **Insert Words into Trie:**
   - We'll insert each word into the Trie character by character.
   - At each node (representing a character), we maintain a counter that keeps track of how many words pass through that prefix.

2. **Calculate Prefix Scores:**
   - For each word, as we traverse its prefixes in the Trie, we'll sum the counters stored at each node to compute the score for each prefix.

3. **Build Answer Array:**
   - For each word, we'll calculate the sum of the scores for all its prefixes and store it in the result array.

Let's implement this solution in PHP: **[2416. Sum of Prefix Scores of Strings](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002416-sum-of-prefix-scores-of-strings/solution.php)**

```php
<?php
class TrieNode {
    /**
     * @var array
     */
    public $children;
    /**
     * @var int
     */
    public $count;

    public function __construct() {
        $this->children = [];
        $this->count = 0;
    }
}

class Trie {
    /**
     * @var TrieNode
     */
    private $root;

    public function __construct() {
        $this->root = new TrieNode();
    }

    /**
     * Insert a word into the Trie and update the prefix counts
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
     * Get the sum of prefix scores for a given word
     *
     * @param $word
     * @return int
     */
    public function getPrefixScores($word) {
       ...
       ...
       ...
       /**
        * go to ./solution.php
        */
    }
}

/**
 * @param String[] $words
 * @return Integer[]
 */
function sumOfPrefixScores($words) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example usage:
$words1 = ["abc", "ab", "bc", "b"];
$words2 = ["abcd"];

print_r(sumOfPrefixScores($words1)); // Output: [5, 4, 3, 2]
print_r(sumOfPrefixScores($words2)); // Output: [4]
?>
```

### Explanation:

1. **TrieNode Class:**
   - Each node has an array of children (representing the next characters in the word) and a `count` to keep track of how many words share this prefix.

2. **Trie Class:**
   - The `insert` method adds a word to the Trie. As we insert each character, we increment the `count` at each node, representing how many words have this prefix.
   - The `getPrefixScores` method calculates the sum of scores for all prefixes of a given word. It traverses through the Trie, adding up the `count` of each node corresponding to a character in the word.

3. **Main Function (`sumOfPrefixScores`):**
   - First, we insert all words into the Trie.
   - Then, for each word, we calculate the sum of scores for its prefixes by querying the Trie and store the result in the `result` array.

### Example:

For `words = ["abc", "ab", "bc", "b"]`, the output will be:
```
Array
(
    [0] => 5
    [1] => 4
    [2] => 3
    [3] => 2
)
```

- "abc" has 3 prefixes: "a" (2 words), "ab" (2 words), "abc" (1 word) -> total = 5.
- "ab" has 2 prefixes: "a" (2 words), "ab" (2 words) -> total = 4.
- "bc" has 2 prefixes: "b" (2 words), "bc" (1 word) -> total = 3.
- "b" has 1 prefix: "b" (2 words) -> total = 2.

### Time Complexity:
- **Trie Construction:** O(n * m) where `n` is the number of words and `m` is the average length of the words.
- **Prefix Score Calculation:** O(n * m) as we traverse each word's prefix in the Trie.

This approach ensures that we efficiently compute the prefix scores in linear time relative to the total number of characters in all words.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
