<style>
    .info-box.success {
        position: absolute;
        top: 30%;
        z-index: 9999;
        opacity: 0.8;
    }
</style>

@if(Session::has('fail'))
    <section class="info-box fail">
        {{ Session::get('fail') }}
    </section>
@endif
@if( Session::has('success') )
    <section class="info-box success">
        <div class="ui positive massive message">
            <i class="close icon"></i>
            <div class="header">{{ Session::get('success') }}</div>
        </div>
    </section>
@endif
@if (count($errors) > 0)
    <section class="info-box fail">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </section>
@endif

@section('scripts')
<script>
    $('.close.icon').click(function(){
        sectionSuccess();
    })
    setTimeout(function(){
        sectionSuccess()
    },3000)

    function sectionSuccess() {
        $('.info-box.success').slideUp('slow','linear');
    }
</script>
@endsection
