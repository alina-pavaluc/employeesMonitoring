<div class="card-body">
    <form action="/check-in" method="post">
        @csrf

        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <div class="input-group date" id="checkin_picker" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" data-target="#checkin_picker"
                                   name="checked_in_at"/>
                            <div class="input-group-append" data-target="#checkin_picker" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="far fa-clock"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <input type="submit" class="btn btn-danger btn-block py-5" value="Check In">
    </form>
</div>

@section('scripts')

    <script type="text/javascript">
        $(function () {
            $('#checkin_picker').datetimepicker({
                format: 'HH:mm'
            });
        });
    </script>
@endsection
