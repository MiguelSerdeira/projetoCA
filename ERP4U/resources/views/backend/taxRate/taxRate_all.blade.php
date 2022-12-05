@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Tax Rates</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
                        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <a href ="" class="btn btn-secondary btn-rounded waves-effect waves-light"
                        style="float:right;"> Add Tax Rates </a> <br> <br>
                        <h4 class="card-title">Tax Rates all data </h4>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>teste</th>
                                    <th>Postal Code</th> 
                                    <th>Location</th> 
                                    <th>Action</th>  
                                </tr>
                            </thead>
                            <tbody> 
                        	  
                                    <tr>
                                       
                                        <td>
                                            <a href="" class="btn btn-info sm" title="Edit Data">  <i class="fas fa-edit"></i> </a>
                                            <a href="" class="btn btn-danger sm" title="Delete Data" id="delete">  <i class="fas fa-trash-alt"></i> </a>
                                        </td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->                    
    </div> <!-- container-fluid -->
</div>
 

@endsection