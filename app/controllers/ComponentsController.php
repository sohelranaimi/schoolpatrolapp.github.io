<?php 

/**
 * Component Model
 * @category  Model
 */
class ComponentsController extends BaseController{
	
	/**
     * class_attendance_name_option_list Model Action
     * @return array
     */
	function class_attendance_name_option_list(){
		$db = $this->GetModel();
		$sqltext="SELECT  DISTINCT NAME AS value,NAME AS label FROM student ORDER BY NAME";
		$arr=$db->rawQuery($sqltext);
		
		render_json($arr);
	}

	/**
     * getcount_student Model Action
     * @return Value
     */
	function getcount_student(){
		$db = $this->GetModel();
		$sqltext="SELECT COUNT(*) AS num FROM student";
		$arr=$db->rawQueryValue($sqltext);
		
		render_json($arr[0]) ;
	}

	/**
     * getcount_teacher Model Action
     * @return Value
     */
	function getcount_teacher(){
		$db = $this->GetModel();
		$sqltext="SELECT COUNT(*) AS num FROM teacher";
		$arr=$db->rawQueryValue($sqltext);
		
		render_json($arr[0]) ;
	}

	/**
     * getcount_classattendance Model Action
     * @return Value
     */
	function getcount_classattendance(){
		$db = $this->GetModel();
		$sqltext="SELECT COUNT(*) AS num FROM class_attendance";
		$arr=$db->rawQueryValue($sqltext);
		
		render_json($arr[0]) ;
	}

	/**
     * getcount_newstudent Model Action
     * @return Value
     */
	function getcount_newstudent(){
		$db = $this->GetModel();
		$sqltext="SELECT COUNT(*) AS num FROM new_student";
		$arr=$db->rawQueryValue($sqltext);
		
		render_json($arr[0]) ;
	}

	/**
     * getcount_result Model Action
     * @return Value
     */
	function getcount_result(){
		$db = $this->GetModel();
		$sqltext="SELECT COUNT(*) AS num FROM result";
		$arr=$db->rawQueryValue($sqltext);
		
		render_json($arr[0]) ;
	}

	/**
     * getcount_payment Model Action
     * @return Value
     */
	function getcount_payment(){
		$db = $this->GetModel();
		$sqltext="SELECT COUNT(*) AS num FROM payment";
		$arr=$db->rawQueryValue($sqltext);
		
		render_json($arr[0]) ;
	}

	/**
     * getcount_acounting Model Action
     * @return Value
     */
	function getcount_acounting(){
		$db = $this->GetModel();
		$sqltext="SELECT COUNT(*) AS num FROM acounting";
		$arr=$db->rawQueryValue($sqltext);
		
		render_json($arr[0]) ;
	}

	/**
     * getcount_hostel Model Action
     * @return Value
     */
	function getcount_hostel(){
		$db = $this->GetModel();
		$sqltext="SELECT COUNT(*) AS num FROM hostel";
		$arr=$db->rawQueryValue($sqltext);
		
		render_json($arr[0]) ;
	}

	/**
     * getcount_examination Model Action
     * @return Value
     */
	function getcount_examination(){
		$db = $this->GetModel();
		$sqltext="SELECT COUNT(*) AS num FROM examination";
		$arr=$db->rawQueryValue($sqltext);
		
		render_json($arr[0]) ;
	}

	/**
     * getcount_galary Model Action
     * @return Value
     */
	function getcount_galary(){
		$db = $this->GetModel();
		$sqltext="SELECT COUNT(*) AS num FROM galary";
		$arr=$db->rawQueryValue($sqltext);
		
		render_json($arr[0]) ;
	}

	/**
     * getcount_user Model Action
     * @return Value
     */
	function getcount_user(){
		$db = $this->GetModel();
		$sqltext="SELECT COUNT(*) AS num FROM user";
		$arr=$db->rawQueryValue($sqltext);
		
		render_json($arr[0]) ;
	}

}
