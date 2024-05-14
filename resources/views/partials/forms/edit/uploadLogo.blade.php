<!-- {{ $logoVariable }}logo image upload -->

<div class="form-group">
    <div class="col-md-3">
        <label {!! $errors->has($logoVariable) ? 'class="alert-msg"' : '' !!} for="{{ $logoVariable }}">
        {{ ucwords(str_replace('_', ' ', $logoVariable)) }}
        </label>
    </div>
    <div class="col-md-9">
        <label class="btn btn-default">
            {{ trans('button.select_file')  }}
            <input type="file" name="{{ $logoVariable }}" class="js-uploadFile" id="{{ $logoId }}" accept="image/gif,image/jpeg,image/webp,image/png,image/svg,image/svg+xml" data-maxsize="{{ $maxSize ?? Helper::file_upload_max_size() }}"
                   style="display:none; max-width: 90%">
        </label>

        <span class='label label-default' id="{{ $logoId }}-info"></span>

        {!! $errors->first($logoVariable, '<span class="alert-msg">:message</span>') !!}


        <p class="help-block" style="!important" id="{{ $logoId }}-status">
            {{ $helpBlock }}
        </p>

        @if (config('app.lock_passwords')===true)
            <p class="text-warning"><i class="fas fa-lock"></i> {{ trans('general.feature_disabled') }}</p>
        @endif
    </div>

    <div class="col-md-9 col-md-offset-3">

            @if (($setting->$logoVariable!='') && (Storage::disk('public')->exists(e($InventoryManagerSettings->$logoVariable))))
            <div class="pull-left" style="padding-right: 20px;">
                <a href="{{ Storage::disk('public')->url(e($InventoryManagerSettings->$logoVariable)) }}"{!! ($logoVariable!='favicon') ? ' data-toggle="lightbox"' : '' !!}>
                    <img id="{{ $logoId }}-imagePreview" style="height: 80px; padding-bottom: 5px;" alt="" src="{{ Storage::disk('public')->url(e($InventoryManagerSettings->$logoVariable)) }}">
                </a>
            </div>
            @endif

            <div id="{{ $logoId }}-previewContainer" style="display: none;">
                <img id="{{ $logoId }}-imagePreview" style="height: 80px;">
            </div>



    </div>
    @if (($setting->$logoVariable!='') && (Storage::disk('public')->exists(e($InventoryManagerSettings->$logoVariable))))

    <div class="col-md-9 col-md-offset-3">
        <label id="{{ $logoId }}-deleteCheckbox" for="{{ $logoClearVariable }}" style="font-weight: normal" class="form-control">
            {{ Form::checkbox($logoClearVariable, '1', Request::old($logoClearVariable)) }}
            Remove current {{ ucwords(str_replace('_', ' ', $logoVariable)) }} image
        </label>
    </div>
    @endif



</div>







