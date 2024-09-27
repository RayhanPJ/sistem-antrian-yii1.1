<?php

/**
 * UserIdentity represents the data needed to identify a user.
 * It contains the authentication method that checks if the provided
 * data can identify the user.
 */
class UserIdentity extends CUserIdentity
{
    private $_id;

    /**
     * Authenticates a user.
     * @return boolean whether authentication succeeds.
     */
    public function authenticate()
    {
        // Find the user by username
        $user = Users::model()->findByAttributes(array('username' => $this->username));

        // Check if the user exists
        if ($user === null) {
            // If user is not found, return username invalid error
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        } elseif (!$user->validatePassword($this->password)) {
            // If password does not match, return password invalid error
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        } else {
            // If both username and password are correct
            $this->_id = $user->id; // Store the user's ID
            $this->setState('name', $user->username); // Store the username in session state
            $this->errorCode = self::ERROR_NONE; // Authentication successful
        }

        return !$this->errorCode; // Return true if there is no error
    }

    // Override the getId() function to return the stored user ID
    public function getId()
    {
        return $this->_id;
    }
}


