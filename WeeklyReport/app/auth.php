<?php

// Start session
session_start();

/**
 * Validate if user is logged in
 * 
 * @return bool true if user is logged in, false otherwise
 */
function identify_user_login(){
	if(isset($_SESSION['username'])) {
		return true;
	} else {
		return false;
	}
}

/**
 * Validate if user has advanced authority
 * 
 * @return bool true if user has advanced authority, false otherwise
 */
function check_user_advanced_authority(){
	if(isset($_SESSION['role'])) {
		if($_SESSION['role'] > 1) {
			return true;
		} else {
			return false;
		}
	} else {
		return false;
	}
}

/**
 * Validate if user is current user
 * 
 * @return bool true if user is current user, false otherwise
 */
function isCurrentUser($current_username) {
	return $_SESSION['username'] == $current_username ? true : false;
}

?>