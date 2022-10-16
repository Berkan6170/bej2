<?php
class Core {
    // properties
    public $currentController = 'Landingspages';
    public $currentMethod = 'index';
    public $params = [];

    //constructor
    public function __construct()
    {
        $url = $this-> getURL();
        if (file_exists('../app/controllers/'. ucwords($url[0]) . '.php')){
            $this->currentController  = ucwords($url[0]);
            unset($url[0]);
        }

        // require_once het bestand waar de cotrollerclass in zit 
        require_once '../app/controllers/'.$this->currentController . '.php';

        // Maak een niewus object van de controllerclass
        $this->currentController = new $this->currentController();

        if (isset($url[1])){
            if (method_exists($this->currentController, $url[1])){
                $this->currentMethod = $url[1];
                unset($url[1]);
            }
        }

        // ternary operator
        if ( $url )
        $this->params = $url ? array_values($url): [];

        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
        

    }

    public function getURL()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            
            $url = filter_var($url, FILTER_SANITIZE_URL);
            // echo $url;exit();

            $url = explode('/', $url);

            return $url;
        } else {
            return array('Landingspages', 'index');
        }
    }
}
?>