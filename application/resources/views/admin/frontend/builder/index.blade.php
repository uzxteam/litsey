@extends('admin.layouts.app')
@section('panel')
@if($pdata->is_default == 0)
<div class="row mb-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.frontend.manage.pages.update')}}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $pdata->id }}">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>@lang('Page Name')</label>
                                <input type="text" class="form-control" name="name" value="{{ $pdata->name }}" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>@lang('Page Slug')</label>
                                <input type="text" class="form-control" name="slug" value="{{ $pdata->slug }}" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>&nbsp;</label>
                                <button type="submit" class="btn btn--primary btn-global">@lang('Save')</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endif



<div class="row">
    <div class="col-md-6 mt-md-0 mt-3">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">@lang('Available Page Components')</h3>
                <small>@lang('Drag sections to the right and update the page')</small>
            </div>
            <div class="card-body">
                <ol class="simple_with_no_drop vertical">
                    @foreach($sections as $k => $secs)
                    @if(!@$secs['no_selection'])
                    <li class="highlight icon-move clearfix d-flex align-items-center">
                        <i class="fas fa-expand-arrows-alt"></i>
                        <span class="d-inline-block me-auto ms-2"> {{__($secs['name'])}}</span>
                        <i class="ms-auto d-inline-block remove-icon fa fa-times"></i>
                        <input type="hidden" name="secs[]" value="{{$k}}">
                        @if($secs['builder'])
                        <div class="float-end d-inline-block manage-content">
                            <a href="{{ route('admin.frontend.sections',$k) }}" target="_blank"
                                class="btn bg--primary text-center cog-btn" title="@lang('Manage Content')">
                                <i class="fa fa-pen p-0 m-0"></i>
                            </a>
                        </div>
                        @endif
                    </li>
                    @endif
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{__($pdata->name)}} @lang('Page')</h3>
            </div>

            <div class="card-body">
                <form action="{{route('admin.frontend.manage.section.update',$pdata->id)}}" method="post">
                    @csrf
                    <ol class="simple_with_drop vertical sec-item">
                        @if($pdata->secs != null)
                        @foreach(json_decode($pdata->secs) as $sec)
                        <li class="highlight icon-move item">
                            <i class="fas fa-expand-arrows-alt"></i>
                            <span class="d-inline-block me-auto ms-2"> {{ __(@$sections[$sec]['name'])
                                }}</span>
                            <i class="ms-auto d-inline-block remove-icon fa fa-times"></i>
                            <input type="hidden" name="secs[]" value="{{$sec}}">
                        </li>
                        @endforeach
                        @endif
                    </ol>
                    <div class="form-group text-end">
                        <button type="submit" class="btn btn--primary btn-global">@lang('Update')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop

@push('script-lib')
<script src="{{asset('assets/admin/js/jquery-sortable.js')}}"></script>
@endpush

@push('script')
<script>
    (function ($) {
        "use strict";
        $("ol.simple_with_drop").sortable({
            group: 'no-drop',
            handle: '.icon-move',
            onDragStart: function ($item, container, _super) {
                if (!container.options.drop) {
                    $item.clone().insertAfter($item);
                }
                _super($item, container);
            }
        });
        $("ol.simple_with_no_drop").sortable({
            group: 'no-drop',
            drop: false
        });
        $("ol.simple_with_no_drag").sortable({
            group: 'no-drop',
            drag: false
        });

        $(document).on('click', ".remove-icon", function () {
            $(this).parent('.highlight').remove();
        });

    })(jQuery);
</script>
@endpush


@push('breadcrumb-plugins')
<a href="{{route('admin.frontend.manage.pages')}}" class="btn btn-sm btn--primary">@lang('Back')</a>
@endpush

@push('style')
<style>
    .span4 {
        width: 300px;
    }

    ol li.highlight {
        background: #000;
        color: #999999;
    }

    ol.vertical {
        margin: 0 0 9px 0;
        min-height: 10px;
    }

    li {
        line-height: 18px;
    }

    .icon-move {
        background-position: -168px -72px;
    }

    ol i.icon-move {
        cursor: pointer;
    }

    ol {
        display: block;
        list-style-type: decimal;
        margin-block-start: 1em;
        margin-block-end: 1em;
        margin-inline-start: 0px;
        margin-inline-end: 0px;
    }

    .vertical li i {
        color: #000000;
        padding-right: 15px;
    }

    .sec-item li i {
        color: #00adad;
        padding-right: 15px;
    }

    .sec-item li i.fa-times {
        color: #00adad;
        padding-right: 15px;
    }

    ol.vertical li {
        display: block;
        margin: 10px 0;
        padding: 21px 20px;
        color: #e0e0e0;
        background: #ececec;
        font-size: 16px;
        font-weight: 600;
        border-radius: 6px;
    }


    ol.sec-item li {
        margin: 10px 0;
        padding: 21px 20px;
        color: #8c8c8c;
        background: #ececec;
        font-size: 24px;
        font-weight: 600;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: center;
        border-radius: 6px;
    }

    .ol.sec-item li.d-none {
        display: none !important;
    }

    [class*="span"] {
        float: left;
        margin-left: 20px;
    }

    .row {
        *zoom: 1;
    }

    .row {
        position: relative;
    }

    .dragged {
        position: absolute;
        top: 0;
        opacity: 0.5;
        z-index: 2000;
        background: #333333;
        color: #999999;
    }

    ol.vertical li i.remove-icon {
        display: none !important;
    }

    ol.sec-item li i.remove-icon {
        display: block !important;
    }

    ol.sec-item li .manage-content {
        display: none !important;
    }

    ol.vertical li span {
        font-size: 18px;
    }

    .cog-btn i {
        color: #ffffff !important
    }

    .cog-btn:hover i {
        color: #000 !important
    }
</style>
@endpush