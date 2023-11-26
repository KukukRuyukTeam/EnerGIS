<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/soal.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.5.1/axios.min.js"
            integrity="sha512-emSwuKiMyYedRwflbZB2ghzX8Cw8fmNVgZ6yQNNXXagFzFOaQmbvQ1vmDkddHjm5AITcBIZfC7k4ShQSjgPAmQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Soal</title>
</head>
<body
    style="display: flex;flex-direction: column;justify-content: center;align-items: center;width: 100%;height: 100vh;margin: 0">
<div id="soal-container"
     style="background-color: #D8E9FF; width: 80%;height: 75%;border-radius: 20px;display: flex;flex-direction: column;justify-content: center;align-items: center">

</div>
<button
    style="border-radius: 20px;border: none;width: 20%;background-color: #D8E9FF;height: 6vh;font-family: Lexend;margin-top: 2%;font-weight: 600;font-size: 20px;color: #343330;cursor: pointer" onclick="nextSoal()" id="next">Selanjutnya
</button>
</body>
<script>
    var btnNext = document.getElementById("next")
    var kode = sessionStorage.getItem('kode') || "";
    sessionStorage.setItem("nomor", "0")
    var nama = sessionStorage.getItem('nama')
    var nomor = parseInt(sessionStorage.getItem('nomor'))
    var idSoal = ""
    var userAnswer = []
    var quizAnswer = []
    var soal = []
    var data = null

    if (kode == null) {
        location.href = "energame"
    }
    var questionNumber = parseInt(sessionStorage.getItem('questionNumber'))

    async function getSoal() {
        const response = await axios.post(`api/getquestion`, {
            "kode": kode,
            "nama": nama
        })
        return response.data.data
    }

    async function validateAnswer(id, nama, kode, jawaban) {
        const response = await axios.post(`api/validateanswear`, {
            "id_soal": id,
            "nama": nama,
            "kode_soal": kode,
            "jawaban": jawaban
        })
        return response.data
    }

    function getJawaban(button, jawaban) {
        userAnswer.push(jawaban)
        const btnjawaban = document.querySelectorAll(".jawaban");
        validateAnswer(idSoal, nama, kode, jawaban).then(res => {
            btnjawaban.forEach((c) => c.classList.remove("active"));
            if (res.status == true) {
                button.style.backgroundColor = "#43D02C"
                btnNext.disabled = false
                quizAnswer.push(res.jawaban)
                return
            } else {
                button.style.backgroundColor = "#BF3535"
                btnNext.disabled = false
                quizAnswer.push(res.jawaban)
            }
            btnjawaban.forEach((card) => {
                if (res.jawaban == card.children[1].innerHTML) {
                    card.style.backgroundColor = "#43D02C"
                }
            });
        }).catch(err => {
            console.error(err)
        })
    }

    function nextSoal() {
        btnNext.disabled = true
        nomor++
        if (nomor == data.length){
            localStorage.setItem("userAnswer", JSON.stringify(userAnswer));
            localStorage.setItem("quizAnswer", JSON.stringify(quizAnswer));
            localStorage.setItem("soal", JSON.stringify(soal));
            location.href = "result"
        }else {
                soal.push(data[nomor].pertanyaan)
                idSoal = data[nomor].id
                document.getElementById("soal-container").innerHTML = `
        <div style="align-items: center;display: flex">
            <img src="image/icon_soal.png" width="30%">
            <span style="font-size: 32px;font-weight: 600;font-family: Lexend">Beginner</span>
        </div>
        <span style="width: 90%;font-size: 24px;font-weight: 600;font-family: Lexend;text-align: center;margin-top: 2%">${data[nomor].pertanyaan}</span>
        <div style="display: grid;grid-template-columns: 47% 47%;width: 94%;justify-content: center;column-gap: 3%;row-gap: 10%;margin-top: 2%">
            <div class="jawaban active" onclick="getJawaban(this,'${data[nomor].pilihan[0]}')">
                <img src="image/icon_a.png" width="7%" height="30%" style="margin-top: 2%;margin-left: 2%">
                <span style=";width: 100%;text-align: center;font-size: 24px;font-weight: 600;font-family: Lexend;text-align: center;color: white;">${data[nomor].pilihan[0]}</span>
            </div>
            <div class="jawaban active" onclick="getJawaban(this,'${data[nomor].pilihan[1]}')">
                <img src="image/icon_b.png" width="7%" height="30%" style="margin-top: 2%;margin-left: 2%">
                <span style="width: 100%;text-align: center;font-size: 24px;font-weight: 600;font-family: Lexend;text-align: center;color: white;">${data[nomor].pilihan[1]}</span>
            </div>
            <div class="jawaban active" onclick="getJawaban(this,'${data[nomor].pilihan[2]}')">
                <img src="image/icon_c.png" width="7%" height="30%" style="margin-top: 2%;margin-left: 2%">
                <span style="width: 100%;text-align: center;font-size: 24px;font-weight: 600;font-family: Lexend;text-align: center;color: white;">${data[nomor].pilihan[2]}</span>
            </div>
            <div class="jawaban active" onclick="getJawaban(this,'${data[nomor].pilihan[3]}')">
                <img src="image/icon_d.png" width="7%" height="30%" style="margin-top: 2%;margin-left: 2%">
                <span style="width: 100%;text-align: center;font-size: 24px;font-weight: 600;font-family: Lexend;text-align: center;color: white;">${data[nomor].pilihan[3]}</span>
            </div>
        </div>
        `
        }
    }

    getSoal().then(res => {
        data = res
        soal.push(res[nomor].pertanyaan)
        idSoal = res[nomor].id
        document.getElementById("soal-container").innerHTML = `
        <div style="align-items: center;display: flex">
            <img src="image/icon_soal.png" width="30%">
            <span style="font-size: 32px;font-weight: 600;font-family: Lexend">Beginner</span>
        </div>
        <span style="width: 90%;font-size: 24px;font-weight: 600;font-family: Lexend;text-align: center;margin-top: 2%">${res[nomor].pertanyaan}</span>
        <div style="display: grid;grid-template-columns: 47% 47%;width: 94%;justify-content: center;column-gap: 3%;row-gap: 10%;margin-top: 2%">
            <div class="jawaban active" onclick="getJawaban(this,'${res[nomor].pilihan[0]}')">
                <img src="image/icon_a.png" width="7%" height="30%" style="margin-top: 2%;margin-left: 2%">
                <span style=";width: 100%;text-align: center;font-size: 24px;font-weight: 600;font-family: Lexend;text-align: center;color: white;">${res[nomor].pilihan[0]}</span>
            </div>
            <div class="jawaban active" onclick="getJawaban(this,'${res[nomor].pilihan[1]}')">
                <img src="image/icon_b.png" width="7%" height="30%" style="margin-top: 2%;margin-left: 2%">
                <span style="width: 100%;text-align: center;font-size: 24px;font-weight: 600;font-family: Lexend;text-align: center;color: white;">${res[nomor].pilihan[1]}</span>
            </div>
            <div class="jawaban active" onclick="getJawaban(this,'${res[nomor].pilihan[2]}')">
                <img src="image/icon_c.png" width="7%" height="30%" style="margin-top: 2%;margin-left: 2%">
                <span style="width: 100%;text-align: center;font-size: 24px;font-weight: 600;font-family: Lexend;text-align: center;color: white;">${res[nomor].pilihan[2]}</span>
            </div>
            <div class="jawaban active" onclick="getJawaban(this,'${res[nomor].pilihan[3]}')">
                <img src="image/icon_d.png" width="7%" height="30%" style="margin-top: 2%;margin-left: 2%">
                <span style="width: 100%;text-align: center;font-size: 24px;font-weight: 600;font-family: Lexend;text-align: center;color: white;">${res[nomor].pilihan[3]}</span>
            </div>
        </div>
        `
    }).catch(err => {
        console.error(err)
    })

</script>
</html>

