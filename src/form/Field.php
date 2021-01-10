<?php


namespace app\src\form;


use app\src\Model;

class Field
{
    public const TYPE_TEXT = 'text';
    public const TYPE_PASSWORD = 'password';
    public const TYPE_TEXTAREA = 'textarea';

    public ?string $type = null;
    public Model $model;
    public string $attribute;

    /**
     * Field constructor.
     * @param Model $model
     * @param string $attribute
     */
    public function __construct(Model $model, string $attribute)
    {
        $this->type = self::TYPE_TEXT;
        $this->model = $model;
        $this->attribute = $attribute;
    }


    public function __toString()
    {
        if ($this->type === self::TYPE_TEXTAREA) {
            return sprintf('
                <div class="form-group">
                    <label>%s</label>
                    <textarea name="%s" class="form-control%s">
                        %s
                    </textarea>
                    <div class="invalid-feedback">%s</div>
                </div>
            ',
                $this->model->getLabel($this->attribute),
                $this->attribute,
                $this->model->hasError($this->attribute) ? ' is-invalid' : '',
                $this->model->{$this->attribute},
                $this->model->getfirstError($this->attribute)
            );
        }

        return sprintf('
            <div class="form-group">
                <label>%s</label>
                <input type="%s" name="%s" value="%s" class="form-control%s">
                <div class="invalid-feedback">%s</div>
            </div>
        ',
            $this->model->getLabel($this->attribute),
            $this->type,
            $this->attribute,
            $this->model->{$this->attribute},
            $this->model->hasError($this->attribute) ? ' is-invalid' : '',
            $this->model->getfirstError($this->attribute)
        );
    }

    public function passwordField()
    {
        $this->type = self::TYPE_PASSWORD;
        return $this;
    }

    public function textareaField()
    {
        $this->type = self::TYPE_TEXTAREA;
        return $this;
    }


}