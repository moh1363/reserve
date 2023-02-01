@if(session('success'))

    <div class="alert alert-success alert-dismissible fade show" role="alert">

        <strong>{{session('success')}}</strong>

        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

    </div>                    @endif
@if(session('warning'))

    <div class="alert alert-danger alert-dismissible fade show" role="alert">

        <strong>{{session('warning')}}</strong>

        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">

            <span aria-hidden="true">&times;</span>

        </button>

    </div>                    @endif
