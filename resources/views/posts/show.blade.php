@extends('posts.index')

@section('title', $post->title)

@section('home-content')
    <div class="row mb-2">
        <table>
            <tbody>
                <tr>
                    <td>
                        <div class="text-left pb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-chevron-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
                            </svg>
                            <small class="text-muted">
                                <a href="{{ route('posts') }}" class="leading-5">{{ __('back_home') }}</a>
                            </small>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3>{{ $post->title }}</h3>
                    </td>
                </tr>
                <tr>
                    <td>
                        @if (isset($post->category))
                            <small class="text-muted"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-bookmark" viewBox="0 0 16 16">
                                    <path
                                        d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z" />
                                </svg>&#32;<a class="category-link"
                                    href="{{ route('posts.category', $post->category->slug) }}">{{ $post->category->title }}</a></small>
                        @endif
                        &nbsp;
                        <small class="text-muted"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-calendar" viewBox="0 0 16 16">
                                <path
                                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                            </svg>&#32;{{ $post->created_at->format('Y/m/d H:i') }}</small>
                        &nbsp;
                        @if (count($post->comments))
                            <small class="text-muted"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-chat" viewBox="0 0 16 16">
                                    <path
                                        d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z" />
                                </svg>&#32;{{ count($post->comments) }}</small>
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="post-content">
            {!! Str::markdown($post->content) !!}
            <hr>
        </div>

        @if (isset($prev) || isset($next))
            <div class="post-navigation">
                <div class="row">
                    <div class="col-sm-6">
                        @if (isset($prev))
                            <a href="{{ route('posts.show', [$prev->slug, $prev->id]) }}">
                                <span class="meta-nav">{{ __('prev') }}</span>
                                <span class="nav-post-title">{{ $prev->title }}</span>
                            </a>
                        @endif
                    </div>
                    <div class="col-sm-6">
                        @if (isset($next))
                            <a href="{{ route('posts.show', [$next->slug, $next->id]) }}">
                                <span class="meta-nav">{{ __('next') }}</span>
                                <span class="nav-post-title">{{ $next->title }}</span>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            <hr>
        @endif

        {{-- Comment section --}}
        <h3>{{ __('comments') }}&nbsp;{{ count($post->comments) > 0 ? __('cmt_num', ['num' => count($post->comments)]) : '' }}
        </h3>
        <div class="comment-section">
            @guest
                {{-- Comment form --}}
                @include('shared.addComment')
            @endguest

            {{-- Comment list --}}
            @include('shared.comments')
        </div>
    </div>
@endsection

@section('relatedPosts')
    @include('shared.relatedPosts')
    <br>
@endsection
