<?php
namespace JStormes\Bootstrap\View\Helper\Form;

use Zend\View\Helper\AbstractHelper;




class HorizontalText extends HorizontalAbstract
{
    
    public function HorizontalText($field,$value,$label=null,$options=null) {
            
        return $this->render($field, $value, $label, $options);
    }
    
    public function render($field,$value,$label=null, $options=null) {
        
        /* Default Options*/
        $defaultOptions = array(
            'spellcheck'=>'true',
        );
        
        $options = array_merge($defaultOptions,(array)$options);
        
        return $this->renderHTML("text", $field, $value, $label, $options);
    }

}