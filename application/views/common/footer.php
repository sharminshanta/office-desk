<script src="assets/js/jquery-2.2.0.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="assets/js/ie10-viewport-bug-workaround.js"></script>

<!-- Custom javascript -->
<script src="assets/js/theme.js"></script>
<script src="assets/js/bootstrap-editable.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/datatables/js/jquery.dataTables.min.js"></script>
<script src="assets/datatables/js/dataTables.bootstrap.js"></script>
<script>
    $('#addMoreField').click(function (e) {
        var max_field = 10;
        var x = 1;
        e.preventDefault();
        if (x < max_field) {
            x++;
            $('#addMoreOption').append('<div class="row append_row">' +
                '<div class="col-lg-12">' +
                '<div class="row">' +
                '<div class="col-lg-9">' +
                '<input required="required" name="name[]" type="text" class="form-control" placeholder="Name">' +
                '</div>' +
                '<div class="col-xs-2 col-sm-2 col-md-3 col-lg-3">' +
                '<a id="removeField" class="btn btn-xs btn-danger removeBtn">Remove</a>' +
                '</div>' +
                '</div><div class="clearfix"></div>' +
                '</div>'
            );
        }
    });

    $('#addMoreOption').on('click' , "#removeField" , function(e){
        e.preventDefault();
        console.log("This is remove button");
        $(this).parent('div').parent('div').remove();
    });

</script>

<script>
    $('#addMoreFieldForRole').click(function (e) {
        var max_field = 10;
        var x = 1;
        e.preventDefault();
        if (x < max_field) {
            x++;
            $('#addMoreOptionForRole').append('<div class="row append_row">' +
                '<div class="col-lg-12">' +
                '<div class="row">' +
                '<div class="col-lg-9">' +
                '<input required="required" name="name[]" type="text" class="form-control" placeholder="Name">' +
                '</div>' +
                '<div class="col-xs-2 col-sm-2 col-md-3 col-lg-3">' +
                '<a id="removeField" class="btn btn-xs btn-danger removeBtn">Remove</a>' +
                '</div>' +
                '</div><div class="clearfix"></div>' +
                '</div>'
            );
        }
    });

    $('#addMoreOptionForRole').on('click' , "#removeField" , function(e){
        e.preventDefault();
        console.log("This is remove button");
        $(this).parent('div').parent('div').remove();
    });

    $(document).on('ready', function () {
        var rightPanel = $("#rightPanel").height();
        var leftPanel = $("#leftPanel").height();
        var rightList = $("#rightList").height();
        var leftList = $("#leftList").height();

        if(rightPanel > leftPanel){
            $("#leftPanel").css("min-height", rightPanel + 30);
        }

        if(rightPanel < leftPanel){
            $("#rightPanel").css("min-height", leftPanel + 30);
        }

        if(rightList > leftList){
            $("#leftList").css("min-height", rightList + 30);
        }

        if(rightList < leftList){
            $("#rightList").css("min-height", leftList + 30);
        }

    });

    $(document).ready(function () {
        $(".changeRole").click(function () {
            $("#dataName").val($(this).data('name'));//database table field
            $("#dataId").val($(this).data('id'));//database table field
            $('#changeRole').modal('show');
        });
    });

    var ctxAPIUsageMonthly = document.getElementById("apiUsageChartMonthly").getContext('2d');
    var apiUsageChartMonthly = new Chart(ctxAPIUsageMonthly, {
        "type": "line",
        "data": {
            "labels": ["January", "February", "March", "April", "May", "June", "July"],
            "datasets": [{
                "label": "Monthly API Usage",
                "data": [65, 59, 80, 81, 56, 55, 40],
                "fill": false,
                "borderColor": "#114c69",
                "lineTension": 0.1
            }]
        },
        "options": {}
    });

    var ctxAPIUsageDaily = document.getElementById("apiUsageChartDaily").getContext('2d');
    var apiUsageChartDaily = new Chart(ctxAPIUsageDaily, {
        "type": "line",
        "data": {
            "labels": [01, 02, 03, 04, 05, 06, 07],
            "datasets": [{
                "label": "Daily API Usage",
                "data": [65, 59, 80, 81, 56, 55, 40],
                "fill": false,
                "borderColor": "#114c69",
                "lineTension": 0.1
            }]
        },
        "options": {}
    });

