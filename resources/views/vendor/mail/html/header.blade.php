<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: block;">

            @if (trim($slot) === 'Laravel')
                <img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo">
                <span>{{ $slot }}</span>
            @else
                <img src="{{asset('images/logos/logo_smacve.png')}}" class="logo" alt="SMACVE" style=" width: 90px;">
            @endif
        </a>
    </td>
</tr>
