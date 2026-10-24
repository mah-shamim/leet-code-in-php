2409\. Count Days Spent Together

**Difficulty:** Easy

**Topics:** `Mid Level`, `Math`, `String`, `Biweekly Contest 87`

Alice and Bob are traveling to Rome for separate business meetings.

You are given 4 strings `arriveAlice`, `leaveAlice`, `arriveBob`, and `leaveBob`. Alice will be in the city from the dates `arriveAlice` to `leaveAlice` (**inclusive**), while Bob will be in the city from the dates `arriveBob` to `leaveBob` (**inclusive**). Each will be a 5-character string in the format `"MM-DD"`, corresponding to the month and day of the date.

Return _the total number of days that Alice and Bob are in Rome together_.

You can assume that all dates occur in the **same** calendar year, which is **not** a leap year. Note that the number of days per month can be represented as: `[31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31]`.

**Example 1:**

- **Input:** arriveAlice = "08-15", leaveAlice = "08-18", arriveBob = "08-16", leaveBob = "08-19"
- **Output:** 3
- **Explanation:** Alice will be in Rome from August 15 to August 18. Bob will be in Rome from August 16 to August 19. They are both in Rome together on August 16th, 17th, and 18th, so the answer is 3.

**Example 2:**

- **Input:** arriveAlice = "10-01", leaveAlice = "10-31", arriveBob = "11-01", leaveBob = "12-31"
- **Output:** 0
- **Explanation:** There is no day when Alice and Bob are in Rome together, so we return 0.

**Example 3:**

- **Input:** arriveAlice = "01-01", leaveAlice = "12-31", arriveBob = "01-01", leaveBob = "12-31"
- **Output:** 365
- **Explanation:** Both Alice and Bob are in Rome for the entire non-leap year (days 1–365), so they are together on all 365 days.

**Example 4:**

- **Input:** arriveAlice = "01-15", leaveAlice = "01-20", arriveBob = "01-15", leaveBob = "01-20"
- **Output:** 6
- **Explanation:** Both stays are identical, covering days 15–20 inclusive (January 15th through 20th). The overlap length is 20 − 15 + 1 = 6.

**Example 5:**

- **Input:** arriveAlice = "01-01", leaveAlice = "01-10", arriveBob = "01-10", leaveBob = "01-20"
- **Output:** 1
- **Explanation:** Alice is in Rome on days 1–10 and Bob on days 10–20. They overlap only on day 10 (January 10th), which is inclusive for both, so the answer is 1.

**Example 6:**

- **Input:** arriveAlice = "02-01", leaveAlice = "03-01", arriveBob = "02-15", leaveBob = "02-20"
- **Output:** 6
- **Explanation:** Alice is in Rome on days 32–60 (February 1 – March 1) and Bob on days 46–51 (February 15–20). Bob's entire stay lies inside Alice's, so the overlap is days 46–51 = February 15th through 20th, i.e. 6 days.

**Example 7:**

- **Input:** arriveAlice = "01-01", leaveAlice = "01-05", arriveBob = "01-06", leaveBob = "01-10"
- **Output:** 0
- **Explanation:** Alice leaves on day 5 and Bob arrives on day 6. Although the stays are adjacent, they share no common day, so the answer is 0.

**Example 8:**

- **Input:** arriveAlice = "12-01", leaveAlice = "12-31", arriveBob = "12-31", leaveBob = "12-31"
- **Output:** 1
- **Explanation:** Alice is in Rome from day 335 to day 365, and Bob is there only on day 365 (December 31st). They overlap on that single final day of the year, so the answer is 1.

**Example 9:**

- **Input:** arriveAlice = "06-15", leaveAlice = "06-20", arriveBob = "03-01", leaveBob = "06-15"
- **Output:** 1
- **Explanation:** Alice arrives on day 166 (June 15) and leaves on day 171 (June 20); Bob's stay ends on day 166 (June 15). Their intervals touch only at day 166, so they are together for exactly 1 day.

**Example 10:**

- **Input:** arriveAlice = "04-01", leaveAlice = "04-30", arriveBob = "05-01", leaveBob = "05-31"
- **Output:** 0
- **Explanation:** Alice's stay covers April (days 91–120) and Bob's covers May (days 121–151). The intervals are consecutive but non-overlapping, so no day is shared and the answer is 0.

