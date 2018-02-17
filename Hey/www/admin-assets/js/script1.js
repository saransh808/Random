var abc = 0; //Declaring and defining global increement variable

$(document).ready(function() {

//To add new input file field dynamically, on click of "Add More Files" button below function will be executed
   $('#add_more1').click(function() {
        $(this).before($("<div/>", {id: 'filediv1'}).fadeIn('slow').append(

                $("<br/>"),
                $("<input/>", {name: 'userfile[]', type: 'file', id: 'file1'})
                

                ));
    });

//following function will executes on change event of file input to select different file	
$('body').on('change', '#file1', function(){

        $('#add_more1').before(
               
               
                $("<input/>", {name: 'thetext[]', type: 'text', id: 'text1', placeholder: 'text1', required: 'required'})

                );
	 
            if (this.files && this.files[0]) {
                 abc += 1; //increementing global variable by 1
				
				var z = abc - 1;
                var x = $(this).parent().find('#previewimg1' + z).remove();
                $(this).before("<div id='abcd1"+ abc +"' class='abcd1'><img id='previewimg1" + abc + "' src=''/></div>");
               
			    var reader = new FileReader();
                reader.onload = imageIsLoaded;
                reader.readAsDataURL(this.files[0]);
               
			    $(this).hide();
                $("#abcd1"+ abc).append($("<img/>", {id: 'img1', src: 'http://justwravel.com/img/x.png', alt: 'delete'}).click(function() {
                $(this).parent().parent().remove(),
                $('#text1').remove();
                }));
            }
        });

//To preview image     
    function imageIsLoaded(e) {
        $('#previewimg1' + abc).attr('src', e.target.result);
    };

    $('#upload1').click(function(e) {
        var name = $(":file1").val();
        if (!name)
        {
            alert("First Image Must Be Selected");
            e.preventDefault();
        }
    });
});