<?php
include('db.php'); //Database connection

if (isset($_POST["action"])) {
    $query= "SELECT * FROM details WHERE Status='1'";
    
    if (isset($_POST["ado_breed"])) {
        $breed_filter = implode("','", $_POST["ado_breed"]);
        $query.= "AND Breed IN('" .$breed_filter. "')";
    }   

    $statement = $connect->prepare($query);
    $statement->execute();
    $result    = $statement->fetchAll();
    $total_row = $statement->rowCount();
    $output    = '';
    if ($total_row > 0) {
        foreach ($result as $row) {
            $output .= '
                <div class="col-md-4 col-sm-6 borderoverall">
                <div class="filter-grid">
                    <div class="filter-image">
                        <a href="#">
                            <img class="pic" src="photos/'. $row['Image'] .'">
                        </a>
                    </div>
                    <div class="description">
                        <h3 class="title">'. $row['Name'] .'</h3>
                        <br/>
                            <b>Breed: '.$row['Breed'].'</b> <br/><br/>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn bg-dark" data-bs-toggle="modal" data-bs-target="#exampleModal'.$row['id'].'" style="color: white;"> More details </button>
                    </div>
                </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal'.$row['id'].'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">'. $row['Name'] .'</h5>     
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img class="card-img-top" style="width: 100%; height: 200; object-fit: cover;"src="photos/'. $row['Image'] .'" class="img-fluid">
                                <p class="text-center">'.$row['About'].'</p>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button class="btn btn-secondary"> <a style="color: white; text-decoration: none;" href="./contact.php?id='.$row['id'].'">Adopt</a> </button>
                            </div>
                        </div>
                    </div>
                </div>
                ';
        }
    } else {
        $output = '<h3>0 results found</h3>';
    }
    echo $output;
}
?>
