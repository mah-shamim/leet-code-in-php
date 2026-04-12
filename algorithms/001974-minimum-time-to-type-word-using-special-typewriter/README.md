1974\. Minimum Time to Type Word Using Special Typewriter

**Difficulty:** Easy

**Topics:** `Mid Level`, `String`, `Greedy`, `Biweekly Contest 59`

There is a special typewriter with lowercase English letters `'a'` to `'z'` arranged in a **circle** with a **pointer**. A character can only be typed if the pointer is pointing to that character. The pointer is **initially** pointing to the character `'a'`.

![chart](https://assets.leetcode.com/uploads/2021/07/31/chart.jpg)

Each second, you may perform one of the following operations:

- Move the pointer one character **counterclockwise** or **clockwise**.
- Type the character the pointer is **currently** on.

Given a string `word`, return _the **minimum** number of seconds to type out the characters in `word`_.

**Example 1:**

- **Input:** word = "abc"
- **Output:** 5
- **Explanation:**
   - The characters are printed as follows:
      - Type the character 'a' in 1 second since the pointer is initially on 'a'.
      - Move the pointer clockwise to 'b' in 1 second.
      - Type the character 'b' in 1 second.
      - Move the pointer clockwise to 'c' in 1 second.
      - Type the character 'c' in 1 second.

**Example 2:**

- **Input:** word = "bza"
- **Output:** 7
- **Explanation:**
   - The characters are printed as follows:
      - Move the pointer clockwise to 'b' in 1 second.
      - Type the character 'b' in 1 second.
      - Move the pointer counterclockwise to 'z' in 2 seconds.
      - Type the character 'z' in 1 second.
      - Move the pointer clockwise to 'a' in 1 second.
      - Type the character 'a' in 1 second.

**Example 3:**

- **Input:** word = "zjpc"
- **Output:** 34
- **Explanation:**
   - The characters are printed as follows:
      - Move the pointer counterclockwise to 'z' in 1 second.
      - Type the character 'z' in 1 second.
      - Move the pointer clockwise to 'j' in 10 seconds.
      - Type the character 'j' in 1 second.
      - Move the pointer clockwise to 'p' in 6 seconds.
      - Type the character 'p' in 1 second.
      - Move the pointer counterclockwise to 'c' in 13 seconds.
      - Type the character 'c' in 1 second.

**Constraints:**

- `2 <= word.length <= 300`
- `word` consists of uppercase English letters.



**Hint:**
1. There are only two possible directions you can go when you move to the next letter.
2. When moving to the next letter, you will always go in the direction that takes the least amount of time.



**Similar Questions:**
1. [1320. Minimum Distance to Type a Word Using Two Fingers](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001320-minimum-distance-to-type-a-word-using-two-fingers)






**Solution:**

The problem simulates a circular typewriter starting at `'a'`. Each movement costs 1 second per step (clockwise or counterclockwise), and typing the current character costs 1 second. The goal is to minimize total time to type a given word by always choosing the shorter direction between consecutive characters.

The solution calculates the clockwise and counterclockwise distances between the current and target character on a circular alphabet (26 letters) and adds the typing time (1 second) for each character.

### Approach:

- **Character to index mapping**: Convert each character to a number from 0 to 25 based on its position in the alphabet.
- **Circular distance**: For each step, compute both clockwise and counterclockwise distances. The minimal movement time is the smaller of the two.
- **Typing time**: Add 1 second for typing the character after moving.
- **Iterate through the word**: Keep track of the current character (starting with `'a'`), update it after each step.

Let's implement this solution in PHP: **[1974. Minimum Time to Type Word Using Special Typewriter](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001974-minimum-time-to-type-word-using-special-typewriter)**

```php
<?php
/**
 * @param String $word
 * @return Integer
 */
function minTimeToType(string $word): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo minTimeToType("abc");          // Output: 5
echo minTimeToType("bza");          // Output: 7
echo minTimeToType("zjpc");         // Output: 34
?>
```

### Explanation:

- Start with `currentChar = 'a'` and `totalTime = 0`.
- For each character in `word`:
   - Convert `currentChar` and `targetChar` to positions 0–25 using ASCII values.
   - `clockwise = abs(targetPos - currentPos)` — direct forward distance.
   - `counterclockwise = 26 - clockwise` — the other way around the circle.
   - `totalTime += min(clockwise, counterclockwise) + 1` (1 second for typing).
   - Update `currentChar = targetChar`.
- Return `totalTime`.

### Complexity
- **Time Complexity**: _**O(n)**_ where n is the length of `word` — one pass through the string with constant-time operations.
- **Space Complexity**: _**O(1)**_ — only a few integer variables used.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**