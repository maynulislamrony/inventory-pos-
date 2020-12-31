@extends('layout.app')
@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Attendence List</li>
    </ol>
</nav>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->any() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="page-content fade-in-up">
    <div class="card shadow">
        <div class="card-header cardB">
            <div class="row">
                <h4 class="col-md-6 heading_h4">All Attendence List</h4>
                <div class="col-md-6">
                    <a href="{{route('taken.attendence')}}" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus"></i>Taken</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                <thead style="background-color: rgb(219, 216, 216)">
                    <tr>
                        <th>Sr</th>
                        <th>Date</th>
                        <th>Aciton</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($attendence as $key=> $row)
                        <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$row->date}}</td>
                        <td>
                            <a href="{{route('edit.attendence', $row->date)}}" class="badge badge-pill badge-primary"><i class="fa fa-pencil"></i></a>
                            <a href="#" data-href="{{$row->date}}" class="badge badge-pill badge-danger"  data-toggle="modal" data-target="#logoutModal"><i class="fa fa-trash"></i></a>
                            <a href="{{route('view.attendence',$row->date)}}" class="badge badge-pill badge-success"><i class="fa fa-eye"></i></a>
                        </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header bg-danger text-white">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Delete?</h5>
            <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">Select "DELETE" below if you are delete this Data.
            <form action="{{route('delete.attendence')}}" method="POST">
                @csrf
                <input type="hidden" id="input" name="id" value="">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection