<?php
return array(
    'view_manager' => array(
        'template_path_stack' => array(
            'JStormes' => __DIR__ . '/../view',
        ),
    ),
    'view_helpers' => array(
        'invokables' => array(
            'HorizontalText' => 'JStormes\Bootstrap\View\Helper\Form\HorizontalText',
 //           'BootstrapNav' => 'JStormes\Bootstrap\View\Helper\Navigation\BootstrapNav',
        ),
    ),
    
    
);
