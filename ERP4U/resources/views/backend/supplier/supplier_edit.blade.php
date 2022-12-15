@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Edit Supplier </h4><br><br>

                        <form method="post" action="{{route('supplier.update')}}" id="myForm">
                            @csrf

                            <input type="hidden" name="id" value="{{$supplier->id}}">

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Code</label>
                                <div class="form-group col-sm-10">
                                    <input name="code" class="form-control" value="{{$supplier->code}}" type="text">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">NIF</label>
                                <div class="form-group col-sm-10">
                                    <input name="nif" class="form-control" value="{{$supplier->nif}}" type="text">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                                <div class="form-group col-sm-10">
                                    <input name="name" class="form-control" value="{{$supplier->name}}" type="text">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Postal Code</label>
                                <div class="form-group col-sm-2">
                                    <select value="{{$supplier->postalCode}}" name="postalCode" id="codePostal" class="form-select select2"
                                        aria-label="Default select example">
                                        <option id="iValor" atr_inputOption="{{$supplier->postalCode}}"selected=""></option>
                                        @foreach($postalCode as $supp)
                                        <option atrLocation="{{$supp->location}}" value="{{$supp->postalCode}}">
                                            {{$supp->postalCode}} </option>
                                        @endforeach

                                    </select>
                                </div>
                                <label for="example-text-input" id="lbLocation" name="lblocation"
                                    class="col-sm-8 col-form-label"></label>
                            </div>
                            <div class="row mb-3">
                                <label for="example -text-input" class="col-sm-2 col-form-label">Town</label>
                                <div class="form-group col-sm-10">
                                    <input name="town" class="form-control" value="{{$supplier->town}}" type="text">
                                </div>
                            </div>

                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Edit Postal Code">
                        </form>

                    </div>
                </div>
            </div> <!-- end col -->
        </div>



    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        
        $('#codePostal').val($("#iValor").attr("atr_inputOption")).trigger('change');
        $("#lbLocation").text("");
        $("#lbLocation").text($("#codePostal option:selected").attr("atrLocation"));

        $("#codePostal").change(function () {
            $("#lbLocation").text("");
            $("#lbLocation").text($("#codePostal option:selected").attr("atrLocation"));
        });

        $('#myForm').validate({
            rules: {
                postalCode: {
                    required: true,
                },
                location: {
                    required: true,
                },
            },
            messages: {
                postalCode: {
                    required: 'Please Enter Postal Code.',
                },
                location: {
                    required: 'Please Enter Location.',
                },
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            },
        });
    }); 
</script>

@endsection