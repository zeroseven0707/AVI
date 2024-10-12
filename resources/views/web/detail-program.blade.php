@include('web.template.header')
<div class="banner_page">
    <h1>Program Kami</h1>
</div>
<div class="program_detail_section">
    <div class="heading_program_detail">
        <h1>{{ $program->title }}</h1>
    </div>
    <div class="program_detail_layout">
        <div class="divider divider_bottom divider_yellow"></div>
        <div class="program_detail_galeri">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    @foreach (json_decode($program->images) as $image)                       
                    <div class="swiper-slide">
                        <div class="program_detail_image">
                            <img src="{{ asset('storage/' . $image) }}" alt="">
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="program_detail_form">
        <img src="images/tree_left.png" alt="" class="program_detail_icon_left">
        <img src="images/tree_right.png" alt="" class="program_detail_icon_right">
        <div class="program_detail_target">
            <div class="program_detail_target_box">
                <h4>Tercapai</h4>
                <h1>Rp. {{ number_format($program->totalDonations()) }}</h1>
            </div>
            <div class="program_detail_target_box program_detail_target_box_end">
                <h4>Target</h4>
                <h1>Rp. {{ number_format($program->goal_amount) }}</h1>
            </div>
        </div>
        
        <div class="program_detail_range">
            <div class="progress-bar-striped">
                <div style="width: {{ round($program->donationPercentage(), 2) }}%;"></div>
            </div>
        </div>
        
            <div class="program_detail_form_layout">
                <h3>Masukkan Nominal</h3>
                <form action="{{ url('pembayaran/'.$program->id) }}" method="POST">
                    @csrf
                    <div class="program_detail_form_box">
                        <input type="number" name="price" placeholder="Masukkan disini" id="price-input">
                        <div class="program_detail_btn_form">
                            <button type="button" data-price="10000">10.000</button>
                            <button type="button" data-price="25000">25.000</button>
                            <button type="button" data-price="50000">50.000</button>
                            <button type="button" data-price="75000">75.000</button>
                            <button type="button" data-price="100000">100.000</button>
                            <button type="button" data-price="200000">200.000</button>
                            <button type="button" data-price="500000">500.000</button>
                        </div>
                        <button type="submit" class="program_detail_submit">Lanjutkan Donasi</button>
                    </div>
                </form>
            </div>
            <div class="program_detail_share">
                <span>Bagikan Program :</span>
                <div class="program_detail_share_layout">
                    <a href="#" target="_blank">
                        <div class="program_detail_share_box">
                            <iconify-icon icon="ic:baseline-facebook"></iconify-icon>
                        </div>
                    </a>
                    <a href="#" target="_blank">
                        <div class="program_detail_share_box">
                            <iconify-icon icon="ic:baseline-whatsapp"></iconify-icon>
                        </div>
                    </a>
                    <a href="#" target="_blank">
                        <div class="program_detail_share_box">
                            <iconify-icon icon="ic:baseline-telegram"></iconify-icon>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="program_detail_desc">
    <img src="images/program_icon_1.png" alt="" class="program_icon_1 program_icon_1_detail">
    <img src="images/program_icon_2.png" alt="" class="program_icon_2 program_icon_2_detail">
    <div class="program_detail_desc_layout">
        <div class="tab">
            <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">Deskripsi</button>
            <button class="tablinks" onclick="openCity(event, 'Paris')">Donatur</button>
        </div>

        <div class="tab_content_layout">
            <div id="London" class="tabcontent">
                <div class="program_detail_desc_heading">
                    <h1>{{ $program->title }}</h1>
                </div>
                <div class="program_detail_desc_content">
                    <p>{!! $program->description !!}</p>
                </div>
            </div>

            <div id="Paris" class="tabcontent">
                <div class="program_detail_donatur_layout">
                    @foreach ($donations as $donation)                        
                    <div class="program_detail_donatur_box">
                        <iconify-icon icon="mynaui:user-waves"></iconify-icon>
                        <div class="program_detail_donatur_content">
                            <h4>{{ $donation['name'] }}</h4>
                            <p>Berdonasi sebesar Rp. {{ number_format($donation['amount']) }}</p>
                            <span>{{ $donation['donation_date'] }}</span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="program_detail_desc_blank"></div>
</div>
<script>
    document.querySelectorAll('.program_detail_btn_form button').forEach(function(button) {
        button.addEventListener('click', function() {
            var price = this.getAttribute('data-price');
            document.getElementById('price-input').value = price;
        });
    });
</script> 
@include('web.template.footer')
