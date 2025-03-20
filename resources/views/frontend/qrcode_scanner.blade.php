@extends('layouts.front')

@section('content')
    <div class="container" style="margin-top: 25rem">
        <div class="row p-4 m-4">
            <div class="col-12 col-md-6">
                <div id="reader"></div>
            </div>
            <div class="col-12 col-md-6" style="padding:30px;">
                <h4>SCAN RESULT</h4>
                <div id="result">Result Here</div>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
    <script src="{{ asset('/frontend/js/html5_qrcode.js') }}"></script>
    <script>
        function onScanSuccess(qrCodeMessage) {
            // document.getElementById('result').innerHTML = '<span class="result">'+qrCodeMessage+'</span>';
            window.location.href = `/qrcode/${qrCodeMessage}`;
        }

        function onScanError(errorMessage) {
            //handle scan error
        }
        var html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", {
                fps: 10,
                qrbox: 250
            });
        html5QrcodeScanner.render(onScanSuccess, onScanError);
    </script>
@endsection
