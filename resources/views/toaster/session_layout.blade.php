@if (session('toastMessage'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            new Toast({
                title: @json(session('toastMessage.message')),
                type: @json(session('toastMessage.type') ?? 'default'),
                position: @json(session('toastMessage.position') ?? 'bottom-right'),
                theme: 'light'
            }).show();
        });
    </script>
@endif
