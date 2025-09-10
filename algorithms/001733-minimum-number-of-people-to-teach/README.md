1733\. Minimum Number of People to Teach

**Difficulty:** Medium

**Topics:** `Array`, `Hash Table`, `Greedy`, `Biweekly Contest 44`

On a social network consisting of `m` users and some friendships between users, two users can communicate with each other if they know a common language.

You are given an integer `n`, an array `languages`, and an array `friendships` where:

- There are `n` languages numbered `1` through `n`,
- `languages[i]` is the set of languages the <code>i<sup>th</sup></code> user knows, and
- <code>friendships[i] = [u<sub>i</sub>, v<sub>i</sub>]</code> denotes a friendship between the users <code>u<sub>i</sub></code> and <code>v<sub>i</sub></code>.

You can choose **one** language and teach it to some users so that all friends can communicate with each other. Return the **minimum** number of users you need to teach.
Note that friendships are not transitive, meaning if `x` is a friend of `y` and `y` is a friend of `z`, this doesn't guarantee that `x` is a friend of `z`.

**Example 1:**

- **Input:** n = 2, languages = [[1],[2],[1,2]], friendships = [[1,2],[1,3],[2,3]]
- **Output:** 1
- **Explanation:** You can either teach user 1 the second language or user 2 the first language.

**Example 2:**

- **Input:** n = 3, languages = [[2],[1,3],[1,2],[3]], friendships = [[1,4],[1,2],[3,4],[2,3]]
- **Output:** 2
- **Explanation:** Teach the third language to users 1 and 3, yielding two users to teach.

**Constraints:**

- `2 <= n <= 500`
- `languages.length == m`
- `1 <= m <= 500`
- `1 <= languages[i].length <= n`
- `1 <= languages[i][j] <= n`
- <code>1 <= u<sub>i</sub> < v<sub>i</sub> <= languages.length</code>
- `1 <= friendships.length <= 500`
- All tuples <code>(u<sub>i</sub>, v<sub>i</sub>)</code> are unique
- `languages[i]` contains only unique values



**Hint:**
1. You can just use brute force and find out for each language the number of users you need to teach
2. Note that a user can appear in multiple friendships but you need to teach that user only once






**Solution:**

We need to determine the minimum number of users to teach a single language such that every pair of friends can communicate through a common language. The solution involves checking each language as a candidate and calculating how many users need to learn it to satisfy all friendships that currently lack a common language.

### Approach
1. **Precompute Language Knowledge**: Create a 2D array (`knows`) where each entry `knows[i][j]` indicates whether user `i` knows language `j`.
2. **Identify Unsatisfied Friendships**: For each friendship, check if there exists any common language between the two users. If not, mark both users as needing intervention.
3. **Calculate Teaching Needs per Language**: For each language, count how many users involved in unsatisfied friendships do not already know that language. This count represents the number of users that need to be taught that language to ensure all unsatisfied friendships share that common language.
4. **Find Minimum Teaching Count**: Iterate through all languages and find the minimum count of users that need to be taught.

Let's implement this solution in PHP: **[1733. Minimum Number of People to Teach](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001733-minimum-number-of-people-to-teach/solution.php)**

```php
<?php
/**
 * @param Integer $n
 * @param Integer[][] $languages
 * @param Integer[][] $friendships
 * @return Integer
 */
function minimumTeachings($n, $languages, $friendships) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
$n = 2;
$languages = [[1],[2],[1,2]];
$friendships = [[1,2],[1,3],[2,3]];
echo minimumTeachings($n, $languages, $friendships) . "\n"; // Output: 1

$n = 3;
$languages = [[2],[1,3],[1,2],[3]];
$friendships = [[1,4],[1,2],[3,4],[2,3]];
echo minimumTeachings($n, $languages, $friendships) . "\n"; // Output: 2
?>
```

### Explanation:

1. **Precompute Language Knowledge**: The code first initializes a 2D array `knows` to store which languages each user knows. This is done by iterating through each user's known languages and marking them in the array.
2. **Identify Unsatisfied Friendships**: For each friendship, the code checks if there is any common language between the two users. If no common language is found, both users are added to a set of users involved in unsatisfied friendships.
3. **Calculate Teaching Needs**: For each language, the code counts how many users in the set of unsatisfied users do not already know that language. This count represents the number of users that need to be taught that language to resolve all unsatisfied friendships.
4. **Find Minimum Teaching Count**: The code iterates through all languages and keeps track of the minimum count of users that need to be taught. This minimum value is returned as the result.

This approach efficiently narrows down the problem to checking each language individually and determining the optimal language to teach to minimize the number of users needing instruction. The complexity is manageable due to the constraints, making it a practical solution.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. [Your support would mean a lot to me!](https://jackaltimer.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**