<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{asset('/image/logogram_energis.png')}}">
    <link rel="stylesheet" href="{{ asset('/admin_pembangkit.css') }}">
    <title>EnerGIS Admin</title>
</head>
<body>
    <div class="header">
        <img src="{{ asset('image/logo_biru.png') }}" width="8%" style="margin-left: 2%;">
        <input type="text" class="search" style="width: 80%" placeholder="Temukan data energi terbarukan">
    </div>
    <div class="kategori">
        <button class="btn-kategori active" onclick='changeCategori("plta")'>PLTA</button>
        <button class="btn-kategori" onclick='changeCategori("plts")'>PLTS</button>
        <button class="btn-kategori" onclick='changeCategori("pltp")'>PLTP</button>
        <button class="btn-kategori" onclick='changeCategori("pltb")'>PLTB</button>
        <button class="btn-kategori" style="background-position: 10%;" onclick='changeCategori("pltmh")'>PLTMH</button>
        <button class="btn-kategori" onclick='changeCategori("pltm")'>PLTM</button>
        <button class="btn-kategori" style="background-position: 10%;" onclick='changeCategori("pltbm")'>PLTBm</button>
    </div>
    <div class="container">
        <div class="list">
            <table class="table">
                <thead>
                    <tr>
                      <th style="border-top-left-radius: 10px;">No</th>
                      <th style="border-top-right-radius: 10px;">Nama</th>
                    </tr>
                </thead>
                <tbody id='list-table-body'>
                </tbody>
              </table>
        </div>
        <div style="width: 62%;display: flex;flex-direction: column;align-items: end;margin-left: 5%;">
            <div style="margin-top: 5vh;display: flex;width: 25%;">
                <button class="btn-hapus" onclick="hapusDataAction()" hidden>Hapus</button>
                <button class="btn-tambah" onclick="tambahDataMode()">Tambah</button>
            </div>
            <div style="margin-top: 5vh;display: flex;width: 25%;" hidden>
            </div>
            <div class="detail" hidden>
                <div style="display: flex;width: 95%;margin-left: 4%;margin-top: 2%; gap:1%" >
                    <div style="width: 90%;" >
                        <img src="{{ asset('image/icon_air.png') }}" width="16px" height="20px" style="margin-top: 5px;">
                        <span class="judul-detail">Pembangkit</span>
                    </div>
                    <button class="btn-edit" onclick="editMode()">Edit</button>
                    <button class="btn-batal" id="btn-batal-edit" onclick="batalEditMode()" hidden>Batal</button>
                    <button class="btn-batal" id="btn-batal-tambah" onclick="batalTambahMode()" hidden>Batal</button>
                    <button class="btn-selesai" id="btn-selesai-edit" onclick="editDetailsAction()" hidden>Selesai</button>
                    <button class="btn-selesai" id="btn-selesai-tambah" onclick="tambahDataAction()" hidden>Selesai</button> 
                </div>
                <div class="container-item">
                    <div style="margin-top: 2%;display: flex;flex-direction: column;width: 90%;">
                        <form id="form-details">
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>
<script>
    var data;
    var currCategori = 'plta';
    const btnEdit = document.querySelector('.btn-edit');
    const btnBatalEdit = document.querySelector('#btn-batal-edit');
    const btnBatalTambah = document.querySelector('#btn-batal-tambah');
    const btnSelesaiEdit = document.querySelector('#btn-selesai-edit');
    const btnSelesaiTambah = document.querySelector('#btn-selesai-tambah');

    document.addEventListener("DOMContentLoaded", function () {
        changeCategori(currCategori)
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

    function changeCategori(categori) {
        const listTableBody = document.getElementById('list-table-body')
        document.querySelector('.detail').hidden = true
        document.querySelector('.btn-hapus').hidden = true
        listTableBody.innerHTML = ""
        currCategori = categori

        fetch('/api/pembangkit/' + categori)
        .then(res=>res.json())
        .then(res => {
            if (res.data.features.length === 0) return
            let strBody = ""
            data = res.data
            res.data.features.forEach((item, i) => {
                strBody += `<tr class="list-content" onclick="changeDetails(this,'${item.properties.id}')">
                    <td style="text-align: center;">${i+1}</td>
                    <td style="padding-left: 10pxt;">${item.properties.name}</td>
                </tr>`
            })
            
            listTableBody.innerHTML = strBody
        })
    };

    function changeDetails(comp, id) {
        const listContent = document.querySelectorAll('.list-content')
        listContent.forEach(item => {
            if (item == comp) {
                comp.classList.add('list-content-active')
            } else {
                item.classList.remove('list-content-active')
            }
        })
        document.querySelector('.detail').hidden = false
        document.querySelector('.btn-hapus').hidden = false
        document.querySelector('.container-item').id = id
        document.querySelector('.btn-hapus').hidden = false
        setDetails(id)
    }
    
    function setDetails(id) {
        if (!data) return

        data.features.forEach(item => {
            if (item.properties.id == id) {                
                const dataItem = item.properties
                
                document.querySelector('.judul-detail').innerHTML = dataItem.name
                document.getElementById('form-details').innerHTML = `
                        <div style="display: flex;">
                            <img id="previewImage"  style="width: 20%; height: 12vh;border-radius: 10px;margin-left: 6%;display: block;" ${ dataItem.gambar && `src="{{ asset('images/${dataItem.gambar}') }}"`}/>
                            <div class="custom__image-container"></div>
                                <label id="add-img-label" for="imageInput">+</label>
                                <input type="file" class="input-image" id="imageInput" accept="image/*" onchange="displayImage()">
                            </div>
                        </div>
                        <div class="container-input" style="margin-top: 2%;">
                            <span style="margin-left: 6%;"><span style="width: 11vw;display: inline-block;">Nama</span><span style="opacity: 65%;font-size: 14px;">:&nbsp;</span></span>
                            <input type="text" class="input-edit" name="nama" required disabled value="${dataItem.name}">
                        </div>
                        <div class="container-input">
                            <span style="margin-left: 6%;"><span style="width: 11vw;display: inline-block;">Kategori</span><span style="opacity: 65%;font-size: 14px;">:&nbsp;</span></span>
                            <input type="text" class="input-edit" disabled value="${currCategori.toUpperCase()}">
                        </div>
                        <div class="container-input">
                            <span style="margin-left: 6%;"><span style="width: 11vw;display: inline-block;">Kapasitas</span><span style="opacity: 65%;font-size: 14px;">:&nbsp;</span></span>
                            <input type="text" class="input-edit" name="kapasitas" disabled value="${dataItem.kapasitas?dataItem.kapasitas:""}">
                        </div>
                            ${
                                currCategori === 'plta'?
                                `<div class="container-input">
                                    <span style="margin-left: 6%;"><span style="width: 11vw;display: inline-block;">Jenis Generator</span><span style="opacity: 65%;font-size: 14px;">:&nbsp;</span></span>
                                    <input type="text" class="input-edit" name="jenis_generator" disabled value="${(dataItem.jenis_generator?dataItem.jenis_generator:"")}">
                                </div>
                                <div class="container-input">
                                    <span style="margin-left: 6%;"><span style="width: 11vw;display: inline-block;">Unit Generator</span><span style="opacity: 65%;font-size: 14px;">:&nbsp;</span></span>
                                    <input type="text" class="input-edit" name="unit_generator" disabled value="${(dataItem.unit_generator?dataItem.unit_generator:"")}">
                                </div>`:
                            currCategori === 'plts'?
                                `<div class="container-input">
                                    <span style="margin-left: 6%;"><span style="width: 11vw;display: inline-block;">Unit Panel</span><span style="opacity: 65%;font-size: 14px;">:&nbsp;</span></span>
                                    <input type="text" class="input-edit" name="unit_panel" disabled value="${(dataItem.unit_panel?dataItem.unit_panel:"")}">
                                </div>`:
                            currCategori === 'pltp'?
                                `<div class="container-input">
                                    <span style="margin-left: 6%;"><span style="width: 11vw;display: inline-block;">Tipe Pembangkit</span><span style="opacity: 65%;font-size: 14px;">:&nbsp;</span></span>
                                    <input type="text" class="input-edit" name="tipe_pembangkit" disabled value="${(dataItem.tipe_pembangkit?dataItem.tipe_pembangkit:"")}">
                                </div>
                                <div class="container-input">
                                    <span style="margin-left: 6%;"><span style="width: 11vw;display: inline-block;">Unit Pembangkit</span><span style="opacity: 65%;font-size: 14px;">:&nbsp;</span></span>
                                    <input type="text" class="input-edit" name="unit_pembangkit" disabled value="${(dataItem.unit_pembangkit?dataItem.unit_pembangkit:"")}">
                                </div>`:
                            currCategori === 'pltb'?
                                `<div class="container-input">
                                    <span style="margin-left: 6%;"><span style="width: 11vw;display: inline-block;">Unit Turbin</span><span style="opacity: 65%;font-size: 14px;">:&nbsp;</span></span>
                                    <input type="text" class="input-edit" name="unit_turbin" disabled value="${(dataItem.unit_turbin?dataItem.unit_turbin:"")}">
                                </div>
                                <div class="container-input">
                                    <span style="margin-left: 6%;"><span style="width: 11vw;display: inline-block;">Tipe Turbin</span><span style="opacity: 65%;font-size: 14px;">:&nbsp;</span></span>
                                    <input type="text" class="input-edit" name="tipe_turbin" disabled value="${(dataItem.tipe_turbin?dataItem.tipe_turbin:"")}">
                                </div>`: 
                            currCategori === 'pltbm'?
                                `<div class="container-input">
                                    <span style="margin-left: 6%;"><span style="width: 11vw;display: inline-block;">Sumber Energi</span><span style="opacity: 65%;font-size: 14px;">:&nbsp;</span></span>
                                    <input type="text" class="input-edit" name="sumber_energi" disabled value="${(dataItem.sumber_energi?dataItem.sumber_energi:"")}">
                                </div>`: ""
                            }
                        
                        <div class="container-input">
                            <span style="margin-left: 6%;"><span style="width: 11vw;display: inline-block;">Lokasi</span><span style="opacity: 65%;font-size: 14px;">:&nbsp;</span></span>
                            <input type="text" class="input-edit" name="lokasi" disabled value="${dataItem.lokasi?dataItem.lokasi:""}">
                        </div>
                        <div class="container-input">
                            <span style="margin-left: 6%;"><span style="width: 11vw;display: inline-block;">Latitude</span><span style="opacity: 65%;font-size: 14px;">:&nbsp;</span></span>
                            <input type="text" class="input-edit" name="latitude" required disabled value="${item.geometry.coordinates[0]}">
                        </div>
                        <div class="container-input">
                            <span style="margin-left: 6%;"><span style="width: 11vw;display: inline-block;">longitude</span><span style="opacity: 65%;font-size: 14px;">:&nbsp;</span></span>
                            <input type="text" class="input-edit" name="longitude" required disabled value="${item.geometry.coordinates[1]}">
                        </div>
                        <div class="container-input">
                            <span style="margin-left: 6%;"><span style="width: 11vw;display: inline-block;">Deskripsi</span><span style="line-height: 25px;opacity: 65%;font-size: 14px;">:&nbsp;</span></span>
                            <input type="text" class="input-edit" name="deskripsi" disabled value="${dataItem.deskripsi?dataItem.deskripsi:""}">
                        </div>`
                return
            }
        })
    }
    function hapusDataAction() {
        const idItemDetails = document.querySelector('.container-item').id
        fetch(`/api/pembangkit/${currCategori}/delete/${idItemDetails}`, {
            method: "POST"
        }).then(res=>{location.reload()})
        .catch(console.error)
    }

    function editMode() {
        btnEdit.hidden = true
        btnBatalEdit.hidden = false
        btnSelesaiEdit.hidden = false

        const inputEdit = document.querySelectorAll('.input-edit')
        inputEdit.forEach(item => {
            item.disabled = false
        })
    }
    function batalEditMode() {
        btnEdit.hidden = false
        btnBatalEdit.hidden = true
        btnSelesaiEdit.hidden = true

        const idItemDetails = document.querySelector('.container-item').id
        setDetails(idItemDetails)
    }
    function batalTambahMode() {
        btnBatalTambah.hidden = true
        btnSelesaiTambah.hidden = true
        document.querySelector('.detail').hidden = true
    }
    function tambahDataMode() {
        btnEdit.hidden = true
        btnBatalTambah.hidden = false
        btnSelesaiTambah.hidden = false
        document.querySelector('.detail').hidden = false
        document.querySelector('.btn-hapus').hidden = true

        document.getElementById('form-details').innerHTML = `                     
                        <div style="display: flex;">
                            <img id="previewImage"  style="width: 20%; height: 12vh;border-radius: 10px;margin-left: 6%;display: none;"/>
                            <div class="custom__image-container"></div>
                                <label id="add-img-label" for="imageInput">+</label>
                                <input type="file" class="input-image" id="imageInput" accept="image/*" onchange="displayImage()">
                            </div>
                        </div>
                        <div class="container-input" style="margin-top: 2%;">
                            <span style="margin-left: 6%;"><span style="width: 11vw;display: inline-block;">Nama</span><span style="opacity: 65%;font-size: 14px;">:&nbsp;</span></span>
                            <input type="text" class="input-tambah" name="nama" required>
                        </div>
                        <div class="container-input">
                            <span style="margin-left: 6%;"><span style="width: 11vw;display: inline-block;">Kategori</span><span style="opacity: 65%;font-size: 14px;">:&nbsp;</span></span>
                            <input type="text" class="input-tambah" >
                        </div>
                        <div class="container-input">
                            <span style="margin-left: 6%;"><span style="width: 11vw;display: inline-block;">Kapasitas</span><span style="opacity: 65%;font-size: 14px;">:&nbsp;</span></span>
                            <input type="text" class="input-tambah" name="kapasitas" >
                        </div>
                        <div class="container-input">
                            <span style="margin-left: 6%;"><span style="width: 11vw;display: inline-block;">Jenis Generator</span><span style="opacity: 65%;font-size: 14px;">:&nbsp;</span></span>
                            <input type="text" class="input-tambah" name="jenis_generator" >
                        </div>
                        <div class="container-input">
                            <span style="margin-left: 6%;"><span style="width: 11vw;display: inline-block;">Unit Generator</span><span style="opacity: 65%;font-size: 14px;">:&nbsp;</span></span>
                            <input type="text" class="input-tambah" name="unit_generator" >
                        </div>
                        <div class="container-input">
                            <span style="margin-left: 6%;"><span style="width: 11vw;display: inline-block;">Lokasi</span><span style="opacity: 65%;font-size: 14px;">:&nbsp;</span></span>
                            <input type="text" class="input-tambah" name="lokasi" >
                        </div>
                        <div class="container-input">
                            <span style="margin-left: 6%;"><span style="width: 11vw;display: inline-block;">Latitude</span><span style="opacity: 65%;font-size: 14px;">:&nbsp;</span></span>
                            <input type="text" class="input-tambah" name="latitude" required >
                        </div>
                        <div class="container-input">
                            <span style="margin-left: 6%;"><span style="width: 11vw;display: inline-block;">longitude</span><span style="opacity: 65%;font-size: 14px;">:&nbsp;</span></span>
                            <input type="text" class="input-tambah" name="longitude" required >
                        </div>
                        <div class="container-input">
                            <span style="margin-left: 6%;"><span style="width: 11vw;display: inline-block;">Deskripsi</span><span style="line-height: 25px;opacity: 65%;font-size: 14px;">:&nbsp;</span></span>
                            <input type="text" class="input-tambah" name="deskripsi" >
                        </div>`
    }

    function editDetailsAction() {
        btnEdit.hidden = false
        btnBatalEdit.hidden = true
        btnSelesaiEdit.hidden = true

        const idItemDetails = document.querySelector('.container-item').id
        const form = document.querySelector('form')
        const dataForm = new FormData(form);
        
        fetch(`/api/pembangkit/${currCategori}/update/${idItemDetails}`, {
            method: "POST",
            body : dataForm
        }).then(res => res.json())
        .then(res => {
            location.reload()
        })
    }

    function tambahDataAction() {
        const form = document.querySelector('form')
        const dataForm = new FormData(form);
        
        fetch(`/api/pembangkit/${currCategori}/`, {
            method: "POST",
            body : dataForm
        }).then(res => res.json())
        .then(res => {
            location.reload()
        }).catch(console.error)
    }
</script>
</html>
