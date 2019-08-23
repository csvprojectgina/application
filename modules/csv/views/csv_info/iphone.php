<style media="screen">


    .panel-title > a{


        color: #498fcc !important;


        font-size: 16px;


        margin-top: -10px;


        margin-right: -16px;


        padding: 5px;


        border-top-left-radius: 0px;


        border-down-left-radius: 0px;


        background: #ddd;}


    .container{


        padding-right: 0px ;


        padding-left: 0px;


    }


</style>


<form class="form-horizontal" action="" role="form" method="post" style="padding-left:0px; padding-right:0px;">


    <div class="panel panel-default">





        <div class="panel-heading thumbnail btn-group">


            <h3 class="panel-title"><!--<img src="<?= base_url('assets/bs/css/images/search.gif') ?>" />​ --><?= t('ព័ត៌មានមន្ត្រី') ?></h3>


        </div>


        <div class="panel-body">


            <div style="margin: -10px 0 10px 0;vertical-align: middle;">


                <span>


                    <select id="s_dis" style="height: 30px;"></select>


                    <label for="s_dis"><?= t('នាក់') ?></label>


                </span>


                <span style="float: right;  font-family: khmermef1;">


                    <label for="search"><?= t('ស្វែងរក') ?></label>


                    <input type="text" id="search" style="height: 30px;border-radius: 4px;line-height: 4px;  font-family: khmermef1;" />





<!--<select name="type_building" id="type_building" class="type_building" validate_act style="width: 200px;height: 30px;"></select>-->


                    <!--<button type="button" id="btn_prt" class="btn_prt" style="height: 30px;">បោះពុម្ព</button>-->


                </span>


            </div>





            <table cellpadding="0" cellspacing="0" border="1" class="table table-hover table-striped table-bordered dt-responsive nowrap" id="my_gr">


                <thead>


                    <?php


                    $dmid = $this->session->all_userdata()['dmid'];


                    ?>


                    <tr style="background-image: linear-gradient(to bottom,#f5f5f5 0,#e8e8e8 100%);background-repeat: repeat-x;">


                        <!-- <th style="text-align: center;width: 5%;"><?= t('ល.រ') ?></th> -->


                        <th style="text-align: center;"><?= t('ឈ្មោះ') ?></th>


                        <th style="text-align: center;"><?= t('ភេទ') ?></th>


                        <th style="text-align: center;"><?= t('មុខតំណែង') ?></th>


                        <th style="text-align: center;"><?= t('លេខទូរស័ព្ទ') ?></th>


                        <th style="text-align: center;"><?= t('') ?></th>


                    </tr>


                </thead>


                <tbody>


                </tbody>


                <tfoot>


                </tfoot>


            </table>


            <table cellpadding="0" cellspacing="0" style="width: 100%;vertical-align: middle;">


                <tr>


                    <td style="text-align: left;"><span id="disp"></span></td>


                    <td style="text-align: right;"><span><ul class="pagination" id="pagination-grid" style="margin-top: 5px;"></ul></span></td>


                </tr>


            </table>


        </div>


    </div>


</form>





<!-- js. -->


<script type="text/javascript">


    $(function () {





        /*get num. display ============*/


        $.ajax({


            url: '<?= site_url('csv/csv_info/get_num_dip') ?>',


            type: 'post',


            datatype: 'json',


            async: false,


            beforeSend: function () {


                $('.xmodal').show();


            },


            data: {},


            success: function (data) {


                if (data.length > 0) {


                    var opt = '';


                    $.each(data, function (i, item) {


                        opt += '<option>' + item.disp_num + '</option>';


                    });


                }


                $('#s_dis').html(opt);


                $('.xmodal').hide();


            },


            error: function () {





            }


        });





        // init. ===========


        var xtotal_display = $('#s_dis').val() - 0;


        grid(1, xtotal_display);





        // search =========


        $('#search').on('keyup', function () {


            if ($(this).val() != '' || $(this).val() != null) {


                var xtotal_display = $('#s_dis').val() - 0;


                grid(1, xtotal_display);


            }


        });





        // page ===========


        $('body').delegate('.a-pagination', 'click', function () {


            var xtotal_display = $('#s_dis').val() - 0;


            var currentpage = $(this).data('currentpage');


            grid(currentpage, xtotal_display);


        });





        // display ==========


        $('body').delegate("#s_dis", "change", function (e) {


            var xtotal_display = $('#s_dis').val() - 0;


            grid(1, xtotal_display);


        });





        // edit by row ===========


        $("body").delegate("#my_gr tbody tr", "click", function () {


            var id = $(this).data('id');


            if (id - 0 > 0) {


                window.location = "<?= site_url('csv/csv_info/edit') ?>/" + id;


//                window.open("<?= site_url('csv/csv_info/edit') ?>/" + id + "", "_blank");


            } else {


                alert("អត់មានទិន្នន័យ!");


                return false;


            }


        });





        // row hover ===========


        $("body").delegate("#my_gr tbody tr", "mouseover", function () {


            $(this).css('cursor', 'hand');


        });





    });// ready fun. ==========





    // grid ==========================


    function grid(current_page, total_display) {


        // var =============


        var limit = total_display - 0;


        var offset = (current_page - 1) * total_display;


        var search = $('#search').val();





        $.ajax({


            url: '<?= site_url('csv/csv_info/grid_csv_info') ?>',


            type: 'post',


            datatype: 'json',


//            async: false,


            beforeSend: function () {


                $('.xmodal').show();


            },


            data: {offset: offset, limit: limit, search: search},


            success: function (data) {


                var total_page = data.total_page;


                var record = data.res;


                var total_record = data.total_record;


                var tr = "";


                var ri = 1;





                if (record.length > 0) {


                    $.each(record, function (i, row) {


                        // i++;


                        var idmd = '<?= $this->session->all_userdata()["dmid"] ?>';


                        tr += "<tr data-id='" + row.id + "'data-href='<?= site_url('csv/csv_info/edit') ?>/" + row.id + "'class='editor' target='_parent'>" +


                                "<td style='text-align: left; white-space:nowrap; font-size:17px; padding-right:0px;'>" + row.lastname + ' ' + row.firstname + "</td>" +


                                "<td style='text-align: left;padding-right:0px;padding-left:0px; '>" + row.gender + "</td>" +


                                "<td style='text-align: left;padding-right: 4px;padding-left:4px'>" + row.current_role_in_khmer + "</td>" +


                                "<td style='text-align: left; white-space:nowrap;'>" + row.mobile_phone + "</td>" +


                                "<td style='text-align: left; font-size: 11 '>​​<a href='<?= site_url('csv/csv_info/edit') ?>/" + row.id + "' class='editor' target='_parent'>លម្អិត</a>" +


                                "</tr>";





                    });


                    $('#my_gr tbody').html(tr);


                    $('#disp').html(' ' + (offset + 1) + ' ទៅ ' + ((offset + total_display) - 0 > total_record ? total_record : (offset + total_display)) + ' នៃធាតុ ' + total_record);





                    var pagination = '<li><a class="a-pagination" href="javascript: void(0)" data-currentpage="1">&laquo;</a></li>';


                    for (var i = 1; i <= 4; i++) {


                        var p = 1;


                        if (current_page <= 5) {


                            p = i;


                        } else {


                            p = current_page - 5 + i;


                        }


                        if (p <= total_page) {


                            var active = current_page == p ? ' class= "active" ' : '';


                            pagination += '<li ' + active + '><a class="a-pagination" href="javascript: void(0)" data-currentpage="' + p + '">' + p + '</a></li>';


                        }


                    }





                    for (var i = 0; i <= 5; i++) {


                        var pr = 1;


                        if (current_page <= 5) {


                            pr = 5 + i;


                        } else {


                            pr = current_page + i;


                        }


                        if (pr <= total_page) {


                            var active = current_page == pr ? ' class= "active" ' : '';


                            pagination += '<li ' + active + '><a class="a-pagination" href="javascript: void(0)" data-currentpage="' + pr + '">' + pr + '</a></li>';


                        }


                    }


                    pagination += '<li><a class="a-pagination" href="javascript: void(0)" data-currentpage="' + total_page + '">&raquo;</a></li>';





                    $('#pagination-grid').html(pagination);





                } else {


                    tr += "<tr>" +


                            "<td colspan='11' style='text-align: center;'>អត់មានទិន្ន័យ!</td>" +


                            "</tr>";


                    $('#my_gr tbody').html(tr);


                    $('#pagination-grid').html("");


                    $('#disp').html("");


                }


                $('.xmodal').hide();


            },


            error: function () {





            }


        });// ajax =============


    }


</script>


