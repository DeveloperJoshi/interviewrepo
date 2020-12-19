<input type="number" name="rate"  />
<input type="number" name="box"  />

<input type="number" name="amount"  readonly />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>

    var rate,box;
    var value;
    $('input[name="rate"]').change(function(){
        rate = parseFloat($('input[name="rate"]').val()) || 0;
        console.log(rate);
    });
    $('input[name="box"]').change(function(){
        box =  parseFloat($('input[name="box"]').val()) || 0;
        
        $('input[name="amount"]').val(rate * box);    
    });
   
     

</script>