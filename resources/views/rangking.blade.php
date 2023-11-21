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
<div style="width: 100%;margin-top: 5%;display: flex;flex-direction: column;align-items: center;">
    <span style="font-size: 38PX;font-family: Lexend;font-weight: 700;text-align: center;margin-top: 1%;">Pilih level dan uji pengetahuanmu</span>
    <div style="background-color: #021C3F;width: 90%;height: 25vh;display: flex;justify-content: center;margin-top: 4%;border-radius: 10px;align-items: center">
        <span style="font-size: 42PX;font-family: Lexend;font-weight: 700;text-align: center;color: white" id="kode"></span>
    </div>
    <div style="display: flex;margin-top: 5%;align-items: end">
        <div class="card-medal" id="">
            <img src="image/medal_3.png" width="60%" style="margin-top: 10%">
            <div id="juara3" style="display: flex;flex-direction: column;margin-top: 5%">
                <span class="text-rank">Belum ada</span>
                <span class="text-rank">0</span>
            </div>
        </div>
        <div class="card-medal" style="height: 45vh;margin-left: 5%" id="">
            <img src="image/medal_1.png" width="60%" style="margin-top: 10%">
            <div id="juara1" style="display: flex;flex-direction: column;margin-top: 5%">
                <span class="text-rank">Belum ada</span>
                <span class="text-rank">0</span>
            </div>
        </div>
        <div class="card-medal" style="height: 43vh;margin-left: 5%" id="">
            <img src="image/medal_2.png" width="60%" style="margin-top: 10%">
            <div id="juara2" style="display: flex;flex-direction: column;margin-top: 5%">
                <span class="text-rank">Belum ada</span>
                <span class="text-rank">0</span>
            </div>
        </div>
    </div>
    <div style="width: 90%;display: flex;flex-direction: column;align-items: center" id="rangking">

    </div>
    <button class="btn-start" onclick="location.href='soal'">Mulai</button>
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
    var kode = sessionStorage.getItem('kode')
    document.getElementById("kode").innerHTML = kode
    async function getSkor() {
        const response = await axios.get(`{{url("api/getranks/")}}/${kode}`)
        return response.data.data
    }
    getSkor().then(res => {
        if (res.length === 0) return
        document.getElementById("juara1").innerHTML = `
            <span class="text-rank active">${res[0].nama}</span>
            <span class="text-rank active">${res[0].jumlah}</span>
        `
        document.getElementById("juara2").innerHTML = `
            <span class="text-rank active">${res[1].nama}</span>
            <span class="text-rank active">${res[1].jumlah}</span>
        `
        document.getElementById("juara3").innerHTML = `
            <span class="text-rank active">${res[2].nama}</span>
            <span class="text-rank active">${res[2].jumlah}</span>
        `
        for(i in res){
            if(i > 2){
                document.getElementById("rangking").innerHTML += `
                    <div class="list-rangking">
                        <span class="text-rank list active">${res[i].nama}</span>
                        <span class="text-rank list active">${res[i].jumlah}</span>
                    </div>
                `
            }
        }

    })
</script>
</html>
