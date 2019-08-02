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
                              <div class="box">


             @include('dashboard.partials.forum.post', [
                'post' => $post,
                'showBody' => true,
                'allowResponse' => true
            ])
			</div>
                                     <div class="box">
										        <div class="box-header with-border">
          <h3 class="box-title">5 reacties</h3>

          <div class="box-tools pull-right">

          </div>
        </div>

        @forelse($post->responses as $response)
                @include('dashboard.partials.forum.post', [
                    'post' => $response,
                    'showBody' => true,
                    'allowResponse' => false
                ])
            @empty
            @endforelse
			</div>

            @include('dashboard.partials.forum.response', ['post' => $post])



		  </div>
         <!-- /.col -->
        </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
    @endsection

