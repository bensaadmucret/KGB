<?php declare(strict_types=1);

namespace mzb\Forms;

class Form
{
    private $form = '';


    public function create()
    {
        return $this->form;
    }
    

    /**
     * Début de la balise form
     *
     * @param string $action
     * @param string $method
     * @param string $id
     * @param array $attribute
     * @return self
     */
    public function start_form(
        string $action = "",
        string $method = 'post',
        string $id = '#',
        array $attribute = []
    ): self {
        $this->form .= '<form  action="' . $action . '" method="' . $method . ' " id="' . $id . '"';
        $this->form .= $attribute ? $this->addAttributes($attribute).'>' : '>';
        return $this;
    }
    
    /**
     * Ajoute les attributs du formulaire
     *
     * @param array $attributes
     * @return self
     */
    private function addAttributes(array $attributes): string
    {
        $attribute_data='';
        $short_attributes = ['autocomplete', 'autofocus', 'checked', 'disabled',
        'formaction', 'formenctype', 'formmethod', 'formnovalidate',
        'formtarget', 'list', 'max', 'maxlength', 'min', 'multiple',
        'pattern', 'placeholder', 'readonly', 'required', 'size',
        'src', 'step', 'type', 'value'];
        foreach ($attributes as $key => $value) {
            if (in_array($key, $short_attributes)) {
                $attribute_data .= " $key ";
            } else {
                $attribute_data .=  "$key = '$value'";
            }
        }
        return  $attribute_data;
    }

        
       
     
 

    public function addText(string $name, string $value = ' ', array $attribute=[]): self
    {
        $this->form .='<input type="text" name="' . $name . '" value="' . $value . '"';
        $this->form .= $attribute ? $this->addAttributes($attribute).'>' : '>';

        return $this;
    }

    /**
     * Ajoute un bouton submettre
     * @param string $texte
     * @param array $attributs
     * @return Form
     */
    public function addBouton(string $texte, array $attributs = []):self
    {
        // On ouvre le bouton
        $this->form .= '<button ';

        // On ajoute les attributs
        $this->form .= $attributs ? $this->addAttributes($attributs) : '';

        // On ajoute le texte et on ferme
        $this->form .= ">$texte</button>";

        return $this;
    }

    public function addTextarea(string $name, string $value = ''): self
    {
        $this->form .='<textarea name="' . $name . '">' . $value . '</textarea>';
        return $this;
    }
    
    public function addSelect(string $name, array $options, string $selected = ''): self
    {
        $this->form .='<select name="' . $name . '">';
        foreach ($options as $key => $value) {
            $this->form .= '<option value="' . $key . '"';
            $this->form .= $key == $selected ? ' selected="selected >' : '>';
            $this->form .= $value . '</option>';
        }
        $this->form .='</select>';
        return $this;
    }
    
    public function addCheckbox(string $name, string $value = '', bool $checked = false): self
    {
        $this->form .='<input type="checkbox" name="' . $name . '" value="' . $value . '"';
        $this->form .= $checked  ? 'checked=checked />' : '/>';
        return $this;
    }
    
    public function addRadio(string $name, array $options, string $selected = ''): self
    {
        foreach ($options as $key => $value) {
            $this->form .='<input type="radio" name="' . $name . '" value="' . $key . '"';
            $this->form .= $key == $selected ? ' checked="checked /> ' : '/> ';
        }
        return $this;
    }
    
    public function addHidden(string $name, string $value = ''): self
    {
        $this->form .='<input type="hidden" name="' . $name . '" value="' . $value . '" />';
        return $this;
    }
    
    public function addFile(string $name, string $value = ''): self
    {
        $this->form .= '<input type="file" name="' . $name . '" value="' . $value . '" />';
        return $this;
    }

    /**
     * Ajout d'un label
     * @param string $for
     * @param string $texte
     * @param array $attributs
     * @return Form
     */
    public function addFor(string $name, string $texte, array $attributs = []):self
    {
        // On ouvre la balise
        $this->form .= "<label for='$name'";

        // On ajoute les attributs
        $this->form .= $attributs ? $this->addAttributes($attributs) : '';

        // On ajoute le texte
        $this->form .= ">$texte</label>";

        return $this;
    }
    
    
    /**
     * ferme la balise form
     *
     * @return self
     */
    public function end_form():self
    {
        $this->form .= '</form>';
        return $this;
    }

    public function renderForm()
    {
        return $this->form;
    }
}
