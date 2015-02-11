<?php namespace helpers;

class TwigContainer {

    private static $twig;

    public static function initTwig () {
        $loader = new \Twig_Loader_Filesystem(TWIG_DIR);
        $twig = new \Twig_Environment($loader, array(
                        'cache' =>  BASE_PATH.'cache',
                        'debug' =>  true,
                  'auto_reload' =>  true,
             'strict_variables' =>  true,
                   'autoescape' =>  true,

        ));

        self::$twig = $twig;
    }
    
    public static function Render($twigfile, $data){
        $template = self::$twig->loadTemplate($twigfile);
        return $template->render($data);
    }

}