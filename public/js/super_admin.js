//finance
let menuSelect = document.getElementById("menu_select");
let paketHarga = document.getElementById("paket_harga");
let riwayat = document.getElementById("riwayat");
let laporan = document.getElementById("laporan");
if (menuSelect) {
    menuSelect.addEventListener("change", () => {
        let val = menuSelect.value;

        if (val === "paket_harga") {
            paketHarga.classList.remove("hidden");
            riwayat.classList.add("hidden");
            laporan.classList.add("hidden");
        } else if (val === "riwayat") {
            paketHarga.classList.add("hidden");
            riwayat.classList.remove("hidden");
            laporan.classList.add("hidden");
        } else if (val === "laporan") {
            paketHarga.classList.add("hidden");
            riwayat.classList.add("hidden");
            laporan.classList.remove("hidden");
        }
    });
}


//Data Pelamar Super Admin
let selectKategori = document.getElementById("kategori_select");
let btnAdd = document.getElementById("btnAdd");

let kandidat_table = document.getElementById("kandidat");
let non_kandidat_table = document.getElementById("non_kandidat");
let calon_kandidat_table = document.getElementById("calon_kandidat");

if (selectKategori) {
    selectKategori.addEventListener("change", () => {
        let val = selectKategori.value;

        btnAdd.href = "/dashboard/superadmin/pelamar/add/" + val;

        if (val === "kandidat") {
            kandidat_table.classList.remove("hidden");
            non_kandidat_table.classList.add("hidden");
            calon_kandidat_table.classList.add("hidden");

            title.innerHTML = "Data Kandidat";
        } else if (val === "non_kandidat") {
            kandidat_table.classList.add("hidden");
            non_kandidat_table.classList.remove("hidden");
            calon_kandidat_table.classList.add("hidden");

            title.innerHTML = "Data Non Kandidat";
        } else if (val === "calon_kandidat") {
            kandidat_table.classList.add("hidden");
            non_kandidat_table.classList.add("hidden");
            calon_kandidat_table.classList.remove("hidden");

            title.innerHTML = "Data Calon Kandidat";     
        }    
    });
}