<!DOCTYPE html>
<html lang="en">
<head>
  <title>Invoice Generator</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<form id="form" method="POST">
<input type="text" name="invoiceNumber"/>
<ol id="boxes">
</ol>
<input type="button" value="Add a row" id="add_boxes" />

<input type="submit" value="send data" />
</form>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>
var add = $('#add_boxes');
var all = $('#boxes');
var amountOfInputs = 2;
var maximumBoxes = 10;

add.click(function(event){
    
    // create a limit
    if($(".box").length >= maximumBoxes){
        alert("You cannot have more than 10 boxes!");
        return;
    }
        
    var listItem = $('<li class="box"></li>');
    // we will add 2 boxes here, but we can modify this in the amountOfBoxes value
  
    listItem.append('<input type="text" name=field_name[] class="input" />');
    listItem.append('<input type="text" name=price_name[] class="input" />');
    listItem.append('<input type="text" name=third_name[] class="output" name="value" />');
    // Lets add a link to remove this group as well, with a removeGroup class
    listItem.append('<input type="button" value="Remove" class="removeGroup" />')
    listItem.appendTo(all);
});

// This will tie in ANY input you add to the page. I have added them with the class `input`, but you can use any class you want, as long as you target it correctly.
$(document).on("keyup", "input.input", function(event){
    // Get the group
    var group = $(this).parent();
    // Get the children (all that arent the .output input)
    var children = group.children("input:not(.output)");
    // Get the input where you want to print the output
    var output = group.children(".output");
    // Set a value
    var value = 1;
    // Here we will run through every input and add its value
    children.each(function(){
        // Add the value of every box. If parseInt fails, add 0.
        value *= parseInt(this.value) || 1;
    });
    // Print the output value
    output.val(value);
});

// Lets implement your remove field option by removing the groups parent div on click
$(document).on("click", ".removeGroup", function(event){
    event.preventDefault();
    $(this).parent(".box").remove();
});

</script>
<script >
//ajax call
$(document).ready(function(){
    $('#form').submit(function(e){
        e.preventDefault();
        $.ajax({
            type:"POST",
            url:"trial.php",
            data:$(this).serialize(),
            success:function(response){
                var jsonData=JSON.parse(response);

                if(jsonData.success == "1"){
                    alert("Success");
                }else{
                    alert("Failed");
                }
            }
        });
    });
});
</script>
</body>
</html