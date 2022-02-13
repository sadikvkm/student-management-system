
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    
<script>
    var options = {}
</script>
@isset($endDate)
    <script>
        options.endDate = new Date('{{$endDate}}');
    </script>
@endif
<script>
    options.format = "yyyy-mm-dd";
    options.autoclose = true;
    options.orientation = "top";
    $(function() {
        $( ".datepicker" ).datepicker(options);
    });
</script>
@endpush()

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"/>
@endpush()
