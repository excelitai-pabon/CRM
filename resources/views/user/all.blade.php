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

                        <h4 class="card-title">Buttons example</h4>
                        <p class="card-title-desc">The Buttons extension for DataTables
                            provides a common set of options, API methods and styling to display
                            buttons on a page that will interact with a DataTable. The core library
                            provides the based framework upon which plug-ins can built.
                        </p>

                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive wrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead class="bg-dark text-white">
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>File No</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td><img src="{{asset('/').$user->member_image}}" alt="" style="height: 50px; width:50px; border-radius:50%;"></td>
                                    <td>{{$user->member_name}}</td>
                                    <td>{{$user->file_no}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->phone_no_1}}</td>
                                    <td>
                                        <a href="{{route('super_admin.user.profile',$user->id)}}" class="btn btn-success"><i class="fas fa-user-shield"></i></a>
                                        <a href="{{route('super_admin.user.edit',$user->id)}}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                        <a href="javascript:void(0)" class="btn btn-danger deleteBtn" data-url="{{route('super_admin.user.delete',$user->id)}}" ><i class="fas fa-trash"></i></a>
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

<script src="{{asset('assets')}}/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{asset('assets')}}/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('assets')}}/js/pages/datatables.init.js"></script>

<script src="{{asset('assets')}}/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{asset('assets')}}/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="{{asset('assets')}}/libs/jszip/jszip.min.js"></script>
<script src="{{asset('assets')}}/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="{{asset('assets')}}/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="{{asset('assets')}}/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="{{asset('assets')}}/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="{{asset('assets')}}/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>


<script>
    $(document).ready(function(){
        $(".deleteBtn").click(function(e) {
          let  url = $(this).attr('data-url');
            e.preventDefault()
            Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                            url: url,
                            type: 'DELETE',
                            dataType : 'json',
                            success : function(res){
                                Swal.fire( 'Success!', 'Your file has been deleted.', 'success')
                                setTimeout(function(){
                                    window.location.reload(1);
                                }, 2000);
                            },
                            error : function(res){
                                Swal.fire( 'Failed!', 'Somethung went wrong.', 'error')
                            },
                    });
                } else {
                    Swal.fire('Safe Now!','Your imaginary file is safe :)', 'info')
                }
            });
        });

    });

</script>

@endsection
