@extends('layouts.admin')

@section('content')

<h1 class="h3 mb-4 text-gray-800">Templates</h1>

<div class="card shadow mb-4">
    <div class="card-body">
        <table class="table table-bordered">

            <thead>
                <tr>
                    <th>Thumbnail</th>
                    <th>Name</th>
                    <th>Sold</th>
                </tr>
            </thead>

            <tbody>
                @foreach($templates as $template)
                <tr>
                    <td>
                        <img src="{{ asset($template->thumbnail) }}" width="100">
                    </td>
                    <td>{{ $template->name }}</td>
                    <td>{{ $template->invitations->count() }}</td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>

@endsection