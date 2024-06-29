@extends('admin.admin_dashboard') @section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Update Website</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Update Website Content
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="container">
            <div class="main-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <form action="{{route('update.homepage.details')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $data->id }}">
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Main Heading</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="headertext" class="form-control"
                                                value="{{ $data->headertext }}" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Main Paragrapgh</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <textarea name="headerparagraph" id="" rows="3" class="form-control">{{ $data->headerparagraph }}</textarea>

                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Whatsapp Link</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="whatsappnumber" class="form-control"
                                                value="{{ $data->whatsappnumber }}" />
                                        </div>
                                    </div>

                                    <h3 class="mt-2 mb-4">Why Choose Us?</h3>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Description</h6>

                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <textarea name="whychooseusdescription" id="" rows="3" class="form-control">{{ $data->whychooseusdescription }}</textarea>

                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Why Choose Us Side Image</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="file" name="whychooseusimage" id="images" class="form-control" />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0"></h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <img id="showImages" src="{{ asset($data->whychooseusimage) }}" alt="Admin"
                                            width="280" height="200">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">images</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="file" name="homeimage" id="image" class="form-control" />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0"></h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <img id="showImage" src="{{ asset($data->homeimage) }}" alt="Admin"
                                                 width="280" height="200">
                                        </div>
                                    </div>

                                    <h3 class="mt-2 mb-4">Services</h3>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6>First service Title</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" 
                                                name="servicetitleone" value="{{ $data->servicetitleone }}" />

                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6>First service Paragrapgh</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" 
                                                name="serviceparaone" value="{{ $data->serviceparaone }}" />

                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6>Second service Title</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="servicetitltwo" class="form-control"
                                                 value="{{ $data->servicetitltwo }}" />

                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6>Second service Paragrapgh</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="serviceparatwo" class="form-control"
                                               value="{{ $data->serviceparatwo }}" />

                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6>Third service Title</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="servicetitlethree" class="form-control"
                                               value="{{ $data->servicetitlethree }}" />

                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6>Third service Paragrapgh</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="serviceparathree" class="form-control"
                                                value="{{ $data->serviceparathree }}" />

                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Service Background Image</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="file" name="serviceimage" id="imagess" class="form-control" />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0"></h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <img id="showImagess" src="{{ asset($data->serviceimage) }}" alt="Admin"
                                            width="280" height="200">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Destination Title</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="thirdheading" class="form-control"
                                                value="{{ $data->thirdheading }}" />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Destination Paragrapgh</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <textarea name="thirdparagrapgh" rows="3" class="form-control">{{ $data->thirdparagrapgh }}
                                            </textarea>

                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Package Title</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="bestpackheading" class="form-control"
                                                value="{{ $data->bestpackheading }}" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Package Paragrapgh</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">

                                            <textarea name="bestpackpara" rows="3"  class="form-control">{{ $data->bestpackpara }} 
                                                </textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="submit" class="btn btn-primary px-4" value="Save Changes" />
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
      <script type="text/javascript">
        $(document).ready(() => {
            $("#images").change((e) => {
                var reader = new FileReader();
                reader.onload = (e) => {
                    $("#showImages").attr("src", e.target.result);
                };
                reader.readAsDataURL(e.target.files["0"]);
            });
        });
    </script>
     <script type="text/javascript">
        $(document).ready(() => {
            $("#imagess").change((e) => {
                var reader = new FileReader();
                reader.onload = (e) => {
                    $("#showImagess").attr("src", e.target.result);
                };
                reader.readAsDataURL(e.target.files["0"]);
            });
        });
    </script>
@endsection
