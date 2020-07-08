<?php

/**
 * Ptikrina ar pasirinkimas egzistuoja $field masyve
 * @param $field_input
 * @param array $field
 * @return bool
 */
function validate_select($field_input, array &$field): bool
{
    if (!isset($field['options'][$field_input])) {
        $field['error'] = 'Nėra tokio pasirinkimo !';

        return false;
    }

    return true;
}

/**
 * validatorius turi patikrinti ar telefonas
 * atitinka +3706XXXXXXX formata
 * @param $field_input
 * @param $field
 * @return bool
 */
function validate_phone($field_input, array &$field): bool
{

    $pattern = '/\+3706[0-9]{7}/';

    if (!preg_match_all($pattern, $field_input)) {
        $field['error'] = 'blogai nurodytas numeris';

        return false;
    }
    return true;
}

/**
 * F-cija tikrinanti ar i laukeli ivesta skaicius yra float formato
 * @param $field_input
 * @param array $field
 * @return bool
 */
function validate_is_float($field_input, array &$field): bool
{
    if (!is_float($field_input)) {
        $field['error'] = 'Įveskite float tipo skaičių !';

        return false;
    }
    return true;
}