@extends('base')

@section('main')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Add a contact</h1>
            <div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                @endif
                <form method="post" action="{{ route('contacts.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Název:</label>
                        <input type="text" class="form-control" name="name"/>
                    </div>

                    <div class="form-group">
                        <label for="interpret">Interpret:</label>
                        <input type="text" class="form-control" name="interpret"/>
                    </div>

                    <div class="form-group">
                        <label for="genre">Žánr:</label>
                        <input type="text" class="form-control" name="genre"/>
                    </div>
                    <div class="form-group">
                        <label for="release_year">Rok vydání:</label>
                        <input type="text" class="form-control" name="release_year"/>
                    </div>

                    <button type="submit" class="btn btn-primary-outline">Přidat</button>
                </form>
            </div>
        </div>
    </div>
@endsection
