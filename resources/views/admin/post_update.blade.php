@include('admin.inc.header') 
@include('admin.inc.adminstyle')
    
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
@include('admin.inc.sidebar')  
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Dashboard</h2>
          </div>
        </div>
<div class="col-lg-6">
                <div class="block">
                  <div class="title"><strong class="d-block">Add Post</strong>
                  <span class="d-block">
                    @if(session()->has('message'))
                      <div class="alert alert-success">
                        <button type="" class="" data-dismiss="alert"
                        aria-hideen="true"></button>
                        {{session()->get('message')}}
                      </div>
                    @endif
                  </span>
                </div>
                  <div class="block-body">
                    <form class="form-horizontal" action="{{url('post_update_edit', $post->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf  
                    <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Post Title</label>
                        <div class="col-sm-9">
                          <input id="inputHorizontalSuccess" type="text" name="title" value="{{$post->title}}"
                           class="form-control form-control-success">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Post Description</label>
                        <div class="col-sm-9">
                          <textarea name="description" cols="30" rows="8" 
                          class="form-control form-control-warning" >{{$post->description}}</textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-3 form-control-label">Old Image</label>
                        <div class="col-sm-9">
                        <img style="height:50px; width:50px; padding:5px" src="postimage/{{$post->image}}">
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
              @include('admin.inc.footer')