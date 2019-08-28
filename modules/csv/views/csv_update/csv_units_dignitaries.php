<link rel="stylesheet" href="<?php echo base_url('') ?>assets/jquery.typeahead.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css"/>

<style>

    .remove-file, #add-field {

        cursor: pointer;

    }



    .remove-file i {

        color: red;

    }

</style>

<div class="panel panel-default">

    <div class="panel-heading">

        <h3 class="panel-title">

            <!--<img src="<?= base_url('assets/bs/css/images/search.gif') ?>" />​--> <?= t('ទំរង់ការគ្រឿងឥស្សរិយយស') ?></h3>

    </div>

    <div class="panel-body">

        <fieldset>

            <legend><?= t('ស្វែងរកមន្ត្រី') ?></legend>

            <div class="form-group">



                <label class="col-lg-2 col-md-2 text-right" ​ style="line-height: 32px;">

                    <?= t('ស្វែងរកឈ្មោះឬ អត្ថលេខមន្ត្រី') ?>



                </label>

                <div class="col-lg-4 col-md-4 ">

                    <div class="typeahead__container ">

                        <div class="typeahead__field">

                            <div class="typeahead__query">

                                <input class="form-control js-typeahead"

                                       value="<?php echo isset($csv_record['csv_id']) ? $csv_record['csv_id'] . ' ' . $csv_record['csv_name'] : '' ?>"

                                       name="officer_search" type="search" autocomplete="off" style="width: 100%!important; font-family: khmermef1;"/>

                            </div>

                        </div>

                    </div>

                </div>



            </div>

        </fieldset>

        <?php if (isset($csv_record['csv_id'])) { ?>

        <fieldset>

            <legend><?= t('ព័ត៌មានលំអិតមន្ត្រី') ?></legend>

            <div class="form-group">



                <div class="col-lg-4 col-md-4">

                    <label class="col-lg-4 col-md-4 text-right " style="line-height: 32px;">

                        <?= t('អត្តលេខមន្ត្រី') ?>

                    </label>

                    <div class="col-lg-8 col-md-8">

                        <input class="form-control"

                               value="<?php echo isset($csv_record['csv_id']) ? $csv_record['csv_id'] : '' ?>"

                               name="officer_id" id="officer_id" type="text"/>

                    </div>

                </div>

                <div class="col-lg-4 col-md-4">

                    <label class="col-lg-4 col-md-4 text-right " style="line-height: 32px;">

                        <?= t('ឈ្មោះ') ?>

                    </label>

                    <div class="col-lg-8 col-md-8">

                        <input class="form-control" name="officer_name"

                               value="<?php echo isset($csv_record['csv_id']) ? $csv_record['csv_name'] : '' ?>"

                               id="officer_name" type="text" style="width: 100%!important; font-family: khmermef1;"/>

                    </div>

                </div>

                <div class="col-lg-4 col-md-4">

                    <label class="col-lg-4 col-md-4 text-right " style="line-height: 32px;">

                        <?= t('ថ្ងៃ ខែ ឆ្នាំកំណើត') ?>

                    </label>

                    <div class="col-lg-8 col-md-8">

                        <input class="form-control disabled" readonly

                               value="<?php echo isset($csv_record['csv_id']) ? $csv_record['csv_dob'] : '' ?>"

                               id="officer_dateofbirth" name="officer_dateofbirth" type="text"/>

                    </div>

                </div>

            </div>





            <div class="form-group">



                <div class="col-lg-4 col-md-4">

                    <label class="col-lg-4 col-md-4 text-right " style="line-height: 32px;">

                        <?= t('តួនាទី') ?>

                    </label>

                    <div class="col-lg-8 col-md-8">

                        <input class="form-control" name="officer_position"

                               value="<?php echo isset($csv_record['csv_id']) ? $csv_record['csv_position'] : '' ?>"

                               type="text"/>

                    </div>

                </div>

                <div class="col-lg-4 col-md-4">

                    <label class="col-lg-4 col-md-4 text-right " style="line-height: 32px;">

                        <?= t('អង្គភាព') ?>

                    </label>

                    <div class="col-lg-8 col-md-8">

                        <input class="form-control" name="officer_department" type="text"

                               value="<?php echo isset($csv_record['csv_id']) ? $csv_record['csv_department'] : '' ?>"/>

                    </div>

                </div>

                <div class="col-lg-4 col-md-4">

                    <label class="col-lg-4 col-md-4 text-right " style="line-height: 32px;">

                        <?= t('ថ្ងៃខែឆ្នាំចូលក្របខ័ណ្ឌ') ?>

                    </label>

                    <div class="col-lg-8 col-md-8">

                        <input class="form-control disabled" readonly

                               value="<?php echo isset($csv_record['csv_id']) ? $csv_record['csv_date_in'] : '' ?>"

                               name="officer_dateof_join" type="text"/>

                    </div>

                </div>

            </div>



            <div class="form-group">

                <div class="col-lg-4 col-md-4">

                    <label class="col-lg-4 col-md-4 text-right " style="line-height: 32px;">

                        <?= t('អគ្គនាយកដ្ឋាន') ?>

                    </label>

                    <div class="col-lg-8 col-md-8">

                        <input class="form-control" name="officer_department_general"

                               value="<?php echo isset($csv_record['csv_id']) ? $row_w->general_deps_name : '' ?>"

                               type="text"/>

                    </div>

                </div>

                <div class="col-lg-4 col-md-4">

                    <label class="col-lg-4 col-md-4 text-right " style="line-height: 32px;">

                        <?= t('នាយកដ្ឋាន') ?>

                    </label>

                    <div class="col-lg-8 col-md-8">

                        <input class="form-control" name="officer_department_general_sub"

                               value="<?php echo isset($csv_record['csv_id']) ? $row_w->d_name : '' ?>" type="text"/>

                    </div>

                </div>

                <div class="col-lg-4 col-md-4">

                    <label class="col-lg-4 col-md-4 text-right " style="line-height: 32px;">

                        <?= t('ទូរសព្វ') ?>

                    </label>

                    <div class="col-lg-8 col-md-8">

                        <input class="form-control" name="officer_phone"

                               value="<?php echo isset($csv_record['csv_id']) ? $csv_record['csv_mobile_phone'] : '' ?>"

                               type="text"/>

                    </div>

                </div>

            </div>



        </fieldset>



    </div>

    <form class="form-horizontal" role="form" id="frm-dignitaries">

        <input type="hidden" id="csv_id" value="<?php echo $csv_record['rec_id'] ?>"/>

        <input type="hidden" id="csv_work_id" value="<?php echo $csv_record['work_id']; ?>"/>

        <div class="panel-group" id="accordion" style=" margin-bottom: 30px">

            <div class="panel panel-info">

                <div class="panel-heading">

                    <h3 class="panel-title">

                        <a style="color: #797979 !important; margin-left: -13px; margin-top: 3px;"

                           class="collapsed"><?= t('បច្ចុប្បន្នភាព មន្ត្រី ត្រូវបានគ្រឿងឥស្សរិយយស') ?></a>

                    </h3>

                </div>

                <div class="panel-collapse">

                    <div class="panel-body">

                        <fieldset>

                            <div class="row">

                                <div class="col-lg-6 col-md-6 form-horizontal">

                                    <div class="form-group">

                                        <label class="col-lg-4 col-md-4 text-right">សូមជ្រើសមេតំណាងអោយមេដាយ</label>

                                        <div class="col-sm-8 col-md-8">

                                            <select class="form-control selected-1" id="selected-1" name="selected-1">

                                                <option class="form-control">--ជ្រើសរើស--</option>

                                                <?php

                                                $item = $this->config->item('class_dignitaries');

                                                foreach ($item as $items => $value) {

                                                    ?>

                                                    <option class="form-control "

                                                            value="<?= $items ?>"><?= $value ?></option>

                                                <?php } ?>

                                            </select>

                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <label class="col-lg-4 col-md-4 text-right">ជ្រើសមេដាយ</label>

                                        <div class="col-sm-8 col-md-8">

                                            <select class="form-control " id="selected" name="selected">



                                            </select>

                                        </div>

                                    </div>



                                    <div class="form-group">

                                        <label class="col-lg-4 col-md-4 text-right"><?php echo t('កំណត់ចំណាំ') ?></label>

                                        <div class="col-lg-8 col-md-8">

                                            <textarea class="form-control" rows="8" name="remark"

                                                      id="remark"></textarea>

                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <label class="col-lg-4 col-md-4 text-right"></label>

                                        <div class="col-lg-8 col-md-8">

                                            <span class="btn btn-success"

                                                  id="btn-submit-leave"><?php echo t('រក្សាទុក'); ?></span>

                                        </div>

                                    </div>

                                </div>



                                <div class="col-lg-6 col-md-6 form-horizontal">

                                    <div class="form-group">

                                        <label class="col-lg-4 col-md-4 text-right">ថ្ងៃ​ខែឆ្នាំ

                                            ទទួលគ្រឿងឥស្សរិយយស </label>

                                        <div class="col-sm-8 col-md-8">

                                            <div class="input-group">

                                                <span class="input-group-addon glyphicon glyphicon-calendar"></span>

                                                <input type="text" value="" class="form-control datepick" id="txtdate"

                                                       name="dateFrom">

                                            </div>

                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <label class="col-lg-4 col-md-4 text-right">លេខព្រះរាជក្រឹត្យ អនុក្រឹត</label>

                                        <div class="col-lg-8 col-md-8">

                                            <input type="text" class="form-control" id="txtNum" name="txtnum">

                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <label class="col-lg-3 col-md-3 text-right">ឯកសារយោង</label>

                                        <div class="col-lg-8 col-md-8">

                                            <div class="input-group">

                                                <input id="fieldID2" name="reference_file[]" value=""

                                                       class="form-control tag" readonly="" type="text">

                                                <span class="input-group-btn">

                                                        <a href="<?php echo base_url() ?>/assets/filemanager/dialog.php?type=2&amp;field_id=fieldID2&amp;relative_url=1&folder=units_madel"

                                                           class="btn btn-info iframe-btn" type="button">Select File</a>

                                                    </span>

                                            </div>

                                        </div>

                                        <label class="col-lg-1 col-md-1" id="add-field"><i

                                                    class="fa fa-plus-circle fa-2x "></i></label>

                                    </div>

                                    <div id="more-file">

                                        <input value="3" id="fild-count" type="hidden">

                                    </div>



                                </div>

                            </div>



                        </fieldset>

                    </div>

                </div>



            </div>

        </div>

    </form>



    <?php } ?>

