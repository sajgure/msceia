$(document).ready(function(){
	$(document).on('change','.get_appeared_stud',function(){
		var inst_id =$(this).val();
		var data={inst_id : inst_id};
		$.ajax({
			url:completeURL('get-appear-stud-count'),
			data:data,
			type:'POST',
			dataType:'json',
			headers: {
                        "x-api-key": "5681648d-91d6-4371-a911-1497734d0016"
                    },
			success:function(data)
			{
				$(".stud_count").html(data.cnt);
                $(".stud_count_input").val(data.cnt);
                $('.paid_amount').html(data.rs);
                $('.paid_amount_input').val(data.rs);
                $('.institute_id').val(data.inst_id);
                $('.institute_name').val(data.institute_name);
                $('.institute_code').val(data.institute_code);
                $('.mobile').val(data.institute_contact);
                $('.email').val(data.institute_mail);
			}
		})
	});
    $(document).on('change','.get_stud_result_list',function(e){  
        var id = $('.id').select2('val');
        var url= $(this).data('url');
        Metronic.startPageLoading({animate: true});
        $.ajax({
            type:'POST',
            url:completeURL(url),
            data:{id:id},
            dataType:'html',
            success:function(data)
            {      
                $('.append_div').html(data);
            },
            complete:function()
            {
                Metronic.stopPageLoading();
                $('select').select2();
                TableAdvanced.init();
            }
        });
    });
	$(document).on('change','.get_stud_list',function(e){  
        var id = $('.id').select2('val');
        var status = $('.status').select2('val');
        var batch_id = $('.batch_id').select2('val');
        var url= $(this).data('url');
        Metronic.startPageLoading({animate: true});
        $.ajax({
            type:'POST',
            url:completeURL(url),
            data:{id:id,status:status,batch_id:batch_id},
            dataType:'html',
            success:function(data)
            {      
                $('.append_div').html(data);
            },
            complete:function()
            {
                Metronic.stopPageLoading();
                $('select').select2();
                TableAdvanced.init();
            }
        });
    });
    $(document).on('change','.get_inst_list',function(e){
        var id = $('.id').select2('val');
        var status = $('.status').select2('val');
        var url= $(this).data('url');
        Metronic.startPageLoading({animate: true});
        $.ajax({
            type:'POST',
            url:completeURL(url),
            data:{id:id,status:status},
            dataType:'html',
            success:function(data)
            {      
                $('.append_div').html(data);
            },
            complete:function()
            {
                Metronic.stopPageLoading();
                $('select').select2();
                TableAdvanced.init();
            }
        });
    });
    $(document).on('click','.macstatus',function(){
    	var id =$(this).attr('rel');
    	var url = $(this).attr('rev');
    	$.ajax({
    		url : completeURL(url),
    		type: 'post',
    		data : {id : id},
    		dataType : 'json',
    		headers: {
                        "x-api-key": "5681648d-91d6-4371-a911-1497734d0016"
                    },
    		success:function(data)
    		{
    			if (data.state == true) 
    			{
                    $.toast({ text: data.msg, heading: '<b>Success</b>', icon: 'success' });
                    setTimeout(function() 
                    {
                        window.location.href = window.location.href;
                    }, 2000);
                } 
                else
                {
                    $.toast({ text: data.msg, heading: '<b>Warning</b>', icon: 'error' });
                }
    		}
    	})
    });
    $(document).on('click','.stud_birthday',function(){
        var url = $(this).attr('rev');
        $.ajax({
            url : completeURL(url),
            type: 'post',
            data : {id : ''},
            dataType : 'json',
            headers: {
                        "x-api-key": "5681648d-91d6-4371-a911-1497734d0016"
                    },
            success:function(data)
            {
                if (data.state == true) 
                {
                    $.toast({ text: data.msg, heading: '<b>Success</b>', icon: 'success' });
                    setTimeout(function() 
                    {
                        window.location.href = window.location.href;
                    }, 2000);
                } 
                else
                {
                    $.toast({ text: data.msg, heading: '<b>Warning</b>', icon: 'error' });
                }
            }
        });
    });
    $(document).on('click','.get_batch_id',function(e){ 
        var id = $('.batch_id').select2('val');
        var url= $(this).data('url');
        Metronic.startPageLoading({animate: true});
        if(id)
        {
            $.ajax({
                type:'POST',
                url:completeURL(url),
                data:{id:id},
                dataType:'json',
                success:function(data)
                {      
                    $('.append_div').html(data.view);
                },
                complete:function()
                {
                    Metronic.stopPageLoading();
                    $('select').select2();
                    TableAdvanced.init();
                }
            }); 
        }
        else
        {
            var msg = $(this).data('msg');
            $.toast({ text: msg, icon: 'info' });
        }
        Metronic.stopPageLoading();
    });
    $(document).on('change', '.upload_excel', function(){
        var url = $('.upload_excel').data('url');
        var property = document.getElementById("file").files[0];
        var image_name = property.name;
        var image_extension = image_name.split('.').pop().toLowerCase();
        var image_size = property.size;
        var invalidformat = false;
        var maxFileSize = false;
        if(jQuery.inArray(image_extension, ['xls','xlsx']) == -1)
        {          
            $('.img_error').html('<lable class="text-danger bold" style="position: absolute; top: 29%; left: 19%;">Invalid File format!</lable>');
            invalidformat = true;
        }
        if(image_size > 5000000)
        {
            $('.img_error').html('<lable class="text-danger bold" style="position: absolute; top: 29%; left: 19%;">File size is only upto 2MB!</lable>');
            maxFileSize = true;
        }
        if(invalidformat == false && maxFileSize == false)
        {
            var form_data = new FormData();
            form_data.append("file", property);
            $.ajax({
                url:url,
                method:"POST",
                data:form_data,
                contentType:false,
                cache:false,
                processData:false,
                success:function(data)
                {
                    $('.fileinput-filename').html(data);
                    setTimeout(replce_file, 50);
                    $('.file_name').val(data);
                    $('.upload_button').html('Change');
                }
            });
        }
    });
    $(document).on('change', '.upload_objective_excel', function(){
        var url = $('.upload_objective_excel').data('url');
        var property = document.getElementById("file").files[0];
        var image_name = property.name;
        var image_extension = image_name.split('.').pop().toLowerCase();
        var image_size = property.size;
        var invalidformat = false;
        var maxFileSize = false;
        if(jQuery.inArray(image_extension, ['xls','xlsx']) == -1)
        {          
            $('.img_error').html('<lable class="text-danger bold" style="position: absolute; top: 61%; left: 54%;">Invalid File format!</lable>');
            invalidformat = true;
        }
        if(image_size > 5000000)
        {
            $('.img_error').html('<lable class="text-danger bold" style="position: absolute; top: 61%; left: 54%;">File size is only upto 2MB!</lable>');
            maxFileSize = true;
        }
        if(invalidformat == false && maxFileSize == false)
        {
            var form_data = new FormData();
            form_data.append("file", property);
            $.ajax({
                url:url,
                method:"POST",
                data:form_data,
                contentType:false,
                cache:false,
                processData:false,
                success:function(data)
                {
                    $('.fileinput-filename').html(data);
                    setTimeout(replce_file, 50);
                    $('.file_name').val(data);
                    $('.upload_button').html('Change');
                }
            });
        }
    });
    $(document).on('click','.search_data',function(){
        var from_date = $('.from_date').val();
        var to_date = $('.to_date').val();
        var url = $(this).attr('rev');
        $.ajax({
            url:completeURL(url),
            type:'POST',
            data:{from_date:from_date,to_date:to_date},
            dataType:'json',
            headers: {
                    "x-api-key": "5681648d-91d6-4371-a911-1497734d0016"
                },
            success:function(data) {
                $('.dump_view').html(data.view);              
            }
        });
    });
    $(document).on("change",".btn_qty",function(){
        var qty=$(this).val();
        var url=$(this).attr('rel'); 
        var data={qty:qty};
        $.ajax({
            url : completeURL(url),
            type : 'POST', 
            dataType : 'json',
            data:data,
            success:function(data)
            { 
                window.location.href=window.location.href;
            }
        });
    });
    $(document).on('click','.search_district',function(){
        var district = $('.district').select2('val');
        var from_date = $('.from_date').val();
        var to_date = $('.to_date').val();
        var url = $(this).attr('rev');
        $.ajax({
            url:completeURL(url),
            type:'POST',
            data:{district:district,from_date:from_date,to_date:to_date},
            dataType:'json',
            headers: {
                    "x-api-key": "5681648d-91d6-4371-a911-1497734d0016"
                },
            success:function(data) {  
                $('.dump_view').html(data.view);              
            }
        });
    });
    $(document).on('click','.csearch_district',function(){
        var district = $('.district').select2('val');
        var from_date = $('.from_date').val();
        var to_date = $('.to_date').val();
        $.ajax({
            url:completeURL('search-complete-district-report'),
            type:'POST',
            data:{district:district,from_date:from_date,to_date:to_date},
            dataType:'json',
            headers: {
                    "x-api-key": "5681648d-91d6-4371-a911-1497734d0016"
                },
            success:function(data) {
                $('.dump_view').html(data.view);                
            }
        });
    });
    $(document).on('click','.stud_result',function(){
        var seat_no = $('.seat_no').val();
        var exam_password = $('.exam_password').val();
        Metronic.startPageLoading({animate: true});
        $.ajax({
            type:'POST',
            url:completeURL('fetch_result'),
            data:{seat_no:seat_no,exam_password:exam_password},
            dataType:'html', 
            success:function(data)
            {      
                $('.result_div').html(data);
            },
            complete:function()
            {
               Metronic.stopPageLoading();
            }
        });
    });
    $(document).on('click','.download_exam',function(){
        var download_id = $(this).data('url');
        var title= 'Download Exam Software';
        var dialog = bootbox.dialog({
            message: '<form rel="check_password" action="javascript:void(0);" id="popup_save" class="form-horizontal update" method="post"> <div class="form-body"> <div class="row"> <div class="col-md-12"> <div class="form-group"> <label class="control-label" style="padding-left: 11%;font-size: 15px;margin-bottom: 13px !important;font-weight:600;">Enter Your Password </label>  <div class="input-icon right" style="padding-left: 11%;padding-right: 12%;"> <i class="fa"></i> <input type="password" class="form-control password" name="password" placeholder="Enter Password"> </div> </div> </div> </div> </div> </div> </form>',
            title: title, 
            buttons: {                 
                danger: {
                    label: "Cancel",
                    className: "btn-danger",
                    callback: function() { }
                },
                success: {
                    label: 'Submit',
                    className: 'btn-success',
                    callback: function() {
                        var form= '#popup_save';
                        var url = $(form).attr('rel');
                        var serialize_data = $(form).serialize();
                        serialize_data = {serialize_data:serialize_data,download_id:download_id};
                        var form2 = $(form);
                        var error2 = $('.alert-danger', form2);
                        var success2 = $('.alert-success', form2);
                        var validate = $(form).validate({
                            errorElement: 'span', //default input error message container
                            errorClass: 'help-block', // default input error message class
                            focusInvalid: false, // do not focus the last invalid input
                            ignore: ":hidden",  // validate all fields including form hidden input,
                            debug: true,
                            rules: 
                            {
                                password:
                                {
                                    required: true
                                }   
                            },

                             
                            submitHandler: function (form) {
                                
                            }
                        }).form();
                        var $valid = $(form).valid();
                        if(!$valid) 
                        {                                                               
                            return false;
                        }
                        else
                        { 
                            Metronic.startPageLoading({animate: true});
                            $(form).ajaxSubmit({
                                type:'POST',
                                url:completeURL(url),
                                dataType:'json',
                                data: serialize_data,
                                success:function(data)
                                {   
                                    Metronic.stopPageLoading();
                                    if(data.valid)
                                    {
                                        $.toast({ text: data.msg, heading: '<b>Success</b>', icon: 'success', hideAfter:3000 });
                                        window.open(data.redirect, '_blank');
                                    } 
                                    else
                                    {
                                        $.toast({ text: data.msg, heading: '<b>Warning</b>', icon: 'error', hideAfter:3000 });
                                    }                                          
                                }
                            });
                        }                                         
                    }
                }
            }
        });
    });
    $(document).on('change','.get_batch_change_from',function(e){ 
        var from_batch_id = $('.from_batch_id').select2('val');
        var url= $(this).data('url');
        Metronic.startPageLoading({animate: true});
        $.ajax({
            type:'POST',
            url:completeURL(url),
            data:{from_batch_id:from_batch_id},
            dataType:'json',
            success:function(data)
            {      
                $('.append_div').html(data.view);
            },
            complete:function()
            {
                Metronic.stopPageLoading();
                $('select').select2();
                TableAdvanced.init();
            }
        }); 
        Metronic.stopPageLoading();
    });
    $(document).on('change','.get_batch_change_current',function(e){ 
        var current_batch_id = $('.current_batch_id').select2('val');
        var url= $(this).data('url');
        Metronic.startPageLoading({animate: true});
        $.ajax({
            type:'POST',
            url:completeURL(url),
            data:{current_batch_id:current_batch_id},
            dataType:'json',
            success:function(data)
            {      
                $('.append_div').html(data.view);
            },
            complete:function()
            {
                Metronic.stopPageLoading();
                $('select').select2();
                TableAdvanced.init();
            }
        }); 
        Metronic.stopPageLoading();
    });
    $(document).on('click','.get_batch_change',function(e){
        var batch_id = $('.batch_id').select2('val');
        var url = 'get_fees_report';
        Metronic.startPageLoading({animate: true});
        $.ajax({
            type:'POST',
            url:completeURL(url),
            data:{batch_id:batch_id},
            dataType:'html',
            success:function(data)
            {      
                $('.append_div').html(data);
            },
            complete:function()
            {
                Metronic.stopPageLoading();
                $('select').select2();
                TableAdvanced.init();
            }
        });
    });
    $(document).on('click','.getBatch',function(e){
        var batch_id = $('#srchBatch').select2('val');   
        var url= $(this).data('url');    
        Metronic.startPageLoading({animate: true});
        $.ajax({
            type:'POST',
            url:completeURL(url),
            data:{batch_id:batch_id},
            dataType:'html',
            success:function(data)
            {      
                $('.append_div').html(data);
            },
            complete:function()
            {
                Metronic.stopPageLoading();
                $('select').select2();
                TableAdvanced.init();
            }
        });
    });
    $(document).on('click','.selected_batch_id',function(e){            
        var id = $('.batch_id').select2('val');       
        var url= $(this).data('url');       
        Metronic.startPageLoading({animate: true});
        if(id)
        { 
            $.ajax({
                type:'POST',
                url:completeURL(url),
                data:{id:id},
                dataType:'json',
                success:function(data)
                {      
                    $('.append_div').html(data.view);
                },
                complete:function()
                {
                    Metronic.stopPageLoading();
                    $('select').select2();
                    TableAdvanced.init();
                }
            }); 
        }
        else
        {
            var msg = $(this).data('msg');
            $.toast({ text: msg, icon: 'info' });
        }
        Metronic.stopPageLoading();
    });
    $(document).on('change','.get_objective_questions_whr',function(e){
        var exam_type = $('.exam_type').select2('val');
        var course = $('.course').select2('val');
        var url= $(this).data('url');
        Metronic.startPageLoading({animate: true});
        $.ajax({
            type:'POST',
            url:completeURL(url),
            data:{exam_type:exam_type, course:course},
            dataType:'html',
            success:function(data)
            {     
            console.log('-----------response', data); 
                $('.append_div').html(data);
            },
            complete:function()
            {
                Metronic.stopPageLoading();
                $('select').select2();
                TableAdvanced.init();
            }
        });
    });
});

function changed(que,ans,tmarks) 
{
    var wrong=0;    
    window.diffType="diffWordsWithSpace";
    var diff = JsDiff[window.diffType](que,ans);
    var str = "";
    for (var i=0; i < diff.length; i++) {
        var node;
        var error= $.trim(diff[i].value);
        if (diff[i].removed) {
            var result1 = error.split(' ');
            for(var j = 0; j < result1.length; j++){                
                wrong=wrong+1;
            }
            node = '<del>' + diff[i].value + '</del>';
        } 
        else if (diff[i].added) {
            var lastword = str.split("<").pop();
            if(lastword!='/del>')
            {
                wrong=wrong+1;
            }
            node = '<ins>' + diff[i].value + '</ins>';
        } 
        else {
            node = diff[i].value;
        }
        str += node;
    }
    marks = tmarks-(wrong);
    if(marks <= 0)
    {
        marks=0;
    }
    return[marks, str];
}
function replce_file()
{
    var file_name = $('.file_name span').val();
    $('.file_name').val(data);
};
function completeURL(url)
{
    return $('base').attr('href')+url;
}