@extends('layouts.master')
@section('title',$question->title)
@section('content')

    @include('includes.header')
    <div class="row">
        <div class="column">
            <div class="ui divided items">
                <div class="item">
                    <div class="content">
                    <h1 class="ui header">
                        <a href="{{ Request::getRequestUri() }}">{{ $question->title }}</a>
                    </h1>
                    <div class="meta">
                        <a href="">孙马克</a>
                        <span class="cinema">{{ $question->created_at }}</span>
                        <span>{{ $question->view_count }} 阅读</span>
                    </div>
                    <div class="description">
                        <p></p>
                    </div>
                    <div class="extra">
                        @foreach($question->techtags as $tag)
                            <a class="ui tiny basic label">{{ $tag->name }}</a>
                        @endforeach
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection