$(document).ready(function(){
    if (jQuery().datepicker) {
        $('.date-picker').datepicker({
            orientation: "right",
            autoclose: true
        });
    }
    $(document).on('click','.pay_objective_shop_order',function(e){
        var form = '#'+$(this).parents('form').attr('id');
        var error = $('.alert-danger', form);
        var success = $('.alert-success', form);
        $(form).validate({ 
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: ":hidden",  // validate all fields including form hidden input
            rules: { },
            
            invalidHandler: function (event, validator) { //display error alert on form submit              
                success.hide();
                error.show();
                $('html,body').animate({scrollTop:0});
            },
 
            errorPlacement: function (error, element) { // render error placement for each input type
                var icon = $(element).parent('.input-icon').children('i');
                icon.removeClass('fa-check').addClass("fa-warning");  
                icon.attr("data-original-title", error.text()).tooltip({'container': 'body'});
            },

            highlight: function (element) { // hightlight error inputs
                $(element).closest('.form-group').removeClass("has-success").addClass('has-error'); // set error class to the control group   
            },

            unhighlight: function (element) { // revert the change done by hightlight
                
            },

            success: function (label, element) {
                var icon = $(element).parent('.input-icon').children('i');
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
                icon.removeClass("fa-warning").addClass("fa-check");
            },
 
            submitHandler: function (form) {
                $('.pay_save').prop('disabled',true);
                //var pay_type = $('#pay_type').val();
                var pay_type = 'Online';
                if(pay_type=='Online')
                {
                    //$(form).attr('action',completeURL('save_online_pay'));
                    $(form).attr('action',completeURL('objective_book_online_order'));
                    form.submit();
                }
                /*else
                {   
                    alert('bye');         
                    var url = $(form).attr('action');
                    var serialize_data = $(form).serialize();
                    serialize_data = {id:id};
                    Metronic.startPageLoading({animate: true});
                    $(form).ajaxSubmit({
                        type:'POST',
                        url:completeURL('book_order'), 
                        dataType:'json',
                        data:serialize_data,
                        success:function(data)
                        {   
                            $('html, body').animate({scrollTop:0});
                            $('.pay_save').prop('disabled',false);
                            Metronic.stopPageLoading();
                            if(data.valid)
                            {  
                                bootbox.alert(data.msg, function() {
                                    window.location.href = data.redirect;
                                });   
                            }
                            else
                            {
                                bootbox.alert(data.msg, function() {
                                    setTimeout(function(){  
                                        //window.location.href = completeURL('fees');
                                    },2000);
                                });  
                            }    
                        }
                    });
                }*/
            }
        });
    });
    // $(document).on('click','.pay_gcc_tbc_shop_order',function(e){
    //     var form = '#'+$(this).parents('form').attr('id');
    //     var error = $('.alert-danger', form);
    //     var success = $('.alert-success', form);
    //     $(form).validate({ 
    //         errorElement: 'span', //default input error message container
    //         errorClass: 'help-block', // default input error message class
    //         focusInvalid: false, // do not focus the last invalid input
    //         ignore: ":hidden",  // validate all fields including form hidden input
    //         rules: { },
            
    //         invalidHandler: function (event, validator) { //display error alert on form submit              
    //             success.hide();
    //             error.show();
    //             $('html,body').animate({scrollTop:0});
    //         },
 
    //         errorPlacement: function (error, element) { // render error placement for each input type
    //             var icon = $(element).parent('.input-icon').children('i');
    //             icon.removeClass('fa-check').addClass("fa-warning");  
    //             icon.attr("data-original-title", error.text()).tooltip({'container': 'body'});
    //         },

    //         highlight: function (element) { // hightlight error inputs
    //             $(element).closest('.form-group').removeClass("has-success").addClass('has-error'); // set error class to the control group   
    //         },

    //         unhighlight: function (element) { // revert the change done by hightlight
                
    //         },

    //         success: function (label, element) {
    //             var icon = $(element).parent('.input-icon').children('i');
    //             $(element).closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
    //             icon.removeClass("fa-warning").addClass("fa-check");
    //         },
 
    //         submitHandler: function (form) {
    //             $('.pay_save').prop('disabled',true);
    //             var pay_type = 'Online';
    //             if(pay_type=='Online')
    //             {
    //                 $(form).attr('action',completeURL('gcc_tbc_book_online_order'));
    //                 form.submit();
    //             }
    //         }
    //     });
    // });
    $(document).on('click', '.pay_gcc_tbc_shop_order', function(e) {        
        var form = '#'+$(this).parents('form').attr('id');
        var error = $('.alert-danger', form);       
        var success = $('.alert-success', form);                
        
        $(form).validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: ":hidden", // validate all fields including form hidden input
            rules: {
            },      
         
            messages: {
            },     

            invalidHandler: function(event, validator) { //display error alert on form submit                            
                success.hide();
                error.show();
                $('html,body').animate({ scrollTop: 0 });
            },

            errorPlacement: function(error, element) { // render error placement for each input type
                var icon = $(element).parent('.input-icon').children('i');
                icon.removeClass('fa-check').addClass("fa-warning");
                icon.attr("data-original-title", error.text()).tooltip({ 'container': 'body' });
            },

            highlight: function(element) { // hightlight error inputs
                //alert($(element).attr('name'));
                $(element).closest('.form-group').removeClass("has-success").addClass('has-error'); // set error class to the control group   
            },

            unhighlight: function(element) { // revert the change done by hightlight

            },
 
            success: function(label, element) {
                var icon = $(element).parent('.input-icon').children('i');
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
                icon.removeClass("fa-warning").addClass("fa-check");
            },

            submitHandler: function(form) {
                $('.common_save').prop('disabled', true);
                var url = $(form).attr('action');
                var redirect = $(form).data('redirect');
                var serialize_data = $(form).serialize();
                Metronic.startPageLoading({animate: true});
                $(form).ajaxSubmit({
                    type: 'POST',
                    url: completeURL(url),
                    dataType: 'json',
                    data: serialize_data,
                    success: function(data) {			
                        if (data.state == true) {
                             Metronic.stopPageLoading();
                            $.toast({ text: data.msg, heading: '<b>Success</b>', icon: 'success' });
                            setTimeout(function() {
                                if(redirect)
                                {
                                    window.location.href = window.completeURL(redirect);
                                }
                                else
                                {
                                    window.location.href = window.location.href;
                                }
                            }, 2000);
                        } 
                    }
                });
            }       
        }); 
    });
    $(document).on('click','.min_stud',function(event){
       var stud_count = $(this).attr('rel');
        event.preventDefault();
        $.toast({ text: 'Please Add Atleast '+stud_count+' Students For Exam!', heading: '<b>Warning</b>', icon: 'error' });
    });
    $(document).on('click','.verify-password',function()
    {
        var download_id = $(this).data('url');
        var inst_code = $(this).data('code');
        var title= 'Login Password Verification';
        var dialog = bootbox.dialog({
            message: '<form rel="check_password" action="javascript:void(0);" id="popup_save" class="form-horizontal update" method="post"> <div class="form-body"> <div class="row"> <div class="col-md-12"> <div class="form-group"> <label class="control-label" style="padding-left: 11%;font-size: 15px;margin-bottom: 13px !important;font-weight:600;">Institute Code </label>  <div class="input-icon right" style="padding-left: 11%;padding-right: 12%;"> <i class="fa"></i> <input type="text" class="form-control" value='+inst_code+' readonly> </div> <div class="col-md-12"> <div class="form-group"> <label class="control-label" style="padding-left: 11%;font-size: 15px;margin-bottom: 13px !important;font-weight:600;">Enter Your Password </label>  <div class="input-icon right" style="padding-left: 11%;padding-right: 12%;"> <i class="fa"></i> <input type="password" class="form-control password" name="password" placeholder="Enter Password"> </div> </div> </div> </div> </div> </div> </form>',
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

    $(document).on('click','.pay_save',function(e){
        var form = '#'+$(this).parents('form').attr('id');
        var error = $('.alert-danger', form);
        var success = $('.alert-success', form);
        var id = $(this).attr('rel');

        $(form).validate({ 
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: ":hidden",  // validate all fields including form hidden input
            rules: {                
                cash_depositer_name:
                {
                    letterswithbasicpunc :true,
                    required:true
                },
                deposite_date:
                {
                    required:true
                },
                payment_mode:
                {
                    required:true
                },
                stud_count:
                {
                    min:1
                },
                paid_amount:
                {
                    min:1
                },
                dd_number:
                {
                    required:true
                },
                utr_number:
                {
                    required:true
                }
            }, 
            
            invalidHandler: function (event, validator) { //display error alert on form submit              
                success.hide();
                error.show();
                $('html,body').animate({scrollTop:0});
            },
 
            errorPlacement: function (error, element) { // render error placement for each input type
                var icon = $(element).parent('.input-icon').children('i');
                icon.removeClass('fa-check').addClass("fa-warning");  
                icon.attr("data-original-title", error.text()).tooltip({'container': 'body'});
            },

            highlight: function (element) { // hightlight error inputs
                $(element).closest('.form-group').removeClass("has-success").addClass('has-error'); // set error class to the control group   
            },

            unhighlight: function (element) { // revert the change done by hightlight
                
            },

            success: function (label, element) {
                var icon = $(element).parent('.input-icon').children('i');
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
                icon.removeClass("fa-warning").addClass("fa-check");
            },
 
            submitHandler: function (form) {
                $('.pay_save').prop('disabled',true);
                var pay_type = $('#pay_type').val();
                if(pay_type=='Online')
                {
                     $(form).attr('action',completeURL('save_online_pay'));
                    form.submit();
                }
                else
                {   
                    // alert('bye');         
                    var url = $(form).attr('action');
                    var serialize_data = $(form).serialize();
                    serialize_data = {id:id};
                    Metronic.startPageLoading({animate: true});
                    $(form).ajaxSubmit({
                        type:'POST',
                        url:completeURL(url), 
                        dataType:'json',
                        data:serialize_data,
                        success:function(data)
                        {   
                            $('html, body').animate({scrollTop:0});
                            $('.pay_save').prop('disabled',false);
                            Metronic.stopPageLoading();
                            if(data.valid)
                            {  
                                bootbox.alert(data.msg, function() {
                                    window.location.href = data.redirect;
                                });   
                            }
                            else
                            {
                                bootbox.alert(data.msg, function() {
                                    setTimeout(function(){  
                                        window.location.href = completeURL('fees');
                                    },2000);
                                });  
                            }    
                        }
                    });
                }
            }
        });
    });

    $(document).on('click', '.student_save', function(e) {
        var form = '#' + $(this).parents('form').attr('id');
        var error = $('.alert-danger', form);
        var success = $('.alert-success', form);
        var id = $(this).attr('rel');
        var pk = $(this).data('pk');
        $(form).validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: ":hidden", // validate all fields including form hidden input
            rules: {
                surname:{letterswithbasicpunc :true, required:true},
                first_name:{letterswithbasicpunc :true, required:true},
                father_name:{letterswithbasicpunc :true/*, required:true*/},
                mother_name:{letterswithbasicpunc :true, required:true},
                gender:{required:true},
                handicapped:{required:true},
                mobile_no:{number:true, minlength:10, maxlength:12, required:true},
                email:{email:true, required:true},
                permenant_address:{required:true},
                residential_address:{required:true},
                district_id:{required:true},
                school_college_name:{required:true},
                qualification:{required:true},
                payment_type:{required:true},
                //photo_identity:{required:true},
                //aadhar_card_no:{number:true, minlength:12, maxlength:12, required:true},
                date_of_birth:{required:true},
                date_of_admission:{required:true},
                "course_master_id[]":{required:true} 
            },

            invalidHandler: function(event, validator) { //display error alert on form submit 
                console.log(error);
                success.hide();
                error.show();
                $('html,body').animate({ scrollTop: 0 });
            },

            errorPlacement: function(error, element) { // render error placement for each input type
                var icon = $(element).parent('.input-icon').children('i');
                icon.removeClass('fa-check').addClass("fa-warning");
                icon.attr("data-original-title", error.text()).tooltip({ 'container': 'body' });
            },

            highlight: function(element) { // hightlight error inputs
                //alert($(element).attr('name'));
                $(element).closest('.form-group').removeClass("has-success").addClass('has-error'); // set error class to the control group   
            },

            unhighlight: function(element) { // revert the change done by hightlight

            },

            success: function(label, element) {
                var icon = $(element).parent('.input-icon').children('i');
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
                icon.removeClass("fa-warning").addClass("fa-check");
            },

            submitHandler: function(form) {
                /*alert();*/
                $('.student_save').prop('disabled', true);
                var url = $(form).attr('action');
                var apikey = $(form).data('apikey');
                var redirect = $(form).data('redirect');
                var serialize_data = $(form).serialize();
                serialize_data = {id:id};
                $(form).ajaxSubmit({
                    type: 'POST',
                    headers: {
                        "x-api-key": apikey
                    },
                    url: completeURL(url),
                    dataType: 'json',
                    data: serialize_data,
                    success: function(data) {
                        // console.log(data.state);
                        if (data.state == true) {
                            $.toast({ text: data.msg, heading: '<b>Success</b>', icon: 'success' });
                            setTimeout(function() {
                                if(redirect)
                                {
                                    window.location.href = window.completeURL(redirect);
                                }
                                else
                                {
                                    window.location.href = window.location.href;
                                }
                            }, 2000);
                        } else {
                            $.toast({ text: data.msg, heading: '<b>Warning</b>', icon: 'error' });
                            $('.student_save').prop('disabled', false);
                        }
                    }
                });
            }
        });
    });

    if (jQuery().datepicker) {
        $('.date-picker').datepicker({
            orientation: "right",
            autoclose: true
        });
    }
     $(document).on('click','.block',function(event){
        event.preventDefault();
        bootbox.alert('<div class="alert modify alert-info">This link Temporary Unavailable</div>');
    }); 

    $(document).on('click','.book_block',function(event){
        event.preventDefault();
        bootbox.alert('<div class="alert modify alert-info">वेब साईट मेन्टेंनन्स चालु असल्यामुळे ऑबजेक्टिव पुस्तकांची ऑर्डर दि. १७.१०.२०१९ रोजी दुपारी १ वाजेपर्यंत बंद राहील.</div>');
    });

    $(document).on('change','.role_configuration',function(){    
        var id = $(this).val();
        Metronic.startPageLoading({animate: true});
        $.ajax({
            type:'POST',
            url:completeURL('fetch_role_config'),
            data:{id:id},
            dataType:'json', 
            success:function(data) 
            {             
                $('.prevelege_data').html(data.view);
            },
            complete:function()
            {
                Metronic.stopPageLoading();
                Metronic.init(); // init metronic core components
                Layout.init(); // init current layout
            }
        }); 
    });
    $(document).on('change','.category_select_all',function(){
       if($(this).is(":checked"))
       {
            $(this).parents('.panel-collapse').find('.portlet-body input[type=checkbox]').each(function( index ) {
                $(this).prop('checked', true); 
            });
       }else
       {
            $(this).parents('.panel-collapse').find('.portlet-body').find('input[type=checkbox]').prop('checked', false);
       }
       $.uniform.update();
    });
    
    // $(document).on('click', '.common_save', function(e) {        
    //     var form = '#'+$(this).parents('form').attr('id');
    //     var error = $('.alert-danger', form);	    
    //     var success = $('.alert-success', form);	    
    //     var id = $(this).attr('rel');	    
    //     var pk = $(this).data('pk');                             
        
    //     $(form).validate({
    //         errorElement: 'span', //default input error message container
    //         errorClass: 'help-block', // default input error message class
    //         focusInvalid: false, // do not focus the last invalid input
    //         ignore: ":hidden", // validate all fields including form hidden input
    //         rules: {
    //             contact_name:{required: true },
    //             mail: {required: true, email:true },
    //             number: {number:true, minlength:10, maxlength:12, required:true},
    //             contact_type:{required:true},
    //             msg: {required: true },
    //             confirm_pass:   
    //             {                                            
    //                 required: true,
    //                 equalTo: "#user_pass"                                                               
    //             },
    //             company_name:{required:true},
    //             symbol:{required:true},
    //             company_id:{required:true},
    //             type:{required:true},
    //             share_type_id:{required:true},
    //             target:{required:true},
    //             contact_name:{required:true},
    //             contact_mail:{required:true},
    //             contact_number:{number:true, minlength:10, maxlength:12, required:true},
    //             contact_msg:{required:true},
    //             // inst_name:{letterswithbasicpunc :true, required:true},
    //             // inst_code:{required:true, number:true, maxlength:5, minlength:5},
    //             // owner_name:{letterswithbasicpunc :true, required:true},
    //             owner_qualification:{required:true},
    //             principal_name:{required:true},
    //             principal_qualification:{required:true},
    //             contact_no:{required:true},
    //             email:{email:true, required:true},
    //             address:{required:true},
    //             inst_district:{required:true},
    //             taluka:{required:true},
    //             pincode:{number:true, minlength:6, maxlength:6, required:true},
    //             inst_reg_date:{required:true},
    //             surname:{letterswithbasicpunc :true, required:true},
    //             first_name:{letterswithbasicpunc :true, required:true},
    //             father_name:{letterswithbasicpunc :true, required:true},
    //             mother_name:{letterswithbasicpunc :true, required:true},
    //             gender:{required:true},
    //             handicapped:{required:true},
    //             mobile:{number:true, minlength:10, maxlength:12, required:true},
    //             permanent_address:{required:true},
    //             residential_address:{required:true},
    //             inst_district:{required:true},
    //             college:{required:true},
    //             stud_photo_identity:{required:true},
    //             aadhar_no:{number:true, minlength:12, maxlength:12, required:true},
    //             stud_course:{required:true},    
    //             admission_date:{required:true},
    //             stud_qualification:{required:true},
    //             role_id:{required:true},
    //             fullname:{required:true},
    //             username:{required:true},
    //             password:{required:true, minlength:6},
    //             city:{required:true},
    //             role_name:{required:true},
    //             role_desc:{required:true},
    //             course_name:{required:true},
    //             course_desc:{required:true},
    //             faq_topic_id:{required:true},
    //             question_name:{required:true},
    //             answer:{required:true},
    //             faq_topic_name:{required:true},
    //             faq_topic_description:{required:true},
    //             course_master_id:{required:true},
    //             exam_type:{required:true},
    //             to:{required:true, email:true },
    //             cc:{required:true, email:true },
    //             bcc:{required:true, email:true },
    //             subject:{required:true},
    //             message:{required:true},
    //             attachment1:{required:true},
    //             attachment2:{required:true},
    //             name:{required:true},
    //             product_name:{required:true},
    //             category_id:{required:true},
    //             short_description:{required:true},
    //             delivery_information:{required:true},
    //             product_price:{required:true, number:true},
    //             product_discount:{required:true, number:true},
    //             selling_prices:{required:true},
    //             district_name:{required:true},
    //             code:{required:true, number:true, minlength:3, maxlength:5},
    //             gr_master_title:{required:true},
    //             menu_id:{required:true},
    //             submenu_name:{required:true},
    //             icon:{required:true},
    //             action:{required:true},
    //             menu_name:{required:true},
    //             batch_id:{required:true},
    //             minimum_student:{number:true,required:true},
    //             maximum_student:{number:true,required:true},
    //             minimum_fees:{number:true,required:true},
    //             maximum_fees:{number:true,required:true},
		  //      constant:{required:true, minlength:1,maxlength:10,pattern:/^[A-Z]+$/},
		  //      title:{required:true, minlength:2,maxlength:80,pattern:/^([A-Za-z0-9][A-Za-z0-9\&\(\)\\\-\_\;\'\:\"\[\]\{\}\,\.\/\<\>\|\s]{1,79})$/},
		  //      description:{required:true, minlength:2,maxlength:200},
		  //      transaction_no:{required:true},                
		  //      fees_exemption_id:{required: true},
    //             name_of_orgnisation:{required: true,minlength:2,maxlength:200,pattern:/^([A-Za-z0-9][A-Za-z0-9\&\(\)\\\-\_\;\'\:\"\[\]\{\}\,\.\/\<\>\|\s]{1,79})$/},
    //             mobile_no:{required:true, minlength:1,maxlength:10,pattern:/^[4-9][\d]{9}$/},
    //             website:{required:true}
    //         },      
	     
    //         messages: {
    //             constant: {
    //                 required: "<li>Constant is Required.</li>",
    //                 minlength: "<li>Constant at Least 1 A-Z Character.</li>",
    //                 maxlength: "<li>Constant should not have more than 10 A-Z Characters.</li>",
    //                 pattern:  "<li>Constant should have only capital letters and no space are allowed</li>"
    //             },
		  //      title: {
			 //       required: "<li>Title is Required.</li>",
    //                 minlength: "<li>Min 2 char required in title.</li>",
    //                 maxlength: "<li>Max 80 char allowed in title.</li>",
    //                 pattern:  "<li>Title should have alphanumeric and special char & ( ) \ - _ ; :  [ ] { }  , . / <  > | space allowed,single quote allowed,double quote allowed.</li>"
    //             },
		  //      description: {
				//     required: "<li>Description is Required.</li>",
    //                 minlength: "<li>Min 2 char required in description.</li>",
    //                 maxlength: "<li>Max 200 char allowed in description.</li>"
    //             },
		  //      transaction_no: {
				// 	required: "<li>Transaction Number is Required.</li>"
		  //      },
		  //      fees_exemption_id: {
				// 	required: "<li>Fees Exemption is Required.</li>"
		  //      },
    //             name_of_orgnisation:{
    //                 required: "<li>Name Of Organization Is Required.</li>",
    //                 minlength: "<li>Min 2 Char Allowed For Name Of Organization.</li>",
    //                 maxlength: "<li>Max 200 Char Allowed For Name Of Organization.</li>",
    //                 pattern:  "<li>Name Of Organization Should Have Alphanumeric And Special Char & ( ) \ - _ ; :  [ ] { }  , . / <  > | Space Allowed,Single Quote Allowed.</li>"
    //             },
    //             mobile_no:{
    //                 required: "<li>Mobile Number Is Required.</li>",
    //                 minlength: "<li>Min 2 Numbers Allowed For Mobile Number.</li>",
    //                 maxlength: "<li>Max 10 Numbers Allowed For Mobile Number.</li>",
    //                 pattern:  "<li>Only Numbers Are Allowed in Mobile Number.</li>"
    //             },
    //             website:{
    //                 required: "<li>Website Is Required.</li>" 
    //             }	       
                       
    //         },     

    //         invalidHandler: function(event, validator) { //display error alert on form submit		                     
    //             success.hide();
    //             error.show();
    //             $('html,body').animate({ scrollTop: 0 });
    //         },

    //         errorPlacement: function(error, element) { // render error placement for each input type
    //             var icon = $(element).parent('.input-icon').children('i');
    //             icon.removeClass('fa-check').addClass("fa-warning");
    //             icon.attr("data-original-title", error.text()).tooltip({ 'container': 'body' });
    //         },

    //         highlight: function(element) { // hightlight error inputs
    //             //alert($(element).attr('name'));
    //             $(element).closest('.form-group').removeClass("has-success").addClass('has-error'); // set error class to the control group   
    //         },

    //         unhighlight: function(element) { // revert the change done by hightlight

    //         },
 
    //         success: function(label, element) {
    //             var icon = $(element).parent('.input-icon').children('i');
    //             $(element).closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
    //             icon.removeClass("fa-warning").addClass("fa-check");
    //         },

    //         submitHandler: function(form) {
    //             $('.common_save').prop('disabled', true);
    //             var url = $(form).attr('action');
    //             var apikey = $(form).data('apikey');
    //             var redirect = $(form).data('redirect');
    //             var serialize_data = $(form).serialize();
    //             serialize_data = {id:id};		
    //             Metronic.startPageLoading({animate: true});
    //             $(form).ajaxSubmit({
    //                 type: 'POST',
    //                 headers: {
    //                     "x-api-key": apikey
    //                 },
    //                 url: completeURL(url),
    //                 dataType: 'json',
    //                 data: serialize_data,
    //                 success: function(data) {
                        		
    //                     if (data.state == true) {
    //                          Metronic.stopPageLoading();
    //                         $.toast({ text: data.msg, heading: '<b>Success</b>', icon: 'success' });
    //                         setTimeout(function() {
    //                             if(redirect)
    //                             {
    //                                 window.location.href = window.completeURL(redirect);
    //                             }
    //                             else
    //                             {
    //                                 window.location.href = window.location.href;
    //                             }
    //                         }, 2000);
    //                     } else {
    //                         if(data.isRestore=='yes'){

    //                             $("#confirmRestore").modal('show');
    //                             let tblName = data.tblName;
    //                             let restoreUrl = 'restore-exist-record';
    //                             $("#restore").click(function(){
    //                                 $.ajax({
    //                                     type: 'POST',
    //                                     headers: {
    //                                         "x-api-key": apikey
    //                                     },
    //                                     url: completeURL(restoreUrl),
    //                                     dataType: 'json',
    //                                     data: {tblName:data.tblName,primaryKeyColumns:data.primaryKeyColumns,value:data.existId},
    //                                     success: function(res) {
                                           
    //                                      if (res.state == true) {
    //                                          $.toast({ text: res.msg, heading: '<b>Success</b>', icon: 'success' });
    //                                          $('#confirmRestore').modal('hide');
    //                                          window.location.href = window.completeURL(redirect);
    //                                      }else{
    //                                         $.toast({ text: res.msg, heading: '<b>Danger</b>', icon: 'error' });

                                           
    //                                      }
    //                                     }
    //                                 });
                                   

    //                             });
    //                             $('#noRestore').click(function(){
    //                                 window.location.href = window.completeURL(redirect);
    //                             });
    //                         }
    //                         $('.common_save').prop('disabled', false);
    //                     }
    //                 }
    //             });
    //         }	    
    //     });	
    // });
    $(document).on('click', '.common_save', function(e) {        
        var form = '#'+$(this).parents('form').attr('id');
        var error = $('.alert-danger', form);	    
        var success = $('.alert-success', form);	    
        var id = $(this).attr('rel');	    
        var pk = $(this).data('pk');                             
        
        $(form).validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: ":hidden", // validate all fields including form hidden input
            rules: {
                contact_name:{required: true },
                mail: {required: true, email:true },
                number: {number:true, minlength:10, maxlength:12, required:true},
                contact_type:{required:true},
                msg: {required: true },
                confirm_pass:   
                {                                            
                    required: true,
                    equalTo: "#user_pass"                                                               
                },
                company_name:{required:true},
                symbol:{required:true},
                company_id:{required:true},
                type:{required:true},
                share_type_id:{required:true},
                target:{required:true},
                contact_name:{required:true},
                contact_mail:{required:true},
                contact_number:{number:true, minlength:10, maxlength:12, required:true},
                contact_msg:{required:true},
                // inst_name:{letterswithbasicpunc :true, required:true},
                // inst_code:{required:true, number:true, maxlength:5, minlength:5},
                // owner_name:{letterswithbasicpunc :true, required:true},
                owner_qualification:{required:true},
                principal_name:{required:true},
                principal_qualification:{required:true},
                contact_no:{required:true},
                email:{email:true, required:true},
                address:{required:true},
                inst_district:{required:true},
                taluka:{required:true},
                pincode:{number:true, minlength:6, maxlength:6, required:true},
                inst_reg_date:{required:true},
                surname:{letterswithbasicpunc :true, required:true},
                first_name:{letterswithbasicpunc :true, required:true},
                father_name:{letterswithbasicpunc :true, required:true},
                mother_name:{letterswithbasicpunc :true, required:true},
                gender:{required:true},
                handicapped:{required:true},
                mobile:{number:true, minlength:10, maxlength:12, required:true},
                permanent_address:{required:true},
                residential_address:{required:true},
                inst_district:{required:true},
                college:{required:true},
                stud_photo_identity:{required:true},
                aadhar_no:{number:true, minlength:12, maxlength:12, required:true},
                stud_course:{required:true},    
                admission_date:{required:true},
                stud_qualification:{required:true},
                role_id:{required:true},
                fullname:{required:true},
                username:{required:true},
                password:{required:true, minlength:6},
                city:{required:true},
                role_name:{required:true},
                role_desc:{required:true},
                course_name:{required:true},
                course_desc:{required:true},
                faq_topic_id:{required:true},
                question_name:{required:true},
                answer:{required:true},
                faq_topic_name:{required:true},
                faq_topic_description:{required:true},
                course_master_id:{required:true},
                exam_type:{required:true},
                to:{required:true, email:true },
                cc:{required:true, email:true },
                bcc:{required:true, email:true },
                subject:{required:true},
                message:{required:true},
                attachment1:{required:true},
                attachment2:{required:true},
                name:{required:true},
                product_name:{required:true},
                category_id:{required:true},
                short_description:{required:true},
                delivery_information:{required:true},
                product_price:{required:true, number:true},
                product_discount:{required:true, number:true},
                selling_prices:{required:true},
                district_name:{required:true},
                code:{required:true, number:true, minlength:3, maxlength:5},
                gr_master_title:{required:true},
                menu_id:{required:true},
                submenu_name:{required:true},
                icon:{required:true},
                action:{required:true},
                menu_name:{required:true},
                batch_id:{required:true},
                minimum_student:{number:true,required:true},
                maximum_student:{number:true,required:true},
                minimum_fees:{number:true,required:true},
                maximum_fees:{number:true,required:true},
		        constant:{required:true, minlength:1,maxlength:10,pattern:/^[A-Z]+$/},
		        title:{required:true, minlength:2,maxlength:80,pattern:/^([A-Za-z0-9][A-Za-z0-9\&\(\)\\\-\_\;\'\:\"\[\]\{\}\,\.\/\<\>\|\s]{1,79})$/},
		        description:{required:true, minlength:2,maxlength:200},
		        transaction_no:{required:true},                
		        fees_exemption_id:{required: true},
                name_of_orgnisation:{required: true,minlength:2,maxlength:200,pattern:/^([A-Za-z0-9][A-Za-z0-9\&\(\)\\\-\_\;\'\:\"\[\]\{\}\,\.\/\<\>\|\s]{1,79})$/},
                mobile_no:{required:true, minlength:1,maxlength:10,pattern:/^[4-9][\d]{9}$/},
                website:{required:true}
            },      
	     
            messages: {
                constant: {
                    required: "<li>Constant is Required.</li>",
                    minlength: "<li>Constant at Least 1 A-Z Character.</li>",
                    maxlength: "<li>Constant should not have more than 10 A-Z Characters.</li>",
                    pattern:  "<li>Constant should have only capital letters and no space are allowed</li>"
                },
		        title: {
			        required: "<li>Title is Required.</li>",
                    minlength: "<li>Min 2 char required in title.</li>",
                    maxlength: "<li>Max 80 char allowed in title.</li>",
                    pattern:  "<li>Title should have alphanumeric and special char & ( ) \ - _ ; :  [ ] { }  , . / <  > | space allowed,single quote allowed,double quote allowed.</li>"
                },
		        description: {
				    required: "<li>Description is Required.</li>",
                    minlength: "<li>Min 2 char required in description.</li>",
                    maxlength: "<li>Max 200 char allowed in description.</li>"
                },
		        transaction_no: {
					required: "<li>Transaction Number is Required.</li>"
		        },
		        fees_exemption_id: {
					required: "<li>Fees Exemption is Required.</li>"
		        },
                name_of_orgnisation:{
                    required: "<li>Name Of Organization Is Required.</li>",
                    minlength: "<li>Min 2 Char Allowed For Name Of Organization.</li>",
                    maxlength: "<li>Max 200 Char Allowed For Name Of Organization.</li>",
                    pattern:  "<li>Name Of Organization Should Have Alphanumeric And Special Char & ( ) \ - _ ; :  [ ] { }  , . / <  > | Space Allowed,Single Quote Allowed.</li>"
                },
                mobile_no:{
                    required: "<li>Mobile Number Is Required.</li>",
                    minlength: "<li>Min 2 Numbers Allowed For Mobile Number.</li>",
                    maxlength: "<li>Max 10 Numbers Allowed For Mobile Number.</li>",
                    pattern:  "<li>Only Numbers Are Allowed in Mobile Number.</li>"
                },
                website:{
                    required: "<li>Website Is Required.</li>" 
                }	       
                       
            },     

            invalidHandler: function(event, validator) { //display error alert on form submit		                     
                success.hide();
                error.show();
                $('html,body').animate({ scrollTop: 0 });
            },

            errorPlacement: function(error, element) { // render error placement for each input type
                var icon = $(element).parent('.input-icon').children('i');
                icon.removeClass('fa-check').addClass("fa-warning");
                icon.attr("data-original-title", error.text()).tooltip({ 'container': 'body' });
            },

            highlight: function(element) { // hightlight error inputs
                //alert($(element).attr('name'));
                $(element).closest('.form-group').removeClass("has-success").addClass('has-error'); // set error class to the control group   
            },

            unhighlight: function(element) { // revert the change done by hightlight

            },
 
            success: function(label, element) {
                var icon = $(element).parent('.input-icon').children('i');
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success'); // set success class to the control group
                icon.removeClass("fa-warning").addClass("fa-check");
            },

            submitHandler: function(form) {
                $('.common_save').prop('disabled', true);
                var url = $(form).attr('action');
                var apikey = $(form).data('apikey');
                var redirect = $(form).data('redirect');
                var serialize_data = $(form).serialize();
                serialize_data = {id:id};		
                Metronic.startPageLoading({animate: true});
                $(form).ajaxSubmit({
                    type: 'POST',
                    headers: {
                        "x-api-key": apikey
                    },
                    url: completeURL(url),
                    dataType: 'json',
                    data: serialize_data,
                    success: function(data) {			
                        if (data.state == true) {
                             Metronic.stopPageLoading();
                            $.toast({ text: data.msg, heading: '<b>Success</b>', icon: 'success' });
                            setTimeout(function() {
                                if(redirect)
                                {
                                    window.location.href = window.completeURL(redirect);
                                }
                                else
                                {
                                    window.location.href = window.location.href;
                                }
                            }, 2000);
                        } else {
                            $.toast({ text: data.msg, heading: '<b>Warning</b>', icon: 'error' });
                            $('.common_save').prop('disabled', false);
                        }
                    }
                });
            }	    
        });	
    });
    $(document).on('click','.chk_login',function(e){
        e.preventDefault();
        var this1 = $(this);
        $('.alert-success').show(); 
        var form = '#'+$(this).closest('form').attr('id');
        $('.chk_login').prop('disabled',true);
        var url = $(form).attr('action');
        var serialize_data = $(form).serialize();
        // alert(serialize_data);
        $.ajax({
            type:'POST',
            url:completeURL(url), 
            dataType:'json',
            data:serialize_data,
            success:function(data)
            {   
                if (data.valid)
                {
                    if(data.redirect)
                    {
                        document.location.href = data.redirect;
                    }
                    else
                    {
                        document.location.href = document.location.href;
                    }
                }
                else
                {
                    this1.closest('form').find('.alert-success').hide();
                    this1.closest('form').find('.alert-danger').html(data.msg).show();  
                    this1.closest('form').find('.alert-danger').fadeOut(3500);   
                    this1.closest('form').find('.password').val('');              
                }                                      
                $('.chk_login').prop('disabled',false);
            }
        });
    });

    $(document).on('click','.popup_save',function(){            
        var id = $(this).attr('rel');
        var url = $(this).attr('rev');
        var title= $(this).data('title');
        title='<span class="caption-subject font-red-haze bold uppercase">'+title+'</span>';
        var data={id:id};               
        $.ajax({
            url:completeURL(url), 
            data:data,          
            type:'POST',  
            dataType:'json',
            success: function(data)
            {                  
                var dialog = bootbox.dialog({
                    message: data.view,
                    title: title, 
                    buttons: { 
                        danger: {
                            label: "Cancel",
                            className: "btn-danger",
                            callback: function() { }
                        }, 
                        success: {                            
                            label: "Submit",
                            className: "btn-success",
                            callback: function() {
                                var form= '#popup_save';
                                var url = $(form).attr('action');
                                var serialize_data = $(form).serialize();
                                serialize_data = {serialize_data:serialize_data,id:id};
                                var form2 = $(form);
                                var error2 = $('.alert-danger', form2);
                                var success2 = $('.alert-success', form2); 
                                Metronic.startPageLoading({animate: true});                               
                                var validate = $(form).validate({
                                    errorElement: 'span', 
                                    errorClass: 'help-block', 
                                    focusInvalid: false, 
                                    ignore: ":hidden",  
                                    debug: true,
                                    rules: {
                                        category_name: {required: true },
                                        category_desc: {required: true },
                                        category_about: {required: true },
                                        reply: {required: true },
                                        price:{required:true},
                                        category_id: {required: true },
                                        sc_name: {required: true },
                                        sc_desc: {required: true },
                                        city_name: {required: true },
                                        city_desc: {required: true },
                                        testimonial_name: {required: true },
                                        testimonial_desc: {required: true },
                                        sup_cat_name: {required: true },
                                        sup_cat_desc: {required: true },
                                        category_id:{required: true},
                                        question:{required: true},
                                        client_name:{required:true},
                                        answer:{required:true},
                                        email:{required:true},
                                        greet_file:{required:true},
                                        subject:{required:true},
                                        name:{required:true},
                                        mobile:{required:true},
                                        address:{required:true},
                                        city:{required:true},
                                        pincode:{required:true},
                                        home:{required:true}
                                    },

                                    invalidHandler: function (event, validator) { 
                                        success2.hide();
                                        error2.show();
                                       $('html, body').animate({scrollTop:0});
                                    },

                                    errorPlacement: function (error, element) { 
                                        var icon = $(element).parent('.input-icon').children('i');
                                        icon.removeClass('fa-check').addClass("fa-warning");  
                                        icon.attr("data-original-title", error.text()).tooltip({'container': 'body'});
                                    }, 

                                    highlight: function (element) { 
                                        $(element).closest('.form-group').removeClass("has-success").addClass('has-error'); 
                                    },

                                    unhighlight: function (element) {
                                        $(element).closest('.form-group').removeClass('has-error'); 
                                    },

                                    success: function (label, element) {                                                                                                                        
                                        var icon = $(element).parent('.input-icon').children('i');
                                        $(element).closest('.form-group').removeClass('has-error').addClass('has-success'); 
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
                                    $(form).ajaxSubmit({
                                        type:'POST',
                                        url:completeURL(url), 
                                        dataType:'json',
                                        data: serialize_data,
                                        success:function(data)
                                        {                                              
                                            if (data.state == true) 
                                            {
                                                Metronic.stopPageLoading();
                                                $.toast({ text: data.msg, heading: '<b>Success</b>', icon: 'success' });
                                                setTimeout(function() {
                                                    window.location.href = window.location.href;
                                                }, 2000);
                                            } else {
                                                $.toast({ text: data.msg, heading: '<b>Warning</b>', icon: 'error' });
                                            }
                                            // if(data.redirect)
                                            // {
                                            //     bootbox.alert(data.msg, function() {
                                            //         setTimeout(function(){
                                            //             document.location.href=data.redirect;                                
                                            //         },1500);
                                            //     });
                                            // }
                                            // else
                                            // {
                                            //     bootbox.alert(data.msg, function() {
                                            //         setTimeout(function(){
                                            //             document.location.href=document.location.href;                                
                                            //         },1500);
                                            //     });  
                                            // }                                      
                                        }
                                    });
                                }                                         
                            }
                        }
                    }
                });
            },
            complete:function()
            {   
                Metronic.init();
                ComponentsPickers.init();
                if (jQuery().datepicker) {
                    $(".date-picker").datepicker( {
                        format: "d-m-yyyy",
                        viewMode: "months", 
                        minViewMode: "months",
                        autoclose: true
                    });
                    $(".date-picker1").datepicker( {
                        format: "yyyy",
                        viewMode: "years", 
                        minViewMode: "years",
                        autoclose: true
                    });
                }
            }
        }); 
    });

    $(document).on('click','.editRecord', function(){
        var id = $(this).attr('rel');
        var url = $(this).attr('rev');

        $.ajax({
            url : completeURL(url),
            type : 'POST',
            dataType : 'html',
            data:{id:id},
            success:function(data)
            {          
                $('html, body').animate({scrollTop:0});
                $('.form').html($(data).find('.form').html());
            }
        }); 
    });

    $(document).on('click','.deleteRecord' , function(){
        var deleteDiv = $(this);
        bootbox.confirm("Are you sure?", function(result) {
            if(result)
            {
                var id = deleteDiv.attr('rel');
                var url = deleteDiv.attr('rev');
                
                $.ajax({
                    url : completeURL(url),
                    type:'POST',
                    dataType:'json',
                    data:{id:id},
                    headers: {
                        "x-api-key": "5681648d-91d6-4371-a911-1497734d0016"
                    },
                    success:function(data)
                    {
                        bootbox.alert(data.msg, function() {
                            setTimeout(function(){
                                document.location.href=document.location.href;                                
                            },1500);
                        });
                    }
                });
            }
        }); 
    });
    
     $(document).on('click', '.delete_record', function() 
    {         
        var deleteDiv = $(this);
        bootbox.confirm("Are you sure?", function(result) 
        {
            if (result) {
                var url = deleteDiv.attr('rev');
                $.ajax({
                    url: completeURL(url),                    
                    type: 'DELETE',
                    dataType: 'json',
                    headers: {
                        "x-api-key": "5681648d-91d6-4371-a911-1497734d0016"
                    },
                    success: function(data) {
                        if (data.state == true) {
                            $.toast({ text: data.msg, heading: '<b>Success</b>', icon: 'success' });
                            setTimeout(function() {
                                window.location.href = window.location.href;
                            }, 2000);
                        } else {
                            $.toast({ text: data.msg, heading: '<b>Warning</b>', icon: 'error' });
                        }
                    }
                });
            }
        });
    });

    $(document).on('click', '.update_record', function() 
    {         
        var deleteDiv = $(this);
        bootbox.confirm("Are you sure?", function(result) 
        {
            if (result) {
                var id = deleteDiv.attr('rel');
                var pk = $(".tbl_action").data('col');
                var url = deleteDiv.attr('rev');
                Metronic.startPageLoading({animate: true});
                $.ajax({
                    url: completeURL(url),                    
                    type: 'POST',
                    dataType: 'json',
                    data: pk + '=' + id,
                    headers: {
                        "x-api-key": "5681648d-91d6-4371-a911-1497734d0016"
                    },
                    success: function(data) {
                        Metronic.stopPageLoading();
                        if (data.state == true) {
                            $.toast({ text: data.msg, heading: '<b>Success</b>', icon: 'success' });
                            setTimeout(function() {
                                window.location.href = window.location.href;
                            }, 2000);
                        } else {
                            $.toast({ text: data.msg, heading: '<b>Warning</b>', icon: 'error' });
                        }
                    }
                });
            }
        });
    });

    
    $(document).on('change', '.upload_image', function(){
        var url = $('.upload_image').data('url');        
        var property = document.getElementById("file").files[0];
        var image_name = property.name;
        var image_extension = image_name.split('.').pop().toLowerCase();
        var image_size = property.size;
        var invalidformat = false;
        var maxFileSize = false;
        if(jQuery.inArray(image_extension, ['png','jpg','jpge','jpeg']) == -1)
        {          
            $('.img_error').html('<lable class="text-danger">Invalid File format!</lable>');
            invalidformat = true;
        }
        if(image_size > 2000000)
        {
            $('.img_error').html('<lable class="text-danger">File size is only upto 2MB!</lable>');
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
                /*beforeSend:function(){
                    $('.process').html('<br><lable class="text-success">Image Uploading...</lable>');
                },*/
                success:function(data)
                {
                    $('.uploaded_image').html(data);
                    setTimeout(replce_image, 50);
                    $('.upload_button').html('Change');
                }
            });
        }
    });

    $(document).on('change', '.upload_logo_image', function(){
        var url = $('.upload_logo_image').data('url');
        console.log(url);
        var property = document.getElementById("file").files[0];
        var image_name = property.name;
        var image_extension = image_name.split('.').pop().toLowerCase();
        var image_size = property.size;
        var invalidformat = false;
        var maxFileSize = false;
        if(jQuery.inArray(image_extension, ['png','jpg','jpge','jpeg']) == -1)
        {          
            $('.img_error1').html('<lable class="text-danger">Invalid File format!</lable>');
            invalidformat = true;
        }
        if(image_size > 2000000)
        {
            $('.img_error1').html('<lable class="text-danger">File size is only upto 2MB!</lable>');
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
                /*beforeSend:function(){
                    $('.process').html('<br><lable class="text-success">Image Uploading...</lable>');
                },*/
                success:function(data)
                {
                    $('.uploaded_logo_image').html(data);
                    setTimeout(replce_logo_image, 50);
                    $('.upload_button1').html('Change Image');
                }
            });
        }
    });

    
    $(document).on('change', '.upload_background_image', function(){
        var url = $('.upload_background_image').data('url');
        console.log(url);
        var property = document.getElementById("file1").files[0];
        var image_name = property.name;
        var image_extension = image_name.split('.').pop().toLowerCase();
        var image_size = property.size;
        var invalidformat = false;
        var maxFileSize = false;
        if(jQuery.inArray(image_extension, ['png','jpg','jpge','jpeg']) == -1)
        {          
            $('.img_error2').html('<lable class="text-danger">Invalid File format!</lable>');
            invalidformat = true;
        }
        if(image_size > 2000000)
        {
            $('.img_error2').html('<lable class="text-danger">File size is only upto 2MB!</lable>');
            maxFileSize = true;
        }
        if(invalidformat == false && maxFileSize == false)
        {
            var form_data = new FormData();
            form_data.append("file1", property);
            $.ajax({
                url:url,
                method:"POST",
                data:form_data,
                contentType:false,
                cache:false,
                processData:false,
                /*beforeSend:function(){
                    $('.process').html('<br><lable class="text-success">Image Uploading...</lable>');
                },*/
                success:function(data)
                {
                    $('.uploaded_background_image').html(data);
                    setTimeout(replce_background_image, 50);
                    $('.upload_button2').html('Change Image');
                }
            });
        }
    });

    $(document).on('change', '.upload_file', function(){
        var url = $('.upload_file').data('url');
        var property = document.getElementById("file").files[0];
        var image_name = property.name;
        var image_extension = image_name.split('.').pop().toLowerCase();
        var image_size = property.size;
        var invalidformat = false;
        var maxFileSize = false;
        if(jQuery.inArray(image_extension, ['doc','pdf','txt','png','jpg','jpge','jpeg']) == -1)
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

    $(document).on('click','.attachment_btn',function(){
        var url='attachment';
        var this1=$(this);      
        $.ajax({
            url:completeURL(url),          
            type:'POST',
            dataType:'json',
            success: function(data)
            {
                var dialog = bootbox.dialog({
                    message: data.view,
                    title: 'Select File',
                    buttons: 
                    {
                        Attach: {
                            label: "Attach",
                            className: "btn btn-success changeButtonType",
                            callback: function() 
                            {
                               this1.closest('.input-group').find('.attachment_file').val(file_value);
                            }
                        }             
                    }
                });
            }
        });
    });

    $(document).on("change","#course",function(){
        var x = $('#course').select2('val');
        if(x > 3)
        {
          $(".showdiv").show();
        }
        else
        {
          $(".showdiv").hide();
        }
    });

    var file_value='';
    $(document).on('click', '.todo-project-list li a', function () {
        file_value = $(this).html();
    });
    
    $(document).on('click','.addDynaRow',function(){        

            var clonedRow = $(this).parents('tbody.appendDynaRow').find('tr:first').clone();
            clonedRow.find('select').val('');   
            clonedRow.find('input').val('');
            clonedRow.find('.select2-container').remove();          
            clonedRow.find(".select2me").css("display","block").select2();
            clonedRow.find('.tooltip').css('display','none');  
            clonedRow.find('div.datepickerMonth').datepicker({rtl: Metronic.isRTL(), autoclose: true, viewMode: 'months', minViewMode: 'months', format:'MM-yyyy', endDate:'+30d'});     
            clonedRow.find('div.addDeleteButton').append('<span class="tooltips deleteParticularRow" data-placement="top" data-original-title="Remove" style="cursor: pointer;">'+                                                  
                                                            '<i class="fa fa-trash-o"></i>'+                                                    
                                                        '</span>');
            clonedRow.find('.tooltips').tooltip({placement: 'top'});
            
            $(this).parents('tbody.appendDynaRow').append(clonedRow);
            var k=0; 
            $("tbody.appendDynaRow  tr").each(function() {
                k++;
                $(this).find('input[type=radio]').val(k);
            });
    });

    $(document).on('click','.deleteParticularRow', function(){ 
        $(this).closest('tr').remove();   
        var k=0; 
        $("tbody.appendDynaRow  tr").each(function() {
            k++;
            $(this).find('input[type=radio]').val(k);
        });  
    });

    $(document).on('change','.discount',function(){
        var price = $('#product_price').val();
        var discount = $('#discount').val();
        var new_price = Math.round(price-(price*discount)/100);
        $('#selling_price').val(new_price);
    });


    $(document).on('change','.institute',function(){
        var id = $('#institute_id').val();
        $.ajax({
            url: completeURL('manual-order-creation'),
            type: 'POST',
            dataType: 'html',
            data: {id : id},
            success: function(data)
            {
                $('.form').html($(data).find('.form').html());
            }
        });
    });

    $(document).on('change','.product',function(){
        var id = $(this).val();

        var this1=$(this);

        $.ajax({
            url : completeURL('getproduct'),
            type : 'POST',
            dataType : 'json',
            data : {id : id},
            success: function(data)
            {
                this1.closest('tr').find(".price").val(data.price);
                this1.closest('tr').find(".name").val(data.name);
                this1.closest('tr').find(".desc").val(data.desc);
                this1.closest('tr').find(".img").val(data.img);
                this1.closest('tr').find(".pp").val(data.pp);
                this1.closest('tr').find(".ppsub_total").val(data.price);
                this1.closest('tr').find('.qty').val(1);
            }
        });

    });

    $(document).on('change','.qty',function(){
        var qty =$(this).closest('tr').find(".qty").val();
        var price = $(this).closest('tr').find(".price").val();
        var total_price = qty*price;
        $(this).closest('tr').find(".ppsub_total").val(Math.round(total_price));
        pcalculate_bill();
        
    });

    $(document).on('change','.product1',function(){
        var price = $(this).closest('tr').find(".price").val();
        $(".pfinal_total").val(price);
        pcalculate_bill();

    });
    $(document).on('click','.clearData', function(){
       var formId = '#'+$(this).parents('form').attr('id');
        $(formId).find('input:text, input:password, input:file, select,textarea').val('');
        $(formId).find('button:submit').removeAttr('disabled');
        $(formId).find('input:checkbox').removeAttr('checked').removeAttr('selected');
        $(formId).find('.select2-container').select2('val','0');

        $('html, body').animate({scrollTop:0});
    });

    $(document).on('click','.clearData1', function(){
        var formId = '#'+$(this).parents('form').attr('id');
        $('.SummernoteText').summernote("reset");
        $(formId).find('input:text, input:password, input:file, select,textarea').val('');
        $(formId).find('button:submit').removeAttr('disabled');
        $(formId).find('input:checkbox').removeAttr('checked').removeAttr('selected');
        $(formId).find('.select2-container').select2('val','0');

        $('html, body').animate({scrollTop:0});
    });

    $(document).on('click','.query_status',function(e){
        var value= $('.query_status_val').val();
        if(value==1){
            $(this).find(".rateit-selected").css("color", "red");
        }
        else if(value==2){
            $(this).find(".rateit-selected").css("color", "orange");
        }
        else{
            $(this).find(".rateit-selected").css("color", "green");
        }
    });

    var tooltipvalues = ['Pending', 'CallBack', 'Solved'];
    $(".query_status").bind('over', function (event, value) { $(this).attr('title', tooltipvalues[value-1]); });

    $(document).on('change','.duplicate',function(){
        var p_key = $(this).data('p_key');
        var id = $(this).attr('rel');
        var tbl = $(this).data('tbl');
        var where = $(this).data('where');
        var value = $(this).val();
        var this1 = $(this);
        $(this).closest('div').find('.help-block').remove();
        $.ajax({
            type:'POST',
            url:completeURL('duplicate'),
            data:{id:id,p_key:p_key,tbl:tbl,where:where,value:value},
            dataType:'json',
            success:function(data)
            {    
                if(data.valid)
                {
                    this1.closest('div').append('<span class="help-block">'+data.msg+'</span>');
                    this1.val('');                    
                    this1.closest('.form-group').addClass('has-error');
                    this1.closest('div').find('i').addClass('fa-warning').removeClass('fa-check');                    
                }
                else
                {
                    this1 .closest('.form-group').removeClass('has-error').addClass('has-success');
                    this1.closest('div').find('i').addClass('fa-check').removeClass('fa-warning');
                }

                
            }
        });
    });
     $(document).on('click','.delete_cart_item' , function(){
        var deleteDiv = $(this);
        bootbox.confirm("Are you sure?", function(result) {
            if(result)
            {
                var id = deleteDiv.attr('rel');
                var url = deleteDiv.attr('rev');
                
                $.ajax({
                    url : completeURL(url),
                    type:'POST',
                    dataType:'json',
                    data:{id:id},
                    headers: {
                        "x-api-key": "5681648d-91d6-4371-a911-1497734d0016"
                    },
                     success: function(data) {
                        if (data.state == true) {
                            $.toast({ text: data.msg, heading: '<b>Success</b>', icon: 'success' });
                            setTimeout(function() {
                                window.location.href = window.location.href;
                            }, 2000);
                        } else {
                            $.toast({ text: data.msg, heading: '<b>Warning</b>', icon: 'error' });
                        }
                    }
                });
            }
        }); 
    });

    $(document).on('click','.common_savebyAjax' , function()
    {
        var form = '#'+$(this).parents('form').attr('id');
        var url = $(form).attr('action');
        var apikey = $(form).data('apikey');    
        var redirect = $(form).data('redirect');
        var serialize_data = $(form).serialize();
    
        bootbox.confirm("Are you sure?", function(result) 
        {       
            if(result)
            {    Metronic.startPageLoading({animate: true});
                $(form).ajaxSubmit({
                    type: 'POST',
                    headers: {
                        "x-api-key": apikey
                    },
                    url: completeURL(url),
                    dataType: 'json',
                    data: serialize_data,
                    success: function(data) {
                
                        if (data.state == true) {
                            Metronic.stopPageLoading();
                            $.toast({ text: data.msg, heading: '<b>Success</b>', icon: 'success' });
                            setTimeout(function() {
                                if(redirect)
                                {
                                    window.location.href = window.completeURL(redirect);
                                }
                                else
                                {
                                    window.location.href = window.location.href;
                                }
                            }, 2000);
                        } else {
                            $.toast({ text: data.msg, heading: '<b>Warning</b>', icon: 'error' });
                            $('.common_save').prop('disabled', false);
                        }
                    }
                });
            }
        });
    });

});  

function pcalculate_bill() 
{  
    var price = 0;
    var discount = 0;

    $(".ppsub_total").each(function() {
        price = Math.round(price + $(this).val()*1);
    }); 

    $(".ptotal_discount").each(function() {
        discount = Math.round(discount + $(this).val()*1);
    });

    var total=price-discount;
    $('.psubtotal').html(Math.round(price));
    $('.ptotal_discount').html(Math.round(discount));
    $('.pfinal_total').html(Math.round(total));

    $('.psubtotal').val(Math.round(price));
    $('.ptotal_discount').val(Math.round(discount));
    $('.pfinal_total').val(Math.round(total));
}

function replce_image()
{
    var img_scr = $('.uploaded_image img').attr('src');
    var image_name = img_scr.substring(img_scr.lastIndexOf("/") + 1, img_scr.length);
    $('.file_name').val(image_name);
};

function replce_logo_image()
{
    var img_scr = $('.uploaded_logo_image img').attr('src');
    var image_name = img_scr.substring(img_scr.lastIndexOf("/") + 1, img_scr.length);
    $('.file_name1').val(image_name);
};

function replce_background_image()
{
    var img_scr = $('.uploaded_background_image img').attr('src');
    var image_name = img_scr.substring(img_scr.lastIndexOf("/") + 1, img_scr.length);
    $('.file_name2').val(image_name);
};

function replce_file()
{
    var file_name = $('.file_name span').val();
    $('.file_name').val(data);
};

function completeURL(url)
{
    return $('base').attr('href')+url;
}

