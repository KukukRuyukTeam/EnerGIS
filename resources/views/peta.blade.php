<html>
<head>
    <title>Peta</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <link rel="stylesheet" href="{{ asset('/leaflet.css') }}" />
    <link rel="stylesheet" href="{{ asset('/pembangkit_listrik.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.5.1/axios.min.js" integrity="sha512-emSwuKiMyYedRwflbZB2ghzX8Cw8fmNVgZ6yQNNXXagFzFOaQmbvQ1vmDkddHjm5AITcBIZfC7k4ShQSjgPAmQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- [if lte IE 8]><link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.2/leaflet.ie.css" /><![endif] -->


</head>
<body>

    <div id="sidebar">
        <div class="container-detail" id="sidebar-content">

        </div>
    </div>

    <div id="map"></div>
    <div class="list-view" id="list-view">
        <img width="30%" src="image/logo_biru.png" style="margin-top: 5%;">
        <input type="text" id="search" class="search" placeholder="Cari pembangkit listrik" oninput="removeBackground()">
        <div style="overflow-x: hidden;width: 92%;">
            <div class="list-kategori">
                <button class="btn-kategori active">PLTA</button>
                <button class="btn-kategori" id="plts" onclick="">PLTS</button>
                <button class="btn-kategori">PLTP</button>
                <button class="btn-kategori">PLTB</button>
                <button class="btn-kategori">PLTMH</button>
                <button class="btn-kategori">PLTM</button>
                <button class="btn-kategori">PLTBm</button>
            </div>
        </div>
        <div class="container-list" id="container-list">
            <div class="list-item">
                <img width="17%" height="80%" src="image/logo_plt.png" style="margin-left: 5%;">
                <div class="keterangan">
                    <span class="nama">PLTA Riam Kanan</span>
                    <span class="alamat">Kabupaten Banjar, Kalimantan Selatan</span>
                    <button class="kategori">PLTA</button>
                </div>
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" id="maximize" width="20" height="10" viewBox="0 0 20 10" fill="none" style="position: absolute;bottom:0;margin-bottom: 5%;transform:rotate(180deg)" onclick="maximize()">
            <path d="M10.3247 3.203L10.0003 2.92624L9.67578 3.203L2.66691 9.18118C2.49727 9.31965 2.25687 9.40579 1.99498 9.40384C1.73156 9.40189 1.49239 9.3112 1.32632 9.16955C1.16257 9.02988 1.08855 8.85918 1.08694 8.70095C1.08534 8.54383 1.15484 8.3741 1.31272 8.23339L9.32309 1.401C9.32311 1.40098 9.32312 1.40097 9.32314 1.40095C9.49117 1.2577 9.73379 1.16675 10.0003 1.16675C10.2667 1.16675 10.5093 1.2577 10.6774 1.40095C10.6774 1.40097 10.6774 1.40098 10.6774 1.401L18.6878 8.2334C18.8457 8.37411 18.9152 8.54384 18.9136 8.70095C18.912 8.85918 18.8379 9.02988 18.6742 9.16955C18.5081 9.3112 18.2689 9.40189 18.0055 9.40384C17.7436 9.40579 17.5033 9.31965 17.3336 9.18119L10.3247 3.203Z" stroke="#BFBFBF"/>
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" id="minimize" width="20" height="10" viewBox="0 0 20 10" fill="none" style="position: absolute;bottom:0;margin-bottom: 5%;display:none" onclick="minimize()">
            <path d="M10.3247 3.203L10.0003 2.92624L9.67578 3.203L2.66691 9.18118C2.49727 9.31965 2.25687 9.40579 1.99498 9.40384C1.73156 9.40189 1.49239 9.3112 1.32632 9.16955C1.16257 9.02988 1.08855 8.85918 1.08694 8.70095C1.08534 8.54383 1.15484 8.3741 1.31272 8.23339L9.32309 1.401C9.32311 1.40098 9.32312 1.40097 9.32314 1.40095C9.49117 1.2577 9.73379 1.16675 10.0003 1.16675C10.2667 1.16675 10.5093 1.2577 10.6774 1.40095C10.6774 1.40097 10.6774 1.40098 10.6774 1.401L18.6878 8.2334C18.8457 8.37411 18.9152 8.54384 18.9136 8.70095C18.912 8.85918 18.8379 9.02988 18.6742 9.16955C18.5081 9.3112 18.2689 9.40189 18.0055 9.40384C17.7436 9.40579 17.5033 9.31965 17.3336 9.18119L10.3247 3.203Z" stroke="#BFBFBF"/>
        </svg>
    </div>

    <script src="https://unpkg.com/leaflet@1.0.1/dist/leaflet.js"></script>
    <script src="{{ asset('/leaflet.js') }}"></script>
    <script src="data/RumahSakitKlinik_2.js"></script>

    <script>
        function maximize(){
            document.getElementById("list-view").style.height = "80vh"
            document.getElementById("container-list").style.display = "flex"
            document.getElementById("maximize").style.display = "none"
            document.getElementById("minimize").style.display = "block"
        }
        function minimize(){
            document.getElementById("list-view").style.height = "23vh"
            document.getElementById("container-list").style.display = "none"
            document.getElementById("maximize").style.display = "block"
            document.getElementById("minimize").style.display = "none"
        }
        var map = L.map('map', {
            zoomControl:true, maxZoom:28, minZoom:1,
        }).fitBounds([[2.421,115.708],[-6.5794140561705055,106.8625273860615]]);

        L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 18,
            attribution: 'Map data &copy; OpenStreetMap contributors'
        }).addTo(map);

        async function getContent(kategori) {
            const response = await axios.get(`{{url("api/pembangkit/plta")}}`)
            return response.data
        }
        const setPembangkit = async () =>{
            var pembangkit = new L.geoJson.multiStyle(await getContent(), {
                attribution: '',
                interactive: true,
                // dataVar: 'PembangkitListrik',
                // layerName: 'layer_RumahSakitKlinik_2',
                // pane: 'pane_RumahSakitKlinik_2',
                onEachFeature: set_sidebar_content,
                pointToLayers: [function (feature, latlng) {
                    var context = {
                        feature: feature,
                        variables: {}
                    };
                    return L.shapeMarker(latlng, style_RumahSakitKlinik_2_0(feature));
                },function (feature, latlng) {
                    var context = {
                        feature: feature,
                        variables: {}
                    };
                    return L.shapeMarker(latlng, style_RumahSakitKlinik_2_1(feature));
                },
                ]
            });
        }


        // var marker = L.marker([-6.600312,106.794886]).addTo(map).on('click', function () {
        //     getContent().then(res=>{
        //         console.log(res)
        //         return
        //         set_sidebar_content(res);
        //         sidebar.toggle();
        //     }).catch(err=>{
        //         console.error(err)
        //     })
        // });

        var sidebar = L.control.sidebar('sidebar', {
            closeButton: true,
            position: 'right'
        });
        map.addControl(sidebar);

        map.on('click', function () {
            sidebar.hide();
        })

        sidebar.on('show', function () {
            console.log('Sidebar will be visible.');
        });

        sidebar.on('shown', function () {
            console.log('Sidebar is visible.');
        });

        sidebar.on('hide', function () {
            console.log('Sidebar will be hidden.');
        });

        sidebar.on('hidden', function () {
            console.log('Sidebar is hidden.');
        });

        L.DomEvent.on(sidebar.getCloseButton(), 'click', function () {
            console.log('Close button clicked.');
        });
        function set_sidebar_content(content) {
            var template = `
            <div style="width: 90%;margin-left: 5%;display: flex;flex-direction: column;margin-top: 12%;">
                <div style="margin-top: 2%;">
                    <img width="6%" src="image/logo_plta.png">
                    <span class="nama-detail">${content.nama}</span>
                </div>
                <span class="alamat-detail">Aranio, Kec. Aranio, Kabupaten Banjar, Kalimantan Selatan 70671</span>
                <span style="margin-top: 4%;font-weight: 500;font-size: 14px;color: #4D4D4D;">Deskripsi</span>
                <span class="deskripsi">PLTA Riam Kanan mendukung kelistrikan hingga 8% dari total keseluruhan kebutuhan listrik di Provinsi Kalimantan Tengah dan Provinsi Kalimantan Selatan. Pembangkit listrik ini memanfaatkan Waduk Riam Kanan sebagai sumber energinya.</span>
                <img src="image/image_detail.png" style="margin-top: 5%; width: 50%;">
                <div>
                    <span style="font-weight: 500;font-size: 14px;color: #4D4D4D;">Kapasitas</span>
                    <span style="margin-top: 6%;font-weight: 600;font-size: 12px;color: #4D4D4D;position: absolute;">30 MW</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="43" height="19" viewBox="0 0 53 19" fill="none" style="margin-top: 5%;">
                        <path d="M4.2168 14.5542C4.61545 14.4795 5.00793 14.3097 5.39401 14.1929C7.50078 13.5556 9.62819 12.9824 11.7405 12.363C15.9756 11.1211 20.2185 9.90911 24.4509 8.65651C26.4192 8.074 28.3995 7.60767 30.3953 7.13546C33.0988 6.49578 35.7809 5.79189 38.5425 5.43957C40.478 5.19263 42.395 5.03929 44.3179 4.69361C45.702 4.44477 47.0908 4.24762 48.4847 4.06421" stroke="#E7FF52" stroke-width="8" stroke-linecap="round"/>
                    </svg>
                </div>
                <div class="atribut">
                    <span class="text-atribut" style="margin-top: 0;">Jenis Turbin <span style="margin-left: 3px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;</span> Turbin Francis</span>
                    <span class="text-atribut">Jenis Generator <span style="margin-left: 2px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;</span> Generator posisi vertikal</span>
                    <span class="text-atribut">Daya pembangkit <span style=" margin-left: 1px;">&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;</span> 3 x 10.000 kiloWatt </span>
                    <span class="text-atribut">Debit air maksimal <span>&nbsp;&nbsp;: &nbsp;&nbsp;</span> 87 m3 per detik </span>
                </div>
                <span style="font-weight: 500;font-size: 14px;color: #4D4D4D;margin-top: 2%;">Pembangunan dan Cara Kerja</span>
                <span class="deskripsi" style="margin-bottom: 2%;margin-top: 2%;">PLTA Riam Kanan atau PLTA Pangeran Muhammad Noor diresmikan pada tanggal 30 April 1973. Tercatat pengembangan PLTA Riam Kanan dilakukan pada bulan Juni 1980 hingga bulan Mei 1981. Pengembangan tersebut berupa penambahan satu unit turbin.</span>
                <span class="deskripsi">Air dari sungai dibendung dan ditampung dalam waduk. Saat diperlukan, air dialirkan melalui pintu pengambilan air dan melalui terowongan tekan. Air melewati tangki pendatar dan mengalir melalui pipa pesat. Air akan menuju ke rumah keong yang memutar turbin. Melalui pipa lepas, ar dibuang ke saluran pembuangan. Poros turbin dihubungkan dengan poros generator sehingga energi listrik terbangkitkan. Setelah tegangan ditinggikan menggunakan tranformator utama, energi listrik disalurkan menggunakan saluran transmisi. Saluran transmisi yang digunakan adalah Saluran Udara Tegangan Tinggi. Tegangan nominal yang diterapkan pada saluran adalah 70 kiloVolt.</span>
            </div>
            `
            document.getElementById("sidebar-content").innerHTML = template
        }
    </script>
</body>
</html>
