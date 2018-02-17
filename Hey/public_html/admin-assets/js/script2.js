function createdaybox(num){
			var texthtml = '';
				//alert(num);
				for(var i = 1; i<= num; i++){
					texthtml += '<div class="control-group"><label class="control-label" for="focusedInput">Day '+i+'</label><div class="controls"><textarea name="dayiternary[]" style="margin: 0px;width: 80%;height: 100px;"></textarea></div></div>';
					
			
					


				}
				$('#daybox').html(texthtml);
				
			
			}

function createdayboxedit(num, num1){
	if(num > num1){
		var numa = num - num1;
		var texthtml = '';
				//alert(num);
				for(var i = 1; i<= numa; i++){
					texthtml += '<div class="control-group"><label class="control-label" for="focusedInput">Day '+(i + num1)+'</label><div class="controls"><textarea name="dayiternary[]" style="margin: 0px;width: 80%;height: 100px;"></textarea></div></div>';
					
			
					


				}
				$('#daybox').html(texthtml);
	}
	else{}
			
				
			}
