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
<div style="width: 84%;padding:3%;margin-top: 5%;display: flex;flex-direction: column;align-items: center;border-radius: 10px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);margin-left: 5%" id="summary">
    <div style="display: flex;width: 100%;align-items: center">
        <img src="image/icon_soal.png" width="4%">
        <span style="font-size: 28px;font-weight: 600;font-family: Lexend;margin-left: 1%">Beginner</span>
    </div>
    <span id="skor" style="font-size: 60px;font-weight: 600;font-family: Lexend;color: #5198F8"></span>
    <div style="width: 89vw;height: 1px;background-color: #ABABAB;margin-top: 5%"></div>


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
    var userAnswer = JSON.parse(localStorage.getItem("userAnswer"));
    var quizAnswer = JSON.parse(localStorage.getItem("quizAnswer"));
    var nama = sessionStorage.getItem('nama')
    var soal = JSON.parse(localStorage.getItem("soal"));
    for(i in userAnswer){
        if(userAnswer[i] == quizAnswer[i]){
            document.getElementById("summary").innerHTML += `
                <div style="width: 100%;height: 40vh;border: 1px solid #ABABAB;border-radius: 10px;display: flex;flex-direction: column;margin-top: 5%">
                    <div style="width: 100%;display: flex;align-items: center;height: 60%;border-bottom-left-radius: 10px;border-bottom-right-radius: 10px;justify-content: center">
                        <span style="font-size: 24px;width: 90%;font-weight: 600;font-family: Lexend;text-align: center;">${soal[i]}</span>
                    </div>
                    <div style="width: 100%;background-color: #43D02C;display: flex;align-items: center;height: 40%;border-bottom-left-radius: 10px;border-bottom-right-radius: 10px;justify-content: center">
                        <span style="font-size: 28px;color: white;font-weight: 600;font-family: Lexend;text-align: center;">${quizAnswer[i]}</span>
                    </div>
                </div>
            `
        }else{
            document.getElementById("summary").innerHTML += `
                <div style="width: 100%;height: 40vh;border: 1px solid #ABABAB;border-radius: 10px;display: flex;flex-direction: column;margin-top: 5%">
                    <div style="width: 100%;display: flex;align-items: center;height: 60%;border-bottom-left-radius: 10px;border-bottom-right-radius: 10px;justify-content: center">
                        <span style="font-size: 24px;width: 90%;font-weight: 600;font-family: Lexend;text-align: center;">${soal[i]}</span>
                    </div>
                    <div style="width: 100%;background-color: #43D02C;display: flex;align-items: center;height: 40%;border-bottom-left-radius: 10px;border-bottom-right-radius: 10px;justify-content: center">
                        <span style="font-size: 28px;color: white;font-weight: 600;font-family: Lexend;text-align: center;width: 50%">${quizAnswer[i]}</span>
                        <div style="width: 50%;background-color: #BF3535;display: flex;align-items: center;height: 100%;border-bottom-right-radius: 10px;justify-content: center">
                            <span style="font-size: 28px;color: white;font-weight: 600;font-family: Lexend;text-align: center;">${userAnswer[i]}</span>
                        </div>
                    </div>
                </div>
            `
        }
    }


    async function getSkor() {
        const response = await axios.get(`{{url("api/getranks/")}}/${kode}`)
        return response.data.data
    }
    getSkor().then(res => {
        for(i in res){
            if (res[i].nama == nama){
                document.getElementById("skor").innerHTML = res[i].jumlah+"/100"
            }
        }

    })
</script>
</html>
