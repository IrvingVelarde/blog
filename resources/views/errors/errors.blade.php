@if(count($errors))            
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endif