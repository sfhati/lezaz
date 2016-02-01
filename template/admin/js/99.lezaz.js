jQuery(function($) {
    $('#ace-settings-btn').on(ace.click_event, function(e) {
        e.preventDefault();

        $(this).toggleClass('open');
        $('#ace-settings-box').toggleClass('open');
    })

    whitelist_ext = ["jpeg", "jpg", "png", "gif", "bmp"];
    whitelist_mime = ["image/jpg", "image/jpeg", "image/png", "image/gif", "image/bmp"];

    $('.chosen-select').chosen({allow_single_deselect: true});
    $('.select2').select2();
    $('.imagefile').ace_file_input({
        no_file: '[no image] ...',
        btn_choose: '[Choose]',
        btn_change: '[Change]',
        droppable: false,
        onchange: null,
        thumbnail: false, //| true | large
        allowExt: whitelist_ext,
        allowMime: whitelist_mime,
    });
    $('.filefile').ace_file_input({
        no_file: '[no file] ...',
        btn_choose: '[Choose]',
        btn_change: '[Change]',
        droppable: false,
        onchange: null,
        thumbnail: false, //| true | large
        denyExt: ['exe', 'php']
    });

    $('.imagesfile').ace_file_input({
        style: 'well',
        btn_choose: '[Drop images here or click to choose]',
        btn_change: null,
        no_icon: "ace-icon fa fa-picture-o",
        droppable: true,
        thumbnail: 'small',
        allowExt: whitelist_ext,
        allowMime: whitelist_mime
    });
    $('.filesfile').ace_file_input({
        style: 'well',
        btn_choose: '[Drop files here or click to choose]',
        btn_change: null,
        no_icon: 'ace-icon fa fa-cloud-upload',
        droppable: true,
        thumbnail: 'small',
        denyExt: ['exe', 'php']
    });

    $('.date-picker').datepicker({
        autoclose: true,
        todayHighlight: true
    });

    var oTable1 = $('#dynamic-table').dataTable();

});