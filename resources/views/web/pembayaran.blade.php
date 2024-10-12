@include('web.template.header')

<div class="banner_page">
    <h1>Pembayaran</h1>
</div>
<div class="section_2_home">
    <div class="form_container">
        <div class="form_layout">
            <form action="{{ url('detail-donations') }}" method="POST">
                @csrf
                <div class="form_home form_home_sc">
                    <div class="form_home_pembayaran">
                        <input type="text" name="name" placeholder="Nama Lengkap" required>
                        <input type="text" name="no_telp" placeholder="Nomor HP" required>
                        <input type="email" name="email" placeholder="Email" required>
                    </div>
                    <textarea name="address" placeholder="Alamat" required></textarea>
                </div>
                <button class="btn_primary" type="submit">Bayar donasi</button>
            </form>
        </div>
    </div>
    <div class="form_bg"></div>
    <img src="{{ asset('web/images/tree_left.png') }}" alt="" class="tree_left">
    <img src="{{ asset('web/images/tree_right.png') }}" alt="" class="tree_right">
</div>

<script type="text/javascript"
    src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="{{ config('midtrans.client_key') }}">
</script>

<script>
    document.querySelector('form').addEventListener('submit', function(event) {
        event.preventDefault();

        // Ambil data dari form
        var formData = new FormData(this);

        // Kirim data ke server
        fetch("{{ url('detail-donations') }}", {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            }
        })
        .then(response => response.json())
        .then(data => {
            // Memunculkan Midtrans Snap dengan token
            snap.pay(data.snap_token, {
                onSuccess: function(result) {
                    alert("Payment Success!");
                    console.log(result);
                },
                onPending: function(result) {
                    alert("Payment Pending!");
                    console.log(result);
                },
                onError: function(result) {
                    alert("Payment Failed!");
                    console.log(result);
                },
                onClose: function() {
                    alert('You closed the popup without finishing the payment');
                }
            });
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
</script>

@include('web.template.footer')
