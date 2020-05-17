<?php 
/**
 * Result Page Controller
 * @category  Controller
 */
class ResultController extends SecureController{
	/**
     * Load Record Action 
     * $arg1 Field Name
     * $arg2 Field Value 
     * $param $arg1 string
     * $param $arg1 string
     * @return View
     */
	function index($fieldname = null , $fieldvalue = null){
		$db = $this->GetModel();
		$fields = array('id', 	'exam_name', 	'exam_date', 	'result_pub_date', 	'student_name', 	'student_class', 	'Student_roll', 	'bangla', 	'english', 	'mathametics', 	'social_science', 	'general_science', 	'physics', 	'camistry', 	'boilogy', 	'ict', 	'agricultur', 	'economics', 	'geography', 	'history', 	'riligion', 	'gpa', 	'gread', 	'status');
		$limit = $this->get_page_limit(MAX_RECORD_COUNT); // return pagination from BaseModel Class e.g array(5,20)
		if(!empty($this->search)){
			$text=$this->search;
			$db->orWhere('id',"%$text%",'LIKE');
			$db->orWhere('exam_name',"%$text%",'LIKE');
			$db->orWhere('exam_date',"%$text%",'LIKE');
			$db->orWhere('result_pub_date',"%$text%",'LIKE');
			$db->orWhere('student_name',"%$text%",'LIKE');
			$db->orWhere('student_class',"%$text%",'LIKE');
			$db->orWhere('Student_roll',"%$text%",'LIKE');
			$db->orWhere('bangla',"%$text%",'LIKE');
			$db->orWhere('english',"%$text%",'LIKE');
			$db->orWhere('mathametics',"%$text%",'LIKE');
			$db->orWhere('social_science',"%$text%",'LIKE');
			$db->orWhere('general_science',"%$text%",'LIKE');
			$db->orWhere('physics',"%$text%",'LIKE');
			$db->orWhere('camistry',"%$text%",'LIKE');
			$db->orWhere('boilogy',"%$text%",'LIKE');
			$db->orWhere('ict',"%$text%",'LIKE');
			$db->orWhere('agricultur',"%$text%",'LIKE');
			$db->orWhere('economics',"%$text%",'LIKE');
			$db->orWhere('geography',"%$text%",'LIKE');
			$db->orWhere('history',"%$text%",'LIKE');
			$db->orWhere('riligion',"%$text%",'LIKE');
			$db->orWhere('gpa',"%$text%",'LIKE');
			$db->orWhere('gread',"%$text%",'LIKE');
			$db->orWhere('status',"%$text%",'LIKE');
		}
		if(!empty($this->orderby)){
			$db->orderBy($this->orderby,$this->ordertype);
		}
		else{
			$db->orderBy('id', ORDER_TYPE);
		}
		if( !empty($fieldname) ){
			$db->where($fieldname , urldecode($fieldvalue));
		}
		//page filter command
		$tc = $db->withTotalCount();
		$records = $db->get('result', $limit, $fields);
		$data = new stdClass;
		$data->records = $records;
		$data->record_count = count($records);
		$data->total_records = intval($tc->totalCount);
		render_json($data);
	}
	/**
     * Load csv|json data
     * @return data
     */
	function import_data(){
		if(!empty($_FILES['file'])){
			$finfo = pathinfo($_FILES['file']['name']);
			$ext = strtolower($finfo['extension']);
			if(!in_array($ext , array('csv','json'))){
				render_error("File format not supported");
			}
			$file_path = $_FILES['file']['tmp_name'];
			if(!empty($file_path)){
				$db = $this->GetModel();
				if($ext == 'csv'){
					$options = array('table' => 'result', 'fields' => '', 'delimiter' => ',', 'quote' => '"');
					$data = $db->loadCsvData( $file_path , $options , false );
				}
				else{
					$data = $db->loadJsonData( $file_path, 'result' , false );
				}
				if($db->getLastError()){
					render_error($db->getLastError());
				}
				else{
					render_json($data);
				}
			}
			else{
				render_error(html-lang-0047);
			}
		}
	}
	/**
     * View Record Action 
     * @return View
     */
	function view( $rec_id = null , $value = null){
		$db = $this->GetModel();
		$fields = array( 'id', 	'exam_name', 	'exam_date', 	'result_pub_date', 	'student_name', 	'student_class', 	'Student_roll', 	'bangla', 	'english', 	'mathametics', 	'social_science', 	'general_science', 	'physics', 	'camistry', 	'boilogy', 	'ict', 	'agricultur', 	'economics', 	'geography', 	'history', 	'riligion', 	'gpa', 	'gread', 	'status' );
		if( !empty($value) ){
			$db->where($rec_id, urldecode($value));
		}
		else{
			$db->where('id' , $rec_id);
		}
		$record = $db->getOne( 'result', $fields );
		if(!empty($record)){
			render_json($record);
		}
		else{
			if($db->getLastError()){
				render_error($db->getLastError());
			}
			else{
				render_error("Record not found",404);
			}
		}
	}
	/**
     * Add New Record Action 
     * If Not $_POST Request, Display Add Record Form View
     * @return View
     */
	function add(){
		if(is_post_request()){
			$modeldata=transform_request_data($_POST);
			$rules_array = array(
				'exam_name' => 'required',
				'exam_date' => 'required',
				'result_pub_date' => 'required',
				'student_name' => 'required',
				'student_class' => 'required',
				'Student_roll' => 'required|numeric',
				'bangla' => 'required|numeric',
				'english' => 'required|numeric',
				'mathametics' => 'required|numeric',
				'social_science' => 'numeric',
				'general_science' => 'numeric',
				'physics' => 'numeric',
				'camistry' => 'numeric',
				'boilogy' => 'numeric',
				'ict' => 'required|numeric',
				'agricultur' => 'numeric',
				'economics' => 'numeric',
				'geography' => 'numeric',
				'history' => 'numeric',
				'riligion' => 'required|numeric',
				'gpa' => 'required|numeric',
				'gread' => 'required',
				'status' => 'required',
			);
			$is_valid = GUMP::is_valid($modeldata, $rules_array);
			if($is_valid != true) {
				render_error($is_valid);
			}
			$db = $this->GetModel();
			$rec_id = $db->insert('result',$modeldata);
			if(!empty($rec_id)){
				render_json($rec_id);
			}
			else{
				if($db->getLastError()){
					render_error($db->getLastError());
				}
				else{
					render_error("Error inserting record");
				}
			}
		}
		else{
			render_error("Invalid request");
		}
	}
	/**
     * Edit Record Action 
     * If Not $_POST Request, Display Edit Record Form View
     * @return View
     */
	function edit($rec_id=null){
		$db = $this->GetModel();
		if(is_post_request()){
			$modeldata=transform_request_data($_POST);
			$db->where('id' , $rec_id);
			$bool = $db->update('result',$modeldata);
			if($bool){
				render_json($rec_id);
			}
			else{
				render_error($db->getLastError());
			}
			return null;
		}
		else{
			$fields=array('id','exam_name','exam_date','result_pub_date','student_name','student_class','Student_roll','bangla','english','mathametics','social_science','general_science','physics','camistry','boilogy','ict','agricultur','economics','geography','history','riligion','gpa','gread','status');
			$db->where('id' , $rec_id);
			$data = $db->getOne('result',$fields);
			if(!empty($data)){
				render_json($data);
			}
			else{
				if($db->getLastError()){
					render_error($db->getLastError());
				}
				else{
					render_error("Record not found",404);
				}
			}
		}
	}
	/**
     * Delete Record Action 
     * @return View
     */
	function delete( $rec_ids = null ){
		$db = $this->GetModel();
		$arr_id = explode( ',', $rec_ids );
		foreach( $arr_id as $rec_id ){
			$db->where('id' , $rec_id,"=",'OR');
		}
		$bool = $db->delete( 'result' );
		if($bool){
			render_json( $bool );
		}
		else{
			if($db->getLastError()){
				render_error($db->getLastError());
			}
			else{
				render_error("Error deleting the record. please make sure that the record exit");
			}
		}
	}
}
