2147\. Number of Ways to Divide a Long Corridor

**Difficulty:** Hard

**Topics:** `Math`, `String`, `Dynamic Programming`, `Biweekly Contest 70`

Along a long library corridor, there is a line of seats and decorative plants. You are given a **0-indexed** string `corridor` of length `n` consisting of letters `'S'` and `'P'` where each `'S'` represents a seat and each `'P'` represents a plant.

One room divider has **already** been installed to the left of index `0`, and **another** to the right of index `n - 1`. Additional room dividers can be installed. For each position between indices `i - 1` and `i` `(1 <= i <= n - 1)`, at most one divider can be installed.

Divide the corridor into non-overlapping sections, where each section has **exactly two seats** with any number of plants. There may be multiple ways to perform the division. Two ways are **different** if there is a position with a room divider installed in the first way but not in the second way.

Return _the number of ways to divide the corridor_. Since the answer may be very large, return it **modulo** `10⁹ + 7`. If there is no way, return `0`.

**Example 1:**

![1](https://assets.leetcode.com/uploads/2021/12/04/1.png)

- **Input:** corridor = "SSPPSPS"
- **Output:** 3
- **Explanation:** There are 3 different ways to divide the corridor.
  The black bars in the above image indicate the two room dividers already installed.
  Note that in each of the ways, **each** section has exactly **two** seats.

**Example 2:**

![2](https://assets.leetcode.com/uploads/2021/12/04/2.png)

- **Input:** corridor = "PPSPSP"
- **Output:** 1
- **Explanation:** There is only 1 way to divide the corridor, by not installing any additional dividers.
  Installing any would create some section that does not have exactly two seats.

**Example 3:**

![3](https://assets.leetcode.com/uploads/2021/12/12/3.png)

- **Input:** corridor = "S"
- **Output:** 0
- **Explanation:** There is no way to divide the corridor because there will always be a section that does not have exactly two seats.

**Constraints:**

- `n == corridor.length`
- `1 <= n <= 10⁵`
- `corridor[i]` is either `'S'` or `'P'`.



**Hint:**
1. Divide the corridor into segments. Each segment has two seats, starts precisely with one seat, and ends precisely with the other seat.
2. How many dividers can you install between two adjacent segments? You must install precisely one. Otherwise, you would have created a section with not exactly two seats.
3. If there are k plants between two adjacent segments, there are k + 1 positions (ways) you could install the divider you must install.
4. The problem now becomes: Find the product of all possible positions between every two adjacent segments.




**Similar Questions:**
1. [639. Decode Ways II](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000639-decode-ways-ii)
2. [1547. Minimum Cost to Cut a Stick](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001547-minimum-cost-to-cut-a-stick)
3. [1712. Ways to Split Array Into Three Subarrays](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001712-ways-to-split-array-into-three-subarrays)






**Solution:**

We are given a corridor represented as a string of seats (`'S'`) and plants (`'P'`). We need to divide it into sections such that each section has exactly 2 seats. There are already fixed dividers at the start and end. We can place additional dividers between any two adjacent positions (between indices i-1 and i).

The goal is to count the number of valid ways to place dividers. A section can have any number of plants, but must have exactly 2 seats. Two ways are different if there's at least one position where a divider is placed in one way but not the other.

### Key Observations

1. **Total number of seats must be even** - If odd, return 0.
2. **Each section must have exactly 2 seats** - So we need to pair up consecutive seats.
3. **Dividers must separate sections** - Between every two consecutive sections, we need exactly one divider.
4. **The problem reduces to counting possibilities between sections** - Once we identify where the seats are, the number of ways to place dividers between sections depends on the number of plants between certain seats.

### Step-by-step Reasoning

Let's walk through the example: `corridor = "SSPPSPS"`

1. **Find all seat positions**: indices [0, 1, 4, 6]
2. **Pair seats into sections**:
   - Section 1: seats at indices 0 and 1
   - Section 2: seats at indices 4 and 6
3. **Identify gaps between sections**:
   - Between section 1 and section 2: we have indices 1 to 4
   - Positions available for divider: between 1-2, 2-3, 3-4 (3 possibilities)
4. **Total ways**: 3

### General Pattern

1. Let the seat indices be `s[0], s[1], s[2], ..., s[m-1]` where `m` is the total number of seats.
2. If `m` is odd, return 0.
3. We need to form pairs: `(s[0], s[1])`, `(s[2], s[3])`, ..., `(s[m-2], s[m-1])`.
4. Between each consecutive pair of sections `(s[2k+1], s[2k+2])`, we need to place exactly one divider.
5. The number of possible positions for this divider is `(s[2k+2] - s[2k+1])`.
6. The total number of ways is the product of all these possibilities.

### Special Cases

- If there are no seats or only 2 seats: return 1 (if even) or 0 (if odd).
- We don't need dividers at the ends (they're already fixed).

### Mathematical Formulation

For `k` from 0 to `(m/2)-2`:
- Ways for gap k = `s[2k+2] - s[2k+1]`
- Total ways = `Π (s[2k+2] - s[2k+1])` for all k

Let's implement this solution in PHP: **[2147. Number of Ways to Divide a Long Corridor](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002147-number-of-ways-to-divide-a-long-corridor/solution.php)**

```php
<?php
/**
 * @param String $corridor
 * @return Integer
 */
function numberOfWays($corridor) {
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo numberOfWays("SSPPSPS") . "\n";    // Output: 3
echo numberOfWays("PPSPSP") . "\n";     // Output: 1
echo numberOfWays("S") . "\n";          // Output: 0
?>
```

### Explanation:

1. **Seat Collection**: We first iterate through the corridor to collect indices of all seats.

2. **Validation Check**: If the total number of seats is 0 or odd, we return 0 immediately.

3. **Calculating Ways**:
   - We start with `ways = 1`
   - For each gap between sections (between seat at index `2k+1` and seat at index `2k+2` where k starts from 0), we calculate the number of possible divider positions.
   - Multiply all these possibilities together, taking modulo at each step.

4. **Return Result**: The final product gives the total number of valid ways.

### Complexity

- Time: O(n) to scan the corridor once
- Space: O(n) to store seat indices (could be optimized to O(1))


**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**