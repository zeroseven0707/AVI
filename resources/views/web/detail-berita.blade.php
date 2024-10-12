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
    <div class="artikel_section_list_container artikel_section_list_container_detail">
        <div class="artikel_section_list artikel_section_list_detail">
            <div class="artikel_detail_layout">
                <div class="artikel_detail_image">
                    <img src="{{ asset('storage/'.$news->images) }}" alt="">
                </div>
                <div class="artikel_detail_heading">
                    <h1>{{ $news->title }}</h1>
                </div>
                <div class="artikel_detail_content">
                    {!! $news->description !!}
                </div>
            </div>
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
                        <li>
                            <a href="">
                                <iconify-icon icon="mage:chevron-right-circle-fill"></iconify-icon>
                                Kemanusiaan sebagai Pilar Kehidupan yang Lebih Baik
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <iconify-icon icon="mage:chevron-right-circle-fill"></iconify-icon>
                                Mengapa AVI Humanity Hadir untuk Memberdayakan Masyarakat
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <iconify-icon icon="mage:chevron-right-circle-fill"></iconify-icon>
                                Mengapa AVI Humanity Hadir untuk Memberdayakan Masyarakat
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <iconify-icon icon="mage:chevron-right-circle-fill"></iconify-icon>
                                Mengapa AVI Humanity Hadir untuk Memberdayakan Masyarakat
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <iconify-icon icon="mage:chevron-right-circle-fill"></iconify-icon>
                                Mengapa AVI Humanity Hadir untuk Memberdayakan Masyarakat
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <iconify-icon icon="mage:chevron-right-circle-fill"></iconify-icon>
                                Mengapa AVI Humanity Hadir untuk Memberdayakan Masyarakat
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@include('web.template.footer')
