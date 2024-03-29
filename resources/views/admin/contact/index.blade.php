@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Contacts') }}</div>

                    <div class="card-body">
                        @if ($count > 0)
                            <table>
                                <tbody>
                                    <tr>
                                        <td>
                                            <span>{{ __('un_read_message') }}: {{ $count }} </span>
                                        </td>
                                        <td>&#124;</td>
                                        <td>
                                            <span>
                                                <form action="{{ route('admin.contacts.read') }}" method="post">
                                                    @csrf
                                                    <button type="submit"
                                                        class="btn btn-primary btn-sm">{{ __('mark_as_read') }}</button>
                                                </form>
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        @endif

                        @if (count($contacts) > 0)
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">{{ __('name') }}</th>
                                        <th scope="col">{{ __('subject') }}</th>
                                        <th scope="col">{{ __('created_at') }}</th>
                                        <th scope="col">##</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contacts as $contact)
                                        <tr class="{{ $contact->is_readed == 0 ? 'un-read' : '' }}">
                                            <td scope="row">{{ $contact->name }}</td>
                                            <td>
                                                <a
                                                    href="{{ route('admin.contacts.show', $contact->id) }}">{{ $contact->subject }}</a>
                                            </td>
                                            <td>{{ $contact->created_at->format('Y/m/d H:i') }}</td>
                                            <td>
                                                <form action="{{ route('admin.contacts.destroy', $contact->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Are you sure, you want to delete?')">{{ __('delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>No contacts yet.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
