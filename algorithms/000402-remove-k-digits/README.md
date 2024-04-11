402\. Remove K Digits

Medium

Given string num representing a non-negative integer `num`, and an integer `k`, return <i>the smallest possible integer after removing</i> `k` <i>digits from</i> `num`.



**Example 1:**

- **Input:** <code>**num = "1432219", k = 3**</code>
- **Output:** <code>**"1219"**</code>
- **Explanation:** <code>**Remove the three digits 4, 3, and 2 to form the new number 1219 which is the smallest.**</code>

**Example 2:**

- **Input:** <code>**num = "10200", k = 1**</code>
- **Output:** <code>**"200"**</code>
- **Explanation:** <code>**Remove the leading 1 and the number is 200. Note that the output must not contain leading zeroes.**</code>

**Example 3:**

- **Input:** <code>**num = "10", k = 2**</code>
- **Output:** <code>**"0"**</code>
- **Explanation:** <code>**Remove all the digits from the number, and it is left with nothing which is 0.**</code>



**Constraints:**

- <code>1 <= k <= num.length <= 10<sup>5</sup></code>
- `num` consists of only digits.
- `num` does not have any leading zeros except for the zero itself.

