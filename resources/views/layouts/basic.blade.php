<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ ($InventoryManagerSettings) && ($InventoryManagerSettings->site_name) ? $InventoryManagerSettings->site_name : 'Inventory Manager' }}</title>

    <link rel="shortcut icon" type="image/ico" href="{{ ($InventoryManagerSettings) && ($InventoryManagerSettings->favicon!='') ?  Storage::disk('public')->url('').e($InventoryManagerSettings->favicon) : 'favicon.ico' }} ">
    {{-- stylesheets --}}
    <link rel="stylesheet" href="{{ url(mix('css/dist/all.css')) }}">

    <script nonce="{{ csrf_token() }}">
        window.InventoryManager = {
            settings: {
                "per_page": 50
            }
        };
    </script>
    @livewireStyles


    @if (($InventoryManagerSettings) && ($InventoryManagerSettings->header_color))
        <style>
        .main-header .navbar, .main-header .logo {
        background-color: {{ $InventoryManagerSettings->header_color }};
        background: -webkit-linear-gradient(top,  {{ $InventoryManagerSettings->header_color }} 0%,{{ $InventoryManagerSettings->header_color }} 100%);
        background: linear-gradient(to bottom, {{ $InventoryManagerSettings->header_color }} 0%,{{ $InventoryManagerSettings->header_color }} 100%);
        border-color: {{ $InventoryManagerSettings->header_color }};
        }
        .skin-blue .sidebar-menu > li:hover > a, .skin-blue .sidebar-menu > li.active > a {
        border-left-color: {{ $InventoryManagerSettings->header_color }};
        }

        .btn-primary {
        background-color: {{ $InventoryManagerSettings->header_color }};
        border-color: {{ $InventoryManagerSettings->header_color }};
        }


        </style>
    @endif

    @if (($InventoryManagerSettings) && ($InventoryManagerSettings->custom_css))
        <style>
            {!! $InventoryManagerSettings->show_custom_css() !!}
        </style>
    @endif

</head>

<body class="hold-transition login-page">

    @if (($InventoryManagerSettings) && ($InventoryManagerSettings->logo!=''))
        <center>
            <a href="{{ config('app.url') }}"><img id="login-logo" src="{{ Storage::disk('public')->url('').e($InventoryManagerSettings->logo) }}"></a>
        </center>
    @endif
  <!-- Content -->
  @yield('content')



    <div class="text-center" style="padding-top: 100px;">
        @if (($InventoryManagerSettings) && ($InventoryManagerSettings->privacy_policy_link!=''))
        <a target="_blank" rel="noopener" href="{{  $InventoryManagerSettings->privacy_policy_link }}" target="_new">{{ trans('admin/settings/general.privacy_policy') }}</a>
    @endif
    </div>

    {{-- Javascript files --}}
    <script src="{{ url(mix('js/dist/all.js')) }}" nonce="{{ csrf_token() }}"></script>


    @stack('js')
    @livewireScripts
</body>

</html>
