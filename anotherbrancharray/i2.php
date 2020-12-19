<form id="uploadForm" action="upload.php" method="post">
<label>Upload Image File:</label><br/>
<input name="userImage" type="file" class="inputFile" />
<input name="hello" type="text" />
<input type="submit" value="Submit" class="btnSubmit" />
</form>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript">
$("form#uploadForm").submit(function(e) {
    e.preventDefault();    
    var formData = new FormData(this);

    $.ajax({
        url: 'upload.php',
        type: 'POST',
        data: formData,
        success: function (data) {
            alert(data)
        },
        cache: false,
        contentType: false,
        processData: false
    });
});
</script>