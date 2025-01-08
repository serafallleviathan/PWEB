let arraytransaksi = [];

let no = 0;

let headerTabel = "<table><tr><th>No</th><th>Tanggal Transaksi</th><th>Nominal</th><th>Jenis Transaksi</th><th>Saldo Ahir</th><th>Aksi</th></tr>";

let footerTabel = "</table>";

let isiTabel = "";

function setor() {
    let nominal = document.getElementById("nominal").value;
    let tanggal = document.getElementById("tanggal").value;
    let type = document.getElementById("tombolsetor").value;
    if (nominal == "") {
        alert("Data Tidak Boleh Kosong");
        return;
    }
    arraytransaksi.push({
        no: no,
        nominal: nominal,
        type,
        saldoakhir: parseInt(nominal)
    })
    no++;
    tampilkan();
}

function tarik() {
    let nominal = document.getElementById("nominal").value;
    let tanggal = document.getElementById("tanggal").value;
    let type = document.getElementById("tomboltarik").value;
    if (nominal == "") {
        alert("Data Tidak Boleh Kosong");
        return;
    }
    arraytransaksi.push({
        no: no,
        nominal: nominal,
        type,
        saldoakhir: parseInt(nominal)
    })
    no++;
    tampilkan();
}

function tampilkan() {
    isiTabel = "";
    let urut = 0;

    arraytransaksi.forEach(function (transaksi) {
        urut++;
        transaksi.urut = urut;
        isiTabel += 
        "<tr><td>" + transaksi.urut + 
        "</td><td>" + transaksi.tanggal + 
        "</td><td>" + transaksi.nominal + 
        "</td><td>" + transaksi.jenistransaksi + 
        "</td><td>" + transaksi.saldoakhir + 
        "</td><td><button onclick='hapus(" + transaksi.urut + ")'>Hapus</button></td></tr>";
    });
    isiTabel += "";
    document.getElementById("dataTransaksi").innerHTML = headerTabel + isiTabel + footerTabel;
}

function hapus(no) {
    arraytransaksi.splice(no, 1);
    tampilkan();
}
