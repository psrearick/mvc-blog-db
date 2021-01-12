<?php


namespace app\src;


abstract class Model
{
    public const RULE_REQ = 'required';
    public const RULE_EMAIL = 'email';
    public const RULE_MIN = 'min';
    public const RULE_MAX = 'max';
    public const RULE_MATCH = 'match';
    public const RULE_UNIQUE = 'unique';


    /**
     * @param $data
     */
    public function loadData($data)
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }

    /**
     * @return array
     */
    abstract public function rules() : array;

    public function labels(): array
    {
        return [];
    }

    public function getLabel($attribute)
    {
        return $this->labels()[$attribute] ?? $attribute;
    }

    public array $errors = [];

    /**
     * Validation Rules Processing
     */
    public function validate(): bool
    {
        foreach ($this->rules() as $attr => $ruleset) {
            $value = $this->{$attr};
            foreach ($ruleset as $rule) {
                $ruleName = $rule;

                if(!is_string($ruleName)) {
                    $ruleName = $rule[0];
                }

                if ($ruleName === self::RULE_REQ && !$value) {
                    $this->addErrorForRule($attr, self::RULE_REQ);
                }

                if ($ruleName === self::RULE_EMAIL && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $this->addErrorForRule($attr, self::RULE_EMAIL);
                }

                if ($ruleName === self::RULE_MIN && strlen($value) < $rule['min']) {
                    $this->addErrorForRule($attr, self::RULE_MIN, $rule);
                }

                if ($ruleName === self::RULE_MAX && strlen($value) > $rule['max']) {
                    $this->addErrorForRule($attr, self::RULE_MAX, $rule);
                }

                if ($ruleName === self::RULE_MATCH && $value !== $this->{$rule['match']}) {
                    $rule['match'] = $this->getLabel($rule['match']);
                    $this->addErrorForRule($attr, self::RULE_MATCH, $rule);
                }

                if ($ruleName === self::RULE_UNIQUE) {
                    $class = $rule['class'];
                    $uniqueAttr = $rule['attribute'] ?? $attr;
                    $table = $class::tableName();
                    $statement = "SELECT * FROM $table WHERE $uniqueAttr = :attr";

                    // TODO: prepare statement and bind attribute to value
                    //      execute statement
                    //      fetch results and sets to variable $record
                    //      if results exists, throw an error

                    $record = null; // demo value, TODO: Get this value from query result
                    if ($record) {
                        $this->addErrorForRule($attr, self::RULE_UNIQUE, ['field' => $this->getLabel($attr)]);
                    }
                }
            }
        }
        return empty($this->errors);
    }

    /**
     * @param string $attr
     * @param string $rule
     * @param array $params
     */
    private function addErrorForRule(string $attr, string $rule, $params = [])
    {
        $msg = $this->errorMessages()[$rule] ?? '';
        foreach ($params as $key => $value) {
            $msg = str_replace("{{$key}}", $value, $msg);
        }
        $this->errors[$attr][] = $msg;
    }

    public function addError(string $attr, string $msg) {
        $this->errors[$attr][] = $msg;
    }

    public function errorMessages()
    {
        return [
            self::RULE_REQ => 'This field is required',
            self::RULE_EMAIL => 'This field must be a valid email address',
            self::RULE_MIN => 'This field must be at least {min} characters',
            self::RULE_MAX => 'This field must be no more that {max} characters',
            self::RULE_MATCH => 'This field must match {match}',
            self::RULE_UNIQUE => 'Record with this {field} already exists',

        ];
    }

    public function hasError($attr)
    {
        return $this->errors[$attr] ?? false;
    }

    public function getFirstError($attr)
    {
        return $this->errors[$attr][0] ?? false;
    }

}