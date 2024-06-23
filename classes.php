<?php
abstract class User{
  
    public $id;
    public $name;
    public $email;
    public $password;
    public $phone;
    public $created_at;
    public $updeted_at;

    public $image;

    function __construct($id,$name, $email, $password, $phone,$image, $created_at, $updeted_at){
        $this->id=$id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->phone = $phone;
        $this->image = $image;
    
        $this->created_at = $created_at;
        $this->updeted_at = $updeted_at;
    }



     public static function login($email, $password){
        $user = null;
        $qry ="SELECT * FROM USERS WHERE email='$email' AND password='$password'";
        require_once('config.php');
        $cn = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
        $rslt = mysqli_query($cn,$qry);
        if($arr = mysqli_fetch_assoc($rslt)){
           switch($arr['role']){
            case 'job_seeker':
            $user = new Job_seeker($arr["id"],$arr["name"],$arr["email"],$arr["password"],$arr["phone"],$arr["image"],$arr["created_at"],$arr["updeted_at"]);
            break;
            case'recruiter':
                $user = new Recruiter($arr["id"],$arr["name"],$arr["email"],$arr["password"],$arr["phone"],$arr["image"],$arr["created_at"],$arr["updeted_at"]);

            break;
            }
    

        }else{
            echo "no_user";
           
            }
            mysqli_close($cn);
            return $user;
}
        
     public static function register($name, $email, $password, $phone){}
}
class Recruiter extends User{
    public $role='recruiter';
    public static function register($name, $email, $phone,$password){
        $role='recruiter';
        $qry = "INSERT INTO USERS (name,email,phone,password)
        VALUES('$name', '$email','$phone','$password')" ;
        require_once('config.php');
        $cn = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
        $rslt = mysqli_query($cn,$qry);
        mysqli_close($cn);
        return $rslt;

    }
    public static function store_post($title, $content, $imageName,$user_id){
        $qry = "INSERT INTO POSTS (title,content,image,user_id)
        VALUES('$title', '$content','$imageName',$user_id)" ;
        require_once('config.php');
        $cn = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
        $rslt = mysqli_query($cn,$qry);
        mysqli_close($cn);
        return $rslt;

    }
    public static function store_comment($comment,$post_id,$user_id){
        $qry = "INSERT INTO comments (comment,post_id,user_id)
        VALUES('$comment', '$post_id',$user_id)" ;
        require_once('config.php');
        $cn = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
        $rslt = mysqli_query($cn,$qry);
        mysqli_close($cn);
        return $rslt;

    }
    public static function my_posts($user_id){
       
        $qry = "SELECT * FROM posts WHERE USER_ID=$user_id ORDER BY created_at DESC";
     
        require_once('config.php');
        $cn = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
        $rslt = mysqli_query($cn,$qry);
        $data=mysqli_fetch_all($rslt,MYSQLI_ASSOC);
        mysqli_close($cn);
        return $data;
    }
    public static function updata_profile_pic($imagepath,$user_id){
       
        $qry = " UPDATE USERS SET IMAGE ='$imagepath' WHERE id=$user_id ";
     
        require_once('config.php');
        $cn = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
        $rslt = mysqli_query($cn,$qry);
        mysqli_close($cn);
        return $data;
    }
    public static function get_post_comments($post_id){
       
        $qry = "SELECT * FROM COMMENTS WHERE POST_ID=$post_id ORDER BY created_at DESC";
     
        require_once('config.php');
        $cn = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
        $rslt = mysqli_query($cn,$qry);
        $data=mysqli_fetch_all($rslt,MYSQLI_ASSOC);
        mysqli_close($cn);
        return $data;
    }

}
class Job_seeker extends User{
    public $role='job_seeker';

    public static function register($name, $email, $phone, $password){
      
        $qry = "INSERT INTO USERS (name,email,phone,password) 
        VALUES('$name', '$email','$phone','$password',)" ;
        require_once('config.php');
        $cn = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME);
        $rslt = mysqli_query($cn,$qry);
        mysqli_close($cn);
        return $rslt;
    }
}


?>