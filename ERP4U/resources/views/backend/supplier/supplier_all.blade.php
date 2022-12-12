@extends('admin.admin_master')
@section('admin')

<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Supplier All</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
                        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <a href ="{{route('supplier.add')}}" class="btn btn-secondary btn-rounded waves-effect waves-light"
                        style="float:right;"> Add Supplier </a> <br> <br>
                        <h4 class="card-title">Supplier all data </h4>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Ln</th>
                                    <th>Code</th> 
                                    <th>Name</th> 
                                    <th>NIF</th>  
                                    <th>Postal Code</th>  
                                    <th>Location</th>  
                                    <th>Town</th>  
                                    <th>Action</th>  

                                </tr>
                            </thead>
                            <tbody> 
                        	   @foreach($supplier as $key => $item)
                                    <tr>
                                        <td> {{ $key+1}} </td>
                                        <td> {{ $item->code }} </td> 
                                        <td> {{ $item->name }} </td> 
                                        <td>nif</td> 
                                        <td> {{ $item->postalCode}} </td> 
                                        <td> {{ $item['postalCodeLink']['location'] }} </td> 
                                        <td> {{ $item->town }} </td> 
                                        <td>
                                            <a href="{{route('supplier.edit', $item->id)}}" class="btn btn-info sm" title="Edit Data">  <i class="fas fa-edit"></i> </a>
                                            <a href="{{route('supplier.delete', $item->id)}}" class="btn btn-danger sm" title="Delete Data" id="delete">  <i class="fas fa-trash-alt"></i> </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->                    
    </div> <!-- container-fluid -->
</div>
 

@endsection