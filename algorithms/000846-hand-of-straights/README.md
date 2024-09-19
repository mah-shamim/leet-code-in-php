846\. Hand of Straights

**Difficulty:** Medium

**Topics:** `Array`, `Hash Table`, `Greedy`, `Sorting`

Alice has some number of cards and she wants to rearrange the cards into groups so that each group is of size groupSize, and consists of `groupSize` consecutive cards.

Given an integer array `hand` where `hand[i]` is the value written on the <code>i<sup>th</sup></code> card and an integer `groupSize`, return `true` if she can rearrange the cards, or `false` otherwise.

**Example 1:**

- **Input:** hand = [1,2,3,6,2,3,4,7,8], groupSize = 3
- **Output:** true
- **Explanation:** Alice's hand can be rearranged as [1,2,3],[2,3,4],[6,7,8] 

**Example 2:**

- **Input:** hand = [1,2,3,4,5], groupSize = 4
- **Output:** false
- **Explanation:** Alice's hand can not be rearranged into groups of 4.

**Example 3:**

- **Input:** hand = [2,1], groupSize = 2
- **Output:** true
- **Explanation:** Alice's hand can not be rearranged into groups of 2.

**Constraints:**

- <code>1 <= hand.length <= 10<sup>4</sup></code>
- <code>0 <= hand[i] <= 10<sup>9</sup></code>
- <code>1 <= groupSize <= hand.length</code>

**Note:** This question is the same as 1296: https://leetcode.com/problems/divide-array-in-sets-of-k-consecutive-numbers/




**Solution:**

The goal is to determine whether the array `hand` can be rearranged into groups of consecutive cards where each group has a size of `groupSize`.

### Approach:

1. **Key Idea**:
    - We can use a greedy approach: first sort the cards, then attempt to form consecutive groups starting from the smallest card.
    - For each group, reduce the count of each card as they are used to form the group. If any group can't be formed because a card is missing or insufficient in quantity, return `false`.

2. **Frequency Count**:
    - Use a hash table (associative array in PHP) to count the frequency of each card. This helps track how many of each card is available.

3. **Greedy Strategy**:
    - Sort the array to ensure that we always start forming groups from the smallest available card.
    - For each card, try to form a group of `groupSize` consecutive cards.
    - Decrease the count of each card in the group. If we can't find enough cards to form a valid group, return `false`.

4. **Edge Case**:
    - If the total number of cards is not divisible by `groupSize`, it's impossible to divide them into valid groups, so we can return `false` early.

Let's implement this solution in PHP: **[846. Hand of Straights](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000846-hand-of-straights/solution.php)**

```php
<?php
/**
 * @param Integer[] $hand
 * @param Integer $groupSize
 * @return Boolean
 */
function isNStraightHand($hand, $groupSize) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example 1
$hand1 = [1,2,3,6,2,3,4,7,8];
$groupSize1 = 3;
echo isNStraightHand($hand1, $groupSize1) ? 'true' : 'false'; // Output: true

// Example 2
$hand2 = [1,2,3,4,5];
$groupSize2 = 4;
echo isNStraightHand($hand2, $groupSize2) ? 'true' : 'false'; // Output: false

// Example 3
$hand3 = [2,1];
$groupSize3 = 2;
echo isNStraightHand($hand3, $groupSize3) ? 'true' : 'false'; // Output: true
?>
```

### Explanation:

1. **Frequency Count** (`$count`):
    - We use an associative array to store how many times each card appears in the `hand`.

2. **Sort the Hand**:
    - We sort the hand so that we always try to form groups starting from the smallest card, which simplifies the process of finding consecutive cards.

3. **Greedy Group Formation**:
    - For each card in the sorted hand:
        - If the card has been fully used up in previous groups (i.e., its count is `0`), skip it.
        - Attempt to form a group of `groupSize` consecutive cards starting from this card.
        - If we can't find enough consecutive cards to form a group, return `false`.
    - If we successfully form all the required groups, return `true`.

### Time Complexity:
- Sorting the array takes _**O(n log n)**_, where _**n**_ is the length of the hand.
- Forming the groups takes _**O(n x groupSize)**_, but since we visit each card at most once, this is _**O(n)**_.
- Overall time complexity: _**O(n log n)**_.

### Output:

For `hand = [1,2,3,6,2,3,4,7,8]` and `groupSize = 3`, the output is:
```
true
```

For `hand = [1,2,3,4,5]` and `groupSize = 4`, the output is:
```
false
```

For `hand = [2,1]` and `groupSize = 2`, the output is:
```
true
```

This solution efficiently checks if the hand can be rearranged into consecutive groups.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**



