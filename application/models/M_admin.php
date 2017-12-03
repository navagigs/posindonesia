<?php
class M_admin extends CI_Model  {

    public function __contsruct(){
        parent::Model();
    }
	

    // ================================================== MODUL HOME ================================================== //
	//CONFIGURATION TABEL user
	public function insert_user($data){
        $this->db->insert("user",$data);
    }
    
    public function update_user($where,$data){
        $this->db->update("user",$data,$where);
    }

    public function delete_user($where){
        $this->db->delete("user", $where);
    }

	public function get_user($select, $where){
        $data = "";
		$this->db->select($select);
        $this->db->from("user");
		$this->db->where($where);
		$this->db->limit(1);
		$Q = $this->db->get();
		if ($Q->num_rows() > 0){
			$data = $Q->row();
		}
		$Q->free_result();
		return $data;
	}

    public function grid_all_user($select, $sidx, $sord, $limit, $start, $where="", $like=""){
        $data = "";
        $this->db->select($select);
        $this->db->from("user");
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $this->db->order_by($sidx,$sord);
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }

    public function count_all_user($where="", $like=""){
        $this->db->select("*");
        $this->db->from("user");
		if ($where){$this->db->where($where);}
		if ($like){
			foreach($like as $key => $value){ 
			$this->db->like($key, $value); 
			}
		}
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
    }

    //CONFIGURATION TABEL pegawai
    public function insert_pegawai($data){
        $this->db->insert("pegawai",$data);
    }
    
    public function update_pegawai($where,$data){
        $this->db->update("pegawai",$data,$where);
    }

    public function delete_pegawai($where){
        $this->db->delete("pegawai", $where);
    }

