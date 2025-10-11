<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<script src="/admin/vendors/js/core/jquery-3.3.1.min.js"></script>
<script src="{{ asset('admin/js/jquery.md.bootstrap.datetimepicker.js') }}"></script>
<script src="/admin/vendors/js/core/popper.min.js"></script>
<script src="/admin/vendors/js/core/bootstrap.min.js"></script>
<script src="/admin/vendors/js/perfect-scrollbar.jquery.min.js"></script>
<script src="/admin/vendors/js/prism.min.js"></script>
<script src="/admin/vendors/js/jquery.matchHeight-min.js"></script>
<script src="/admin/vendors/js/"></script>
<script src="/admin/vendors/js/pace/pace.min.js"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script src="/admin/vendors/js/chartist.min.js"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN CONVEX JS-->
<script src="/admin/js/app-sidebar.js"></script>
<script src="/admin/js/notification-sidebar.js"></script>
<script src="/admin/js/customizer.js"></script>
<!-- END CONVEX JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script src="/admin/js/dashboard-ecommerce.js"></script>
<!-- END PAGE LEVEL JS-->

<script src="/admin/vendors/js/jqBootstrapValidation.js"></script>
<script src="/admin/js/form-validation.js"></script>
<script src="/admin/js/sweetalert2.all.min.js"></script>
<script src="/admin/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<script src="{{ asset('admin/js/jquery.czMore-latest.js') }}"></script>



{{-- @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9']) --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])


<script src="https://cdn.ckeditor.com/4.21.0/full-all/ckeditor.js"></script>

<script src="{{ asset('admin/js/ckeditor.js') }}"></script>
jquery.czMore-latest
<script>
    $('select').select2([
        dir: "rtl",
        dropdownAutoWidth: true,
        dropdownParent: $('#parent')
    ])
</script>
<script>
    $('#brandSelect').selectpicker({
        'title': 'انتخاب برند'
    });
    $('#tagSelect').selectpicker({
        'title': 'انتخاب تگ'
    });


     // Show File Name
        $('#primary_image').change(function() {
            //get the file name
            var fileName = $(this).val();
            //replace the "Choose a file" label
            $(this).next('.custom-file-label').html(fileName);
        });

        $('#images').change(function() {
            //get the file name
            var fileName = $(this).val();
            //replace the "Choose a file" label
            $(this).next('.custom-file-label').html(fileName);
        });

        $('#categorySelect').selectpicker({
            'title': 'انتخاب دسته بندی'
        });

        $('#attributesContainer').hide();

        $('#categorySelect').on('changed.bs.select', function() {
            let categoryId = $(this).val();

            $.get(`{{ url('/admin-panel/management/category-attributes/${categoryId}') }}`, function(response,
                status) {
                if (status == 'success') {
                    // console.log(response);

                    $('#attributesContainer').fadeIn();

                    // Empty Attribute Container
                    $('#attributes').find('div').remove();

                    // Create and Append Attributes Input
                    response.attrubtes.forEach(attribute => {
                        let attributeFormGroup = $('<div/>', {
                            class: 'form-group col-md-3'
                        });
                        attributeFormGroup.append($('<label/>', {
                            for: attribute.name,
                            text: attribute.name
                        }));

                        attributeFormGroup.append($('<input/>', {
                            type: 'text',
                            class: 'form-control',
                            id: attribute.name,
                            name: `attribute_ids[${attribute.id}]`
                        }));

                        $('#attributes').append(attributeFormGroup);

                    });

                    $('#variationName').text(response.variation.name);

                } else {
                    alert('مشکل در دریافت لیست ویژگی ها');
                }
            }).fail(function() {
                alert('مشکل در دریافت لیست ویژگی ها');
            })

            // console.log(categoryId);
        });

        $("#czContainer").czMore();

</script>
@isset($attributes)
 <script>
        $('#attributeSelect').selectpicker({
            'title': 'انتخاب ویژگی'
        });

        $('#attributeSelect').on('changed.bs.select', function() {
            let attributesSelected = $(this).val();
            let attributes = @json($attributes);

            let attributeForFilter = [];

            attributes.map((attribute) => {
                $.each(attributesSelected , function(i,element){
                    if( attribute.id == element ){
                        attributeForFilter.push(attribute);
                    }
                });
            });

            $("#attributeIsFilterSelect").find("option").remove();
            $("#variationSelect").find("option").remove();
            attributeForFilter.forEach((element)=>{
                let attributeFilterOption = $("<option/>" , {
                    value : element.id,
                    text : element.name
                });

                let variationOption = $("<option/>" , {
                    value : element.id,
                    text : element.name
                });

                $("#attributeIsFilterSelect").append(attributeFilterOption);
                $("#attributeIsFilterSelect").selectpicker('refresh');

                $("#variationSelect").append(variationOption);
                $("#variationSelect").selectpicker('refresh');
            });


        });

        $("#attributeIsFilterSelect").selectpicker({
            'title': 'انتخاب ویژگی'
        });

        $("#variationSelect").selectpicker({
            'title': 'انتخاب متغیر'
        });

    </script>
@endisset


@isset($productVariations)
<script>
    let variations = @json($productVariations);
    variations.forEach(variation => {
        $(`#variationDateOnSaleFrom-${variation.id}`).MdPersianDateTimePicker({
            targetTextSelector: `#variationInputDateOnSaleFrom-${variation.id}`,
            englishNumber: true,
            enableTimePicker: true,
            textFormat: 'yyyy-MM-dd HH:mm:ss',
        });

        $(`#variationDateOnSaleTo-${variation.id}`).MdPersianDateTimePicker({
            targetTextSelector: `#variationInputDateOnSaleTo-${variation.id}`,
            englishNumber: true,
            enableTimePicker: true,
            textFormat: 'yyyy-MM-dd HH:mm:ss',
        });
    });
</script>
@endisset

