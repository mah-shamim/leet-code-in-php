2900\. Longest Unequal Adjacent Groups Subsequence I

**Difficulty:** Easy

**Topics:** `Array`, `String`, `Dynamic Programming`, `Greedy`

You are given a string array `words` and a **binary** array `groups` both of length `n`, where `words[i]` is associated with `groups[i]`.

Your task is to select the **longest alternating** subsequence[^1] from `words`. A subsequence of `words` is alternating if for any two consecutive strings in the sequence, their corresponding elements in the binary array `groups` differ. Essentially, you are to choose strings such that adjacent elements have non-matching corresponding bits in the `groups` array.

Formally, you need to find the longest subsequence of an array of indices `[0, 1, ..., n - 1]` denoted as <code>[i<sub>0</sub>, i<sub>1</sub>, ..., i<sub>k-1</sub>]</code>, such that <code>groups[i<sub>j</sub>] != groups[i<sub>j+1</sub>]</code> for each `0 <= j < k - 1` and then find the words corresponding to these indices.

Return _the selected subsequence. If there are multiple answers, return **any** of them_.

**Note**: The elements in `words` are distinct.

**Example 1:**

- **Input:** words = ["e","a","b"], groups = [0,0,1]
- **Output:** ["e","b"]
- **Explanation:** A subsequence that can be selected is `["e","b"]` because `groups[0] != groups[2]`. Another subsequence that can be selected is `["a","b"]` because `groups[1] != groups[2]`. It can be demonstrated that the length of the longest subsequence of indices that satisfies the condition is `2`.

**Example 2:**

- **Input:** words = ["a","b","c","d"], groups = [1,0,1,1]
- **Output:** ["a","b","c"]
- **Explanation:** A subsequence that can be selected is `["a","b","c"]` because `groups[0] != groups[1]` and `groups[1] != groups[2]`. Another subsequence that can be selected is `["a","b","d"]` because `groups[0] != groups[1]` and `groups[1] != groups[3]`. It can be shown that the length of the longest subsequence of indices that satisfies the condition is `3`.



**Constraints:**

- `1 <= n == words.length == groups.length <= 100`
- `1 <= words[i].length <= 10`
- `groups[i]` is either `0` or `1`.
- `words` consists of **distinct** strings.
- `words[i]` consists of lowercase English letters.


**Hint:**
1. This problem can be solved greedily.
2. Begin by constructing the answer starting with the first number in `groups`.
3. For each index `i` in the range `[1, n - 1]`, add `i` to the answer if `groups[i] != groups[i - 1]`.

[^1]: **Subsequence**: A subsequence is an array that can be derived from another array by deleting some or no elements without changing the order of the remaining elements.

**Solution:**

We need to find the longest subsequence of words such that adjacent elements in the subsequence have different corresponding values in the binary array `groups`. This can be efficiently achieved using a greedy approach.

### Approach
The greedy approach works by iterating through the `groups` array and constructing the subsequence by selecting each element whose group value differs from the previous element in the subsequence. This ensures that we always take the earliest possible elements that allow for the maximum length of alternating groups. Here are the steps:

1. **Initialize the Result**: Start with the first element from the `words` array since it will always be part of the subsequence.
2. **Iterate Through the Array**: For each subsequent element, check if its group value is different from the last element added to the result. If it is different, add the current word to the result and update the last group value.
3. **Return the Result**: The constructed subsequence is returned as the answer.

This approach ensures that we build the longest possible alternating subsequence by making locally optimal choices at each step.

Let's implement this solution in PHP: **[2900. Longest Unequal Adjacent Groups Subsequence I](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002900-longest-unequal-adjacent-groups-subsequence-i/solution.php)**

```php
<?php
/**
 * @param String[] $words
 * @param Integer[] $groups
 * @return String[]
 */
function getLongestSubsequence($words, $groups) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example 1:
$words1 = ["e","a","b"];
$groups1 = [0,0,1];
print_r(getLongestSubsequence($words1, $groups1));

// Example 2:
$words2 = ["a","b","c","d"];
$groups2 = [1,0,1,1];
print_r(getLongestSubsequence($words2, $groups2));
?>
```

### Explanation:

1. **Initialization**: We start by adding the first word from the `words` array to our result list and note its group value.
2. **Iteration**: We loop through the remaining elements. For each element, we check if its group value is different from the last group value in our result list. If it is different, we add the current word to the result and update the last group value to the current element's group.
3. **Result Construction**: By following this approach, we ensure that each element added to the result list alternates the group values, thus forming the longest possible subsequence with alternating groups.

This method efficiently constructs the required subsequence in linear time, making it optimal for the given problem constraints.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**