    public function get_pegawai($select, $where){
        $data = "";
        $this->db->select($select);
        $this->db->from("pegawai");
        $this->db->where($where);
        $this->db->limit(1);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data = $Q->row();
        }
        $Q->free_result();
        return $data;
    }

    public function grid_all_pegawai($select, $sidx, $sord, $limit, $start, $where="", $like=""){
        $data = "";
        $this->db->select($select);
        $this->db->from("pegawai");
        if ($where){$this->db->where($where);}
        if ($like){
            foreach($like as $key => $value){ 
            $this->db->like($key, $value); 
            }
        }
        $this->db->order_by($sidx,$sord);
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }

    public function count_all_pegawai($where="", $like=""){
        $this->db->select("*");
        $this->db->from("pegawai");
        if ($where){$this->db->where($where);}
        if ($like){
            foreach($like as $key => $value){ 
            $this->db->like($key, $value); 
            }
        }
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
    }


    //CONFIGURATION TABEL pengajuan_sppd
    public function insert_pengajuan_sppd($data){
        $this->db->insert("pengajuan_sppd",$data);
    }
    
    public function update_pengajuan_sppd($where,$data){
        $this->db->update("pengajuan_sppd",$data,$where);
    }

    public function delete_pengajuan_sppd($where){
        $this->db->delete("pengajuan_sppd", $where);
    }

    public function get_pengajuan_sppd($select, $where){
        $data = "";
        $this->db->select($select);
        $this->db->from("pengajuan_sppd ps");
        $this->db->join('pegawai p', 'ps.nippos_pegawai= p.nippos_pegawai', 'left');
        $this->db->join('penanggung_jawab pj', 'ps.id_penanggungjawab= pj.id_penanggungjawab', 'left');
        $this->db->where($where);
        $this->db->limit(1);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data = $Q->row();
        }
        $Q->free_result();
        return $data;
    }

    public function grid_all_pengajuan_sppd($select, $sidx, $sord, $limit, $start, $where="", $like=""){
        $data = "";
        $this->db->select($select);
        $this->db->from("pengajuan_sppd");
        if ($where){$this->db->where($where);}
        if ($like){
            foreach($like as $key => $value){ 
            $this->db->like($key, $value); 
            }
        }
        $this->db->order_by($sidx,$sord);
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }

    public function count_all_pengajuan_sppd($where="", $like=""){
        $this->db->select("*");
        $this->db->from("pengajuan_sppd");
        if ($where){$this->db->where($where);}
        if ($like){
            foreach($like as $key => $value){ 
            $this->db->like($key, $value); 
            }
        }
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
    }


 //CONFIGURATION TABEL perpanjangan
    public function insert_perpanjangan($data){
        $this->db->insert("perpanjangan",$data);
    }
    
    public function update_perpanjangan($where,$data){
        $this->db->update("perpanjangan",$data,$where);
    }

    public function delete_perpanjangan($where){
        $this->db->delete("perpanjangan", $where);
    }

    public function get_perpanjangan($select, $where){
        $data = "";
        $this->db->select($select);
        $this->db->from("perpanjangan pr");
        $this->db->join('pengajuan_sppd ps', 'pr.id_sppd= ps.id_sppd', 'left');
        $this->db->where($where);
        $this->db->limit(1);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data = $Q->row();
        }
        $Q->free_result();
        return $data;
    }

     public function grid_all_perpanjangan1($select, $sidx,$sord,$limit,$start,$where="", $like=""){
            $data = "";
            $this->db->select($select);
            $this->db->from("perpanjangan p");
            $this->db->join('pengajuan_sppd ps', 'p.id_sppd= ps.id_sppd', 'right');
            if ($where){$this->db->where($where);}
            if ($like){
                foreach($like as $key => $value){ 
                $this->db->like($key, $value); 
                }
            }
            $names = array('nava', 'admin');
            $this->db->where_not_in('admin_nama', $names);
            $this->db->order_by($sidx,$sord);
            $this->db->limit($limit,$start);
            $Q = $this->db->get();
            if ($Q->num_rows() > 0){
                $data=$Q->result();
            }
            $Q->free_result();
            return $data;
        }

    public function grid_all_perpanjangan($select, $sidx, $sord, $limit, $start, $where="", $like=""){
        $data = "";
        $this->db->select($select);
        $this->db->from("perpanjangan");
        if ($where){$this->db->where($where);}
        if ($like){
            foreach($like as $key => $value){ 
            $this->db->like($key, $value); 
            }
        }
        $this->db->order_by($sidx,$sord);
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }

    public function count_all_perpanjangan($where="", $like=""){
        $this->db->select("*");
        $this->db->from("perpanjangan");
        if ($where){$this->db->where($where);}
        if ($like){
            foreach($like as $key => $value){ 
            $this->db->like($key, $value); 
            }
        }
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
    }

    //CONFIGURATION TABEL penanggung_jawab
    public function insert_penanggung_jawab($data){
        $this->db->insert("penanggung_jawab",$data);
    }
    
    public function update_penanggung_jawab($where,$data){
        $this->db->update("penanggung_jawab",$data,$where);
    }

    public function delete_penanggung_jawab($where){
        $this->db->delete("penanggung_jawab", $where);
    }

    public function get_penanggung_jawab($select, $where){
        $data = "";
        $this->db->select($select);
        $this->db->from("penanggung_jawab");
        $this->db->where($where);
        $this->db->limit(1);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data = $Q->row();
        }
        $Q->free_result();
        return $data;
    }

    public function grid_all_penanggung_jawab($select, $sidx, $sord, $limit, $start, $where="", $like=""){
        $data = "";
        $this->db->select($select);
        $this->db->from("penanggung_jawab");
        if ($where){$this->db->where($where);}
        if ($like){
            foreach($like as $key => $value){ 
            $this->db->like($key, $value); 
            }
        }
        $this->db->order_by($sidx,$sord);
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }

    public function count_all_penanggung_jawab($where="", $like=""){
        $this->db->select("*");
        $this->db->from("penanggung_jawab");
        if ($where){$this->db->where($where);}
        if ($like){
            foreach($like as $key => $value){ 
            $this->db->like($key, $value); 
            }
        }
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
    }


    //CONFIGURATION TABEL kantor_pos
    public function insert_kantor_pos($data){
        $this->db->insert("kantor_pos",$data);
    }
    
    public function update_kantor_pos($where,$data){
        $this->db->update("kantor_pos",$data,$where);
    }

    public function delete_kantor_pos($where){
        $this->db->delete("kantor_pos", $where);
    }

    public function get_kantor_pos($select, $where){
        $data = "";
        $this->db->select($select);
        $this->db->from("kantor_pos");
        $this->db->where($where);
        $this->db->limit(1);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data = $Q->row();
        }
        $Q->free_result();
        return $data;
    }

    public function grid_all_kantor_pos($select, $sidx, $sord, $limit, $start, $where="", $like=""){
        $data = "";
        $this->db->select($select);
        $this->db->from("kantor_pos");
        if ($where){$this->db->where($where);}
        if ($like){
            foreach($like as $key => $value){ 
            $this->db->like($key, $value); 
            }
        }
        $this->db->order_by($sidx,$sord);
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }

    public function count_all_kantor_pos($where="", $like=""){
        $this->db->select("*");
        $this->db->from("kantor_pos");
        if ($where){$this->db->where($where);}
        if ($like){
            foreach($like as $key => $value){ 
            $this->db->like($key, $value); 
            }
        }
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
    }

   
    //CONFIGURATION TABEL jenis_fasilitas_perjalanan
    public function insert_jenis_fasilitas_perjalanan($data){
        $this->db->insert("jenis_fasilitas_perjalanan",$data);
    }
    
    public function update_jenis_fasilitas_perjalanan($where,$data){
        $this->db->update("jenis_fasilitas_perjalanan",$data,$where);
    }

    public function delete_jenis_fasilitas_perjalanan($where){
        $this->db->delete("jenis_fasilitas_perjalanan", $where);
    }

    public function get_jenis_fasilitas_perjalanan($select, $where){
        $data = "";
        $this->db->select($select);
        $this->db->from("jenis_fasilitas_perjalanan");
        $this->db->where($where);
        $this->db->limit(1);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data = $Q->row();
        }
        $Q->free_result();
        return $data;
    }

    public function grid_all_jenis_fasilitas_perjalanan($select, $sidx, $sord, $limit, $start, $where="", $like=""){
        $data = "";
        $this->db->select($select);
        $this->db->from("jenis_fasilitas_perjalanan");
        if ($where){$this->db->where($where);}
        if ($like){
            foreach($like as $key => $value){ 
            $this->db->like($key, $value); 
            }
        }
        $this->db->order_by($sidx,$sord);
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }

    //CONFIGURATION TABEL alat_transportasi
    public function insert_alat_transportasi($data){
        $this->db->insert("alat_transportasi",$data);
    }
    
    public function update_alat_transportasi($where,$data){
        $this->db->update("alat_transportasi",$data,$where);
    }

    public function delete_alat_transportasi($where){
        $this->db->delete("alat_transportasi", $where);
    }

    public function get_alat_transportasi($select, $where){
        $data = "";
        $this->db->select($select);
        $this->db->from("alat_transportasi");
        $this->db->where($where);
        $this->db->limit(1);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data = $Q->row();
        }
        $Q->free_result();
        return $data;
    }

    public function grid_all_alat_transportasi($select, $sidx, $sord, $limit, $start, $where="", $like=""){
        $data = "";
        $this->db->select($select);
        $this->db->from("alat_transportasi");
        if ($where){$this->db->where($where);}
        if ($like){
            foreach($like as $key => $value){ 
            $this->db->like($key, $value); 
            }
        }
        $this->db->order_by($sidx,$sord);
        $this->db->limit($limit,$start);
        $Q = $this->db->get();
        if ($Q->num_rows() > 0){
            $data=$Q->result();
        }
        $Q->free_result();
        return $data;
    }

    public function count_all_jenis_fasilitas_perjalanan($where="", $like=""){
        $this->db->select("*");
        $this->db->from("jenis_fasilitas_perjalanan");
        if ($where){$this->db->where($where);}
        if ($like){
            foreach($like as $key => $value){ 
            $this->db->like($key, $value); 
            }
        }
        $Q=$this->db->get();
        $data = $Q->num_rows();
        return $data;
    }

    // CONFIGURATION COMBO BOX WITH DATABASE WITH VALIDASI
    public function combo_box($table, $name, $value, $name_value, $pilihan, $js='', $label='', $width=''){
        echo "<select name='$name' id='$name' onchange='$js' required class='form-control input-sm' style='width:$width'>";
        echo "<option value=''>".$label."</option>";
        $query = $this->db->query($table);
        foreach ($query->result() as $row){
            if ($pilihan == $row->$value){
                echo "<option value='".$row->$value."' selected>".$row->$name_value."</option>";
            } else {
                echo "<option value='".$row->$value."'>".$row->$name_value."</option>";
            }
        }
        echo "</select>";
    }
    
    // CONFIGURATION COMBO BOX WITH DATABASE NO VALIDASI
    public function combo_box2($table, $name, $value, $name_value, $pilihan, $js='', $label='', $width=''){
        echo "<select name='$name' id='$name' onchange='$js' required class='form-control input-sm' style='width:$width'>";
        echo "<option value=''>".$label."</option>";
        $query = $this->db->query($table);
        foreach ($query->result() as $row){
            if ($pilihan == $row->$value){
                echo "<option value='".$row->$value."' selected>".$row->$name_value."</option>";
            } else {
                echo "<option value='".$row->$value."'>".$row->$name_value."</option>";
            }
        }
        echo "</select>";
    }
    
       // CONFIGURATION COMBO BOX WITH DATABASE NO VALIDASI
    public function combo_box3($table, $name, $value, $name_value, $pilihan, $js='', $label='', $width=''){
        echo "<select name='$name'  style='display:none;' id='$name' onchange='$js' class='form-control input-sm' style='width:$width'>";
        $query = $this->db->query($table);
        foreach ($query->result() as $row){
            if ($pilihan == $row->$value){
                echo "<option value='".$row->$value."' selected>".$row->$name_value."</option>";
            } else {
                echo "<option value='".$row->$value."'>".$row->$name_value."</option>";
            }
        }
        echo "</select>";
    }
    
    //CONFIGURATION CHECKBOX ARRAY WITH DATABASE
    public function checkbox($table, $name, $value, $name_value, $pilihan=''){
        $query = $this->db->query($table);
        $array_tag = explode(',', $pilihan);
        $ceked = "";
        foreach ($query->result() as $row){
            $ceked = (array_search($row->tag_id, $array_tag) === false)? '' : 'checked';
            echo "<label for='".$row->$value."'><input type='checkbox' class='icheck' name='$name' id='".$row->$value."' value='".$row->$value."' ".$ceked."/> ".$row->$name_value."</label> ";
        }
    }
    //CONFIGURATION CHECKBOX ARRAY WITH DATABASE
    public function checkbox_kelas($table, $name, $value, $name_value, $pilihan=''){
        $query = $this->db->query($table);
        $array_tag = explode(',', $pilihan);
        $ceked = "";
        foreach ($query->result() as $row){
            $ceked = (array_search($row->kelas_id, $array_tag) === false)? '' : 'checked';
            echo "<label for='".$row->$value."'><input type='checkbox' class='icheck' name='$name' id='".$row->$value."' value='".$row->$value."' ".$ceked."/> ".$row->$name_value."</label> ";
        }
    }
    
    //CONFIGURATION CHECKBOX ARRAY WITH DATABASE
    public function checkbox_status($table, $name, $value, $name_value, $pilihan=''){
        $query = $this->db->query($table);
        $array_tag = explode(',', $pilihan);
        $ceked = "";
        foreach ($query->result() as $row){
            $ceked = (array_search($row->status_perkawinan_kode, $array_tag) === false)? '' : 'checked';
            echo "<input type='checkbox' name='$name' id='".$row->$value."' style='display: inline-block;' value='".$row->$value."' ".$ceked."/><label for='".$row->$value."' style='display: inline-block; margin-right: 10px;'>".$row->$name_value."</label>";
        }
    }
    
    //CONFIGURATION LIST ARRAY WITH DATABASE AND EXPLODE
    public function listarray($table, $name, $value, $name_value, $pilihan=''){
        $query = $this->db->query($table);
        $array_tag = explode(',', $pilihan);
        $ceked = "";
        foreach ($query->result() as $row){
            if (array_search($row->tag_id, $array_tag) === false) {
            } else {
            echo $row->$name_value.", ";
            }
        }
    }
    
    //CONFIGURATION LIST ARRAY WITH DATABASE AND EXPLODE
    public function tagsberita($table, $name, $value, $name_value, $pilihan=''){
        $query = $this->db->query($table);
        $array_tag = explode(',', $pilihan);
        $ceked = "";
        foreach ($query->result() as $row){
            if (array_search($row->tag_id, $array_tag) === false) {
            } else {
            echo "<a href='".site_url()."news/tags/".$row->tag_id."' class='tag'>".$row->$name_value."</a> ";
            }
        }
    }
}