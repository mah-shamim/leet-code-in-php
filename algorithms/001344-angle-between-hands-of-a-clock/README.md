1344\. Angle Between Hands of a Clock

**Difficulty:** Medium

**Topics:** `Staff`, `Math`, `Biweekly Contest 19`

Given two numbers, `hour` and `minutes`, return _the smaller angle (in degrees) formed between the `hour` and the `minute` hand_.

Answers within `10⁻⁵` of the actual value will be accepted as correct.

**Example 1:**

![sample_1_1673](https://assets.leetcode.com/uploads/2019/12/26/sample_1_1673.png)

- **Input:** hour = 12, minutes = 30
- **Output:** 165

**Example 2:**

![sample_2_1673](https://assets.leetcode.com/uploads/2019/12/26/sample_2_1673.png)

- **Input:** hour = 3, minutes = 30
- **Output:** 75

**Example 3:**

![sample_3_1673](https://assets.leetcode.com/uploads/2019/12/26/sample_3_1673.png)

- **Input:** hour = 3, minutes = 15
- **Output:** 7.5

**Constraints:**

- `1 <= hour <= 12`
- `0 <= minutes <= 59`


**Hint:**
1. The tricky part is determining how the minute hand affects the position of the hour hand.
2. Calculate the angles separately then find the difference.


**Solution:**


We implement a direct mathematical solution to compute the smaller angle between the clock hands. By calculating each hand’s angular position independently and then taking the minimum of the absolute difference and its complement to 360°, we efficiently obtain the result in constant time.

## Approach

- **Minute hand angle** – Each minute moves the minute hand by `6°` (since `360° / 60 = 6°`).
- **Hour hand angle** – Each hour moves the hour hand by `30°` (since `360° / 12 = 30°`), plus an additional `0.5°` per minute (since `30° / 60 = 0.5°`).
- **Normalize hour** – Convert `12` to `0` because the `12‑hour` dial wraps around.
- **Compute difference** – Take the absolute angular difference.
- **Return smaller angle** – Since two lines form two angles (`θ` and `360°−θ`), we return the minimum.

Let's implement this solution in PHP: **[1. Angle Between Hands of a Clock](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/001344-angle-between-hands-of-a-clock/solution.php)**

```php
<?php
/**
 * @param Integer $hour
 * @param Integer $minutes
 * @return Float
 */
function angleClock(int $hour, int $minutes): float
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Test cases
echo angleClock(12, 30);        // Output: 165
echo angleClock(3, 30);         // Output: 75
echo angleClock(3, 15);         // Output: 7.5
?>
```

### Explanation:

- The minute hand angle is simply `minutes * 6`.
- The hour hand angle is `(hour % 12) * 30 + minutes * 0.5`, accounting for the hour hand's continuous movement.
- The absolute difference `|hourAngle - minuteAngle|` gives one of the two angles.
- The smaller angle is always `min(diff, 360 - diff)` because the total circle is `360°`.
- This works for all valid inputs (`1–12 hour`, `0–59 minutes`) and meets the required precision (`10⁻⁵`).

**Complexity Analysis**

- **Time Complexity:** _**O(1)**_ – only a few arithmetic operations, independent of input size.
- **Space Complexity:** _**O(1)**_ – uses only a constant number of variables.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me[!](https://chaindoorman.com/hzk8jsphf8?key=5ba736283dafd7f94a84865e3cc3d775)
<a href="https://buymeacoffee.com/mah.shamim" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/v2/default-yellow.png" alt="Buy Me A Coffee" style="height: 60px !important;width: 217px !important;box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;-webkit-box-shadow: 0px 3px 2px 0px rgba(190, 190, 190, 0.5) !important;" ></a>

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**