@extends('templates.layout')
@section('title') leden @endsection
@section('content')

  <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Bewoners
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Bewoners</li>
      </ol>
    </section>
    
    
        <!-- Main content -->
    <section class="content">
   
         <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Responsive Hover Table</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>ID</th>
                  <th>Avatar</th>
                  <th>Naam</th>
                  <th>Email</th>
                  <th>Werkgroepen</th>
                </tr>
                
                
                      @forelse($users as $user)
                     <tr>

                    @include('workgroup.partials.user', [
                            'user' => $user
                        ])
                </tr>
                   <!-- /.row -->
            @empty
                <p>De werkgroep heeft (nog) geen leden</p>
            @endforelse
               
      </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
   
   
</section>
   

    <!-- /.content -->
  <!-- /.content-wrapper -->
      
     @endsection




