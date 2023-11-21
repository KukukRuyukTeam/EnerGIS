<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/home.css') }}">
    <title>EnerGis</title>

</head>
<body>
<div style="background-image: url('image/banner.png');background-size: 100% 100%;background-repeat: no-repeat;">
    <header>
        <nav>
            <ul>
                <a style="position: absolute;left: 5%;top: 3%;background-image: url('image/logo_biru.png'); background-size: cover;width: 92px;height: 40px;"></a>
                <li><a href="{{url('pembangkit')}}">Pembangkit Listrik</a></li>
                <li><a href="{{url('energame')}}">EnerGame</a></li>
                <li><a href="{{url('peta')}}">Peta</a></li>
                <li><a href="{{url('tentang')}}">Tentang</a></li>
            </ul>
        </nav>
    </header>
    <div style="padding: 5%;width: 90%;background-color: none;height: 50vh;">
        <div
            style="display: flex;margin-top: 1%;margin-bottom: 2%;justify-content: center;flex-direction: column;align-items: center;">
            <span style="color: WHITE;font-size: 48PX;font-family: poppins;font-weight: 800;text-align: center;"><span
                    style="color: #B9D7FF;">Keberlanjutan</span> Dimulai<br>Dengan Energi <span style="color: #B9D7FF;">Terbarukan</span></span>
            <input type="text" style="display: none" class="search" placeholder="Temukan lokasi energi terbarukan">
        </div>
    </div>
</div>
<div>

    <div class="slideshow-container">
        <div class="slideshow-viewport">
            <!-- Images will be added dynamically using JavaScript -->
        </div>

        <a class="next-button" onclick="changeSlide(1)">&#10095;</a>
    </div>
    <a class="prev-button" onclick="changeSlide(-1)">&#10094;</a>
    <div class="pagination-dots">
        <!-- Pagination dots will be added dynamically using JavaScript -->
    </div>
</div>

<div style="display: flex;margin-top: 25vh;width: 80%;margin-left: 10%;margin-bottom: 10vh;">
    <img width="15%" height="5%" src="image/logo_biru.png" class="logo" style="margin-right: 10%;">
    <div style="display: flex;flex-direction: column;">
        <span style="font-weight: 600;font-size: 24px;margin-bottom: 2%;">Bersama <span
                style="color: #B9D7FF;">Ener</span><span style="color: #5198F8;">GIS</span> Temukan pembangkit energi terbarukan</span>
        <span style="color: #706D6D;">EnerGIS hadir untuk membantu Anda menemukan lokasi dan informasi terkait pembangkit listrik dengan energi alternatif dan charging station yang berada di Indonesia.</span>
        <button
            style="background-color: white;color: #91B1DB;border-radius: 20px;border-color: #91B1DB;height: 5vh;border-style: solid;width: 25%;margin-top: 5%;font-family: poppins;">
            Lihat selengkapnya
        </button>
    </div>
</div>

