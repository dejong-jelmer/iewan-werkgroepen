@extends('templates.layout')
@section('title') Forum @endsection
@section('content')

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



@include('dashboard.partials.forum.create-post')

    <section class="content">
      <div class="row">
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Inbox</h3>

              <div class="box-tools pull-right">
                  1-50/200
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                  </div>
                  <!-- /.btn-group -->

              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">

              <div class="table-responsive forum-messages">
                <table class="table table-hover table-striped">
                  <tbody>
    @forelse($posts as $post)
        @include('dashboard.partials.forum.post', [
                'post' => $post,
                'showBody' => false,
                'allowResponse' => false
            ])
    @empty
        <p>Geen berichten op het forum</p>
    @endforelse
               </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <div class="forum-controls">
                <div class="pull-right">
                  1-50/200
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                  </div>
                  <!-- /.btn-group -->
                </div>
                <!-- /.pull-right -->
              </div>
            </div>
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
          
          <div class="col-md-3">
			  <button href="compose.html" class="btn btn-primary btn-block margin-bottom toggle-forumpost-field">Nieuw bericht</button>

          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Folders</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->

          <!-- /.box -->
        </div>
        <!-- /.col -->
        </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

@endsection


