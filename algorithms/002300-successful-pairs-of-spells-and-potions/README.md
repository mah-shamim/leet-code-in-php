2300\. Successful Pairs of Spells and Potions

**Difficulty:** Medium

**Topics:** `Array`, `Two Pointers`, `Binary Search`, `Sorting`, `Biweekly Contest 80`

You are given two positive integer arrays `spells` and `potions`, of length `n` and `m` respectively, where `spells[i]` represents the strength of the `iᵗʰ` spell and `potions[j]` represents the strength of the `jᵗʰ` potion.

You are also given an integer `success`. A spell and potion pair is considered **successful** if the **product** of their strengths is **at least** `success`.

Return _an integer array `pairs` of length `n` where `pairs[i]` is the number of **potions** that will form a successful pair with the `iᵗʰ` spell_.

**Example 1:**

- **Input:** spells = [5,1,3], potions = [1,2,3,4,5], success = 7
- **Output:** [4,0,3]
- **Explanation:**
  - 0ᵗʰ spell: 5 * [1,2,3,4,5] = [5,<ins>10</ins>,<ins>15</ins>,<ins>20</ins>,<ins>25</ins>]. 4 pairs are successful.
  - 1ˢᵗ spell: 1 * [1,2,3,4,5] = [1,2,3,4,5]. 0 pairs are successful.
  - 2ⁿᵈ spell: 3 * [1,2,3,4,5] = [3,6,<ins>9</ins>,<ins>12</ins>,<ins>15</ins>]. 3 pairs are successful.
    Thus, [4,0,3] is returned.

**Example 2:**

- **Input:** spells = [3,1,2], potions = [8,5,8], success = 16
- **Output:** [2,0,2]
- **Explanation:**
  - 0ᵗʰ spell: 3 * [8,5,8] = [<ins>24</ins>,15,<ins>24</ins>]. 2 pairs are successful.
  - 1ˢᵗ spell: 1 * [8,5,8] = [8,5,8]. 0 pairs are successful.
  - 2ⁿᵈ spell: 2 * [8,5,8] = [<ins>16</ins>,10,<ins>16</ins>]. 2 pairs are successful.
    Thus, [2,0,2] is returned.

**Constraints:**

- `n == spells.length`
- `m == potions.length`
- `1 <= n, m <= 10⁵`
- `1 <= spells[i], potions[i] <= 10⁵`
- `1 <= success <= 10¹⁰`



**Hint:**
1. Notice that if a spell and potion pair is successful, then the spell and all stronger potions will be successful too.
2. Thus, for each spell, we need to find the potion with the least strength that will form a successful pair.
3. We can efficiently do this by sorting the potions based on strength and using binary search.



**Similar Questions:**
1. [826. Most Profit Assigning Work](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000826-most-profit-assigning-work)
2. [2389. Longest Subsequence With Limited Sum](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002389-longest-subsequence-with-limited-sum)
3. [2410. Maximum Matching of Players With Trainers](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002410-maximum-matching-of-players-with-trainers)







**Solution:**

We need to determine the number of potions that form a successful pair with each spell. A successful pair is defined as a spell and potion whose product of strengths is at least a given success value. Given the constraints, a brute-force approach would be inefficient, so we use sorting and binary search to optimize the solution.

### Approach
1. **Sort the Potions Array**: Sorting the potions array allows us to efficiently find the minimum potion strength required for a successful pair with each spell using binary search.
2. **Binary Search for Each Spell**: For each spell, calculate the minimum potion strength required to form a successful pair. This is done by computing the ceiling of `success / spell_strength`. Using binary search, find the first position in the sorted potions array where the potion strength meets or exceeds this required value. The number of successful pairs for the spell is then the count of potions from this position to the end of the array.

Let's implement this solution in PHP: **[2300. Successful Pairs of Spells and Potions](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002300-successful-pairs-of-spells-and-potions/solution.php)**

```php
<?php
/**
 * @param Integer[] $spells
 * @param Integer[] $potions
 * @param Integer $success
 * @return Integer[]
 */
function successfulPairs($spells, $potions, $success) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
$spells = [5, 1, 3];
$potions = [1, 2, 3, 4, 5];
$success = 7;

print_r(successfulPairs($spells, $potions, $success));
// Output: [4, 0, 3]

$spells2 = [3, 1, 2];
$potions2 = [8, 5, 8];
$success2 = 16;

print_r(successfulPairs($spells2, $potions2, $success2));
// Output: [2, 0, 2]
?>
```

### Explanation:

1. **Sorting Potions**: The potions array is sorted to facilitate binary search. This step ensures that we can quickly locate the minimum potion strength required for each spell.
2. **Binary Search**: For each spell, we calculate the required potion strength as the ceiling of `success / spell_strength`. Using binary search, we find the smallest index in the sorted potions array where the potion strength is at least the required value. The number of successful pairs is then the number of potions from this index to the end of the array.
3. **Efficiency**: The sorting step takes O(m log m) time, and each binary search operation takes O(log m) time. With n spells, the overall time complexity is O(m log m + n log m), which is efficient for the given constraints.

This approach efficiently narrows down the search space for each spell using binary search, ensuring optimal performance even for large input sizes.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://jackaltimer.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**