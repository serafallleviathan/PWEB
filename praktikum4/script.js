let arrayPenjualan = [];

let no = 0;

let headerTabel = "<table><tr><th>No</th><th>Kode Barang</th><th>Nama Barang</th><th>Harga Barang</th><th>JumlahBarang</th><th>Cara Beli</th><th>Total Harga</th><th>Aksi</th></tr>";

let footerTabel = "</table>";

let isiTabel = "";


function simpan() {
    let kodeBarangElement = document.getElementById("kodeBarang");
    let selectedOption = kodeBarangElement.options[kodeBarangElement.selectedIndex];
    let kodeBarang = selectedOption.getAttribute("value");
    let namabarang = selectedOption.getAttribute("nama");
    let hargabarang = selectedOption.getAttribute("harga");
    let jumlahBarang = document.getElementById("jumlahBarang").value;
    let caraBeli = document.getElementById("caraBeli").value;

    if (kodeBarang == "" || jumlahBarang == "" || caraBeli == "") {
        alert("Data Tidak Boleh Kosong");
        return;
    }

    let hargabarangNum = parseFloat(hargabarang);
    let jumlahBarangNum = parseInt(jumlahBarang);
    let totalHarga = hargabarangNum * jumlahBarangNum;

    let apdetdata = arrayPenjualan.find(penjualan => penjualan.kodeBarang == kodeBarang && penjualan.caraBeli == caraBeli);
    if (apdetdata) {
        apdetdata.jumlahBarang = parseInt(apdetdata.jumlahBarang) + jumlahBarangNum;
        apdetdata.totalHarga = parseFloat(apdetdata.hargabarang) * apdetdata.jumlahBarang;
    } else {
    no++;

    arrayPenjualan.push({ 
        urut: no, 
        kodeBarang: kodeBarang, 
        namabarang: namabarang, 
        hargabarang: hargabarang, 
        jumlahBarang: jumlahBarang,  
        caraBeli: caraBeli,
        totalHarga: totalHarga
    });
    }

    tampilkan();

    kosongkanInputan();
}

function tampilkan() {
    isiTabel = "";
    let urut = 0;

    arrayPenjualan.forEach(function (penjualan) {
        urut++;
        penjualan.urut = urut;
        isiTabel += 
        "<tr><td>" + penjualan.urut + 
        "</td><td>" + penjualan.kodeBarang + 
        "</td><td>" + penjualan.namabarang + 
        "</td><td>" + penjualan.hargabarang + 
        "</td><td>" + penjualan.jumlahBarang + 
        "</td><td>" + penjualan.caraBeli + 
        "</td><td>" + penjualan.totalHarga +
        "</td><td><button onclick='hapus(" + penjualan.urut + ")'>Hapus</button></td></tr>";
    });

    let Subtotal = 0;
    arrayPenjualan.forEach(function (penjualan) {
        Subtotal += penjualan.totalHarga;
    });

    isiTabel += "<tr><th colspan='6'>Subtotal</th><th>" + Subtotal + "</th></tr>";
    document.getElementById("dataPenjualan").innerHTML = headerTabel + isiTabel + footerTabel;
}

function kosongkanInputan() {
    document.getElementById("kodeBarang").value = "";
    document.getElementById("jumlahBarang").value = "";
    document.getElementById("caraBeli").value = "";
}

function kosongkan() {
    kosongkanInputan();
    document.getElementById("dataPenjualan").innerHTML = "";
    arrayPenjualan = [];
    no = 0;
}

function hapus(urut) {
    arrayPenjualan.splice(urut - 1, 1);
    tampilkan();
}