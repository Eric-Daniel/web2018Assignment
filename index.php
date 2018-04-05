<?php
  $title = "Home";
  require_once "./template/header.php";
  require_once "./functions/database_functions.php";
?>

<div style="float: left; background-color:#71746c; width:100%">
<div class="container">
    <h5><button onclick="myFunction()" class="btn btn-warning">Reset Filters To Default</button></h5>

    <script>
        function myFunction() {
            location.reload();
        }
    </script>
    <div class="row">
        <div class="col-sm-6">
            <div class="dropdown">
                <h5>
                    <select id="year">
                        <option value="" selected="selected">Select Year</option>
                        <?php

                        $conn = new db_class();

                        $filter = $conn->filter();

                        while($fetch = $filter->fetch_array()){
                            ?>
                            <option value=<?php echo $fetch['year']; ?>><?php echo $fetch['year']; ?></option>
                        <?php }	?>
                        }
                    </select>
                    <select id="genre">
                        <option value="" selected="selected">Select Genre</option>
                        <?php
                        $conn = new db_class();

                        $filter = $conn->filterGenre();

                        while($fetch = $filter->fetch_array()){
                            ?>
                            <option value=<?php echo $fetch['genre']; ?>><?php echo $fetch['genre']; ?></option>
                        <?php }	?>
                        }
                    </select>
                </h5>
            </div>
        </div>
    </div>
    <body>
    <div class="container">
        <br>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">SEARCH</span>
            </div>
            <input type="text" name="search_text" id="search_text" class="form-control" placeholder="Search By Title, Year or Genre" aria-label="SEARCH" aria-describedby="basic-addon1">
        </div>
        <div class="form-group">
            <div id="result" style="position:absolute;background-color:#c5faff;"></div>
        </div>
    </div>
    </body>

    <div style=background-color:white;">
<table class="table" style="margin-top: 20px">

    <tr style=background-color:#5df9d5;">
        <th>Title</th>
        <th>Year</th>
        <th>Genre</th>
        <th>Description</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
    </tr>

    <?php

    $conn = new db_class();
    $read = $conn->read();
    while($fetch = $read->fetch_array()){
        ?>
        <tr>
            <td><?php echo $fetch['title']; ?></td>
            <td><?php echo $fetch['year']; ?></td>
            <td><?php echo $fetch['genre']; ?></td>
            <td><?php echo '<img src="./bootstrap/img/' . $fetch['image'] . '" height="268" width="182"> '; ?> <br> <?php echo $fetch['synopsis']; ?> </td>
        </tr>
    <?php } ?>
</table> </div>

<script>
    $(document).ready(function(){
        $("#year").change(function(){
        var year_selected = $('#year').find(":selected").text();
        console.log(year_selected);
              if($.isNumeric(year_selected))
        {
            find_movie_by_year(year_selected);
        }
        else
        {
            $("#result").html('');
        }
        });
  
        function find_movie_by_year(year_selected)
        {
            $.ajax({
                url:"fetch.php",
                method:"POST",
                data:{query:year_selected},
                success:function(data)
                {
                    $('#result').html(data);
                }
            });
        }

        $("#genre").change(function(){
            var genre_selected = $('#genre').find(":selected").text();
            console.log(genre_selected);
            if($(genre_selected)) // if($.isNumeric(genre_selected))
            {
                find_movie_by_genre(genre_selected);
            }
            else
            {
                $("#result").html('');
            }
        });

        function find_movie_by_genre(genre_selected) //pass in yearSelected para
        {
            $.ajax({
                url:"fetch.php",
                method:"POST",
                data:{query:genre_selected}, //pass in year_selected para
                success:function(data)
                {
                    $('#result').html(data);
                }
            });
        }

        function load_data(query)
        {
            $.ajax({
                url:"fetch.php",
                method:"POST",
                data:{query:query},
                success:function(data)
                {
                    $('#result').html(data);
                }
            });
        }

        $("#search_text").keyup(function(){

            var values = "";
            if($('#search_text').val() == "" || $('#search_text').val() == " ")
            {
                $("#result").html('');
            }
            else
            {
                load_data($('#search_text').val());
            }
        });

    });
</script>

<?php
require_once "./template/footer.php";
?>
