<?php
function e_check($list, $field)
{
    if (isset($list) && $list->hasError($field)) {
        return $list->getError($field);
    } else {
        return false;
    }
}
