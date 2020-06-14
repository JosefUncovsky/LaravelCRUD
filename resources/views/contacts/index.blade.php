@extends('base')

@section('main')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="display-3">Prohlížeč CD</h1>
            <table class="table table-striped">
                <thead>

                <tr>
                    <td>Obal</td>
                    <td> @sortablelink('name')</td>
                    <td> @sortablelink('interpret')</td>
                    <td> @sortablelink('genre')</td>
                    <td> @sortablelink('release_year')</td>
                    <td colspan = 2>Akce</td>
                </tr>
                </thead>

                <div id="NovyZaznam">

                    <a style="margin: 19px;" href="{{ route('contacts.create')}}" class="btn btn-primary">Nový záznam</a>

                </div>

                <tbody>
                <div class="col-sm-12">

                    @if(session()->get('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                </div>
                @foreach($contacts as $contact)
                    <tr>

                        <td><img src="{{$contact->obal}}" width="100" height="100"/></td>
                        <td>{{$contact->name}}</td>
                        <td>{{$contact->interpret}}</td>
                        <td>{{$contact->genre}}</td>
                        <td>{{$contact->release_year}}</td>
                        <!--Session::get('path')-->

                        <td>
                            <a href="{{ route('contacts.edit',$contact->id)}}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('contacts.destroy', $contact->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Smazat</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div>
            </div>
@endsection
