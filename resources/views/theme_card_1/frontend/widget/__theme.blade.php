@if(Request::is('login'))
    @if(!\App\Library\AuthCustom::check())
        <script>
            $(document).ready(function () {
                setTimeout(function(){
                    $('#signin').modal('show');
                }, 0);
            });
        </script>
    @endif

@endif