</div>

<script src="<?php echo base_url('') ?>assets/jquery.typeahead.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js"></script>

<script type="text/javascript">

    $('#selected').parent().parent().hide();



    $('.selected-1').on('change', function () {



        var select = $(this).val();

        $.ajax({

            type: 'post',

            url: '<?= site_url('csv/csv_update/get_dignitaries') ?>',

            datatype: 'json',

            beforeSend: function () {

                // alert(data);

                $('.xmodal').show();

            },

            data: {

                select: select

            },

            success: function (data) {

                // alert(data);

                var record = data;

                var select = '';

                if (record.length > 0) {

                    $.each(record, function (i, row) {
//prend nom medal
//                        select += "<option value='" + row.id + "'>" + row.name + "</option>";
 select += "<option value='" + row.name + "'>" + row.name + "</option>";
                    });

                    // alert(select);

                    $('#selected').parent().parent().show();

                    $('#selected').html(select);

                } else {

                    $('#selected').parent().parent().show();

                    select += "<option ></option>";

                    $('#selected').html(select);

                }

                $('.xmodal').hide();

            },

        });

    });

    $('#btn-submit-leave').on('click', function () {

        save_dignitaries();

    });



    // save medals ========================

    function save_dignitaries() {

        var csv_id = $('#csv_id').val();

        var csv_work_id = $('#csv_work_id').val();

        var choix = document.getElementById('selected-1');
    
        var selected1= choix.options[$('#selected-1').val()].text; 
    
        

        var selected = $('#selected').val();

        var txtdate = $('#txtdate').val();

        var txtNum = $('#txtNum').val();

        var remark = $('#remark').val();

        var multiTags = $("#frm-dignitaries");

        var tags = multiTags.find("input.tag").map(function () {

            return $(this).val();

        }).get();

        if (txtdate === '') {

            $('#txtdate').parent().addClass('has-error');

            return false;

        } else {

            $.ajax({

                type: 'post',

                url: '<?= site_url('csv/csv_update/save_dignitaries') ?>',

                datatype: 'json',

                data: {

                    csv_id: csv_id,

                    csv_work_id: csv_work_id,
                    
                    selected1: selected1,

                    selected: selected,

                    txtdate: txtdate,

                    txtNum: txtNum,

                    remark: remark,

                    tags: tags

                },

                beforeSend: function () {

                    $('.xmodal').show();

                },

                success: function (data) {

                    $('.xmodal').hide();

                    if (data.status === 'success') {

                        swal({

                            text: "មន្ត្រី ត្រូវបានគ្រឿងឥស្សរិយយស ត្រូវបានរក្សាទុកដោយជោគជ័យ",

                            type: 'success',

                            showCancelButton: false,

                            showConfirmButton: false,

                            allowOutsideClick: false,

                            closeOnClickOutside: false

                        });

                        setTimeout(function () {

                            window.location.href = "<?php echo site_url('csv/csv_update/csv_units_dignitaries') ?>/";

                        }, 2500);

                    }

                }

            });

        }

    }



    $('body').delegate(".datepick", "focus", function (e) {

        dateTimeall();

    });



    function dateTimeall() {

        $('.datepick').each(function () {

            $(this).datepicker({

                format: "dd-mm-yyyy",

                startDate: "01-01-1950",

                todayBtn: true,

                language: "kh",

                keyboardNavigation: false,

                calendarWeeks: true,

                autoclose: true,

                todayHighlight: true,

                toggleActive: true

            });

        });

    }



    $(document).ready(function () {

        $.typeahead({

            input: ".js-typeahead",

            cache: true,

            minLength: 1,

            maxItem: 15,

            order: "asc",

            dynamic: true,

            delay: 500,

            hint: true,

            href: '<?php echo site_url('csv/csv_update/get_csv_detail?value={{id}}-{{name}}&id={{idtable}}&frm=dignitaries') ?>',

            cancelButton: true,

            display: ["id", "name"],

            backdrop: {

                "background-color": "#fff"

            },

            source: {

                ajax: {

                    url: "<?php echo site_url('csv/csv_update/get_csv') ?>",

                    path: "data.officer"

                }

            },

            debug: true

        });

    });



    $('#add-field').on('click', function () {

        var i = $('#fild-count').val();

        var inputform = '<div class="form-group">' +

            '<label class="col-lg-3 col-md-3 text-right"></label>' +

            '<div class="col-lg-8 col-md-8" >' +

            '<div class="input-group">' +

            '<input id="fieldID' + i + '" type="text" name="reference_file[]" value="" class="form-control tag" readonly>' +

            '<span class="input-group-btn">' +

            '<a href="<?php echo base_url() ?>/assets/filemanager/dialog.php?type=2&field_id=fieldID' + i + '&relative_url=1&folder=units_madel" class="btn btn-info iframe-btn" type="button">Select File</a>' +

            '</span>' +

            '</div>' +

            '</div>' +

            '<label class="col-lg-1 col-md-1 remove-file" ><i class="fa fa-minus-circle fa-2x red"></i></label>' +

            '</div>';

        $("#more-file").fadeIn('slow').append(inputform);

        $('.iframe-btn').fancybox({

            'width': 900,

            'height': 600,

            'type': 'iframe',

            'autoScale': true

        });

        $('#fild-count').val(parseInt(i) + 1);

    });





    $('.iframe-btn').fancybox({

        'width': 900,

        'height': 600,

        'type': 'iframe',

        'autoScale': true

    });

    $('body').delegate(".remove-file", "click", function (e) {

        var fieldfile = $(this).parent();

        fieldfile.fadeOut('slow', function () {

            $(this).remove();

        });

    });

</script>