@if (session()->has('error'))
        <aside class="content-header">
              <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close delete" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                        {{ session('error') }}

              </div>
          </aside>
@endif
@if (session()->has('success'))
        <aside class="content-header">

              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close delete" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                {{ session('success') }}
              </div>
</aside>
@endif








