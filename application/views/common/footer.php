<script src="assets/js/jquery-2.2.0.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="assets/js/ie10-viewport-bug-workaround.js"></script>

<!-- Custom javascript -->
<script src="assets/js/theme.js"></script>
<script src="assets/js/bootstrap-editable.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>

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

    })

    $(document).ready(function () {
        $(".changeRole").click(function () {
            $("#dataName").val($(this).data('name'));//database table field
            $("#dataId").val($(this).data('id'));//database table field
            $('#changeRole').modal('show');
        });
    });

</script>

</body>
</html>