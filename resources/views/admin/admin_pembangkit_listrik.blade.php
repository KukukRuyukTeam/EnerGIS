<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/admin_pembangkit_listrik.css">
    <title>Slide Down Animation</title>
</head>
<body>
    <div class="header">
        <img src="image/logo_biru.png" width="8%" style="margin-left: 2%;">
        <input type="text" class="search" placeholder="Temukan data energi terbarukan">
        <button class="btn-plt">Pembangkit Listrik</button>
        <button class="btn-spklu">Quiz</button>
    </div>
    <div class="kategori">
        <button class="btn-kategori active">PLTA</button>
        <button class="btn-kategori">PLTS</button>
        <button class="btn-kategori">PLTP</button>
        <button class="btn-kategori">PLTB</button>
        <button class="btn-kategori" style="background-position: 10%;">PLTMH</button>
        <button class="btn-kategori">PLTM</button>
        <button class="btn-kategori" style="background-position: 10%;">PLTBm</button>
    </div>
    <div class="container">
        <div class="list">
            <table class="table">
                <tr>
                  <th style="border-top-left-radius: 10px;">No</th>
                  <th style="border-top-right-radius: 10px;">Nama</th>
                </tr>
                <tr>
                  <td style="text-align: center;">1</td>
                  <td style="padding-left: 10pxt;">PLTA Riam Kanan</td>
                </tr>
              </table>
        </div>
        <div style="width: 62%;display: flex;flex-direction: column;align-items: end;margin-left: 5%;">
            <div style="margin-top: 5vh;display: flex;width: 25%;">
                <button class="btn-hapus">Hapus</button>
                <button class="btn-tambah">Tambah</button>
            </div>
            <div class="detail">
                <div style="display: flex;width: 95%;margin-left: 4%;margin-top: 2%;">
                    <div style="width: 90%;">
                        <img src="image/icon_air.png" width="16px" height="20px" style="margin-top: 5px;">
                        <span class="judul-detail">PLTA Riam Kanan</span>
                    </div>
                    <button class="btn-edit">Edit</button>
                </div>
                <!-- <div class="container-item">
                    <div style="display: flex;width: 95%;margin-left: 4%;margin-top: 2%;">
                        <div style="width: 90%;">
                            <img src="image/icon_air.png" width="16px" height="20px" style="margin-top: 5px;">
                            <span class="judul-detail">PLTA Riam Kanan</span>
                        </div>
                        <button class="btn-edit">Edit</button>
                    </div>
                    <div style="margin-top: 2%;display: flex;flex-direction: column;width: 90%;">
                        <span style="margin-left: 6%;"><span style="width: 20%;display: inline-block;">Nama</span><span style="opacity: 65%;font-size: 14px;">: PLTA Riam Kanan</span></span>
                        <span style="margin-left: 6%;margin-top: 5px;"><span style="width: 20%;display: inline-block;">Kategori</span><span style="opacity: 65%;font-size: 14px;">: PLTA Riam Kanan</span></span>
                        <span style="margin-left: 6%;margin-top: 5px;"><span style="width: 20%;display: inline-block;">Kapasitas</span><span style="opacity: 65%;font-size: 14px;">: PLTA Riam Kanan</span></span>
                        <span style="margin-left: 6%;margin-top: 5px;"><span style="width: 20%;display: inline-block;">Jenis Turbin</span><span style="opacity: 65%;font-size: 14px;">: PLTA Riam Kanan</span></span>
                        <span style="margin-left: 6%;margin-top: 5px;"><span style="width: 20%;display: inline-block;">Jenis Generator</span><span style="opacity: 65%;font-size: 14px;">: PLTA Riam Kanan</span></span>
                        <span style="margin-left: 6%;margin-top: 5px;"><span style="width: 20%;display: inline-block;">Daya Pembangkit</span><span style="opacity: 65%;font-size: 14px;">: PLTA Riam Kanan</span></span>
                        <span style="margin-left: 6%;margin-top: 5px;"><span style="width: 20%;display: inline-block;">Debit Air Maksimal</span><span style="opacity: 65%;font-size: 14px;">: PLTA Riam Kanan</span></span>
                        <span style="margin-left: 6%;margin-top: 5px;"><span style="width: 20%;display: inline-block;">Lokasi</span><span style="opacity: 65%;font-size: 14px;">: PLTA Riam Kanan</span></span>
                        <span style="margin-left: 6%;margin-top: 5px;"><span style="width: 20%;display: inline-block;">Deskripsi</span><span style="line-height: 25px;opacity: 65%;font-size: 14px;">: PLTA Riam Kanan mendukung kelistrikan hingga 8% dari total keseluruhan kebutuhan listrik di Provinsi Kalimantan Tengah dan Provinsi Kalimantan Selatan. Pembangkit listrik ini memanfaatkan Waduk Riam Kanan sebagai sumber energinya.</span></span>
                    </div>
                </div> -->
                <div class="container-item">
                    <div style="margin-top: 2%;display: flex;flex-direction: column;width: 90%;">
                        <form>
                            <div style="display: flex;">
                                <img id="previewImage"  style="width: 20%; height: 12vh;border-radius: 10px;margin-left: 6%;display: none;"/>
                                <div class="custom__image-container"></div>
                                    <label id="add-img-label" for="imageInput">+</label>
                                    <input type="file" class="input-image" id="imageInput" accept="image/*" onchange="displayImage()">
                                </div> 
                            </div>    
                            <div class="container-input" style="margin-top: 2%;">
                                <span style="margin-left: 6%;"><span style="width: 11vw;display: inline-block;">Nama</span><span style="opacity: 65%;font-size: 14px;">:&nbsp;</span></span>
                                <input type="tex" class="input">
                            </div>
                            <div class="container-input">
                                <span style="margin-left: 6%;"><span style="width: 11vw;display: inline-block;">Kategori</span><span style="opacity: 65%;font-size: 14px;">:&nbsp;</span></span>
                                <input type="tex" class="input">
                            </div>
                            <div class="container-input">
                                <span style="margin-left: 6%;"><span style="width: 11vw;display: inline-block;">Kapasitas</span><span style="opacity: 65%;font-size: 14px;">:&nbsp;</span></span>
                                <input type="tex" class="input">
                            </div>
                            <div class="container-input">
                                <span style="margin-left: 6%;"><span style="width: 11vw;display: inline-block;">Jenis Turbin</span><span style="opacity: 65%;font-size: 14px;">:&nbsp;</span></span>
                                <input type="tex" class="input">
                            </div>
                            <div class="container-input">
                                <span style="margin-left: 6%;"><span style="width: 11vw;display: inline-block;">Jenis Generator</span><span style="opacity: 65%;font-size: 14px;">:&nbsp;</span></span>
                                <input type="tex" class="input">
                            </div>
                            <div class="container-input">
                                <span style="margin-left: 6%;"><span style="width: 11vw;display: inline-block;">Daya Pembangkit</span><span style="opacity: 65%;font-size: 14px;">:&nbsp;</span></span>
                                <input type="tex" class="input">
                            </div>
                            <div class="container-input">
                                <span style="margin-left: 6%;"><span style="width: 11vw;display: inline-block;">Debit Air Maksimal</span><span style="opacity: 65%;font-size: 14px;">:&nbsp;</span></span>
                                <input type="tex" class="input">
                            </div>
                            <div class="container-input">
                                <span style="margin-left: 6%;"><span style="width: 11vw;display: inline-block;">Lokasi</span><span style="opacity: 65%;font-size: 14px;">:&nbsp;</span></span>
                                <input type="tex" class="input">
                            </div>
                            <div class="container-input">
                                <span style="margin-left: 6%;"><span style="width: 11vw;display: inline-block;">Deskripsi</span><span style="line-height: 25px;opacity: 65%;font-size: 14px;">:&nbsp;</span></span>
                                <input type="text" class="input">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</body>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const cards = document.querySelectorAll(".btn-kategori");

        cards.forEach((card) => {
            card.addEventListener("click", function () {
                // Remove the "active" class from all cards
                cards.forEach((c) => c.classList.remove("active"));
                // Add the "active" class to the clicked card
                this.classList.add("active");
                
            });
        });
    });
    function displayImage() {
            const input = document.getElementById('imageInput');
            const preview = document.getElementById('previewImage');
            const label = document.getElementById('add-img-label');
            
            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    label.style.display = "none"
                    preview.src = e.target.result;
                    preview.style.display = "block"
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>
</html>