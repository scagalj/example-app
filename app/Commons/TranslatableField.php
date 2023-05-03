<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Commons;

/**
 * Description of TranslatableField
 *
 * @author Stjepan
 */
class TranslatableField {

    private $values = [];

    public function getValue($lang) {
        return $this->values[$lang] ?? null;
    }

    public function setValue($lang, $value) {
        $this->values[$lang] = $value;
    }

    public function getValues() {
        return $this->values;
    }

}
