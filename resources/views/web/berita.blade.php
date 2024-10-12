@include('web.template.header')
<div class="banner_page">
    <h1>Berita</h1>
</div>
<div class="artikel_section">
    <div class="search_artikel_mobile">
        <div class="artikel_section_sidebar_box">
            <form action="{{ url('berita') }}" method="get">
                <div class="search_sidebar">
                    <input type="text" name="search" placeholder="Cari Berita">
                    <button style="border: none; background: none">
                        <iconify-icon icon="ic:round-search"></iconify-icon>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="artikel_section_list_container">
        <div class="artikel_section_list">
            <!-- foreach disini -->
            @foreach ($news as $item)                            
            <div class="artikel_section_box">
                <div class="artikel_section_image">
                    <a href="{{ url('detail-berita/'.$item['id']) }}">
                        <img src="{{ asset('storage/'.$item['images']) }}" alt="">
                    </a>
                </div>
                <div class="artikel_section_content">
                    <a href="{{ url('detail-berita/'.$item['id']) }}">
                        <h1>{{ $item['title'] }}</h1>
                    </a>
                    <span><iconify-icon icon="healthicons:calendar"></iconify-icon> September 28, 2024</span>
                </div>
            </div>
            @endforeach
            <!-- foreach disini -->
        </div>
    </div>
    <div class="artikel_section_sidebar">
        <div class="artikel_section_sidebar_container">
            <div class="artikel_section_sidebar_box artikel_section_sidebar_box_dekstop">
                <h3>Cari di AVI Humanity</h3>
                <form action="{{ url('berita') }}" method="get">
                    <div class="search_sidebar">
                        <input type="text" name="search" placeholder="Cari Berita">
                        <button style="border: none; background: none">
                            <iconify-icon icon="ic:round-search"></iconify-icon>
                        </button>
                    </div>
                </form>
            </div>
            <div class="artikel_section_sidebar_box">
                <h3>Instagram AVI Humanity</h3>
                <div class="elfsight-app-48bbf8a8-20b2-4af9-af57-10522b73d421" style="width:100%;" data-elfsight-app-lazy></div>
            </div>
            <div class="artikel_section_sidebar_box">
                <h3>Berita Terbaru</h3>
                <div class="artikel_section_recent">
                    <ul>
                        @foreach ($last_news as $items)                            
                        <li>
                            <a href="{{ url('detail-berita/'.$items['id']) }}">
                                <iconify-icon icon="mage:chevron-right-circle-fill"></iconify-icon>
                                {{ $items['title'] }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@include('web.template.footer')
