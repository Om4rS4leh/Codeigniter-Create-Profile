<?php


function display_flash_messages($session)
{
    if (!empty($session->getFlashdata())) {
        foreach ($session->getFlashData() as $className => $message) {
            if (in_array($className, ["success", "warning", "danger"])) {
                return '<div class="alert alert-' . $className . ' mt-2 py-2" role="alert">' . $message . '</div>';
            }
        }
    }
}
