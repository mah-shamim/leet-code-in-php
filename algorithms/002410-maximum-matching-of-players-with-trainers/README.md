2410\. Maximum Matching of Players With Trainers

**Difficulty:** Medium

**Topics:** `Array`, `Two Pointers`, `Greedy`, `Sorting`

You are given a **0-indexed** integer array `players`, where `players[i]` represents the **ability** of the <code>i<sup>th</sup></code> player. You are also given a **0-indexed** integer array `trainers`, where `trainers[j]` represents the **training capacity** of the <code>j<sup>th</sup></code> trainer.

The <code>i<sup>th</sup></code> player can **match with** the <code>j<sup>th</sup></code> trainer if the player's ability is **less than or equal to** the trainer's training capacity. Additionally, the <code>i<sup>th</sup></code> player can be matched with at most one trainer, and the <code>j<sup>th</sup></code> trainer can be matched with at most one player.

Return _the **maximum** number of matchings between `players` and `trainers` that satisfy these conditions_.

**Example 1:**

- **Input:** players = [4,7,9], trainers = [8,2,5,8]
- **Output:** 2
- **Explanation:** 
    - One of the ways we can form two matchings is as follows:
        - players[0] can be matched with trainers[0] since 4 <= 8.
        - players[1] can be matched with trainers[3] since 7 <= 8.
    - It can be proven that 2 is the maximum number of matchings that can be formed.

**Example 2:**

- **Input:** players = [1,1,1], trainers = [10]
- **Output:** 1
- **Explanation:** 
    - The trainer can be matched with any of the 3 players.
    - Each player can only be matched with one trainer, so the maximum answer is 1.

**Constraints:**

- <code>1 <= players.length, trainers.length <= 10<sup>5</sup></code>
- <code>1 <= players[i], trainers[j] <= 10<sup>9</sup></code>

**Note:** This question is the same as [445: Assign Cookies](https://leetcode.com/problems/assign-cookies/description/).

**Hint:**
1. Sort both the arrays.
2. Construct the matching greedily.



**Similar Questions:**
1. [826. Most Profit Assigning Work](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000826-most-profit-assigning-work)
2. [925. Long Pressed Name](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000925-long-pressed-name)
3. [986. Interval List Intersections](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000986-interval-list-intersections)
4. [1754. Largest Merge Of Two Strings](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001754-largest-merge-of-two-strings)
5. [2071. Maximum Number of Tasks You Can Assign](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002071-maximum-number-of-tasks-you-can-assign)
6. [2300. Successful Pairs of Spells and Potions](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002300-successful-pairs-of-spells-and-potions)
7. [2332. The Latest Time to Catch a Bus
](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002332-the-latest-time-to-catch-a-bus)
8. [2592. Maximize Greatness of an Array](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002592-maximize-greatness-of-an-array)






**Solution:**

We need to find the maximum number of matchings between players and trainers such that each player's ability is less than or equal to the trainer's capacity. Each player can match with at most one trainer, and each trainer can match with at most one player. 

### Approach
1. **Sorting**: The first step involves sorting both the `players` and `trainers` arrays in ascending order. Sorting helps in efficiently applying a greedy strategy to find the maximum matchings.
2. **Greedy Matching with Two Pointers**: Using two pointers, one for each array, we traverse through both arrays. For each player, starting from the smallest, we find the smallest available trainer that can accommodate the player's ability. If such a trainer is found, we count this as a match and move both pointers forward. If not, we move the trainer pointer forward to check the next larger trainer. This ensures that we use the smallest suitable trainer for each player, leaving larger trainers for potentially larger players, thus maximizing the number of matchings.

Let's implement this solution in PHP: **[2410. Maximum Matching of Players With Trainers](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002410-maximum-matching-of-players-with-trainers/solution.php)**

```php
<?php
/**
 * @param Integer[] $players
 * @param Integer[] $trainers
 * @return Integer
 */
function matchPlayersAndTrainers($players, $trainers) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
// Example 1
$players = array(4, 7, 9);
$trainers = array(8, 2, 5, 8);
echo matchPlayersAndTrainers($players, $trainers); // Output: 2

echo "\n";

// Example 2
$players = array(1, 1, 1);
$trainers = array(10);
echo matchPlayersAndTrainers($players, $trainers); // Output: 1
?>
```

### Explanation:

1. **Sorting Arrays**: Both the `players` and `trainers` arrays are sorted in ascending order. This allows us to systematically check each player against the trainers starting from the smallest values.
2. **Two Pointers Technique**: 
   - The pointer `$i` starts at the beginning of the sorted `players` array.
   - The pointer `$j` starts at the beginning of the sorted `trainers` array.
   - For each player, we check if the current trainer's capacity is sufficient (i.e., `$players[$i] <= $trainers[$j]`). If yes, we increment the match count and move both pointers forward. If not, we only move the trainer pointer forward to check the next trainer.
3. **Termination**: The loop continues until either all players are processed or all trainers are exhausted. The result is the total count of successful matchings, which is returned as the solution.

This approach efficiently maximizes the number of matchings by leveraging sorting and a greedy strategy, ensuring optimal performance with a time complexity dominated by the sorting steps: _**O(n log n + m log m)**_, where _**n**_ and _**m**_ are the lengths of the `players` and `trainers` arrays, respectively. The subsequent two-pointer traversal operates in _**O(n + m)**_ time.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://isolatedcompliments.com/v09uayg6h?key=a647d02f1aafcddaf10536d7cd00bd7c)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**