<span style="font-weight: 600;font-size: 20px;margin-left: 5%;">Profile Pembangkit Energi Indonesia</span>
<div class="card-container">
    <div class="card active">
        <span style="color: #666666;font-size: 12px;margin-right: 2%;">01</span>
        <span style="margin-right: 20%;font-weight: 600;font-size: 30px;width: 20%;">AIR</span>
        <span class="totalListrik">3.504,02 MW <span style="color: #6A6A6A;">Listrik Dihasilkan</span></span>
        <img src="image/slide 1.png" width="20%" height="70%" style="margin-right: 2%;">
        <span class="deskripsi" style="width: 30%;color: #6A6A6A;font-size: 12px;">Pada tahun 2021, Indonesia mulai memanfaatkan Pembangkit Listrik Tenaga Air (PLTA), yang mengubah energi dari air menjadi listrik. Proses ini menggunakan potensi dan gerakan air untuk menghasilkan energi. Di tahun tersebut, tenaga air berkontribusi sekitar 8,50% dari total pasokan listrik Indonesia, yang memiliki kapasitas total 66.514 MW</span>
    </div>
    <div class="card">
        <span style="color: #666666;font-size: 12px;margin-right: 2%;">02</span>
        <span style="margin-right: 20%;font-weight: 600;font-size: 30px;width: 20%;">PANAS BUMI</span>
        <span class="totalListrik">579,26 MW <span style="color: #6A6A6A;">Listrik Dihasilkan</span></span>
        <img src="image/slide 1.png" width="20%" height="70%" style="margin-right: 2%;">
        <span class="deskripsi" style="width: 30%;color: #6A6A6A;font-size: 12px;">Pada tahun 2021, Indonesia mulai memanfaatkan Pembangkit Listrik Tenaga Air (PLTA), yang mengubah energi dari air menjadi listrik. Proses ini menggunakan potensi dan gerakan air untuk menghasilkan energi. Di tahun tersebut, tenaga air berkontribusi sekitar 8,50% dari total pasokan listrik Indonesia, yang memiliki kapasitas total 66.514 MW</span>
    </div>
    <div class="card">
        <span style="color: #666666;font-size: 12px;margin-right: 2%;">03</span>
        <span style="margin-right: 20%;font-weight: 600;font-size: 30px;width: 20%;">MIKROHIDRO</span>
        <span class="totalListrik">45,62 MW <span style="color: #6A6A6A;">Listrik Dihasilkan</span></span>
        <img src="image/slide 1.png" width="20%" height="70%" style="margin-right: 2%;">
        <span class="deskripsi" style="width: 30%;color: #6A6A6A;font-size: 12px;">Pada tahun 2021, Indonesia mulai memanfaatkan Pembangkit Listrik Tenaga Air (PLTA), yang mengubah energi dari air menjadi listrik. Proses ini menggunakan potensi dan gerakan air untuk menghasilkan energi. Di tahun tersebut, tenaga air berkontribusi sekitar 8,50% dari total pasokan listrik Indonesia, yang memiliki kapasitas total 66.514 MW</span>
    </div>
    <div class="card">
        <span style="color: #666666;font-size: 12px;margin-right: 2%;">04</span>
        <span style="margin-right: 20%;font-weight: 600;font-size: 30px;width: 20%;">MINIHIDRO</span>
        <span class="totalListrik">37,68 MW <span style="color: #6A6A6A;">Listrik Dihasilkan</span></span>
        <img src="image/slide 1.png" width="20%" height="70%" style="margin-right: 2%;">
        <span class="deskripsi" style="width: 30%;color: #6A6A6A;font-size: 12px;">Pada tahun 2021, Indonesia mulai memanfaatkan Pembangkit Listrik Tenaga Air (PLTA), yang mengubah energi dari air menjadi listrik. Proses ini menggunakan potensi dan gerakan air untuk menghasilkan energi. Di tahun tersebut, tenaga air berkontribusi sekitar 8,50% dari total pasokan listrik Indonesia, yang memiliki kapasitas total 66.514 MW</span>
    </div>
    <div class="card">
        <span style="color: #666666;font-size: 12px;margin-right: 2%;">05</span>
        <span style="margin-right: 20%;font-weight: 600;font-size: 30px;width: 20%;">SURYA</span>
        <span class="totalListrik">21,34 MW <span style="color: #6A6A6A;">Listrik Dihasilkan</span></span>
        <img src="image/slide 1.png" width="20%" height="70%" style="margin-right: 2%;">
        <span class="deskripsi" style="width: 30%;color: #6A6A6A;font-size: 12px;">Pada tahun 2021, Indonesia mulai memanfaatkan Pembangkit Listrik Tenaga Air (PLTA), yang mengubah energi dari air menjadi listrik. Proses ini menggunakan potensi dan gerakan air untuk menghasilkan energi. Di tahun tersebut, tenaga air berkontribusi sekitar 8,50% dari total pasokan listrik Indonesia, yang memiliki kapasitas total 66.514 MW</span>
    </div>
    <div class="card">
        <span style="color: #666666;font-size: 12px;margin-right: 2%;">06</span>
        <span style="margin-right: 20%;font-weight: 600;font-size: 30px;width: 20%;">BIOMASSA</span>
        <span class="totalListrik">0,5 MW <span style="color: #6A6A6A;">Listrik Dihasilkan</span></span>
        <img src="image/slide 1.png" width="20%" height="70%" style="margin-right: 2%;">
        <span class="deskripsi" style="width: 30%;color: #6A6A6A;font-size: 12px;">Pada tahun 2021, Indonesia mulai memanfaatkan Pembangkit Listrik Tenaga Air (PLTA), yang mengubah energi dari air menjadi listrik. Proses ini menggunakan potensi dan gerakan air untuk menghasilkan energi. Di tahun tersebut, tenaga air berkontribusi sekitar 8,50% dari total pasokan listrik Indonesia, yang memiliki kapasitas total 66.514 MW</span>
    </div>
    <div class="card">
        <span style="color: #666666;font-size: 12px;margin-right: 2%;">07</span>
        <span style="margin-right: 20%;font-weight: 600;font-size: 30px;width: 20%;">ANGIN</span>
        <span class="totalListrik">0,47 MW <span style="color: #6A6A6A;">Listrik Dihasilkan</span></span>
        <img src="image/slide 1.png" width="20%" height="70%" style="margin-right: 2%;">
        <span class="deskripsi" style="width: 30%;color: #6A6A6A;font-size: 12px;">Pada tahun 2021, Indonesia mulai memanfaatkan Pembangkit Listrik Tenaga Air (PLTA), yang mengubah energi dari air menjadi listrik. Proses ini menggunakan potensi dan gerakan air untuk menghasilkan energi. Di tahun tersebut, tenaga air berkontribusi sekitar 8,50% dari total pasokan listrik Indonesia, yang memiliki kapasitas total 66.514 MW</span>
    </div>
