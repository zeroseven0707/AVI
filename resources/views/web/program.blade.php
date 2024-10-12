@include('web.template.header')

<div class="banner_page">
    <h1>Program Reguler</h1>
</div>
<div class="program_page_section">
    @foreach ($programs as $item)        
    <div class="program_page_layout">
        <div class="program_page_heading">
            <h1>{{ $item['name'] }}</h1>
        </div>
        <div class="swiper programSwiper">
            @foreach ($item->campaigns as $campaign)                    
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="program_box">
                        <div class="program_image">
                            <a href="detail-program.php">
                               @foreach (json_decode($campaign->images) as $image)
                                 <img src="{{ asset('storage/'.$image) }}" alt="image">
                               @endforeach
                            </a>
                        </div>
                        <div class="program_content">
                            <div class="divider_content divider_yellow divider_top"></div>
                            <h5>{{ $campaign['title'] }}</h5>
                            <span>Terkumpul : Rp. 135.000.000,-</span>
                            <div class="program_share">
                                <a href="#"><iconify-icon icon="ic:round-facebook"></iconify-icon></a>
                                <a href="#"><iconify-icon icon="ic:round-whatsapp"></iconify-icon></a>
                                <a href="#"><iconify-icon icon="iconoir:instagram"></iconify-icon></a>
                            </div>
                            <a href="{{ url('detail-program/'.$campaign['id']) }}"><button class="btn_box">Donasi Sekarang</button></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
    @endforeach

</div>

@include('web.template.footer')
