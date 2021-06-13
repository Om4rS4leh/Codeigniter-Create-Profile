<?php

function display_error($validation, $field)
{
    if ($validation) {
        if ($validation->hasError($field)) {
            return '<div class="alert alert-danger mt-2 py-2" role="alert">' . $validation->getError($field) . '</div>';
        } else {
            return false;
        }
    }
}
function query_result_message($session)
{
    if (!empty(session()->getFlashdata())) {
        foreach ($session->getFlashData() as $className => $message) {
            if (in_array($className, ["success", "warning", "danger"])) {
                return '<div class="alert alert-' . $className . ' mt-2 py-2" role="alert">' . $message . '</div>';
            }
        }
    }
}
function generate_input_field($validation, $value, $name, $label, $type = "text", $placeholder = '')
{
    $placeholder = $placeholder !== '' ? $placeholder : "Enter Your " . $label;
    return '
        <div class="form-group mb-3">
            <label for="' . $name . '" class="form-label">' . $label . '</label>
            <input class="form-control" placeholder="' . $placeholder . '" type="' . $type . '" name="' . $name . '" value="' . $value . '">
            ' . display_error($validation, $name) . '
        </div>
    ';
}
