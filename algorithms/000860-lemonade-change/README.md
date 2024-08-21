860\. Lemonade Change

**Difficulty:** Easy

**Topics:** `Array`, `Greedy`

At a lemonade stand, each lemonade costs `$5`. Customers are standing in a queue to buy from you and order one at a time (in the order specified by bills). Each customer will only buy one lemonade and pay with either a `$5`, `$10`, or `$20` bill. You must provide the correct change to each customer so that the net transaction is that the customer pays `$5`.

**Note** that you do not have any change in hand at first.

Given an integer array `bills` where `bills[i]` is the bill the <code>i<sup>th</sup></code> customer pays, return _`true` if you can provide every customer with the correct change, or `false` otherwise_.

**Example 1:**

- **Input:** bills = [5,5,5,10,20]
- **Output:** true
- **Explanation:**\
  From the first 3 customers, we collect three $5 bills in order.\
  From the fourth customer, we collect a $10 bill and give back a $5.\
  From the fifth customer, we give a $10 bill and a $5 bill.\
  Since all customers got correct change, we output true.

**Example 2:**

- **Input:** bills = [5,5,10,10,20]
- **Output:** false
- **Explanation:**\
  From the first two customers in order, we collect two $5 bills.\
  For the next two customers in order, we collect a $10 bill and give back a $5 bill.\
  For the last customer, we can not give the change of $15 back because we only have two $10 bills.\
  Since not every customer received the correct change, the answer is false.

**Constraints:**

- <code1 <= bills.length <= 10<sup>5</sup></code>
- `bills[i]` is either `5`, `10`, or `20`.


**Solution:**


We need to simulate the process of providing change to customers based on the bills they use to pay. The key is to track the number of $5 and $10 bills you have, as these are needed to provide change for larger bills

Let's implement this solution in PHP: **[860. Lemonade Change](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000860-lemonade-change/solution.php)**

```php
<?php
// Example usage:
$bills = [5, 5, 5, 10, 20];
echo lemonadeChange($bills) ? 'true' : 'false'; // Output: true

$bills = [5, 5, 10, 10, 20];
echo lemonadeChange($bills) ? 'true' : 'false'; // Output: false
?>
```

### Explanation:

1. **Initialization**: We start with `$five` and `$ten` set to 0, representing the count of $5 and $10 bills we have.

2. **Processing Each Bill**:
   - **If the customer pays with a $5 bill**: We simply increment the count of $5 bills.
   - **If the customer pays with a $10 bill**: We need to give back one $5 bill as change, so we decrement the count of $5 bills and increment the count of $10 bills. If we don't have any $5 bills, return `false`.
   - **If the customer pays with a $20 bill**: We prioritize giving one $10 bill and one $5 bill as change. If that's not possible, we try to give three $5 bills. If neither option is available, return `false`.

3. **Final Check**: If we've successfully processed all customers without running out of change, return `true`.

### Edge Cases:
- The function should handle scenarios where it's impossible to give the correct change, such as when you receive a $10 or $20 bill too early without having the necessary $5 bill(s) on hand.
- It should efficiently handle large input sizes due to the constraints (up to 100,000 customers). The solution runs in O(n) time complexity, making it optimal for this problem.

**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
