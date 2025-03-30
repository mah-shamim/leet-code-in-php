763\. Partition Labels

**Difficulty:** Medium

**Topics:** `Hash Table`, `Two Pointers`, `String`, `Greedy`

You are given a string `s`. We want to partition the string into as many parts as possible so that each letter appears in at most one part. For example, the string `"ababcc"` can be partitioned into `["abab", "cc"]`, but partitions such as `["aba", "bcc"]` or `["ab", "ab", "cc"]` are invalid.

**Note** that the partition is done so that after concatenating all the parts in order, the resultant string should be `s`.

Return _a list of integers representing the size of these parts_.

**Example 1:**

- **Input:** s = "ababcbacadefegdehijhklij"
- **Output:** [9,7,8]
- **Explanation:**
  The partition is "ababcbaca", "defegde", "hijhklij".
  This is a partition so that each letter appears in at most one part.
  A partition like "ababcbacadefegde", "hijhklij" is incorrect, because it splits s into less parts.

**Example 2:**

- **Input:** s = "eccbbbbdec"
- **Output:** [10]



**Constraints:**

- `1 <= s.length <= 500`
- `s` consists of lowercase English letters.


**Hint:**
1. Try to greedily choose the smallest partition that includes the first letter. If you have something like `"abaccbdeffed"`, then you might need to add `b`. You can use an map like `"last['b'] = 5"` to help you expand the width of your partition.



**Solution:**

We need to partition a string into as many parts as possible such that each character appears in at most one part. The goal is to return the sizes of these parts in a list.

### Approach
The key insight to solve this problem efficiently is to use a greedy algorithm combined with a hash map to track the last occurrence of each character. Here's the step-by-step approach:

1. **Track Last Occurrences**: First, we create a hash map to record the last index at which each character appears in the string. This helps us determine the furthest point we need to extend a partition to include all occurrences of a character.

2. **Iterate and Expand Partitions**: Using two pointers, we iterate through the string. The start pointer marks the beginning of a partition, and the end pointer is dynamically adjusted to the furthest last occurrence of any character encountered in the current partition. Once the current index reaches the end pointer, we finalize the partition, record its length, and start a new partition from the next character.

Let's implement this solution in PHP: **[763. Partition Labels](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000763-partition-labels/solution.php)**

```php
<?php
/**
 * @param String $s
 * @return Integer[]
 */
function partitionLabels($s) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
$s1 = "ababcbacadefegdehijhklij";
print_r(partitionLabels($s1)); // Output: [9,7,8]

$s2 = "eccbbbbdec";
print_r(partitionLabels($s2)); // Output: [10]
?>
```

### Explanation:

1. **Tracking Last Occurrences**: We iterate through the string once to build a hash map where each key is a character and the value is the last index where that character appears. This allows us to know the furthest point a partition must extend to include all occurrences of the current character.

2. **Expanding Partitions**: As we iterate through the string, we use the start and end pointers to define the current partition. The end pointer is updated to the maximum value between its current value and the last occurrence of the current character. When the current index matches the end pointer, it means we've reached the end of the current partition. We then record the length of this partition and reset the start pointer to the next index to begin a new partition.

This approach ensures that each partition is as small as possible while including all necessary characters, thus maximizing the number of partitions. The algorithm efficiently processes the string in linear time, making it both optimal and easy to understand.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**