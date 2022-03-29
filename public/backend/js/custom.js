function base_url(){
    var pathparts = location.pathname.split('/');
    if (location.host == 'localhost') {
        var base_url = location.origin+'/'+pathparts[1].trim('/'); // http://localhost/myproject/
    }else{
        var base_url = location.origin; // http://bolehbelajar.com
    }
    return base_url   
}

var removed_entry = 0;
function ans_remove(e){
    $('.entry[data-entry="'+e+'"]').remove() 
    removed_entry = e;
    var entry_lenght = $('.entry').length;
    $('.entry').map(function(i) {
        $(this).attr('data-entry', i);
        $('ans-remove').attr('onclick', 'ans_remove('+i+')');

        if ($('.radio').length > 0) {
            $('.radio').each(function(i){
                $(this).val(i);
            })
        }

        if ($('.checkbox').length > 0) {
            $('.checkbox').each(function(i){
                $(this).val(i);
            })
        }
        console.log(i)
    });
}

function save_question(){
    var q_title = $('input[name="title"]').val()
    var q_sub_title = $('textarea[name="sub_title"]').val()
    var q_type = $('#question_type').val();

    var a_is_correct = '';
    if ($('.radio').length > 0) {
        $('.radio:checked').each(function() {
            a_is_correct = (this.value)
        });    
    }

    if ($('.checkbox').length > 0) {
        a_is_correct = [];
        $('.checkbox:checked').each(function(i){
            a_is_correct[i] = $(this).val();
        });
    }
    var a_content = $("input[name='content[]']").map(function(){return $(this).val();}).get();

    if($('.group-match-ques').length > 0){
        var a_content = []
        var correct_1 = {};
        var correct_2 = {};
        var correct_3 = {};
        correct_1["is_correct"] = '1';
        correct_1["head"] = $('input[name="a_head_1"]').val();
        correct_1["body"] = $("input[name='a_list_1[]']").map(function(){return $(this).val();}).get();

        correct_2["is_correct"] = '1';
        correct_2["head"] = $('input[name="a_head_2"]').val();
        correct_2["body"] = $("input[name='a_list_2[]']").map(function(){return $(this).val();}).get();

        correct_3["is_correct"] = '0';
        correct_3["body"] = $("input[name='a_list_3[]']").map(function(){
            if($(this).val() != ""){
                return $(this).val();
            }
        }).get();

        a_content.push(correct_1,correct_2,correct_3)
        
        a_content = JSON.stringify(a_content);
    }

    if($('.line-match-ques').length > 0){
        var a_content = {};
        content_1 = $("input[name='content_1[]']").map(function(){return $(this).val();}).get();
        content_2 = $("input[name='content_2[]']").map(function(){return $(this).val();}).get();
        content= [];
        for (var i = 0; i < content_1.length; i++) {
            //content.push(content_1[i],content_2[i]);
            a_content[i] = [content_1[i]+'||'+content_2[i]]
        }
        console.log(content)
        a_content = JSON.stringify(a_content);
    }
    var datana = {
        q_title : q_title,
        q_sub_title : q_sub_title,
        q_type : q_type,
        a_is_correct: a_is_correct,
        a_content: a_content
    }
    console.log(datana)
    var urlna = base_url() + '/dashboard/save_question/';
    
    $.ajax({
        url: urlna,  
        type: 'POST',
        data: datana,
        success:function(data){
            console.log(data)
        }
    });
}

function remove_line(i){
    $('.dynamic-element[data-index="'+i+'"]').remove();
    $('.dynamic-element').map(function(i) {
        $(this).attr('data-index', i);
        $('.remove_line').attr('onclick', 'remove_line('+i+')')
        $('.checkbox').val(i);
    });
}

function remove_a_1(i){
    $('.dynamic-element-1[data-index="'+i+'"]').remove();
    $('.dynamic-element-1').map(function(i) {
        $(this).attr('data-index', i);
        $('.remove_a_1').attr('onclick', 'remove_a_1('+i+')')
    });
}

function remove_a_2(i){
    $('.dynamic-element-2[data-index="'+i+'"]').remove();
    $('.dynamic-element-2').map(function(i) {
        $(this).attr('data-index', i);
        $('.remove_a_2').attr('onclick', 'remove_a_2('+i+')')
    });
}

