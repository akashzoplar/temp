@component('mail::layout')
{{-- Header --}}
@slot('header')

{{-- Check that the $InventoryManagerSettings variable is set, images are set to be shown, and setup is complete --}}


@if (isset($InventoryManagerSettings) && ($InventoryManagerSettings::setupCompleted()))

    @if ($InventoryManagerSettings->show_url_in_emails=='1' )
        @component('mail::header', ['url' => config('app.url')])
    @else
        @component('mail::header', ['url' => ''])
    @endif

    {{-- Show images in email!  --}}
    @if (($InventoryManagerSettings->show_images_in_email=='1' ) && (($InventoryManagerSettings->brand == '3') || ($InventoryManagerSettings->brand == '2')))

        {{-- $InventoryManagerSettings->brand = 1 = Text  --}}
        {{-- $InventoryManagerSettings->brand = 2 = Logo  --}}
        {{-- $InventoryManagerSettings->brand = 3 = Logo + Text  --}}
        @if ($InventoryManagerSettings->brand == '3')

            @if ($InventoryManagerSettings->email_logo!='')
            <img style="max-height: 100px; vertical-align:middle;" src="{{ \Storage::disk('public')->url(e($InventoryManagerSettings->email_logo)) }}">
            @elseif ($InventoryManagerSettings->logo!='')
            <img style="max-height: 100px; vertical-align:middle;" src="{{ \Storage::disk('public')->url(e($InventoryManagerSettings->logo)) }}">
            @endif

            <br><br>
            {{ $InventoryManagerSettings->site_name }}
            <br><br>
        {{-- else if branding type is just logo --}}
        @elseif ($InventoryManagerSettings->brand == '2')
            @if ($InventoryManagerSettings->email_logo!='')

            <img style="max-width: 100px; vertical-align:middle;" src="{{ \Storage::disk('public')->url(e($InventoryManagerSettings->email_logo)) }}">
            @elseif ($InventoryManagerSettings->logo!='')
            <img style="max-width: 100px; vertical-align:middle;" src="{{ \Storage::disk('public')->url(e($InventoryManagerSettings->logo)) }}">
            @endif
        @endif
    @else
        {{ $InventoryManagerSettings->site_name }}
    @endif

{{-- Either the $InventoryManagerSettings variable isn't set or setup is not complete --}}
@else
{{ config('app.name') }}
@endif

@endcomponent
@endslot

{{-- Body --}}
{{ $slot }}

{{-- Subcopy --}}
@isset($subcopy)
@slot('subcopy')
@component('mail::subcopy')
{{ $subcopy }}
@endcomponent
@endslot
@endisset

{{-- Footer --}}
@slot('footer')
@component('mail::footer')
@if($InventoryManagerSettings::setupCompleted())
© {{ date('Y') }} {{ $InventoryManagerSettings->site_name }}. All rights reserved.
@else
© {{ date('Y') }} Inventory Manager. All rights reserved.
@endif

@if ($InventoryManagerSettings->privacy_policy_link!='')
<a href="{{ $InventoryManagerSettings->privacy_policy_link }}">{{ trans('admin/settings/general.privacy_policy') }}</a>
@endif

@endcomponent
@endslot
@endcomponent
