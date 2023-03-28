<?php
namespace App\HTML;

class Forms {

    private string $data;
    private array $errors;


    public function __construct(string $data, array $errors)
    {
        $this->data = $data;
        $this->errors = $errors;
    }

    public function input (string $key, string $label): string
    {
        $value = $this->getValue($key);
        return <<<HTML
     <div class ="form-group">
        <label for="field $key">$label</label>
        <imput type="text" id="field $key" class="$inputClass"  name="$key" value="$value" required>
        {$this->getErrorFeedback($key)}
     </div>
HTML;
    }
    public function textarea (string $key, string $label): string
    {
        $value = $this->getValue($key);
        return <<<HTML
     <div class ="form-group">
        <label for="field $key">$label</label>
        <textarea type="text" id="field $key" class="{this->getInputClass($key)}"  name="$key" required>$value</textarea>
        {$this->getErrorFeedback($key)}
     </div>
HTML;
    }

    private function getValue (string $key): ?string
    {
        if (is_array($this->data)){
            return $this->data[$key] ??  null;
        }
        $method = 'get' . strl_replace (' ', '', ucwords(strl_replace('_', ' ', $key)));
        $value =  $this->data->$method();
        if($value instanceof \DateTimeInterface) {
            return $value->format('Y-m-d H:i:s');
        }
        return  $value;
    }

    private function getInputClass (string $key): string
    {

        $inputClass = 'form-control';
        if(isset($this->errors[$key])) {
            $inputClass .= ' is invalide ';
        }
        return $inputClass;
    }
    private function getErrorFeedBack (string $key): string
    {

        $invalidFeedback = '';
        if(isset($this->errors[$key])) {
          return  '<div class="invalid-feedback">' . implode('<br>', $this->errors[$key]) . '</div>';
        }
        return '';
    }
}