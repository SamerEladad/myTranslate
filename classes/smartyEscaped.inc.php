<?php
class smartyEscaped extends Smarty 
{ 
    public function assign($templateVar, $value = null, $toEscape = true, $nocache = false)
    {
        if ($toEscape) {
            if (!is_array($value)) {
                if ($value !== null) {
                    $value = htmlentities($value, ENT_QUOTES, 'UTF-8');
                }
            } else {
                array_walk_recursive($value, function (&$item) {
                    if ($item !== null) {
                        $item = htmlentities($item, ENT_QUOTES, 'UTF-8');
                    }
                });
            }
        }
        parent::assign($templateVar, $value, $nocache);
    }
}
