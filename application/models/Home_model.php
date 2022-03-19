<?php
class Home_model extends CI_Model
{

    public function checkLogin()
    {
        $table = $this->input->post('check') == 1?'users_list':'admin_list';
        $redirect = $this->input->post('check') == 1?'Home/userProductList':'Home/productList';

        $get['mobile_no'] = $this->input->post('mobile_no');
        $fQry = $this->db->get_where($table,$get);
        if($fQry->num_rows() > 0){
            $get['password'] = $this->input->post('password');
            $sQry = $this->db->get_where($table,$get);
            if($sQry->num_rows() > 0){
                $name = $sQry->result_array();
                
                $this->session->set_userdata('login_name', $name[0]['username']);
                $this->session->set_userdata('toastmsg', 'Login Successfull');
                $this->session->set_userdata('login_type',$this->input->post('check') == 1?'user':'admin');

                redirect($redirect);
            }else{
                $this->session->set_userdata('toastmsg', 'Password Mismatch');
            }
        }else{
            $this->session->set_userdata('toastmsg', 'Please Use Registered Mobile Number');
        }
        redirect('Home');


    }

    public function userList()
    {
        $qry = $this->db->get_where('users_list');
        return $qry->result_array();
    }

    public function addUpdateProduct()
    {

        $ins['product_name'] = $this->input->post('name');
        $ins['user_id'] = $this->input->post('user_id');
        $ins['code'] = $this->input->post('product_code');
        $ins['price'] = $this->input->post('price');
        $config['upload_path'] = 'assets/img/';
        $config['allowed_types'] = '*';

        if (!empty($_FILES['image']['name'])) {
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image')) {
                $this->session->set_userdata('toastmsg', 'Something Wrong In File');
                exit;
            } else {
                $file_info = $this->upload->data();
                $ins['image'] = 'assets/img/' . $file_info['file_name'];
            }
        }
        if ($this->input->post('update_id') == 0) {
            $this->db->insert('product_list', $ins);
            $this->session->set_userdata('toastmsg', 'Product Added');
        } else {
            $this->db->where('product_id', $this->input->post('update_id'));
            $this->db->update('product_list', $ins);
            $this->session->set_userdata('toastmsg', 'Product Updated');
        }
    }


    public function productList()
    {
        $this->db->select('product_id,pl.user_id,product_name,code,price,image,username,pl.status');
        $this->db->from('product_list pl');
        $this->db->join('users_list ul', 'ul.user_id = pl.user_id');
        if($this->session->userdata('user_id')){
            $this->db->where('pl.user_id',$this->session->userdata('user_id'));
        }
        $this->db->order_by('product_id','DESC');
        $qry = $this->db->get();
        return $qry->result_array();
    }

    public function changeStatus()
    {
        $id = $this->input->post('id');
        $up['status'] = $this->input->post('status') == 1?0:1;
        $this->db->where('product_id',$id);
        $this->db->update('product_list',$up);
        $this->session->set_userdata('toastmsg', 'Product Status Changed');

    }

    public function deletePro()
    {
        $id = $this->input->post('id');
        $this->db->where('product_id',$id);
        $this->db->delete('product_list');
        echo "Product Deleted";
    }

    public function fetchReport()
    {
        $get['user_id'] = $this->input->post('user_id');
        if($this->input->post('status') != 2){
            $get['status'] = $this->input->post('status');
        }
        $qry = $this->db->get_where('product_list',$get);
        $html = "";
        if($qry->num_rows() > 0){
            $i = 1;
            foreach($qry->result_array() as $row){
                $labelClr=$row['status'] == 1?"success":"danger";
                $labelStatus=$row['status'] == 1?"active":"inactive";
                $html.= "<tr><td>".$i++."</td><td>".$row['product_name']."</td><td>".$row['code']."</td>
                <td><img src=".base_url($row['image'])." width='50' height='50'></td><td>".$row['price']."</td>
                <td><label class='label label-".$labelClr."' >".$labelStatus."</label></td></tr>";
            }
        }else{
            $html = " No Products Found";
        }

        echo $html;
    }
}
