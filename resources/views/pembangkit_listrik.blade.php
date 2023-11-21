<html>
<head>
    <title>Peta</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <link rel="stylesheet" href="{{ asset('/home.css') }}">
</head>
<body>
    <div style="background-image: url('image/banner.png');background-size: 100% 70%;background-repeat: no-repeat;">
        <header>
            <nav>
                <ul>
                    <a style="position: absolute;left: 5%;top: 3%;background-image: url('image/logo_biru.png'); background-size: cover;width: 92px;height: 40px;" href="{{url('')}}"></a>
                    <li><a href="{{url('pembangkit')}}">Pembangkit Listrik</a></li>
                    <li><a href="{{url('energame')}}">EnerGame</a></li>
                    <li><a href="{{url('peta')}}">Peta</a></li>
                    <li><a href="{{url('tentang')}}">Tentang</a></li>
                </ul>
            </nav>
        </header>
        <div style="padding: 5%;width: 90%;background-color: none;height: 30vh;">
            <div style="display: flex;margin-top: 1%;margin-bottom: 2%;justify-content: center;flex-direction: column;align-items: center;">
                <span style="color: WHITE;font-size: 48PX;font-family: poppins;font-weight: 800;text-align: center;"> Pembangkit Listrik </span>
            </div>
        </div>
    </div>
    <div style="display: flex;width: 90%;margin-left: 5%">
        <div style="display:flex;flex-direction: column">
            <span style="font-weight: 600;font-size: 28px;margin-bottom: 3vh;color: #021C3F;">Pengertian pembangkit listrik</span>
            <span style="font-size: 22px;width: 90%;color: #021C3F;line-height: 30px;">Pembangkit tenaga listrik atau generator adalah alat untuk mengubah tenaga mekanis menjadi tenaga listrik.</span>
            <span style="font-weight: 600;font-size: 28px;margin-bottom: 3vh;color: #021C3F;margin-top: 3vh">Pengertian energi alternatif</span>
            <span style="font-size: 22px;width: 90%;color: #021C3F;line-height: 30px;">Energi alternatif adalah pengganti energi berbahan bakar fosil, artinya energi yang sumbernya merupakan energi terbarukan.</span>
        </div>
        <img src="image/penjelasan_pembangkit.png" width="30%">
    </div>
    <div style="display: flex;width: 90%;margin-left: 5%;margin-top: 5vh" >
        <div style="display: flex;justify-content: center;border-top-left-radius: 10px;border-top-right-radius: 10px;align-items: center;width: 30%;height: 10vh" onclick="changeCard(this, 'energi-alternatif')" class="btn-penjelasan active">
            <span style="font-weight: 600;font-size: 22px;">Energi Alternantif</span>
        </div>
        <div style="display: flex;justify-content: center;border-top-left-radius: 10px;border-top-right-radius: 10px;align-items: center;width: 30%;height: 10vh;margin-left: 5%" onclick="changeCard(this, 'pembangkit-listrik')" class="btn-penjelasan">
            <span style="font-weight: 600;font-size: 22px;">Pembangkit Listrik</span>
        </div>
        <div style="display: flex;justify-content: center;border-top-left-radius: 10px;border-top-right-radius: 10px;align-items: center;width: 30%;height: 10vh;margin-left: 5%" onclick="changeCard(this, 'penggunaan-energi')" class="btn-penjelasan">
            <span style="font-weight: 600;font-size: 22px;">Penggunaan Energi</span>
        </div>
    </div>
    <div style="display: flex;background-color: #B9D7FF;flex-direction: column;align-items: center" id="energiAlternatif">
        <span style="font-weight: 600;font-size: 28px;margin-bottom: 3vh;color: #021C3F;margin-top: 5vh">Macam-Macam Energi Alternatif</span>
        <div style="border-radius: 10px;width: 80%;padding: 2%;background-color: white;display: flex;flex-direction: column;margin-bottom: 5vh">
            <span style="font-weight: 600;font-size: 28px;margin-bottom: 1vh;color: #021C3F;">Energi Air</span>
            <span style="font-size: 16px;color: #021C3F;">Air yang mengalir dari hulu ke hilir, khususnya pada sungai-sungai yang deras, dapat dimanfaatkan sebagai sumber energi alternatif untuk membangkitkan energi listrik. Arus air sungai tersebut dimanfaatkan untuk menggerakkan turbin yang terhubung pada generator sehingga energi listrik dapat dihasilkan. Energi ini merupakan salah satu energi paling banyak digunakan untuk keperluan pembangkit energi listrik, khususnya di Indonesia. Air ada dimana-mana, jumlahnya tidak pernah habis, dan tetap. Prinsip kerjanya adalah aliran air di permukaan Bumi dibendung kemudian dialirkan menuju ke tempat yang lebih rendah untuk memutar turbin sehingga menghasilkan energi listrik.</span>
            <span style="font-weight: 600;font-size: 28px;margin-bottom: 1vh;color: #021C3F;margin-top: 5vh">Energi Angin</span>
            <span style="font-size: 16px;color: #021C3F;">Energi angin memanfaatkan tenaga angin dengan menggunakan kincir angin untuk diubah menjadi energi listrik atau bentuk energi lainnya. Angin adalah gerakan udara di permukaan bumi yang terjadi karena adanya perbedaan tekanan udara. Udara mengalir dari tempat yang bertekanan tinggi ke tempat yang bertekanan rendah. Udara yang bergerak menimbulkan energi yang disebut energi angin.</span>
            <span style="font-weight: 600;font-size: 28px;margin-bottom: 1vh;color: #021C3F;margin-top: 5vh">Energi Biomassa</span>
            <span style="font-size: 16px;color: #021C3F;">Energi biomassa berasal dari bahan organik yang dihasilkan dari tanaman. Biomassa sendiri dibagi menjadi tiga, yaitu<br>&nbsp 1. Biogas merupakan salah satu jenis biomassa yang terbuat dari gas metana dan pupuk organik. Biogas ini timbul karena fermentasi dari bakteri anaerobik. Contohnya kotoran sapi, sampah dedaunan, dan sampah-sampah lain yang berasal dari organisme yang belum lama mati atau organisme hidup.<br>&nbsp 2. Bioetanol merupakan salah satu bahan bakar alternatif yang terbuat dari karbohidrat (gula) seperti sagu, jagung, gandum, tebu, kentang, dan ubi-ubian, seperti uji jalar dan ubi kayu.<br>&nbsp 3. Biodiesel adalah bahan bakar yang sifatnya mirip dengan minyak diesel/solar yang berasal dari bahan-bahan hayati, seperti lemak hewani dan nabati. Umumnya, digunakan kelapa sawit sebagai pembuatan sumber energi bahan bakar.</span>
            <span style="font-weight: 600;font-size: 28px;margin-bottom: 1vh;color: #021C3F;margin-top: 5vh">Energi Matahari</span>
            <span style="font-size: 16px;color: #021C3F;">Energi matahari merupakan sumber energi yang memanfaatkan matahari untuk menyinari atau memberi energi pada perangkat lempengan logam sel surya, sehingga menghasilkan energi listrik. Energi matahari merupakan sumber energi terbesar dan paling melimpah. Melalui penggunaan panel surya, energi matahari dapat diubah menjadi energi listrik. Energi yang diperoleh saat matahari bersinar terang akan disimpan dalam baterai agar dapat digunakan saat cuaca mendung atau bahkan malam hari. Pada saat cuaca mendung, energi listrik yang diperoleh tidak dapat dihasilkan secara maksimal.<br><br>Penggunaan energi surya di Indonesia diterapkan dalam dua macam teknologi, yaitu teknologi energi surya termal dan energi surya fotovoltaik. Suhu yang tinggi dari energi surya termal digunakan untuk memasak (kompor surya), mengeringkan hasil pertanian, dan memanaskan air. Energi surya fotovoltaik digunakan untuk menghasilkan listrik yang nantinya dapat digunakan untuk menyalakan lampu, memutar pompa air, menyalakan televisi, dan sebagai energi alat telekomunikasi.</span>
            <span style="font-weight: 600;font-size: 28px;margin-bottom: 1vh;color: #021C3F;margin-top: 5vh">Energi Panas Bumi</span>
            <span style="font-size: 16px;color: #021C3F;">Salah satu sumber energi yang dapat dikembangkan di Indonesia adalah geothermal atau panas bumi. Indonesia merupakan negara dengan sistem hidrotermal untuk sumber geotermal terbesar di dunia dengan potensi lebih dari 17.000 MW yang dapat menghemat 40 persen sumber daya panas bumi dunia. </span>
        </div>
    </div>
    <div style="display: none;background-color: #B9D7FF;flex-direction: column;align-items: center;" id="pembangkitListrik">
        <span style="font-weight: 600;font-size: 28px;margin-bottom: 5vh;color: #021C3F;margin-top: 5vh">Macam-Macam Energi Alternatif</span>
        <div style="display: flex;width: 90%;margin-bottom: 5vh;justify-content: center">
            <div style="display: flex;flex-direction: column;align-items: center;padding: 1%;background-color: white;border-radius: 10px;width: 30%">
                <img src="image/penjelasan_plta.png" width="98%">
                <span style="font-weight: 600;font-size: 28px;color: #021C3F;">PLTA</span>
                <span style="font-size: 16px;color: #021C3F;text-align: justify;margin-bottom: 5vh">Pembangkit Listrik Tenaga Air adalah pembangkit yang mengandalkan energi potensial dan kinetik dari air untuk menghasilkan energi listrik. Energi listrik yang dibangkitkan ini disebut hidroelektrik. Komponen pembangkit listrik jenis ini adalah generator yang dihubungkan ke turbin yang digerakkan oleh energi kinetik dari air. Namun, secara luas pembangkit listrik tenaga air tidak hanya terbatas pada air dari sebuah waduk atau air terjun, melainkan juga pembangkit listrik yang menggunakan tenaga air dalam bentuk lain seperti tenaga ombak.</span>
            </div>
            <div style="display: flex;flex-direction: column;align-items: center;padding: 1%;background-color: white;border-radius: 10px;width: 30%;margin-left: 1%">
                <img src="image/penjelasan_plts.png" width="98%">
                <span style="font-weight: 600;font-size: 28px;color: #021C3F;">PLTS</span>
                <span style="font-size: 16px;color: #021C3F;text-align: justify;margin-bottom: 5vh">Pembangkit Listrik Tenaga Surya  adalah pembangkit listrik yang memanfaatkan panel surya. Panel surya merupakan alat yang dapat mengubah sinar matahari menjadi energi listrik. Ketika cahaya matahari menabrak permukaan panel surya menyebabkan elektron (partikel penyusun atom yang bermuatan negatif) pada panel surya bergerak melalui suatu konduktor dan menjadi arus listrik. Mekanisme kerja panel surya ini terinspirasi oleh mekanisme fotosintesis yang terjadi pada daun tumbuhan.</span>
            </div>
            <div style="display: flex;flex-direction: column;align-items: center;padding: 1%;background-color: white;border-radius: 10px;width: 30%;margin-left: 1%">
                <img src="image/penjelasan_pltb.png" width="98%">
                <span style="font-weight: 600;font-size: 28px;color: #021C3F;">PLTB</span>
                <span style="font-size: 16px;color: #021C3F;text-align: justify;margin-bottom: 5vh">Pembangkit Listrik Tenaga Bayu adalah pembangkit listrik yang mengandalkan energi gerak dari angin (bayu) untuk menghasilkan energi listrik. Komponen pembangkit listrik ini adalah kincir angin dan generator listrik. PLTB umumnya digunakan dalam ladang angin dalam skala besar untuk menyediakan listrik di lokasi yang terisolir. Energi gerak, yang dihasilkan oleh gerakan angin terhadap kincir, diubah oleh generator menjadi energi listrik. Berbeda dengan batu bara, gas, dan minyak bumi, kincir angin tidak menyebabkan polusi bagi lingkungan, sehingga kincir angin dipercaya ramah lingkungan.</span>
            </div>
        </div>
        <div style="display: flex;width: 90%;margin-bottom: 5vh;justify-content: center">
            <div style="display: flex;flex-direction: column;align-items: center;padding: 1%;background-color: white;border-radius: 10px;width: 30%">
                <img src="image/penjelasan_pltp.png" width="98%">
                <span style="font-weight: 600;font-size: 28px;color: #021C3F;">PLTP</span>
                <span style="font-size: 16px;color: #021C3F;text-align: justify;margin-bottom: 5vh">Pembangkit Listrik Tenaga Panas Bumi merupakan pembangkit listrik menghasilkan listrik dari gerak turbina yang digerakkan oleh panas bumi</span>
            </div>
            <div style="display: flex;flex-direction: column;align-items: center;padding: 1%;background-color: white;border-radius: 10px;width: 30%;margin-left: 1%">
                <img src="image/penjelasan_pltm.png" width="98%">
                <span style="font-weight: 600;font-size: 28px;color: #021C3F;">PLTM</span>
                <span style="font-size: 16px;color: #021C3F;text-align: justify;margin-bottom: 5vh">Pembangkit Listrik Tenaga Minihidro adalah jenis pembangkit listrik yang menggunakan tenaga air sebagai bahan bakarnya sehingga dapat menghasilkan listrik. Perbedaan singkat antara PLTA, PLTM, dan PLTMH adalah pada kapasitas pembangkit. Secara sederhana, pembangkit dengan kapasitas kurang dari 1 MW biasa disebut mikrohidro, antara 1 MW s/d 10 MW mini hidro sedangkan di atas 10 MW disebut PLTA.</span>
            </div>
            <div style="display: flex;flex-direction: column;align-items: center;padding: 1%;background-color: white;border-radius: 10px;width: 30%;margin-left: 1%">
                <img src="image/penjelasan_pltbm.png" width="98%">
                <span style="font-weight: 600;font-size: 28px;color: #021C3F;">PLTBm</span>
                <span style="font-size: 16px;color: #021C3F;text-align: justify;margin-bottom: 5vh">Pembangkit Listrik Tenaga Biomassa adalah pembangkit listrik yang menggunakan bahan bakar yang dikonversikan dari bahan biologis dan organik. Energi yang diperoleh dari biomassa ini dapat diubah menjadi energi listrik dengan cara mengolah biomassa menjadi bahan bakar nabati, misalnya etanol atau biodisel. Bahan bakar nabati ini selanjutnya dapat digunakan sebagai bahan bakar generator atau diesel untuk menghasilkan listrik.</span>
            </div>
        </div>
        <div style="display: flex;width: 90%;margin-bottom: 5vh;justify-content: center">
            <div style="display: flex;flex-direction: column;align-items: center;padding: 1%;background-color: white;border-radius: 10px;width: 30%">
                <img src="image/penjelasan_pltmh.png" width="98%">
                <span style="font-weight: 600;font-size: 28px;color: #021C3F;">PLTMh</span>
                <span style="font-size: 16px;color: #021C3F;text-align: justify;margin-bottom: 5vh">Pembangkit Listrik Tenaga Mikrohidro adalah suatu pembangkit listrik skala kecil yang menggunakan tenaga air sebagai tenaga penggeraknya seperti, saluran irigasi, sungai atau air terjun alam dengan cara memanfaatkan tinggi terjunan dan jumlah debit air.</span>
            </div>
        </div>
    </div>
    <div style="display: none;background-color: #B9D7FF;flex-direction: column;align-items: center" id="penggunaanEnergi">
        <span style="font-weight: 600;font-size: 28px;margin-bottom: 3vh;color: #021C3F;margin-top: 5vh">Macam-Macam Energi Alternatif</span>
        <div style="border-radius: 10px;width: 80%;padding: 2%;background-color: white;display: flex;flex-direction: column;margin-bottom: 5vh;align-items: center">
            <span style="font-weight: 600;font-size: 28px;margin-bottom: 1vh;color: #021C3F;">Penggunaan Energi Non-Terbarukan</span>
            <span style="font-size: 16px;color: #021C3F;">Ketika menggunakan sumber energi yang tidak ramah lingkungan, pengolahannya menghasilkan sisa buangan berupa karbon yang merupakan salah satu gas rumah kaca. Hal lainnya yang perlu diperhatikan adalah terkait penggunaan energi. Penggunaan energi yang kurang bijak juga dapat menyebabkan kerusakan pada lingkungan.</span>
        </div>
        <div style="display:flex;width: 84%">
            <div style="border-radius: 10px;padding: 2%;background-color: white;display: flex;flex-direction: column;margin-bottom: 5vh;margin-right: 3%">
                <span style="font-weight: 600;font-size: 28px;margin-bottom: 1vh;color: #021C3F;">Penggunaan Energi Non-Terbarukan</span>
                <span style="font-size: 16px;color: #021C3F;line-height: 25px">1. Energi alternatif merupakan energi terbarukan yang jumlahnya banyak dan mudah &nbsp &nbsp dijangkau, hal ini menjamin ketersediaan sumber energi alternatif,<br>2. Menjaga lingkungan tetap terpelihara karena dalam pemanfaatannya, energi alternatif &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp tetap dapat lestari, dan<br>3. Tidak menyebabkan pencemaran, seperti pencemaran udara, air, dan tanah.</span>
            </div>
            <img src="image/keuntungan_energi.png" width="50%" style="height: 30vh">
        </div>
        <div style="border-radius: 10px;width: 80%;padding: 2%;background-color: white;display: flex;flex-direction: column;margin-bottom: 5vh;align-items: center">
            <span style="font-weight: 600;font-size: 28px;margin-bottom: 1vh;color: #021C3F;">Upaya Pemenuhan Kebutuhan Energi</span>
            <span style="font-size: 16px;color: #021C3F;text-align: center">Untuk mengatasi berbagai masalah pemenuhan kebutuhan energi, para pemimpin dunia, termasuk Indonesia, berkumpul dan bersepakat hingga dihasilkan sebuah program yang disebut Sustainable Development Goals (SDGs). Program tersebut berisi rumusan 17 target untuk mengatasi kemiskinan dan kesenjangan sosial, serta masalah lingkungan. Harapannya, target-target tersebut dapat dicapai pada 2030. Salah satu program SDGs kaitannya dengan energi dan dampaknya pada lingkungan adalah SDG7, affordable and clean energy, yaitu memastikan ketersediaan energi yang ramah lingkungan bagi seluruh masyarakat.</span>
        </div>
        <div style="display:flex;width: 84%;height: 70vh;margin-bottom: 5vh">
            <img src="image/transmisi_energi.png" width="40%">
            <div style="border-radius: 10px;padding: 2%;background-color: white;display: flex;flex-direction: column;margin-left: 3%;height: 90%">
                <span style="font-weight: 600;font-size: 28px;margin-bottom: 1vh;color: #021C3F;text-align: end">Transmisi Energi Listrik</span>
                <span style="font-size: 18px;color: #021C3F;text-align: end">Transmisi listrik jarak jauh dilakukan dengan menaikkan tegangan listrik. Jika tegangan listrik untuk transmisi jarak jauh rendah, maka arus listriknya akan menjadi besar sehingga diperlukan kabel listrik yang besar dan banyak energi yang terbuang menjadi kalor saat listrik disalurkan dari PLN ke rumah-rumah. Namun, dengan tegangan yang tinggi, arus listrik akan menjadi kecil sehingga kabel listrik yang dibutuhkan kecil dan tidak terlalu banyak energi yang terbuang.<br>Agar tegangan listrik dari PLN dapat dinaikkan, maka diperlukan transformator step up. PLN memproduksi listrik dengan tegangan sebesar 10.000 volt, sehingga perlu dinaikkan menjadi sekitar 150.000 volt. Transmisi energi listrik dengan tegangan sebesar ini dilakukan dengan menaikkan kabel pada gardu-gardu listrik yang tinggi agar aman bagi penduduk. Pada transmisi berikutnya digunakan transformator step down untuk menurunkan tegangan hingga menjadi 220 volt sehingga dapat langsung didistribusikan ke penduduk.</span>
            </div>
        </div>
    </div>
    <div style="width: 94%;background-color: #021C3F;height: 20vh;padding: 3%;">
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
            <span style="color: white;font-weight: 600;line-height: 1.5;">Tautan<br><a style="font-weight: 200;">Pembangkit Listrik</a><br><a style="font-weight: 200;">SPKLU</a><br><a style="font-weight: 200;">Chatbot</a></span>
            <span style="color: white;font-weight: 600;line-height: 1.5;">Tentang<br><a style="font-weight: 200;">Kontak</a><br><a style="font-weight: 200;">Tim</a></span>
            <span style="color: white;line-height: 1.5;text-align: right;">Kukuk Ruyuk Team<br><span>Teknologi Rekayasa Perangkat Lunak</span><br><span>Sekolah Vokasi Institut Pertanian Bogor</span><br><span>Bogor, Indonesia</span></span>

        </div>
        <div class="footer" >
            <span style="color: white;font-size: 12px;margin-right: 2%;">HAK CIPTA &copy; 2023 KUKUK RUYUK</span>
        </div>
    </div>
</body>
<script>
    function changeCard(button, card){
        const cards = document.querySelectorAll(".btn-penjelasan");
        cards.forEach((c) => c.classList.remove("active"));
        button.classList.add("active")
        if(card=="energi-alternatif"){
            document.getElementById("energiAlternatif").style.display = "flex"
            document.getElementById("pembangkitListrik").style.display = "none"
            document.getElementById("penggunaanEnergi").style.display = "none"
        }
        if(card=="pembangkit-listrik"){
            document.getElementById("pembangkitListrik").style.display = "flex"
            document.getElementById("penggunaanEnergi").style.display = "none"
            document.getElementById("energiAlternatif").style.display = "none"
        }
        if(card=="penggunaan-energi"){
            document.getElementById("penggunaanEnergi").style.display = "flex"
            document.getElementById("energiAlternatif").style.display = "none"
            document.getElementById("pembangkitListrik").style.display = "none"
        }
    }
</script>
</html>
