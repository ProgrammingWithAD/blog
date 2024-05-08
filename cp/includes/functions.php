<?php
/* current date and time */
    date_default_timezone_set("Asia/Kolkata");
    $current_timestamp = date('Y-m-d H:i:s');
    $gen_date = date('Y-m-d');
    $gen_time = date("H:i:s");



    function logged_in(){
	    return (isset($_SESSION['username']))?true:false;
	}


    function get_actual_link(){
        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $actual_link = parse_url($actual_link, PHP_URL_PATH);
        $actual_link = explode('/', $actual_link);
        $actual_link = end($actual_link);
        return $actual_link;
    }

    function filtervar($mysqli,$data){
        $data = $mysqli->real_escape_string($data);
        $data = htmlentities($data,ENT_QUOTES,'UTF-8');
        $data = trim($data);
        return $data;
    }

    function filtervar_upper($mysqli,$data){
        $data = $mysqli->real_escape_string($data);
        $data = htmlentities($data,ENT_QUOTES,'UTF-8');
        $data = trim($data);
        return strtoupper($data);
    }

    function input_date($data){
        $result = '';
        if(!empty($data) && $data!='0000-00-00'){
            $date = str_replace('/', '-', $data);
            $result=date('Y-m-d',strtotime($date));
        }
        return $result;
    }
    function input_date_time($data){
        $result = '';
        if(!empty($data) && $data!='0000-00-00'){
            $date = str_replace('/', '-', $data);
            $result=date('Y-m-d H:i',strtotime($date));
        }
        return $result;
    }
    function output_date($date){
        $date = str_replace('/','-',$date);
        $date = new DateTime($date);
        $dt2=$date->format('d-m-Y');
        return $dt2;
    }
    function output_date_time($date){
        $date = str_replace('/','-',$date);
        $date = new DateTime($date);
        $dt2=$date->format('d-m-Y H:i');
        return $dt2;
    }

    function input_date_st($date){
        $date = str_replace('/','-',$date);
        $date = new DateTime($date);
        $dt2=$date->format('Y-m-d');
        return $dt2;
    }

    function output_date_st($date){
        $date = str_replace('/','-',$date);
        $date = new DateTime($date);
        $dt2=$date->format('d-m-Y');
        return $dt2;
    }


    function filter_excel_mobile($data){
        $data = trim($data);
        $data = str_replace('+91','',$data);
        $data = str_replace('-91','',$data);
        $data = str_replace('+','',$data);
        $data = str_replace('-','',$data);
        $data = str_replace(' ','',$data);
        return $data;
    }

    function is_login(){
if(!isset($_SESSION['login']['user_email'])||empty($_SESSION['login']['user_email'])){
    header('Location:logout');
}

    }
function company_details(){
    global $mysqli;
    $query=$mysqli->query('SELECT * FROM `company` WHERE id=1');
    $fetch=$query->fetch_assoc();
    return $fetch;
}


function admin_access( $user_id ){
    global $mysqli;
$query=$mysqli->query('SELECT * FROM `users` WHERE id= "'.$user_id.'" AND role="ADMIN"'); 
$count= $query->num_rows;
if($count> 0){
return true;
}else{
return false;
}
}
function get_user_name($mysqli,$id){
$query=$mysqli->query("SELECT * FROM `users` WHERE id='$id'");
$fetch= $query->fetch_assoc();
return $fetch["name"];
}

// monthly stats of last 12 months vehical booking
function monthly_stats_booking(){
    global $mysqli;
    $query=$mysqli->query("");
}

function get_guest_name($mysqli,$id){
    $query=$mysqli->query("SELECT * FROM `guests` WHERE id='$id'");
    $fetch= $query->fetch_assoc();
    return $fetch["guest_name"];
    }