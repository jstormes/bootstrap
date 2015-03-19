<?php
/**
 *
 * @author jstormes
 * @version 1
 */

namespace JStormes\Bootstrap\View\Helper\Form;

use Zend\View\Helper\AbstractHelper;


/**
 * Bootstrap helper for http://getbootstrap.com/css/#forms-horizontal 
 *
 * @uses viewHelper
 */
class HorizontalAbstract extends AbstractHelper
{

    /**
     * Type of input control
     * @var string 
     */
    protected $type = null;
    
    /**
     * Field name of input control
     * @var string
     */
    protected $field = null;
    
    /**
     * Value of input control 
     * @var string|array|Zend_Db_Row
     */
    protected $value = null;
    
    /**
     * Label/options for input control
     * @var string|array
     */
    protected $label = null;
    
    /**
     * Options for input control
     * @var array
     */
    protected $options = array(
	        "labelStyle"=>"col-lg-4",   // Default to rule of thirds for layout
	        "inputStyle"=>"col-lg-8"    // ..
	    );
    
	/**
	 * @var Zend_View_Interface 
	 */
	public $view;
	
	public function __invoke($field,$value,$label=null, $options=null)
	{
	    return $this->render($field, $value, $label, $options);
	}
	
	/**
	 * Sets the view field
	 * @param $view Zend_View_Interface
	 */
	//public function setView(Zend_View_Interface $view) {
	//    $this->view = $view;
	//}
	
	/**
	 * Convert options array to HTML input attributes
	 * 
	 * @param $options array
	 * @return string
	 */
	protected function convertOptionsToAttributes() {
	    
	    // String to hold attributes
	    $this->attributesString = '';
	     
	    // Boolean input attributes
	    $booleanOpts = array('readonly','disabled','required');
	    foreach($booleanOpts as $opt) {
	        if (isset($this->options[$opt]))
	            if ($this->options[$opt]==true) $this->attributesString .= "{$opt} ";
	    }
	     
	    // Key Value input attributes
	    $inputOpts = array('size','maxlength','autocomplete','novalidate','autofocus','form','formaction'
	        ,'formenctype','formmethod','formnovalidate','formtarget','height','width','list','min','max'
	        ,'multiple','pattern','placeholder','step','title','rows','spellcheck'
	    );
	    foreach($inputOpts as $opt) {
	        if (isset($this->options[$opt])) $this->attributesString .= "{$opt}='{$this->options[$opt]}' ";
	    }
	    
	    // Data attributes
	    foreach($this->options as $key=>$value){
	        if (strpos($key,'data')===0) {
	            $this->attributesString .= "{$key}='{$value}' ";
	        }
	    }
	    
	}
	
	protected function setOptions($options) {
	    
	    // Merge our default options into the passed options.
	    if (is_array($options))
    	    $this->options = array_merge($this->options, $options);
	    
	    // If options is a string make it a placeholder
	    if (is_string($options))
	        $this->options['placeholder']=$options;
	    
	    
	}
	
	protected function setLabel($label) {
	    
	    // Default the label to the field name
	    if ($this->field!==null)
	        $this->options['label']=$this->field;
	    
	    // If we have a label use it
	    if ($label!==null) {
	         
	        // If label is a string use it a the label.
	        if (is_string($label))
	            $this->options['label'] = $label;
	         
	        // If label is an array use it a more options.
	        if(is_array($label))
	            $this->options = array_merge($this->options, $label);
	    }
	}
	
	protected function setValue($value) {
	    // if value is a Zend_Db_Table_Row get just the column we need.
	    if (is_a($value,'Zend_Db_Table_Row')) {
	        $$this->value=$value->$field;
	    }
	     
	    // if value is an array get just the index we need.
	    if (is_array($value)) {
	        $$this->value=$value[$this->field];
	    }
	    
	    // if value is a simple string, assume it is the value
	    if (is_string($value)) {
	        $this->value = $value;
	    }
	}
	
	protected function buildHTML() {
	    // Template for our Horizontal form input.
	    $HTML = <<<EOT
        <div class="form-group">
            <label for="{$this->field}" class="{$this->options['labelStyle']} control-label">{$this->options['label']}</label>
            <div class="{$this->options['inputStyle']}">
                <input type="{$this->type}" class="form-control" id="{$this->field}" name="{$this->field}" value="{$this->value}" {$this->attributesString}>
            </div>
        </div>
EOT;
	    return $HTML;
	}

	/**
	 * renders a Bootstrap Horizontal form group.
	 * 
	 * @param $type string input type text|password|number|...
	 * @param $field string field name, will also be used at the input id
	 * @param $value string value of the field
	 * @param $label string label to display to the user
	 * @param $options array array of optional options
	 * 
	 * @return string
	 */
	public function renderHTML($type=null,$field=null,$value='',$label=null,$options=null) {
	    
	    // Set the type
	    $this->type = $type;
	    
	    // Set the field
	    $this->field = $field;
	    
	    // Set the value
	    $this->setValue($value);
	    
	    // Set the options
	    $this->setOptions($options);
	    
	    // Set the label
	    $this->setLabel($label);
	    
	    // Change our options into a string of HTML input attributes.
	    $this->convertOptionsToAttributes();
       
	    // bild the HTML string
	    return $this->buildHTML();
	}
	
}
