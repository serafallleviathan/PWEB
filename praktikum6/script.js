
let kursi = "";

function mulai() {
    let tempat = document.getElementById("tempatduduk").value;
    if (tempat == "") {
        alert("Data Tidak Boleh Kosong");
        return;
    }
    document.getElementById("tempatduduk").innerHTML = tempat;
}