<?php 

class Validate{

    public function changeTimeToString($timed){
        $discount_start_date = '1548662400';    
        $start_date = date('H:i:s',$timed);
        return $start_date;
    }
    //function to get extension of a file
    public function validate_image($str){
        $state=false;
        if(!empty($str) && strlen($str)>3){
            $fileExt=explode('.', $str);
            //get actual extension
            $extension=strtolower(end($fileExt));
            $allowed=array('jpg','png','jpeg','gif');
            if(in_array($extension,$allowed)){
                $state=true;
            }else{
                $state=false;
            }
        }else{
            $state=false;
        }

        return $state;
    }
	//function to validate login
	public function sanitize($str){
		global $con;
		$invalid_characters = array("$", "%", "#", "<", ">", "|");
		$str = str_replace($invalid_characters, "", $str);
		$str=stripcslashes(strip_tags(htmlentities(htmlspecialchars($str))));
		return $str;
	}

	//validate phone number
	public function validate_phone($value){
        $state=false;
		if(!preg_match('/^\(?\+?([0-9]{1,4})\)?[-\. ]?(\d{3})[-\. ]?([0-9]{7})$/', trim($value))) {
		     $state=false;
		} else {
		     $state=true;
		}
        return $state;
	}

	//email valid 
	public function isValidEmail($email) {
    // First, we check that there's one @ symbol, and that the lengths are right
    if (!preg_match("/^[^@]{1,64}@[^@]{1,255}$/", $email)) {
        // Email invalid because wrong number of characters in one section, or wrong number of @ symbols.
        return false;
    }
    // Split it into sections to make life easier
    $email_array = explode("@", $email);
    $local_array = explode(".", $email_array[0]);
    for ($i = 0; $i < sizeof($local_array); $i++) {
        if (!preg_match("/^(([A-Za-z0-9!#$%&'*+\/=?^_`{|}~-][A-Za-z0-9!#$%&'*+\/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$/", $local_array[$i])) {
            return false;
        }
    }
    if (!preg_match("/^\[?[0-9\.]+\]?$/", $email_array[1])) { // Check if domain is IP. If not, it should be valid domain name
        $domain_array = explode(".", $email_array[1]);
        if (sizeof($domain_array) < 2) {
            return false; // Not enough parts to domain
        }
        for ($i = 0; $i < sizeof($domain_array); $i++) {
            if (!preg_match("/^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$/", $domain_array[$i])) {
                return false;
            }
        }
    }

    return true;
	}

    //function to remove all white space from a string
    public function removeSpace($str){
        $str = preg_replace('/\s+/', '', $str);
        return $str;
    }

    //format date
public function formatDate($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'days',
        'h' => 'hours',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}
    public function string_date_format($number_date){
        $date = new DateTime($number_date);
        $result = (int)$date->format('m');
        $day=$date->format('d');
        $year=$date->format('Y');
        $monthName = strftime('%B', mktime(0, 0, 0, $result));
        return $monthName.' '.$day.', '.$year;
    }
    public function getCurrentTime(){
        date_default_timezone_set("Africa/Kigali");
        return date("h:i");
    }

    public function displayAlert($message){
        ?>
        <script type="text/javascript">
            alert("<?php echo $message; ?>");
        </script>
        <?php
    }
    public function redError($message){
        $new_message='<p style="background: #FF2617;color: #fff;text-align: center;padding: 10px;display: block;margin:5px;">'.$message.'</p>';
        echo $new_message;
    }
    public function successMessage($message){
        $new_message='<p style="background: #009966;color: #fff;text-align: center;padding: 10px;display: block;margin:5px;border-radius:5px;">'.$message.'</p>';
        echo $new_message;
    }
    public function backToUrl($url){
        ?>
        <script type="text/javascript">window.location.assign("<?php echo $url; ?>");</script>
        <?php
    }

    public function extract_array($array,$field_name){
        $field_value='';
        if(is_array($array)){
            foreach ($array as $key => $value) {
                $field_value=$value[$field_name];
            }
        }else{
            $field_value="Invalid Field";
        }
        return $field_value;
    }
}
$function=new Validate();
?>