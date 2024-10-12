@include('web.template.header')
<div class="banner_page">
    <h1>Tentang Kami</h1>
</div>
<div class="about_layout">
    <div class="about_image">
        <img src="{{ asset('web/images/about_page.png') }}" alt="">
    </div>
    <div class="about_content">
        <h1>Apa itu AVI Humanity?</h1>
        <p>Avi Humanity adalah organisasi kemanusiaan yang didedikasikan untuk meningkatkan kualitas hidup masyarakat melalui berbagai program sosial dan bantuan kemanusiaan. Kami percaya bahwa setiap individu berhak mendapatkan kesempatan yang sama untuk hidup dengan bermartabat, tanpa memandang latar belakang, suku, atau agama.</p>
        <p>Didirikan dengan semangat kepedulian, Avi Humanity hadir untuk menjembatani kebutuhan masyarakat yang kurang beruntung dengan memberikan solusi yang berkelanjutan, baik melalui bantuan darurat, program pendidikan, kesehatan, maupun pemberdayaan ekonomi. Kami bekerja sama dengan berbagai pihak, termasuk pemerintah, organisasi non-profit lainnya, serta komunitas lokal, untuk mencapai misi kami.</p>
    </div>
</div>
<div class="vision_mision">
    <div class="vision_mision_box">
        <img src="{{ asset('web/images/vision.svg') }}" alt="">
        <h1>Visi AVI</h1>
        <p>Mewujudkan dunia yang peduli dan inklusif, di mana setiap individu memiliki kesempatan yang setara untuk hidup dengan martabat, akses terhadap hak-hak dasar, dan pemberdayaan sosial.</p>
    </div>
    <div class="vision_mision_box">
        <img src="{{ asset('web/images/mision.svg') }}" alt="">
        <h1>Misi AVI</h1>
        <ul>
            <li>Memberikan bantuan darurat kepada korban bencana dan mereka yang membutuhkan.</li>
            <li>Mendorong pemberdayaan masyarakat melalui program pendidikan dan pelatihan keterampilan.</li>
            <li>Meningkatkan akses terhadap layanan kesehatan dan gizi bagi masyarakat kurang mampu.</li>
            <li>Menyediakan platform bagi individu dan komunitas untuk terlibat dalam kegiatan sosial dan amal.</li>
        </ul>
    </div>
    <div class="divider divider_bottom divider_yellow"></div>
</div>
<div class="legality_section">
    <div class="legality_content">
        <div class="legality_heading">
        <img src="images/legality_1.png" alt="" class="legality_1">
        <img src="images/legality_2.png" alt="" class="legality_2">
            <h1>Legalitas AVI Humanity</h1>
            <p>AVI Humanity beroperasi secara resmi sebagai lembaga kemanusiaan yang terdaftar dan diakui oleh pemerintah.</p>
        </div>
        <div class="legality_layout">
            <img src="{{ asset('web/images/legality.jpg') }}" alt="">
            <img src="{{ asset('web/images/legality.jpg') }}" alt="">
            <img src="{{ asset('web/images/legality.jpg') }}" alt="">
            <img src="{{ asset('web/images/legality.jpg') }}" alt="">
        </div>
    </div>
</div>
<div class="box_legality">
</div>
<div class="cta_section">
    <div class="divider divider_top divider_yellow"></div>
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
