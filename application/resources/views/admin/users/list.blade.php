@extends('admin.layouts.app')
@section('panel')
@include('admin.components.tabs.user')
<div class="row">
    <div class="col-lg-12">
        <div class="card b-radius--10 ">
            <div class="card-body p-0">
                <div class="table-responsive--md  table-responsive">
                    <table class="table table--light style--two">
                        <thead>
                            <tr>
                                <th>@lang('User')</th>
                                <th>@lang('Email')</th>
                                <th>@lang('Joined At')</th>
                                <th>@lang('Balance')</th>
                                <th>@lang('Action')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $user)
                            <tr>
                                <td>
                                    <a href="{{ route('admin.users.detail', $user->id) }}">{{$user->fullname}}
                                        ({{$user->username}})</a>
                                </td>


                                <td>
                                    {{ $user->email }}
                                </td>



                                <td>
                                    {{ showDateTime($user->created_at) }}
                                </td>


                                <td>
                                    <span class="fw-bold">

                                        {{ $general->cur_sym }}{{ showAmount($user->balance) }}
                                    </span>
                                </td>

                                <td>
                                    <a title="@lang('User Profile')" href="{{ route('admin.users.detail', $user->id) }}"
                                        class="btn btn-sm btn--primary">
                                        <i class="las la-eye text--shadow"></i>
                                    </a>
                                </td>

                            </tr>
                            @empty
                            <tr>
                                <td class="text-muted text-center" colspan="100%">{{ __($emptyMessage) }}</td>
                            </tr>
                            @endforelse

                        </tbody>
                    </table><!-- table end -->
                </div>
            </div>
            @if ($users->hasPages())
            <div class="card-footer py-4">
                {{ paginateLinks($users) }}
            </div>
            @endif
        </div>
    </div>


</div>
@endsection



@push('breadcrumb-plugins')
<div class="d-flex flex-wrap justify-content-end">
    <form action="" method="GET" class="form-inline">
        <div class="input-group justify-content-end">
            <input type="text" name="search" class="form-control bg--white" placeholder="@lang('Search by Username')"
                value="{{ request()->search }}">
            <button class="btn btn--primary input-group-text" type="submit"><i class="fa fa-search"></i></button>
        </div>
    </form>
</div>
@endpush