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
@include('admin.inc.body')       
@include('admin.inc.footer')