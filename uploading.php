
<?php

   $conn = mysqli_connect("localhost","root","","blog");
   if($conn==FALSE)
   {
	   echo "Connection Failed";
   }

   if(isset($_POST['submit']))
   {
    $staff=$_POST['staff'];
	   $category = $_POST['category'];
	  $caption  = $_POST['cap'];
	  $description = $_POST['desc'];
	  $date  = $_POST['date'];
	  $title = $_POST['title'];
      
	  $subtitle = $_POST['stitle'];
	  $content =$_POST['content'];
	  $view=0;

      $img_name = $_FILES['image']['name'];
      $img_type = $_FILES['image']['type'];
      $tmp_name = $_FILES['image']['tmp_name'];

      $img_name1 = $_FILES['cimage']['name'];
      $img_type1 = $_FILES['cimage']['type'];
      $tmp_name1 = $_FILES['cimage']['tmp_name'];
      
      $img_explode = explode('.',$img_name);
      $img_ext = end($img_explode);
      $img_explode1 = explode('.',$img_name1);
      $img_ext1= end($img_explode1);

      
              $time = rand(1000,1000000);
              $new_img_name = $time.$img_name;
              $new_img_name1 = $time.$img_name1;
              if((move_uploaded_file($tmp_name,"images/".$new_img_name))&&(move_uploaded_file($tmp_name1,"images/".$new_img_name1))){

	  $que = "insert into content(category,caption,description,date,image,cimage,title,subtitle,contents,staff,view)values('$category','$caption','$description','$date','$new_img_name','$new_img_name1','$title','$subtitle','$content','$staff','$view')";
	  $res = mysqli_query($conn,$que);
	  if($res)
	  {
		  echo '<script> alert("Record Inserted Successfully"); </script>';
		  echo '<script> location.href="newdash.php"; </script>';
	  }
	  else{
		echo '<script> alert("Not Record Inserted Successfully"); </script>';
		echo '<script> location.href="newdash.php"; </script>';
   }
}  
    }

    if(isset($_POST['mag']))
    {
        $staff=$_POST['staff'];
      $category = $_POST['category'];
     $caption  = $_POST['cap'];
     $description = $_POST['desc'];
     $date  = $_POST['date'];
     $view=0;
 
       $img_name = $_FILES['image']['name'];
       $img_type = $_FILES['image']['type'];
       $tmp_name = $_FILES['image']['tmp_name'];
 
       $doc_name = $_FILES['magz']['name'];
       $doc_type = $_FILES['magz']['type'];
       $tmp_name1 = $_FILES['magz']['tmp_name'];
       
       $img_explode = explode('.',$img_name);
       $img_ext = end($img_explode);
      $doc_explode = explode('.',$doc_name);
       $doc_ext1= end($doc_explode);
 
       
               $time = rand(1000,1000000);
               $new_img_name = $time.$img_name;
               $new_doc_name = $time.$doc_name;
               if((move_uploaded_file($tmp_name,"images/".$new_img_name))&&(move_uploaded_file($tmp_name1,"pdfs/".$new_doc_name))){
 
     $que = "insert into magazine(category,caption,descrip,date,Timage,document,staff,view)values('$category','$caption','$description','$date','$new_img_name','$new_doc_name','$staff','$view')";
     $res = mysqli_query($conn,$que);
     if($res)
     {
       echo '<script> alert("Record Inserted Successfully"); </script>';
       echo '<script> location.href="inblog.php"; </script>';
     }
     else{
     echo '<script> alert("Not Record Inserted Successfully"); </script>';
     echo '<script> location.href="inblog.php"; </script>';
    }
 }  
     }


