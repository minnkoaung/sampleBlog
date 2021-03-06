<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Blogs extends Admin_Controller {

    /**
     * @var string
     */
    private $_redirect_url;


    /**
     * Constructor
     */
    function __construct()
    {
        parent::__construct();

        // load the language files
        $this->lang->load('blogs_lang');

        // load the users model
        $this->load->model('blogs_model');

        // set constants
        define('REFERRER', "referrer");
        define('THIS_URL', base_url('admin/blogs'));
        define('DEFAULT_LIMIT', $this->settings->per_page_limit);
        define('DEFAULT_OFFSET', 0);
        define('DEFAULT_SORT', "created_at");
        define('DEFAULT_DIR', "desc");

        // use the url in session (if available) to return to the previous filter/sorted/paginated list
        if ($this->session->userdata(REFERRER))
        {
            $this->_redirect_url = $this->session->userdata(REFERRER);
        }
        else
        {
            $this->_redirect_url = THIS_URL;
        }
    }


    /**************************************************************************************
     * PUBLIC FUNCTIONS
     **************************************************************************************/

    /**
     * User list page
     */
    public function index()
    {
        // get parameters
        $limit  = $this->input->get('limit')  ? $this->input->get('limit', TRUE)  : DEFAULT_LIMIT;
        $offset = $this->input->get('offset') ? $this->input->get('offset', TRUE) : DEFAULT_OFFSET;
        $sort   = $this->input->get('sort')   ? $this->input->get('sort', TRUE)   : DEFAULT_SORT;
        $dir    = $this->input->get('dir')    ? $this->input->get('dir', TRUE)    : DEFAULT_DIR;

        // get filters
        $filters = array();

        if ($this->input->get('title'))
        {
            $filters['title'] = $this->input->get('title', TRUE);
        }

        if ($this->input->get('created_at'))
        {
            $filters['created_at'] = $this->input->get('created_at', TRUE);
        }

        // if ($this->input->get('price'))
        // {
        //     $filters['price'] = $this->input->get('price', TRUE);
        // }

        // build filter string
        $filter = "";
        foreach ($filters as $key => $value)
        {
            $filter .= "&{$key}={$value}";
        }

        // save the current url to session for returning
        $this->session->set_userdata(REFERRER, THIS_URL . "?sort={$sort}&dir={$dir}&limit={$limit}&offset={$offset}{$filter}");

        // are filters being submitted?
        if ($this->input->post())
        {
            if ($this->input->post('clear'))
            {
                // reset button clicked
                redirect(THIS_URL);
            }
            else
            {
                // apply the filter(s)
                $filter = "";

                if ($this->input->post('title'))
                {
                    $filter .= "&title=" . $this->input->post('title', TRUE);
                }

                if ($this->input->post('created_at'))
                {
                    $filter .= "&created_at=" . $this->input->post('created_at', TRUE);
                }

                // if ($this->input->post('price'))
                // {
                //     $filter .= "&price=" . $this->input->post('price', TRUE);
                // }

                // redirect using new filter(s)
                redirect(THIS_URL . "?sort={$sort}&dir={$dir}&limit={$limit}&offset={$offset}{$filter}");
            }
        }

        // get list
        $blogs = $this->blogs_model->get_all($limit, $offset, $filters, $sort, $dir);

        // build pagination
        $this->pagination->initialize(array(
            'base_url'   => THIS_URL . "?sort={$sort}&dir={$dir}&limit={$limit}{$filter}",
            'total_rows' => $blogs['total'],
            'per_page'   => $limit
        ));

        // setup page header data
        $this
            ->add_js_theme( "users_i18n.js", TRUE )
            ->set_title( lang('blog title article_list') );

        $data = $this->includes;

        // set content data
        $content_data = array(
            'this_url'   => THIS_URL,
            'blogs'      => $blogs['results'],
            'total'      => $blogs['total'],
            'filters'    => $filters,
            'filter'     => $filter,
            'pagination' => $this->pagination->create_links(),
            'limit'      => $limit,
            'offset'     => $offset,
            'sort'       => $sort,
            'dir'        => $dir
        );

        // load views
        $data['content'] = $this->load->view('admin/blogs/list', $content_data, TRUE);
        $this->load->view($this->template, $data);
    }

    /**
     * Add new user
     */
    function add()
    {
        // validators
        $this->form_validation->set_error_delimiters($this->config->item('error_delimeter_left'), $this->config->item('error_delimeter_right'));
        $this->form_validation->set_rules('title', lang('blog input article_name'), 'required');
        $this->form_validation->set_rules('article', lang('blog input article_body'), 'required');
        $this->form_validation->set_rules('category', lang('blog input category'), 'required');
        $this->form_validation->set_rules('author', lang('blog input arthor'), 'required');

        if ($this->form_validation->run() == TRUE)
        {
            // save new peson
            //$is_featured = ($this->input->post("is_featured") != null) ? true:false;
            $blogs_data = array(
                "title"=>$this->input->post("title"),
                "article"=>$this->input->post("article"),
                "category"=>$this->input->post("category"),
                "author"=>$this->input->post("author")
                );

                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 2000;
                $config['max_width']            = 1200;
                $config['max_height']           = 600;

                $this->load->library('upload', $config);

                if ( $this->upload->do_upload('image'))
                {
                    $upload  = $this->upload->data();
                    $blogs_data['image'] = $upload['file_name'];
                }

            $saved = $this->blogs_model->create($blogs_data);

            if ($saved)
            {
                $this->session->set_flashdata('message', sprintf(lang('blog msg add_article_success'), $this->input->post('title') . " " . $this->input->post('category')));
            }
        else
            {
                $this->session->set_flashdata('error', sprintf(lang('blog error add_article_failed'), $this->input->post('title') . " " . $this->input->post('category')));
            }

            // return to list and display message
            redirect($this->_redirect_url);
        }

        // setup page header data
          $this->set_title( lang('blog title article_add') );

        $data = $this->includes;

        // var_dump($data);
        // exit;

        // set content data
        $content_data = array(
            'cancel_url'        => $this->_redirect_url,
            'blog'          => NULL,
            //'password_required' => TRUE
        );

        // load views
        // $content_data['types'] = array("1"=>"Condo","2"=>"Apartment","3"=>"Hostel");
        // $content_data['region'] = array("1"=>"Yangon","2"=>"Mandalay","3"=>"Monywa");
        // $content_data['township'] = array("1"=>"SuLay","2"=>"Insein","3"=>"Mayangone");
        $data['content'] = $this->load->view('admin/blogs/form', $content_data, TRUE);
        $this->load->view($this->template, $data);
    }
    //------------------------------------------------------------------------

     /**
     * Edit existing person
     *
     * @param  int $id
     */
    public function edit($id = NULL)
    {
        // make sure we have a numeric id
        if (is_null($id) OR ! is_numeric($id))
        {
            redirect($this->_redirect_url);
        }

        // get the data
        $blog = $this->blogs_model->get($id);
        //var_dump($id);exit();
        $blog=(array)$blog;
        // print_r($personal);
        //var_dump($blog);exit();
        // if empty results, return to list
        if ( ! $blog)
        {
            redirect($this->_redirect_url);
        }

        // validators
        $this->form_validation->set_error_delimiters($this->config->item('error_delimeter_left'), $this->config->item('error_delimeter_right'));
        $this->form_validation->set_rules('title', lang('blog input article_name'), 'required');
        $this->form_validation->set_rules('article', lang('blog input article_body'), 'required');
        $this->form_validation->set_rules('category', lang('blog input category'), 'required');
        $this->form_validation->set_rules('author', lang('blog input arthor'), 'required');

       if ($this->form_validation->run() == TRUE)
        //if (TRUE)
        {
           // die('ok');

            // save the changes
            //$is_featured = ($this->input->post("is_featured") != null) ? true:false;
            $blogs_data = array(
                "title"=>$this->input->post("title"),
                "article"=>$this->input->post("article"),
                "category"=>$this->input->post("category"),
                "author"=>$this->input->post("author")
                );


                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 2000;
                $config['max_width']            = 1200;
                $config['max_height']           = 600;

                $this->load->library('upload', $config);

                if ( $this->upload->do_upload('image'))
                {
                    $upload  = $this->upload->data();
                    //var_dump($upload);
                    //exit();
                    $blog_data['image'] = $upload['file_name'];
                }

            //var_dump(personal_data);exit();
            $saved = $this->blogs_model->update($blogs_data,$id);


            if ($saved)
            {
                $this->session->set_flashdata('message', sprintf(lang('blog msg edit_article_success'), $this->input->post('title') . " " . $this->input->post('category')));
            }
            else
            {
                $this->session->set_flashdata('error', sprintf(lang('blog error edit_article_failed'), $this->input->post('title') . " " . $this->input->post('category')));
            }

            // return to list and display message
            redirect($this->_redirect_url);
        }
            //die('not ok');
        // setup page header data
        $this->set_title( lang('blog title article_edit') );

        $data = $this->includes;

        // set content data
        $content_data = array(
            'cancel_url'        => $this->_redirect_url,
            'blog'           => $blog,
            'blog_id'        => $id,
            'password_required' => FALSE
        );



       // var_dump( $content_data);exit();

        // load views
        $data['content'] = $this->load->view('admin/blogs/form', $content_data,  TRUE);
        $this->load->view($this->template, $data);
    }



    // ------------------------------------------------------------------------


    /**
     * Delete a Article
     *
     * @param  int $id
     */
    function delete($id = NULL)
    {
        // make sure we have a numeric id
        if ( ! is_null($id) OR ! is_numeric($id))
        {
            // get portfiliov details
            $blog = $this->blogs_model->get($id);


            if ($blog)
            {
                // soft-delete the portfilio
                $delete = $this->blogs_model->delete($id);

                if ($delete)
                {
                    $this->session->set_flashdata('message', sprintf(lang('blog msg delete_article'), $blogs['title'] . " " . $blogs['category']));
                }
                else
                {
                    $this->session->set_flashdata('error', sprintf(lang('blog error delete_article'), $blogs['title'] . " " . $blogs['category']));
                }
            }
            else
            {
                $this->session->set_flashdata('error', lang('blog error article_not_exist'));
            }
        }
        else
        {
            $this->session->set_flashdata('error', lang('users error user_id_required'));
        }

        // return to list and display message
        redirect($this->_redirect_url);
    }


    /**
     * Export list to CSV
     */
    function export()
    {
        // get parameters
        $sort = $this->input->get('sort') ? $this->input->get('sort', TRUE) : DEFAULT_SORT;
        $dir  = $this->input->get('dir')  ? $this->input->get('dir', TRUE)  : DEFAULT_DIR;

        // get filters
        $filters = array();

        if ($this->input->get('name'))
        {
            $filters['name'] = $this->input->get('name', TRUE);
        }

        if ($this->input->get('created_at'))
        {
            $filters['created_at'] = $this->input->get('created_at', TRUE);
        }

        // if ($this->input->get('last_name'))
        // {
        //     $filters['last_name'] = $this->input->get('last_name', TRUE);
        // }

        // get all users
        $blogs = $this->blogs_model->get_all(0, 0, $filters, $sort, $dir);

        if ($blogs['total'] > 0)
        {
            // manipulate the output array
            foreach ($blogs['results'] as $key=>$user)
            {
                unset($blogs['results'][$key]['password']);
                unset($blogs['results'][$key]['deleted']);

                if ($user['status'] == 0)
                {
                    $blogs['results'][$key]['status'] = lang('admin input inactive');
                }
                else
                {
                    $blogs['results'][$key]['status'] = lang('admin input active');
                }
            }

            // export the file
            array_to_csv($blogs['results'], "portfilios");
        }
        else
        {
            // nothing to export
            $this->session->set_flashdata('error', lang('core error no_results'));
            redirect($this->_redirect_url);
        }

        exit;
    }


    /**************************************************************************************
     * PRIVATE VALIDATION CALLBACK FUNCTIONS
     **************************************************************************************/


    /**
     * Make sure username is available
     *
     * @param  string $username
     * @param  string|null $current
     * @return int|boolean
     */
    function _check_username($username, $current)
    {
        if (trim($username) != trim($current) && $this->users_model->username_exists($username))
        {
            $this->form_validation->set_message('_check_username', sprintf(lang('users error username_exists'), $username));
            return FALSE;
        }
        else
        {
            return $username;
        }
    }


    /**
     * Make sure email is available
     *
     * @param  string $email
     * @param  string|null $current
     * @return int|boolean
     */
    function _check_email($email, $current)
    {
        if (trim($email) != trim($current) && $this->users_model->email_exists($email))
        {
            $this->form_validation->set_message('_check_email', sprintf(lang('users error email_exists'), $email));
            return FALSE;
        }
        else
        {
            return $email;
        }
    }

}
