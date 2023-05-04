<?php

// Include configuration file
require_once('../config/config.php');

/**
 * Hash password with random salt.
 *
 * @param string $password The password to hash.
 * @return string The hashed password with salt.
 */
function hash_password($password)
{
    $salt = "randomsalt"; // Generate random salt
    $hashed_password = hash('sha256', $password . $salt); // Hash password using sha256 algorithm
    return $salt . $hashed_password; // Concatenate salt and hashed password and store in file
}

/**
 * Check if given password matches with hashed password.
 *
 * @param string $password The password to check.
 * @param string $hashed_password The hashed password to compare with.
 * @return bool True if passwords match, False otherwise.
 */
function check_password($password, $hashed_password)
{
    $salt = substr($hashed_password, 0, 10); // Extract salt from stored hashed password
    $input_hashed_password = hash('sha256', $password . $salt); // Hash input password using same salt and algorithm
    return $salt . $input_hashed_password === $hashed_password; // Compare both hashed values
}

/**
 * Get the last parameter from a URL.
 *
 * @param string $url The URL to extract the last parameter from.
 * @return int The last parameter as an integer.
 */
function getLastNumberFromUrl($url)
{
    $parts = explode('/', $url); // Split URL by "/"
    $lastPart = end($parts); // Get the last element of the array
    return intval($lastPart); // Convert last parameter to an integer and return
}

?>
