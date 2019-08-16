@extends('templates.layout')
@section('title') leden @endsection
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Leden
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Leden</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

            @forelse($workgroup->users as $user)
                     <div class="row">

                    @include('workgroup.partials.user', [
                            'user' => $user
                        ])
                </div>
                   <!-- /.row -->
            @empty
                <p>De werkgroep heeft (nog) geen leden</p>
            @endforelse

          </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

    @endsection
