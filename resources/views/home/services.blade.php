<div class="services_section layout_padding">
         <div class="container">
            <h1 class="services_taital">Blog Post </h1>
            <p>There are many lorem ipsom text for read</p>
            <div class="services_section_2">
               <div class="row">
                  @foreach($post as $post)
                  <div class="col-md-4">
                     <div><img style="height:300px; width 300px !importent" src="postimage/{{$post->image}}" class="services_img"></div>
                     <p class="services_text">{{$post->title}}</p>
                         <p>Post by <b>{{$post->name}}</b></p>

                     <div class="btn_main"><a href="{{url('post_details', $post->id)}}">Read More</a></div>
                  </div>
                  @endforeach

               </div>
            </div>
         </div>
      </div>