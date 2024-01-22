@extends('layouts.app')
@section('content')
    <section class="container">
        <h1>{{$category->name}}</h1>
        <h3>Project List</h3>
        <ul class="list-group list-group-flush">
            @forelse ($category->projects as $project )
                <li class="list-group-item">
                    <a href="{{route('admin.projects.show', $project->slug)}}" class="link-underline"></a>
                </li>
                @empty
                <li>No project</li>
            @endforelse


        </ul>
    </section>

@endsection