if(isset($_POST['edit']))
   {
	$id = $_POST['id'];
$que = "select * from content where id=$id ";
   $res = mysqli_query($conn,$que);
   while($row = mysqli_fetch_array($res))
   {
	?>
	<html>
		<head>
		<link rel="stylesheet" href="css/upload.css" type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   </head>
   <body>
      <script src="ckeditor/ckeditor.js"></script>
      <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <h2 class="title" align="center">SKC - Blogs</h2>
                    </a>
                </li>

                <li>
                    <a href="newdash.php">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Blogs Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="inblog.php">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Magazines Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="uploadd.php">
                        <span class="icon">
                            <ion-icon name="chatbubble-outline"></ion-icon>
                        </span>
                        <span class="title">Upload - Blogs</span>
                    </a>
                </li>

                <li>
                    <a href="mupload.php">
                        <span class="icon">
                            <ion-icon name="chatbubble-outline"></ion-icon>
                        </span>
                        <span class="title">Upload - Magazines</span>
                    </a>
                </li>

                <li>
                    <a href="contacts.php">
                        <span class="icon">
                            <ion-icon name="help-outline"></ion-icon>
                        </span>
                        <span class="title">Contacts Notify</span>
                    </a>
                </li>

                <li>
                    <a href="settings.php">
                        <span class="icon">
                            <ion-icon name="settings-outline"></ion-icon>
                        </span>
                        <span class="title">Settings</span>
                    </a>
                </li>


                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Logout</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>


                <div class="user">
                    <img src="pictures/logo.png" alt="">
                </div>
            </div>
    <div id="upl" style="margin:10px 10px;">
        <div class="require">
            <h3 align="left">Edit A Blog - Upload</h3><br>
            <b align="left">Enter the fields and Create a Blog :</b><br><br><hr><br>
            <img class="logo" src="pictures/logo.png" height="85px" width="95px">
                </div>
            <div class="upform">
                <div class="sp">
                    <form method="post" action="http://localhost/BLOG/uploading.php" enctype="multipart/form-data">
						                <input type="hidden" name="id" value="<?php echo $row["id"]; ?>" />
                                <label><b>Category</b></label><br>
                                <input id="cat" type="text" name="category" placeholder="Category" value='<?php echo $row["category"]?>' required/><br><br>
                                <label><b>Thumbnail Caption</b></label><br>
                                <input id="cap" type="text" name="cap" placeholder="caption" value='<?php echo $row["caption"]?>'  required/><br><br>
                                <label><b>Description (in Two Lines)</b></label><br>
                                <textarea id="desc" name="desc"><?php echo $row["description"]?></textarea><br><br>
                                <label><b>Date</b></label><br>
                                <input id="date" type="date" name="date" value='<?php echo $row["date"]?>'/><br><br>
                                <label><b>Thumbnail Image</b></label><br>
                                <input id="img" type="file" name="image"/><br><br>
                                <label><b>Cover Image</b></label><br>
                                <input id="cimg" type="file" name="cimage" /><br><br>
                                <label><b>Title of the Content</b></label><br>
                                <input id="title" type="text" name="title" placeholder="Title" value='<?php echo $row["title"]?>' required/><br><br>
                                <label><b>Subtitle / Second Title (Optional) </b></label><br>
                                <input id="stitle" type="text" name="stitle" placeholder="Subtitle" value='<?php echo $row["subtitle"]?>'/><br><br>
                                <label><b>Blog Document</b></label><br><br>
                                <textarea id="content"  name="content"><?php echo $row["contents"]?></textarea><br><br>
                                <label><b>Uploaded By</b></label><br><br>
                                <h4 style="margin-left:10px;font-family:calibri,cursive;" ><?php echo $row["staff"]?></h4><br>
                                <input type="checkbox" required><b>  Accept to Edit and Update a blog in SKC - BCA</b><br><br>
                                <input type="submit" name="editv" value="Update Now"/>
                                    <input name="clear" type="reset" value="Clear"/><br><br>
                            </form>
                                </div>
                        </div>
                        </div>
</body>
<script>
    CKEDITOR.replace('content');
    </script>
	</html>

	<?php
   }
   }
	?>

<?php

