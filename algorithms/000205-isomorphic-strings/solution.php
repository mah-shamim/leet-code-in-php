<?php

class Solution {

    /**
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    function isIsomorphic(string $s, string $t): bool
    {
        // Create two arrays to store the last seen positions of characters

        // from strings 's' and 't'.

        $last_seen_s = array_fill(0, 256, 0);
        $last_seen_t = array_fill(0, 256, 0);

        // Iterate over the characters of the strings 's' and 't' simultaneously.

        foreach (array_map(null, str_split($s), str_split($t)) as $index => [$char_s, $char_t]) {
            $index += 1;  // Starting from 1

            // Convert the characters to their ASCII values

            $ascii_s = ord($char_s);
            $ascii_t = ord($char_t);

            // Check if the last seen positions for both characters are different.

            // If they are, then strings 's' and 't' are not isomorphic.

            if ($last_seen_s[$ascii_s] != $last_seen_t[$ascii_t]) {
                return false;
            }

            // Update the last seen positions for 'char_s', 'char_t' with the

            // current index which represents their new last seen position.

            $last_seen_s[$ascii_s] = $last_seen_t[$ascii_t] = $index;
        }

        // If we have not found any characters with different last seen positions

        // till the end of both strings, then the strings are isomorphic.

        return true;
    }
}
