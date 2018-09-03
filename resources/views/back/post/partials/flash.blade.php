@if(Session::has('message'))
    <!-- <div class="alert">
        <p>{{Session::get('message')}}</p>
    </div> -->
    @if(Session::get('message') == 'success')
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Bravo !</strong> Votre liste de post à été mis à jour.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    @if(Session::get('message') == 'success delete')
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        Votre post à été supprimer.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
@endif