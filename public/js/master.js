$(document).ready(function(){

    $('.my-input').keypress(function(event){
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if(keycode == '13'){
            var value = $(this).val().toLowerCase();
            $(".my-table tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
                }
    });


    $(document).on('click','.delete',function(){
        var id = $(this).attr('data-id');
        var user_id = $(this).attr('data-user_id');
        $('#id').val(id);
        $('#user_id').val(user_id);
    });

    $(document).on('click','.edit',function(){
        let id = $(this).attr('data-id');
        var name = $(this).attr('data-name');
        var parent_id = $(this).attr('data-parent_id');
        $('#faculty_id').val(id);
        $('#data-name').val(name);
        $('#data-parent_id').val(parent_id);
    });

    $(document).on('click','.edit-teacher',function(){
        var id = $(this).attr('data-teacher_id');
        var name = $(this).attr('data-name');
        // var gender = $(this).attr('data-gender');
        switch ($(this).attr('data-gender')) {
            case 'Nam':
                var gender = 1;
                break;
            case 'Nữ':
                var gender = 0;
                break;
            case 'Khác':
                var gender = 2;
                break;
        }
        var profile = $(this).attr('data-profile');
        var faculty_id = $(this).attr('data-faculty_id');
        var dob = $(this).attr('data-dob');
        var birthplace = $(this).attr('data-birthplace');
        var nationality = $(this).attr('data-nationality');
        var folk = $(this).attr('data-folk');
        var religion = $(this).attr('data-religion');
        var id_card_no = $(this).attr('data-id_card_no');
        var id_card_date = $(this).attr('data-id_card_date');
        var id_card_place = $(this).attr('data-id_card_place');
        var address = $(this).attr('data-address');
        var email = $(this).attr('data-email');
        $('#teacher_id').val(id);
        $('#data-name').val(name);
        $('#data-gender').val(gender);
        $('#data-faculty_id').val(faculty_id);
        $('#data-dob').val(dob);
        $('#data-birthplace').val(birthplace);
        $('#data-nationality').val(nationality);
        $('#data-folk').val(folk);
        $('#data-religion').val(religion);
        $('#data-id_card_no').val(id_card_no);
        $('#data-id_card_date').val(id_card_date);
        $('#data-id_card_place').val(id_card_place);
        $('#data-address').val(address);
        $('#data-email').val(email);
        $('#old_profile').val(profile);
        var path = "http://ets.test/img/teacher/" + profile;
        $('#card-img-top').attr("src", path);

    });

    $(document).on('click','.edit-actclass',function(){
        var id = $(this).attr('data-id');
        var name = $(this).attr('data-name');
        var teacher_id = $(this).attr('data-teacher_id');
        var faculty_id = $(this).attr('data-faculty_id');
        $('#actclass_id').val(id);
        $('#data-name').val(name);
        $('#data-teacher_id').val(teacher_id);
        $('#data-faculty_id').val(faculty_id);

    });

    $(document).on('click','.edit-student',function(){
        var id = $(this).attr('data-student_id');
        var name = $(this).attr('data-name');
        // var gender = $(this).attr('data-gender');
        switch ($(this).attr('data-vgender')) {
            case 'Nam':
                var gender = 1;
                break;
            case 'Nữ':
                var gender = 0;
                break;
            case 'Khác':
                var gender = 2;
                break;
        }
        var path = "http://ets.test/img/student/";
        var profile = $(this).attr('data-profile');
        var phone = $(this).attr('data-phone');
        var actclass_id = $(this).attr('data-actclass_id');
        var student_no = $(this).attr('data-student_no');
        var dob = $(this).attr('data-dob');
        var birthplace = $(this).attr('data-birthplace');
        var nationality = $(this).attr('data-nationality');
        var folk = $(this).attr('data-folk');
        var religion = $(this).attr('data-religion');
        var id_card_no = $(this).attr('data-id_card_no');
        var id_card_date = $(this).attr('data-id_card_date');
        var id_card_place = $(this).attr('data-id_card_place');
        var father_name = $(this).attr('data-father_name');
        var father_phone = $(this).attr('data-father_phone');
        var mother_name = $(this).attr('data-mother_name');
        var mother_phone = $(this).attr('data-mother_phone');
        var address = $(this).attr('data-address');
        var email = $(this).attr('data-email');
        $('#student_id').val(id);
        $('#data-name').val(name);
        $('#data-student_no').val(student_no);
        $('#data-phone').val(phone);
        $('#data-gender').val(gender);
        $('#data-actclass_id').val(actclass_id);
        $('#data-dob').val(dob);
        $('#data-birthplace').val(birthplace);
        $('#data-nationality').val(nationality);
        $('#data-folk').val(folk);
        $('#data-religion').val(religion);
        $('#data-id_card_no').val(id_card_no);
        $('#data-id_card_date').val(id_card_date);
        $('#data-id_card_place').val(id_card_place);
        $('#data-father_name').val(father_name);
        $('#data-father_phone').val(father_phone);
        $('#data-mother_name').val(mother_name);
        $('#data-mother_phone').val(mother_phone);
        $('#data-address').val(address);
        $('#data-email').val(email);
        $('#old_profile').val(profile);
        path += profile;
        $('#student-profile').attr("src", path);

    });

    $(document).on('click','.edit-subject',function(){
        var subject = $(this).attr('data-subject');
        var name = $(this).attr('data-name');
        var profile = $(this).attr('data-profile');
        var credit = $(this).attr('data-credit');
        var faculty_id = $(this).attr('data-faculty_id');
        var description = $(this).attr('data-description');
        $('#subject_id').val(subject);
        $('#data-name').val(name);
        $('#data-old_profile').val(profile);
        $('#data-credit').val(credit);
        $('#data-faculty_id').val(faculty_id);
        $('#data-description').val(description);
        var path = "http://ets.test/img/subject/" + profile;
        $('.card-img-top').attr("src", path);

    });

    $(document).on('click','.edit-course',function(){
        var id = $(this).attr('data-course_id');
        var name = $(this).attr('data-name');
        var subject_id = $(this).attr('data-subject_id');
        var teacher_id = $(this).attr('data-teacher_id');
        var start_date = $(this).attr('data-start_date');
        var end_date = $(this).attr('data-end_date');
        var location = $(this).attr('data-location');
        $('#course_id').val(id);
        $('#data-name').val(name);
        $('#data-subject_id').val(subject_id);
        $('#data-teacher_id').val(teacher_id);
        $('#data-start_date').val(start_date);
        $('#data-end_date').val(end_date);
        $('#data-location').val(location);
    });

    $(document).on('click','.add-chapter',function(){
        var course_id = $(this).attr('data-course_id');
        $('.course_id').val(course_id);
    });

    $(document).on('click','.change-password',function(){
        var user_id = $(this).attr('data-user_id');
        $('.user_id').val(user_id);
    });

    $(document).on('click','.edit-chapter',function(){
        var chapter_id = $(this).attr('data-chapter_id');
        var title = $(this).attr('data-title');
        var mission = $(this).attr('data-mission');
        var start_date = $(this).attr('data-start_date');
        var end_date = $(this).attr('data-end_date');
        var old_homework_file = $(this).attr('data-homework_file');
        $('.chapter_id').val(chapter_id);
        $('.title').val(title);
        $('.mission').val(mission);
        $('.start_date').val(start_date);
        $('.end_date').val(end_date);
        $('.old_homework_file').val(old_homework_file);
        // $('.old_homework').html(old_homework_file);
        if (old_homework_file != '') {
            $('.old_homework').attr("href", "/storage/" + old_homework_file);
        }
        else {
            $('.old_homework').attr("href", "#");
        }

    });

    $(document).on('click','.view-chapter',function(){
        var chapter_id = $(this).attr('data-chapter_id');
        var course_id = $(this).attr('data-course_id');
        var process_id = $(this).attr('data-process_id');
        var enrollment_id = $(this).attr('data-enrollment_id');
        var title = $(this).attr('data-title');
        var mission = $(this).attr('data-mission');
        var start_date = $(this).attr('data-start_date');
        var end_date = $(this).attr('data-end_date');
        var old_homework_file = $(this).attr('data-homework_file');
        var student_file = $(this).attr('data-student_file');
        $('.chapter_id').val(chapter_id);
        $('.course_id').val(course_id);
        $('.title').val(title);
        $('.mission').val(mission);
        $('.start_date').val(start_date);
        $('.end_date').val(end_date);
        $('.old_homework_file').val(old_homework_file);
        $('.process_id').val(process_id);
        $('.enrollment_id').val(enrollment_id);
        // $('.old_homework').html(old_homework_file);
        if (old_homework_file != '') {
            $('.old_homework').attr("href", "/storage/" + old_homework_file);
        }
        else {
            $('.old_homework').attr("href", "javascript:void(0)");
        }
        if (student_file != '') {
            $('.student_file').attr("href", "/storage/" + student_file);
        }
        else {
            $('.student_file').attr("href", "javascript:void(0)");
        }

    });

  });

function getName()
{
    var subject_name = $('#subject_id option:selected').text();
    $('#name').val(subject_name + " - ");
}
function getName2()
{
    var subject_name = $('#data-subject_id option:selected').text();
    $('#data-name').val(subject_name + " - ");
}




