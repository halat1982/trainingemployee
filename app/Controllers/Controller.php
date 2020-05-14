<?php

namespace App\Controllers;

class Controller
{
    const TEMPLATES_DIRECTORY = 'app/Views/';

    protected function view($template_path, $data = array())
    {
        $template = file_get_contents(self::TEMPLATES_DIRECTORY . $template_path);
        extract($data, EXTR_SKIP);
        ob_start();
        eval("?>" . $template . "<?");
        $content = ob_get_contents();
        ob_clean();
        return $content;
    }

} 
