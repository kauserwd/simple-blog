@include('admin.inc.header') 
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
        <section class="no-padding-top">
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-12">
                <div class="block margin-bottom-sm">
                  <div class="title"><strong>Basic Table</strong>
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
                  <div class="table-responsive"> 
                    <table class="table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Title</th>
                          <th>Description</th>
                          <th>Image</th>
                          <th>Name</th>
                          <th>Post Status</th>
                          <th>User Type</th>
                          <th>Post Update/Delete</th>
                          <th>Post Accept/Reject</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($post  as $post)
                        <tr>
                          <th scope="row">{{$post->id}}</th>
                          <td>{{$post->title}}</td>
                          <td>{{$post->description}}</td>
                          <td><img style="height:50px; width:50px; padding:5px" src="postimage/{{$post->image}}" alt=""></td>
                          <td>{{$post->name}}</td>
                          <td>{{$post->post_status}}</td>
                          <td>{{$post->usertype}}</td>
                          <td>
                           <a href="{{url('post_update',$post->id )}}" class="btn btn-success">Update</a>
                           <a href="{{url('post_delete',$post->id )}}" class="btn btn-danger" onclick="return confirm('Are you sure to delete this?')">Delete</a>
                          </td>
                          <td>
                           <a href="{{url('post_accept',$post->id )}}" class="btn btn-success">Accept</a>
                           <a href="{{url('post_reject',$post->id )}}" class="btn btn-danger" >Reject</a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              @include('admin.inc.footer')