if(isset($_POST['editv']))
{
	$id = $_POST['id'];
	$category = $_POST['category'];
	  $caption  = $_POST['cap'];
	  $des = $_POST['desc'];
	  $date  = $_POST['date'];
	  $title = $_POST['title'];
	  $subtitle = $_POST['stitle'];
	  $content =$_POST['content'];

	  $que = "update content set category = '$category', caption = '$caption', description = '$des', date = '$date', title = '$title', subtitle = '$subtitle', contents = '$content' where id = $id ";
	  $res = mysqli_query($conn,$que);
	  if($res)
	  {
		  echo '<script> alert("Record Updated Successfully"); </script>';
		  echo '<script> location.href="http://localhost/BLOG/inblog.php"; </script>';
	  }
	  else{
		echo '<script> alert("Not Record updated Successfully"); </script>';
		echo '<script> location.href="http://localhost/BLOG/inblog.php"; </script>';
   }

}

if(isset($_POST['editm']))
   {
	$id = $_POST['id'];
$que = "select * from magazine where id=$id ";
   $res = mysqli_query($conn,$que);
   while($row = mysqli_fetch_array($res))
   {
	?>
	<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/upload.css" type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
<script src="js/blogfun.js" type="text/javascript"></script>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <h2 class="title" align="center">SKC - Blogs</h2>
                    </a>
                </li>

                <li>
                    <a href="newdash.php">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Blogs Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="inblog.php">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Magazines Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="uploadd.php">
                        <span class="icon">
                            <ion-icon name="chatbubble-outline"></ion-icon>
                        </span>
                        <span class="title">Upload - Blogs</span>
                    </a>
                </li>

                <li>
                    <a href="mupload.php">
                        <span class="icon">
                            <ion-icon name="chatbubble-outline"></ion-icon>
                        </span>
                        <span class="title">Upload - Magazines</span>
                    </a>
                </li>

                <li>
                    <a href="contacts.php">
                        <span class="icon">
                            <ion-icon name="help-outline"></ion-icon>
                        </span>
                        <span class="title">Contacts Notify</span>
                    </a>
                </li>

                <li>
                    <a href="settings.php">
                        <span class="icon">
                            <ion-icon name="settings-outline"></ion-icon>
                        </span>
                        <span class="title">Settings</span>
                    </a>
                </li>


                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Logout</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>


                <div class="user">
                    <img src="pictures/logo.png" alt="">
                </div>
            </div>

        <div id="upl">
        <div class="require">
            <h3 align="left">Create A Magazine - Upload</h3><br>
            <b align="left">Enter the fields and Upload a Magazine :</b><br><br><hr><br>
            <img class="logo" src="pictures/logo.png" height="85px" width="95px">
                </div>
            <div class="upform">
                <div class="sp">
                    <form method="post" action="http://localhost/BLOG/uploading.php" enctype="multipart/form-data">
                      <input type="hidden" name="id" value="<?php echo $row["id"]; ?>" />
                                <label><b>Category</b></label><br>
                                <input id="cat" type="text" name="category" placeholder="Category" value='<?php echo $row["category"]?>' required/><br><br>
                                <label><b>Thumbnail Caption</b></label><br>
                                <input id="cap" type="text" name="cap" placeholder="caption" value='<?php echo $row["caption"]?>' required/><br><br>
                                <label><b>Description (in Two Lines)</b></label><br>
                                <textarea id="desc" name="desc" ><?php echo $row["descrip"]?> </textarea><br><br>
                                <label><b>Date</b></label><br>
                                <input id="date" type="date" name="date" value='<?php echo $row["date"]?>'/><br><br>
                                <label><b>Thumbnail Image</b></label><br>
                                <input id="img" type="file" name="image"accept="image/x-png,image/gif,image/jpeg,image/jpg" required/><br><br>
                                <label><b>Magazine (pdf only)</b></label><br><br>
                                <input id="doc" type="file" name="magz" required/><br><br>

                                <label><b>Uploaded By</b></label><br><br>
                                <h4 style="margin-left:10px;font-family:calibri,cursive;" ><?php echo $row["staff"]?></h4>
                                <input type="checkbox" required><b>  Accept to Upload a blog in SKC - BCA</b><br><br>
                                <input type="submit" name="medit" value="Update Now"/>
                                    <input name="clear" type="reset" value="Clear"/><br><br>
                            </form>
                                </div>
                        </div>
                        </div>


                        
</body>


	<?php
   }
   }
	?>


<?php
if(isset($_POST['medit']))
{
  $id=$_POST['id'];
	$category = $_POST['category'];
     $caption  = $_POST['cap'];
     $description = $_POST['desc'];
     $date  = $_POST['date'];
     $view=0;
 
       $img_name = $_FILES['image']['name'];
       $img_type = $_FILES['image']['type'];
       $tmp_name = $_FILES['image']['tmp_name'];
 
       $doc_name = $_FILES['magz']['name'];
       $doc_type = $_FILES['magz']['type'];
       $tmp_name1 = $_FILES['magz']['tmp_name'];
       
       $img_explode = explode('.',$img_name);
       $img_ext = end($img_explode);
      $doc_explode = explode('.',$doc_name);
       $doc_ext1= end($doc_explode);
 
       
               $time = rand(1000,1000000);
               $new_img_name = $time.$img_name;
               $new_doc_name = $time.$doc_name;
               if((move_uploaded_file($tmp_name,"images/".$new_img_name))&&(move_uploaded_file($tmp_name1,"pdfs/".$new_doc_name))){

	  $que = "update magazine set category = '$category', caption = '$caption', descrip = '$description', date = '$date', Timage = '$new_img_name', document = '$new_doc_name' where id = $id ";
	  $res = mysqli_query($conn,$que);
	  if($res)
	  {
		  echo '<script> alert("Record Updated Successfully"); </script>';
		  echo '<script> location.href="http://localhost/BLOG/inblog.php"; </script>';
	  }
	  else{
		echo '<script> alert("Not Record updated Successfully"); </script>';
		echo '<script> location.href="http://localhost/BLOG/inblog.php"; </script>';
   }

}
}


   if(isset($_POST['del']))
    {
        $id = $_POST['id'];
        $que = "Delete from content where id=$id ";
        $res = mysqli_query($conn,$que);
        if($res)
	  {
		  echo '<script> alert("Record Deleted Successfully"); </script>';
          echo '<script> location.href="inblog.php"; </script>';
	  }
	  else{
		echo '<script> alert("Not Record Deleted Successfully"); </script>';
        echo '<script> location.href="inblog.php"; </script>';
   }
    }

    if(isset($_POST['mdel']))
    {
        $id = $_POST['id'];
        $que = "Delete from magazine where id=$id ";
        $res = mysqli_query($conn,$que);
        if($res)
	  {
		  echo '<script> alert("Record Deleted Successfully"); </script>';
          echo '<script> location.href="inblog.php"; </script>';
	  }
	  else{
		echo '<script> alert("Not Record Deleted Successfully"); </script>';
        echo '<script> location.href="inblog.php"; </script>';
   }
    }

    if(isset($_POST['udel']))
    {
        $id = $_POST['id'];
        $que = "Delete from users where id=$id ";
        $res = mysqli_query($conn,$que);
        if($res)
	  {
		  echo '<script> alert("User Deleted Successfully"); </script>';
          echo '<script> location.href="settings.php"; </script>';
	  }
	  else{
		echo '<script> alert("User Not Deleted Successfully"); </script>';
        echo '<script> location.href="settings.php"; </script>';
   }
    }

    if(isset($_POST['delc']))
    {
        $id = $_POST['id'];
        $que = "Delete from contact where id=$id ";
        $res = mysqli_query($conn,$que);
        if($res)
	  {
		  echo '<script> alert("Record Deleted Successfully"); </script>';
          echo '<script> location.href="contacts.php"; </script>';
	  }
	  else{
		echo '<script> alert("Not Record Deleted Successfully"); </script>';
        echo '<script> location.href="contacts.php"; </script>';
   }
    }


    if(isset($_POST["passchange"])){
      $current = $_POST['cpass'];
      $new  = $_POST['cinpass'];
      $que = "update security set password= '$new'";
      $res = mysqli_query($conn,$que);
      if($res)
      {
        echo '<script> alert("Password Changed Successfully"); </script>';
        echo '<script> location.href="settings.php"; </script>';
      }
      else{
      echo '<script> alert("Password Changed Successfully"); </script>';
      echo '<script> location.href="settings.php"; </script>';
     }
    }

    if(isset($_POST["schange"])){
      $count= $_POST['sschange'];
      $que = "update security set students= '$count'";
      $res = mysqli_query($conn,$que);
      if($res)
      {
        echo '<script> alert("Count Changed Successfully"); </script>';
        echo '<script> location.href="settings.php"; </script>';
      }
      else{
      echo '<script> alert("Count Not Count ChangedChanged Successfully"); </script>';
      echo '<script> location.href="settings.php"; </script>';
     }
    }

    if(isset($_POST["stchange"])){
        $count= $_POST['sttchange'];
        $que = "update security set staff= '$count'";
        $res = mysqli_query($conn,$que);
        if($res)
        {
          echo '<script> alert("Count Changed Successfully"); </script>';
          echo '<script> location.href="settings.php"; </script>';
        }
        else{
        echo '<script> alert("Count Not Count ChangedChanged Successfully"); </script>';
        echo '<script> location.href="settings.php"; </script>';
       }
      }
      if(isset($_POST["create"])){
        $name= $_POST['user'];
        $que = "insert into users(staff)values('$name')";
        $res = mysqli_query($conn,$que);
        if($res)
        {
          echo '<script> alert("User Created Successfully"); </script>';
          echo '<script> location.href="settings.php"; </script>';
        }
        else{
        echo '<script> alert("User Not Created Successfully"); </script>';
        echo '<script> location.href="settings.php"; </script>';
       }
      }
    if(isset($_POST["chimg"]))
    {
      $img_name = $_FILES['changeimg']['name'];
      $img_type = $_FILES['changeimg']['type'];
      $tmp_name = $_FILES['changeimg']['tmp_name'];
      
      $img_explode = explode('.',$img_name);
      $img_ext = end($img_explode);
      
              $time = rand(1000,1000000);
              $new_img_name = $time.$img_name;
              if((move_uploaded_file($tmp_name,"images/".$new_img_name))){

	  $que = "update security set dashimage= '$new_img_name'where id=1;";
	  $res = mysqli_query($conn,$que);
      if($res)
      {
        echo '<script> alert("Image changed Successfully"); </script>';
        echo '<script> location.href="settings.php"; </script>';
      }
      else{
      echo '<script> alert("Image Not Changed Successfully"); </script>';
      echo '<script> location.href="settings.php"; </script>';
     }
    }
  }

  if(isset($_POST['contact']))
   {
	   $fname = $_POST['FN'];
	  $lname  = $_POST['LN'];
	  $mail = $_POST['mail'];
	  $city  = $_POST['city'];
	  $mob = $_POST['mob'];
	  $sub = $_POST['subj'];
	  $reason =$_POST['reason'];
	  
	  $que = "insert into contact(fname,lname,mail,city,mob,subject,reason)values('$fname','$lname','$mail','$city','$mob','$sub','$reason')";
	  $res = mysqli_query($conn,$que);
	  if($res)
	  {
		  echo '<script> alert("Your Contact Response Saved"); </script>';
		  echo '<script> location.href="http://127.0.0.1:5500/Home.html"; </script>';
	  }
	  else{
		echo '<script> alert("Your Contact Response not Saved. Check Everything"); </script>';
		echo '<script> location.href="http://127.0.0.1:5500/Home.html"; </script>';
   }
}  
   ?>