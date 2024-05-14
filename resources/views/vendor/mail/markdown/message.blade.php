@component('mail::layout')
{{-- Header --}}
@slot('header')
@component('mail::header', ['url' => config('app.url')])
@if (($InventoryManagerSettings->show_images_in_email=='1' ) && ($InventoryManagerSettings::setupCompleted()))

@if ($InventoryManagerSettings->brand == '3')
@if ($InventoryManagerSettings->logo!='')
<img class="navbar-brand-img logo" src="{{ config('app.url') }}/uploads/{{ $InventoryManagerSettings->logo }}">
@endif
{{ $InventoryManagerSettings->site_name }}

@elseif ($InventoryManagerSettings->brand == '2')
@if ($InventoryManagerSettings->logo!='')
<img class="navbar-brand-img logo" src="{{ config('app.url') }}/uploads/{{ $InventoryManagerSettings->logo }}">
@endif
@else
{{ $InventoryManagerSettings->site_name }}
@endif
@else
Inventory Manager
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
