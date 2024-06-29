@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <!--breadcrumb-->

        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Room</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">All Package list </li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    {{-- <a href="{{ route('add.room.type') }}" class="btn btn-primary px-5">Add Room
                        Type</a> --}}
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Add Package</button>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->
        <h6 class="mb-0 text-uppercase">Room Type list</h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Images</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($allData as $key => $item)
                                @php
                                    $packages = App\Models\PackageDetail::where('packagetype_id', $item->id)->get();
                                @endphp
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td><img src="{{ !empty($item->pack->image) ? url('upload/packageimage/', $item->pack->image) : url('upload/no_image.jpg') }}"
                                            style="width:44px; height:30px;">
                                    </td>
                                    <td>{{ $item->name }}</td>
                                    @foreach ($packages as $pac)
                                        <td>
                                            <div class="d-flex order-actions">
                                                <a href="{{ route('edit.package', $pac->id) }}" class=""><i
                                                        class="bx bxs-edit"></i></a>
                                                <a href="{{ route('delete.package', $pac->id) }}" class="ms-3"
                                                    id="delete"><i class="bx bxs-trash"></i></a>
                                            </div>
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Room Type</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="myForm" action="{{ route('package.name.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Room Name</h6>
                                </div>
                                <div class="form-group col-sm-9 text-secondary">
                                    <input type="text" name="name" class="form-control" />
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="submit" id="saveButton" class="btn btn-dark px-4" value="Save Changes" />
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    @endsection