**Constraints:**

- All dates are provided in the format `"MM-DD"`.
- Alice and Bob's arrival dates are **earlier than or equal** to their leaving dates.
- The given dates are valid dates of a **non-leap** year.


**Hint:**

1. For a given day, determine if Alice or Bob or both are in Rome.
2. Brute force all 365 days for both Alice and Bob.


**Similar Questions:**

1. [1360. Number of Days Between Two Dates](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001360-number-of-days-between-two-dates)
2. [2224. Minimum Number of Operations to Convert Time](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002224-minimum-number-of-operations-to-convert-time)


**Solution:**

We convert each date string (`"MM-DD"`) into a **day-of-year number** (1–365) using a prefix-sum of the standard non-leap-year month lengths. Then, treating each person's stay as a closed interval `[start, end]`, we compute the **intersection** of Alice's and Bob's intervals. The overlap length is `min(endA, endB) - max(startA, startB) + 1`, clamped at 0 when the intervals don't intersect.

## Approach

- Define `$daysInMonth = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31]` (non-leap year).
- Write a helper `$toDayOfYear($date)` that:
  - Parses `MM` and `DD` from the 5-char string.
  - Sums all full months before `MM` and adds `DD`.
- Convert all four input dates to absolute day-of-year integers:
  - `aliceStart`, `aliceEnd`, `bobStart`, `bobEnd`.
- Compute the overlap window:
  - `overlapStart = max(aliceStart, bobStart)`
  - `overlapEnd   = min(aliceEnd, bobEnd)`
- Return `max(0, overlapEnd - overlapStart + 1)` — the `+1` accounts for **inclusive** endpoints.

Let's implement this solution in PHP: **[2409. Count Days Spent Together](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/002409-count-days-spent-together/solution.php)**

```php
<?php
/**
 * @param String $arriveAlice
 * @param String $leaveAlice
 * @param String $arriveBob
 * @param String $leaveBob
 * @return Integer
 */
function countDaysTogether(string $arriveAlice, string $leaveAlice, string $arriveBob, string $leaveBob): int
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo countDaysTogether("08-15", "08-18", "08-16", "08-19") . "\n"; // Output: 3
echo countDaysTogether("10-01", "10-31", "11-01", "12-31") . "\n"; // Output: 0
echo countDaysTogether("01-01", "12-31", "01-01", "12-31") . "\n"; // Output: 365
echo countDaysTogether("01-15", "01-20", "01-15", "01-20") . "\n"; // Output: 6
echo countDaysTogether("01-01", "01-10", "01-10", "01-20") . "\n"; // Output: 1
echo countDaysTogether("02-01", "03-01", "02-15", "02-20") . "\n"; // Output: 6
echo countDaysTogether("01-01", "01-05", "01-06", "01-10") . "\n"; // Output: 0
echo countDaysTogether("12-01", "12-31", "12-31", "12-31") . "\n"; // Output: 1
echo countDaysTogether("06-15", "06-20", "03-01", "06-15") . "\n"; // Output: 1
echo countDaysTogether("04-01", "04-30", "05-01", "05-31") . "\n"; // Output: 0
?>
```

### Explanation:

- **Date normalization:** Comparing `"MM-DD"` strings lexicographically is unreliable across boundaries (e.g., `"12-31"` vs `"01-01"`), so we flatten each date into a single integer day-of-year. Since the year is fixed and non-leap, no leap-day adjustment is needed.
- **Interval intersection:** Two inclusive intervals `[a₁, a₂]` and `[b₁, b₂]` overlap on `[max(a₁,b₁), min(a₂,b₂)]`.
- **Length of overlap:** Inclusive count is `end - start + 1` (e.g., Aug 16 → Aug 18 = 18 − 16 + 1 = 3 days).
- **No-overlap case:** If the intervals are disjoint, `min(endA,endB) < max(startA,startB)`, so the difference is negative; `max(0, …)` correctly returns `0`.

## Complexity Analysis

- **Time Complexity:** `O(1)` — constant work: one loop over at most 12 months per date, four dates total.
- **Space Complexity:** `O(1)` — fixed 12-element array plus a few scalar variables.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**