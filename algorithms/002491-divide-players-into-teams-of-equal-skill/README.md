2491\. Divide Players Into Teams of Equal Skill

**Difficulty:** Medium

**Topics:** `Array`, `Hash Table`, `Two Pointers`, `Sorting`

You are given a positive integer array `skill` of **even** length `n` where `skill[i]` denotes the skill of the <code>i<sup>th</sup></code> player. Divide the players into `n / 2` teams of size `2` such that the total skill of each team is **equal**.

The **chemistry** of a team is equal to the **product** of the skills of the players on that team.

Return _the sum of the **chemistry** of all the teams, or return `-1` if there is no way to divide the players into teams such that the total skill of each team is equal_.

**Example 1:**

- **Input:** skill = [3,2,5,1,3,4]
- **Output:** 22
- **Explanation:**\
  Divide the players into the following teams: (1, 5), (2, 4), (3, 3), where each team has a total skill of 6.\
  The sum of the chemistry of all the teams is: 1 * 5 + 2 * 4 + 3 * 3 = 5 + 8 + 9 = 22.

**Example 2:**

- **Input:** skill = [3,4]
- **Output:** 112
- **Explanation:**\
  The two players form a team with a total skill of 7.\
  The chemistry of the team is 3 * 4 = 12.


**Example 3:**

- **Input:** skill = [1,1,2,3]
- **Output:** -1
- **Explanation:** There is no way to divide the players into teams such that the total skill of each team is equal.


**Constraints:**

- <code>2 <= skill.length <= 10<sup>5</sup></code>
- `skill.length` is even.
- `1 <= skill[i] <= 1000`

**Hint:**
1. Try sorting the skill array.
2. It is always optimal to pair the weakest available player with the strongest available player.



**Solution:**

We can follow the hint provided and use a greedy approach. Here's the detailed breakdown of the solution:

### Steps:
1. **Sort the Skill Array**: Sorting allows us to efficiently pair the weakest player (smallest value) with the strongest player (largest value).

2. **Check for Valid Pairing**: The sum of the skills of each team should be equal. After sorting, we will pair the smallest and the largest element, then the second smallest with the second largest, and so on. If at any point, the sum of a pair differs from the previous sums, it's impossible to divide the players into valid teams, and we should return `-1`.

3. **Calculate the Chemistry**: The chemistry of each team is the product of the two skills in that team. Sum up all the chemistry values for each valid team.

4. **Return the Total Chemistry**: If all the teams have the same total skill, return the sum of their chemistry.

Let's implement this solution in PHP: **[2491. Divide Players Into Teams of Equal Skill](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002491-divide-players-into-teams-of-equal-skill/solution.php)**

```php
<?php
/**
 * @param Integer[] $skill
 * @return Integer
 */
function dividePlayers($skill) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
$skill1 = [3, 2, 5, 1, 3, 4];
$skill2 = [3, 4];
$skill3 = [1, 1, 2, 3];

echo dividePlayers($skill1) . "\n";  // Output: 22
echo dividePlayers($skill2) . "\n";  // Output: 12
echo dividePlayers($skill3) . "\n";  // Output: -1
?>
```

### Explanation:

1. **Sorting**: The array `skill` is sorted to ensure that we can efficiently pair the smallest and largest values.

2. **Two Pointers**: We use two pointers (`$i` starting from the beginning and `$j` starting from the end). For each valid pair (smallest and largest), we check if their sum is the same as the expected `teamSkillSum`. If not, it's impossible to divide the players into teams.

3. **Chemistry Calculation**: If the pair is valid, the chemistry is calculated as the product of the two values (`$skill[$i] * $skill[$j]`), and we keep adding it to the total chemistry.

4. **Edge Cases**:
   - If the team cannot be formed due to unequal sums, we return `-1`.
   - The code handles cases with even length and ensures that all players are paired up correctly.

### Time Complexity:
- Sorting the array takes _**O(n log n)**_, and the two-pointer traversal takes _**O(n)**_. Hence, the overall time complexity is _**O(n log n)**_, which is efficient given the constraints.

This solution works within the given constraint of up to **<code>10<sup>5</sup></code>** players.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
