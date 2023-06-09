@extends('layouts.backend')

@section('content')
@section('title')
    <title>@lang('messages.language')</title>
@endsection
<div class="card">
    <h5 class="card-header">@lang('messages.language')</h5>
    <div class="container">
        <form action="{{ route('language.create') }}" method="get">
            <button class="btn btn-secondary create-new btn-primary mb-3" tabindex="0"><span><i
                class="bx bx-plus me-sm-1"></i> <span class="d-none d-sm-inline-block">
                    @lang('messages.store')
            </button>
        </form>
        <div class="table-responsive text-nowrap">
            <table id="table" class="table table-striped">
                <thead>
                    <tr class="text-nowrap">
                        <th>#</th>
                        <th>@lang('messages.icon')</th>
                        <th>@lang('messages.name')</th>
                        <th>@lang('messages.code')</th>
                        <th>@lang('messages.status')</th>
                        <th>@lang('messages.date')</th>
                        <th>@lang('messages.actions')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($languages as $i => $language)
                        <tr>
                            <td>{{ $i += 1 }}</td>
                            <td><i class="fi fi-{{ $language->code }} fis rounded-circle fs-4 me-1"></i></td>
                            <td>{{ $language->name }}</td>
                            <td>{{ $language->code }}</td>
                            <td>
                                <div class="form-check form-switch">
                                    <form action="{{ route('language-status', $language->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="checkbox" name="status" {{ $language->status == 1 ? 'checked' : '' }}
                                            class="form-check-input p-3" id="flexSwitchCheckDefault" onchange="this.form.submit()">
                                    </form>
                                </div>
                            </td>
                            <td>{{ $language->created_at }}</td>
                            <td>
                                <form action="{{ route('language.destroy', $language->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <div class="dropdown">
                                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                      <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('language.edit', $language->id) }}">
                                            <i class="bx bx-edit-alt me-1"></i>
                                            @lang('messages.edit')
                                        </a>
                                          <button class="dropdown-item del">
                                            <i class="bx bx-trash me-1"></i>
                                            @lang('messages.delete')
                                          </button>
                                      </div>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
