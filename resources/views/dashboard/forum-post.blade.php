@extends('templates.layout')
@section('title') Forum: @if(!empty($post)) {{ $post->title }} @endif @endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Forum
        <small>13 new messages</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">forum</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-9">
        @if(!empty($post))
                <div class="box">
        <div class="box-header with-border">
          <h2 class="box-title">{{ $post->title }}</h2>

          <div class="box-tools pull-right">
           
          </div>
        </div>
        <div class="box-body">

                                    <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle" src="https://i.pravatar.cc/200?img={{ $post->user->id }}" alt="User Image">
                        <span class="username">
                          <a href="#">{{ $post->user->name }}</a>
                        </span>
                    <span class="description">{{ $post->created_at->diffForHumans() }}</span>
                  </div>
                  <!-- /.user-block -->
     
                @if(!empty($showBody))
                <p>
                {!! html_entity_decode($post->body) !!}
					</p>
                @endif


                </div>
                <!-- /.post -->
                    
                    
                    </div>
        <!-- /.box-body -->
        <div class="box-footer">
          
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
                    @endif

            <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">5 reacties</h3>

          <div class="box-tools pull-right">
           
          </div>
        </div>
        <div class="box-body">

                                    <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle" src="https://i.pravatar.cc/200?img=3" alt="User Image">
                        <span class="username">
                          <a href="#">Sarah Ross</a>
                        </span>
                    <span class="description">13 juli - 12:25</span>
                  </div>
                  <!-- /.user-block -->
                  <p>
                    Lorem ipsum represents a long-held tradition for designers,
                    typographers and the like. Some people hate it and argue for
                    its demise, but others ignore the hate as they create awesome
                    tools to help create filler text for everyone from bacon lovers
                    to Charlie Sheen fans.
                  </p>


                </div>
                <!-- /.post -->
                    
                                                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle" src="../../dist/img/user7-128x128.jpg" alt="User Image">
                        <span class="username">
                          <a href="#">Sarah Ross</a>
                        </span>
                    <span class="description">13 juli - 12:25</span>
                  </div>
                  <!-- /.user-block -->
                  <p>
                    Lorem ipsum represents a long-held tradition for designers,
                    typographers and the like. Some people hate it and argue for
                    its demise, but others ignore the hate as they create awesome
                    tools to help create filler text for everyone from bacon lovers
                    to Charlie Sheen fans.
                  </p>


                </div>
                <!-- /.post -->
            
                                                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle" src="../../dist/img/user7-128x128.jpg" alt="User Image">
                        <span class="username">
                          <a href="#">Sarah Ross</a>
                        </span>
                    <span class="description">13 juli - 12:25</span>
                  </div>
                  <!-- /.user-block -->
                  <p>
                    Lorem ipsum represents a long-held tradition for designers,
                    typographers and the like. Some people hate it and argue for
                    its demise, but others ignore the hate as they create awesome
                    tools to help create filler text for everyone from bacon lovers
                    to Charlie Sheen fans.
                  </p>


                </div>
                <!-- /.post -->
            
                                                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle" src="../../dist/img/user7-128x128.jpg" alt="User Image">
                        <span class="username">
                          <a href="#">Sarah Ross</a>
                        </span>
                    <span class="description">13 juli - 12:25</span>
                  </div>
                  <!-- /.user-block -->
                  <p>
                    Lorem ipsum represents a long-held tradition for designers,
                    typographers and the like. Some people hate it and argue for
                    its demise, but others ignore the hate as they create awesome
                    tools to help create filler text for everyone from bacon lovers
                    to Charlie Sheen fans.
                  </p>


                </div>
                <!-- /.post -->
            
                                                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle" src="../../dist/img/user7-128x128.jpg" alt="User Image">
                        <span class="username">
                          <a href="#">Sarah Ross</a>
                        </span>
                    <span class="description">13 juli - 12:25</span>
                  </div>
                  <!-- /.user-block -->
                  <p>
                    Lorem ipsum represents a long-held tradition for designers,
                    typographers and the like. Some people hate it and argue for
                    its demise, but others ignore the hate as they create awesome
                    tools to help create filler text for everyone from bacon lovers
                    to Charlie Sheen fans.
                  </p>


                </div>
                <!-- /.post -->
            
            
                    
                    </div>
        <!-- /.box-body -->
        <div class="box-footer">
  
            

        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
            
            
        </div>
        <!-- /.col -->
          
          <div class="col-md-3">
          <a href="compose.html" class="btn btn-primary btn-block margin-bottom">Nieuw bericht</a>

          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Folders</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
       
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
 
        </div>
        <!-- /.col -->
        </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
    @endsection

