let arrayPenjualan = [];

let no = 0;

let headerTabel = "<table><tr><th>No</th><th>Kode Barang</th><th>JumlahBarang</th><th>Cara Beli</th><th>Aksi</th></tr>";

let footerTabel = "</table>";

let isiTabel = "";


function simpan() {
    let kodeBarang = document.getElementById("kodeBarang").value;
    let jumlahBarang = document.getElementById("jumlahBarang").value;
    let caraBeli = document.getElementById("caraBeli").value;

    if (kodeBarang == "" || jumlahBarang == "" || caraBeli == "") {
        alert("Data Tidak Boleh Kosong");
        return;
    }

    no++;

    arrayPenjualan.push({ urut: no, kodeBarang: kodeBarang, jumlahBarang: jumlahBarang, caraBeli: caraBeli });

    tampilkan();

    kosongkanInputan();
}

    function tampilkan() {
    isiTabel = "";
    let urut = 0;

    arrayPenjualan.forEach(function (penjualan) {
        urut++;
        penjualan.urut = urut;
        isiTabel += "<tr><td>" + penjualan.urut + "</td><td>" + penjualan.kodeBarang + "</td><td>" + penjualan.jumlahBarang + "</td><td>" + penjualan.caraBeli + "</td><td><button onclick='hapus(" + penjualan.urut + ")'>Hapus</button></td></tr>";
    });

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