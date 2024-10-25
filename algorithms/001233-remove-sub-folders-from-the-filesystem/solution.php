<?php

class Solution {

    /**
     * @param String[] $folder
     * @return String[]
     */
    function removeSubfolders($folder) {
        // Step 1: Sort folders lexicographically
        sort($folder);

        // Step 2: Initialize result array
        $result = [];

        // Step 3: Loop through each folder
        foreach ($folder as $folders) {
            // Check if the current folder is a sub-folder of the last folder in result
            if (empty($result) || strpos($folders, end($result) . '/') !== 0) {
                // If it's not a sub-folder, add it to the result
                $result[] = $folders;
            }
        }

        return $result;
    }
}