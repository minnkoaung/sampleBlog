<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends Public_Controller {
    /**
     * Constructor
     */
    function __construct()
    {
        parent::__construct();
        $this->load->model('Blogs_model');
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
        $blogs = $this->Blogs_model->get_all(6);
        $personals = $this->Personals_model->get_all(1);
        $content_data = array(
            'welcome_message' => $this->settings->welcome_message[$this->session->language],
            'blogs' =>  $blogs,
            'personals' =>  $personals
        );
        // load views
        $data['content'] = $this->load->view('blog', $content_data, TRUE);
        $this->load->view($this->template, $data);
    }

    function articleDetail ($id){
      // setup page header data
      $this->set_title(sprintf(lang('welcome title'), $this->settings->site_name));
      $data = $this->includes;
      // make sure we have a numeric id
      if (is_null($id) OR ! is_numeric($id))
      {
          redirect($this->_redirect_url);
      }
      // get the data
      $blogs = $this->Blogs_model->get($id);
      //$personals = $this->Personals_model->get_all(1);
      $blogs=(array)$blogs;
      //var_dump ($blogs);exit();
      $content_data = array(
          'welcome_message' => $this->settings->welcome_message[$this->session->language],
          'blogs' =>  $blogs,
          //'personals' =>  $personals
      );
      //$data['content'] = $this->load->view('articleDetail', $content_data, TRUE);
      //$template = $this->load->view($this->template, $data);
      //var_dump($template);exit();
      $this->load->view('articleDetail', $content_data, TRUE);
      $template = $this->load->view('articleDetail', $data);
    }

}
