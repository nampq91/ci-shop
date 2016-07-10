<?php defined('BASEPATH') || exit('No direct script access allowed');

class MY_Model extends CI_Model {

    public $_table;
    public $roles = [];
    protected $save_log = true;
    protected $log_table = 'site_log';
    protected $cache_update = false;

    function __construct(){
        $this->cache_update = ($this->uri->segment(1) == 'admin') ? true : false;
        parent::__construct();
        $this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
    }

    public function getData($item_per_page = 10 , $where = NULL){
        $this->load->library('pagination');
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] ="</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='javascript:void(0);'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        $config['page_query_string'] = true;

        $config['total_rows']       =   $this->getTotal($where);
        $config['per_page']         =   $item_per_page;
        $config['next_link']        =   'Next »';
        $config['prev_link']        =   '« Prev';
        $config['base_url']         =   current_url();

        $getParam = $this->input->get();
        unset($getParam['per_page']);
        if (count($getParam) > 0) $config['suffix'] = '&' . http_build_query($getParam, '', "&");
        $this->pagination->initialize($config);

        return [
            'data' => $this->getList($item_per_page , $where),
            'pagination' => $this->pagination->create_links(),
        ];
    }

    public function getTotal($where = NULL){
        $total = $this->db->select();
        if($where) $total->where($where);
        return $total->get($this->_table)->num_rows();
    }

    public function getList($perpage , $where){
        $offset = $this->input->get('per_page',1);
        $table_info = $this->db->list_fields($this->_table);

        $list = $this->db->select();
        if($where) $list->where($where);
        
        return $list->limit($perpage, $offset)
            ->order_by('created', 'DESC')
            ->get($this->_table)
            ->result();
    }

    function fetchAll() {
        return $this->get();
    }

    function getInfo($id) {
        return $this->where('id',$id)->get_first();
    }


    public function from($from){
        $this->db->from($from);
        return $this;
    }

    function select($select = '*', $escape = NULL){
        $this->db->select($select, $escape);
        return $this;
    }

    function select_max($select = '', $alias = ''){
        $this->db->select_max($select, $alias);
        return $this;
    }

    function select_min($select = '', $alias = ''){
        $this->db->select_min($select, $alias);
        return $this;
    }

    function select_avg($select = '', $alias = ''){
        $this->db->select_avg($select, $alias);
        return $this;
    }

    function select_sum($select = '', $alias = ''){
        $this->db->select_sum($select, $alias);
        return $this;
    }

    function limit($value, $offset = ''){
        $this->db->limit($value, $offset);
        return $this;
    }

    function order_by($column, $type=''){
        if($type) $this->db->order_by($column, $type);
        else $this->db->order_by($column);
        return $this;
    }

    function like($field, $match = '', $side = 'both'){
        $this->db->like($field, $match, $side);
        return $this;
    }

    function not_like($field, $match = '', $side = 'both'){
        $this->db->not_like($field, $match, $side);
        return $this;
    }

    function or_like($field, $match = '', $side = 'both'){
        $this->db->or_like($field, $match, $side);
        return $this;
    }
    function or_not_like($field, $match = '', $side = 'both'){
        $this->db->or_not_like($field, $match, $side);
        return $this;
    }

    function where($key, $value = NULL, $escape = TRUE){
        $this->db->where($key, $value, $escape);
        return $this;
    }

    function or_where($key, $value = NULL, $escape = TRUE){
        $this->db->or_where($key, $value, $escape);
        return $this;
    }

    function where_in($key = NULL, $values = NULL){
        $this->db->where_in($key, $values);
        return $this;
    }

    function or_where_in($key = NULL, $values = NULL){
        $this->db->or_where_in($key, $values);
        return $this;
    }

    function where_not_in($key = NULL, $values = NULL){
        $this->db->where_not_in($key, $values);
        return $this;
    }

    function or_where_not_in($key = NULL, $values = NULL){
        $this->db->or_where_not_in($key, $values);
        return $this;
    }

    function join($table, $cond, $type = ''){
        $this->db->join($table, $cond, $type);
        return $this;
    }

    public function set($key, $value = '', $escape = NULL){
        $this->db->set($key, $value, $escape);
        return $this;
    }

    public function get($limit = NULL, $offset = NULL){
        return $this->db->get($this->_table, $limit, $offset)->result();
    }

    public function get_first(){
        return $this->db->get($this->_table)->first_row();
    }

    public function get_where($where = NULL, $limit = NULL, $offset = NULL){
        return $this->db->get_where($this->_table, $where, $limit, $offset)->result();
    }

    public function insert($set = NULL, $escape = NULL){
        $this->db->insert($this->_table, $set, $escape);
        $insert_id = $this->db->insert_id();
        if($this->save_log){
            $log['operate']    = "insert {$this->_table}";
            $log['status']     = $insert_id > 0;
            $log['debug_info'] = array('insert_id'=>$insert_id);
            $this->insert_log_db($log);
        }
        return $insert_id;
    }

    public function insert_batch($set = NULL, $escape = NULL){
        return $this->db->insert_batch($this->_table, $set, $escape);
    }

    public function update($set = NULL, $where = NULL, $limit = NULL){
        $this->db->update($this->_table, $set, $where, $limit);
        $affected_rows = $this->db->affected_rows();
        if($this->save_log){
            $log['operate']    = "update {$this->_table}";
            $log['status']     = $affected_rows > 0;
            $log['debug_info'] = array('affected_rows'=>$affected_rows);
            $this->insert_log_db($log);
        }
        return $affected_rows;
    }

    public function update_batch($set = NULL, $index = NULL){
        return $this->db->update_batch($this->_table, $set, $index);
    }

    public function replace($set = NULL){
        $this->db->replace($this->_table, $set);
        $affected_rows = $this->db->affected_rows();
        if($this->save_log){
            $log['operate']    = "replace {$this->_table}";
            $log['status']     = $affected_rows > 0;
            $log['debug_info'] = array('affected_rows'=>$affected_rows);
            $this->insert_log_db($log);
        }
        return $affected_rows;
    }

    public function delete($where = '', $limit = NULL, $reset_data = TRUE){
        $this->db->delete($this->_table, $where, $limit, $reset_data);
        $deleted = $this->db->affected_rows();
        if($this->save_log){
            $log['method']  = 'referer';
            $log['operate'] = "delete from {$this->_table}";
            $log['status']  = $deleted > 0;
            $log['debug_info'] = array('where'=>$where, 'limit'=>$limit, $reset_data=>$reset_data);
            $this->insert_log_db($log);
        }
        return $deleted;
    }

    function insert_log_db($data){
        $data['created'] = $this->input->server('REQUEST_TIME');
        if ( !isset($data['uid']) ){
            $data['uid'] = $this->session->userdata('uid');
        }
        if ( !isset($data['username']) ){
            $data['username'] = $this->session->userdata('username');
        }

        if ( !isset($data['method']) ){
            $data['method'] = $this->uri->uri_string;
        }elseif ( $data['method'] == 'referer' ){
            $data['method'] = str_replace(array('http://'.$_SERVER['SERVER_NAME'].config_item('base_url'), config_item('url_suffix')), array('',''), $this->input->server('HTTP_REFERER'));
        }

        if ( !isset($data['status']) ){
            $data['status'] = TRUE;
        }

        if ( !isset($data['ip_address']) ){
            $data['ip_address'] = $this->input->ip_address();
        }

        if ( isset($data['debug_info']) && $data['debug_info'] ){
            if( $data['debug_info'] === TRUE ){
                $data['debug_info'] = json_encode(array('post'=>$this->input->post(), 'session'=>$this->session->all_userdata()));
            }else{
                $data['debug_info'] = json_encode(array('post'=>$this->input->post(), 'session'=>$this->session->all_userdata(), 'data'=>$data['debug_info']));
            }
        }

        $this->db->insert($this->log_table, $data);
        return $this->db->insert_id();
    }


    /* Xử lý các luồng dữ liệu liên quan đến FORM */

    public function input2title($input_key = ''){
        return ucwords(str_replace('_', ' ', $input_key));
    }

    public function getOption(){
        return [];
    }

    public function form_create($data = [] , $option_form = []){
        $this->load->helper('form');
        $getOption = $this->getOption();
        $type_of_form = config_item('type_of_form');

        // Open FORM
        $html_form = form_open( '' , $option_form );
        foreach ($data as $form_key => $form_value) {
            $form_type = isset($type_of_form[$form_key]) ? $type_of_form[$form_key] : 'text';

            switch ($form_type) {
                case 'password':
                    $html_form .= '<div class="form-group">';
                    $html_form .= form_label($this->input2title($form_key)). form_error($form_key);
                    $html_form .= form_password(['id' => $form_key, 'name' => $form_key, 'class' => 'form-control' , 'value' => $form_value ]);
                    $html_form .= '</div>';
                    break;

                case 'select2':
                    $form_list = isset($getOption[$form_key]['list']) ? $getOption[$form_key]['list'] : [];
                    $html_form .= '<div class="form-group">';
                    $html_form .= form_label($this->input2title($form_key)). form_error($form_key);
                    $html_form .= form_dropdown($form_key , $form_list , $form_value,['class' => 'form-control form-chosen-select']);
                    $html_form .= '</div>';
                    break;

                case 'textarea':
                    $html_form .= '<div class="form-group">';
                    $html_form .= form_label($this->input2title($form_key)). form_error($form_key);
                    $html_form .= form_textarea(['id' => $form_key, 'name' => $form_key, 'class' => 'form-control' , 'value' => $form_value ]);
                    $html_form .= '</div>';
                    break;

                case 'editer':
                    $html_form .= '<div class="form-group">';
                    $html_form .= form_label($this->input2title($form_key)). form_error($form_key);
                    $html_form .= form_textarea(['id' => 'editer_cms', 'name' => $form_key, 'class' => 'form-control mce-editer' , 'value' => $form_value ]);
                    $html_form .= '</div>';
                    break;

                case 'file':
                    $html_form .= '<div class="form-group">';
                    $html_form .= form_label($this->input2title($form_key)). form_error($form_key);
                    $html_form .= '<a title="Upload file" href="' . base_url( config_item('file_manager_url')) . "/dialog.php?type=2&field_id=" . $form_key . "&akey=" . config_item('file_manager_key') . '" class="iframe-btn">';
                    $html_form .= form_input(['id' => $form_key, 'name' => $form_key, 'class' => 'form-control' , 'value' => $form_value , 'readonly' => '' ]);
                    $html_form .= '</a>';
                    $html_form .= '</div>';
                    break;

                case 'hidden':
                    $html_form .= form_hidden($form_key , $form_value );
                    break;

                case 'tags':
                    $html_form .= '<div class="form-group">';
                    $html_form .= form_label($this->input2title($form_key)). form_error($form_key);
                    $html_form .= form_textarea(['id' => $form_key, 'name' => $form_key, 'class' => 'form-control tags-input' , 'value' => $form_value ]);
                    $html_form .= '</div>';
                    break;

                case 'price':
                    $html_form .= '<div class="form-group">';
                    $html_form .= form_label($this->input2title($form_key)). form_error($form_key);
                    $html_form .= form_input(['id' => $form_key, 'name' => $form_key, 'class' => 'form-control autoNumber' , 'value' => $form_value ]);
                    $html_form .= '</div>';
                    break;

                case 'readonly':
                    $html_form .= '<div class="form-group">';
                    $html_form .= form_label($this->input2title($form_key)). form_error($form_key);
                    $html_form .= form_input(['id' => $form_key, 'name' => $form_key, 'class' => 'form-control' , 'value' => $form_value ,'readonly' => 'readonly' ]);
                    $html_form .= '</div>';
                    break;

                default:
                    $html_form .= '<div class="form-group">';
                    $html_form .= form_label($this->input2title($form_key)). form_error($form_key);
                    $html_form .= form_input(['id' => $form_key, 'name' => $form_key, 'class' => 'form-control' , 'value' => $form_value ]);
                    $html_form .= '</div>';
                    break;
            }
        }

        $html_form .= form_submit('Submit', 'Submit',"class='btn btn-danger'");
        // Close FORM
        $html_form .= form_close();
        return $html_form;
    }

    public function form_validate(){
        if($this->roles){
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            foreach ($this->roles as $form_key => $input_role) {
                if($input_role) $this->form_validation->set_rules($form_key , $this->input2title($form_key) , $input_role);
            }
            return $this->form_validation;
        }else{
            return new validation_ok();
        }

    }


    public function model_form($id = 0){
        $id = (int) $id;
        $table_info = $this->db->list_fields($this->_table);
        $table_data = $this->getInfo($id);
        $data = [];
        foreach ($table_info as $name) {
            $data[$name] = isset($_POST[$name]) ? $this->input->post($name) : (isset($table_data->$name) ? $table_data->$name : '');
        }
        return $this->form_create($data);
    }

    public function add_or_edit_data($id = 0){
        $id = (int) $id;
        if($this->form_validate()->run()){
            $this->update_data();
            $this->session->set_flashdata(['message' => ' Updated!']);
            redirect($this->uri->uri_string());
        }else{
            return $this->model_form($id);
        }
    }

    public function update_data(){
        $table_info = $this->db->list_fields($this->_table);
        $data = [];
        foreach ($table_info as $name) {
            if($this->input->post($name)){
                if(in_array($name, ['price', 'price_promotion']) ){
                    $data[$name] = priceToFloat($this->input->post($name));  
                }else{
                    $data[$name] = $this->input->post($name);
                }
            }
        }
        $id = $data['id'] ? $data['id'] : 0;
        unset($data['id']);unset($data['status']);
        if($data){
            if($id){
                return $this->update($data , ['id' => $id]);
            }else{
                return $this->insert($data);
            }
        }
    }

}


/**
*  Class Validate OK If not Validate
*/
class validation_ok{
    public function run(){
        return $_POST ? true : false;
    }
}