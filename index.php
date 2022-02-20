<?php 
include('db.php'); //Database Connection
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find A Home | Adoption Portal</title>
    <!-- JQUERY CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<!-- Filter Content -->
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <h5>Breed</h5>
            <div class="list-group">
                <?php
                $query = "SELECT DISTINCT Breed FROM details";
                $statement = $connect->prepare($query);
                $statement->execute();
                $result = $statement->fetchAll();
                foreach($result as $row)
                {
                ?>
                    <div class="list-group-item checkbox">
                        <label>
                            <input type="checkbox" class="filter_all ado_breed" value="<?php echo $row['Breed']; ?>">
                            <?php echo $row['Breed'];?>
                        </label>
                    </div>
                    <?php
                }
                ?>
            </div>
    </div>
    <div class="col-md-9">
        <div class="row filter_data"> </div>
    </div>
</div>
</div>

<script>
$(document).ready(function() {

    filter_data();

    function filter_data() {
        $('.filter_data');
        var action = 'fetch_data';
        var ado_breed = get_filter('ado_breed');
        $.ajax({
            url: "fetch.php",
            method: "POST",
            data: {
                action: action,
                ado_breed: ado_breed,
            },
            success: function(data) {
                $('.filter_data').html(data);
            }
        });
    }

    function get_filter(class_name) {
        var filter = [];
        $('.' + class_name + ":checked").each(function() {
            filter.push($(this).val());
        });
        return filter;
    }

    $('.filter_all').click(function() {
        filter_data();
    });

});
</script>
</body>
</html>