@include('web.template.header')
<div class="banner_page">
    <h1>Kontak Kami</h1>
</div>
<div class="contact_container">
    <div class="divider divider_top divider_yellow"></div>
    <div class="contact_layout">
        <div class="contact_page">
            <div class="contact_page_content">
                <h1>Hubungi Kami</h1>
                <p>Apakah Anda memiliki pertanyaan, ingin berkontribusi, atau mencari informasi lebih lanjut mengenai program dan kegiatan kami? Jangan ragu untuk menghubungi kami!</p>
                <div class="contact_list">
                    <div class="contact_list_icon">
                        <iconify-icon icon="weui:location-outlined"></iconify-icon>
                    </div>
                    <div class="contact_list_text">
                        <h3>Alamat</h3>
                        <span>Jl. Kebagusan II D No.5 3, RT.3/RW.7, Kebagusan, Ps. Minggu, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12520</span>
                    </div>
                </div>
                <div class="contact_list">
                    <div class="contact_list_icon">
                        <iconify-icon icon="ph:phone-light"></iconify-icon>
                    </div>
                    <div class="contact_list_text">
                        <h3>Nomor Telepon</h3>
                        <span>+62895-3202-79323</span>
                    </div>
                </div>
                <div class="contact_list">
                    <div class="contact_list_icon">
                        <iconify-icon icon="ph:envelope-simple-light"></iconify-icon>
                    </div>
                    <div class="contact_list_text">
                        <h3>Email</h3>
                        <span>cs@avihumanity.or.id</span>
                    </div>
                </div>
                <div class="divider_contact"></div>
                <div class="social_media_contact_layout">
                    <h3>Ikuti Kami</h3>
                    <div class="social_media_contact">
                        <a href="#">
                            <div class="social_media_contact_box">
                                <iconify-icon icon="mingcute:facebook-fill"></iconify-icon>
                            </div>
                        </a>
                        <a href="#">
                            <div class="social_media_contact_box">
                                <iconify-icon icon="uil:instagram"></iconify-icon>
                            </div>
                        </a>
                        <a href="#">
                            <div class="social_media_contact_box">
                                <iconify-icon icon="uil:youtube"></iconify-icon>
                            </div>
                        </a>
                        <a href="#">
                            <div class="social_media_contact_box">
                                <iconify-icon icon="akar-icons:linkedin-fill"></iconify-icon>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="contact_page_form">
                <h3>Kirim kami pesan</h3>
                <form action="">
                    <input type="text" placeholder="Nama Kamu">
                    <input type="email" placeholder="Email Kamu">
                    <textarea name="" placeholder="Pesan"></textarea>
                    <p>Tim kami dengan senang hati akan membantu Anda seputar kebutuhan atau kerjasama yang dapat membawa manfaat lebih luas bagi masyarakat.</p>
                    <button>Kirim Pesan</button>
                </form>
            </div>
        </div>
        <div class="contact_map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3404.7930180179314!2d106.82465885430845!3d-6.306149527415064!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ed00480f0c9f%3A0x8a84ba678f4f0cdd!2sALQuds%20Volunteer%20Indonesia!5e0!3m2!1sen!2sid!4v1726738593877!5m2!1sen!2sid" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <div class="contact_box"></div>
        </div>
    </div>
</div>
@include('web.template.footer')
