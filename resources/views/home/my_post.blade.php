<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
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
            <h1 class="contact_taital">Your Posts</h1>
            <span class="d-block">
                @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="" class="" data-dismiss="alert" aria-hideen="true"></button>
                    {{session()->get('message')}}
                </div>
                @endif
            </span>
            <div class="services_section_2">
                <div class="row">
                    @foreach($data as $data)
                    <div class="col-md-4">
                        <div><img style="height:300px; width 300px !importent" src="postimage/{{$data->image}}"
                                class="services_img"></div>
                        <p class="services_text">{{$data->title}}</p>
                        <p>Post by <b>{{$data->name}}</b></p>

                        <div class=" btn btn-danger"><a  onclick="return confirm('Are you sure to delete your post')"href="{{url('delete_mypost', $data->id)}}">Delete</a></div>
                        <div class=" btn btn-primary"><a  href="{{url('update_mypost_view', $data->id)}}">Update</a></div>
                    </div>
                    @endforeach

                </div>
            </div>

        </div>
    </div>
    </div>
    <!-- contact section end -->
    <!-- footer section start -->
    @include('home.inc.footer')