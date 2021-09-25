@extends('pages.admin.layouts.master')
@section('content')
    <div class="container-fluid py-3">

        <div class="row justify-content-center mb-4">
            <div class="col-md-10">
                @if(session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                        <strong>{{ session('message')}}</strong>
                        <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                    </div>
                @elseif(session()->has('danger'))
                    <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                        <strong>{{ session('danger') }}</strong>
                        <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                    </div>
                @endif
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-1"></div>
            <div class="col-md-5">
                <a href="{{ route('admin.photobook.create') }}" class="btn btn-kalografi btn-icon-split">
                    <div class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </div>
                    <div class="text">Add New Photobook</div>
                </a>
            </div>
            <div class="col-md-6"></div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="card shadow-sm mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-kalografi">All Photobooks</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover" id="photobookTable" aria-describedby="photobookTable"
                                   style="font-size: 14px;">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($photobooks as $photobook)
                                    <tr>
                                        <th scope="row">{{ $loop->index + 1 }}</th>
                                        <td>{{ $photobook->photobook }}</td>
                                        <td>{{ 'Rp. ' . number_format($photobook->price) }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.photobook.edit', $photobook->id) }}"
                                               class="btn btn-sm btn-outline-secondary">
                                                Edit
                                            </a>
                                            <button type="button" class="btn-sm btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deletePhotobookModal">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>

    <!-- Delete Modal-->
    <div class="modal fade" id="deletePhotobookModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" >
                <div class="modal-body">
                    <p class="modal-title text-danger">
                        Are you sure want to delete this photobook?
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a class="btn btn-sm btn btn-danger" href="{{ route('admin.photobook.destroy', $photobook->id) }}"
                       onclick="event.preventDefault(); document.getElementById('deletePhotobookForm').submit();">
                        Yes, delete this photobook
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Delete Modal-->

    <form id="deletePhotobookForm" action="{{ route('admin.photobook.destroy', $photobook->id) }}" method="POST" class="d-none">
        @csrf
        @method('DELETE')
    </form>

@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $('#photobookTable').DataTable();
        });
    </script>
@endsection