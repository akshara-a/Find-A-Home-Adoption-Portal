<?php
    include('db.php'); //Database connection
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <!-- JQUERY CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
        form{
            margin: 50px;
        }
        .success{
            text-align: center;
            font-size: 25px;
            color: green;
        }
        @media only screen and (min-width: 800px){
            form{
                margin: 100px 300px;
            }
        }
    </style>
</head>
<body>
    <?php
        $id = $_GET["id"];
        $stmt = $connect->query("SELECT * FROM details WHERE id='$id'");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    ?>
    <form method="post" name="contact_form" action="">
        <div class="mb-3">
            <label class="form-label">Your Name</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="name" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Name of the pet you want to adopt</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" value="<?php echo $row['Name']?>" name="petname" disabled>
        </div>
        <div class="mb-3">
            <label class="form-label">Which breed does it belong to?</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" value="<?php echo $row['Breed']?>" name="breed" disabled>
        </div>
        <div class="mb-3">
            <label class="form-label">Contact Number</label>
            <input type="tel" class="form-control" id="exampleFormControlInput1" name="contact" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" name="email" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Your Message</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="message" rows="3" required></textarea>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
    <?php
        }
    ?>
    
    <!-- To avoid resubmission on reload -->
    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
    }
    </script>
</body>
</html>

<?php
    if((isset($_POST['submit']))){
        $name = $_POST["name"]; 
        $petname = $_POST["petname"];
        $breed = $_POST["breed"];
        $contact = $_POST["contact"];
        $email = $_POST["email"]; 
        $message = $_POST["message"];
        //Query to insert data to the database
        $sql="INSERT INTO interest_form (UserName, PetName, Breed, Email, Contact, Msg) VALUES ('".$name."','".$petname."', '".$breed."', '".$email."', '".$contact."', '".$message."')";
        //Execute the query and returning a message
        if(!$result = $connect->query($sql)){
            die('Error occured [' . $conn->error . ']');
        }
        else
            echo '<script> alert("Thank you! We will get in touch with you soon")</script>';
        }
?>





