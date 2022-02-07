<?php



class FormValidation
{
    public function emptyInputs($inputs)
    {
        foreach ($inputs as $input) {
            if (empty($input))
                return true;
        }
    }
    public function imageError($img_error)
    {
        if ($img_error !== 0) {
            return true;
        }
    }
    public function imageSize($image_size)
    {
        if ($image_size > 500000) {
            return true;
        }
    }
}
