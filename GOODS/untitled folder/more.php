<?php
if(isset($_POST['submit']))
    {

            $xx= json_encode($_POST["xx"]);
            $xx= json_encode($_POST["xx"]);
            $xx= json_encode($_POST["xx"]);
            $xx= json_encode($_POST["xx"]);
            $xx= json_encode($_POST["xx"]);
            $xx= json_encode($_POST["xx"]);

     $query=mysql_query("INSERT INTO `xxx` (`xx`, `xxx`, `xxx`) VALUES ('NULL', '$xx','$xx','$xx')");
    }
?>

<div class="form-group app-edu">
   <label for="Example Details" class="col-xs-3 col-sm-2 control- label">Example Details</label>
    <div class="form-group add-field">
        <div class="user">
            <select name="xx[]" id="xx" required>
                <option value="">Education</option>
                <option value="Class 10">Class 10</option>
                <option value="Class 12">Class 12</option>
                <option value="Diploma">Diploma</option>
                <option value="PG Diploma">PG Diploma</option>
                <option value="Bachelors Degree">Bachelors Degree</option>
                <option value="Masters Degree">Masters Degree</option>
                <option value="Other Certifications">Other Certifications</option>
            </select>   

        <input type="text" placeholder="Name of Board" name="xx[]" id="xx" required>                
        <input type="text" placeholder="Name of Institute" name="xx[]" required id="xx">
        <input type="text" placeholder="xx" name="xx[]" required id="xx">
        <select name="xx[]" id="xx" required>
            <option value="">xx</option>
            <option value="xx">xx</option>
            <option value="xx">xx</option>
            <option value="xx">xx</option>
        </select>
        <input type="text" placeholder="Year and Month of Exam" name="date[]" required id="date" autocomplete="off">
        </div>

        <div class="add-more"><span>+</span>Add More</div>
     </div>
   </div> 

   var data_fo = $('.add-field').html();
    var sd = '<div class="remove-add-more">Remove</div>';
    var data_combine = data_fo.concat(sd);
    var max_fields = 5; //maximum input boxes allowed
    var wrapper = $(".user"); //Fields wrapper
    var add_button = $(".add-more"); //Add button ID

    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
      e.preventDefault();
      if(x < max_fields){ //max input box allowed
        x++; //text box increment
        $(wrapper).append(data_combine); //add input box
        //$(wrapper).append('<div class="remove-add-more">Remove</div>')
      }
      // console.log(data_fo);
    });

    $(wrapper).on("click",".remove-add-more", function(e){ //user click on remove text
        e.preventDefault();
        $(this).prev('.user').remove();
        $(this).remove();
        x--;
    })