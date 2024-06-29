@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <div class="page-content">
        <div class="container">
            <div class="main-body">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-tabs nav-primary" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab"
                                        aria-selected="true">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-icon"><i class="bx bx-home font-18 me-1"></i>
                                            </div>
                                            <div class="tab-title">Manage Package </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content py-3">
                                <div class="tab-pane fade active show" id="primaryhome" role="tabpanel">
                                    <div class="col-xl-12 mx-auto">

                                        <div class="card">
                                            <div class="card-body p-4">
                                                <h5 class="mb-4">Update Package</h5>
                                                <form method="POST" enctype="multipart/form-data" class="row g-3"
                                                    action="{{ route('update.package', $editData->id) }}">
                                                    @csrf
                                                    <div class="col-md-4">
                                                        <label for="input1" class="form-label">Package Name</label>
                                                        <input type="text" class="form-control" name="name"
                                                            value="{{ $editData['type']['name'] }}">
                                                        <input type="hidden" class="form-control" name="packagetype_id">
                                                    </div>
                                                   
                                                    <div class="col-md-6">
                                                        <label for="input3" class="form-label">Main Image</label>
                                                        <input type="file" class="form-control" id="image"
                                                            name="image">
                                                        <img id="showImage"
                                                            src="{{ !empty($editData->image) ? url('upload/packageimage/' . $editData->image) : url('upload/no_image.jpg') }}"
                                                            alt="Admin" class=" bg-primary" width="60" />
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="input5" class="form-label">Price</label>
                                                        <input type="text" class="form-control" id="input5"
                                                            value="{{ $editData->price }}" name="price">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="hidden" class="form-control" id="input5"
                                                            value="{{ $editData->discount }}" name="discount">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="title" class="form-label">Title</label>
                                                        <input type="text" class="form-control" id="title"
                                                            value="{{ $editData->title }}" name="maintitle">
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label for="input11" class="form-label">Short
                                                            Desrcription</label>
                                                        <textarea class="form-control" id="input11" name="short_desc" rows="3"> {{ $editData->short_desc }} </textarea>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label for="input11" class="form-label">Inclusions</label>
                                                        <textarea class="form-control" id="input11" name="inclusions" rows="3"> {{ $editData->inclusions }} </textarea>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label for="input11" class="form-label">Exclusions</label>
                                                        <textarea class="form-control" id="input11" name="exclusions" rows="3"> {{ $editData->exclusions }} </textarea>
                                                    </div>
                                               

                                                    <br>

                                                    <h3 style="text-transform: uppercase;">Itinarary</h3>
                                                    <div class="container">
                                                        <div class="row">
                                                            @forelse ($itinerary as $item)
                                                                <div class="col-md-6">
                                                                    <div class="basic_facility_section_remove"
                                                                        id="basic_facility_section_remove">
                                                                        <div class="row add_itenary">
                                                                            <div class="col-md-12">
                                                                                <label for="basic_facility_name"
                                                                                    class="form-label mt-2 mb-2">Day Plan
                                                                                </label>
                                                                                <br>
                                                                                <label
                                                                                    class="form-label mt-2 mb-2">Title</label>
                                                                                <input type="text"
                                                                                    class="form-control mt-2 mb-2"
                                                                                    value="{{ $item->title }}"
                                                                                    name="title[]">
                                                                                <label
                                                                                    class="form-label mt-2 mb-2">Day</label>
                                                                                <input type="text"
                                                                                    class="form-control mt-2 mb-2"
                                                                                    name="day_number[]"
                                                                                    value="{{ $item->day_number }}">
                                                                                <label for="from"
                                                                                    class="form-label mt-2 mb-2">from</label>

                                                                                <input type="text"
                                                                                    class="form-control mt-2 mb-2"
                                                                                    name="from_destination[]"
                                                                                    value="{{ $item->from_destination }}">
                                                                                <label for="from"
                                                                                    class="form-label mt-2 mb-2">to</label>

                                                                                <input type="text"
                                                                                    class="form-control mt-2 mb-2"
                                                                                    name="to_destination[]"
                                                                                    value="{{ $item->to_destination }}">


                                                                                <label for="from"
                                                                                    class="form-label mt-2 mb-2">Short
                                                                                    Discription</label>
                                                                                <textarea name="description[]" class="form-control mt-2 mb-2" id="" cols="30" rows="4">{{ $item->description }}</textarea>
                                                                                {{-- <input type="file" class="form-control"
                                                                        name="image_url[]"> --}}
                                                                            </div>
                                                                            <div class="form-group"
                                                                                style="padding-top: 30px">
                                                                                <a
                                                                                    class="btn btn-success addeventmoreiternary"><i
                                                                                        class="lni lni-circle-plus"></i></a>

                                                                                <a
                                                                                    href="{{ route('delete.saved.pack', $item->id) }}">
                                                                                    <span
                                                                                        class="btn btn-danger removeeventmoreiternary"><i
                                                                                            class="lni lni-circle-minus"></i></span>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @empty
                                                                <div class="col-md-6">
                                                                    <div class="basic_facility_section_remove"
                                                                        id="basic_facility_section_remove">
                                                                        <div class="row add_itenary">
                                                                            <div class="col-md-12">
                                                                                <label for="basic_facility_name"
                                                                                    class="form-label mt-2 mb-2">Day Plan
                                                                                </label>
                                                                                <label
                                                                                    class="form-label mt-2 mb-2 ">Title</label>
                                                                                <input type="text"
                                                                                    class="form-control mt-2 mb-2"
                                                                                    name="title[]">
                                                                                <label for=""
                                                                                    class="form-label mt-2 mb-2">Day</label>
                                                                                <input type="text"
                                                                                    class="form-control mt-2 mb-2"
                                                                                    name="day_number[]">
                                                                                <label for="from"
                                                                                    class="form-label mt-2 mb-2">from</label>
                                                                                <input type="text"
                                                                                    class="form-control mt-2 mb-2"
                                                                                    name="from_destination[]"
                                                                                    value="">
                                                                                <label for="from"
                                                                                    class="form-label mt-2 mb-2">to</label>

                                                                                <input type="text"
                                                                                    class="form-control mt-2 mb-2"
                                                                                    name="to_destination[]"
                                                                                    value="">
                                                                                <label for="from"
                                                                                    class="form-label mt-2 mb-2">to</label>


                                                                                <label for="from"
                                                                                    class="form-label mt-2 mb-2">Short
                                                                                    Description</label>
                                                                                <textarea name="description[]" name="title[]"class="form-control mt-2 mb-2" id="" cols="30"
                                                                                    rows="4"></textarea>
                                                                                {{-- <input type="file" class="form-control mt-2 mb-2"
                                                                        name="image_url[]"> --}}
                                                                            </div>
                                                                            <div class="form-group"
                                                                                style="padding-top: 30px">
                                                                                <a
                                                                                    class="btn btn-success addeventmoreiternary"><i
                                                                                        class="lni lni-circle-plus"></i></a>

                                                                                <span
                                                                                    class="btn btn-danger removeeventmoreiternary"><i
                                                                                        class="lni lni-circle-minus"></i></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforelse
                                                            <div style="display:none;">
                                                                <div class="whole_extra_itenary_add"
                                                                    id="whole_extra_itenary_add">
                                                                    <div class="basic_itenary_section_remove"
                                                                        id="basic_itenary_section_remove">
                                                                        <div class="container mt-2">
                                                                            <div class="row">
                                                                                <div class="form-group col-md-12">
                                                                                    <label for="basic_facility_name"
                                                                                        class="form-label mt-2 mb-2">Day
                                                                                        Plan
                                                                                    </label>
                                                                                    <label
                                                                                        class="form-label mt-2 mb-2 ">Title</label>
                                                                                    <input type="text"
                                                                                        class="form-control mt-2 mb-2"
                                                                                        name="title[]">
                                                                                    <label for=""
                                                                                        class="form-label mt-2 mb-2">Day</label>
                                                                                    <input type="text"
                                                                                        class="form-control mt-2 mb-2"
                                                                                        name="day_number[]">
                                                                                    <label for="from"
                                                                                        class="form-label mt-2 mb-2">from</label>
                                                                                    <input type="text"
                                                                                        class="form-control mt-2 mb-2"
                                                                                        name="from_destination[]"
                                                                                        value="">
                                                                                    <label for="from"
                                                                                        class="form-label mt-2 mb-2">to</label>

                                                                                    <input type="text"
                                                                                        class="form-control mt-2 mb-2"
                                                                                        name="to_destination[]"
                                                                                        value="">
                                                                                    <label for="from"
                                                                                        class="form-label mt-2 mb-2">to</label>
                                                                                    <label for="from"
                                                                                        class="form-label mt-2 mb-2">Short
                                                                                        Description</label>
                                                                                    <textarea name="description[]" name="title[]"class="form-control mt-2 mb-2" id="" cols="30"
                                                                                        rows="4"></textarea>
                                                                                    {{-- <input type="file" class="form-control mt-2 mb-2"
                                                                                name="image_url[]"> --}}
                                                                                </div>

                                                                                <div class="form-group"
                                                                                    style="padding-top: 30px">
                                                                                    <a
                                                                                        class="btn btn-success addeventmoreiternary"><i
                                                                                            class="lni lni-circle-plus"></i></a>

                                                                                    <span
                                                                                        class="btn btn-danger removeeventmoreiternary"><i
                                                                                            class="lni lni-circle-minus"></i></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <script type="text/javascript">
                                                        $(document).ready(function() {
                                                            var counter = 0;
                                                            $(document).on("click", ".addeventmoreiternary", function() {
                                                                var whole_extra_itenary_add = $("#whole_extra_itenary_add").html();
                                                                $(this).closest(".add_itenary").append(whole_extra_itenary_add);
                                                                counter++;
                                                            });
                                                            $(document).on("click", ".removeeventmoreiternary", function(event) {
                                                                $(this).closest("#basic_itenary_section_remove").remove();
                                                                counter -= 1;
                                                            });
                                                        });
                                                    </script>
                                                    <div class="col-md-12">
                                                        <div class="d-md-flex d-grid align-items-center gap-3">
                                                            <button type="submit" class="btn btn-primary px-4">Save
                                                                Changes</button>

                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        /* Styles for the common structure */
        .basic_facility_section_remove {
            margin-bottom: 20px;
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 5px;
            box-sizing: border-box;
        }

        /* Styles for labels */
        .form-label {
            font-weight: bold;
            text-transform: capitalize;
        }

        /* Styles for form controls */
        .form-control,
        .form-select {
            width: 100%;
            margin-top: 5px;
            margin-bottom: 10px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        /* Styles for textarea */
        .form-control[rows] {
            resize: vertical;
        }

        /* Styles for buttons */
        .btn-success,
        .btn-danger {
            margin-top: 10px;
            cursor: pointer;
        }

        /* Adjust layout for smaller screens */
        @media (max-width: 768px) {
            .add_itenary .col-md-6 {
                flex: 0 0 100%;
                box-sizing: border-box;
            }
        }
    </style>

    <script></script>
    {{-- to add facility --}}

    <script type="text/javascript">
        $(document).ready(function() {
            var counter = 0;
            $(document).on("click", ".addeventmore", function() {
                var whole_extra_item_add = $("#whole_extra_item_add").html();
                $(this).closest(".add_item").append(whole_extra_item_add);
                counter++;
            });
            $(document).on("click", ".removeeventmore", function(event) {
                $(this).closest("#basic_facility_section_remove").remove();
                counter -= 1
            });
        });
    </script>
    {{-- to show image  --}}
    <script type="text/javascript">
        $(document).ready(() => {
            $("#image").change((e) => {
                var reader = new FileReader();
                reader.onload = (e) => {
                    $("#showImage").attr("src", e.target.result);
                };
                reader.readAsDataURL(e.target.files["0"]);
            });
        });
    </script>
@endsection
