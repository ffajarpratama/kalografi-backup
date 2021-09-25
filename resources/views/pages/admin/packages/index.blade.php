@extends('pages.admin.layouts.master')
@section('content')
    <div class="container-fluid py-3">
        <div class="row mb-4">
            <div class="col-md-1"></div>
            <div class="col-md-5">
                <a href="{{ route('admin.paket.create') }}" class="btn btn-kalografi btn-icon-split">
                    <div class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </div>
                    <div class="text">Add New Package</div>
                </a>
            </div>
            <div class="col-md-6"></div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="card shadow-sm mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-kalografi">All Packages</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover" id="packageTable" aria-describedby="packageTable"
                                   style="font-size: 14px;">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Work Duration</th>
                                    <th scope="col">Day</th>
                                    <th scope="col">Price</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($packages as $package)
                                    <tr>
                                        <th scope="row">{{ $loop->index + 1 }}</th>
                                        <td>{{ $package->namapaket }}</td>
                                        <td>{{ $package->kategori }}</td>
                                        <td>{{ $package->workhours . ' Hours' }}</td>
                                        <td>{{ $package->day }}</td>
                                        <td>{{ 'Rp. ' . number_format($package->price) }}</td>
                                        <td class="text-center">
                                            <form action="{{ route('admin.paket.destroy', $package->id) }}"
                                                  method="POST">
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('admin.paket.edit', $package->id) }}"
                                                       class="btn btn-sm btn-outline-secondary">
                                                        Edit
                                                    </a>

                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                                        Delete
                                                    </button>
                                                </div>
                                            </form>
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
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $('#packageTable').DataTable();
        });
    </script>
@endsection
