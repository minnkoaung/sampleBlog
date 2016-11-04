<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Public_Controller {

    /**
     * Constructor
     */
    function __construct()
    {
        parent::__construct();

        // load the language file
        $this->lang->load('welcome');
        $this->load->model('Personals_model');
    }


    /**
     * Default
     */
    public function index()
    {
        // setup page header data
        $this->set_title(sprintf(lang('welcome title'), $this->settings->site_name));

        $data = $this->includes;
        // get list
        $personals = $this->Personals_model->get_all(1);
        //$featured_properties = $this->Personals_model->get_feature(4);
        //var_dump($properties);
        // set content data
        $content_data = array(
            'welcome_message' => $this->settings->welcome_message[$this->session->language],
            'personals' =>  $personals,
            //'featured_properties' => $featured_properties,
        );
        // $content_data['types'] = array("1"=>"Condo","2"=>"Apartment","3"=>"Hostel");
        // $content_data['region'] = array("1"=>"Yangon","2"=>"Mandalay","3"=>"Monywa");
        // $content_data['township'] = array("1"=>"SuLay","2"=>"Insein","3"=>"Mayangone");
        // load views
        $data['content'] = $this->load->view('welcome', $content_data, TRUE);
        $this->load->view($this->template, $data);
    }

 

}
