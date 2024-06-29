@extends('admin.admin_dashboard')
@section('admin')
    {{-- @php
        $allbookingdata = App\Models\Booking::where('combcode', $editData->combcode)->get();

    @endphp --}}
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3"> List</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                    </ol>
                </nav>
            </div>
           
        </div>

        <h6 class="mb-0 text-uppercase">Data of All Contact Messages</h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>S No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Adult</th>
                                <th>Child</th>
                                <th>Message</th>
                                <th>Person</th>
                                <th> Pick-up City</th>
                                <th>Date</th>

                                <th>Time</th>
                                <th>Travel Type</th>

                            </tr>

                        </thead>
                        <tbody>
                           
                            @foreach ($data as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        {{ $item->name }}
                                    </td>
                                    <td>{{$item->email}}</td>
                                    <td>{{ $item->phone }}</td>
                                  
  
                                    <td>{{ $item->adult }}</td>
                                    <td>{{ $item->child }}</td>
                                    <td>{{ $item->message }}</td>
                                    <td>{{ $item->persons }}</td>
                                    <td>{{ $item->pickupcity }}</td>
                                    <td>{{ $item->pickupdate }}</td>
                                    <td>{{ $item->pickuptime }}</td>
                                    <td>{{ $item->traveltype }}</td>


                                   
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection