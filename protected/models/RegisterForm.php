<?php

/**
 * RegisterForm class.
 * RegisterForm is the data structure for keeping
 * user registration form data. It is used by the 'register' action of 'SiteController'.
 */
class RegisterForm extends CFormModel
{
    public $username;
    public $email;
    public $password;
    public $confirmPassword;

    /**
     * Declares the validation rules.
     * The rules state that username, email, and passwords are required,
     * and passwords must match.
     */
    public function rules()
    {
        return array(
            // username, email, and passwords are required
            array('username, email, password, confirmPassword', 'required'),
            // email must be a valid email address
            array('email', 'email'),
            // username length should be within a certain range
            array('username', 'length', 'max' => 50),
            // password length should be within a certain range
            array('password', 'length', 'min' => 6),
            // confirmPassword needs to be compared with password
            array('confirmPassword', 'compare', 'compareAttribute' => 'password'),
        );
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels()
    {
        return array(
            'username' => 'Username',
            'email' => 'Email',
            'password' => 'Password',
            'confirmPassword' => 'Confirm Password',
        );
    }

    /**
     * Registers the user using the given attributes in the model.
     * @return boolean whether registration is successful
     */
    public function register()
    {
        if ($this->validate()) {
            $user = new Users;
            $user->username = $this->username;
            $user->email = $this->email;
            $user->password = $this->hashPassword($this->password);
            $user->auth_token = ''; // Set if you need an auth token
            $user->created_at = new CDbExpression('NOW()');
            return $user->save();
        }
        return false;
    }

    /**
     * Hashes a password using PHP's password_hash function.
     * @param string $password the password to hash
     * @return string the hashed password
     */
    protected function hashPassword($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }
}
