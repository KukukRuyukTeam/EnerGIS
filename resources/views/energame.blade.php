<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/home.css') }}">
    <link rel="stylesheet" href="{{ asset('/energame.css') }}">
    <title>Energame</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.5.1/axios.min.js" integrity="sha512-emSwuKiMyYedRwflbZB2ghzX8Cw8fmNVgZ6yQNNXXagFzFOaQmbvQ1vmDkddHjm5AITcBIZfC7k4ShQSjgPAmQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>
<body>
<div style="background-image: url('image/banner.png');background-size: 100% 100%;background-repeat: no-repeat;">
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
    <div style="padding: 5%;width: 90%;background-color: none;">
        <div style="display: flex;margin-top: 1%;margin-bottom: 2%;justify-content: center;flex-direction: column;align-items: center;">
            <span style="color: WHITE;font-size: 48PX;font-family: poppins;font-weight: 800;text-align: center;"> EnerGame </span>
        </div>
    </div>
</div>

<div style="width: 100%;height: 80vh;margin-top: 5%;display: flex;flex-direction: column;align-items: center;">
    <span style="font-size: 38PX;font-family: Lexend;font-weight: 700;text-align: center;margin-top: 2%;">Pilih level dan uji pengetahuanmu</span>
    <div style="display: flex;align-items: center;margin-top: 2%;width: 100%;justify-content: center;gap: 1%;">
        <div class="level" onclick="level(this,'beginner')">
            <img src="image/icon_beginner.png" width="30%">
            <span style="font-size: 38PX;font-family: Lexend;font-weight: 700;text-align: center;margin-top: 5%;">Beginner</span>
            <span style="font-size: 18PX;font-family: Lexend;font-weight: 700;text-align: center;">Mulai dari level termudah</span>
        </div>
        <div class="level" onclick="level(this,'intermediate')">
            <img src="image/icon_intermediate.png" width="30%">
            <span style="font-size: 38PX;font-family: Lexend;font-weight: 700;text-align: center;margin-top: 5%;">Intermediate</span>
            <span style="font-size: 18PX;font-family: Lexend;font-weight: 700;text-align: center;">Coba tantang dirimu</span>
        </div>
        <div class="level" onclick="level(this,'advance')">
            <img src="image/icon_advanced.png" width="30%">
            <span style="font-size: 38PX;font-family: Lexend;font-weight: 700;text-align: center;margin-top: 5%;">Advanced</span>
            <span style="font-size: 18PX;font-family: Lexend;font-weight: 700;text-align: center;">Maksimalkan Kemampuanmu</span>
        </div>
    </div>
</div>

<div id="loading" style="display: none;justify-content: center;width: 100vw;height: 100vh;position: absolute;top: 0;overflow: unset">
    <img src="image/Mohon_ditunggu.gif" width="100%">
</div>

<div style="width: 80%;margin-left: 10%;background-color: #5198F8;border-radius: 10px;height: 35vh;display: flex;justify-content: center;align-items: center;gap: 5%;margin-top: 5%;">
    <div style="display: flex;flex-direction: column;width: 50%;justify-content: center;align-items: center;">
        <span style="font-size: 42PX;font-family: Lexend;font-weight: 700;text-align: center;">Gunakan Kode</span>
        <span style="font-family: Lexend;">Bermain bersama temanmu</span>
    </div>
    <div style=" display: flex;flex-direction: column;width: 50%;justify-content: center;align-items: center;">
        <input type="text" class="input-code" placeholder="Masukan kode" id="kode" style="color: #021C3F">
        <button class="btn-gabung" onclick="document.getElementById('modal').style.display = 'flex'">Gabung</button>
    </div>
</div>
<div class="modal-nama" id="modal">
    <div class="modal-content">
        <span style="font-size: 42PX;font-family: Lexend;font-weight: 700;text-align: center;color: #021C3F">Username</span>
        <span style="font-family: Lexend;margin-bottom: 5%;color: #021C3F">Buat username dan tekan mulai untuk bermain bersama temanmu!</span>
        <input type="text" class="input-code" style="border: 1px #5198F8 solid;height: 6vh;padding-left: 2%;width: 60%;color: #021C3F" placeholder="Username" id="nama">
        <button class="btn-start" style="border: none;background-color: #5198F8;color: white;height: 5vh;width: 15%" onclick="startQuiz()">Mulai</button>
    </div>
</div>
<div style="width: 94%;background-color: #021C3F;height: 20vh;margin-top: 5%;padding: 3%;">
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
        <span style="color: white;font-weight: 600;line-height: 1.5;">Tautan<br><a style="font-weight: 200;">Pembangkit Listrik</a><br><a style="font-weight: 200;">Chatbot</a></span>
        <span style="color: white;font-weight: 600;line-height: 1.5;">Tentang<br><a style="font-weight: 200;">Kontak</a><br><a style="font-weight: 200;">Tim</a></span>
        <span style="color: white;line-height: 1.5;text-align: right;">Kukuk Ruyuk Team<br><span>Teknologi Rekayasa Perangkat Lunak</span><br><span>Sekolah Vokasi Institut Pertanian Bogor</span><br><span>Bogor, Indonesia</span></span>

    </div>
    <div class="footer" >
        <span style="color: white;font-size: 12px;margin-right: 2%;">HAK CIPTA &copy; 2023 KUKUK RUYUK</span>
    </div>
</div>
</body>
<script>
    sessionStorage.setItem('questionNumber',0)
    sessionStorage.setItem('kode',"47590")

    async function createSoal(level) {
        window.scrollTo({
            top: 0,
            behavior: 'smooth' // Optional: Add smooth scrolling animation
        });
        document.getElementById('loading').style.display = 'flex';
        document.body.style.overflow = "hidden"

        axios.post(`{{url("api/createquestion/")}}`, {level: level}).then(res=>{
            sessionStorage.setItem('kode',res.data.kode)
            location.href = "rangking"
        }).catch(e=>{
            console.log(e)

            document.getElementById('loading').style.display = 'none';
            alert("gagal membuat soal, silahkan coba lagi!")
        })

    }
    async function startQuiz() {

        axios.post(`api/getquestion`, {
            "kode": document.getElementById('kode').value,
            "nama": document.getElementById('nama').value
        }).then(res=>{
            sessionStorage.setItem('kode',document.getElementById('kode').value)
            sessionStorage.setItem("nama", document.getElementById('nama').value)
            location.href = "rangking"
        }).catch(e=>{
            alert("Nama tidak tersedia")
            console.log(e)
        })

    }

    function level(button,level) {
        const randomId = function(length = 6) {
            return Math.random().toString(36).substring(2, length+2);
        };
        sessionStorage.setItem('nama', randomId(10))
        const cards = document.querySelectorAll(".level");
        cards.forEach((c) => c.classList.remove("active"));
        button.classList.add("active")

        // createSoal(level)
        location.href = "rangking"
    }
</script>
</html>