</div>
<div class="slide-side-card"></div>
<div class="slide-side-card2"></div>
<div class="slide-down-card"></div>
{{--<div style="display: flex;justify-content: space-between;">--}}
{{--    <span class="judul">Pembangkit Listrik dan Charging  Station<br><span style="color: #333333;font-size: 15px;">Sebaran sumber energi alternatif di Indonesia</span></span>--}}
{{--    <span class="judul jumlah-listrik" style="margin-left: 2%;width: 10%;">66000MW+<br><span--}}
{{--            style="color: #333333;font-size: 15px;">Listrik dihasilkan</span></span>--}}
{{--    <span class="judul pembangkit-listrik" style="color: #6D6D6D;margin-left: 4%;width: 12%;">300+<br><span--}}
{{--            style="color: #333333;font-size: 15px;">Pembangkit listrik</span></span>--}}
{{--    <span class="judul charging-station" style="color: #43CF2C;margin-left: 0;width: 15%;">800+<br><span--}}
{{--            style="color: #333333;font-size: 15px;">SPKLU</span></span>--}}
{{--</div>--}}
<img id="pulau" class="peta-penyebaran" width=90%" style="margin-left: 5%;margin-top: 2%;" src="image/sumatera.png">
<div class="kategori">
    <button class="btn-pulau active" onclick="pulau('sumatera')">SUMATERA</button>
    <button class="btn-pulau" onclick="pulau(this,'jawa')">JAWA</button>
    <button class="btn-pulau" onclick="pulau(this,'nusa_tenggara')">NUSA TENGGARA</button>
    <button class="btn-pulau" onclick="pulau(this,'kalimantan')">KALIMANTAN</button>
    <button class="btn-pulau" onclick="pulau(this,'sulawesi')">SULAWESI</button>
    <button class="btn-pulau" onclick="pulau(this,'papua')">PAPUA</button>
</div>
<div style="width: 94%;background-color: #021C3F;height: 20vh;margin-top: 10%;padding: 3%;">
    <div style="display: flex;flex-direction: row;justify-content: space-around;">
        <div>
            <div>
                <span style="color: white;font-size: 40px;">Ener<span style="font-weight: 600;">GIS</span></span>
            </div>
            <div style="display: flex;gap: 10%;">
                <img src="image/icon_ipb.png" width="15%">
                <img src="image/icon_email.png" width="15%">
                <img src="image/icon_call.png" width="15%">
                <img src="image/icon_github.png" width="15%">
            </div>
        </div>
        <span style="color: white;font-weight: 600;line-height: 1.5;">Tautan<br><a style="font-weight: 200;">Pembangkit Listrik</a><br><a
                style="font-weight: 200;">SPKLU</a><br><a style="font-weight: 200;">Chatbot</a></span>
        <span style="color: white;font-weight: 600;line-height: 1.5;">Tentang<br><a style="font-weight: 200;">Kontak</a><br><a
                style="font-weight: 200;">Tim</a></span>
        <span style="color: white;line-height: 1.5;text-align: right;">Kukuk Ruyuk Team<br><span>Teknologi Rekayasa Perangkat Lunak</span><br><span>Sekolah Vokasi Institut Pertanian Bogor</span><br><span>Bogor, Indonesia</span></span>

    </div>
    <div class="footer">
        <span style="color: white;font-size: 12px;margin-right: 2%;">HAK CIPTA &copy; 2023 KUKUK RUYUK</span>
    </div>
