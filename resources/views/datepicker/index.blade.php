<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="https://www.dumetschool.com/dsicon.ico" />
    <title>Datepicker</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <input type="text" class="form-control datepicker">
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
    <script>
        $(function(){
            $('.datepicker').datepicker({
                minViewMode: 2,
            });
        });
    </script>
</body>

</html>