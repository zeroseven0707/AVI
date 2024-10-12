@include('web.template.header')
    <div class="banner">
        <div class="content_banner">
            <span>Selamat datang di avi humanity</span>
            <h1>Bersama, Kita Bisa Mengubah hidup mereka</h1>
            <a href="tentang-kami.php"><button class="btn_primary">Baca Selengkapnya</button></a>
        </div>
        <img src="images/banner_icon.png" alt="AVI Humanity" class="banner_icon">
        <div class="divider divider_bottom divider_yellow"></div>
    </div>
    <div class="section_2_home">
        <div class="form_container">
            <div class="form_layout">
                <div class="nominal">
                    <h3>Donasi Terkumpul : Rp. 127.000.000,-</h3>
                </div>
                <form action="">
                    <div class="form_home">
                        <div class="select_form">
                            <select name="" id="">
                                <option value="Infaq" selected>Infaq</option>
                                <option value="Donasi">Donasi</option>
                            </select>
                            <iconify-icon icon="mynaui:chevron-down"></iconify-icon>
                        </div>
                        <input type="text" placeholder="Nama Lengkap">
                        <input type="number" placeholder="Nominal">
                    </div>
                    <button class="btn_primary">Lanjutkan Pembayaran</button>
                </form>
            </div>
        </div>
        <div class="form_bg"></div>
        <img src="images/tree_left.png" alt="" class="tree_left">
        <img src="images/tree_right.png" alt="" class="tree_right">
    </div>
    <div class="section_3_home">
        <div class="divider divider_bottom divider_yellow"></div>
        <img src="images/program_icon_1.png" alt="" class="program_icon_1">
        <img src="images/program_icon_2.png" alt="" class="program_icon_2">
        <div class="heading_home">
            <h1>Program Kami</h1>
            <a href="#">Lihat Lainnya</a>
        </div>
        <div class="layout_program">
            @foreach ($programs as $program)                
            <div class="program_box">
                <div class="program_image">
                    <a href="{{ url('detail-program/'.$program['id']) }}">
                        @foreach (json_decode($program->images) as $image)
                        <img src="{{ asset('storage/' . $image) }}" alt="Campaign Image">
                    @endforeach
                    </a>
                </div>
                <div class="program_content">
                    <div class="divider_content divider_yellow divider_top"></div>
                    <h5>{{ $program['title'] }}</h5>
                    <span>Terkumpul : Rp. 135.000.000,-</span>
                    <div class="program_share">
                        <a href="#"><iconify-icon icon="ic:round-facebook"></iconify-icon></a>
                        <a href="#"><iconify-icon icon="ic:round-whatsapp"></iconify-icon></a>
                        <a href="#"><iconify-icon icon="iconoir:instagram"></iconify-icon></a>
                    </div>
                    <a href="{{ url('detail-program/'.$program['id']) }}"><button class="btn_box">Donasi Sekarang</button></a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="see_other_mobile">
            <a href="#">Lihat Lainnya</a>
        </div>
    </div>
    <div class="section_4_home">
        <div class="section_4_content">
            <h1>Sekilas tentang Avi Humanity</h1>
            <p>Avi Humanity adalah organisasi yang berdedikasi untuk memberikan bantuan kemanusiaan kepada masyarakat yang membutuhkan, baik di tingkat lokal maupun global. Dengan visi untuk menciptakan dunia yang lebih baik dan berkelanjutan, Avi Humanity fokus pada berbagai program, mulai dari bantuan bencana, penyediaan kebutuhan dasar, hingga pemberdayaan masyarakat.</p>
            <a href="tentang-kami.php"><button class="btn_primary">Baca Selengkapnya</button></a>
        </div>
        <div class="section_4_image">
            <img src="images/about_image.png" alt="">
        </div>
    </div>
    <div class="article_section">
        <div class="divider divider_bottom divider_yellow"></div>
        <div class="heading_home green_heading padding_container">
            <h1>Artikel Kami</h1>
            <a href="artikel.php">Lihat Lainnya</a>
        </div>
        <div class="article_layout">
            <div class="article_container">
                @foreach ($articles as $article)
                <div class="article_box">
                    <div class="article_image">
                        <img src="{{ asset('storage/'.$article['images']) }}" alt="">
                    </div>
                    <div class="article_content">
                        <span>Diposting {{ $article['date'] }}</span>
                        <h3>{{ $article['title'] }}</h3>
                        <p>{{ Str::substr($article['description'], 0, 200) }}...</p>
                        <a href="{{ url('detail-berita/'.$article['id']) }}"><button class="btn_box">Baca Selengkapnya</button></a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="cta_section">
        <div class="cta_box">
            <h1>Jadilah Volunteer</h1>
            <p>Bergabunglah bersama AVI Humanity sebagai volunteer dan jadikan aksi nyata Anda bagian dari perubahan positif!</p>
            <a href="#"><button>Gabung Sekarang</button></a>
        </div>
        <div class="cta_box cta_box_2">
            <h1>Mulai Donasi</h1>
            <p>Bersama AVI Humanity, setiap donasi Anda adalah langkah nyata untuk membantu mereka yang membutuhkan.</p>
            <a href="#"><button>Donasi Sekarang</button></a>
        </div>
    </div>
    @include('web.template.footer')