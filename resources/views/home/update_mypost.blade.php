<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <base href="/public">
    @include('home.inc.homestyle')
    
    
</head>

<body>
    <!-- header section start -->
    <div class="header_section">
        <div class="header_main">
            <div class="mobile_menu">
                @include('home.inc.navbar')
            </div>
            <div class="container-fluid">
                <div class="logo"><a href="index.html"><img src="images/logo.png"></a></div>
                <div class="menu_main">
                    <ul>
                        <li class="active"><a href="index.html">Home</a></li>
                        <li><a href="about.html">About</a></li>
                        <li><a href="services.html">Services</a></li>
                        <li><a href="blog.html">Blog</a></li>
                        <li><a href="contact.html">Contact us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- header section end -->
    <!-- contact section start -->
    <div class="contact_section layout_padding">
        <div class="container">
            <h1 class="contact_taital">Add Your Post</h1>
            <div class="email_text">

                   <!--  <span class="d-block">
                        @if(session()->has('message'))
                        <div class="alert alert-success">
                            <button type="" class="" data-dismiss="alert" aria-hideen="true"></button>
                            {{session()->get('message')}}
                        </div>
                        @endif
                    </span> -->
                    @include('sweetalert::alert')
            
                <form class="form-horizontal" action="{{url('update_mypost', $data->id)}}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Post Title</label>
                        <div class="col-sm-9">
                            <input id="inputHorizontalSuccess" type="text" name="title" value="{{$data->title}}"
                                class="form-control form-control-success">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Post Description</label>
                        <div class="col-sm-9">
                            <textarea name="description" id="" cols="30" rows="8"
                                class="form-control form-control-warning">{{$data->description}}</textarea>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Old Image</label>
                        <div class="col-sm-9">
                        <img style="height:300px; width 300px !importent" src="postimage/{{$data->image}}"
                                class="services_img">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Add Image</label>
                        <div class="col-sm-9">
                            <input id="inputHorizontalWarning" type="file" name="image"
                                class="form-control form-control-warning">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-9 offset-sm-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <!-- contact section end -->
    <!-- footer section start -->
    @include('home.inc.footer')