950\. Reveal Cards In Increasing Order

**Difficulty:** Medium

**Topics:** `Array`, `Queue`, `Sorting`, `Simulation`

You are given an integer array `deck`. There is a deck of cards where every card has a unique integer. The integer on the <code>i<sup>th</sup></code> card is `deck[i]`.

You can order the deck in any order you want. Initially, all the cards start face down (unrevealed) in one deck.

You will do the following steps repeatedly until all cards are revealed:

1. Take the top card of the deck, reveal it, and take it out of the deck.
2. If there are still cards in the deck then put the next top card of the deck at the bottom of the deck.
3. If there are still unrevealed cards, go back to step 1. Otherwise, stop.

Return _an ordering of the deck that would reveal the cards in increasing order_.

**Note** that the first entry in the answer is considered to be the top of the deck.



**Example 1:**

- **Input:** <code>**deck = [17,13,11,2,3,5,7]**</code>
- **Output:** <code>**[2,13,3,11,5,17,7]**</code>
- **Explanation:**
  - <code>**We get the deck in the order [17,13,11,2,3,5,7] (this order does not matter), and reorder it**</code>.
  - <code>**After reordering, the deck starts as [2,13,3,11,5,17,7], where 2 is the top of the deck**</code>.
  - <code>**We reveal 2, and move 13 to the bottom.  The deck is now [3,11,5,17,7,13]**</code>.
  - <code>**We reveal 3, and move 11 to the bottom.  The deck is now [5,17,7,13,11]**</code>.
  - <code>**We reveal 5, and move 17 to the bottom.  The deck is now [7,13,11,17]**</code>.
  - <code>**We reveal 7, and move 13 to the bottom.  The deck is now [11,17,13]**</code>.
  - <code>**We reveal 11, and move 17 to the bottom.  The deck is now [13,17]**</code>.
  - <code>**We reveal 13, and move 17 to the bottom.  The deck is now [17]**</code>.
  - <code>**We reveal 17**</code>.
  - <code>**Since all the cards revealed are in increasing order, the answer is correct**</code>.

**Example 2:**

- **Input:** <code>**deck = [1,1000]**</code>
- **Output:** <code>**[1,1000]**</code>



**Constraints:**

- `1 <= deck.length <= 1000`
- <code>1 <= deck[i] <= 10<sip>6</sup></code>
- All the values of `deck` are **unique**.


**Solution:**

The problem "Reveal Cards in Increasing Order" is a simulation-based problem where we are tasked with revealing cards in a specific way such that the revealed sequence is in increasing order. The key challenge lies in finding the initial arrangement of cards to achieve the desired order.


### Key Points
- We can sort the input `deck` array.
- Using a simulation, we aim to arrange the deck such that following the given process of revealing and moving cards, the result is in ascending order.
- Data structures like a deque (double-ended queue) can simplify the problem.


### Approach
1. **Sort the Deck**: Begin by sorting the deck in descending order. This simplifies managing the "largest card first" strategy for simulation.
2. **Simulate the Revealing Process**: Use a deque to simulate the process:
  - If the deque is not empty, move the card at the bottom of the deque to the front.
  - Add the current card from the sorted deck to the front of the deque.
3. **Output the Result**: The deque at the end will represent the required initial arrangement of the deck.


### Plan
1. Sort the input array in descending order.
2. Initialize an empty deque.
3. For each card in the sorted deck:
  - If the deque is not empty, move the last card to the front.
  - Insert the current card at the front.
4. Convert the deque to an array and return the result.

Let's implement this solution in PHP: **[950. Reveal Cards In Increasing Order](https://github.com/mah-shamim/leet-code-in-php/tree/main/algorithms/000947-most-stones-removed-with-same-row-or-column/solution.php)**

```php
<?php
/**
 * @param Integer[] $deck
 * @return Integer[]
 */
function deckRevealedIncreasing(array $deck): array
{
    ...
    ...
    ...
    /**
     * go to ./solution.php
     */
}

// Example 1
$deck = [17, 13, 11, 2, 3, 5, 7];
$output = deckRevealedIncreasing($deck);
echo "Output: [" . implode(", ", $output) . "]\n";

// Example 2
$deck = [1, 1000];
$output = deckRevealedIncreasing($deck);
echo "Output: [" . implode(", ", $output) . "]\n";
?>
```

### Explanation:

The idea is to reverse-simulate the process:
1. Start with the largest card since it will be revealed last.
2. Simulate the steps of moving the bottom card to the top and adding the new card to the top.
3. By sorting the deck in descending order, we construct the correct arrangement backward.


### Example Walkthrough

**Input**: `deck = [17, 13, 11, 2, 3, 5, 7]`

1. **Sort the Deck**: `deck = [17, 13, 11, 7, 5, 3, 2]`.
2. **Initialize Deque**: Start with an empty deque.
3. **Simulate**:
  - Add `2`: `deque = [2]`.
  - Add `3` (move `2` to the back): `deque = [3, 2]`.
  - Add `5` (move `2` to the back, then `3`): `deque = [5, 2, 3]`.
  - Add `7` (move `3` to the back, then `2`, then `5`): `deque = [7, 5, 2, 3]`.
  - Add `11`: Repeat steps, `deque = [11, 7, 5, 2, 3]`.
  - Add `13`: Repeat steps, `deque = [13, 11, 7, 5, 2, 3]`.
  - Add `17`: Repeat steps, `deque = [17, 13, 11, 7, 5, 2, 3]`.
4. Convert deque to array: `[2, 13, 3, 11, 5, 17, 7]`.

**Output**: `[2, 13, 3, 11, 5, 17, 7]`.


### Time Complexity
- **Sorting**: _**O(n log n)**_, where _**n**_ is the number of cards.
- **Simulation**: _**O(n)**_, as each card is moved at most once.
- **Overall**: _**O(n log n)**_.


### Output for Example
**Input**: `deck = [17, 13, 11, 2, 3, 5, 7]`  
**Output**: `[2, 13, 3, 11, 5, 17, 7]`.


This solution effectively leverages sorting and deque operations to solve the problem in a time-efficient manner. By simulating the process in reverse, we achieve the desired order while maintaining clarity and simplicity.


**Contact Links**

If you found this series helpful, please consider giving the **[repository](https://github.com/mah-shamim/leet-code-in-php)** a star on GitHub or sharing the post on your favorite social networks 😍. Your support would mean a lot to me!

If you want more helpful content like this, feel free to follow me:

- **[LinkedIn](https://www.linkedin.com/in/arifulhaque/)**
- **[GitHub](https://github.com/mah-shamim)**
