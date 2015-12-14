<?php

namespace JStormes\Bootstrap\Navigation\Page;

class Modal extends \Zend\Navigation\Page\AbstractPage
{
    public function getClass()
    {
        return "divider";
    }
    
    public function getHref() {
        return "";
    }
}
