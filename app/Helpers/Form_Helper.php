<?php

function display_validation_error($validation, $field)
{
    if ($validation) {
        if ($validation->hasError($field)) {
            return '<div class="alert alert-danger mt-2 py-2" role="alert">' . $validation->getError($field) . '</div>';
        } else {
            return null;
        }
    }
}

function generate_input_field($validation, $options)
{
    $name = $options['name'];
    $label = $options['label'];
    $value = $options['value'];

    $defaultPlaceHolder = "Enter Your " . $label;
    $placeholder = isset($options['placeholder']) ? $options['placeholder'] : $defaultPlaceHolder;

    $defaultType = strpos($name, 'password') !== false ? 'password' : 'text';
    $type = isset($options['type']) ? $options['type'] : $defaultType;

    return '
        <div class="form-group mb-3">
            <label for="' . $name . '" class="form-label">' . $label . '</label>
            <input class="form-control" placeholder="' . $placeholder . '" type="' . $type . '" name="' . $name . '" value="' . $value . '" >
            ' . display_validation_error($validation, $name) . '
        </div>
    ';
}
