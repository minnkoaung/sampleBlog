<?php defined('BASEPATH') OR exit('No direct script access allowed');

class articleDetail extends Public_Controller {

    /**
     * Constructor
     */
    function __construct()
    {
        parent::__construct();

        // load the language file
        $this->lang->load('welcome');
        $this->load->model('Blogs_model');
        $this->load->model('Personals_model');
        // $this->load->model('Portfilios_model');
        // $this->load->model('Contact_model');
    }


    /**
     * Default
     */
    public function index($id = NULL)
    {
        // setup page header data
        $this->set_title(sprintf(lang('welcome title'), $this->settings->site_name));

        $data = $this->includes;

        // make sure we have a numeric id
        if (is_null($id) OR ! is_numeric($id))
        {
            redirect($this->_redirect_url);
        }

        // get the data
        $blog = $this->blogs_model->get($id);
        //var_dump($id);exit();
        $blog=(array)$blog;

        var_dump($blog);exit();
        // get list
        //$blogs = $this->Blogs_model->get_all(6);
        //$personals = $this->Personals_model->get_all(1);
        //$portfilios = $this->Portfilios_model->get_all(10);
        //$featured_properties = $this->Personals_model->get_feature(4);
        //var_dump($blogs); exit();
        // set content data
        $content_data = array(
            'welcome_message' => $this->settings->welcome_message[$this->session->language],
            'blogs' =>  $blogs,
            'personals' =>  $personals
            //'portfilios' =>  $portfilios,
            //'featured_properties' => $featured_properties,
        );
        // $content_data['types'] = array("1"=>"Condo","2"=>"Apartment","3"=>"Hostel");
        // $content_data['region'] = array("1"=>"Yangon","2"=>"Mandalay","3"=>"Monywa");
        // $content_data['township'] = array("1"=>"SuLay","2"=>"Insein","3"=>"Mayangone");
        // load views
        $data['content'] = $this->load->view('articleDetail', $content_data, TRUE);
        $this->load->view($this->template, $data);
    }
}