function remove_a_3(i){
    $('.dynamic-element-3[data-index="'+i+'"]').remove();
    $('.dynamic-element-3').map(function(i) {
        $(this).attr('data-index', i);
        $('.remove_a_3').attr('onclick', 'remove_a_3('+i+')')
    });
}

function save_quiz(){
    var datana = {
        title : $('input[name="title"]').val(),
        sub_title : $('textarea[name="sub_title"]').val(),
        duration : $('input[name="duration"]').val(),
        passing_grade : $('input[name="title"]').val(),
        random_question : $('input[name="random"]').val(),
        ques_quiz : $("input[name='question_quiz[]']").map(function(){return $(this).val();}).get() 
    };
    console.log(datana);
    var urlna = base_url() + '/dashboard/save_quiz/';
    $.ajax({
        url: urlna,  
        type: 'POST',
        data: datana,
        success:function(data){
            console.log(data);
        }
    });
}

function remove_question_quiz(i){
    $('.add_question_quiz' + '[data-value="'+i+'"]').css('display','block');
    $('table.list-qustion-quiz tr[data-value="'+i+'"]').remove();
}
        

$(document).ready(function() {
    $(".ans-line").click(function(){
        var count_lenght = $('.dynamic-element').length;
        $('.dynamic-element')
        .first()
        .clone()
        .appendTo('.ans-controls')
        .attr('data-index',count_lenght)
        .find('.checkbox').val(count_lenght).end()
        .find('.form-control').val('');

        var btn_delete = '<button class="btn btn-xs btn-danger remove_line" onclick="remove_line('+count_lenght+')" title="Delete"><i class="fa fa-trash"></i></button>';
        $(btn_delete).appendTo($('.dynamic-element[data-index="'+count_lenght+'"] > .line-match-list .col-md-2'))
    });

    $(".ans-group-1").click(function(){
        var count_lenght = $('.dynamic-element-1').length;
        $('.dynamic-element-1').first().clone().appendTo('.ans-controls-1').attr('data-index',count_lenght).find('input[type="text"]').val('');
        var btn_delete = '<button class="btn btn-xs btn-danger remove_a_1" onclick="remove_a_1('+count_lenght+')" title="Delete"><i class="fa fa-trash"></i></button>';
        $(btn_delete).appendTo($('.dynamic-element-1[data-index="'+count_lenght+'"] > td'))
    });

    $(".ans-group-2").click(function(){
        var count_lenght = $('.dynamic-element-2').length;
        $('.dynamic-element-2').first().clone().appendTo('.ans-controls-2').attr('data-index',count_lenght).find('input[type="text"]').val('');
        var btn_delete = '<button class="btn btn-xs btn-danger remove_a_2" onclick="remove_a_2('+count_lenght+')" title="Delete"><i class="fa fa-trash"></i></button>';
        $(btn_delete).appendTo($('.dynamic-element-2[data-index="'+count_lenght+'"] > td'))
    });

    $(".ans-group-3").click(function(){
        var count_lenght = $('.dynamic-element-3').length;
        $('.dynamic-element-3').first().clone().appendTo('.ans-controls-3').attr('data-index',count_lenght).find('input[type="text"]').val('');
        var btn_delete = '<button class="btn btn-xs btn-danger remove_a_3" onclick="remove_a_3('+count_lenght+')" title="Delete"><i class="fa fa-trash"></i></button>';
        $(btn_delete).appendTo($('.dynamic-element-3[data-index="'+count_lenght+'"] > td'))
    });

    $(".ans-add").click(function(){
        var entry_lenght = $(".ans-controls > .entry").length;
        entry_lenght = entry_lenght;
        console.log($(this).attr('data-type'));
        switch ($(this).attr('data-type')) {
            case 'multi':
                console.log(removed_entry + ' r ' + entry_lenght);
                //console.log(count + ' - ' + entry_lenght);
                var input = '<div class="form-group form-inline entry" data-entry="'+entry_lenght+'"> \
                    <label class="col-md-3 col-form-label">\
                        <input class="form-check-input checkbox" type="checkbox" name="is_correct[]" value="'+entry_lenght+'">\
                        <span class="form-check-sign">Is Correct</span>\
                    </label>\
                    <div class="col-md-6">\
                        <input type="text" name="content[]" class="form-control input-full" />\
                    </div>\
                    <div class="col-md-3">\
                        <button class="btn btn-danger ans-remove btn-xs" onclick="ans_remove('+entry_lenght+')" data-value="'+entry_lenght+'" title="add option">\
                            <i class="fa fa-minus"></i>\
                        </button>\
                    </div>\
                </div>';

                $(input).appendTo($(".ans-controls"));
                return false;
            case 'single':
                var input = '<div class="form-group form-inline entry" data-entry="'+entry_lenght+'"> \
                    <label class="col-md-3 col-form-label">\
                        <input class="form-check-input radio" name="is_correct" type="radio" value="'+entry_lenght+'" >\
                        <span class="form-check-sign">Is Correct</span>\
                    </label>\
                    <div class="col-md-6">\
                        <input type="text" name="content[]" class="form-control input-full" />\
                    </div>\
                    <div class="col-md-3">\
                        <button class="btn btn-danger ans-remove btn-xs" onclick="ans_remove('+entry_lenght+')" data-value="'+entry_lenght+'" title="add option">\
                            <i class="fa fa-minus"></i>\
                        </button>\
                    </div>\
                </div>';

                $(input).appendTo($(".ans-controls"));
        }

    });

    $('.radio-checkbox').click(function(){
        $('.radio-checkbox').each(function(){
            $(this).prop('checked', false); 
        }); 
        $(this).prop('checked', true);
    });
    
    $('.btn-drag').draggable({
        revert: true
    });
    
    $(".dropped").droppable({
        accept: '.btn-drag',
        drop: function(event, ui) {
            $(this).append($(ui.draggable));
            var data_dropped = $(ui.draggable).data('dropped');
            console.log(data_dropped);
            $('.dropped-one[data-index="'+data_dropped+'"]').droppable("enable");

        }
    });

    $(".dropped-one").droppable({
        accept: '.btn-drag',
        drop: function(event, ui) {
            $(this).append($(ui.draggable));
            var data_dropped = $(ui.draggable).data('dropped');
            if (data_dropped) {
                $('.dropped-one[data-index="'+data_dropped+'"]').droppable("enable");
            }
            var value_drag = $(ui.draggable).attr('data-value');
            var i_drop = $(this).attr('data-index');
            $(ui.draggable).attr('data-dropped',i_drop);
            $(this).droppable("disable");
            console.log(value_drag+' - '+i_drop)
        }
    });

    $(".btn_cek_group").click(function(){
        console.log($('.group-ans > .body-group-ans .btn-drag').length)
    });

    $(".add_question_quiz").click(function(){
        var id_ques = $(this).attr('data-value');
        var datana = {
            id_ques : id_ques
        };
        var urlna = base_url() + '/dashboard/add_ques_quiz/';
        console.log(id_ques)
        
        $.ajax({
            url: urlna,  
            type: 'POST',
            data: datana,
            success:function(data){
                var obj = JSON.parse(data)
                var selected_ques = $('.list-qustion-quiz > tbody');
                if ($('.list-qustion-quiz > tbody > tr > td.no-data').length > 0) {
                    $('.list-qustion-quiz > tbody > tr > td.no-data').remove()
                }
                var new_ques = '<tr data-value="'+obj.id+'"><input type="hidden" name="question_quiz[]" value="'+obj.id+'" />\
                <td>'+obj.title+'</td><td>'+obj.sub_title+'</td><td>'+obj.type+'</td>\
                <td><button class="btn btn-xs btn-danger" onclick="remove_question_quiz('+obj.id+')"><i class="fa fa-trash"></i></button></td><tr>';
                $(new_ques).appendTo(selected_ques);
                
                $('.add_question_quiz' + '[data-value="'+id_ques+'"]').css('display','none');
                $('#list_question').modal('hide');
            }
        });
    })


    $(".remove_question_quiz").click(function(){
        console.log("remove")
        var id_ques = $(this).attr('data-value');
        
    });
    // Add Row
    $('#add-row').DataTable({
        "pageLength": 5,
    });

    var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

    $('#addRowButton').click(function() {
        $('#add-row').dataTable().fnAddData([
            $("#addName").val(),
            $("#addPosition").val(),
            $("#addOffice").val(),
            action
        ]);
        $('#addRowModal').modal('hide');
    });
});