</div>
</body>
<script src="{{ asset('/slider.js') }}"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const cards = document.querySelectorAll(".card");

        cards.forEach((card) => {
            card.addEventListener("click", function () {
                // Remove the "active" class from all cards
                cards.forEach((c) => c.classList.remove("active"));
                // Add the "active" class to the clicked card
                this.classList.add("active");

            });
        });
    });
    const slideCard = document.querySelector(".slide-side-card");
    const slideCard2 = document.querySelector(".slide-side-card2");
    const slideCard3 = document.querySelector(".slide-down-card");
    const judul = document.querySelector(".judul");
    const jumlahListrik = document.querySelector(".jumlah-listrik");
    const pembangkitListrik = document.querySelector(".pembangkit-listrik");
    const chargingStation = document.querySelector(".charging-station");
    const petaPenyebaran = document.querySelector(".peta-penyebaran");

    const options = {
        threshold: 0.3, // The element becomes 50% visible
    };

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                slideCard.classList.add("animate");
                slideCard2.classList.add("animate");
                slideCard3.classList.add("animate");
                observer.unobserve(entry.target); // Stop observing once animation is triggered
            }
        });
    }, options);
    observer.observe(slideCard);

    const observer2 = new IntersectionObserver((entries, observer) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                judul.classList.add("animate");
                jumlahListrik.classList.add("animate");
                pembangkitListrik.classList.add("animate");
                chargingStation.classList.add("animate");
                petaPenyebaran.classList.add("animate");
                observer.unobserve(entry.target); // Stop observing once animation is triggered
            }
        });
    }, options);
    observer2.observe(judul);

    const scrollableContent = document.querySelector(".slideshow-container");
    let isDragging = false;
    let startX;
    let scrollLeft;


    scrollableContent.addEventListener('mousedown', (e) => {
        isDragging = true;
        startX = e.pageX - scrollableContent.offsetLeft;
        scrollLeft = scrollableContent.scrollLeft;
        scrollableContent.style.scrollBehavior = 'auto';
    });

    scrollableContent.addEventListener('mouseup', () => {
        isDragging = false;
        scrollableContent.style.scrollBehavior = 'smooth';
    });

    scrollableContent.addEventListener('mouseleave', () => {
        isDragging = false;
        scrollableContent.style.scrollBehavior = 'smooth';
    });

    scrollableContent.addEventListener('mousemove', (e) => {
        if (!isDragging) return;
        const x = e.pageX - scrollableContent.offsetLeft;
        const walk = (x - startX) * 2; // Adjust the scrolling speed
        scrollableContent.scrollLeft = scrollLeft - walk;
    });

    function startSlideshow() {
        const slideshow = document.getElementById('slideshow');
        slideshow.style.animation = 'slideshow 9s linear infinite'; // Mulai animasi

        setTimeout(function () {
            slideshow.style.animation = 'none'; // Hentikan animasi
            setTimeout(function () {
                slideshow.style.animation = 'slideshow 9s linear infinite'; // Mulai lagi setelah jeda
            }, 3000); // Jeda selama 3 detik (3000 milidetik)
        }, 3000); // Jeda selama 3 detik (3000 milidetik)
    }

    // Mulai slideshow setelah halaman selesai dimuat
    window.onload = startSlideshow;

    function pulau(button,nama) {
        const cards = document.querySelectorAll(".btn-pulau");
        var image = document.getElementById("pulau");
        if(nama == "jawa"){
            image.src = "image/jawa.png";
        }
        if(nama == "sumatera"){
            image.src = "image/sumatera.png";
        }
        if(nama == "kalimantan"){
            image.src = "image/kalimantan.png";
        }
        if(nama == "sulawesi"){
            image.src = "image/sulawesi.png";
        }
        if(nama == "nusa_tenggara"){
            image.src = "image/nusa_tenggara.png";
        }
        if(nama == "papua"){
            image.src = "image/papua.png";
        }
        cards.forEach((c) => c.classList.remove("active"));
        button.classList.add("active")
    }
</script>
</html>
