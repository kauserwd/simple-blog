@include('home.inc.header')
@include('home.inc.homestyle')
@include('home.banner')
<div class="services_section layout_padding">
    <div class="container">
        <h1 class="services_taital">{{$post->title}} </h1>
        <div class="services_section_2">
            <div class="row">
                <div class="col-md-4">
                    <div><img style="height:300px; width 300px !importent" src="postimage/{{$post->image}}"
                            class="services_img"></div>
                    <p class="services_text"></p>
                    <p>Post by <b>{{$post->name}}</b></p>
                    <p>{{$post->description}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@include('home.inc.footer')