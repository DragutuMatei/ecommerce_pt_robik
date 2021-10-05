<?php
class Validation
{
    private $_passed = false,
        $_errors = array();

    public function check($source, $items = array())
    {
        foreach ($items as $item => $rules) {
            foreach ($rules as $rule => $rule_value) {
                $value = $source[$item];
                if ($rule === 'required' && empty($value)) {
                    $this->addError("{$item} is required");
                } else if (!empty($value)) {
                    switch ($rule) {
                        case 'min':
                            if (strlen($value) <= $rule_value) {
                                $this->addError("{$item} must be at least {$rule_value} characters ");
                            }
                            break;
                        case 'max':
                            if (strlen($value) >= $rule_value) {
                                $this->addError("{$item} must be at max {$rule_value} characters ");
                            }
                            break;
                        case 'matches':
                            if ($value !== $source[$rule_value]) {
                                $this->addError("{$item} must be the same with the password");
                            }
                            break;
                    }
                }
            }
        }

        if (empty($this->_errors)) {
            $this->_passed = true;
        } else {
            $this->_passed = false;
        }

        return $this;
    }

    private function addError($error)
    {
        $this->_errors[] = $error;
    }

    public function passed()
    {
        return $this->_passed;
    }

    public function errors()
    {
        return $this->_errors;
    }
}
