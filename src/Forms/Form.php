<?php declare(strict_types=1);

namespace mzb\Forms;

class Form
{
    public $form = [];

    public function __construct(array $form)
    {
        $this->form = $form;
    }
    


    public function start_form(string $action = null, string $method = 'post', string $id = null): self
    {
        '<form  action="' . $action . '" method="' . $method . ' " id="' . $id . '"/>';
        return $this;
    }
    

    public function addText(string $name, string $value = ''): self
    {
        '<input type="text" name="' . $name . '" value="' . $value . '" />';
        return $this;
    }

    public function addSubmit(string $name, string $value = '', string $onclick = ''): self
    {
        '<input type="button" name="' . $name . '" value="' . $value . '" onclick="' . $onclick . '" />';
        return $this;
    }

    public function addTextarea(string $name, string $value = ''): self
    {
        '<textarea name="' . $name . '">' . $value . '</textarea>';
        return $this;
    }
    
    public function addSelect(string $name, array $options, string $selected = ''): self
    {
        '<select name="' . $name . '">';
        foreach ($options as $key => $value) {
            '<option value="' . $key . '"';
            if ($key == $selected) {
                ' selected="selected"';
            }
            echo '>' . $value . '</option>';
        }
        echo '</select>';
        return $this;
    }
    
    public function addCheckbox(string $name, string $value = '', bool $checked = false): self
    {
        '<input type="checkbox" name="' . $name . '" value="' . $value . '"';
        if ($checked) {
            echo ' checked="checked"';
        }
        echo ' />';
        return $this;
    }
    
    public function addRadio(string $name, array $options, string $selected = ''): self
    {
        foreach ($options as $key => $value) {
            '<input type="radio" name="' . $name . '" value="' . $key . '"';
            if ($key == $selected) {
                echo ' checked="checked"';
            }
            echo ' />';
        }
        return $this;
    }
    
    public function addHidden(string $name, string $value = ''): self
    {
        '<input type="hidden" name="' . $name . '" value="' . $value . '" />';
        return $this;
    }
    
    public function addFile(string $name, string $value = ''): self
    {
        '<input type="file" name="' . $name . '" value="' . $value . '" />';
        return $this;
    }
    
    

    public function end_form()
    {
        return '</form>';
    }

    public function renderForm()
    {
        return $this->form;
    }
}
