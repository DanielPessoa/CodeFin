@if($errors->any())
   <div class="col s8">
        <ul class="collection">
            <li class="collection-item red white-text"><strong>Foram encontrados os seguintes errors:</strong></li>
            @foreach($errors->all() as $error)
                <li class="collection-item red white-text">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