</script>

<script type="text/javascript">

    var save_method; //for save method string
    var table;

    $(document).ready(function() {

        //datatables
        table = $('#table').DataTable({

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "estudiante/ajax_list",
                "type": "POST"
            },

            //Set column definition initialisation properties.
            "columnDefs": [
                {
                    "targets": [ 0 ], //first column
                    "orderable": false, //set not orderable
                },
                {
                    "targets": [ -1 ], //last column
                    "orderable": false, //set not orderable
                },

            ],


        });
        //set input/textarea/select event when change value, remove class error and remove text help block
        $("input").change(function(){
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });
        $("textarea").change(function(){
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });
        $("select").change(function(){
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });

        //check all
        $("#check-all").click(function () {
            $(".data-check").prop('checked', $(this).prop('checked'));
            showBottomDelete();
        });



    });

    function showBottomDelete()
    {
        var total = 0;

        $('.data-check').each(function()
        {
            total+= $(this).prop('checked');
        });

        if (total > 0)
            $('#deleteList').show();
        else
            $('#deleteList').hide();
    }

    function addEstudiante()
    {
        save_method = 'add';
        $('#form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        $('#modal_form').modal('show'); // show bootstrap modal
        $('.modal-title').text('Add student'); // Set Title to Bootstrap modal title
    }

    function editEstudiante(id)
    {
        save_method = 'update';
        $('#form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string

        //Ajax Load data from ajax
        $.ajax({
            url : "estudiante/ajax_edit/"+id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {

                $('[name="estu_id"]').val(data.estu_id);
                $('[name="estu_nombre"]').val(data.estu_nombre);
                $('[name="estu_apellido"]').val(data.estu_apellido);
                $('[name="estu_cedula"]').val(data.estu_cedula);
                $('[name="carr_nombre"]').val(data.carr_id);
                $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit'); // Set title to Bootstrap modal title

            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error getting data from ajax');
            }
        });
    }

    function reloadTable()
    {
        table.ajax.reload(null,false); //reload datatable ajax
        $('#deleteList').hide();
    }

    function save()
    {
        $('#btnSave').text('saving...'); //change button text
        $('#btnSave').attr('disabled',true); //set button disable
        var url;

        if(save_method == 'add') {
            url = "estudiante/ajax_add";
        } else {
            url = "estudiante/ajax_update";
        }

        // ajax adding data to database
        $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data)
            {

                if(data.status) //if success close modal and reload ajax table
                {
                    $('#modal_form').modal('hide');
                    reloadTable();form
                }
                else
                {
                    for (var i = 0; i < data.inputerror.length; i++)
                    {
                        $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                        $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                    }
                }
                $('#btnSave').text('Save'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable


            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
                $('#btnSave').text('Save'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable

            }
        });
    }

    function deleteEstudiante(id)
    {
        if(confirm('Are you sure to remove the student?'))
        {
            // ajax delete data to database
            $.ajax({
                url : "index.php/estudiante/ajax_delete/"+id,
                type: "POST",
                dataType: "JSON",
                success: function(data)
                {
                    //if success reload ajax table
                    $('#modal_form').modal('hide');
                    reloadTable();
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error deleting data');
                }
            });

        }
    }

    function deleteList()
    {
        var list_id = [];
        $(".data-check:checked").each(function() {
            list_id.push(this.value);
        });
        if(list_id.length > 0)
        {
            if(confirm('Are you sure delete this '+list_id.length+' data?'))
            {
                $.ajax({
                    type: "POST",
                    data: {id:list_id},
                    url: "index.php/estudiante/ajax_list_delete",
                    dataType: "JSON",
                    success: function(data)
                    {
                        if(data.status)
                        {
                            reloadTable();
                        }
                        else
                        {
                            alert('Failed.');
                        }

                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        alert('Error deleting data');
                    }
                });
            }
        }
        else
        {
            alert('no data selected');
        }
    }

</script>

</body>
</html>