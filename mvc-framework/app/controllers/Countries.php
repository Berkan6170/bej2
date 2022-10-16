<?php

class Countries extends Controller
{
       
        //properties
        private $countryModel;
        
        // Dit is de constructor van de controller 
        public function __construct()
        {
            $this->countryModel = $this->model('Country');
        }
        
        public function index($land= 'Nederland', $age = 44)
        {
        $data =[
            'title'=> "Hoi ik woon al $age jaar in $land",
            'greetings'=> "Mijn naam is Arjan"
        ];
        $this->view('countries/index', $data);
        }
    }
