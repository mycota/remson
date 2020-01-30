<?php

if(isset($_POST['submit']))
    {

            $n1= json_encode($_POST["first_name"]);
            $n2 = json_encode($_POST["last_name"]);

            echo $n1.$n2;
          }

?>

<!DOCTYPE html>
<html>
<head>
    <title>Try</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
<table border="1" class="authors-list">
    <tr>
        <td>author's first name</td><td>author's last name</td>
    </tr>
    <tr>
        <td>
            <input type="text" name="first_name[]" id="first_name" />
        </td>
        <td>
            <input type="text" name="last_name[]" id="last_name" />
        </td>
    </tr>
</table>
<a href="#" title="" class="add-author">Add Author</a>

<input type="submit" value="Submit" name="submit" /> 
</form>
</body>
</html>

<script type="text/javascript">
$(document).ready(function () {
jQuery(function(){
    var counter = 1;
    jQuery('a.add-author').click(function(event){
        event.preventDefault();

        var newRow = jQuery('<tr><td><input type="text" name="first_name' +
            counter + '"/></td><td><input type="text" name="last_name' +
            counter + '"/></td></tr>');
            counter++;
        jQuery('table.authors-list').append(newRow);

    });
});
});

</script>