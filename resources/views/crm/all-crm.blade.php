@extends('master.master')
@section('css')
<link href="{{asset('assets')}}/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
<link href="{{asset('assets')}}/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">

@endsection
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">All CRM</h4>
                        <p class="card-title-desc">The Buttons extension for DataTables
                            provides a common set of options, API methods and styling to display
                            buttons on a page that will interact with a DataTable. The core library
                            provides the based framework upon which plug-ins can built.
                        </p>

                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive wrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead class="bg-dark text-white">
                                <tr>

                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Action</th>

                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($crms as $crm)
                                    <tr>
                                        <td>{{$crm->name}}</td>
                                        <td>{{$crm->address}}</td>

                                        <td class="d-flex flex-row">
                                            <a href="{{route('super_admin.crm.add.employee',$crm->id)}}" class="btn btn-success"><i class="fas fa-user-shield"></i></a>
                                            <a href="{{route('super_admin.crm.edit',$crm->id)}}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                            <form method="POST" action="{{route('super_admin.crm.delete')}}">
                                                @csrf
                                                <input type="text" name="crm_id" hidden value="{{$crm->id}}">
                                                <button type="submit"  class="btn btn-danger show_confirm" data-toggle="tooltip"><i class="far fa-trash-alt"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div>
</div>
@endsection

@section('script')


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script src="{{asset('assets')}}/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{asset('assets')}}/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('assets')}}/js/pages/datatables.init.js"></script>

<script src="{{asset('assets')}}/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{asset('assets')}}/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>

<script>

    $(".show_confirm").click(function(e)
    {

        e.preventDefault();
        var form =  $(this).closest("form");
            swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this CRM!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        swal("Poof! Your CRM file has been deleted!", {
                        icon: "success",
                        });
                        form.submit();

                    } else {
                        swal({
                            title: "Your imaginary file is safe!",
                            text: " ",
                            icon: "info",

                        });
                    }
            });
    });




</script>
@endsection
