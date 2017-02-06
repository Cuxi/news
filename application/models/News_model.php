<?php
class News_model extends CI_Model {

	var $obj;

        public function __construct(){
		
        $this->load->database();
		$url="http://192.168.114.10/serviceNews.php";
		$respuesta=file_get_contents($url);
		$this->obj=json_decode($respuesta, true);
        }
	
	public function get_news($slug = FALSE)
	{
		if ($slug === FALSE)
		{
			$query=$this->db->get("news");
			$ar= $query->result_array();
		/*	foreach($this->obj as $k=>$v){
				array_push($ar,$v);
			}*/
			return $ar;
		}

		$query = $this->db->get_where('news', array('slug'=>$slug));
		//header('Content-type: application/json');
        	//return json_encode($query);
		if(empty($query->row_array())){
			//pertenece a un artículo obtenido desde el servicio web
			foreach($this->obj as $k=>$v){
				if($v['slug']==$slug){
					return $v;				
				}
			}
		}
		return $query->row_array();
	}


	public function set_news()
{
	    $this->load->helper('url');

	    $slug = url_title($this->input->post('title'), 'dash', TRUE);

	    $data = array(
		'title' => $this->input->post('title'),
		'slug' => $slug,
		'text' => $this->input->post('text')
	    );

	    return $this->db->insert('news', $data);
	}

	
	public function delete_news()
	{
		$this->load->helper('url');

		$slug = url_title($this->input->post('title'), 'dash', TRUE);
			
		$this->db->where("slug", $slug);
		$this->db->delete('news');
		return $this->db->affected_rows();
	}

	public function update_news()
	{
		$this->load->helper('url');

		$slug = url_title($this->input->post('title'), 'dash', TRUE);

	    $data = array('slug' => $slug,
		'text' => $this->input->post('text')
	    );

		$this->db->where("slug", $slug);
		$this->db->update('news', $data);
		return $this->db->affected_rows();
	}
}
