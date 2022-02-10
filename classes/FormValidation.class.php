<?php



class FormValidation
{
    // is the inputs are empty 
    public function emptyInputs($inputs)
    {
        foreach ($inputs as $input) {
            if (empty($input))
                return true;
        }
    }

    // is there are erro with image 
    public function imageError($img_error)
    {
        if ($img_error !== 0) {
            return true;
        }
    }

    // is image size more than 50000
    public function imageSize($image_size)
    {
        if ($image_size > 500000) {
            return true;
        }
    }

    // if this is a valid email 
    public function invalidEmail($email)
    {
        if ((filter_var($email, FILTER_VALIDATE_EMAIL))) {
            return false;
        } else {
            return true;
        }
    }

    // invalid username 
    public function invalidUsername($username)
    {
        if (!(preg_match("/^[a-zA-Z0-9_-]*$/", $username))) {
            return true;
        }
    }

    // if the password not equal to password 2
    public function passwrodNotMatch($password, $confirm_password)
    {
        if ($password !== $confirm_password) {
            return true;
        }
    }
}
