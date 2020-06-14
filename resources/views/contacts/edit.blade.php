@extends('base')
@section('main')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Editace CD</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <br />
            @endif
            <form method="post" action="{{ route('contacts.update', $contact->id) }}" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="form-group">

                    <label for="name">Název:</label>
                    <input type="text" class="form-control" name="name" value={{ $contact->name }} />
                </div>

                <div class="form-group">
                    <label for="interpret">Interpret:</label>
                    <input type="text" class="form-control" name="interpret" value={{ $contact->interpret }} />
                </div>

                <div class="form-group">
                    <label for="genre">Žánr:</label>
                    <input type="text" class="form-control" name="genre" value={{ $contact->genre }} />
                </div>
                <div class="form-group">
                    <label for="release_year">Rok vydání:</label>
                    <input type="text" class="form-control" name="release_year" value={{ $contact->release_year }} />
                </div>
                <div class="form-group">
                    <label for="obal">Obal:</label>
                    <input type="file" name="obal" class="form-control" value="{{$contact->obal}}">
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
