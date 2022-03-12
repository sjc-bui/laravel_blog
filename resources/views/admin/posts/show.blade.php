@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Post detail') }}</div>

                    <div class="card-body">
                        <div>
                            <a href="{{ route('admin.posts.index') }}">{{ __('back') }}</a>
                            &#32;&#124;&#32;
                            <a href="{{ route('admin.posts.create') }}">{{ __('create') }}</a>
                            &#32;&#124;&#32;
                            <a href="{{ route('admin.posts.edit', $post->id) }}">{{ __('edit') }}</a>
                        </div>
                        <hr>
                        @if ($post->published == 0)
                            <small style="color: red;">{{ __('draft') }}</small>
                        @endif
                        <div class="sub-title">{{ $post->title }}</div>
                        <table>
                            <tbody>
                                <tr>
                                    <td>
                                        <h3 class="iw">
                                            @if (isset($post->category))
                                                <span name="{{ $post->category->title }}" class="contact-name">
                                                    <span>{{ $post->category->title }}</span>
                                                </span>
                                            @endif
                                            <span>{{ $post->created_at->format('Y/m/d H:i') }} &#40;{{ $post->created_at->diffForHumans() }}&#41;</span>
                                        </h3>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div>
                            <table>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="contact-content">
                                                {!! $post->content !!}
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <form action="{{ route('admin.posts.destroy', $post->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure, you want to delete?')">{{ __('delete') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
