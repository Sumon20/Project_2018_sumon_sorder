"use strict";

$(document).ready(function () {

    //metis menu
    $('#side-menu').metisMenu();

    //tooltips
    $('[data-toggle="tooltip"]').tooltip();

    //tinymce editor
    tinymce.init({
      selector: '.tinymce',
      height: 150,
      theme: 'modern',
      plugins: [
        'advlist autolink lists link image charmap print preview hr anchor pagebreak',
        'searchreplace wordcount visualblocks visualchars  fullscreen',
        'insertdatetime media nonbreaking save table contextmenu directionality',
        'emoticons template paste textcolor colorpicker textpattern imagetools'
      ],
      toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | link image | print preview media code | forecolor backcolor emoticons',
      image_advtab: true, 
     });
    //ends tinymce

    //datatable
    $('.datatable').DataTable({
        responsive: true, 
        dom: 'Bfltip',   
        buttons: [
            'copy', 'csv', 'excel', 'print', 'pdf'
        ],             
        message: 'DataTables Extension', //set header message
        download: 'open', //dowload with new window 
    });

    //datepicker
    $(".datepicker").datepicker({
        dateFormat: "yy-mm-dd"
    }); 

    //timepicker
    $('.timepicker').timepicker({
        timeFormat: 'HH:mm:ss',
        stepMinute: 5,
        stepSecond: 15
    });

    //timepicker
    $('.timepicker-hour-min-only').timepicker({
        timeFormat: 'HH:mm:00',
        stepHour: 1,
        stepMinute: 5,
    });

    // semantic button
    $('.ui.selection.dropdown').dropdown();
    $('.ui.menu .ui.dropdown').dropdown({
        on: 'hover'
    });
 

    // select 2 dropdown
    $("select.form-control").select2({
        placeholder: "Select option",
        allowClear: true
    });
    
});
 
//Loads the correct sidebar on window load,
//collapses the sidebar on window resize.
// Sets the min-height of #page-wrapper to window size
$(window).bind("load resize", function () {
    var topOffset = 50;
    var width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
    if (width < 768) {
        $('div.navbar-collapse').addClass('collapse');
        topOffset = 100; // 2-row-menu
    } else {
        $('div.navbar-collapse').removeClass('collapse');
    }

    var height = ((this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height) - 1;
    height = height - topOffset;
    if (height < 1)
        height = 1;
    if (height > topOffset) {
        $("#page-wrapper").css("min-height", (height) + "px");
    }

    var url = window.location;
    var element = $('ul.nav a').filter(function() {
        return this.href == url;
    }).addClass('active').parent().parent().addClass('in').parent();
    var element = $('ul.nav a').filter(function () {
        return this.href == url;
    }).addClass('active').parent();

    while (true) {
        if (element.is('li')) {
            element = element.parent().addClass('in').parent();
        } else {
            break;
        }
    } 


    //scroll box on load
    $("#message").mCustomScrollbar({theme: "minimal-dark"});
    $("#notification").mCustomScrollbar({theme: "minimal-dark"});
    $(".message-center").mCustomScrollbar({theme: "minimal-dark"});
    $(".sidebar").mCustomScrollbar({theme: "minimal-dark"});


    // call chart function
    $('.count').each(function () {
        $(this).prop('Counter', 0).animate({
            Counter: $(this).text()
        }, {
            duration: 4000,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });
        
});


//print a div
function printContent(el){
    var restorepage = $('body').html();
    var printcontent = $('#' + el).clone();
    $('body').empty().html(printcontent);
    window.print();
    $('body').html(restorepage);
}
 